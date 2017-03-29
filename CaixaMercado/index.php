<?php 
foreach ($_REQUEST as $___opt => $___val) {
  $$___opt = $___val;
}
if(empty($pg)) {
include("views/home.php");
}
elseif(substr($pg, 0, 4)=='http' or substr($pg, 
0, 1)=="/" or substr($pg, 0, 1)==".") 
{
echo '<br><font face=arial size=11px><br><b>A pÃ¡gina nÃ£o existe.</b><br>Por favor selecione uma pÃ¡gina a partir do Menu Principal.</font>'; 
}
else {
include("$pg.php");
}
