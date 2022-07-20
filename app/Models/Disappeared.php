<?php

namespace App\Models;

use App\Http\Resources\V1\DisappearedHasPersonsResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disappeared extends Model
{
    use HasFactory;

    public function disappearedHasMedicamento(){
        return $this->hasMany(DisappearedHasMedicamentos::class);
    }

    public function classification(){
        return $this->belongsTo(Classification::class);
    }

    public function disappearedHasDisease(){
        return $this->hasMany(DisappearedHasDiseases::class);
    }

    public function disappearedHasPerson(){
        return $this->hasMany(DisappearedHasPersonsResource::class);
    }
}
