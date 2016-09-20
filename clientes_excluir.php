<?php	
				
								
								require('funcoes.php');
								
								$id = $_GET['id'];
								
								$cliente = new Cliente;
								
								
									
									$cliente::deletaCliente($id);
								
								
								header('Location: clientes_listar.php');
								
								
				?>