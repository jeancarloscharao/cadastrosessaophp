<?php

class User {

 public $nome;
 public $mail;
 public $senha;

 public function addUser($dados)
 {


  if(isset($_SESSION['clientes'])){

    $tot = count($_SESSION['clientes']);

  } else {
    
    $tot = 0;

  }

  

  $_SESSION['clientes'][] = $dados;

  if(count($_SESSION['clientes']) == ($tot + 1)){

    return true;

  } else {

    return false;
  }

  

}


public function editUser($dados)
{

  $newdata =  array (
    'nome' => $dados['nome'],
    'mail' => $dados['mail'],
    'senha' => $dados['senha']
  );

  
  $_SESSION['clientes'][$dados['id_editar']] = $newdata;

  include('config.php');
  echo '<script>window.location.href = "'.$urlSite.'?id_editar='.$dados['id_editar'].'";</script>'; 


}




public function getUsers()
{

 return $this->dd($_SESSION['clientes']);

}



public function getUser($id)
{

 return $this->dd($_SESSION['clientes'][$id]);

}


public function delUser($id)
{   
  unset($_SESSION['clientes'][$id]);
}


public function delUsersAll()
{   
  unset($_SESSION['clientes']);
}



public function dd($arrayDados)
{
 echo "<pre>";
 var_dump($arrayDados); 
 echo "</pre>";
}




function tabela(){

 include('config.php');
 
 $tabela = "";

 $tabela = $tabela . '<div class="card" style="padding: 10px; margin-top: 10px">';
 $tabela = $tabela . '<h3>Lista</h3>';
 $tabela = $tabela . "<div style='height: 320px; overflow:auto;'>";
 $tabela = $tabela . "<table class='table'>";
 $tabela = $tabela . "<tr>";
 $tabela = $tabela . "<th><strong>Nome</strong></th>";
 $tabela = $tabela . "<th><strong>E-mail</strong></th>";
 $tabela = $tabela . "<th><strong>Senha</strong></th>";
 $tabela = $tabela . "<th></th>";
 $tabela = $tabela . "</tr>";

 if(isset($_SESSION['clientes'])){  

   foreach ($_SESSION['clientes'] as $key => $value) {
    
     $tabela = $tabela . "<tr>";
     $tabela = $tabela . "<td>".$value['nome']."</td>";
     $tabela = $tabela . "<td>".$value['mail']."</td>";
     $tabela = $tabela . "<td>******</td>";
     $tabela = $tabela . "<td><a href='".$urlSite."?id_editar=".$key."' class='btn btn-sm btn-primary'>Editar</a>"; 
     $tabela = $tabela . "<a href='".$urlSite."?id_excluir=".$key."' class='btn btn-sm btn-danger' style='margin-left: 3px;'>Excluir</a></td>";
     $tabela = $tabela . "</tr>";    

   }
 }
 
 $tabela = $tabela . "</table>";
 $tabela = $tabela . "</div>";

 $tabela = $tabela . "</div>";

 echo $tabela;


}


public function formulario(){

  include('config.php');

  $formulario = '
  <div class="card" style="padding: 10px; margin-top: 10px;">

  <h3>Cadastro</h3>
  <hr style="margin-top: 0px; margin-bottom: 0px">
  <form method="POST" action="'.$urlSite.'">
  <div class="form-group">
  <label for="nome"><strong>Nome</strong></label>
  <input type="text" class="form-control" id="nome" name="nome">
  </div>
  <div class="form-group">
  <label for="mail"><strong>E-mail</strong></label>
  <input type="text" class="form-control" id="mail" name="mail">
  </div>
  <div class="form-group">
  <label for="senha"><strong>Senha</strong></label>
  <input type="password" class="form-control" id="senha" name="senha">
  </div>
  <input type="hidden" id="acao" name="acao" value="adicionar">
  <button type="submit" class="btn btn-success">Adicionar</button>
  </form>
  </div>';

  echo $formulario;

}


public function formularioEditar($id){

  include('config.php');

  $formulario = '
  <div class="card" style="padding: 10px; margin-top: 10px">

  <h3>Editar</h3>
  <hr style="margin-top: 0px; margin-bottom: 0px">
  <form method="POST" action="'.$urlSite.'">
  <div class="form-group">
  <label for="nome"><strong>Nome</strong></label>
  <input type="text" class="form-control" id="nome" name="nome" value="'.$_SESSION['clientes'][$id]['nome'].'">
  </div>
  <div class="form-group">
  <label for="mail"><strong>E-mail</strong></label>
  <input type="text" class="form-control" id="mail" name="mail" value="'.$_SESSION['clientes'][$id]['mail'].'">
  </div>
  <div class="form-group">
  <label for="senha"><strong>Senha</strong></label>
  <input type="password" class="form-control" id="senha" name="senha" value="'.$_SESSION['clientes'][$id]['senha'].'">
  </div>
  <input type="hidden" id="acao" name="acao" value="editar">
  <input type="hidden" id="id_editar" name="id_editar" value="'.$id.'">
  
  <button type="submit" class="btn btn-success">Salvar</button>
  </form>
  </div>';

  echo $formulario;   

}

}







