<?php
	class Resposta{

		private $id;
		private $conteudo;
		private $data;
		private $id_usuario;			
		private $id_chamado;


		public function __construct($conteudo, $data, $id_usuario, $id_chamado){
			$this->conteudo = $conteudo;
			$this->data = $data;
			$this->id_usuario = $id_usuario;
			$this->id_chamado = $id_chamado;					
		}

		public function getConteudo(){
			return $this->conteudo;
		}

		public function setConteudo($conteudo){
			$this->conteudo = $conteudo;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getData(){
			return $this->data;
		}

		public function setData($data){
			$this->data = $data;
		}

		public function getIdUsuario(){
			return $this->id_usuario;
		}

		public function setIdUsuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}

		public function getIdChamado(){
			return $this->id_chamado;
		}

		public function setIdChamado($id_chamado){
			$this->id_chamado = $id_chamado;
		}
	}
?>
