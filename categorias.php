<?php
	include "conexao.php";

	$id = 0;
	$update = false;
	$nameCat = '';


	if (isset($_GET['excluir'])) {
		$id = $_GET['excluir'];
		$sqlDelete = $conexao->prepare("DELETE FROM categoria WHERE codCategoria=$id");
		$sqlDelete->execute();

	}

	if(isset($_GET['editar'])){
		$id = $_GET['editar'];
		$update = true;
		$sqlEdit = $conexao->prepare("SELECT * FROM categoria WHERE codCategoria=$id");
		$sqlEdit->execute();
		$result = $sqlEdit->fetchAll();
		foreach ($result as $categoria) {
			$nameCat = $categoria['nomeCategoria'];
		}
	}
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
  	<?php include "scripts.php"; ?>
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
		<h1>Cadastro de Categorias</h1>

		<form action="" method="POST">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" class="form-control" value="<?php echo $nameCat;?>" name="nameCat" id="nameCat" placeholder="Digite a categoria" title="Digite uma categoria" required="">
			</div>
			<input type="hidden" name="idCat" id="idCat" value="<?php echo $id;?>">
			<?php if($update == true): ?>
				<button type="submit" class="btn btn-info" id="atualizarCategoria" title="Clique para atualizar o cadastro">Update</button>
			<?php else: ?>
				<button type="submit" class="btn btn-primary" id="cadastrarCategoria" title="Clique para realizar o cadastro">Cadastrar</button>
			<?php endif?>
		</form>
		<br>
		<div class="row">
		<table class="table table-hover">
			<thead>
				<th>Código</th>
				<th>Categoria</th>
				<th colspan="2">Ação</th>
			</thead>
			<tbody>
			<?php
				include "conexao.php";
				$sqlSelect = $conexao->prepare("SELECT * FROM categoria");
				$sqlSelect->execute();
				$fetchAll = $sqlSelect->fetchAll();
					foreach($fetchAll as $categoria){
						echo '<tr>';
						echo '	<td>'.$categoria['codCategoria'].'</td>';
						echo '	<td>'.$categoria['nomeCategoria'].'</td>';
						echo '	<td><a href="?editar='.$categoria["codCategoria"].'" class="btn btn-info">Editar</a></td>';
						echo '	<td><a href="?excluir='.$categoria["codCategoria"].'" class="btn btn-danger">Excluir</a></td>';
						echo '</tr>';
					}
			?>
			</tbody>
		</table>
		</div>
	</div>
</body>
</html>