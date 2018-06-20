@extends("layouts.app")

@section("content")
<div class="container">
	@include('warehouses.form',['warehouse' => $warehouse,'product' => $product,'url' => '/warehouses','method' => 'POST'])
</div>

@endsection