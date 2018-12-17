<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/notify', function () {
    return Auth::user()->unreadNotifications;
})->name('notify');

Route::put('/notify/{id}', function ($id) {  
    
    $not =  Auth::user()->unreadNotifications;
    $j=-1;
    for ($i=0; $i < count($not) && $j == -1; $i++) { 
       if($not[$i]->id == $id){
           $j=$i;
       }
    }
    if($j == -1){
        return redirect()->back()->with('error', 'no se encontro notificacion.');
    }
    $not[$j]->markAsRead();
    return redirect()->back()->with('success', 'notificacion leida.');
    
})->name('notify.read');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('clientes','ClientesController');
Route::resource('usuarios','UserController');
Route::resource('departamentos','DepartamentosController');
Route::resource('notificaciones','NotificacionesController');