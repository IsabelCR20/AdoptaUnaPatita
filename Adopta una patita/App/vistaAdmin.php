<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <?php
        require_once '../Datos/MascotaDao.php';
        $dao = new MascotaDao();
        session_start();
        if(isset($_SESSION['email'])){
    ?>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="img/logo-grande.JPG" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Lista de mascotas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agregarMascota.php">Agregar mascota</a>
                </li>
            </ul>
            <form class="form-inline" action="script/cerrar-sesion.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerrar sesión</button>
            </form>
        </div>
    </nav>     
    <?php
        //session_start(); //No sé si esto va aquí
        if(isset($_POST['clave'])){
            if($dao->eliminar($_POST['clave'])){
                $_SESSION["msg"]="Mascota dada de baja correctamente";
                $_SESSION["tipoMsg"]=1; //Mensaje de éxito
            }else{
                $_SESSION["msg"]="Error al dar de baja";
                $_SESSION["tipoMsg"]=0; //Mensaje de error
            }
        }else{
            $lista = $dao->obtenerTodos();
        }
    ?>
    <div class="container my-5 p-5 bg-light">
        <div id="mdlConfirmar" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmar eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Está seguro que desea dar de baja a la mascota <strong id="mascota"></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="" method="POST">
                            <button type="submit" name="clave" value="" class="btn btn-danger" id="btnAceptar">Aceptar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h1>Lista de mascotas</h1>
        <?php
            //session_start(); //No sé si esto va aquí
            if(isset($_SESSION["msg"])){                
        ?>
            <div class="alert alert-<?= isset($_SESSION["tipoMsg"]) && $_SESSION["tipoMsg"]==0? "danger":"success"  ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION["msg"] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
                unset($_SESSION["msg"]);
                unset($_SESSION["tipoMsg"]);
            }
        ?>
        

        <table id="tblMascotas" class="table">
            <thead>
                <tr>
                    <th>ID Mascota</th>
                    <th>Nombre</td>
                    <th>Raza</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                if(isset($lista)){
                    foreach($lista as $mascota) {
            ?>
                        <tr>
                        <td><?php echo $mascota->Id_Mascota; ?></td>
                        <td><?=$mascota->Nombre?></td>
                        <td><?=$mascota->Raza?></td>
                        <td>
                        <button onclick="eliminar(<?=$mascota->Id_Mascota?>,'<?=$mascota->Nombre?>')" class="btn btn-danger"><i class="fas fa-calcel"></i>Dar de baja</button>
                        </td>
                        </tr>
            <?php
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
    <?php
        }else{
            // Si no está logueado lo redireccion a la página de login.
            header("HTTP/1.1 302 Moved Temporarily"); 
            header("Location: index.html"); 
        }
    ?>
    <script src="scripts/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="fontawesome/js/all.js"></script>
    <script>
        $(document).ready(function(){
            $("li.active").removeClass("active");
            $("#mnuProductos").addClass("active");
            
        });
         
        function eliminar(clave,producto){
            $("#producto").text(producto);
            $("#btnAceptar").val(clave);
            $("#mdlConfirmar").modal({
                keyboard: false
            });
        }
    </script>
</body>
</html>