<?php
class Contato {

	private $pdo;

	public function __construct() {
		$this->pdo = new PDO("mysql:dbname=crud;host=localhost", "root", "senha");
	}

	public function adicionar($email, $nome = '') {
		if($this->existeEmail($email) == false) {
			$sql = "INSERT INTO user (nome, email) VALUES (:nome, :email)";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':email', $email);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

	public function getInfo ($id) {
		$sql = 'SELECT * FROM user WHERE id = :id';
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return array ();
		}
	}

	public function getAll() {
		$sql = "SELECT * FROM user";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return array();
		}
	}

	public function editar($nome, $email, $id) {
			
		if($this->existeEmail($email) == false) {

			$sql = "UPDATE user SET nome = :nome, email =  :email WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':email', $email);
			$sql->bindValue(':id', $id);
			$sql->execute();
			return true;
		} else {
			return false;
		}

			

		}

	public function excluir($id) {
		
			$sql = "DELETE FROM user WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

		}
	
	private function existeEmail($email) {
		$sql = "SELECT * FROM user WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}



}











