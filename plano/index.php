<?php 

	$page_name = "Plano Alimentar";
	require "../config/conn.php";
	require "../config/geral.php";
	require "../config/cdn.php";

	$id = $_GET['id'];
	$query = "SELECT * FROM planos WHERE id = '$id'";
	$mysqli_query = mysqli_query($conn, $query);
	while ($plano_data = mysqli_fetch_array($mysqli_query)) { $plano = $plano_data; }

	if (isset($_POST['update'])) {

		$id = $_POST['id'];
		$json = json_encode($_POST);

		$sql = "UPDATE planos SET json = '$json' WHERE id = '$id'";
		if ($conn->query($sql) === TRUE) { 
			echo '<script>window.location.href="./ver?id='.$id.'"</script>';
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
	<link rel="stylesheet" type="text/css" href="../assets/css/clientes.css">

	<script type="text/javascript">
	function apagarAlimento(refeicao, index) {
	    var alimentoDiv = $('#alimento-' + refeicao + '-' + index);
	    alimentoDiv.remove();
	}

	function btnActApagar(button) {
	    var refeicao = $(button).data('refeicao');
	    var index = $(button).data('index');
	    console.log('Clicou no botão trash-button de ' + refeicao + ' com index: ' + index);
	    apagarAlimento(refeicao, index);
	}
	</script>

</head>
<body>

	<form method="POST" action="./" id="update">
	<input disabled type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	<div style="margin-top: 50px;" class="">
		<div class="container">
			<div style="margin-top: 25px;" class="row">
				<div class="col-12">
					<div class="align">
						<input disabled required type="title" value="<?php echo $plano['titulo'] ?>" name="cliente[nome]">
					</div>
				</div>
				<div class="col-12">
				    <div class="row" id="refeicaoBox" style="margin-top: 25px;">
				        <div class="col-12">
				        	<div class="align">
				            	<h4 class="title">Café da Manhã</h4>
				        	</div>
				        </div>
				        <div style="margin-top: 10px;" class="col-12">
				            <div class="module">
				            	<?php 
			            		$json_coffee = json_decode($plano['json'], true);
			            		$json_coffee = $json_coffee['coffee'];
			            		foreach ($json_coffee as $i => $coffee) { ?>
				                <div class="row" data-index="<?php echo $i ?>" data-refeicao="coffee" id="alimento-coffee<?php if ($i != 1) { echo '-' . $i; } ?>">
				                    <div class="col-8">
				                        <label class="input">Alimento:</label>
				                        <input disabled list="alimentos" class="alimentoNome" type="text" placeholder="ex: Frango" value="<?php echo $coffee['alimento'] ?>" name="coffee[<?php echo $i ?>][alimento]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Porções: (100g)</label>
				                        <input disabled class="porcao" type="number" value="<?php echo $coffee['porcao'] ?>" name="coffee[<?php echo $i ?>][porcao]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Calorias:</label>
				                        <input disabled class="calorias" type="text" value="<?php echo $coffee['calorias'] ?>" name="coffee[<?php echo $i ?>][calorias]">
				                    </div>
				                </div>
				                <?php $lastIndexCoffee = $i; } ?>
				                <span id="beforeThis-coffee"></span>
				            </div>
				        </div>
				    </div>
				    <div class="row" id="refeicaoBox" style="margin-top: 25px;">
				        <div class="col-12">
				        	<div class="align">
				            	<h4 class="title">Almoço</h4>
				        	</div>
				        </div>
				        <div style="margin-top: 10px;" class="col-12">
				            <div class="module">
				            	<?php 
			            		$json_almoco = json_decode($plano['json'], true);
			            		$json_almoco = $json_almoco['almoco'];
			            		foreach ($json_almoco as $i => $almoco) { ?>
				                <div class="row" data-index="<?php echo $i ?>" data-refeicao="almoco" id="alimento-almoco<?php if ($i != 1) { echo '-' . $i; } ?>">
				                    <div class="col-8">
				                        <label class="input">Alimento:</label>
				                        <input disabled list="alimentos" class="alimentoNome" type="text" placeholder="ex: Frango" value="<?php echo $almoco['alimento'] ?>" name="almoco[<?php echo $i ?>][alimento]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Porções: (100g)</label>
				                        <input disabled class="porcao" type="number" value="<?php echo $almoco['porcao'] ?>" name="almoco[<?php echo $i ?>][porcao]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Calorias:</label>
				                        <input disabled class="calorias" type="text" value="<?php echo $almoco['calorias'] ?>" name="almoco[<?php echo $i ?>][calorias]">
				                    </div>
				                </div>
				                <?php $lastIndexAlmoco = $i; } ?>
				                <span id="beforeThis-almoco"></span>
				            </div>
				        </div>
				    </div>
				    <div class="row" id="refeicaoBox" style="margin-top: 25px;">
				        <div class="col-12">
				        	<div class="align">
				            	<h4 class="title">Jantar</h4>
				        	</div>
				        </div>
				        <div style="margin-top: 10px;" class="col-12">
				            <div class="module">
				            	<?php 
			            		$json_jantar = json_decode($plano['json'], true);
			            		$json_jantar = $json_jantar['jantar'];
			            		foreach ($json_jantar as $i => $jantar) { ?>
				                <div class="row" data-index="<?php echo $i ?>" data-refeicao="jantar" id="alimento-jantar<?php if ($i != 1) { echo '-' . $i; } ?>">
				                    <div class="col-8">
				                        <label class="input">Alimento:</label>
				                        <input disabled list="alimentos" class="alimentoNome" type="text" placeholder="ex: Frango" value="<?php echo $jantar['alimento'] ?>" name="jantar[<?php echo $i ?>][alimento]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Porções: (100g)</label>
				                        <input disabled class="porcao" type="number" value="<?php echo $jantar['porcao'] ?>" name="jantar[<?php echo $i ?>][porcao]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Calorias:</label>
				                        <input disabled class="calorias" type="text" value="<?php echo $jantar['calorias'] ?>" name="jantar[<?php echo $i ?>][calorias]">
				                    </div>
				                </div>
				            	<?php $lastIndexJantar = $i; } ?>
				                <span id="beforeThis-jantar"></span>
				            </div>
				        </div>
				    </div>
				</div>

				<datalist id="alimentos">
					<?php
					$consulta = "SELECT * FROM alimentos ORDER BY alimento DESC";
					$con = $conn->query($consulta) or die($conn->error);
					while($dado = $con->fetch_array()) { ?>
					<option data-kcal="<?php echo $dado['kcal'] ?>" value="<?php echo $dado['alimento'] ?>">
					<?php } ?>
				</datalist>

				<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
				<script>
				var coffeeIndex = 1;
				var almocoIndex = <?php echo $lastIndexAlmoco ?>;
				var jantarIndex = <?php echo $lastIndexJantar ?>;

				$(document).ready(function () {

				    function cloneAlimento(refeicao) {
				        var alimentoDiv = $('#alimento-' + refeicao);
				        var clone = alimentoDiv.clone();

				        var index;
				        switch (refeicao) {
				            case 'coffee':
				                coffeeIndex++;
				                index = coffeeIndex;
				                break;
				            case 'almoco':
				                almocoIndex++;
				                index = almocoIndex;
				                break;
				            case 'jantar':
				                jantarIndex++;
				                index = jantarIndex;
				                break;
				            default:
				                index = 1;
				        }

				        // Altere os valores dos atributos 'name', 'data-index', e 'id' do novo elemento clonado
				        clone.attr('id', 'alimento-' + refeicao + '-' + index);
				        clone.data('index', index);
				        clone.find('.alimentoNome').attr('name', refeicao + '[' + index + '][alimento]');
				        clone.find('.porcao').attr('name', refeicao + '[' + index + '][porcao]');
				        clone.find('.calorias').attr('name', refeicao + '[' + index + '][calorias]');
				        clone.find('.trash-button').attr('data-index', index);

				        // Insira o novo elemento antes do elemento com id 'beforeThis-refeicao'
				        $('#beforeThis-' + refeicao).before(clone);
				    }

				    // Manipule o clique no botão "novoAlimento" da refeição
				    $('#novoAlimento-coffee').click(function () {
				        cloneAlimento('coffee');
				    });

				    $('#novoAlimento-almoco').click(function () {
				        cloneAlimento('almoco');
				    });

				    $('#novoAlimento-jantar').click(function () {
				        cloneAlimento('jantar');
				    });
				});

				// Use a delegação de eventos para capturar eventos de input em elementos .alimentoNome
				$(document).on('input', '.alimentoNome', function () {
				    var refeicao = $(this).closest('.row').data('refeicao');
				    var index = $(this).closest('.row').data('index');
				    var descricao = $(this).val();
				    
				    // Encontre o datalist correspondente
				    var datalist = $(this).attr('list');
				    var selectedOption = $('#' + datalist + ' option[value="' + descricao + '"]');

				    if (selectedOption.length > 0) {
				        // Obtenha o valor de data-kcal do elemento option selecionado
				        var kcal = selectedOption.data('kcal');

				        // Atualize os campos de calorias e porção
				        $('input[name="' + refeicao + '[' + index + '][calorias]"]').val(kcal);
				        $('input[name="' + refeicao + '[' + index + '][porcao]"]').val('1'); // Define o valor padrão como 100
				    }
				});

				</script>

			</div>
		</div>
	</div>
	</form>

</body>
</html>