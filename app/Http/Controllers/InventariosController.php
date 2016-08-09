<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Inventario;
use App\Producto;
use App\Ajuste;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use Auth;

class InventariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
    	$inventarios = Inventario::where('activo','=', 1)->get();
        foreach ($inventarios as $inventario) {
            $producto = Producto::find($inventario->id_producto);
            $inventario->nombre = $producto->nombre;
            $inventario->descripcion = $producto->descripcion;
            $inventario->categoria = $producto->categoria;
            $inventario->ajuste = 0;
        }
        $error = null;
        return view('layouts.inventarios.ajuste')->with('inventarios',$inventarios)->with('error',$error);;
    }

	public function index(){
		$inventarios = Inventario::where('activo','=', 1)->get();
		foreach ($inventarios as $inventario) {
			$producto = Producto::find($inventario->id_producto);
			$inventario->nombre = $producto->nombre;
			$inventario->descripcion = $producto->descripcion;
			$inventario->categoria = $producto->categoria;
		}
    	return view('layouts.inventarios.index')->with('inventarios',$inventarios);
    }    

    public function edit($id){
    	
    }

    public function update(Request $request, $id){
    	
    }

    private function validaajuste($ajustes){
        foreach ($ajustes as $ajuste => $valor ) {
            if($valor<0)
                return false;
        }
        return true;
    }

    public function store(Request $request){
        $motivo = $request->motivo;
    	$id_productos = $request->id_producto;
        $existencias = (array) $request->existencia;
        $ajustes = (array) $request->ajuste;
        $contador = 0;
        $respuesta = $this->validaajuste($ajustes);
            if($respuesta==false){
                $inventarios = Inventario::where('activo','=', 1)->get();
                foreach ($inventarios as $inventario) {
                    $producto = Producto::find($inventario->id_producto);
                    $inventario->nombre = $producto->nombre;
                    $inventario->descripcion = $producto->descripcion;
                    $inventario->categoria = $producto->categoria;
                    $inventario->ajuste = 0;
                }
                $error = "Error, el ajuste no puede ser menor que 0";
                return view('layouts.inventarios.ajuste')->with('inventarios',$inventarios)->with('error',$error);
            } 
            else{
                $posicion=0;
                $user = Auth::user();
                foreach ($id_productos as $id_producto) {
                    $inventario = Inventario::where('id_producto','=',$id_producto)->first();
                    $inventario->cantidad = $ajustes[$posicion];    
                    
                    $inventario->save();
                    $ajuste = new Ajuste();
                    $ajuste->id_producto = $id_producto;
                    $ajuste->motivo = $motivo;
                    $ajuste->existencia = $existencias[$posicion];
                    $ajuste->ajuste = $ajustes[$posicion];
                    $ajuste->id_empleado_creo = $user->id_empleado;
                    $ajuste->save();
                    $posicion++;
                }
                Flash::success('¡ El inventario se ha ajustado con exito !');
                return redirect()->route('inventarios.index');
            }
            
        }

    public function destroy($id){
    	$Inventario = Inventario::find($id);
        $inventario = Inventario::where('id_Inventario', '=', $Inventario->id);
        if($inventario->cantidad!=0){
            Flash::error('¡ El Inventario ' . $Inventario->nombre .' No se puede eliminar por existencias !');
            return redirect()->route('inventarios.index');    
        }
        else{
        	$Inventario->activo=0;
            $user = Auth::user();
            $Inventario -> id_empleado_creo  = $user->id_empleado;
        	$Inventario->save();
        	Flash::success('¡Inventario ' . $Inventario->nombre .' ha sido eliminado con exito!');
        	return redirect()->route('inventarios.index');
        }
    }
}
