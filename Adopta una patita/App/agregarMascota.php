<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos-menu.css">
    <title>Agregar mascota</title>
</head>
<body>
    <?php
        require_once '../Datos/MascotaDao.php';
        require_once '../Modelo/Mascota.php';
        $dao = new MascotaDao();
        session_start();
        if(isset($_SESSION['email'])){
    ?>
    <nav class="estilos navbar navbar-expand-lg navbar-light bg-light bg-white border-bottom">
        <a class="navbar-brand" href="#">
            <img src="img/logo-grande.JPG" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="vistaAdmin.php">Lista de mascotas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Agregar<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline" action="script/cerrar-sesion.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            //var_dump($_POST);
            //echo "<br> Cosas de archivos: ";
            //var_dump($_FILES['imagen']['name'][0]);
            //$esterilizado = isset($_POST['chkEsterilizado'])?true:false;
            $esterilizado = isset($_POST['chkEsterilizado'])?1:0;
            echo "<br>";
            //var_dump($esterilizado);
            $nuevo = new Mascota();
            $nuevo->Nombre = $_POST['txtNombre'];
            $nuevo->Raza = $_POST['txtRaza'];
            $nuevo->Color = $_POST['txtColor'];
            $nuevo->Sexo = $_POST['gridRadios'];
            $nuevo->Edad = $_POST['txtEdad'];
            $nuevo->Peso = $_POST['txtPeso'];
            $nuevo->Tamanio = $_POST['txtTamanio'];
            $nuevo->Esterilizado = $esterilizado;
            $nuevo->Descripcion = $_POST['txtDescripcion'];
            $nuevo->Historia = $_POST['txtHistoria'];
            $nuevo->Id_Refugio   = 1;
            if($_FILES['imagen']['size'][0] >= 1 && $_FILES['imagen']['size'][0] <= 100000){
                if($_FILES['imagen']['size'][1] >= 0 && $_FILES['imagen']['size'][1] <= 100000){
                    if($_FILES['imagen']['size'][2] >= 0 && $_FILES['imagen']['size'][2] <= 100000){
                        if($dao->agregar($nuevo, $_FILES)){
                            $_SESSION['msgCorrecto'] = "1";
                        }else{
                            $_SESSION['msgCorrecto'] = "2";
                        }
                        header("Location: agregarMascota.php");
                    }else{
                        $_SESSION['imgError3'] = "1";
                    }
                }else{
                    $_SESSION['imgError2'] = "1";
                }
            }else{
                $_SESSION['imgError1'] = "1";
            }
        }
    ?>


    <div class="container my-5 p-5 bg-light">
        <form enctype="multipart/form-data" method="post" id="frmAgregar">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" value=<?=isset($_POST['txtNombre'])?$_POST['txtNombre']:"";?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="txtRaza" class="col-sm-2 col-form-label">Raza:</label>
                <div class="col-sm-10">
                    <input type="text" name="txtRaza" id="txtRaza" class="form-control" value=<?=isset($_POST['txtRaza'])?$_POST['txtRaza']:"";?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="txtColor" class="col-sm-2 col-form-label">Color:</label>
                <div class="col-sm-10">
                    <input type="text" name="txtColor" id="txtColor" class="form-control" value=<?=isset($_POST['txtColor'])?$_POST['txtColor']:"";?>>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Sexo:</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="M" <?=isset($_POST['gridRadios'])&&$_POST['gridRadios']=="M"?"checked":"";?> <?=!isset($_POST['gridRadios'])?"checked":"";?> class="form-control">
                            <label class="form-check-label" for="gridRadios1">
                                Macho
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="H" <?=isset($_POST['gridRadios'])&&$_POST['gridRadios']=="H"?"checked":"";?> class="form-control">
                            <label class="form-check-label" for="gridRadios2">
                                Hembra
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="txtEdad" class="col-sm-2 col-form-label">Edad:</label>
                <div class="col-sm-10"><input type="text" name="txtEdad" id="txtEdad" class="form-control" value=<?=isset($_POST['txtEdad'])?$_POST['txtEdad']:"";?>></div>
            </div>
            <div class="form-group row">
                <label for="txtPeso" class="col-sm-2 col-form-label">Peso:</label>
                <div class="col-sm-10"><input type="text" name="txtPeso" id="txtPeso" class="form-control" value=<?=isset($_POST['txtPeso'])?$_POST['txtPeso']:"";?>></div>
            </div>
            <div class="form-group row">
                <label for="txtTamanio" class="col-sm-2 col-form-label">Tamaño:</label>
                <div class="col-sm-10"><input type="text" name="txtTamanio" id="txtTamanio" class="form-control" value=<?=isset($_POST['txtTamanio'])?$_POST['txtTamanio']:"";?>></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Esterilizado:</div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="chkEsterilizado" id="chkEsterilizado" value="1" class="form-control" <?=isset($_POST['chkEsterilizado'])?"checkd":""?>>
                        <label class="form-check-label" for="chkEsterilizado">
                            Esterilizado
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="txtDescripcion" class="col-sm-2 col-form-label">Descripción:</label>
                <div class="col-sm-10"><textarea name="txtDescripcion" id="txtDescripcion" rows="5" col="50" class="form-control"><?=isset($_POST['txtDescripcion'])?$_POST['txtDescripcion']:"";?></textarea></div>
            </div>
            <div class="form-group row">
                <label for="txtHistoria" class="col-sm-2 col-form-label">Historia:</label>
                <div class="col-sm-10"><textarea name="txtHistoria" id="txtHistoria" rows="5" col="50" class="form-control"><?=isset($_POST['txtHistoria'])?$_POST['txtHistoria']:"";?></textarea></div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Imagenes:</legend>
                    <div class="col-sm-10">
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                        <input type="file" class="form-control-file" id="imagen1" name="imagen[]">
                        <?php
                            if(isset($_SESSION['imgError1'])){
                                ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        Debe subir por lo menos una imagen! La imagen debe tener un tamaño menor a 100 kilobytes!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                                unset($_SESSION['imgError1']);
                            }
                        ?><br>
                        <input type="file" class="form-control-file" id="imagen2" name="imagen[]">
                        <?php
                            if(isset($_SESSION['imgError2'])){
                                ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        La imagen debe tener un tamaño menor a 100 kilobytes!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                                unset($_SESSION['imgError2']);
                            }
                        ?><br>
                        <input type="file" class="form-control-file" id="imagen3" name="imagen[]">
                        <?php
                            if(isset($_SESSION['imgError3'])){
                                ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        La imagen debe tener un tamaño menor a 100 kilobytes!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                                unset($_SESSION['imgError3']);
                            }
                        ?><br>
                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <?php
            if(isset($_SESSION['msgCorrecto']) && $_SESSION['msgCorrecto'] == "1"){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Mascota agregada correctamente!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            }else if(isset($_SESSION['msgCorrecto']) && $_SESSION['msgCorrecto'] == "2"){
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error al agregar mascota!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <?php
            }
            unset($_SESSION['msgCorrecto']);
            ?>
        </form>
    </div>
    
    

    <?php
        }else{
            // Si no está logueado lo redireccion a la página de login.
            header("HTTP/1.1 302 Moved Temporarily"); 
            header("Location: index.html"); 
        }
    ?>
    <script src="script/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="script/iframe-menu.js"></script>   
    <script src="script/bootstrapValidator.js"></script>
    <script src="script/formularioAgregarMascota.js"></script>
</body>
</html>