<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body" >
		
		<div id="conteudo" >
		
		<form action="clientes_alterar.php" role="form" method="POST">
		
		<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Dados pessoais</h3>
					</div>
					<div class="panel-body">
					
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input type="text" name="nome" id="nome" class="form-control" required="required" minlength="5"/>
							<input type="hidden" id="id" name="id"   />
							
						</div>
						
						<div class="form-group">
							<label for="cpf">CPF:</label>
							<input type="text" name="cpf" id="cpf"  class="form-control" pattern="[0-9]+$" required="required" minlength="11" placeholder="Somente números" 
							title="Este campo é obrigatório. Utilize apenas números!" >
						</div>
						
						<div class="form-group">
							<label for="nome">RG:</label>
							<input type="text" name="rg" id="rg"  class="form-control" pattern="[0-9]+$" required="required" minlength="9" placeholder="Somente números"
							title="Este campo é obrigatório. Utilize apenas números!" >
						</div>
						
						<div class="form-group">
							<label for="nascto">Data de nascimento:</label>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<div class="input-group date" id="dnascto">
											<input name="nascto" type="text" id="nascto" class="form-control" />
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</div>
								</div>
								
								</div>
							
						</div>
							
						
						
						<div class="form-group">
							<label for="sexo">Sexo</label>
							<div class="radio">						
								<label><input type="radio" name="sexo" id="M" value="M">Masculino</label>
								<label><input type="radio" name="sexo" id="F" value="F">Feminino</label>
							</div>
						</div>
						
						<div class="form-group">
							<label for="peso">Peso (kg):</label>
							<input type="number" name="peso" id="peso" step="0.1" min="40"  class="form-control" required="required">
						</div>
						
						<div class="form-group">
							<label for="altura">Altura (m):</label>
							<input type="number" name="altura" id="altura" step="0.01" min="1"  class="form-control" required="required">
						</div>						
						
					</div>
				</div>
				
				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Endereço</h3>
					</div>
					<div class="panel-body">
					
						<div class="form-group">
							<label for="cep">CEP:</label>
							<input type="text" name="cep" id="cep" maxlength="8" class="form-control" placeholder="Somente números" pattern="[0-9]+$" required="required"
							title="Este campo é obrigatório. Utilize apenas números!" >
						</div>
						
						<div class="form-group">
							<label for="logradouro">Logradouro:</label>
							<input type="text" name="logradouro" id="logradouro" size="45"  class="form-control" required="required"  >
						</div>
						
						<div class="form-group">
							<label for="numero">Número:</label>
							<input type="text" name="numero" id="numero" size="5"  class="form-control" placeholder="Somente números" pattern="[0-9]+$" required="required"
							title="Este campo é obrigatório. Utilize apenas números!" >
						</div>
						
						<div class="form-group">
							<label for="complemento">Complemento:</label>
							<input type="text" name="complemento" id="complemento" size="5"  class="form-control" placeholder="Ex.: Antigo 8, APTO 301 etc">
						</div>
						
						<div class="form-group">
							<label for="bairro">Bairro:</label>
							<input type="text" name="bairro" id="bairro" size="25"  class="form-control" required="required" 
							title="Este campo é obrigatório."  >
						</div>
						
						<div class="form-group">
							<label for="cidade">Cidade:</label>
							<input type="text" name="cidade" id="cidade" size="25"  class="form-control" required="required"
							title="Este campo é obrigatório."  >
						</div>
						
						<div class="form-group">
							<label for="uf">Estado:</label>
							<input type="text" name="uf" id="uf" size="2"  class="form-control" required="required"
							title="Este campo é obrigatório."  >
						</div>
					</div>
				</div>
				
				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Contatos</h3>
					</div>
					<div class="panel-body">
					
						<div class="form-group">
							<label for="telefone">Telefone:</label>
							<input type="text" name="fixo" id="fixo" class="form-control" placeholder="Somente números e com DDD" required="required"
							title="Este campo é obrigatório. Utilize apenas números!" minlength="10" >
						</div>
						
						<div class="form-group">
							<label for="celular">Celular:</label>
							<input type="text" name="celular" id="celular" class="form-control" placeholder="Somente números e com DDD" required="required"
							title="Este campo é obrigatório. Utilize apenas números!" minlength="10" maxlength="11" >
						</div>
						
						<div class="form-group">
							<label for="email">E-mail:</label>
							<input type="email" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required" >
						</div>
						
						
					</div>
				</div>
				
		
				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
		</form>
      </div>
    </div>
  </div>
</div>