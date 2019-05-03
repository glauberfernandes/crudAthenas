<?php
	include "conexao.php";

	$id = 0;
	$update = false;
	$namePes = '';
	$emailPes = '';
	$selPes = '';


	if (isset($_GET['excluir'])) {
		$id = $_GET['excluir'];
		$sqlDelete = $conexao->prepare("DELETE FROM pessoas WHERE codPessoas=$id");
		$sqlDelete->execute();

	}

	if(isset($_GET['editar'])){
		$id = $_GET['editar'];
		$update = true;
		$sqlEdit = $conexao->prepare("SELECT * FROM pessoas WHERE codPessoas=$id");
		$sqlEdit->execute();
		$result = $sqlEdit->fetchAll();
		foreach ($result as $pessoas) {
			$namePes = $pessoas['nomePessoas'];
			$emailPes = $pessoas['emailPessoas'];
			$selPes = $pessoas['codCategoria'];
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
		<h1>Cadastro de Pessoas</h1>

		<form action="" method="POST">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" class="form-control" name="name" id="name" value="<?php echo $namePes;?>" placeholder="Digite o nome" title="Digite o nome da pessoa" required="">
			</div>
			<div class="form-group">
				<label>E-mail:</label>
				<input type="email" class="form-control" name="email" id="email" value="<?php echo $emailPes;?>" placeholder="Digite o e-mail" title="Digite o e-mail da pessoa" required="">
			</div>
			<div class="form-group">
				<label>Categoria:</label>
				<select class="form-control" id="sel1" name="sellist1" value="<?php echo $selPes;?>" title="Selecione uma categoria">
				<?php
					include "conexao.php";
					$sqlSelect = $conexao->prepare("SELECT codCategoria FROM categoria");
					$sqlSelect->execute();
					$fetchAll = $sqlSelect->fetchAll();
					foreach($fetchAll as $categoria){
						echo '<option>'.$categoria['codCategoria'].'</option>';
					}
				?>
				</select>
			</div>

			<input type="hidden" name="idPes" id="idPes" value="<?php echo $id;?>">
			<?php if($update == true): ?>
				<button type="submit" class="btn btn-info" id="atualizarPessoa" title="Clique para atualizar o cadastro">Update</button>
			<?php else: ?>
				<button type="submit" class="btn btn-primary" id="cadastrarPessoa" title="Clique para realizar o cadastro">Cadastrar</button>
			<?php endif?>
		</form>
		<br>
		<br>
		<div class="row">
		<table class="table table-hover">
			<thead>
				<th>Código</th>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Categoria</th>
				<th colspan="2">Ação</th>
			</thead>
			<tbody>
			<?php
				include "conexao.php";
				$pagina = (!isset($_GET['pagina'])) ? 1 : $_GET['pagina'];

				$sqlExec = $conexao->prepare("SELECT * FROM pessoas");
				$sqlExec->execute();
				$result = $sqlExec->fetchAll();

				$exibir = 4;

				$total = ceil((count($result)/$exibir));

				$inicioExibir = ($exibir * $pagina) - $exibir;

				$sqlSelect = $conexao->prepare("SELECT * FROM pessoas LIMIT $inicioExibir,$exibir");
				$sqlSelect->execute();
				$fetchAll = $sqlSelect->fetchAll();
					foreach($fetchAll as $pessoas){
						echo '<tr>';
						echo '	<td>'.$pessoas['codPessoas'].'</td>';
						echo '	<td>'.$pessoas['nomePessoas'].'</td>';
						echo '	<td>'.$pessoas['emailPessoas'].'</td>';
						echo '	<td>'.$pessoas['codCategoria'].'</td>';
						echo '	<td><a href="?editar='.$pessoas["codPessoas"].'" class="btn btn-info">Editar</a></td>';
						echo '	<td><a href="?excluir='.$pessoas["codPessoas"].'" class="btn btn-danger">Excluir</a></td>';
						echo '</tr>';
					}

			
				echo '</tbody>';
		
				echo '</table>';

				echo '</div>';

				echo '<ul class="pagination">';
    			echo '	<li class="page-item"><a class="page-link" href="?pagina='.($pagina = ($pagina > 1)?($pagina - 1):1).'">Previous</a></li>';
    			echo '	<li class="page-item"><a class="page-link" href="?pagina=1">'.($pagina = ($_GET['pagina'] > 3)?($_GET['pagina'] - 2):1).'</a></li>';
    			echo '	<li class="page-item"><a class="page-link" href="?pagina=2">'.($pagina = ($_GET['pagina'] > 3)?($_GET['pagina'] - 1):2).'</a></li>';
    			echo '	<li class="page-item"><a class="page-link" href="?pagina=3">'.($pagina = ($_GET['pagina'] > 3)?($_GET['pagina'] - 0):3).'</a></li>';
    			echo '	<li class="page-item"><a class="page-link" href="?pagina='.($pagina = ($_GET['pagina'] < $total)?($_GET['pagina'] + 1):$total).'">Next</a></li>';
  				echo '</ul>';

			?>
	</div>
</body>
</html>