<?php

namespace App\Http\Resources\V1;

use App\Models\Disappeared;

use App\Models\DisappearedHasPersons;

use App\Models\Person;
use Illuminate\Http\Resources\Json\JsonResource;

class DisappearedResource extends JsonResource
{




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

        $contacts = $this->findContacts();

        return [
            'names'=> $this->names,
            'identifier' => $this->identifier,
            'contactInformation' =>$contacts
        ];
    }
}
