<?php
class evalua_dat_aforo_mes_lookup
{
//  
   function lookup_mes(&$mes) 
   {
      $conteudo = "" ; 
      if ($mes == "1")
      { 
          $conteudo = "Ene";
      } 
      if ($mes == "2")
      { 
          $conteudo = "Feb";
      } 
      if ($mes == "3")
      { 
          $conteudo = "Mzo";
      } 
      if ($mes == "4")
      { 
          $conteudo = "Abr";
      } 
      if ($mes == "5")
      { 
          $conteudo = "May";
      } 
      if ($mes == "6")
      { 
          $conteudo = "Jun";
      } 
      if ($mes == "7")
      { 
          $conteudo = "Jul";
      } 
      if ($mes == "8")
      { 
          $conteudo = "Ago";
      } 
      if ($mes == "9")
      { 
          $conteudo = "Sep";
      } 
      if ($mes == "10")
      { 
          $conteudo = "Oct";
      } 
      if ($mes == "11")
      { 
          $conteudo = "Nov";
      } 
      if ($mes == "12")
      { 
          $conteudo = "Dic";
      } 
      if (!empty($conteudo)) 
      { 
          $mes = $conteudo; 
      } 
   }  
}
?>
