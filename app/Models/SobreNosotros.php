<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SobreNosotros extends Model
{
    use HasFactory;

    protected $table = "sobre_nosotros";
    protected  $primaryKey = 'id';
    protected $fillable = ['descripcion'];
}
