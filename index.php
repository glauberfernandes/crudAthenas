<?php
	include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>CRUD Athenas</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php">HOME</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">CADASTRO</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="pessoas.php">PESSOAS</a>
					<a class="dropdown-item" href="categorias.php">CATEGORIAS</a>
				</div>
			</li>
		</ul>
	</nav>
	<div class="container">
			<div>
			<img src="img/athenas.jpg" class="mx-auto d-block" style="width:100%; margin-top: 150px">
		</div>
	</div>

</body>
</html>