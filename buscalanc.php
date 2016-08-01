<?php session_start();
    if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
    {
        header('location:index.html');
    }
    $id_user = $_SESSION['id'];
    $logado = $_SESSION['login'];
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
   <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php

$host = 'localhost';
$usuario = 'master';
$senhabd = '145819';
$banco = 'financas';

//resolve conexão com o banco!
$con = new mysqli($host, $usuario, $senhabd, $banco) or die ("Sem conexão com o servidor");
//consulta datas;  
//select que recebe os parametros da funcao
    $sql = "SELECT 
                id
                ,nome
            FROM lancamentos 
            WHERE id_user = $id_user
            ";
    $result = $con->query($sql);
?>
<select id='mov_lanc' name="formTipo">
		<option value="">Select...</option>
		<?php if ($result->num_rows > 0) {
        	  while($row = $result->fetch_assoc()) {?>
		<option value="<?php $row['id']?>"><?php echo $row['nome'] ?></option>
		<?php } }?>
</select>