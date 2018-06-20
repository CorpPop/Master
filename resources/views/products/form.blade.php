


<div class="container">
<div class="row" style="height:90px"><h5 class="left">PUBLICAR PRODUCTO </h5></div>
    <div class="row" style="right:80px;width:800px;position:relative;">
        <div class="col col l12 m1 s12 offset-l1">
        <div class="row">
          
            {!! Form::open(['url' => $url,'method' => $method,'class'=> 'col s12 center card-body','style'=>'','files' => true]) !!}

<!-- 	<div class="input-field col l6 m3 s12">
	<select {{ Form::text('title',$product->title,['class' => 'form-control','id'=>'nombre','placeholder'=>'Ingresa el nombre...'])}}>
		
		<option  value="" disabled selected>Seleccione producto</option>
		
@foreach ($warehouse as $warehouse)
    
 		<option value="{{ $warehouse->id_warehouse }}" > {{$warehouse->Procts_warehouse}}</option>
@endforeach

    </select>
    <label>Seleccione producto</label>
   </div> -->
<div class="input-field col l6 m3 s12">
    {{ Form::text('title',$product->title,['class' => 'form-control','id'=>'numero','required autofocus','placeholder'=>'Ingrese titulo...'])}}
      <label for="titulo">Titulo</label>
  </div>
	<div class="input-field col l6 m3 s12">
		{{ Form::text('pricing',$product->pricing,['class' => 'form-control','id'=>'numero','required autofocus','placeholder'=>'Precio del producto...'])}}
	    <label for="numero">Precio</label>
	</div>
  <img src='' class="ver">
	<div class="input-field col l6 m3 s1 ">
		{{ Form::file('cover',['onchange' => 'imgload(event)','required autofocus']) }}
		<label for="Imagen"></label>
	</div>
   <!--  -->
<img src='' class="ver2">
	<div class="input-field col l6 m3 s12 ">
		
		{{ Form::file('cover2',['onchange' => 'imgload2(event)','required autofocus']) }}

	</div>
<img src='' class="ver3">
	<div class="input-field col l6 m3 s12 ">
		{{ Form::file('cover3',['onchange' => 'imgload3(event)','required autofocus']) }}
	</div>
<img src='' class="ver4">
	<div class="input-field col l6 m3 s12 ">
		{{ Form::file('cover4',['onchange' => 'imgload4(event)','required autofocus']) }}
	</div>
	<div class="input-field col l12 m6 s12">
		{{ Form::textarea('description',$product->description,['class' => 'materialize-textarea form-control','id'=>'descrip','data-lenth'=>'10','required autofocus','placeholder'=>'Descripcion de producto...'])}}
		 <label for="descrip"></label>
	</div>
	<div class="input-field col l6 m3 s12">
		<a href="{{url('/products')}}" style="background-color:#081d76" class="btn">Regresar</a>
		<input type="submit" name="" style="background-color:#081d76" value="Enviar" class="btn">
	</div>
{!! Form::close() !!}
    
        </div>
    </div>
</div>
<script type="text/javascript">
	
  $(document).ready(function() {
    $('input#input_text, textarea#textarea1').characterCounter();
    $('select').formSelect();
  });
</script>
<script type="text/javascript">
	var image = '';
function imgload(evt) {
  var reader = new FileReader();
  reader.readAsDataURL(evt.target.files[0]);
  reader.onload = (evt) => {
    var img = new Image();
    img.src = evt.target.result;
    var cv = document.createElement('canvas');
    var ctx = cv.getContext('2d');
    img.onload = () => {
      var ratio = img.naturalHeight / img.naturalWidth;
      cv.width = 300;
      cv.height = 300 * ratio;
      ctx.drawImage(img, 0, 0, 300, 300 * ratio);
      
      image = cv.toDataURL("image/jpeg"); 
      document.querySelector('img.ver').src = image;
    };
  }
}
</script>
<script type="text/javascript">
	var image = '';
function imgload2(evt) {
  var reader = new FileReader();
  reader.readAsDataURL(evt.target.files[0]);
  reader.onload = (evt) => {
    var img = new Image();
    img.src = evt.target.result;
    var cv = document.createElement('canvas');
    var ctx = cv.getContext('2d');
    img.onload = () => {
      var ratio = img.naturalHeight / img.naturalWidth;
      cv.width = 300;
      cv.height = 300 * ratio;
      ctx.drawImage(img, 0, 0, 300, 300 * ratio);
      
      image = cv.toDataURL("image/jpeg"); 
      document.querySelector('img.ver2').src = image;
    };
  }
}
</script>
<script type="text/javascript">
	var image = '';
function imgload3(evt) {
  var reader = new FileReader();
  reader.readAsDataURL(evt.target.files[0]);
  reader.onload = (evt) => {
    var img = new Image();
    img.src = evt.target.result;
    var cv = document.createElement('canvas');
    var ctx = cv.getContext('2d');
    img.onload = () => {
      var ratio = img.naturalHeight / img.naturalWidth;
      cv.width = 300;
      cv.height = 300 * ratio;
      ctx.drawImage(img, 0, 0, 300, 300 * ratio);
      
      image = cv.toDataURL("image/jpeg"); 
      document.querySelector('img.ver3').src = image;
    };
  }
}
</script>
<script type="text/javascript">
	var image = '';
function imgload4(evt) {
  var reader = new FileReader();
  reader.readAsDataURL(evt.target.files[0]);
  reader.onload = (evt) => {
    var img = new Image();
    img.src = evt.target.result;
    var cv = document.createElement('canvas');
    var ctx = cv.getContext('2d');
    img.onload = () => {
      var ratio = img.naturalHeight / img.naturalWidth;
      cv.width = 300;
      cv.height = 300 * ratio;
      ctx.drawImage(img, 0, 0, 300, 300 * ratio);
      
      image = cv.toDataURL("image/jpeg"); 
      document.querySelector('img.ver4').src = image;
    };
  }
}
</script>
