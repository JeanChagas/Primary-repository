<?php
	class Usuario{

		private $id;
		private $nome;
		private $cpf;
		private $email;	
		private $senha;			
		private $analista;


		public function __construct($nome, $cpg, $email, $senha, $analista){
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->email = $email;
			$this->senha = $senha;			
			$this->analista = $analista;			
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getAnalista(){
			return $this->analista;
		}

		public function setAnalista($analista){
			$this->analista = $analista;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}


		public function getCpf(){
			return $this->cpf;
		}

		public function setCpf($cpf){
			$this->cpf = $cpf;
		}
	}
?>
