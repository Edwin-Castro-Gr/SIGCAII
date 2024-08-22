$(function () {
    var wrapper = '';
    var canvas = '';
 
   $('#lblotroNC').css('display', 'none');
   $('#otroNC').css('display', 'none');
    
    if ($('#opc_pag').val() == "ingreso") {
        var ban = 0;
        var tcont = 1;
        var tcontP = 1;
        var signaturePad;
        var TinyDatePicker = DateRangePicker.TinyDatePicker;

        var fechaR = "";
        TinyDatePicker('.tinyDate', {
                lang: {

                    days: [
                        'Dom',
                        'Lun',
                        'Mar',
                        'Mie',
                        'Jue',
                        'Vie',
                        'Sáb'
                    ],
                    months: [
                        'Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Agosto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'
                    ],
                    today: 'Hoy',
                    clear: 'Limpar',
                    close: 'Cerrar'

                },
                format(date) {
                    return date.toLocaleDateString('es-CO', { timeZone: 'America/Bogota',
                        day:'2-digit', month: '2-digit', year: 'numeric'
                    });
                },

                mode: 'dp-below',
            })
            .on('statechange', function (ev) {
                alert(date)
            });

       
        // TinyDatePicker('#fechaT01', {
        //         lang: {

        //             days: [
        //                 'Dom',
        //                 'Lun',
        //                 'Mar',
        //                 'Mie',
        //                 'Jue',
        //                 'Vie',
        //                 'Sáb'
        //             ],
        //             months: [
        //                 'Enero',
        //                 'Febrero',
        //                 'Marzo',
        //                 'Abril',
        //                 'Mayo',
        //                 'Junio',
        //                 'Julio',
        //                 'Agosto',
        //                 'Septiembre',
        //                 'Octubre',
        //                 'Noviembre',
        //                 'Diciembre'
        //             ],
        //             today: 'Hoy',
        //             clear: 'Limpar',
        //             close: 'Cerrar'

        //         },
        //         format(date) {
        //             return date.toLocaleDateString('es-CL', {
        //                timeZone: 'UTC'
        //             });
        //         },

        //         mode: 'dp-below',
        //     })
        //     .on('statechange', function (ev) {

        //     });

        $('#fileF1').css("display", "none");

        // $('#fechaR').inputmask('99/99/9999');
        $('#fechaT1').inputmask('99/99/9999');
        $('#horaI').inputmask('99:99');
        $('#horaF').inputmask('99:99');

        $('#empleados_actas').select2();
        $('#empleados_responsable').select2();
        $('#empleados_responsableT1').select2({
            width: "100%",
            placeholder: 'Asistentes',
            allowClear: true
        });

        $('#btn_agregarTarea').click(function () {

            $('#empleados_responsableT').select2({
               width: "100%",
               placeholder: 'Resposable Tarea',
               allowClear: true
            });
            
            $('#CargarTareasAsignadas').modal({
                show: true,
                keyboard: false
            });
          return false;
            
            // tcont++;
            // // var datos_empleados= $.post("/r_actas/cargar_select_empleados",{}, function(data_empleados){ 
            // //     return (data_empleados);
            // // });
            //     $('#cantTarea').val(tcont);
            //     const tr_principal = D.create('tr');
            // //crear el td que contiene los input
            //     const td_numero = D.create('td');
            //     const td_empleado = D.create('td');
            //     const td_tarea = D.create('td');
            //     const td_fecha = D.create('td');
            //     const td_btnAccion = D.create('td');
            // //crear los inputs 
            //     const span_numero = D.create('span', { name: 'numero[]', innerHTML: ''+tcont+'' } );
            //     const participante = D.create('input', { type: 'text', name: 'participanteT'+tcont+'', id: 'participanteT'+tcont+'', autocomplete: 'off', placeholder: 'Nombres y Apellidos' } );

            //     const input_tareas = D.create('textarea', { rows: '2', id: 'tareasAsignadas'+tcont+'', name: 'tareasAsignadas'+tcont+'', autocomplete: 'off', placeholder: 'Describa la tarea asignada' } );
            //     const input_fecha = D.create('input', { type: 'text', id: 'fechaT'+tcont+'', name: 'fechaT'+tcont+'' });
            //     const btn_borrar = D.create('a', { href: 'javascript:void(0)', onclick: function( ){ D.remove(tr_principal); tcont--; } } );
            //     const img_btn =  D.create('i',{});
            // //agregar clases a los elementos
                                
            //     participante.classList.add('form-control','col-sm-12');
               
            //     input_tareas.classList.add('form-control','col-sm-12');
            //     input_fecha.classList.add('form-control', 'tinyDate','col-sm-6');
            //     btn_borrar.classList.add('mx-2px','btn','radius-1','border-2','btn-xs','btn-brc-tp','btn-light-secondary','btn-h-lighter-danger','btn-a-lighter-danger');
            //     img_btn.classList.add('fa','fa-trash-alt');
            // //cargar empleados al select 
            

            //     // $.post("/r_actas/cargar_select_empleados",{}, function(data_empleados){ 
            //     //     select_empleado.html(data_empleados);

            //     // });

            //     // select_empleado.select2({
            //     //     width: "100%",
            //     //     placeholder: 'Seleccione ...',
            //     //     allowClear: true
            //     // });

            //     // select_empleado.trigger('change');
            // //agregar cada etiqueta a su nodo padre

            //     D.append(span_numero, td_numero);
            //     D.append(participante, td_empleado); 
            //     D.append(input_tareas, td_tarea);
            //     D.append(input_fecha, td_fecha);
            //     D.append(img_btn, btn_borrar);
            //     D.append(btn_borrar, td_btnAccion);

            //     D.append([td_numero,td_empleado,td_tarea,td_fecha,td_btnAccion],tr_principal);
            //     D.append(tr_principal, D.id('tb_container'));    


            //     TinyDatePicker('#fechaT'+tcont+'', {
            //         lang: {

            //             days: [
            //                 'Dom',
            //                 'Lun',
            //                 'Mar',
            //                 'Mie',
            //                 'Jue',
            //                 'Vie',
            //                 'Sáb'
            //             ],
            //             months: [
            //                 'Enero',
            //                 'Febrero',
            //                 'Marzo',
            //                 'Abril',
            //                 'Mayo',
            //                 'Junio',
            //                 'Julio',
            //                 'Agosto',
            //                 'Septiembre',
            //                 'Octubre',
            //                 'Noviembre',
            //                 'Diciembre'
            //             ],
            //             today: 'Hoy',
            //             clear: 'Limpar',
            //             close: 'Cerrar'

            //         },
            //         format(date) {
            //             return date.toLocaleDateString('es-CO', { timeZone: 'America/Bogota',
            //              month: '2-digit', day:'2-digit', year: 'numeric'
            //             });
            //         },

            //         mode: 'dp-below',
            // })
            // .on('statechange', function (ev) {

            // });  
            //  $('#fechaT'+tcont+'').inputmask("99/99/9999");
        });

        $('#btn_agregarParticipante').click(function () {
           
            tcontP++;
            $('#cantPart').val(tcontP);
            const tr_principalPart = D.create('tr');
            //crear el td que contiene los input
                const td_numeroPart = D.create('td');
                const td_empleadoPart = D.create('td');
                const td_cargo = D.create('td');
                const td_btnfirmaP = D.create('td');
                const td_btncargarfirma = D.create('td');
                const td_firmaImagen = D.create('td');                
                const td_btnAccion = D.create('td');          
               
            //crear los inputs 
                const span_numeroP = D.create('span', { name: 'numero[]', innerHTML: ''+tcontP+'' } );
                const participanteP = D.create('input', { type: 'text', name: 'participanteP'+tcontP+'', id: 'participanteP'+tcontP+'',  autocomplete: 'off', placeholder: 'Nombres y Apellidos'} );

                const input_cargo = D.create('input', { type: 'text', id: 'cargo'+tcontP+'', name: 'cargo'+tcontP+'', autocomplete: 'off', placeholder: 'Registre el Cargo' });
                const input_btnfirmaP = D.create('input', { type: 'button', id: 'btn_firma_empleado', onclick: function (){firmarAsistencia(tcontP);}, value: 'Firmar'});
                const input_btnCargarF = D.create('input', { type: 'button', id: 'btn_cargar_firma',  onclick: function (){cargarFirma(tcontP);}, value: 'Cargar'});
                const input_firmaImg = D.create('img', { src: '', id: 'signaturePreview'+tcontP+'', name: 'signaturePreview'+tcontP+'', alt: 'No Ha firmado', width:'200', height:'40' });
                const input_filehiddenfirma = D.create('input', { type: 'file', id: 'fileF'+tcontP+'', name: 'fileF'+tcontP+''});
                const input_file64hiddenf= D.create('input', { type: 'hidden', id: 'file64F'+tcontP+'', name: 'file64F'+tcontP+''});
                const btn_borrar = D.create('a', { href: 'javascript:void(0)', onclick: function( ){ D.remove(tr_principalPart); tcontP--; $('#cantPart').val(tcontP); } } );
                const img_btn =  D.create('i',{});
               
            //agregar clases a los elementos
                               
                participanteP.classList.add('form-control','col-sm-12');
               
                input_cargo.classList.add('form-control','col-sm-12');
                
                input_btnfirmaP.classList.add('btn', 'btn-blue', 'px-3', 'd-block', 'text-95', 'radius-round', 'border-2', 'brc-black-tp10');
                input_btnCargarF.classList.add('btn', 'btn-green', 'px-3', 'd-block', 'text-95', 'radius-round', 'border-2', 'brc-black-tp10');
                td_firmaImagen.classList.add('d-none', 'd-lg-flex');
                input_firmaImg.classList.add('form-control');
                btn_borrar.classList.add('mx-2px','btn','radius-1','border-2','btn-xs','btn-brc-tp','btn-light-secondary','btn-h-lighter-danger','btn-a-lighter-danger');
                img_btn.classList.add('fa','fa-trash-alt');
                
            //cargar empleados al select 
            

            //agregar cada etiqueta a su nodo padre

                D.append(span_numeroP, td_numeroPart);
                D.append(participanteP, td_empleadoPart); 
                D.append(input_cargo, td_cargo);
                
                D.append(input_btnfirmaP, td_btnfirmaP);
                D.append(input_btnCargarF, td_btncargarfirma);
                D.append([input_firmaImg, input_filehiddenfirma, input_file64hiddenf], td_firmaImagen);

                D.append(img_btn, btn_borrar);
                D.append(btn_borrar, td_btnAccion);

                D.append([td_numeroPart,td_empleadoPart,td_cargo,td_btnfirmaP,td_btncargarfirma,td_firmaImagen,td_btnAccion],tr_principalPart);
                D.append(tr_principalPart, D.id('tb_containerPart')); 

                $('#fileF'+tcontP+'').css("display", "none");
        });


        var idpreview = '';
       
        function cargarFirma(tcons){
            
            $('#tcontCF').val(tcons);
            
            idpreview = 'signaturePreview'+tcons+'';

            $('#CargarfirmaModal').modal({
                show: true,
                keyboard: false

            });
            
        }


        function firmarAsistencia(tcons){
            $('#tcont').val(tcons);

            var wrapper = document.getElementById('signature-pad');

            var canvas = wrapper.querySelector('canvas');
            signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)'
               
            });


            function resizeCanvas() {

                var ratio = Math.max(window.devicePixelRatio || 1, 1);

                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);

                signaturePad.clear();
            }

           
            $('#firmaModal').modal({
                show: true,
                keyboard: false

            });  

        } 

        $('#btn_firma_empleado').click(function () {
            
            var wrapper = document.getElementById('signature-pad');

            var canvas = wrapper.querySelector('canvas');
            signaturePad = new SignaturePad (canvas, {
                backgroundColor: 'rgb(255, 255, 255)'
               
            });


            function resizeCanvas() {

                var ratio = Math.max(window.devicePixelRatio || 1, 1);

                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);

                signaturePad.clear();
            }

           
            $('#firmaModal').modal({
                show: true,
                keyboard: false

            });        
        
        });
            
        const $seleccionfirma = document.getElementById("imagenFirma");
        $seleccionfirma.value = '';

        $seleccionfirma.addEventListener('change', e => {
                       
            const $firmaPrevisualizacion = document.getElementById(''+idpreview+'');

            if (e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e){
                    $firmaPrevisualizacion.src = e.target.result;
                }
                reader.readAsDataURL(e.target.files[0]);
            }else{
                $firmaPrevisualizacion.src = "";
            }

        });

        $('#btn_guardarFirmar').click(function(){

            var tconrf = $('#tcontCF').val();
            
            const $firmaSelecionadas = document.getElementById('imagenFirma').files[0];                    

            $('#CargarfirmaModal').modal('hide');            
            
            document.getElementById('fileF'+tconrf+'').value = $firmaSelecionadas;                         
        });


        $('#btn_guardar').click(function(){
            var ban=0;
            var texto='';

           
            if(ban==1) {     
                Swal.fire("¡Atención!", texto, "warning");
            } else {
                guardar_registro();
                return false;  
            }
            
        });
            
        $('#btn_enviarCorreo').click(function () {
            alert('Enviar Correo');
        });
        
        $('#btn_firmar').click(function () {

            var consecutivo =  $('#tcont').val();
            if (signaturePad.isEmpty()) {
                alert("No ha cargado ninguna imagen ");
            } else {
            let dataURL = signaturePad.toDataURL();
               $('#signaturePreview'+consecutivo+'').attr('src',dataURL);
               
               document.getElementById('file64F'+consecutivo+'').value = dataURL; 
               
               $('#firmaModal').modal('hide');
            }
            // var data = signature.jSignature('getData', 'image');
            // $('#signaturePreview').attr('src', "data:" + data);
        });


        $('#btn_cargar_firma').click(function () {
            tcons = 1;
           
            cargarFirma(tcons);
        });

        $('#btn_borrar').click(function () {
            signaturePad.clear()
        });

        
    } else if ($('#opc_pag').val() == "revision") {
        var ban = 0;

        
    } else if ($('#opc_pag').val() == "aprobacion") {
        var ban = 0;
        
    } else if ($('#opc_pag').val() == "listado") {

        cargar_listado();

        function cargar_listado() {
            Swal.fire({
                title: "Por favor espere!",
                text: "Cargando lista de Actas",
                showConfirmButton: false
            });

            $.post("/r_actas/listar_tabla", {}, function (data_carg) {
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
    } else if ($('#opc_pag').val() == "modificar") {
      
    }

    function guardar_registro() {
        Swal.close();
        Swal.fire({
          title: "¡Atención!",
          text: "Guardando Información...!",
          icon: "warning",
          showConfirmButton: false
        });
        
        var formData = new FormData(document.getElementById("form_guardar"));
      
        $.ajax({
            url: "/r_actas/guardar",
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
                window.open('/r_actas/index','_parent');            
              }); 
            } else {
                Swal.fire("¡Error!", res, "error");
            }
        }); 
        return false;
    }

    $(document).on("click", function (event) {
        var datos = event.target.id.split("_");
        var dato = event.target.id;

        

        if (datos[0] == "btninactivar") {
           
        }

       


        if (dato == "btn_pdf") {
            window.open('/r_actas/pdf', '_blank');
        }

        if (dato == "btn_excel") {
            window.open('/r_actas/excel', '_blank');
        }
    });


    $(document).on("change", function (event) {
        event.preventDefault();
        var datos = event.target.id.split("_");
        var dato = event.target.id;
        var ck = event.target.checked;

        if (dato == "Ncomite") {
            if ($("#Ncomite option:selected").val() == "9") {
                $('#lblotroNC').css('display', 'flex');
                $('#otroNC').css('display', 'flex');
            }
        }
        

    });


    function guardar_registro() {
        Swal.close();
        Swal.fire({
            title: "¡Atención!",
            text: "Guardando Información...!",
            icon: "warning",
            showConfirmButton: false
        });

        var formData = new FormData(document.getElementById("form_guardar"));

        $.ajax({
            url: "/r_actas/guardar",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (res) {
            if (res >= 1) {
                Swal.fire({
                        title: "¡Correcto!",
                        text: "Registro Ingresado correctamente!",
                        icon: "success"
                    })
                    .then((willDelete) => {
                        window.open('/r_actas/index', '_parent');
                    });
            } else {
                Swal.fire("¡Error!", res, "error");
            }
        });
        return false;
    }

    function guardar_revision() {
        Swal.close();
        Swal.fire({
            title: "¡Atención!",
            text: "Guardando Información...!",
            icon: "warning",
            showConfirmButton: false
        });

        var formData = new FormData(document.getElementById("form_revision"));

        $.ajax({
            url: "/r_actas/guardar_revision",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (res) {
            if (res >= 1) {
                Swal.fire({
                        title: "¡Correcto!",
                        text: "Registro ingresado correctamente!",
                        icon: "success"
                    })
                    .then((willDelete) => {
                        window.open('/r_actas/index', '_parent');
                    });
            } else {
                Swal.fire("¡Error!", res, "error");
            }
        });
        return false;
    }

    function guardar_aprobacion() {
        Swal.close();
        Swal.fire({
            title: "¡Atención!",
            text: "Guardando Información...!",
            icon: "warning",
            showConfirmButton: false
        });

        var formData = new FormData(document.getElementById("form_aprobacion"));

        $.ajax({
            url: "/r_actas/guardar_aprobacion",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (res) {
            if (res >= 1) {
                Swal.fire({
                        title: "¡Correcto!",
                        text: "Registro ingresado correctamente!",
                        icon: "success"
                    })
                    .then((willDelete) => {
                        window.open('/r_actas/index', '_parent');
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
            title: "¡Atención!",
            text: "actualizando Información...!",
            icon: "warning",
            showConfirmButton: false
        });

        var formData = new FormData(document.getElementById("form_modificar"));

        $.ajax({
            url: "/r_actas/actualizar",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (res) {
            if (res >= 1) {
                Swal.fire({
                        title: "¡Correcto!",
                        text: "Registro actualizado correctamente!",
                        icon: "success"
                    })
                    .then((willDelete) => {
                        window.open('/r_actas/index', '_parent');
                    });
            } else {
                Swal.fire("¡Error!", res, "error");
            }
        });
        return false;
    }

    $(".UpperCase").on("keypress", function () {
        $input = $(this);
        setTimeout(function () {
            $input.val($input.val().toUpperCase());
        }, 50);
    })

    $('#imagenFirma').aceFileInput({

        // btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
        // btnChooseText: 'Seleccionar',
        // placeholderText: 'Seleccione el Archivo Visualización',
        // placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>',
        // allowExt: 'jpg|png'
        // 
        style: 'drop',
        droppable: true,

        container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',

        placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
        placeholderText: 'Cargue la Firma',
        placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

        //previewSize: 64,
        thumbnail: 'large',

        allowExt: 'gif|jpg|jpeg|png|webp|svg',
          //allowMime: 'image/png|image/jpeg',
          //allowMime: 'document/*',

          //maxSize: 100000,
    })

    $('input[type=text], input[type=email], input[type=password], select, select2, input[type=number]').on("change", function (event) {
        $('#' + event.target.id).removeClass("brc-danger");
    });


});