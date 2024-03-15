<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table ='persona';
    protected $primaryKey='id_persona';
    public $timestamps=false;

    protected $filable=[
        'tipo_persona',
        'nombre',
        'tipo_documento',
        'num_ducumento',
        'direccion',
        'telefono',
        'email'
    ];

    protected $guarded = [
        
    ];
}


