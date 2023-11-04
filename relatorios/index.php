<?php 

	$page_name = "Relatórios";
	require "../config/conn.php";
	require "../config/geral.php";
	require "../config/cdn.php";

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
		<div style="margin-top: 25px;" class="row">
			<div class="col-4">
				<h4 class="title">Alimentos</h4>
				<div class="module">
					<table class="table">
						<thead>
							<tr>
								<th style="width: 50px;" class="hide" scope="col">#</th>
								<th scope="col">Nome</th>
								<th style="width: 20%;" class="hide" scope="col">Kcal</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$consulta = "SELECT * FROM alimentos ORDER BY alimento ASC";
						$con = $conn->query($consulta) or die($conn->error);
						while($dado = $con->fetch_array()) { ?>
						<tr>
							<th class="align-middle hide" scope="row"><?php echo $dado['id']; ?></th>
							<td class="align-middle"><?php echo $dado['alimento']; ?></td>
							<td class="align-middle hide"><?php echo $dado['kcal']; ?> kcal</td>

						</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-8">
				<h4 class="title">Relatório de Planos Alimentares</h4>
				<div class="module">
					<form method="POST" action="">
						<div class="row">
							<div class="col-4">
								<label class="input">Cliente:</label>
								<select name="cliente">
									<?php
									$consulta = "SELECT * FROM clientes";
									$con = $conn->query($consulta) or die($conn->error);
									while($dado = $con->fetch_array()) { ?>
									<option value="<?php echo $dado['id'] ?>"><?php echo $dado['nome'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-3">
								<label class="input">Data Inicial:</label>
								<input value="2023-01-01" type="date" name="data_inicial">
							</div>
							<div class="col-3">
								<label class="input">Data Final:</label>
								<input value="<?php echo date('Y-m-d'); ?>" type="date" name="data_final">
							</div>
							<div class="col-2">
								<button name="exportCsv" style="margin-top: 7px; width: 100%;" class="act">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
									</svg>
									Gerar
								</button>
							</div>
						</div>
					</form>
				</div>
				<?php if (isset($_POST['exportCsv'])) { ?>
				<style type="text/css">
					tfoot tr,
					tfoot td {
						background: #00000000 !important;
						font-weight: 500 !important;
					}
				</style>

				<div style="margin-top: 25px;" class="module">
					<table style="display: ;">
					    <thead>
					        <tr>
					            <th>Alimento</th>
					            <th>Porção</th>
					            <th>Kcal</th>
					        </tr>
					    </thead>
					    <tbody>
						<?php

					    $id_cliente_post = $_POST['cliente'];

					    $data_inicial = $_POST['data_inicial'];
					    $data_final = $_POST['data_final'];

					    $sql = "SELECT * FROM planos WHERE cliente = '$id_cliente_post' AND data_criacao BETWEEN '$data_inicial 00:00:00' AND '$data_final 23:59:59'";
					    $result = $conn->query($sql);

					    $query = "SELECT * FROM clientes WHERE id = '$id_cliente_post'";
					    $mysqli_query = mysqli_query($conn, $query);
					    while ($cliente_data = mysqli_fetch_array($mysqli_query)) { $cliente = $cliente_data; }

					    $total_kcal = 0;

					    if ($result->num_rows > 0) {
					        $resultados = array();
					        while ($row = $result->fetch_assoc()) {
					            $alimentos = json_decode($row['json'], true);

					            $plano = array(
					                $alimentos["coffee"],
					                $alimentos["almoco"],
					                $alimentos["jantar"]
					            );

					            $resultados[] = $plano;
					        }

					        foreach ($resultados as $plano) {
					            foreach ($plano as $refeicao) {
					                foreach ($refeicao as $dado) {
					                    $total_kcal += (float) $dado['calorias']; // Somando as calorias
					                    ?>
					                    <tr>
					                        <td><?php echo $dado['alimento'] ?></td>
					                        <td><?php echo $dado['porcao'] ?></td>
					                        <td><?php echo $dado['calorias'] ?></td>
					                    </tr>
					                    <?php
					                }
					            }
					        }
					    } ?>
					    </tbody>
					    <tfoot>
					    	<tr>
					    		<td></td>
					    		<td></td>
					    		<td></td>
					    	</tr>
					        <tr>
					        	<td></td>
					            <td>Total de Calorias:</td>
					            <td><?php echo $total_kcal ?> Kcal</td>
					        </tr>
					        <tr>
					        	<td></td>
					            <td>Cliente:</td>
					            <td><?php echo $cliente['nome'] ?></td>
					        </tr>
					    </tfoot>
					</table>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

</body>
<script>
$(document).ready(function() {
    $('table').DataTable({
        "lengthChange": false,
        "dom": 'Bfrtip',
        "buttons": [
            'excel', 'pdf'
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