<?php
	include './conexao_local.php';

	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$pais = $_POST['pais'];
	$numeroTelefone = $_POST['telefone']; // Aqui corrigimos o nome da variável
	$cargo = $_POST['cargo'];
	$dataHoraAtual = date("Y-m-d H:i:s");
	$chave1 = md5($dataHoraAtual);
	$chave = password_hash($chave1, PASSWORD_BCRYPT); // Criptografa a chave

	try {
		// Start the database transaction
		$conexao->beginTransaction();

		// Verifique se o email já existe no banco de dados
		$sqlVerificarEmail = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
		$stmtVerificarEmail = $conexao->prepare($sqlVerificarEmail);
		$stmtVerificarEmail->execute([$email]);
		$count = $stmtVerificarEmail->fetchColumn();

		if ($count <= 0) {
			$sql = "INSERT INTO usuarios (email, senha, pais, numeroTelefone, cargo, chave) VALUES (?, ?, ?, ?, ?, ?)";
			$stmt = $conexao->prepare($sql);
			$stmt->execute([$email, $senha, $pais, $numeroTelefone, $cargo, $chave]);

			// Commit the transaction
			$conexao->commit();

			header("Location: ./../page/login.php");
		} else {
			header("Location: ./../page/cadastro.php?erro=erro");
		}
	} catch (Exception $e) {
		// Rollback the transaction in case of an error
		$conexao->rollback();

		// Handle the exception and provide appropriate feedback to the user
		echo "An error occurred: " . $e->getMessage();
	}
