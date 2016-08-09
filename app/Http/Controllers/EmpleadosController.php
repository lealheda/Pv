<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Empleado;
use App\User;
use Laracasts\Flash\Flash;
use Auth;

class EmpleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
    	return view('layouts.empleados.registro');
    }

	public function index(){
		$empleados = Empleado::where('activo','=', 1)->get();
    	return view('layouts.empleados.index')->with('empleados',$empleados);
    }    

    public function edit($id){
    	$empleado = Empleado::find($id);
        $usuario = User::where('id_empleado', '=', $empleado->id)->first();
    	return view('layouts.empleados.editar')->with('empleado',$empleado)->with('usuario',$usuario);
    }

    public function update(Request $request, $id){
    	$empleado = Empleado::find($id);
    	$rules = array(
            'nombre'       => 'required',
            'apellido_paterno'       => 'required',
            'apellido_materno'       => 'required',
            'fecha_nacimiento'       => 'required',
            'curp'       => 'required',
            'telefono'       => 'required',
            'correo_electronico'      => 'required|email',
            'calle'      => 'required',
            'numero'      => 'required',
            'colonia'      => 'required',
            'codigo_postal'      => 'required|numeric|max:99999',
            'municipio'      => 'required',
            'estado'      => 'required',
            'pais'      => 'required',
            'usuario'      => 'required',
            'contrasena'      => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);
        if ($validator->fails()) {
        	return view('layouts.empleados.editar')->with('empleado',$empleado)->withErrors($validator);
        } else {
        	$datos = Request::all();
        	$empleado->update(Request::all());
        	$user = Auth::user();
        	$empleado->id_empleado_creo=$user->id_empleado;
            $cuenta_usuario = User::where('id_empleado','=',$empleado->id)->first();
            $cuenta_usuario-> name = Request::get('usuario');
            $cuenta_usuario-> password = bcrypt(Request::get('contrasena'));
            $cuenta_usuario-> email = Request::get('correo_electronico');
            $cuenta_usuario->save();
	    	$empleado->save();
	    	Flash::success('Empleado ' . $empleado->nombre .' actualizado con exito');
	    	return redirect()->route('empleados.index');
        }
    }

    public function store(Request $request){
    	$rules = array(
            'nombre'       => 'required',
            'apellido_paterno'       => 'required',
            'apellido_materno'       => 'required',
            'fecha_nacimiento'       => 'required',
            'curp'       => 'required',
            'telefono'       => 'required',
            'correo_electronico'      => 'required|email',
            'calle'      => 'required',
            'numero'      => 'required',
            'colonia'      => 'required',
            'codigo_postal'      => 'required|numeric|max:99999',
            'municipio'      => 'required',
            'estado'      => 'required',
            'pais'      => 'required',
            'usuario'      => 'required',
            'contrasena'      => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);
        if ($validator->fails()) {
        	return view('layouts.empleados.registro')->withErrors($validator);
        } else {
            $empleado = new empleado(Request::all());
            $empleado -> activo = 1;
            $user = Auth::user();
            $empleado -> id_empleado_creo  = $user->id_empleado;
            $empleado->save();
        	$cuenta_usuario = new User();
        	$cuenta_usuario->name=Request::get('usuario');
        	$cuenta_usuario->email=Request::get('correo_electronico');
        	$cuenta_usuario->password=bcrypt(Request::get('contrasena'));
            $cuenta_usuario->id_empleado=$empleado->id;
        	$cuenta_usuario->save();
	    	Flash::success('Empleado ' . $empleado->nombre .' se ha registrado con exito');
	    	return redirect()->route('empleados.index');
        }
    }

    public function destroy($id){
    	$empleado = empleado::find($id);
    	$empleado->activo=0;
        $cuenta_usuario = User::where('id_empleado','=',$empleado->id)->first();
    	$empleado->save();
        $cuenta_usuario->delete();
    	Flash::error('¡Empleado ' . $empleado->nombre .' ha sido eliminado con exito!');
    	return redirect()->route('empleados.index');
    }

}
