	@extends('layouts.app')
	@section('title','Nuevo empleado')
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
   		<ol class="breadcrumb">
			<li class="active">Nuevo empleado</li>
		</ol>
    {!! Form::open(['route' => 'empleados.store', 'method'=> 'POST']) !!}
		<div class="form-group col-lg-6">
			{!! Form::label('nombre','Nombre') !!}
			{!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del empleado']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('apellido_paterno','Apellido Paterno') !!}
			{!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'required', 'placeholder' => 'Apellido Paterno']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('apellido_materno','Apellido Materno') !!}
			{!! Form::text('apellido_materno', null, ['class' => 'form-control', 'required', 'placeholder' => 'Apellido Materno']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('fecha_nacimiento','Fecha de nacimiento') !!}
			{!! Form::text('fecha_nacimiento', null, ['class' => 'form-control', 'required', 'placeholder' => 'Fecha de nacimiento']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('curp','Curp') !!}
			{!! Form::text('curp', null, ['class' => 'form-control', 'required', 'placeholder' => 'Curp']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('email','Correo electronico') !!}
		<div class="input-group">
			{!! Form::email('correo_electronico', null, ['class' => 'form-control', 'required', 'placeholder' => 'Correo electronico']) !!}
        <span class="input-group-addon" id="basic-addon2">@example.com</span>
		</div>
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('calle','Calle') !!}
			{!! Form::text('calle', null, ['class' => 'form-control', 'required', 'placeholder' => 'Calle']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('numero','Número') !!}
			{!! Form::text('numero', null, ['class' => 'form-control', 'required', 'placeholder' => 'Numero']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('colonia','Colonia') !!}
			{!! Form::text('colonia', null, ['class' => 'form-control', 'required', 'placeholder' => 'Colonia']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('codigo_postal','Codigo postal') !!}
			{!! Form::text('codigo_postal', null, ['class' => 'form-control', 'required', 'placeholder' => 'Codigo postal']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('municipio','Municipio') !!}
			{!! Form::text('municipio', null, ['class' => 'form-control', 'required', 'placeholder' => 'Municipio']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('estado','Estado') !!}
			{!! Form::text('estado', null, ['class' => 'form-control', 'required', 'placeholder' => 'Estado']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('pais','Pais') !!}
			{!! Form::text('pais', null, ['class' => 'form-control', 'required', 'placeholder' => 'Pais']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('telefono','Telefono') !!}
			{!! Form::text('telefono', null, ['class' => 'form-control', 'required', 'placeholder' => 'Telefono']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('usuario','Usuario') !!}
			{!! Form::text('usuario', null, ['class' => 'form-control', 'required', 'placeholder' => 'Usuario']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('contrasena','Contraseña') !!}
			{!! Form::text('contrasena', null, ['class' => 'form-control', 'required', 'placeholder' => 'Contraseña']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>	

		<!--
		<div class="form-group">
			{!! Form::label('password','Contraseña') !!}
			{!! Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => '********']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('type','Tipo') !!}
			{!! Form::select('type', ['' => 'Seleccione un nivel', 'member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>
		-->

	{!! Form::close() !!}
    </div>
	@stop    
