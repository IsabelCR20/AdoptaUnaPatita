$(document).ready(function () { // Asegurase de que el documento este cargado
    $("#frmLogin").validate({ //Iniciar el plugin con el id del formulario
        rules: {                   // Especificar las reglas
            txtEmail: {             //Usar nombre de los elementos del formulario, NO el id
                required: true
            },
            txtPass: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            txtEmail: "Ingresa un correo válido!",
            txtPass: {
                required: "Ingresa tu contraseña!",
                minlength: "La contraseña debe contener al menos 8 caracteres!"
            }
        }
    })
});


// Configurar valores por defecto para adaptarlo a Booststrap 4
jQuery.validator.setDefaults({
    onfocusout: function (e) {
        this.element(e);
    },
    onkeyup: false,

    highlight: function (element) {
        jQuery(element).closest('.form-control').addClass('is-invalid');
    },
    unhighlight: function (element) {
        jQuery(element).closest('.form-control').removeClass('is-invalid');
        jQuery(element).closest('.form-control').addClass('is-valid');
    },

    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group-prepend').length) {
            $(element).siblings(".invalid-feedback").append(error);
        } else {
            error.insertAfter(element);
        }
    },
});