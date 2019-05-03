<?php
	include "conexao.php";
	$sqlInsert = $conexao->prepare("INSERT INTO categoria(nomeCategoria) VALUES('".$_POST['nome']."')");

	$sqlInsert->execute();

	if ($sqlInsert == true) {
		echo "Cadastrado com sucesso";
	}else{
		echo "Erro ao cadastrar seus dados";
	}