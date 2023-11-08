<?php include './../script/verificarIdLogin.php'; 	$chave1 = $_GET['chave'];





$sql = "SELECT computer_name, endmac, ipv4_address, tag_1, tag_2, tag_3, tag_4, tag_5, tag_6, tag_7, tag_8, tag_9, tag_10, chave, var1, var2 FROM resultsClients WHERE chave = :chave1";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':chave', $chave1);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Atribuir informações do usuário a variáveis
$computer_name = $user['computer_name'];
$endmac = $user['endmac'];
$ipv4_address = $user['ipv4_address'];
$tag_1 = $user['tag_1'];
$tag_2 = $user['tag_2'];
$tag_3 = $user['tag_3'];
$tag_4 = $user['tag_4'];
$tag_5 = $user['tag_5'];
$tag_6 = $user['tag_6'];
$tag_7 = $user['tag_7'];
$tag_8 = $user['tag_8'];
$tag_9 = $user['tag_9'];
$tag_10 = $user['tag_10'];
$chave = $user['chave'];
$var1 = $user['var1'];
$var2 = $user['var2'];

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastVelocidade - Cliente Tal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="./../img/data_icon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .btn-copy {
            background-color: #000;
            color: #fff;
            padding: 6px 10px;
            font-size: 14px;
        }
        
        .chart-container {
            width: 80%;
            margin: 0 auto; /* Centralizar horizontalmente */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="listaID.php"><i class="fas fa-list"></i> Voltar para Lista</a>
            </li>
        </ul>
	
        <h1>RELATORIO DO ID 
		<?php 
		echo$chave = $_GET['chave']; 
		?>
		</h1>
		
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="./../script/sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                <a class="nav-link" href="javascript:void(0);" id="meuLink"><i class="fa fa-refresh"></i></a>
            </li>
        </ul>
    </div>
</nav>
<form action="relatorio.php" method="get" class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" name="chave" id="chave" class="form-control" placeholder="Pesquise pelo ID">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="chart-container">
    <canvas id="myChart"></canvas>
</div>

<?php
	$chave = $_GET['chave'];
    $query = "SELECT chave, insertion_date, var2, var1 FROM resultsClients WHERE chave = :chave";

    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':chave', $chave, PDO::PARAM_STR);
    $stmt->execute();

    // Processamento dos resultados
    $data = [];
    $uploads = [];
    $downloads = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = date('Y-m-d', strtotime($row['insertion_date']));
        $uploads[] = intval($row['var2']);
        $downloads[] = intval($row['var1']);
    }
?>


<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data); ?>,
            datasets: [
                {
                    label: 'Uploads',
                    data: <?php echo json_encode($uploads); ?>,
                    backgroundColor: 'rgba(100, 100, 100, 0.2)', /* Cinza claro */
                    borderColor: 'rgba(100, 100, 100, 1)', /* Cinza escuro */
                    borderWidth: 1
                },
                {
                    label: 'Downloads',
                    data: <?php echo json_encode($downloads); ?>,
                    backgroundColor: 'rgba(0, 0, 255, 0.2)', /* Azul claro */
                    borderColor: 'rgba(0, 0, 255, 1)', /* Azul escuro */
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
document.getElementById('meuLink').addEventListener('click', function() {
location.reload();
});
</script>
</body>
</html>
