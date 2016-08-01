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
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js" ></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
</head>
<body>
 	<div class="formulario" style="margin-left:11%;">
		<form style=" width:auto;  height:auto; float:left; margin: 10 auto; width: 85%;">
			<fieldset>
			<h2>CADASTRO DE MOVIMENTAÇÂO</h2>	
			<p>
				<div class="12u">
					<div class="15u 12u(mobile)">
						<?php include 'buscalanc.php' ?>
					</div>
				</div>	
			</p>
	  		<div class="15u 12u(mobile)">
		  		<p>
					<div>
						<input type="text" id="mov_nome" placeholder="Nome lancamento">
					</div>
				</p>
				<p>
					<div>
						<input type="text" id="mov_dataprog" placeholder="Data Programada">
					</div>
				</p>
				<p>
					<div>
						<input type="text" id="mov_valor" placeholder="Valor">
					</div>
				</p>
			</div>
				<div class="row 200%">
					<div class="12u">
						<ul class="actions">
							<li><input id="btnGravar" type="button" value="Gravar" />
							<input type="reset" value="Limpar" class="alt" /></li>
						</ul>
					</div>
				</div>
			</p>
			</div>
			</fieldset>
		</form>
		<div class="table" id="tabela_mov" style='width: 100%; height:500px; overflow: auto;'>
			<?php
				include 'carrega_mov.php';
			?>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script>
	$(document).ready(function(){
		$("#btnGravar").click(function(){
			$.ajax({
				type:'post',
				url:'cadastro_mov.php',
				data:{
					'mov_lanc':$('#mov_lanc').val(),
					'mov_nome':$('#mov_nome').val(),
					'mov_dataprog':$('#mov_dataprog').val(),
					'mov_valor':$('#mov_valor').val() }, 
				timeout: '10000',
				error: function(error){
					alert("Erro!");
				},
				success: function(){
					$('#tabela_mov').load('carrega_mov.php');
					alert("Cadastrado com Sucesso!");
				}
			});
		});
	});
	</script>
	<script>
		$(function() {
		    $( "#mov_dataprog" ).datepicker();
		});
	</script>

	</body>
</html>