<?php
class grid_inventario_caseta_lookup
{
//  
   function lookup_status(&$status) 
   {
      $conteudo = "" ; 
      if ($status == "0")
      { 
          $conteudo = "Inactivo";
      } 
      if ($status == "1")
      { 
          $conteudo = "Activo";
      } 
      if (!empty($conteudo)) 
      { 
          $status = $conteudo; 
      } 
   }  
//  
   function lookup_funcionamiento(&$funcionamiento) 
   {
      $conteudo = "" ; 
      if ($funcionamiento == "1")
      { 
          $conteudo = "Activo";
      } 
      if ($funcionamiento == "0")
      { 
          $conteudo = "Inactivo";
      } 
      if (!empty($conteudo)) 
      { 
          $funcionamiento = $conteudo; 
      } 
   }  
}
?>
