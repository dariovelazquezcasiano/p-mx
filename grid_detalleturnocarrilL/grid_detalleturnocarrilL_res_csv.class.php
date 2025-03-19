<?php

class grid_detalleturnocarrilL_res_csv
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $array_titulos;
   var $array_linhas;

   var $Arquivo;
   var $Tit_doc;
   var $Delim_dados;
   var $Delim_line;
   var $Delim_col;
   var $sc_proc_grid; 

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_csv()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_res_grid']))
      {
          return;
      }
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Csv_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
   function inicializa_vars()
   {
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
      $this->array_titulos = array();
      $this->array_linhas  = array();
      $this->Csv_password  = "";
      $this->Arquivo       = "sc_csv";
      $this->Arquivo      .= "_" . date('YmdHis') . "_" . rand(0, 1000);
      $this->Arq_zip       = $this->Arquivo . "_grid_detalleturnocarrilL.zip";
      $this->Arquivo      .= "_grid_detalleturnocarrilL";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_res_grid']))
      {
          $this->Arquivo      .= "_" . $this->Ini->Nm_lang['lang_othr_smry_titl'];
      }
      $this->Arquivo      .= ".csv";
      $this->Tit_doc       = "grid_detalleturnocarrilL.csv";
      $this->Tit_zip       = "grid_detalleturnocarrilL.zip";
      $this->Label_CSV     = "N";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_name'] .= ".csv";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_name']);
      }
      $this->Res           = new grid_detalleturnocarrilL_resumo("out");
      $this->prep_modulos("Res");
      $this->Delim_dados = "\"";
      $this->Delim_col   = ";";
      $this->Delim_line  = "\r\n";
      if (isset($_REQUEST['nm_delim_line']) && !empty($_REQUEST['nm_delim_line']))
      {
          $this->Delim_line = str_replace(array(1,2,3), array("\r\n","\r","\n"), $_REQUEST['nm_delim_line']);
      }
      if (isset($_REQUEST['nm_delim_col']) && !empty($_REQUEST['nm_delim_col']))
      {
          $this->Delim_col = str_replace(array(1,2,3,4,5), array(";",",","\	","#",""), $_REQUEST['nm_delim_col']);
      }
      if (isset($_REQUEST['nm_delim_dados']) && !empty($_REQUEST['nm_delim_dados']))
      {
          $this->Delim_dados = str_replace(array(1,2,3,4), array('"',"'","","|"), $_REQUEST['nm_delim_dados']);
      }
      if (isset($_REQUEST['nm_label_csv']) && !empty($_REQUEST['nm_label_csv']))
      {
          $this->Label_CSV = $_REQUEST['nm_label_csv'];
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_res_grid']) && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_detalleturnocarrilL']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_return']);
          $this->pb->setTotalSteps(100);
          $Mens_bar  = $this->Ini->Nm_lang['lang_othr_prcs'];
          $Mens_smry = $this->Ini->Nm_lang['lang_othr_smry_titl'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
              $Mens_bar  = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              $Mens_smry = sc_convert_encoding($Mens_smry, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
          $this->pb->addSteps(50);
      }
   }

   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   //----- 
   function grava_arquivo()
   {
      $this->Csv_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      $csv_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      $this->Res->resumo_export();
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_res_grid']) && !$this->Ini->sc_export_ajax) {
          $Mens_bar  = $this->Ini->Nm_lang['lang_othr_prcs'];
          $Mens_smry = $this->Ini->Nm_lang['lang_othr_smry_titl'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
              $Mens_bar  = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              $Mens_smry = sc_convert_encoding($Mens_smry, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
          $this->pb->addSteps(30);
      }
      $this->array_titulos = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['arr_export']['label'];
      $this->array_linhas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['arr_export']['data'];
      $this->comp_y_axys  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['pivot_y_axys'];
      $this->comp_tabular = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['pivot_tabular'];
      if (1 >= sizeof($this->comp_y_axys))
      {
          $this->comp_tabular = false;
      }
      if ($this->Label_CSV == "S")
      {
          $this->grava_titulos($csv_f);
      }
      $this->control_lines = array();
      foreach ($this->array_linhas as $lines)
      {
         $this->grava_linha($csv_f, $lines);
      }
      fclose($csv_f);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_res_grid']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_res_file'] = $this->Csv_f;
      }
      elseif ($this->Csv_password != "")
      { 
          $str_zip = "";
          $Zip_f = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
          $Arq_input   = (FALSE !== strpos($this->Csv_f, ' ')) ? " \"" . $this->Csv_f . "\"" :  $this->Csv_f;
          if (is_file($Zip_f)) {
              unlink($Zip_f);
          }
          if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
          {
              chdir($this->Ini->path_third . "/zip/windows");
              $str_zip = "zip.exe -P -j " . $this->Csv_password . " " . $Zip_f . " " . $Arq_input;
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
          {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
              $str_zip = "./7za -p" . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
          {
              chdir($this->Ini->path_third . "/zip/mac/bin");
             $str_zip = "./7za -p" . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
          }
          if (!empty($str_zip)) {
              exec($str_zip);
          }
          unlink($Arq_input);
          $this->Arquivo = $this->Arq_zip;
          $this->Csv_f   = $this->Zip_f;
          $this->Tit_doc = $this->Tit_zip;
          // ----- ZIP log
          $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
          if ($fp)
          {
              @fwrite($fp, $str_zip . "\r\n\r\n");
              @fclose($fp);
          }
      } 
   }

   function grava_titulos($csv_f)
   {
      $b_display = false;
      $contr_rowspan = array();
      $contr_colspan = array();
      foreach ($this->array_titulos as $lines)
      {
           $csv_registro = "";
           $col = 0;
           if (!$b_display)
           {
               $colspan = $this->comp_tabular ? sizeof($this->comp_y_axys) : 1;
               $contr_rowspan[$col] = sizeof($this->array_titulos);
               $contr_colspan[$col] = $colspan;
               $campo_titulo = $this->Ini->Nm_lang['lang_othr_smry_msge'];
               if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($campo_titulo))
               {
                   $campo_titulo = sc_convert_encoding($campo_titulo, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               $csv_registro .= $this->Delim_dados . str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $campo_titulo) . $this->Delim_dados;
               if ($colspan > 1)
               {
                   for ($x = 1; $x < $colspan; $x++)
                   {
                       $csv_registro .= $this->Delim_col . $this->Delim_dados . $this->Delim_dados;
                   }
               }
               $b_display = true;
               $col += $colspan;
           }
           foreach ($lines as $columns)
           {
               $col_ok = false;
               $colspan = (isset($columns['colspan']) && 1 < $columns['colspan']) ? $columns['colspan'] : 1;
               while (!$col_ok)
               {
                   $prim = true;
                   if (isset($contr_rowspan[$col]) && 1 < $contr_rowspan[$col])
                   {
                       $contr_rowspan[$col]--;
                       $col_sp = $contr_colspan[$col];
                       for ($x = 0; $x < $col_sp; $x++)
                       {
                           if (!$prim)
                           {
                               $csv_registro .= $this->Delim_col;
                           }
                           $csv_registro .= $this->Delim_dados . $this->Delim_dados;
                           $col ++;
                           $prim = false;
                       }
                   }
                   else
                   {
                       $col_ok = true;
                   }
               }
               if (isset($columns['rowspan']) && 1 < $columns['rowspan'])
               {
                   $contr_rowspan[$col] = $columns['rowspan'];
                   $contr_colspan[$col] = $colspan;
               }
               $campo_titulo = $columns['label'];
               if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($campo_titulo))
               {
                   $campo_titulo = sc_convert_encoding($campo_titulo, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               $csv_registro .= $this->Delim_col . $this->Delim_dados . str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $campo_titulo) . $this->Delim_dados;
               if ($colspan > 1)
               {
                   for ($x = 1; $x < $colspan; $x++)
                   {
                       $csv_registro .= $this->Delim_col . $this->Delim_dados . $this->Delim_dados;
                   }
               }
               $col += $colspan;
           }
           foreach ($contr_rowspan as $col_t => $row)
           {
               if ($col_t >= $col && $row > 1)
               {
                   $contr_rowspan[$col]--;
               }
           }
           $csv_registro .= $this->Delim_line;
           fwrite($csv_f, $csv_registro);
      }
   }
   function grava_linha($csv_f, $lines)
   {
       $csv_registro = "";
       $prim = true;
       $col     = 0;
       $colspan = 0;
       foreach ($lines as $ind => $columns)
       {
           $col = $ind + $colspan;
           if (isset($columns['colspan']) && $columns['colspan'] > 0)
           {
              $colspan = $columns['colspan'] - 1;
           }
           if (0 <= $columns['level'])
           {
              $cada_dado = $columns['label'];
           }
           else
           {
               $cada_dado = $columns['value'];
           }
           $cada_dado = str_replace("&nbsp;", "", $cada_dado);
           if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($cada_dado))
           {
               $cada_dado = sc_convert_encoding($cada_dado, "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           $cada_dado = $this->Delim_dados . str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $cada_dado) . $this->Delim_dados;
           if ($prim)
           {
               for ($x = ($ind + 1); $x < count($this->control_lines); $x++)
               {
                   $this->control_lines[$x] = $this->Delim_dados . $this->Delim_dados;
               }
               $prim = false;
           }
           $this->control_lines[$col] = $cada_dado;
       }
       $csv_registro = implode($this->Delim_col, $this->control_lines) . $this->Delim_line;
       fwrite($csv_f, $csv_registro);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Auditoria Cajero-Receptor :: CSV</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">CSV</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_detalleturnocarrilL_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_detalleturnocarrilL"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['csv_return']); ?>"> 
</FORM> 
</td></tr></table>
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($tam_campo >= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
function rv_logAcceso ($accion, $key) {
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
if (!isset($_SESSION['sm_global_login'])) {$_SESSION['sm_global_login'] = "";}
if (!isset($this->sc_temp_sm_global_login)) {$this->sc_temp_sm_global_login = (isset($_SESSION['sm_global_login'])) ? $_SESSION['sm_global_login'] : "";}
   
$aplicacion = $this->Ini->nm_cod_apl; 
$tablaLog = $this->Ini->nm_tabela; 
$fechaLog = date('Y-m-d H:i:s');  
$loginLog = $this->sc_temp_sm_global_login; 
$ipLog = $_SERVER['REMOTE_ADDR'];  

     $nm_select = "INSERT INTO sec_application_logs (Application_Name, Date_Time, Login, Ip_User, Action_Held, tabla, llave)                VALUES ('$aplicacion', '$fechaLog', '$loginLog', '$ipLog', '$accion', '$tablaLog', '$key')"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      
if (isset($this->sc_temp_sm_global_login)) {$_SESSION['sm_global_login'] = $this->sc_temp_sm_global_login;}
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function rv_revisaBotones() {
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
if (!isset($_SESSION['sm_nivel'])) {$_SESSION['sm_nivel'] = "";}
if (!isset($this->sc_temp_sm_nivel)) {$this->sc_temp_sm_nivel = (isset($_SESSION['sm_nivel'])) ? $_SESSION['sm_nivel'] : "";}
   
$parm = (strpos($this->sc_temp_sm_nivel, '1') === false ? 'off' : 'on'); $this->nmgp_botoes["filter"] = "$parm";; 
$parm = (strpos($this->sc_temp_sm_nivel, '2') === false ? 'off' : 'on'); $this->nmgp_botoes["sel_col"] = "$parm";; 
$parm = (strpos($this->sc_temp_sm_nivel, '3') === false ? 'off' : 'on'); $this->nmgp_botoes["sort_col"] = "$parm";; 
$parm = (strpos($this->sc_temp_sm_nivel, '4') === false ? 'off' : 'on'); $this->nmgp_botoes["pdf"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '5') === false ? 'off' : 'on'); $this->nmgp_botoes["word"] = "$parm";;     
 $parm = (strpos($this->sc_temp_sm_nivel, '6') === false ? 'off' : 'on'); $this->nmgp_botoes["xls"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '7') === false ? 'off' : 'on'); $this->nmgp_botoes["xml"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '8') === false ? 'off' : 'on'); $this->nmgp_botoes["csv"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '9') === false ? 'off' : 'on'); $this->nmgp_botoes["rtf"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, 'P') === false ? 'off' : 'on'); $this->nmgp_botoes["print"] = "$parm";;
if (isset($this->sc_temp_sm_nivel)) {$_SESSION['sm_nivel'] = $this->sc_temp_sm_nivel;}
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function leeConfig($ident, $clasif, &$obj = NULL) {
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
   
 $sql = "select params from sec_configura where identidad = '$ident' and clasifica = '$clasif'"; 
  
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 
 
 if (isset($rs[0][0])){ 
    $ruta = $rs[0][0];   
}else{ 
    $ruta = 'ERROR: No está registrada la identificación: '.$ident.', clasificación: '.$clasif.'<br />';   
} 
 if (is_object($obj)) { 
    $_SESSION['sc_session'][$obj->Ini->sc_page][$obj->Ini->nm_cod_apl]['path_doc'] = $obj->Ini->path_doc = $ruta; 
 } else return $ruta;
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function guardaIdAplicacion() {
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
if (!isset($_SESSION['idmodulo'])) {$_SESSION['idmodulo'] = "";}
if (!isset($this->sc_temp_idmodulo)) {$this->sc_temp_idmodulo = (isset($_SESSION['idmodulo'])) ? $_SESSION['idmodulo'] : "";}
if (!isset($_SESSION['aplicacion_origen'])) {$_SESSION['aplicacion_origen'] = "";}
if (!isset($this->sc_temp_aplicacion_origen)) {$this->sc_temp_aplicacion_origen = (isset($_SESSION['aplicacion_origen'])) ? $_SESSION['aplicacion_origen'] : "";}
   
 $this->sc_temp_aplicacion_origen = substr(10000+$this->sc_temp_idmodulo, 2).$this->Ini->nm_cod_apl; 
 
if (isset($this->sc_temp_aplicacion_origen)) {$_SESSION['aplicacion_origen'] = $this->sc_temp_aplicacion_origen;}
if (isset($this->sc_temp_idmodulo)) {$_SESSION['idmodulo'] = $this->sc_temp_idmodulo;}
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function Liquidacion($CasetaID, $FechaOperacion, $TurnoID,$CarrilID){
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
  

$montoTAG = 0;
$montoCRE = 0;
$dia_hora =  time();
$fld_diag=date("d/m/Y", $dia_hora);
$fld_horag=date("H:i:s", $dia_hora);

if($TurnoID == "" && $CarrilID ==""){
	$condicional = " CasetaID = ".$CasetaID." and FechaOperacion = '".$FechaOperacion."'";
	$carril = "Todos";
	$turno = "Todos";
	$nomarchivo = "";
	$titulo = "LIQUIDACIÓN DE DÍA";
}elseif($CarrilID == ""  && $TurnoID <> ""){
	$condicional = " CasetaID = ".$CasetaID." and FechaOperacion = '".$FechaOperacion."' and TurnoID = ".$TurnoID;
	$carril = "Todos";
	$turno = $TurnoID;
	$nomarchivo= "T".$TurnoID;
	$titulo = "LIQUIDACIÓN DE TURNO";
}else{
	$condicional = " CasetaID = ".$CasetaID." and FechaOperacion = '".$FechaOperacion."' and TurnoID = ".$TurnoID. " and CarrilID = ".$CarrilID;
	$carril = $CarrilID;
	$turno = $TurnoID;
	$nomarchivo = "T".$TurnoID."_C".$CarrilID;
	$titulo = "LIQUIDACIÓN DE TURNO CARRIL";
	}	
	
		$MOperacion = 0;
		$GE = 0;
		$Faltante = 0;
		$Sobrante = 0;
		$Entregado = 0;
		$PorEntregar = 0;
		$Depositar = 0;
		$Detalle = "";
	

	
	
	$check_aforo = "SELECT SUM(Discrepancia), SUM(MontoDisc) FROM discrepancias WHERE ".str_replace('FechaOperacion', 'Fecha', $condicional);
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ra = false;
          $ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($ra[0][0])) {    
		$MontoRecla = $ra[0][0];
		$CantidadRecla = $ra[0][1];
	} else  {   
		$MontoRecla=0;
		$CantidadRecla = 0;
	}
	
	
	
	
$check_sql = "SELECT MontoCR,ImporteMXN, if(FaltanteANA>=0,FaltanteANA,0) as FaltanteANA,if(FaltanteANA<0,ABS(FaltanteANA),0) as SobranteANA, Entregado, CarrilID, TurnoID , HoraInicio, Operacion,MontoANA
FROM detalleturno 
WHERE  $condicional ORDER BY TurnoID ,CarrilID,  HoraInicio";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error al acceder a la base de datos';
;
}
else
	{
   while(!$rs->EOF)
    {
	    $MOperacion += $rs->fields[8];
		$GE += $rs->fields[1];
		$Faltante += $rs->fields[2];
		$Sobrante += $SE =$rs->fields[3];
	    $Entregado+= $rs->fields[4];
	    $Depositar+= ($rs->fields[9]);
		if($rs->fields[4] > $rs->fields[2]){
			$Sobrante += $SE = $rs->fields[4] - $rs->fields[2];
		}
	    $PorEntregar += $PE = ($rs->fields[2] > $rs->fields[4]) ? ($rs->fields[2] - $rs->fields[4]) : (0);
		$rs->MoveNext();
    }
    $rs->Close();
}	
	
	
	


$check_sql = "SELECT TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, min(HoraInicio) as HoraInicio, FechaFin, 
IF(MAX(CONCAT(FechaFin,HoraFin)) > CONCAT(FechaTurno,'23:59:59'), MAX(CONCAT(FechaFin,' ',HoraFin)), MAX(HoraFin)) as HoraFin, OperacionID, FolioCierre, sum(CantidadMXN), sum(CantidadUSD), sum(ImporteMXN),sum(ImporteUSD), min(FolioInicialCR), max(FolioFinalCR), min(FolioInicialEAP),
max(FolioFinalEAP),sum(Faltante), Observacion, sum(MontoCR), AdministradorID, EncargadoTurnoID_Pre, UsuarioID, sum(Entregado),LiquidadorID, SUM(Operacion), Sum(if(FaltanteANA>0,FaltanteANA,0)),Sum(if(FaltanteANA<0,FaltanteANA,0))
FROM  detalleturno 
WHERE ". $condicional ;

 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 


if (isset($rs[0][0]))     
{
	$caseta =$rs[0][1];
	$cuerpo = "";
	$usuario =$rs[0][4];
	$fecha_op = $rs[0][6];
	$fecha_turno = $rs[0][7];
	$hora_ini=$rs[0][8];
	$hora_fin=$rs[0][10];
    $fld_ccant_mxn =$rs[0][13];
	$fld_ccant_usd =$rs[0][14]; 
	$fld_cimporte_mxn =$rs[0][15];
	$fld_cimporte_usd =$rs[0][16];
	$fld_folio_inicr =$rs[0][17];
	$fld_folio_fincr =$rs[0][18];
	$fld_folio_iniect =$rs[0][19];
	$fld_folio_finect =$rs[0][20];
	$fld_faltante =$rs[0][21];
	$fld_observacion = $rs[0][22];
	$MontoCR = $rs[0][23];
	$administrador = $rs[0][24];
	$encargado_t = $rs[0][25];
	$usuarioID = $rs[0][26];
	$entregadoCajero = $fld_importe_cr = $rs[0][27];
	$liquidador = $rs[0][28];
	$operacion = $rs[0][29];
	$FaltanteANA = $rs[0][30]*(-1);
	$SobranteANA = $rs[0][31]*(-1);
} else {	
}
	
$nombrearchivo = $fecha_op.$caseta.$nomarchivo;
$nombrearchivo = str_replace("-","",$nombrearchivo);
$leyenda = "";
	
	
$check_sql = "SELECT TurnoID, CasetaID,TramoID,Cuerpo,CarrilID,FechaOperacion,FechaTurno, FolioInicialCR,FolioFinalCR,FolioInicialEAP,FolioFinalEAP, 
CantidadMXN FROM detalleturno WHERE ".$condicional;
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
}
else
{
	$Folios = 0;
	$Secuenciales = 0;
   while(!$rs->EOF)
    {
		$Folios += $this->diferencia($rs->fields[8],$rs->fields[7])-$rs->fields[11];
		$Secuenciales += $this->diferencia($rs->fields[10],$rs->fields[9]);
			
		$rs->MoveNext();
    }
    $rs->Close();
}	



$fld_rollo = array([0,0],[0,0],[0,0]);
$check_sql = "SELECT Rollo,FolioInicial,FolioFinal FROM folios WHERE Fecha ='$fecha_op' AND CasetaID = '$caseta' AND TurnoID = '$turno'";

 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
} else {
   while(!$rs->EOF)
    {
	    $ubica = $rs->fields[0]-1;
		$fld_rollo[$ubica][0] = $rs->fields[1];
	    $fld_rollo[$ubica][1] = $rs->fields[2];
		$rs->MoveNext();
    }
    $rs->Close();
}
$totalCajero = 0;
$montoCajero =$operacion + $entregadoCajero+ $fld_cimporte_mxn;
$totalNOR = 0;
$foliosCR = 0;
$montoCRE= 0;
$foliosCR=0;
$codigo ="";
$PagoEfectivo = $this->ArmaCondicion();
$MontoMarcado =0;
$style = 'style= "background-color:#dfdfdf; font-weight: bold";';
$check_aforo = "SELECT SUM(Importe_CR + TarifaEE_CR), sum(CantidadVeh) FROM aforo_preliq WHERE $condicional AND $PagoEfectivo[0] ";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ra = false;
          $ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($ra[0][0])) {    
		$cantidadCR = $ra[0][1];
	} else  {   
		$cantidadCR = 0;
	}


$check_aforo = "SELECT SUM(Importe_ANA + TarifaEE_ANA) , sum(CantidadVeh) FROM aforo_liq WHERE $condicional AND $PagoEfectivo[1]  ";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ra = false;
          $ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($ra[0][0])) {    
		$MontoMarcado = $ra[0][0];
		$cantidadMarcado = $ra[0][1];
	} else  {   
		$MontoMarcado=0;
		$cantidadMarcado = 0;
	}
$check_aforo = "SELECT SUM(Importe_ANA + TarifaEE_ANA) , sum(CantidadVeh) FROM aforo_liq WHERE $condicional and PagoID = 'GE' ";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ra = false;
          $ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($ra[0][0])) {    
		$MontoMarcadoGE = $ra[0][0];
		$cantidadMarcadoGE = $ra[0][1];
	} else  {   
		$MontoMarcadoGE=0;
		$cantidadMarcadoGE = 0;
	}	
$MontoMarcadoCR = $montoCajero;
$cantidadMarcadoCR = $cantidadCR;
$MontoMarcadoANA = $MontoMarcado-$MontoMarcadoGE;
$cantidadMarcadoANA = $cantidadMarcado-$cantidadMarcadoGE;
$MontoMarcadoANAt = $MontoMarcado;
$cantidadMarcadoANAt = $cantidadMarcado;	
	$entregado = $montoCajero;
	$porentregar = ($MontoMarcado-$montoCajero);
	$TotalCajeroCR = $entregadoCajero+$operacion; 
	$TotalCajero = $montoCajero-$fld_cimporte_mxn; 
	$TotalMarcado = $MontoMarcado-$MontoMarcadoGE;
	$MarcadoEfectivo = $MontoMarcado;
	$FoliosEfectivo = $cantidadCR-$fld_ccant_mxn; 
	$FoliosMarcado = $cantidadMarcado-$cantidadMarcadoGE;
	$FoliosOriginal = $cantidadCR; 
	$codigo .= '
		<tr '.$style.' >
		<td width="40%">Aforo Efectivo</td>
		<td width="10%" align="right">'.number_format($TotalCajero,2).'</td>
		<td width="10%" align="right">'.$FoliosEfectivo.'</td>
		<td width="10%" align="right">'.number_format($TotalMarcado,2).'</td>
		<td width="10%" align="right">'.$FoliosMarcado.'</td>
		<td width="10%" align="right">'.number_format($TotalMarcado-$TotalCajero,2).'</td>
		<td width="10%" align="right">'.($FoliosMarcado-$FoliosEfectivo).'</td>
		</tr>		
		';

$check_sql = "SELECT TipoPagoID,Tipo FROM tipopago WHERE EsMarcacion = 1 and PagoEfectivo <> 1 and ( TipoPagoID <> 'GE' ) order by Orden";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ) {     
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= '¡Error al acceder a la base de datos!.';
;
}else{
   while(!$rs->EOF)
		{
		$style = ''; 
		$check_aforo = "SELECT PagoID,SUM(Importe_CR + TarifaEE_CR), sum(CantidadVeh) FROM aforo_preliq WHERE $condicional AND PagoID = '". $rs->fields[0] ."' GROUP BY PagoID";
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ra = false;
          $ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($ra[0][0]))     
	{
		$montoCajero = $ra[0][1];
		$cantidadCR = $ra[0][2];
		$FoliosEfectivo += $ra[0][2];
	} else {    
		$montoCajero=0;
		$cantidadCR = 0;
	}
	$check_aforo = "SELECT PagoID,SUM(Importe_ANA + TarifaEE_ANA), sum(CantidadVeh) FROM aforo_liq WHERE $condicional AND PagoID = '". $rs->fields[0] ."' GROUP BY PagoID";
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ra = false;
          $ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($ra[0][0]))     
	{
		$MontoMarcado = $ra[0][1];
		$FoliosMarcado += $ra[0][2];
		if($rs->fields[1]=="TAG"){$montoTAG=$ra[0][1];}
		if($rs->fields[1]=="CRE"){$montoCRE=$ra[0][1];}
		$cantidadMarcado = $ra[0][2];	
	} else {    
		$MontoMarcado=0;
		$cantidadMarcado = 0;
	}
		$TotalCajero += $montoCajero ;
		$TotalMarcado += $MontoMarcado;
		$codigo .= '
		<tr '.$style.' >
		<td width="40%">'.  $rs->fields[1] .'</td>
		<td width="10%" align="right">'.number_format($montoCajero,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadMarcado.'</td>
		<td width="10%" align="right">'.number_format(0,2).'</td>
		<td width="10%" align="right">'.($cantidadMarcado-$cantidadCR).'</td>
		</tr>		
		'; 
	   $rs->MoveNext();
    }
    $rs->Close();
}


$codigo .= '
		<tr style= "background-color:#dfdfdf; font-weight: bold"; >
		<td width="40%">Totales </td>
		<td width="10%" align="right">'.number_format(($TotalCajero),2).'</td>
		<td width="10%" align="right">'.$FoliosEfectivo.'</td>
		<td width="10%" align="right">'.number_format($TotalMarcado-$montoTAG,2).'</td>
		<td width="10%" align="right">'.$FoliosMarcado.'</td>
		<td width="10%" align="right">'.number_format(($TotalMarcado-$TotalCajero+$montoTAG),2).'</td>
		<td width="10%" align="right">'.($FoliosMarcado-$FoliosEfectivo).'</td>
		</tr>
		';
$style = 'style= "background-color:#dfdfdf; font-weight: bold";';
$check_aforo = "SELECT 'CR',PagoID,SUM(Importe_CR + TarifaEE_CR), sum(CantidadVeh) FROM aforo_preliq WHERE $condicional and PagoID = 'DE'  ";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ra = false;
          $ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($ra[0][0])) {    
		$montoCajero = $ra[0][2];
		$cantidadCR = $ra[0][3];
		$porentregar = ($ra[0][2]-$MontoMarcado);
	} else  {   
		$montoCajero=0;
		$cantidadCR = 0;
		$porentregar = (0 - $MontoMarcado);
	}

$check_aforo = "SELECT 'CR',PagoID,SUM(Importe_ANA + TarifaEE_ANA), sum(CantidadVeh) FROM aforo_liq WHERE $condicional and PagoID = 'DE' ";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ra = false;
          $ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($ra[0][0])) {    
		$MontoMarcado = $ra[0][2];
		$cantidadMarcado = $ra[0][3];
		$porentregar = ($ra[0][2]-$MontoMarcado);
	} else  {   
		$MontoMarcado=0;
		$cantidadMarcado = 0;
		$porentregar = (0-$MontoMarcado);
	}
	$codigo .= '
		<tr '.$style.' >
		<td width="40%">Detecciones erroneas</td>
		<td width="10%" align="right">'.number_format($montoCajero,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadMarcado.'</td>
		<td width="10%" align="right">'.number_format(0,2).'</td>
		<td width="10%" align="right">'.($cantidadMarcado-$cantidadCR).'</td>
		</tr>		
		';
 
      $nm_select = "SELECT c.Caseta, CONCAT(a.AutopistaID,' - ', a.Autopista) as Autopista, c.ModoOperacion FROM casetas c LEFT JOIN autopista a ON a.AutopistaID = c.Autopista WHERE c.CasetaID = '$caseta'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$caseta = $caseta." - ". $dataset[0][0];
		$autopista = $dataset[0][1];
	}
 
      $nm_select = "SELECT name FROM seg_users where login = '$liquidador'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$liquidador .= " - ". $dataset[0][0];
	}
	
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $encargado_t"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$encargado_t .= " - ". $dataset[0][0]." ". $dataset[0][1]." ". $dataset[0][2];
	}
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $usuarioID"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$usuarioID .= " - ". $dataset[0][0]." ". $dataset[0][1]." ". $dataset[0][2];
	}
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $administrador"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$administrador .= " - ". $dataset[0][0]." ". $dataset[0][1]." ". $dataset[0][2];
	}

 
      $nm_select = "SELECT Nombre FROM turnos where TipoID = $turno"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$turno .= " - ". $dataset[0][0];
	}
$diferenciaCR_Efe = $entregadoCajero;
$diferenciaCR_Efe2= 0;

$Depositar = $MontoMarcadoANA + $SobranteANA;

$tbl = '
	<table class = "roundedCorners" cellpadding="5" cellspacing="2">
	<tr>
		<th style="background-color:#FFFFFF";color:#0000FF; colspan="5" align="center"><b>'.$titulo.'<br>Tránsito Vehicular</b>
		</th>
	</tr>
</table>
<table class = "estilo1"  cellpadding="2" cellspacing="2">
	<tr>
		<td>Fecha:</td>
		<td style= "border-bottom: 0.5px solid Black">' . $fecha_op .'</td>
		<td rowspan="6"></td>
		<td></td>
		<td></td>	
	</tr>
	<tr>
		<td>No. y Nombre de Delegación:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$autopista.'</td>
		<td>Hora Inicial:</td>
		<td style= "border-bottom: 0.5px solid Black">'. $hora_ini . '</td>
	</tr>
	<tr>
		<td>No. y Nombre Plaza de C.:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$caseta.'</td>
		<td>Hora Final:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$hora_fin .'</td>
	</tr>
	<tr>
		<td>Turno:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$turno .'</td>
		<td>Carril:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$carril.' </td>
	</tr>
	<tr>
		<td>Fecha de Generación::</td>
		<td style= "border-bottom: 0.5px solid Black">'.$fld_diag.'</td>
		<td>Hora de Generación:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$fld_horag.'</td>
	</tr>
</table>
<table class = "roundedCorners" cellpadding="2" cellspacing="0">
	<tr>
		<th style="background-color:#FFFF00";color:#0000FF; colspan="7"; align="center"><b>ENTREGADO CAJERO-RECEPTOR</b>
		</th>
	</tr>
	<tr align="center" valign="middle">
		<th width="40%" rowspan="2">Concepto</th>
		<th width="20%">Marcado</th>
		<th width="20%">Verificado</th>
		<th width="20%">Diferencia</th>
	</tr>
	<tr align="center" valign="middle">
		<th width="10%">$</th>
		<th width="10%">Eventos</th>
		<th width="10%">$</th>
		<th width="10%">Eventos</th>
		<th width="10%">$</th>
		<th width="10%">Eventos</th>
	</tr>
	<tr>
		<td width="40%">Efectivo M.N.</td>
		<td width="10%" align="right">'.number_format($MontoMarcadoCR,2).'</td>
		<td width="10%" align="right">'. ($cantidadMarcadoCR).'</td>
		<td width="10%" align="right">'.number_format($MontoMarcadoANAt,2).'</td>
		<td width="10%" align="right">'.$cantidadMarcadoANAt.'</td>
		<td width="10%" align="right">'.number_format(($MontoMarcadoANAt-$MontoMarcadoCR),2).'</td>
		<td width="10%" align="right">'.($cantidadMarcadoANAt-$cantidadMarcadoCR).'</td>
	</tr>
	<tr>
		<td width="40%">Boletos Generados por Error</td>
		<td width="10%" align="right">'.number_format($fld_cimporte_mxn,2).'</td>
		<td width="10%" align="right">'.$fld_ccant_mxn.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcadoGE,2).'</td>
		<td width="10%" align="right">'.$cantidadMarcadoGE.'</td>
		<td width="10%" align="right">'.number_format(($MontoMarcadoGE-$fld_cimporte_mxn),2).'</td>
		<td width="10%" align="right">'.($cantidadMarcadoGE-$fld_ccant_mxn).'</td>
	</tr>
	'. $codigo  .' 
	<tr>
		<td width="40%">Reclasificados</td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"><b>'.$MontoRecla.'</b></td>
		<td width="10%" align="right"><b>'.$CantidadRecla.'</b></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
	</tr>
	<tr>
		<td width="100%"> </td>
	</tr>
	<tr style= "background-color:#dfdfdf; font-weight: bold"; >
		<td width="40%">Faltantes(-) y Sobrantes (+)</td>
		<td width="10%" align="right">Faltantes:</td>
		<td width="10%" align="right">'.number_format($FaltanteANA,2).'</td>
		<td width="10%" align="right">Sobrantes:</td>
		<td width="10%" align="right">'.number_format($SobranteANA,2).'</td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		</tr>
	<tr>
		<td width="100%"> </td>
	</tr>
</table>



<table class = "estilo1" cellpadding="1" cellspacing="0">
	<tr>
		<th style="border-right: 0.5px solid Black; border-left: 0.5px solid Black" colspan="4" align="center" width="60%"><strong>FOLIOS NETOS</strong></th>
		<th style="border-right: 0.5px solid Black" colspan="2color:#0000FF;" align="center" width="40%"><strong>EVENTOS NETOS</strong>	</th>
	</tr>

</table>

<table class = "estilo1" cellpadding="1" cellspacing="0">
	<tr align="center">
		<td width="15%"></td>
		<td width="10%" ></td>
		<td width="2.5%" rowspan = "7"></td>
		<td width="10%" ></td>
		<td width="2.5%" rowspan = "7"></td>
		<td width="10%" ></td>
		<td style= "border-right: 0.5px solid Black" width="10%" ></td>
		<td width="20%" ></td>
		<td width="20%" ></td>
	</tr>
	<tr  align="right">
		<td  align="left">Transito Vehícular</td>
		<td ></td>
		<td ></td>
		<td style= "border-bottom: 0.5px solid Black">'.$Folios .'</td>
		<td style= "border-right: 0.5px solid Black"></td>
		<td ><b>Transito Vehícular</b></td>
		<td style= "border-bottom: 0.5px solid Black"><b>'.$Secuenciales.'</b></td>
	</tr>
		<tr  align="right">
		<td  align="left">Transito Peatonal</td>
		<td > </td>
		<td > </td>
		<td style= "border-bottom: 0.5px solid Black">0</td>
		<td style= "border-right: 0.5px solid Black"></td>
		<td ><b>Transito Peatonal</b></td>
		<td style= "border-bottom: 0.5px solid Black" align:"right"><b>0</b></td>
	</tr>
		<tr  align="right">
		<td  align="left">Transito Triciclos</td>
		<td ></td>
		<td ></td>
		<td style= "border-bottom: 0.5px solid Black"></td>
		<td style= "border-right: 0.5px solid Black"></td>
		<td ></td>
		<td ></td>
	</tr>

	<tr align="right">
		<td ></td>
		<td ></td>
		<td ></td>
		<td ></td>
		<td style= "border-right: 0.5px solid Black"></td>
		<td ></td>
		<td ></td>
	</tr>
	
</table>



<table class = "estilo1" cellpadding="10" cellspacing="0">
	
	<tr style="background-color:#dfdfdf"; align="center"; valign="middle">
		<th width="50%" align="right"><b>CANTIDAD A DEPOSITAR M.N. $</b></th>
		<th width="20%" align="left"><b> '.number_format($Depositar,2).' </b></th>
		<th width="10%" align="right"><b>DLLS $</b></th>
		<th width="20%" align="left"> 0.0 </th>
		
	</tr>
</table>
<table class = "estilo1" cellpadding="1" cellspacing="0">
	<tr>
	<td width="100%">LOS SERVIDORES PÚBLiCOS FIRMANTES, ASUMEN LA RESPONSABILIDAD DE LOS FONDOS Y VALORES PATRIMONIO DE LA CONCESIONARIA QUE SON CONFIADOS.POR LO QUE SE HACEN RESPONSABLES DEL FALTANTE QUE SEA DETECTADO MEDIANTE LOS PROCESOS ESTABLECIDOS POR EL ORGANISMO EN LOS INGRESOSCAPTADOS DURANTE EL TURNO CARRIL LABORADO QUE SE ENCUENTRA REFERIDO EN EL RUBRO DEL PRESENTE DOCUMENTO.OBLIGANDOSE A EFECTURA EL PAGO CORRESPONDIENTE A LA DIFERENCIA DETECTADA EN SU CONTRA EN LA ETAPA DEL PROCESO DE LIQUIDACIÒN DEFINITIVA.SEA DESCONTADO SE SU SALARIO EN LA QUINCENA INMEDIATA POSTERIOR A LA QUE OCURRA EL EVENTO ANTES DESCRITO </td>
	</tr>
	<tr>
		<td width="10%">Obsrv:</td>
		<td width="90%" style= "border-bottom: 0.25px solid Black">'.$fld_observacion.'</td>
	</tr>
		<tr>
		<td ></td>
	</tr>
	<tr>
		<td ></td>
	</tr>
	<tr>
		<td width="100%" ></td>
	</tr>
		<tr>
		<td width="10%"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="40%" align="center"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
	</tr>
	<tr>
		<td width="100%" ></td>
	</tr>
	<tr>
	<td width="5%"></td>
		<td width="25%" align="center"></td>
		<td width="10%" align="right"></td>
		<td width="25%" align="center"></td>
		<td width="10%" align="right"></td>
		<td width="25%" align="center"></td>
		<td width="5%" align="right"></td>
	</tr>
	<tr>
		<td width="100%" ></td>
	</tr>
	<tr>
		<td width="5%"></td>
		<td width="25%" align="center">Dictaminó<br><br>'.$liquidador.'<br>Analista Liquidador<br>Firma</td>
		<td width="10%" align="right"></td>
		<td width="25%" align="center"></td>
		<td width="10%" align="right"></td>
		<td width="25%" align="center">Enterado<br><br> '.$administrador.' <br>Supervisor / Auxiliar Operativo<br>Firma</td>
		<td width="5%" align="right"></td>
	</tr>
	<tr>
		<td width="100%" ></td>
	</tr>
</table>
';
$tblpre =	array($tbl,$nombrearchivo);
return $tblpre;
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function Comparativo($CasetaID, $FechaOperacion, $TurnoID, $CarrilID){
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
  
	
	if($TurnoID == "" && $CarrilID =" "){
	$condicional = " CasetaID = ".$CasetaID." and FechaOperacion = '".$FechaOperacion."'";
	$carril = "Todos";
	$turno ="Todos";
	$titulo = "DÍA";
}elseif($CarrilID == ""){
	$condicional = " CasetaID = ".$CasetaID." and FechaOperacion = '".$FechaOperacion."' and TurnoID = ".$TurnoID;
	$carril = "Todos";
	$turno = $TurnoID;
	$titulo = "TURNO";
}else{
	$condicional = " CasetaID = ".$CasetaID." and FechaOperacion = '".$FechaOperacion."' and TurnoID = ".$TurnoID. " and CarrilID = ".$CarrilID;
	$carril = $CarrilID;
	$titulo = "TURNO - CARRIL";
	}	
	
	
	$check_sql = "SELECT TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, min(HoraInicio), max(FechaFin), IF(MAX(CONCAT(FechaFin,HoraFin)) > CONCAT(FechaTurno,'23:59:59'), MAX(CONCAT(FechaFin,' ',HoraFin)), MAX(HoraFin)) as HoraFin, OperacionID, MIN(NULLIF(FolioInicialCR, 0)), max(FolioFinalCR), EncargadoTurnoID_Pre 
FROM detalleturno WHERE $condicional";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

	
if (isset($rs[0][0]))     
{
	$fecha_op = $rs[0][6];
	$caseta =$rs[0][1];
	$usuario =$rs[0][4];
	$carril = "Todos";
	$hora_ini=$rs[0][8];
	$hora_fin=$rs[0][10];
	$folio_inicial = $rs[0][12];
    $folio_final = $rs[0][13];
	$encargado_t = $rs[0][14];
	
	$wherePago="";
	$tramo="";
	$CasetaID = $caseta;	
	$sql_where = " $condicional ";
	$sql_where1 = " $condicional and PagoID = 'NOR' ";
}
		else     
{
}
 
      $nm_select = "SELECT TramoID,Tramo FROM carril WHERE CasetaID = $caseta limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$tramo = $dataset[0][0]." - ". $dataset[0][1];
	}	
	
 
      $nm_select = "SELECT c.Caseta, CONCAT(a.AutopistaID,' - ', a.Autopista) as Autopista, c.ModoOperacion FROM casetas c LEFT JOIN autopista a ON a.AutopistaID = c.Autopista WHERE c.CasetaID = '$caseta'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$caseta = $caseta." - ". $dataset[0][0];
		$autopista = $dataset[0][1];
		$modooperacion = $dataset[0][2];
	}
						
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $encargado_t"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$encargado_t .= " - ". $dataset[0][0]." ". $dataset[0][1]." ". $dataset[0][2];
	}	


$dia_hora =  time();
$fld_diag=date("d/m/Y", $dia_hora);
$fld_horag=date("H:i:s", $dia_hora);

$vtarifa = array("T01A"=>0,"T01M"=>0,"T02B"=>0,"T03B"=>0,"T04B"=>0,"T02C"=>0,"T03C"=>0,"T04C"=>0,"T05C"=>0,"T06C"=>0,"T07C"=>0,"T08C"=>0,"T09C"=>0,"EEA"=>0,"EEC"=>0);

$dia_hora =  time();
$fld_diag=date("d/m/Y", $dia_hora);
$fld_horag=date("H:i:s", $dia_hora);

$tipospago = "";
$codigo_html="";
$categoria ="";
$check_sql = "SELECT categoria.Descripcion, categoriatipopago.TipoPagoID , categoria.Efectivo FROM categoria RIGHT JOIN categoriatipopago ON categoriatipopago.CategoriaID = categoria.CategoriaID ORDER BY categoria.Orden";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
}else{
	while(!$rs->EOF){
		if($categoria <> $rs->fields[0]){
			if($tipospago <> ""){
				$tipospago = substr($tipospago,0,-3);	
				$tipospago .= ") AND" ;
				$fila_a= $this->saca_aforo($tipospago, "Total" , $sql_where);
				$codigo_html .= $fila_a[0];
				$tipospago = "";
				if($fila_efectivo == 1){ 
					$codigo_html .= $fila_a[1];
				}
			}
			$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" >' .$rs->fields[0]. '</th></tr>';
			$tipospago = "(";
		}
		$tipospago .= " PagoID = '".$rs->fields[1]. "' OR";
		$categoria = $rs->fields[0];
		$fila_a = $this->saca_aforo("PagoID = '".$rs->fields[1]."' AND", $rs->fields[1], $sql_where);
		$codigo_html .= $fila_a[0];
		$fila_efectivo = $rs->fields[2];
		if($rs->fields[2]==1){ 
			$codigo_html .= $fila_a[1];
		}
		$rs->MoveNext();
	}
	
	$tipospago = substr($tipospago,0,-3);	
	$tipospago .= ")";
	$fila_a= $this->saca_aforo($tipospago, "Total" , " AND ".$sql_where);
	$codigo_html .= $fila_a[0];
    $rs->Close();
}
	


	
	
	
$check_sql = "SELECT VehiculoID, Importe, ImporteEjeLigero, ImporteEjePesado from tarifa 
WHERE CasetaID = '$CasetaID' and TipoPagoID = 'NOR' AND '$fecha_op' BETWEEN FechaInicio and FechaFin;";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
  }else{
   while(!$rs->EOF){
	   
	   $vtarifa[$rs->fields[0]] = $rs->fields[1];
	   $vtarifa['EEA'] = $rs->fields[2];
	   $vtarifa['EEC'] = $rs->fields[3];
	   
	   $rs->MoveNext();
	}
    $rs->Close();
}

$tarifas = $this->crea_tr($vtarifa,"TARIFA REF.NOR"); 

 
      $nm_select = "SELECT Nombre FROM turnos where TipoID = $turno"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$turno .= " - ". $dataset[0][0];
	}	



$tbl = <<<EOD
<table class = "roundedCorners" cellpadding="2" cellspacing="0">
	<tr>
		<th style="background-color:#FFFFFF";color:#0000FF; colspan="5" align="center"><b>REPORTE COMPARATIVO VERIFICADO DE AFORO E INGRESO POR $titulo <br>Tránsito Vehicular</b>
		</th>
	</tr>
</table>

<table class = "titulos"  cellpadding="4" cellspacing="0">
<tbody>
	<tr>
		<th  width="14.5%">No. y Nombre de la Delegación:</th>
		<td  style= "border-bottom: 0.5px solid Black" colspan="3" width="13.5%" >$autopista</td>
		<th  width="4.5%"></th>
		<th  colspan="2" width="9%" ></th>
		<th  width="4.5%">Tramo:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="5" width="22.5%">$tramo</th>

		<th  width="4.5%"></th>
		<th  width="4.5%"></th>
		<th  width="4.5%"></th>
		<th width="2%">&nbsp;</th>
		<th width="4.5%">&nbsp;</th>
		<th width="4.5%">&nbsp;</th>
		<th width="7%">&nbsp;</th>
	</tr>
	<tr>
		<th  width="14.5%">No. y Nombre de Caseta:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="3" width="13.5%">$caseta</th>
		<th  colspan="2" width="9%">Carril:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="2" width="9%" >$carril</th>
		<th  colspan="2" width="9%">No. Turno:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="2" width="9%">$turno</th>
		<th  colspan="2" width="9%">Fecha de Operación:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="2" width="9%">$fecha_op</th>
		<th  colspan="2" width="9%">Fecha de Emisión:</th>
		<th style= "border-bottom: 0.5px solid Black" colspan="2" width="9%">$fld_diag</th>

	</tr>
	<tr>
		<th  width="14.5%">No. y Nombre del C-Receptor:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="3" width="13.5%">$usuario</th>
		<th  colspan="2" width="9%">Hora Inicial:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="2" width="9%" >$hora_ini</th>
		<th  colspan="2" width="9%">Hora Final:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="2" width="9%">$hora_fin</th>
		<th  colspan="2" width="9%">Folio Inicial:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="2" width="9%">$folio_inicial</th>
		<th  colspan="2" width="9%">Folio Final:</th>
		<th style= "border-bottom: 0.5px solid Black" colspan="2" width="9%">$folio_final</th>
	</tr>
<tr>
	<th colspan="20" ></th>
</tr>
</tbody>
</table>
<table class = "roundedCorners" cellpadding="1" cellspacing="0">
<tbody>
	<tr>
		<th rowspan="2" width="14.5%">&nbsp;</th>
		<th rowspan="2" width="4.5%">Autos</th>
		<th rowspan="2	" width="4.5%">Motos</th>
		<th colspan="3" width="13.5%">Autobuses</th>
		<th colspan="8" width="36%">CAMIONES</th>
		<th colspan="2" width="9%">Ejes Excedentes</th>
		<th width="2%">&nbsp;</th>
		<th width="4.5%">&nbsp;</th>
		<th width="4.5%">&nbsp;</th>
		<th width="7%">&nbsp;</th>
	</tr>
	<tr>
		<th width="4.5%">2</th>
		<th width="4.5%">3</th>
		<th width="4.5%">4</th>
		<th width="4.5%">2</th>
		<th width="4.5%">3</th>
		<th width="4.5%">4</th>
		<th width="4.5%">5</th>
		<th width="4.5%">6</th>
		<th width="4.5%">7</th>
		<th width="4.5%">8</th>
		<th width="4.5%">9</th>
		<th width="4.5%">EE1</th>
		<th width="4.5%">EE2</th>
		<th width="2%">&nbsp;</th>
		<th width="4.5%">Aforo</th>
		<th width="4.5%">Ingreso</th>
		<th width="7%">&nbsp;</th>
	</tr>
	$tarifas
	$codigo_html
	</tbody>
</table>
EOD;

return $tbl;
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function ArmaCondicion() {
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
  
$PagoEfectivo = " (";
$PagoEfectivoANA = " (PagoID = 'GE' OR ";

$check_sql = "SELECT TipoPagoID,Tipo FROM tipopago WHERE EsMarcacion = 1 and PagoEfectivo = 1 and (TipoPagoID <> 'DE' AND TipoPagoID <> 'GE' )  order by Orden";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
}
else
{
   while(!$rs->EOF)
    {
	$PagoEfectivo .= "PagoID = '".$rs->fields[0] . "' OR ";
	$PagoEfectivoANA .= "PagoID = '".$rs->fields[0] . "' OR ";
   
	 $rs->MoveNext();
    }
    $rs->Close();
}
$PagoEfectivo = substr($PagoEfectivo,0,-4);
$PagoEfectivo .= ")";
$PagoEfectivoANA = substr($PagoEfectivoANA,0,-4);
$PagoEfectivoANA .= ")";
$TipoPago = array($PagoEfectivo,$PagoEfectivoANA);
return $TipoPago;
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function DiferenciaTotales($sql_where){
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
  
	$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;
$check_sql = "SELECT VehiculoID_ANA, ClaseVehiculo_ANA, SUBSTR(ClaseVehiculo_ANA,1,1), SUBSTR(VehiculoID_ANA,4,1), CantidadEje_ANA,count(*), SUM(Importe_ANA), SUM(CantidadEje_ANA), SUM(TarifaEE_ANA), PagoID FROM aforo 
WHERE VehiculoID_ANA<>VehiculoID_CR AND and Cancelado = 0 AND $sql_where
GROUP BY VehiculoID_ANA";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
	}else{
	while(!$rs->EOF){

		if($rs->fields[2] =="A" || $rs->fields[2]=="M"){
			$clase = $rs->fields[2];
			$vAforo[$clase] += $rs->fields[5];
			$vIngreso[$clase] += $rs->fields[6];
			$EEA = $EEA + ($rs->fields[7]);
			$EEA_i = $EEA_i + ($rs->fields[8]);
			
		}elseif($rs->fields[2] =="C"){
				if($rs->fields[7]>0){
				$clase = "C9";
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				
					$EEC = $EEC + ($rs->fields[7]);
					$EEC_i = $EEC_i+ ($rs->fields[8]);
					
				}else{
				$clase = $rs->fields[1];
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				
					$EEC = $EEC + ($rs->fields[7]);
					$EEC_i = $EEC_i + ($rs->fields[8]);
					
				}
			
			}elseif($rs->fields[2] ==""){
			}
			else{
			$clase = $rs->fields[1];
			$vAforo[$clase] += $rs->fields[5];
			$vIngreso[$clase] += $rs->fields[6];
			
				$EEA = ($rs->fields[7]);
				$EEA_i = $EEA_i+($rs->fields[8]);
			
			}
	
			
		$rs->MoveNext();
	}
    $rs->Close();
}
$fila_a =  "
		<tr>
		<td width='14.5%'><b>Aforo</b></td>
		<td width='4.5%'>".$vAforo['A']."</td>
		<td width='4.5%'>".$vAforo['M']."</td>
		<td width='4.5%'>".$vAforo['B2']."</td>
		<td width='4.5%'>".$vAforo['B3']."</td>
		<td width='4.5%'>".$vAforo['B4']."</td>
		<td width='4.5%'>".$vAforo['C2']."</td>
		<td width='4.5%'>".$vAforo['C3']."</td>
		<td width='4.5%'>".$vAforo['C4']."</td>
		<td width='4.5%'>".$vAforo['C5']."</td>
		<td width='4.5%'>".$vAforo['C6']."</td>
		<td width='4.5%'>".$vAforo['C7']."</td>
		<td width='4.5%'>".$vAforo['C8']."</td>
		<td width='4.5%'>".$vAforo['C9']."</td>
		<td width='4.5%'>$EEA</td>
		<td width='4.5%'>$EEC</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'>".array_sum($vAforo)."</td>
		<td width='4.5%'></td>
		<td width='7%'></td>
	</tr>";
$fila_i =  "
		<tr>
		<td width='14.5%'><b>Ingreso</b></td>
		<td width='4.5%'>".$vIngreso['A']."</td>
		<td width='4.5%'>".$vIngreso['M']."</td>
		<td width='4.5%'>".$vIngreso['B2']."</td>
		<td width='4.5%'>".$vIngreso['B3']."</td>
		<td width='4.5%'>".$vIngreso['B4']."</td>
		<td width='4.5%'>".$vIngreso['C2']."</td>
		<td width='4.5%'>".$vIngreso['C3']."</td>
		<td width='4.5%'>".$vIngreso['C4']."</td>
		<td width='4.5%'>".$vIngreso['C5']."</td>
		<td width='4.5%'>".$vIngreso['C6']."</td>
		<td width='4.5%'>".$vIngreso['C7']."</td>
		<td width='4.5%'>".$vIngreso['C8']."</td>
		<td width='4.5%'>".$vIngreso['C9']."</td>
		<td width='4.5%'>$EEA_i</td>
		<td width='4.5%'>$EEC_i</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'></td>
		<td width='4.5%'>".number_format((array_sum($vIngreso)+$EEA_i+$EEC_i),2)."</td>
		<td width='7%'></td>
	</tr>";
return array($fila_a,$fila_i);
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function aforoECT($pago, $titulo, $sql_where,$modooperacion){
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
  
	$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;
if($modooperacion == "EAP"){
$check_sql = "SELECT VehiculoID_EAP, ClaseVehiculo_EAP, SUBSTR(ClaseVehiculo_EAP,1,1), SUBSTR(VehiculoID_EAP,4,1), CantidadEje_EAP,count(*), SUM(Importe_EAP), CantidadEje_EAP, SUM(TarifaEE_EAP), PagoID FROM aforo 
WHERE $pago $sql_where AND Cancelado = 0
GROUP BY VehiculoID_ECT";	
	}else{
$check_sql = "SELECT VehiculoID_ECT, ClaseVehiculo_ECT, SUBSTR(ClaseVehiculo_ECT,1,1), SUBSTR(VehiculoID_ECT,4,1), CantidadEje_ECT,count(*), SUM(Importe_ECT), CantidadEje_ECT, SUM(TarifaEE_ECT), PagoID FROM aforo 
WHERE $pago $sql_where AND Cancelado = 0
GROUP BY VehiculoID_ECT";
		}

 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
	}else{
	while(!$rs->EOF){
		if($rs->fields[2] =="A" || $rs->fields[2]=="M"){
			$clase = $rs->fields[2];
			$vAforo[$clase] += $rs->fields[5];
			$vIngreso[$clase] += $rs->fields[6];
			$EEA = $EEA + ($rs->fields[7]*$rs->fields[5]);
			$EEA_i = $EEA_i + ($rs->fields[8]);

		}elseif($rs->fields[2] =="C"){ 
				if($rs->fields[7]>0){
				$clase = "C9";
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				
					$EEC = $EEC + ($rs->fields[7]*$rs->fields[5]);
					$EEC_i = $EEC_i+ ($rs->fields[8]);
					
				}else{
				$clase = $rs->fields[1];
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				
					$EEC = $EEC + ($rs->fields[7]*$rs->fields[5]);
					$EEC_i = $EEC_i + ($rs->fields[8]);
				}
			
			}elseif($rs->fields[2] ==""){
			}
			else{
			$clase = $rs->fields[1];
			$vAforo[$clase] += $rs->fields[5];
			$vIngreso[$clase] += $rs->fields[6];
			
				$EEA = ($rs->fields[7]*$rs->fields[5]);
				$EEA_i = $EEA_i+($rs->fields[8]);
			
			}
	
			
		$rs->MoveNext();
	}
    $rs->Close();
}

$fila_a =  "
		<tr>
		<td width='14.5%'><b>$titulo Aforo</b></td>
		<td width='4.5%'>".$vAforo['A']."</td>
		<td width='4.5%'>".$vAforo['M']."</td>
		<td width='4.5%'>".$vAforo['B2']."</td>
		<td width='4.5%'>".$vAforo['B3']."</td>
		<td width='4.5%'>".$vAforo['B4']."</td>
		<td width='4.5%'>".$vAforo['C2']."</td>
		<td width='4.5%'>".$vAforo['C3']."</td>
		<td width='4.5%'>".$vAforo['C4']."</td>
		<td width='4.5%'>".$vAforo['C5']."</td>
		<td width='4.5%'>".$vAforo['C6']."</td>
		<td width='4.5%'>".$vAforo['C7']."</td>
		<td width='4.5%'>".$vAforo['C8']."</td>
		<td width='4.5%'>".$vAforo['C9']."</td>
		<td width='4.5%'>$EEA</td>
		<td width='4.5%'>$EEC</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'><b>".array_sum($vAforo)."</b></td>
		<td width='4.5%'></td>
		<td width='7%'></td>
	</tr>";
$fila_i =  "
		<tr>
		<td width='14.5%'><b>$titulo Ingreso</b></td>
		<td width='4.5%'>".$vIngreso['A']."</td>
		<td width='4.5%'>".$vIngreso['M']."</td>
		<td width='4.5%'>".$vIngreso['B2']."</td>
		<td width='4.5%'>".$vIngreso['B3']."</td>
		<td width='4.5%'>".$vIngreso['B4']."</td>
		<td width='4.5%'>".$vIngreso['C2']."</td>
		<td width='4.5%'>".$vIngreso['C3']."</td>
		<td width='4.5%'>".$vIngreso['C4']."</td>
		<td width='4.5%'>".$vIngreso['C5']."</td>
		<td width='4.5%'>".$vIngreso['C6']."</td>
		<td width='4.5%'>".$vIngreso['C7']."</td>
		<td width='4.5%'>".$vIngreso['C8']."</td>
		<td width='4.5%'>".$vIngreso['C9']."</td>
		<td width='4.5%'>$EEA_i</td>
		<td width='4.5%'>$EEC_i</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'></td>
		<td width='4.5%'><b>".number_format((array_sum($vIngreso)+$EEA_i+$EEC_i),2)."</b></td>
		<td width='7%'></td>
	</tr>";
return array($fila_a,$fila_i);
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function crea_tr($array_fuente, $titulo){
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
  
	$fila_n =  "
		<tr>
		<th width='14.5%'>$titulo</th>
		<th width='4.5%'>".$array_fuente['T01A']."</th>
		<th width='4.5%'>".$array_fuente['T01M']."</th>
		<th width='4.5%'>".$array_fuente['T02B']."</th>
		<th width='4.5%'>".$array_fuente['T03B']."</th>
		<th width='4.5%'>".$array_fuente['T04B']."</th>
		<th width='4.5%'>".$array_fuente['T02C']."</th>
		<th width='4.5%'>".$array_fuente['T03C']."</th>
		<th width='4.5%'>".$array_fuente['T04C']."</th>
		<th width='4.5%'>".$array_fuente['T05C']."</th>
		<th width='4.5%'>".$array_fuente['T06C']."</th>
		<th width='4.5%'>".$array_fuente['T07C']."</th>
		<th width='4.5%'>".$array_fuente['T08C']."</th>
		<th width='4.5%'>".$array_fuente['T09C']."</th>
		<th width='4.5%'>".$array_fuente['EEA']."</th>
		<th width='4.5%'>".$array_fuente['EEC']."</th>
		<th width='2%'>&nbsp;</th>
		<th width='4.5%'></th>
		<th width='4.5%'></th>
		<th width='7%'></th>
	</tr>";
return $fila_n;

$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function diferencia($fin, $ini){
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
  
	if($fin == 0 && $ini ==0){
	$diferencia = 0;
	}else{
	$diferencia = $fin - $ini + 1;
	}
return $diferencia;

$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
function saca_aforo($pago, $titulo, $sql_where){
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
  
	$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;

$check_sql = "SELECT VehiculoID_ANA, ClaseVehiculo_ANA, SUBSTR(ClaseVehiculo_ANA,1,1), SUBSTR(VehiculoID_ANA,4,1), CantidadEje_ANA,sum(CantidadVeh), SUM(Importe_ANA), SUM(CantidadEje_ANA), SUM(TarifaEE_ANA), PagoID FROM aforo_liq 
WHERE $pago $sql_where
GROUP BY VehiculoID_ANA";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
	}else{
	while(!$rs->EOF){

		switch($rs->fields[2] ){
			case "A":
				$clase = $rs->fields[2];
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				$EEA = $EEA + ($rs->fields[7]);
				$EEA_i = $EEA_i + ($rs->fields[8]);
			break;
			case "M":
				$clase = $rs->fields[2];
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				$EEA = $EEA + ($rs->fields[7]);
				$EEA_i = $EEA_i + ($rs->fields[8]);
			break;	
			case "B":
				$clase = $rs->fields[1]; 
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				$EEA = $EEA+($rs->fields[7]);
				$EEA_i = $EEA_i+($rs->fields[8]);
			break;	
			case "C":
				if($rs->fields[7]>0){
					$clase = "C9";
					$vAforo[$clase] += $rs->fields[5];
					$vIngreso[$clase] += $rs->fields[6];
					$EEC = $EEC + ($rs->fields[7]);
					$EEC_i = $EEC_i+ ($rs->fields[8]);
				}else{
					$clase = $rs->fields[1];
					$vAforo[$clase] += $rs->fields[5];
					$vIngreso[$clase] += $rs->fields[6];
					$EEC = $EEC + ($rs->fields[7]);
					$EEC_i = $EEC_i + ($rs->fields[8]);
				}
			break;		
			default:
				
			break;
		}
	
			
		$rs->MoveNext();
	}
    $rs->Close();
}
$fila_a =  "
		<tr>
		<td width='14.5%'><b>$titulo Aforo</b></td>
		<td width='4.5%'>".$vAforo['A']."</td>
		<td width='4.5%'>".$vAforo['M']."</td>
		<td width='4.5%'>".$vAforo['B2']."</td>
		<td width='4.5%'>".$vAforo['B3']."</td>
		<td width='4.5%'>".$vAforo['B4']."</td>
		<td width='4.5%'>".$vAforo['C2']."</td>
		<td width='4.5%'>".$vAforo['C3']."</td>
		<td width='4.5%'>".$vAforo['C4']."</td>
		<td width='4.5%'>".$vAforo['C5']."</td>
		<td width='4.5%'>".$vAforo['C6']."</td>
		<td width='4.5%'>".$vAforo['C7']."</td>
		<td width='4.5%'>".$vAforo['C8']."</td>
		<td width='4.5%'>".$vAforo['C9']."</td>
		<td width='4.5%'>$EEA</td>
		<td width='4.5%'>$EEC</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'><b>".array_sum($vAforo)."</b></td>
		<td width='4.5%'></td>
		<td width='7%'></td>
	</tr>";
$fila_i =  "
		<tr>
		<td width='14.5%'><b>$titulo Ingreso</b></td>
		<td width='4.5%'>".$vIngreso['A']."</td>
		<td width='4.5%'>".$vIngreso['M']."</td>
		<td width='4.5%'>".$vIngreso['B2']."</td>
		<td width='4.5%'>".$vIngreso['B3']."</td>
		<td width='4.5%'>".$vIngreso['B4']."</td>
		<td width='4.5%'>".$vIngreso['C2']."</td>
		<td width='4.5%'>".$vIngreso['C3']."</td>
		<td width='4.5%'>".$vIngreso['C4']."</td>
		<td width='4.5%'>".$vIngreso['C5']."</td>
		<td width='4.5%'>".$vIngreso['C6']."</td>
		<td width='4.5%'>".$vIngreso['C7']."</td>
		<td width='4.5%'>".$vIngreso['C8']."</td>
		<td width='4.5%'>".$vIngreso['C9']."</td>
		<td width='4.5%'>$EEA_i</td>
		<td width='4.5%'>$EEC_i</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'></td>
		<td width='4.5%'><b>".number_format((array_sum($vIngreso)+$EEA_i+$EEC_i),2)."</b></td>
		<td width='7%'></td>
	</tr>";
return array($fila_a,$fila_i);
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off';
}
}

?>
