@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="width:500px;">
        <div class="col col l12 m1 s1 offset-l1">
        <div class="row">
        <div class="left"><h5>Restaurar Contraseña</h5></div></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                          <div class=" row">
                            <label for="email" class="col l4 m1 s4">Correo Electronico</label>
                              <div class="col l10 m1 s4">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="row ">
                         
                            <div class="col l6 m3 s8 right">
                                <a style="background-color:#081d76; width:210px" type="submit" class="btn btn-primary">
                                    Enviar contraseña
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
