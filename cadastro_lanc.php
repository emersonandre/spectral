<?php session_start();
$user = $_SESSION['id'];

// session_start inicia a sess�o session_start(); 
// as variáveis login e senha recebem os dados digitados na p�gina anterior


$tipo = $_POST['tipo'];
$sigla = $_POST['sigla'];
$nome = $_POST['nome'];
$obs = $_POST['obs'];

//variaveis de conexão;

//if($user !='' && $tipo!= '' && $sigla!='' &&  $nome!=''){

	$host = "localhost";
	$usuario = "master";
	$senhabd = "145819";
	$banco = "financas";

		// Create connection
		$conn = mysqli_connect($host, $usuario, $senhabd, $banco);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "INSERT INTO lancamentos (tipo,sigla,nome,obs,id_user)
				VALUES ('$tipo','$sigla','$nome','$obs','$user')";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
