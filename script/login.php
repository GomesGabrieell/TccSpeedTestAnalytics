<?php
// Inclua o arquivo de conexão com o banco de dados
include './conexao_local.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, senha FROM usuarios WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && $senha === $usuario['senha']) {
        session_start();
        $_SESSION['user_id'] = $usuario['id'];
        header('Location: ./../page/perfil.php');
        exit();
    }
}

header('Location: ./../page/login.php?erro=login_invalido');
exit();
