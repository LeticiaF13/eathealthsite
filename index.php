<?php 

	$page_name = "Login";
	require "config/conn.php";
	require "config/geral.php";
	require "config/cdn.php";

	if (isset($_SESSION['admin'])) { echo "<script>window.location.href='./painel'</script>"; }

	if (isset($_POST['user']) && isset($_POST['pass'])) {
	    $username = $_POST['user'];
	    $password = hash('sha256', $_POST['pass']);

	    $query = "SELECT * FROM users WHERE usuario = '$username'";
	    $result = mysqli_query($conn, $query);

	    if ($result) {
	        $row = mysqli_fetch_assoc($result);
	        if ($row && $password === $row['senha']) {
	            $_SESSION['admin'] = $row;
	            echo '<script>window.location.href="./painel"</script>';
	            exit();
	        } else {
	            $msg = "Email ou senha incorretos. Verifique e tente novamente.";
	        }
	    } else {
	        $msg = "Erro #0e38f292e! Informe ao suporte.";
	    }
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>
	<div class="container align">
		<div class="row loginBox">
			<div style="background: url('assets/img/bg/login.jpg');" class="col-0 col-lg-7 col-xl-8 right">
				<div class="bg"></div>
			</div>
			<div class="col-12 col-lg-5 col-xl-4 left">
				<div class="align">
					<a href="#"><img width="100px" class="logo" src="https://i.ibb.co/28Tmvmb/logo1.png"></a>
					<h1>Fazer Login</h1>
					<p>Insira o seu usuário e senha para fazer login.</p>
					<hr>
					<form method="POST" action="">
						<label class="input">Insira o seu usuário</label><br>
						<input placeholder="ex: jhon_doe" type="text" name="user"><br>

						<label class="input">Insira a sua senha</label><br>
						<input placeholder="*********" type="password" name="pass"><br>

						<div style="margin-bottom: 15px;" class="row">
							<div class="col-6">
								<div class="align">
									<input checked id="remember" style="width: auto; margin-bottom: 0px;" type="checkbox" name="manter_logado">
									<label class="remember" for="remember">Lembrar senha</label>
								</div>
							</div>
							<div style="text-align: right;" class="col-6">
								<div class="align">
									<label onclick="alert('TODO')" style="text-decoration: underline; cursor: pointer;" class="remember">Recuperar senha</label>
								</div>
							</div>
						</div>

						<button name="entrar" class="entrar">Entrar</button>
						<?php if (isset($msg)) { ?><p class="msg"><?php echo $msg; ?></p><?php } ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>