<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Producto;
use App\Inventario;
use App\Notificaciones;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::where('activo','=', 1)->get();
        $notificaciones = array();
        foreach ($productos as $producto) {
            $inventario = Inventario::where('id_producto','=', $producto->id)->first();
            if($producto->minimo_inventario>$inventario->cantidad){
                $notificacion = new Notificaciones();
                $notificacion->id_producto = $producto->id;
                $notificacion->nombre_producto = $producto->nombre;
                $notificacion->minimo_inventario = $producto->minimo_inventario;
                $notificacion->existencia = $inventario->cantidad;
                $notificaciones[] = $notificacion;
            }
        }
        return view('home')->with('notificaciones',$notificaciones);
    }

    public function home()
    {
        return view('welcome');
    }
}
