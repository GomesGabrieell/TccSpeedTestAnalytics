<?php include './../script/verificarIdLogin.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastVelocidade - Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="icon" href="./../img/data_icon.ico" type="image/x-icon">
	<style>
    .red-border {
        border: 1px solid red;
    }
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./../index.html">FastVelocidade</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
        </ul>
    </div>
</nav>

<?php $erro = isset($_GET['erro']) && $_GET['erro'] === 'erro'; $borde = $erro ? 'style="border: 1px solid red;"' : '';?>

<section id="cadastro" class="py-5 text-center" style="background-color: #f2f2f2;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3" style="background-color: #fff; padding: 20px; border-radius: 10px;">
                <h2 class="mb-4">Cadastro no FastVelocidade</h2>
                <form action="./../script/cadastrauser.php" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" <?php echo$borde;?> id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="confirmaSenha" name="" placeholder="Confirme a Senha" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pais" name="pais" placeholder="País" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Número de Telefone" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="cargo" name="cargo">
                            <option value="TI">TI</option>
                            <option value="Gerencia">Gerência</option>
                            <option value="Autonomo">Autônomo</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #E0E0E0; color: #000;">Cadastrar</button>
                </form>
                <div class="mt-3">
                    <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
