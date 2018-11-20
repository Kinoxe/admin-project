<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Cliente;
use App\ContactoCliente;

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
    public function index()
    {
        $clientes = Cliente::paginate(10); 
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
        
          $cliente = new Cliente([
            'nombre' => $request->get('nombre'),
            'direccion'=> $request->get('direccion'),
            'telefono'=> $request->get('telefono'),
            'email'=> $request->get('email')
          ]);
          $cliente->save();
          return redirect('/clientes')->with('success', 'El cliente se agrego correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
          $cliente = Cliente::find($id);
          $cliente->nombre = $request->get('nombre');
          $cliente->direccion = $request->get('direccion');
          $cliente->telefono = $request->get('telefono');
          $cliente->email = $request->get('email');
          $cliente->save();
    
          return redirect('/clientes')->with('success', 'El cliente fue actualizado correctamente.');
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