<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = "producto";
    protected  $primaryKey = 'id_producto';
    public $timestamps = false;
    protected $fillable = [
        'nombre_producto',
        'descripcion_producto',
        'precio',
        'imagen_destacada',
        'id_categoria',
        'active'
        ];


        /**
         * Get the user that owns the Producto
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function categoria()
        {
            return $this->belongsTo(Categoria::class);
        }
}
