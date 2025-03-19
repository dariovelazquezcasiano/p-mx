<?php

class grid_aforo_rtf
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
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_aforo']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_aforo";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_aforo.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['casetaid'])) ? $this->New_label['casetaid'] : "Caseta"; 
          if ($Cada_col == "casetaid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechaoperacion'])) ? $this->New_label['fechaoperacion'] : "Fecha Operacion"; 
          if ($Cada_col == "fechaoperacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['horaevento'])) ? $this->New_label['horaevento'] : "Hora Evento"; 
          if ($Cada_col == "horaevento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['turnoid'])) ? $this->New_label['turnoid'] : "Turno"; 
          if ($Cada_col == "turnoid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['carrilid'])) ? $this->New_label['carrilid'] : "Carril"; 
          if ($Cada_col == "carrilid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['usuarioid'])) ? $this->New_label['usuarioid'] : "Cajero"; 
          if ($Cada_col == "usuarioid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['secuencial'])) ? $this->New_label['secuencial'] : "Secuencial"; 
          if ($Cada_col == "secuencial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['folio'])) ? $this->New_label['folio'] : "Folio"; 
          if ($Cada_col == "folio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vehiculoid_ect'])) ? $this->New_label['vehiculoid_ect'] : "Vehiculo PRE"; 
          if ($Cada_col == "vehiculoid_ect" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vehiculoid_cr'])) ? $this->New_label['vehiculoid_cr'] : "Vehiculo CR"; 
          if ($Cada_col == "vehiculoid_cr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vehiculoid_eap'])) ? $this->New_label['vehiculoid_eap'] : "Vehiculo POS"; 
          if ($Cada_col == "vehiculoid_eap" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pagoid_ana'])) ? $this->New_label['pagoid_ana'] : "Tipo Pago Analista"; 
          if ($Cada_col == "pagoid_ana" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['excentoid'])) ? $this->New_label['excentoid'] : "Dependencia"; 
          if ($Cada_col == "excentoid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['placas'])) ? $this->New_label['placas'] : "Placas"; 
          if ($Cada_col == "placas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numerotarjeta'])) ? $this->New_label['numerotarjeta'] : "Numero Tarjeta"; 
          if ($Cada_col == "numerotarjeta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vehiculoid_ana'])) ? $this->New_label['vehiculoid_ana'] : "Vehiculo ID ANA"; 
          if ($Cada_col == "vehiculoid_ana" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cantidadeje_ana'])) ? $this->New_label['cantidadeje_ana'] : "Cantidad EE ANA"; 
          if ($Cada_col == "cantidadeje_ana" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['importe_ana'])) ? $this->New_label['importe_ana'] : "Importe ANA"; 
          if ($Cada_col == "importe_ana" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tarifaee_ana'])) ? $this->New_label['tarifaee_ana'] : "Tarifa EE ANA"; 
          if ($Cada_col == "tarifaee_ana" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipotlp'])) ? $this->New_label['tipotlp'] : "Tipo TLP"; 
          if ($Cada_col == "tipotlp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['operadortlp'])) ? $this->New_label['operadortlp'] : "Operador TLP"; 
          if ($Cada_col == "operadortlp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cantidadejes'])) ? $this->New_label['cantidadejes'] : "Cantidad de Ejes"; 
          if ($Cada_col == "cantidadejes" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cancelado'])) ? $this->New_label['cancelado'] : "Cancelado"; 
          if ($Cada_col == "cancelado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pagoid'])) ? $this->New_label['pagoid'] : "Tipo Pago PRE"; 
          if ($Cada_col == "pagoid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['categoriatlp'])) ? $this->New_label['categoriatlp'] : "Categoria TLP"; 
          if ($Cada_col == "categoriatlp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imagen'])) ? $this->New_label['imagen'] : "Imagen"; 
          if ($Cada_col == "imagen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
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
         $this->casetaid = html_entity_decode($this->casetaid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->casetaid = strip_tags($this->casetaid);
         $this->casetaid = NM_charset_to_utf8($this->casetaid);
         $this->casetaid = str_replace('<', '&lt;', $this->casetaid);
         $this->casetaid = str_replace('>', '&gt;', $this->casetaid);
         $this->Texto_tag .= "<td>" . $this->casetaid . "</td>\r\n";
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
         $this->fechaoperacion = NM_charset_to_utf8($this->fechaoperacion);
         $this->fechaoperacion = str_replace('<', '&lt;', $this->fechaoperacion);
         $this->fechaoperacion = str_replace('>', '&gt;', $this->fechaoperacion);
         $this->Texto_tag .= "<td>" . $this->fechaoperacion . "</td>\r\n";
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
         $this->horaevento = NM_charset_to_utf8($this->horaevento);
         $this->horaevento = str_replace('<', '&lt;', $this->horaevento);
         $this->horaevento = str_replace('>', '&gt;', $this->horaevento);
         $this->Texto_tag .= "<td>" . $this->horaevento . "</td>\r\n";
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
   //----- carrilid
   function NM_export_carrilid()
   {
             nmgp_Form_Num_Val($this->carrilid, "", "", "0", "S", "2", "", "N:1", "-") ; 
         $this->carrilid = NM_charset_to_utf8($this->carrilid);
         $this->carrilid = str_replace('<', '&lt;', $this->carrilid);
         $this->carrilid = str_replace('>', '&gt;', $this->carrilid);
         $this->Texto_tag .= "<td>" . $this->carrilid . "</td>\r\n";
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
   //----- usuarioid
   function NM_export_usuarioid()
   {
             nmgp_Form_Num_Val($this->usuarioid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->usuarioid = NM_charset_to_utf8($this->usuarioid);
         $this->usuarioid = str_replace('<', '&lt;', $this->usuarioid);
         $this->usuarioid = str_replace('>', '&gt;', $this->usuarioid);
         $this->Texto_tag .= "<td>" . $this->usuarioid . "</td>\r\n";
   }
   //----- secuencial
   function NM_export_secuencial()
   {
             nmgp_Form_Num_Val($this->secuencial, "", "", "0", "S", "2", "", "N:1", "-") ; 
         $this->secuencial = NM_charset_to_utf8($this->secuencial);
         $this->secuencial = str_replace('<', '&lt;', $this->secuencial);
         $this->secuencial = str_replace('>', '&gt;', $this->secuencial);
         $this->Texto_tag .= "<td>" . $this->secuencial . "</td>\r\n";
   }
   //----- folio
   function NM_export_folio()
   {
             nmgp_Form_Num_Val($this->folio, "", "", "0", "S", "2", "", "N:1", "-") ; 
         $this->folio = NM_charset_to_utf8($this->folio);
         $this->folio = str_replace('<', '&lt;', $this->folio);
         $this->folio = str_replace('>', '&gt;', $this->folio);
         $this->Texto_tag .= "<td>" . $this->folio . "</td>\r\n";
   }
   //----- vehiculoid_ect
   function NM_export_vehiculoid_ect()
   {
         $this->vehiculoid_ect = html_entity_decode($this->vehiculoid_ect, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vehiculoid_ect = strip_tags($this->vehiculoid_ect);
         $this->vehiculoid_ect = NM_charset_to_utf8($this->vehiculoid_ect);
         $this->vehiculoid_ect = str_replace('<', '&lt;', $this->vehiculoid_ect);
         $this->vehiculoid_ect = str_replace('>', '&gt;', $this->vehiculoid_ect);
         $this->Texto_tag .= "<td>" . $this->vehiculoid_ect . "</td>\r\n";
   }
   //----- vehiculoid_cr
   function NM_export_vehiculoid_cr()
   {
         $this->vehiculoid_cr = html_entity_decode($this->vehiculoid_cr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vehiculoid_cr = strip_tags($this->vehiculoid_cr);
         $this->vehiculoid_cr = NM_charset_to_utf8($this->vehiculoid_cr);
         $this->vehiculoid_cr = str_replace('<', '&lt;', $this->vehiculoid_cr);
         $this->vehiculoid_cr = str_replace('>', '&gt;', $this->vehiculoid_cr);
         $this->Texto_tag .= "<td>" . $this->vehiculoid_cr . "</td>\r\n";
   }
   //----- vehiculoid_eap
   function NM_export_vehiculoid_eap()
   {
         $this->vehiculoid_eap = html_entity_decode($this->vehiculoid_eap, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vehiculoid_eap = strip_tags($this->vehiculoid_eap);
         $this->vehiculoid_eap = NM_charset_to_utf8($this->vehiculoid_eap);
         $this->vehiculoid_eap = str_replace('<', '&lt;', $this->vehiculoid_eap);
         $this->vehiculoid_eap = str_replace('>', '&gt;', $this->vehiculoid_eap);
         $this->Texto_tag .= "<td>" . $this->vehiculoid_eap . "</td>\r\n";
   }
   //----- pagoid_ana
   function NM_export_pagoid_ana()
   {
         $this->pagoid_ana = html_entity_decode($this->pagoid_ana, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pagoid_ana = strip_tags($this->pagoid_ana);
         $this->pagoid_ana = NM_charset_to_utf8($this->pagoid_ana);
         $this->pagoid_ana = str_replace('<', '&lt;', $this->pagoid_ana);
         $this->pagoid_ana = str_replace('>', '&gt;', $this->pagoid_ana);
         $this->Texto_tag .= "<td>" . $this->pagoid_ana . "</td>\r\n";
   }
   //----- excentoid
   function NM_export_excentoid()
   {
         nmgp_Form_Num_Val($this->look_excentoid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_excentoid = NM_charset_to_utf8($this->look_excentoid);
         $this->look_excentoid = str_replace('<', '&lt;', $this->look_excentoid);
         $this->look_excentoid = str_replace('>', '&gt;', $this->look_excentoid);
         $this->Texto_tag .= "<td>" . $this->look_excentoid . "</td>\r\n";
   }
   //----- placas
   function NM_export_placas()
   {
         $this->placas = html_entity_decode($this->placas, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->placas = strip_tags($this->placas);
         $this->placas = NM_charset_to_utf8($this->placas);
         $this->placas = str_replace('<', '&lt;', $this->placas);
         $this->placas = str_replace('>', '&gt;', $this->placas);
         $this->Texto_tag .= "<td>" . $this->placas . "</td>\r\n";
   }
   //----- numerotarjeta
   function NM_export_numerotarjeta()
   {
         $this->numerotarjeta = html_entity_decode($this->numerotarjeta, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numerotarjeta = strip_tags($this->numerotarjeta);
         $this->numerotarjeta = NM_charset_to_utf8($this->numerotarjeta);
         $this->numerotarjeta = str_replace('<', '&lt;', $this->numerotarjeta);
         $this->numerotarjeta = str_replace('>', '&gt;', $this->numerotarjeta);
         $this->Texto_tag .= "<td>" . $this->numerotarjeta . "</td>\r\n";
   }
   //----- vehiculoid_ana
   function NM_export_vehiculoid_ana()
   {
         $this->vehiculoid_ana = html_entity_decode($this->vehiculoid_ana, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vehiculoid_ana = strip_tags($this->vehiculoid_ana);
         $this->vehiculoid_ana = NM_charset_to_utf8($this->vehiculoid_ana);
         $this->vehiculoid_ana = str_replace('<', '&lt;', $this->vehiculoid_ana);
         $this->vehiculoid_ana = str_replace('>', '&gt;', $this->vehiculoid_ana);
         $this->Texto_tag .= "<td>" . $this->vehiculoid_ana . "</td>\r\n";
   }
   //----- cantidadeje_ana
   function NM_export_cantidadeje_ana()
   {
             nmgp_Form_Num_Val($this->cantidadeje_ana, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->cantidadeje_ana = NM_charset_to_utf8($this->cantidadeje_ana);
         $this->cantidadeje_ana = str_replace('<', '&lt;', $this->cantidadeje_ana);
         $this->cantidadeje_ana = str_replace('>', '&gt;', $this->cantidadeje_ana);
         $this->Texto_tag .= "<td>" . $this->cantidadeje_ana . "</td>\r\n";
   }
   //----- importe_ana
   function NM_export_importe_ana()
   {
             nmgp_Form_Num_Val($this->importe_ana, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->importe_ana = NM_charset_to_utf8($this->importe_ana);
         $this->importe_ana = str_replace('<', '&lt;', $this->importe_ana);
         $this->importe_ana = str_replace('>', '&gt;', $this->importe_ana);
         $this->Texto_tag .= "<td>" . $this->importe_ana . "</td>\r\n";
   }
   //----- tarifaee_ana
   function NM_export_tarifaee_ana()
   {
             nmgp_Form_Num_Val($this->tarifaee_ana, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->tarifaee_ana = NM_charset_to_utf8($this->tarifaee_ana);
         $this->tarifaee_ana = str_replace('<', '&lt;', $this->tarifaee_ana);
         $this->tarifaee_ana = str_replace('>', '&gt;', $this->tarifaee_ana);
         $this->Texto_tag .= "<td>" . $this->tarifaee_ana . "</td>\r\n";
   }
   //----- tipotlp
   function NM_export_tipotlp()
   {
         $this->tipotlp = html_entity_decode($this->tipotlp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipotlp = strip_tags($this->tipotlp);
         $this->tipotlp = NM_charset_to_utf8($this->tipotlp);
         $this->tipotlp = str_replace('<', '&lt;', $this->tipotlp);
         $this->tipotlp = str_replace('>', '&gt;', $this->tipotlp);
         $this->Texto_tag .= "<td>" . $this->tipotlp . "</td>\r\n";
   }
   //----- operadortlp
   function NM_export_operadortlp()
   {
         $this->operadortlp = html_entity_decode($this->operadortlp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->operadortlp = strip_tags($this->operadortlp);
         $this->operadortlp = NM_charset_to_utf8($this->operadortlp);
         $this->operadortlp = str_replace('<', '&lt;', $this->operadortlp);
         $this->operadortlp = str_replace('>', '&gt;', $this->operadortlp);
         $this->Texto_tag .= "<td>" . $this->operadortlp . "</td>\r\n";
   }
   //----- cantidadejes
   function NM_export_cantidadejes()
   {
             nmgp_Form_Num_Val($this->cantidadejes, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->cantidadejes = NM_charset_to_utf8($this->cantidadejes);
         $this->cantidadejes = str_replace('<', '&lt;', $this->cantidadejes);
         $this->cantidadejes = str_replace('>', '&gt;', $this->cantidadejes);
         $this->Texto_tag .= "<td>" . $this->cantidadejes . "</td>\r\n";
   }
   //----- cancelado
   function NM_export_cancelado()
   {
         $this->look_cancelado = html_entity_decode($this->look_cancelado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_cancelado = strip_tags($this->look_cancelado);
         $this->look_cancelado = NM_charset_to_utf8($this->look_cancelado);
         $this->look_cancelado = str_replace('<', '&lt;', $this->look_cancelado);
         $this->look_cancelado = str_replace('>', '&gt;', $this->look_cancelado);
         $this->Texto_tag .= "<td>" . $this->look_cancelado . "</td>\r\n";
   }
   //----- pagoid
   function NM_export_pagoid()
   {
         $this->pagoid = html_entity_decode($this->pagoid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pagoid = strip_tags($this->pagoid);
         $this->pagoid = NM_charset_to_utf8($this->pagoid);
         $this->pagoid = str_replace('<', '&lt;', $this->pagoid);
         $this->pagoid = str_replace('>', '&gt;', $this->pagoid);
         $this->Texto_tag .= "<td>" . $this->pagoid . "</td>\r\n";
   }
   //----- categoriatlp
   function NM_export_categoriatlp()
   {
         $this->categoriatlp = html_entity_decode($this->categoriatlp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->categoriatlp = strip_tags($this->categoriatlp);
         $this->categoriatlp = NM_charset_to_utf8($this->categoriatlp);
         $this->categoriatlp = str_replace('<', '&lt;', $this->categoriatlp);
         $this->categoriatlp = str_replace('>', '&gt;', $this->categoriatlp);
         $this->Texto_tag .= "<td>" . $this->categoriatlp . "</td>\r\n";
   }
   //----- imagen
   function NM_export_imagen()
   {
         $this->imagen = NM_charset_to_utf8($this->imagen);
         $this->imagen = str_replace('<', '&lt;', $this->imagen);
         $this->imagen = str_replace('>', '&gt;', $this->imagen);
         $this->Texto_tag .= "<td>" . $this->imagen . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> aforo :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_aforo_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_aforo"> 
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
