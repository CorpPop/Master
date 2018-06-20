@extends("layouts.app")

@section("content")

 <script type="text/javascript">
    $(document).ready(function(){
        $("#activator2").click(function(event){

      $("#modal1").openModal();
      });
              
});
</script>

<body background="{{asset('img/wake3.jpg')}}">

<div class="container" style="background-color: white; position:relative;box-shadow: 1px 1px 9px black">
<div style="height:100px"></div>
  <div class="row">

    @foreach ($products as $product )
    
      <div class="card left col l3 m1 s6 offset-l1 " style="right:40px">
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
      <div class="row">
   @if(Auth::check()  && Auth::user()->type=="Admin")
<div class="card left col l3 m1 s6 offset-l1 " style="right:40px">
 <div class="card-content"><a href="{{url('/products/create')}}" class="btn-large waves-effect waves-light red" style="width: 205px; top:1px; right:20px;height:240px"><i class="material-icons left" style="font-size: 200px; padding-top:100px;">add</i></a>
 <div class="row"></div>
   <div class="row">
        <h7>Agregar mas productos</h7>
   </div>
 </div>
  
</div>
          
        @endif
 </div>
 </div>
 
    <div style="height:100px"></div>

</div>

 </body>
@endsection