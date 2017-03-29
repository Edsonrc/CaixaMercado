<?php
include_once 'connections/connections.php';


$codigo = $_POST['numero'];

$buscar = $pdo->prepare("SELECT * FROM produtos WHERE codigo = '$codigo'");
$buscar->execute();

    $retorno = array();
    $retorno['dados'] = '';   
    $retorno['qtd'] = $buscar->rowCount();
    

    if($retorno['qtd'] >= 0){    
      while($conteudo = $buscar->fetchObject()){
       echo  '<button class="btn" id="botao"><a href="index.php?pg=views/home&acao=add&id='.$conteudo->id_produto.'">INSERIR</a></button>';  

      }
    }



