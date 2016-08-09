<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Proveedor;
use App\User;
use Laracasts\Flash\Flash;
use Auth;

class ProveedoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
    	return view('layouts.proveedores.registro');
    }

	public function index(){
		$proveedores = Proveedor::where('activo','=', 1)->get();
    	return view('layouts.proveedores.index')->with('proveedores',$proveedores);
    }    

    public function edit($id){
    	$proveedor = Proveedor::find($id);
    	return view('layouts.proveedores.editar')->with('proveedor',$proveedor);
    }

    public function update(Request $request, $id){
    	$proveedor = Proveedor::find($id);
    	$rules = array(
            'nombre'       => 'required',
            'rfc'       => 'required',
            'telefono'       => 'required',
            'correo_electronico'      => 'required|email',
            'calle'      => 'required',
            'numero'      => 'required',
            'colonia'      => 'required',
            'codigo_postal'      => 'required|numeric|max:99999',
            'municipio'      => 'required',
            'estado'      => 'required',
            'pais'      => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);
        if ($validator->fails()) {
        	return view('layouts.proveedores.editar')->with('proveedor',$proveedor)->withErrors($validator);
        } else {
        	$datos = Request::all();
        	$proveedor->update(Request::all());
        	$user = Auth::user();
        	$proveedor->id_empleado_creo=$user->id_empleado;
	    	$proveedor->save();
	    	Flash::success('Proveedor ' . $proveedor->nombre .' se ha actualizado con exito');
	    	return redirect()->route('proveedores.index');
        }
    }

    public function store(Request $request){
    	$rules = array(
            'nombre'       => 'required',
            'rfc'       => 'required',
            'telefono'       => 'required',
            'correo_electronico'      => 'required|email',
            'calle'      => 'required',
            'numero'      => 'required',
            'colonia'      => 'required',
            'codigo_postal'      => 'required|numeric|max:99999',
            'municipio'      => 'required',
            'estado'      => 'required',
            'pais'      => 'required',
        );
        $validator = Validator::make(Request::all(), $rules);
        if ($validator->fails()) {
        	return view('layouts.proveedores.registro')->withErrors($validator);
        } else {
            $proveedor = new Proveedor(Request::all());
            $proveedor -> activo = 1;
            $user = Auth::user();
            $proveedor -> id_empleado_creo  = $user->id_empleado;
            $proveedor->save();
	    	Flash::success('Proveedor ' . $proveedor->nombre .' se ha registrado con exito');
	    	return redirect()->route('proveedores.index');
        }
    }

    public function destroy($id){
    	$proveedor = Proveedor::find($id);
    	$proveedor->activo=0;
        $user = Auth::user();
        $proveedor -> id_empleado_creo  = $user->id_empleado;
    	$proveedor->save();
    	Flash::error('¡Proveedor ' . $proveedor->nombre .' ha sido eliminado con exito!');
    	return redirect()->route('proveedores.index');
    }
}
