<?php

namespace App\Http\Resources\V1;

use App\Models\Disappeared;

use App\Models\DisappearedHasPersons;

use App\Models\Person;
use Illuminate\Http\Resources\Json\JsonResource;

class DisappearedResource extends JsonResource
{





    public function toArray($request)
    {
        return [
            'names'=> $this->names,
            'identifier' => $this->identifier,
            'contactinfo'=> [
                'cedula' => $this->person->dni,
                'nombresContacto' => $this->person->names. ' '.$this->person->lastnames,
                'direccionContacto' => $this->person->address,
                'telefonoContacto' =>$this->person->phoneNumber,
            ],
        ];
    }
}
