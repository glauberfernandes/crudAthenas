<?php

	try {
		$conexao = new PDO('mysql:host=localhost;dbname=athenas','root','123456');
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	