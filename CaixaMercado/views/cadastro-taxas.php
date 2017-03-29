<?php include_once 'topo.php';
      include_once 'model/Taxas.class.php';
      
      //Estanciando classe
      $objTaxa = new Taxas();
    //Cadastrando Taxas
    $btCadastrar = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $envio = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(isset($btCadastrar['cadastrar'])){    
    if($objTaxa->cadastraTaxa($envio) == 'ok'){
        echo '<script type="text/javascript">alert("Taxa Cadastrada com Sucesso!");</script>';
    }else{
        echo '<script type="text/javascript">alert("Erro ao cadastrar");</script>';
    }
}
?>

    <body>
        <section class="container"> 
            <form class="cadastro_produtos" method="post" action="">
                <fieldset>
                <legend>Cadastro de Impostos</legend>
                <hr/>   
                <label for="tipo">Tipo:
                          <select id="opcao" name="opcao"  class="sel">
                            <option name="opcao" id="opcao" value="1">Alimentos e Bebidas</option>
                            <option name="opcao" id="opcao" value="2">Eletroeletrônico</option>
                            <option name="opcao" id="opcao" value="3">Medicamentos</option>
                            <option name="opcao" id="opcao" value="4">Produtos de Limpeza</option>
                            <option name="opcao" id="opcao" value="5">Vestuário</option>  
                            <option name="opcao" id="opcao" value="6">Papelaria</option>  
                          </select> 
                </label> 

                <label for="imposto">Imposto (em %):
                <input type="text" name="imposto" id="imposto" class="sel" required/>
                </label>
                
                <br><input type="submit" name="cadastrar" class="btn" value="Cadastrar"/>
                <input type="reset" name="corrigir" class="btn" value="Corrigir"/>
                </fieldset>
            </form>



            <table class="tabelas" border="1">
                <caption>Taxas Cadastradas</caption>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Sub-Classe</th>
                        <th>Imposto (%)</th>
                        <th>Excluir</th> 
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $objTaxa->visualizaTaxa();?>      
                </tbody>
            </table>
        </section>
    </body>
</html>