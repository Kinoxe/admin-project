<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Cliente;
use App\ContactoCliente;
use \App\Http\Requests\ClienteRequest;

class ClientesController extends Controller
{   
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:show client', ['only' => ['index']]);
       $this->middleware('permission:create client', ['only' => ['create','store']]);
       $this->middleware('permission:edit client', ['only' => ['edit','update']]);
       $this->middleware('permission:delete client', ['only' => ['destroy']]);
       //$this->authorizeResource(Cliente::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $clientes = Cliente::name($request->get('name'))->orderBy('id','ASC')->paginate(10); 
        //$clientes->load('contactos')  ;
       //dd($clientes->contactos);
        
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        try{
            
            
          $cliente = new Cliente([
            'nombre' => trim($request->get('nombre')),
            'cuit' => trim($request->get('cuit')),
            'direccion'=> trim($request->get('direccion')),
            'localidad'=> trim($request->get('localidad')),
            'provincia'=> trim($request->get('provincia'))
          ]);
        
          $cliente->save();
          //guardamos contactos
          for ($i=count($request->get('contacto-nombre'))-1; $i >= 0; $i--) { 
              
                $contacto = new ContactoCliente([
                  'id_cliente'=> $cliente->id,
                  'nombre'=>trim(($request->get('contacto-nombre'))[$i]),
                  'telefono'=>trim(($request->get('contacto-telefono'))[$i]),
                  'email'=>trim(($request->get('contacto-email'))[$i]),
              ]);
               // dd($contacto);
              $contacto->save();
            
               
          };
         
        return redirect('/clientes')->with('success', 'El cliente se agrego correctamente.');
    }catch(\Exception $e) {
        // do task when error
        echo $e->getMessage();   // insert query
           // return redirect('/clientes/create')->with('error', 'El cliente se agrego correctamente.'.$e.'', 500);
            
        
    }
        
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $cliente = Cliente::where('id','=',$id)->get()->first(); 
        
        $contactos = Cliente::find($id)->contactos;
        //dd($contactos);
        return view('clientes.show', compact('cliente','contactos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::where('id','=',$id)->get()->first(); 
        
        $contactos = Cliente::find($id)->contactos;
        //dd($contactos);
        return view('clientes.edit', compact('cliente','contactos'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {     //dd($request);
        try{
        
          $cliente = Cliente::find($id);
          $cliente->nombre = trim($request->get('nombre'));
          $cliente->direccion = trim($request->get('direccion'));
          $cliente->localidad = trim($request->get('localidad'));
          $cliente->cuit = trim($request->get('cuit'));
          $cliente->provincia = trim($request->get('provincia'));
          //$cliente->save();
        
          $contactos = Cliente::find($id)->contactos;
          
          for ($i=count($request->get('contacto-nombre'))-1; $i >= 0; $i--) { 
            $cambia=-1;
            $id_contc = ($request->get('contacto-id'))[$i];
            if($id_contc != '#'){
                
                $contacto = ContactoCliente::find($id_contc);
                $contacto->nombre = trim(($request->get('contacto-nombre'))[$i]);
                $contacto->telefono = trim(($request->get('contacto-telefono'))[$i]);
                $contacto->email = trim(($request->get('contacto-email'))[$i]);
              
                foreach($contactos as $key => $conta){
                    if($conta->id == $id_contc){
                        $cambia=$key;
                    }
                }
                if($cambia!= -1){unset($contactos[$cambia]);}
            }else{
                $contacto = new ContactoCliente([
                    'id_cliente'=> $cliente->id,
                    'nombre'=>($request->get('contacto-nombre'))[$i],
                    'telefono'=>($request->get('contacto-telefono'))[$i],
                    'email'=>($request->get('contacto-email'))[$i],
                ]);
            }
           // dd($contacto);
          $contacto->save();
        
      };
        foreach ($contactos as $contacto) {
            $contac = ContactoCliente::find($contacto->id);
            $contac->delete();
        }

        return redirect('/clientes')->with('success', 'El cliente fue actualizado correctamente.');

        }catch(\Exception $e) {
                // do task when error
                echo $e->getMessage();   // insert query
                   // return redirect('/clientes/create')->with('error', 'El cliente se agrego correctamente.'.$e.'', 500);
                    
                
            }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect('/clientes')->with('success', 'El cliente fue eliminado.');
    }
}
