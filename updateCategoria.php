<?php
	include "conexao.php";

	$id = $_POST['id'];
	$nome = $_POST['nome'];

	$sqlUpdate = $conexao->prepare("UPDATE  categoria SET nomeCategoria='$nome' WHERE codCategoria='$id' ");
	$sqlUpdate->execute();