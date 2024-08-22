$(function () {
	// cargar_listado();

	function cargar_listado() {
    Swal.fire({ 
      title: "Por favor espere!",   
      text: "Cargando lista de Bloques.",
      showConfirmButton: false 
    });
    
    $.post("/c_agendaqx/listar_tabla",{}, function(data_carg){
      //alert(data_carg);
      $("#simple-table").DataTable().destroy();
      $("#simple-table").empty();
      $("#simple-table").append(data_carg);
      $('#simple-table').DataTable({
      	"language": {
	        "lengthMenu": "Mostrar _MENU_ registros por pagina",
	        "zeroRecords": "No se encontraron resultados en su busqueda",
	        "searchPlaceholder": "Buscar registros",
	        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
	        "infoEmpty": "No existen registros",
	        "infoFiltered": "(filtrado de _MAX_ registros)",
	        "search": "Buscar:",
	        "paginate": {
	            "first": "Primero",
	            "last": "Último",
	            "next": "Siguiente",
	            "previous": "Anterior"
	        },
	    },
      	responsive: true
      });
      $('[data-toggle="tooltip"]').tooltip();
      Swal.close();
    });
	}

	if ($('#opc_pag').val() == "agenda") {
		var calendarEl = document.getElementById('calendar-sala1');

    var calendar = new FullCalendar.Calendar(calendarEl, {
    	schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',

    	editable: true,
      selectable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'resourceTimelineDay,resourceTimelineThreeDays,timeGridWeek,dayGridMonth'
      },


    	initialView: 'resourceTimeGridDay',
      views: {
        resourceTimelineThreeDays: {
          type: 'resourceTimeGrid',
          duration: { days: 2 },
          buttonText: '2 days'
        }
      },

      resources: [
        { id: '1', title: 'Sala 1', eventColor: 'red' },
        { id: '2', title: 'Sala 2', eventColor: 'green' },
        { id: '3', title: 'Sala 3', eventColor: 'orange' }        
      ],

      events: [
        { id: '1', resourceId: '1', start: '2024-07-06', end: '2024-07-08', title: 'event 1' },
        { id: '2', resourceId: '2', start: '2024-07-19T09:00:00', end: '2024-07-19T14:00:00', title: 'event 2' },
        { id: '3', resourceId: '3', start: '2024-07-19T12:00:00', end: '2024-07-19T06:00:00', title: 'event 3' },
        { id: '4', resourceId: '1', start: '2024-07-19T07:30:00', end: '2024-07-19T09:30:00', title: 'event 4' },
        { id: '5', resourceId: '3', start: '2024-07-20T10:00:00', end: '2024-07-20T15:00:00', title: 'event 5' }
      ],

      select: function(arg) {
      	alert(arg.startStr,
          arg.endStr, arg.resource.id);
      },


    });
    calendar.render();
	}
  $(document).on("click", function(event){
	    var datos = event.target.id.split("_");
	    var dato = event.target.id;
	    
	    if(datos[0] == "btneditar") {
	      idreg = datos[1];
	      $('#newModalLabel').html('Modificar Departamento');
	      
	      $.post("/c_agendaqx/modificar",{idreg: ""+idreg+""}, function(data_preg){
        
	        $('#idregistro').val(data_preg['agendaqx'].id_agendaqx);
	        $("#cirujanos_agendaqx").val(data_preg['agendaqx'].cirujanos);
	        
	        $('#div_diaagenda').css("display", "flex");
	        $("#diaagenda").val(data_preg['agendaqx'].diaagenda);
	        $("#diaagenda").change();

	        $("#horainicio").val(data_preg['agendaqx'].horainicio);
	        $("#horafinal").val(data_preg['agendaqx'].horafinal);

	        $('#div_estado').css("display", "flex");
	        $("#estado").val(data_preg['agendaqx'].estado);
	        $("#estado").change();
	      });

	      $('#btn_guardar').css("display", "none");
	      $('#btn_actualizar').css("display", "block");
	      
	      $('#newModal').modal({
	        show: true,
	        keyboard: false
	      });
	    }

	    if(datos[0] == "btninactivar") {
	      //jQuery(function(){
	        var id_reg = datos[1];
	        var nom_reg = $('#nombre_'+id_reg).val();
	        Swal.fire({
	          title: "Desea Inactivar el Registro: '"+nom_reg+"' ?",
	          text: "Podras activarlo en cualquier momento con la edición!",
	          icon: "warning",
	          showCancelButton: true,
              scrollbarPadding: false,
              confirmButtonText: 'Si, Inactivar!',
              cancelButtonText: 'No, cancelar!',
              cancelButtonColor: '#d33',
              reverseButtons: false,
              customClass: {
                'confirmButton': 'btn btn-green mx-2 px-3',
                'cancelButton': 'btn btn-red mx-2 px-3'
              }
	        }).then(function(result) {
	            if (result.value) {
	            	$.post("/c_agendaqx/inactivar",{idreg: ""+id_reg+""}, function(data_form){
	            		//alert(data_form);
	            		if(data_form=="1") {
			              Swal.fire({
			                title: 'Inactivado!',
			                text: 'El Bloque se ha inactivado.',
			                type: 'success',
			                icon: 'success',
			                customClass: {
			                  'confirmButton': 'btn btn-info px-5'
			                }
			              }).then((value) => {
			                cargar_listado();
			              });
			            } else {
			            	Swal.fire("¡Error!", "Se presento el siguiente error: "+data_form, "error");
			            }
			        });
	            } else if (result.dismiss === Swal.DismissReason.cancel) {
	              Swal.DismissReason.cancel;
	            }
	        });
	        
	      return false;
	    }

	    if(datos[0] == "btndetalle") {
	      idreg = datos[1];
	      
	      $.post("/c_agendaqx/ver_registro",{idreg: ""+idreg+""}, function(data_carg){
	        //alert(data_carg);
	        $("#modalForm1").html(data_carg);
	      });

	      $('#view-registro').modal({
	        show: true,
	        keyboard: false
	      });
	      return false;
	    }

	    if(dato == "btn_guardar") {
	      var ban=0;
	      var texto='';
	      if( $('#cirujanos_agendaqx').val()=="" ){
	        $('#cirujanos_agendaqx').addClass("brc-danger");
	        texto=texto+"* El Cirujano es obligatorio!";
	        ban=1;
	      }

	      if( ($('#diaagenda').val()=="")){
	        $('#diaagenda').addClass("brc-danger");
	        texto=texto+"* El Dia es obligatorio!<br>";
	        ban=1;
	      }

	      if( ($('#horainicio').val()=="")){
	        $('#horainicio').addClass("brc-danger");
	        texto=texto+"* La hora inicial es obligatoria!<br>";
	        ban=1;
	      }

	      if( ($('#horafinal').val()=="")){
	        $('#horafinal').addClass("brc-danger");
	        texto=texto+"* La hora final es obligatoria!<br>";
	        ban=1;
	      }
	      
	      if(ban==1) { 	
	        Swal.fire("¡Atención!", texto, "warning");
	      } else {
	        //alert("Datos: "+datos_form);
	        Swal.fire({   
	          title: "Por favor espere!",   
	          text: "Guadando la información.", 
	          showConfirmButton: false 
	        });
	        var datos_form = $("#form_guardar").serialize();
	        $.post("/c_agendaqx/guardar", datos_form , function(data_form){
	          Swal.close();
	          if(data_form=="1") {
	            //jQuery(function(){
	              Swal.fire({
	                title: "¡Correcto!",
	                text: "Registro ingresado correctamente!",
	                icon: "success"
	              })
	              .then((willDelete) => {
	              	$("#form_guardar")[0].reset();
	                cargar_listado();
	              });
	            //});
	          } else {
	            Swal.fire("¡Error!", data_form, "error");
	          }
	        });      
	        return false;
	      }
	      return false;
	  	}

	  	if(dato == "btn_nuevo_departamento") {
	  		$('#newModalLabel').html('Nuevo Departamento');
	  		$('#btn_guardar').css("display", "block");
	      	$('#btn_actualizar').css("display", "none");
	      	$('#div_estado').css("display", "none");
	      	$("#form_guardar")[0].reset();
	  	}

	  	if(dato == "btn_actualizar") {
	      var ban=0;
	      var texto='';
	       if( $('#cirujanos_agendaqx').val()=="" ){
	        $('#cirujanos_agendaqx').addClass("brc-danger");
	        texto=texto+"* El Cirujano es obligatorio!";
	        ban=1;
	      }

	      if( ($('#diaagenda').val()=="")){
	        $('#diaagenda').addClass("brc-danger");
	        texto=texto+"* El Dia es obligatorio!<br>";
	        ban=1;
	      }

	      if( ($('#horainicio').val()=="")){
	        $('#horainicio').addClass("brc-danger");
	        texto=texto+"* La hora inicial es obligatoria!<br>";
	        ban=1;
	      }

	      if( ($('#horafinal').val()=="")){
	        $('#horafinal').addClass("brc-danger");
	        texto=texto+"* La hora final es obligatoria!<br>";
	        ban=1;
	      }
	      	      
	      if(ban==1) { 	
	        Swal.fire("¡Atención!", texto, "warning");
	      } else {
	        //alert("Datos: "+datos_form);
	        Swal.fire({   
	          title: "Por favor espere!",   
	          text: "Actualizando la información.", 
	          showConfirmButton: false 
	        });
	        var datos_form = $("#form_guardar").serialize();
	        $.post("/c_agendaqx/actualizar", datos_form , function(data_form){
	          Swal.close();
	          if(data_form=="1") {
	            //jQuery(function(){
	              Swal.fire({
	                title: "¡Correcto!",
	                text: "Registro actualizado correctamente!",
	                icon: "success"
	              })
	              .then((willDelete) => {
	              	$("#form_guardar")[0].reset();
	                cargar_listado();
	                $('#newModal').modal('hide');
	              });
	            //});
	          } else {
	            Swal.fire("¡Error!", data_form, "error");
	          }
	        });      
	        return false;
	      }
	      return false;
	  	}

	  	if(dato == "btn_pdf") {
	  		window.open('/c_agendaqx/pdf','_blank');
	  	}

	  	if(dato == "btn_excel") {
	  		window.open('/c_agendaqx/excel','_blank');
	  	}
  	});

	$(".UpperCase").on("keypress", function () {
	  $input=$(this);
	  setTimeout(function () {
	   $input.val($input.val().toUpperCase());
	  },50);
 	})

	$('input[type=text], input[type=email], input[type=password], select, input[type=number]').on("change", function(event){
		$('#'+event.target.id).removeClass("brc-danger");
	});


});