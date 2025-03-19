<?php
class grid_usuario_lookup
{
//  
   function lookup_UsuarioTipoID_usuariotipoid(&$usuariotipoid) 
   {
      $conteudo = "" ; 
      if ($usuariotipoid == "3")
      { 
          $conteudo = "Administrador";
      } 
      if ($usuariotipoid == "4")
      { 
          $conteudo = "Jefe de Turno";
      } 
      if ($usuariotipoid == "5")
      { 
          $conteudo = "Cajero";
      } 
      if (!empty($conteudo)) 
      { 
          $usuariotipoid = $conteudo; 
      } 
   }  
}
?>
