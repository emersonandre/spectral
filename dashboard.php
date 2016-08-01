
<?php session_start();
    if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
    {
        header('location:index.html');
    }
    $id_user = $_SESSION['id'];
    $logado = $_SESSION['login'];
?>

<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Striped by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets2/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		   <!-- Bootstrap Core CSS -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js" ></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		  
	</head>
	<body>

		<!-- Content -->
			<div id="content">
					<div  id="PaginaPrincipal" class="inner">
							
					</div>
			</div>

		<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="#"><?php echo $logado ?></a></h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li class="current"><a href="#" id="btnhome"> Inicio </a></li>
							<li><a href="#" id="btncadlancamento"> Cadastro Despesas</a></li>
							<li><a href="#" id="btncadmovimentacao">Cadastro Movimentação</a></li>
							<li><a href="#">Relatorios</a></li>
							<li><a href="#">Contato</a></li>
							<li><a href="logout.php">Log Out </a></li>
						</ul>
					</nav>

				<!-- Copyright -->
					<ul id="copyright">
						<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
			<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
			<script src="assets2/js/jquery.min.js"></script>
			<script src="assets2/js/skel.min.js"></script>
			<script src="assets2/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets2/js/main.js"></script>
			<script type="text/javascript">
		        $("#btncadlancamento").click(function(){
		            $("#PaginaPrincipal").load("cad_lancamento.php");            
		        });
		        $("#btncadmovimentacao").click(function(){
		            $("#PaginaPrincipal").load("cad_movimentacao.php");            
		        });
		      //  $("#btnAcompanhante").click(function(){
		      //      $("#descricao").load("./pag-desc/desc-acompanhante.html");
		      //  });

		      function aoClicarExcluir(id){
		      	$.ajax({
		      		type:'post',
		      		url: 'deletacadlanc.php',
		      		data: {'id':id},
		      		success: function(){
		      			$("#tabela_despesa").load('carrega_despesa.php');
		      			alert("Excluido com Sucesso!");
		      		}

		      	});
		      }
		      	function aoClicarExcluir_mov(id){
		      	$.ajax({
		      		type:'post',
		      		url: 'deletacadmov.php',
		      		data: {'id':id},
		      		success: function(){
		      			$("#tabela_mov").load('carrega_mov.php');
		      			alert("Excluido com Sucesso!");
		      		}

		      	});
		      }

		    </script>
			<script>
				$(function() {
				    $( "#mov_dataprog" ).datepicker();
				});
			</script>

	</body>
</html>