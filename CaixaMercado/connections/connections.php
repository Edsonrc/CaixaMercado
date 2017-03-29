
<?php        
        $servidor = "localhost";
        $banco = "mercado";
        $usuario = "czarneski";
        $senha = "2308404"; 
        $porta = "5432";
      
   
        try {
          
         $pdo = new PDO("pgsql:host=".$servidor.";dbname=".$banco, $usuario, $senha); 
   
            
        } catch (PDOException $ex) {
            return 'Erro ao conectar. Contate o suporte. Cód. Erro: '.$ex->getMessage();
        }
?>
