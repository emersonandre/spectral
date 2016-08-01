<?php session_start();
    $id_user = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js" ></script>
</head>
<body>
 	<div class="formulario" style="margin-left:11%;">
		<form style=" width:auto;  height:auto; float:left; margin: 10 auto; width: 100%;">
			<fieldset>
			<h2>CADASTRO DE DESPESAS</h2>	
			<p>
				<div class="12u">
					<div class="6u 12u(mobile)">
						<select id='cad_tipo' name="formTipo">
							<option value="">Select...</option>
							<option value="1">Despesa</option>
							<option value="2">Receita</option>
						</select>
					</div>
				</div>	
			</p>
	  		<div class="12u">
				<div class="6u 12u(mobile)">
					<input type="text" name="sigla" id="cad_sigla" placeholder="Sigla">
				</div>
			</p>
				<div class="6u 12u(mobile)" >
					<input type="text" name="nome" id="cad_nome" placeholder="Nome">
				</div>
			</p>
			<p>
				<div class="6u 12u(mobile)">
					<input type="text" name="obs" id="cad_obs" placeholder="Observação">
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
		<div class="table" id="tabela_despesa" style='width: 100%; height:500px; overflow: auto;'>
			<?php
				include 'carrega_despesa.php';
			?>
		</div>
	</div>
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
				url:'cadastro_lanc.php',
				data:{
					'tipo':$('#cad_tipo').val(),
					'sigla':$('#cad_sigla').val(),
					'nome':$('#cad_nome').val(),
					'obs':$('#cad_obs').val() }, 
				timeout: '10000',
				error: function(error){
					alert("Erro!");
				},
				success: function(){
					$('#tabela_despesa').load('carrega_despesa.php');
					alert("Cadastrado com Sucesso!");
				}
			});
		});
	});
	</script>

	</body>
</html>