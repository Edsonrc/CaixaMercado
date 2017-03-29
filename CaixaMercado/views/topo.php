<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Caixa de Mercado</title>
        <link rel="stylesheet" type="text/css" href="views/css/estilo.css"/>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script type="text/javascript" src="views/js/funcoes.js"></script>
        <script type="text/javascript">
             function submeter(){
             document.coder.submit()
             }
        </script>
    </head>
    
    <body> 
        <nav class="menu">
            <ul>
                <li><a href="index.php?pg=views/cadastro-taxas" title="Cadastro de Imposto"><img src="views/img/imposto.png" title="Cadastro de Imposto" alt="Cadastro de Imposto"/></a></li>
                <li><a href="index.php?pg=views/cadastro-produto" title="Cadastro de Produto"><img src="views/img/produto.png" title="Cadastro de Produto" alt="Cadastro de Produto"/></a></li>
                <li><a href="index.php?pg=views/home" title="Registro de Compras"><img src="views/img/caixa.png" title="Registro de Compras" alt="Registro de Compras"/></a></li>
            </ul>
            <div class="welcome">
                <p>TERMINAL: 001 | Olá, hoje é dia <?=date("d/m/Y H:i:s ");?></p>
            </div>

        </nav>
