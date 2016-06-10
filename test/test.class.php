<?php	
	
	require("model/usuarioDAO.class.php");

	
	$usuario = new Usuario("Jean", "jean.chagas@kinghost.com.br", "034.480.440-24", aluno, 'false');

	$dao = new UsuarioDAO();

	$dao->inserirUsuario($usuario);

	echo "Inserir o feioso =".$usuario->getId();
	echo "<br>";


	$impressao = [];
	$impressao = $dao->buscarTodos();

	var_dump($impressao);
	
?>
