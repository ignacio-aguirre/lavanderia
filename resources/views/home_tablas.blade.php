@extends('layouts.app')
@section('content')
<?php  if($usua->tipo==1) echo "<script> navega('/error_noautorizado')</script>";?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menú Tablas</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   <ul class="list-group">
                    <li class="list-group-item" onclick="n_tb_pr()">Proveedores</li>
                    <li class="list-group-item" onclick="n_tb_cn()">Conceptos</li>
                    <li class="list-group-item" onclick="n_tb_user()">Usuarios</li>
                    <li class="list-group-item" onclick="navega('/efectores/importar')">Importar Efectores</li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
