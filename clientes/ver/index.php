<?php 

	$page_name = "Clientes";
	require "../../config/conn.php";
	require "../../config/geral.php";
	require "../../config/cdn.php";

	$id = $_GET['id'];
	$query = "SELECT * FROM clientes WHERE id = '$id'";
	$mysqli_query = mysqli_query($conn, $query);
	while ($cliente_data = mysqli_fetch_array($mysqli_query)) { $cliente = $cliente_data; }

	if (isset($_POST['update'])) {

		$id 				= $_POST['id'];
		$nome 				= $_POST['cliente']['nome'];
		$data_nascimento 	= $_POST['cliente']['data_nascimento'];
		$email 				= $_POST['cliente']['email'];
		$telefone 			= $_POST['cliente']['telefone'];
		$cpf 				= $_POST['cliente']['cpf'];
		$plano_alimentar 	= $_POST['cliente']['plano_alimentar'];
		$altura 			= $_POST['cliente']['altura'];
		$peso_inicial 		= $_POST['cliente']['peso_inicial'];
		$objetivos 			= $_POST['cliente']['objetivos'];
		$restricoes			= $_POST['cliente']['restricoes_alimentares'];

		$sql = "UPDATE clientes SET nome = '$nome', data_nascimento = '$data_nascimento', email = '$email', telefone = '$telefone', cpf = '$cpf', plano_alimentar = '$plano_alimentar', altura = '$altura', peso_inicial = '$peso_inicial', objetivos = '$objetivos', restricoes_alimentares = '$restricoes' WHERE id = '$id'";
		if ($conn->query($sql) === TRUE) { 
			echo '<script>window.location.href="./?id='.$id.'"</script>';
		} else { 
			echo '<script>alert("Erro ao autalizar.")</script>';
			echo '<script>window.location.href="./?id='.$id.'"</script>';
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../assets/css/clientes.css">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>

</head>
<body>

	<?php require "../../config/leftbar.php"; ?>
	<form method="POST" action="./" id="update">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	<div class="content">
		<div class="container">
			<div style="margin-top: 25px;" class="row">
				<div style="text-align: left;" class="col-1">
					<div class="align">
						<button type="button" onclick="window.location.href='../'" class="act_border">
							<svg style="width: 13px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							  <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
							</svg>
							Voltar
						</button>
					</div>
				</div>
				<div class="col-9">
					<div class="align">
						<input required type="title" value="<?php echo $cliente['nome'] ?>" name="cliente[nome]">
					</div>
				</div>
				<div style="text-align: right;" class="col-2">
					<div class="align">
						<button name="update" form="update" class="act">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
							Salvar
						</button>
					</div>
				</div>
				<div class="col-12">
					<div style="margin-top: 20px;" class="module">
						<div class="row">
							<div class="col-2">
								<label class="input">Data de Nascimento</label>
								<input value="<?php if (isset($cliente['data_nascimento'])) { echo $cliente['data_nascimento']; } ?>" type="date" name="cliente[data_nascimento]">
							</div>
							<div class="col-3">
								<label class="input">E-mail</label>
								<input value="<?php if (isset($cliente['email'])) { echo $cliente['email']; } ?>" type="email" name="cliente[email]">
							</div>
							<div class="col-3">
								<label class="input">Telefone</label>
								<input value="<?php if (isset($cliente['telefone'])) { echo telefone($cliente['telefone']); } ?>" type="text" name="cliente[telefone]">
							</div>
							<div class="col-2">
								<label class="input">CPF</label>
								<input value="<?php if (isset($cliente['cpf'])) { echo cpfCnpj($cliente['cpf']); } ?>" type="text" name="cliente[cpf]">
							</div>
						</div>
					</div>
					<div style="margin-top: 20px;" class="module">
						<div class="row">
							<div class="col-4">
								<label class="input">Plano Alimentar</label>
								<select name="cliente[plano_alimentar]">
									<option value="0">Selecione</option>
									<?php $plano_alimentar = $cliente['plano_alimentar'];
									$consulta = "SELECT * FROM planos WHERE cliente = '$id' ORDER BY id DESC";
									$con = $conn->query($consulta) or die($conn->error);
									while($dado = $con->fetch_array()) { ?>
									<option <?php if ($plano_alimentar == $dado['id']) { echo 'selected'; } ?> value="<?php echo $dado['id'] ?>"><?php echo $dado['titulo'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-2">
								<label class="input">Altura</label>
								<input value="<?php if (isset($cliente['altura'])) { echo $cliente['altura']; } ?>" type="text" name="cliente[altura]">
							</div>
							<div class="col-2">
								<label class="input">Peso Inicial</label>
								<input value="<?php if (isset($cliente['peso_inicial'])) { echo $cliente['peso_inicial']; } ?>" type="text" name="cliente[peso_inicial]">
							</div>
							<div class="col-12">
								<label class="input">Objetivos</label>
								<textarea name="cliente[objetivos]"><?php if (isset($cliente['objetivos'])) { echo $cliente['objetivos']; } ?></textarea>
							</div>
							<div class="col-12">
								<label class="input">Restrições Alimentares</label>
								<textarea name="cliente[restricoes_alimentares]"><?php if (isset($cliente['restricoes_alimentares'])) { echo $cliente['restricoes_alimentares']; } ?></textarea>
							</div>
						</div>	
					</div>
					<div style="margin-top: 35px;" class="row">
						<div class="col-10">
							<h5 class="title align">Planos Alimentares:</h5>
						</div>
						<div style="text-align: right;" class="col-2">
							<div class="align">
								<button onclick="window.location.href='../../plano-alimentar'" class="act border_color">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
									</svg>
									Ver Todos
								</button>
							</div>
						</div>
					</div>
					<div style="margin-top: 15px;" class="module">
						<table class="table">
							<thead>
								<tr>
									<th style="width: 50px;" class="hide" scope="col">#</th>
									<th scope="col">Título</th>
									<th class="hide" scope="col">Data de Criação</th>
									<th style="width: 75px;" scope="col"></th>
								</tr>
							</thead>
							<tbody>
							<?php
							$consulta = "SELECT * FROM planos WHERE cliente = '$id' ORDER BY id DESC";
							$con = $conn->query($consulta) or die($conn->error);
							while($dado = $con->fetch_array()) { ?>
							<tr>
								<th class="align-middle hide" scope="row"><?php echo $dado['id']; ?></th>
								<td class="align-middle"><?php echo $dado['titulo']; ?></td>
								<td class="align-middle hide"><?php echo date('d/m/Y', strtotime($dado['data_criacao'])); ?></td>
								<td style="text-align: right;" class="align-middle actionIcon">
									<svg onclick="window.location.href='./ver/?id=<?php echo $dado['id'] ?>'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
									  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
									</svg>
									<button onclick="return confirm('Atenção, esta ação é irreversível!')" name="trash" class="noButton">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
										  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
										</svg>
									</button>
								</td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>

</body>
<script>
$(document).ready(function() {
    $('table').DataTable({
        "lengthChange": false,
        "dom": 'Bfrtip',
        "buttons": [
            'excel', 'pdf'
        ],
        "columnDefs": [
            { "orderable": false, "targets": [3] }
        ],
        "oLanguage": {
            "sInfo": "_START_ a _END_ de _TOTAL_",
            "sInfoEmpty": "Exibindo 0 a 0 de 0 entradas",
            "sInfoFiltered": "(filtrado de um total de _MAX_ entradas)",
            "sZeroRecords": "Nenhuma entrada correspondente encontrada",
            "sSearch": "",
            "sSearchPlaceholder": "Pesquise aqui...",
            "oPaginate": {
                "sFirst": "",
                "sPrevious": "<",
                "sNext": ">",
                "sLast": ""
            },
        },
        "responsive": true,
        "order": []
    });
});
</script>
</html>