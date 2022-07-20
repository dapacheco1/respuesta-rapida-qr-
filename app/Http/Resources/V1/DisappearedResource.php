<?php

namespace App\Http\Resources\V1;

use App\Models\Disappeared;
use App\Models\DisappearedHasDiseases;
use App\Models\DisappearedHasMedicamentos;
use App\Models\DisappearedHasPersons;
use App\Models\Disease;
use App\Models\Medicine;
use App\Models\Person;
use Illuminate\Http\Resources\Json\JsonResource;

class DisappearedResource extends JsonResource
{

    private function findMedicines(){
        //encontrar medicinas
        $findMedicines = DisappearedHasMedicamentos::where('disappeared_id',$this->id)->get();
        $listOfMedicinesName = [];
        $listOfMedicinesDose = [];
        $medicines = [];
        if($findMedicines){
            foreach($findMedicines as $item){
                array_push($listOfMedicinesName,Medicine::find($item->medicine_id)->name);
                array_push($listOfMedicinesDose,Medicine::find($item->medicine_id)->dose);
            }
            $medicines = [$listOfMedicinesName,$listOfMedicinesDose];
        }
        return $medicines;
    }

    private function findDisease(){
        //encontrar medicinas
        $findDiseases = DisappearedHasDiseases::where('disappeared_id',$this->id)->get();
        $listOfDiseases = [];

        if($findDiseases){
            foreach($findDiseases as $item){
                array_push($listOfDiseases,Disease::find($item->disease_id)->name);
            }

        }
        return $listOfDiseases;
    }

    private function findContacts(){
        //encontrar medicinas
        $findContacts = DisappearedHasPersons::where('disappeared_id',$this->id)->get();
        $listOfContacts = [];

        if($findContacts){
            foreach($findContacts as $item){
                array_push($listOfContacts,new PersonResource(Person::find($item->people_id)));

            }

        }
        return $listOfContacts;
    }

    public function toArray($request)
    {
        $medicines = $this->findMedicines();
        $diseases = $this->findDisease();
        $contacts = $this->findContacts();

        return [
            'names'=> $this->names,
            'image' => $this->image,
            'identifier' => $this->identifier,
            'type' => $this->classification->type,
            'medicines' => $medicines[0],
            'doses' => $medicines[1],
            'diseases'=>$diseases,
            'contactInformation' =>$contacts
        ];
    }
}
