<?php 
       
      include_once 'topo.php';    
      include_once 'model/Produtos.class.php';
      //Estanciando
      $objProd = new Produtos();
      
    //Cadastrando Produtos
    $btCadastrar = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $envio = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(isset($btCadastrar['cadastrar'])){    
        if($objProd->cadastraProduto($envio) == 'ok'){
            echo '<script type="text/javascript">alert("Produto Cadastrado com Sucesso!");</script>';
        }else{
            echo '<script type="text/javascript">alert("Erro ao cadastrar");</script>';
        }
   }
?>

    <body>
         <section class="container">

            <form class="cadastro_produtos" method="post" action="">
                <fieldset>
                    <legend>Cadastro de Produtos</legend>
                    <hr/>

                    <label for="codigo">Código:
                        <input type="text" name="codigo" id="codigo" class="sel" required/> 
                    </label>

                    <label for="descricao">Descrição:
                        <input type="text" name="desc" id="desc" class="sel" required/>
                    </label>

                    <label for="opcao">Tipo:
                              <select id="opcao" name="opcao"  class="sel">
                                <option name="opcao" id="opcao" value="1">Alimentos e Bebidas</option>
                                <option name="opcao" id="opcao" value="2">Eletroeletrônico</option>
                                <option name="opcao" id="opcao" value="3">Medicamentos</option>
                                <option name="opcao" id="opcao" value="4">Produtos de Limpeza</option>
                                <option name="opcao" id="opcao" value="5">Vestuário</option>     
                              </select> 
                    </label>

                     <label for="opcao">Unidade:
                              <select id="un" name="un"  class="sel">
                                <option name="un" id="un" value="un">Unidade</option>
                                <option name="un" id="un" value="kg">Kilograma</option> 
                                <option name="un" id="un" value="pc">Peça</option> 
                                <option name="un" id="un" value="l">Litro</option>                                      
                              </select> 
                    </label>

                    <label for="preco">Preço Líquido R$:
                             <input type="text" name="preco" onKeyUp="moeda(this);" class="sel" required/>
                    </label>

                    <br><input type="submit" name="cadastrar" class="btn" value="Cadastrar"/>
                             <input type="reset" name="corrigir" class="btn" value="Corrigir"/>
                </fieldset>
            </form>

            <table class="tabelas" border="1">
                <caption>Produtos Cadastrados</caption>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Sub-classe</th>
                        <th>Medida</th>
                        <th>Preço</th>       
                        <th>Excluir</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php $objProd->produtoCadastrado();                         
                    ?>      
                </tbody>
            </table>

        </section>
    </body>
</html>
