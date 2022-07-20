<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisappearedHasMedicamentos extends Model
{
    use HasFactory;
    protected $table = 'disappeared_has_medicamentos';
    protected $fillable = ['disappeared_id','medicine_id'];

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }

    public function disappeared(){
        return $this->belongsTo(Disappeared::class);
    }
}
