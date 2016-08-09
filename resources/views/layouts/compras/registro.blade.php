	@extends('layouts.app')
	@section('title','Nueva compra')
	@section('content')

    <div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
		<ol class="breadcrumb">
			<li class="active"><h4>Nueva compra</h4></li>
		</ol>
    {!! Form::open(['route' => 'compras.prestore', 'method'=> 'POST']) !!}
		<div class="form-group col-lg-6">
			{!! Form::label('created_at','Fecha de compra') !!}
			{!! Form::text('created_at', $fecha_compra, ['class' => 'form-control', 'readonly' => 'readonly', 'required']) !!}
		
			{!! Form::label('id_proveedor','Proveedores') !!}
			{!! Form::select('id_proveedor', $proveedores, null, ['class' => 'form-control', 'required']) !!}

			{!! Form::label('numero_factura','Número de factura') !!}
			{!! Form::text('numero_factura', null, ['class' => 'form-control', 'required', 'placeholder' => 'Número de factura']) !!}
		</div>

		<div class="form-group col-lg-6">
			{!! Form::label('fecha_surtida','Fecha surtida') !!}
			{!! Form::text('fecha_surtida', '', ['class' => 'form-control', 'readonly' => 'readonly','required', 'placeholder' => '']) !!}

			{!! Form::label('notas','Notas') !!}
			{!! Form::text('notas', null, ['class' => 'form-control', 'placeholder' => 'Ingrese alguna nota']) !!}

			{!! Form::label('referencia','Referencias') !!}
			{!! Form::text('referencia', null, ['class' => 'form-control', 'placeholder' => 'Referencias']) !!}
		</div>

		<h4>Catalogo de productos</h4>

		<table id="table" class="display" cellspacing="0" width="100%">
		<thead>
	            <tr>
	            	<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Costo $</th>
					<th>Cantidad</th>
					<th>Iva %</th>
					<th>Ieps %</th>
					<th>Descuento %</th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	            	<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Costo $</th>
					<th>Cantidad</th>
					<th>Iva %</th>
					<th>Ieps %</th>
					<th>Descuento %</th>
	            </tr>
	        </tfoot>
	        <tbody>
	           @foreach($productos as $producto)
					<tr>
						<td> {{ Form::text('id_producto[]', $producto->id, ['class' => 'form-control', 'required', 'readonly' => 'readonly']) }} </td>
						<td> {{ $producto->nombre }} </td>
						<td> {{ $producto->descripcion }} </td>
						<td> {{ $producto->costo }} </td>
						<td> 
						{!! Form::number('cantidad[]', 0, ['class' => 'form-control', 'required']) !!} 
						</td>
						<td> {{ $producto->iva }} </td>
						<td> {{ $producto->ieps }} </td>
						<td> 
						{!! Form::number('descuento[]', 0, ['class' => 'form-control', 'required', 'min' => '0.00', 'step' => 'any']) !!} 
						</td>
					</tr>
					@endforeach
				</tbody>
	    </table>	

	    <div class="form-group">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary', 'onClick'=>'return validateCantidad()']) !!}
		</div>
	{!! Form::close() !!}
    </div>
	@stop    
