<?php include('ClassControllerUser.php'); include('config.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
	body { background-color: #f2f2f2 }
</style>

<div class="container">
	<h1 style="text-align: center;">Cadastro Usando Sessão</h1><hr>

	<?php  if (isset($_GET['id_editar'])) { ?>
		<a href="<?php echo $urlSite; ?>">Cadastro</a>
	<?php } ?>

	<div class="row">

		<div class="col-md-4">	
			<?php 
			if (isset($_GET['id_editar'])) { 
				$user->formularioEditar(intval($_GET['id_editar']));
			} else {
				$user->formulario();
			}

			?>


		</div>


		<div class="col-md-8">
			<?php $user->tabela(); ?>
			<a href="<?php echo $urlSite; ?>?acao=limparTabela">Limpar Tabela</a>
		</div>

	</div>



</div>
