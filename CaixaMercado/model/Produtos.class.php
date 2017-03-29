<?php
/**
 * @author Edson Ricardo Czarneski
 */
include_once 'connections/Conexao.class.php';
class Produtos {
    
    public function __construct(){
        $this->con = new Conexao();
    }
      public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
        
//função para cadastro e exibição de produtos
function produtoCadastrado(){   
      $registra = $this->con->conectar()->prepare("SELECT * FROM produtos ORDER BY codigo");
      $registra->execute(); 
    
      foreach($registra as $linha) { 
          $tipoP = $linha['tipo'];
           switch ($tipoP){
                     case 1:
                     $tipoP = "Alimento e Bebida";
                     break;
                     case 2:
                     $tipoP = "Eletroeletrônico";
                     break;
                     case 3:
                     $tipoP = "Medicamentos";
                     break;
                     case 4:
                     $tipoP = "Produtos de Limpeza";
                     break;
                     case 5:
                     $tipoP = "Vestuário";
                     
            }
                  echo '<tr>';
                  echo '<td>'.$linha['codigo'].'</td>';
                  echo '<td style="width:120px">'.$linha['nome'].'</td>';
                  echo '<td style="width:120px">'.$tipoP.'</td>';
                  echo '<td>'.$linha['medida'].'</td>';
                  echo '<td>R$ '.$linha['valorl'].'</td>';                 
                  echo '<td><a href="index.php?pg=model/deletar&acao=produtos&id='.$linha['id_produto'].'" title="Excluir esse dado"><img src="views/img/ico-excluir.png" width="16" height="16" alt="Excluir"></a></td>'; 
                  echo '<input type="hidden" id="action" name="action" />';
                  echo '</tr>';
      }
}
function cadastraProduto($dados){
    if (isset($_POST['cadastrar'])) {
         try{
            $this->codigo        = $dados['codigo'];
            $this->nome          = $dados['desc'];
            $this->tipo          = $dados['opcao'];
            $this->medida        = $dados['un'];
            $this->valorl = strip_tags(trim($dados['preco']));
            $this->indicetaxa   = $dados['opcao'];
                
            $registra = $this->con->conectar()->prepare("INSERT INTO produtos (codigo, nome, medida, tipo, indicetaxa, valorl) VALUES (:codigo, :nome, :medida, :tipo, :indicetaxa, :valorl);");          
            $registra->bindParam(":codigo", $this->codigo, PDO::PARAM_INT);
            $registra->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $registra->bindParam(":medida", $this->medida, PDO::PARAM_STR);
            $registra->bindParam(":tipo", $this->tipo, PDO::PARAM_INT);
            $registra->bindParam(":indicetaxa", $this->indicetaxa, PDO::PARAM_INT);   
            $registra->bindParam(":valorl", $this->valorl, PDO::PARAM_STR);    
             if($registra->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
           
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }  
        
    }
}
}

