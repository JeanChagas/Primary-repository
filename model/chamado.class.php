<?php
	class Resposta{

		private $id;
		private $titulo;
		private $id_admin_editor;
		private $id_usuario;			
	


		public function __construct($titulo, $id_admin_editor, $id_usuario){
			$this->titulo = $titulo;
			$this->id_admin_editor = $id_admin_editor;
			$this->id_usuario = $id_usuario;			
		}

		public function getTitudo(){
			return $this->titulo;
		}

		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getIdAdminEditor(){
			return $this->id_admin_editor;
		}

		public function setIdAdminEditor($id_admin_editor){
			$this->id_admin_editor = $id_admin_editor;
		}

		public function getIdUsuario(){
			return $this->id_usuario;
		}

		public function setIdUsuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}
	}
?>
