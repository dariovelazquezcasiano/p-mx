<?php

class grid_detalleturnocarrilL_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Xls_dados;
   var $Xls_workbook;
   var $Xls_col;
   var $Xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $NM_ctrl_style = array();
   var $Arquivo;
   var $Tit_doc;
   var $count_ger;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida']) {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xls_f);
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
      else { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_grid_detalleturnocarrilL($cadapar[1]);
                   nm_protect_num_grid_detalleturnocarrilL($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_detalleturnocarrilL']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($fld_usuarios)) 
      {
          $_SESSION['fld_usuarios'] = $fld_usuarios;
          nm_limpa_str_grid_detalleturnocarrilL($_SESSION["fld_usuarios"]);
      }
      if (isset($admong)) 
      {
          $_SESSION['admong'] = $admong;
          nm_limpa_str_grid_detalleturnocarrilL($_SESSION["admong"]);
      }
      if (isset($encturnog)) 
      {
          $_SESSION['encturnog'] = $encturnog;
          nm_limpa_str_grid_detalleturnocarrilL($_SESSION["encturnog"]);
      }
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
      { 
          if ($this->Use_phpspreadsheet) {
              require_once $this->Ini->path_third . '/phpspreadsheet/vendor/autoload.php';
          } 
          else { 
              set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel/Cell/AdvancedValueBinder.php';
          } 
      } 
      $orig_form_dt = strtoupper($_SESSION['scriptcase']['reg_conf']['date_format']);
      $this->SC_date_conf_region = "";
      for ($i = 0; $i < 8; $i++)
      {
          if ($i > 0 && substr($orig_form_dt, $i, 1) != substr($this->SC_date_conf_region, -1, 1)) {
              $this->SC_date_conf_region .= $_SESSION['scriptcase']['reg_conf']['date_sep'];
          }
          $this->SC_date_conf_region .= substr($orig_form_dt, $i, 1);
      }
      $this->Xls_tp = ".xlsx";
      if (isset($_REQUEST['nmgp_tp_xls']) && !empty($_REQUEST['nmgp_tp_xls']))
      {
          $this->Xls_tp = "." . $_REQUEST['nmgp_tp_xls'];
      }
      $this->groupby_show = "N";
      if (isset($_REQUEST['nmgp_tot_xls']) && !empty($_REQUEST['nmgp_tot_xls']))
      {
          $this->groupby_show = $_REQUEST['nmgp_tot_xls'];
      }
      $this->Xls_col      = 0;
      $this->Tem_xls_res  = false;
      $this->Xls_password = "";
      $this->nm_data      = new nm_data("es");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['SC_Ind_Groupby'] == "sc_free_total")
          {
              $this->Tem_xls_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_detalleturnocarrilL/grid_detalleturnocarrilL_res_xls.class.php"))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "grid_detalleturnocarrilL_res_xls.class.php");
              $this->Res_xls = new grid_detalleturnocarrilL_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_detalleturnocarrilL.zip";
          $this->Arquivo   .= "_grid_detalleturnocarrilL" . $this->Xls_tp;
          $this->Tit_doc    = "grid_detalleturnocarrilL" . $this->Xls_tp;
          $this->Tit_zip    = "grid_detalleturnocarrilL.zip";
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          if ($this->Use_phpspreadsheet) {
              $this->Xls_dados = new PhpOffice\PhpSpreadsheet\Spreadsheet();
              \PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
          }
          else {
              PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
              $this->Xls_dados = new PHPExcel();
          }
          $this->Xls_dados->setActiveSheetIndex(0);
          $this->Nm_ActiveSheet = $this->Xls_dados->getActiveSheet();
          $this->Nm_ActiveSheet->setTitle($this->Ini->Nm_lang['lang_othr_grid_titl']);
          if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
          {
              $this->Nm_ActiveSheet->setRightToLeft(true);
          }
      }
      require_once($this->Ini->path_aplicacao . "grid_detalleturnocarrilL_total.class.php"); 
      $this->Tot = new grid_detalleturnocarrilL_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['SC_Ind_Groupby'];
      $this->Tot->$Gb_geral();
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['tot_geral'][1];
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_detalleturnocarrilL']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_return']);
          if ($this->Tem_xls_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot );
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
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detalleturnocarrilL']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_detalleturnocarrilL']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_detalleturnocarrilL']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->casetaid = (isset($Busca_temp['casetaid'])) ? $Busca_temp['casetaid'] : ""; 
          $tmp_pos = (is_string($this->casetaid)) ? strpos($this->casetaid, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->casetaid))
          {
              $this->casetaid = substr($this->casetaid, 0, $tmp_pos);
          }
          $this->fechaoperacion = (isset($Busca_temp['fechaoperacion'])) ? $Busca_temp['fechaoperacion'] : ""; 
          $tmp_pos = (is_string($this->fechaoperacion)) ? strpos($this->fechaoperacion, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->fechaoperacion))
          {
              $this->fechaoperacion = substr($this->fechaoperacion, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_name'] .= $this->Xls_tp;
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20), TurnoID, CarrilID, Cuerpo, AVG(Preliquidado) as preliquidado, EncargadoTurnoID_Pre, CasetaID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT FechaOperacion, TurnoID, CarrilID, Cuerpo, AVG(Preliquidado) as preliquidado, EncargadoTurnoID_Pre, CasetaID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT convert(char(23),FechaOperacion,121), TurnoID, CarrilID, Cuerpo, AVG(Preliquidado) as preliquidado, EncargadoTurnoID_Pre, CasetaID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT FechaOperacion, TurnoID, CarrilID, Cuerpo, AVG(Preliquidado) as preliquidado, EncargadoTurnoID_Pre, CasetaID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(FechaOperacion, YEAR TO DAY), TurnoID, CarrilID, Cuerpo, AVG(Preliquidado) as preliquidado, EncargadoTurnoID_Pre, CasetaID from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT FechaOperacion, TurnoID, CarrilID, Cuerpo, AVG(Preliquidado) as preliquidado, EncargadoTurnoID_Pre, CasetaID from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['where_pesq'];
      $nmgp_select .= " group by FechaOperacion, TurnoID, CarrilID"; 
      $nmgp_select_count .= " group by FechaOperacion, TurnoID, CarrilID"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $prim_reg = true;
      $prim_gb  = true;
      $nm_houve_quebra = "N";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $prim_reg = false;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->fechaoperacion = $rs->fields[0] ;  
         $this->turnoid = $rs->fields[1] ;  
         $this->turnoid = (string)$this->turnoid;
         $this->carrilid = $rs->fields[2] ;  
         $this->carrilid = (string)$this->carrilid;
         $this->cuerpo = $rs->fields[3] ;  
         $this->preliquidado = $rs->fields[4] ;  
         $this->preliquidado =  str_replace(",", ".", $this->preliquidado);
         $this->preliquidado = (string)$this->preliquidado;
         $this->encargadoturnoid_pre = $rs->fields[5] ;  
         $this->encargadoturnoid_pre = (string)$this->encargadoturnoid_pre;
         $this->casetaid = $rs->fields[6] ;  
         $this->casetaid = (string)$this->casetaid;
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
         { 
             if ($prim_gb) {
                 $this->count_span = 0;
                 $this->proc_label();
             }
             if ($prim_gb || $nm_houve_quebra == "S") {
                 $this->xls_sub_cons_copy_label($this->Xls_row);
                 $this->Xls_row++;
             }
         }
         elseif ($prim_gb || $nm_houve_quebra == "S")
         {
             $this->count_span = 0;
             $this->proc_label();
         }
     }
     else {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
         { 
             if ($prim_gb)
             {
                 $this->count_span = 0;
                 $this->proc_label();
                 $this->xls_sub_cons_copy_label($this->Xls_row);
                 $this->Xls_row++;
             }
         }
         elseif ($prim_gb)
         {
             $this->count_span = 0;
             $this->proc_label();
         }
     }
     $prim_gb = false;
     $nm_houve_quebra = "N";
         //----- lookup - turnoid
         $this->look_turnoid = $this->turnoid; 
         $this->Lookup->lookup_turnoid($this->look_turnoid, $this->turnoid) ; 
         $this->look_turnoid = ($this->look_turnoid == "&nbsp;") ? "" : $this->look_turnoid; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'on';
  if($this->preliquidado  == 2){
	$this->NM_cmp_hidden["liquidacion"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["liquidacion"] = "off"; }
	$this->NM_cmp_hidden["liquida"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["liquida"] = "off"; }
	$this->NM_cmp_hidden["liquidacion_ok"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["liquidacion_ok"] = "on"; }
	$this->NM_cmp_hidden["resumen"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["resumen"] = "on"; }
	$this->NM_cmp_hidden["resumen_blank"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["resumen_blank"] = "off"; }
   }elseif($this->preliquidado  == 1){
	$this->NM_cmp_hidden["liquidacion"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["liquidacion"] = "off"; }
	$this->NM_cmp_hidden["liquida"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["liquida"] = "on"; }
	$this->NM_cmp_hidden["liquidacion_ok"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["liquidacion_ok"] = "off"; }
	$this->NM_cmp_hidden["resumen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["resumen"] = "off"; }
	$this->NM_cmp_hidden["resumen_blank"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["resumen_blank"] = "on"; }
	}else{
	$this->NM_cmp_hidden["liquidacion"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["liquidacion"] = "on"; }
	$this->NM_cmp_hidden["liquida"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["liquida"] = "off"; }
	$this->NM_cmp_hidden["liquidacion_ok"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["liquidacion_ok"] = "off"; }
	$this->NM_cmp_hidden["resumen_blank"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["resumen_blank"] = "on"; }
	$this->NM_cmp_hidden["resumen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['php_cmp_sel']["resumen"] = "off"; }
	
}
$_SESSION['scriptcase']['grid_detalleturnocarrilL']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
                { 
                    $NM_func_exp = "NM_sub_cons_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
                else 
                { 
                    $NM_func_exp = "NM_export_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
            } 
         } 
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'] && $prim_reg)
      { 
          $this->proc_label();
          $this->xls_sub_cons_copy_label($this->Xls_row);
          $nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
          $nm_grid_sem_reg  = NM_charset_to_utf8($nm_grid_sem_reg);
          $this->Xls_row++;
          $this->arr_export['lines'][$this->Xls_row][1]['data']   = $nm_grid_sem_reg;
          $this->arr_export['lines'][$this->Xls_row][1]['align']  = "right";
          $this->arr_export['lines'][$this->Xls_row][1]['type']   = "char";
          $this->arr_export['lines'][$this->Xls_row][1]['format'] = "";
      }
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_res_grid'] = true;
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              $this->Res_xls->monta_xls();
              if ($this->Use_phpspreadsheet) {
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_res_sheet']);
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Use_phpspreadsheet) {
              if ($this->Xls_tp == ".xlsx") {
                  $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($this->Xls_dados);
              } 
              else {
                  $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xls($this->Xls_dados);
              } 
          } 
          else {
              if ($this->Xls_tp == ".xlsx") {
                  $objWriter = new PHPExcel_Writer_Excel2007($this->Xls_dados);
              } 
              else {
                  $objWriter = new PHPExcel_Writer_Excel5($this->Xls_dados);
              } 
          } 
          $objWriter->save($this->Xls_f);
          if ($this->Xls_password != "")
          { 
              $str_zip   = "";
              $Zip_f     = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input = (FALSE !== strpos($this->Xls_f, ' ')) ? " \"" . $this->Xls_f . "\"" :  $this->Xls_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe -P -j " . $this->Xls_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za -p" . $this->Xls_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za -p" . $this->Xls_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
              $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Xls_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
          } 
      } 
      else 
      { 
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['fechaoperacion'])) ? $this->New_label['fechaoperacion'] : "Fecha Operacion"; 
          if ($Cada_col == "fechaoperacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "center";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['turnoid'])) ? $this->New_label['turnoid'] : "Turno"; 
          if ($Cada_col == "turnoid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "center";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['carrilid'])) ? $this->New_label['carrilid'] : "Carril"; 
          if ($Cada_col == "carrilid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "center";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['liquidacion'])) ? $this->New_label['liquidacion'] : "Liquidación"; 
          if ($Cada_col == "liquidacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['liquida'])) ? $this->New_label['liquida'] : "Liquidación"; 
          if ($Cada_col == "liquida" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['liquidacion_ok'])) ? $this->New_label['liquidacion_ok'] : "Liquidación"; 
          if ($Cada_col == "liquidacion_ok" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['resumen_blank'])) ? $this->New_label['resumen_blank'] : "Archivo"; 
          if ($Cada_col == "resumen_blank" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['resumen'])) ? $this->New_label['resumen'] : "Archivo"; 
          if ($Cada_col == "resumen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['cuerpo'])) ? $this->New_label['cuerpo'] : "Cuerpo"; 
          if ($Cada_col == "cuerpo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
      } 
      $this->Xls_col = 0;
      $this->Xls_row++;
   } 
   //----- fechaoperacion
   function NM_export_fechaoperacion()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->fechaoperacion = substr($this->fechaoperacion, 0, 10);
         if (empty($this->fechaoperacion) || $this->fechaoperacion == "0000-00-00")
         {
             if ($this->Use_phpspreadsheet) {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fechaoperacion, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
             }
             else {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fechaoperacion, PHPExcel_Cell_DataType::TYPE_STRING);
             }
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->fechaoperacion);
             $this->NM_ctrl_style[$current_cell_ref]['format'] = $this->SC_date_conf_region;
         }
         $this->Xls_col++;
   }
   //----- turnoid
   function NM_export_turnoid()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_turnoid = NM_charset_to_utf8($this->look_turnoid);
         if (is_numeric($this->look_turnoid))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->look_turnoid);
         $this->Xls_col++;
   }
   //----- carrilid
   function NM_export_carrilid()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->carrilid = NM_charset_to_utf8($this->carrilid);
         if (is_numeric($this->carrilid))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->carrilid);
         $this->Xls_col++;
   }
   //----- liquidacion
   function NM_export_liquidacion()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->liquidacion = NM_charset_to_utf8($this->liquidacion);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->liquidacion, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->liquidacion, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- liquida
   function NM_export_liquida()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->liquida = NM_charset_to_utf8($this->liquida);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->liquida, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->liquida, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- liquidacion_ok
   function NM_export_liquidacion_ok()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->liquidacion_ok = NM_charset_to_utf8($this->liquidacion_ok);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->liquidacion_ok, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->liquidacion_ok, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- resumen_blank
   function NM_export_resumen_blank()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->resumen_blank = html_entity_decode($this->resumen_blank, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->resumen_blank = strip_tags($this->resumen_blank);
         $this->resumen_blank = NM_charset_to_utf8($this->resumen_blank);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->resumen_blank, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->resumen_blank, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- resumen
   function NM_export_resumen()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->resumen = NM_charset_to_utf8($this->resumen);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->resumen, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->resumen, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- cuerpo
   function NM_export_cuerpo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->cuerpo = html_entity_decode($this->cuerpo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cuerpo = strip_tags($this->cuerpo);
         $this->cuerpo = NM_charset_to_utf8($this->cuerpo);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->cuerpo, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->cuerpo, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- fechaoperacion
   function NM_sub_cons_fechaoperacion()
   {
         $this->fechaoperacion = substr($this->fechaoperacion, 0, 10);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->fechaoperacion;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "data";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $this->SC_date_conf_region;
         $this->Xls_col++;
   }
   //----- turnoid
   function NM_sub_cons_turnoid()
   {
         $this->look_turnoid = NM_charset_to_utf8($this->look_turnoid);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_turnoid;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- carrilid
   function NM_sub_cons_carrilid()
   {
         $this->carrilid = NM_charset_to_utf8($this->carrilid);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->carrilid;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- liquidacion
   function NM_sub_cons_liquidacion()
   {
         $this->liquidacion = NM_charset_to_utf8($this->liquidacion);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->liquidacion;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- liquida
   function NM_sub_cons_liquida()
   {
         $this->liquida = NM_charset_to_utf8($this->liquida);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->liquida;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- liquidacion_ok
   function NM_sub_cons_liquidacion_ok()
   {
         $this->liquidacion_ok = NM_charset_to_utf8($this->liquidacion_ok);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->liquidacion_ok;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- resumen_blank
   function NM_sub_cons_resumen_blank()
   {
         $this->resumen_blank = html_entity_decode($this->resumen_blank, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->resumen_blank = strip_tags($this->resumen_blank);
         $this->resumen_blank = NM_charset_to_utf8($this->resumen_blank);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->resumen_blank;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- resumen
   function NM_sub_cons_resumen()
   {
         $this->resumen = NM_charset_to_utf8($this->resumen);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->resumen;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- cuerpo
   function NM_sub_cons_cuerpo()
   {
         $this->cuerpo = html_entity_decode($this->cuerpo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cuerpo = strip_tags($this->cuerpo);
         $this->cuerpo = NM_charset_to_utf8($this->cuerpo);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->cuerpo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['nolabel'])
       {
           foreach ($this->arr_export['label'] as $col => $dados)
           {
               $this->arr_export['lines'][$row][$col] = $dados;
           }
       }
   }
   function xls_set_style()
   {
       if (!empty($this->NM_ctrl_style))
       {
           foreach ($this->NM_ctrl_style as $col => $dados)
           {
               $cell_ref = $col . $dados['ini'] . ":" . $col . $dados['end'];
               if ($this->Use_phpspreadsheet) {
                   if ($dados['align'] == "LEFT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   elseif ($dados['align'] == "RIGHT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                   }
               }
               else {
                   if ($dados['align'] == "LEFT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   elseif ($dados['align'] == "RIGHT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                   }
               }
               if (isset($dados['format'])) {
                   $this->Nm_ActiveSheet->getStyle($cell_ref)->getNumberFormat()->setFormatCode($dados['format']);
               }
           }
           $this->NM_ctrl_style = array();
       }
   }
   function quebra_geral_sc_free_total_bot() 
   {
   }

   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_file'] = $this->Xls_f;
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
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Auditoria Cajero-Receptor :: Excel</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
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
   <td class="scExportTitle" style="height: 25px">XLS</td>
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
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturnocarrilL']['xls_return']); ?>"> 
</FORM> 
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
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
 
 if (isset($this->rs[0][0])){ 
    $ruta = $this->rs[0][0];   
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
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0])) {    
		$MontoRecla = $this->ra[0][0];
		$CantidadRecla = $this->ra[0][1];
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
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error al acceder a la base de datos';
;
}
else
	{
   while(!$this->rs->EOF)
    {
	    $MOperacion += $this->rs->fields[8];
		$GE += $this->rs->fields[1];
		$Faltante += $this->rs->fields[2];
		$Sobrante += $SE =$this->rs->fields[3];
	    $Entregado+= $this->rs->fields[4];
	    $Depositar+= ($this->rs->fields[9]);
		if($this->rs->fields[4] > $this->rs->fields[2]){
			$Sobrante += $SE = $this->rs->fields[4] - $this->rs->fields[2];
		}
	    $PorEntregar += $PE = ($this->rs->fields[2] > $this->rs->fields[4]) ? ($this->rs->fields[2] - $this->rs->fields[4]) : (0);
		$this->rs->MoveNext();
    }
    $this->rs->Close();
}	
	
	
	


$check_sql = "SELECT TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, min(HoraInicio) as HoraInicio, FechaFin, 
IF(MAX(CONCAT(FechaFin,HoraFin)) > CONCAT(FechaTurno,'23:59:59'), MAX(CONCAT(FechaFin,' ',HoraFin)), MAX(HoraFin)) as HoraFin, OperacionID, FolioCierre, sum(CantidadMXN), sum(CantidadUSD), sum(ImporteMXN),sum(ImporteUSD), min(FolioInicialCR), max(FolioFinalCR), min(FolioInicialEAP),
max(FolioFinalEAP),sum(Faltante), Observacion, sum(MontoCR), AdministradorID, EncargadoTurnoID_Pre, UsuarioID, sum(Entregado),LiquidadorID, SUM(Operacion), Sum(if(FaltanteANA>0,FaltanteANA,0)),Sum(if(FaltanteANA<0,FaltanteANA,0))
FROM  detalleturno 
WHERE ". $condicional ;

 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 


if (isset($this->rs[0][0]))     
{
	$caseta =$this->rs[0][1];
	$this->cuerpo = "";
	$usuario =$this->rs[0][4];
	$fecha_op = $this->rs[0][6];
	$fecha_turno = $this->rs[0][7];
	$hora_ini=$this->rs[0][8];
	$hora_fin=$this->rs[0][10];
    $fld_ccant_mxn =$this->rs[0][13];
	$fld_ccant_usd =$this->rs[0][14]; 
	$fld_cimporte_mxn =$this->rs[0][15];
	$fld_cimporte_usd =$this->rs[0][16];
	$fld_folio_inicr =$this->rs[0][17];
	$fld_folio_fincr =$this->rs[0][18];
	$fld_folio_iniect =$this->rs[0][19];
	$fld_folio_finect =$this->rs[0][20];
	$fld_faltante =$this->rs[0][21];
	$fld_observacion = $this->rs[0][22];
	$MontoCR = $this->rs[0][23];
	$administrador = $this->rs[0][24];
	$encargado_t = $this->rs[0][25];
	$usuarioID = $this->rs[0][26];
	$entregadoCajero = $fld_importe_cr = $this->rs[0][27];
	$liquidador = $this->rs[0][28];
	$operacion = $this->rs[0][29];
	$FaltanteANA = $this->rs[0][30]*(-1);
	$SobranteANA = $this->rs[0][31]*(-1);
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
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
}
else
{
	$Folios = 0;
	$Secuenciales = 0;
   while(!$this->rs->EOF)
    {
		$Folios += $this->diferencia($this->rs->fields[8],$this->rs->fields[7])-$this->rs->fields[11];
		$Secuenciales += $this->diferencia($this->rs->fields[10],$this->rs->fields[9]);
			
		$this->rs->MoveNext();
    }
    $this->rs->Close();
}	



$fld_rollo = array([0,0],[0,0],[0,0]);
$check_sql = "SELECT Rollo,FolioInicial,FolioFinal FROM folios WHERE Fecha ='$fecha_op' AND CasetaID = '$caseta' AND TurnoID = '$turno'";

 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
} else {
   while(!$this->rs->EOF)
    {
	    $ubica = $this->rs->fields[0]-1;
		$fld_rollo[$ubica][0] = $this->rs->fields[1];
	    $fld_rollo[$ubica][1] = $this->rs->fields[2];
		$this->rs->MoveNext();
    }
    $this->rs->Close();
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
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0])) {    
		$cantidadCR = $this->ra[0][1];
	} else  {   
		$cantidadCR = 0;
	}


$check_aforo = "SELECT SUM(Importe_ANA + TarifaEE_ANA) , sum(CantidadVeh) FROM aforo_liq WHERE $condicional AND $PagoEfectivo[1]  ";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0])) {    
		$MontoMarcado = $this->ra[0][0];
		$cantidadMarcado = $this->ra[0][1];
	} else  {   
		$MontoMarcado=0;
		$cantidadMarcado = 0;
	}
$check_aforo = "SELECT SUM(Importe_ANA + TarifaEE_ANA) , sum(CantidadVeh) FROM aforo_liq WHERE $condicional and PagoID = 'GE' ";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0])) {    
		$MontoMarcadoGE = $this->ra[0][0];
		$cantidadMarcadoGE = $this->ra[0][1];
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
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs ) {     
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= '¡Error al acceder a la base de datos!.';
;
}else{
   while(!$this->rs->EOF)
		{
		$style = ''; 
		$check_aforo = "SELECT PagoID,SUM(Importe_CR + TarifaEE_CR), sum(CantidadVeh) FROM aforo_preliq WHERE $condicional AND PagoID = '". $this->rs->fields[0] ."' GROUP BY PagoID";
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0]))     
	{
		$montoCajero = $this->ra[0][1];
		$cantidadCR = $this->ra[0][2];
		$FoliosEfectivo += $this->ra[0][2];
	} else {    
		$montoCajero=0;
		$cantidadCR = 0;
	}
	$check_aforo = "SELECT PagoID,SUM(Importe_ANA + TarifaEE_ANA), sum(CantidadVeh) FROM aforo_liq WHERE $condicional AND PagoID = '". $this->rs->fields[0] ."' GROUP BY PagoID";
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0]))     
	{
		$MontoMarcado = $this->ra[0][1];
		$FoliosMarcado += $this->ra[0][2];
		if($this->rs->fields[1]=="TAG"){$montoTAG=$this->ra[0][1];}
		if($this->rs->fields[1]=="CRE"){$montoCRE=$this->ra[0][1];}
		$cantidadMarcado = $this->ra[0][2];	
	} else {    
		$MontoMarcado=0;
		$cantidadMarcado = 0;
	}
		$TotalCajero += $montoCajero ;
		$TotalMarcado += $MontoMarcado;
		$codigo .= '
		<tr '.$style.' >
		<td width="40%">'.  $this->rs->fields[1] .'</td>
		<td width="10%" align="right">'.number_format($montoCajero,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadMarcado.'</td>
		<td width="10%" align="right">'.number_format(0,2).'</td>
		<td width="10%" align="right">'.($cantidadMarcado-$cantidadCR).'</td>
		</tr>		
		'; 
	   $this->rs->MoveNext();
    }
    $this->rs->Close();
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
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0])) {    
		$montoCajero = $this->ra[0][2];
		$cantidadCR = $this->ra[0][3];
		$porentregar = ($this->ra[0][2]-$MontoMarcado);
	} else  {   
		$montoCajero=0;
		$cantidadCR = 0;
		$porentregar = (0 - $MontoMarcado);
	}

$check_aforo = "SELECT 'CR',PagoID,SUM(Importe_ANA + TarifaEE_ANA), sum(CantidadVeh) FROM aforo_liq WHERE $condicional and PagoID = 'DE' ";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0])) {    
		$MontoMarcado = $this->ra[0][2];
		$cantidadMarcado = $this->ra[0][3];
		$porentregar = ($this->ra[0][2]-$MontoMarcado);
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
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$caseta = $caseta." - ". $this->dataset[0][0];
		$autopista = $this->dataset[0][1];
	}
 
      $nm_select = "SELECT name FROM seg_users where login = '$liquidador'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$liquidador .= " - ". $this->dataset[0][0];
	}
	
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $encargado_t"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$encargado_t .= " - ". $this->dataset[0][0]." ". $this->dataset[0][1]." ". $this->dataset[0][2];
	}
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $usuarioID"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$usuarioID .= " - ". $this->dataset[0][0]." ". $this->dataset[0][1]." ". $this->dataset[0][2];
	}
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $administrador"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$administrador .= " - ". $this->dataset[0][0]." ". $this->dataset[0][1]." ". $this->dataset[0][2];
	}

 
      $nm_select = "SELECT Nombre FROM turnos where TipoID = $turno"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$turno .= " - ". $this->dataset[0][0];
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
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

	
if (isset($this->rs[0][0]))     
{
	$fecha_op = $this->rs[0][6];
	$caseta =$this->rs[0][1];
	$usuario =$this->rs[0][4];
	$carril = "Todos";
	$hora_ini=$this->rs[0][8];
	$hora_fin=$this->rs[0][10];
	$folio_inicial = $this->rs[0][12];
    $folio_final = $this->rs[0][13];
	$encargado_t = $this->rs[0][14];
	
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
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$tramo = $this->dataset[0][0]." - ". $this->dataset[0][1];
	}	
	
 
      $nm_select = "SELECT c.Caseta, CONCAT(a.AutopistaID,' - ', a.Autopista) as Autopista, c.ModoOperacion FROM casetas c LEFT JOIN autopista a ON a.AutopistaID = c.Autopista WHERE c.CasetaID = '$caseta'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$caseta = $caseta." - ". $this->dataset[0][0];
		$autopista = $this->dataset[0][1];
		$modooperacion = $this->dataset[0][2];
	}
						
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $encargado_t"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$encargado_t .= " - ". $this->dataset[0][0]." ". $this->dataset[0][1]." ". $this->dataset[0][2];
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
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs ){
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
}else{
	while(!$this->rs->EOF){
		if($categoria <> $this->rs->fields[0]){
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
			$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" >' .$this->rs->fields[0]. '</th></tr>';
			$tipospago = "(";
		}
		$tipospago .= " PagoID = '".$this->rs->fields[1]. "' OR";
		$categoria = $this->rs->fields[0];
		$fila_a = $this->saca_aforo("PagoID = '".$this->rs->fields[1]."' AND", $this->rs->fields[1], $sql_where);
		$codigo_html .= $fila_a[0];
		$fila_efectivo = $this->rs->fields[2];
		if($this->rs->fields[2]==1){ 
			$codigo_html .= $fila_a[1];
		}
		$this->rs->MoveNext();
	}
	
	$tipospago = substr($tipospago,0,-3);	
	$tipospago .= ")";
	$fila_a= $this->saca_aforo($tipospago, "Total" , " AND ".$sql_where);
	$codigo_html .= $fila_a[0];
    $this->rs->Close();
}
	


	
	
	
$check_sql = "SELECT VehiculoID, Importe, ImporteEjeLigero, ImporteEjePesado from tarifa 
WHERE CasetaID = '$CasetaID' and TipoPagoID = 'NOR' AND '$fecha_op' BETWEEN FechaInicio and FechaFin;";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs ){
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
  }else{
   while(!$this->rs->EOF){
	   
	   $vtarifa[$this->rs->fields[0]] = $this->rs->fields[1];
	   $vtarifa['EEA'] = $this->rs->fields[2];
	   $vtarifa['EEC'] = $this->rs->fields[3];
	   
	   $this->rs->MoveNext();
	}
    $this->rs->Close();
}

$tarifas = $this->crea_tr($vtarifa,"TARIFA REF.NOR"); 

 
      $nm_select = "SELECT Nombre FROM turnos where TipoID = $turno"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$turno .= " - ". $this->dataset[0][0];
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
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
}
else
{
   while(!$this->rs->EOF)
    {
	$PagoEfectivo .= "PagoID = '".$this->rs->fields[0] . "' OR ";
	$PagoEfectivoANA .= "PagoID = '".$this->rs->fields[0] . "' OR ";
   
	 $this->rs->MoveNext();
    }
    $this->rs->Close();
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
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
	}else{
	while(!$this->rs->EOF){

		if($this->rs->fields[2] =="A" || $this->rs->fields[2]=="M"){
			$clase = $this->rs->fields[2];
			$vAforo[$clase] += $this->rs->fields[5];
			$vIngreso[$clase] += $this->rs->fields[6];
			$EEA = $EEA + ($this->rs->fields[7]);
			$EEA_i = $EEA_i + ($this->rs->fields[8]);
			
		}elseif($this->rs->fields[2] =="C"){
				if($this->rs->fields[7]>0){
				$clase = "C9";
				$vAforo[$clase] += $this->rs->fields[5];
				$vIngreso[$clase] += $this->rs->fields[6];
				
					$EEC = $EEC + ($this->rs->fields[7]);
					$EEC_i = $EEC_i+ ($this->rs->fields[8]);
					
				}else{
				$clase = $this->rs->fields[1];
				$vAforo[$clase] += $this->rs->fields[5];
				$vIngreso[$clase] += $this->rs->fields[6];
				
					$EEC = $EEC + ($this->rs->fields[7]);
					$EEC_i = $EEC_i + ($this->rs->fields[8]);
					
				}
			
			}elseif($this->rs->fields[2] ==""){
			}
			else{
			$clase = $this->rs->fields[1];
			$vAforo[$clase] += $this->rs->fields[5];
			$vIngreso[$clase] += $this->rs->fields[6];
			
				$EEA = ($this->rs->fields[7]);
				$EEA_i = $EEA_i+($this->rs->fields[8]);
			
			}
	
			
		$this->rs->MoveNext();
	}
    $this->rs->Close();
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
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
	}else{
	while(!$this->rs->EOF){
		if($this->rs->fields[2] =="A" || $this->rs->fields[2]=="M"){
			$clase = $this->rs->fields[2];
			$vAforo[$clase] += $this->rs->fields[5];
			$vIngreso[$clase] += $this->rs->fields[6];
			$EEA = $EEA + ($this->rs->fields[7]*$this->rs->fields[5]);
			$EEA_i = $EEA_i + ($this->rs->fields[8]);

		}elseif($this->rs->fields[2] =="C"){ 
				if($this->rs->fields[7]>0){
				$clase = "C9";
				$vAforo[$clase] += $this->rs->fields[5];
				$vIngreso[$clase] += $this->rs->fields[6];
				
					$EEC = $EEC + ($this->rs->fields[7]*$this->rs->fields[5]);
					$EEC_i = $EEC_i+ ($this->rs->fields[8]);
					
				}else{
				$clase = $this->rs->fields[1];
				$vAforo[$clase] += $this->rs->fields[5];
				$vIngreso[$clase] += $this->rs->fields[6];
				
					$EEC = $EEC + ($this->rs->fields[7]*$this->rs->fields[5]);
					$EEC_i = $EEC_i + ($this->rs->fields[8]);
				}
			
			}elseif($this->rs->fields[2] ==""){
			}
			else{
			$clase = $this->rs->fields[1];
			$vAforo[$clase] += $this->rs->fields[5];
			$vIngreso[$clase] += $this->rs->fields[6];
			
				$EEA = ($this->rs->fields[7]*$this->rs->fields[5]);
				$EEA_i = $EEA_i+($this->rs->fields[8]);
			
			}
	
			
		$this->rs->MoveNext();
	}
    $this->rs->Close();
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
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
	}else{
	while(!$this->rs->EOF){

		switch($this->rs->fields[2] ){
			case "A":
				$clase = $this->rs->fields[2];
				$vAforo[$clase] += $this->rs->fields[5];
				$vIngreso[$clase] += $this->rs->fields[6];
				$EEA = $EEA + ($this->rs->fields[7]);
				$EEA_i = $EEA_i + ($this->rs->fields[8]);
			break;
			case "M":
				$clase = $this->rs->fields[2];
				$vAforo[$clase] += $this->rs->fields[5];
				$vIngreso[$clase] += $this->rs->fields[6];
				$EEA = $EEA + ($this->rs->fields[7]);
				$EEA_i = $EEA_i + ($this->rs->fields[8]);
			break;	
			case "B":
				$clase = $this->rs->fields[1]; 
				$vAforo[$clase] += $this->rs->fields[5];
				$vIngreso[$clase] += $this->rs->fields[6];
				$EEA = $EEA+($this->rs->fields[7]);
				$EEA_i = $EEA_i+($this->rs->fields[8]);
			break;	
			case "C":
				if($this->rs->fields[7]>0){
					$clase = "C9";
					$vAforo[$clase] += $this->rs->fields[5];
					$vIngreso[$clase] += $this->rs->fields[6];
					$EEC = $EEC + ($this->rs->fields[7]);
					$EEC_i = $EEC_i+ ($this->rs->fields[8]);
				}else{
					$clase = $this->rs->fields[1];
					$vAforo[$clase] += $this->rs->fields[5];
					$vIngreso[$clase] += $this->rs->fields[6];
					$EEC = $EEC + ($this->rs->fields[7]);
					$EEC_i = $EEC_i + ($this->rs->fields[8]);
				}
			break;		
			default:
				
			break;
		}
	
			
		$this->rs->MoveNext();
	}
    $this->rs->Close();
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
