<?php
	
	require("Usuario.class.php");

	class UsuarioDAO{

		private $localBanco = 'localhost';
		private $usuarioBanco = 'root';
		private $senhaBanco = 'aluno';
		private $nomeBanco = 'CENTRAL';
		private $tabela = 'usuario';
		

		public function __construct(){
	
			$conexao = mysql_connect($this->localBanco, $this->usuarioBanco, $this->senhaBanco)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$nomebanco = mysql_select_db($this->nomeBanco, $conexao)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}



		
		public function inserirUsuario($usuario){

			$query = 'INSERT INTO '.$this->tabela.'(nome, email, analista, senha, cpf) values ("'.$usuario->getNome(). '", "'.$usuario->getEmail().'", "'.$usuario->getSenha().'", '.$usuario->getCpf().', "'.$usuario->getAnalista().'")';

			echo $query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$usuario->setId(mysql_insert_id());
			return $usuario;
		}

		public function atualizarUsuario($usuario){

			$query = "UPDATE ".$this->tabela." ";
			$query .= "SET  nome='".$usuario->getNome();
			$query .= "', email='".$usuario->getEmail();	
			$query .= "', senha='".$usuario->getSenha();		
			$query .= ", cpf=".$usuario->getCpf();
			$query .= ", analista='".$usuario->getAnalista();
			$query .= "' WHERE id=".$usuario->getId();

			echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function excluirUsuario($usuario){


			$query = "DELETE FROM ".$this->tabela;
			$query .= " WHERE id=".$usuario->getId();
			
			echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function buscarTodos(){
			$query = "SELECT * FROM ".$this->tabela;
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			$usuarios = [];

			while($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				$usuario = new Usuario( $linha["nome"],$linha["email"], $linha["senha"], $linha["cpf"], $linha["analista"]);

				$usuario->setId($linha["id"]);
				
				array_push($usuarios, $usuario);
			
			}

			return $usuarios;

		}

		public function buscarLogin($nome, $senha){
			$query = "SELECT nome, senha FROM ".$this->tabela." WHERE nome = '".$nome."' AND senha = '".$senha."'";
			

			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		

			if($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				return true;
			
			}


			return false;


		}


	}


 ?>