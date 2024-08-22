$(function () {

    if ($('#opc_pag').val() == "ingreso") {
        
        $('#empleados_contratos').select2();
        $('#empleados_jefeinm').select2();
        $('#cargos_contratos').select2({
            placeholder:'Seleccione un Cargo..',
            allowClear: true
        });
        $('#lblfechafinal').css("display", "none");
        $('#fechafinal').css("display", "none");
        
        //$('#cargos_contratos').chosen({width: "95%"});

        $('#btn_guardar').click(function () {
          var ban = 0;
          var texto = '';
          if(($('#tiposcontratos_contratos').val() == "")) {
            $('#tiposcontratos_contratos').addClass("brc-danger");
            texto = texto + "* El Tipo de Contrato es obligatorio!<br>";
            ban = 1;
          }
          if($('#cedula_empleado').val() == "") {
            $('#cedula_empleado').addClass("brc-danger");
            texto = texto + "* El Empleado es obligatorio!<br>";
            ban = 1;
          }
          if($('#cargos_contratos').val() == "") {
            $('#cargos_contratos').addClass("brc-danger");
            texto = texto + "* El Cargo es obligatorio!<br>";
            ban = 1;
          }           

          if($('#centroscostos_contratos').val()=="" ){
            $('#centroscostos_contratos').addClass("brc-danger");
            texto=texto+"* El Centro de Costos es obligatorio!<br>";
            ban=1;
          }     

          if( $('#areas_contratos').val()=="" ){
              $('#areas_contratos').addClass("brc-danger");
              texto=texto+"* El Departamento es obligatorio!<br>";
              ban=1;
          } 

          if( $('#empleados_jefeinm').val()=="" ){
              $('#empleados_jefeinm').addClass("brc-danger");
              texto=texto+"* El(la) Jefe Inmediato es obligatorio!<br>";
              ban=1;
          } 

          if ($('#fechainicio').val() == "") {
              $('#fechainicio').addClass("brc-danger");
              texto = texto + "* La Fecha de Inicio es obligatoria!<br>";
              ban = 1;
          }

          if (ban == 1) {
              Swal.fire("¡Atención!", texto, "warning");
          } else {
              
              guardar_registro();
          }
          return false;
        });

        $("#btn_guardar_empleado").click(function () {
             
          var ban=0;
          var texto='';
          var cedula = $('#cedula_empleado').val();
          if( ($('#cedula').val()=="")){
              $('#cedula').addClass("brc-danger");
              texto=texto+"* El Numero de documento de indentidad es obligatorio!<br>";
              ban=1;
          }
          if( $('#nombres').val()=="" ){
              $('#nombres').addClass("brc-danger");
              texto=texto+"* El Nombre es obligatorio!<br>";
              ban=1;
          }

          if( $('#apellidos').val()=="" ){
              $('#apellidos').addClass("brc-danger");
              texto=texto+"* El apellido es obligatorio!<br>";
              ban=1;
          }     

          if( $('#fecha_nacimiento').val()=="" ){
              $('#fecha_nacimiento').addClass("brc-danger");
              texto=texto+"* La fecha_nacimiento es obligatoria!<br>";
              ban=1;
          }            
           
          if( $('#email').val()=="" ){
              $('#email').addClass("brc-danger");
              texto=texto+"* El email es obligatorio!<br>";
              ban=1;
          } 

          if( $('#direccion').val()=="" ){
              $('#direccion').addClass("brc-danger");
              texto=texto+"* La direccion es obligatoria!<br>";
              ban=1;
          }            

          if( $('#telefono').val()=="" ){
              $('#telefono').addClass("brc-danger");
              texto=texto+"* El teléfono es obligatoria!<br>";
              ban=1;
          }            

          if( $('#eps_empleados').val()=="" ){
              $('#eps_empleados').addClass("brc-danger");
              texto=texto+"* La EPS es obligatoria!<br>";
              ban=1;
          }            

          if( $('#arl_empleados').val()=="" ){
              $('#arl_empleados').addClass("brc-danger");
              texto=texto+"* La ARL es obligatoria!<br>";
              ban=1;
          }              

          if( $('#gruposanguineo').val()=="" ){
              $('#gruposanguineo').addClass("brc-danger");
              texto=texto+"* El grupo sanguineo es obligatorio!<br>";
              ban=1;
          }              

          if( $('#nivel_riesgo').val()=="" ){
              $('#nivel_riesgo').addClass("brc-danger");
              texto=texto+"* El nivel de riesgo es obligatorio!<br>";
              ban=1;
          }
            
          if(ban==1) {  
            Swal.fire("¡Atención!", texto, "warning");
          } else {
            //alert("Datos: "+nittercero);
            Swal.fire({   
              title: "Por favor espere!",   
              text: "Guadando la información.", 
              showConfirmButton: false 
            });
            var datos_form = $("#form_guardarempleado").serialize();
            $.post("/a_contratos/guardar_empleado", datos_form, function(data_form){
              Swal.close();
                if(data_form=="1") {
                //jQuery(function(){
                    Swal.fire({
                        title: "¡Correcto!",
                        text: "Registro ingresado correctamente!",
                        icon: "success"
                    })    
                    .then((willDelete) => {
                        $("#form_guardarempleado")[0].reset();
                        $('#newCempleado').modal('hide');                   
                        
                        $.post("/a_contratos/cargar_empleado",{emple: ""+cedula+""}, function(data_terce){
                        
                            $('#idfuncionario').val(data_terce['empleado'].id_empleado);
                            $('#cedula_empleado').val(cedula);
                            $('#nombre_empleado').val(data_terce['empleado'].nombre_empleado);                
                            $('#btn_agregar_empleado').css("display", "none");
                        });
                    });                
                }else{
                    Swal.fire("¡Error!", data_form, "error");
                }
            });      
            return false;
          }
          return false;
        });
    } else if ($('#opc_pag').val() == "listado") {

        cargar_listado();

        function cargar_listado() {
            Swal.fire({
                title: "Por favor espere!",
                text: "Cargando lista de solicitudes.",
                showConfirmButton: false
            });

            $.post("/a_contratos/listar_tabla", {}, function (data_carg) {
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
    }else if ($('#opc_pag').val() == "modificar") {
        if($('#estado').val()!="2"){
            $('#observaciones_p').css("display", "none");
            $('#lblobservaciones_p').css("display", "none");
            $('#fechainicio_p').css("display", "none");
            $('#lblfechainicio_p').css("display", "none");
            $('#fechafinal_p').css("display", "none");
            $('#lblfechafinal_p').css("display", "none");
            $('#lblprorroga').css("display", "none");
            $('#anexo_prorroga').css("display", "none");
        }             

        $('#empleados_contratos').select2();
        $('#empleados_contratos').trigger('change'); 
        $('#empleados_jefeinm').select2();
        $('#empleados_jefeinm').trigger('change'); 
        document.getElementById("actulizaranexos").checked=false;
        $.post("/a_contratos/listar_anexos",{id_contratos: ""+$('#idregistro').val()+""}, function(data_carg){
            //alert(data_carg);
            $("#accordionA").empty();
            $("#accordionA").html(data_carg);
                    
        });

        $.post("/a_contratos/cargar_prorrogas",{id_contratos: ""+$('#idregistro').val()+""}, function(data_pror){
            //alert(data_carg);
            $("#accordionProrroga").empty();
            $("#accordionProrroga").html(data_pror);
                    
        });
        
        if(($("#tiposcontratos_contratos option:selected").val()==2)||($("#tiposcontratos_contratos option:selected").val()==4)||($("#tiposcontratos_contratos option:selected").val()==5)||($("#tiposcontratos_contratos option:selected").val()==8)||($("#tiposcontratos_contratos option:selected").val()==7)){
            $('#lblfechafinal').css("display", "block");
            $('#fechafinal').css("display", "block");
        }else{
            $('#lblfechafinal').css("display", "none");
            $('#fechafinal').css("display", "none");
        }
        if($('#idprorroga').val()==1){  
            // alert('entro aqui');
            document.getElementById("prorroga").checked=true;
        }else{
            // alert('entro un cero');
            document.getElementById("prorroga").checked=false;
        }

        
        $("input[name=actulizaranexos]").change((e)=>{ 
            let snactualizaranexo = e.target.checked;


            if((e.target.checked)==true){
                $.post("/a_contratos/cargar_anexos",{cargos_contratos: ""+$('#cargos_contratos').val()+""}, function(data_carg){
                    //alert(data_carg);
                    
                    $("#accordionA").empty();
                    $("#accordionA").html(data_carg);

                    $('.ace-file-input').aceFileInput({      
                      btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
                      btnChooseText: 'Seleccionar',
                      placeholderText: 'Seleccione el Archivo',
                      placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
                    });                    
                });               
            }else{
                 $.post("/a_contratos/listar_anexos",{id_contratos: ""+$('#idregistro').val()+""}, function(data_carg){
                    //alert(data_carg);
                    $("#accordionA").empty();
                    $("#accordionA").html(data_carg);
                    
                });                 
            }
            $("#idactulizaranexos").val(snactualizaranexo);  
        });
    }else if ($('#opc_pag').val() == "consultas") {
        
     $.post("/a_contratos/consulta_contratos",{}, function(data_carg){
        $("#documentospendientes").empty();
        $("#documentospendientes").append(data_carg);
        });
    }else if ($('#opc_pag').val() == "otrosi") {
        $('#tiposcontratos_contratos').prop('disabled', 'disabled');
        $('#empleados_contratos').prop('disabled', 'disabled');
        $('#cargos_contratos').prop('disabled', 'disabled');
        $('#centroscostos_contratos').prop('disabled', 'disabled');
        $('#areas_contratos').prop('disabled', 'disabled');
        $('#empleados_jefeinm').prop('disabled', 'disabled');
        $('#div_vigencia_p').css("display","none");

    }

    $(document).on("click", function (event) {
        var datos = event.target.id.split("_");
        var dato = event.target.id;

        if (datos[0] == "btneditar") {
            idreg = datos[1];
            window.open('/a_contratos/modificar/'+idreg, '_parent');
        }

        if (datos[0] == "btninactivar") {
            //jQuery(function(){
            var id_reg = datos[1];
            var nom_reg = $('#nombre_' + id_reg).val();
            Swal.fire({
                title: "Desea Inactivar el Registro: '" + nom_reg + "' ?",
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
            }).then(function (result) {
                if (result.value) {
                    $.post("/a_contratos/inactivar", {
                        idreg: "" + id_reg + ""
                    }, function (data_form) {
                        //alert(data_form);
                        if (data_form == "1") {
                            Swal.fire({
                                title: 'Inactivado!',
                                text: 'El registro se ha inactivado.',
                                type: 'success',
                                icon: 'success',
                                customClass: {
                                    'confirmButton': 'btn btn-info px-5'
                                }
                            }).then((value) => {
                                cargar_listado();
                            });
                        } else {
                            Swal.fire("¡Error!", "Se presento el siguiente error: " + data_form, "error");
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.DismissReason.cancel;
                }
            });

            return false;
        }

        if (datos[0] == "btndetalle") {
            idreg = datos[1];

            $.post("/a_contratos/ver_registro", {
                idreg: "" + idreg + ""
            }, function (data_carg) {
                //alert(data_carg);
                $("#modalForm1").html(data_carg);
            });

            $('#view-registro').modal({
                show: true,
                keyboard: false
            });
            return false;
        }

        if (datos[0] == "btnotrosi") {
            idreg = datos[1];

            window.open('/a_contratos/otrosi/'+idreg, '_parent');
            
        }

        if(dato =="btn_guardarotrosi"){
            
            var texto = '';
            var ban = 0;
            // $('#ncontrato').css("disabled","false");

            if (($('#observaciones').val() == "")) {
                $('#observaciones').addClass("brc-danger");
                texto = texto + "* Las Observaciones son Obligatorias!<br>";
                ban = 1;
            }

            if ($('#objeto').val() == "") {
                $('#objeto').addClass("brc-danger");
                texto = texto + "* El objeto es obligatorio!";
                ban = 1;
            }

            if ($('#objeto').val()=="1"){
                if ($('#fechainicio_p').val() == "") {
                    $('#fechainicio_p').addClass("brc-danger");
                    texto = texto + "* La fecha de inicio es obligatoria!";
                    ban = 1;
                }
                if ($('#fechafinal_p').val() == "") {
                    $('#fechafinal_p').addClass("brc-danger");
                    texto = texto + "* La fecha final es obligatoria!";
                    ban = 1;
                }
            }

            if ($('#archivo_otrosi').val() == "") {
                $('#archivo_otrosi').addClass("brc-danger");
                texto = texto + "* La fecha final es obligatoria!";
                ban = 1;
            }
            if (ban == 1) {
                Swal.fire("¡Atención!", texto, "warning");
                return false;
            } else {
                guardar_otrosi();
            }
            return false;
        };


        if (dato == "btn_actualizar") {
            var ban = 0;
            var texto = '';
            if (($('#nombre').val() == "")) {
                $('#nombre').addClass("brc-danger");
                texto = texto + "* El nombre es obligatorio!<br>";
                ban = 1;
            }

            if ($('#areas_cargos').val() == "") {
                $('#areas_cargos').addClass("brc-danger");
                texto = texto + "* El Area es obligatorio!";
                ban = 1;
            }

            if (ban == 1) {
                Swal.fire("¡Atención!", texto, "warning");
            } else {                
               
               actualizar_registro();
            }
            return false;
        }

        if(dato =="btn_agregar_empleado"){
            try {
                $('#telefono').inputmask("(999) 999-9999")
            } catch (e) {}
        }

        if (dato == "btn_pdf") {
            window.open('/a_contratos/pdf', '_blank');
        }

        if (dato == "btn_consulta") {
            window.open('/a_contratos/consultas', '_parent');
        }

        if (dato == "btn_excel") {
            window.open('/a_contratos/excel', '_blank');
        }

         if (dato == "btn_consulta_todos") {
            window.open('/a_contratos/consulta_docpend', '_blank');
        }

        if (dato == "btn_consulta_general") {
            window.open('/a_contratos/consulta_general', '_blank');
        }        
    });
 
    $(document).on("change", function(event){
      var datos = event.target.id.split("_");
      var dato = event.target.id;

        if(dato == "cargos_contratos") {
            $.post("/a_contratos/cargar_anexos",{cargos_contratos: ""+$('#cargos_contratos').val()+""}, function(data_carg){
              //alert(data_carg);
              $("#accordionA").empty();
              $("#accordionA").html(data_carg);

              $('.ace-file-input').aceFileInput({      
                btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
                btnChooseText: 'Seleccionar',
                placeholderText: 'Seleccione el Archivo origen',
                placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
              });
            });
        } 

        if(dato == "tiposcontratos_contratos") {
        // alert($("#tiposcontratos_contratos option:selected").val());
            if(($("#tiposcontratos_contratos option:selected").val()==2)||($("#tiposcontratos_contratos option:selected").val()==4)||($("#tiposcontratos_contratos option:selected").val()==5)||($("#tiposcontratos_contratos option:selected").val()==8)||($("#tiposcontratos_contratos option:selected").val()==7)){
              $('#lblfechafinal').css("display", "block");
              $('#fechafinal').css("display", "block");
            }else{
              $('#lblfechafinal').css("display", "none");
              $('#fechafinal').css("display", "none");
            }
        }
        if(dato == "estado") {
            if($("#estado option:selected").val()=="2"){
                // alert($("#estado option:selected").val());
                $('#observaciones_p').css("display", "block");
                $('#lblobservaciones_p').css("display", "block");
                $('#fechainicio_p').css("display", "block");
                $('#lblfechainicio_p').css("display", "block");
                $('#fechafinal_p').css("display", "block");
                $('#lblfechafinal_p').css("display", "block");
                $('#lblprorroga').css("display", "block");
                $('#anexo_prorroga').css("display", "block");
                
                $('.ace-file-input').aceFileInput({      
                  btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
                  btnChooseText: 'Seleccionar',
                  placeholderText: 'Seleccione el Archivo',
                  placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
                });
            }else{                
                $('#observaciones_p').css("display", "none");
                $('#lblobservaciones_p').css("display", "none");
                $('#fechainicio_p').css("display", "none");
                $('#lblfechainicio_p').css("display", "none");
                $('#fechafinal_p').css("display", "none");
                $('#lblfechafinal_p').css("display", "none");
                $('#lblprorroga').css("display", "none");
                $('#anexo_prorroga').css("display", "none");
            }
        }    

        if(dato == "objeto"){
            if($('#objeto option:selected').val()=="1"){
                $('#div_vigencia_p').css("display","flex");
            }else{
                $('#div_vigencia_p').css("display","none");
            }
        }

    }); 

    $('#cedula_empleado').keyup(function(e) {
        
        if(e.keyCode == 13) {

          var cedula = $('#cedula_empleado').val();
          
          $.post("/a_contratos/cargar_empleado",{emple: ""+cedula+""}, function(data_emple){
            if((data_emple['empleado'].id_empleado)){
              $('#idfuncionario').val(data_emple['empleado'].id_empleado);
              $('#cedula_empleado').val(cedula);
              $('#nombre_empleado').val(data_emple['empleado'].nombre_empleado);                
              $('#btn_agregar_empleado').css("display", "none");             
              $('#cargos_contratos').focus();
            }else{
            Swal.fire("El Empleado no Existe!");                
            }
          });
        }        
    }); 

    $("input[name=prorroga]").change((e)=>{ 
      if((e.target.checked)==true){
        $("#idprorroga").val(1);       
      }else{
        $("#idprorroga").val(0);           
      }       
    });
    
    function guardar_registro() { 
        Swal.close();    
        Swal.fire({   
          title: "Por favor espere!",   
          text: "Guadando la información.", 
          icon: "warning",
          showConfirmButton: false 
        });
        
        var formData = new FormData(document.getElementById("form_guardar"));

        $.ajax({
            url: "/a_contratos/guardar",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(res){
            if(res >= 1) {
              Swal.fire({
                title: "¡Correcto!",
                text: "Registro Ingresado correctamente!",
                icon: "success"
              })
              .then((willDelete) => {
                window.open('/a_contratos/index','_parent');            
              }); 
            } else {
                Swal.fire("¡Error!", res, "error");
            }
        }); 
        return false;
    }

    function actualizar_registro() { 
      Swal.close();    
      Swal.fire({   
        title: "Por favor espere!",   
        text: "Actualizando la información.", 
        icon: "warning",
        showConfirmButton: false 
      });
      
      var formData = new FormData(document.getElementById("form_actualizar"));

      $.ajax({
          url: "/a_contratos/actualizar",
          type: "POST",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false
      }).done(function(res){
          if(res >= 1) {
            Swal.fire({
              title: "¡Correcto!",
              text: "Registro Actualizado correctamente!",
              icon: "success"
            })
            .then((willDelete) => {
              window.open('/a_contratos/index','_parent');            
            }); 
          } else {
              Swal.fire("¡Error!", res, "error");
          }
      }); 
      return false;
    }

    $(".UpperCase").on("keypress", function () {
        $input=$(this);
        setTimeout(function () {
            $input.val($input.val().toUpperCase());
        },50);
    });

    $(".ace-file-input").aceFileInput({
          
      btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
      btnChooseText: 'Seleccionar',
      placeholderText: 'Seleccione el Archivo',
      placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
      
    });

    
    $('input[type=text], input[type=email], input[type=password], checkbox, select, select2, input[type=number]').on("change", function (event) {
        $('#' + event.target.id).removeClass("brc-danger");
    });


});