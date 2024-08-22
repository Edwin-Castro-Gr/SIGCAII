$(function () {
	if ($('#opc_pag').val() == "ingreso") {

		$('#btn_ingresar').click(function (event) {
			event.preventDefault();

			var usuario = $('#usuario').val()
			$("#mensaje").html('<div class="alert alert-rounded alert-warning"><strong>Verificando!</strong><br>Verificando datos...!</div>');

			$.post("/login/verificar",{usuario: "" + $('#usuario').val() + "", contrasena: "" + $("#contrasena").val() + ""}, function(data_preg){
				// alert(data_preg);
				valor=data_preg.split("=");
				switch(valor[0]) {
					case '0': Swal.fire({
		                			title: "¡Bienvenido!",
		                			text: valor[1],
		                			icon: "success"
		              				})
		              				.then((willDelete) => {
		              				window.open('/home/index','_parent');	                
		              			});
		              			break;
		            case '1': Swal.fire({
									icon: 'warning',
									title: '¡Atención!',
									text: 'Debe Cambiar su Contraseña'
								})
		            			.then((willDelete) => {
									window.open('/login/cambiar?idreg='+usuario+'','_parent');									
								});
								break;
					case '2': Swal.fire({
									icon: 'info',
									title: '¡Atención!',
									text: 'Usuario y/o Contraseña incorrectos'
								})		
								$('#usuario').focus();
								break;
					case '3': Swal.fire({
									icon: 'error',
									title: '¡Atención!',
									text: 'El Usuario se encuentra Suspendido'
								})		
								$('#usuario').focus();
								break;
					default:  Swal.fire({
									icon: 'question',
									title: 'Oops...',
									text: 'Usuario no Existe'
								})		
								$('#usuario').focus();								
								break;			
				}
			});
			
		});
	
		$('#btn_recuperar_pass').click(function(e){
			e.preventDefault();
			$.post("/login/recuperar_password",{email: ""+$('#id-recover-email').val()+""}, function(data_preg){
				// alert(data_preg);
				if(data_preg == 1){
					Swal.fire({
			           	title: "Confirmación de Envio",
			           	text: "El Email fue enviado satisfactoriamente",
			           	icon: "success"
			       	})
					window.open('/','_parent');
				}else if(data_preg == 2){
					Swal.fire({
			           	title: "Error",
			           	text: "Error al enviar el Email!",
			           	icon: "error"
			       	})
					// window.open('/login/index','_parent');
				}else if(data_preg == 3){
					Swal.fire({
			           	title: "Error",
			           	text: "Email Invalido!",
			           	icon: "error"
			       	})
					// window.open('/login/index','_parent');
				}else if(data_preg == 4){
					Swal.fire({
			           	title: "Error",
			           	text: "Email Invalido!",
			           	icon: "error"
			       	})
					// window.open('/login/index','_parent');
				}

			});

		});

	}else if  ($('#opc_pag').val() == "recuperar") {

		$('#btn_guardar').click(function(e){
			e.preventDefault();
			var ban=0;
		    var texto='';

		    if($('#password').val()==""){
		    	$('#password').addClass("brc-danger");
		        texto=texto+"* La Contraseña es obligatoria!";
		        ban=1;
		    }else if($('#confirmar_password').val()==""){
		    	$('#confirmar_password').addClass("brc-danger");
		        texto=texto+"* Confimar Contraseña es obligatorio!";
		        ban=1;
		    }
		    if($('#password').val()!=$('#confirmar_password').val()){
		    	$('#confirmar_password').addClass("brc-danger");
		    	texto=texto+"* Las Contraseña no coinciden!";
		        ban=1;
		    }
		    if(ban==1) { 	
		        Swal.fire("¡Atención!", texto, "warning");
		    } else {
		    	Swal.fire({   
		          title: "Por favor espere!",   
		          text: "Guadando la información.", 
		          showConfirmButton: false 
		        });
			    var datos_form = $("#ResetPassform").serialize();
			    
			    $.post("/login/guardar_nuevaClave", datos_form, function(data_form){
			        Swal.close();
		        	if(data_form=="1") {
		            //jQuery(function(){
		              	Swal.fire({
			                title: "¡Correcto!",
			                text: "Registro ingresado correctamente!",
			                icon: "success"
		              	})
		              	.then((willDelete) => {
		              		$("#ResetPassform")[0].reset(); 
		              		window.open('/','_parent');               
		              });
		            //});
		          } else {
		            Swal.fire("¡Error!", data_form, "error");
		          }
		        });      
		        return false;
		    }
		      return false;
		});
	}else if ($('#opc_pag').val() == "cambiar") {
		
		$('#btn_actualizar').click(function(e){
			e.preventDefault();
			var ban=0;
		    var texto='';

		    if($('#password').val()==""){
		    	$('#password').addClass("brc-danger");
		        texto=texto+"* La Contraseña es obligatoria!";
		        ban=1;
		    }else if($('#confirmar_password').val()==""){
		    	$('#confirmar_password').addClass("brc-danger");
		        texto=texto+"* Confimar Contraseña es obligatorio!";
		        ban=1;
		    }else if($('#password').val()!=$('#confirmar_password').val()){
		    	$('#confirmar_password').addClass("brc-danger");
		    	texto=texto+"* Las Contraseña no coinciden!";
		        ban=1;
		    }

		    if(!$('#poli_protdatos').prop('checked')){
		    	$('#poli_protdatos').addClass("brc-danger");
		    	texto=texto+"* Debe Confirmar que Autoriza!";
		        ban=1;
		    }
		    
		    if(ban==1) { 	
		        Swal.fire("¡Atención!", texto, "warning");
		    } else {
		    	Swal.fire({   
		          title: "Por favor espere!",   
		          text: "Cambiando la Contraseña.", 
		          showConfirmButton: false 
		        });
			    var datos_form = $("#cambioPassform").serialize();
			    // alert(datos_form);				    
			    $.post("/login/actualizar_clave", datos_form, function(data_form){
			        Swal.close();
		        	if(data_form=="1") {
		            //jQuery(function(){
		              	Swal.fire({
			                title: "¡Correcto!",
			                text: "Registro ingresado correctamente!",
			                icon: "success"
		              	})
		              	.then((willDelete) => {
		              		$("#cambioPassform")[0].reset(); 
		              		window.open('/','_parent');               
		              });
		            //});
		          } else {
		            Swal.fire("¡Error!", data_form, "error");
		          }
		        });      
		        return false;
		    }
		      return false;
		});

	}
		
		$(document).on("keyup", function(event) {
			dato_id=event.target.id;
		    $("#mensaje").html('');	           
		});
});


	

	
