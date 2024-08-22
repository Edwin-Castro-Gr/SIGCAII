$(function () {

    $('#terceros_contratost').select2();
    $('#empleadosM_contratost').select2({placeholder: {id:'-1', text:'Seleccione...'}, width: "100%"});
    $('#lineacostos_contratost').select2({placeholder: 'Seleccione...'});
    $('#lineacostos_contratost').trigger('change');
    $('#areas').select2({placeholder: 'Seleccione...'});
    $('#areas').trigger('change');
    $('#concepto_contratost').select2({placeholder: 'Seleccione...'});
    $('#concepto_contratost').trigger('change');

    if ($('#opc_pag').val() == "ingreso") 
    {
        $('#lblnitempgrupo').css("display", "none");
        $('#lblrazongrupok').css("display", "none");
        $('#nitempgrupo').css("display", "none");
        $('#razongrupok').css("display", "none");
        $('#relacion_personal').css("display", "none");

        $.post("/d_contratost/consecutivo", {} , function(data_form)
        {
            if(data_form!="0")
            {
                $('#ncontrato').val('CONT-TER-'+data_form);
            }else{
                $('#ncontrato').val('CONT-TER-'+'001');
            }
        });
        $.post("/d_contratost/cargar_anexos",{}, function(data_carg)
        {
            //alert(data_carg);
            $("#collapse1").empty();
            $("#collapse1").html(data_carg);

            $('.ace-file-input').aceFileInput({
                btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
                btnChooseText: 'Seleccionar',
                placeholderText: 'Seleccione el Archivo origen',
                placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
            });
        });
        cargar_personal_contratado();
        var ban = 0;
        $('#btn_guardar').click(function () {
            var texto = '';
            var ban = 0;
            $('#ncontrato').css("disabled","false");

            if (($('#terceros_contratost').val() == "")) {
                $('#terceros_contratost').addClass("brc-danger");
                texto = texto + "* Seleccione el Tipo de Tercero!<br>";
                ban = 1;
            }
            if ($('#areas').val() == "") {
                $('#areas').addClass("brc-danger");
                texto = texto + "* El Aerea es obligatoria!";
                ban = 1;
            }
            if ($('#fechainicio').val() == "") {
                $('#fechainicio').addClass("brc-danger");
                texto = texto + "* La fecha de inicio es obligatoria!";
                ban = 1;
            }
            if ($('#fechafinal').val() == "") {
                $('#fecha_final').addClass("brc-danger");
                texto = texto + "* La fecha final es obligatoria!";
                ban = 1;
            }
            if (ban == 1) {
                Swal.fire("¡Atención!", texto, "warning");
                return false;
            } else {
                guardar_registro();
            }
            return false;
        });

        $("#btn_guardar_tercero").click(function () {
             
          var ban=0;
          var texto='';
          var nittercero = $('#numeroid').val();
          if( ($('#numeroid').val()=="")){
            $('#numeroid').addClass("brc-danger");
            texto=texto+"* El numero de identificacion del tercero es obligatorio!<br>";
            ban=1;
          }
          if( $('#razonsocial').val()=="" ){
            $('#razonsocial').addClass("brc-danger");
            texto=texto+"* El Nombre o razón social es obligatorio!";
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
            var datos_form = $("#form_guardartercero").serialize();
            $.post("/d_contratost/guardar_tercero", datos_form, function(data_form){
              Swal.close();
                if(data_form=="1") {
                //jQuery(function(){
                    Swal.fire({
                        title: "¡Correcto!",
                        text: "Registro ingresado correctamente!",
                        icon: "success"
                    })    
                    .then((willDelete) => {
                        $("#form_guardartercero")[0].reset();
                        $('#newCtercero').modal('hide');                   
                        
                        $.post("/d_contratost/cargar_tercero",{terce: ""+nittercero+""}, function(data_terce){
                        
                            $('#idtercero').val(data_terce['terceros'].id_tercero);
                            $('#numeroid').val(nittercero);
                            $('#razon_social').val(data_terce['terceros'].razon);                
                            $('#btn_agregar_tercero').css("display", "none");
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
                text: "Cargando lista de contratos con terceros.",
                showConfirmButton: false
            });

            $.post("/d_contratost/listar_tabla", {}, function (data_carg) {
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
       // alert('modificar');
       document.getElementById("actulizaranexos").checked=false;

        if($('#estado').val()!="2"){
            $('#observaciones_p').css("display", "none");
            $('#lblobservaciones_p').css("display", "none");
            $('#fechainicio_p').css("display", "none");
            $('#lblfechainicio_p').css("display", "none");
            $('#fechafinal_p').css("display", "none");
            $('#lblfechafinal_p').css("display", "none");
        }     
        
        var id_contrato = $('#idreg').val();

        if($('#keralty').val()=="Si"){
            $('#lblnitempgrupo').css("display", "block");
            $('#lblrazongrupok').css("display", "block");
            $('#nitempgrupo').css("display", "block");
            $('#razongrupok').css("display", "block");
        }else{ 
            $('#lblnitempgrupo').css("display", "none");
            $('#lblrazongrupok').css("display", "none");
            $('#nitempgrupo').css("display", "none");
            $('#razongrupok').css("display", "none");
        }

        if($('#maneja_personal').val()=="Si"){

            $('#relacion_personal').css("display", "block");
            
            $.post("/d_contratost/cargar_personal_contratadof", {id_contrato:""+id_contrato+""}, function (data_carg) {
                // alert(data_carg);
                $("#personal_contratado").DataTable().destroy();
                $("#personal_contratado").empty();
                $("#personal_contratado").append(data_carg);
                $('#personal_contratado').DataTable({
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
                return false;
            });    

        }else{

            $('#relacion_personal').css("display", "none");
        }

        $.post("/d_contratost/listar_anexos",{id_contrato:""+id_contrato+""}, function(data_carg){
            // alert(data_carg);
            $("#collapse1").empty();
            $("#collapse1").html(data_carg);

            $('.ace-file-input').aceFileInput({      
                btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
                btnChooseText: 'Seleccionar',
                placeholderText: 'Seleccione el Archivo',
                placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
            });
        });  

          
    }else if ($('#opc_pag').val() == "otrosi") {
        $('#fechainicio_p').css("display", "none");
        $('#lblfechainicio_p').css("display", "none");
        $('#fechafinal_p').css("display", "none");
        $('#lblfechafinal_p').css("display", "none");


    }



    $(document).on("change", function(event){
        var datos = event.target.id.split("_");
        var dato = event.target.id;
        
        if(dato == "maneja_personal") {
            // alert($("#maneja_personal option:selected").val());
            if($("#maneja_personal option:selected").val()=="Si"){
                $('#relacion_personal').css("display", "block");
            }else{
                $('#relacion_personal').css("display", "none");
            }
        }

        if(dato=="keralty"){

            if($("#keralty option:selected").val()=="Si"){
                $('#lblrazongrupok').css("display", "block");
                $('#razongrupok').css("display", "block");
                $('#lblnitempgrupo').css("display", "block");
                $('#nitempgrupo').css("display", "block");
            }else{
                $('#lblrazongrupok').css("display", "none");
                $('#razongrupok').css("display", "none");
                $('#lblnitempgrupo').css("display", "none");
                $('#nitempgrupo').css("display", "none");
            }
        }

        if(dato=="estado"){

            if($("#estado option:selected").val()=="2"){
                // alert($("#estado option:selected").val());
                $('#observaciones_p').css("display", "block");
                $('#lblobservaciones_p').css("display", "block");
                $('#fechainicio_p').css("display", "block");
                $('#lblfechainicio_p').css("display", "block");
                $('#fechafinal_p').css("display", "block");
                $('#lblfechafinal_p').css("display", "block");
            }else{                
                $('#observaciones_p').css("display", "none");
                $('#lblobservaciones_p').css("display", "none");
                $('#fechainicio_p').css("display", "none");
                $('#lblfechainicio_p').css("display", "none");
                $('#fechafinal_p').css("display", "none");
                $('#lblfechafinal_p').css("display", "none");
            }
        }

        // if(dato=="prorroga"){
        //     // alert($("#prorroga option:selected").val());
        //     if($("#prorroga option:selected").val()=='Si'){
        //         $('#fechainicio_p').css("display", "block");
        //         $('#lblfechainicio_p').css("display", "block");
        //         $('#fechafinal_p').css("display", "block");
        //         $('#lblfechafinal_p').css("display", "block");
        //     }else{                
        //         $('#fechainicio_p').css("display", "none");
        //         $('#lblfechainicio_p').css("display", "none");
        //         $('#fechafinal_p').css("display", "none");
        //         $('#lblfechafinal_p').css("display", "none");
        //     }
        // }

        if(dato=="actulizaranexos"){
            let snactualizaranexo = event.target.checked;

            if((snactualizaranexo)==true){
                $.post("/d_contratost/cargar_anexos",{}, function(data_carg)
                {
                    //alert(data_carg);
                    $("#collapse1").empty();
                    $("#collapse1").html(data_carg);

                    $('.ace-file-input').aceFileInput({
                        btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
                        btnChooseText: 'Seleccionar',
                        placeholderText: 'Seleccione el Archivo origen',
                        placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
                    });
                });

            }else{
                $.post("/d_contratost/listar_anexos",{id_contrato:""+id_contrato+""}, function(data_carg){
                    // alert(data_carg);
                    $("#collapse1").empty();
                    $("#collapse1").html(data_carg);                    
                });
            }
        }
    });

    $('#nit').keyup(function(e) {
        if(e.keyCode == 13) {
            var nittercero = $('#nit').val();
            $.post("/d_contratost/cargar_tercero",{terce: ""+nittercero+""}, function(data_terce){
            if((data_terce['terceros'].id_tercero)){
                $('#idtercero').val(data_terce['terceros'].id_tercero);
                $('#razon_social').val(data_terce['terceros'].razon);                
                $('#btn_agregar_tercero').css("display", "none");                
                $('#areas').focus();
                }else{
                Swal.fire("El tercero no Existe!");                
                }
            });
        }
    });

    $(document).on("click", function (event) {
        var datos = event.target.id.split("_");
        var dato = event.target.id;

        if (datos[0] == "btneditar") {
            idreg = datos[1];

            window.open('/d_contratost/modificar/'+idreg, '_parent');
            
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
                    $.post("/d_contratost/inactivar", {
                        idreg: "" + id_reg + ""
                    }, function (data_form) {
                        //alert(data_form);
                        if (data_form == "1") {
                            Swal.fire({
                                title: 'Inactivado!',
                                text: 'El registro se ha inactivado.',
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

            window.open('/d_contratost/otrosi/'+idreg, '_parent');
            
        }

        if (datos[0]=="btneditarP"){
            $idpers = datos[1];
            $.post("/d_contratos/modificar_personal",{pers:""+$idpers+""}, function(data_pers)
                {
                    
                });
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
            var texto = '';
            var ban = 0;
            $('#ncontrato').css("disabled","false");

            if (($('#terceros_contratost').val() == "")) {
                $('#terceros_contratost').addClass("brc-danger");
                texto = texto + "* Seleccione el Tipo de Tercero!<br>";
                ban = 1;
            }
            if ($('#areas').val() == "") {
                $('#areas').addClass("brc-danger");
                texto = texto + "* El Aerea es obligatoria!";
                ban = 1;
            }
            if ($('#fechainicio').val() == "") {
                $('#fechainicio').addClass("brc-danger");
                texto = texto + "* La fecha de inicio es obligatoria!";
                ban = 1;
            }
            if ($('#fechafinal').val() == "") {
                $('#fecha_final').addClass("brc-danger");
                texto = texto + "* La fecha final es obligatoria!";
                ban = 1;
            }
            if (ban == 1) {
                Swal.fire("¡Atención!", texto, "warning");
                return false;
            } else {
                actualizar_registro();
            }
            return false;
        };

        if (dato == "btn_pdf") {
            window.open('/d_contratost/pdf', '_blank');
        }

        if (dato == "btn_conr") {
            window.open('/d_contratost/consulta_listarestrictiva', '_blank');
        }

        if (dato == "btn_excel") {
            window.open('/d_contratost/excel', '_blank');
        }

        if (dato == "btn_agregar_tercero") {
            
            $('#btn_guardar_tercero').css("display", "block");
           
            // $('#div_estado').css("display", "none");
            $("#form_guardartercero")[0].reset();

            $('#form_guardartercero').modal({
                show: true,
                keyboard: false
            });
            return false;
        }

        // if (dato == "btn_agregar_tercero") {
        //     window.open('/a_terceros/index', '_blank');
        // }

        //******************************** TABLA PERSONAL CONTRATADO ***************************




        if(dato == "btn_nuevopersonal") {

            $("#form_guardar_per")[0].reset();
            $('#archivo1').val("");
            $('#archivo_2').val("");
            $('#archivo_3').val("");
            $('#archivo_4').val("");
            $('#archivo_5').val("");
            $('#archivo_6').val("");
            $('#archivo_7').val("");
            $('#nittercero').val($('#nit').val());
            $('#newModal').modal({
                show: true,
                keyboard: false
            });
            return false;
        }

        // if(dato == "btn_guardar_per") {
        //     var datos_form = $("#form_guardar_per").serialize();
        //     alert($('#archivo1').val());
        //     alert(datos_form);
        //     $.post("/d_contratost/guardar_personal_contratado", datos_form, function (data_form) {
        //        // alert(data_form);
        //         if (data_form == "1") {
        //             $("#form_guardar_per")[0].reset();
        //             cargar_personal_contratado();
        //         } else {
        //             Swal.fire("¡Error!", data_form, "error");
        //         }
        //     });
        // }

        if(dato == "btn_guardar_per") {
            var ban = 0;
            var texto = '';
            if ($('#cedula').val() == "") {
                $('#cedula').addClass("brc-danger");
                texto = texto + "*La Cedula es obligatoria!";
                ban = 1;
            }

            if ($('#nombres').val() == "") {
                $('#nombres').addClass("brc-danger");
                texto = texto + "*El nombre es obligatorio!";
                ban = 1;
            }

            if ($('#cargo').val() == "") {
                $('#cargo').addClass("brc-danger");
                texto = texto + "*El Cargo es obligatorio!";
                ban = 1;
            }

            if ($('#email').val() == "") {
                $('#email').addClass("brc-danger");
                texto = texto + "*El Email es obligatorio!";
                ban = 1;
            }

            if ($('#telefono').val() == "") {
                $('#telefono').addClass("brc-danger");
                texto = texto + "*El Telefono es obligatorio!";
                ban = 1;
            }

            // if ($('#archivo1').val() == "") {
            //     $('#archivo1').addClass("brc-danger");
            //     texto = texto + "* Anexo1 es obligatorio!";
            //     ban = 1;
            // }

            // if ($('#archivo_2').val() == "") {
            //     $('#archivo_2').addClass("brc-danger");
            //     texto = texto + "* Anexo2 es obligatorio!";
            //     ban = 1;
            // }

            // if ($('#archivo_3').val() == "") {
            //     $('#archivo_3').addClass("brc-danger");
            //     texto = texto + "* Anexo3 es obligatorio!";
            //     ban = 1;
            // }

            // if ($('#archivo_4').val() == "") {
            //     $('#archivo_4').addClass("brc-danger");
            //     texto = texto + "* Anexo4 es obligatorio!";
            //     ban = 1;
            // }

            // if ($('#archivo_5').val() == "") {
            //     $('#archivo_5').addClass("brc-danger");
            //     texto = texto + "* Anexo5 es obligatorio!";
            //     ban = 1;
            // }

            // if ($('#archivo_6').val() == "") {
            //     $('#archivo_6').addClass("brc-danger");
            //     texto = texto + "* Anexo6 es obligatorio!";
            //     ban = 1;
            // }

            // if ($('#archivo_7').val() == "") {
            //     $('#archivo_7').addClass("brc-danger");
            //     texto = texto + "* Anexo7 es obligatorio!";
            //     ban = 1;
            // }

            if (ban == 1) {
                Swal.fire("¡Atención!", texto, "warning");
            } else {

                Swal.fire({
                    title: "¡Atención!",
                    text: "Guardando...!",
                    icon: "warning",
                    showConfirmButton: false
                });
            
                var formData = new FormData(document.getElementById("form_guardar_per"));
                // alert(formData);
                $.ajax({
                    url: "/d_contratost/guardar_personal_contratado",
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
                            $("#form_guardar_per")[0].reset();
                            cargar_personal_contratado();            
                        }); 
                    } else {
                        Swal.fire("¡Error!", res, "error");
                    }
                }); 
                return false;
            }
        }

        if (datos[0] == "btnelimi") {
            idreg = datos[1];
            $.post("/d_contratost/eliminar_personal_contratado", {
                idreg: "" + idreg + ""
            }, function (data_preg) {
                cargar_personal_contratado();
            });
            return false;
        }

        if (datos[0] == "btnelimi1") {
            idreg = datos[1];
            $.post("/d_contratost/eliminar_personal_contratado", {
                idreg: "" + idreg + ""
            }, function (data_preg) {
                cargar_personal_contratado();
            });
            return false;
        }
    }); 
    
    function guardar_registro() {
        Swal.fire({
            title: "¡Atención!",
            text: "Guardando Información...!",
            icon: "warning",
            showConfirmButton: false
        });
        
        var formData = new FormData(document.getElementById("Form_Guardar"));

        $.ajax({
            url: "/d_contratost/guardar",
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
                window.open('/d_contratost/index','_parent');            
              }); 
            } else {
                Swal.fire("¡Error!", res, "error");
            }
        }); 
        return false;
    }

    function guardar_otrosi() {
        Swal.fire({
            title: "¡Atención!",
            text: "Guardando Información...!",
            icon: "warning",
            showConfirmButton: false
        });
        
        var formData = new FormData(document.getElementById("Form_otrosi"));

        $.ajax({
            url: "/d_contratost/guardarotrosi",
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
                window.open('/d_contratost/index','_parent');            
              }); 
            } else {
                Swal.fire("¡Error!", res, "error");
            }
        }); 
        return false;
    }


    function actualizar_registro() {
        Swal.fire({
            title: "¡Atención!",
            text: "Guardando Información...!",
            icon: "warning",
            showConfirmButton: false
        });
        
        var formData = new FormData(document.getElementById("Form_actualizar"));

        $.ajax({
            url: "/d_contratost/actualizar",
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
                window.open('/d_contratost/index','_parent');            
              }); 
            } else {
                Swal.fire("¡Error!", res, "error");
            }
        }); 
        return false;
    }

    function cargar_personal_contratado() {
        $.post("/d_contratost/cargar_personal_contratado", {}, function (data_carg) {
            //alert(data_carg);
            $("#personal_contratado").DataTable().destroy();
            $("#personal_contratado").empty();
            $("#personal_contratado").append(data_carg);
            $('#personal_contratado').DataTable({
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
            return false;
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

    $('input[type=text], input[type=email], input[type=password], input[type=file], select, select2, input[type=number]').on("change", function (event) {
        $('#' + event.target.id).removeClass("brc-danger");
    });

});
 