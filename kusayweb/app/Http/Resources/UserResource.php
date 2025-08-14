<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'is_active'     => (bool) $this->is_active,
            'roles'         => $this->getRoleNames(), // ["Admin"] o []
            'last_login_at' => optional($this->last_login_at)->toIso8601String(),
            'created_at'    => $this->created_at?->toIso8601String(),
            'updated_at'    => $this->updated_at?->toIso8601String(),
            'deleted_at'    => $this->deleted_at?->toIso8601String(),
        ];
    }
}
