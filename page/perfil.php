<?php include './../script/verificarIdLogin.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastVelocidade - Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="./../img/data_icon.ico" type="image/x-icon">
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
<section id="cadastro" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mb-4">Perfil <?php echo$cargo?></h2>
					<?php
						echo '<form action="./../script/editarUser.php" method="post">';

						echo '<div class="form-group">';
						echo '<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="' . $email . '" required>';
						echo '</div>';

						echo '<div class="form-group">';
						echo '<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required value="' . $senha . '" >';
						echo '</div>';

						echo '<div class="form-group">';
						echo '<input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" required placeholder="Confirme a Senha" value="' . $confirmaSenha . '" >';
						echo '</div><br>';

						echo '<div class="form-group">';
						echo '<input type="text" class="form-control" id="pais" name="pais" placeholder="País" value="' . $pais . '" required>';
						echo '</div>';

						echo '<div class="form-group">';
						echo '<input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Número de Telefone" value="' . $numeroTelefone . '" required>';
						echo '</div>';

						echo '<div class="form-group">';
						echo '<select class="form-control" id="cargo" name="cargo">';
						echo '<option value="TI" ' . ($cargo == 'TI' ? 'selected' : '') . '>TI</option>';
						echo '<option value="Gerencia" ' . ($cargo == 'Gerencia' ? 'selected' : '') . '>Gerência</option>';
						echo '<option value="Autonomo" ' . ($cargo == 'Autonomo' ? 'selected' : '') . '>Autônomo</option>';
						echo '<option value="Outros" ' . ($cargo == 'Outros' ? 'selected' : '') . '>Outros</option>';
						echo '</select>';
						echo '</div>';

						echo '<button type="submit" class="btn btn-primary btn-block" style="background-color: #E0E0E0; color: #000;">Editar</button>';

						echo '</form>';
					?>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
