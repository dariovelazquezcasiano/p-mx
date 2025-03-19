<?php

class grid_aforo_xml
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['opcao'] = "";
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
                   nm_limpa_str_grid_aforo($cadapar[1]);
                   nm_protect_num_grid_aforo($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_aforo']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (!isset($VideoIP) && isset($videoip)) 
      {
         $VideoIP = $videoip;
      }
      if (isset($VideoIP)) 
      {
          $_SESSION['VideoIP'] = $VideoIP;
          nm_limpa_str_grid_aforo($_SESSION["VideoIP"]);
      }
      if (!isset($ModoImagen) && isset($modoimagen)) 
      {
         $ModoImagen = $modoimagen;
      }
      if (isset($ModoImagen)) 
      {
          $_SESSION['ModoImagen'] = $ModoImagen;
          nm_limpa_str_grid_aforo($_SESSION["ModoImagen"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = true;
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_aforo/grid_aforo_res_xml.class.php"))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_aforo_total.class.php"); 
      $this->Tot      = new grid_aforo_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['tot_geral'][1];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_aforo']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_grid_aforo.zip";
      $this->Arquivo     .= "_grid_aforo";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_aforo.xml";
      $this->Tit_zip      = "grid_aforo.zip";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_aforo']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_aforo']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_aforo']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'];
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
          $this->horaevento = (isset($Busca_temp['horaevento'])) ? $Busca_temp['horaevento'] : ""; 
          $tmp_pos = (is_string($this->horaevento)) ? strpos($this->horaevento, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->horaevento))
          {
              $this->horaevento = substr($this->horaevento, 0, $tmp_pos);
          }
          $this->horaevento_2 = (isset($Busca_temp['horaevento_input_2'])) ? $Busca_temp['horaevento_input_2'] : ""; 
          $this->turnoid = (isset($Busca_temp['turnoid'])) ? $Busca_temp['turnoid'] : ""; 
          $tmp_pos = (is_string($this->turnoid)) ? strpos($this->turnoid, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->turnoid))
          {
              $this->turnoid = substr($this->turnoid, 0, $tmp_pos);
          }
          $this->carrilid = (isset($Busca_temp['carrilid'])) ? $Busca_temp['carrilid'] : ""; 
          $tmp_pos = (is_string($this->carrilid)) ? strpos($this->carrilid, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->carrilid))
          {
              $this->carrilid = substr($this->carrilid, 0, $tmp_pos);
          }
          $this->cuerpo = (isset($Busca_temp['cuerpo'])) ? $Busca_temp['cuerpo'] : ""; 
          $tmp_pos = (is_string($this->cuerpo)) ? strpos($this->cuerpo, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->cuerpo))
          {
              $this->cuerpo = substr($this->cuerpo, 0, $tmp_pos);
          }
          $this->pagoid_ana = (isset($Busca_temp['pagoid_ana'])) ? $Busca_temp['pagoid_ana'] : ""; 
          $tmp_pos = (is_string($this->pagoid_ana)) ? strpos($this->pagoid_ana, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->pagoid_ana))
          {
              $this->pagoid_ana = substr($this->pagoid_ana, 0, $tmp_pos);
          }
          $this->vehiculoid_ana = (isset($Busca_temp['vehiculoid_ana'])) ? $Busca_temp['vehiculoid_ana'] : ""; 
          $tmp_pos = (is_string($this->vehiculoid_ana)) ? strpos($this->vehiculoid_ana, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->vehiculoid_ana))
          {
              $this->vehiculoid_ana = substr($this->vehiculoid_ana, 0, $tmp_pos);
          }
          $this->operadortlp = (isset($Busca_temp['operadortlp'])) ? $Busca_temp['operadortlp'] : ""; 
          $tmp_pos = (is_string($this->operadortlp)) ? strpos($this->operadortlp, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->operadortlp))
          {
              $this->operadortlp = substr($this->operadortlp, 0, $tmp_pos);
          }
          $this->usuarioid = (isset($Busca_temp['usuarioid'])) ? $Busca_temp['usuarioid'] : ""; 
          $tmp_pos = (is_string($this->usuarioid)) ? strpos($this->usuarioid, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->usuarioid))
          {
              $this->usuarioid = substr($this->usuarioid, 0, $tmp_pos);
          }
          $this->excentoid = (isset($Busca_temp['excentoid'])) ? $Busca_temp['excentoid'] : ""; 
          $tmp_pos = (is_string($this->excentoid)) ? strpos($this->excentoid, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->excentoid))
          {
              $this->excentoid = substr($this->excentoid, 0, $tmp_pos);
          }
          $this->fld_ar_sct = (isset($Busca_temp['fld_ar_sct'])) ? $Busca_temp['fld_ar_sct'] : ""; 
          $tmp_pos = (is_string($this->fld_ar_sct)) ? strpos($this->fld_ar_sct, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->fld_ar_sct))
          {
              $this->fld_ar_sct = substr($this->fld_ar_sct, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida'])
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
          $nmgp_select = "SELECT CasetaID, str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20), str_replace (convert(char(10),HoraEvento,102), '.', '-') + ' ' + convert(char(8),HoraEvento,20), TurnoID, CarrilID, Cuerpo, UsuarioID, Secuencial, Folio, VehiculoID_ECT, VehiculoID_CR, VehiculoID_EAP, PagoID_ANA, ExcentoID, Placas, NumeroTarjeta, VehiculoID_ANA, CantidadEje_ANA, Importe_ANA, TarifaEE_ANA, TipoTLP, OperadorTLP, Cancelado, PagoID, CategoriaTLP, str_replace (convert(char(10),FechaTurno,102), '.', '-') + ' ' + convert(char(8),FechaTurno,20), ClaseVehiculo_ANA, NombreImagen, Consecutivo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT CasetaID, FechaOperacion, HoraEvento, TurnoID, CarrilID, Cuerpo, UsuarioID, Secuencial, Folio, VehiculoID_ECT, VehiculoID_CR, VehiculoID_EAP, PagoID_ANA, ExcentoID, Placas, NumeroTarjeta, VehiculoID_ANA, CantidadEje_ANA, Importe_ANA, TarifaEE_ANA, TipoTLP, OperadorTLP, Cancelado, PagoID, CategoriaTLP, FechaTurno, ClaseVehiculo_ANA, NombreImagen, Consecutivo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT CasetaID, convert(char(23),FechaOperacion,121), convert(char(23),HoraEvento,121), TurnoID, CarrilID, Cuerpo, UsuarioID, Secuencial, Folio, VehiculoID_ECT, VehiculoID_CR, VehiculoID_EAP, PagoID_ANA, ExcentoID, Placas, NumeroTarjeta, VehiculoID_ANA, CantidadEje_ANA, Importe_ANA, TarifaEE_ANA, TipoTLP, OperadorTLP, Cancelado, PagoID, CategoriaTLP, convert(char(23),FechaTurno,121), ClaseVehiculo_ANA, NombreImagen, Consecutivo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT CasetaID, FechaOperacion, HoraEvento, TurnoID, CarrilID, Cuerpo, UsuarioID, Secuencial, Folio, VehiculoID_ECT, VehiculoID_CR, VehiculoID_EAP, PagoID_ANA, ExcentoID, Placas, NumeroTarjeta, VehiculoID_ANA, CantidadEje_ANA, Importe_ANA, TarifaEE_ANA, TipoTLP, OperadorTLP, Cancelado, PagoID, CategoriaTLP, FechaTurno, ClaseVehiculo_ANA, NombreImagen, Consecutivo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT CasetaID, EXTEND(FechaOperacion, YEAR TO DAY), HoraEvento, TurnoID, CarrilID, Cuerpo, UsuarioID, Secuencial, Folio, VehiculoID_ECT, VehiculoID_CR, VehiculoID_EAP, PagoID_ANA, ExcentoID, Placas, NumeroTarjeta, VehiculoID_ANA, CantidadEje_ANA, Importe_ANA, TarifaEE_ANA, TipoTLP, OperadorTLP, Cancelado, PagoID, CategoriaTLP, EXTEND(FechaTurno, YEAR TO DAY), ClaseVehiculo_ANA, NombreImagen, Consecutivo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT CasetaID, FechaOperacion, HoraEvento, TurnoID, CarrilID, Cuerpo, UsuarioID, Secuencial, Folio, VehiculoID_ECT, VehiculoID_CR, VehiculoID_EAP, PagoID_ANA, ExcentoID, Placas, NumeroTarjeta, VehiculoID_ANA, CantidadEje_ANA, Importe_ANA, TarifaEE_ANA, TipoTLP, OperadorTLP, Cancelado, PagoID, CategoriaTLP, FechaTurno, ClaseVehiculo_ANA, NombreImagen, Consecutivo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<grid_aforo>\r\n";
         }
         else
         {
             $this->xml_registro = "<grid_aforo";
         }
         $this->casetaid = $rs->fields[0] ;  
         $this->fechaoperacion = $rs->fields[1] ;  
         $this->horaevento = $rs->fields[2] ;  
         $this->turnoid = $rs->fields[3] ;  
         $this->turnoid = (string)$this->turnoid;
         $this->carrilid = $rs->fields[4] ;  
         $this->carrilid = (string)$this->carrilid;
         $this->cuerpo = $rs->fields[5] ;  
         $this->usuarioid = $rs->fields[6] ;  
         $this->usuarioid = (string)$this->usuarioid;
         $this->secuencial = $rs->fields[7] ;  
         $this->secuencial = (string)$this->secuencial;
         $this->folio = $rs->fields[8] ;  
         $this->folio = (string)$this->folio;
         $this->vehiculoid_ect = $rs->fields[9] ;  
         $this->vehiculoid_cr = $rs->fields[10] ;  
         $this->vehiculoid_eap = $rs->fields[11] ;  
         $this->pagoid_ana = $rs->fields[12] ;  
         $this->excentoid = $rs->fields[13] ;  
         $this->excentoid = (string)$this->excentoid;
         $this->placas = $rs->fields[14] ;  
         $this->numerotarjeta = $rs->fields[15] ;  
         $this->vehiculoid_ana = $rs->fields[16] ;  
         $this->cantidadeje_ana = $rs->fields[17] ;  
         $this->cantidadeje_ana = (string)$this->cantidadeje_ana;
         $this->importe_ana = $rs->fields[18] ;  
         $this->importe_ana =  str_replace(",", ".", $this->importe_ana);
         $this->importe_ana = (string)$this->importe_ana;
         $this->tarifaee_ana = $rs->fields[19] ;  
         $this->tarifaee_ana =  str_replace(",", ".", $this->tarifaee_ana);
         $this->tarifaee_ana = (string)$this->tarifaee_ana;
         $this->tipotlp = $rs->fields[20] ;  
         $this->operadortlp = $rs->fields[21] ;  
         $this->cancelado = $rs->fields[22] ;  
         $this->cancelado = (string)$this->cancelado;
         $this->pagoid = $rs->fields[23] ;  
         $this->categoriatlp = $rs->fields[24] ;  
         $this->fechaturno = $rs->fields[25] ;  
         $this->clasevehiculo_ana = $rs->fields[26] ;  
         $this->nombreimagen = $rs->fields[27] ;  
         $this->consecutivo = $rs->fields[28] ;  
         $this->consecutivo = (string)$this->consecutivo;
         //----- lookup - excentoid
         $this->look_excentoid = $this->excentoid; 
         $this->Lookup->lookup_excentoid($this->look_excentoid, $this->excentoid, $this->casetaid) ; 
         $this->look_excentoid = ($this->look_excentoid == "&nbsp;") ? "" : $this->look_excentoid; 
         //----- lookup - cancelado
         $this->look_cancelado = $this->cancelado; 
         $this->Lookup->lookup_cancelado($this->look_cancelado); 
         $this->look_cancelado = ($this->look_cancelado == "&nbsp;") ? "" : $this->look_cancelado; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_aforo']['contr_erro'] = 'on';
if (!isset($_SESSION['VideoIP'])) {$_SESSION['VideoIP'] = "";}
if (!isset($this->sc_temp_VideoIP)) {$this->sc_temp_VideoIP = (isset($_SESSION['VideoIP'])) ? $_SESSION['VideoIP'] : "";}
if (!isset($_SESSION['ModoImagen'])) {$_SESSION['ModoImagen'] = "";}
if (!isset($this->sc_temp_ModoImagen)) {$this->sc_temp_ModoImagen = (isset($_SESSION['ModoImagen'])) ? $_SESSION['ModoImagen'] : "";}
 $modoImagen = $this->sc_temp_ModoImagen;
$ejes = intval(substr($this->clasevehiculo_ana , 1, 8));
$this->imagen  = $this->casetaid .$this->carrilid .$this->cuerpo .str_replace("-","",$this->fechaoperacion ).str_replace(":","",$this->horaevento ).".jpg";
switch (substr($this->clasevehiculo_ana , 0, 1)) {
    case "A":
		$this->cantidadejes  = $ejes = "" ? 2 : 2 + $ejes;
        break;
    case "B":
        $this->cantidadejes =$ejes;
        break;
    case "C":
        $this->cantidadejes =$ejes >9 ? 9 + intval($this->cantidadeje_ana ) : $ejes;
        break;
	case "M":
        $this->cantidadejes = $ejes = "" ? 2 : 2 + $ejes;
        break;	

	default:$this->cantidadejes  = 0;
        
}



$check_sql = "SELECT V1 FROM carril WHERE CasetaID = ".$this->casetaid ." and CarrilID = ".$this->carrilid ;
 
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
    $canal_carril = $this->rs[0][0];
	}
		else     
{
	$canal_carril = 99;
}

switch ($modoImagen) {
	case 1:
$liga = "../../../webs/en/clip_video.php?d=".$this->fechaturno ."&h=".$this->horaevento ."&c=".$canal_carril."&sa=".$this->sc_temp_VideoIP."&sf=".$this->secuencial ;
$this->Ini->link_horaevento_apl_or = '$liga';
$this->Ini->link_horaevento_apl = $this->Ini->path_link . "" . SC_dir_app_name($liga) . "/";
$this->Ini->link_horaevento_apl = str_replace("'", "?&?'", $this->Ini->link_horaevento_apl);
$this->Ini->link_horaevento_parms = "OrScLink?#?" . "1" . "?@?" . "?#?" . "" . "?@?";
$this->Ini->link_horaevento_parms = str_replace("'", "?&?'", $this->Ini->link_horaevento_parms);
$this->Ini->link_horaevento_hint = "Ver video";
$this->Ini->link_horaevento_hint = str_replace("'", "?&?'", $this->Ini->link_horaevento_hint);
$this->Ini->link_horaevento_target = "nm_iframe_liga_B_grid_aforo";
$this->Ini->link_horaevento_pos = "B";
$this->Ini->link_horaevento_alt = "500";
$this->Ini->link_horaevento_larg = "700";
;
	break;
	case 2:
		$liga = "../clipvideo_local/?loc=".str_replace("-","",$this->fechaoperacion )."/".$this->casetaid ."/".$this->casetaid ."_".$this->carrilid ."_1_".$this->fechaturno ."_".str_replace(":","",$this->horaevento );
		$this->Ini->link_horaevento_apl_or = '$liga';
$this->Ini->link_horaevento_apl = $this->Ini->path_link . "" . SC_dir_app_name($liga) . "/";
$this->Ini->link_horaevento_apl = str_replace("'", "?&?'", $this->Ini->link_horaevento_apl);
$this->Ini->link_horaevento_parms = "OrScLink?#?" . "1" . "?@?" . "?#?" . "" . "?@?";
$this->Ini->link_horaevento_parms = str_replace("'", "?&?'", $this->Ini->link_horaevento_parms);
$this->Ini->link_horaevento_hint = "Ver video";
$this->Ini->link_horaevento_hint = str_replace("'", "?&?'", $this->Ini->link_horaevento_hint);
$this->Ini->link_horaevento_target = "nm_iframe_liga_B_grid_aforo";
$this->Ini->link_horaevento_pos = "B";
$this->Ini->link_horaevento_alt = "500";
$this->Ini->link_horaevento_larg = "700";
;
	break;
	case 3:
		$liga = "grid_imagentitulacion/?i=".$this->nombreimagen ;
		$this->Ini->link_horaevento_apl_or = '$liga';
$this->Ini->link_horaevento_apl = $this->Ini->path_link . "" . SC_dir_app_name($liga) . "/";
$this->Ini->link_horaevento_apl = str_replace("'", "?&?'", $this->Ini->link_horaevento_apl);
$this->Ini->link_horaevento_parms = "OrScLink?#?" . "1" . "?@?" . "?#?" . "" . "?@?";
$this->Ini->link_horaevento_parms = str_replace("'", "?&?'", $this->Ini->link_horaevento_parms);
$this->Ini->link_horaevento_hint = "Ver imagen";
$this->Ini->link_horaevento_hint = str_replace("'", "?&?'", $this->Ini->link_horaevento_hint);
$this->Ini->link_horaevento_target = "nm_iframe_liga_B_grid_aforo";
$this->Ini->link_horaevento_pos = "B";
$this->Ini->link_horaevento_alt = "700";
$this->Ini->link_horaevento_larg = "900";
;
		$this->Ini->link_horaevento_apl = $this->Ini->path_link . "" . SC_dir_app_name($liga);

	break;
}
if (isset($this->sc_temp_ModoImagen)) {$_SESSION['ModoImagen'] = $this->sc_temp_ModoImagen;}
if (isset($this->sc_temp_VideoIP)) {$_SESSION['VideoIP'] = $this->sc_temp_VideoIP;}
$_SESSION['scriptcase']['grid_aforo']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</grid_aforo>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "grid_aforo_res_xml.class.php");
              $this->Res = new grid_aforo_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_res_file']['xml'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_res_file']['xml']);
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
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_res_file']['view'];
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
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- casetaid
   function NM_export_casetaid()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->casetaid))
         {
             $this->casetaid = sc_convert_encoding($this->casetaid, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['casetaid'])) ? $this->New_label['casetaid'] : "Caseta"; 
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
   //----- fechaoperacion
   function NM_export_fechaoperacion()
   {
             $conteudo_x =  $this->fechaoperacion;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaoperacion, "YYYY-MM-DD  ");
                 $this->fechaoperacion = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fechaoperacion'])) ? $this->New_label['fechaoperacion'] : "Fecha Operacion"; 
         }
         else
         {
             $SC_Label = "fechaoperacion"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechaoperacion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechaoperacion) . "\"";
         }
   }
   //----- horaevento
   function NM_export_horaevento()
   {
             $conteudo_x =  $this->horaevento;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->horaevento, "HH:II:SS  ");
                 $this->horaevento = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['horaevento'])) ? $this->New_label['horaevento'] : "Hora Evento"; 
         }
         else
         {
             $SC_Label = "horaevento"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->horaevento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->horaevento) . "\"";
         }
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
   //----- usuarioid
   function NM_export_usuarioid()
   {
             nmgp_Form_Num_Val($this->usuarioid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['usuarioid'])) ? $this->New_label['usuarioid'] : "Cajero"; 
         }
         else
         {
             $SC_Label = "usuarioid"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->usuarioid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->usuarioid) . "\"";
         }
   }
   //----- secuencial
   function NM_export_secuencial()
   {
             nmgp_Form_Num_Val($this->secuencial, "", "", "0", "S", "2", "", "N:1", "-") ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['secuencial'])) ? $this->New_label['secuencial'] : "Secuencial"; 
         }
         else
         {
             $SC_Label = "secuencial"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->secuencial) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->secuencial) . "\"";
         }
   }
   //----- folio
   function NM_export_folio()
   {
             nmgp_Form_Num_Val($this->folio, "", "", "0", "S", "2", "", "N:1", "-") ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['folio'])) ? $this->New_label['folio'] : "Folio"; 
         }
         else
         {
             $SC_Label = "folio"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->folio) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->folio) . "\"";
         }
   }
   //----- vehiculoid_ect
   function NM_export_vehiculoid_ect()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->vehiculoid_ect))
         {
             $this->vehiculoid_ect = sc_convert_encoding($this->vehiculoid_ect, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['vehiculoid_ect'])) ? $this->New_label['vehiculoid_ect'] : "Vehiculo PRE"; 
         }
         else
         {
             $SC_Label = "vehiculoid_ect"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->vehiculoid_ect) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->vehiculoid_ect) . "\"";
         }
   }
   //----- vehiculoid_cr
   function NM_export_vehiculoid_cr()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->vehiculoid_cr))
         {
             $this->vehiculoid_cr = sc_convert_encoding($this->vehiculoid_cr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['vehiculoid_cr'])) ? $this->New_label['vehiculoid_cr'] : "Vehiculo CR"; 
         }
         else
         {
             $SC_Label = "vehiculoid_cr"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->vehiculoid_cr) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->vehiculoid_cr) . "\"";
         }
   }
   //----- vehiculoid_eap
   function NM_export_vehiculoid_eap()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->vehiculoid_eap))
         {
             $this->vehiculoid_eap = sc_convert_encoding($this->vehiculoid_eap, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['vehiculoid_eap'])) ? $this->New_label['vehiculoid_eap'] : "Vehiculo POS"; 
         }
         else
         {
             $SC_Label = "vehiculoid_eap"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->vehiculoid_eap) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->vehiculoid_eap) . "\"";
         }
   }
   //----- pagoid_ana
   function NM_export_pagoid_ana()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->pagoid_ana))
         {
             $this->pagoid_ana = sc_convert_encoding($this->pagoid_ana, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['pagoid_ana'])) ? $this->New_label['pagoid_ana'] : "Tipo Pago Analista"; 
         }
         else
         {
             $SC_Label = "pagoid_ana"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->pagoid_ana) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->pagoid_ana) . "\"";
         }
   }
   //----- excentoid
   function NM_export_excentoid()
   {
         nmgp_Form_Num_Val($this->look_excentoid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_excentoid))
         {
             $this->look_excentoid = sc_convert_encoding($this->look_excentoid, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['excentoid'])) ? $this->New_label['excentoid'] : "Dependencia"; 
         }
         else
         {
             $SC_Label = "excentoid"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_excentoid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_excentoid) . "\"";
         }
   }
   //----- placas
   function NM_export_placas()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->placas))
         {
             $this->placas = sc_convert_encoding($this->placas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['placas'])) ? $this->New_label['placas'] : "Placas"; 
         }
         else
         {
             $SC_Label = "placas"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->placas) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->placas) . "\"";
         }
   }
   //----- numerotarjeta
   function NM_export_numerotarjeta()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->numerotarjeta))
         {
             $this->numerotarjeta = sc_convert_encoding($this->numerotarjeta, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['numerotarjeta'])) ? $this->New_label['numerotarjeta'] : "Numero Tarjeta"; 
         }
         else
         {
             $SC_Label = "numerotarjeta"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->numerotarjeta) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->numerotarjeta) . "\"";
         }
   }
   //----- vehiculoid_ana
   function NM_export_vehiculoid_ana()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->vehiculoid_ana))
         {
             $this->vehiculoid_ana = sc_convert_encoding($this->vehiculoid_ana, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['vehiculoid_ana'])) ? $this->New_label['vehiculoid_ana'] : "Vehiculo ID ANA"; 
         }
         else
         {
             $SC_Label = "vehiculoid_ana"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->vehiculoid_ana) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->vehiculoid_ana) . "\"";
         }
   }
   //----- cantidadeje_ana
   function NM_export_cantidadeje_ana()
   {
             nmgp_Form_Num_Val($this->cantidadeje_ana, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cantidadeje_ana'])) ? $this->New_label['cantidadeje_ana'] : "Cantidad EE ANA"; 
         }
         else
         {
             $SC_Label = "cantidadeje_ana"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cantidadeje_ana) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cantidadeje_ana) . "\"";
         }
   }
   //----- importe_ana
   function NM_export_importe_ana()
   {
             nmgp_Form_Num_Val($this->importe_ana, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['importe_ana'])) ? $this->New_label['importe_ana'] : "Importe ANA"; 
         }
         else
         {
             $SC_Label = "importe_ana"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->importe_ana) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->importe_ana) . "\"";
         }
   }
   //----- tarifaee_ana
   function NM_export_tarifaee_ana()
   {
             nmgp_Form_Num_Val($this->tarifaee_ana, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['tarifaee_ana'])) ? $this->New_label['tarifaee_ana'] : "Tarifa EE ANA"; 
         }
         else
         {
             $SC_Label = "tarifaee_ana"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tarifaee_ana) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tarifaee_ana) . "\"";
         }
   }
   //----- tipotlp
   function NM_export_tipotlp()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tipotlp))
         {
             $this->tipotlp = sc_convert_encoding($this->tipotlp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['tipotlp'])) ? $this->New_label['tipotlp'] : "Tipo TLP"; 
         }
         else
         {
             $SC_Label = "tipotlp"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tipotlp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tipotlp) . "\"";
         }
   }
   //----- operadortlp
   function NM_export_operadortlp()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->operadortlp))
         {
             $this->operadortlp = sc_convert_encoding($this->operadortlp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['operadortlp'])) ? $this->New_label['operadortlp'] : "Operador TLP"; 
         }
         else
         {
             $SC_Label = "operadortlp"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->operadortlp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->operadortlp) . "\"";
         }
   }
   //----- cantidadejes
   function NM_export_cantidadejes()
   {
             nmgp_Form_Num_Val($this->cantidadejes, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cantidadejes'])) ? $this->New_label['cantidadejes'] : "Cantidad de Ejes"; 
         }
         else
         {
             $SC_Label = "cantidadejes"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cantidadejes) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cantidadejes) . "\"";
         }
   }
   //----- cancelado
   function NM_export_cancelado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_cancelado))
         {
             $this->look_cancelado = sc_convert_encoding($this->look_cancelado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cancelado'])) ? $this->New_label['cancelado'] : "Cancelado"; 
         }
         else
         {
             $SC_Label = "cancelado"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_cancelado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_cancelado) . "\"";
         }
   }
   //----- pagoid
   function NM_export_pagoid()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->pagoid))
         {
             $this->pagoid = sc_convert_encoding($this->pagoid, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['pagoid'])) ? $this->New_label['pagoid'] : "Tipo Pago PRE"; 
         }
         else
         {
             $SC_Label = "pagoid"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->pagoid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->pagoid) . "\"";
         }
   }
   //----- categoriatlp
   function NM_export_categoriatlp()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->categoriatlp))
         {
             $this->categoriatlp = sc_convert_encoding($this->categoriatlp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['categoriatlp'])) ? $this->New_label['categoriatlp'] : "Categoria TLP"; 
         }
         else
         {
             $SC_Label = "categoriatlp"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->categoriatlp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->categoriatlp) . "\"";
         }
   }
   //----- imagen
   function NM_export_imagen()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->imagen))
         {
             $this->imagen = sc_convert_encoding($this->imagen, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['imagen'])) ? $this->New_label['imagen'] : "Imagen"; 
         }
         else
         {
             $SC_Label = "imagen"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->imagen) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->imagen) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> aforo :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_aforo_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_aforo"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['xml_return']); ?>"> 
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
