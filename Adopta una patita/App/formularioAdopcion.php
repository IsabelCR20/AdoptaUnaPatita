<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo-pata.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">    
    <link rel="stylesheet" href="css/bootstrapValidator.min.css">
    <!-- <link rel="stylesheet" href="bootstrapvalidator-0.5.2/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrapvalidator-0.5.2/dist/css/bootstrapValidator.min.css"> -->
    <link rel="stylesheet" href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos-form-adopcion.css">
    <link rel="stylesheet" href="css/estilos-pie.css">
    <title>Solicitud de adopción</title>
</head>
<body>
    <!-- Menu -->
    <iframe id="frame-menu" scrolling="no" seamless src="menu.html" frameborder="0"></iframe>

    <?php 
        require_once "../Datos/MascotaDao.php";
        $daoMascota=new MascotaDao();
        $mascota=null;
        if(isset($_POST["idMascotaSel"])){ 
            $mascota=$daoMascota->obtenerUno($_POST["idMascotaSel"]);
        }
    ?>

    <!-- Formulario -->
    <div class="formulario mx-auto w-form-adopcion mb-3 mt-3">
        <header>        
            <h1>Solicitud de Adopción</h1>
            <p>Por favor, llena esta solicitud de adopción para proporcionarnos datos sobre tu estilo de vida. Esto con la finalidad de verificar que se alinea con los requisitos de la mascota que deseas adoptar.</p>    
            <p>Estás aplicando para adoptar a:</p>
            <div class="mb-3 text-center">
                <img class="mx-auto" src="<?=isset($mascota->Imagen1)?$mascota->Imagen1:'';?>" style="height: 250px; display: block;">
                <h5 class="nombre"><?=isset($mascota->Nombre)?$mascota->Nombre:'';?></h5>
            </div>
        </header>

        <?php if(isset($_POST["idMascotaSel"])){?>
            <form method="GET" id="frmAdopcion">
                <div class="form-group">
                    <input type="text" name="txtNombre" class="form-control" placeholder="Nombre(s)*" required>                
                </div>
                <div class="form-group">
                    <input type="text" name="txtApellidos" class="form-control" placeholder="Apellido(s)*" required>               
                </div>
                <div class="form-group">
                    <input type="tel" name="txtTelefono" class="form-control" placeholder="Número de teléfono*" required>                
                </div>
                <div class="form-group">
                    <input type="email" name="txtEmail" class="form-control" placeholder="Correo electrónico*" required>                
                </div>            
                <div class="form-group">
                    <input type="text" name="txtDireccion" class="form-control" placeholder="Dirección*" required>                
                </div>
                <div class="form-group">
                    <input type="text" name="txtCiudad" class="form-control" placeholder="Ciudad y Estado*" required>                
                </div>

                <span style="font-size: 1.1rem;">Tipo de vivienda:</span>
                <div class="form-group">
                    <div class="form-check mt-1">                
                        <input class="form-check-input" type="radio" name="radioVivienda" id="radioCasa" value="Casa" checked>
                        <label class="form-check-label" for="radioCasa">Casa</label>                
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioVivienda" id="radioDepartamento" value="Departamento">
                        <label class="form-check-label" for="radioDepartamento">Departamento</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="radioVivienda" id="radioCondominio" value="Condominio">
                        <label class="form-check-label" for="radioCondominio">Condominio</label>
                    </div>
                </div>                           

                <span style="font-size: 1.1rem;">¿Rentas o eres dueño del lugar donde estás viviendo?</span>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="radio" name="radioPropiedad" id="radioDueno" value="Condominio" checked>
                    <label class="form-check-label" for="radioDueno">Soy el dueño</label>
                </div>
                <div class="form-check mb-3">                
                    <input class="form-check-input" type="radio" name="radioPropiedad" id="radioRenta" value="Casa">
                    <label class="form-check-label" for="radioRenta">Estoy rentando</label>                
                </div>   

                <div class="form-group">
                    <textarea class="form-control" rows="5" name="txtPersonas" placeholder="Ingresa tu edad y la de todas las personas que viven contigo. Especifica para cada persona si es alérgica al pelaje de algún tipo de animal*" required></textarea>                               
                </div>

                <span style="font-size: 1.1rem;">¿Con que frecuencia tienes visitas o huéspedes en tu vivienda?</span>
                <div class="form-check mt-1">                
                    <input class="form-check-input" type="radio" name="radioVisitas" id="radioCasiNunca" value="Casa" checked>
                    <label class="form-check-label" for="radioCasiNunca">Casi nunca (unas veces al año)</label>                
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioVisitas" id="radioSemiReg" value="Departamento">
                    <label class="form-check-label" for="radioSemiReg">Semi regularmente (algunas veces al mes)</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="radioVisitas" id="radioReg" value="Condominio">
                    <label class="form-check-label" for="radioReg">Regularmente (semanal o diario)</label>
                </div>

                <span style="font-size: 1.1rem;">¿Hay un adulto en tu vivienda durante el día?</span>
                <div class="form-check mt-1">                
                    <input class="form-check-input" type="radio" name="radioAdultoDia" id="radioAdultoDiaSi" value="Casa" checked>
                    <label class="form-check-label" for="radioAdultoDiaSi">Sí</label>                
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="radioAdultoDia" id="radioAdultoDiaNo" value="Departamento">
                    <label class="form-check-label" for="radioAdultoDiaNo">No</label>
                </div>

                <span style="font-size: 1.1rem;">¿Aproximadamente cuántas horas al día estará la mascota sola?</span>
                <div class="form-check mt-1">                
                    <input class="form-check-input" type="radio" name="radioHorasSola" id="radioMenosDe4Hrs" value="Casa" checked>
                    <label class="form-check-label" for="radioMenosDe4Hrs">Menos de 4 horas</label>                
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioHorasSola" id="radioHasta8Hrs" value="Departamento">
                    <label class="form-check-label" for="radioHasta8Hrs">De 4 a 8 horas</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="radioHorasSola" id="radioMasDe9Hrs" value="Departamento">
                    <label class="form-check-label" for="radioMasDe9Hrs">Más de 9 horas</label>
                </div>

                <span style="font-size: 1.1rem;">¿Dónde estará la mascota cuando esté sola?</span>
                <div class="form-check mt-1">                
                    <input class="form-check-input" type="radio" name="radioLugarSola" id="radioSuelta" value="Casa" checked>
                    <label class="form-check-label" for="radioSuelta">Suelta dentro de la vivienda</label>                
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioLugarSola" id="radioCuarto" value="Departamento">
                    <label class="form-check-label" for="radioCuarto">En una habitacón</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioLugarSola" id="radioJaula" value="Departamento">
                    <label class="form-check-label" for="radioJaula">En una jaula</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioLugarSola" id="radioSueltaPatio" value="Departamento">
                    <label class="form-check-label" for="radioSueltaPatio">Suelta en el patio</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioLugarSola" id="radioAmarradaPatio" value="Departamento">
                    <label class="form-check-label" for="radioAmarradaPatio">Amarrada en el patio</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="radioLugarSola" id="radioAzotea" value="Departamento">
                    <label class="form-check-label" for="radioAzotea">En la azotea</label>
                </div>            

                <div class="form-group">
                    <textarea class="form-control" rows="5" name="txtMascotas" placeholder="Enlista todas las mascotas que viven contigo; para cada una indica si ha sido esterilizada y describe su comportamiento alrededor de otros animales. Si no tienes otras mascotas escribe 'No' o 'No tengo'."></textarea>                               
                </div>

                <span style="font-size: 1.1rem;">Si tienes otros perros, selecciona su tamaño</span>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" id="chkPequeño" value="pequenio">
                    <label class="form-check-label" for="chkPequeño">Pequeño (Menos de 10 kilos)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="chkMediano" value="mediano">
                    <label class="form-check-label" for="chkMediano">Mediano (De 10 a 20 kilos)</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="chkGrande" value="grande">
                    <label class="form-check-label" for="chkGrande">Grande (Más de 20 kilos)</label>
                </div>               

                <span style="font-size: 1.1rem;">¿Cuál de los siguientes describe mejor tu estilo de vida?</span>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="radio" name="radioEstiloVida" id="radioMuyActivo" value="pequenio">
                    <label class="form-check-label" for="radioMuyActivo">Soy una persona muy activa (regularmente practico deportes o ejercicios)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioEstiloVida" id="radioActivo" value="mediano" checked>
                    <label class="form-check-label" for="radioActivo">Soy una persona activa (a veces hago caminatas o corro)</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="radioEstiloVida" id="radioRelajado" value="grande">
                    <label class="form-check-label" for="radioRelajado">Soy una persona relajada (prefiero pasar tiempo en casa)</label>
                </div>

                <div class="form-group mb-5">
                    <textarea class="form-control" rows="3" name="txtRazon" placeholder="Cuéntanos un poco sobre la razón por la cual quieres adoptar*" required></textarea>                                               
                </div>

                <p style="font-size: 1.1rem;">Todos los adoptantes deben ser mayores de edad y deberán presentar una identificación oficial en el momento de la adopción.</p>
                <span>Al seleccionar la siguiente casilla, estás de acuerdo en que entiendes este requerimiento:</span>
                <div class="form-group form-check mt-1 mb-4">
                    <input class="form-check-input" type="checkbox" name="chkMayorDeEdad" id="chkMayorDeEdad" value="grande" required>
                    <label class="form-check-label" for="chkMayorDeEdad">Tengo 18 años o más*</label>              
                </div>

                <div class="text-center">
                    <button id="btnEnviar" type="submit" class="btn btn-outline-success">Enviar solicitud de adopción</button>
                </div>
            </form>
        <?php }else{echo "Error al cargar el formulario de adopción de la mascota";} ?>
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
   <!-- <script src="bootstrapvalidator-0.5.2/dist/js/bootstrapValidator.min.js"></script> -->
    <script src="script/formularioAdopcion.js"></script>
</body>
</html>