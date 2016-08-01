<?php session_start();
    if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
    {
        header('location:index.html');
    }
    $user = $_SESSION['id'];
    $logado = $_SESSION['login'];
?>


<?php
// session_start inicia a sess�o session_start(); 
// as variáveis login e senha recebem os dados digitados na p�gina anterior


$nome= $_POST['mov_nome'];
$dataprog = $_POST['mov_dataprog'];
$valor = $_POST['mov_valor'];
$lanc = $_POST['mov_lanc'];

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

		$sql = "INSERT INTO movimentacao (nome,dataprog,valor,id_user,id_lanc)
				VALUES ('$nome','$dataprog','$valor','$user','$lanc')";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
