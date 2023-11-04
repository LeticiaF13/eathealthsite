<?php 

	$page_name = "Clientes";
	require "../config/conn.php";
	require "../config/geral.php";
	require "../config/cdn.php";

	if (isset($_POST['addClient'])) {

		$nome 	= $_POST['cliente']['nome'];
		$email 	= $_POST['cliente']['email'];
		$data 	= date('y-m-d', strtotime($_POST['cliente']['data_nascimento']));

		$sql = "INSERT INTO clientes (nome, email, data_nascimento) VALUES ('$nome', '$email', '$data')";
		if ($conn->query($sql) === TRUE) { 

			$id_cliente = $conn->insert_id;
			echo '<script>window.location.href="./ver?id='.$id_cliente.'"</script>';

		} else { 
			echo '<script>alert("Erro ao inserir.")</script>';
			echo '<script>window.location.href="./"</script>';
		}
	}

	if (isset($_POST['trash'])) {

		$client_id = $_POST['id'];

		$sql = "DELETE FROM clientes WHERE id = '$client_id'";
		if ($conn->query($sql) === TRUE) { 

			$id_cliente = $conn->insert_id;
			echo '<script>window.location.href="./"</script>';

		} else { 
			echo '<script>alert("Erro ao excluir.")</script>';
			echo '<script>window.location.href="./"</script>';
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/css/clientes.css">

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

	<?php require "../config/leftbar.php"; ?>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-6 col-lg-2">
					<div class="topModule">
						<div class="row">
							<div class="col-4 col-lg-4">
								<div class="align">
									<svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6">
									  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
									</svg>
								</div>
							</div>
							<div class="col">
								<div class="align">
									<label class="topMsg">0</label><br>
									<label class="btmMsg">Ativos</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="text-align: right;" class="col">
					<div class="align">

						<button id="newClient" class="act">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
							</svg>
							Adicionar
						</button>

					</div>
				</div>
				<div style="margin-top: 15px;" class="col-12">		
					<div style="padding: 25px 25px 20px 25px !important;" class="module">

					<table class="table">
						<thead>
							<tr>
								<th style="width: 50px;" class="hide" scope="col">#</th>
								<th scope="col">Nome</th>
								<th class="hide" scope="col">Email</th>
								<th class="hide" scope="col">Telefone</th>
								<th style="width: 75px;" scope="col"></th>
							</tr>
						</thead>
						<tbody>
						<?php
						$consulta = "SELECT * FROM clientes ORDER BY id DESC";
						$con = $conn->query($consulta) or die($conn->error);
						while($dado = $con->fetch_array()) { ?>
						<tr>
							<th class="align-middle hide" scope="row"><?php echo $dado['id']; ?></th>
							<td class="align-middle"><?php echo $dado['nome']; ?></td>
							<td class="align-middle hide"><?php echo $dado['email']; ?></td>
							<td class="align-middle hide"><?php echo telefone($dado['telefone']); ?></td>
							<td style="text-align: right;" class="align-middle actionIcon">
								<form method="POST" action="">
									<input type="hidden" name="id" value="<?php echo $dado['id'] ?>">
									<svg onclick="window.location.href='./ver/?id=<?php echo $dado['id'] ?>'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
									  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
									</svg>
									<button onclick="return confirm('Atenção, esta ação é irreversível!')" name="trash" class="noButton">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
										  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
										</svg>
									</button>
								</form>
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

	<div id="sideNewClient">
		<div class="sideContent">
			<h3>Novo Cliente</h3>
			<p>Preencha os campos abaixo para avançar até próxima parte do cadastro.</p>
			<form id="novoCliente" method="POST" action="#">

				<label class="input">Nome:</label>
				<input required placeholder="ex: Joe" type="text" name="cliente[nome]">

				<label class="input">E-mail:</label>
				<input placeholder="ex: email@dominio.com" type="email" name="cliente[email]">

				<label class="input">Data de Nascimento:</label>
				<input type="date" name="cliente[data_nascimento]">

				<button style="width: 100%; margin-top: 15px;" name="addClient" class="act">PRÓXIMO</button>

			</form>
		</div>
	</div>

</body>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var sideNewClient = document.getElementById('sideNewClient');
    var newClient = document.getElementById('newClient');

    newClient.addEventListener('click', function (event) {
        sideNewClient.classList.add('sidebarShow');
    });

    document.addEventListener('click', function (event) {
        if (event.target !== newClient && !sideNewClient.contains(event.target)) {
            sideNewClient.classList.remove('sidebarShow');
        }
    });
});
</script>
<script>
$(document).ready(function() {
    $('table').DataTable({
        "lengthChange": false,
        "dom": 'Bfrtip',
        "buttons": [
            'excel', 'pdf'
        ],
        "columnDefs": [
            { "orderable": false, "targets": [4] }
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