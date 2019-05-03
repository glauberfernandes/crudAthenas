<?php
	include "conexao.php";
	$sqlInsert = $conexao->prepare("INSERT INTO pessoas(nomePessoas,emailPessoas,codCategoria) VALUES('".$_POST['nome']."','".$_POST['email']."','".$_POST['categoria']."')");

	$sqlInsert->execute();

	if ($sqlInsert == true) {
		echo "Cadastrado com sucesso";
	}else{
		echo "Erro ao cadastrar seus dados";
	}