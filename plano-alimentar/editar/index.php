<?php 

	$page_name = "Plano Alimentar";
	require "../../config/conn.php";
	require "../../config/geral.php";
	require "../../config/cdn.php";

	$id = $_GET['id'];
	$query = "SELECT * FROM planos WHERE id = '$id'";
	$mysqli_query = mysqli_query($conn, $query);
	while ($plano_data = mysqli_fetch_array($mysqli_query)) { $plano = $plano_data; }

	if (isset($_POST['update'])) {

		$id = $_POST['id'];
		$json = json_encode($_POST);

		$sql = "UPDATE planos SET json = '$json' WHERE id = '$id'";
		if ($conn->query($sql) === TRUE) { 
			echo '<script>window.location.href="../ver?id='.$id.'"</script>';
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

	<?php require "../../config/leftbar.php"; ?>
	<form method="POST" action="./" id="update">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	<div class="content">
		<div class="container">
			<div style="margin-top: 25px;" class="row">
				<div style="text-align: left;" class="col-1">
					<div style="text-align: right !important;" class="align">
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
						<input required type="title" value="<?php echo $plano['titulo'] ?>" name="cliente[nome]">
					</div>
				</div>
				<div style="text-align: right;" class="col-2">
					<div style="text-align: right !important;" class="align">
						<button name="update" form="update" class="act">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
							Salvar
						</button>
					</div>
				</div>

				<div class="col-12">
				    <div class="row" id="refeicaoBox" style="margin-top: 25px;">
				        <div class="col-11">
				        	<div class="align">
				            	<h4 class="title">Café da Manhã</h4>
				        	</div>
				        </div>
				        <div class="col-1">
				            <div style="text-align: right !important;" class="align">
				                <button id="novoAlimento-coffee" style="text-align: center; margin-top: 5px;" type="button" class="novoAlimento act">
				                    <svg style='margin-right: 0px;' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
				                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
				                    </svg>
				                </button>
				            </div>
				        </div>
				        <div style="margin-top: 10px;" class="col-12">
				            <div class="module">
				                <div class="row" data-index="1" data-refeicao="coffee" id="alimento-coffee">
				                    <div class="col-7">
				                        <label class="input">Alimento:</label>
				                        <input list="alimentos" class="alimentoNome" type="text" placeholder="ex: Frango" name="coffee[1][alimento]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Porções: (100g)</label>
				                        <input class="porcao" type="number" name="coffee[1][porcao]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Calorias:</label>
				                        <input class="calorias" type="text" name="coffee[1][calorias]">
				                    </div>
				                    <div style="text-align: right !important;" class="col-1">
				                        <button onclick="btnActApagar(this)" data-refeicao="coffee" data-index="1" type="button" style="margin-top: 7px;" class="trash-button coffee act border_color ">
				                            <svg style="margin-right: 0px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
				                            </svg>
				                        </button>
				                    </div>
				                </div>
				                <span id="beforeThis-coffee"></span>
				            </div>
				        </div>
				    </div>
				    <div class="row" id="refeicaoBox" style="margin-top: 25px;">
				        <div class="col-11">
				        	<div class="align">
				            	<h4 class="title">Almoço</h4>
				        	</div>
				        </div>
				        <div class="col-1">
				            <div style="text-align: right !important;" class="align">
				                <button id="novoAlimento-almoco" style="text-align: center; margin-top: 5px;" type="button" class="novoAlimento act">
				                    <svg style='margin-right: 0px;' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
				                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
				                    </svg>
				                </button>
				            </div>
				        </div>
				        <div style="margin-top: 10px;" class="col-12">
				            <div class="module">
				                <div class="row" data-index="1" data-refeicao="almoco" id="alimento-almoco">
				                    <div class="col-7">
				                        <label class="input">Alimento:</label>
				                        <input list="alimentos" class="alimentoNome" type="text" placeholder="ex: Frango" name="almoco[1][alimento]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Porções: (100g)</label>
				                        <input class="porcao" type="number" name="almoco[1][porcao]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Calorias:</label>
				                        <input class="calorias" type="text" name="almoco[1][calorias]">
				                    </div>
				                    <div style="text-align: right !important;" class="col-1">
				                        <button onclick="btnActApagar(this)" data-refeicao="almoco" data-index="1" type="button" style="margin-top: 7px;" class="trash-button almoco act border_color ">
				                            <svg style="margin-right: 0px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
				                            </svg>
				                        </button>
				                    </div>
				                </div>
				                <span id="beforeThis-almoco"></span>
				            </div>
				        </div>
				    </div>
				    <div class="row" id="refeicaoBox" style="margin-top: 25px;">
				        <div class="col-11">
				        	<div class="align">
				            	<h4 class="title">Jantar</h4>
				        	</div>
				        </div>
				        <div class="col-1">
				            <div style="text-align: right !important;" class="align">
				                <button id="novoAlimento-jantar" style="text-align: center; margin-top: 5px;" type="button" class="novoAlimento act">
				                    <svg style='margin-right: 0px;' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
				                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
				                    </svg>
				                </button>
				            </div>
				        </div>
				        <div style="margin-top: 10px;" class="col-12">
				            <div class="module">
				                <div class="row" data-index="1" data-refeicao="jantar" id="alimento-jantar">
				                    <div class="col-7">
				                        <label class="input">Alimento:</label>
				                        <input list="alimentos" class="alimentoNome" type="text" placeholder="ex: Frango" name="jantar[1][alimento]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Porções: (100g)</label>
				                        <input class="porcao" type="number" name="jantar[1][porcao]">
				                    </div>
				                    <div class="col-2">
				                        <label class="input">Calorias:</label>
				                        <input class="calorias" type="text" name="jantar[1][calorias]">
				                    </div>
				                    <div style="text-align: right !important;" class="col-1">
									<button onclick="btnActApagar(this)" data-refeicao="jantar" data-index="1" type="button" style="margin-top: 7px;" class="trash-button jantar act border_color ">
									    <svg style="margin-right: 0px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
									    </svg>
									</button>
				                    </div>
				                </div>
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
				var almocoIndex = 1;
				var jantarIndex = 1;

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