<?php

require_once("config.php");

//$sql = new Sql();

//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

//echo json_encode($usuarios);

//carrega um usuário
//$root = new Usuario();
//$root->loadbyId(6);
//echo $root;

//carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carega uma lita de usuarios buscando pelo login
//$busca = Usuario::busca("u");
//Carrega vindo de um GET
//$busca = Usuario::busca($_GET['t']);
//echo json_encode($busca);


//Carrega Usuário e senha
//$usuario = new Usuario();
//$usuario->login($_GET['login'],$_GET['senha']);
//echo $usuario;

//$aluno = new Usuario($_GET['login'],$_GET['senha']);
//$aluno->setLogin("aluno2");
//$aluno->setSenha("@alu011111");
//ou poderia vir de um meto GET ou POST
//$aluno->setLogin($_GET['login']);
//$aluno->setSenha($_GET['senha']);

//$aluno->inserir();

//print_r($aluno);


/* Aletar um usuário 
$usuario = new Usuario();

$usuario->loadbyId(14);
$usuario->update("Maluco","12das124");
echo $usuario;
*/

$usuario = new Usuario();

$usuario->loadbyId(10);
$usuario->deletar();
echo $usuario;
?>