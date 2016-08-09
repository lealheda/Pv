	@extends('layouts.app')
	@section('title','Visualización compra')
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
			<li class="active"><h4>Visualización de compra</h4></li>
		</ol>
    {!! Form::open() !!}
		<div class="form-group col-lg-6">
			{!! Form::label('created_at','Fecha de compra') !!}
			{!! Form::text('created_at', $compra->created_at, ['class' => 'form-control', 'readonly' => 'readonly', 'required']) !!}
		
			{!! Form::label('id_proveedor','Proveedores') !!}
			{!! Form::text('id_proveedor', $compra->nombre_proveedor, ['class' => 'form-control', 'required', 'readonly' => 'readonly', ]) !!}

			{!! Form::label('numero_factura','Número de factura') !!}
			{!! Form::text('numero_factura', $compra->numero_factura, ['class' => 'form-control', 'required', 'placeholder' => 'Número de factura', 'readonly' => 'readonly']) !!}
		</div>

		<div class="form-group col-lg-6">
			{!! Form::label('fecha_surtida','Fecha surtida') !!}
			{!! Form::text('fecha_surtida', $compra->fecha_surtida, ['class' => 'form-control', 'readonly' => 'readonly', 'required', 'placeholder' => '']) !!}

			{!! Form::label('notas','Notas') !!}
			{!! Form::text('notas', $compra->notas, ['class' => 'form-control', 'placeholder' => '', 'readonly' => 'readonly']) !!}

			{!! Form::label('referencia','Referencias') !!}
			{!! Form::text('referencia', $compra->referencia, ['class' => 'form-control', 'placeholder' => 'Referencias', 'readonly' => 'readonly']) !!}
		</div>

		<h4>Resumen de productos</h4>

		<table id="table" class="display" cellspacing="0" width="100%">
		<thead>
	            <tr>
	            	<th>Id</th>
					<th>Nombre</th>
					<th>Costo</th>
					<th>Subtotal $</th>
					<th>Cantidad</th>
					<th>Descuento %</th>
					<th>Descuento $</th>
					<th>Iva $</th>
					<th>Ieps $</th>
					<th>Total $</th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	            	<th>Id</th>
					<th>Nombre</th>
					<th>Costo</th>
					<th>Cantidad</th>
					<th>Subtotal $</th>
					<th>Descuento %</th>
					<th>Descuento $</th>
					<th>Iva $</th>
					<th>Ieps $</th>
					<th>Total $</th>
	            </tr>
	        </tfoot>
	        <tbody>
	           @foreach($detalles as $detalle)
					<tr>
					<td> {{ $detalle->id_producto }} </td>
					<td> {{ $detalle->nombre_producto }} </td>
					<td> {{ $detalle->precio }} </td>
					<td> {{ $detalle->cantidad }} </td>
					<td> {{ $detalle->subtotal }} </td>
					<td> {{ $detalle->descuento_porcentaje }} </td>
					<td> {{ $detalle->descuento_pesos }} </td>
					<td> {{ $detalle->iva }} </td>
					<td> {{ $detalle->ieps }} </td>
					<td> {{ $detalle->total }} </td>
					</tr>
					@endforeach
						<td> Totales: </td>
						<td></td>
						<td></td>
						<td> {{ $resumen->cantidad }} </td>
						<td> {{ $resumen->subtotal }} </td>
						<td> {{ $resumen->descuento_porcentaje }} </td>
						<td> {{ $resumen->descuento_pesos }} </td>
						<td> {{ $resumen->iva }} </td>
						<td> {{ $resumen->ieps }} </td>
						<td> {{ $resumen->total }} </td>
				</tbody>
	    </table>	
	    <div class="form-group">
			<a href="{{ route('compras.index') }}" class="btn btn-info">Volver</a><hr>
		</div>
	{!! Form::close() !!}
    </div>
	@stop    
