@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Módulo Lavandería</div>
                  
                        
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   <ul class="list-group">
                    <li class="list-group-item" onclick="navega('/salida/nueva')">Registrar Salidas</li>
                    <li class="list-group-item" onclick="navega('entrada/nueva')">Registrar Entradas</li>
                    <li class='list-group-item' onclick="n_ho_tb()">Tablas</li>
                    
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
