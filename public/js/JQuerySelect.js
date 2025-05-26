/**
 * AUTO COMPLETADO PARA FORMULARIO DE CARGA LECTURAS MANUALES
 * SE IMPLEMNTA ATRAVEZ DE AJAX
 */

$(document).ready(function(){
    $('#select_serial').change(function() {
        var id = $(this).val();

    if (id) {
            $.ajax({
                url: 'http://127.0.0.1:8000/LCustomer5008709' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('#model').val(data.model);
                    $('#rif').val(data.rif);
                }

            });
        }
    });

});