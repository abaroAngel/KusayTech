<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // GET /api/admin/users?q=&is_active=&with_trashed=&per_page=
    public function index(Request $request)
    {
        $this->authorizeForAdmin($request);

        $q           = $request->string('q');
        $isActive    = $request->has('is_active') ? filter_var($request->get('is_active'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : null;
        $withTrashed = filter_var($request->get('with_trashed', false), FILTER_VALIDATE_BOOLEAN);
        $perPage     = min((int) $request->get('per_page', 15), 100);

        $query = User::query()
            ->when($withTrashed, fn($q)=>$q->withTrashed())
            ->when($q, fn($qq,$v)=>$qq->where(function($w) use ($v){
                $w->where('name','like',"%{$v}%")
                  ->orWhere('email','like',"%{$v}%")
                  ->orWhere('phone','like',"%{$v}%");
            }))
            ->when(!is_null($isActive), fn($qq) => $qq->where('is_active', request('is_active')))
            ->orderByDesc('created_at');

        return UserResource::collection($query->paginate($perPage));
    }

    // POST /api/admin/users
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $role = $data['role'] ?? null;
        unset($data['role']);

        $user = User::create($data);

        // Solo Admin por ahora
        if ($role === 'Admin') {
            $user->syncRoles(['Admin']);
        }

        return new UserResource($user);
    }

    // GET /api/admin/users/{user}
    public function show(Request $request, User $user)
    {
        $this->authorizeForAdmin($request);
        return new UserResource($user);
    }

    // PUT/PATCH /api/admin/users/{user}
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $role = $data['role'] ?? null;
        unset($data['role']);

        // Si llega password nulo o vacío, no tocar
        if (array_key_exists('password', $data) && empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        if ($role === 'Admin') {
            $user->syncRoles(['Admin']);
        } elseif ($role === null) {
            // no cambiar roles si no mandaron nada
        } else {
            // Si mandaron algo distinto, quitamos roles (solo Admin soportado)
            $user->syncRoles([]);
        }

        return new UserResource($user->fresh());
    }

    // DELETE /api/admin/users/{user}  -> Soft delete
    public function destroy(Request $request, User $user)
    {
        $this->authorizeForAdmin($request);
        $user->delete();

        return response()->json(['message' => 'Usuario enviado a papelera.']);
    }

    // POST /api/admin/users/{id}/restore
    public function restore(Request $request, int $id)
    {
        $this->authorizeForAdmin($request);
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return new UserResource($user);
    }

    // DELETE /api/admin/users/{id}/force
    public function forceDelete(Request $request, int $id)
    {
        $this->authorizeForAdmin($request);
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();

        return response()->json(['message' => 'Usuario eliminado definitivamente.']);
    }

    // PATCH /api/admin/users/{user}/toggle-active
    public function toggleActive(Request $request, User $user)
    {
        $this->authorizeForAdmin($request);
        $user->is_active = ! (bool) $user->is_active;
        $user->save();

        return new UserResource($user);
    }

    private function authorizeForAdmin(Request $request): void
    {
        abort_unless($request->user()?->hasRole('Admin'), 403, 'Solo Admin.');
    }
}
