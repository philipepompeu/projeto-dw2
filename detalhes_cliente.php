<?php
 require('funcoes.php');
 
$id = $_GET['id'];

$idint = intval($id);
 

 
$cli = new Cliente;

$res = $cli::listaCliente($idint);

//$dtcadastro = date('d/m/Y', strtotime($res->dtcadastro));

$dados['id'] = (string) $res->id; 
$dados['nome'] = (string) $res->nome;
$dados['cpf'] = (string) $res->cpf;
$dados['rg'] = (string) $res->rg;
$dados['nascto'] = (string) $res->nascto;
$dados['sexo'] = (string) $res->sexo;
$dados['peso'] = (string) $res->peso;
$dados['altura'] = (string) $res->altura;
$dados['cep'] = (string) $res->cep;
$dados['logradouro'] = (string) $res->logradouro;
$dados['numero'] = (string) $res->numero;
$dados['complemento'] = (string) $res->complemento;
$dados['bairro'] = (string) $res->bairro;
$dados['cidade'] = (string) $res->cidade;
$dados['uf'] = (string) $res->uf;
$dados['celular'] = (string) $res->celular;
$dados['fixo'] = (string) $res->fixo;
$dados['email'] = (string) $res->email;
$dados['dtcadastro'] = (string) date('d/m/Y', strtotime($res->dtcadastro));



 
echo json_encode($dados);
 
?>