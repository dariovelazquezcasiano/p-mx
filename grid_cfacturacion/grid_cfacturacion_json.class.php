<?php

class grid_cfacturacion_json
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

   function __construct()
   {
      $this->nm_data = new nm_data("es");
   }

   function monta_json()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Json_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $result_json = json_encode($this->Arr_result, JSON_UNESCAPED_UNICODE);
              if ($result_json == false)
              {
                  $oJson = new Services_JSON();
                  $result_json = $oJson->encode($this->Arr_result);
              }
              echo $result_json;
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['opcao'] = "";
      }
   }

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
                   nm_limpa_str_grid_cfacturacion($cadapar[1]);
                   nm_protect_num_grid_cfacturacion($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_cfacturacion']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Json_use_label = false;
      $this->Json_format = false;
      $this->Tem_json_res = false;
      $this->Json_password = "";
      if (isset($_REQUEST['nm_json_label']) && !empty($_REQUEST['nm_json_label']))
      {
          $this->Json_use_label = ($_REQUEST['nm_json_label'] == "S") ? true : false;
      }
      if (isset($_REQUEST['nm_json_format']) && !empty($_REQUEST['nm_json_format']))
      {
          $this->Json_format = ($_REQUEST['nm_json_format'] == "S") ? true : false;
      }
      $this->Tem_json_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_json_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_cfacturacion/grid_cfacturacion_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_cfacturacion']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_return']);
          if ($this->Tem_json_res) {
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
      $this->nm_data = new nm_data("es");
      $this->Arquivo      = "sc_json";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_grid_cfacturacion.zip";
      $this->Arquivo     .= "_grid_cfacturacion";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "grid_cfacturacion.json";
      $this->Tit_zip      = "grid_cfacturacion.zip";
   }

   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cfacturacion']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cfacturacion']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cfacturacion']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['campos_busca'];
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
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT LPAD(CasetaID,3,'0') as casetaid0, CasetaID, CONCAT(LPAD(CasetaID,2,'0'),LPAD(CarrilID,2,'0')) as cascar, LPAD(TurnoID,2,'0') as turnoid, TramoID, str_replace (convert(char(10),HoraEvento,102), '.', '-') + ' ' + convert(char(8),HoraEvento,20), LPAD(Secuencial,9,'0') as secuencial, LPAD(Folio,9,'0') as folio, LPAD(VehiculoID_CR,6,'0') as vehiculoid_cr0, SUBSTR(ClaseVehiculo_CR,1,1) as clasecr, PagoID, LPAD(UsuarioID,6,'0') as usuarioid0, NumeroTarjeta, SUBSTR(ClaseVehiculo_ANA,1,1) as claseana, VehiculoID_CR, PagoID_ANA, VehiculoID_ANA, VehiculoID_EAP, CantidadEje_ANA, UsuarioID, Importe_CR, TarifaEE_CR, TarifaEE_ANA, Importe_ANA from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT LPAD(CasetaID,3,'0') as casetaid0, CasetaID, CONCAT(LPAD(CasetaID,2,'0'),LPAD(CarrilID,2,'0')) as cascar, LPAD(TurnoID,2,'0') as turnoid, TramoID, HoraEvento, LPAD(Secuencial,9,'0') as secuencial, LPAD(Folio,9,'0') as folio, LPAD(VehiculoID_CR,6,'0') as vehiculoid_cr0, SUBSTR(ClaseVehiculo_CR,1,1) as clasecr, PagoID, LPAD(UsuarioID,6,'0') as usuarioid0, NumeroTarjeta, SUBSTR(ClaseVehiculo_ANA,1,1) as claseana, VehiculoID_CR, PagoID_ANA, VehiculoID_ANA, VehiculoID_EAP, CantidadEje_ANA, UsuarioID, Importe_CR, TarifaEE_CR, TarifaEE_ANA, Importe_ANA from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT LPAD(CasetaID,3,'0') as casetaid0, CasetaID, CONCAT(LPAD(CasetaID,2,'0'),LPAD(CarrilID,2,'0')) as cascar, LPAD(TurnoID,2,'0') as turnoid, TramoID, convert(char(23),HoraEvento,121), LPAD(Secuencial,9,'0') as secuencial, LPAD(Folio,9,'0') as folio, LPAD(VehiculoID_CR,6,'0') as vehiculoid_cr0, SUBSTR(ClaseVehiculo_CR,1,1) as clasecr, PagoID, LPAD(UsuarioID,6,'0') as usuarioid0, NumeroTarjeta, SUBSTR(ClaseVehiculo_ANA,1,1) as claseana, VehiculoID_CR, PagoID_ANA, VehiculoID_ANA, VehiculoID_EAP, CantidadEje_ANA, UsuarioID, Importe_CR, TarifaEE_CR, TarifaEE_ANA, Importe_ANA from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT LPAD(CasetaID,3,'0') as casetaid0, CasetaID, CONCAT(LPAD(CasetaID,2,'0'),LPAD(CarrilID,2,'0')) as cascar, LPAD(TurnoID,2,'0') as turnoid, TramoID, HoraEvento, LPAD(Secuencial,9,'0') as secuencial, LPAD(Folio,9,'0') as folio, LPAD(VehiculoID_CR,6,'0') as vehiculoid_cr0, SUBSTR(ClaseVehiculo_CR,1,1) as clasecr, PagoID, LPAD(UsuarioID,6,'0') as usuarioid0, NumeroTarjeta, SUBSTR(ClaseVehiculo_ANA,1,1) as claseana, VehiculoID_CR, PagoID_ANA, VehiculoID_ANA, VehiculoID_EAP, CantidadEje_ANA, UsuarioID, Importe_CR, TarifaEE_CR, TarifaEE_ANA, Importe_ANA from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT LPAD(CasetaID,3,'0') as casetaid0, CasetaID, CONCAT(LPAD(CasetaID,2,'0'),LPAD(CarrilID,2,'0')) as cascar, LPAD(TurnoID,2,'0') as turnoid, TramoID, HoraEvento, LPAD(Secuencial,9,'0') as secuencial, LPAD(Folio,9,'0') as folio, LPAD(VehiculoID_CR,6,'0') as vehiculoid_cr0, SUBSTR(ClaseVehiculo_CR,1,1) as clasecr, PagoID, LPAD(UsuarioID,6,'0') as usuarioid0, NumeroTarjeta, SUBSTR(ClaseVehiculo_ANA,1,1) as claseana, VehiculoID_CR, PagoID_ANA, VehiculoID_ANA, VehiculoID_EAP, CantidadEje_ANA, UsuarioID, Importe_CR, TarifaEE_CR, TarifaEE_ANA, Importe_ANA from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT LPAD(CasetaID,3,'0') as casetaid0, CasetaID, CONCAT(LPAD(CasetaID,2,'0'),LPAD(CarrilID,2,'0')) as cascar, LPAD(TurnoID,2,'0') as turnoid, TramoID, HoraEvento, LPAD(Secuencial,9,'0') as secuencial, LPAD(Folio,9,'0') as folio, LPAD(VehiculoID_CR,6,'0') as vehiculoid_cr0, SUBSTR(ClaseVehiculo_CR,1,1) as clasecr, PagoID, LPAD(UsuarioID,6,'0') as usuarioid0, NumeroTarjeta, SUBSTR(ClaseVehiculo_ANA,1,1) as claseana, VehiculoID_CR, PagoID_ANA, VehiculoID_ANA, VehiculoID_EAP, CantidadEje_ANA, UsuarioID, Importe_CR, TarifaEE_CR, TarifaEE_ANA, Importe_ANA from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['where_pesq'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['SC_Ind_Groupby'] == "sc_free_total") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['SC_Ind_Groupby'] == "sc_free_total") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_quebra']))  
          { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_quebra'] = array(); 
          } 
      }
      $nmgp_order_by = ""; 
      $campos_order_select = "";
      foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_select'] as $campo => $ordem) 
      {
           if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_grid']) 
           {
              if (!empty($campos_order_select)) 
              {
                  $campos_order_select .= ", ";
              }
              $campos_order_select .= $campo . " " . $ordem;
           }
      }
      $campos_order = "";
      foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_quebra'] as $campo => $resto) 
      {
          foreach($resto as $sqldef => $ordem) 
          {
              $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['SC_Ind_Groupby'], $campo);
              $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
          }
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_grid'])) 
      { 
          if (!empty($campos_order)) 
          { 
              $campos_order .= ", ";
          } 
          $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['ordem_desc']; 
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
      if (substr(trim($nmgp_order_by), -1) == ",")
      {
          $nmgp_order_by = " " . substr(trim($nmgp_order_by), 0, -1);
      }
      if (trim($nmgp_order_by) == "order by")
      {
          $nmgp_order_by = "";
      }
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
      $this->json_registro = array();
      $this->SC_seq_json   = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->casetaid0 = $rs->fields[0] ;  
         $this->casetaid = $rs->fields[1] ;  
         $this->cascar = $rs->fields[2] ;  
         $this->turnoid = $rs->fields[3] ;  
         $this->tramoid = $rs->fields[4] ;  
         $this->tramoid = (string)$this->tramoid;
         $this->horaevento = $rs->fields[5] ;  
         $this->secuencial = $rs->fields[6] ;  
         $this->folio = $rs->fields[7] ;  
         $this->vehiculoid_cr0 = $rs->fields[8] ;  
         $this->clasecr = $rs->fields[9] ;  
         $this->pagoid = $rs->fields[10] ;  
         $this->usuarioid0 = $rs->fields[11] ;  
         $this->numerotarjeta = $rs->fields[12] ;  
         $this->claseana = $rs->fields[13] ;  
         $this->vehiculoid_cr = $rs->fields[14] ;  
         $this->pagoid_ana = $rs->fields[15] ;  
         $this->vehiculoid_ana = $rs->fields[16] ;  
         $this->vehiculoid_eap = $rs->fields[17] ;  
         $this->cantidadeje_ana = $rs->fields[18] ;  
         $this->cantidadeje_ana = (string)$this->cantidadeje_ana;
         $this->usuarioid = $rs->fields[19] ;  
         $this->usuarioid = (string)$this->usuarioid;
         $this->importe_cr = $rs->fields[20] ;  
         $this->importe_cr =  str_replace(",", ".", $this->importe_cr);
         $this->importe_cr = (string)$this->importe_cr;
         $this->tarifaee_cr = $rs->fields[21] ;  
         $this->tarifaee_cr =  str_replace(",", ".", $this->tarifaee_cr);
         $this->tarifaee_cr = (string)$this->tarifaee_cr;
         $this->tarifaee_ana = $rs->fields[22] ;  
         $this->tarifaee_ana =  str_replace(",", ".", $this->tarifaee_ana);
         $this->tarifaee_ana = (string)$this->tarifaee_ana;
         $this->importe_ana = $rs->fields[23] ;  
         $this->importe_ana =  str_replace(",", ".", $this->importe_ana);
         $this->importe_ana = (string)$this->importe_ana;
         //----- lookup - casetaid
         $this->look_casetaid = $this->casetaid; 
         $this->Lookup->lookup_casetaid($this->look_casetaid, $this->casetaid) ; 
         $this->look_casetaid = ($this->look_casetaid == "&nbsp;") ? "" : $this->look_casetaid; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_cfacturacion']['contr_erro'] = 'on';
 if ($this->cantidadeje_ana  <> 0){
	$this->tipo = substr($this->vehiculoid_ana ,3,1);
}
else{
	$this->tipo ="";
}
$sql_usuarios="SELECT Nombre,ApellidoPaterno,ApellidoMAterno FROM usuario WHERE UsuarioID = ".$this->usuarioid ;
 
      $nm_select = $sql_usuarios; 
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
		$this->nom_empleado  = str_pad($this->rs[0][0]." ".$this->rs[0][1]." ".$this->rs[0][2],60,"0",STR_PAD_LEFT);	
 }else{
		$this->nom_empleado  = "000000000000000000000000000000000000000000No Existe Empleado";
		}
if($this->tipo =="L" || $this->tipo =="P"){
$this->vehiculoid_cr0  = str_pad(substr($this->vehiculoid_cr ,0,-1),6,"0",STR_PAD_LEFT);
$this->vehiculoid_cr  = substr($this->vehiculoid_cr ,0,-1);
$this->vehiculoid_ana  = substr($this->vehiculoid_ana ,0,-1);
$this->vehiculoid_eap  = substr($this->vehiculoid_eap ,0,-1);
}else{
$this->vehiculoid_cr0  = str_pad(substr($this->vehiculoid_cr ,0,3),6,"0",STR_PAD_LEFT);
$this->vehiculoid_cr  = substr($this->vehiculoid_cr ,0,3);
$this->vehiculoid_ana  = substr($this->vehiculoid_ana ,0,3);
$this->vehiculoid_eap  = substr($this->vehiculoid_eap ,0,3);
	}


if($_SESSION["fld_caseta"]==0){
	if($this->clasecr =="A" || $this->clasecr =="M"){
		$ImporteCR0= str_pad($this->importe_cr  + $this->tarifaee_cr ,13,"0",STR_PAD_LEFT).".00";
		$ImporteANA0= str_pad($this->importe_ana  + $this->tarifaee_ana ,13,"0",STR_PAD_LEFT).".00";

	}else{
		$ImporteCR0= str_pad($this->importe_cr  + $this->tarifaee_cr ,13,"0",STR_PAD_LEFT).".00";
		$ImporteANA0= str_pad($this->importe_ana  + $this->tarifaee_ana ,13,"0",STR_PAD_LEFT).".00";	
		}
	
	}else{
$ImporteCR0 = str_pad($this->importe_cr  + $this->tarifaee_cr ,13,"0",STR_PAD_LEFT).".00";
$ImporteANA0= str_pad($this->importe_ana  + $this->tarifaee_ana ,13,"0",STR_PAD_LEFT).".00";
}
if($this->pagoid =="TAG"){
	$this->importecr_tag  = $ImporteCR0;
	$importecr  = '0000000000000.00';
}else{
	$this->importecr0  = $ImporteCR0;
	$this->importecr_tag  = '0000000000000.00';
	}

$this->importeana0  = $ImporteANA0;
$_SESSION['scriptcase']['grid_cfacturacion']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->SC_seq_json++;
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['embutida'])
      { 
          $_SESSION['scriptcase']['export_return'] = $this->json_registro;
      }
      else
      { 
          $result_json = json_encode($this->json_registro, JSON_UNESCAPED_UNICODE);
          if ($result_json == false)
          {
              $oJson = new Services_JSON();
              $result_json = $oJson->encode($this->json_registro);
          }
          fwrite($json_f, $result_json);
          fclose($json_f);
          if ($this->Tem_json_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "grid_cfacturacion_res_json.class.php");
              $this->Res = new grid_cfacturacion_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_res_grid'] = true;
              $this->Res->monta_json();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Json_password != "" || $this->Tem_json_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Json_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Json_f, ' ')) ? " \"" . $this->Json_f . "\"" :  $this->Json_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
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
              $this->Json_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_json_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_res_file']['json'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- casetaid0
   function NM_export_casetaid0()
   {
         $this->casetaid0 = NM_charset_to_utf8($this->casetaid0);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['casetaid0'])) ? $this->New_label['casetaid0'] : "Caseta"; 
         }
         else
         {
             $SC_Label = "casetaid0"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->casetaid0;
   }
   //----- casetaid
   function NM_export_casetaid()
   {
         $this->look_casetaid = NM_charset_to_utf8($this->look_casetaid);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['casetaid'])) ? $this->New_label['casetaid'] : "Nombre Caseta"; 
         }
         else
         {
             $SC_Label = "casetaid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_casetaid;
   }
   //----- cascar
   function NM_export_cascar()
   {
         $this->cascar = NM_charset_to_utf8($this->cascar);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cascar'])) ? $this->New_label['cascar'] : "Carril"; 
         }
         else
         {
             $SC_Label = "cascar"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cascar;
   }
   //----- turnoid
   function NM_export_turnoid()
   {
         $this->turnoid = NM_charset_to_utf8($this->turnoid);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['turnoid'])) ? $this->New_label['turnoid'] : "Turno"; 
         }
         else
         {
             $SC_Label = "turnoid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->turnoid;
   }
   //----- tramoid
   function NM_export_tramoid()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tramoid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tramoid'])) ? $this->New_label['tramoid'] : "Tramo"; 
         }
         else
         {
             $SC_Label = "tramoid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tramoid;
   }
   //----- horaevento
   function NM_export_horaevento()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->horaevento;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->horaevento, "HH:II:SS  ");
                 $this->horaevento = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['horaevento'])) ? $this->New_label['horaevento'] : "Hora Evento"; 
         }
         else
         {
             $SC_Label = "horaevento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->horaevento;
   }
   //----- secuencial
   function NM_export_secuencial()
   {
         $this->secuencial = NM_charset_to_utf8($this->secuencial);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['secuencial'])) ? $this->New_label['secuencial'] : "Secuencial"; 
         }
         else
         {
             $SC_Label = "secuencial"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->secuencial;
   }
   //----- folio
   function NM_export_folio()
   {
         $this->folio = NM_charset_to_utf8($this->folio);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['folio'])) ? $this->New_label['folio'] : "Folio"; 
         }
         else
         {
             $SC_Label = "folio"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->folio;
   }
   //----- vehiculoid_cr0
   function NM_export_vehiculoid_cr0()
   {
         $this->vehiculoid_cr0 = NM_charset_to_utf8($this->vehiculoid_cr0);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['vehiculoid_cr0'])) ? $this->New_label['vehiculoid_cr0'] : "Vehiculo"; 
         }
         else
         {
             $SC_Label = "vehiculoid_cr0"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->vehiculoid_cr0;
   }
   //----- clasecr
   function NM_export_clasecr()
   {
         $this->clasecr = NM_charset_to_utf8($this->clasecr);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['clasecr'])) ? $this->New_label['clasecr'] : "Clase"; 
         }
         else
         {
             $SC_Label = "clasecr"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->clasecr;
   }
   //----- pagoid
   function NM_export_pagoid()
   {
         $this->pagoid = NM_charset_to_utf8($this->pagoid);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pagoid'])) ? $this->New_label['pagoid'] : "Tipo Pago"; 
         }
         else
         {
             $SC_Label = "pagoid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pagoid;
   }
   //----- usuarioid0
   function NM_export_usuarioid0()
   {
         $this->usuarioid0 = NM_charset_to_utf8($this->usuarioid0);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['usuarioid0'])) ? $this->New_label['usuarioid0'] : "Usuario"; 
         }
         else
         {
             $SC_Label = "usuarioid0"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->usuarioid0;
   }
   //----- nom_empleado
   function NM_export_nom_empleado()
   {
         $this->nom_empleado = NM_charset_to_utf8($this->nom_empleado);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nom_empleado'])) ? $this->New_label['nom_empleado'] : "nom_empleado"; 
         }
         else
         {
             $SC_Label = "nom_empleado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nom_empleado;
   }
   //----- numerotarjeta
   function NM_export_numerotarjeta()
   {
         $this->numerotarjeta = NM_charset_to_utf8($this->numerotarjeta);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['numerotarjeta'])) ? $this->New_label['numerotarjeta'] : "Numero Tarjeta"; 
         }
         else
         {
             $SC_Label = "numerotarjeta"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->numerotarjeta;
   }
   //----- importecr0
   function NM_export_importecr0()
   {
         $this->importecr0 = NM_charset_to_utf8($this->importecr0);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['importecr0'])) ? $this->New_label['importecr0'] : "ImporteCR0"; 
         }
         else
         {
             $SC_Label = "importecr0"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->importecr0;
   }
   //----- importecr_tag
   function NM_export_importecr_tag()
   {
         $this->importecr_tag = NM_charset_to_utf8($this->importecr_tag);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['importecr_tag'])) ? $this->New_label['importecr_tag'] : "Importe CR Tag"; 
         }
         else
         {
             $SC_Label = "importecr_tag"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->importecr_tag;
   }
   //----- claseana
   function NM_export_claseana()
   {
         $this->claseana = NM_charset_to_utf8($this->claseana);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['claseana'])) ? $this->New_label['claseana'] : "Clase ANA"; 
         }
         else
         {
             $SC_Label = "claseana"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->claseana;
   }
   //----- vehiculoid_cr
   function NM_export_vehiculoid_cr()
   {
         $this->vehiculoid_cr = NM_charset_to_utf8($this->vehiculoid_cr);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['vehiculoid_cr'])) ? $this->New_label['vehiculoid_cr'] : "Vehiculo CR"; 
         }
         else
         {
             $SC_Label = "vehiculoid_cr"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->vehiculoid_cr;
   }
   //----- pagoid_ana
   function NM_export_pagoid_ana()
   {
         $this->pagoid_ana = NM_charset_to_utf8($this->pagoid_ana);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pagoid_ana'])) ? $this->New_label['pagoid_ana'] : "Pago ANA"; 
         }
         else
         {
             $SC_Label = "pagoid_ana"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pagoid_ana;
   }
   //----- vehiculoid_ana
   function NM_export_vehiculoid_ana()
   {
         $this->vehiculoid_ana = NM_charset_to_utf8($this->vehiculoid_ana);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['vehiculoid_ana'])) ? $this->New_label['vehiculoid_ana'] : "Vehiculo ANA"; 
         }
         else
         {
             $SC_Label = "vehiculoid_ana"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->vehiculoid_ana;
   }
   //----- vehiculoid_eap
   function NM_export_vehiculoid_eap()
   {
         $this->vehiculoid_eap = NM_charset_to_utf8($this->vehiculoid_eap);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['vehiculoid_eap'])) ? $this->New_label['vehiculoid_eap'] : "Vehiculo EAP"; 
         }
         else
         {
             $SC_Label = "vehiculoid_eap"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->vehiculoid_eap;
   }
   //----- tipo
   function NM_export_tipo()
   {
         $this->tipo = NM_charset_to_utf8($this->tipo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
         }
         else
         {
             $SC_Label = "tipo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tipo;
   }
   //----- cantidadeje_ana
   function NM_export_cantidadeje_ana()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->cantidadeje_ana, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cantidadeje_ana'])) ? $this->New_label['cantidadeje_ana'] : "Cantidad Eje"; 
         }
         else
         {
             $SC_Label = "cantidadeje_ana"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cantidadeje_ana;
   }
   //----- importeana0
   function NM_export_importeana0()
   {
         $this->importeana0 = NM_charset_to_utf8($this->importeana0);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['importeana0'])) ? $this->New_label['importeana0'] : "ImporteANA0"; 
         }
         else
         {
             $SC_Label = "importeana0"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->importeana0;
   }
   //----- usuarioid
   function NM_export_usuarioid()
   {
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['usuarioid'])) ? $this->New_label['usuarioid'] : "Nombre Usuario"; 
         }
         else
         {
             $SC_Label = "usuarioid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->usuarioid;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> aforo :: JSON</TITLE>
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
   <td class="scExportTitle" style="height: 25px">JSON</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
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
<form name="Fdown" method="get" action="grid_cfacturacion_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cfacturacion"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cfacturacion']['json_return']); ?>"> 
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
