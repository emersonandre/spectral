<?php session_start();
// session_start inicia a sess�o session_start(); 
// as variáveis login e senha recebem os dados digitados na p�gina anterior

$login = $_POST['usuario'];
$senha = $_POST['senha'];

//variaveis de conexão;

$host = 'localhost';
$usuario = 'master';
$senhabd = '145819';
$banco = 'financas';

//resolve conexão com o banco!
$con = new mysqli($host, $usuario, $senhabd, $banco) or die ("Sem conexão com o servidor");
if ($con->connect_errno) {
    printf("Connect failed: %s\n", $con->connect_error);
    exit();
}else{
	
	$result = mysqli_query($con,"SELECT id,usuario FROM usuario WHERE usuario= '$login' or email= '$login' AND senha= '$senha'");
	// Verifica se o usuario logado esta ativo.
	if(mysqli_num_rows($result) > 0 ) {
    while($row = $result->fetch_assoc()) {
	$_SESSION['id'] = $row['id'];   
    $_SESSION['login'] = $row['usuario'];
    header('location:dashboard.php'); }}
    else{
        header('location:index.html');
    }


}

//retorna resultado da consulta TRUE ou FALSE

?>