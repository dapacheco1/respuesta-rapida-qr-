<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
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
            'cedula' => $this->dni,
            'nombresContacto' => $this->names. ' '.$this->lastnames,
            'direccionContacto' => $this->address,
            'telefonoContacto' =>$this->phoneNumber,
        ];
    }
}
