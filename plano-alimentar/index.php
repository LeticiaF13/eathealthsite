<?php 

	$page_name = "Plano Alimentar";
	require "../config/conn.php";
	require "../config/geral.php";
	require "../config/cdn.php";

	if (isset($_POST['addClient'])) {

		$cliente 	= $_POST['plano']['cliente'];
		$titulo 	= $_POST['plano']['title'];

		$sql = "INSERT INTO planos (cliente, titulo) VALUES ('$cliente', '$titulo')";
		if ($conn->query($sql) === TRUE) { 

			$plano = $conn->insert_id;
			echo '<script>window.location.href="./editar?id='.$plano.'"</script>';

		} else { 
			echo '<script>alert("Erro ao inserir.")</script>';
			echo '<script>window.location.href="./"</script>';
		}
	}

	if (isset($_POST['trash'])) {

		$plano_id = $_POST['id'];

		$sql = "DELETE FROM planos WHERE id = '$plano_id'";
		if ($conn->query($sql) === TRUE) { 

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

	<script type="text/javascript">
		function shareLink(link) {
			window.open(link, '_blank');
		}
	</script>

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
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
									</svg>
								</div>
							</div>
							<div class="col">
								<div class="align">
									<label class="topMsg">0</label><br>
									<label class="btmMsg">Planos</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="text-align: right;" class="col">
					<div class="align">

						<button id="newClient" class="act">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
							</svg>
							Novo
						</button>

					</div>
				</div>
				<div style="margin-top: 15px;" class="col-12">		
					<div style="padding: 25px 25px 20px 25px !important;" class="module">

					<table class="table">
						<thead>
							<tr>
								<th style="width: 50px;" class="hide" scope="col">#</th>
								<th style="width: 20%;" scope="col">Cliente</th>
								<th class="hide" scope="col">Título</th>
								<th style="width: 75px;" scope="col"></th>
							</tr>
						</thead>
						<tbody>
						<?php
						$consulta = "SELECT planos.*, clientes.nome AS cliente
									 FROM planos
									 LEFT JOIN clientes ON planos.cliente = clientes.id
									 ORDER BY planos.id DESC;";
						$con = $conn->query($consulta) or die($conn->error);
						while($dado = $con->fetch_array()) { ?>
						<tr>
							<th class="align-middle hide" scope="row"><?php echo $dado['id']; ?></th>
							<td class="align-middle"><?php echo $dado['cliente']; ?></td>
							<td class="align-middle hide"><?php echo $dado['titulo']; ?></td>
							<td style="text-align: right;" class="align-middle actionIcon">
								<form method="POST" action="">
									<input type="hidden" name="id" value="<?php echo $dado['id'] ?>">
									<svg onclick="window.location.href='./ver/?id=<?php echo $dado['id'] ?>'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
									  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
									</svg>
									<svg onclick="shareLink('<?php echo $app['local'] ?>/plano?id=<?php echo $dado['id'] ?>')" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									  <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
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
			<h3>Novo Plano</h3>
			<p>Preencha os campos abaixo para avançar até próxima parte do cadastro.</p>
			<form id="novoCliente" method="POST" action="#">

				<label class="input">Cliente:</label>
				<select name="plano[cliente]">
					<?php
					$consulta = "SELECT * FROM clientes ORDER BY id DESC";
					$con = $conn->query($consulta) or die($conn->error);
					while($dado = $con->fetch_array()) { ?>
					<option value="<?php echo $dado['id']; ?>"><?php echo $dado['nome']; ?></option>
					<?php } ?>
				</select>

				<label class="input">Título:</label>
				<input required placeholder="ex: Dieta moderada" type="text" name="plano[title]">

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