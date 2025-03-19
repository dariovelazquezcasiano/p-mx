<?php
class grid_tipopago_lookup
{
//  
   function lookup_activo(&$activo) 
   {
      $conteudo = "" ; 
      if ($activo == "1")
      { 
          $conteudo = "Activo";
      } 
      if ($activo == "0")
      { 
          $conteudo = "Inactivo";
      } 
      if (!empty($conteudo)) 
      { 
          $activo = $conteudo; 
      } 
   }  
}
?>
