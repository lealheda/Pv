	@extends('layouts.app')
	@section('title','Lista de empleados')
	@section('content')
	<br>
	<div class="container">
	@include('flash::message')
    	<ol class="breadcrumb">
			<li class="active"><h4>Empleados</h4></li>
		</ol>
	<a href="{{ route('empleados.create') }}" class="btn btn-info">Registrar nuevo empleado</a><hr>
	<table id="table" class="display" cellspacing="0" width="100%">
	<thead>
            <tr>
                <th>Id</th>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Acciones</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Acciones</th>
            </tr>
        </tfoot>
        <tbody>
           @foreach($empleados as $empleado)
				<tr>
					<td> {{ $empleado->id }} </td>
					<td> {{ $empleado->nombre }} </td>
					<td> {{ $empleado->apellido_paterno }} </td>
					<td> {{ $empleado->apellido_materno }} </td>
					<td>
					<a href="{{ route('empleados.edit', $empleado->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true" title="Editar"></span></a>
					<a href="{{ route('empleados.destroy',$empleado->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>
				@endforeach
			</tbody>
    </table>
		</div>
	@endsection