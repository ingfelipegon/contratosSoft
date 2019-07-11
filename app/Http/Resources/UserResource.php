<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $defaultData = parent::toArray($request);

        $additionalData = [
          'role'=> ($this->roles ? $this->roles->first():null),
          'permissions'=> ($this->permissions?$this->permissions:null),
        ];

        return array_merge($defaultData, $additionalData);
    }
}
