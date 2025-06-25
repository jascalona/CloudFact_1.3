/**CALCULO DE VOLUMEN EN CARGA MANUAL */

/**CALCULO VOLUMEN B/N */
document.addEventListener('DOMContentLoaded', function () {
    const CONT_ANTE_BN = document.getElementById('cont_ante_bn');
    const CONT_ACTU_BN = document.getElementById('cont_actu_bn');
    const VOLUM_BN = document.getElementById('volum_bn');

    //Agregar los eventos input a ambos inputs
    CONT_ANTE_BN.addEventListener('input', actualizarResultado);
    CONT_ACTU_BN.addEventListener('input', actualizarResultado);

    //FUNCION DE CONVERSION
    function actualizarResultado() {
        const ante_bn = parseInt(CONT_ANTE_BN.value);
        const actu_bn = parseInt(CONT_ACTU_BN.value);

        if (isNaN(ante_bn) || isNaN(actu_bn)) {
            VOLUM_BN.value = '';
            //Formatear los campos en caso de que los datos ingresado no puedan ser calculados
        } else {
            const resultado = actu_bn - ante_bn;
            VOLUM_BN.value = resultado;
        }
    }
});

/**SCRIPT PARA VALIDAR QUE EL CONTADOR ACTUAL SEA MAYOR QUE EL CONTADOR ANTERIOR CASO B/N*/
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form'); // Selecciona el formulario
    const contActuBnInput = document.getElementById('cont_actu_bn');
    // Asumo que tienes un input con id="cont_ante_bn" para el contador anterior
    const contAnteBnInput = document.getElementById('cont_ante_bn');

    form.addEventListener('submit', function (e) {
        // Convertir los valores a números
        const contActu = parseFloat(contActuBnInput.value);
        const contAnte = parseFloat(contAnteBnInput.value);

        if (contActu < contAnte) {
            e.preventDefault(); // Detener el envío del formulario
            alert('El contador actual B/N no puede ser menor que el contador anterior B/N');
            contActuBnInput.focus(); // Enfocar el campo problemático
        }
    });

    // Validación en tiempo real (opcional)
    if (contActuBnInput && contAnteBnInput) {
        contActuBnInput.addEventListener('change', function () {
            const contActu = parseFloat(contActuBnInput.value);
            const contAnte = parseFloat(contAnteBnInput.value);

            if (contActu < contAnte) {
                alert('El contador actual B/N no puede ser menor que el contador anterior B/N');
                contActuBnInput.value = ''; // Limpiar el campo
                contActuBnInput.focus();
            }
        });
    }
});

/**SCRIPT PARA VALIDAR QUE EL CONTADOR ACTUAL SEA MAYOR QUE EL CONTADOR ANTERIOR CASO COLOR*/
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form'); // Selecciona el formulario
    const contActuColorInput = document.getElementById('cont_actu_color');
    const contAnteColorInput = document.getElementById('cont_ante_color');

    // Validación al enviar el formulario
    form.addEventListener('submit', function(e) {
        // Convertir los valores a números
        const contActu = parseFloat(contActuColorInput.value);
        const contAnte = parseFloat(contAnteColorInput.value);

        if (contActu < contAnte) {
            e.preventDefault(); // Detener el envío del formulario
            alert('El contador actual Color no puede ser menor que el contador anterior Color');
            contActuColorInput.focus(); // Enfocar el campo problemático
        }
    });

    // Validación en tiempo real (opcional)
    contActuColorInput.addEventListener('change', function() {
        const contActu = parseFloat(contActuColorInput.value);
        const contAnte = parseFloat(contAnteColorInput.value);

        if (contActu < contAnte) {
            alert('El contador actual Color no puede ser menor que el contador anterior Color');
            contActuColorInput.value = ''; // Limpiar el campo
            contActuColorInput.focus();
        }
    });
});




/**CALCULO VOLUMEN COLOR */
document.addEventListener('DOMContentLoaded', function () {
    const CONT_ANTE_COLOR = document.getElementById('cont_ante_color');
    const CONT_ACTU_COLOR = document.getElementById('cont_actu_color');
    const VOLUM_COLOR = document.getElementById('volum_color');

    //AGREGAR LOS EVENTOS INPUTS A AMBOS INPUTS
    CONT_ANTE_COLOR.addEventListener('input', actualizarResultado);
    CONT_ACTU_COLOR.addEventListener('input', actualizarResultado);

    //FUNCION DE CONVERSION
    function actualizarResultado() {
        const ante_color = parseInt(CONT_ANTE_COLOR.value);
        const actu_color = parseInt(CONT_ACTU_COLOR.value);

        if (isNaN(ante_color) || isNaN(actu_color)) {
            VOLUM_COLOR.value = '';
        } else {
            const resultado = actu_color - ante_color;
            VOLUM_COLOR.value = resultado;
        }
    }

});


/**CALCULO VOLUMEN SCANER */
document.addEventListener('DOMContentLoaded', function () {
    const CONT_ANTE_SCAN = document.getElementById('cont_ante_scan_images');
    const CONT_ACTU_SCAN = document.getElementById('cont_actu_scan_images');
    const VOLUM_SCAN = document.getElementById('volum_scan_images');


    /**AGREGAR LOS EVENTOS A LOS INPUTS */
    CONT_ANTE_SCAN.addEventListener('input', actualizarResultado);
    CONT_ACTU_SCAN.addEventListener('input', actualizarResultado);

    /**FUNCCION DE CONVERSION */
    function actualizarResultado() {
        const ante_scan = parseInt(CONT_ANTE_SCAN.value);
        const actu_scan = parseInt(CONT_ACTU_SCAN.value);

        if (isNaN(ante_scan) || isNaN(actu_scan)) {
            VOLUM_SCAN.value = '';
        } else {
            const resultado = actu_scan - ante_scan;
            VOLUM_SCAN.value = resultado;
        }

    }


});