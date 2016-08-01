
<?php
// session_start inicia a sess�o session_start(); 
// as variáveis login e senha recebem os dados digitados na p�gina anterior

$login = $_POST['login'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$email =  $_POST['email'];

//variaveis de conexão;

if($login!= '' && $senha!='' &&  $nome!='' && $email!='' ){
	$host = 'localhost';
	$usuario = 'master';
	$senhabd = '145819';
	$banco = 'financas';

	//resolve conexão com o banco!
	$con = new mysqli($host, $usuario, $senhabd, $banco) or die ("Sem conexão com o servidor");

	$result = mysqli_query($con,"SELECT * FROM usuario WHERE `usuario` = '$login'");
	if(mysqli_num_rows ($result) > 0 ) { 
		echo "<script> alert('Usuario Ja existe'); location.href = 'new_user.html'; </script>";
	}else{
		$cadastra = mysqli_query($con,"INSERT INTO usuario(nome,email,login,senha) VALUES('$nome','$email','$login','$senha')") or die(mysqli_error());
		echo "<script> alert('Usuario Cadastrado Com Sucesso'); location.href = 'login.html'; </script>";

	}


}else {
	echo "<script> alert('Por Favor Preencha todos os Dados Corretamente!'); location.href = 'new_user.html'; </script>";

}

