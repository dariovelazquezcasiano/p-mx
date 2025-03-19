<?php

class grid_liquidacion_fs_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
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
                   nm_limpa_str_grid_liquidacion_fs($cadapar[1]);
                   nm_protect_num_grid_liquidacion_fs($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_liquidacion_fs']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_liquidacion_fs_total.class.php"); 
      $this->Tot      = new grid_liquidacion_fs_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['SC_Ind_Groupby'] == "TotalesAcumulados")
          {
              $this->sum_depositopre = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][2];
              $this->sum_montoana = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][3];
              $this->sum_faltanteana = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][4];
              $this->sum_sobranteana = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][5];
              $this->sum_depositototal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][6];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['SC_Ind_Groupby'] == "FechaUsuario")
          {
              $this->sum_depositopre = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][2];
              $this->sum_montoana = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][3];
              $this->sum_faltanteana = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][4];
              $this->sum_sobranteana = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][5];
              $this->sum_depositototal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['tot_geral'][6];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_liquidacion_fs']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_liquidacion_fs";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_liquidacion_fs.rtf";
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
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_liquidacion_fs']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_liquidacion_fs']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_liquidacion_fs']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['campos_busca'];
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
          $this->usuarioid = (isset($Busca_temp['usuarioid'])) ? $Busca_temp['usuarioid'] : ""; 
          $tmp_pos = (is_string($this->usuarioid)) ? strpos($this->usuarioid, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->usuarioid))
          {
              $this->usuarioid = substr($this->usuarioid, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['turnoid'])) ? $this->New_label['turnoid'] : "Turno"; 
          if ($Cada_col == "turnoid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['carril'])) ? $this->New_label['carril'] : "Carril"; 
          if ($Cada_col == "carril" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['usuarioid'])) ? $this->New_label['usuarioid'] : "Cajero"; 
          if ($Cada_col == "usuarioid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['montocr'])) ? $this->New_label['montocr'] : "Monto Marcado"; 
          if ($Cada_col == "montocr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['importemxn'])) ? $this->New_label['importemxn'] : "Importe GxE"; 
          if ($Cada_col == "importemxn" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['operacion'])) ? $this->New_label['operacion'] : "Operacion"; 
          if ($Cada_col == "operacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['faltante'])) ? $this->New_label['faltante'] : "Faltante"; 
          if ($Cada_col == "faltante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sobrante'])) ? $this->New_label['sobrante'] : "Sobrante"; 
          if ($Cada_col == "sobrante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['entregado'])) ? $this->New_label['entregado'] : "Entregado"; 
          if ($Cada_col == "entregado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['depositopre'])) ? $this->New_label['depositopre'] : "Deposito Preliquidación"; 
          if ($Cada_col == "depositopre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['montoana'])) ? $this->New_label['montoana'] : "Monto ANA"; 
          if ($Cada_col == "montoana" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['faltanteana'])) ? $this->New_label['faltanteana'] : "Faltante ANA"; 
          if ($Cada_col == "faltanteana" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sobranteana'])) ? $this->New_label['sobranteana'] : "Sobrante ANA"; 
          if ($Cada_col == "sobranteana" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['depositototal'])) ? $this->New_label['depositototal'] : "Deposito Total"; 
          if ($Cada_col == "depositototal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['consecutivo'])) ? $this->New_label['consecutivo'] : "Consecutivo"; 
          if ($Cada_col == "consecutivo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['casetaid'])) ? $this->New_label['casetaid'] : "Caseta"; 
          if ($Cada_col == "casetaid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tramoid'])) ? $this->New_label['tramoid'] : "Tramo ID"; 
          if ($Cada_col == "tramoid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cuerpo'])) ? $this->New_label['cuerpo'] : "Cuerpo"; 
          if ($Cada_col == "cuerpo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT TurnoID, CONCAT(CarrilID,Cuerpo) as carril, UsuarioID, MontoCR, ImporteMXN, Operacion, if(Faltante>=0,Faltante,0) as faltante, if(Faltante<0,ABS(Faltante),0) as sobrante, Entregado, MontoANA, if(FaltanteANA>=0,FaltanteANA,0) as faltanteana, if(FaltanteANA<0,ABS(FaltanteANA),0) as sobranteana, Consecutivo, CasetaID, TramoID, Cuerpo, str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20), CarrilID, str_replace (convert(char(10),HoraInicio,102), '.', '-') + ' ' + convert(char(8),HoraInicio,20) from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT TurnoID, CONCAT(CarrilID,Cuerpo) as carril, UsuarioID, MontoCR, ImporteMXN, Operacion, if(Faltante>=0,Faltante,0) as faltante, if(Faltante<0,ABS(Faltante),0) as sobrante, Entregado, MontoANA, if(FaltanteANA>=0,FaltanteANA,0) as faltanteana, if(FaltanteANA<0,ABS(FaltanteANA),0) as sobranteana, Consecutivo, CasetaID, TramoID, Cuerpo, FechaOperacion, CarrilID, HoraInicio from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT TurnoID, CONCAT(CarrilID,Cuerpo) as carril, UsuarioID, MontoCR, ImporteMXN, Operacion, if(Faltante>=0,Faltante,0) as faltante, if(Faltante<0,ABS(Faltante),0) as sobrante, Entregado, MontoANA, if(FaltanteANA>=0,FaltanteANA,0) as faltanteana, if(FaltanteANA<0,ABS(FaltanteANA),0) as sobranteana, Consecutivo, CasetaID, TramoID, Cuerpo, convert(char(23),FechaOperacion,121), CarrilID, convert(char(23),HoraInicio,121) from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT TurnoID, CONCAT(CarrilID,Cuerpo) as carril, UsuarioID, MontoCR, ImporteMXN, Operacion, if(Faltante>=0,Faltante,0) as faltante, if(Faltante<0,ABS(Faltante),0) as sobrante, Entregado, MontoANA, if(FaltanteANA>=0,FaltanteANA,0) as faltanteana, if(FaltanteANA<0,ABS(FaltanteANA),0) as sobranteana, Consecutivo, CasetaID, TramoID, Cuerpo, FechaOperacion, CarrilID, HoraInicio from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT TurnoID, CONCAT(CarrilID,Cuerpo) as carril, UsuarioID, MontoCR, ImporteMXN, Operacion, if(Faltante>=0,Faltante,0) as faltante, if(Faltante<0,ABS(Faltante),0) as sobrante, Entregado, MontoANA, if(FaltanteANA>=0,FaltanteANA,0) as faltanteana, if(FaltanteANA<0,ABS(FaltanteANA),0) as sobranteana, Consecutivo, CasetaID, TramoID, Cuerpo, EXTEND(FechaOperacion, YEAR TO DAY), CarrilID, HoraInicio from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT TurnoID, CONCAT(CarrilID,Cuerpo) as carril, UsuarioID, MontoCR, ImporteMXN, Operacion, if(Faltante>=0,Faltante,0) as faltante, if(Faltante<0,ABS(Faltante),0) as sobrante, Entregado, MontoANA, if(FaltanteANA>=0,FaltanteANA,0) as faltanteana, if(FaltanteANA<0,ABS(FaltanteANA),0) as sobranteana, Consecutivo, CasetaID, TramoID, Cuerpo, FechaOperacion, CarrilID, HoraInicio from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['order_grid'];
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
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->turnoid = $rs->fields[0] ;  
         $this->turnoid = (string)$this->turnoid;
         $this->carril = $rs->fields[1] ;  
         $this->usuarioid = $rs->fields[2] ;  
         $this->montocr = $rs->fields[3] ;  
         $this->montocr =  str_replace(",", ".", $this->montocr);
         $this->montocr = (string)$this->montocr;
         $this->importemxn = $rs->fields[4] ;  
         $this->importemxn =  str_replace(",", ".", $this->importemxn);
         $this->importemxn = (string)$this->importemxn;
         $this->operacion = $rs->fields[5] ;  
         $this->operacion =  str_replace(",", ".", $this->operacion);
         $this->operacion = (string)$this->operacion;
         $this->faltante = $rs->fields[6] ;  
         $this->faltante =  str_replace(",", ".", $this->faltante);
         $this->faltante = (string)$this->faltante;
         $this->sobrante = $rs->fields[7] ;  
         $this->sobrante =  str_replace(",", ".", $this->sobrante);
         $this->sobrante = (string)$this->sobrante;
         $this->entregado = $rs->fields[8] ;  
         $this->entregado =  str_replace(",", ".", $this->entregado);
         $this->entregado = (string)$this->entregado;
         $this->montoana = $rs->fields[9] ;  
         $this->montoana =  str_replace(",", ".", $this->montoana);
         $this->montoana = (string)$this->montoana;
         $this->faltanteana = $rs->fields[10] ;  
         $this->faltanteana =  str_replace(",", ".", $this->faltanteana);
         $this->faltanteana = (string)$this->faltanteana;
         $this->sobranteana = $rs->fields[11] ;  
         $this->sobranteana =  str_replace(",", ".", $this->sobranteana);
         $this->sobranteana = (string)$this->sobranteana;
         $this->consecutivo = $rs->fields[12] ;  
         $this->consecutivo = (string)$this->consecutivo;
         $this->casetaid = $rs->fields[13] ;  
         $this->casetaid = (string)$this->casetaid;
         $this->tramoid = $rs->fields[14] ;  
         $this->tramoid = (string)$this->tramoid;
         $this->cuerpo = $rs->fields[15] ;  
         $this->fechaoperacion = $rs->fields[16] ;  
         $this->carrilid = $rs->fields[17] ;  
         $this->carrilid = (string)$this->carrilid;
         $this->horainicio = $rs->fields[18] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_liquidacion_fs']['contr_erro'] = 'on';
 $this->depositopre = $this->operacion +$this->entregado ;
$this->depositototal  =  $this->sobranteana  > 0 ? $this->montoana  + $this->sobranteana  : $this->montoana  + $this->sobranteana  + ($this->sobrante -$this->entregado ) ;


$_SESSION['scriptcase']['grid_liquidacion_fs']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- turnoid
   function NM_export_turnoid()
   {
             nmgp_Form_Num_Val($this->turnoid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->turnoid = NM_charset_to_utf8($this->turnoid);
         $this->turnoid = str_replace('<', '&lt;', $this->turnoid);
         $this->turnoid = str_replace('>', '&gt;', $this->turnoid);
         $this->Texto_tag .= "<td>" . $this->turnoid . "</td>\r\n";
   }
   //----- carril
   function NM_export_carril()
   {
         $this->carril = html_entity_decode($this->carril, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->carril = strip_tags($this->carril);
         $this->carril = NM_charset_to_utf8($this->carril);
         $this->carril = str_replace('<', '&lt;', $this->carril);
         $this->carril = str_replace('>', '&gt;', $this->carril);
         $this->Texto_tag .= "<td>" . $this->carril . "</td>\r\n";
   }
   //----- usuarioid
   function NM_export_usuarioid()
   {
         $this->usuarioid = html_entity_decode($this->usuarioid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->usuarioid = strip_tags($this->usuarioid);
         $this->usuarioid = NM_charset_to_utf8($this->usuarioid);
         $this->usuarioid = str_replace('<', '&lt;', $this->usuarioid);
         $this->usuarioid = str_replace('>', '&gt;', $this->usuarioid);
         $this->Texto_tag .= "<td>" . $this->usuarioid . "</td>\r\n";
   }
   //----- montocr
   function NM_export_montocr()
   {
             nmgp_Form_Num_Val($this->montocr, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->montocr = NM_charset_to_utf8($this->montocr);
         $this->montocr = str_replace('<', '&lt;', $this->montocr);
         $this->montocr = str_replace('>', '&gt;', $this->montocr);
         $this->Texto_tag .= "<td>" . $this->montocr . "</td>\r\n";
   }
   //----- importemxn
   function NM_export_importemxn()
   {
             nmgp_Form_Num_Val($this->importemxn, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->importemxn = NM_charset_to_utf8($this->importemxn);
         $this->importemxn = str_replace('<', '&lt;', $this->importemxn);
         $this->importemxn = str_replace('>', '&gt;', $this->importemxn);
         $this->Texto_tag .= "<td>" . $this->importemxn . "</td>\r\n";
   }
   //----- operacion
   function NM_export_operacion()
   {
             nmgp_Form_Num_Val($this->operacion, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->operacion = NM_charset_to_utf8($this->operacion);
         $this->operacion = str_replace('<', '&lt;', $this->operacion);
         $this->operacion = str_replace('>', '&gt;', $this->operacion);
         $this->Texto_tag .= "<td>" . $this->operacion . "</td>\r\n";
   }
   //----- faltante
   function NM_export_faltante()
   {
             nmgp_Form_Num_Val($this->faltante, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->faltante = NM_charset_to_utf8($this->faltante);
         $this->faltante = str_replace('<', '&lt;', $this->faltante);
         $this->faltante = str_replace('>', '&gt;', $this->faltante);
         $this->Texto_tag .= "<td>" . $this->faltante . "</td>\r\n";
   }
   //----- sobrante
   function NM_export_sobrante()
   {
             nmgp_Form_Num_Val($this->sobrante, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->sobrante = NM_charset_to_utf8($this->sobrante);
         $this->sobrante = str_replace('<', '&lt;', $this->sobrante);
         $this->sobrante = str_replace('>', '&gt;', $this->sobrante);
         $this->Texto_tag .= "<td>" . $this->sobrante . "</td>\r\n";
   }
   //----- entregado
   function NM_export_entregado()
   {
             nmgp_Form_Num_Val($this->entregado, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->entregado = NM_charset_to_utf8($this->entregado);
         $this->entregado = str_replace('<', '&lt;', $this->entregado);
         $this->entregado = str_replace('>', '&gt;', $this->entregado);
         $this->Texto_tag .= "<td>" . $this->entregado . "</td>\r\n";
   }
   //----- depositopre
   function NM_export_depositopre()
   {
             nmgp_Form_Num_Val($this->depositopre, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->depositopre = NM_charset_to_utf8($this->depositopre);
         $this->depositopre = str_replace('<', '&lt;', $this->depositopre);
         $this->depositopre = str_replace('>', '&gt;', $this->depositopre);
         $this->Texto_tag .= "<td>" . $this->depositopre . "</td>\r\n";
   }
   //----- montoana
   function NM_export_montoana()
   {
             nmgp_Form_Num_Val($this->montoana, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->montoana = NM_charset_to_utf8($this->montoana);
         $this->montoana = str_replace('<', '&lt;', $this->montoana);
         $this->montoana = str_replace('>', '&gt;', $this->montoana);
         $this->Texto_tag .= "<td>" . $this->montoana . "</td>\r\n";
   }
   //----- faltanteana
   function NM_export_faltanteana()
   {
             nmgp_Form_Num_Val($this->faltanteana, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->faltanteana = NM_charset_to_utf8($this->faltanteana);
         $this->faltanteana = str_replace('<', '&lt;', $this->faltanteana);
         $this->faltanteana = str_replace('>', '&gt;', $this->faltanteana);
         $this->Texto_tag .= "<td>" . $this->faltanteana . "</td>\r\n";
   }
   //----- sobranteana
   function NM_export_sobranteana()
   {
             nmgp_Form_Num_Val($this->sobranteana, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->sobranteana = NM_charset_to_utf8($this->sobranteana);
         $this->sobranteana = str_replace('<', '&lt;', $this->sobranteana);
         $this->sobranteana = str_replace('>', '&gt;', $this->sobranteana);
         $this->Texto_tag .= "<td>" . $this->sobranteana . "</td>\r\n";
   }
   //----- depositototal
   function NM_export_depositototal()
   {
             nmgp_Form_Num_Val($this->depositototal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->depositototal = NM_charset_to_utf8($this->depositototal);
         $this->depositototal = str_replace('<', '&lt;', $this->depositototal);
         $this->depositototal = str_replace('>', '&gt;', $this->depositototal);
         $this->Texto_tag .= "<td>" . $this->depositototal . "</td>\r\n";
   }
   //----- consecutivo
   function NM_export_consecutivo()
   {
             nmgp_Form_Num_Val($this->consecutivo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->consecutivo = NM_charset_to_utf8($this->consecutivo);
         $this->consecutivo = str_replace('<', '&lt;', $this->consecutivo);
         $this->consecutivo = str_replace('>', '&gt;', $this->consecutivo);
         $this->Texto_tag .= "<td>" . $this->consecutivo . "</td>\r\n";
   }
   //----- casetaid
   function NM_export_casetaid()
   {
             nmgp_Form_Num_Val($this->casetaid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->casetaid = NM_charset_to_utf8($this->casetaid);
         $this->casetaid = str_replace('<', '&lt;', $this->casetaid);
         $this->casetaid = str_replace('>', '&gt;', $this->casetaid);
         $this->Texto_tag .= "<td>" . $this->casetaid . "</td>\r\n";
   }
   //----- tramoid
   function NM_export_tramoid()
   {
             nmgp_Form_Num_Val($this->tramoid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->tramoid = NM_charset_to_utf8($this->tramoid);
         $this->tramoid = str_replace('<', '&lt;', $this->tramoid);
         $this->tramoid = str_replace('>', '&gt;', $this->tramoid);
         $this->Texto_tag .= "<td>" . $this->tramoid . "</td>\r\n";
   }
   //----- cuerpo
   function NM_export_cuerpo()
   {
         $this->cuerpo = html_entity_decode($this->cuerpo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cuerpo = strip_tags($this->cuerpo);
         $this->cuerpo = NM_charset_to_utf8($this->cuerpo);
         $this->cuerpo = str_replace('<', '&lt;', $this->cuerpo);
         $this->cuerpo = str_replace('>', '&gt;', $this->cuerpo);
         $this->Texto_tag .= "<td>" . $this->cuerpo . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liquidacion_fs'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Detalle de liquidaciones :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fdown" method="get" action="grid_liquidacion_fs_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_liquidacion_fs"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
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
