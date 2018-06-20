{!! Form::open(['url' => '/in_shopping_carts','class' => 'add-to-cart', 'method' => 'POST']) !!}
	<input type="hidden" name="product_id" value="{{$product->id}}">
	  <div class="row">
 			     	
  <div class="input-field col l12 s12">
			    <!-- <input type="text" name="talla" value="{{$tiket->talla}}"> -->
			    <select  {{ Form::text('talla',$tiket->talla,['class' => 'form-control','id'=>'talla'])}}>
			      <option value="" disabled selected>Elige una talla...</option>
			      <!-- <option value="1"></option> -->
			@foreach ($warehouse as $warehouse)
			     <option value="{{ $warehouse->id_warehouse }}" > {{$warehouse->size}}</option>

			
			@endforeach
			<!-- dd($row=is_array($warehouse)); -->
			@if($row=is_array($warehouse))
			       <option value="" style="color: red; background-color: red;">Sin existencias</option>
			@endif
			    </select>

			    <label>Seleccione una talla</label>
 </div>
 <div class="input-field col l12 s12">
			    <!-- <input type="text" name="talla" value="{{$tiket->talla}}"> -->
			    <select  {{ Form::text('color',$tiket->color,['class' => 'form-control','id'=>'color'])}}>
			      <option value="" disabled selected>Elige un color...</option>
			      <!-- <option value="1"></option> -->
			@foreach ($warehouse1 as $warehouse1)
			     <option value="{{ $warehouse->id_warehouse }}" > {{$warehouse1->color}}</option>

			@if($warehouse1->color == null)
			       <option value="" style="color: red; background-color: red;">Sin existencia</option>
			@endif
			@endforeach
			    </select>

			    <label>Seleccione un color</label>
 </div>
			   <div class="input-field col l12 s12">

			     {{ Form::text('cantidad',$tiket->cantidad,['class' => 'form-control','id'=>'cantidad','placeholder'=>'Ingrese cantidad'])}}
			    <label for="cantidad">Cantidad</label>
			  </div>


 	  </div>
	<input type="submit" name="" value="Agregar al carrito" class="btn">
{!! Form::close() !!}