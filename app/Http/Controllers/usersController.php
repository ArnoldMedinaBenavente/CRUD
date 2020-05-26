<?php

namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use DB;
	class usersController extends Controller
	{
	    public function usuarios(){

	    	$usuarios = DB::TABLE('users')->get();
	    	
	    	return view('users.main')
	    	       ->with('usuarios',$usuarios);
	    }//usuarios

	    public function nuevo(){
	       return view('users.nuevo');
	    }//nuevo

	    public function guardar(Request $request){

	         $request->validate([
	        'nick'      => 'required|unique:users|alpha_dash',
	        'nombre'      => 'required',
	        'apellidos' =>'required',
	        'contraseña'=> 'required',
	        'rol'       => 'required',
	        'correo'    => 'required'
	    ]);

	    	DB::table('users')
	    	->insert(['nick'      => $request->nick,
	                  'nombre'    => $request->nombre,
	                  'apellidos' => $request->apellidos,
	                  'contraseña'=> $request->contraseña,
	                  'rol'       => $request->rol,
	                  'correo'    =>$request->correo
	                ]);

	    	return redirect('/');
	    }//guardar

	    public function editar($id){
	    	$usuario = DB::table('users')
	    	         ->where('id',$id)
	               	 ->first();

	    	return view('users.editar')
	    	       ->with('usuario',$usuario);
	    }//editar

	    public function actualizar(Request $request,$id){
	    	
	    	 $request->validate([
	        'nick'      => 'required|unique:users|alpha_dash',
	        'nombre'    => 'required',
	        'apellidos' =>'required',
	        'contraseña'=> 'required',
	        'rol'       => 'required',
	        'correo'    => 'required|email'
	        ]);

	        DB::table('users')
	        ->where('id',$id)
	        ->update(['nick'      => $request->nick,
	                  'nombre'    => $request->nombre,
	                  'apellidos' => $request->apellidos,
	                  'contraseña'=> $request->contraseña,
	                  'rol'       => $request->rol,
	                  'correo'    =>$request->correo]);
	    
	    	return redirect('/');
	    }//actualizar

	   public function eliminar(Request $request,$id){

        DB::table('users')->where('id',$id)->delete();
        return redirect('/');

	    }//eliminar
	}
