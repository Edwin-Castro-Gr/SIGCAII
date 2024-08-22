$(function () {
  // $("#div_otraentidad").css("display", "none");
  // $("#div-fecha").css("display", "none");

  $("#lbOtroCargo").css("display", "none");
  $("#lbOtroServicio").css("display", "none");

  $("#otroCargo").css("display", "none");
  $("#otroServicio").css("display", "none");

  $("#datosMedicamento").removeAttr("required");
  $("#registroSanitario").removeAttr("required");
  $("#loteMedicamento").removeAttr("required");
  $("#fechaVencimiento").removeAttr("required");

  $("#datosdispositivo").removeAttr("required");
  $("#registroSanitarioD").removeAttr("required");
  $("#lotedispositivo").removeAttr("required");
  $("#modelo").removeAttr("required");
  $("#numReferencia").removeAttr("required");
  $("#serial").removeAttr("required");
  $("#fabricante").removeAttr("required");
  $("#distibuidor").removeAttr("required");

  $("#div_Dato_Medicamentos").css("display", "none");
  $("#div_Dato_MedicamentosII").css("display", "none");

  $("#div_Datos_Tecnovigilancia").css("display", "none");
  $("#div_Datos_TecnovigilanciaII").css("display", "none");
  $("#div_Datos_TecnovigilanciaIII").css("display", "none");
  $("#div_Datos_TecnovigilanciaIV").css("display", "none");

  // $("#dispositivosEquipos").css("display", "none");



  let stip = 0;
  let txtmotivo = "";
  let txtservicio = "";
  let txtmensaje = "";
  let txtnombres = "";
  let txtapellidos = "";
  let txtdocumento = "";
  let txtdireccion = "";
  let txtemail = "";
  let txttelefono = "";
  let txtentidad = "";
  let txtotraentidad = "";

  if ($("#opc_pag").val() == "reportes") {
    cargar_listado();

    function cargar_listado() {
      Swal.fire({
        title: "Por favor espere!",
        text: "Cargando lista de Sucesos de Seguridad.",
        showConfirmButton: false,
      });

      $.post("/rep_suceso_seguridad/listar_tabla", {}, function (data_carg) {
        //alert(data_carg);
        $("#simple-table").DataTable().destroy();
        $("#simple-table").empty();
        $("#simple-table").append(data_carg);
        $("#simple-table").DataTable({
          language: {
            lengthMenu: "Mostrar _MENU_ registros por pagina",
            zeroRecords: "No se encontraron resultados en su busqueda",
            searchPlaceholder: "Buscar registros",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "No existen registros",
            infoFiltered: "(filtrado de _MAX_ registros)",
            search: "Buscar:",
            paginate: {
              first: "Primero",
              last: "Último",
              next: "Siguiente",
              previous: "Anterior",
            },
          },
          responsive: true,
        });
        $('[data-toggle="tooltip"]').tooltip();
        Swal.close();
      });
    }
  } else if ($("#opc_pag").val() == "index") {
    ////////////####### inicio smartwizard ########///////////////
    // Leave step event is used for validating the forms
    $("#smartwizard").on(
      "leaveStep",
      function (e, anchorObject, currentStepIdx, nextStepIdx, stepDirection) {
        // Validate only on forward movement
        if (stepDirection == "forward") {
          let form = document.getElementById("form-" + (currentStepIdx + 1));
          stip = currentStepIdx + 1;
          if (form) {
            if (!form.checkValidity()) {
              form.classList.add("was-validated");
              $("#smartwizard").smartWizard(
                "setState",
                [currentStepIdx],
                "error"
              );
              $("#smartwizard").smartWizard("fixHeight");
              return false;
            }
            $("#smartwizard").smartWizard(
              "unsetState",
              [currentStepIdx],
              "error"
            );
          }
        }
      }
    );

    // Step show event
    $("#smartwizard").on(
      "showStep",
      function (e, anchorObject, stepIndex, stepDirection, stepPosition) {
        $("#prev-btn").removeClass("disabled").prop("disabled", false);
        $("#next-btn").removeClass("disabled").prop("disabled", false);
        if (stepPosition === "first") {
          $("#prev-btn").addClass("disabled").prop("disabled", true);
        } else if (stepPosition === "last") {
          $("#next-btn").addClass("disabled").prop("disabled", true);
        } else {
          $("#prev-btn").removeClass("disabled").prop("disabled", false);
          $("#next-btn").removeClass("disabled").prop("disabled", false);
        }

        // Get step info from Smart Wizard
        let stepInfo = $("#smartwizard").smartWizard("getStepInfo");
        $("#sw-current-step").text(stepInfo.currentStep + 1);
        $("#sw-total-step").text(stepInfo.totalSteps);

        if (stepPosition == "last") {
          $("#btnFinish").prop("disabled", false);
        } else {
          $("#btnFinish").prop("disabled", true);
        }

        // Focus first name
        if (stepIndex == 1) {
          setTimeout(() => {
            $("#mensaje").focus();
          }, 0);
        }
      }
    );

    // Smart Wizard
    $("#smartwizard").smartWizard({
      selected: 0,
      // autoAdjustHeight: false,
      theme: "arrows", // basic, arrows, square, round, dots
      transition: {
        animation: "none",
      },
      toolbar: {
        showNextButton: false, // show/hide a Next button
        showPreviousButton: false, // show/hide a Previous button
        position: "bottom", // none/ top/ both bottom

        extraHtml: `<button class="btn btn-outline-secondary sw-btn-prev sw-prev radius-l-1 mr-2px" id="prev-btn"><i class="fa fa-arrow-left mr-15" id="prev-btn"></i> Anterior</button>
              						<button class="btn btn-outline-primary sw-btn-next sw-btn-hide sw-next radius-r-1" id="next-btn">Siguiente <i class="fa fa-arrow-right mr-15" id="next-btn"></i></button>
              						<button class="btn btn-success" id="btnFinish" disabled ">Guardar <i class="fa fa-check mr-15" id="btnFinish"></i></button>
                          <button class="btn btn-danger" id="btnCancel" >Salir <i class="fa fa-times mr-15" id="btnCancel"></i></button>`,
      },
      anchor: {
        enableNavigation: true, // Enable/Disable anchor navigation
        enableNavigationAlways: false, // Activates all anchors clickable always
        enableDoneState: true, // Add done state on visited steps
        markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
        unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
        enableDoneStateNavigation: true, // Enable/Disable the done state navigation
      },
    });

    // este onchange aplica a un id en especifico del documento ($("#state_selector"))
    $("#state_selector").on("change", function () {
      $("#smartwizard").smartWizard(
        "setState",
        [$("#step_to_style").val()],
        $(this).val(),
        !$("#is_reset").prop("checked")
      );
      return true;
    });

    $("#style_selector").on("change", function () {
      $("#smartwizard").smartWizard(
        "setStyle",
        [$("#step_to_style").val()],
        $(this).val(),
        !$("#is_reset").prop("checked")
      );
      return true;
    });

    ////////////####### fin smartwizard ########///////////////
  } else if ($("#opc_pag").val() == "gestion") {
  }

  $(document).on("click", function (event) {
    var datos = event.target.id.split("_");
    var dato = event.target.id;

    if (dato == "btn_sucess_modal") {
      idmes = $("#mes").val();
      // alert(idmes);
      let fecha = idmes.split("-");
      // alert(fecha[0]);
      // alert(fecha[1]);
      window.open("/rep_suceso_seguridad/excel/" + idmes, "_blank");
    }

    if (datos[0] == "btndetalle") {
      idreg = datos[1];

      $.post(
        "/rep_suceso_seguridad/ver_registro",
        { idreg: "" + idreg + "" },
        function (data_carg) {
          $("#modalForm1").html(data_carg);
        }
      );

      $("#view-registro").modal({
        show: true,
        keyboard: false,
      });
      return false;
    }

    if (dato == "btnFinish") {
      if ($("#poli_protdatos").val() == "on") {
        $("#txtpolitica").val("1");
      } else {
        $("#txtpolitica").val("0");
      }

      let form = document.getElementById("form-3");

      if (form) {
        if (!form.checkValidity()) {
          form.classList.add("was-validated");
          $("#smartwizard").smartWizard("setState", [3], "error");
          $("#smartwizard").smartWizard("fixHeight");
          return false;
        }
        $("#smartwizard").smartWizard("unsetState", [3], "error");
      }

      guardar_datos();
      return false;
    }

    if (dato == "btnCancel") {
      // Reset wizard
      $("#smartwizard").smartWizard("reset");

      // Reset form
      document.getElementById("form-1").reset();
      document.getElementById("form-2").reset();
      document.getElementById("form-3").reset();

      if ($("#formulariosucesos").val()) {
        window.open("/rep_suceso_seguridad/reportes", "_parent");
      } else {
        window.open("https://cecimin.com.co", "_parent");
      }
    }

    if (dato == "next-btn") {
      // alert(stip);
      // Etiquetas steep 1
      if (stip == 1) {
        $("#txtcargoReportante").val($("#cargoReportante").val());
        $("#txtservicio").val($("#servicio").val());
        $("#txtotroCargo").val($("#otroCargo").val());
        $("#txtotroServicio").val($("#otroServicio").val());
        $("#txtnombrePaciente").val($("#nombrePaciente").val());
        $("#txtnumeroDocumento").val($("#numeroDocumento").val());
        
      } else if (stip == 2) {
        // alert(stip);
        // Datos Medicamento
        $("#txtcausaNovedad").val($("#causaNovedad").val());
        $("#txtinformoJ").val($("#informoJ").val());
        $("#txtdatosMedicamento").val($("#datosMedicamento").val());
        $("#txtregistroSanitario").val($("#registroSanitario").val());
        $("#txtloteMedicamento").val($("#loteMedicamento").val());
        $("#txtfechaVencimiento").val($("#fechaVencimiento").val());

        // Datos del dispositivo
        $("#txtdatosdispositivo").val($("#datosdispositivo").val());
        $("#txtregistroSanitarioD").val($("#registroSanitarioD").val());
        $("#txtlotedispositivo").val($("#lotedispositivo").val());
        $("#txtmodelo").val($("#modelo").val());
        $("#txtnumReferencia").val($("#numReferencia").val());
        $("#txtserial").val($("#serial").val());
        $("#txtfabricante").val($("#fabricante").val());
        $("#txtdistibuidor").val($("#distibuidor").val());
        $("#txtdescripcionNovedad").val($("#descripcionNovedad").val());
        $("#txtmanejoRealizado").val($("#manejoRealizado").val());
      }
    }

    if (datos[0] == "btngestionar") {
      id_cont = datos[1];
      window.open("/rep_suceso_seguridad/gestion/" + id_cont, "_parent");
    }

    if (dato == "btn_guardar_gestion") {
      let ban = 0;
      let texto = "";
      if ($("#estado").val() == "2") {
        if (($('#clasificacionI').val() == "")) {
        $('#clasificacionI').addClass("brc-danger");
        texto = texto + "* La Clasificación Inicial es obligatoria!<br>";
        ban = 1;
        }

        if (($('#fechaA').val() == "")) {
          $('#fechaA').addClass("brc-danger");
          texto = texto + "* La Fecha de Analisis es obligatoria!<br>";
          ban = 1;
        }

        if (($('#investigacion').val() == "")) {
          $('#investigacion').addClass("brc-danger");
          texto = texto + "* Describa la Investigación del Suceso!<br>";
          ban = 1;
        }

        if (($('#conclusiones').val() == "")) {
          $('#conclusiones').addClass("brc-danger");
          texto = texto + "* Describa Las Conclusiones de la Investigación!<br>";
          ban = 1;
        }
        
        if (($('#accionesI').val() == "")) {
          $('#accionesI').addClass("brc-danger");
          texto = texto + "* Describa Las Acciones Inseguras Identificadas!<br>";
          ban = 1;
        }

        if (ban == 1) {
          Swal.fire("¡Atención!", texto, "warning");
        } else {
          guardar_gestion();
        }
        return false;
      }
      return false;
    }
  });

  function guardar_datos() {
    Swal.fire({
      title: "¡Atención!",
      text: "Enviando Información...!",
      icon: "warning",
      showConfirmButton: false,
    });

    var formData = new FormData(document.getElementById("form-3"));

    $.ajax({
      url: "/rep_suceso_seguridad/guardar",
      type: "POST",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      if (res >= 1) {
        Swal.fire({
          title: "¡Correcto!",
          text: "Registro Ingresado correctamente!",
          icon: "success",
        }).then((willDelete) => {
          if ($("#formulariosucesos").val()) {
            window.open("/rep_suceso_seguridad/reportes", "_parent");
          } else {
            window.open("https://cecimin.com.co", "_parent");
          }
        });
      } else {
        Swal.fire("¡Error!", res, "error");
      }
    });
    return false;
  }

  function guardar_gestion() {
    Swal.fire({
      title: "¡Atención!",
      text: "Guardando Información...!",
      icon: "warning",
      showConfirmButton: false,
    });

    var formData = new FormData(document.getElementById("form_gestion"));

    $.ajax({
      url: "/rep_suceso_seguridad/guardar_gestion",
      type: "POST",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      if (res >= 1) {
        Swal.fire({
          title: "¡Correcto!",
          text: "Registro Ingresado correctamente!",
          icon: "success",
        }).then((willDelete) => {
          window.open("/rep_suceso_seguridad/reportes", "_parent");
        });
      } else {
        Swal.fire("¡Error!", res, "error");
      }
    });
    return false;
  }

  // este onchange es generico sobre un evento cualquiera en el documeto
  $(document).on("change", function (event) {
    let datos = event.target.id.split("_");
    let dato = event.target.id;
    let ck = event.target.checked;

    // if para el evento de Id causaNovedad (uso de medicamento)
    if (dato == "2causaNovedad") {
      // alert("El evento de causa novedad")
      if ($("#causaNovedad option:selected").val() == "1") {
        // alert("El evento de option select 'Uso de medicamento'");
        $("#datosMedicamento").css("display", "flex"); // En la seccion superio se declara diplay: none, aca cambiamos el estado
      } else {
        $("#datosMedicamento").css("display", "none");
      }
    }
    // ------------ INICIO TEST RICH --------------------------------


    // -------- INICIO STEEP 1 --------------------------------


    // divOtroCargoSevicio

    // if para el evento de Id cargoReportante
    if (dato == "cargoReportante") {
      // alert("El evento de causa novedad")
      if ($("#cargoReportante option:selected ").val() == "11") {
        // alert("El evento de causa")
        $("#lbOtroCargo").css("display", "flex"); // En la seccion superio se declara diplay: none, aca cambiamos el estado
        $("#otroCargo").css("display", "flex");
        $("#otroCargo").prop("required", true);
        $("#smartwizard").smartWizard("fixHeight");
      } else {
        $("#lbOtroCargo").css("display", "none");
        $("#otroCargo").css("display", "none");
        $("#otroCargo").removeAttr("required");
      }
    }

    // if para el evento otro servicio

    if (dato == "servicio") {
      // alert("El evento de causa novedad")
      if ($("#servicio option:selected ").val() == "14") {
        // alert("El evento de causa")
        $("#lbOtroServicio").css("display", "flex"); // En la seccion superio se declara diplay: none, aca cambiamos el estado
        $("#otroServicio").css("display", "flex");
        $("#otroServicio").prop("required", true);
        $("#smartwizard").smartWizard("fixHeight");
      } else {
        $("#lbOtroServicio").css("display", "none");
        $("#otroServicio").css("display", "none");
        $("#otroServicio").removeAttr("required");
      }
    }


    // -------- FIN STEEP 1 --------------------------------



    // -------- INICIO STEEP 2 --------------------------------

    // If uso de medicamentos

    if (dato == "causaNovedad") {
      // alert("El evento de causa novedad")
      let causa = $("#causaNovedad option:selected ").val();

      if ($("#causaNovedad option:selected ").val() == "1") {
        // alert("El evento de causa")
        $("#div_Dato_Medicamentos").css("display", "flex");
        $("#div_Dato_MedicamentosII").css("display", "flex");

        $("#datosMedicamento").prop("required", true);
        $("#registroSanitario").prop("required", true);
        $("#loteMedicamento").prop("required", true);
        $("#fechaVencimiento").prop("required", true);

        $("#datosdispositivo").removeAttr("required");
        $("#registroSanitario").removeAttr("required");
        $("#lotedispositivo").removeAttr("required");
        $("#modelo").removeAttr("required");
        $("#numReferencia").removeAttr("required");
        $("#serial").removeAttr("required");
        $("#fabricante").removeAttr("required");
        $("#distibuidor").removeAttr("required");

        $("#div_Datos_Tecnovigilancia").css("display", "none");
        $("#div_Datos_TecnovigilanciaII").css("display", "none");
        $("#div_Datos_TecnovigilanciaIII").css("display", "none");
        $("#div_Datos_TecnovigilanciaIV").css("display", "none");
      
      }else if($("#causaNovedad option:selected ").val() == "2"){
        $("#datosMedicamento").removeAttr("required");
        $("#registroSanitario").removeAttr("required");
        $("#loteMedicamento").removeAttr("required");
        $("#fechaVencimiento").removeAttr("required");

        $("#div_Dato_Medicamentos").css("display", "none"); 
        $("#div_Dato_MedicamentosII").css("display", "none");

        $("#div_Datos_Tecnovigilancia").css("display", "flex");
        $("#div_Datos_TecnovigilanciaII").css("display", "flex");
        $("#div_Datos_TecnovigilanciaIII").css("display", "flex");
        $("#div_Datos_TecnovigilanciaIV").css("display", "flex");

        $("#datosdispositivo").prop("required", true);
        $("#registroSanitarioD").prop("required", true);
        $("#lotedispositivo").prop("required", true);
        $("#modelo").prop("required", true);
        $("#numReferencia").prop("required", true);
        $("#serial").prop("required", true);
        $("#fabricante").prop("required", true);
        $("#distibuidor").prop("required", true);

        
      }else{

        $("#datosdispositivo").removeAttr("required");
        $("#registroSanitarioD").removeAttr("required");
        $("#lotedispositivo").removeAttr("required");
        $("#modelo").removeAttr("required");
        $("#numReferencia").removeAttr("required");
        $("#serial").removeAttr("required");
        $("#fabricante").removeAttr("required");
        $("#distibuidor").removeAttr("required");

        $("#datosMedicamento").removeAttr("required");
        $("#registroSanitario").removeAttr("required");
        $("#loteMedicamento").removeAttr("required");
        $("#fechaVencimiento").removeAttr("required");

        $("#div_Datos_Tecnovigilancia").css("display", "none");
        $("#div_Datos_TecnovigilanciaII").css("display", "none");
        $("#div_Datos_TecnovigilanciaIII").css("display", "none");
        $("#div_Datos_TecnovigilanciaIV").css("display", "none");

        $("#div_Dato_Medicamentos").css("display", "none"); 
        $("#div_Dato_MedicamentosII").css("display", "none");       
        
      }

       $("#smartwizard").smartWizard("fixHeight");
      
    }

    // If Dispositivos biometricos


    // -------- FIN STEEP 2 --------------------------------

    // ------------ FIN TEST RICH --------------------------------

    if (dato == "entidadpaciente") {
      // alert($('#entidadpaciente option:selected').val());
      if ($("#entidadpaciente option:selected").val() == 4) {
        document.getElementById("div_otraentidad").style.display = "flex";
        $("#smartwizard").smartWizard("fixHeight");
      } else {
        document.getElementById("div_otraentidad").style.display = "none";
        $("#smartwizard").smartWizard("fixHeight");
      }
    }

    if (dato == "2motivo") {
      // $('#idmotivo').val($('#motivo option:selected').val());
      // alert($("#idmotivo").val());
      if (
        $("#motivo option:selected").val() == 2 ||
        $("#motivo option:selected").val() == 3
      ) {
        // alert($('#motivo option:selected').val());
        document.getElementById("div-fecha").style.display = "flex";
        $("#smartwizard").smartWizard("fixHeight");
      } else {
        // alert($('#motivo option:selected').val());
        document.getElementById("div-fecha").style.display = "none";
        $("#smartwizard").smartWizard("fixHeight");
      }
    }

    if ((dato = "2servicio")) {
      // $('#servicio').val($('#servicio option:selected').val());
    }
  });

  
  $(".UpperCase").on("keypress", function () {
    $input = $(this);
    setTimeout(function () {
      $input.val($input.val().toUpperCase());
    }, 50);
  });

  $(
    "input[type=text], input[type=email], input[type=password], checkbox, select, select2, input[type=number]"
  ).on("change", function (event) {
    $("#" + event.target.id).removeClass("brc-danger");
  });
});
