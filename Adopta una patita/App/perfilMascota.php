﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo-pata.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrapValidator.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos-perfil-mascota.css">
    <link rel="stylesheet" href="css/estilos-pie.css">
    <title>Perfil Mascota</title>
</head>
<body>
    <!-- Menu -->
    <iframe id="frame-menu" scrolling="no" seamless src="menu.html" frameborder="0"></iframe>

    <!-- Contenido -->
    <?php
        require_once "../Datos/MascotaDao.php";
        require_once "../Datos/RefugioDao.php";
        $daoMascota=new MascotaDao();
        $daoRefugio=new RefugioDao();
        $mascota=null;
        $refugio=null;
        if(isset($_POST["claveMascota"])){ 
            $mascota=$daoMascota->obtenerUno($_POST["claveMascota"]);
            $refugio=$daoRefugio->obtenerUno($mascota->Id_Refugio);
        }
    ?>
    <div class="contenido">
        <div class="informacion mt-3">            
            <div class="infoMascota">   
                <div class="nombreMascota mb-3"> 
                    <h1>¡Hola, me llamo <?=isset($mascota)?$mascota->Nombre:'';?>!</h1>             
                </div>                  
                <div class="infoBasica">
                    <div class="imagenes mb-3">
                        <?php
                            if(isset($mascota)){
                                $imagen1 = $mascota->Imagen1;  
                                $imagen2 = $mascota->Imagen2;
                                $imagen3 = $mascota->Imagen3;
                            }                            
                        ?>
                        <div class="img-principal">
                            <img class="img-principal" src="<?=isset($imagen1)?$imagen1:'';?>" alt="imagen1Principal">
                        </div>
                        <div class="img-miniaturas">
                            <img class="img-principal" src="<?=isset($imagen1)?$imagen1:'';?>" alt="imagen1">
                            <?php if(!empty($imagen2)){ ?>                                                                
                                <img class="miniatura" src="<?=$imagen2?>" alt="imagen2">                                                                   
                            <?php }if(!empty($imagen3)){ ?>    
                                <img class="miniatura" src="<?=$imagen3?>" alt="imagen3"> 
                            <?php }?>                                                                  
                        </div>                                                      
                    </div> 
                    <div class="datosMascota">
                        <h4>Datos básicos</h4>
                        <div class="datosBasicos mb-2">
                            <span class="dato-bold">Raza: </span><span><?=isset($mascota)?$mascota->Raza:'';?></span><br>
                            <span class="dato-bold">Color: </span><span><?=isset($mascota)?$mascota->Color:'';?></span><br>
                            <span class="dato-bold">Sexo: </span><span><?=isset($mascota)?$mascota->Sexo:'';?></span><br>
                            <span class="dato-bold">Edad: </span><span><?=isset($mascota)?$mascota->Edad:'';?></span><br>                        
                            <span class="dato-bold">Peso: </span><span><?=isset($mascota)?$mascota->Peso:'';?></span><br>
                            <span class="dato-bold">Tamaño: </span><span><?=isset($mascota)?$mascota->Tamanio:'';?></span><br>
                            <span class="dato-bold">Esterilizado: </span><span><?=isset($mascota)?$mascota->Esterilizado:'';?></span><br>
                            <span class="dato-bold">Refugio: </span><a href="<?=isset($mascota)?$refugio->Sitio_web:'';?>"><?=isset($mascota)?$refugio->Nombre:'';?></a><br>
                        </div>  
                        <hr>
                        <h4>Un poco sobre mi</h4>
                        <div class="datosExtra">                            
                            <p><?=isset($mascota)?$mascota->Descripcion:'';?></p>                          
                        </div>              
                    </div>  
                </div>  
                <hr>
                <div class="historiaMascota">
                    <h4>Mi historia</h4>
                    <p><?=isset($mascota)?$mascota->Historia:'';?></p>
                </div>                                    
            </div>
            <div class="infoExtra">
                <form method="POST" action="#pregunta">
                    <div class="btnPregunta"><button type="submit" class="btn btn-outline-danger morado">¡Pregunta acerca de mi!</button></div>
                </form>
                <hr>
                <form method="POST" action="formularioAdopcion.html" target="_blank">
                    <div class="btnAdoptame"><button type="submit" class="btn btn-outline-success verde">¡Adóptame!</button></div>
                </form>
                <hr>
                <div class="card border-morado">                    
                    <div class="card-header bg-morado">
                        <h5 class="card-title"><?=isset($refugio)?$refugio->Nombre:'';?></h5>
                    </div> 
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <img class="img-info-refugio" src="img/locacion.png" alt="Locación">
                            <?=isset($refugio)?$refugio->Direccion:'';?>
                        </li>
                        <li class="list-group-item">
                            <img class="img-info-refugio" src="img/email.png" alt="Email">
                            <a href="mailto:<?=isset($refugio)?$refugio->Email:'';?>"><?=isset($refugio)?$refugio->Email:'';?></a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <form>
                            <div class="btnRefugio"><button type="button" class="btn btn-outline-danger morado">Conoce más</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card pregunta border-green">
            <a name="pregunta"></a>
            <div class="card-header mb-2 bg-green">
                <h5>¿Quieres saber algo más de mi? ¡Se lo puedes preguntar a mi refugio!</h5>
            </div>
            <div class="card-body">
                <form id="frmPreguntaMascota">
                    <div class="form-row">
                        <div class="form-group col-md-6">                            
                            <input type="text" class="form-control" name="txtNombre" placeholder="Nombre*" required>                           
                        </div>
                        <div class="form-group col-md-6">                            
                            <input type="text" class="form-control" name="txtApellidos" placeholder="Apellido(s)*" required>                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">                            
                            <input type="email" class="form-control" name="txtEmail" placeholder="Email*" required>                           
                        </div>
                        <div class="form-group col-md-3">                            
                            <input type="text" class="form-control" name="txtCiudad" placeholder="Ciudad*" required>                            
                        </div>
                        <div class="form-group col-md-3">                            
                            <input type="tel" class="form-control" name="txtTelefono" placeholder="Número de teléfono (opcional)">                            
                        </div>
                    </div>
                    <div class="form-row"> 
                        <div class="form-group col-md-6">                            
                            <textarea name="txtMensaje" class="form-control" rows="4" placeholder="Escribe aquí lo que quieres saber de Manchas...*" required></textarea>                            
                        </div> 
                        <div class="form-group col-md-6">
                            <div>
                                <button type="submit" class="btn btnEnviarPregunta btn-outline-success verde">Enviar mensaje</button>
                            </div>                            
                        </div> 
                    </div>
                </form>
            </div>            
        </div>
    </div>

    <!-- Pie de pagina -->
    <footer class="border-top">
        <div class="columna">
        <img src="img/logo-pata.png" alt="">
        </div>
        <div class="columna">
        <h3>Contacto</h3>
        <p><i class="fas fa-map-marker-alt"></i>Misión de San Pedro # 235, Colonia las misiones, Uriangato Gto.</p>
        <p><i class="fas fa-phone-square-alt"></i>4451326752</p>
        <p><i class="fas fa-envelope"></i>adoptaunapatita@gmail.com</p>
        </div>
        <div class="columna">
        <h3>Redes sociales</h3>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        
    </footer>

    <script src="script/jquery-3.5.1.js"></script>
    <script src="script/iframe-menu.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="script/bootstrapValidator.js"></script>
    <script src="script/perfilMascota.js"></script>
</body>
</html>