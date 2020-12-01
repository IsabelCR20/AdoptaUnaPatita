<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo-pata.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/estilos-adopta.css">
    <link rel="stylesheet" href="css/estilos-pie.css">
    <title>¡Adopta!</title>
</head>
<body>
    <!-- Menu -->
    <iframe id="frame-menu" src="menu.html" frameborder="0" scrolling="no" seamless></iframe>
    
    <!-- Contenido -->
    <h1>¡Encuentra a tu amigo fiel!</h1>
    <?php
      $listaMascotas;
      $listaRefugios;

      require_once "../Datos/MascotaDao.php";
      require_once "../Datos/RefugioDao.php";
      require_once "../Modelo/Mascota.php";

      $daoM = new MascotaDao();
      $daoR = new RefugioDao();

      $listaRefugios = $daoR->obtenerTodos();
      if(isset($_POST["cbRefugio"])){    // Hace busqueda por filtro
        $refugio = $_POST["cbRefugio"];
        $tamanio = $_POST["cbTamanio"];
        $sexo = $_POST["cbSexo"];
        $edad = $_POST["cbEdad"];
        $listaMascotas = $daoM->obtenerFiltro($refugio, $tamanio, $sexo, $edad);
        
        //var_dump($listaMascotas);
      } else {          // Muestra todo
         $listaMascotas =  $daoM->obtenerTodos();
      }
    ?>
    <div id="contenido col-sm-12">
        <!-- Filtro  -->
        <div id="cont-izq" class="col-sm-3">
            <div class="card">
                <div class="card-header estilo-titulo">
                    Filtro de búsqueda
                </div>
                <div class="card-body estilo-tarjeta">
                  <form id="frmFiltro" name="frmFiltro" method="POST">
                    <label for="cbRefugio">Refugio: </label>
                    <select id="cbRefugio" name="cbRefugio" class="form-control col-sm-11">
                        <option value="%">Cualquiera</option>
                        <?php
                          foreach($listaRefugios as $refugio){
                            echo '<option value="'.$refugio->Id_Refugio.'">'.$refugio->Nombre.'</option>';
                          }
                        ?>
                    </select><br>
                    <label for="cbTamanio">Tamaño: </label>
                    <select id="cbTamanio" name="cbTamanio" class="form-control col-sm-11">
                        <option value="%">Cualquiera</option>
                        <option value="Miniatura">Miniatura</option>
                        <option value="Pequeño">Pequeño</option>
                        <option value="Mediano">Mediano</option>
                        <option value="Grande">Grande</option>
                        <option value="Gigante">Gigante</option>
                    </select><br>
                    <label for="cbSexo">Sexo: </label>
                    <select id="cbSexo" name="cbSexo" class="form-control col-sm-11">
                        <option value="%">Cualquiera</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select><br>
                    <label for="cbEdad">Edad: </label>
                    <select id="cbEdad" name="cbEdad" class="form-control col-sm-11">
                        <option value="%">Cualquiera</option>
                        <option value="Cachorro">Cachorro</option>
                        <option value="Joven">Joven</option>
                        <option value="Adulto">Adulto</option>
                        <option value="Senior">Senior</option>
                    </select>
                    <br>
                  
                  <button id="btnFiltro" type="submit"> Buscar </button>
                  </form>
                </div>
              </div>
        </div>
        <!-- Perfiles -->
        <div id="cont-der" class="col-sm-8">
            <div class="card-deck">
                <?php 
                  foreach($listaMascotas as $mascota){
                    ?>
                      <div id="tarjeta<?=$mascota->Id_Mascota?>" class="card tarjeta-perfil col-sm-4">
                          <img src="<?=$mascota->Imagen1?>" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title"><?=$mascota->Nombre?></h5>
                            <p class="estilo-caracteristica">Sexo: </p>
                            <p class="estilo-res"><?php echo ($mascota->Sexo=='F')?'Femenino':'Masculino'; ?></p><br>
                            <p class="estilo-caracteristica">Edad: </p>
                            <p class="estilo-res"><?=$mascota->Edad?></p>
                            <form id="frmIDM<?=$mascota->Id_Mascota?>" name="frmIDM<?=$mascota->Id_Mascota?>" action="perfilMascota.php" method="POST">
                              <input type="text" name="idMascotaSel" id="idMascotaSel" style="display:none;" value="<?=$mascota->Id_Mascota?>" >
                            </form>
                          </div>
                      </div>
                    <?php
                  }
                ?>
                  
                
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
       <!-- JavaScript -->
    <script src="script/iframe-menu.js"></script>
    <script src="script/cargar-perfiles.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>