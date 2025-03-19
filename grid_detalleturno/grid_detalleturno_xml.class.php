<?php

class grid_detalleturno_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $count_ger;

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xml_f);
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
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['opcao'] = "";
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
                   nm_limpa_str_grid_detalleturno($cadapar[1]);
                   nm_protect_num_grid_detalleturno($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_detalleturno']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($fld_caseta)) 
      {
          $_SESSION['fld_caseta'] = $fld_caseta;
          nm_limpa_str_grid_detalleturno($_SESSION["fld_caseta"]);
      }
      if (isset($admong)) 
      {
          $_SESSION['admong'] = $admong;
          nm_limpa_str_grid_detalleturno($_SESSION["admong"]);
      }
      if (isset($encturnog)) 
      {
          $_SESSION['encturnog'] = $encturnog;
          nm_limpa_str_grid_detalleturno($_SESSION["encturnog"]);
      }
      if (!isset($modoOperacion) && isset($modooperacion)) 
      {
         $modoOperacion = $modooperacion;
      }
      if (isset($modoOperacion)) 
      {
          $_SESSION['modoOperacion'] = $modoOperacion;
          nm_limpa_str_grid_detalleturno($_SESSION["modoOperacion"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = false;
      $this->Tem_xml_res = false;
      $this->Xml_password = "";
      if (isset($_REQUEST['nm_xml_tag']) && !empty($_REQUEST['nm_xml_tag']))
      {
          $this->New_Format = ($_REQUEST['nm_xml_tag'] == "tag") ? true : false;
      }
      if (isset($_REQUEST['nm_xml_label']) && !empty($_REQUEST['nm_xml_label']))
      {
          $this->Xml_tag_label = ($_REQUEST['nm_xml_label'] == "S") ? true : false;
      }
      $this->Tem_xml_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_xml_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_detalleturno/grid_detalleturno_res_xml.class.php"))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_detalleturno_total.class.php"); 
      $this->Tot      = new grid_detalleturno_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['tot_geral'][1];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_detalleturno']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_return']);
          if ($this->Tem_xml_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data    = new nm_data("es");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_grid_detalleturno.zip";
      $this->Arquivo     .= "_grid_detalleturno";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_detalleturno.xml";
      $this->Tit_zip      = "grid_detalleturno.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
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
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detalleturno']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_detalleturno']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_detalleturno']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['campos_busca'];
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
          $this->turnoid = (isset($Busca_temp['turnoid'])) ? $Busca_temp['turnoid'] : ""; 
          $tmp_pos = (is_string($this->turnoid)) ? strpos($this->turnoid, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->turnoid))
          {
              $this->turnoid = substr($this->turnoid, 0, $tmp_pos);
          }
          $this->admonbusqueda = (isset($Busca_temp['admonbusqueda'])) ? $Busca_temp['admonbusqueda'] : ""; 
          $tmp_pos = (is_string($this->admonbusqueda)) ? strpos($this->admonbusqueda, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->admonbusqueda))
          {
              $this->admonbusqueda = substr($this->admonbusqueda, 0, $tmp_pos);
          }
          $this->encargadopreliquida = (isset($Busca_temp['encargadopreliquida'])) ? $Busca_temp['encargadopreliquida'] : ""; 
          $tmp_pos = (is_string($this->encargadopreliquida)) ? strpos($this->encargadopreliquida, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->encargadopreliquida))
          {
              $this->encargadopreliquida = substr($this->encargadopreliquida, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
if (!isset($_SESSION['modoOperacion'])) {$_SESSION['modoOperacion'] = "";}
if (!isset($this->sc_temp_modoOperacion)) {$this->sc_temp_modoOperacion = (isset($_SESSION['modoOperacion'])) ? $_SESSION['modoOperacion'] : "";}
  $check_sql = "SELECT ModoOperacion FROM casetas WHERE CasetaID = '".$this->casetaid ."'";
 
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
   $this->sc_temp_modoOperacion = $this->rs[0][0];
}
if (isset($this->sc_temp_modoOperacion)) {$_SESSION['modoOperacion'] = $this->sc_temp_modoOperacion;}
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida'])
      { 
          $xml_charset = $_SESSION['scriptcase']['charset'];
          $this->Xml_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
          fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
          fwrite($xml_f, "<root>\r\n");
          if ($this->Grava_view)
          {
              $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
              $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
              fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
              fwrite($xml_v, "<root>\r\n");
          }
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT TurnoID, CarrilID, EstatusCarril, UsuarioID, str_replace (convert(char(10),HoraInicio,102), '.', '-') + ' ' + convert(char(8),HoraInicio,20), str_replace (convert(char(10),FechaFin,102), '.', '-') + ' ' + convert(char(8),FechaFin,20), str_replace (convert(char(10),HoraFin,102), '.', '-') + ' ' + convert(char(8),HoraFin,20), AdministradorID, EncargadoTurnoID_Pre, Consecutivo, CasetaID, TramoID, Cuerpo, str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20), FolioCierre, PreLiquidado, EncargadoTurnoID, OperacionID, FolioInicialEAP, FolioFinalEAP from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT TurnoID, CarrilID, EstatusCarril, UsuarioID, HoraInicio, FechaFin, HoraFin, AdministradorID, EncargadoTurnoID_Pre, Consecutivo, CasetaID, TramoID, Cuerpo, FechaOperacion, FolioCierre, PreLiquidado, EncargadoTurnoID, OperacionID, FolioInicialEAP, FolioFinalEAP from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT TurnoID, CarrilID, EstatusCarril, UsuarioID, convert(char(23),HoraInicio,121), convert(char(23),FechaFin,121), convert(char(23),HoraFin,121), AdministradorID, EncargadoTurnoID_Pre, Consecutivo, CasetaID, TramoID, Cuerpo, convert(char(23),FechaOperacion,121), FolioCierre, PreLiquidado, EncargadoTurnoID, OperacionID, FolioInicialEAP, FolioFinalEAP from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT TurnoID, CarrilID, EstatusCarril, UsuarioID, HoraInicio, FechaFin, HoraFin, AdministradorID, EncargadoTurnoID_Pre, Consecutivo, CasetaID, TramoID, Cuerpo, FechaOperacion, FolioCierre, PreLiquidado, EncargadoTurnoID, OperacionID, FolioInicialEAP, FolioFinalEAP from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT TurnoID, CarrilID, EstatusCarril, UsuarioID, HoraInicio, EXTEND(FechaFin, YEAR TO DAY), HoraFin, AdministradorID, EncargadoTurnoID_Pre, Consecutivo, CasetaID, TramoID, Cuerpo, EXTEND(FechaOperacion, YEAR TO DAY), FolioCierre, PreLiquidado, EncargadoTurnoID, OperacionID, FolioInicialEAP, FolioFinalEAP from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT TurnoID, CarrilID, EstatusCarril, UsuarioID, HoraInicio, FechaFin, HoraFin, AdministradorID, EncargadoTurnoID_Pre, Consecutivo, CasetaID, TramoID, Cuerpo, FechaOperacion, FolioCierre, PreLiquidado, EncargadoTurnoID, OperacionID, FolioInicialEAP, FolioFinalEAP from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $this->xml_registro = "";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<grid_detalleturno>\r\n";
         }
         else
         {
             $this->xml_registro = "<grid_detalleturno";
         }
         $this->turnoid = $rs->fields[0] ;  
         $this->turnoid = (string)$this->turnoid;
         $this->carrilid = $rs->fields[1] ;  
         $this->carrilid = (string)$this->carrilid;
         $this->estatuscarril = $rs->fields[2] ;  
         $this->usuarioid = $rs->fields[3] ;  
         $this->horainicio = $rs->fields[4] ;  
         $this->fechafin = $rs->fields[5] ;  
         $this->horafin = $rs->fields[6] ;  
         $this->administradorid = $rs->fields[7] ;  
         $this->administradorid = (string)$this->administradorid;
         $this->encargadoturnoid_pre = $rs->fields[8] ;  
         $this->encargadoturnoid_pre = (string)$this->encargadoturnoid_pre;
         $this->consecutivo = $rs->fields[9] ;  
         $this->consecutivo = (string)$this->consecutivo;
         $this->casetaid = $rs->fields[10] ;  
         $this->casetaid = (string)$this->casetaid;
         $this->tramoid = $rs->fields[11] ;  
         $this->tramoid = (string)$this->tramoid;
         $this->cuerpo = $rs->fields[12] ;  
         $this->fechaoperacion = $rs->fields[13] ;  
         $this->foliocierre = $rs->fields[14] ;  
         $this->preliquidado = $rs->fields[15] ;  
         $this->encargadoturnoid = $rs->fields[16] ;  
         $this->encargadoturnoid = (string)$this->encargadoturnoid;
         $this->operacionid = $rs->fields[17] ;  
         $this->folioinicialeap = $rs->fields[18] ;  
         $this->folioinicialeap = (string)$this->folioinicialeap;
         $this->foliofinaleap = $rs->fields[19] ;  
         $this->foliofinaleap = (string)$this->foliofinaleap;
         //----- lookup - usuarioid
         $this->look_usuarioid = $this->usuarioid; 
         $this->Lookup->lookup_usuarioid($this->look_usuarioid, $this->usuarioid) ; 
         $this->look_usuarioid = ($this->look_usuarioid == "&nbsp;") ? "" : $this->look_usuarioid; 
         //----- lookup - administradorid
         $this->look_administradorid = $this->administradorid; 
         $this->Lookup->lookup_administradorid($this->look_administradorid, $this->administradorid) ; 
         $this->look_administradorid = ($this->look_administradorid == "&nbsp;") ? "" : $this->look_administradorid; 
         //----- lookup - encargadoturnoid_pre
         $this->look_encargadoturnoid_pre = $this->encargadoturnoid_pre; 
         $this->Lookup->lookup_encargadoturnoid_pre($this->look_encargadoturnoid_pre, $this->encargadoturnoid_pre) ; 
         $this->look_encargadoturnoid_pre = ($this->look_encargadoturnoid_pre == "&nbsp;") ? "" : $this->look_encargadoturnoid_pre; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  if($this->preliquidado  == 0){
	if($this->foliocierre == ""){
		$this->NM_cmp_hidden["preliquidar"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["preliquidar"] = "off"; }
		$this->NM_cmp_hidden["preliquidado"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["preliquidado"] = "off"; }
		$this->NM_cmp_hidden["preliquidacion"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["preliquidacion"] = "off"; }
		$this->NM_cmp_hidden["comparativo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["comparativo"] = "off"; }
		$this->NM_cmp_hidden["bitacora"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["bitacora"] = "off"; }
		}else{
	$this->NM_cmp_hidden["preliquidar"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["preliquidar"] = "on"; }
	$this->NM_cmp_hidden["preliquidado"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["preliquidado"] = "off"; }
	$this->NM_cmp_hidden["preliquidacion"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["preliquidacion"] = "off"; }
	$this->NM_cmp_hidden["bitacora"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["bitacora"] = "off"; }
	$this->NM_cmp_hidden["comparativo"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["comparativo"] = "on"; }
		}
   }else{
	$this->NM_cmp_hidden["preliquidar"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["preliquidar"] = "off"; }
	$this->NM_cmp_hidden["preliquidado"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["preliquidado"] = "on"; }
	$this->NM_cmp_hidden["preliquidacion"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["preliquidacion"] = "on"; }
	$this->NM_cmp_hidden["bitacora"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["bitacora"] = "on"; }
	$this->NM_cmp_hidden["comparativo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['php_cmp_sel']["comparativo"] = "off"; }
}
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</grid_detalleturno>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['embutida'])
      { 
          if (!$this->New_Format)
          {
              $this->xml_registro = "";
          }
          $_SESSION['scriptcase']['export_return'] = $this->xml_registro;
      }
      else
      { 
          fwrite($xml_f, "</root>");
          fclose($xml_f);
          if ($this->Grava_view)
          {
             fwrite($xml_v, "</root>");
             fclose($xml_v);
          }
          if ($this->Tem_xml_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "grid_detalleturno_res_xml.class.php");
              $this->Res = new grid_detalleturno_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_res_grid'] = true;
              $this->Res->monta_xml();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Xml_password != "" || $this->Tem_xml_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Xml_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Xml_f, ' ')) ? " \"" . $this->Xml_f . "\"" :  $this->Xml_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
              $this->Xml_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_xml_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_res_file']['xml'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_res_file']['xml']);
              }
              if ($this->Grava_view)
              {
                  $str_zip    = "";
                  $xml_view_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
                  $zip_view_f = str_replace(".zip", "_view.zip", $this->Zip_f);
                  $zip_arq_v  = str_replace(".zip", "_view.zip", $this->Arq_zip);
                  $Zip_f      = (FALSE !== strpos($zip_view_f, ' ')) ? " \"" . $zip_view_f . "\"" :  $zip_view_f;
                  $Arq_input  = (FALSE !== strpos($xml_view_ff, ' ')) ? " \"" . $xml_view_f . "\"" :  $xml_view_f;
                  if (is_file($Zip_f)) {
                      unlink($Zip_f);
                  }
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      chdir($this->Ini->path_third . "/zip/windows");
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
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
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      chdir($this->Ini->path_third . "/zip/mac/bin");
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($Arq_input);
                  $this->Arquivo_view = $zip_arq_v;
                  if ($this->Tem_xml_res)
                  { 
                      $str_zip   = "";
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_res_file']['view'];
                      $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                      if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                      {
                          $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      if (!empty($str_zip)) {
                          exec($str_zip);
                      }
                      // ----- ZIP log
                      $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                      if ($fp)
                      {
                          @fwrite($fp, $str_zip . "\r\n\r\n");
                          @fclose($fp);
                      }
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- turnoid
   function NM_export_turnoid()
   {
             nmgp_Form_Num_Val($this->turnoid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['turnoid'])) ? $this->New_label['turnoid'] : "Turno"; 
         }
         else
         {
             $SC_Label = "turnoid"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->turnoid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->turnoid) . "\"";
         }
   }
   //----- carrilid
   function NM_export_carrilid()
   {
             nmgp_Form_Num_Val($this->carrilid, "", "", "0", "S", "2", "", "N:1", "-") ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['carrilid'])) ? $this->New_label['carrilid'] : "Carril"; 
         }
         else
         {
             $SC_Label = "carrilid"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->carrilid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->carrilid) . "\"";
         }
   }
   //----- estatuscarril
   function NM_export_estatuscarril()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->estatuscarril))
         {
             $this->estatuscarril = sc_convert_encoding($this->estatuscarril, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['estatuscarril'])) ? $this->New_label['estatuscarril'] : "Estatus Carril"; 
         }
         else
         {
             $SC_Label = "estatuscarril"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->estatuscarril) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->estatuscarril) . "\"";
         }
   }
   //----- usuarioid
   function NM_export_usuarioid()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_usuarioid))
         {
             $this->look_usuarioid = sc_convert_encoding($this->look_usuarioid, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['usuarioid'])) ? $this->New_label['usuarioid'] : "Usuario"; 
         }
         else
         {
             $SC_Label = "usuarioid"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_usuarioid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_usuarioid) . "\"";
         }
   }
   //----- horainicio
   function NM_export_horainicio()
   {
             $conteudo_x =  $this->horainicio;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->horainicio, "HH:II:SS  ");
                 $this->horainicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['horainicio'])) ? $this->New_label['horainicio'] : "Hora Inicio"; 
         }
         else
         {
             $SC_Label = "horainicio"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->horainicio) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->horainicio) . "\"";
         }
   }
   //----- fechafin
   function NM_export_fechafin()
   {
             $conteudo_x =  $this->fechafin;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechafin, "YYYY-MM-DD  ");
                 $this->fechafin = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fechafin'])) ? $this->New_label['fechafin'] : "Fecha Fin"; 
         }
         else
         {
             $SC_Label = "fechafin"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechafin) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechafin) . "\"";
         }
   }
   //----- horafin
   function NM_export_horafin()
   {
             $conteudo_x =  $this->horafin;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->horafin, "HH:II:SS  ");
                 $this->horafin = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['horafin'])) ? $this->New_label['horafin'] : "Hora Fin"; 
         }
         else
         {
             $SC_Label = "horafin"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->horafin) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->horafin) . "\"";
         }
   }
   //----- administradorid
   function NM_export_administradorid()
   {
         nmgp_Form_Num_Val($this->look_administradorid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_administradorid))
         {
             $this->look_administradorid = sc_convert_encoding($this->look_administradorid, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['administradorid'])) ? $this->New_label['administradorid'] : "Administrador"; 
         }
         else
         {
             $SC_Label = "administradorid"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_administradorid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_administradorid) . "\"";
         }
   }
   //----- encargadoturnoid_pre
   function NM_export_encargadoturnoid_pre()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_encargadoturnoid_pre))
         {
             $this->look_encargadoturnoid_pre = sc_convert_encoding($this->look_encargadoturnoid_pre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['encargadoturnoid_pre'])) ? $this->New_label['encargadoturnoid_pre'] : "Encargado Turno PreLiquida"; 
         }
         else
         {
             $SC_Label = "encargadoturnoid_pre"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_encargadoturnoid_pre) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_encargadoturnoid_pre) . "\"";
         }
   }
   //----- preliquidar
   function NM_export_preliquidar()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->preliquidar))
         {
             $this->preliquidar = sc_convert_encoding($this->preliquidar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['preliquidar'])) ? $this->New_label['preliquidar'] : "Preliquidar"; 
         }
         else
         {
             $SC_Label = "preliquidar"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->preliquidar) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->preliquidar) . "\"";
         }
   }
   //----- preliquidado
   function NM_export_preliquidado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->preliquidado))
         {
             $this->preliquidado = sc_convert_encoding($this->preliquidado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['preliquidado'])) ? $this->New_label['preliquidado'] : "Preliquidar"; 
         }
         else
         {
             $SC_Label = "preliquidado"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->preliquidado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->preliquidado) . "\"";
         }
   }
   //----- preliquidacion
   function NM_export_preliquidacion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->preliquidacion))
         {
             $this->preliquidacion = sc_convert_encoding($this->preliquidacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['preliquidacion'])) ? $this->New_label['preliquidacion'] : "Pre Liquidación"; 
         }
         else
         {
             $SC_Label = "preliquidacion"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->preliquidacion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->preliquidacion) . "\"";
         }
   }
   //----- comparativo
   function NM_export_comparativo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->comparativo))
         {
             $this->comparativo = sc_convert_encoding($this->comparativo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['comparativo'])) ? $this->New_label['comparativo'] : "Pre Liquidación"; 
         }
         else
         {
             $SC_Label = "comparativo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->comparativo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->comparativo) . "\"";
         }
   }
   //----- bitacora
   function NM_export_bitacora()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->bitacora))
         {
             $this->bitacora = sc_convert_encoding($this->bitacora, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['bitacora'])) ? $this->New_label['bitacora'] : "Bitacora"; 
         }
         else
         {
             $SC_Label = "bitacora"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->bitacora) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->bitacora) . "\"";
         }
   }
   //----- consecutivo
   function NM_export_consecutivo()
   {
             nmgp_Form_Num_Val($this->consecutivo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['consecutivo'])) ? $this->New_label['consecutivo'] : "Consecutivo"; 
         }
         else
         {
             $SC_Label = "consecutivo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->consecutivo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->consecutivo) . "\"";
         }
   }
   //----- casetaid
   function NM_export_casetaid()
   {
             nmgp_Form_Num_Val($this->casetaid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['casetaid'])) ? $this->New_label['casetaid'] : "Caseta ID"; 
         }
         else
         {
             $SC_Label = "casetaid"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->casetaid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->casetaid) . "\"";
         }
   }
   //----- tramoid
   function NM_export_tramoid()
   {
             nmgp_Form_Num_Val($this->tramoid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['tramoid'])) ? $this->New_label['tramoid'] : "Tramo ID"; 
         }
         else
         {
             $SC_Label = "tramoid"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tramoid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tramoid) . "\"";
         }
   }
   //----- cuerpo
   function NM_export_cuerpo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cuerpo))
         {
             $this->cuerpo = sc_convert_encoding($this->cuerpo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cuerpo'])) ? $this->New_label['cuerpo'] : "Cuerpo"; 
         }
         else
         {
             $SC_Label = "cuerpo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cuerpo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cuerpo) . "\"";
         }
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function clear_tag(&$conteudo)
   {
      $out = (is_numeric(substr($conteudo, 0, 1)) || substr($conteudo, 0, 1) == "") ? "_" : "";
      $str_temp = "abcdefghijklmnopqrstuvwxyz0123456789";
      for ($i = 0; $i < strlen($conteudo); $i++)
      {
          $char = substr($conteudo, $i, 1);
          $ok = false;
          for ($z = 0; $z < strlen($str_temp); $z++)
          {
              if (strtolower($char) == substr($str_temp, $z, 1))
              {
                  $ok = true;
                  break;
              }
          }
          $out .= ($ok) ? $char : "_";
      }
      $conteudo = $out;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> Turno :: XML</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XML</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_detalleturno_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_detalleturno"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['xml_return']); ?>"> 
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
function forma_pre($identificador, $FechaOperacion){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
	$montoTAG = 0;
	$montoCRE = 0;
	
	$dia_hora =  time();
	$fld_diag=date("d/m/Y", $dia_hora);
	$fld_horag=date("H:i:s", $dia_hora);

$check_sql = "SELECT TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, CantidadMXN, CantidadUSD, ImporteMXN,ImporteUSD,FolioInicialCR,FolioFinalCR,FolioInicialEAP,FolioFinalEAP,Faltante, Observacion, MontoCR, AdministradorID, EncargadoTurnoID_Pre, UsuarioID, Entregado, OperacionID, IngresoELU_PRE FROM detalleturno WHERE FechaOperacion = '$FechaOperacion' and  FolioCierre = '".$identificador."'";
 
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
	$turno =$this->rs[0][0];
	$caseta =$this->rs[0][1];
	$this->cuerpo =$this->rs[0][3];
	$usuario =$this->rs[0][4];
	$carril =$this->rs[0][5];
	$fecha_op = $this->rs[0][6];
	$fecha_turno = $this->rs[0][7];
	$hora_ini=$this->rs[0][8];
	$hora_fin=$this->rs[0][10];
	$folio_cierre=$this->rs[0][12];
    $fld_ccant_mxn =$this->rs[0][13];
	$fld_ccant_usd =$this->rs[0][14]; 
	$fld_cimporte_mxn =$this->rs[0][15];
	$fld_cimporte_usd =$this->rs[0][16];
	$fld_folio_inicr =$this->rs[0][17];
	$fld_folio_fincr =$this->rs[0][18];
	$sec_ini =$this->rs[0][19];
	$sec_fin =$this->rs[0][20];
	$fld_faltante =$this->rs[0][21];
	$fld_observacion = $this->rs[0][22];
	$MontoCR = $this->rs[0][23];
	$administrador = $this->rs[0][24];
	$encargado_t = $this->rs[0][25];
	$usuarioID = $this->rs[0][26];
	$entregadoCajero = $this->rs[0][27];
	$OperacionID = $this->rs[0][28];
	$ingresoELU_PRE = $this->rs[0][29];
} else {	
	echo "¡Ha ocurrido algo!. Pongase en contacto con el administrador.";
}
$leyenda = "";
 
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
		$NomCaseta = $caseta." - ". $this->dataset[0][0];
		$NomAutopista = $this->dataset[0][1];
		$ModoOperacion = $this->dataset[0][2];
	}		
	
$nombre_archivo ='PreLiqCR_'.$folio_cierre;

$fld_importe_cr = 0;
$check_sql = "SELECT Importe,TipoOperacion FROM operacion WHERE 
 	CasetaID = '$caseta' AND 
	CarrilID = '$carril' AND 
	TurnoID = '$turno' AND 
	FechaOperacion = '$fecha_op' AND
	HoraInicio = '$hora_ini'";
 
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
	if($this->rs->fields[1]=="FONDO"){
			$fld_importe_cr -= $this->rs->fields[0];
				} else {
			$fld_importe_cr += $this->rs->fields[0];
				}
	   $this->rs->MoveNext();
    }
    $this->rs->Close();
}

$fld_rollo = array([0,0],[0,0],[0,0]);
$check_sql = "SELECT Rollo,FolioInicial,FolioFinal FROM folios WHERE Fecha ='$fecha_op' AND CasetaID = '$caseta' AND TurnoID = '$turno' AND CarrilID = '$carril' AND DetalleturnoID = '".$identificador."'";
 
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
$montoCajero =0;
$totalNOR = 0;
$foliosCR = 0;
$montoCRE= 0;
$foliosCR=0;
$codigo ="";
$PagoEfectivo = $this->ArmaCondicion();
$MontoMarcado =0;

	
	$check_aforo = "SELECT Discrepancia, MontoDisc FROM discrepancias WHERE FolioCierre = '$identificador' and FechaOperacion = '$FechaOperacion' ";

	
	 
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
		$MontoRecla = $this->ra[0][1];
		$CantidadRecla = $this->ra[0][0];
	} else  {   
		$MontoRecla=0;
		$CantidadRecla = 0;
	}

$style = 'style= "background-color:#dfdfdf; font-weight: bold";';
$check_aforo = "SELECT 'CR',PagoID,SUM(Importe_CR + TarifaEE_CR), sum(CantidadVeh) FROM aforo_preliq WHERE FechaOperacion = '$FechaOperacion' and  FolioCierre = '$identificador'  $PagoEfectivo ";	   
	 
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
		$montoCajero = $fld_importe_cr + $fld_cimporte_mxn;;
		$MontoMarcado = $this->ra[0][2];
		$cantidadCR = $this->ra[0][3];
		$porentregar = ($this->ra[0][2]-$MontoMarcado);
		$entregado = $MontoMarcado;
	} else  {   
		$MontoMarcado=0;
		$cantidadCR = 0;
		$porentregar = (0-$MontoMarcado);
		$entregado = $MontoMarcado;
	}
	$MarcadoEfectivo = $MontoMarcado;
	$FoliosEfectivo = $cantidadCR;
	$FoliosOriginal = $cantidadCR; 
	$codigo .= '
		<tr '.$style.' >
		<td width="40%">Aforo Efectivo</td>
		<td width="10%" align="right">'.number_format($montoCajero,2).'</td>
		<td width="10%" align="right">'.$FoliosEfectivo.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format($montoCajero - ($MontoMarcado + $ingresoELU_PRE),2).'</td>
		<td width="10%" align="right">'.($cantidadCR-$FoliosEfectivo).'</td>
		</tr>		
		';
	$diferiencia_total = $montoCajero - ($MontoMarcado + $ingresoELU_PRE);
	
$check_sql = "SELECT TipoPagoID,Tipo FROM tipopago WHERE EsMarcacion = 1 and PagoEfectivo <> 1 and (TipoPagoID <> 'DE' AND TipoPagoID <> 'GE' ) order by Orden";
 
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
	   
	  
	   
		$check_aforo = "SELECT 'CR',PagoID,SUM(Importe_CR + TarifaEE_CR), sum(CantidadVeh) FROM aforo_preliq WHERE FechaOperacion = '$FechaOperacion' and  FolioCierre = '$identificador' AND PagoID = '". $this->rs->fields[0] ."'
GROUP BY PagoID";	   
	 
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
		$MontoMarcado = $this->ra[0][2];
		$FoliosEfectivo += $this->ra[0][3];
		if($this->rs->fields[1]=="TAG"){$montoTAG=$this->ra[0][2];}
		if($this->rs->fields[1]=="CRE"){$montoCRE=$this->ra[0][2];}
		if($this->rs->fields[1]<>"TAG"){$montoCajero += $MontoMarcado;}
		$cantidadCR = $this->ra[0][3];	
	} else {    
		$MontoMarcado=0;
		$cantidadCR = 0;
	}
		$codigo .= '
		<tr '.$style.' >
		<td width="40%">'.  $this->rs->fields[1] .'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format(($MontoMarcado - $MontoMarcado),2).'</td>
		<td width="10%" align="right">'.($cantidadCR-$cantidadCR).'</td>
		</tr>		
		'; 
	   $this->rs->MoveNext();
    }
    $this->rs->Close();
}

	$check_aforo = "SELECT PagoID,SUM(Importe_CR + TarifaEE_CR), sum(CantidadVeh) FROM aforo_preliq WHERE FolioCierre = '$identificador' AND PagoID <> 'DE' and PagoID <> 'GE' ";
	 
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
		$cantidadCR = $this->ra[0][2];
	} else {    
		$MontoMarcado= 0.0;
		$cantidadCR = 0;
	}
$codigo .= '
		<tr style= "background-color:#dfdfdf; font-weight: bold"; >
		<td width="40%">Totales </td>
		<td width="10%" align="right">'.number_format(($montoCajero),2).'</td>
		<td width="10%" align="right">'.$FoliosEfectivo.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado-$montoTAG,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format(($montoCajero-($MontoMarcado+$montoTAG + $ingresoELU_PRE)),2).'</td>
		<td width="10%" align="right">'.($FoliosEfectivo-$cantidadCR).'</td>
		</tr>
		';
$style = 'style= "background-color:#dfdfdf; font-weight: bold";';
$check_aforo = "SELECT 'CR',PagoID,SUM(Importe_CR + TarifaEE_CR), sum(CantidadVeh) FROM aforo_preliq WHERE FechaOperacion = '$FechaOperacion' and  FolioCierre = '$identificador'  and PagoID = 'DE'";	   
	 
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
		$cantidadCR = $this->ra[0][3];
		$porentregar = ($this->ra[0][2]-$MontoMarcado);
	} else  {   
		$MontoMarcado=0;
		$cantidadCR = 0;
		$porentregar = (0-$MontoMarcado);
	}
	
	$codigo .= '
		<tr '.$style.' >
		<td width="40%">Detecciones erroneas</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado-$MontoMarcado,2).'</td>
		<td width="10%" align="right">'.($cantidadCR-$cantidadCR).'</td>
		</tr>
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
		<td width="40%">Faltante / Sobrante por Eludidos</td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"><b></b></td>
		<td width="10%" align="right"><b></b></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		</tr>
		<tr>
		<td width="100%" style="background-color:#FFFF00">Ingreso por Eludidos</td>
		</tr>
		<tr>
		<td width="40%">Ingreso por Eludidos</td>
		<td width="10%" align="right">'.number_format($ingresoELU_PRE,2).'</td>
		<td width="10%" align="right">Diferencia Total:</td>
		<td width="10%" align="right"><b>'.number_format($diferiencia_total,2).'</b></td>
		<td width="10%" align="right"><b></b></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		</tr>
		';

		
 
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

$sobrante= 0;
$entregadoCajero1 = $entregadoCajero - $ingresoELU_PRE;
$diferenciaCR_Efe = $entregadoCajero1;
$diferenciaCR_Efe2= 0;
	
	

if($MarcadoEfectivo > ($fld_importe_cr + $fld_cimporte_mxn)){ 
	if($fld_faltante >= $entregadoCajero1){
		$diferenciaCR_Efe2 = $MarcadoEfectivo - ($fld_importe_cr + $fld_cimporte_mxn)-$entregadoCajero1;
	}else{
		$sobrante = ABS($MarcadoEfectivo - ($fld_importe_cr + $fld_cimporte_mxn)-$entregadoCajero1);
	}
	$depositar = $MarcadoEfectivo - $fld_cimporte_mxn - $diferenciaCR_Efe2 + $sobrante + $ingresoELU_PRE;
}else{ 
	$sobrante = ABS(($fld_importe_cr + $fld_cimporte_mxn) - $MarcadoEfectivo);
	$depositar = $fld_importe_cr + $entregadoCajero1 + $ingresoELU_PRE;
}

$tbl = '
	<table class = "roundedCorners" cellpadding="5" cellspacing="2">
	<tr>
		<th style="background-color:#FFFFFF";color:#0000FF; colspan="5" align="center"><b>PRELIQUIDACIÓN DE CAJERO-RECEPTOR<br>Tránsito Vehicular</b>
		</th>
	</tr>
</table>
<table class = "estilo1"  cellpadding="2" cellspacing="2">
	<tr>
		<td>Fecha:</td>
		<td style= "border-bottom: 0.5px solid Black">' . $fecha_op .'</td>
		<td rowspan="6"></td>
		<td>No. de Control</td>
		<td style= "border-bottom: 0.5px solid Black">'. $folio_cierre .'</td>	
	</tr>
	<tr>
		<td>No. y Nombre de Delegación:</td>
		<td style= "border-bottom: 0.5px solid Black">'. $NomAutopista .'</td>
		<td>Hora Inicial:</td>
		<td style= "border-bottom: 0.5px solid Black">'. $hora_ini . '</td>
	</tr>
	<tr>
		<td>No. y Nombre Plaza de C.:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$NomCaseta.'</td>
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
		<th width="20%">Entregado</th>
		<th width="20%">Marcado</th>
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
		<td width="10%" align="right">'.number_format($fld_importe_cr,2).'</td>
		<td width="10%" align="right">'. $FoliosOriginal .'</td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
	</tr>
	<tr>
		<td width="40%">Boletos Generados por Error</td>
		<td width="10%" align="right">'.number_format($fld_cimporte_mxn,2).'</td>
		<td width="10%" align="right">'.$fld_ccant_mxn.'</td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
	</tr>
	<tr>
		<td width="40%">Ingresos por Eludidos1</td>
		<td width="10%" align="right">'.$ingresoELU_PRE.'</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right"><b></b></td>
		<td width="10%" align="right"><b></b></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
	</tr>
	'. $codigo  .' 
	<tr>
		<td width="100%"> </td>
	</tr>
</table>
<table class = "estilo1" cellpadding="1" cellspacing="0">
	<tr>
		<th style="background-color: #ffff00; border-right: 0.5px solid Black; border-left: 0.5px solid Black" colspan="4" align="center" width="60%"><strong>DIFERENCIA CAJERO-RECEPTOR (MARCADO Y ENTREGADO)</strong></th>
		<th style="background-color: #ffff00; border-right: 0.5px solid Black" colspan="2color:#0000FF;" align="center" width="40%"><strong>SOBRANTE POR DEPOSITO ENTREGADO</strong>	</th>
	</tr>
	<tr style="text-align: center; background-color: #ffff00;">
		<td style = "border-left: 0.5px solid Black; border-bottom: 0.5px solid Black" colspan="2"; >M.N. $ ENTREGADO DLLS $</td>
		<td style = "border-right: 0.5px solid Black; border-bottom: 0.5px solid Black" colspan="2";>M.N. $ POR ENTREGAR DLLS $</td>
		<td style = "border-bottom: 0.5px solid Black"><strong>M.N.</strong></td>
		<td style = "border-right: 0.5px solid Black; border-bottom: 0.5px solid Black"><strong>DLLS</strong></td>
	</tr>
	<tr style="text-align: center; background-color: #ffff00">
		<td style ="border: 0.5px solid black" width="15%"><strong> '.number_format(abs($diferenciaCR_Efe),2).' </strong></td>
		<td style ="border: 0.5px solid black" width="15%"><strong> 0.0 </strong></td>
		<td style ="border: 0.5px solid black" width="15%"><strong> '.number_format(abs($diferenciaCR_Efe2),2).' </strong></td>
		<td style ="border: 0.5px solid black" width="15%"><strong> 0.0 </strong></td>
		<td style ="border: 0.5px solid black" width="20%"><strong>'.number_format(($sobrante - $ingresoELU_PRE),2).'  </strong></td>
		<td style ="border: 0.5px solid black" width="20%"><strong>  </strong></td>
	</tr>
</table>
<table class = "estilo1" cellpadding="1" cellspacing="0">
	<tr align="center">
		<td width="15%"></td>
		<td width="10%" >(1)</td>
		<td width="2.5%" rowspan = "7"></td>
		<td width="10%" >(2)</td>
		<td width="2.5%" rowspan = "7"></td>
		<td style= "border-right: 0.5px solid Black" width="10%" >(3)</td>
		<td style= "border-right: 0.5px solid Black" width="10%" ></td>
		<td style= "border-right: 0.5px solid Black" width="20%" ><b>FOLIOS</b></td>
		<td width="20%" ><b>EVENTOS</b></td>
	</tr>
	<tr  align="right">
		<td  align="left">FOLIO INICIAL</td>
		<td style= "border-bottom: 0.5px solid Black">'.$fld_rollo[0][0] .'</td>
		<td style= "border-bottom: 0.5px solid Black">'.$fld_rollo[1][0] .'</td>
		<td style= "border-bottom: 0.5px solid Black; border-right: 0.5px solid Black">'.$fld_rollo[2][0] .'</td>
		<td style= "border-right: 0.5px solid Black">INICIAL</td>
		<td style= "border-bottom: 0.5px solid Black; border-right: 0.5px solid Black" ><b>'.$fld_folio_inicr.'</b></td>
		<td style= "border-bottom: 0.5px solid Black"><b>'.$sec_ini.'</b></td>
	</tr>
		<tr  align="right">
		<td  align="left">FOLIO FINAL</td>
		<td style= "border-bottom: 0.5px solid Black " >'.$fld_rollo[0][1] .' </td>
		<td style= "border-bottom: 0.5px solid Black">'.$fld_rollo[1][1] .'</td>
		<td style= "border-bottom: 0.5px solid Black; border-right: 0.5px solid Black">'.$fld_rollo[2][1] .'</td>
		<td style= "border-right: 0.5px solid Black">FINAL</td>
		<td style= "border-bottom: 0.5px solid Black; border-right: 0.5px solid Black"><b>'.$fld_folio_fincr.'</b></td>
		<td style= "border-bottom: 0.5px solid Black" align:"right"><b>'.$sec_fin.'</b></td>
	</tr>
		<tr  align="right">
		<td  align="left">FOLIO TOTALES</td>
		<td style= "border-bottom: 0.5px solid Black">'. $this->diferencia($fld_rollo[0][1],$fld_rollo[0][0]) .'</td>
		<td style= "border-bottom: 0.5px solid Black">'. $this->diferencia($fld_rollo[1][1],$fld_rollo[1][0]) .'</td>
		<td style= "border-bottom: 0.5px solid Black; border-right: 0.5px solid Black">'. $this->diferencia($fld_rollo[2][1],$fld_rollo[2][0]) .'</td>
		<td style= "border-right: 0.5px solid Black">TOTALES</td>
		<td style= "border-bottom: 0.5px solid Black; border-right: 0.5px solid Black"><b>'.$FoliosOriginal.'</b></td>
		<td style= "border-bottom: 0.5px solid Black"><b>'.$this->diferencia($sec_fin,$sec_ini).'</b></td>
	</tr>
	<tr  align="right">
		<td  align="left">FOLIO CANCELADOS</td>
		<td style= "solid Black"></td>
		<td style= "solid Black"></td>
		<td style= "border-bottom: 0.5px solid Black; border-right: 0.5px solid Black">'.($fld_ccant_mxn + $fld_ccant_usd).'</td>
		<td style= "border-right: 0.5px solid Black">CANCELADOS</td>
		<td style= "border-bottom: 0.5px solid Black; border-right: 0.5px solid Black"><b>'. ($fld_ccant_mxn + $fld_ccant_usd) .' </b></td>
		<td style= "border-bottom: 0.5px solid Black"><b></b></td>
	</tr>
	<tr align="right">
		<td></td>
		<td></td>
		<td></td>
		<td style= "border-right: 0.5px solid Black"></td>
		<td style= "border-right: 0.5px solid Black">REALES</td>
		<td style="border-bottom: 0.5px solid Black; border-right: 0.5px solid Black">'.($FoliosOriginal - ($fld_ccant_mxn + $fld_ccant_usd)) .'</td>
		<td style="border-bottom: 0.5px solid Black; border-right: 0.5px solid Black">'. $this->diferencia($sec_fin,$sec_ini).'</td>
		
	</tr>
	<tr align="right">
		<td  align="left">FOLIO NETOS</td>
		<td></td>
		<td></td>
		<td style= "border-right: 0.5px solid Black">'. ($this->diferencia($fld_rollo[0][1],$fld_rollo[0][0]) + ($fld_rollo[1][1] - $fld_rollo[1][0]) + $this->diferencia($fld_rollo[2][1],$fld_rollo[2][0]) - ($fld_ccant_mxn + $fld_ccant_usd)) .'</td>
		<td style= "border-right: 0.5px solid Black">CONTABILIZADO</td>
		<td style="background-color:#FFFF00; border-right: 0.5px solid Black"><b>'.($FoliosOriginal - ($fld_ccant_mxn + $fld_ccant_usd)).'</b></td>
		<td style="background-color:#FFFF00; border-right: 1px solid Black"><b>'.$this->diferencia($sec_fin,$sec_ini).'</b></td>
	</tr>
</table>
<table class = "estilo1" cellpadding="10" cellspacing="0">
	
	<tr style="background-color:#dfdfdf"; align="center"; valign="middle">
		<th width="50%" align="right"><b>CANTIDAD A DEPOSITAR M.N. $</b></th>
		<th width="20%" align="left"><b> '.number_format($depositar,2).' </b></th>
		<th width="10%" align="right"><b>DLLS $</b></th>
		<th width="20%" align="left"> 0.0 </th>
		
	</tr>
</table>
<table class = "estilo1" cellpadding="1" cellspacing="0">
	<tr>
	<td width="100%">LOS FIRMANTES ASUMEN LA RESPONSABILIDAD DE LOS VALORES QUE SE REGISTRAN EN ESTE REPORTE, SIENDO RESPONSABLES DE LOS FALTANTES QUE SE GENEREN EN LA CONCILIACIÓN DE LO COBRADO Y LO QUE REGISTRE EL EQUIPO, COMPROMETIÉNDOSE A PAGAR LOS FALTANTES EN ESE MOMENTO, DE ACUERDO AL DESLINDE DE RESPONSABILIDAD DE LOS PROCESOS. </td>
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
		<td width="25%" align="center">Entrega<br><br>'.$usuarioID.'<br>Cajero-Receptor<br>Firma</td>
		<td width="10%" align="right"></td>
		<td width="25%" align="center">Recibe<br><br>'.$encargado_t.'<br>Jefe de Turno<br>Firma</td>
		<td width="10%" align="right"></td>
		<td width="25%" align="center">Enterado<br><br> '.$administrador.' <br>Supervisor/Auxiliar Operativo<br>Firma</td>
		<td width="5%" align="right"></td>
	</tr>
	<tr>
		<td width="100%" ></td>
	</tr>
</table>
';

	
$tblpre =	array($tbl,$nombre_archivo);
return $tblpre;
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function ArmaCondicion(){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
$PagoEfectivo = " AND (";
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
	 $this->rs->MoveNext();
    }
    $this->rs->Close();
}
$PagoEfectivo = substr($PagoEfectivo,0,-4);
$PagoEfectivo .= ")";
return $PagoEfectivo;
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function Comparativo($identificador, $FechaOperacion){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
		$check_sql = "SELECT TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioInicialCR, FolioFinalCR, EncargadoTurnoID_Pre, FolioInicialEAP, FolioFinalEAP, OperacionID FROM detalleturno WHERE FolioCierre = '".$identificador."'";
 
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
	$turno =$this->rs[0][0];
	$caseta = $this->casetaid = $this->rs[0][1];
	$usuario =$this->rs[0][4];
	$carril =$this->rs[0][5];
	$hora_ini=$this->rs[0][8];
	$hora_fin=$this->rs[0][10];
	$folio_inicial = $this->rs[0][12];
    $folio_final = $this->rs[0][13];
	$encargado_t = $this->rs[0][14];
	$sec_ini = $this->rs[0][15];
	$sec_fin = $this->rs[0][16];
	$OperacionID = 	$this->rs[0][17];
		$wherePago="";
	$sql_where = " FechaOperacion = '$fecha_op' and TurnoID = $turno and CasetaID= $caseta and CarrilID = '$carril' and OperacionID = $OperacionID and (Secuencial BETWEEN $sec_ini and $sec_fin) ";
	$where_folio = "FechaOperacion = '$FechaOperacion' and FolioCierre = '$identificador'";
	
}
		else     
{

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
				$fila_a= $this->saca_aforo($tipospago, "Total" , $where_folio);
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
		$fila_a = $this->saca_aforo("PagoID = '".$this->rs->fields[1]."' AND", $this->rs->fields[1], $where_folio);
		$codigo_html .= $fila_a[0];
		$fila_efectivo = $this->rs->fields[2];
			if($this->rs->fields[2]==1){ 
				$codigo_html .= $fila_a[1];
			}
		$this->rs->MoveNext();
	}
	
    $this->rs->Close();
	$tipospago = substr($tipospago,0,-3);	
	$tipospago .= ")";
	$fila_a= $this->saca_aforo($tipospago, "Total" , $where_folio);
	$codigo_html .= $fila_a[0];
}

	
$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" > Total Marcado por Cajero-Receptor incluyendo vehículos sin pago </th></tr>';
$fila_a = $this->saca_aforo($wherePago,"",$where_folio);
$codigo_html .=  $fila_a[0];
$codigo_html .=  $fila_a[1];

$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" >Total Detectado por '.$modooperacion.' incluyendo vehículos sin pago </th></tr>';
$fila_aECT = $this->aforoECT("","",$where_folio, $this->casetaid);
$codigo_html .=  $fila_aECT[0];
$codigo_html .=  $fila_aECT[1];

$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" >Diferencia entre el Total Marcado por el C-R y el '.$modooperacion.' </th></tr>';
 $fila_a = $this->DiferenciaTotales($sql_where,$where_folio,$this->casetaid);
 $codigo_html .=  $fila_a[0];
 $codigo_html .=  $fila_a[1];

$check_sql = "SELECT VehiculoID, Importe, ImporteEjeLigero, ImporteEjePesado from tarifa 
WHERE CasetaID = '$caseta' and TipoPagoID = 'NOR' AND '$fecha_op' BETWEEN FechaInicio and FechaFin;";
 
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
		<th style="background-color:#FFFFFF";color:#0000FF; colspan="5" align="center"><b>REPORTE  PRELIMINAR DE AFORO E INGRESO POR CAJERO-RECEPTOR<br>Tránsito Vehicular</b>
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
		<th  style= "border-bottom: 0.5px solid Black" colspan="5" width="22.5%"></th>

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
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function DiferenciaTotales($sql_where,$where_folio,$casetaid){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
	$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;
 
      $nm_select = "SELECT ModoOperacion FROM casetas WHERE CasetaID = '$this->casetaid'"; 
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
		$modooperacion = $this->dataset[0][0];
	}	

$check_sql = "SELECT VehiculoID_CR, ClaseVehiculo_CR, SUBSTR(ClaseVehiculo_CR,1,1), SUBSTR(VehiculoID_CR,4,1), CantidadEje_CR,sum(CantidadVeh), SUM(Importe_CR), SUM(CantidadEje_CR), SUM(TarifaEE_CR), PagoID FROM aforo_preliq 
WHERE $where_folio 
GROUP BY VehiculoID_CR";

 
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
			
				$EEA = $EEA + ($this->rs->fields[7]);
				$EEA_i = $EEA_i+($this->rs->fields[8]);
			
			}
	
			
		$this->rs->MoveNext();
	}
    $this->rs->Close();
}	
	
	

$check_sql = "SELECT VehiculoID_ECT, ClaseVehiculo_ECT, SUBSTR(ClaseVehiculo_ECT,1,1), SUBSTR(VehiculoID_ECT,4,1), CantidadEje_ECT, sum(CantidadVeh), SUM(Importe_ECT), SUM(CantidadEje_ECT), SUM(TarifaEE_ECT),PagoID FROM aforo_ect 
WHERE $where_folio 
GROUP BY VehiculoID_ECT";
	
 
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
			$vAforo[$clase] -= $this->rs->fields[5];
			$vIngreso[$clase] -= $this->rs->fields[6];
			$EEA -= $this->rs->fields[7];
			$EEA_i -= ($this->rs->fields[8]);

		}elseif($this->rs->fields[2] =="C"){ 
				if($this->rs->fields[7]>0){
				$clase = "C9";
				$vAforo[$clase] -= $this->rs->fields[5];
				$vIngreso[$clase] -= $this->rs->fields[6];
				
					$EEC -= ($this->rs->fields[7]);
					$EEC_i -= ($this->rs->fields[8]);
					
				}else{
				$clase = $this->rs->fields[1];
				$vAforo[$clase] -= $this->rs->fields[5];
				$vIngreso[$clase] -= $this->rs->fields[6];
				
					$EEC -=  ($this->rs->fields[7]);
					$EEC_i -= ($this->rs->fields[8]);
					
				}
			
			}elseif($this->rs->fields[2] ==""){
				}else{
			$clase = $this->rs->fields[1];
			$vAforo[$clase] -= $this->rs->fields[5];
			$vIngreso[$clase] -= $this->rs->fields[6];
			
				$EEA -= ($this->rs->fields[7]);
				$EEA_i -= ($this->rs->fields[8]);
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
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function aforoECT($pago, $titulo, $sql_where, $casetaid){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
	$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;
 
      $nm_select = "SELECT ModoOperacion FROM casetas WHERE CasetaID = '$this->casetaid'"; 
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
		$modooperacion = $this->dataset[0][0];
	}	


$check_sql = "SELECT VehiculoID_ECT, ClaseVehiculo_ECT, SUBSTR(ClaseVehiculo_ECT,1,1), SUBSTR(VehiculoID_ECT,4,1), CantidadEje_ECT,sum(CantidadVeh), SUM(Importe_ECT), SUM(CantidadEje_ECT), SUM(TarifaEE_ECT), PagoID FROM aforo_ect 
WHERE $pago $sql_where
GROUP BY VehiculoID_ECT";
 
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
					
		}elseif($this->rs->fields[2] ==""){
					}
			else{
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
			
				$EEA = $EEA + ($this->rs->fields[7]);
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
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function crea_tr($array_fuente, $titulo){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
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
	
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function diferencia($fin, $ini){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
	if($fin == 0 && $ini ==0){
	$diferencia = 0;
	}else{
	$diferencia = $fin - $ini + 1;
}
return $diferencia;

$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function saca_aforo($pago, $titulo, $sql_where)	{
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
	$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;


$check_sql = "SELECT VehiculoID_CR, ClaseVehiculo_CR, SUBSTR(ClaseVehiculo_CR,1,1), SUBSTR(VehiculoID_CR,4,1), CantidadEje_CR,sum(CantidadVeh), SUM(Importe_CR), SUM(CantidadEje_CR), SUM(TarifaEE_CR), PagoID FROM aforo_preliq 
WHERE $pago $sql_where
GROUP BY VehiculoID_CR";

 
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
			$EEA = $EEA + $this->rs->fields[7];
			$EEA_i = $EEA_i + ($this->rs->fields[8]);
			
		}elseif($this->rs->fields[2] =="C"){ 
				if($this->rs->fields[7]>0){
				$clase = "C9";
				$vAforo[$clase] += $this->rs->fields[5];
				$vIngreso[$clase] += $this->rs->fields[6];
				
					$EEC = $EEC + $this->rs->fields[7];
					$EEC_i = $EEC_i+ ($this->rs->fields[8]);
					
				}else{
				$clase = $this->rs->fields[1];
				$vAforo[$clase] += $this->rs->fields[5];
				$vIngreso[$clase] += $this->rs->fields[6];
				
					$EEC = $EEC + $this->rs->fields[7];
					$EEC_i = $EEC_i + ($this->rs->fields[8]);
					
				}
			
			}elseif($this->rs->fields[2] ==""){
			}else{
			$clase = $this->rs->fields[1]; 
			$vAforo[$clase] += $this->rs->fields[5];
			$vIngreso[$clase] += $this->rs->fields[6];
			
				$EEA = $EEA + $this->rs->fields[7];
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
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
}

?>
