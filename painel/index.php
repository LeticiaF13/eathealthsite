<?php 

	$page_name = "Painel";
	require "../config/conn.php";
	require "../config/geral.php";
	require "../config/cdn.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
				<div class="col-6 col-xl-6 col-xxl-4">
					<div class="row">
						<div  class="col-12">
							<h4 class="title"> </h4>
						</div>
						<div class="col-6 col-lg-6 col-xxl-6">
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
						<div class="col-6 col-lg-6 col-xxl-6">
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
					</div>
				</div>
				<div style="margin-top: 15px;" class="col-12">
					<div class="row">
						<div class="col-6">
							<div class="row">
								<div class="col-8">
									<div class="align">
										<h4 class="title">Clientes:</h4>
									</div>
								</div>
								<div style="text-align: right;" class="col-4">
									<div class="align">
										<button onclick="window.location.href='../clie'" style="margin: 15px 0px;" class="act_border">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
											</svg>
											Ver Todos
										</button>
									</div>
								</div>
								<div class="col-12">
									<div class="module">
										<table class="table">
											<thead>
												<tr>
													<th style="width: 50px;" class="hide" scope="col">#</th>
													<th scope="col">Nome</th>
													<th class="hide" scope="col">Email</th>
													<th class="hide" scope="col">Telefone</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$consulta = "SELECT * FROM clientes ORDER BY id DESC LIMIT 5";
											$con = $conn->query($consulta) or die($conn->error);
											while($dado = $con->fetch_array()) { ?>
											<tr>
												<th class="align-middle hide" scope="row"><?php echo $dado['id']; ?></th>
												<td class="align-middle"><?php echo $dado['nome']; ?></td>
												<td class="align-middle hide"><?php echo $dado['email']; ?></td>
												<td class="align-middle hide"><?php echo telefone($dado['telefone']); ?></td>
											</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="row">
								<div class="col-8">
									<div class="align">
										<h4 class="title">Planos Alimentares:</h4>
									</div>
								</div>
								<div style="text-align: right;" class="col-4">
									<div class="align">
										<button onclick="window.location.href='../clie'" style="margin: 15px 0px;" class="act_border">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
											</svg>
											Ver Todos
										</button>
									</div>
								</div>
								<div class="col-12">
									<div class="module">
										<table class="table">
											<thead>
												<tr>
													<th style="width: 50px;" class="hide" scope="col">#</th>
													<th scope="col">Nome</th>
													<th class="hide" scope="col">Email</th>
													<th class="hide" scope="col">Telefone</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$consulta = "SELECT * FROM clientes ORDER BY id DESC LIMIT 5";
											$con = $conn->query($consulta) or die($conn->error);
											while($dado = $con->fetch_array()) { ?>
											<tr>
												<th class="align-middle hide" scope="row"><?php echo $dado['id']; ?></th>
												<td class="align-middle"><?php echo $dado['nome']; ?></td>
												<td class="align-middle hide"><?php echo $dado['email']; ?></td>
												<td class="align-middle hide"><?php echo telefone($dado['telefone']); ?></td>
											</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>