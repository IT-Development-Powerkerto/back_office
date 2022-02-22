<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserPWK extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'from'          => 'Banyumax',
            'id'            => $this->id,
            'role_id'       => $this->role_id,
            'paket'         => $this->paket,
            'name'          => $this->name,
            'username'      => $this->username,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'password'      => $this->password,
            'image'         => $this->image,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'expired_at'    => Carbon::parse($this->expired_at)->subDay()->diffForHumans(),
        ];
    }
}
