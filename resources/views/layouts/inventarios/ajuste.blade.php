	@extends('layouts.app')
	@section('title','Ajuste')
	@section('content')
	<br>
	<div class="container">
	 @if (count($error) > 0)
    <div class="alert alert-danger">
        <ul>
                <li>{{ $error }}</li>
        </ul>
    </div>
	@endif
	@include('flash::message')
    	<ol class="breadcrumb">
			<li class="active"><h4>Ajuste de inventario</h4></li>
		</ol>
	{!! Form::open(['route' => 'inventarios.store', 'method'=> 'POST', 'name'=>'form_ajuste']) !!}
		<div class="form-group col-lg-6">
			{!! Form::label('fecha','Fecha') !!}
			{!! Form::text('fecha', date('Y-m-d'), ['class' => 'form-control', 'readonly' => 'readonly', 'required']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('motivo','Motivo de ajuste') !!}
			{!! Form::text('motivo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese un motivo', 'required']) !!}
		</div>
	<table id="table" class="display" cellspacing="0" width="100%">
	<thead>
            <tr>
                <th>Id</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Existencia</th>
				<th>Ajuste</th>
				<th>Categoria</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
             	<th>Id</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Existencia</th>
				<th>Ajuste</th>
				<th>Categoria</th>
            </tr>
        </tfoot>
        <tbody>
           @foreach($inventarios as $inventario)
				<tr>
					<td> {!! Form::text('id_producto[]', $inventario->id_producto, ['class' => 'form-control', 'required', 'readonly' => 'readonly']) !!} </td>
					<td> {{ $inventario->nombre }} </td>
					<td> {{ $inventario->descripcion }} </td>
					<td> {!! Form::number('existencia[]', $inventario->cantidad, ['class' => 'form-control', 'required', 'readonly' => 'readonly']) !!} </td>
					<td> {{ Form::number('ajuste[]', $inventario->cantidad, ['class' => 'ajuste', 'id'=>'ajuste','required']) }} </td>
					<td> {{ $inventario->categoria }} </td>
				</tr>
				@endforeach
			</tbody>
    	</table>
    	<div class="form-group">
			{!! Form::submit('Ajustar', ['class' => 'btn btn-primary', 'onClick'=>'return validateAjuste()'])!!}
		</div>
	{!! Form::close() !!}
	</div>
	@endsection