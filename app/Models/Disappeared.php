<?php

namespace App\Models;

use App\Http\Resources\V1\DisappearedHasPersonsResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disappeared extends Model
{
    use HasFactory;


    public function person(){
        return $this->belongsTo(Person::class);
    }
}
