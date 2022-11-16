<!DOCTYPE html>
<html>
<head>
	<title>Login Sistema Inventario Café-Arte</title>
	<link rel="stylesheet" type="text/css" href="../css/loginStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
	<div class="container">
		<div class="img">
			<img src="../assets/login.jpg">
		</div>
		<div class="login-content">
			<form id="formLogin">
				<img src="../assets/avatar.svg">
				<h2>Bienvenido</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input required name="username" type="text" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input required name="password" type="password" class="input">
            	   </div>
            	</div>
				<div class="respuesta">Usuario o contraseña incorrecta</div>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../js/loginStyle.js"></script>
    <script src="../js/loginLogic.js"></script>
</body>
</html>