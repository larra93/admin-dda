<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    use HasFactory;

    protected $table = "imagen_producto";
    protected  $primaryKey = 'id_imagen';
    public $timestamps = false;
    protected $fillable = [
        'nombre_imagen',
        'imagen',
        'destacado',
        'destacadoHome',
        'id_producto',
        'active'
        ];
}
