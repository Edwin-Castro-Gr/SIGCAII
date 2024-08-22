$(function () {

  
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input[type=text]').forEach(node => node.addEventListener('keypress', e => {
            if (e.keyCode == 13) {
                e.preventDefault();
            }
        }));
    });

    
    if ($('#opc_pag').val() == "listado") { 
        
        cargar_listado();

        function cargar_listado() {
             
            Swal.fire({
                title: "Por favor espere!",
                text: "Cargando lista de Agendamiento Quirurgico.",
                showConfirmButton: false
            });

            $.post("/c_seguimientocx/listar_tabla", {}, function (data_carg) {
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
    }

    else if ($('#opc_pag').val() == "nuevo") { 

        $("#fechaprogramacion").inputmask("99/99/9999");        
        $("#horaprogramacion").inputmask("99:99");
        $("#tiempohoras").inputmask("99:99");
       
        $('#procedimientos_seguimiento').select2({
            placeholder: 'Seleccione el procedimiento...',
            width: "95%",
            allowClear: true
        });

        $('#procedimientos_seguimiento').trigger('change');

        $('#cirujano_programacion').select2({
            width: "95%",
            allowClear: true
        });
        $('#cirujano_programacion').trigger('change');

        $('#ayudantes_programacion').select2({
            width: "95%",
            allowClear: true
        });

        $('#ayudantes_programacion').trigger('change');

        $('#anestesiologo_programacion').select2({
            width: "95%",
            allowClear: true
        });
        $('#anestesiologo_programacion').trigger('change');
    }

    else if ($('#opc_pag').val() == "modificar") { 

      $('#lblretraso').css('display','flex');
      $('#inpretraso').css('display','flex');

      $('#div_cancelación').css('display','none');
      $('#btn_actualizar').css('display','none');

      $('#lblIantibiotico').css('display','none');
      $('#inpIantibiotico').css('display','none');

      $('#lblfantibiotico').css('display','none');
      $('#inpfantibiotico').css('display','none');

      $('#div_cual').css('display','none');
      $('#procedimientos_seguimiento').prop('disabled', true);
      $('#cirujano_programacion').prop('disabled', true);
      $('#ayudantes_programacion').prop('disabled', true);
      $('#anestesiologo_programacion').prop('disabled', true);
      $('#eps_pacientes').prop('disabled', true);


    }

    // ****** Funciones ****** //

     $(document).on("click", function (event) {
        var datos = event.target.id.split("_");
        var dato = event.target.id;

        if (datos[0] == "btneditar") {
            idreg = datos[1];
            // $('#newModalLabel').html('Modificar contratos con terceros');

            window.open('/c_seguimientocx/modificar/' + idreg, '_parent');

            return false;
        } 
        
        if (dato == "cancelacionQx") {
          let id_cirugiap = $('#id_cirugia').val();
          //crear el div que contiene modal
          const modal = document.getElementById('view-modal');
          const div_modal_dialog = D.create('div',{role:'document'});
          const div_modal_content = D.create('div');
          const div_modal_header = D.create('div');
          
          //crear los elementos de la cabecera
          const h4_modal_title = D.create('h4', {id:'myModalLabel', textContent:'Motivo o Causa de la Cancelación'});
          const button_close = D.create('button', { type: 'button'});
          
          const div_modal_body = D.create('div', {id:'modalFormBody'});
          //crear el formulario
          const form_horizontal = D.create('form', {action: 'c_seguimientocx/guardar_cancelacion', autocomplete: 'off', method:'post', id:'modalForm1'});
          
          //crear los elementos de formulario
          const div_form_group_motivo = D.create('div', {id:'div_motivo'});
          const div_lblmotivo_col = D.create('div');
          const div_inputmotivo_col = D.create('div');

          const label_motivo = D.create('label', { htmlFor: 'motivo', textContent: 'Motivo o Causa'});
          const input_motivo = D.create('input', { type: 'text', id: 'motivo', name: 'motivo'});
          
          const div_form_group_observaciones = D.create('div', {id:'div_observaciones'});
          const div_lblobservaciones_col = D.create('div');
          const div_inputobservaciones_col = D.create('div');

          const label_observaciones = D.create('label', { htmlFor: 'observaciones', textContent: 'Observaciones'});

          const input_id_cirugia = D.create('input', { type: 'hidden', id: 'id_cirugiap', name: 'id_cirugiap'});
          const input_Observaciones = D.create('textarea', { rows: '2', id: 'observaciones', name: 'observaciones', autocomplete: 'off', placeholder: 'Digite las observaciones si se requiere'});
         
          const div_modal_footer = D.create('div');          
          const button_guradar = D.create('button', {id:'btn_guardarC', textContent: 'Guardar'});
          const button_cancel = D.create('button', {id:'btn_cancelar_modal', textContent: 'Cancelar'});

          //agregar clases a los elementos
          div_modal_dialog.classList.add('modal-dialog','modal-dialog-centered');
          div_modal_content.classList.add('modal-content');
          div_modal_header.classList.add('modal-header', 'card-success');

          h4_modal_title.classList.add('modal-title','text-blue');
          button_close.classList.add('close');

          div_modal_body.classList.add('modal-body','text-blue');

          form_horizontal.classList.add('form-horizontal','m-t-30');

          div_form_group_motivo.classList.add('form-group','row');
          div_lblmotivo_col.classList.add('col-sm-2','col-form-label','text-sm-right','pr-0');

          div_form_group_observaciones.classList.add('form-group','row');
          div_lblobservaciones_col.classList.add('col-sm-2','col-form-label','text-sm-right','pr-0');

          label_motivo.classList.add('mb-0');
          label_observaciones.classList.add('mb-0');

          input_id_cirugia.classList.add('form-horizontal','m-t-30');

          div_inputmotivo_col.classList.add('col-sm-10','col-xs-1');
          input_motivo.classList.add('form-control');

          div_inputobservaciones_col.classList.add('col-sm-10','col-xs-1');
          input_Observaciones.classList.add('form-control');


          div_modal_footer.classList.add('modal-footer');
          button_guradar.classList.add('btn','btn-success','waves-effect');
          button_cancel.classList.add('btn', 'btn-danger','waves-effect');

          button_close.setAttribute('data-dismiss','modal');
          button_close.setAttribute('aria-hidden','true');

          button_cancel.setAttribute('data-dismiss','modal');

           //agregar cada etiqueta a su nodo padre

          D.append([h4_modal_title, button_close], div_modal_header);
          
          D.append(label_motivo, div_lblmotivo_col);
          D.append(input_motivo, div_inputmotivo_col);
          D.append([div_lblmotivo_col, div_inputmotivo_col], div_form_group_motivo);

          D.append(label_observaciones, div_lblobservaciones_col);
          D.append([input_id_cirugia, input_Observaciones], div_inputobservaciones_col);
          D.append([div_lblobservaciones_col, div_inputobservaciones_col], div_form_group_observaciones);

          D.append([button_guradar,button_cancel], div_modal_footer);

          D.append([div_form_group_motivo, div_form_group_observaciones, div_modal_footer], form_horizontal);
          
          D.append(form_horizontal, div_modal_body);
          D.append([div_modal_header, div_modal_body], div_modal_content);

          D.append(div_modal_content, div_modal_dialog);
          D.append(div_modal_dialog, modal);
          
          $('#view-modal').modal({
            show: true,
            keyboard: false
          });  
          $('#id_cirugiap').val(id_cirugiap);
          return false;
        } 

        if (dato == "cursoQx") {
            $('#modal-curso').modal({
            show: true,
            keyboard: false
          });
            return false;
        } 

        if (dato == "seguimientoP") {
            $('#modal-seguimiento').modal({
            show: true,
            keyboard: false
          });
            return false;
        } 

        if(dato == "btn_guardarC"){
          var ban = 0;
          var texto = '';
          if (($('#motivo').val() == "")) {
            $('#motivo').addClass("brc-danger");
            texto = texto + "* El Motivo de la cancelación es obligatoria!<br>";
            ban = 1;
          }
          if ($('#observaciones').val() == "") {
            $('#observaciones').addClass("brc-danger");
            texto = texto + "* La Observaciones son obligatorias!<br>";
            ban = 1;
          }

          if (ban == 1) {
            Swal.fire("¡Atención!", texto, "warning");
          } else {
            guardar_cancelacion();
          }
          return false;

        }

        if (dato == "btn_excel"){
          $('#modal_excel').modal({
            show: true,
            keyboard: false
          });
          return false;
        }

        if (dato == "btn_guardarcurso"){
          alert("Guardando el Curso Qx");
          var ban = 0;
          var texto = '';
          if (($('#especialista').val() == "")) {
            $('#especialista').addClass("brc-danger");
            texto = texto + "* La Especialidad es obligatoria!<br>";
            ban = 1;
          }
          if ($('#anestecia').val() == "") {
            $('#anestecia').addClass("brc-danger");
            texto = texto + "* El tipo de anestesias es obligatorios!<br>";
            ban = 1;
          }

          if ($('#artroscopio').val() == "") {
            $('#artroscopio').addClass("brc-danger");
            texto = texto + "* Uso o no Artroscopio!<br>";
            ban = 1;
          }

          if ($('#intrumentadora').val() == "") {
            $('#intrumentadora').addClass("brc-danger");
            texto = texto + "* Instrumentadora si o no!<br>";
            ban = 1;
          }
          
          if ($('#iniciosino').val() == "") {
            $('#iniciosino').addClass("brc-danger");
            texto = texto + "* La Cirugia inicio a tiempo si o no!<br>";
            ban = 1;
          }

          if ($('#iniciosino').val() == "2") {
            if ($('#retraso').val() == "") {
              $('#retraso').addClass("brc-danger");
              texto = texto + "* Seleccione la causa del restraso!<br>";
              ban = 1;
            }
          }

          if ($('#retraso').val() =="8" || $('#retraso').val() =="21"){
            if ($('#retrasoCual').val() == "") {
              $('#retrasoCual').addClass("brc-danger");
              texto = texto + "* Cual fue la causa del restraso!<br>";
              ban = 1;
            }
          }
          if ($('#tiempoQx').val() == "") {
            $('#tiempoQx').addClass("brc-danger");
            texto = texto + "* El tiempo de la Quirurgíco es obligatorio!<br>";
            ban = 1;
          }

          if ($('#tanestesia').val() == "") {
            $('#tanestesia').addClass("brc-danger");
            texto = texto + "* El tiempo de la anestecia es obligatorio!<br>";
            ban = 1;
          }

          if ($('#nprocedimientos').val() == "") {
            $('#nprocedimientos').addClass("brc-danger");
            texto = texto + "* El numero de procedimiento es obligatorio!<br>";
            ban = 1;
          }
          
          if ($('#antibiotico').val() == "") {
            $('#antibiotico').addClass("brc-danger");
            texto = texto + "* El procedimiento es obligatorio!<br>";
            ban = 1;
          }

          if ($('#inicirugia').val() == "") {
            $('#inicirugia').addClass("brc-danger");
            texto = texto + "* El cirujano es obligatorio!<br>";
            ban = 1;
          }

          if ($('#muestrasino').val() == "") {
            $('#muestrasino').addClass("brc-danger");
            texto = texto + "* Muestra patologica Si o No!<br>";
            ban = 1;
          }

          if ($('#tiempohoras').val() == "") {
            $('#tiempohoras').addClass("brc-danger");
            texto = texto + "* El tiempo de la cirugia es obligatorio!<br>";
            ban = 1;
          }

          if ($('#mat').val() == "") {
            $('#mat').addClass("brc-danger");
            texto = texto + "* El MAT es obligatorio!<br>";
            ban = 1;
          }   

          if (ban == 1) {
            Swal.fire("¡Atención!", texto, "warning");
          } else {
            guardar_registro();
          }
          return false;
        }
          
        if(dato == "btn_guardar"){
          var ban = 0;
          var texto = '';
          if (($('#cedula').val() == "")) {
            $('#cedula').addClass("brc-danger");
            texto = texto + "* El Numero de cedula es obligatorio!<br>";
            ban = 1;
          }
          if ($('#paciente').val() == "") {
            $('#paciente').addClass("brc-danger");
            texto = texto + "* Los Nombres del paciente son obligatorios!<br>";
            ban = 1;
          }

          if ($('#edad').val() == "") {
            $('#edad').addClass("brc-danger");
            texto = texto + "* la edad es obligatoria!<br>";
            ban = 1;
          }

          if ($('#eps_pacientes').val() == "") {
            $('#eps_pacientes').addClass("brc-danger");
            texto = texto + "* la entidad pagadora es obligatoria!<br>";
            ban = 1;
          }
          
          if ($('#telefono').val() == "") {
            $('#telefono').addClass("brc-danger");
            texto = texto + "* El telefono es obligatorio!<br>";
            ban = 1;
          }

          if ($('#entidad_pacientes').val() == "") {
            $('#entidad_pacientes').addClass("brc-danger");
            texto = texto + "* La Entidad es obligatoria!<br>";
            ban = 1;
          }

          if ($('#fechaprogramacion').val() == "") {
            $('#fechaprogramacion').addClass("brc-danger");
            texto = texto + "* La Fecha de Cirugia es obligatoria!<br>";
            ban = 1;
          }

          if ($('#horaprogramacion').val() == "") {
            $('#horaprogramacion').addClass("brc-danger");
            texto = texto + "* La hora de la cirugia es obligatoria!<br>";
            ban = 1;
          }

          if ($('#horaprogramacion').val() == "") {
            $('#horaprogramacion').addClass("brc-danger");
            texto = texto + "* La hora de la cirugia es obligatoria!<br>";
            ban = 1;
          }

          if ($('#sala').val() == "") {
            $('#sala').addClass("brc-danger");
            texto = texto + "* La sala es obligatoria!<br>";
            ban = 1;
          }
          
          if ($('#procedimientos_seguimiento').val() == "") {
            $('#procedimientos_seguimiento').addClass("brc-danger");
            texto = texto + "* El procedimiento es obligatorio!<br>";
            ban = 1;
          }

          if ($('#cirujano_programacion').val() == "") {
            $('#cirujano_programacion').addClass("brc-danger");
            texto = texto + "* El cirujano es obligatorio!<br>";
            ban = 1;
          }

          if ($('#anestesiologo_programacion').val() == "") {
            $('#anestesiologo_programacion').addClass("brc-danger");
            texto = texto + "* El anestesiologo es obligatorio!<br>";
            ban = 1;
          }

          if ($('#tiempohoras').val() == "") {
            $('#tiempohoras').addClass("brc-danger");
            texto = texto + "* El tiempo de la cirugia es obligatorio!<br>";
            ban = 1;
          }

          if ($('#mat').val() == "") {
            $('#mat').addClass("brc-danger");
            texto = texto + "* El MAT es obligatorio!<br>";
            ban = 1;
          }   

          if (ban == 1) {
            Swal.fire("¡Atención!", texto, "warning");
          } else {
            guardar_registro();
          }
          return false;
        }
    });

    $(document).on("change", function (event) {
      var datos = event.target.id.split("_");
      var dato = event.target.id;
      var ck= event.target.checked;

      if($('#retraso')){
        if ($('#retraso option:selected').val() =="8" || $('#retraso option:selected').val() =="21"){
          
          $('#div_cual').css('display','flex');
        }else{
          $('#div_cual').css('display','none');
        }
      }

      if($('#ubicacion')){                
        $('#btn_actualizar').css('display','block');
      }else{
        $('#btn_actualizar').css('display','none');
      }
        
      if($('#retraso')){
        if ($('#iniciosino option:selected').val() == "1") {          
          $('#lblretraso').css('display','none');
          $('#inpretraso').css('display','none');
        }else{
          $('#lblretraso').css('display','flex');
          $('#inpretraso').css('display','flex');
        }
      }

      if($('#antibiotico')){
        if ($('#antibiotico option:selected').val() == "") { 
          $('#lblIantibiotico').css('display','none');
          $('#inpIantibiotico').css('display','none');

          $('#lblfantibiotico').css('display','none');
          $('#inpfantibiotico').css('display','none');         
        }else{
          $('#lblIantibiotico').css('display','flex');
          $('#inpIantibiotico').css('display','flex');

          $('#lblfantibiotico').css('display','flex');
          $('#inpfantibiotico').css('display','flex');
        }
      }
    });

    function guardar_registro() {
      Swal.fire({
          title: "¡Atención!",
          text: "Guardando Información...!",
          icon: "warning",
          showConfirmButton: false
      });
      var datos_form = $("#form_guardar").serialize();
      //alert(datos_form);
      $.post("/c_seguimientocx/guardar", datos_form, function (data_form) {
        //alert(data_form);
        Swal.close();
        if (data_form == "1") {
          jQuery(function () {
            Swal.fire({
              title: "¡Correcto!",
              text: "Registro ingresado correctamente!",
              icon: "success"
            })
            .then((willDelete) => {
              window.open('/c_seguimientocx/index', '_parent');
            });
          });
        } else {
            Swal.fire("¡Error!", data_form, "error");
        }
      });
    }

    function guardar_cancelacion(){
      Swal.fire({
        title: "¡Atención!",
        text: "Guardando Información...!",
        icon: "warning",
        showConfirmButton: false
      });
      var datos_form = $("#modalForm1").serialize();
      //alert(datos_form);
      $.post("/c_seguimientocx/guardar_cancelacion", datos_form, function (data_form) {
        //alert(data_form);
        Swal.close();
        if (data_form == "1") {
          jQuery(function () {
            Swal.fire({
              title: "¡Correcto!",
              text: "Registro ingresado correctamente!",
              icon: "success"
            })
            .then((willDelete) => {
              window.open('/c_seguimientocx/index', '_parent');
            });
          });
        } else {
            Swal.fire("¡Error!", data_form, "error");
        }
      });
    }

     $(".UpperCase").on("keypress", function () {
        $input = $(this);
        setTimeout(function () {
            $input.val($input.val().toUpperCase());
        }, 50);
    });

     $("#escalaDolor").TouchSpin({
          verticalbuttons: false,

          min: 0,
          max: 10,
          step: 1,
          decimals: 0,
          boostat: 1,
          maxboostedstep: 0,
          
          buttondown_class: 'btn btn-xs btn-primary',
          buttonup_class: 'btn btn-xs btn-primary',

          verticaldownclass: '',
          verticalupclass: '',

          verticaldown: '<i class="fa fa-caret-down"></i>',
          verticalup: '<i class="fa fa-caret-up"></i>',
        })


    $('input[type=text], input[type=email], input[type=password],  select, select2, input[type=number]').on("change", function (event) {
        $('#' + event.target.id).removeClass("brc-danger");
    });

});