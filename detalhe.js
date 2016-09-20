
$(function () {
										$("#dnascto").datetimepicker({
											locale: "pt-br",
											format: "DD/MM/YYYY"
										});
									});

            function detalhe(id) {        
                var url = "detalhes_cliente.php";
            
                $.getJSON(url,{ id: id },function (cliente) {
                    
					$("#myModalLabel").html("Cliente #" + cliente.id + "<br/><p style='font-size:15px'><b>Cliente desde " + cliente.dtcadastro + "</b></p>");
					$("#nome").val(cliente.nome);
					$("#cpf").val(cliente.cpf);
					$("#rg").val(cliente.rg);
					$("#nascto").val(cliente.nascto);
					document.getElementById(cliente.sexo).checked = true;
					$("#peso").val(cliente.peso);
					$("#altura").val(cliente.altura);
					$("#cep").val(cliente.cep);
					$("#logradouro").val(cliente.logradouro);
					$("#numero").val(cliente.numero);
					$("#bairro").val(cliente.bairro);
					$("#complemento").val(cliente.complemento);
					$("#cidade").val(cliente.cidade);
					$("#uf").val(cliente.uf);
					$("#celular").val(cliente.celular);
					$("#fixo").val(cliente.fixo);
					$("#email").val(cliente.email);
					$("#id").val(cliente.id);
					
                }
            );
        }
		
		
		