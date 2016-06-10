
<?php
	
	require("chamado.class.php");

	class ChamadoDAO{

		private $localBanco = 'localhost';
		private $usuarioBanco = 'root';
		private $senhaBanco = 'aluno';
		private $nomeBanco = 'CENTRAL';
		private $tabela = 'chamado';
		

		public function __construct(){
	
			$conexao = mysql_connect($this->localBanco, $this->usuarioBanco, $this->senhaBanco)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$nomebanco = mysql_select_db($this->nomeBanco, $conexao)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}



		
		public function inserirChamado($chamado){

			$query = 'INSERT INTO '.$this->tabela.'(titulo, id_usuario, id_id_admin_editor) values ("'.$chamado->getTituto().'", '.$chamado->getIdUsuario().', '.$chamado->getIdChamado().')';

			echo $query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$chamado->setId(mysql_insert_id());
			return $chamado;
		}

		public function atualizarChamado($chamado){

			$query = "UPDATE ".$this->tabela." ";
			$query .= "SET  titulo='".$chamado->getConteudo();
			$query .= "', id_usuario='".$chamado->getIdUsuario();
			$query .= "', id_id_admin_editor='".$chamado->getIdAdminEditor();			
			

			echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function excluirChamado($chamado){


			$query = "DELETE FROM ".$this->tabela;
			$query .= " WHERE id=".$chamado->getId();
			
			echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function buscarTodos(){
			$query = "SELECT * FROM ".$this->tabela;
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			$chamados = [];

			while($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				$chamado = new Chamado( $linha["titulo"], $linha["id_usuario"], $linha["id_admin_editor"]);

				$chamado->setId($linha["id"]);
				
				array_push($chamados, $chamado);
			
			}

			return $chamados;

		}

		


 ?>