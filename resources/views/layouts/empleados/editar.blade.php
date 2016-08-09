	@extends('layouts.app')
	@section('title','Editar empleado')
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
    <p class="">Editar empleado</p>

    {!! Form::open(['route' => ['empleados.update', $empleado], 'method'=> 'PUT']) !!}
		<div class="form-group col-lg-6">
			{!! Form::label('nombre','Nombre') !!}
			{!! Form::text('nombre', $empleado->nombre, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('apellido_paterno','Apellido Paterno') !!}
			{!! Form::text('apellido_paterno', $empleado->apellido_paterno, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('apellido_materno','Apellido Materno') !!}
			{!! Form::text('apellido_materno', $empleado->apellido_materno, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('fecha_nacimiento','Fecha de nacimiento') !!}
			{!! Form::text('fecha_nacimiento', $empleado->fecha_nacimiento, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('curp','Curp') !!}
			{!! Form::text('curp', $empleado->curp, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('email','Correo electronico') !!}
		<div class="input-group">
			{!! Form::email('correo_electronico', $empleado->correo_electronico, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
        <span class="input-group-addon" id="basic-addon2">@example.com</span>
		</div>
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('calle','Calle') !!}
			{!! Form::text('calle', $empleado->calle, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('numero','Número') !!}
			{!! Form::text('numero', $empleado->numero, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('colonia','Colonia') !!}
			{!! Form::text('colonia', $empleado->colonia, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('codigo_postal','Codigo postal') !!}
			{!! Form::text('codigo_postal', $empleado->codigo_postal, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('municipio','Municipio') !!}
			{!! Form::text('municipio', $empleado->municipio, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('estado','Estado') !!}
			{!! Form::text('estado', $empleado->estado, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('pais','Pais') !!}
			{!! Form::text('pais', $empleado->pais, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('telefono','Telefono') !!}
			{!! Form::text('telefono', $empleado->telefono, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('usuario','Usuario') !!}
			{!! Form::text('usuario', $usuario->name, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group col-lg-6">
			{!! Form::label('contrasena','Contraseña') !!}
			{!! Form::text('contrasena', $usuario->password, ['class' => 'form-control', 'required', 'placeholder' => '']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
		</div>	

	{!! Form::close() !!}
    </div>
	@stop    
