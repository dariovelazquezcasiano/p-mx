<?php
class grid_categoria_lookup
{
//  
   function lookup_efectivo(&$efectivo) 
   {
      $conteudo = "" ; 
      if ($efectivo == "0")
      { 
          $conteudo = "Aforo";
      } 
      if ($efectivo == "1")
      { 
          $conteudo = "Aforo y Efectivo";
      } 
      if (!empty($conteudo)) 
      { 
          $efectivo = $conteudo; 
      } 
   }  
}
?>
