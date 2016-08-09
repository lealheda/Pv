<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Compra;
use App\Compra_detalle;
use App\Producto;
use App\User;
use App\Proveedor;
use App\Resumen_compra;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;
use App\Inventario;
use Auth;

class ComprasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $fecha = date('Y-m-d');
        $proveedores = Proveedor::where('activo', true)->orderBy('nombre')->lists('nombre', 'id');
        $productos = Producto::all();
    	return view('layouts.compras.registro')->with('fecha_compra',$fecha)->with('proveedores',$proveedores)->with('productos',$productos);
    }

	public function index(){
		$compras = Compra::where('activo','=', 1)->get();
        foreach ($compras as $compra){
            $proveedor = Proveedor::find($compra->id_proveedor);
            $compra->nombre_proveedor = $proveedor->nombre;
        }
    	return view('layouts.compras.index')->with('compras',$compras);
    }    

    public function view($id){
    	$compra = Compra::find($id);
        $proveedor = Proveedor::find($compra->id_proveedor);
        $compra->nombre_proveedor = $proveedor->nombre;
        $detalles = Compra_detalle::where('id_compra', '=', $compra->id)->get();
        $resumen = new Resumen_compra();
        foreach ($detalles as $detalle) {
            $producto = Producto::find($detalle->id_producto);
            $detalle->nombre_producto = $producto->nombre;
            $resumen->cantidad += $detalle->cantidad;
            $resumen->descuento_porcentaje += $detalle->descuento_porcentaje;
            $resumen->descuento_pesos += $detalle->descuento_pesos;
            $resumen->subtotal += $detalle->subtotal;
            $resumen->iva += $detalle->iva;
            $resumen->ieps += $detalle->ieps;
            $resumen->total += $detalle->total;
        }        
    	return view('layouts.compras.visualizar')->with('compra',$compra)->with('detalles',$detalles)->with('resumen',$resumen);
    }

    public function pdf($id){
        $compra = Compra::find($id);
        $proveedor = Proveedor::find($compra->id_proveedor);
        $compra->nombre_proveedor = $proveedor->nombre;
        $detalles = Compra_detalle::where('id_compra', '=', $compra->id)->get();
        $resumen = new Resumen_compra();
        foreach ($detalles as $detalle) {
            $producto = Producto::find($detalle->id_producto);
            $detalle->nombre_producto = $producto->nombre;
            $resumen->cantidad += $detalle->cantidad;
            $resumen->descuento_porcentaje += $detalle->descuento_porcentaje;
            $resumen->descuento_pesos += $detalle->descuento_pesos;
            $resumen->subtotal += $detalle->subtotal;
            $resumen->iva += $detalle->iva;
            $resumen->ieps += $detalle->ieps;
            $resumen->total += $detalle->total;
        }        
        $view = \View::make('layouts.compras.pdf', compact('proveedor','compra','detalles','resumen'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream($compra->id);
        //return $pdf->download($compra->id+'.pdf');
    }

    public function update(Request $request, $id){
        $ldate = date('Y-m-d H:i:s');
        $compra = Compra::find($id);
        if($compra->surtida==true){
            Flash::error('¡ Su compra no puede ser surtida por que ya fue surtida !');
            return redirect()->route('compras.index');
        }else{
            $compra->surtida = true;
            $compra->fecha_surtida = $ldate;
            $user = Auth::user();
            $compra->id_empleado_creo = $user->id_empleado;
            $compra->save();
            $detalles = Compra_detalle::where('id_compra','=',$compra->id)->get();
            foreach ($detalles as $detalle) {
                $inventario = Inventario::where('id_producto','=',$detalle->id_producto)->first();
                $inventario->cantidad += $detalle->cantidad;
                $inventario->save();
            }
            Flash::success('¡ Su compra ha sido surtida con exito !');
            return redirect()->route('compras.index');
        }
    }

    public function prestore(Request $request){
        $result = $request::all();
        $id_productos = Input::get('id_producto');
        $cantidad = Input::get('cantidad');
        $descuento = Input::get('descuento');
        $all_productos = Producto::findMany($id_productos);
        $detalle = new Compra_detalle();
        $resumen = new Resumen_compra();
        $posicion = 0; 
        $detalles = array();
        $resumen_productos = array();
        foreach ($all_productos as $producto){
            if($cantidad[$posicion]>0){
                $detalle = new Compra_detalle();
                $detalle->id_producto = $producto->id;
                $detalle->nombre_producto = $producto->nombre;
                $detalle->precio = round($producto->costo,2);
                $detalle->cantidad = $cantidad[$posicion];
                $detalle->subtotal = round(($producto->costo * $cantidad[$posicion]),2);
                $detalle->descuento_porcentaje = $descuento[$posicion];
                $detalle->descuento_pesos = round((($detalle->subtotal * $descuento[$posicion]) / 100),2); 
                $detalle->iva = round((($detalle->subtotal * $producto->iva) / 100),2);
                $detalle->ieps = round((($detalle->subtotal * $producto->ieps) / 100),2);
                $detalle->total = round($detalle->subtotal - $detalle->descuento_pesos + $detalle->iva + $detalle->ieps,2);
                $resumen->cantidad += $detalle->cantidad;
                $resumen->descuento_porcentaje += $detalle->descuento_porcentaje;
                $resumen->descuento_pesos += $detalle->descuento_pesos;
                $resumen->subtotal += $detalle->subtotal;
                $resumen->iva += $detalle->iva;
                $resumen->ieps += $detalle->ieps;
                $resumen->total += $detalle->total;
                $detalles[] = $detalle;
            }
            $posicion++;
        }
        $datos_compra = new Compra($result);
        $fecha = date('Y-m-d H:i:s');
        //dd($resumen);
        $proveedor = Proveedor::find($datos_compra->id_proveedor);
        return view('layouts.compras.resumen')->with('fecha_compra',$fecha)->with('datos_compra',$datos_compra)->with('proveedor',$proveedor)->with('detalles',$detalles)->with('resumen',$resumen);
    }

    public function store(Request $request){
        /* Encabezado de compra */
        $result = $request::all();
        $compra = new Compra($result);
        $id_proveedor = Proveedor::where('nombre' , '=', $compra->id_proveedor)->first();
        $compra->id_proveedor = $id_proveedor->id;
        $compra->fecha_surtida = null;
        $compra->activo = true;
        $compra->surtida = false;
        $user = Auth::user();
        $compra->id_empleado_creo = $user->id_empleado;
        $compra->total_productos = Input::get('final_cantidad');
        $compra->descuento_porcentaje = Input::get('final_porcentaje');
        $compra->descuento_pesos = Input::get('final_pesos');
        $compra->subtotal = Input::get('final_subtotal');
        $compra->iva = Input::get('final_iva');
        $compra->ieps = Input::get('final_ieps');
        $compra->total = Input::get('final_total');
        $compra->tipo_pago = "Contado";
        $compra->save();
        /* Fin encabezado de compra */ 
        //dd($result);
        /* Detalles */
        $id_compra = $compra->id;
        $id_productos = Input::get('id_producto');
        $precio = Input::get('precio');
        $cantidad = Input::get('cantidad');
        $descuento_porcentaje = Input::get('descuento_porcentaje');
        $descuento_pesos = Input::get('descuento_pesos');
        $subtotal = Input::get('subtotal');
        $iva = Input::get('iva');
        $ieps = Input::get('ieps');
        $total = Input::get('total');
        $posicion=0;
        foreach ($id_productos as $producto) {
            //dd($producto);
            $compra_detalle = new Compra_detalle();
            $compra_detalle->id_producto = $producto;
            $compra_detalle->id_compra = $id_compra;
            $compra_detalle->precio = $precio[$posicion];
            $compra_detalle->cantidad = $cantidad[$posicion];
            $compra_detalle->descuento_porcentaje = $descuento_porcentaje[$posicion];
            $compra_detalle->descuento_pesos = $descuento_pesos[$posicion];
            $compra_detalle->subtotal = $subtotal[$posicion];
            $compra_detalle->iva = $iva[$posicion];
            $compra_detalle->ieps = $ieps[$posicion];
            $compra_detalle->total = $total[$posicion];
            $posicion++;
            //dd($compra_detalle);
            $compra_detalle->save();
        }
	    	Flash::success(' Su compra al proveedor ' . $id_proveedor->nombre .' se ha registrado con exito !');
	    	return redirect()->route('compras.index');
    }

    public function destroy($id){
    	$compra = Compra::find($id);
        if($compra->surtida == true){
            Flash::error('¡ Su compra no puede ser eliminada por que ya fue surtida !');
            return redirect()->route('compras.index');    
        }
        else{
        $compra->activo=0;
        $user = Auth::user();
        $compra -> id_empleado_creo  = $user->id_empleado;
        $compra->save();
        Flash::error('¡ Su compra ha sido eliminado con exito !');
        return redirect()->route('compras.index');    
        }
    }
}
