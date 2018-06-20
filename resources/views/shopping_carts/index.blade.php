@extends("layouts.app")
@section("content")


<div class="row" style="height:90px"></div>

<div class="row" style=" width:500px;display:inline-block;position:relative;float:left;left:100px">
   
     @foreach($products as $product)
     
        <div class="card" style="width:660px;height:220px"> 
       <div class="row" style="top:10px; left:10px; position:relative;"><img style="float:left; width:200px;height:200px;" src="{{url("/products/images/$product->product_id.$product->extension")}}">
        <p style="left:50px;top:10px; position:relative;">NOMBRE DEL PRODUCTO : {{$product->title }}</p>
        <p style="left:50px;top:10px; position:relative;">COLOR : {{$product->color}}</p>
        <p style="left:50px;top:10px; position:relative;">TALLA : {{$product->size}}</p>
        <p style="left:50px;top:10px; position:relative;">CANTIDAD {{ $var1 = $product->cantidad}}</p>
        <p style="left:50px;top:10px; position:relative;">PRECIO : {{$var2 = $product->pricing}}</p>                
        <p style="left:50px;top:10px; position:relative;">TOTAL : {{  $total2 = $var1 * $var2}}</p>       
        <!-- <a href="" style="left:50px;top:40px; position:relative;">Cancelar Compra</a> -->
        <div class="col l12 m6 s3">
        @include('shopping_carts.delete',['product' => $product])
        </div>
        </div>
        </div>
      
        @endforeach
      </div>

<div class="row">   <div class="card col l12 m1 s1 offset-l1" style="background-color:#606262;width:400px;height:425px; position:relative;right:50px;float:right">
    <div class="row">
      <div class="container">
          <div class="col l12 m4 s12">
              <a  class="btn-large modal-trigger" href="#modal1" style="position:relative;top:20px;right:30px; width:350px;"><i class="material-icons right">store</i>CONTINUAR</a>
              
          </div>
          <div class="row"> 
            <p style="top:30px;right:10px; position:relative;color:white">RESUMEN DEL PEDIDO</p>
                       
          </div>
           
<table class="table table-bordered" style="position:relative;font-weight: bold;top:40px; width:350px;right:20px;background-color:white;box-shadow: 1px 1px 7px black;">
      <tbody class="center">
      @foreach ($products as $product)
<!--        <tr>
          <td>Cantidad</td>
          <td class="right"></td>
                  
        </tr> -->
        <tr>
          <td>Producto:</td>
          <td class="right">{{$product->title }}</td>
          <td></td>
          <td class="right">${{$var1=$product->pricing}}  X    {{$product->cantidad}}</td>
          <td></td>
          <!-- <td class="right">{{$var2=$product->cantidad}}</td> -->
        </tr>
          @endforeach 
        <tr>
          <td>Total</td>
          <td></td>
          <td class="right" style="color: red;">${{$total}}</td>
        </tr>
      </tbody>
    </table>

            </div>
    </div>
  </div></div>
 


  <!-- Modal Structure -->
  <div id="modal1" class="modal" style="height:180px">
    <div class="modal-content">
      <img style="width:100px;height:70px;float:left" src="{{asset('img/aler.png')}}"><p style="position:relative; top:20px;" >¿Seguro que desea continuar con su compra?</p> 
    </div>
    <div class="modal-footer">
      
        
           @include("shopping_carts.form")
     
            <a href="#!" class="modal-close btn" style="position:relative;background-color:#cc1f0e; right:20px;top:2px;width:50px;height:35px">No</a>
         </div>
       </div>
        
      
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
  </div>

<div class="row" style="height:90px"></div>
<script type="text/javascript">


$(document).ready(function(){

        $("#modal1").modal();

});
	 
</script>

@endsection 
