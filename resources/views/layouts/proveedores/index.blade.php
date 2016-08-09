@extends('layouts.app')
	@section('title','Lista de proveedores')
	@section('content')
	<br>
	<div class="container">
	@include('flash::message')
    	<ol class="breadcrumb">
			<li class="active"><h4>Proveedores</h4></li>
		</ol>
	<a href="{{ route('proveedores.create') }}" class="btn btn-info">Registrar nuevo proveedor</a><hr>
	<table id="table" class="display" cellspacing="0" width="100%">
	<thead>
            <tr>
                <th>Id</th>
				<th>Nombre</th>
				<th>Rfc</th>
				<th>Municipio</th>
				<th>Acciones</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
             	<th>Id</th>
				<th>Nombre</th>
				<th>Rfc</th>
				<th>Municipio</th>
				<th>Acciones</th>
            </tr>
        </tfoot>
        <tbody>
           @foreach($proveedores as $proveedor)
				<tr>
					<td> {{ $proveedor->id }} </td>
					<td> {{ $proveedor->nombre }} </td>
					<td> {{ $proveedor->rfc }} </td>
					<td> {{ $proveedor->municipio }} </td>
					<td>
					<a href="{{ route('proveedores.edit', $proveedor->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true" title="Editar"></span></a>
					<a href="{{ route('proveedores.destroy',$proveedor->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>
				@endforeach
			</tbody>
    </table>
		</div>
	@endsection