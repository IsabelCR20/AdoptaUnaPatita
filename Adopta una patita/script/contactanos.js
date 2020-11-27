document.addEventListener('DOMContentLoaded', function(){          
    $('#frmContacto').bootstrapValidator({        
        fields: {            
            txtNombre: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa tu nombre.'
                    },
                    stringLength:{
                        message: 'El nombre debe tener entre 3 y 50 caracteres.',
                        min: 3,
                        max: 50
                    }              
                }
            },
            txtTelefono:{
                validators:{                    
                    regexp:{
                        regexp: /^[0-9]{10}$/,
                        message: 'El número telefónico puede tener sólo 10 dígitos.'
                    },                    
                }
            },
            txtEmail: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa una dirección de correo electrónico.'
                    },
                    emailAddress:{
                        message: 'Dirección de correo electrónico inválida.'                       
                    }              
                }
            }, 
            txtMensaje: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa una breve descripción o mensaje para saber en qué te podemos ayudar.'
                    },
                    stringLength:{
                        message: 'El mensaje debe tener entre 10 y 200 caracteres',
                        min: 10,
                        max: 200
                    }              
                }
            }                  
        }
    });  
});