document.addEventListener('DOMContentLoaded', function(){          
    var imgs = document.getElementsByClassName("miniatura");
    for (let i = 0; i < imgs.length; i++){
        //imgs[i].classList.remove("active");
    } 
    //debugger;
    $('#frmPreguntaMascota').bootstrapValidator({        
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
            txtCiudad: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa tu ciudad.'
                    },
                    stringLength:{
                        message: 'La ciudad debe tener entre 3 y 50 caracteres.',
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
            txtMensaje: {
                validators: {
                    notEmpty:{
                        message: 'Por favor, ingresa tu mensaje o pregunta.'
                    },
                    stringLength:{
                        message: 'El mensaje debe tener entre 10 y 200 caracteres.',
                        min: 10,
                        max: 200
                    }              
                }
            }                 
        }
    });  
});

function cambiarImg(img){
    var imgs = $(".miniatura");
    for (let i = 0; i < imgs.length; i++){
        imgs[i].classList.remove("active");
    }        
    $("#imgPrincipal").attr("src", img.src);
    img.classList.add("active");
}; 