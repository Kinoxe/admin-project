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
        /*
        $this->middleware(['permission:Departamento show']);
        $this->middleware('permission:Departamento create', ['only' => ['create','store']]);
        $this->middleware('permission:Departamento edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Departamento delete', ['only' => ['destroy']]);*/
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
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encargado = User::where('name','=',$request->encargado)->get();
        if(!$encargado){
            return Response::json(['error'=>[
                'message'=> "No se ha encontrado el Usuario Encargado."]], 404);
        }
      
        $message = $encargado;
        $Departamento = Departamento::create([
            'nombre' => trim($request->nombre),
            'abreviatura' => trim($request->abreviatura),
            'encargado' => $encargado[0]->id,
           
        ]);
        $message =  "El Departamentoo ha sido creado correctamente";
        $response = Response::json(['data'=> $message], 201);
        return $response;
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
            return redirect('/departamentos')->with('error', 'El departamento no existe.');
        }

        $Departamento->nombre = trim($request->nombre);
        $Departamento->abreviatura= trim($request->abreviatura);
       
        $Departamento->encargado = trim($request->encargado);
       
        $Departamento->save();
        $message =  "El Rol ha sido editado correctamente";
        $response = Response::json(['data'=> $message], 201);
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
           return Response::json(['error'=>[
               'error' => "No se ha encontrado el Departamentoo."
           ]],404);
       }
       

       $Departamento->delete();
       
       $message = "El Departamentoo se elimino correctamente.";
       $response = Response::json([
           'message' => $message]);
       return $response;
    }
}
