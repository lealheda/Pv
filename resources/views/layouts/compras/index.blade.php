@extends('layouts.app')
	@section('title','Lista de compras')
	@section('content')
	<br>
	<div class="container">
	@include('flash::message')
    	<ol class="breadcrumb">
			<li class="active"><h4>Compras</h4></li>
		</ol>
	<a href="{{ route('compras.create') }}" class="btn btn-info">Registrar nueva compra</a><hr>
	<table id="table" class="display" cellspacing="0" width="100%">
	<thead>
            <tr>
                <th>Id</th>
				<th>Proveedor</th>
				<th>Fecha de compra</th>
				<th>Surtida</th>
				<th>Fecha surtida</th>
				<th># factura</th>
				<th>Acciones</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
             	<th>Id</th>
				<th>Proveedor</th>
				<th>Fecha de compra</th>
				<th>Surtida</th>
				<th>Fecha surtida</th>
				<th># factura</th>
				<th>Acciones</th>
            </tr>
        </tfoot>
        <tbody>
           @foreach($compras as $compra)
				<tr>
					<td> {{ $compra->id }} </td>
					<td> {{ $compra->nombre_proveedor }} </td>
					<td> {{ $compra->created_at }} </td>
					<td> 
					@if($compra->surtida==false)
							No surtida
						@else
							Surtida
						@endif
					</td>
					<td> 
						@if($compra->fecha_surtida==null)
							NA
						@else
							{{ $compra->fecha_surtida }}		
						@endif
					 </td>
					<td> {{ $compra->numero_factura }} </td>
					<td>
					<a href="{{ route('compras.view', $compra->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true" title="Visualizar"></span></a>
					<a href="{{ route('compras.pdf', $compra->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-save-file" aria-hidden="true" title="Pdf"></span></a>
					<a href="{{ route('compras.update', $compra->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-plane" aria-hidden="true" title="Surtir"></span></a>
					<a href="{{ route('compras.destroy',$compra->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>
				@endforeach
			</tbody>
    </table>
		</div>
	@endsection