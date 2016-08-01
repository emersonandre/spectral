
<?php session_start();
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:index.html');
    }
    $logado = $_SESSION['login'];
    setlocale(LC_MONETARY, 'pt_BR');
?>

						<div class="formulario">
							<form method="post" action="cadastro_mov.php">
									<h2>CADASTRO DE MOVIMENTAÇÂO</h2>	
									<p>
									<div class="12u">
										<div class="6u 12u(mobile)" style=" margin: 0 auto; width: 30%;">
											<select name="formGender">
											  <option value="">Select...</option>
											  <option value="1">Despesa</option>
											  <option value="2">Receita</option>
											</select>
										</div>
									</div>	
									</p>
	  	
									<div class="12u">
									  	<div class="6u 12u(mobile)" style=" margin: 0 auto; width: 30%;">
										    <input type="text" name="valor" id="name" placeholder="Nome">
										</div>
									</p>
									<p>
									<div class="12u">
									  	<div class="6u 12u(mobile)" style=" margin: 0 auto; width: 30%;">
										    <input type="text" name="obs" id="text" placeholder="Observação">
										</div>
									</p>
									</div>
									   <div class="row 200%">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" value="Gravar" /></li>
													<li><input type="reset" value="Limpar" class="alt" /></li>
												</ul>
											</div>
										</div>
									</p>
								</div>
							</form>
						</div>
	</body>
</html>