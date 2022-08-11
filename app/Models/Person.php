<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $fillable = ['dni','names','lastnames','address','phoneNumber','status'];

    public function disappeared(){
        return $this->hasOne(Disappeared::class);
    }
}
