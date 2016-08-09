	@extends('layouts.app')
	@section('title','Inventario')
	@section('content')
	<br>
	<div class="container">
	@include('flash::message')
    	<ol class="breadcrumb">
			<li class="active"><h4>Inventario de productos</h4></li>
		</ol>
	<a href="{{ route('inventarios.create') }}" class="btn btn-info">Movimientos de almacen</a><hr>
	<table id="table" class="display" cellspacing="0" width="100%">
	<thead>
            <tr>
                <th>Id</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Existencia</th>
				<th>Categoria</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
             	<th>Id</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Existencia</th>
				<th>Categoria</th>
            </tr>
        </tfoot>
        <tbody>
           @foreach($inventarios as $inventario)
				<tr>
					<td> {{ $inventario->id_producto }} </td>
					<td> {{ $inventario->nombre }} </td>
					<td> {{ $inventario->descripcion }} </td>
					<td> {{ $inventario->cantidad }} </td>
					<td> {{ $inventario->categoria }} </td>
				</tr>
				@endforeach
			</tbody>
    	</table>
	</div>
	@endsection