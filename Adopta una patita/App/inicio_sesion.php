<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos-incio-sesion.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo-pata.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/estilos-pie.css">
    <title>Inicio de sesión</title>
</head>
<body>
    
    
	
	<iframe id="frame-menu" src="menu.html" frameborder="0" scrolling="no" seamless></iframe> 
	
	
    <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/logo-pata.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form id="frmLogin" action="script/login.php" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="txtEmail" id="txtEmail" class="form-control input_user" placeholder="Correo">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="txtPass" id="txtPass" class="form-control input_pass" placeholder="Contraseña">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Mantener sesión iniciada</label>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
				 			<button type="submit" name="button" class="btn login_btn">Acceder</button>
				   		</div>
					</form>
				</div>
				<?php
					session_start();
					if(isset($_SESSION['error'])){
						?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Holy guacamole!</strong> Usuario o contraseña incorrectos!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php
						unset($_SESSION['error']);
					}
				?>
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						<a href="#">Olvidaste tu contraseña?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Pie de pagina -->
	<?php
		require_once 'pie.php';
	?>
	<script src="script/jquery-3.5.1.js"></script>
	<script src="script/iframe-menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script> <!-- Script del validador -->
    
    <script src="script/validarLogin.js "></script>
</body>
</html>