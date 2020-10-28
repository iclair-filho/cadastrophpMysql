<?php
        $server     = "localhost";
        $user       = "root";
        $pass       = "";
        $bd         = "empresa";

	if ($conn = mysqli_connect($server, $user, $pass, $bd)){
		// echo "Conectado com sucesso";
	} else {
		echo "ERRO!!! - Banco de dados não Conectado";
	}

	function mensagem ($text, $tipo){
		echo "<div class='alert alert-$tipo' role='alert'>
  			$text
			</div>";
	}

	function formato_data ($data){
		$d = explode('-', $data);
		$escreve = $d[2]."/".$d[1]."/".$d[0];
		return $escreve;


	}

?>