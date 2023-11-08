<?php include './../script/verificarIdLogin.php';?>
<?php include './../script/reload.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastVelocidade - Lista de IDs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="./../img/data_icon.ico" type="image/x-icon">
    <style>
        .btn-copy {
            background-color: #000;
            color: #fff;
            padding: 6px 10px;
            font-size: 14px;
        }
        /* Estilize o contêiner do recarregamento */
        #reload-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Estilize o texto de recarregamento */
        #reload-message {
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <ul class="navbar-nav mr-auto">
		    <li class="nav-item">
                <a class="nav-link" href="perfil.php"><i class="fas fa-user"></i> Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cadastrarID.html"><i class="fas fa-user-plus"></i> Cadastrar ID</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listaID.php"><i class="fas fa-list"></i> Lista dos IDs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="relatorio.php"><i class="fas fa-chart-bar"></i> Relatórios</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="./../script/sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </li>
        </ul>
    </div>
</nav>
<section id="lista-ids" class="py-5">
    <div class="container">
	<h2 class="mb-4">Lista Cliente</h2>

<?php
	$diretorioRelativo = '\page\baixar.php';
	echo$caminhoAbsoluto = realpath($diretorioRelativo);
?>

<?php

include './../script/conexao_local.php'; 
$query = "SELECT * FROM chaveIdClients WHERE id_usuario = '$user_id'";
$result = $conexao->query($query);

if ($result) {
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nome</th>';
    echo '<th>Link - Sistema FastVelocidade</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
		echo '<td><a href="./relatorio.php?chave=' . $row['chave'] . '">' . $row['chave'] . '</a></td>';
        echo '<td>' . $row['nome'] . '</td>';
        echo '<td>';
echo '<button class="btn btn-copy" onclick="copiarCaminho()">Copiar <i class="fas fa-copy"></i></button>
<input type="text" id="caminho" value="Texto que você deseja copiar" style="display: none;">
';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'Erro na consulta ao banco de dados.';
}
?>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function copiarCaminho() {
  var caminho = "http://localhost:8093/page/dowload.php";

  // Cria um elemento de input temporário para copiar o valor.
  var inputTemporario = document.createElement("input");
  inputTemporario.setAttribute("value", caminho);
  document.body.appendChild(inputTemporario);

  // Seleciona o valor do input e copia para a área de transferência.
  inputTemporario.select();
  document.execCommand("copy");

  // Remove o input temporário.
  document.body.removeChild(inputTemporario);

  // Notifique o usuário de que o valor foi copiado.
  alert("O caminho foi copiado para a área de transferência.");
}


</script>



</body>
</html>
