<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastVelocidade - Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="icon" href="./../img/data_icon.ico" type="image/x-icon">
	<style>
	body{
		background-color: #f2f2f2;
	}
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
<?php $erro = isset($_GET['erro']) && $_GET['erro'] === 'login_invalido'; $borde = $erro ? 'style="border: 1px solid red;"' : '';?>

<section id="login" class="py-5 text-center" style="background-color: #f2f2f2;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3" style="background-color: #fff; padding: 20px; border-radius: 10px;">
                <h2 class="mb-4">FastVelocidade</h2>
                <form action="./../script/login.php" method="post">
                    <div class="form-group">
                        <input type="email" <?php echo$borde;?> class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" <?php echo$borde;?> class="form-control" name="senha" id="senha" placeholder="Senha">
                    </div>
					<button type="submit" class="btn btn-primary btn-block" style="background-color: #E0E0E0; color: #000;">Entrar</button>
                </form>
                <div class="mt-3">
                    <a href="esqueciSenha.html">Esqueci a senha</a>
                </div>
                <div class="mt-3">
                    <p>Não tem uma conta? <a href="cadastro.php">Cadastrar</a></p>
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
