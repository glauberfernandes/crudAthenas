<?php
	include "conexao.php";

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$categoria = $_POST['categoria'];

	$sqlUpdate = $conexao->prepare("UPDATE pessoas SET nomePessoas='$nome', emailPessoas='$email', codCategoria='$categoria' WHERE codPessoas='$id' ");
	$sqlUpdate->execute();