$.fn.editable.defaults.mode = 'inline';
$.fn.editable.defaults.ajaxOptions = {type: 'PUT'};
$(document).ready(function(){
	$(".set-guide-number").editable();

	$(".select-status").editable({
		source: [
		  {value:"creado", text: "Creado"},
		  {value:"enviado", text: "Enviado"},
		  {value:"recibido", text: "Recibido"}
		]
	});
	$(".add-to-cart").on("submit",function(ev){
		ev.preventDefault();
		var $form = $(this);
		var $button = $form.find("[type='submit']");

		// Ajax
		$.ajax({
			url: $form.attr("action"),
			method: $form.attr("method"),
			data: $form.serialize(),
			dataType:"JSON",
			beforeSend: function(){
				$button.val("Cargando..");
			},
			success: function(){
				$button.css("background-color","red").val("Agregado");

				setTimeout(function(){
					restartButton($button);
				},200);
			},
			error: function(){
				cosole.log(err)
				$button.val("Cargando..");
				setTimeout(function(){
					restartButton($button);
				},200);
			}
		});
		return false;
	});
	function restartButton($button){
		$button.val("Agregar al carrito").attr("style","");
	}
});
