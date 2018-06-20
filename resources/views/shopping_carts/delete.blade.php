{!! Form::open(['url' => '/carrito/'.$product->id, 'method' => 'DELETE','class'=> 'col s12']) !!}
	<input type="submit" class="btn-small" style="background-color:#cc1f0e" value="Cancelar compra">
{!! Form::close() !!}