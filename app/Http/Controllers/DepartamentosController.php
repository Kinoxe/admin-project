<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Departamento;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class DepartamentosController extends Controller
{      function __construct(Request $request)
    {   $this->middleware('auth');
        $this->middleware(['permission:show departamento']);
        $this->middleware('permission:create departamento', ['only' => ['create','store']]);
        $this->middleware('permission:edit departamento', ['only' => ['edit','update']]);
        $this->middleware('permission:delete departamento', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$Departamento = Departamento::all();
        $departamentos = DB::table('departamentos')
            ->join('users as encargado', 'departamentos.encargado', '=', 'encargado.id')
           // ->join('users as suplente', 'Departamentos.suplente', '=', 'suplente.id')
            ->select('departamentos.id', 'departamentos.nombre','departamentos.abreviatura', 'encargado.name as encargado')->get();
       
        
        return view('admin.departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $users = User::select('id','name')->get();
        return view('admin.departamentos.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $encargado = User::where('id','=',$request->encargado)->get();
        //dd($encargado);
        if(!$encargado){
            return redirect('/departamentos/create')->with('error', 'No se encontro el encargado.')->withInput();  
        }
      
        
        $Departamento = Departamento::create([
            'nombre' => trim($request->nombre),
            'abreviatura' => trim($request->abreviatura),
            
            'encargado' => trim($request->encargado),
           
        ]);
        $users = User::all();
          foreach($users as $user){
            
              if($user->hasPermissionTo('show departamento') && $user->id != auth()->user()->id){
                  
                  $user->notify(new \App\Notifications\CreacionDepartamento($Departamento));
                  
              }
          }
        return redirect('/departamentos')->with('success', 'El departamento fue agregado correctamente.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /* $departamento = Departamento::find($id);
        if(!$departamento){
            return view('admin.departamentos', compact(['error'=>['message'=> "No se ha encontrado el Departamentoo."]]));
            //return Response::json(['error'=>['message'=> "No se ha encontrado el Departamentoo."]], 404);
        }

        //$Departamento=array_add($Departamento,'permission', Permission::all());
        return view('admin.departamentos.show', compact('departamento'));
        //Response::json($Departamento,200);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $departamento = Departamento::where('id',$id)->first();
        if(!$departamento){
            dd('error');
            //return view('admin.departamentos.index', compact(['error'=>['El departamento no existe.']]));
        }
        $users = User::all();
        //dd($departamento);
        return view('admin.departamentos.edit', compact('departamento','users')); 
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
        $Departamento = Departamento::find($id);
        if(!$Departamento){
            return redirect('/departamentos')->with('error', 'El departamento no existe.')->withInput();
        }

        $Departamento->nombre = trim($request->nombre);
        $Departamento->abreviatura= trim($request->abreviatura);
       
        $Departamento->encargado = trim($request->encargado);
       
        $Departamento->save();
        $message =  "El Rol ha sido editado correctamente";
        $response = Response::json(['data'=> $message], 201);
        $users = User::all();
          foreach($users as $user){
            
              if($user->hasPermissionTo('show departamento') && $user->id != auth()->user()->id){
                  
                  $user->notify(new \App\Notifications\DepartamentoEdicion($Departamento));
                  
              }
          }
        return redirect('/departamentos')->with('success', 'El departamento fue editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Departamento = Departamento::find($id);
        if(!$Departamento){
           
            return redirect('/departamentos')->with('error', 'No se encontro el departamento.'); 
       }
       

       $Departamento->delete();
       $users = User::all();
          foreach($users as $user){
            
              if($user->hasPermissionTo('show departamento') && $user->id != auth()->user()->id){
                  
                  $user->notify(new \App\Notifications\DepartamentoEliminacion($Departamento));
                  
              }
          }
       return redirect('/departamentos')->with('success', 'El departamento ha sido eliminado.'); 
    }
}
