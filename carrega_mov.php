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
                m.id as id
                ,m.nome as nomel
                ,case l.tipo
                    when 1 then 'Despesa'
                    when 2 then 'Receita'
                end as tipo
                ,m.nome as nome
                ,m.dataprog as dataprog
                ,m.valor as valor
            FROM movimentacao m
                 left join lancamentos l on (m.id_user = l.id_user)
            WHERE m.id_user = $id_user
            group by m.id
            ";
    $tabela = "<table class='responstable'>
                <thead>
                  <tr>
                    <th>Tipo Lanc</th>
                    <th>Nome Lanc</th>
                    <th>Identificacao</th>
                    <th>Data Programada</th>
                    <th>Valor</th>
                    <th>Situação</th>
                    <th>Acao</th>
                  </tr>
                </thead>
              <tbody>";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tabela .="<tr>";
            $tabela .="<td>".$row["tipo"]."</td>";
            $tabela .="<td>".$row["nomel"]."</td>";
            $tabela .="<td>".$row["nome"]."</td>";
            $tabela .="<td>".$row["dataprog"]."</td>";
            $tabela .="<td>".number_format($row["valor"],2,",",".")."</td>";
            $tabela .="<td><button value='".$row["id"]."'  onClick = 'aoClicarExcluir($(this).val())' >Pago</button></td>";
            $tabela .="<td><button value='".$row["id"]."'  onClick = 'aoClicarExcluir_mov($(this).val())' >Excluir</button></td>";
            "<br>";
        }
    }
        $tabela .= "</tbody></table>";

        echo  $tabela;

        ?>

        </body>
</html>

