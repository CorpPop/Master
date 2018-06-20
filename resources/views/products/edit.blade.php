@extends("layouts.app")

@section("content")
<div style="height:100px"></div>
<div class="container">
	<div></div><h1 class="left">Editar Producto</h1></div>
	@include('products.form',['product' => $product, 'url' => '/products/'.$product->id,'method' => 'PATCH'])
</div>

@endsection