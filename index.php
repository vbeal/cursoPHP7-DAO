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

$usuario = new Usuario();
$usuario->login($_GET['login'],$_GET['senha']);

echo $usuario;

?>