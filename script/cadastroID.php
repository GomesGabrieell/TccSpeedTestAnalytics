<?php
	session_start();

	include './../script/conexao_local.php';

	$user_id = $_SESSION['user_id'];
	$nome_cliente = $_POST['nome'];

	function generateRandomKey($length) {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$key = '';

		for ($i = 0; $i < $length; $i++) {
			$randomIndex = mt_rand(0, strlen($characters) - 1);
			$key .= $characters[$randomIndex];
		}

		return $key;
	}

	$randomKey = generateRandomKey(6);
	$randomKey = strtoupper($randomKey);
	// $randomKey = 'ZGYXM1';

	$sql = "SELECT chave FROM chaveIdClients WHERE chave = :randomKey";
	$stmt = $conexao->prepare($sql);
	$stmt->bindParam(':randomKey', $randomKey, PDO::PARAM_STR);
	$stmt->execute();

	if ($stmt->rowCount() > 0) {
		$idusuario = $user_id; 
		$chave = $randomKey.$idusuario; 

		try {
			$sql = "INSERT INTO chaveIdClients (id_usuario, nome, chave) VALUES (:idusuario, :nome, :chave)";

			$stmt = $conexao->prepare($sql);

			$stmt->bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
			$stmt->bindParam(':nome', $nome_cliente, PDO::PARAM_STR);
			$stmt->bindParam(':chave', $chave, PDO::PARAM_STR);

			$stmt->execute();

			echo "Dados inseridos com sucesso!";
		} catch (PDOException $e) {
			echo "Erro: " . $e->getMessage();
		}
	} else {
		
		$idusuario = $user_id; 
		$chave = $randomKey; 

		try {
			$sql = "INSERT INTO chaveIdClients (id_usuario, nome, chave) VALUES (:idusuario, :nome, :chave)";

			$stmt = $conexao->prepare($sql);

			$stmt->bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
			$stmt->bindParam(':nome', $nome_cliente, PDO::PARAM_STR);
			$stmt->bindParam(':chave', $chave, PDO::PARAM_STR);

			$stmt->execute();

			header("Location: ./../page/listaID.php");
		} catch (PDOException $e) {
			echo "Erro: " . $e->getMessage();
		}
	}

	$stmt->close();
	$conexao->close();
	

?>
