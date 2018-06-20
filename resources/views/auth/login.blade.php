@extends('layouts.app')

@section('content')
 {!! MaterializeCSS::include_full() !!}
<div class="row"></div>

<div class="container">
    <div class="row" style="width:450px; display:inline-block;">
        <div class="col col l12 m1 s1 offset-l1">
        <div class="row">
        <div class="col col l6 m1 s1 offset-l1 center"><h5>INICIAR SESIÓN</h5></div></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col l4 m1 s4 col-form-label text-md-right">Correo Electrónico</label>
                              <div class="col l10 m1 s4">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col l6 m1 s6  col-form-label text-md-right">Contraseña</label>

                            <div class="col l10 s6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <!-- <div class="form-group row">
                            <div class="col l6 m1 s6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>-->

                        <div class="row ">
                         
                            <div class="col l6 m3 s8">
                                <a style="background-color:#081d76; width:210px" class="btn" href="{{ route('password.request') }}">
                                    Olvide mi contraseña
                                </a>
                            </div>
                        
            
                                <div class="col l2 m3 s3">
                                <button style="background-color:#081d76" type="submit" class="btn">
                                    INICIAR SESIÓN
                                </button>
                            </div>
                        </div>
                    </form>
                          
                </div>
        </div>
    </div>
    
    <div class="row dos" >
       <h5 class="">REGISTRARME</h5>
       <div class="row" >
       <div class="card-body" >
       <p align="justify">Crea una cuenta es fácil. Introduce tu dirección de correo electrónico, completa el formulario de la página siguiente y disfruta del contenido que hay en este sitio web.</p>
               <div class="row" style="position:relative;top:30px;right:40px;">
            <div class="col l2 m8 s12  right"> <a style="background-color:#081d76;" href="{{ url('/register') }}" class="btn ">
                                    REGISTRARSE
                                </a></div>
           </div>
        </div>
        </div>
           
    </div>

</div>





@endsection
