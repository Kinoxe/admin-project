<?php

namespace App;
use App\ContactoCliente;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre', 'cuit', 'localidad','direccion','provincia'
    ];

    public function contactos(){
 
       return $this->hasOne(ContactoCliente::class, 'id_cliente');

    }

    public function contacto(){
        return $this->hastMany(ContactoCliente::class,'id_cliente')->first();
 
     }

     public function scopeName($query, $name){
      
        if(trim($name) != ""){
            $query->where("nombre","LIKE", "%$name%");
        }
     }
}
