<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('title', 'AmericanBoats') }}</title>
    {!! MaterializeCSS::include_full() !!}
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css/materialicons.css') }}">
    <!-- <script src="{{ url('css/materialicons.css') }}"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

</head>

<body>
<div class="nav-content navses">
         <ul class=" right personsize">
          @if(Auth::check())
          <li id="btnlogin" ><a class="sti" href="{{ url('login') }}">
            <!-- {{Auth::user()->email}}INICIAR SESIÒN  -->
        
              
              {{Auth::user()->email}} / <a class="sti" href="">Salir<i class="material-icons right" >exit_to_app</i> </a> 
             
      
          </a></li>
            
           @else
            <li id="btnlogin" ><a class="sti" href="{{ url('login') }}"><i class="material-icons right" >person</i>INICIAR SESIÓN</a></li>
            @endif  
          </ul>
        </div>

          <nav>
    <div class="nav-wrapper navpr">
       <a href="{{ url('/') }}"><img class="imglog brand-logo" src="{{asset('img/logo.jpg')}}"></a>
          <ul class="left titulos" >
                <li><a href="{{ url('/') }}" >Inicio<i class="material-icons left">home</i></a></li>
                <li><a href="{{ url('products') }}" >Productos</a></li>
                <li><a href="{{ url('catalogo') }}">Catálogo</a></li>
                 @if(Auth::check()  && Auth::user()->type=="Admin")
                <li style="background-color:black;box-shadow:3px 2px 10px white;"> <a  href="{{ url('warehouses/create') }}">Almacén</a>
                  </li>
                @endif
                 
                 @if(Auth::check()  && Auth::user()->type=="Admin")
                <li style="background-color:black;box-shadow:3px 2px 10px white;"> <a  href="{{ url('/orders') }}">Ordenes</a>
                  </li>
                @endif
           </ul>
               <ul class="auto">
                 <li>
                   <div class="input-field">
                    <i class="material-icons prefix">search</i>
          <input type="text" style="color:black; background-color:white; height:25px; " id="autocomplete-input" class="autocomplete">
                  </div>
                </li>
                 <li><a href="{{url('/carrito')}}" >
                  <i class="material-icons right boton" style="color:white">local_mall</i>
                 <h6 class="n center" style="color: black">{{$productsCount}}</h6></a>   
                </li>
              </ul>
      </div>
    </div>
  </nav>


        <main class="py-4">
            @yield('content')
             <!-- <script src="{{ url('js/app.js') }}"></script> -->
        </main>
  
               <footer class="page-footer " id="cfft"">
                <div class="container">
            <div class="row">
              <div class="col l4 s12" style="color:white; font-weight:bold;">
                <h7 class="white-text">DIRECCIÓN</h7><br>
                <a style="color:white;">Ruta del Bosque 17-1</a> <br>
                <a style="color:white;">El Coporito</a><br>
                <a style="color:white;">Valle de Bravo, Estado de México</a><br>
                <a style="color:white;">CP 51200</a>
              </div>
               <div class="col l5 s12" style="color:white; font-weight:bold;">
                <h7 class="white-text">CONTACTO</h7><br>
                <a style="color:white;">TEL: 7224251361</a><br>
                <a style="color:white;">EMAIL: americanboatsmx@gmail.com</a>
              </div>
              
            </div>
          </div>
                    <div class="footer-copyright" style="background-color:#2f2f2f;">
                      <div class="container">
                      © American Boats - Todos los derechos reservados. 2018 - <a href="{{ url('politicas') }}">Politicas de privacidad</a>
                       <!--<a class="grey-text text-lighten-4 right" href="#!">More Links</a>-->
                      </div>
                    </div>
                  </footer>
        
      <script type="text/javascript">
        $('input.autocomplete').autocomplete({        
 
        data: {
"hola":null,         },
        limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
        onAutocomplete: function(val) {
          // Callback function when value is autcompleted.
        },
        minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
      });
      </script>
    <script src="{{ asset('/js/app1.js') }}"></script>
</body>
</html>
