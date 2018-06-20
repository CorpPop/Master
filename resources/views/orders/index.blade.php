@extends("layouts.app")

@section("content")
{!! MaterializeCSS::include_full() !!}
<div ></div>
<div class="row" style="position:relative;left:150px;top:100px">
	 <div class="container">
	 <div><h4>VENTAS POR MES</h4></div>
	 	      <table class="table">
				<thead>
					<tr>
						<td>Clave</td>
						<td>Comprador</td>
						<td>Dirección</td>
						<td>No. guía</td>
						<td>Estado</td>
						<td>Fecha venta</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
					 <tr>
					 	<td>{{$order->id}}</td>
					 	<td>{{$order->recipient_name}}</td>
					 	<td>{{$order->address()}}</td>
					 	<td>
					 		<a href="#" 
					 		data-type="text" 
					 		class="set-guide-number" 
					 		data-name="guide_number"
					 		data-pk="{{$order->id}}" 
					 		data-title="Número de guia" 
					 		data-value="{{$order->guide_number}}" 
					 		data-url="{{url("/orders/$order->id")}}"></a>
					 		<!-- {{$order->guide_number}} -->
					 	</td>
					 	<td>
					 		<a href="#" 
					 		data-type="select" 
					 		class="select-status" 
					 		data-name="status" 
					 		data-pk="{{$order->id}}" 
					 		data-title="Número de guia" 
					 		data-value="{{$order->status}}" 
					 		data-url="{{url("/orders/$order->id")}}"></a>
					 		<!-- {{$order->status}} -->
					 	</td>
					 	<td>{{$order->created_at}}</td>
					 	<td>Acciones</td>
					 </tr>
					@endforeach
				</tbody>
			</table>
	 </div>
</div>
<div class="container" style="position:relative;right:130px">
	<div class="panel default">
	<h6 style="font-weight: bold;">ESTADISTICAS</h6>
		<div class="panel body">
			
		
			<div class="row">
				<div class="col s4 l2 m3" style="border-right:2em; background-color: grey;box-shadow: 1px 1px 6px black;">
					<!-- <span style="color: red; width: 20%;"></span> -->
					<h4 style="color: white; border-right: 20px;">{{$totalMonth}} $</h4>
					Ingresos del mes
				</div>
				
				
			</div>
			<div class="row" ><div class="col s4 l2 m3" style="border-right:2em; background-color: grey;box-shadow: 1px 1px 6px black;">
					<h4 style="color: red; border-right: 20px;" class="center">{{$totalMonthCount}}</h4>
					Numero de ventas
				</div></div>
			

			
		</div>
	</div>
</div>


<div style="height:100px"></div>
<script src="{{ url('js/app1.js') }}"></script>

@endsection
