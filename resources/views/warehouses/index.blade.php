@extends("layouts.app")

@section("content")

<div style="height:100px"></div>
<div class="row">
	 <div class="container">
	 <div><h4>PRODUCTOS DE AMERICAN BOATS</h4></div>
	 	      <table class="table">
				<thead>
					<tr>
						<td>Clave</td>
						<td>Producto</td>
						<td>Talla</td>
						<td>Color</td>
						<td>Precio</td>
						<td>Cantidad</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
				
					 <tr>
					 	<td></td>
					 	<td></td>
					 	<td></td>
					 	<td></td>
					 	<td></td>
					 	<td></td>
					 	<td></td>
					 </tr>
			
				</tbody>
			</table>
	 </div>
</div>
            <div class="row">
            <div class="container">
            	<a href="{{ url('warehouses/create') }}" class="btn right">Agregar</a>   
            </div>
                          	
            </div>
<div style="height:100px"></div>
<script src="{{ url('js/app1.js') }}"></script>
@endsection