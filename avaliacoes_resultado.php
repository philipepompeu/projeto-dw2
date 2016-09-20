		<div class="container">
			<div class="page-header">
				<h1>Resultado da Avaliação</h1>
			</div>
			<ol class="breadcrumb">
				<li><a href="index.html">Academia</a></li>
				<li><a href="#">Avaliações</a></li>				
				<li><a href="avaliacoes_listar.php">Listar</a></li>	
				<li class="active">Detalhes</li>
			</ol>
			<form action="avaliacoes_action.php" role="form" method="POST" name="aval_editar">				
				<div class="form-group">
					<label for="codigo">Código:</label>
					<?php																		
						echo("<input type=\"text\" name=\"codigo\"  class=\"form-control\" value=\"$umaAvaliacao->codigo\" readonly>")
					?>					
				</div>
				<div class="form-group">
					<label for="codCliente">Cliente:</label>
					<?php																		
						echo("<input type=\"text\" name=\"codCliente\"  class=\"form-control\" value=\"$umaAvaliacao->nomeCliente\" readonly>")
					?>					
				</div>
				<div class="form-group">				
					<label for="codAvaliador">Avaliador:</label>
					<?php		
						
						echo("<input type=\"text\" name=\"codAvaliador\"  class=\"form-control\" value=\"$umaAvaliacao->nomeAvaliador \" readonly>")
					?>					
				</div>
				<div class="form-group">
					<label for="data">Data da Avaliação:</label>
					<?php																		
						echo("<input type=\"date\" name=\"data\"  class=\"form-control\" value=\"$umaAvaliacao->data\" readonly>")
					?>					
				</div>
				<div class="form-group">
					<label for="observacao">Observação:</label>
					<textarea rows="5" name="observacao" id="observacao" class="form-control" readonly>
					<?php																		
						echo(trim($umaAvaliacao->observacao))
					?>
					</textarea>
				</div>
				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Risco Coronário</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">				
							<label for="idade">Idade:</label>
							<select name="idade" class="form-control" id="idade" disabled>
								<?php
									$tipos = array("1","2","3","4","5","6");																		
									$valores = array("9-17","18-25","26-35","36-45","45-59","Acima de 60");									
									for($i = 0;$i < sizeof($tipos);$i++)
									{
										if($tipos[$i]== $umaAvaliacao->idade)
										{
											echo("<option value=\"$tipos[$i]\" selected>".$valores[$i]."</option>");
										}else
										{
											echo("<option value=\"$tipos[$i]\">".$valores[$i]."</option>");
										}								
									}
								?>
								
							</select>
						</div>
						<div class="form-group">
							<label for="genero">Gênero:</label>
							<select name="genero" id="genero" class="form-control" disabled>								
								<?php
									$tipos = array("1","2");																		
									$valores = array("Masculino","Feminino");
									for($i = 0;$i < sizeof($tipos);$i++)
									{
										if($tipos[$i]== $umaAvaliacao->genero)
										{
											echo("<option value=\"$tipos[$i]\" selected>".$valores[$i]."</option>");
										}else
										{
											echo("<option value=\"$tipos[$i]\">".$valores[$i]."</option>");
										}								
									}
								?>
							</select>
						</div>						
						<div class="form-group">
							<label for="fumante">Fumante?</label>							
							<?php
								$tipos = array("1","2");																		
								$valores = array("Sim","Não");
								for($i = 0;$i < sizeof($tipos);$i++)
								{
									if($tipos[$i]== $umaAvaliacao->isFumante)
									{											
										if($umaAvaliacao->isFumante == "1")
											$classe = "label-danger";
										else
											$classe = "label-success";												
										echo("<span class=\"label $classe\">".$valores[$i]."</span>");
									}								
								}
							?>							
						</div>
						<?php																		
							
							if($umaAvaliacao->pressao <= 120)
							{								
								$descricao = 'Pressão Normal.';								
								$tipo = 'has-success';	
								$classe = 'bg-success';
							}else
							{								
								$descricao = 'Hipertensão';								
								$tipo = 'has-error';
								$classe = 'bg-danger';
							}
							
							echo("<div class=\"form-group $tipo\">");
							echo("<label for=\"pressao\">Pressão:</label>");	
							
							echo("<input type=\"number\" name=\"pressao\"  class=\"form-control\" value=\"$umaAvaliacao->pressao\" readonly>");	
						
						
							echo("</div>");
							echo("<p class=\"$classe\">$descricao</p>");
						?>							
						<div class="form-group">
							<label for="historicoCardiaco">Histórico Cardiaco?</label>
							<?php
								$tipos = array("1","2");																		
								$valores = array("Sim","Não");
								for($i = 0;$i < sizeof($tipos);$i++)
								{
									if($tipos[$i]== $umaAvaliacao->historicoCardiaco)
									{											
										if($umaAvaliacao->historicoCardiaco == "1")
											$classe = "label-danger";
										else
											$classe = "label-success";												
										echo("<span class=\"label $classe\">".$valores[$i]."</span>");
									}								
								}
							?>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Risco de Diabetes</h3>
					</div>
					<div class="panel-body">												
						<?php		
							/* Os valores normais de glicose no sangue em um dos testes devem mostrar valores entre 60 e 110 mg/dL. 
							Valores inferiores a 60 ou superiores a 110 mg/dL correspondem a problemas relacionados com a hipoglicemia ou,
							
							talvez, com a diabetes mellitus. */							
							
							if($umaAvaliacao->glicemia > 60 and $umaAvaliacao->glicemia < 110)
							{
								$tipo = 'has-success';	
								$classe = 'bg-success';
							}else
							{
								$tipo = 'has-error';
								$classe = 'bg-danger';
							}
							
							if($tipo == 'has-error')								
							{
								if($umaAvaliacao->glicemia < 60)
								{
									$descricao = 'Quadro de Hipoglicemia';
								}elseif($umaAvaliacao->glicemia > 110)
								{
									$descricao = 'Quadro de Hiperglicemia';
								}
							}else
							{
								$descricao = 'Normal';
							}
							
							
							echo("<div class=\"form-group $tipo\">");	
							echo("<label for=\"glicemia\">Glicemia:</label>");
							echo("<input type=\"number\" name=\"glicemia\"  class=\"form-control\" value=\"$umaAvaliacao->glicemia\" readonly>");
							
							echo("</div>");
							echo("<p class=\"$classe\">$descricao</p>");
						?>							
						
						<div class="form-group">
							<label for="historicoDiabetes">Histórico Diabetes?</label>
							<?php
								$tipos = array("1","2");																		
								$valores = array("Sim","Não");
								for($i = 0;$i < sizeof($tipos);$i++)
								{
									
									if($tipos[$i]== $umaAvaliacao->historicoDiabetes)
									{											
										if($umaAvaliacao->historicoDiabetes == "1")
											$classe = "label-danger";
										else
											$classe = "label-success";												
										echo("<span class=\"label $classe\">".$valores[$i]."</span>");
									}								
								}
							?>							
						</div>			
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Composição e Capacidade Neuromotora</h3>
					</div>
					<div class="panel-body">
						<div class="col-xs-4">
							<div class="form-group">
								<label for="altura">Altura:</label>
								<?php	
									$altura = $umaAvaliacao->getAltura();
									echo("<input type=\"number\" name=\"altura\"  class=\"form-control\" value=\"$altura\" readonly>")
								?>
							</div>
							<div class="form-group">
								<label for="peso">Peso:</label>
								<?php																		
									$peso = $umaAvaliacao->getPeso();
									echo("<input type=\"number\" name=\"peso\"  class=\"form-control\" value=\"$peso\" readonly>")
								?>								
							</div>
							<?php
								$imc = $umaAvaliacao->getIMC();
								/* Abaixo de 17	Muito abaixo do peso
								Entre 17 e 18,49	Abaixo do peso
								Entre 18,5 e 24,99	Peso normal
								Entre 25 e 29,99	Acima do peso
								Entre 30 e 34,99	Obesidade I
								Entre 35 e 39,99	Obesidade II (severa)
								Acima de 40	Obesidade III (mórbida) */
								
								if($imc > 18.49)
								{
									if($imc < 25)
									{
										$tipo = 'has-success' ;
										$descricao = 'Parabéns!Você está no seu Peso normal!';
										$tipoAviso = 'bg-success';
									}else									
									{										
										if($imc > 29.99)
										{
											$tipo = 'has-error' ;
											$tipoAviso = 'bg-danger';
											$descricao = 'Cuidado!Quadro de Obesidade.';	
										}
										else
										{
											$tipo = 'has-warning' ;
											$tipoAviso = 'bg-warning';
											$descricao = 'Atenção!Você está Acima do peso ideal.';
										}
									}
								}else
								{									
									if($imc > 17)
									{
										$tipo = 'has-warning' ;
										$tipoAviso = 'bg-warning';
										$descricao = 'Atenção!Você está Abaixo do peso ideal.';	
									}
									else
									{
										$tipo = 'has-error' ;
										$tipoAviso = 'bg-danger';
										$descricao = 'Cuidado!Você está Muito abaixo do peso ideal.';	
									}
								}
								
								echo("<div class=\"form-group  $tipo\">");
								echo("<label for=\"imc\" class=\"control-label\" >IMC:</label>");								
								echo("<input type=\"number\" name=\"imc\"  class=\"form-control\" value=\"$imc\" readonly>");									
								echo("</div>");
								echo("<p class=\"$tipoAviso\">$descricao</p>");
							?>														
							<div class="form-group">
								<label for="flexoes">Quantidade de Flexões:</label>
								<?php																		
									echo("<input type=\"number\" name=\"flexoes\"  class=\"form-control\" value=\"$umaAvaliacao->flexoes\" readonly>")
									/* Flexão
								<=9 RUIM
								10-14 ABAIXO DA média
								15-20 Média
								21-29 Acima da Média
								>=30 Excelente*/
								?>
							</div>
							<?php
									if($umaAvaliacao->abdominais <= 20)
									{
										$descricaoAbdominal = 'Ruim';
										$tipoAbdominal  = 'bg-danger';
									}elseif($umaAvaliacao->abdominais <=24) 									
									{	
										$descricaoAbdominal = 'Abaixo da Média';
										$tipoAbdominal  = 'bg-warning';
									}elseif($umaAvaliacao->abdominais <=30) 									
									{	
										$descricaoAbdominal = 'Média';
										$tipoAbdominal  = 'bg-info';
									}elseif($umaAvaliacao->abdominais <=35) 									
									{	
										$descricaoAbdominal = 'Acima da Média';
										$tipoAbdominal  = 'bg-primary';
									}else									
									{	
										$descricaoAbdominal = 'Excelente';
										$tipoAbdominal  = 'bg-success';
									}
									
									echo("<p class=\"$tipoAbdominal\">$descricaoAbdominal</p>");
							?>
							<div class="form-group">
								<label for="abdominais">Quantidade de Abdominais:</label>
								<?php																		
									echo("<input type=\"number\" name=\"abdominais\"  class=\"form-control\" value=\"$umaAvaliacao->abdominais\" readonly>");
								?>	
							</div>
							<?php
									if($umaAvaliacao->abdominais <= 20)
									{
										$descricaoAbdominal = 'Ruim';
										$tipoAbdominal  = 'bg-danger';
									}elseif($umaAvaliacao->abdominais <=24) 									
									{	
										$descricaoAbdominal = 'Abaixo da Média';
										$tipoAbdominal  = 'bg-warning';
									}elseif($umaAvaliacao->abdominais <=30) 									
									{	
										$descricaoAbdominal = 'Média';
										$tipoAbdominal  = 'bg-info';
									}elseif($umaAvaliacao->abdominais <=35) 									
									{	
										$descricaoAbdominal = 'Acima da Média';
										$tipoAbdominal  = 'bg-primary';
									}else									
									{	
										$descricaoAbdominal = 'Excelente';
										$tipoAbdominal  = 'bg-success';
									}
									
									echo("<p class=\"$tipoAbdominal\">$descricaoAbdominal</p>");
							?>								
						</div>
					</div>
				
				</div>
				<p>
					<a class="btn btn-default btn-lg" href="avaliacoes_listar.php" role="button">Listar</a>					
					<input type="submit" value="Excluir" class="btn btn-danger btn-lg" name="Excluir">
				</p>
			</form>
		</div>
	</body>
	<script src="bootstrap/js/jquery-1.11.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>    
</html>