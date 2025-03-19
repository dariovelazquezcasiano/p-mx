<?php

class grid_trafico_json
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['opcao'] = "";
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
                   nm_limpa_str_grid_trafico($cadapar[1]);
                   nm_protect_num_grid_trafico($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_trafico']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (!isset($FechaAforo) && isset($fechaaforo)) 
      {
         $FechaAforo = $fechaaforo;
      }
      if (isset($FechaAforo)) 
      {
          $_SESSION['FechaAforo'] = $FechaAforo;
          nm_limpa_str_grid_trafico($_SESSION["FechaAforo"]);
      }
      if (!isset($CasetaAforo) && isset($casetaaforo)) 
      {
         $CasetaAforo = $casetaaforo;
      }
      if (isset($CasetaAforo)) 
      {
          $_SESSION['CasetaAforo'] = $CasetaAforo;
          nm_limpa_str_grid_trafico($_SESSION["CasetaAforo"]);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_trafico/grid_trafico_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_trafico']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_grid_trafico.zip";
      $this->Arquivo     .= "_grid_trafico";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "grid_trafico.json";
      $this->Tit_zip      = "grid_trafico.zip";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_trafico']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_trafico']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_trafico']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['campos_busca'];
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
          $this->cuerpo = (isset($Busca_temp['cuerpo'])) ? $Busca_temp['cuerpo'] : ""; 
          $tmp_pos = (is_string($this->cuerpo)) ? strpos($this->cuerpo, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->cuerpo))
          {
              $this->cuerpo = substr($this->cuerpo, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['embutida'])
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
          $nmgp_select = "SELECT IF(FechaOperacion != FechaTurno && TurnoID = 3,23,HOUR(HoraEvento)) as hora, SUM(IF(ClaseVehiculo_ANA = 'A',1,0)) as a, SUM(IF(ClaseVehiculo_ANA LIKE 'A_%' && CasetaID != 15,1,0)) as ar, SUM(IF(ClaseVehiculo_ANA = 'M',1,0)) as m, SUM(IF(ClaseVehiculo_ANA = 'B2',1,0)) as b2, SUM(IF(ClaseVehiculo_ANA = 'B3',1,0)) as b3, SUM(IF(ClaseVehiculo_ANA = 'B4',1,0)) as b4, SUM(IF(ClaseVehiculo_ANA = 'C2',1,0)) as c2, SUM(IF(ClaseVehiculo_ANA = 'C3',1,0)) as c3, SUM(IF(ClaseVehiculo_ANA = 'C4',1,0)) as c4, SUM(IF(ClaseVehiculo_ANA = 'C5',1,0)) as c5, SUM(IF(ClaseVehiculo_ANA = 'C6',1,0)) as c6, SUM(IF(ClaseVehiculo_ANA = 'C7',1,0)) as c7, SUM(IF(ClaseVehiculo_ANA = 'C8',1,0)) as c8, SUM(IF(ClaseVehiculo_ANA = 'C9' || ClaseVehiculo_ANA LIKE 'C__',1,0)) as c9, SUM(IF(PagoID_ANA = 'EXE' || PagoID_ANA = 'VSC' || PagoID_ANA = 'RSP' && CasetaID != 15,1,0)) as exe, SUM(IF(PagoID_ANA = 'ELU',1,0)) as elu, CasetaID, str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20) from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT IF(FechaOperacion != FechaTurno && TurnoID = 3,23,HOUR(HoraEvento)) as hora, SUM(IF(ClaseVehiculo_ANA = 'A',1,0)) as a, SUM(IF(ClaseVehiculo_ANA LIKE 'A_%' && CasetaID != 15,1,0)) as ar, SUM(IF(ClaseVehiculo_ANA = 'M',1,0)) as m, SUM(IF(ClaseVehiculo_ANA = 'B2',1,0)) as b2, SUM(IF(ClaseVehiculo_ANA = 'B3',1,0)) as b3, SUM(IF(ClaseVehiculo_ANA = 'B4',1,0)) as b4, SUM(IF(ClaseVehiculo_ANA = 'C2',1,0)) as c2, SUM(IF(ClaseVehiculo_ANA = 'C3',1,0)) as c3, SUM(IF(ClaseVehiculo_ANA = 'C4',1,0)) as c4, SUM(IF(ClaseVehiculo_ANA = 'C5',1,0)) as c5, SUM(IF(ClaseVehiculo_ANA = 'C6',1,0)) as c6, SUM(IF(ClaseVehiculo_ANA = 'C7',1,0)) as c7, SUM(IF(ClaseVehiculo_ANA = 'C8',1,0)) as c8, SUM(IF(ClaseVehiculo_ANA = 'C9' || ClaseVehiculo_ANA LIKE 'C__',1,0)) as c9, SUM(IF(PagoID_ANA = 'EXE' || PagoID_ANA = 'VSC' || PagoID_ANA = 'RSP' && CasetaID != 15,1,0)) as exe, SUM(IF(PagoID_ANA = 'ELU',1,0)) as elu, CasetaID, FechaOperacion from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT IF(FechaOperacion != FechaTurno && TurnoID = 3,23,HOUR(HoraEvento)) as hora, SUM(IF(ClaseVehiculo_ANA = 'A',1,0)) as a, SUM(IF(ClaseVehiculo_ANA LIKE 'A_%' && CasetaID != 15,1,0)) as ar, SUM(IF(ClaseVehiculo_ANA = 'M',1,0)) as m, SUM(IF(ClaseVehiculo_ANA = 'B2',1,0)) as b2, SUM(IF(ClaseVehiculo_ANA = 'B3',1,0)) as b3, SUM(IF(ClaseVehiculo_ANA = 'B4',1,0)) as b4, SUM(IF(ClaseVehiculo_ANA = 'C2',1,0)) as c2, SUM(IF(ClaseVehiculo_ANA = 'C3',1,0)) as c3, SUM(IF(ClaseVehiculo_ANA = 'C4',1,0)) as c4, SUM(IF(ClaseVehiculo_ANA = 'C5',1,0)) as c5, SUM(IF(ClaseVehiculo_ANA = 'C6',1,0)) as c6, SUM(IF(ClaseVehiculo_ANA = 'C7',1,0)) as c7, SUM(IF(ClaseVehiculo_ANA = 'C8',1,0)) as c8, SUM(IF(ClaseVehiculo_ANA = 'C9' || ClaseVehiculo_ANA LIKE 'C__',1,0)) as c9, SUM(IF(PagoID_ANA = 'EXE' || PagoID_ANA = 'VSC' || PagoID_ANA = 'RSP' && CasetaID != 15,1,0)) as exe, SUM(IF(PagoID_ANA = 'ELU',1,0)) as elu, CasetaID, convert(char(23),FechaOperacion,121) from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT IF(FechaOperacion != FechaTurno && TurnoID = 3,23,HOUR(HoraEvento)) as hora, SUM(IF(ClaseVehiculo_ANA = 'A',1,0)) as a, SUM(IF(ClaseVehiculo_ANA LIKE 'A_%' && CasetaID != 15,1,0)) as ar, SUM(IF(ClaseVehiculo_ANA = 'M',1,0)) as m, SUM(IF(ClaseVehiculo_ANA = 'B2',1,0)) as b2, SUM(IF(ClaseVehiculo_ANA = 'B3',1,0)) as b3, SUM(IF(ClaseVehiculo_ANA = 'B4',1,0)) as b4, SUM(IF(ClaseVehiculo_ANA = 'C2',1,0)) as c2, SUM(IF(ClaseVehiculo_ANA = 'C3',1,0)) as c3, SUM(IF(ClaseVehiculo_ANA = 'C4',1,0)) as c4, SUM(IF(ClaseVehiculo_ANA = 'C5',1,0)) as c5, SUM(IF(ClaseVehiculo_ANA = 'C6',1,0)) as c6, SUM(IF(ClaseVehiculo_ANA = 'C7',1,0)) as c7, SUM(IF(ClaseVehiculo_ANA = 'C8',1,0)) as c8, SUM(IF(ClaseVehiculo_ANA = 'C9' || ClaseVehiculo_ANA LIKE 'C__',1,0)) as c9, SUM(IF(PagoID_ANA = 'EXE' || PagoID_ANA = 'VSC' || PagoID_ANA = 'RSP' && CasetaID != 15,1,0)) as exe, SUM(IF(PagoID_ANA = 'ELU',1,0)) as elu, CasetaID, FechaOperacion from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT IF(FechaOperacion != FechaTurno && TurnoID = 3,23,HOUR(HoraEvento)) as hora, SUM(IF(ClaseVehiculo_ANA = 'A',1,0)) as a, SUM(IF(ClaseVehiculo_ANA LIKE 'A_%' && CasetaID != 15,1,0)) as ar, SUM(IF(ClaseVehiculo_ANA = 'M',1,0)) as m, SUM(IF(ClaseVehiculo_ANA = 'B2',1,0)) as b2, SUM(IF(ClaseVehiculo_ANA = 'B3',1,0)) as b3, SUM(IF(ClaseVehiculo_ANA = 'B4',1,0)) as b4, SUM(IF(ClaseVehiculo_ANA = 'C2',1,0)) as c2, SUM(IF(ClaseVehiculo_ANA = 'C3',1,0)) as c3, SUM(IF(ClaseVehiculo_ANA = 'C4',1,0)) as c4, SUM(IF(ClaseVehiculo_ANA = 'C5',1,0)) as c5, SUM(IF(ClaseVehiculo_ANA = 'C6',1,0)) as c6, SUM(IF(ClaseVehiculo_ANA = 'C7',1,0)) as c7, SUM(IF(ClaseVehiculo_ANA = 'C8',1,0)) as c8, SUM(IF(ClaseVehiculo_ANA = 'C9' || ClaseVehiculo_ANA LIKE 'C__',1,0)) as c9, SUM(IF(PagoID_ANA = 'EXE' || PagoID_ANA = 'VSC' || PagoID_ANA = 'RSP' && CasetaID != 15,1,0)) as exe, SUM(IF(PagoID_ANA = 'ELU',1,0)) as elu, CasetaID, EXTEND(FechaOperacion, YEAR TO DAY) from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT IF(FechaOperacion != FechaTurno && TurnoID = 3,23,HOUR(HoraEvento)) as hora, SUM(IF(ClaseVehiculo_ANA = 'A',1,0)) as a, SUM(IF(ClaseVehiculo_ANA LIKE 'A_%' && CasetaID != 15,1,0)) as ar, SUM(IF(ClaseVehiculo_ANA = 'M',1,0)) as m, SUM(IF(ClaseVehiculo_ANA = 'B2',1,0)) as b2, SUM(IF(ClaseVehiculo_ANA = 'B3',1,0)) as b3, SUM(IF(ClaseVehiculo_ANA = 'B4',1,0)) as b4, SUM(IF(ClaseVehiculo_ANA = 'C2',1,0)) as c2, SUM(IF(ClaseVehiculo_ANA = 'C3',1,0)) as c3, SUM(IF(ClaseVehiculo_ANA = 'C4',1,0)) as c4, SUM(IF(ClaseVehiculo_ANA = 'C5',1,0)) as c5, SUM(IF(ClaseVehiculo_ANA = 'C6',1,0)) as c6, SUM(IF(ClaseVehiculo_ANA = 'C7',1,0)) as c7, SUM(IF(ClaseVehiculo_ANA = 'C8',1,0)) as c8, SUM(IF(ClaseVehiculo_ANA = 'C9' || ClaseVehiculo_ANA LIKE 'C__',1,0)) as c9, SUM(IF(PagoID_ANA = 'EXE' || PagoID_ANA = 'VSC' || PagoID_ANA = 'RSP' && CasetaID != 15,1,0)) as exe, SUM(IF(PagoID_ANA = 'ELU',1,0)) as elu, CasetaID, FechaOperacion from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['where_pesq'];
      $nmgp_select .= " group by IF(FechaOperacion != FechaTurno && TurnoID = 3, 23,HOUR(HoraEvento))"; 
      $nmgp_select_count .= " group by IF(FechaOperacion != FechaTurno && TurnoID = 3, 23,HOUR(HoraEvento))"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->hora = $rs->fields[0] ;  
         $this->hora = (string)$this->hora;
         $this->a = $rs->fields[1] ;  
         $this->a =  str_replace(",", ".", $this->a);
         $this->a = (string)$this->a;
         $this->ar = $rs->fields[2] ;  
         $this->ar =  str_replace(",", ".", $this->ar);
         $this->ar = (string)$this->ar;
         $this->m = $rs->fields[3] ;  
         $this->m =  str_replace(",", ".", $this->m);
         $this->m = (string)$this->m;
         $this->b2 = $rs->fields[4] ;  
         $this->b2 =  str_replace(",", ".", $this->b2);
         $this->b2 = (string)$this->b2;
         $this->b3 = $rs->fields[5] ;  
         $this->b3 =  str_replace(",", ".", $this->b3);
         $this->b3 = (string)$this->b3;
         $this->b4 = $rs->fields[6] ;  
         $this->b4 =  str_replace(",", ".", $this->b4);
         $this->b4 = (string)$this->b4;
         $this->c2 = $rs->fields[7] ;  
         $this->c2 =  str_replace(",", ".", $this->c2);
         $this->c2 = (string)$this->c2;
         $this->c3 = $rs->fields[8] ;  
         $this->c3 =  str_replace(",", ".", $this->c3);
         $this->c3 = (string)$this->c3;
         $this->c4 = $rs->fields[9] ;  
         $this->c4 =  str_replace(",", ".", $this->c4);
         $this->c4 = (string)$this->c4;
         $this->c5 = $rs->fields[10] ;  
         $this->c5 =  str_replace(",", ".", $this->c5);
         $this->c5 = (string)$this->c5;
         $this->c6 = $rs->fields[11] ;  
         $this->c6 =  str_replace(",", ".", $this->c6);
         $this->c6 = (string)$this->c6;
         $this->c7 = $rs->fields[12] ;  
         $this->c7 =  str_replace(",", ".", $this->c7);
         $this->c7 = (string)$this->c7;
         $this->c8 = $rs->fields[13] ;  
         $this->c8 =  str_replace(",", ".", $this->c8);
         $this->c8 = (string)$this->c8;
         $this->c9 = $rs->fields[14] ;  
         $this->c9 =  str_replace(",", ".", $this->c9);
         $this->c9 = (string)$this->c9;
         $this->exe = $rs->fields[15] ;  
         $this->exe =  str_replace(",", ".", $this->exe);
         $this->exe = (string)$this->exe;
         $this->elu = $rs->fields[16] ;  
         $this->elu =  str_replace(",", ".", $this->elu);
         $this->elu = (string)$this->elu;
         $this->casetaid = $rs->fields[17] ;  
         $this->fechaoperacion = $rs->fields[18] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_trafico']['contr_erro'] = 'on';
 $this->total  = $this->a +$this->ar +$this->m +$this->b2 +$this->b3 +$this->b4 +$this->c2 +$this->c3 +$this->c4 +$this->c5 +$this->c6 +$this->c7 +$this->c8 +$this->c9 ;
$_SESSION['scriptcase']['grid_trafico']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['field_order'] as $Cada_col)
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "grid_trafico_res_json.class.php");
              $this->Res = new grid_trafico_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_res_file']['json'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- hora
   function NM_export_hora()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->hora, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['hora'])) ? $this->New_label['hora'] : "Hora"; 
         }
         else
         {
             $SC_Label = "hora"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->hora;
   }
   //----- a
   function NM_export_a()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->a, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['a'])) ? $this->New_label['a'] : "A"; 
         }
         else
         {
             $SC_Label = "a"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->a;
   }
   //----- ar
   function NM_export_ar()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->ar, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ar'])) ? $this->New_label['ar'] : "AR"; 
         }
         else
         {
             $SC_Label = "ar"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ar;
   }
   //----- m
   function NM_export_m()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->m, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['m'])) ? $this->New_label['m'] : "M"; 
         }
         else
         {
             $SC_Label = "m"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->m;
   }
   //----- b2
   function NM_export_b2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->b2, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['b2'])) ? $this->New_label['b2'] : "B2"; 
         }
         else
         {
             $SC_Label = "b2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->b2;
   }
   //----- b3
   function NM_export_b3()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->b3, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['b3'])) ? $this->New_label['b3'] : "B3"; 
         }
         else
         {
             $SC_Label = "b3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->b3;
   }
   //----- b4
   function NM_export_b4()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->b4, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['b4'])) ? $this->New_label['b4'] : "B4"; 
         }
         else
         {
             $SC_Label = "b4"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->b4;
   }
   //----- c2
   function NM_export_c2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c2, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c2'])) ? $this->New_label['c2'] : "C2"; 
         }
         else
         {
             $SC_Label = "c2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c2;
   }
   //----- c3
   function NM_export_c3()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c3, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c3'])) ? $this->New_label['c3'] : "C3"; 
         }
         else
         {
             $SC_Label = "c3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c3;
   }
   //----- c4
   function NM_export_c4()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c4, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c4'])) ? $this->New_label['c4'] : "C4"; 
         }
         else
         {
             $SC_Label = "c4"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c4;
   }
   //----- c5
   function NM_export_c5()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c5'])) ? $this->New_label['c5'] : "C5"; 
         }
         else
         {
             $SC_Label = "c5"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c5;
   }
   //----- c6
   function NM_export_c6()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c6, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c6'])) ? $this->New_label['c6'] : "C6"; 
         }
         else
         {
             $SC_Label = "c6"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c6;
   }
   //----- c7
   function NM_export_c7()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c7, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c7'])) ? $this->New_label['c7'] : "C7"; 
         }
         else
         {
             $SC_Label = "c7"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c7;
   }
   //----- c8
   function NM_export_c8()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c8, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c8'])) ? $this->New_label['c8'] : "C8"; 
         }
         else
         {
             $SC_Label = "c8"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c8;
   }
   //----- c9
   function NM_export_c9()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c9, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c9'])) ? $this->New_label['c9'] : "C9"; 
         }
         else
         {
             $SC_Label = "c9"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c9;
   }
   //----- exe
   function NM_export_exe()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->exe, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['exe'])) ? $this->New_label['exe'] : "EXE"; 
         }
         else
         {
             $SC_Label = "exe"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->exe;
   }
   //----- elu
   function NM_export_elu()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->elu, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['elu'])) ? $this->New_label['elu'] : "ELU"; 
         }
         else
         {
             $SC_Label = "elu"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->elu;
   }
   //----- total
   function NM_export_total()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
         }
         else
         {
             $SC_Label = "total"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->total;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Trafico horario :: JSON</TITLE>
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
<form name="Fdown" method="get" action="grid_trafico_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_trafico"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_trafico']['json_return']); ?>"> 
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
