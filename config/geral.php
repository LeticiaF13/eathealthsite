<?php 

	session_start();

	$app = array(
		"nome" => "Eat Health",
		"local" => "http://localhost/eathealth",
		"copy" => "v0.7.3 | © Todos os direitos reservados à Lucas Eduardo e Letícia de Lima",
	);

	if ($page_name != 'Login' AND !isset($_SESSION['admin'])) { echo "<script>window.location.href='".$app['local']."'</script>"; }

	// =================================================================
	// =========================  functions  ===========================
	// =================================================================

	date_default_timezone_set('America/Sao_Paulo');

	function telefone($phoneNumber) {

	    if ($phoneNumber == null OR $phoneNumber == '') {

	    	return '';
	    	
	    } else {
	
		    $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
		    $length = strlen($phoneNumber);

		    if ($length == 10) {
		        $formatted = "(".substr($phoneNumber, 0, 2).") ".substr($phoneNumber, 2, 4)."-".substr($phoneNumber, 6, 4);
		    } elseif ($length == 11) {
		        $formatted = "(".substr($phoneNumber, 0, 2).") ".substr($phoneNumber, 2, 1)." ".substr($phoneNumber, 3, 4)."-".substr($phoneNumber, 7, 4);
		    } else {
		        $formatted = $phoneNumber;
		    }

	    	return $formatted;

	    }

	}

	function cpfCnpj($numero) {
	    $numero = preg_replace('/[^0-9]/', '', $numero);

	    if (strlen($numero) === 11) { // CPF
	        $formatado = substr($numero, 0, 3) . '.' . substr($numero, 3, 3) . '.' . substr($numero, 6, 3) . '-' . substr($numero, 9, 2);
	    } elseif (strlen($numero) === 14) { // CNPJ
	        $formatado = substr($numero, 0, 2) . '.' . substr($numero, 2, 3) . '.' . substr($numero, 5, 3) . '/' . substr($numero, 8, 4) . '-' . substr($numero, 12, 2);
	    } else {
	        $formatado = "Número inválido";
	    }

	    return $formatado;
	}

?>