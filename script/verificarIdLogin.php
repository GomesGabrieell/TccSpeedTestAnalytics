<?php
	session_start();
	
	include './../script/conexao_local.php';

	$user_id = $_SESSION['user_id'];

	if (isset($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];
	} else {
		header('Location: ./../page/login.php');
	}
	

	$sql = "SELECT email, pais, numeroTelefone, cargo FROM usuarios WHERE id = :user_id";
	$stmt = $conexao->prepare($sql);
	$stmt->bindParam(':user_id', $user_id);
	$stmt->execute();

	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	// Assign user information to variables
	$email = $user['email'];
	$senha = $user['senha'];
	$pais = $user['pais'];
	$numeroTelefone = $user['numeroTelefone'];
	$cargo = $user['cargo'];