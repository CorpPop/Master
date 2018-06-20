@extends("layouts.app")

@section("content")	
 {!! MaterializeCSS::include_full() !!}
<div class="row" style="height:90px"></div>
<div class="row" style="background-color:black; top:90px; height:500px;">
<div id="gallery">
	<div id="gallery_output" style="position:relative; top:40px; left:90px">
		<img class="materialboxed" data-caption="" style="width:500px; height:400px; "  id="img1" src="{{url("/products/images/$product->id.$product->extension")}}" />
		<img class="materialboxed" data-caption="" style="width:500px; height:400px; "  id="img2" src="{{url("/products/images/$product->id.a.$product->extension")}}" />		
		<img class="materialboxed" data-caption="" style="width:500px; height:400px; " id="img3" src="{{url("/products/images/$product->id.b.$product->extension")}}" />
		<img class="materialboxed" data-caption="" style="width:500px; height:400px; " id="img4" src="{{url("/products/images/$product->id.c.$product->extension")}}" />	
		</div>
 <div id="gallery_nav" style="width:50px; position:absolute; top:300px">
		<a rel="img1" href="javascript:;"><img src="{{url("/products/images/$product->id.$product->extension")}}"  width="80" height="80" /></a>
		<a rel="img2" href="javascript:;"><img src="{{url("/products/images/$product->id.a.$product->extension")}}"  width="80" height="80" /></a>
		<a rel="img3" href="javascript:;"><img src="{{url("/products/images/$product->id.b.$product->extension")}}"  width="80" height="80" /></a>
		<a rel="img4" href="javascript:;"><img src="{{url("/products/images/$product->id.c.$product->extension")}}" width="80" height="80"  /></a>
	</div>
	<div class="clear"></div>
</div>
</div>
 <div class="container" >
 	<div class="card producto col col l12 m1 s1 offset-l1" style="width:400px; top:190px; height:525px;position:absolute; right: 40px; display:inline-block; ">
 		<div class="row">

      <!-- {!! Form::open(['url' => '/carrito','method' => 'POST','class'=> 'col s12 center card-body','style'=>'']) !!} -->
 			<!--<div class="col s6 m6 ">
 				@if($product->extension)
 					<img class="product-avatar" src="{{url("/products/images/$product->id.$product->extension")}}">
 				@endif
 			</div>-->
 			<div class="container">
 			<div class="col l12 m4 s12">
 			     <div class="row"> 
            <div class="col l12 m4 s12 ">
            <!-- {{ Form::text('title',$product->title,['class' => 'form-control','id'=>'numero','placeholder'=>'Ingrese titulo...'])}}
            @foreach ($product1 as $product1) -->
 			     <h5 style="font-size:2em;">{{$product1->title}}</h5>
           <!-- @endforeach -->
 			     </div></div>
 			    

          <div class="row">
          <p class="col l6 s12">
             <strong>Descripcion:</strong> {{$product->description}}
          </p>
              <p style="color: red;">
               <!-- " {{$product->description}}" -->
                 <!-- <div class="form-control">{{$product->description}}<div> -->
              </p>
              <div class="input-field col l6 m3 s12">
               {{ Form::hidden('descripcion',$product->id,['class' => 'form-control','id'=>'cantidad','placeholder'=>'Ingrese cantidad']) }}
                  <!-- <label for="numero">{{$product->description}}</label> -->

              </div>
          </div>

 			     <div class="row">
 			     	<p class="col l6 s12">
 					    <strong>Costo</strong>
 			    	</p>
 				      <p class="col l6 s12" style="color: red;">
 				       	${{$product->pricing}}
 			    	</p>
 			     </div>
          

 			<div class="row">
 				<p class="col l3 s12">
 					@include('in_shopping_carts.form',['product' => $product,'tiket' => $tiket, 'warehouse' => $warehouse, 'warehouse1' => $warehouse1])
 				</p>
 			</div>
      @if(Auth::check() && $product->user_id == Auth::user()->id)
    <div class="row" style="position:relative;">
    <div class="col l6 m6 s12"><a class="btn-small" style="background-color:#081d76" href="{{url('/products/'.$product->id.'/edit')}}">Editar</a></div>
      <div class="col l6 m6 s12">
        @include('products.delete',['product' => $product])
        </div>
           

    </div>
    @endif
    <!-- <input type="submit" name="" style="background-color:#081d76" value="Enviar" class="btn"> -->
 			</div>
</div>
 {!! Form::close() !!}
 		</div>
 	</div>
 </div>
<div class="row">
        <div class="col l12 m2 s12"><h5 class="center">DESCRIPCIÓN DEL PRODUCTO</h5></div>
      
      <div class="row">
        <div class="container">
          <div class="col l6 s12" align="justify">
               <li>{{$product->description}}</li> 
          </div>          
        </div>
      </div>
</div> 
<div class="parallax-container">
      <div class="parallax"><img  style="width:450px" src="{{asset('img/paralax2.jpg')}}"></div>
    </div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#gallery_output img').not(':first').hide();
			$('#gallery a').click(function() {
				if ( $('#' + this.rel).is(':hidden') ) {
				$('#gallery_output img').slideUp();
				$('#' + this.rel).slideDown();
			}
		});
     $('.parallax').parallax();
			$('select').formSelect();
        $('.materialboxed').materialbox();
        $('.carousel').carousel();
  setInterval(function() {
    $('.carousel').carousel('next');
  }, 5000)
	});
</script>
@endsection