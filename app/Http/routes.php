<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@home');

Route::get('/test', 'PdfController@test');

Route::group([], function(){
    Route::resource('empleados','EmpleadosController');
    Route::get('empleados/{id}/destroy',[
    	'uses' => 'EmpleadosController@destroy',
    	'as' => 'empleados.destroy'
    	]);
    });

Route::group([], function(){
    Route::resource('clientes','ClientesController');
    Route::get('clientes/{id}/destroy',[
    	'uses' => 'ClientesController@destroy',
    	'as' => 'clientes.destroy'
    	]);
    });

Route::group([], function(){
    Route::resource('proveedores','ProveedoresController');
    Route::get('proveedores/{id}/destroy',[
    	'uses' => 'ProveedoresController@destroy',
    	'as' => 'proveedores.destroy'
    	]);
    });

Route::group([], function(){
    Route::resource('productos','ProductosController');
    Route::get('productos/{id}/destroy',[
        'uses' => 'ProductosController@destroy',
        'as' => 'productos.destroy'
        ]);
    });

Route::group([], function(){
    Route::resource('compras','ComprasController');
    Route::get('compras/{id}/destroy',[
        'uses' => 'ComprasController@destroy',
        'as' => 'compras.destroy'
        ]);
    Route::post('compras/prestore',[
        'uses' => 'ComprasController@prestore',
        'as' => 'compras.prestore'
        ]);
    Route::get('compras/{id}/view',[
        'uses' => 'ComprasController@view',
        'as' => 'compras.view'
        ]);
    Route::get('compras/{id}/pdf',[
        'uses' => 'ComprasController@pdf',
        'as' => 'compras.pdf'
        ]);
    Route::get('compras/{id}/update',[
        'uses' => 'ComprasController@update',
        'as' => 'compras.update'
        ]);
    });
    
    Route::group([], function(){
    Route::resource('inventarios','InventariosController');
    Route::get('inventarios/{id}/destroy',[
        'uses' => 'InventariosController@destroy',
        'as' => 'inventarios.destroy'
        ]);
    });

Route::group([], function(){
    Route::resource('ventas','VentasController');
    Route::get('ventas/{id}/destroy',[
        'uses' => 'VentasController@destroy',
        'as' => 'ventas.destroy'
        ]);
    Route::post('ventas/prestore',[
        'uses' => 'VentasController@prestore',
        'as' => 'ventas.prestore'
        ]);
    Route::get('ventas/{id}/view',[
        'uses' => 'VentasController@view',
        'as' => 'ventas.view'
        ]);
    Route::get('ventas/{id}/pdf',[
        'uses' => 'VentasController@pdf',
        'as' => 'ventas.pdf'
        ]);
    Route::get('ventas/{id}/update',[
        'uses' => 'VentasController@update',
        'as' => 'ventas.update'
        ]);
    });