$(document).ready(function() {         
    $('#frmAdopcion').bootstrapValidator({        
        fields: {            
            txtNombre: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa tu(s) nombre(s).'
                    },
                    stringLength:{
                        message: 'El nombre debe tener entre 3 y 50 caracteres.',
                        min: 3,
                        max: 50 
                    }              
                }
            },
            txtApellidos: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa tu(s) apellido(s).'
                    },
                    stringLength:{
                        message: 'Lo(s) apellido(s) debe(n) tener entre 3 y 50 caracteres.',
                        min: 3,
                        max: 50
                    }              
                }
            },
            txtTelefono:{
                validators:{ 
                    notEmpty:{
                        message: 'Por favor, ingresa un número telefónico.'
                    },                   
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
            txtDireccion: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa tu dirección.'
                    },
                    stringLength:{
                        message: 'La dirección debe tener entre 5 y 50 caracteres.',
                        min: 5,
                        max: 50
                    }              
                }
            }, 
            txtCiudad: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa tu ciudad.'
                    },
                    stringLength:{
                        message: 'La ciudad y estado deben tener entre 8 y 50 caracteres.',
                        min: 8,
                        max: 50
                    }              
                }
            },            
            txtPersonas: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa la información solicitada.'
                    },
                    stringLength:{
                        message: 'La información solicitada debe tener entre 10 y 300 caracteres.',
                        min: 10,
                        max: 300
                    }              
                }
            },
            txtMascotas: {
                validators: { 
                    notEmpty:{
                        message: 'Por favor, ingresa la información solicitada.'
                    },                   
                    stringLength:{
                        message: 'La información solicitada debe tener entre 10 y 300 caracteres.',
                        min: 10,
                        max: 300
                    }              
                }
            },
            txtRazon: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, describe brevemente tu razón para adoptar una mascota.'
                    },
                    stringLength:{
                        message: 'La información solicitada debe tener entre 10 y 200 caracteres.',
                        min: 10,
                        max: 200
                    }              
                }
            },
            chkMayorDeEdad: {
                validators: {
                    notEmpty: {
                        message: 'Por favor, selecciona la casilla si eres mayor de edad.'
                    }
                }
            }                    
        }
    });      
});

