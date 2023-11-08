<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    try {
        // Sua conexão PDO
        $conexao = new PDO('mysql:host=localhost;dbname=fastVelocidade', 'gabriel@db', 'gabriel@dbgabriel@dbgabriel@dbgabriel@db2023');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recebe os dados do formulário
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $pais = $_POST['pais'];
        $telefone = $_POST['telefone'];
        $cargo = $_POST['cargo'];

        // Atualize os dados do usuário
        $sql = "UPDATE usuarios SET email = :email, senha = :senha, pais = :pais, numeroTelefone = :telefone, cargo = :cargo WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':pais', $pais);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':id', $user_id);

        if ($stmt->execute()) {
            // Os dados foram atualizados com sucesso

            // Redirecione para a página de perfil
            header("Location: ./../page/perfil.php");
            exit();
        } else {
            echo "Erro ao atualizar os dados.";
        }
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
} else {
    echo "Sessão de usuário não encontrada. Faça o login primeiro.";
}
?>
