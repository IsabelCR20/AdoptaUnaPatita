$(document).ready(function(){
    $('#frmAgregar').bootstrapValidator({
        fields:{
            txtNombre: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa el nombre de la mascota.'
                    },
                    stringLength:{
                        message: 'El nombre debe tener entre 3 y 50 caracteres.',
                        min: 3,
                        max: 50 
                    }              
                }
            },
            txtRaza:{
                validators:{
                    notEmpty: {
                        message: 'Por favor, ingresa la raza de la mascota.'
                    },
                    stringLength:{
                        message: 'La raza debe tener entre 3 y 50 caracteres.',
                        min: 3,
                        max: 50 
                    } 
                }
            },
            txtColor:{
                validators:{
                    notEmpty: {
                        message: 'Por favor, ingresa el color de la mascota.'
                    },
                    stringLength:{
                        message: 'El color debe tener entre 3 y 50 caracteres.',
                        min: 3,
                        max: 50 
                    } 
                }
            },
            txtEdad:{
                validators:{
                    notEmpty: {
                        message: 'Por favor, ingresa la edad de la mascota.'
                    },
                    stringLength:{
                        message: 'La edad debe tener entre 3 y 50 caracteres.',
                        min: 3,
                        max: 50 
                    } 
                }
            },
            txtPeso:{
                validators:{
                    notEmpty: {
                        message: 'Por favor, ingresa el peso de la mascota.'
                    },
                    stringLength:{
                        message: 'El peso debe tener entre 3 y 50 caracteres.',
                        min: 3,
                        max: 50 
                    } 
                }
            },
            txtTamanio:{
                validators:{
                    notEmpty: {
                        message: 'Por favor, ingresa el tamaño de la mascota.'
                    },
                    stringLength:{
                        message: 'El tamaño debe tener entre 3 y 50 caracteres.',
                        min: 3,
                        max: 50 
                    } 
                }
            },
            txtDescripcion:{
                validators:{
                    notEmpty: {
                        message: 'Por favor, ingresa la descripción de la mascota.'
                    },
                    stringLength:{
                        message: 'La descripción debe tener entre 3 y 1000 caracteres.',
                        min: 3,
                        max: 1000 
                    } 
                }
            },
            txtHistoria:{
                validators:{
                    notEmpty: {
                        message: 'Por favor, ingresa la historia de la mascota.'
                    },
                    stringLength:{
                        message: 'El peso debe tener entre 3 y 1000 caracteres.',
                        min: 3,
                        max: 1000 
                    } 
                }
            }
        }
    });
});