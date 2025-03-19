<?php

class grid_discrepancias_xls
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
   var $sum_cruces;
   var $sum_novalidos;
   var $sum_discrepancias;
   var $avg_porcientodisc;
   var $avg_porcientoconteo;
   var $fechaoperacion_Old;
   var $arg_sum_fechaoperacion;
   var $Label_fechaoperacion;
   var $sc_proc_quebra_fechaoperacion;
   var $count_fechaoperacion;
   var $sum_fechaoperacion_cruces;
   var $sum_fechaoperacion_novalidos;
   var $sum_fechaoperacion_discrepancias;
   var $avg_fechaoperacion_porcientodisc;
   var $avg_fechaoperacion_porcientoconteo;
   var $carrilid_Old;
   var $arg_sum_carrilid;
   var $Label_carrilid;
   var $sc_proc_quebra_carrilid;
   var $count_carrilid;
   var $sum_carrilid_cruces;
   var $sum_carrilid_novalidos;
   var $sum_carrilid_discrepancias;
   var $avg_carrilid_porcientodisc;
   var $avg_carrilid_porcientoconteo;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['opcao'] = "";
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
                   nm_limpa_str_grid_discrepancias($cadapar[1]);
                   nm_protect_num_grid_discrepancias($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_discrepancias']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (!isset($sqlDetectados) && isset($sqldetectados)) 
      {
         $sqlDetectados = $sqldetectados;
      }
      if (isset($sqlDetectados)) 
      {
          $_SESSION['sqlDetectados'] = $sqlDetectados;
          nm_limpa_str_grid_discrepancias($_SESSION["sqlDetectados"]);
      }
      if (!isset($sqlClasificados) && isset($sqlclasificados)) 
      {
         $sqlClasificados = $sqlclasificados;
      }
      if (isset($sqlClasificados)) 
      {
          $_SESSION['sqlClasificados'] = $sqlClasificados;
          nm_limpa_str_grid_discrepancias($_SESSION["sqlClasificados"]);
      }
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
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
      $this->groupby_show = "S";
      if (isset($_REQUEST['nmgp_tot_xls']) && !empty($_REQUEST['nmgp_tot_xls']))
      {
          $this->groupby_show = $_REQUEST['nmgp_tot_xls'];
      }
      $this->Xls_col      = 0;
      $this->Tem_xls_res  = false;
      $this->Xls_password = "";
      $this->nm_data      = new nm_data("es");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_discrepancias/grid_discrepancias_res_xls.class.php"))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "grid_discrepancias_res_xls.class.php");
              $this->Res_xls = new grid_discrepancias_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_discrepancias.zip";
          $this->Arquivo   .= "_grid_discrepancias" . $this->Xls_tp;
          $this->Tit_doc    = "grid_discrepancias" . $this->Xls_tp;
          $this->Tit_zip    = "grid_discrepancias.zip";
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Fecha")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_discrepancias_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Carril")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_discrepancias_resumo("out");
          $this->prep_modulos("Res");
      }
      $this->GB_tot_php = array('Fecha','Carril');
      if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'], $this->GB_tot_php))
      {
          $Tot_Gb = "totaliza_php_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'];
          $this->$Tot_Gb();
      }
      else
      {
          require_once($this->Ini->path_aplicacao . "grid_discrepancias_total.class.php"); 
          $this->Tot = new grid_discrepancias_total($this->Ini->sc_page);
          $this->prep_modulos("Tot");
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'];
          $this->Tot->$Gb_geral();
      }
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][1];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Fecha")
      {
          $this->sum_cruces = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][2];
          $this->sum_novalidos = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][3];
          $this->sum_discrepancias = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][4];
          $this->avg_porcientodisc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][5];
          $this->avg_porcientoconteo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][6];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Carril")
      {
          $this->sum_cruces = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][2];
          $this->sum_novalidos = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][3];
          $this->sum_discrepancias = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][4];
          $this->avg_porcientodisc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][5];
          $this->avg_porcientoconteo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][6];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_discrepancias']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_return']);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Fecha")
      {
          $this->sum_cruces = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][2];
          $this->sum_novalidos = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][3];
          $this->sum_discrepancias = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][4];
          $this->avg_porcientodisc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][5];
          $this->avg_porcientoconteo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][6];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Carril")
      {
          $this->sum_cruces = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][2];
          $this->sum_novalidos = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][3];
          $this->sum_discrepancias = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][4];
          $this->avg_porcientodisc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][5];
          $this->avg_porcientoconteo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][6];
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_discrepancias']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_discrepancias']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_discrepancias']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['campos_busca'];
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
          $this->fechaoperacion_2 = (isset($Busca_temp['fechaoperacion_input_2'])) ? $Busca_temp['fechaoperacion_input_2'] : ""; 
          $this->carrilid = (isset($Busca_temp['carrilid'])) ? $Busca_temp['carrilid'] : ""; 
          $tmp_pos = (is_string($this->carrilid)) ? strpos($this->carrilid, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->carrilid))
          {
              $this->carrilid = substr($this->carrilid, 0, $tmp_pos);
          }
          $this->turnoid = (isset($Busca_temp['turnoid'])) ? $Busca_temp['turnoid'] : ""; 
          $tmp_pos = (is_string($this->turnoid)) ? strpos($this->turnoid, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->turnoid))
          {
              $this->turnoid = substr($this->turnoid, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_name'] .= $this->Xls_tp;
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida_label'])
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
          $nmgp_select = "SELECT str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20), CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT FechaOperacion, CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT convert(char(23),FechaOperacion,121), CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT FechaOperacion, CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(FechaOperacion, YEAR TO DAY), CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT FechaOperacion, CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_select .= " group by FechaOperacion,  TurnoID,CarrilID"; 
      $nmgp_select_count .= " group by FechaOperacion,  TurnoID,CarrilID"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->fechaoperacion = $rs->fields[0] ;  
         $this->carrilid = $rs->fields[1] ;  
         $this->carrilid = (string)$this->carrilid;
         $this->turnoid = $rs->fields[2] ;  
         $this->turnoid = (string)$this->turnoid;
         $this->cruces = $rs->fields[3] ;  
         $this->cruces = (string)$this->cruces;
         $this->novalidos = $rs->fields[4] ;  
         $this->novalidos = (string)$this->novalidos;
         $this->clasificados = $rs->fields[5] ;  
         $this->clasificados = (string)$this->clasificados;
         $this->detectados = $rs->fields[6] ;  
         $this->detectados = (string)$this->detectados;
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Fecha")
         {
             $Format_tst = $this->Ini->Get_Gb_date_format('Fecha', 'fechaoperacion');
             $TP_Time     = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
             $this->arg_sum_fechaoperacion = $this->Ini->Get_date_arg_sum($TP_Time . $this->fechaoperacion, $Format_tst, "FechaOperacion");
             if (empty($this->fechaoperacion))
             {
                 $this->Tot->Sc_groupby_fechaoperacion = "FechaOperacion";
             }
             else
             {
                 $this->Tot->Sc_groupby_fechaoperacion = $this->Ini->Get_sql_date_groupby("FechaOperacion", $Format_tst);
             }
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Carril")
         {
             $Format_tst = $this->Ini->Get_Gb_date_format('Carril', 'fechaoperacion');
             $TP_Time     = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
             $this->arg_sum_fechaoperacion = $this->Ini->Get_date_arg_sum($TP_Time . $this->fechaoperacion, $Format_tst, "FechaOperacion");
             if (empty($this->fechaoperacion))
             {
                 $this->Tot->Sc_groupby_fechaoperacion = "FechaOperacion";
             }
             else
             {
                 $this->Tot->Sc_groupby_fechaoperacion = $this->Ini->Get_sql_date_groupby("FechaOperacion", $Format_tst);
             }
         }
         $this->arg_sum_carrilid = ($this->carrilid == "") ? " is null " : " = " . $this->carrilid;
          $Format_tst = $this->Ini->Get_Gb_date_format('Fecha', 'fechaoperacion');
          $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->fechaoperacion, $Format_tst);
          if (($Cmp_tst != $this->fechaoperacion_Old || $NM_prim_qb) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Fecha") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $Format_tst = $this->Ini->Get_Gb_date_format('Fecha', 'fechaoperacion');
              $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->fechaoperacion_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->fechaoperacion, $Format_tst);
              $this->quebra_fechaoperacion_Fecha($this->fechaoperacion) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->fechaoperacion_Old))
              {
                 $this->quebra_fechaoperacion_Fecha_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          $Format_tst = $this->Ini->Get_Gb_date_format('Carril', 'fechaoperacion');
          $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->fechaoperacion, $Format_tst);
          if (($Cmp_tst != $this->fechaoperacion_Old || $NM_prim_qb) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Carril") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->carrilid_Old = $this->carrilid ; 
              $this->quebra_carrilid_Carril($this->fechaoperacion, $this->carrilid) ; 
              $Format_tst = $this->Ini->Get_Gb_date_format('Carril', 'fechaoperacion');
              $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->fechaoperacion_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->fechaoperacion, $Format_tst);
              $this->quebra_fechaoperacion_Carril($this->fechaoperacion) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->fechaoperacion_Old))
              {
                 $this->quebra_fechaoperacion_Carril_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if (isset($this->carrilid_Old))
              {
                 $this->quebra_carrilid_Carril_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->carrilid !== $this->carrilid_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Carril") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->carrilid_Old = $this->carrilid ; 
              $this->quebra_carrilid_Carril($this->fechaoperacion, $this->carrilid) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->carrilid_Old))
              {
                 $this->quebra_carrilid_Carril_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
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
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_discrepancias']['contr_erro'] = 'on';
 $this->discrepancias  = (($this->cruces -$this->novalidos )-$this->clasificados );

if($this->clasificados  > 0 && $this->cruces  > 0){
	$this->porcientodisc  = ($this->clasificados *100)/($this->cruces -$this->novalidos );
}else{
	$this->porcientodisc  = 0;
}

if($this->detectados  > 0 && $this->cruces  > 0){
	if($this->detectados  < $this->cruces ){
		$this->porcientoconteo  = ($this->detectados *100)/($this->cruces -$this->novalidos );
	}else{
		$this->porcientoconteo  = 100;
	}
	
}else{
	$this->porcientoconteo  = 0;
}








$_SESSION['scriptcase']['grid_discrepancias']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
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
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'] && $prim_reg)
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
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_res_grid'] = true;
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              $this->Res_xls->monta_xls();
              if ($this->Use_phpspreadsheet) {
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_res_sheet']);
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['fechaoperacion'])) ? $this->New_label['fechaoperacion'] : "Fecha Operacion"; 
          if ($Cada_col == "fechaoperacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['turnoid'])) ? $this->New_label['turnoid'] : "Turno ID"; 
          if ($Cada_col == "turnoid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['cruces'])) ? $this->New_label['cruces'] : "Cruces"; 
          if ($Cada_col == "cruces" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['novalidos'])) ? $this->New_label['novalidos'] : "No Validos"; 
          if ($Cada_col == "novalidos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['discrepancias'])) ? $this->New_label['discrepancias'] : "Discrepancias"; 
          if ($Cada_col == "discrepancias" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['porcientodisc'])) ? $this->New_label['porcientodisc'] : "% Clasificacion correcta"; 
          if ($Cada_col == "porcientodisc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['porcientoconteo'])) ? $this->New_label['porcientoconteo'] : "% Conteo"; 
          if ($Cada_col == "porcientoconteo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['clasificados'])) ? $this->New_label['clasificados'] : "Clasificacion correcta"; 
          if ($Cada_col == "clasificados" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['detectados'])) ? $this->New_label['detectados'] : "Conteo"; 
          if ($Cada_col == "detectados" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
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
   //----- carrilid
   function NM_export_carrilid()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
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
   //----- turnoid
   function NM_export_turnoid()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->turnoid = NM_charset_to_utf8($this->turnoid);
         if (is_numeric($this->turnoid))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->turnoid);
         $this->Xls_col++;
   }
   //----- cruces
   function NM_export_cruces()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->cruces = NM_charset_to_utf8($this->cruces);
         if (is_numeric($this->cruces))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->cruces);
         $this->Xls_col++;
   }
   //----- novalidos
   function NM_export_novalidos()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->novalidos = NM_charset_to_utf8($this->novalidos);
         if (is_numeric($this->novalidos))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->novalidos);
         $this->Xls_col++;
   }
   //----- discrepancias
   function NM_export_discrepancias()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->discrepancias = NM_charset_to_utf8($this->discrepancias);
         if (is_numeric($this->discrepancias))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->discrepancias);
         $this->Xls_col++;
   }
   //----- porcientodisc
   function NM_export_porcientodisc()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->porcientodisc = NM_charset_to_utf8($this->porcientodisc);
         if (is_numeric($this->porcientodisc))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,###.##';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->porcientodisc);
         $this->Xls_col++;
   }
   //----- porcientoconteo
   function NM_export_porcientoconteo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->porcientoconteo = NM_charset_to_utf8($this->porcientoconteo);
         if (is_numeric($this->porcientoconteo))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,###.##';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->porcientoconteo);
         $this->Xls_col++;
   }
   //----- clasificados
   function NM_export_clasificados()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->clasificados = NM_charset_to_utf8($this->clasificados);
         if (is_numeric($this->clasificados))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->clasificados);
         $this->Xls_col++;
   }
   //----- detectados
   function NM_export_detectados()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->detectados = NM_charset_to_utf8($this->detectados);
         if (is_numeric($this->detectados))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->detectados);
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
   //----- carrilid
   function NM_sub_cons_carrilid()
   {
         $this->carrilid = NM_charset_to_utf8($this->carrilid);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->carrilid;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- turnoid
   function NM_sub_cons_turnoid()
   {
         $this->turnoid = NM_charset_to_utf8($this->turnoid);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->turnoid;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- cruces
   function NM_sub_cons_cruces()
   {
         $this->cruces = NM_charset_to_utf8($this->cruces);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->cruces;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- novalidos
   function NM_sub_cons_novalidos()
   {
         $this->novalidos = NM_charset_to_utf8($this->novalidos);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->novalidos;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- discrepancias
   function NM_sub_cons_discrepancias()
   {
         $this->discrepancias = NM_charset_to_utf8($this->discrepancias);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->discrepancias;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- porcientodisc
   function NM_sub_cons_porcientodisc()
   {
         $this->porcientodisc = NM_charset_to_utf8($this->porcientodisc);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->porcientodisc;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,###.##";
         $this->Xls_col++;
   }
   //----- porcientoconteo
   function NM_sub_cons_porcientoconteo()
   {
         $this->porcientoconteo = NM_charset_to_utf8($this->porcientoconteo);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->porcientoconteo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,###.##";
         $this->Xls_col++;
   }
   //----- clasificados
   function NM_sub_cons_clasificados()
   {
         $this->clasificados = NM_charset_to_utf8($this->clasificados);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->clasificados;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- detectados
   function NM_sub_cons_detectados()
   {
         $this->detectados = NM_charset_to_utf8($this->detectados);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->detectados;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['nolabel'])
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
 function quebra_fechaoperacion_Fecha($fechaoperacion) 
 {
   global $tot_fechaoperacion;
   $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechaoperacion = $this->Ini->Get_arg_groupby($TP_Time . $fechaoperacion, 'YYYYMMDD2'); 
   $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechaoperacion = $this->Ini->Get_arg_groupby($TP_Time . $fechaoperacion, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_fechaoperacion = true; 
   $tot_fechaoperacion[0] = $fechaoperacion;
   $tot_fechaoperacion[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][0];
   $tot_fechaoperacion[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][1];
   $tot_fechaoperacion[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][2];
   $tot_fechaoperacion[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][3];
   $tot_fechaoperacion[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][4];
   $tot_fechaoperacion[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][5];
   $conteudo = $tot_fechaoperacion[0] ;  
   $this->count_fechaoperacion = $tot_fechaoperacion[1];
   $this->sum_fechaoperacion_cruces = $tot_fechaoperacion[2];
   $this->sum_fechaoperacion_novalidos = $tot_fechaoperacion[3];
   $this->sum_fechaoperacion_discrepancias = $tot_fechaoperacion[4];
   $this->avg_fechaoperacion_porcientodisc = $tot_fechaoperacion[5];
   $this->avg_fechaoperacion_porcientoconteo = $tot_fechaoperacion[6];
   $this->campos_quebra_fechaoperacion = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fechaoperacion)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('Fecha', 'fechaoperacion');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('Fecha', 'fechaoperacion');
   $TP_Time    = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $this->campos_quebra_fechaoperacion[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fechaoperacion']))
   {
       $this->campos_quebra_fechaoperacion[0]['lab'] = $this->nmgp_label_quebras['fechaoperacion']; 
   }
   else
   {
   $Tmp_lab  = "Fecha Operacion"; 
   $this->campos_quebra_fechaoperacion[0]['lab'] = sprintf("" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYMMDD2'] . "", $Tmp_lab); 
   }
   $this->sc_proc_quebra_fechaoperacion = false; 
 } 
 function quebra_fechaoperacion_Carril($fechaoperacion) 
 {
   global $tot_fechaoperacion;
   $this->sc_proc_quebra_carrilid = false;
   $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechaoperacion = $this->Ini->Get_arg_groupby($TP_Time . $fechaoperacion, 'YYYYMMDD2'); 
   $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechaoperacion = $this->Ini->Get_arg_groupby($TP_Time . $fechaoperacion, 'YYYYMMDD2'); 
   $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechaoperacion = $this->Ini->Get_arg_groupby($TP_Time . $fechaoperacion, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_fechaoperacion = true; 
   $tot_fechaoperacion[0] = $fechaoperacion;
   $tot_fechaoperacion[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][0];
   $tot_fechaoperacion[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][1];
   $tot_fechaoperacion[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][2];
   $tot_fechaoperacion[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][3];
   $tot_fechaoperacion[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][4];
   $tot_fechaoperacion[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'][$fechaoperacion][5];
   $conteudo = $tot_fechaoperacion[0] ;  
   $this->count_fechaoperacion = $tot_fechaoperacion[1];
   $this->sum_fechaoperacion_cruces = $tot_fechaoperacion[2];
   $this->sum_fechaoperacion_novalidos = $tot_fechaoperacion[3];
   $this->sum_fechaoperacion_discrepancias = $tot_fechaoperacion[4];
   $this->avg_fechaoperacion_porcientodisc = $tot_fechaoperacion[5];
   $this->avg_fechaoperacion_porcientoconteo = $tot_fechaoperacion[6];
   $this->campos_quebra_fechaoperacion = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fechaoperacion)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('Carril', 'fechaoperacion');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('Carril', 'fechaoperacion');
   $TP_Time    = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $this->campos_quebra_fechaoperacion[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fechaoperacion']))
   {
       $this->campos_quebra_fechaoperacion[0]['lab'] = $this->nmgp_label_quebras['fechaoperacion']; 
   }
   else
   {
   $Tmp_lab  = "Fecha Operacion"; 
   $this->campos_quebra_fechaoperacion[0]['lab'] = sprintf("" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYMMDD2'] . "", $Tmp_lab); 
   }
   $this->sc_proc_quebra_fechaoperacion = false; 
 } 
 function quebra_carrilid_Carril($fechaoperacion, $carrilid) 
 {
   global $tot_carrilid;
   $this->sc_proc_quebra_fechaoperacion = false;
   $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechaoperacion = $this->Ini->Get_arg_groupby($TP_Time . $fechaoperacion, 'YYYYMMDD2'); 
   $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechaoperacion = $this->Ini->Get_arg_groupby($TP_Time . $fechaoperacion, 'YYYYMMDD2'); 
   $TP_Time = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechaoperacion = $this->Ini->Get_arg_groupby($TP_Time . $fechaoperacion, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_carrilid = true; 
   $tot_carrilid[0] = $carrilid;
   $tot_carrilid[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['carrilid'][$fechaoperacion][$carrilid][0];
   $tot_carrilid[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['carrilid'][$fechaoperacion][$carrilid][1];
   $tot_carrilid[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['carrilid'][$fechaoperacion][$carrilid][2];
   $tot_carrilid[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['carrilid'][$fechaoperacion][$carrilid][3];
   $tot_carrilid[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['carrilid'][$fechaoperacion][$carrilid][4];
   $tot_carrilid[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['carrilid'][$fechaoperacion][$carrilid][5];
   $conteudo = $tot_carrilid[0] ;  
   $this->count_carrilid = $tot_carrilid[1];
   $this->sum_carrilid_cruces = $tot_carrilid[2];
   $this->sum_carrilid_novalidos = $tot_carrilid[3];
   $this->sum_carrilid_discrepancias = $tot_carrilid[4];
   $this->avg_carrilid_porcientodisc = $tot_carrilid[5];
   $this->avg_carrilid_porcientoconteo = $tot_carrilid[6];
   $this->campos_quebra_carrilid = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->carrilid)); 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
   $this->campos_quebra_carrilid[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['carrilid']))
   {
       $this->campos_quebra_carrilid[0]['lab'] = $this->nmgp_label_quebras['carrilid']; 
   }
   else
   {
   $this->campos_quebra_carrilid[0]['lab'] = "Carril"; 
   }
   $this->sc_proc_quebra_carrilid = false; 
 } 
   function quebra_fechaoperacion_Fecha_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_fechaoperacion as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_fechaoperacion_Fecha_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['field_order'] as $Cada_cmp)
       {
           if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_fechaoperacion_Carril_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_fechaoperacion as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_fechaoperacion_Carril_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['field_order'] as $Cada_cmp)
       {
           if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_carrilid_Carril_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_carrilid as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_carrilid_Carril_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['field_order'] as $Cada_cmp)
       {
           if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_geral_Fecha_bot() 
   {
   }
   function quebra_geral_Carril_bot() 
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

   function totaliza_php_Fecha()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['contr_total_geral'] == "OK" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['contr_array_resumo'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20), CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),FechaOperacion,121), CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT FechaOperacion, CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(FechaOperacion, YEAR TO DAY), CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT FechaOperacion, CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq'] ; 
      $nmgp_select .= " group by FechaOperacion,  TurnoID,CarrilID"; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][1] = 0;
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fechaoperacion = $this->rs_grid->fields[0] ;  
         $this->carrilid = $this->rs_grid->fields[1] ;  
         $this->carrilid = (string)$this->carrilid;  
         $this->turnoid = $this->rs_grid->fields[2] ;  
         $this->turnoid = (string)$this->turnoid;  
         $this->cruces = $this->rs_grid->fields[3] ;  
         $this->cruces = (string)$this->cruces;  
         $this->novalidos = $this->rs_grid->fields[4] ;  
         $this->novalidos = (string)$this->novalidos;  
         $this->clasificados = $this->rs_grid->fields[5] ;  
         $this->clasificados = (string)$this->clasificados;  
         $this->detectados = $this->rs_grid->fields[6] ;  
         $this->detectados = (string)$this->detectados;  
         $Format_tst = $this->Ini->Get_Gb_date_format('Fecha', 'fechaoperacion');
         $fechaoperacion_SV = $this->fechaoperacion;
         $this->fechaoperacion = $this->Ini->Get_arg_groupby($this->fechaoperacion, $Format_tst);
         $fechaoperacion_orig = $this->fechaoperacion;
         $carrilid_orig = $this->carrilid;
         $_SESSION['scriptcase']['grid_discrepancias']['contr_erro'] = 'on';
 $this->discrepancias  = (($this->cruces -$this->novalidos )-$this->clasificados );

if($this->clasificados  > 0 && $this->cruces  > 0){
	$this->porcientodisc  = ($this->clasificados *100)/($this->cruces -$this->novalidos );
}else{
	$this->porcientodisc  = 0;
}

if($this->detectados  > 0 && $this->cruces  > 0){
	if($this->detectados  < $this->cruces ){
		$this->porcientoconteo  = ($this->detectados *100)/($this->cruces -$this->novalidos );
	}else{
		$this->porcientoconteo  = 100;
	}
	
}else{
	$this->porcientoconteo  = 0;
}








$_SESSION['scriptcase']['grid_discrepancias']['contr_erro'] = 'off';
         $this->arg_sum_fechaoperacion = " = " . $this->Db->qstr($this->fechaoperacion);
         $this->arg_sum_carrilid = " = " . $this->carrilid;
     $Format_tst = $this->Ini->Get_Gb_date_format('Fecha', 'fechaoperacion');
     $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('Fecha', 'fechaoperacion');
     $TP_Time    = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
     $this->fechaoperacion = $this->Ini->GB_date_format($TP_Time . $fechaoperacion_SV, $Format_tst, $Prefix_dat); 
         $this->GB_carrilid = $this->carrilid;
         nmgp_Form_Num_Val($this->GB_carrilid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->cruces)), NM_encode_input(sc_strip_script($this->novalidos)), NM_encode_input(sc_strip_script($this->discrepancias)), NM_encode_input(sc_strip_script($this->porcientodisc)), NM_encode_input(sc_strip_script($this->porcientoconteo)), NM_encode_input(sc_strip_script($this->fechaoperacion)), NM_encode_input(sc_strip_script($fechaoperacion_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Fecha")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'] = $this->Res->array_total_fechaoperacion;
      }
   }


   function totaliza_php_Carril()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['contr_total_geral'] == "OK" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['contr_array_resumo'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20), CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),FechaOperacion,121), CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT FechaOperacion, CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(FechaOperacion, YEAR TO DAY), CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT FechaOperacion, CarrilID, TurnoID, COUNT(*) as cruces, SUM(IF( PagoID_ANA = 'GE' && fld_ar_sct != 2,1,0)) as novalidos, " . $_SESSION['sqlClasificados'] . " as clasificados, " . $_SESSION['sqlDetectados'] . " as detectados from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['where_pesq'] ; 
      $nmgp_select .= " group by FechaOperacion,  TurnoID,CarrilID"; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][1] = 0;
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fechaoperacion = $this->rs_grid->fields[0] ;  
         $this->carrilid = $this->rs_grid->fields[1] ;  
         $this->carrilid = (string)$this->carrilid;  
         $this->turnoid = $this->rs_grid->fields[2] ;  
         $this->turnoid = (string)$this->turnoid;  
         $this->cruces = $this->rs_grid->fields[3] ;  
         $this->cruces = (string)$this->cruces;  
         $this->novalidos = $this->rs_grid->fields[4] ;  
         $this->novalidos = (string)$this->novalidos;  
         $this->clasificados = $this->rs_grid->fields[5] ;  
         $this->clasificados = (string)$this->clasificados;  
         $this->detectados = $this->rs_grid->fields[6] ;  
         $this->detectados = (string)$this->detectados;  
         $Format_tst = $this->Ini->Get_Gb_date_format('Carril', 'fechaoperacion');
         $fechaoperacion_SV = $this->fechaoperacion;
         $this->fechaoperacion = $this->Ini->Get_arg_groupby($this->fechaoperacion, $Format_tst);
         $fechaoperacion_orig = $this->fechaoperacion;
         $carrilid_orig = $this->carrilid;
         $_SESSION['scriptcase']['grid_discrepancias']['contr_erro'] = 'on';
 $this->discrepancias  = (($this->cruces -$this->novalidos )-$this->clasificados );

if($this->clasificados  > 0 && $this->cruces  > 0){
	$this->porcientodisc  = ($this->clasificados *100)/($this->cruces -$this->novalidos );
}else{
	$this->porcientodisc  = 0;
}

if($this->detectados  > 0 && $this->cruces  > 0){
	if($this->detectados  < $this->cruces ){
		$this->porcientoconteo  = ($this->detectados *100)/($this->cruces -$this->novalidos );
	}else{
		$this->porcientoconteo  = 100;
	}
	
}else{
	$this->porcientoconteo  = 0;
}








$_SESSION['scriptcase']['grid_discrepancias']['contr_erro'] = 'off';
         $this->arg_sum_fechaoperacion = " = " . $this->Db->qstr($this->fechaoperacion);
         $this->arg_sum_carrilid = " = " . $this->carrilid;
     $Format_tst = $this->Ini->Get_Gb_date_format('Carril', 'fechaoperacion');
     $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('Carril', 'fechaoperacion');
     $TP_Time    = (in_array('fechaoperacion', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
     $this->fechaoperacion = $this->Ini->GB_date_format($TP_Time . $fechaoperacion_SV, $Format_tst, $Prefix_dat); 
         $this->GB_carrilid = $this->carrilid;
         nmgp_Form_Num_Val($this->GB_carrilid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->cruces)), NM_encode_input(sc_strip_script($this->novalidos)), NM_encode_input(sc_strip_script($this->discrepancias)), NM_encode_input(sc_strip_script($this->porcientodisc)), NM_encode_input(sc_strip_script($this->porcientoconteo)), NM_encode_input(sc_strip_script($this->fechaoperacion)), NM_encode_input(sc_strip_script($this->GB_carrilid)), NM_encode_input(sc_strip_script($fechaoperacion_orig)), NM_encode_input(sc_strip_script($carrilid_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['SC_Ind_Groupby'] == "Carril")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['fechaoperacion'] = $this->Res->array_total_fechaoperacion;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['arr_total']['carrilid'] = $this->Res->array_total_carrilid;
      }
   }

   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Sistema de clasificación :: Excel</TITLE>
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
<form name="Fdown" method="get" action="grid_discrepancias_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_discrepancias"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_discrepancias']['xls_return']); ?>"> 
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
}

?>
