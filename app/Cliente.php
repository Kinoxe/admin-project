<?php

namespace App;
use App\ContactoCliente;


use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre', 'cuit', 'localidad','direccion','provincia'
    ];

    public function contacto(){
 
       return $this->hasOne(ContactoCliente::class, 'id_cliente');

    }

    public function contactos(){
        return $this->hasMany(ContactoCliente::class,'id_cliente');
 
     }

     public function scopeName($query, $name){
      
        if(trim($name) != ""){
            $query->where("nombre","LIKE", "%$name%");
        }
     }
}
