<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;

class ContactoCliente extends Model
{
    protected $fillable = [
        'id_cliente','nombre', 'email', 'telefono'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'id');
    }
}
