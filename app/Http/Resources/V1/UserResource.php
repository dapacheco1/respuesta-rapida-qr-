<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'username'    => $this->username,
            'email'       => $this->email,
            'rol'         => $this->rol->name,
            'status'      => $this->status,
            'personalinfo'=> [
                'cedula' => $this->person->dni,
                'nombresContacto' => $this->person->names. ' '.$this->person->lastnames,
                'direccionContacto' => $this->person->address,
                'telefonoContacto' =>$this->person->phoneNumber,
            ],
        ];
    }
}
