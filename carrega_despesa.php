<?php session_start();
$id_user = $_SESSION['id'];
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
                ,case tipo
                    when 1 then 'Despesa'
                    when 2 then 'Receita'
                end as tipo
                ,sigla
                ,nome
                ,obs 
            FROM lancamentos 
            WHERE id_user = $id_user
            ";
    $tabela = "<table class='responstable'>
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Tipo Lanc</th>
                    <th>Identificacao</th>
                    <th>Nome</th>
                    <th>Observação</th>
                    <th>Ação</th>
                  </tr>
                </thead>
              <tbody>";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tabela .="<tr>";
            $tabela .="<td>".$row["id"]."</td>";
            $tabela .="<td>".$row["tipo"]."</td>";
            $tabela .="<td>".$row["sigla"]."</td>";
            $tabela .="<td>".$row["nome"]."</td>";
            $tabela .="<td>".$row["obs"]."</td>";
            $tabela .="<td><button value='".$row["id"]."'  onClick = 'aoClicarExcluir($(this).val())' >Excluir</button></td>";
            "<br>";
        }
    }
        $tabela .= "</tbody></table>";

        echo  $tabela;

        ?>

        </body>
</html>

