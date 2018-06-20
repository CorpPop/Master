
@section('content')
@extends('layouts.app')
{!! MaterializeCSS::include_full() !!}  
<div class="row" style="height:500px">
 
    
  <div class="slider">

    <ul class="slides">
     @foreach ($caruselu as $caruselu)
      <li style="height:500px">
        <img  src="{{url("/products/images/$caruselu->id.$caruselu->extension")}}"> <!-- random image -->
        <div class="caption center-align">
          <h3>{{ $caruselu->title }}</h3>
          <h5 class="light grey-text text-lighten-3">Lo mejor para tu diversion.</h5>
           <a class="btn" href="{{url('/products/'.$caruselu->id.'')}}" style="">{{ $caruselu->pricing }}</a>
        </div>
      </li>
      @endforeach
    </ul>

  </div>
  
</div>
     <!--<div class="parallax-container">
      <div class="parallax"><img  style="width:450px" src="{{asset('img/remote.jpg')}}"></div>
    </div>-->
   <H4 class="center">LO MEJOR DE AMERICAN BOATS</H4>
         <div class="row ">
  <div class="carousel">
  @foreach ($caruseld as $caruseld)
    <a class="carousel-item center" style="width:400px; height:450px" href="{{url('/products/'.$caruseld->id.'')}}"><img src="{{url("/products/images/$caruseld->id.$caruseld->extension")}}">COMPRAR AHORA</a>
    <!--<a class="carousel-item" style="width:420px;" href="#two!"><img src="{{asset('img/wake.jpg')}}"></a>
    <a class="carousel-item" style="width:420px;" href="#three!"><img src="{{asset('img/wake.jpg')}}"></a>
    <a class="carousel-item" style="width:420px;" href="#four!"><img src="{{asset('img/wake2.jpg')}}"></a>
    <a class="carousel-item" style="width:420px;" href="#five!"><img src="{{asset('img/wake2.jpg')}}"></a>-->
    @endforeach
   </div>
 </div>   
                                       <H4 class="center">LO NUEVO DE AMERICAN BOATS</H4>

   <div class="container">
  <div class="row">

    @foreach ($nuevo as $nuevo)
    
      <div class="card  col l3 m4 s6 offset-l1 " style="position:relative;">
        <div class="card-image">
          <img class="materialboxed" style="max-width: 100%; height: 150px;" data-caption="{{ $nuevo->title }}" src="{{url("/products/images/$nuevo->id.$nuevo->extension")}}"  >
          
        </div>
        <div class="card-content">
          <span  class="card-title" style="color:black; font-size: 1em;">{{ $nuevo->title }}</span>
        </div>
        @if(Auth::check()  && Auth::user()->type=="Admin")
    <div class="row">
    <div class="col l6 m6 s12"><a class="btn-small" style="background-color:#081d76" href="{{url('/products/'.$nuevo->id.'/edit')}}">Editar</a></div>
      <div class="col l6 m6 s12">
        @include('products.delete',['product' => $nuevo])
        </div>
    </div>
    @endif
        <div class="card-action">
          <a href="{{url('/products/'.$nuevo->id.'')}}" style="color:black">{{ $nuevo->pricing }}<i class="material-icons right boton">local_grocery_store</i></a>
        </div>
      </div>
      @endforeach

    </div>


<script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slider();
     $('.carousel').carousel();
  setInterval(function() {
    $('.carousel').carousel('next');
  }, 5000)
    $('.parallax').parallax();
  });


</script>

@endsection