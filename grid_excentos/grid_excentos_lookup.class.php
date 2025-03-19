<?php
class grid_excentos_lookup
{
//  
   function lookup_esactivo(&$esactivo) 
   {
      $conteudo = "" ; 
      if ($esactivo == "1")
      { 
          $conteudo = "Si";
      } 
      if ($esactivo == "0")
      { 
          $conteudo = "No";
      } 
      if (!empty($conteudo)) 
      { 
          $esactivo = $conteudo; 
      } 
   }  
}
?>
