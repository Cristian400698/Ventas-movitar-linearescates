$(document).ready(function () {
    // Ocultar el campo de dirección en el formulario 1
    $("#direccion").hide();

    // Manejador de clic en el botón "mostrarFormulario2" del formulario 1
    $("#mostrarFormulario2").click(function () {
        $("#formulario2Container").css("display", "flex");  // Cambiar a display flex al mostrar el formulario 2 en el popup
        $("#direccion").show(); // Mostrar el campo de dirección una vez que se muestra el formulario 2
    });

    // Manejador de clic en el botón "cerrarFormulario2" del formulario 2
    $("#cerrarFormulario2").click(function () {
        $("#formulario2Container").hide(); // Ocultar el formulario 2 en el popup
    });

    // Manejador de clic en el botón "enviarFormulario2"
    $("#enviarFormulario2").click(function () {
        // Obtener los valores del formulario 2
        var direccion = $('#formulario2 select[name="Tdireccion"]').val();
        var numeroviaprincipal = $('#formulario2 input[name="numeroviaprincipal"]').val();
        var cartaprincipal = $('#formulario2 input[name="cartaprincipal"]').val();
        var caminoprincipalbis = $('#formulario2 input[name="caminoprincipalbis"]').is(":checked") ? "Camino principal bis" : "";
        var cuadrantedelaviaprincipal = $('#formulario2 select[name="cuadrantedelaviaprincipal"]').val();
        var numeroviasecundaria = $('#formulario2 input[name="numeroviasecundaria"]').val();
        var cartadeviasecundaria = $('#formulario2 input[name="cartadeviasecundaria"]').val();
        var viasecundaria = $('#formulario2 input[name="viasecundaria"]').is(":checked") ? "Vía secundaria" : "";
        var placa = $('#formulario2 input[name="placa"]').val();
        var cuadrantedelaviasecundaria = $('#formulario2 select[name="cuadrantedelaviasecundaria"]').val();
        // Concatenar la información
        var informacionFormulario2 = `${direccion} ${numeroviaprincipal} ${cartaprincipal} ${caminoprincipalbis} ${cuadrantedelaviaprincipal} ${numeroviasecundaria} ${cartadeviasecundaria} ${viasecundaria} ${placa} ${cuadrantedelaviasecundaria}`;
        // Mostrar confirmación antes de enviar la dirección
        var confirmacion = confirm("¿Estás seguro de enviar esta dirección?");
        if (confirmacion) {
            // Actualizar el campo "direccion" del formulario 1
            $("#direccion").val(informacionFormulario2);
            // Ocultar el botón del formulario 1
            $("#mostrarFormulario2").hide();
            // Ocultar el formulario 2
            $("#formulario2Container").hide();
        }
    });
});
