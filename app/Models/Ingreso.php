<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;
    protected $table ='ingreso';
    protected $primaryKey='id_ingreso';
    public $timestamps=false;

    protected $filable=[
        'id_proveedor',
        'tipo_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'estado'
    ];

    protected $guarded = [
        
    ];
}
