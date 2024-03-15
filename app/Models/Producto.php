<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table ='producto';
    protected $primaryKey='id_producto';
    public $timestamps=false;

    protected $filable=[
        'id_categoria',
        'codigo',
        'stock',
        'descripcion',
        'imagen',
        'status'

    ];

    protected $guarded = [
        
    ];
}