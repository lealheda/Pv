	@extends('layouts.app')
	@section('title','Resumen compra')
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
			<li class="active"><h4>Resumen de compra</h4></li>
		</ol>
    {!! Form::open(['route' => 'compras.store', 'method'=> 'POST']) !!}
		<div class="form-group col-lg-6">
			{!! Form::label('created_at','Fecha de compra') !!}
			{!! Form::text('created_at', $fecha_compra, ['class' => 'form-control', 'readonly' => 'readonly', 'required']) !!}
		
			{!! Form::label('id_proveedor','Proveedores') !!}
			{!! Form::text('id_proveedor', $proveedor->nombre, ['class' => 'form-control', 'required', 'readonly' => 'readonly', ]) !!}

			{!! Form::label('numero_factura','Número de factura') !!}
			{!! Form::text('numero_factura', $datos_compra->numero_factura, ['class' => 'form-control', 'required', 'placeholder' => 'Número de factura', 'readonly' => 'readonly']) !!}
		</div>

		<div class="form-group col-lg-6">
			{!! Form::label('fecha_surtida','Fecha surtida') !!}
			{!! Form::text('fecha_surtida', '', ['class' => 'form-control', 'readonly' => 'readonly', 'required', 'placeholder' => '']) !!}

			{!! Form::label('notas','Notas') !!}
			{!! Form::text('notas', $datos_compra->notas, ['class' => 'form-control', 'placeholder' => '', 'readonly' => 'readonly']) !!}

			{!! Form::label('referencia','Referencias') !!}
			{!! Form::text('referencia', $datos_compra->referencia, ['class' => 'form-control', 'placeholder' => 'Referencias', 'readonly' => 'readonly']) !!}
		</div>

		<h4>Resumen de productos</h4>

		<table id="table" class="display" cellspacing="0" width="100%">
		<thead>
	            <tr>
	            	<th>Id</th>
					<th>Nombre</th>
					<th>Costo</th>
					<th>Cantidad</th>
					<th>Subtotal $</th>
					<th>Descuento porcentaje %</th>
					<th>Descuento pesos $</th>
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
					<th>Descuento porcentaje %</th>
					<th>Descuento pesos $</th>
					<th>Iva $</th>
					<th>Ieps $</th>
					<th>Total $</th>
	            </tr>
	        </tfoot>
	        <tbody>
	           @foreach($detalles as $detalle)
					<tr>
					<td> {{ Form::number('id_producto[]', $detalle->id_producto, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

					<td> {{ Form::text('nombre_producto[]', $detalle->nombre_producto, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

					<td> {{ Form::number('precio[]', $detalle->precio, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

					<td> {{ Form::number('cantidad[]', $detalle->cantidad, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

					<td> {{ Form::number('subtotal[]', $detalle->subtotal, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

					<td> {{ Form::number('descuento_porcentaje[]', $detalle->descuento_porcentaje, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

					<td> {{ Form::number('descuento_pesos[]', $detalle->descuento_pesos, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

					<td> {{ Form::number('iva[]', $detalle->iva, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

					<td> {{ Form::number('ieps[]', $detalle->ieps, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

					<td> {{ Form::number('total[]', $detalle->total, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

					</tr>
					@endforeach
						<td> Totales: </td>
						<td></td>
						<td></td>
						<td> {{ Form::number('final_cantidad', $resumen->cantidad, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

						<td> {{ Form::number('final_subtotal', $resumen->subtotal, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

						<td> {{ Form::number('final_porcentaje', $resumen->descuento_porcentaje, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

						<td> {{ Form::number('final_pesos', $resumen->descuento_pesos, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

						<td> {{ Form::number('final_iva', $resumen->iva, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

						<td> {{ Form::number('final_ieps', $resumen->ieps, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>

						<td> {{ Form::number('final_total', $resumen->total, ['class' => 'form-control', 'required', 'readonly' => 'readonly' ]) }} </td>
				</tbody>
	    </table>	
	    <div class="form-group">
			{!! Form::submit('Confirmar', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
    </div>
	@stop    
