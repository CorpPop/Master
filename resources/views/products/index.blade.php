@extends("layouts.app")

@section("content")
{!! MaterializeCSS::include_full() !!}



<div class="center" style="height:100px">
</div>

<div class="row">
 <div class="container">
	<div id="menu">
	<ul id="nav" >
	    <li style="background-color:#cfcfd0"><a href="#">FILTRAR POR</a></li>
	    <li><a href="#">CATEGORIA</a>
	    <ul class="submenu">
              <li><a href="#">TABLAS</a></li>
              <li><a href="#">CHALECOS</a></li>
	          <li style="width:100%;box-shadow: 1px 1px 7px black;"><a class="right" href="">RESULTADOS()</a></li>
	</ul></li>

	    <li><a href="#">TALLA</a>
	<ul class="submenu">
              <li><a href="#">CHICA</a></li>
              <li><a href="#">MEDIANA</a></li>
              <li><a href="#">GRANDE</a></li>
	          <li style="width:100%;box-shadow: 1px 1px 7px black;"><a class="right" href="">RESULTADOS()</a></li>
	</ul>
	</li>
	    <li><a href="#">DEPORTE</a>
	<ul class="submenu">
	    <li><a href="#">WAKEBOARD</a></li>
	    <li style="width:100%;box-shadow: 1px 1px 7px black;"><a class="right" href="">RESULTADOS()</a></li>
	</ul>
</li>
</ul>
</div>
</div>
</div>

 @if(Auth::check()  && Auth::user()->type=="Admin")

 <div class="card-content" style="left: 100px; padding-left: 200px;"><a href="{{url('/products/create')}}" class="btn-large waves-effect waves-light red"><i class="material-icons left" >add</i></a>
 <div class="row"></div>
   <div class="row">
        <h7>Agregar mas productos</h7>
   </div>
 </div>
  
  
        @endif


<div class="container">
	<div class="row">

    @foreach ($products as $product )
    
      <div class="card  col l3 m4 s6 offset-l1 ">
        <div class="card-image">
          <img class="materialboxed" style="max-width: 100%; height: 150px;" data-caption="{{ $product->title }}" src="{{url("/products/images/$product->id.$product->extension")}}"  >
          
        </div>

        <div class="card-content">
          <span  class="card-title" style="color:black; font-size: 1em;">{{$product->title}}</span>
        </div>
        @if(Auth::check()  && Auth::user()->type=="Admin")
 		<div class="row">
 		<div class="col l6 m6 s12"><a class="btn-small" style="background-color:#081d76" href="{{url('/products/'.$product->id.'/edit')}}">Editar</a></div>
 			<div class="col l6 m6 s12">
		    @include('products.delete',['product' => $product])
		    </div>
 		</div>
 		@endif
        <div class="card-action">
          <a href="{{url('/products/'.$product->id.'')}}" style="color:black">{{ $product->pricing }}<i class="material-icons right boton">local_grocery_store</i></a>
        </div>
      </div>
      @endforeach

    </div>
      <div>
  	{{$products->links()}}
  </div>
  </div>

  
<script type="text/javascript">
	$(document).ready(function(){
    $('.materialboxed').materialbox();

function mainmenu(){ // Oculto los submenus 
$(" #nav ul ").css({display: "none"}); // Defino que submenus deben estar visibles cuando se pasa el mouse por encima 
$(" #nav li").hover(function(){   
	$(this).find('ul:first:hidden').css({visibility: "visible",display: "none"
             }).slideDown(400);},
	function(){       
		$(this).find('ul:first').slideUp(400);  
	  });} 
   
	mainmenu(); 
  });
</script>



<!--<div class="container">
	<table class="responsive-table">
		<thead>
			<tr>
				<td>ID</td>
				<td>Titulo</td>
				<td>Descripción</td>
				<td>Precio</td>
				<td>Acciones</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->title }}</td>
				<td>{{ $product->description }}</td>
				<td>{{ $product->pricing }}</td>
				<td>
					<a class="btn-large" href="{{url("/products/$product->id")}}">Ver</a>
					<a class="btn-large" href="{{url('/products/'.$product->id.'/edit')}}">Editar</a>
					<a class="btn-large red" href="{{url('/products/'.$product->id.'')}}">Buy</a>
					@include('products.delete',['product' => $product])
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>-->
@endsection