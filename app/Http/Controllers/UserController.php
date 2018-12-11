<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{   
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:show user', ['only' => ['index']]);
       $this->middleware('permission:create user', ['only' => ['create','store']]);
       $this->middleware('permission:edit user', ['only' => ['edit','update']]);
       $this->middleware('permission:delete user', ['only' => ['destroy']]);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::name($request->get('name'))->orderBy('id','ASC')->paginate(10); 
        
        return view('admin.users.index', compact('usuarios'));
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
        //
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
        $usuario = User::where('id','=',$id)->get()->first(); 
        
        $roles = Role::all();
        //dd($contactos);
        return view('admin.users.edit', compact('usuario','roles'));
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
        //dd($request);
        try{

        
        $user = User::find($id);
        
        $user->name = trim($request->get('name'));
        $user->email = trim($request->get('email'));

        $user->removeRole($user->getRoleNames()[0]);
        $user->assignRole(trim($request->get('rol')));
            
        if(trim($request->get('password'))!= null){
           // dd(trim($request->get('password')));
               $user->password = Hash::make(trim($request->get('password')));
        }
        

        $user->save();
        return redirect('/usuarios')->with('success', 'El Usuario fue editado correctamente.');
    }
        catch(\Exception $e) {
            
             return redirect('/usuarios')->with('errors', ['Error al editar usuario: '.$e->getMessage().'', 500]);
                
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { try{
        
        $user = User::find($id);

        if($user->name != 'root'){
            
        $user->removeRole($user->getRoleNames()[0]);
        $user->assignRole('guest');
         }

        return redirect('/usuarios')->with('success', 'El Usuario fue eliminado correctamente.(rol guest)');
    }catch(\Exception $e) {
        return redirect('/usuarios')->with('errors', ['Error al eliminar usuario: '.$e->getMessage().'', 500]);
    }
    }
}
