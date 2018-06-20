
{!! MaterializeCSS::include_full() !!}
<div style="height:100px"></div>

<div class="row"></div>
<div class="container">
<div class="row" style="height:90px"><h5 class="left">AGREGAR PRODUCTO</h5></div>

    <div class="row" style="right:80px;width:800px;position:relative;">
        <div class="col col l12 m1 s12 offset-l1">
        <div class="row">
{!! Form::open(['url' => $url,'method' => $method,'class'=> 'col s12 center card-body', 'files' => true]) !!}
<!-- 	<div class="input-field col l6 m3 s12">
		{{ Form::text('Procts_warehouse',$warehouse->Procts_warehouse,['class' => 'form-control','placeholder'=>'Titulo...'])}}
		<label>Nombre del producto</label>
	</div> -->
	<div class="input-field col l6 m3 s12">
	<select {{ Form::text('id_product',$warehouse->id_product,['class' => 'form-control','placeholder'=>'Titulo...'])}}>
		
		<option value="" disabled selected>Seleccione producto</option>
		
@foreach ($product as $product)

 		<option value="{{ $product->id }}" class="form-control"> {{$product->title}}</option>
@endforeach

    </select>
    <label>Seleccione producto</label>
   </div>
 <!--   <div class="input-field col l6 m3 s12">
	  {{ Form::text('Procts_warehouse',$warehouse->Procts_warehouse,['class' => 'form-control','placeholder'=>'Titulo...'])}}
	  <label>Nombre de producto</label>
	</div> -->
	<div class="input-field col l6 m3 s12">
		{{ Form::text('size',$warehouse->size,['class' => 'form-control','placeholder'=>'Tamaño'])}}
		<label>Talla del producto</label>
	</div>
	<div class="input-field col l6 m3 s12">
		{{ Form::text('countw',$warehouse->countw,['class' => 'form-control','placeholder'=>'Cantidad'])}}
		<label>Cantidad de productos</label>
	</div>
	<div class="input-field col l6 m3 s12">
	  {{ Form::text('color',$warehouse->color,['class' => 'form-control','placeholder'=>'Color'])}}
	  <label>Color del producto</label>
	</div>
	<div class="row"><div class="input-field col l6 m6 s12">
		<a href="{{url('/warehouses')}}" style="background-color:#081d76" class="btn">Regresar</a>
		<input type="submit" name="" style="background-color:#081d76;width:150px" value="Enviar" class="btn">
	</div></div>
        
{!! Form::close() !!}
   </div>
    </div>
</div>
</div>
<script type="text/javascript">$(document).ready(function() {
$('select').formSelect();
});</script>
