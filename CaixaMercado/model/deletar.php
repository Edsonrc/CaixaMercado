<?php
require_once 'connections/Conexao.class.php';

$id = $_GET ['id'];
$acao = $_GET['acao'];
$con = new Conexao();
if ($acao == 'produtos') {
   
                try{
		$cst = $con->conectar()->prepare("DELETE FROM produtos WHERE id_produto = :id;");
		$cst->bindParam(":id", $id, PDO::PARAM_INT);
		if($cst->execute()){
                     header('location: index.php?pg=views/cadastro-produto');
		}else{
		  return 'Erro ao deletar';
		}
		}catch(PDOException $e){
		  return 'Error: '.$e->getMessage();
		}
    
}else{
    try{
		$cst = $con->conectar()->prepare("DELETE FROM taxas WHERE id_taxas = :id;");
		$cst->bindParam(":id", $id, PDO::PARAM_INT);
		if($cst->execute()){
                     header('location: index.php?pg=views/cadastro-taxas');
		}else{
		  return 'Erro ao deletar';
		}
		}catch(PDOException $e){
		  return 'Error: '.$e->getMessage();
		}
    
}
?>