@extends('layouts.app')

@section('content')
<div style="height:100px"></div>
<div class="container">
    <div class="row" style="width:450px;display:inline-block">
        <div class="col col l12 m1 s1 offset-l1">
        <div class="row">
        <div class="left"><h5>TUS DATOS</h5></div></div>
                <div class="card-body">
                   <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form">
                            <label for="name" class="col l6" >Nombre</label>

                            <div class="col 16">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="row">
        <div class="left"><h5>DATOS DE INICIO DE SESIÓN</h5></div></div>
                        <div class="form">
                            <label for="email" class="col l12">Correo electrónico</label>

                            <div class="col l12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form ">
                            <label for="password" class="col l12">Contraseña</label>

                            <div class="col 12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form">
                            <label for="password-confirm" class="col l6">Confirma la contraseña</label>

                            <div class="col l12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="row"></div>

                        <div class="row">
                          <div class="form">
                            <div class="col l5  right">
                                <div class="row"> 
                                <button style="background-color:#081d76" type="submit" class="btn btn-primary">
                                   Registrarme
                                </button>
                                </div>
                            </div>
                        </div>
                      </div>
                        
                    </form>
                </div>
        </div>
    </div>
    </div>
<div style="height:50px"></div>
@endsection
