<?php

//Classe do Usuário

class Usuario {

	//Nomes dos campos na tabela tb_usuarios
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	//Pega o ID do Usuário
	public function getIdusuario(){
		return $this->idusuario;
	}

	//Seta o ID do Usuário
	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	//Pega o Senha do Usuário
	public function getSenha(){
		return $this->dessenha;
	}

	//Seta o Senha do Usuário
	public function setSenha($value){
		$this->dessenha = $value;
	}

	//Pega o Login do Usuário
	public function getLogin(){
		return $this->deslogin;
	}

	//Seta o Logindo Usuário
	public function setLogin($value){
		$this->deslogin = $value;
	}

	//Pega o Data do Usuário
	public function getDataCad(){
		return $this->dtcadastro;
	}

	//Seta o Data do Usuário
	public function setDataCad($value){
		$this->dtcadastro = $value;
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * from tb_usuarios WHERE idusuario = :ID", array(

			":ID"=>$id
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		}
	}

	//tras a lista de todos os usuários
	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
	}

	public static function busca($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :BUSCA ORDER BY deslogin", array(
			':BUSCA'=>"%".$login."%"
		));

	}

	public function login($login, $senha){

		$sql = new Sql();

		$results = $sql->select("SELECT * from tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA", array(

			":LOGIN"=>$login,
			":SENHA"=>$senha
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		} else {

			throw new Exception("Login ou senha inválidos Maluco!!!");
			
		}
	}

	public function setData($data){

		$this->setIdusuario($data['idusuario']);
		$this->setLogin($data['deslogin']);
		$this->setSenha($data['dessenha']);
		$this->setDataCad(new DateTime($data['dtcadastro']));


	}

	public function inserir(){

		$sql = new Sql();
		//precisa  criar essa procedure dentro do banco de dados
		//$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :SENHA)", array(
		$results = $sql->select("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES (:LOGIN, :SENHA)", array(
				':LOGIN'=>$this->getLogin(),
				':SENHA'=>$this->getSenha()
		));

		if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}


	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getLogin(),
			"dessenha"=>$this->getSenha(),
			"dtcadastro"=>$this->getDataCad()->format("d/m/y H:i:s")

		));
	}
}



?>