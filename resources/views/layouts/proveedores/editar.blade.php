@extends('layouts.app')
	@section('title','Editar proveedor')
	@section('content')
    <div class="container">
    <hr>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
    <p class="">Editar proveedor</p>

    {!! Form::open(['route' => ['proveedores.update', $proveedor], 'method'=> 'PUT']) !!}
		<div class="form-group col-lg-6">
			{!! Form::label('nombre','Nombre') !!}
			{!! Form::text('nombre', $proveedor->nombre, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('rfc','Rfc') !!}
			{!! Form::text('rfc', $proveedor->rfc, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('telefono','Telefono') !!}
			{!! Form::text('telefono', $proveedor->telefono, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('email','Correo electronico') !!}
		<div class="input-group">
			{!! Form::email('correo_electronico', $proveedor->correo_electronico, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
        <span class="input-group-addon" id="basic-addon2">@example.com</span>
		</div>
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('calle','Calle') !!}
			{!! Form::text('calle', $proveedor->calle, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('numero','Número') !!}
			{!! Form::text('numero', $proveedor->numero, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('colonia','Colonia') !!}
			{!! Form::text('colonia', $proveedor->colonia, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('codigo_postal','Codigo postal') !!}
			{!! Form::text('codigo_postal', $proveedor->codigo_postal, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('municipio','Municipio') !!}
			{!! Form::text('municipio', $proveedor->municipio, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('estado','Estado') !!}
			{!! Form::text('estado', $proveedor->estado, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('pais','Pais') !!}
			{!! Form::text('pais', $proveedor->pais, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
		</div>	


	{!! Form::close() !!}
    </div>
	@stop    
