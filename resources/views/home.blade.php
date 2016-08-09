@extends('layouts.app')
@section('title','Notificaciones')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Notificaciones</div>
                    <div class="panel-body">
                        @if(!empty($notificaciones))
                        <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                                <tr>
                                    <th>Id producto</th>
                                    <th>Nombre</th>
                                    <th>Minimo inventario</th>
                                    <th>Existencias</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id producto</th>
                                    <th>Nombre</th>
                                    <th>Minimo inventario</th>
                                    <th>Existencias</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($notificaciones as $notificacion)
                            <tr>
                                <td> {{ $notificacion->id_producto }} </td>
                                <td> {{ $notificacion->nombre_producto }} </td>
                                <td> {{ $notificacion->minimo_inventario }} </td>
                                <td> {{ $notificacion->existencia }} </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            ¡Sin Notificaciones!
                        @endif                            
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
