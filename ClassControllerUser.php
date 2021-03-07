<?php
session_start();
include('ClassUser.php');



$user = new User;


if(isset($_POST)){

	if(isset($_POST['acao'])){
		if($_POST['acao'] == "adicionar"){
			$user->addUser($_POST);
		}

		if($_POST['acao'] == "editar"){
			$user->editUser($_POST);
		}
	}
}


if(isset($_GET)){

	if(isset($_GET['id_excluir'])){

		$user->delUser($_GET['id_excluir']); 

	}

	if(isset($_GET['acao'])){
		if($_GET['acao'] == "limparTabela"){

			$user->delUsersAll(); 

		}

	}

}





?>