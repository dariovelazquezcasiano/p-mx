<?php
class grid_rep_participacion_lookup
{
//  
   function lookup_t_usuario(&$conteudo , $t_usuario) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $t_usuario; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $nm_comando = "select nombre from cat_usuarios where fld_usuario = '" . substr($this->Db->qstr($t_usuario), 1 , -1) . "' order by nombre" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_porciento_tipo(&$tipo) 
   {
      $conteudo = "" ; 
      if ($tipo == "A")
      { 
          $conteudo = "Ligeros (A y M)";
      } 
      if ($tipo == "C")
      { 
          $conteudo = "Pesados (B y C)";
      } 
      if (!empty($conteudo)) 
      { 
          $tipo = $conteudo; 
      } 
   }  
}
?>
