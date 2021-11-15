<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminos extends Model
{
    use HasFactory;

    protected $table = "terminos";
    protected  $primaryKey = 'id_terminos';
    public $timestamps = false;
    protected $fillable = ['descripcion'];
}
