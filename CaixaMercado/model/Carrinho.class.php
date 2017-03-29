<?php
include_once 'connections/Conexao.class.php';
class Carrinho {
        public function __construct(){
        $this->con = new Conexao();
    }
      public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    function carrinho(){
          if (count($_SESSION['carrinho']) == 0) {
            echo '<tr><td colspan="7" style="color:green">Não há produto no carrinho !.</td></tr>';
      }else{
           $totalCompra  = 0;
           $totalImposto = 0;
           
           foreach ($_SESSION['carrinho'] as $id => $qtd) {
               
               $sqlCarrinho = $this->con->conectar()->prepare("SELECT * FROM produtos AS p CROSS JOIN taxas WHERE p.indicetaxa = taxas.tipo AND  id_produto = '$id'"); 
               $sqlCarrinho->execute();
             
               $resAssoc = $sqlCarrinho->fetch(PDO::FETCH_ASSOC);
             $imposto      = $resAssoc['valori'];
             $nome         = $resAssoc ['nome'];
             $precoLiquido = $resAssoc ['valorl'];
               //Passando string para float
             $precoL = str_replace(".", "", "$precoLiquido");
             $precoL = str_replace(",", ".", "$precoLiquido");
             $valorL = floatval($precoL);
             $impostoL = str_replace(".", "", "$imposto");
             $impostoL = str_replace(",", ".", "$imposto");
             $valorIL  = floatval($impostoL);
             
             // Cálculo da Porcentagem do imposto
             $preco   = ($valorL * $valorIL)/100 + $valorL;                     
             // Cálculo do valor do imposto 
             $valorImposto = $preco - $valorL;           
             
             //Calculando subtotal
             $subtotal = $preco * $qtd;  
             //Calculando Total da Compra
             $totalCompra += $subtotal;                  
             //Calculando Total do Imposto
             $subImposto = $valorImposto * $qtd;
             $totalImposto += $subImposto;
            
              echo "<tr>";
              echo '<td>'.$nome.'</td>';
              echo '<td><input type="text" size="10" style="text-align:center;height:20px;" name="prod['.$id.']" value="'.$qtd.'"</td>';
              echo '<td> R$'.number_format($preco,2,",",".").'</td>';
              echo '<td> R$'.$precoLiquido.'</td>';
              echo '<td> R$'.number_format($valorImposto,2,",",".").'</td>';
              echo '<td> R$'.number_format($subtotal,2,",",".").'</td>';
              echo '<td><a href="index.php?pg=views/home&acao=del&id='.$id.'"><img src="views/img/ico-excluir.png"></td>';
              }
              echo '<tr>                   
                        <td colspan="2" style="color:#0000cd;">TOTAL DA COMPRA: <b>R$ '.number_format($totalCompra,2,",",".").'</b></td>
                        <td colspan="5" style="color:#ff0000;">TOTAL DA IMPOSTO: <b>R$ '.number_format($totalImposto,2,",",".").'</b></td>
                    </tr>';
      }
    }
}