<?php
$hostname = 'containers-us-west-99.railway.app'; // Endereço do servidor do banco de dados
$dbname = 'railway'; // Nome do banco de dados
$username = 'root'; // Nome de usuário do banco de dados
$password = 'mOXzjvsn31Ip2LQXQ8Rv'; // Senha do banco de dados

try {
    // Criar uma conexão PDO
    $conexao = new PDO("mysql:host=$hostname;dbname=$dbname;port=7818", $username, $password);

    // Definir o modo de erro do PDO para exceções
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
