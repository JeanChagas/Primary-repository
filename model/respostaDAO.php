
<?php
	
	require("resposta.class.php");

	class RespostaDAO{

		private $localBanco = 'localhost';
		private $usuarioBanco = 'root';
		private $senhaBanco = 'aluno';
		private $nomeBanco = 'CENTRAL';
		private $tabela = 'resposta';
		


		public function __construct(){
	
			$conexao = mysql_connect($this->localBanco, $this->usuarioBanco, $this->senhaBanco)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$nomebanco = mysql_select_db($this->nomeBanco, $conexao)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}



		
		public function inserirResposta($resposta){

			$query = 'INSERT INTO '.$this->tabela.'(conteudo, data, id_usuario, id_chamado) values ("'.$resposta->getConteudo(). '", "'.$resposta->getData().'", '.$resposta->getIdUsuario().', "'.$resposta->getIdChamado().')';

			echo $query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$resposta->setId(mysql_insert_id());
			return $resposta;
		}

		public function atualizarResposta($resposta){

			$query = "UPDATE ".$this->tabela." ";
			$query .= "SET  conteudo='".$chamado->getConteudo();
			$query .= "', data='".$chamado->getData();
			$query .= "', id_usuario='".$chamado->getIdUsuario();
			$query .= "', id_chamado='".$chamado->getIdChamado();	
			

			echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function excluirResposta($resposta){


			$query = "DELETE FROM ".$this->tabela;
			$query .= " WHERE id=".$resposta->getId();
			
			echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function buscarTodos(){
			$query = "SELECT * FROM ".$this->tabela;
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			$respostas = [];

			while($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				$resposta = new Resposta( $linha["conteudo"],$linha["data"], $linha["id_usuario"], $linha["id_chamado"]);

				$resposta->setId($linha["id"]);
				
				array_push($respostas, $resposta);
			
			}

			return $respostas;

		}

		


	}


 ?>