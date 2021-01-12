@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Nuevo Usuario</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Apellido, Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cuil') ? ' has-error' : '' }}">
                            <label for="cuil" class="col-md-4 control-label">Cuil</label>

                            <div class="col-md-6">
                                <input id="cuil" type="text" class="form-control" name="cuil" id="cuil" value="{{ old('cuil') }}" onblur="vCuit(this.id)"required autofocus>

                                @if ($errors->has('cuil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cuil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmación</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <select id="tipo" class="form-control" name="tipo" required>
                                    <option value=1>Efector</option>
                                    <option value=2>Dirección</option>
                                    <option value=3>Administrador</option>
                                </select>                           
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Estructura a la que Pertenece</label>
                            <div class="col-md-6">
                                <select class="form-control" name="estructura_id" id="estructura_id" required autofocus>
                                </select>
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='js/infra.js'></script>
<script>
    //provisorio
    document.getElementById("estructura_id").innerHTML='<option value=1>A definir</option>';  
</script>
@endsection
