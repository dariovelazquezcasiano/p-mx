<?php
//
class form_muestra_ingresoEluPre_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = false;
   var $classes_100perc_fields = array();
   var $close_modal_after_insert = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'navSummary'        => array(),
                                'navPage'           => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $consecutivo;
   var $turnoid;
   var $casetaid;
   var $tramoid;
   var $cuerpo;
   var $usuarioid;
   var $carrilid;
   var $fechaoperacion;
   var $fechaturno;
   var $horainicio;
   var $fechafin;
   var $horafin;
   var $operacionid;
   var $foliocierre;
   var $estatuscarril;
   var $observacion;
   var $preliquidado;
   var $montocr;
   var $montoana;
   var $cantidadmxn;
   var $cantidadusd;
   var $importemxn;
   var $importeusd;
   var $folioinicialcr;
   var $foliofinalcr;
   var $folioinicialeap;
   var $foliofinaleap;
   var $faltante;
   var $ingresoelu_pre;
   var $entregado;
   var $administradorid;
   var $encargadoturnoid;
   var $encargadoturnoid_pre;
   var $fechacierre;
   var $fechacierre_hora;
   var $fechapreliq;
   var $fechapreliq_hora;
   var $fechaliq;
   var $fechaliq_hora;
   var $operacion;
   var $liquidadorid;
   var $faltanteana;
   var $ingresoelu_ana;
   var $conteo;
   var $fechainiciodictamen;
   var $fechainiciodictamen_hora;
   var $fechafindictamen;
   var $fechafindictamen_hora;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['administradorid']))
          {
              $this->administradorid = $this->NM_ajax_info['param']['administradorid'];
          }
          if (isset($this->NM_ajax_info['param']['cantidadmxn']))
          {
              $this->cantidadmxn = $this->NM_ajax_info['param']['cantidadmxn'];
          }
          if (isset($this->NM_ajax_info['param']['cantidadusd']))
          {
              $this->cantidadusd = $this->NM_ajax_info['param']['cantidadusd'];
          }
          if (isset($this->NM_ajax_info['param']['carrilid']))
          {
              $this->carrilid = $this->NM_ajax_info['param']['carrilid'];
          }
          if (isset($this->NM_ajax_info['param']['casetaid']))
          {
              $this->casetaid = $this->NM_ajax_info['param']['casetaid'];
          }
          if (isset($this->NM_ajax_info['param']['consecutivo']))
          {
              $this->consecutivo = $this->NM_ajax_info['param']['consecutivo'];
          }
          if (isset($this->NM_ajax_info['param']['conteo']))
          {
              $this->conteo = $this->NM_ajax_info['param']['conteo'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['cuerpo']))
          {
              $this->cuerpo = $this->NM_ajax_info['param']['cuerpo'];
          }
          if (isset($this->NM_ajax_info['param']['encargadoturnoid']))
          {
              $this->encargadoturnoid = $this->NM_ajax_info['param']['encargadoturnoid'];
          }
          if (isset($this->NM_ajax_info['param']['encargadoturnoid_pre']))
          {
              $this->encargadoturnoid_pre = $this->NM_ajax_info['param']['encargadoturnoid_pre'];
          }
          if (isset($this->NM_ajax_info['param']['entregado']))
          {
              $this->entregado = $this->NM_ajax_info['param']['entregado'];
          }
          if (isset($this->NM_ajax_info['param']['estatuscarril']))
          {
              $this->estatuscarril = $this->NM_ajax_info['param']['estatuscarril'];
          }
          if (isset($this->NM_ajax_info['param']['faltante']))
          {
              $this->faltante = $this->NM_ajax_info['param']['faltante'];
          }
          if (isset($this->NM_ajax_info['param']['faltanteana']))
          {
              $this->faltanteana = $this->NM_ajax_info['param']['faltanteana'];
          }
          if (isset($this->NM_ajax_info['param']['fechacierre']))
          {
              $this->fechacierre = $this->NM_ajax_info['param']['fechacierre'];
          }
          if (isset($this->NM_ajax_info['param']['fechafin']))
          {
              $this->fechafin = $this->NM_ajax_info['param']['fechafin'];
          }
          if (isset($this->NM_ajax_info['param']['fechafindictamen']))
          {
              $this->fechafindictamen = $this->NM_ajax_info['param']['fechafindictamen'];
          }
          if (isset($this->NM_ajax_info['param']['fechainiciodictamen']))
          {
              $this->fechainiciodictamen = $this->NM_ajax_info['param']['fechainiciodictamen'];
          }
          if (isset($this->NM_ajax_info['param']['fechaliq']))
          {
              $this->fechaliq = $this->NM_ajax_info['param']['fechaliq'];
          }
          if (isset($this->NM_ajax_info['param']['fechaoperacion']))
          {
              $this->fechaoperacion = $this->NM_ajax_info['param']['fechaoperacion'];
          }
          if (isset($this->NM_ajax_info['param']['fechapreliq']))
          {
              $this->fechapreliq = $this->NM_ajax_info['param']['fechapreliq'];
          }
          if (isset($this->NM_ajax_info['param']['fechaturno']))
          {
              $this->fechaturno = $this->NM_ajax_info['param']['fechaturno'];
          }
          if (isset($this->NM_ajax_info['param']['foliocierre']))
          {
              $this->foliocierre = $this->NM_ajax_info['param']['foliocierre'];
          }
          if (isset($this->NM_ajax_info['param']['foliofinalcr']))
          {
              $this->foliofinalcr = $this->NM_ajax_info['param']['foliofinalcr'];
          }
          if (isset($this->NM_ajax_info['param']['foliofinaleap']))
          {
              $this->foliofinaleap = $this->NM_ajax_info['param']['foliofinaleap'];
          }
          if (isset($this->NM_ajax_info['param']['folioinicialcr']))
          {
              $this->folioinicialcr = $this->NM_ajax_info['param']['folioinicialcr'];
          }
          if (isset($this->NM_ajax_info['param']['folioinicialeap']))
          {
              $this->folioinicialeap = $this->NM_ajax_info['param']['folioinicialeap'];
          }
          if (isset($this->NM_ajax_info['param']['horafin']))
          {
              $this->horafin = $this->NM_ajax_info['param']['horafin'];
          }
          if (isset($this->NM_ajax_info['param']['horainicio']))
          {
              $this->horainicio = $this->NM_ajax_info['param']['horainicio'];
          }
          if (isset($this->NM_ajax_info['param']['importemxn']))
          {
              $this->importemxn = $this->NM_ajax_info['param']['importemxn'];
          }
          if (isset($this->NM_ajax_info['param']['importeusd']))
          {
              $this->importeusd = $this->NM_ajax_info['param']['importeusd'];
          }
          if (isset($this->NM_ajax_info['param']['ingresoelu_ana']))
          {
              $this->ingresoelu_ana = $this->NM_ajax_info['param']['ingresoelu_ana'];
          }
          if (isset($this->NM_ajax_info['param']['ingresoelu_pre']))
          {
              $this->ingresoelu_pre = $this->NM_ajax_info['param']['ingresoelu_pre'];
          }
          if (isset($this->NM_ajax_info['param']['liquidadorid']))
          {
              $this->liquidadorid = $this->NM_ajax_info['param']['liquidadorid'];
          }
          if (isset($this->NM_ajax_info['param']['montoana']))
          {
              $this->montoana = $this->NM_ajax_info['param']['montoana'];
          }
          if (isset($this->NM_ajax_info['param']['montocr']))
          {
              $this->montocr = $this->NM_ajax_info['param']['montocr'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['observacion']))
          {
              $this->observacion = $this->NM_ajax_info['param']['observacion'];
          }
          if (isset($this->NM_ajax_info['param']['operacion']))
          {
              $this->operacion = $this->NM_ajax_info['param']['operacion'];
          }
          if (isset($this->NM_ajax_info['param']['operacionid']))
          {
              $this->operacionid = $this->NM_ajax_info['param']['operacionid'];
          }
          if (isset($this->NM_ajax_info['param']['preliquidado']))
          {
              $this->preliquidado = $this->NM_ajax_info['param']['preliquidado'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tramoid']))
          {
              $this->tramoid = $this->NM_ajax_info['param']['tramoid'];
          }
          if (isset($this->NM_ajax_info['param']['turnoid']))
          {
              $this->turnoid = $this->NM_ajax_info['param']['turnoid'];
          }
          if (isset($this->NM_ajax_info['param']['usuarioid']))
          {
              $this->usuarioid = $this->NM_ajax_info['param']['usuarioid'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->scSajaxReservedWords = array('rs', 'rst', 'rsrnd', 'rsargs');
      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (!in_array(strtolower($nmgp_campo), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_campo]))
                   {
                       $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
                   {
                       $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
                   }
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_muestra_ingresoEluPre($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fechacierre);
          $this->fechacierre      = (isset($aDtParts[0])) ? $aDtParts[0] : "";
          $this->fechacierre_hora = (isset($aDtParts[1])) ? $aDtParts[1] : "";
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fechapreliq);
          $this->fechapreliq      = (isset($aDtParts[0])) ? $aDtParts[0] : "";
          $this->fechapreliq_hora = (isset($aDtParts[1])) ? $aDtParts[1] : "";
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fechaliq);
          $this->fechaliq      = (isset($aDtParts[0])) ? $aDtParts[0] : "";
          $this->fechaliq_hora = (isset($aDtParts[1])) ? $aDtParts[1] : "";
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fechainiciodictamen);
          $this->fechainiciodictamen      = (isset($aDtParts[0])) ? $aDtParts[0] : "";
          $this->fechainiciodictamen_hora = (isset($aDtParts[1])) ? $aDtParts[1] : "";
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fechafindictamen);
          $this->fechafindictamen      = (isset($aDtParts[0])) ? $aDtParts[0] : "";
          $this->fechafindictamen_hora = (isset($aDtParts[1])) ? $aDtParts[1] : "";
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_muestra_ingresoEluPre_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_muestra_ingresoEluPre']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_muestra_ingresoEluPre']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_muestra_ingresoEluPre'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_muestra_ingresoEluPre']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_muestra_ingresoEluPre']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_muestra_ingresoEluPre') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_muestra_ingresoEluPre']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " detalleturno";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_muestra_ingresoEluPre")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = !isset($str_ajax_bg)         || "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = !isset($str_ajax_border_c)   || "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = !isset($str_ajax_border_s)   || "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = !isset($str_ajax_border_w)   || "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = !isset($str_block_exp)       || "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = !isset($str_block_col)       || "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = !isset($str_msg_ico_title)   || "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = !isset($str_msg_ico_body)    || "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = !isset($str_err_ico_title)   || "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = !isset($str_err_ico_body)    || "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = !isset($str_cal_ico_back)    || "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = !isset($str_cal_ico_for)     || "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = !isset($str_cal_ico_close)   || "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = !isset($str_tab_space)       || "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = !isset($str_bubble_tail)     || "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = !isset($str_label_sort_pos)  || "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = !isset($str_label_sort)      || "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = !isset($str_label_sort_asc)  || "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = !isset($str_label_sort_desc) || "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = !isset($str_img_status_ok)  || "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = !isset($str_img_status_err) || "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span      = !isset($str_error_icon_span)  || "" == trim($str_error_icon_span)  ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = !isset($img_qs_search)        || "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = !isset($img_qs_clean)         || "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = !isset($str_qs_image_padding) || "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;



      $_SESSION['scriptcase']['error_icon']['form_muestra_ingresoEluPre']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_muestra_ingresoEluPre'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_muestra_ingresoEluPre']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_muestra_ingresoEluPre'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_muestra_ingresoEluPre'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_muestra_ingresoEluPre", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_muestra_ingresoEluPre/form_muestra_ingresoEluPre_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_muestra_ingresoEluPre_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_muestra_ingresoEluPre_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_muestra_ingresoEluPre_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_muestra_ingresoEluPre/form_muestra_ingresoEluPre_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_muestra_ingresoEluPre_erro.class.php"); 
      }
      $this->Erro      = new form_muestra_ingresoEluPre_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ((!isset($nm_opc_lookup) || $nm_opc_lookup != "lookup") && (!isset($nm_opc_php) || $nm_opc_php != "formphp"))
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opcao']))
         { 
             if ($this->consecutivo != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_muestra_ingresoEluPre']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_muestra_ingresoEluPre']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_muestra_ingresoEluPre']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->consecutivo)) { $this->nm_limpa_alfa($this->consecutivo); }
      if (isset($this->turnoid)) { $this->nm_limpa_alfa($this->turnoid); }
      if (isset($this->casetaid)) { $this->nm_limpa_alfa($this->casetaid); }
      if (isset($this->tramoid)) { $this->nm_limpa_alfa($this->tramoid); }
      if (isset($this->cuerpo)) { $this->nm_limpa_alfa($this->cuerpo); }
      if (isset($this->usuarioid)) { $this->nm_limpa_alfa($this->usuarioid); }
      if (isset($this->carrilid)) { $this->nm_limpa_alfa($this->carrilid); }
      if (isset($this->operacionid)) { $this->nm_limpa_alfa($this->operacionid); }
      if (isset($this->foliocierre)) { $this->nm_limpa_alfa($this->foliocierre); }
      if (isset($this->estatuscarril)) { $this->nm_limpa_alfa($this->estatuscarril); }
      if (isset($this->observacion)) { $this->nm_limpa_alfa($this->observacion); }
      if (isset($this->preliquidado)) { $this->nm_limpa_alfa($this->preliquidado); }
      if (isset($this->montocr)) { $this->nm_limpa_alfa($this->montocr); }
      if (isset($this->montoana)) { $this->nm_limpa_alfa($this->montoana); }
      if (isset($this->cantidadmxn)) { $this->nm_limpa_alfa($this->cantidadmxn); }
      if (isset($this->cantidadusd)) { $this->nm_limpa_alfa($this->cantidadusd); }
      if (isset($this->importemxn)) { $this->nm_limpa_alfa($this->importemxn); }
      if (isset($this->importeusd)) { $this->nm_limpa_alfa($this->importeusd); }
      if (isset($this->folioinicialcr)) { $this->nm_limpa_alfa($this->folioinicialcr); }
      if (isset($this->foliofinalcr)) { $this->nm_limpa_alfa($this->foliofinalcr); }
      if (isset($this->folioinicialeap)) { $this->nm_limpa_alfa($this->folioinicialeap); }
      if (isset($this->foliofinaleap)) { $this->nm_limpa_alfa($this->foliofinaleap); }
      if (isset($this->faltante)) { $this->nm_limpa_alfa($this->faltante); }
      if (isset($this->ingresoelu_pre)) { $this->nm_limpa_alfa($this->ingresoelu_pre); }
      if (isset($this->entregado)) { $this->nm_limpa_alfa($this->entregado); }
      if (isset($this->administradorid)) { $this->nm_limpa_alfa($this->administradorid); }
      if (isset($this->encargadoturnoid)) { $this->nm_limpa_alfa($this->encargadoturnoid); }
      if (isset($this->encargadoturnoid_pre)) { $this->nm_limpa_alfa($this->encargadoturnoid_pre); }
      if (isset($this->operacion)) { $this->nm_limpa_alfa($this->operacion); }
      if (isset($this->liquidadorid)) { $this->nm_limpa_alfa($this->liquidadorid); }
      if (isset($this->faltanteana)) { $this->nm_limpa_alfa($this->faltanteana); }
      if (isset($this->ingresoelu_ana)) { $this->nm_limpa_alfa($this->ingresoelu_ana); }
      if (isset($this->conteo)) { $this->nm_limpa_alfa($this->conteo); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- consecutivo
      $this->field_config['consecutivo']               = array();
      $this->field_config['consecutivo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['consecutivo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['consecutivo']['symbol_dec'] = '';
      $this->field_config['consecutivo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['consecutivo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- turnoid
      $this->field_config['turnoid']               = array();
      $this->field_config['turnoid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['turnoid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['turnoid']['symbol_dec'] = '';
      $this->field_config['turnoid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['turnoid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- casetaid
      $this->field_config['casetaid']               = array();
      $this->field_config['casetaid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['casetaid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['casetaid']['symbol_dec'] = '';
      $this->field_config['casetaid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['casetaid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tramoid
      $this->field_config['tramoid']               = array();
      $this->field_config['tramoid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tramoid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tramoid']['symbol_dec'] = '';
      $this->field_config['tramoid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tramoid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- carrilid
      $this->field_config['carrilid']               = array();
      $this->field_config['carrilid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['carrilid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['carrilid']['symbol_dec'] = '';
      $this->field_config['carrilid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['carrilid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fechaoperacion
      $this->field_config['fechaoperacion']                 = array();
      $this->field_config['fechaoperacion']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechaoperacion']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechaoperacion']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechaoperacion');
      //-- fechaturno
      $this->field_config['fechaturno']                 = array();
      $this->field_config['fechaturno']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechaturno']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechaturno']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechaturno');
      //-- horainicio
      $this->field_config['horainicio']                 = array();
      $this->field_config['horainicio']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['horainicio']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['horainicio']['date_display'] = "hhiiss";
      $this->new_date_format('HH', 'horainicio');
      //-- fechafin
      $this->field_config['fechafin']                 = array();
      $this->field_config['fechafin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechafin']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechafin']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechafin');
      //-- horafin
      $this->field_config['horafin']                 = array();
      $this->field_config['horafin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['horafin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['horafin']['date_display'] = "hhiiss";
      $this->new_date_format('HH', 'horafin');
      //-- preliquidado
      $this->field_config['preliquidado']               = array();
      $this->field_config['preliquidado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['preliquidado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['preliquidado']['symbol_dec'] = '';
      $this->field_config['preliquidado']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['preliquidado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- montocr
      $this->field_config['montocr']               = array();
      $this->field_config['montocr']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['montocr']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['montocr']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['montocr']['symbol_mon'] = '';
      $this->field_config['montocr']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['montocr']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- montoana
      $this->field_config['montoana']               = array();
      $this->field_config['montoana']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['montoana']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['montoana']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['montoana']['symbol_mon'] = '';
      $this->field_config['montoana']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['montoana']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cantidadmxn
      $this->field_config['cantidadmxn']               = array();
      $this->field_config['cantidadmxn']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidadmxn']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidadmxn']['symbol_dec'] = '';
      $this->field_config['cantidadmxn']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidadmxn']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cantidadusd
      $this->field_config['cantidadusd']               = array();
      $this->field_config['cantidadusd']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidadusd']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidadusd']['symbol_dec'] = '';
      $this->field_config['cantidadusd']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidadusd']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- importemxn
      $this->field_config['importemxn']               = array();
      $this->field_config['importemxn']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importemxn']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importemxn']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importemxn']['symbol_mon'] = '';
      $this->field_config['importemxn']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importemxn']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeusd
      $this->field_config['importeusd']               = array();
      $this->field_config['importeusd']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeusd']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeusd']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeusd']['symbol_mon'] = '';
      $this->field_config['importeusd']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeusd']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- folioinicialcr
      $this->field_config['folioinicialcr']               = array();
      $this->field_config['folioinicialcr']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['folioinicialcr']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['folioinicialcr']['symbol_dec'] = '';
      $this->field_config['folioinicialcr']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['folioinicialcr']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- foliofinalcr
      $this->field_config['foliofinalcr']               = array();
      $this->field_config['foliofinalcr']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['foliofinalcr']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['foliofinalcr']['symbol_dec'] = '';
      $this->field_config['foliofinalcr']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['foliofinalcr']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- folioinicialeap
      $this->field_config['folioinicialeap']               = array();
      $this->field_config['folioinicialeap']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['folioinicialeap']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['folioinicialeap']['symbol_dec'] = '';
      $this->field_config['folioinicialeap']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['folioinicialeap']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- foliofinaleap
      $this->field_config['foliofinaleap']               = array();
      $this->field_config['foliofinaleap']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['foliofinaleap']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['foliofinaleap']['symbol_dec'] = '';
      $this->field_config['foliofinaleap']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['foliofinaleap']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- faltante
      $this->field_config['faltante']               = array();
      $this->field_config['faltante']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['faltante']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['faltante']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['faltante']['symbol_mon'] = '';
      $this->field_config['faltante']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['faltante']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- ingresoelu_pre
      $this->field_config['ingresoelu_pre']               = array();
      $this->field_config['ingresoelu_pre']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ingresoelu_pre']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ingresoelu_pre']['symbol_dec'] = '';
      $this->field_config['ingresoelu_pre']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ingresoelu_pre']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- entregado
      $this->field_config['entregado']               = array();
      $this->field_config['entregado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['entregado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['entregado']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['entregado']['symbol_mon'] = '';
      $this->field_config['entregado']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['entregado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- administradorid
      $this->field_config['administradorid']               = array();
      $this->field_config['administradorid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['administradorid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['administradorid']['symbol_dec'] = '';
      $this->field_config['administradorid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['administradorid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- encargadoturnoid
      $this->field_config['encargadoturnoid']               = array();
      $this->field_config['encargadoturnoid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['encargadoturnoid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['encargadoturnoid']['symbol_dec'] = '';
      $this->field_config['encargadoturnoid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['encargadoturnoid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- encargadoturnoid_pre
      $this->field_config['encargadoturnoid_pre']               = array();
      $this->field_config['encargadoturnoid_pre']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['encargadoturnoid_pre']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['encargadoturnoid_pre']['symbol_dec'] = '';
      $this->field_config['encargadoturnoid_pre']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['encargadoturnoid_pre']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fechacierre
      $this->field_config['fechacierre']                 = array();
      $this->field_config['fechacierre']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechacierre']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechacierre']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechacierre']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechacierre');
      //-- fechapreliq
      $this->field_config['fechapreliq']                 = array();
      $this->field_config['fechapreliq']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechapreliq']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechapreliq']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechapreliq']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechapreliq');
      //-- fechaliq
      $this->field_config['fechaliq']                 = array();
      $this->field_config['fechaliq']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechaliq']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechaliq']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechaliq']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechaliq');
      //-- operacion
      $this->field_config['operacion']               = array();
      $this->field_config['operacion']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['operacion']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['operacion']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['operacion']['symbol_mon'] = '';
      $this->field_config['operacion']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['operacion']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- faltanteana
      $this->field_config['faltanteana']               = array();
      $this->field_config['faltanteana']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['faltanteana']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['faltanteana']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['faltanteana']['symbol_mon'] = '';
      $this->field_config['faltanteana']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['faltanteana']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- ingresoelu_ana
      $this->field_config['ingresoelu_ana']               = array();
      $this->field_config['ingresoelu_ana']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ingresoelu_ana']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ingresoelu_ana']['symbol_dec'] = '';
      $this->field_config['ingresoelu_ana']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ingresoelu_ana']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- conteo
      $this->field_config['conteo']               = array();
      $this->field_config['conteo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['conteo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['conteo']['symbol_dec'] = '';
      $this->field_config['conteo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['conteo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fechainiciodictamen
      $this->field_config['fechainiciodictamen']                 = array();
      $this->field_config['fechainiciodictamen']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechainiciodictamen']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechainiciodictamen']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechainiciodictamen']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechainiciodictamen');
      //-- fechafindictamen
      $this->field_config['fechafindictamen']                 = array();
      $this->field_config['fechafindictamen']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechafindictamen']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechafindictamen']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechafindictamen']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechafindictamen');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['Gera_log_access'] = false;
      }

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_consecutivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'consecutivo');
          }
          if ('validate_turnoid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'turnoid');
          }
          if ('validate_casetaid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'casetaid');
          }
          if ('validate_tramoid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tramoid');
          }
          if ('validate_cuerpo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cuerpo');
          }
          if ('validate_usuarioid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usuarioid');
          }
          if ('validate_carrilid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'carrilid');
          }
          if ('validate_fechaoperacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechaoperacion');
          }
          if ('validate_fechaturno' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechaturno');
          }
          if ('validate_horainicio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'horainicio');
          }
          if ('validate_fechafin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechafin');
          }
          if ('validate_horafin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'horafin');
          }
          if ('validate_operacionid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'operacionid');
          }
          if ('validate_foliocierre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'foliocierre');
          }
          if ('validate_estatuscarril' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatuscarril');
          }
          if ('validate_observacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observacion');
          }
          if ('validate_preliquidado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'preliquidado');
          }
          if ('validate_montocr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'montocr');
          }
          if ('validate_montoana' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'montoana');
          }
          if ('validate_cantidadmxn' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidadmxn');
          }
          if ('validate_cantidadusd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidadusd');
          }
          if ('validate_importemxn' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importemxn');
          }
          if ('validate_importeusd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeusd');
          }
          if ('validate_folioinicialcr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'folioinicialcr');
          }
          if ('validate_foliofinalcr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'foliofinalcr');
          }
          if ('validate_folioinicialeap' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'folioinicialeap');
          }
          if ('validate_foliofinaleap' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'foliofinaleap');
          }
          if ('validate_faltante' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'faltante');
          }
          if ('validate_ingresoelu_pre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ingresoelu_pre');
          }
          if ('validate_entregado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'entregado');
          }
          if ('validate_administradorid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'administradorid');
          }
          if ('validate_encargadoturnoid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'encargadoturnoid');
          }
          if ('validate_encargadoturnoid_pre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'encargadoturnoid_pre');
          }
          if ('validate_fechacierre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechacierre');
          }
          if ('validate_fechapreliq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechapreliq');
          }
          if ('validate_fechaliq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechaliq');
          }
          if ('validate_operacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'operacion');
          }
          if ('validate_liquidadorid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'liquidadorid');
          }
          if ('validate_faltanteana' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'faltanteana');
          }
          if ('validate_ingresoelu_ana' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ingresoelu_ana');
          }
          if ('validate_conteo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'conteo');
          }
          if ('validate_fechainiciodictamen' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechainiciodictamen');
          }
          if ('validate_fechafindictamen' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechafindictamen');
          }
          form_muestra_ingresoEluPre_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_muestra_ingresoEluPre_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_muestra_ingresoEluPre']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_muestra_ingresoEluPre_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_muestra_ingresoEluPre_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_muestra_ingresoEluPre_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_muestra_ingresoEluPre.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
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
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
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
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
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
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " detalleturno") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<link rel="stylesheet" type="text/css" href="../_lib/css/peaje_module_ui.css?v=20260912-preliq-ui" />
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_muestra_ingresoEluPre_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_muestra_ingresoEluPre"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
       if ($this->SC_log_atv)
       {
           $this->NM_gera_log_output();
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $delim  = "'";
       $delim1 = "'";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $delim  = "#";
           $delim1 = "#";
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['sm_global_login']) ? $_SESSION['sm_global_login'] : "";
       if (strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_sqlsrv' || strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_dblib')
       { 
           $dt  = $delim . date('Ymd H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_informix))
       { 
           $dt  = "EXTEND(" . $dt . ", YEAR TO FRACTION)";
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_muestra_ingresoEluPre', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_muestra_ingresoEluPre', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_muestra_ingresoEluPre', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_muestra_ingresoEluPre_pack_ajax_response();
               exit; 
           }
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'consecutivo':
               return "Consecutivo";
               break;
           case 'turnoid':
               return "Turno ID";
               break;
           case 'casetaid':
               return "Caseta ID";
               break;
           case 'tramoid':
               return "Tramo ID";
               break;
           case 'cuerpo':
               return "Cuerpo";
               break;
           case 'usuarioid':
               return "Usuario ID";
               break;
           case 'carrilid':
               return "Carril ID";
               break;
           case 'fechaoperacion':
               return "Fecha Operacion";
               break;
           case 'fechaturno':
               return "Fecha Turno";
               break;
           case 'horainicio':
               return "Hora Inicio";
               break;
           case 'fechafin':
               return "Fecha Fin";
               break;
           case 'horafin':
               return "Hora Fin";
               break;
           case 'operacionid':
               return "Operacion ID";
               break;
           case 'foliocierre':
               return "Folio Cierre";
               break;
           case 'estatuscarril':
               return "Estatus Carril";
               break;
           case 'observacion':
               return "Observacion";
               break;
           case 'preliquidado':
               return "Pre Liquidado";
               break;
           case 'montocr':
               return "Monto CR";
               break;
           case 'montoana':
               return "Monto ANA";
               break;
           case 'cantidadmxn':
               return "Cantidad MXN";
               break;
           case 'cantidadusd':
               return "Cantidad USD";
               break;
           case 'importemxn':
               return "Importe MXN";
               break;
           case 'importeusd':
               return "Importe USD";
               break;
           case 'folioinicialcr':
               return "Folio Inicial CR";
               break;
           case 'foliofinalcr':
               return "Folio Final CR";
               break;
           case 'folioinicialeap':
               return "Folio Inicial EAP";
               break;
           case 'foliofinaleap':
               return "Folio Final EAP";
               break;
           case 'faltante':
               return "Faltante";
               break;
           case 'ingresoelu_pre':
               return "Ingreso ELU PRE";
               break;
           case 'entregado':
               return "Entregado";
               break;
           case 'administradorid':
               return "Administrador ID";
               break;
           case 'encargadoturnoid':
               return "Encargado Turno ID";
               break;
           case 'encargadoturnoid_pre':
               return "Encargado Turno ID Pre";
               break;
           case 'fechacierre':
               return "Fecha Cierre";
               break;
           case 'fechapreliq':
               return "Fecha Pre Liq";
               break;
           case 'fechaliq':
               return "Fecha Liq";
               break;
           case 'operacion':
               return "Operacion";
               break;
           case 'liquidadorid':
               return "Liquidador ID";
               break;
           case 'faltanteana':
               return "Faltante ANA";
               break;
           case 'ingresoelu_ana':
               return "Ingreso ELU ANA";
               break;
           case 'conteo':
               return "Conteo";
               break;
           case 'fechainiciodictamen':
               return "Fecha Inicio Dictamen";
               break;
           case 'fechafindictamen':
               return "Fecha Fin Dictamen";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_muestra_ingresoEluPre']) || !is_array($this->NM_ajax_info['errList']['geral_form_muestra_ingresoEluPre']))
              {
                  $this->NM_ajax_info['errList']['geral_form_muestra_ingresoEluPre'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_muestra_ingresoEluPre'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'consecutivo' == $filtro)) || (is_array($filtro) && in_array('consecutivo', $filtro)))
        $this->ValidateField_consecutivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'turnoid' == $filtro)) || (is_array($filtro) && in_array('turnoid', $filtro)))
        $this->ValidateField_turnoid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'casetaid' == $filtro)) || (is_array($filtro) && in_array('casetaid', $filtro)))
        $this->ValidateField_casetaid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tramoid' == $filtro)) || (is_array($filtro) && in_array('tramoid', $filtro)))
        $this->ValidateField_tramoid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cuerpo' == $filtro)) || (is_array($filtro) && in_array('cuerpo', $filtro)))
        $this->ValidateField_cuerpo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'usuarioid' == $filtro)) || (is_array($filtro) && in_array('usuarioid', $filtro)))
        $this->ValidateField_usuarioid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'carrilid' == $filtro)) || (is_array($filtro) && in_array('carrilid', $filtro)))
        $this->ValidateField_carrilid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechaoperacion' == $filtro)) || (is_array($filtro) && in_array('fechaoperacion', $filtro)))
        $this->ValidateField_fechaoperacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechaturno' == $filtro)) || (is_array($filtro) && in_array('fechaturno', $filtro)))
        $this->ValidateField_fechaturno($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'horainicio' == $filtro)) || (is_array($filtro) && in_array('horainicio', $filtro)))
        $this->ValidateField_horainicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechafin' == $filtro)) || (is_array($filtro) && in_array('fechafin', $filtro)))
        $this->ValidateField_fechafin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'horafin' == $filtro)) || (is_array($filtro) && in_array('horafin', $filtro)))
        $this->ValidateField_horafin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'operacionid' == $filtro)) || (is_array($filtro) && in_array('operacionid', $filtro)))
        $this->ValidateField_operacionid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'foliocierre' == $filtro)) || (is_array($filtro) && in_array('foliocierre', $filtro)))
        $this->ValidateField_foliocierre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatuscarril' == $filtro)) || (is_array($filtro) && in_array('estatuscarril', $filtro)))
        $this->ValidateField_estatuscarril($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'observacion' == $filtro)) || (is_array($filtro) && in_array('observacion', $filtro)))
        $this->ValidateField_observacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'preliquidado' == $filtro)) || (is_array($filtro) && in_array('preliquidado', $filtro)))
        $this->ValidateField_preliquidado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'montocr' == $filtro)) || (is_array($filtro) && in_array('montocr', $filtro)))
        $this->ValidateField_montocr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'montoana' == $filtro)) || (is_array($filtro) && in_array('montoana', $filtro)))
        $this->ValidateField_montoana($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cantidadmxn' == $filtro)) || (is_array($filtro) && in_array('cantidadmxn', $filtro)))
        $this->ValidateField_cantidadmxn($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cantidadusd' == $filtro)) || (is_array($filtro) && in_array('cantidadusd', $filtro)))
        $this->ValidateField_cantidadusd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importemxn' == $filtro)) || (is_array($filtro) && in_array('importemxn', $filtro)))
        $this->ValidateField_importemxn($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeusd' == $filtro)) || (is_array($filtro) && in_array('importeusd', $filtro)))
        $this->ValidateField_importeusd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'folioinicialcr' == $filtro)) || (is_array($filtro) && in_array('folioinicialcr', $filtro)))
        $this->ValidateField_folioinicialcr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'foliofinalcr' == $filtro)) || (is_array($filtro) && in_array('foliofinalcr', $filtro)))
        $this->ValidateField_foliofinalcr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'folioinicialeap' == $filtro)) || (is_array($filtro) && in_array('folioinicialeap', $filtro)))
        $this->ValidateField_folioinicialeap($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'foliofinaleap' == $filtro)) || (is_array($filtro) && in_array('foliofinaleap', $filtro)))
        $this->ValidateField_foliofinaleap($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'faltante' == $filtro)) || (is_array($filtro) && in_array('faltante', $filtro)))
        $this->ValidateField_faltante($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ingresoelu_pre' == $filtro)) || (is_array($filtro) && in_array('ingresoelu_pre', $filtro)))
        $this->ValidateField_ingresoelu_pre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'entregado' == $filtro)) || (is_array($filtro) && in_array('entregado', $filtro)))
        $this->ValidateField_entregado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'administradorid' == $filtro)) || (is_array($filtro) && in_array('administradorid', $filtro)))
        $this->ValidateField_administradorid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'encargadoturnoid' == $filtro)) || (is_array($filtro) && in_array('encargadoturnoid', $filtro)))
        $this->ValidateField_encargadoturnoid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'encargadoturnoid_pre' == $filtro)) || (is_array($filtro) && in_array('encargadoturnoid_pre', $filtro)))
        $this->ValidateField_encargadoturnoid_pre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechacierre' == $filtro)) || (is_array($filtro) && in_array('fechacierre', $filtro)))
        $this->ValidateField_fechacierre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechapreliq' == $filtro)) || (is_array($filtro) && in_array('fechapreliq', $filtro)))
        $this->ValidateField_fechapreliq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechaliq' == $filtro)) || (is_array($filtro) && in_array('fechaliq', $filtro)))
        $this->ValidateField_fechaliq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'operacion' == $filtro)) || (is_array($filtro) && in_array('operacion', $filtro)))
        $this->ValidateField_operacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'liquidadorid' == $filtro)) || (is_array($filtro) && in_array('liquidadorid', $filtro)))
        $this->ValidateField_liquidadorid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'faltanteana' == $filtro)) || (is_array($filtro) && in_array('faltanteana', $filtro)))
        $this->ValidateField_faltanteana($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ingresoelu_ana' == $filtro)) || (is_array($filtro) && in_array('ingresoelu_ana', $filtro)))
        $this->ValidateField_ingresoelu_ana($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'conteo' == $filtro)) || (is_array($filtro) && in_array('conteo', $filtro)))
        $this->ValidateField_conteo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechainiciodictamen' == $filtro)) || (is_array($filtro) && in_array('fechainiciodictamen', $filtro)))
        $this->ValidateField_fechainiciodictamen($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechafindictamen' == $filtro)) || (is_array($filtro) && in_array('fechafindictamen', $filtro)))
        $this->ValidateField_fechafindictamen($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_consecutivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->consecutivo === "" || is_null($this->consecutivo))  
      { 
          $this->consecutivo = 0;
      } 
      nm_limpa_numero($this->consecutivo, $this->field_config['consecutivo']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->consecutivo != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->consecutivo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Consecutivo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['consecutivo']))
                  {
                      $Campos_Erros['consecutivo'] = array();
                  }
                  $Campos_Erros['consecutivo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['consecutivo']) || !is_array($this->NM_ajax_info['errList']['consecutivo']))
                  {
                      $this->NM_ajax_info['errList']['consecutivo'] = array();
                  }
                  $this->NM_ajax_info['errList']['consecutivo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->consecutivo, 19, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Consecutivo; " ; 
                  if (!isset($Campos_Erros['consecutivo']))
                  {
                      $Campos_Erros['consecutivo'] = array();
                  }
                  $Campos_Erros['consecutivo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['consecutivo']) || !is_array($this->NM_ajax_info['errList']['consecutivo']))
                  {
                      $this->NM_ajax_info['errList']['consecutivo'] = array();
                  }
                  $this->NM_ajax_info['errList']['consecutivo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'consecutivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_consecutivo

    function ValidateField_turnoid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->turnoid === "" || is_null($this->turnoid))  
      { 
          $this->turnoid = 0;
          $this->sc_force_zero[] = 'turnoid';
      } 
      nm_limpa_numero($this->turnoid, $this->field_config['turnoid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->turnoid != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->turnoid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Turno ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['turnoid']))
                  {
                      $Campos_Erros['turnoid'] = array();
                  }
                  $Campos_Erros['turnoid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['turnoid']) || !is_array($this->NM_ajax_info['errList']['turnoid']))
                  {
                      $this->NM_ajax_info['errList']['turnoid'] = array();
                  }
                  $this->NM_ajax_info['errList']['turnoid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->turnoid, 3, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Turno ID; " ; 
                  if (!isset($Campos_Erros['turnoid']))
                  {
                      $Campos_Erros['turnoid'] = array();
                  }
                  $Campos_Erros['turnoid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['turnoid']) || !is_array($this->NM_ajax_info['errList']['turnoid']))
                  {
                      $this->NM_ajax_info['errList']['turnoid'] = array();
                  }
                  $this->NM_ajax_info['errList']['turnoid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'turnoid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_turnoid

    function ValidateField_casetaid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->casetaid === "" || is_null($this->casetaid))  
      { 
          $this->casetaid = 0;
          $this->sc_force_zero[] = 'casetaid';
      } 
      nm_limpa_numero($this->casetaid, $this->field_config['casetaid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->casetaid != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->casetaid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Caseta ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['casetaid']))
                  {
                      $Campos_Erros['casetaid'] = array();
                  }
                  $Campos_Erros['casetaid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['casetaid']) || !is_array($this->NM_ajax_info['errList']['casetaid']))
                  {
                      $this->NM_ajax_info['errList']['casetaid'] = array();
                  }
                  $this->NM_ajax_info['errList']['casetaid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->casetaid, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Caseta ID; " ; 
                  if (!isset($Campos_Erros['casetaid']))
                  {
                      $Campos_Erros['casetaid'] = array();
                  }
                  $Campos_Erros['casetaid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['casetaid']) || !is_array($this->NM_ajax_info['errList']['casetaid']))
                  {
                      $this->NM_ajax_info['errList']['casetaid'] = array();
                  }
                  $this->NM_ajax_info['errList']['casetaid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'casetaid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_casetaid

    function ValidateField_tramoid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tramoid === "" || is_null($this->tramoid))  
      { 
          $this->tramoid = 0;
          $this->sc_force_zero[] = 'tramoid';
      } 
      nm_limpa_numero($this->tramoid, $this->field_config['tramoid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tramoid != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->tramoid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tramo ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tramoid']))
                  {
                      $Campos_Erros['tramoid'] = array();
                  }
                  $Campos_Erros['tramoid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tramoid']) || !is_array($this->NM_ajax_info['errList']['tramoid']))
                  {
                      $this->NM_ajax_info['errList']['tramoid'] = array();
                  }
                  $this->NM_ajax_info['errList']['tramoid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tramoid, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tramo ID; " ; 
                  if (!isset($Campos_Erros['tramoid']))
                  {
                      $Campos_Erros['tramoid'] = array();
                  }
                  $Campos_Erros['tramoid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tramoid']) || !is_array($this->NM_ajax_info['errList']['tramoid']))
                  {
                      $this->NM_ajax_info['errList']['tramoid'] = array();
                  }
                  $this->NM_ajax_info['errList']['tramoid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tramoid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tramoid

    function ValidateField_cuerpo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cuerpo) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cuerpo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cuerpo']))
              {
                  $Campos_Erros['cuerpo'] = array();
              }
              $Campos_Erros['cuerpo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cuerpo']) || !is_array($this->NM_ajax_info['errList']['cuerpo']))
              {
                  $this->NM_ajax_info['errList']['cuerpo'] = array();
              }
              $this->NM_ajax_info['errList']['cuerpo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cuerpo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cuerpo

    function ValidateField_usuarioid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->usuarioid) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Usuario ID " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['usuarioid']))
              {
                  $Campos_Erros['usuarioid'] = array();
              }
              $Campos_Erros['usuarioid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['usuarioid']) || !is_array($this->NM_ajax_info['errList']['usuarioid']))
              {
                  $this->NM_ajax_info['errList']['usuarioid'] = array();
              }
              $this->NM_ajax_info['errList']['usuarioid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'usuarioid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_usuarioid

    function ValidateField_carrilid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->carrilid === "" || is_null($this->carrilid))  
      { 
          $this->carrilid = 0;
          $this->sc_force_zero[] = 'carrilid';
      } 
      nm_limpa_numero($this->carrilid, $this->field_config['carrilid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->carrilid != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->carrilid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Carril ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['carrilid']))
                  {
                      $Campos_Erros['carrilid'] = array();
                  }
                  $Campos_Erros['carrilid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['carrilid']) || !is_array($this->NM_ajax_info['errList']['carrilid']))
                  {
                      $this->NM_ajax_info['errList']['carrilid'] = array();
                  }
                  $this->NM_ajax_info['errList']['carrilid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->carrilid, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Carril ID; " ; 
                  if (!isset($Campos_Erros['carrilid']))
                  {
                      $Campos_Erros['carrilid'] = array();
                  }
                  $Campos_Erros['carrilid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['carrilid']) || !is_array($this->NM_ajax_info['errList']['carrilid']))
                  {
                      $this->NM_ajax_info['errList']['carrilid'] = array();
                  }
                  $this->NM_ajax_info['errList']['carrilid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'carrilid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_carrilid

    function ValidateField_fechaoperacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechaoperacion, $this->field_config['fechaoperacion']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechaoperacion']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechaoperacion']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechaoperacion']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechaoperacion']['date_sep']) ; 
          if (trim($this->fechaoperacion) != "")  
          { 
              if ($teste_validade->Data($this->fechaoperacion, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Operacion; " ; 
                  if (!isset($Campos_Erros['fechaoperacion']))
                  {
                      $Campos_Erros['fechaoperacion'] = array();
                  }
                  $Campos_Erros['fechaoperacion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechaoperacion']) || !is_array($this->NM_ajax_info['errList']['fechaoperacion']))
                  {
                      $this->NM_ajax_info['errList']['fechaoperacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechaoperacion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechaoperacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechaoperacion'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Fecha Operacion" ; 
              if (!isset($Campos_Erros['fechaoperacion']))
              {
                  $Campos_Erros['fechaoperacion'] = array();
              }
              $Campos_Erros['fechaoperacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fechaoperacion']) || !is_array($this->NM_ajax_info['errList']['fechaoperacion']))
                  {
                      $this->NM_ajax_info['errList']['fechaoperacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechaoperacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['fechaoperacion']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechaoperacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechaoperacion

    function ValidateField_fechaturno(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechaturno, $this->field_config['fechaturno']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechaturno']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechaturno']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechaturno']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechaturno']['date_sep']) ; 
          if (trim($this->fechaturno) != "")  
          { 
              if ($teste_validade->Data($this->fechaturno, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Turno; " ; 
                  if (!isset($Campos_Erros['fechaturno']))
                  {
                      $Campos_Erros['fechaturno'] = array();
                  }
                  $Campos_Erros['fechaturno'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechaturno']) || !is_array($this->NM_ajax_info['errList']['fechaturno']))
                  {
                      $this->NM_ajax_info['errList']['fechaturno'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechaturno'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechaturno']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechaturno'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Fecha Turno" ; 
              if (!isset($Campos_Erros['fechaturno']))
              {
                  $Campos_Erros['fechaturno'] = array();
              }
              $Campos_Erros['fechaturno'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fechaturno']) || !is_array($this->NM_ajax_info['errList']['fechaturno']))
                  {
                      $this->NM_ajax_info['errList']['fechaturno'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechaturno'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['fechaturno']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechaturno';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechaturno

    function ValidateField_horainicio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->horainicio, $this->field_config['horainicio']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['horainicio']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['horainicio']['time_sep']) ; 
          if (trim($this->horainicio) != "")  
          { 
              if ($teste_validade->Hora($this->horainicio, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Inicio; " ; 
                  if (!isset($Campos_Erros['horainicio']))
                  {
                      $Campos_Erros['horainicio'] = array();
                  }
                  $Campos_Erros['horainicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['horainicio']) || !is_array($this->NM_ajax_info['errList']['horainicio']))
                  {
                      $this->NM_ajax_info['errList']['horainicio'] = array();
                  }
                  $this->NM_ajax_info['errList']['horainicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['horainicio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['horainicio'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Hora Inicio" ; 
              if (!isset($Campos_Erros['horainicio']))
              {
                  $Campos_Erros['horainicio'] = array();
              }
              $Campos_Erros['horainicio'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['horainicio']) || !is_array($this->NM_ajax_info['errList']['horainicio']))
                  {
                      $this->NM_ajax_info['errList']['horainicio'] = array();
                  }
                  $this->NM_ajax_info['errList']['horainicio'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'horainicio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_horainicio

    function ValidateField_fechafin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechafin, $this->field_config['fechafin']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechafin']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechafin']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechafin']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechafin']['date_sep']) ; 
          if (trim($this->fechafin) != "")  
          { 
              if ($teste_validade->Data($this->fechafin, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Fin; " ; 
                  if (!isset($Campos_Erros['fechafin']))
                  {
                      $Campos_Erros['fechafin'] = array();
                  }
                  $Campos_Erros['fechafin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechafin']) || !is_array($this->NM_ajax_info['errList']['fechafin']))
                  {
                      $this->NM_ajax_info['errList']['fechafin'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechafin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechafin']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechafin'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Fecha Fin" ; 
              if (!isset($Campos_Erros['fechafin']))
              {
                  $Campos_Erros['fechafin'] = array();
              }
              $Campos_Erros['fechafin'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fechafin']) || !is_array($this->NM_ajax_info['errList']['fechafin']))
                  {
                      $this->NM_ajax_info['errList']['fechafin'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechafin'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['fechafin']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechafin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechafin

    function ValidateField_horafin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->horafin, $this->field_config['horafin']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['horafin']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['horafin']['time_sep']) ; 
          if (trim($this->horafin) != "")  
          { 
              if ($teste_validade->Hora($this->horafin, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Fin; " ; 
                  if (!isset($Campos_Erros['horafin']))
                  {
                      $Campos_Erros['horafin'] = array();
                  }
                  $Campos_Erros['horafin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['horafin']) || !is_array($this->NM_ajax_info['errList']['horafin']))
                  {
                      $this->NM_ajax_info['errList']['horafin'] = array();
                  }
                  $this->NM_ajax_info['errList']['horafin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['horafin']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['horafin'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Hora Fin" ; 
              if (!isset($Campos_Erros['horafin']))
              {
                  $Campos_Erros['horafin'] = array();
              }
              $Campos_Erros['horafin'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['horafin']) || !is_array($this->NM_ajax_info['errList']['horafin']))
                  {
                      $this->NM_ajax_info['errList']['horafin'] = array();
                  }
                  $this->NM_ajax_info['errList']['horafin'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'horafin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_horafin

    function ValidateField_operacionid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->operacionid) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Operacion ID " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['operacionid']))
              {
                  $Campos_Erros['operacionid'] = array();
              }
              $Campos_Erros['operacionid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['operacionid']) || !is_array($this->NM_ajax_info['errList']['operacionid']))
              {
                  $this->NM_ajax_info['errList']['operacionid'] = array();
              }
              $this->NM_ajax_info['errList']['operacionid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'operacionid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_operacionid

    function ValidateField_foliocierre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->foliocierre) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Folio Cierre " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['foliocierre']))
              {
                  $Campos_Erros['foliocierre'] = array();
              }
              $Campos_Erros['foliocierre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['foliocierre']) || !is_array($this->NM_ajax_info['errList']['foliocierre']))
              {
                  $this->NM_ajax_info['errList']['foliocierre'] = array();
              }
              $this->NM_ajax_info['errList']['foliocierre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'foliocierre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_foliocierre

    function ValidateField_estatuscarril(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->estatuscarril) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Estatus Carril " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['estatuscarril']))
              {
                  $Campos_Erros['estatuscarril'] = array();
              }
              $Campos_Erros['estatuscarril'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['estatuscarril']) || !is_array($this->NM_ajax_info['errList']['estatuscarril']))
              {
                  $this->NM_ajax_info['errList']['estatuscarril'] = array();
              }
              $this->NM_ajax_info['errList']['estatuscarril'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatuscarril';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatuscarril

    function ValidateField_observacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observacion) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Observacion " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['observacion']))
              {
                  $Campos_Erros['observacion'] = array();
              }
              $Campos_Erros['observacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['observacion']) || !is_array($this->NM_ajax_info['errList']['observacion']))
              {
                  $this->NM_ajax_info['errList']['observacion'] = array();
              }
              $this->NM_ajax_info['errList']['observacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'observacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_observacion

    function ValidateField_preliquidado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->preliquidado === "" || is_null($this->preliquidado))  
      { 
          $this->preliquidado = 0;
          $this->sc_force_zero[] = 'preliquidado';
      } 
      nm_limpa_numero($this->preliquidado, $this->field_config['preliquidado']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->preliquidado != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->preliquidado) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Pre Liquidado: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['preliquidado']))
                  {
                      $Campos_Erros['preliquidado'] = array();
                  }
                  $Campos_Erros['preliquidado'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['preliquidado']) || !is_array($this->NM_ajax_info['errList']['preliquidado']))
                  {
                      $this->NM_ajax_info['errList']['preliquidado'] = array();
                  }
                  $this->NM_ajax_info['errList']['preliquidado'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->preliquidado, 3, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Pre Liquidado; " ; 
                  if (!isset($Campos_Erros['preliquidado']))
                  {
                      $Campos_Erros['preliquidado'] = array();
                  }
                  $Campos_Erros['preliquidado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['preliquidado']) || !is_array($this->NM_ajax_info['errList']['preliquidado']))
                  {
                      $this->NM_ajax_info['errList']['preliquidado'] = array();
                  }
                  $this->NM_ajax_info['errList']['preliquidado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'preliquidado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_preliquidado

    function ValidateField_montocr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->montocr === "" || is_null($this->montocr))  
      { 
          $this->montocr = 0;
          $this->sc_force_zero[] = 'montocr';
      } 
      }
      if (!empty($this->field_config['montocr']['symbol_dec']))
      {
          $this->sc_remove_currency($this->montocr, $this->field_config['montocr']['symbol_dec'], $this->field_config['montocr']['symbol_grp'], $this->field_config['montocr']['symbol_mon']); 
          nm_limpa_valor($this->montocr, $this->field_config['montocr']['symbol_dec'], $this->field_config['montocr']['symbol_grp']) ; 
          if ('.' == substr($this->montocr, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->montocr, 1)))
              {
                  $this->montocr = '';
              }
              else
              {
                  $this->montocr = '0' . $this->montocr;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->montocr != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->montocr) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Monto CR: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['montocr']))
                  {
                      $Campos_Erros['montocr'] = array();
                  }
                  $Campos_Erros['montocr'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['montocr']) || !is_array($this->NM_ajax_info['errList']['montocr']))
                  {
                      $this->NM_ajax_info['errList']['montocr'] = array();
                  }
                  $this->NM_ajax_info['errList']['montocr'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->montocr, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Monto CR; " ; 
                  if (!isset($Campos_Erros['montocr']))
                  {
                      $Campos_Erros['montocr'] = array();
                  }
                  $Campos_Erros['montocr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['montocr']) || !is_array($this->NM_ajax_info['errList']['montocr']))
                  {
                      $this->NM_ajax_info['errList']['montocr'] = array();
                  }
                  $this->NM_ajax_info['errList']['montocr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'montocr';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_montocr

    function ValidateField_montoana(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->montoana === "" || is_null($this->montoana))  
      { 
          $this->montoana = 0;
          $this->sc_force_zero[] = 'montoana';
      } 
      if (!empty($this->field_config['montoana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->montoana, $this->field_config['montoana']['symbol_dec'], $this->field_config['montoana']['symbol_grp'], $this->field_config['montoana']['symbol_mon']); 
          nm_limpa_valor($this->montoana, $this->field_config['montoana']['symbol_dec'], $this->field_config['montoana']['symbol_grp']) ; 
          if ('.' == substr($this->montoana, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->montoana, 1)))
              {
                  $this->montoana = '';
              }
              else
              {
                  $this->montoana = '0' . $this->montoana;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->montoana != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->montoana) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Monto ANA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['montoana']))
                  {
                      $Campos_Erros['montoana'] = array();
                  }
                  $Campos_Erros['montoana'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['montoana']) || !is_array($this->NM_ajax_info['errList']['montoana']))
                  {
                      $this->NM_ajax_info['errList']['montoana'] = array();
                  }
                  $this->NM_ajax_info['errList']['montoana'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->montoana, 18, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Monto ANA; " ; 
                  if (!isset($Campos_Erros['montoana']))
                  {
                      $Campos_Erros['montoana'] = array();
                  }
                  $Campos_Erros['montoana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['montoana']) || !is_array($this->NM_ajax_info['errList']['montoana']))
                  {
                      $this->NM_ajax_info['errList']['montoana'] = array();
                  }
                  $this->NM_ajax_info['errList']['montoana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'montoana';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_montoana

    function ValidateField_cantidadmxn(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cantidadmxn === "" || is_null($this->cantidadmxn))  
      { 
          $this->cantidadmxn = 0;
          $this->sc_force_zero[] = 'cantidadmxn';
      } 
      nm_limpa_numero($this->cantidadmxn, $this->field_config['cantidadmxn']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cantidadmxn != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->cantidadmxn) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad MXN: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidadmxn']))
                  {
                      $Campos_Erros['cantidadmxn'] = array();
                  }
                  $Campos_Erros['cantidadmxn'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidadmxn']) || !is_array($this->NM_ajax_info['errList']['cantidadmxn']))
                  {
                      $this->NM_ajax_info['errList']['cantidadmxn'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidadmxn'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidadmxn, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad MXN; " ; 
                  if (!isset($Campos_Erros['cantidadmxn']))
                  {
                      $Campos_Erros['cantidadmxn'] = array();
                  }
                  $Campos_Erros['cantidadmxn'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidadmxn']) || !is_array($this->NM_ajax_info['errList']['cantidadmxn']))
                  {
                      $this->NM_ajax_info['errList']['cantidadmxn'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidadmxn'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cantidadmxn';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cantidadmxn

    function ValidateField_cantidadusd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cantidadusd === "" || is_null($this->cantidadusd))  
      { 
          $this->cantidadusd = 0;
          $this->sc_force_zero[] = 'cantidadusd';
      } 
      nm_limpa_numero($this->cantidadusd, $this->field_config['cantidadusd']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cantidadusd != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->cantidadusd) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad USD: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidadusd']))
                  {
                      $Campos_Erros['cantidadusd'] = array();
                  }
                  $Campos_Erros['cantidadusd'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidadusd']) || !is_array($this->NM_ajax_info['errList']['cantidadusd']))
                  {
                      $this->NM_ajax_info['errList']['cantidadusd'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidadusd'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidadusd, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad USD; " ; 
                  if (!isset($Campos_Erros['cantidadusd']))
                  {
                      $Campos_Erros['cantidadusd'] = array();
                  }
                  $Campos_Erros['cantidadusd'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidadusd']) || !is_array($this->NM_ajax_info['errList']['cantidadusd']))
                  {
                      $this->NM_ajax_info['errList']['cantidadusd'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidadusd'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cantidadusd';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cantidadusd

    function ValidateField_importemxn(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->importemxn === "" || is_null($this->importemxn))  
      { 
          $this->importemxn = 0;
          $this->sc_force_zero[] = 'importemxn';
      } 
      }
      if (!empty($this->field_config['importemxn']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importemxn, $this->field_config['importemxn']['symbol_dec'], $this->field_config['importemxn']['symbol_grp'], $this->field_config['importemxn']['symbol_mon']); 
          nm_limpa_valor($this->importemxn, $this->field_config['importemxn']['symbol_dec'], $this->field_config['importemxn']['symbol_grp']) ; 
          if ('.' == substr($this->importemxn, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importemxn, 1)))
              {
                  $this->importemxn = '';
              }
              else
              {
                  $this->importemxn = '0' . $this->importemxn;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importemxn != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->importemxn) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe MXN: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importemxn']))
                  {
                      $Campos_Erros['importemxn'] = array();
                  }
                  $Campos_Erros['importemxn'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importemxn']) || !is_array($this->NM_ajax_info['errList']['importemxn']))
                  {
                      $this->NM_ajax_info['errList']['importemxn'] = array();
                  }
                  $this->NM_ajax_info['errList']['importemxn'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importemxn, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe MXN; " ; 
                  if (!isset($Campos_Erros['importemxn']))
                  {
                      $Campos_Erros['importemxn'] = array();
                  }
                  $Campos_Erros['importemxn'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importemxn']) || !is_array($this->NM_ajax_info['errList']['importemxn']))
                  {
                      $this->NM_ajax_info['errList']['importemxn'] = array();
                  }
                  $this->NM_ajax_info['errList']['importemxn'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importemxn';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importemxn

    function ValidateField_importeusd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->importeusd === "" || is_null($this->importeusd))  
      { 
          $this->importeusd = 0;
          $this->sc_force_zero[] = 'importeusd';
      } 
      }
      if (!empty($this->field_config['importeusd']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeusd, $this->field_config['importeusd']['symbol_dec'], $this->field_config['importeusd']['symbol_grp'], $this->field_config['importeusd']['symbol_mon']); 
          nm_limpa_valor($this->importeusd, $this->field_config['importeusd']['symbol_dec'], $this->field_config['importeusd']['symbol_grp']) ; 
          if ('.' == substr($this->importeusd, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeusd, 1)))
              {
                  $this->importeusd = '';
              }
              else
              {
                  $this->importeusd = '0' . $this->importeusd;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeusd != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->importeusd) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe USD: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeusd']))
                  {
                      $Campos_Erros['importeusd'] = array();
                  }
                  $Campos_Erros['importeusd'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeusd']) || !is_array($this->NM_ajax_info['errList']['importeusd']))
                  {
                      $this->NM_ajax_info['errList']['importeusd'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeusd'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeusd, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe USD; " ; 
                  if (!isset($Campos_Erros['importeusd']))
                  {
                      $Campos_Erros['importeusd'] = array();
                  }
                  $Campos_Erros['importeusd'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeusd']) || !is_array($this->NM_ajax_info['errList']['importeusd']))
                  {
                      $this->NM_ajax_info['errList']['importeusd'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeusd'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeusd';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeusd

    function ValidateField_folioinicialcr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->folioinicialcr === "" || is_null($this->folioinicialcr))  
      { 
          $this->folioinicialcr = 0;
          $this->sc_force_zero[] = 'folioinicialcr';
      } 
      nm_limpa_numero($this->folioinicialcr, $this->field_config['folioinicialcr']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->folioinicialcr != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->folioinicialcr) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Folio Inicial CR: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['folioinicialcr']))
                  {
                      $Campos_Erros['folioinicialcr'] = array();
                  }
                  $Campos_Erros['folioinicialcr'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['folioinicialcr']) || !is_array($this->NM_ajax_info['errList']['folioinicialcr']))
                  {
                      $this->NM_ajax_info['errList']['folioinicialcr'] = array();
                  }
                  $this->NM_ajax_info['errList']['folioinicialcr'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->folioinicialcr, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Folio Inicial CR; " ; 
                  if (!isset($Campos_Erros['folioinicialcr']))
                  {
                      $Campos_Erros['folioinicialcr'] = array();
                  }
                  $Campos_Erros['folioinicialcr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['folioinicialcr']) || !is_array($this->NM_ajax_info['errList']['folioinicialcr']))
                  {
                      $this->NM_ajax_info['errList']['folioinicialcr'] = array();
                  }
                  $this->NM_ajax_info['errList']['folioinicialcr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'folioinicialcr';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_folioinicialcr

    function ValidateField_foliofinalcr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->foliofinalcr === "" || is_null($this->foliofinalcr))  
      { 
          $this->foliofinalcr = 0;
          $this->sc_force_zero[] = 'foliofinalcr';
      } 
      nm_limpa_numero($this->foliofinalcr, $this->field_config['foliofinalcr']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->foliofinalcr != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->foliofinalcr) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Folio Final CR: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['foliofinalcr']))
                  {
                      $Campos_Erros['foliofinalcr'] = array();
                  }
                  $Campos_Erros['foliofinalcr'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['foliofinalcr']) || !is_array($this->NM_ajax_info['errList']['foliofinalcr']))
                  {
                      $this->NM_ajax_info['errList']['foliofinalcr'] = array();
                  }
                  $this->NM_ajax_info['errList']['foliofinalcr'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->foliofinalcr, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Folio Final CR; " ; 
                  if (!isset($Campos_Erros['foliofinalcr']))
                  {
                      $Campos_Erros['foliofinalcr'] = array();
                  }
                  $Campos_Erros['foliofinalcr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['foliofinalcr']) || !is_array($this->NM_ajax_info['errList']['foliofinalcr']))
                  {
                      $this->NM_ajax_info['errList']['foliofinalcr'] = array();
                  }
                  $this->NM_ajax_info['errList']['foliofinalcr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'foliofinalcr';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_foliofinalcr

    function ValidateField_folioinicialeap(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->folioinicialeap === "" || is_null($this->folioinicialeap))  
      { 
          $this->folioinicialeap = 0;
          $this->sc_force_zero[] = 'folioinicialeap';
      } 
      nm_limpa_numero($this->folioinicialeap, $this->field_config['folioinicialeap']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->folioinicialeap != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->folioinicialeap) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Folio Inicial EAP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['folioinicialeap']))
                  {
                      $Campos_Erros['folioinicialeap'] = array();
                  }
                  $Campos_Erros['folioinicialeap'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['folioinicialeap']) || !is_array($this->NM_ajax_info['errList']['folioinicialeap']))
                  {
                      $this->NM_ajax_info['errList']['folioinicialeap'] = array();
                  }
                  $this->NM_ajax_info['errList']['folioinicialeap'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->folioinicialeap, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Folio Inicial EAP; " ; 
                  if (!isset($Campos_Erros['folioinicialeap']))
                  {
                      $Campos_Erros['folioinicialeap'] = array();
                  }
                  $Campos_Erros['folioinicialeap'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['folioinicialeap']) || !is_array($this->NM_ajax_info['errList']['folioinicialeap']))
                  {
                      $this->NM_ajax_info['errList']['folioinicialeap'] = array();
                  }
                  $this->NM_ajax_info['errList']['folioinicialeap'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'folioinicialeap';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_folioinicialeap

    function ValidateField_foliofinaleap(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->foliofinaleap === "" || is_null($this->foliofinaleap))  
      { 
          $this->foliofinaleap = 0;
          $this->sc_force_zero[] = 'foliofinaleap';
      } 
      nm_limpa_numero($this->foliofinaleap, $this->field_config['foliofinaleap']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->foliofinaleap != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->foliofinaleap) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Folio Final EAP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['foliofinaleap']))
                  {
                      $Campos_Erros['foliofinaleap'] = array();
                  }
                  $Campos_Erros['foliofinaleap'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['foliofinaleap']) || !is_array($this->NM_ajax_info['errList']['foliofinaleap']))
                  {
                      $this->NM_ajax_info['errList']['foliofinaleap'] = array();
                  }
                  $this->NM_ajax_info['errList']['foliofinaleap'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->foliofinaleap, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Folio Final EAP; " ; 
                  if (!isset($Campos_Erros['foliofinaleap']))
                  {
                      $Campos_Erros['foliofinaleap'] = array();
                  }
                  $Campos_Erros['foliofinaleap'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['foliofinaleap']) || !is_array($this->NM_ajax_info['errList']['foliofinaleap']))
                  {
                      $this->NM_ajax_info['errList']['foliofinaleap'] = array();
                  }
                  $this->NM_ajax_info['errList']['foliofinaleap'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'foliofinaleap';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_foliofinaleap

    function ValidateField_faltante(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->faltante === "" || is_null($this->faltante))  
      { 
          $this->faltante = 0;
          $this->sc_force_zero[] = 'faltante';
      } 
      }
      if (!empty($this->field_config['faltante']['symbol_dec']))
      {
          $this->sc_remove_currency($this->faltante, $this->field_config['faltante']['symbol_dec'], $this->field_config['faltante']['symbol_grp'], $this->field_config['faltante']['symbol_mon']); 
          nm_limpa_valor($this->faltante, $this->field_config['faltante']['symbol_dec'], $this->field_config['faltante']['symbol_grp']) ; 
          if ('.' == substr($this->faltante, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->faltante, 1)))
              {
                  $this->faltante = '';
              }
              else
              {
                  $this->faltante = '0' . $this->faltante;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->faltante != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->faltante) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Faltante: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['faltante']))
                  {
                      $Campos_Erros['faltante'] = array();
                  }
                  $Campos_Erros['faltante'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['faltante']) || !is_array($this->NM_ajax_info['errList']['faltante']))
                  {
                      $this->NM_ajax_info['errList']['faltante'] = array();
                  }
                  $this->NM_ajax_info['errList']['faltante'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->faltante, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Faltante; " ; 
                  if (!isset($Campos_Erros['faltante']))
                  {
                      $Campos_Erros['faltante'] = array();
                  }
                  $Campos_Erros['faltante'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['faltante']) || !is_array($this->NM_ajax_info['errList']['faltante']))
                  {
                      $this->NM_ajax_info['errList']['faltante'] = array();
                  }
                  $this->NM_ajax_info['errList']['faltante'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'faltante';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_faltante

    function ValidateField_ingresoelu_pre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ingresoelu_pre === "" || is_null($this->ingresoelu_pre))  
      { 
          $this->ingresoelu_pre = 0;
          $this->sc_force_zero[] = 'ingresoelu_pre';
      } 
      nm_limpa_numero($this->ingresoelu_pre, $this->field_config['ingresoelu_pre']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ingresoelu_pre != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->ingresoelu_pre) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ingreso ELU PRE: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ingresoelu_pre']))
                  {
                      $Campos_Erros['ingresoelu_pre'] = array();
                  }
                  $Campos_Erros['ingresoelu_pre'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ingresoelu_pre']) || !is_array($this->NM_ajax_info['errList']['ingresoelu_pre']))
                  {
                      $this->NM_ajax_info['errList']['ingresoelu_pre'] = array();
                  }
                  $this->NM_ajax_info['errList']['ingresoelu_pre'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ingresoelu_pre, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ingreso ELU PRE; " ; 
                  if (!isset($Campos_Erros['ingresoelu_pre']))
                  {
                      $Campos_Erros['ingresoelu_pre'] = array();
                  }
                  $Campos_Erros['ingresoelu_pre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ingresoelu_pre']) || !is_array($this->NM_ajax_info['errList']['ingresoelu_pre']))
                  {
                      $this->NM_ajax_info['errList']['ingresoelu_pre'] = array();
                  }
                  $this->NM_ajax_info['errList']['ingresoelu_pre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ingresoelu_pre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ingresoelu_pre

    function ValidateField_entregado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->entregado === "" || is_null($this->entregado))  
      { 
          $this->entregado = 0;
          $this->sc_force_zero[] = 'entregado';
      } 
      }
      if (!empty($this->field_config['entregado']['symbol_dec']))
      {
          $this->sc_remove_currency($this->entregado, $this->field_config['entregado']['symbol_dec'], $this->field_config['entregado']['symbol_grp'], $this->field_config['entregado']['symbol_mon']); 
          nm_limpa_valor($this->entregado, $this->field_config['entregado']['symbol_dec'], $this->field_config['entregado']['symbol_grp']) ; 
          if ('.' == substr($this->entregado, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->entregado, 1)))
              {
                  $this->entregado = '';
              }
              else
              {
                  $this->entregado = '0' . $this->entregado;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->entregado != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->entregado) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Entregado: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['entregado']))
                  {
                      $Campos_Erros['entregado'] = array();
                  }
                  $Campos_Erros['entregado'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['entregado']) || !is_array($this->NM_ajax_info['errList']['entregado']))
                  {
                      $this->NM_ajax_info['errList']['entregado'] = array();
                  }
                  $this->NM_ajax_info['errList']['entregado'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->entregado, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Entregado; " ; 
                  if (!isset($Campos_Erros['entregado']))
                  {
                      $Campos_Erros['entregado'] = array();
                  }
                  $Campos_Erros['entregado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['entregado']) || !is_array($this->NM_ajax_info['errList']['entregado']))
                  {
                      $this->NM_ajax_info['errList']['entregado'] = array();
                  }
                  $this->NM_ajax_info['errList']['entregado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'entregado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_entregado

    function ValidateField_administradorid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->administradorid === "" || is_null($this->administradorid))  
      { 
          $this->administradorid = 0;
          $this->sc_force_zero[] = 'administradorid';
      } 
      nm_limpa_numero($this->administradorid, $this->field_config['administradorid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->administradorid != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->administradorid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Administrador ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['administradorid']))
                  {
                      $Campos_Erros['administradorid'] = array();
                  }
                  $Campos_Erros['administradorid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['administradorid']) || !is_array($this->NM_ajax_info['errList']['administradorid']))
                  {
                      $this->NM_ajax_info['errList']['administradorid'] = array();
                  }
                  $this->NM_ajax_info['errList']['administradorid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->administradorid, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Administrador ID; " ; 
                  if (!isset($Campos_Erros['administradorid']))
                  {
                      $Campos_Erros['administradorid'] = array();
                  }
                  $Campos_Erros['administradorid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['administradorid']) || !is_array($this->NM_ajax_info['errList']['administradorid']))
                  {
                      $this->NM_ajax_info['errList']['administradorid'] = array();
                  }
                  $this->NM_ajax_info['errList']['administradorid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'administradorid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_administradorid

    function ValidateField_encargadoturnoid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->encargadoturnoid === "" || is_null($this->encargadoturnoid))  
      { 
          $this->encargadoturnoid = 0;
          $this->sc_force_zero[] = 'encargadoturnoid';
      } 
      nm_limpa_numero($this->encargadoturnoid, $this->field_config['encargadoturnoid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->encargadoturnoid != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->encargadoturnoid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Encargado Turno ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['encargadoturnoid']))
                  {
                      $Campos_Erros['encargadoturnoid'] = array();
                  }
                  $Campos_Erros['encargadoturnoid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['encargadoturnoid']) || !is_array($this->NM_ajax_info['errList']['encargadoturnoid']))
                  {
                      $this->NM_ajax_info['errList']['encargadoturnoid'] = array();
                  }
                  $this->NM_ajax_info['errList']['encargadoturnoid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->encargadoturnoid, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Encargado Turno ID; " ; 
                  if (!isset($Campos_Erros['encargadoturnoid']))
                  {
                      $Campos_Erros['encargadoturnoid'] = array();
                  }
                  $Campos_Erros['encargadoturnoid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['encargadoturnoid']) || !is_array($this->NM_ajax_info['errList']['encargadoturnoid']))
                  {
                      $this->NM_ajax_info['errList']['encargadoturnoid'] = array();
                  }
                  $this->NM_ajax_info['errList']['encargadoturnoid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'encargadoturnoid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_encargadoturnoid

    function ValidateField_encargadoturnoid_pre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->encargadoturnoid_pre === "" || is_null($this->encargadoturnoid_pre))  
      { 
          $this->encargadoturnoid_pre = 0;
          $this->sc_force_zero[] = 'encargadoturnoid_pre';
      } 
      nm_limpa_numero($this->encargadoturnoid_pre, $this->field_config['encargadoturnoid_pre']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->encargadoturnoid_pre != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->encargadoturnoid_pre) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Encargado Turno ID Pre: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['encargadoturnoid_pre']))
                  {
                      $Campos_Erros['encargadoturnoid_pre'] = array();
                  }
                  $Campos_Erros['encargadoturnoid_pre'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['encargadoturnoid_pre']) || !is_array($this->NM_ajax_info['errList']['encargadoturnoid_pre']))
                  {
                      $this->NM_ajax_info['errList']['encargadoturnoid_pre'] = array();
                  }
                  $this->NM_ajax_info['errList']['encargadoturnoid_pre'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->encargadoturnoid_pre, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Encargado Turno ID Pre; " ; 
                  if (!isset($Campos_Erros['encargadoturnoid_pre']))
                  {
                      $Campos_Erros['encargadoturnoid_pre'] = array();
                  }
                  $Campos_Erros['encargadoturnoid_pre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['encargadoturnoid_pre']) || !is_array($this->NM_ajax_info['errList']['encargadoturnoid_pre']))
                  {
                      $this->NM_ajax_info['errList']['encargadoturnoid_pre'] = array();
                  }
                  $this->NM_ajax_info['errList']['encargadoturnoid_pre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'encargadoturnoid_pre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_encargadoturnoid_pre

    function ValidateField_fechacierre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechacierre, $this->field_config['fechacierre']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechacierre']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechacierre']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechacierre']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechacierre']['date_sep']) ; 
          if (trim($this->fechacierre) != "")  
          { 
              if ($teste_validade->Data($this->fechacierre, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Cierre; " ; 
                  if (!isset($Campos_Erros['fechacierre']))
                  {
                      $Campos_Erros['fechacierre'] = array();
                  }
                  $Campos_Erros['fechacierre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechacierre']) || !is_array($this->NM_ajax_info['errList']['fechacierre']))
                  {
                      $this->NM_ajax_info['errList']['fechacierre'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechacierre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fechacierre']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechacierre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fechacierre_hora, $this->field_config['fechacierre_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fechacierre_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fechacierre_hora']['time_sep']) ; 
          if (trim($this->fechacierre_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fechacierre_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Cierre; " ; 
                  if (!isset($Campos_Erros['fechacierre_hora']))
                  {
                      $Campos_Erros['fechacierre_hora'] = array();
                  }
                  $Campos_Erros['fechacierre_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechacierre']) || !is_array($this->NM_ajax_info['errList']['fechacierre']))
                  {
                      $this->NM_ajax_info['errList']['fechacierre'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechacierre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fechacierre']) && isset($Campos_Erros['fechacierre_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fechacierre'], $Campos_Erros['fechacierre_hora']);
          if (empty($Campos_Erros['fechacierre_hora']))
          {
              unset($Campos_Erros['fechacierre_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fechacierre']))
          {
              $this->NM_ajax_info['errList']['fechacierre'] = array_unique($this->NM_ajax_info['errList']['fechacierre']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechacierre_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechacierre_hora

    function ValidateField_fechapreliq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechapreliq, $this->field_config['fechapreliq']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechapreliq']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechapreliq']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechapreliq']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechapreliq']['date_sep']) ; 
          if (trim($this->fechapreliq) != "")  
          { 
              if ($teste_validade->Data($this->fechapreliq, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Pre Liq; " ; 
                  if (!isset($Campos_Erros['fechapreliq']))
                  {
                      $Campos_Erros['fechapreliq'] = array();
                  }
                  $Campos_Erros['fechapreliq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechapreliq']) || !is_array($this->NM_ajax_info['errList']['fechapreliq']))
                  {
                      $this->NM_ajax_info['errList']['fechapreliq'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechapreliq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fechapreliq']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechapreliq';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fechapreliq_hora, $this->field_config['fechapreliq_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fechapreliq_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fechapreliq_hora']['time_sep']) ; 
          if (trim($this->fechapreliq_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fechapreliq_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Pre Liq; " ; 
                  if (!isset($Campos_Erros['fechapreliq_hora']))
                  {
                      $Campos_Erros['fechapreliq_hora'] = array();
                  }
                  $Campos_Erros['fechapreliq_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechapreliq']) || !is_array($this->NM_ajax_info['errList']['fechapreliq']))
                  {
                      $this->NM_ajax_info['errList']['fechapreliq'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechapreliq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fechapreliq']) && isset($Campos_Erros['fechapreliq_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fechapreliq'], $Campos_Erros['fechapreliq_hora']);
          if (empty($Campos_Erros['fechapreliq_hora']))
          {
              unset($Campos_Erros['fechapreliq_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fechapreliq']))
          {
              $this->NM_ajax_info['errList']['fechapreliq'] = array_unique($this->NM_ajax_info['errList']['fechapreliq']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechapreliq_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechapreliq_hora

    function ValidateField_fechaliq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechaliq, $this->field_config['fechaliq']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechaliq']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechaliq']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechaliq']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechaliq']['date_sep']) ; 
          if (trim($this->fechaliq) != "")  
          { 
              if ($teste_validade->Data($this->fechaliq, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Liq; " ; 
                  if (!isset($Campos_Erros['fechaliq']))
                  {
                      $Campos_Erros['fechaliq'] = array();
                  }
                  $Campos_Erros['fechaliq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechaliq']) || !is_array($this->NM_ajax_info['errList']['fechaliq']))
                  {
                      $this->NM_ajax_info['errList']['fechaliq'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechaliq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fechaliq']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechaliq';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fechaliq_hora, $this->field_config['fechaliq_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fechaliq_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fechaliq_hora']['time_sep']) ; 
          if (trim($this->fechaliq_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fechaliq_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Liq; " ; 
                  if (!isset($Campos_Erros['fechaliq_hora']))
                  {
                      $Campos_Erros['fechaliq_hora'] = array();
                  }
                  $Campos_Erros['fechaliq_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechaliq']) || !is_array($this->NM_ajax_info['errList']['fechaliq']))
                  {
                      $this->NM_ajax_info['errList']['fechaliq'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechaliq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fechaliq']) && isset($Campos_Erros['fechaliq_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fechaliq'], $Campos_Erros['fechaliq_hora']);
          if (empty($Campos_Erros['fechaliq_hora']))
          {
              unset($Campos_Erros['fechaliq_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fechaliq']))
          {
              $this->NM_ajax_info['errList']['fechaliq'] = array_unique($this->NM_ajax_info['errList']['fechaliq']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechaliq_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechaliq_hora

    function ValidateField_operacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->operacion === "" || is_null($this->operacion))  
      { 
          $this->operacion = 0;
          $this->sc_force_zero[] = 'operacion';
      } 
      if (!empty($this->field_config['operacion']['symbol_dec']))
      {
          $this->sc_remove_currency($this->operacion, $this->field_config['operacion']['symbol_dec'], $this->field_config['operacion']['symbol_grp'], $this->field_config['operacion']['symbol_mon']); 
          nm_limpa_valor($this->operacion, $this->field_config['operacion']['symbol_dec'], $this->field_config['operacion']['symbol_grp']) ; 
          if ('.' == substr($this->operacion, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->operacion, 1)))
              {
                  $this->operacion = '';
              }
              else
              {
                  $this->operacion = '0' . $this->operacion;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->operacion != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->operacion) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Operacion: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['operacion']))
                  {
                      $Campos_Erros['operacion'] = array();
                  }
                  $Campos_Erros['operacion'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['operacion']) || !is_array($this->NM_ajax_info['errList']['operacion']))
                  {
                      $this->NM_ajax_info['errList']['operacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['operacion'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->operacion, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Operacion; " ; 
                  if (!isset($Campos_Erros['operacion']))
                  {
                      $Campos_Erros['operacion'] = array();
                  }
                  $Campos_Erros['operacion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['operacion']) || !is_array($this->NM_ajax_info['errList']['operacion']))
                  {
                      $this->NM_ajax_info['errList']['operacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['operacion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'operacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_operacion

    function ValidateField_liquidadorid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->liquidadorid) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Liquidador ID " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['liquidadorid']))
              {
                  $Campos_Erros['liquidadorid'] = array();
              }
              $Campos_Erros['liquidadorid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['liquidadorid']) || !is_array($this->NM_ajax_info['errList']['liquidadorid']))
              {
                  $this->NM_ajax_info['errList']['liquidadorid'] = array();
              }
              $this->NM_ajax_info['errList']['liquidadorid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'liquidadorid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_liquidadorid

    function ValidateField_faltanteana(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->faltanteana === "" || is_null($this->faltanteana))  
      { 
          $this->faltanteana = 0;
          $this->sc_force_zero[] = 'faltanteana';
      } 
      }
      if (!empty($this->field_config['faltanteana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->faltanteana, $this->field_config['faltanteana']['symbol_dec'], $this->field_config['faltanteana']['symbol_grp'], $this->field_config['faltanteana']['symbol_mon']); 
          nm_limpa_valor($this->faltanteana, $this->field_config['faltanteana']['symbol_dec'], $this->field_config['faltanteana']['symbol_grp']) ; 
          if ('.' == substr($this->faltanteana, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->faltanteana, 1)))
              {
                  $this->faltanteana = '';
              }
              else
              {
                  $this->faltanteana = '0' . $this->faltanteana;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->faltanteana != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->faltanteana) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Faltante ANA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['faltanteana']))
                  {
                      $Campos_Erros['faltanteana'] = array();
                  }
                  $Campos_Erros['faltanteana'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['faltanteana']) || !is_array($this->NM_ajax_info['errList']['faltanteana']))
                  {
                      $this->NM_ajax_info['errList']['faltanteana'] = array();
                  }
                  $this->NM_ajax_info['errList']['faltanteana'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->faltanteana, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Faltante ANA; " ; 
                  if (!isset($Campos_Erros['faltanteana']))
                  {
                      $Campos_Erros['faltanteana'] = array();
                  }
                  $Campos_Erros['faltanteana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['faltanteana']) || !is_array($this->NM_ajax_info['errList']['faltanteana']))
                  {
                      $this->NM_ajax_info['errList']['faltanteana'] = array();
                  }
                  $this->NM_ajax_info['errList']['faltanteana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'faltanteana';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_faltanteana

    function ValidateField_ingresoelu_ana(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ingresoelu_ana === "" || is_null($this->ingresoelu_ana))  
      { 
          $this->ingresoelu_ana = 0;
          $this->sc_force_zero[] = 'ingresoelu_ana';
      } 
      nm_limpa_numero($this->ingresoelu_ana, $this->field_config['ingresoelu_ana']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ingresoelu_ana != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->ingresoelu_ana) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ingreso ELU ANA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ingresoelu_ana']))
                  {
                      $Campos_Erros['ingresoelu_ana'] = array();
                  }
                  $Campos_Erros['ingresoelu_ana'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ingresoelu_ana']) || !is_array($this->NM_ajax_info['errList']['ingresoelu_ana']))
                  {
                      $this->NM_ajax_info['errList']['ingresoelu_ana'] = array();
                  }
                  $this->NM_ajax_info['errList']['ingresoelu_ana'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ingresoelu_ana, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ingreso ELU ANA; " ; 
                  if (!isset($Campos_Erros['ingresoelu_ana']))
                  {
                      $Campos_Erros['ingresoelu_ana'] = array();
                  }
                  $Campos_Erros['ingresoelu_ana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ingresoelu_ana']) || !is_array($this->NM_ajax_info['errList']['ingresoelu_ana']))
                  {
                      $this->NM_ajax_info['errList']['ingresoelu_ana'] = array();
                  }
                  $this->NM_ajax_info['errList']['ingresoelu_ana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ingresoelu_ana';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ingresoelu_ana

    function ValidateField_conteo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->conteo === "" || is_null($this->conteo))  
      { 
          $this->conteo = 0;
          $this->sc_force_zero[] = 'conteo';
      } 
      nm_limpa_numero($this->conteo, $this->field_config['conteo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->conteo != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->conteo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Conteo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['conteo']))
                  {
                      $Campos_Erros['conteo'] = array();
                  }
                  $Campos_Erros['conteo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['conteo']) || !is_array($this->NM_ajax_info['errList']['conteo']))
                  {
                      $this->NM_ajax_info['errList']['conteo'] = array();
                  }
                  $this->NM_ajax_info['errList']['conteo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->conteo, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Conteo; " ; 
                  if (!isset($Campos_Erros['conteo']))
                  {
                      $Campos_Erros['conteo'] = array();
                  }
                  $Campos_Erros['conteo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['conteo']) || !is_array($this->NM_ajax_info['errList']['conteo']))
                  {
                      $this->NM_ajax_info['errList']['conteo'] = array();
                  }
                  $this->NM_ajax_info['errList']['conteo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'conteo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_conteo

    function ValidateField_fechainiciodictamen(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechainiciodictamen, $this->field_config['fechainiciodictamen']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechainiciodictamen']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechainiciodictamen']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechainiciodictamen']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechainiciodictamen']['date_sep']) ; 
          if (trim($this->fechainiciodictamen) != "")  
          { 
              if ($teste_validade->Data($this->fechainiciodictamen, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Inicio Dictamen; " ; 
                  if (!isset($Campos_Erros['fechainiciodictamen']))
                  {
                      $Campos_Erros['fechainiciodictamen'] = array();
                  }
                  $Campos_Erros['fechainiciodictamen'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechainiciodictamen']) || !is_array($this->NM_ajax_info['errList']['fechainiciodictamen']))
                  {
                      $this->NM_ajax_info['errList']['fechainiciodictamen'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechainiciodictamen'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fechainiciodictamen']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechainiciodictamen';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fechainiciodictamen_hora, $this->field_config['fechainiciodictamen_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fechainiciodictamen_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fechainiciodictamen_hora']['time_sep']) ; 
          if (trim($this->fechainiciodictamen_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fechainiciodictamen_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Inicio Dictamen; " ; 
                  if (!isset($Campos_Erros['fechainiciodictamen_hora']))
                  {
                      $Campos_Erros['fechainiciodictamen_hora'] = array();
                  }
                  $Campos_Erros['fechainiciodictamen_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechainiciodictamen']) || !is_array($this->NM_ajax_info['errList']['fechainiciodictamen']))
                  {
                      $this->NM_ajax_info['errList']['fechainiciodictamen'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechainiciodictamen'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fechainiciodictamen']) && isset($Campos_Erros['fechainiciodictamen_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fechainiciodictamen'], $Campos_Erros['fechainiciodictamen_hora']);
          if (empty($Campos_Erros['fechainiciodictamen_hora']))
          {
              unset($Campos_Erros['fechainiciodictamen_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fechainiciodictamen']))
          {
              $this->NM_ajax_info['errList']['fechainiciodictamen'] = array_unique($this->NM_ajax_info['errList']['fechainiciodictamen']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechainiciodictamen_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechainiciodictamen_hora

    function ValidateField_fechafindictamen(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechafindictamen, $this->field_config['fechafindictamen']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechafindictamen']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechafindictamen']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechafindictamen']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechafindictamen']['date_sep']) ; 
          if (trim($this->fechafindictamen) != "")  
          { 
              if ($teste_validade->Data($this->fechafindictamen, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Fin Dictamen; " ; 
                  if (!isset($Campos_Erros['fechafindictamen']))
                  {
                      $Campos_Erros['fechafindictamen'] = array();
                  }
                  $Campos_Erros['fechafindictamen'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechafindictamen']) || !is_array($this->NM_ajax_info['errList']['fechafindictamen']))
                  {
                      $this->NM_ajax_info['errList']['fechafindictamen'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechafindictamen'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fechafindictamen']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechafindictamen';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fechafindictamen_hora, $this->field_config['fechafindictamen_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fechafindictamen_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fechafindictamen_hora']['time_sep']) ; 
          if (trim($this->fechafindictamen_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fechafindictamen_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Fin Dictamen; " ; 
                  if (!isset($Campos_Erros['fechafindictamen_hora']))
                  {
                      $Campos_Erros['fechafindictamen_hora'] = array();
                  }
                  $Campos_Erros['fechafindictamen_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechafindictamen']) || !is_array($this->NM_ajax_info['errList']['fechafindictamen']))
                  {
                      $this->NM_ajax_info['errList']['fechafindictamen'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechafindictamen'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fechafindictamen']) && isset($Campos_Erros['fechafindictamen_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fechafindictamen'], $Campos_Erros['fechafindictamen_hora']);
          if (empty($Campos_Erros['fechafindictamen_hora']))
          {
              unset($Campos_Erros['fechafindictamen_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fechafindictamen']))
          {
              $this->NM_ajax_info['errList']['fechafindictamen'] = array_unique($this->NM_ajax_info['errList']['fechafindictamen']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechafindictamen_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechafindictamen_hora

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['consecutivo'] = $this->consecutivo;
    $this->nmgp_dados_form['turnoid'] = $this->turnoid;
    $this->nmgp_dados_form['casetaid'] = $this->casetaid;
    $this->nmgp_dados_form['tramoid'] = $this->tramoid;
    $this->nmgp_dados_form['cuerpo'] = $this->cuerpo;
    $this->nmgp_dados_form['usuarioid'] = $this->usuarioid;
    $this->nmgp_dados_form['carrilid'] = $this->carrilid;
    $this->nmgp_dados_form['fechaoperacion'] = (strlen(trim($this->fechaoperacion)) > 19) ? str_replace(".", ":", $this->fechaoperacion) : trim($this->fechaoperacion);
    $this->nmgp_dados_form['fechaturno'] = (strlen(trim($this->fechaturno)) > 19) ? str_replace(".", ":", $this->fechaturno) : trim($this->fechaturno);
    $this->nmgp_dados_form['horainicio'] = (strlen(trim($this->horainicio)) > 19) ? str_replace(".", ":", $this->horainicio) : trim($this->horainicio);
    $this->nmgp_dados_form['fechafin'] = (strlen(trim($this->fechafin)) > 19) ? str_replace(".", ":", $this->fechafin) : trim($this->fechafin);
    $this->nmgp_dados_form['horafin'] = (strlen(trim($this->horafin)) > 19) ? str_replace(".", ":", $this->horafin) : trim($this->horafin);
    $this->nmgp_dados_form['operacionid'] = $this->operacionid;
    $this->nmgp_dados_form['foliocierre'] = $this->foliocierre;
    $this->nmgp_dados_form['estatuscarril'] = $this->estatuscarril;
    $this->nmgp_dados_form['observacion'] = $this->observacion;
    $this->nmgp_dados_form['preliquidado'] = $this->preliquidado;
    $this->nmgp_dados_form['montocr'] = $this->montocr;
    $this->nmgp_dados_form['montoana'] = $this->montoana;
    $this->nmgp_dados_form['cantidadmxn'] = $this->cantidadmxn;
    $this->nmgp_dados_form['cantidadusd'] = $this->cantidadusd;
    $this->nmgp_dados_form['importemxn'] = $this->importemxn;
    $this->nmgp_dados_form['importeusd'] = $this->importeusd;
    $this->nmgp_dados_form['folioinicialcr'] = $this->folioinicialcr;
    $this->nmgp_dados_form['foliofinalcr'] = $this->foliofinalcr;
    $this->nmgp_dados_form['folioinicialeap'] = $this->folioinicialeap;
    $this->nmgp_dados_form['foliofinaleap'] = $this->foliofinaleap;
    $this->nmgp_dados_form['faltante'] = $this->faltante;
    $this->nmgp_dados_form['ingresoelu_pre'] = $this->ingresoelu_pre;
    $this->nmgp_dados_form['entregado'] = $this->entregado;
    $this->nmgp_dados_form['administradorid'] = $this->administradorid;
    $this->nmgp_dados_form['encargadoturnoid'] = $this->encargadoturnoid;
    $this->nmgp_dados_form['encargadoturnoid_pre'] = $this->encargadoturnoid_pre;
    $this->nmgp_dados_form['fechacierre'] = (strlen(trim($this->fechacierre)) > 19) ? str_replace(".", ":", $this->fechacierre) : trim($this->fechacierre);
    $this->nmgp_dados_form['fechapreliq'] = (strlen(trim($this->fechapreliq)) > 19) ? str_replace(".", ":", $this->fechapreliq) : trim($this->fechapreliq);
    $this->nmgp_dados_form['fechaliq'] = (strlen(trim($this->fechaliq)) > 19) ? str_replace(".", ":", $this->fechaliq) : trim($this->fechaliq);
    $this->nmgp_dados_form['operacion'] = $this->operacion;
    $this->nmgp_dados_form['liquidadorid'] = $this->liquidadorid;
    $this->nmgp_dados_form['faltanteana'] = $this->faltanteana;
    $this->nmgp_dados_form['ingresoelu_ana'] = $this->ingresoelu_ana;
    $this->nmgp_dados_form['conteo'] = $this->conteo;
    $this->nmgp_dados_form['fechainiciodictamen'] = (strlen(trim($this->fechainiciodictamen)) > 19) ? str_replace(".", ":", $this->fechainiciodictamen) : trim($this->fechainiciodictamen);
    $this->nmgp_dados_form['fechafindictamen'] = (strlen(trim($this->fechafindictamen)) > 19) ? str_replace(".", ":", $this->fechafindictamen) : trim($this->fechafindictamen);
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['consecutivo'] = $this->consecutivo;
      nm_limpa_numero($this->consecutivo, $this->field_config['consecutivo']['symbol_grp']) ; 
      $this->Before_unformat['turnoid'] = $this->turnoid;
      nm_limpa_numero($this->turnoid, $this->field_config['turnoid']['symbol_grp']) ; 
      $this->Before_unformat['casetaid'] = $this->casetaid;
      nm_limpa_numero($this->casetaid, $this->field_config['casetaid']['symbol_grp']) ; 
      $this->Before_unformat['tramoid'] = $this->tramoid;
      nm_limpa_numero($this->tramoid, $this->field_config['tramoid']['symbol_grp']) ; 
      $this->Before_unformat['carrilid'] = $this->carrilid;
      nm_limpa_numero($this->carrilid, $this->field_config['carrilid']['symbol_grp']) ; 
      $this->Before_unformat['fechaoperacion'] = $this->fechaoperacion;
      nm_limpa_data($this->fechaoperacion, $this->field_config['fechaoperacion']['date_sep']) ; 
      $this->Before_unformat['fechaturno'] = $this->fechaturno;
      nm_limpa_data($this->fechaturno, $this->field_config['fechaturno']['date_sep']) ; 
      $this->Before_unformat['horainicio'] = $this->horainicio;
      nm_limpa_hora($this->horainicio, $this->field_config['horainicio']['time_sep']) ; 
      $this->Before_unformat['fechafin'] = $this->fechafin;
      nm_limpa_data($this->fechafin, $this->field_config['fechafin']['date_sep']) ; 
      $this->Before_unformat['horafin'] = $this->horafin;
      nm_limpa_hora($this->horafin, $this->field_config['horafin']['time_sep']) ; 
      $this->Before_unformat['preliquidado'] = $this->preliquidado;
      nm_limpa_numero($this->preliquidado, $this->field_config['preliquidado']['symbol_grp']) ; 
      $this->Before_unformat['montocr'] = $this->montocr;
      if (!empty($this->field_config['montocr']['symbol_dec']))
      {
         $this->sc_remove_currency($this->montocr, $this->field_config['montocr']['symbol_dec'], $this->field_config['montocr']['symbol_grp'], $this->field_config['montocr']['symbol_mon']);
         nm_limpa_valor($this->montocr, $this->field_config['montocr']['symbol_dec'], $this->field_config['montocr']['symbol_grp']);
      }
      $this->Before_unformat['montoana'] = $this->montoana;
      if (!empty($this->field_config['montoana']['symbol_dec']))
      {
         $this->sc_remove_currency($this->montoana, $this->field_config['montoana']['symbol_dec'], $this->field_config['montoana']['symbol_grp'], $this->field_config['montoana']['symbol_mon']);
         nm_limpa_valor($this->montoana, $this->field_config['montoana']['symbol_dec'], $this->field_config['montoana']['symbol_grp']);
      }
      $this->Before_unformat['cantidadmxn'] = $this->cantidadmxn;
      nm_limpa_numero($this->cantidadmxn, $this->field_config['cantidadmxn']['symbol_grp']) ; 
      $this->Before_unformat['cantidadusd'] = $this->cantidadusd;
      nm_limpa_numero($this->cantidadusd, $this->field_config['cantidadusd']['symbol_grp']) ; 
      $this->Before_unformat['importemxn'] = $this->importemxn;
      if (!empty($this->field_config['importemxn']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importemxn, $this->field_config['importemxn']['symbol_dec'], $this->field_config['importemxn']['symbol_grp'], $this->field_config['importemxn']['symbol_mon']);
         nm_limpa_valor($this->importemxn, $this->field_config['importemxn']['symbol_dec'], $this->field_config['importemxn']['symbol_grp']);
      }
      $this->Before_unformat['importeusd'] = $this->importeusd;
      if (!empty($this->field_config['importeusd']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeusd, $this->field_config['importeusd']['symbol_dec'], $this->field_config['importeusd']['symbol_grp'], $this->field_config['importeusd']['symbol_mon']);
         nm_limpa_valor($this->importeusd, $this->field_config['importeusd']['symbol_dec'], $this->field_config['importeusd']['symbol_grp']);
      }
      $this->Before_unformat['folioinicialcr'] = $this->folioinicialcr;
      nm_limpa_numero($this->folioinicialcr, $this->field_config['folioinicialcr']['symbol_grp']) ; 
      $this->Before_unformat['foliofinalcr'] = $this->foliofinalcr;
      nm_limpa_numero($this->foliofinalcr, $this->field_config['foliofinalcr']['symbol_grp']) ; 
      $this->Before_unformat['folioinicialeap'] = $this->folioinicialeap;
      nm_limpa_numero($this->folioinicialeap, $this->field_config['folioinicialeap']['symbol_grp']) ; 
      $this->Before_unformat['foliofinaleap'] = $this->foliofinaleap;
      nm_limpa_numero($this->foliofinaleap, $this->field_config['foliofinaleap']['symbol_grp']) ; 
      $this->Before_unformat['faltante'] = $this->faltante;
      if (!empty($this->field_config['faltante']['symbol_dec']))
      {
         $this->sc_remove_currency($this->faltante, $this->field_config['faltante']['symbol_dec'], $this->field_config['faltante']['symbol_grp'], $this->field_config['faltante']['symbol_mon']);
         nm_limpa_valor($this->faltante, $this->field_config['faltante']['symbol_dec'], $this->field_config['faltante']['symbol_grp']);
      }
      $this->Before_unformat['ingresoelu_pre'] = $this->ingresoelu_pre;
      nm_limpa_numero($this->ingresoelu_pre, $this->field_config['ingresoelu_pre']['symbol_grp']) ; 
      $this->Before_unformat['entregado'] = $this->entregado;
      if (!empty($this->field_config['entregado']['symbol_dec']))
      {
         $this->sc_remove_currency($this->entregado, $this->field_config['entregado']['symbol_dec'], $this->field_config['entregado']['symbol_grp'], $this->field_config['entregado']['symbol_mon']);
         nm_limpa_valor($this->entregado, $this->field_config['entregado']['symbol_dec'], $this->field_config['entregado']['symbol_grp']);
      }
      $this->Before_unformat['administradorid'] = $this->administradorid;
      nm_limpa_numero($this->administradorid, $this->field_config['administradorid']['symbol_grp']) ; 
      $this->Before_unformat['encargadoturnoid'] = $this->encargadoturnoid;
      nm_limpa_numero($this->encargadoturnoid, $this->field_config['encargadoturnoid']['symbol_grp']) ; 
      $this->Before_unformat['encargadoturnoid_pre'] = $this->encargadoturnoid_pre;
      nm_limpa_numero($this->encargadoturnoid_pre, $this->field_config['encargadoturnoid_pre']['symbol_grp']) ; 
      $this->Before_unformat['fechacierre'] = $this->fechacierre;
      $this->Before_unformat['fechacierre_hora'] = $this->fechacierre_hora;
      nm_limpa_data($this->fechacierre, $this->field_config['fechacierre']['date_sep']) ; 
      nm_limpa_hora($this->fechacierre_hora, $this->field_config['fechacierre']['time_sep']) ; 
      $this->Before_unformat['fechapreliq'] = $this->fechapreliq;
      $this->Before_unformat['fechapreliq_hora'] = $this->fechapreliq_hora;
      nm_limpa_data($this->fechapreliq, $this->field_config['fechapreliq']['date_sep']) ; 
      nm_limpa_hora($this->fechapreliq_hora, $this->field_config['fechapreliq']['time_sep']) ; 
      $this->Before_unformat['fechaliq'] = $this->fechaliq;
      $this->Before_unformat['fechaliq_hora'] = $this->fechaliq_hora;
      nm_limpa_data($this->fechaliq, $this->field_config['fechaliq']['date_sep']) ; 
      nm_limpa_hora($this->fechaliq_hora, $this->field_config['fechaliq']['time_sep']) ; 
      $this->Before_unformat['operacion'] = $this->operacion;
      if (!empty($this->field_config['operacion']['symbol_dec']))
      {
         $this->sc_remove_currency($this->operacion, $this->field_config['operacion']['symbol_dec'], $this->field_config['operacion']['symbol_grp'], $this->field_config['operacion']['symbol_mon']);
         nm_limpa_valor($this->operacion, $this->field_config['operacion']['symbol_dec'], $this->field_config['operacion']['symbol_grp']);
      }
      $this->Before_unformat['faltanteana'] = $this->faltanteana;
      if (!empty($this->field_config['faltanteana']['symbol_dec']))
      {
         $this->sc_remove_currency($this->faltanteana, $this->field_config['faltanteana']['symbol_dec'], $this->field_config['faltanteana']['symbol_grp'], $this->field_config['faltanteana']['symbol_mon']);
         nm_limpa_valor($this->faltanteana, $this->field_config['faltanteana']['symbol_dec'], $this->field_config['faltanteana']['symbol_grp']);
      }
      $this->Before_unformat['ingresoelu_ana'] = $this->ingresoelu_ana;
      nm_limpa_numero($this->ingresoelu_ana, $this->field_config['ingresoelu_ana']['symbol_grp']) ; 
      $this->Before_unformat['conteo'] = $this->conteo;
      nm_limpa_numero($this->conteo, $this->field_config['conteo']['symbol_grp']) ; 
      $this->Before_unformat['fechainiciodictamen'] = $this->fechainiciodictamen;
      $this->Before_unformat['fechainiciodictamen_hora'] = $this->fechainiciodictamen_hora;
      nm_limpa_data($this->fechainiciodictamen, $this->field_config['fechainiciodictamen']['date_sep']) ; 
      nm_limpa_hora($this->fechainiciodictamen_hora, $this->field_config['fechainiciodictamen']['time_sep']) ; 
      $this->Before_unformat['fechafindictamen'] = $this->fechafindictamen;
      $this->Before_unformat['fechafindictamen_hora'] = $this->fechafindictamen_hora;
      nm_limpa_data($this->fechafindictamen, $this->field_config['fechafindictamen']['date_sep']) ; 
      nm_limpa_hora($this->fechafindictamen_hora, $this->field_config['fechafindictamen']['time_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "consecutivo")
      {
          nm_limpa_numero($this->consecutivo, $this->field_config['consecutivo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "turnoid")
      {
          nm_limpa_numero($this->turnoid, $this->field_config['turnoid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "casetaid")
      {
          nm_limpa_numero($this->casetaid, $this->field_config['casetaid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tramoid")
      {
          nm_limpa_numero($this->tramoid, $this->field_config['tramoid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "carrilid")
      {
          nm_limpa_numero($this->carrilid, $this->field_config['carrilid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "preliquidado")
      {
          nm_limpa_numero($this->preliquidado, $this->field_config['preliquidado']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "montocr")
      {
          if (!empty($this->field_config['montocr']['symbol_dec']))
          {
             $this->sc_remove_currency($this->montocr, $this->field_config['montocr']['symbol_dec'], $this->field_config['montocr']['symbol_grp'], $this->field_config['montocr']['symbol_mon']);
             nm_limpa_valor($this->montocr, $this->field_config['montocr']['symbol_dec'], $this->field_config['montocr']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "montoana")
      {
          if (!empty($this->field_config['montoana']['symbol_dec']))
          {
             $this->sc_remove_currency($this->montoana, $this->field_config['montoana']['symbol_dec'], $this->field_config['montoana']['symbol_grp'], $this->field_config['montoana']['symbol_mon']);
             nm_limpa_valor($this->montoana, $this->field_config['montoana']['symbol_dec'], $this->field_config['montoana']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cantidadmxn")
      {
          nm_limpa_numero($this->cantidadmxn, $this->field_config['cantidadmxn']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cantidadusd")
      {
          nm_limpa_numero($this->cantidadusd, $this->field_config['cantidadusd']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "importemxn")
      {
          if (!empty($this->field_config['importemxn']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importemxn, $this->field_config['importemxn']['symbol_dec'], $this->field_config['importemxn']['symbol_grp'], $this->field_config['importemxn']['symbol_mon']);
             nm_limpa_valor($this->importemxn, $this->field_config['importemxn']['symbol_dec'], $this->field_config['importemxn']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeusd")
      {
          if (!empty($this->field_config['importeusd']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeusd, $this->field_config['importeusd']['symbol_dec'], $this->field_config['importeusd']['symbol_grp'], $this->field_config['importeusd']['symbol_mon']);
             nm_limpa_valor($this->importeusd, $this->field_config['importeusd']['symbol_dec'], $this->field_config['importeusd']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "folioinicialcr")
      {
          nm_limpa_numero($this->folioinicialcr, $this->field_config['folioinicialcr']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "foliofinalcr")
      {
          nm_limpa_numero($this->foliofinalcr, $this->field_config['foliofinalcr']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "folioinicialeap")
      {
          nm_limpa_numero($this->folioinicialeap, $this->field_config['folioinicialeap']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "foliofinaleap")
      {
          nm_limpa_numero($this->foliofinaleap, $this->field_config['foliofinaleap']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "faltante")
      {
          if (!empty($this->field_config['faltante']['symbol_dec']))
          {
             $this->sc_remove_currency($this->faltante, $this->field_config['faltante']['symbol_dec'], $this->field_config['faltante']['symbol_grp'], $this->field_config['faltante']['symbol_mon']);
             nm_limpa_valor($this->faltante, $this->field_config['faltante']['symbol_dec'], $this->field_config['faltante']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ingresoelu_pre")
      {
          nm_limpa_numero($this->ingresoelu_pre, $this->field_config['ingresoelu_pre']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "entregado")
      {
          if (!empty($this->field_config['entregado']['symbol_dec']))
          {
             $this->sc_remove_currency($this->entregado, $this->field_config['entregado']['symbol_dec'], $this->field_config['entregado']['symbol_grp'], $this->field_config['entregado']['symbol_mon']);
             nm_limpa_valor($this->entregado, $this->field_config['entregado']['symbol_dec'], $this->field_config['entregado']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "administradorid")
      {
          nm_limpa_numero($this->administradorid, $this->field_config['administradorid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "encargadoturnoid")
      {
          nm_limpa_numero($this->encargadoturnoid, $this->field_config['encargadoturnoid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "encargadoturnoid_pre")
      {
          nm_limpa_numero($this->encargadoturnoid_pre, $this->field_config['encargadoturnoid_pre']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "operacion")
      {
          if (!empty($this->field_config['operacion']['symbol_dec']))
          {
             $this->sc_remove_currency($this->operacion, $this->field_config['operacion']['symbol_dec'], $this->field_config['operacion']['symbol_grp'], $this->field_config['operacion']['symbol_mon']);
             nm_limpa_valor($this->operacion, $this->field_config['operacion']['symbol_dec'], $this->field_config['operacion']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "faltanteana")
      {
          if (!empty($this->field_config['faltanteana']['symbol_dec']))
          {
             $this->sc_remove_currency($this->faltanteana, $this->field_config['faltanteana']['symbol_dec'], $this->field_config['faltanteana']['symbol_grp'], $this->field_config['faltanteana']['symbol_mon']);
             nm_limpa_valor($this->faltanteana, $this->field_config['faltanteana']['symbol_dec'], $this->field_config['faltanteana']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ingresoelu_ana")
      {
          nm_limpa_numero($this->ingresoelu_ana, $this->field_config['ingresoelu_ana']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "conteo")
      {
          nm_limpa_numero($this->conteo, $this->field_config['conteo']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->consecutivo || (!empty($format_fields) && isset($format_fields['consecutivo'])))
      {
          nmgp_Form_Num_Val($this->consecutivo, $this->field_config['consecutivo']['symbol_grp'], $this->field_config['consecutivo']['symbol_dec'], "0", "S", $this->field_config['consecutivo']['format_neg'], "", "", "-", $this->field_config['consecutivo']['symbol_fmt']) ; 
      }
      if ('' !== $this->turnoid || (!empty($format_fields) && isset($format_fields['turnoid'])))
      {
          nmgp_Form_Num_Val($this->turnoid, $this->field_config['turnoid']['symbol_grp'], $this->field_config['turnoid']['symbol_dec'], "0", "S", $this->field_config['turnoid']['format_neg'], "", "", "-", $this->field_config['turnoid']['symbol_fmt']) ; 
      }
      if ('' !== $this->casetaid || (!empty($format_fields) && isset($format_fields['casetaid'])))
      {
          nmgp_Form_Num_Val($this->casetaid, $this->field_config['casetaid']['symbol_grp'], $this->field_config['casetaid']['symbol_dec'], "0", "S", $this->field_config['casetaid']['format_neg'], "", "", "-", $this->field_config['casetaid']['symbol_fmt']) ; 
      }
      if ('' !== $this->tramoid || (!empty($format_fields) && isset($format_fields['tramoid'])))
      {
          nmgp_Form_Num_Val($this->tramoid, $this->field_config['tramoid']['symbol_grp'], $this->field_config['tramoid']['symbol_dec'], "0", "S", $this->field_config['tramoid']['format_neg'], "", "", "-", $this->field_config['tramoid']['symbol_fmt']) ; 
      }
      if ('' !== $this->carrilid || (!empty($format_fields) && isset($format_fields['carrilid'])))
      {
          nmgp_Form_Num_Val($this->carrilid, $this->field_config['carrilid']['symbol_grp'], $this->field_config['carrilid']['symbol_dec'], "0", "S", $this->field_config['carrilid']['format_neg'], "", "", "-", $this->field_config['carrilid']['symbol_fmt']) ; 
      }
      if ((!empty($this->fechaoperacion) && 'null' != $this->fechaoperacion) || (!empty($format_fields) && isset($format_fields['fechaoperacion'])))
      {
          nm_volta_data($this->fechaoperacion, $this->field_config['fechaoperacion']['date_format']) ; 
          nmgp_Form_Datas($this->fechaoperacion, $this->field_config['fechaoperacion']['date_format'], $this->field_config['fechaoperacion']['date_sep']) ;  
      }
      elseif ('null' == $this->fechaoperacion || '' == $this->fechaoperacion)
      {
          $this->fechaoperacion = '';
      }
      if ((!empty($this->fechaturno) && 'null' != $this->fechaturno) || (!empty($format_fields) && isset($format_fields['fechaturno'])))
      {
          nm_volta_data($this->fechaturno, $this->field_config['fechaturno']['date_format']) ; 
          nmgp_Form_Datas($this->fechaturno, $this->field_config['fechaturno']['date_format'], $this->field_config['fechaturno']['date_sep']) ;  
      }
      elseif ('null' == $this->fechaturno || '' == $this->fechaturno)
      {
          $this->fechaturno = '';
      }
      if ((!empty($this->horainicio) && 'null' != $this->horainicio) || (!empty($format_fields) && isset($format_fields['horainicio'])))
      {
          nm_volta_hora($this->horainicio, $this->field_config['horainicio']['date_format']) ; 
          nmgp_Form_Hora($this->horainicio, $this->field_config['horainicio']['date_format'], $this->field_config['horainicio']['time_sep']) ;  
      }
      elseif ('null' == $this->horainicio || '' == $this->horainicio)
      {
          $this->horainicio = '';
      }
      if ((!empty($this->fechafin) && 'null' != $this->fechafin) || (!empty($format_fields) && isset($format_fields['fechafin'])))
      {
          nm_volta_data($this->fechafin, $this->field_config['fechafin']['date_format']) ; 
          nmgp_Form_Datas($this->fechafin, $this->field_config['fechafin']['date_format'], $this->field_config['fechafin']['date_sep']) ;  
      }
      elseif ('null' == $this->fechafin || '' == $this->fechafin)
      {
          $this->fechafin = '';
      }
      if ((!empty($this->horafin) && 'null' != $this->horafin) || (!empty($format_fields) && isset($format_fields['horafin'])))
      {
          nm_volta_hora($this->horafin, $this->field_config['horafin']['date_format']) ; 
          nmgp_Form_Hora($this->horafin, $this->field_config['horafin']['date_format'], $this->field_config['horafin']['time_sep']) ;  
      }
      elseif ('null' == $this->horafin || '' == $this->horafin)
      {
          $this->horafin = '';
      }
      if ('' !== $this->preliquidado || (!empty($format_fields) && isset($format_fields['preliquidado'])))
      {
          nmgp_Form_Num_Val($this->preliquidado, $this->field_config['preliquidado']['symbol_grp'], $this->field_config['preliquidado']['symbol_dec'], "0", "S", $this->field_config['preliquidado']['format_neg'], "", "", "-", $this->field_config['preliquidado']['symbol_fmt']) ; 
      }
      if ('' !== $this->montocr || (!empty($format_fields) && isset($format_fields['montocr'])))
      {
          nmgp_Form_Num_Val($this->montocr, $this->field_config['montocr']['symbol_grp'], $this->field_config['montocr']['symbol_dec'], "2", "S", $this->field_config['montocr']['format_neg'], "", "", "-", $this->field_config['montocr']['symbol_fmt']) ; 
      }
      if ('' !== $this->montoana || (!empty($format_fields) && isset($format_fields['montoana'])))
      {
          nmgp_Form_Num_Val($this->montoana, $this->field_config['montoana']['symbol_grp'], $this->field_config['montoana']['symbol_dec'], "0", "S", $this->field_config['montoana']['format_neg'], "", "", "-", $this->field_config['montoana']['symbol_fmt']) ; 
      }
      if ('' !== $this->cantidadmxn || (!empty($format_fields) && isset($format_fields['cantidadmxn'])))
      {
          nmgp_Form_Num_Val($this->cantidadmxn, $this->field_config['cantidadmxn']['symbol_grp'], $this->field_config['cantidadmxn']['symbol_dec'], "0", "S", $this->field_config['cantidadmxn']['format_neg'], "", "", "-", $this->field_config['cantidadmxn']['symbol_fmt']) ; 
      }
      if ('' !== $this->cantidadusd || (!empty($format_fields) && isset($format_fields['cantidadusd'])))
      {
          nmgp_Form_Num_Val($this->cantidadusd, $this->field_config['cantidadusd']['symbol_grp'], $this->field_config['cantidadusd']['symbol_dec'], "0", "S", $this->field_config['cantidadusd']['format_neg'], "", "", "-", $this->field_config['cantidadusd']['symbol_fmt']) ; 
      }
      if ('' !== $this->importemxn || (!empty($format_fields) && isset($format_fields['importemxn'])))
      {
          nmgp_Form_Num_Val($this->importemxn, $this->field_config['importemxn']['symbol_grp'], $this->field_config['importemxn']['symbol_dec'], "2", "S", $this->field_config['importemxn']['format_neg'], "", "", "-", $this->field_config['importemxn']['symbol_fmt']) ; 
      }
      if ('' !== $this->importeusd || (!empty($format_fields) && isset($format_fields['importeusd'])))
      {
          nmgp_Form_Num_Val($this->importeusd, $this->field_config['importeusd']['symbol_grp'], $this->field_config['importeusd']['symbol_dec'], "2", "S", $this->field_config['importeusd']['format_neg'], "", "", "-", $this->field_config['importeusd']['symbol_fmt']) ; 
      }
      if ('' !== $this->folioinicialcr || (!empty($format_fields) && isset($format_fields['folioinicialcr'])))
      {
          nmgp_Form_Num_Val($this->folioinicialcr, $this->field_config['folioinicialcr']['symbol_grp'], $this->field_config['folioinicialcr']['symbol_dec'], "0", "S", $this->field_config['folioinicialcr']['format_neg'], "", "", "-", $this->field_config['folioinicialcr']['symbol_fmt']) ; 
      }
      if ('' !== $this->foliofinalcr || (!empty($format_fields) && isset($format_fields['foliofinalcr'])))
      {
          nmgp_Form_Num_Val($this->foliofinalcr, $this->field_config['foliofinalcr']['symbol_grp'], $this->field_config['foliofinalcr']['symbol_dec'], "0", "S", $this->field_config['foliofinalcr']['format_neg'], "", "", "-", $this->field_config['foliofinalcr']['symbol_fmt']) ; 
      }
      if ('' !== $this->folioinicialeap || (!empty($format_fields) && isset($format_fields['folioinicialeap'])))
      {
          nmgp_Form_Num_Val($this->folioinicialeap, $this->field_config['folioinicialeap']['symbol_grp'], $this->field_config['folioinicialeap']['symbol_dec'], "0", "S", $this->field_config['folioinicialeap']['format_neg'], "", "", "-", $this->field_config['folioinicialeap']['symbol_fmt']) ; 
      }
      if ('' !== $this->foliofinaleap || (!empty($format_fields) && isset($format_fields['foliofinaleap'])))
      {
          nmgp_Form_Num_Val($this->foliofinaleap, $this->field_config['foliofinaleap']['symbol_grp'], $this->field_config['foliofinaleap']['symbol_dec'], "0", "S", $this->field_config['foliofinaleap']['format_neg'], "", "", "-", $this->field_config['foliofinaleap']['symbol_fmt']) ; 
      }
      if ('' !== $this->faltante || (!empty($format_fields) && isset($format_fields['faltante'])))
      {
          nmgp_Form_Num_Val($this->faltante, $this->field_config['faltante']['symbol_grp'], $this->field_config['faltante']['symbol_dec'], "2", "S", $this->field_config['faltante']['format_neg'], "", "", "-", $this->field_config['faltante']['symbol_fmt']) ; 
      }
      if ('' !== $this->ingresoelu_pre || (!empty($format_fields) && isset($format_fields['ingresoelu_pre'])))
      {
          nmgp_Form_Num_Val($this->ingresoelu_pre, $this->field_config['ingresoelu_pre']['symbol_grp'], $this->field_config['ingresoelu_pre']['symbol_dec'], "0", "S", $this->field_config['ingresoelu_pre']['format_neg'], "", "", "-", $this->field_config['ingresoelu_pre']['symbol_fmt']) ; 
      }
      if ('' !== $this->entregado || (!empty($format_fields) && isset($format_fields['entregado'])))
      {
          nmgp_Form_Num_Val($this->entregado, $this->field_config['entregado']['symbol_grp'], $this->field_config['entregado']['symbol_dec'], "2", "S", $this->field_config['entregado']['format_neg'], "", "", "-", $this->field_config['entregado']['symbol_fmt']) ; 
      }
      if ('' !== $this->administradorid || (!empty($format_fields) && isset($format_fields['administradorid'])))
      {
          nmgp_Form_Num_Val($this->administradorid, $this->field_config['administradorid']['symbol_grp'], $this->field_config['administradorid']['symbol_dec'], "0", "S", $this->field_config['administradorid']['format_neg'], "", "", "-", $this->field_config['administradorid']['symbol_fmt']) ; 
      }
      if ('' !== $this->encargadoturnoid || (!empty($format_fields) && isset($format_fields['encargadoturnoid'])))
      {
          nmgp_Form_Num_Val($this->encargadoturnoid, $this->field_config['encargadoturnoid']['symbol_grp'], $this->field_config['encargadoturnoid']['symbol_dec'], "0", "S", $this->field_config['encargadoturnoid']['format_neg'], "", "", "-", $this->field_config['encargadoturnoid']['symbol_fmt']) ; 
      }
      if ('' !== $this->encargadoturnoid_pre || (!empty($format_fields) && isset($format_fields['encargadoturnoid_pre'])))
      {
          nmgp_Form_Num_Val($this->encargadoturnoid_pre, $this->field_config['encargadoturnoid_pre']['symbol_grp'], $this->field_config['encargadoturnoid_pre']['symbol_dec'], "0", "S", $this->field_config['encargadoturnoid_pre']['format_neg'], "", "", "-", $this->field_config['encargadoturnoid_pre']['symbol_fmt']) ; 
      }
      if ((!empty($this->fechacierre) && 'null' != $this->fechacierre) || (!empty($format_fields) && isset($format_fields['fechacierre'])))
      {
          $nm_separa_data = strpos($this->field_config['fechacierre']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fechacierre']['date_format'];
          $this->field_config['fechacierre']['date_format'] = substr($this->field_config['fechacierre']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fechacierre, " ") ; 
          $this->fechacierre_hora = substr($this->fechacierre, $separador + 1) ; 
          $this->fechacierre = substr($this->fechacierre, 0, $separador) ; 
          nm_volta_data($this->fechacierre, $this->field_config['fechacierre']['date_format']) ; 
          nmgp_Form_Datas($this->fechacierre, $this->field_config['fechacierre']['date_format'], $this->field_config['fechacierre']['date_sep']) ;  
          $this->field_config['fechacierre']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fechacierre_hora, $this->field_config['fechacierre']['date_format']) ; 
          nmgp_Form_Hora($this->fechacierre_hora, $this->field_config['fechacierre']['date_format'], $this->field_config['fechacierre']['time_sep']) ;  
          $this->field_config['fechacierre']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fechacierre || '' == $this->fechacierre)
      {
          $this->fechacierre_hora = '';
          $this->fechacierre = '';
      }
      if ((!empty($this->fechapreliq) && 'null' != $this->fechapreliq) || (!empty($format_fields) && isset($format_fields['fechapreliq'])))
      {
          $nm_separa_data = strpos($this->field_config['fechapreliq']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fechapreliq']['date_format'];
          $this->field_config['fechapreliq']['date_format'] = substr($this->field_config['fechapreliq']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fechapreliq, " ") ; 
          $this->fechapreliq_hora = substr($this->fechapreliq, $separador + 1) ; 
          $this->fechapreliq = substr($this->fechapreliq, 0, $separador) ; 
          nm_volta_data($this->fechapreliq, $this->field_config['fechapreliq']['date_format']) ; 
          nmgp_Form_Datas($this->fechapreliq, $this->field_config['fechapreliq']['date_format'], $this->field_config['fechapreliq']['date_sep']) ;  
          $this->field_config['fechapreliq']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fechapreliq_hora, $this->field_config['fechapreliq']['date_format']) ; 
          nmgp_Form_Hora($this->fechapreliq_hora, $this->field_config['fechapreliq']['date_format'], $this->field_config['fechapreliq']['time_sep']) ;  
          $this->field_config['fechapreliq']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fechapreliq || '' == $this->fechapreliq)
      {
          $this->fechapreliq_hora = '';
          $this->fechapreliq = '';
      }
      if ((!empty($this->fechaliq) && 'null' != $this->fechaliq) || (!empty($format_fields) && isset($format_fields['fechaliq'])))
      {
          $nm_separa_data = strpos($this->field_config['fechaliq']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fechaliq']['date_format'];
          $this->field_config['fechaliq']['date_format'] = substr($this->field_config['fechaliq']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fechaliq, " ") ; 
          $this->fechaliq_hora = substr($this->fechaliq, $separador + 1) ; 
          $this->fechaliq = substr($this->fechaliq, 0, $separador) ; 
          nm_volta_data($this->fechaliq, $this->field_config['fechaliq']['date_format']) ; 
          nmgp_Form_Datas($this->fechaliq, $this->field_config['fechaliq']['date_format'], $this->field_config['fechaliq']['date_sep']) ;  
          $this->field_config['fechaliq']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fechaliq_hora, $this->field_config['fechaliq']['date_format']) ; 
          nmgp_Form_Hora($this->fechaliq_hora, $this->field_config['fechaliq']['date_format'], $this->field_config['fechaliq']['time_sep']) ;  
          $this->field_config['fechaliq']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fechaliq || '' == $this->fechaliq)
      {
          $this->fechaliq_hora = '';
          $this->fechaliq = '';
      }
      if ('' !== $this->operacion || (!empty($format_fields) && isset($format_fields['operacion'])))
      {
          nmgp_Form_Num_Val($this->operacion, $this->field_config['operacion']['symbol_grp'], $this->field_config['operacion']['symbol_dec'], "2", "S", $this->field_config['operacion']['format_neg'], "", "", "-", $this->field_config['operacion']['symbol_fmt']) ; 
      }
      if ('' !== $this->faltanteana || (!empty($format_fields) && isset($format_fields['faltanteana'])))
      {
          nmgp_Form_Num_Val($this->faltanteana, $this->field_config['faltanteana']['symbol_grp'], $this->field_config['faltanteana']['symbol_dec'], "2", "S", $this->field_config['faltanteana']['format_neg'], "", "", "-", $this->field_config['faltanteana']['symbol_fmt']) ; 
      }
      if ('' !== $this->ingresoelu_ana || (!empty($format_fields) && isset($format_fields['ingresoelu_ana'])))
      {
          nmgp_Form_Num_Val($this->ingresoelu_ana, $this->field_config['ingresoelu_ana']['symbol_grp'], $this->field_config['ingresoelu_ana']['symbol_dec'], "0", "S", $this->field_config['ingresoelu_ana']['format_neg'], "", "", "-", $this->field_config['ingresoelu_ana']['symbol_fmt']) ; 
      }
      if ('' !== $this->conteo || (!empty($format_fields) && isset($format_fields['conteo'])))
      {
          nmgp_Form_Num_Val($this->conteo, $this->field_config['conteo']['symbol_grp'], $this->field_config['conteo']['symbol_dec'], "0", "S", $this->field_config['conteo']['format_neg'], "", "", "-", $this->field_config['conteo']['symbol_fmt']) ; 
      }
      if ((!empty($this->fechainiciodictamen) && 'null' != $this->fechainiciodictamen) || (!empty($format_fields) && isset($format_fields['fechainiciodictamen'])))
      {
          $nm_separa_data = strpos($this->field_config['fechainiciodictamen']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fechainiciodictamen']['date_format'];
          $this->field_config['fechainiciodictamen']['date_format'] = substr($this->field_config['fechainiciodictamen']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fechainiciodictamen, " ") ; 
          $this->fechainiciodictamen_hora = substr($this->fechainiciodictamen, $separador + 1) ; 
          $this->fechainiciodictamen = substr($this->fechainiciodictamen, 0, $separador) ; 
          nm_volta_data($this->fechainiciodictamen, $this->field_config['fechainiciodictamen']['date_format']) ; 
          nmgp_Form_Datas($this->fechainiciodictamen, $this->field_config['fechainiciodictamen']['date_format'], $this->field_config['fechainiciodictamen']['date_sep']) ;  
          $this->field_config['fechainiciodictamen']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fechainiciodictamen_hora, $this->field_config['fechainiciodictamen']['date_format']) ; 
          nmgp_Form_Hora($this->fechainiciodictamen_hora, $this->field_config['fechainiciodictamen']['date_format'], $this->field_config['fechainiciodictamen']['time_sep']) ;  
          $this->field_config['fechainiciodictamen']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fechainiciodictamen || '' == $this->fechainiciodictamen)
      {
          $this->fechainiciodictamen_hora = '';
          $this->fechainiciodictamen = '';
      }
      if ((!empty($this->fechafindictamen) && 'null' != $this->fechafindictamen) || (!empty($format_fields) && isset($format_fields['fechafindictamen'])))
      {
          $nm_separa_data = strpos($this->field_config['fechafindictamen']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fechafindictamen']['date_format'];
          $this->field_config['fechafindictamen']['date_format'] = substr($this->field_config['fechafindictamen']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fechafindictamen, " ") ; 
          $this->fechafindictamen_hora = substr($this->fechafindictamen, $separador + 1) ; 
          $this->fechafindictamen = substr($this->fechafindictamen, 0, $separador) ; 
          nm_volta_data($this->fechafindictamen, $this->field_config['fechafindictamen']['date_format']) ; 
          nmgp_Form_Datas($this->fechafindictamen, $this->field_config['fechafindictamen']['date_format'], $this->field_config['fechafindictamen']['date_sep']) ;  
          $this->field_config['fechafindictamen']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fechafindictamen_hora, $this->field_config['fechafindictamen']['date_format']) ; 
          nmgp_Form_Hora($this->fechafindictamen_hora, $this->field_config['fechafindictamen']['date_format'], $this->field_config['fechafindictamen']['time_sep']) ;  
          $this->field_config['fechafindictamen']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fechafindictamen || '' == $this->fechafindictamen)
      {
          $this->fechafindictamen_hora = '';
          $this->fechafindictamen = '';
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
          $nm_campo = $trab_saida;
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
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['fechaoperacion']['date_format'];
      if ($this->fechaoperacion != "")  
      { 
          nm_conv_data($this->fechaoperacion, $this->field_config['fechaoperacion']['date_format']) ; 
          $this->fechaoperacion_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechaoperacion_hora = substr($this->fechaoperacion_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechaoperacion_hora = substr($this->fechaoperacion_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechaoperacion_hora = substr($this->fechaoperacion_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechaoperacion_hora = substr($this->fechaoperacion_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechaoperacion_hora = substr($this->fechaoperacion_hora, 0, -4);
          }
      } 
      if ($this->fechaoperacion == "" && $use_null)  
      { 
          $this->fechaoperacion = "null" ; 
      } 
      $this->field_config['fechaoperacion']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fechaturno']['date_format'];
      if ($this->fechaturno != "")  
      { 
          nm_conv_data($this->fechaturno, $this->field_config['fechaturno']['date_format']) ; 
          $this->fechaturno_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechaturno_hora = substr($this->fechaturno_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechaturno_hora = substr($this->fechaturno_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechaturno_hora = substr($this->fechaturno_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechaturno_hora = substr($this->fechaturno_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechaturno_hora = substr($this->fechaturno_hora, 0, -4);
          }
      } 
      if ($this->fechaturno == "" && $use_null)  
      { 
          $this->fechaturno = "null" ; 
      } 
      $this->field_config['fechaturno']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['horainicio']['date_format'];
      if ($this->horainicio != "")  
      { 
          $this->horainicio_hora = $this->horainicio;
          $this->horainicio = "1900-01-01";
          nm_conv_hora($this->horainicio_hora, $this->field_config['horainicio']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->horainicio_hora = substr($this->horainicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->horainicio_hora = substr($this->horainicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->horainicio_hora = substr($this->horainicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->horainicio_hora = substr($this->horainicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->horainicio_hora = substr($this->horainicio_hora, 0, -4);
          }
          $this->horainicio = $this->horainicio_hora;
      } 
      if ($this->horainicio == "" && $use_null)  
      { 
          $this->horainicio = "null" ; 
      } 
      $this->field_config['horainicio']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fechafin']['date_format'];
      if ($this->fechafin != "")  
      { 
          nm_conv_data($this->fechafin, $this->field_config['fechafin']['date_format']) ; 
          $this->fechafin_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechafin_hora = substr($this->fechafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechafin_hora = substr($this->fechafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechafin_hora = substr($this->fechafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechafin_hora = substr($this->fechafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechafin_hora = substr($this->fechafin_hora, 0, -4);
          }
      } 
      if ($this->fechafin == "" && $use_null)  
      { 
          $this->fechafin = "null" ; 
      } 
      $this->field_config['fechafin']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['horafin']['date_format'];
      if ($this->horafin != "")  
      { 
          $this->horafin_hora = $this->horafin;
          $this->horafin = "1900-01-01";
          nm_conv_hora($this->horafin_hora, $this->field_config['horafin']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->horafin_hora = substr($this->horafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->horafin_hora = substr($this->horafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->horafin_hora = substr($this->horafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->horafin_hora = substr($this->horafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->horafin_hora = substr($this->horafin_hora, 0, -4);
          }
          $this->horafin = $this->horafin_hora;
      } 
      if ($this->horafin == "" && $use_null)  
      { 
          $this->horafin = "null" ; 
      } 
      $this->field_config['horafin']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fechacierre']['date_format'];
      if ($this->fechacierre != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fechacierre']['date_format'], ";") ;
          $this->field_config['fechacierre']['date_format'] = substr($this->field_config['fechacierre']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fechacierre, $this->field_config['fechacierre']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fechacierre = str_replace('-', '', $this->fechacierre);
          }
          $this->field_config['fechacierre']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fechacierre_hora, $this->field_config['fechacierre']['date_format']) ; 
          if ($this->fechacierre_hora == "" )  
          { 
              $this->fechacierre_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fechacierre_hora = substr($this->fechacierre_hora, 0, -4) . "." . substr($this->fechacierre_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechacierre_hora = substr($this->fechacierre_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechacierre_hora = substr($this->fechacierre_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechacierre_hora = substr($this->fechacierre_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechacierre_hora = substr($this->fechacierre_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechacierre_hora = substr($this->fechacierre_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fechacierre_hora = substr($this->fechacierre_hora, 0, -4);
          }
          if ($this->fechacierre != "")  
          { 
              $this->fechacierre .= " " . $this->fechacierre_hora ; 
          }
      } 
      if ($this->fechacierre == "" && $use_null)  
      { 
          $this->fechacierre = "null" ; 
      } 
      $this->field_config['fechacierre']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fechapreliq']['date_format'];
      if ($this->fechapreliq != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fechapreliq']['date_format'], ";") ;
          $this->field_config['fechapreliq']['date_format'] = substr($this->field_config['fechapreliq']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fechapreliq, $this->field_config['fechapreliq']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fechapreliq = str_replace('-', '', $this->fechapreliq);
          }
          $this->field_config['fechapreliq']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fechapreliq_hora, $this->field_config['fechapreliq']['date_format']) ; 
          if ($this->fechapreliq_hora == "" )  
          { 
              $this->fechapreliq_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fechapreliq_hora = substr($this->fechapreliq_hora, 0, -4) . "." . substr($this->fechapreliq_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechapreliq_hora = substr($this->fechapreliq_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechapreliq_hora = substr($this->fechapreliq_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechapreliq_hora = substr($this->fechapreliq_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechapreliq_hora = substr($this->fechapreliq_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechapreliq_hora = substr($this->fechapreliq_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fechapreliq_hora = substr($this->fechapreliq_hora, 0, -4);
          }
          if ($this->fechapreliq != "")  
          { 
              $this->fechapreliq .= " " . $this->fechapreliq_hora ; 
          }
      } 
      $this->field_config['fechapreliq']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fechaliq']['date_format'];
      if ($this->fechaliq != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fechaliq']['date_format'], ";") ;
          $this->field_config['fechaliq']['date_format'] = substr($this->field_config['fechaliq']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fechaliq, $this->field_config['fechaliq']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fechaliq = str_replace('-', '', $this->fechaliq);
          }
          $this->field_config['fechaliq']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fechaliq_hora, $this->field_config['fechaliq']['date_format']) ; 
          if ($this->fechaliq_hora == "" )  
          { 
              $this->fechaliq_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fechaliq_hora = substr($this->fechaliq_hora, 0, -4) . "." . substr($this->fechaliq_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechaliq_hora = substr($this->fechaliq_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechaliq_hora = substr($this->fechaliq_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechaliq_hora = substr($this->fechaliq_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechaliq_hora = substr($this->fechaliq_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechaliq_hora = substr($this->fechaliq_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fechaliq_hora = substr($this->fechaliq_hora, 0, -4);
          }
          if ($this->fechaliq != "")  
          { 
              $this->fechaliq .= " " . $this->fechaliq_hora ; 
          }
      } 
      $this->field_config['fechaliq']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fechainiciodictamen']['date_format'];
      if ($this->fechainiciodictamen != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fechainiciodictamen']['date_format'], ";") ;
          $this->field_config['fechainiciodictamen']['date_format'] = substr($this->field_config['fechainiciodictamen']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fechainiciodictamen, $this->field_config['fechainiciodictamen']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fechainiciodictamen = str_replace('-', '', $this->fechainiciodictamen);
          }
          $this->field_config['fechainiciodictamen']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fechainiciodictamen_hora, $this->field_config['fechainiciodictamen']['date_format']) ; 
          if ($this->fechainiciodictamen_hora == "" )  
          { 
              $this->fechainiciodictamen_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fechainiciodictamen_hora = substr($this->fechainiciodictamen_hora, 0, -4) . "." . substr($this->fechainiciodictamen_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechainiciodictamen_hora = substr($this->fechainiciodictamen_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechainiciodictamen_hora = substr($this->fechainiciodictamen_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechainiciodictamen_hora = substr($this->fechainiciodictamen_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechainiciodictamen_hora = substr($this->fechainiciodictamen_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechainiciodictamen_hora = substr($this->fechainiciodictamen_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fechainiciodictamen_hora = substr($this->fechainiciodictamen_hora, 0, -4);
          }
          if ($this->fechainiciodictamen != "")  
          { 
              $this->fechainiciodictamen .= " " . $this->fechainiciodictamen_hora ; 
          }
      } 
      if ($this->fechainiciodictamen == "" && $use_null)  
      { 
          $this->fechainiciodictamen = "null" ; 
      } 
      $this->field_config['fechainiciodictamen']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fechafindictamen']['date_format'];
      if ($this->fechafindictamen != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fechafindictamen']['date_format'], ";") ;
          $this->field_config['fechafindictamen']['date_format'] = substr($this->field_config['fechafindictamen']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fechafindictamen, $this->field_config['fechafindictamen']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fechafindictamen = str_replace('-', '', $this->fechafindictamen);
          }
          $this->field_config['fechafindictamen']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fechafindictamen_hora, $this->field_config['fechafindictamen']['date_format']) ; 
          if ($this->fechafindictamen_hora == "" )  
          { 
              $this->fechafindictamen_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fechafindictamen_hora = substr($this->fechafindictamen_hora, 0, -4) . "." . substr($this->fechafindictamen_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechafindictamen_hora = substr($this->fechafindictamen_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechafindictamen_hora = substr($this->fechafindictamen_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechafindictamen_hora = substr($this->fechafindictamen_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechafindictamen_hora = substr($this->fechafindictamen_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechafindictamen_hora = substr($this->fechafindictamen_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fechafindictamen_hora = substr($this->fechafindictamen_hora, 0, -4);
          }
          if ($this->fechafindictamen != "")  
          { 
              $this->fechafindictamen .= " " . $this->fechafindictamen_hora ; 
          }
      } 
      if ($this->fechafindictamen == "" && $use_null)  
      { 
          $this->fechafindictamen = "null" ; 
      } 
      $this->field_config['fechafindictamen']['date_format'] = $guarda_format_hora;
   }
//
   function nm_prep_date_change($cmp_date, $format_dt)
   {
       $vl_return  = "";
       if ($cmp_date != 'null') {
           $vl_return .= (strpos($format_dt, "yy") !== false) ? substr($cmp_date,  0, 4) : "";
           $vl_return .= (strpos($format_dt, "mm") !== false) ? substr($cmp_date,  5, 2) : "";
           $vl_return .= (strpos($format_dt, "dd") !== false) ? substr($cmp_date,  8, 2) : "";
           $vl_return .= (strpos($format_dt, "hh") !== false) ? substr($cmp_date, 11, 2) : "";
           $vl_return .= (strpos($format_dt, "ii") !== false) ? substr($cmp_date, 14, 2) : "";
           $vl_return .= (strpos($format_dt, "ss") !== false) ? substr($cmp_date, 17, 2) : "";
       }
       return $vl_return;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_consecutivo();
          $this->ajax_return_values_turnoid();
          $this->ajax_return_values_casetaid();
          $this->ajax_return_values_tramoid();
          $this->ajax_return_values_cuerpo();
          $this->ajax_return_values_usuarioid();
          $this->ajax_return_values_carrilid();
          $this->ajax_return_values_fechaoperacion();
          $this->ajax_return_values_fechaturno();
          $this->ajax_return_values_horainicio();
          $this->ajax_return_values_fechafin();
          $this->ajax_return_values_horafin();
          $this->ajax_return_values_operacionid();
          $this->ajax_return_values_foliocierre();
          $this->ajax_return_values_estatuscarril();
          $this->ajax_return_values_observacion();
          $this->ajax_return_values_preliquidado();
          $this->ajax_return_values_montocr();
          $this->ajax_return_values_montoana();
          $this->ajax_return_values_cantidadmxn();
          $this->ajax_return_values_cantidadusd();
          $this->ajax_return_values_importemxn();
          $this->ajax_return_values_importeusd();
          $this->ajax_return_values_folioinicialcr();
          $this->ajax_return_values_foliofinalcr();
          $this->ajax_return_values_folioinicialeap();
          $this->ajax_return_values_foliofinaleap();
          $this->ajax_return_values_faltante();
          $this->ajax_return_values_ingresoelu_pre();
          $this->ajax_return_values_entregado();
          $this->ajax_return_values_administradorid();
          $this->ajax_return_values_encargadoturnoid();
          $this->ajax_return_values_encargadoturnoid_pre();
          $this->ajax_return_values_fechacierre();
          $this->ajax_return_values_fechapreliq();
          $this->ajax_return_values_fechaliq();
          $this->ajax_return_values_operacion();
          $this->ajax_return_values_liquidadorid();
          $this->ajax_return_values_faltanteana();
          $this->ajax_return_values_ingresoelu_ana();
          $this->ajax_return_values_conteo();
          $this->ajax_return_values_fechainiciodictamen();
          $this->ajax_return_values_fechafindictamen();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['consecutivo']['keyVal'] = form_muestra_ingresoEluPre_pack_protect_string($this->nmgp_dados_form['consecutivo']);
          }
   } // ajax_return_values

          //----- consecutivo
   function ajax_return_values_consecutivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("consecutivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->consecutivo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['consecutivo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("consecutivo", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- turnoid
   function ajax_return_values_turnoid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("turnoid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->turnoid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['turnoid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- casetaid
   function ajax_return_values_casetaid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("casetaid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->casetaid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['casetaid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tramoid
   function ajax_return_values_tramoid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tramoid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tramoid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tramoid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cuerpo
   function ajax_return_values_cuerpo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cuerpo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cuerpo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cuerpo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- usuarioid
   function ajax_return_values_usuarioid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("usuarioid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->usuarioid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['usuarioid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- carrilid
   function ajax_return_values_carrilid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("carrilid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->carrilid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['carrilid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fechaoperacion
   function ajax_return_values_fechaoperacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechaoperacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechaoperacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechaoperacion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fechaturno
   function ajax_return_values_fechaturno($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechaturno", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechaturno);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechaturno'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- horainicio
   function ajax_return_values_horainicio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("horainicio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->horainicio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['horainicio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fechafin
   function ajax_return_values_fechafin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechafin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechafin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechafin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- horafin
   function ajax_return_values_horafin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("horafin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->horafin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['horafin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- operacionid
   function ajax_return_values_operacionid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("operacionid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->operacionid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['operacionid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- foliocierre
   function ajax_return_values_foliocierre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("foliocierre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->foliocierre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['foliocierre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- estatuscarril
   function ajax_return_values_estatuscarril($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatuscarril", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatuscarril);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['estatuscarril'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- observacion
   function ajax_return_values_observacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("observacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->observacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['observacion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- preliquidado
   function ajax_return_values_preliquidado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("preliquidado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->preliquidado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['preliquidado'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- montocr
   function ajax_return_values_montocr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("montocr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->montocr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['montocr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- montoana
   function ajax_return_values_montoana($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("montoana", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->montoana);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['montoana'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cantidadmxn
   function ajax_return_values_cantidadmxn($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidadmxn", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cantidadmxn);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cantidadmxn'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cantidadusd
   function ajax_return_values_cantidadusd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidadusd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cantidadusd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cantidadusd'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importemxn
   function ajax_return_values_importemxn($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importemxn", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importemxn);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importemxn'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeusd
   function ajax_return_values_importeusd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeusd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeusd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeusd'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- folioinicialcr
   function ajax_return_values_folioinicialcr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("folioinicialcr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->folioinicialcr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['folioinicialcr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- foliofinalcr
   function ajax_return_values_foliofinalcr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("foliofinalcr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->foliofinalcr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['foliofinalcr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- folioinicialeap
   function ajax_return_values_folioinicialeap($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("folioinicialeap", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->folioinicialeap);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['folioinicialeap'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- foliofinaleap
   function ajax_return_values_foliofinaleap($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("foliofinaleap", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->foliofinaleap);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['foliofinaleap'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- faltante
   function ajax_return_values_faltante($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("faltante", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->faltante);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['faltante'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ingresoelu_pre
   function ajax_return_values_ingresoelu_pre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ingresoelu_pre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ingresoelu_pre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ingresoelu_pre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- entregado
   function ajax_return_values_entregado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("entregado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->entregado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['entregado'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- administradorid
   function ajax_return_values_administradorid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("administradorid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->administradorid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['administradorid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- encargadoturnoid
   function ajax_return_values_encargadoturnoid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("encargadoturnoid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->encargadoturnoid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['encargadoturnoid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- encargadoturnoid_pre
   function ajax_return_values_encargadoturnoid_pre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("encargadoturnoid_pre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->encargadoturnoid_pre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['encargadoturnoid_pre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fechacierre
   function ajax_return_values_fechacierre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechacierre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechacierre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechacierre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fechacierre . ' ' . $this->fechacierre_hora),
              );
          }
   }

          //----- fechapreliq
   function ajax_return_values_fechapreliq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechapreliq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechapreliq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechapreliq'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fechapreliq . ' ' . $this->fechapreliq_hora),
              );
          }
   }

          //----- fechaliq
   function ajax_return_values_fechaliq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechaliq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechaliq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechaliq'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fechaliq . ' ' . $this->fechaliq_hora),
              );
          }
   }

          //----- operacion
   function ajax_return_values_operacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("operacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->operacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['operacion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- liquidadorid
   function ajax_return_values_liquidadorid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("liquidadorid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->liquidadorid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['liquidadorid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- faltanteana
   function ajax_return_values_faltanteana($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("faltanteana", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->faltanteana);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['faltanteana'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ingresoelu_ana
   function ajax_return_values_ingresoelu_ana($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ingresoelu_ana", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ingresoelu_ana);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ingresoelu_ana'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- conteo
   function ajax_return_values_conteo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("conteo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->conteo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['conteo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fechainiciodictamen
   function ajax_return_values_fechainiciodictamen($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechainiciodictamen", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechainiciodictamen);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechainiciodictamen'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fechainiciodictamen . ' ' . $this->fechainiciodictamen_hora),
              );
          }
   }

          //----- fechafindictamen
   function ajax_return_values_fechafindictamen($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechafindictamen", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechafindictamen);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechafindictamen'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fechafindictamen . ' ' . $this->fechafindictamen_hora),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->montocr = str_replace($sc_parm1, $sc_parm2, $this->montocr); 
      $this->montoana = str_replace($sc_parm1, $sc_parm2, $this->montoana); 
      $this->importemxn = str_replace($sc_parm1, $sc_parm2, $this->importemxn); 
      $this->importeusd = str_replace($sc_parm1, $sc_parm2, $this->importeusd); 
      $this->faltante = str_replace($sc_parm1, $sc_parm2, $this->faltante); 
      $this->entregado = str_replace($sc_parm1, $sc_parm2, $this->entregado); 
      $this->operacion = str_replace($sc_parm1, $sc_parm2, $this->operacion); 
      $this->faltanteana = str_replace($sc_parm1, $sc_parm2, $this->faltanteana); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->montocr = "'" . $this->montocr . "'";
      $this->montoana = "'" . $this->montoana . "'";
      $this->importemxn = "'" . $this->importemxn . "'";
      $this->importeusd = "'" . $this->importeusd . "'";
      $this->faltante = "'" . $this->faltante . "'";
      $this->entregado = "'" . $this->entregado . "'";
      $this->operacion = "'" . $this->operacion . "'";
      $this->faltanteana = "'" . $this->faltanteana . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->montocr = str_replace("'", "", $this->montocr); 
      $this->montoana = str_replace("'", "", $this->montoana); 
      $this->importemxn = str_replace("'", "", $this->importemxn); 
      $this->importeusd = str_replace("'", "", $this->importeusd); 
      $this->faltante = str_replace("'", "", $this->faltante); 
      $this->entregado = str_replace("'", "", $this->entregado); 
      $this->operacion = str_replace("'", "", $this->operacion); 
      $this->faltanteana = str_replace("'", "", $this->faltanteana); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $this->SC_log_atv = false;
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_key($this->nmgp_opcao);
      }
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_old();
      }
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if ((!isset($this->Ini->nm_bases_access) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['consecutivo'] = $this->consecutivo;
      $NM_val_form['turnoid'] = $this->turnoid;
      $NM_val_form['casetaid'] = $this->casetaid;
      $NM_val_form['tramoid'] = $this->tramoid;
      $NM_val_form['cuerpo'] = $this->cuerpo;
      $NM_val_form['usuarioid'] = $this->usuarioid;
      $NM_val_form['carrilid'] = $this->carrilid;
      $NM_val_form['fechaoperacion'] = $this->fechaoperacion;
      $NM_val_form['fechaturno'] = $this->fechaturno;
      $NM_val_form['horainicio'] = $this->horainicio;
      $NM_val_form['fechafin'] = $this->fechafin;
      $NM_val_form['horafin'] = $this->horafin;
      $NM_val_form['operacionid'] = $this->operacionid;
      $NM_val_form['foliocierre'] = $this->foliocierre;
      $NM_val_form['estatuscarril'] = $this->estatuscarril;
      $NM_val_form['observacion'] = $this->observacion;
      $NM_val_form['preliquidado'] = $this->preliquidado;
      $NM_val_form['montocr'] = $this->montocr;
      $NM_val_form['montoana'] = $this->montoana;
      $NM_val_form['cantidadmxn'] = $this->cantidadmxn;
      $NM_val_form['cantidadusd'] = $this->cantidadusd;
      $NM_val_form['importemxn'] = $this->importemxn;
      $NM_val_form['importeusd'] = $this->importeusd;
      $NM_val_form['folioinicialcr'] = $this->folioinicialcr;
      $NM_val_form['foliofinalcr'] = $this->foliofinalcr;
      $NM_val_form['folioinicialeap'] = $this->folioinicialeap;
      $NM_val_form['foliofinaleap'] = $this->foliofinaleap;
      $NM_val_form['faltante'] = $this->faltante;
      $NM_val_form['ingresoelu_pre'] = $this->ingresoelu_pre;
      $NM_val_form['entregado'] = $this->entregado;
      $NM_val_form['administradorid'] = $this->administradorid;
      $NM_val_form['encargadoturnoid'] = $this->encargadoturnoid;
      $NM_val_form['encargadoturnoid_pre'] = $this->encargadoturnoid_pre;
      $NM_val_form['fechacierre'] = $this->fechacierre;
      $NM_val_form['fechapreliq'] = $this->fechapreliq;
      $NM_val_form['fechaliq'] = $this->fechaliq;
      $NM_val_form['operacion'] = $this->operacion;
      $NM_val_form['liquidadorid'] = $this->liquidadorid;
      $NM_val_form['faltanteana'] = $this->faltanteana;
      $NM_val_form['ingresoelu_ana'] = $this->ingresoelu_ana;
      $NM_val_form['conteo'] = $this->conteo;
      $NM_val_form['fechainiciodictamen'] = $this->fechainiciodictamen;
      $NM_val_form['fechafindictamen'] = $this->fechafindictamen;
      if ($this->consecutivo === "" || is_null($this->consecutivo))  
      { 
          $this->consecutivo = 0;
      } 
      if ($this->turnoid === "" || is_null($this->turnoid))  
      { 
          $this->turnoid = 0;
          $this->sc_force_zero[] = 'turnoid';
      } 
      if ($this->casetaid === "" || is_null($this->casetaid))  
      { 
          $this->casetaid = 0;
          $this->sc_force_zero[] = 'casetaid';
      } 
      if ($this->tramoid === "" || is_null($this->tramoid))  
      { 
          $this->tramoid = 0;
          $this->sc_force_zero[] = 'tramoid';
      } 
      if ($this->carrilid === "" || is_null($this->carrilid))  
      { 
          $this->carrilid = 0;
          $this->sc_force_zero[] = 'carrilid';
      } 
      if ($this->preliquidado === "" || is_null($this->preliquidado))  
      { 
          $this->preliquidado = 0;
          $this->sc_force_zero[] = 'preliquidado';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->montocr === "" || is_null($this->montocr))  
      { 
          $this->montocr = 0;
          $this->sc_force_zero[] = 'montocr';
      } 
      }
      if ($this->montoana === "" || is_null($this->montoana))  
      { 
          $this->montoana = 0;
          $this->sc_force_zero[] = 'montoana';
      } 
      if ($this->cantidadmxn === "" || is_null($this->cantidadmxn))  
      { 
          $this->cantidadmxn = 0;
          $this->sc_force_zero[] = 'cantidadmxn';
      } 
      if ($this->cantidadusd === "" || is_null($this->cantidadusd))  
      { 
          $this->cantidadusd = 0;
          $this->sc_force_zero[] = 'cantidadusd';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->importemxn === "" || is_null($this->importemxn))  
      { 
          $this->importemxn = 0;
          $this->sc_force_zero[] = 'importemxn';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->importeusd === "" || is_null($this->importeusd))  
      { 
          $this->importeusd = 0;
          $this->sc_force_zero[] = 'importeusd';
      } 
      }
      if ($this->folioinicialcr === "" || is_null($this->folioinicialcr))  
      { 
          $this->folioinicialcr = 0;
          $this->sc_force_zero[] = 'folioinicialcr';
      } 
      if ($this->foliofinalcr === "" || is_null($this->foliofinalcr))  
      { 
          $this->foliofinalcr = 0;
          $this->sc_force_zero[] = 'foliofinalcr';
      } 
      if ($this->folioinicialeap === "" || is_null($this->folioinicialeap))  
      { 
          $this->folioinicialeap = 0;
          $this->sc_force_zero[] = 'folioinicialeap';
      } 
      if ($this->foliofinaleap === "" || is_null($this->foliofinaleap))  
      { 
          $this->foliofinaleap = 0;
          $this->sc_force_zero[] = 'foliofinaleap';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->faltante === "" || is_null($this->faltante))  
      { 
          $this->faltante = 0;
          $this->sc_force_zero[] = 'faltante';
      } 
      }
      if ($this->ingresoelu_pre === "" || is_null($this->ingresoelu_pre))  
      { 
          $this->ingresoelu_pre = 0;
          $this->sc_force_zero[] = 'ingresoelu_pre';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->entregado === "" || is_null($this->entregado))  
      { 
          $this->entregado = 0;
          $this->sc_force_zero[] = 'entregado';
      } 
      }
      if ($this->administradorid === "" || is_null($this->administradorid))  
      { 
          $this->administradorid = 0;
          $this->sc_force_zero[] = 'administradorid';
      } 
      if ($this->encargadoturnoid === "" || is_null($this->encargadoturnoid))  
      { 
          $this->encargadoturnoid = 0;
          $this->sc_force_zero[] = 'encargadoturnoid';
      } 
      if ($this->encargadoturnoid_pre === "" || is_null($this->encargadoturnoid_pre))  
      { 
          $this->encargadoturnoid_pre = 0;
          $this->sc_force_zero[] = 'encargadoturnoid_pre';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->operacion === "" || is_null($this->operacion))  
      { 
          $this->operacion = 0;
          $this->sc_force_zero[] = 'operacion';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->faltanteana === "" || is_null($this->faltanteana))  
      { 
          $this->faltanteana = 0;
          $this->sc_force_zero[] = 'faltanteana';
      } 
      }
      if ($this->ingresoelu_ana === "" || is_null($this->ingresoelu_ana))  
      { 
          $this->ingresoelu_ana = 0;
          $this->sc_force_zero[] = 'ingresoelu_ana';
      } 
      if ($this->conteo === "" || is_null($this->conteo))  
      { 
          $this->conteo = 0;
          $this->sc_force_zero[] = 'conteo';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->cuerpo_before_qstr = $this->cuerpo;
          $this->cuerpo = substr($this->Db->qstr($this->cuerpo), 1, -1); 
          if ($this->cuerpo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cuerpo = "null"; 
              $NM_val_null[] = "cuerpo";
          } 
          $this->usuarioid_before_qstr = $this->usuarioid;
          $this->usuarioid = substr($this->Db->qstr($this->usuarioid), 1, -1); 
          if ($this->usuarioid == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->usuarioid = "null"; 
              $NM_val_null[] = "usuarioid";
          } 
          if ($this->fechaoperacion == "")  
          { 
              $this->fechaoperacion = "null"; 
              $NM_val_null[] = "fechaoperacion";
          } 
          if ($this->fechaturno == "")  
          { 
              $this->fechaturno = "null"; 
              $NM_val_null[] = "fechaturno";
          } 
          if ($this->horainicio == "")  
          { 
              $this->horainicio = "null"; 
              $NM_val_null[] = "horainicio";
          } 
          if ($this->fechafin == "")  
          { 
              $this->fechafin = "null"; 
              $NM_val_null[] = "fechafin";
          } 
          if ($this->horafin == "")  
          { 
              $this->horafin = "null"; 
              $NM_val_null[] = "horafin";
          } 
          $this->operacionid_before_qstr = $this->operacionid;
          $this->operacionid = substr($this->Db->qstr($this->operacionid), 1, -1); 
          if ($this->operacionid == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->operacionid = "null"; 
              $NM_val_null[] = "operacionid";
          } 
          $this->foliocierre_before_qstr = $this->foliocierre;
          $this->foliocierre = substr($this->Db->qstr($this->foliocierre), 1, -1); 
          if ($this->foliocierre == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->foliocierre = "null"; 
              $NM_val_null[] = "foliocierre";
          } 
          $this->estatuscarril_before_qstr = $this->estatuscarril;
          $this->estatuscarril = substr($this->Db->qstr($this->estatuscarril), 1, -1); 
          if ($this->estatuscarril == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->estatuscarril = "null"; 
              $NM_val_null[] = "estatuscarril";
          } 
          $this->observacion_before_qstr = $this->observacion;
          $this->observacion = substr($this->Db->qstr($this->observacion), 1, -1); 
          if ($this->observacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observacion = "null"; 
              $NM_val_null[] = "observacion";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->fechacierre == "")  
          { 
              $this->fechacierre = "null"; 
              $NM_val_null[] = "fechacierre";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fechapreliq == "")  
              { 
                  $this->fechapreliq = "null"; 
                  $NM_val_null[] = "fechapreliq";
              } 
              if ($this->fechapreliq == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fechapreliq = "null"; 
                  $NM_val_null[] = "fechapreliq";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fechaliq == "")  
              { 
                  $this->fechaliq = "null"; 
                  $NM_val_null[] = "fechaliq";
              } 
              if ($this->fechaliq == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fechaliq = "null"; 
                  $NM_val_null[] = "fechaliq";
              } 
          }
          $this->liquidadorid_before_qstr = $this->liquidadorid;
          $this->liquidadorid = substr($this->Db->qstr($this->liquidadorid), 1, -1); 
          if ($this->liquidadorid == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->liquidadorid = "null"; 
              $NM_val_null[] = "liquidadorid";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->fechainiciodictamen == "")  
          { 
              $this->fechainiciodictamen = "null"; 
              $NM_val_null[] = "fechainiciodictamen";
          } 
          if ($this->fechafindictamen == "")  
          { 
              $this->fechafindictamen = "null"; 
              $NM_val_null[] = "fechafindictamen";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_muestra_ingresoEluPre_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where (FechaOperacion = " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . " AND TurnoID = " . $this->turnoid . " AND CasetaID = " . $this->casetaid . " AND CarrilID = " . $this->carrilid . " AND HoraInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . " AND Cuerpo = '" . $this->cuerpo . "') AND (Consecutivo <> $this->consecutivo)";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
              {
                  $dbErrorMessage = $this->Db->ErrorMsg();
                  $dbErrorCode = $this->Db->ErrorNo();
                  $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) {
                      $this->sc_erro_update = $dbErrorMessage;
                      $this->NM_rollback_db();
                      if ($this->NM_ajax_flag) {
                          form_muestra_ingresoEluPre_pack_ajax_response();
                      }
                      exit;
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_ukey'] . " Fecha Operacion, Turno ID, Caseta ID, Carril ID, Hora Inicio, Cuerpo"); 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'fechaoperacion+turnoid+casetaid+carrilid+horainicio+cuerpo';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "TurnoID = $this->turnoid, CasetaID = $this->casetaid, TramoID = $this->tramoid, Cuerpo = '$this->cuerpo', UsuarioID = '$this->usuarioid', CarrilID = $this->carrilid, FechaOperacion = #$this->fechaoperacion#, FechaTurno = #$this->fechaturno#, HoraInicio = #$this->horainicio#, FechaFin = #$this->fechafin#, HoraFin = #$this->horafin#, OperacionID = '$this->operacionid', FolioCierre = '$this->foliocierre', EstatusCarril = '$this->estatuscarril', Observacion = '$this->observacion', PreLiquidado = $this->preliquidado, MontoCR = $this->montocr, MontoANA = $this->montoana, CantidadMXN = $this->cantidadmxn, CantidadUSD = $this->cantidadusd, ImporteMXN = $this->importemxn, ImporteUSD = $this->importeusd, FolioInicialCR = $this->folioinicialcr, FolioFinalCR = $this->foliofinalcr, FolioInicialEAP = $this->folioinicialeap, FolioFinalEAP = $this->foliofinaleap, Faltante = $this->faltante, IngresoELU_PRE = $this->ingresoelu_pre, Entregado = $this->entregado, AdministradorID = $this->administradorid, EncargadoTurnoID = $this->encargadoturnoid, EncargadoTurnoID_Pre = $this->encargadoturnoid_pre, FechaCierre = #$this->fechacierre#, FechaPreLiq = #$this->fechapreliq#, FechaLiq = #$this->fechaliq#, Operacion = $this->operacion, LiquidadorID = '$this->liquidadorid', FaltanteANA = $this->faltanteana, IngresoELU_ANA = $this->ingresoelu_ana, Conteo = $this->conteo, FechaInicioDictamen = #$this->fechainiciodictamen#, FechaFinDictamen = #$this->fechafindictamen#"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "TurnoID = $this->turnoid, CasetaID = $this->casetaid, TramoID = $this->tramoid, Cuerpo = '$this->cuerpo', UsuarioID = '$this->usuarioid', CarrilID = $this->carrilid, FechaOperacion = " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", FechaTurno = " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", HoraInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", FechaFin = " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", HoraFin = " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", OperacionID = '$this->operacionid', FolioCierre = '$this->foliocierre', EstatusCarril = '$this->estatuscarril', Observacion = '$this->observacion', PreLiquidado = $this->preliquidado, MontoCR = $this->montocr, MontoANA = $this->montoana, CantidadMXN = $this->cantidadmxn, CantidadUSD = $this->cantidadusd, ImporteMXN = $this->importemxn, ImporteUSD = $this->importeusd, FolioInicialCR = $this->folioinicialcr, FolioFinalCR = $this->foliofinalcr, FolioInicialEAP = $this->folioinicialeap, FolioFinalEAP = $this->foliofinaleap, Faltante = $this->faltante, IngresoELU_PRE = $this->ingresoelu_pre, Entregado = $this->entregado, AdministradorID = $this->administradorid, EncargadoTurnoID = $this->encargadoturnoid, EncargadoTurnoID_Pre = $this->encargadoturnoid_pre, FechaCierre = " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", FechaPreLiq = " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . ", FechaLiq = " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . ", Operacion = $this->operacion, LiquidadorID = '$this->liquidadorid', FaltanteANA = $this->faltanteana, IngresoELU_ANA = $this->ingresoelu_ana, Conteo = $this->conteo, FechaInicioDictamen = " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", FechaFinDictamen = " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . ""; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "TurnoID = $this->turnoid, CasetaID = $this->casetaid, TramoID = $this->tramoid, Cuerpo = '$this->cuerpo', UsuarioID = '$this->usuarioid', CarrilID = $this->carrilid, FechaOperacion = " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", FechaTurno = " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", HoraInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", FechaFin = " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", HoraFin = " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", OperacionID = '$this->operacionid', FolioCierre = '$this->foliocierre', EstatusCarril = '$this->estatuscarril', Observacion = '$this->observacion', PreLiquidado = $this->preliquidado, MontoCR = $this->montocr, MontoANA = $this->montoana, CantidadMXN = $this->cantidadmxn, CantidadUSD = $this->cantidadusd, ImporteMXN = $this->importemxn, ImporteUSD = $this->importeusd, FolioInicialCR = $this->folioinicialcr, FolioFinalCR = $this->foliofinalcr, FolioInicialEAP = $this->folioinicialeap, FolioFinalEAP = $this->foliofinaleap, Faltante = $this->faltante, IngresoELU_PRE = $this->ingresoelu_pre, Entregado = $this->entregado, AdministradorID = $this->administradorid, EncargadoTurnoID = $this->encargadoturnoid, EncargadoTurnoID_Pre = $this->encargadoturnoid_pre, FechaCierre = " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", FechaPreLiq = " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . ", FechaLiq = " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . ", Operacion = $this->operacion, LiquidadorID = '$this->liquidadorid', FaltanteANA = $this->faltanteana, IngresoELU_ANA = $this->ingresoelu_ana, Conteo = $this->conteo, FechaInicioDictamen = " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", FechaFinDictamen = " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . ""; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "TurnoID = $this->turnoid, CasetaID = $this->casetaid, TramoID = $this->tramoid, Cuerpo = '$this->cuerpo', UsuarioID = '$this->usuarioid', CarrilID = $this->carrilid, FechaOperacion = EXTEND('$this->fechaoperacion', YEAR TO DAY), FechaTurno = EXTEND('$this->fechaturno', YEAR TO DAY), HoraInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", FechaFin = EXTEND('$this->fechafin', YEAR TO DAY), HoraFin = " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", OperacionID = '$this->operacionid', FolioCierre = '$this->foliocierre', EstatusCarril = '$this->estatuscarril', Observacion = '$this->observacion', PreLiquidado = $this->preliquidado, MontoCR = $this->montocr, MontoANA = $this->montoana, CantidadMXN = $this->cantidadmxn, CantidadUSD = $this->cantidadusd, ImporteMXN = $this->importemxn, ImporteUSD = $this->importeusd, FolioInicialCR = $this->folioinicialcr, FolioFinalCR = $this->foliofinalcr, FolioInicialEAP = $this->folioinicialeap, FolioFinalEAP = $this->foliofinaleap, Faltante = $this->faltante, IngresoELU_PRE = $this->ingresoelu_pre, Entregado = $this->entregado, AdministradorID = $this->administradorid, EncargadoTurnoID = $this->encargadoturnoid, EncargadoTurnoID_Pre = $this->encargadoturnoid_pre, FechaCierre = EXTEND('$this->fechacierre', YEAR TO FRACTION), FechaPreLiq = EXTEND('$this->fechapreliq', YEAR TO FRACTION), FechaLiq = EXTEND('$this->fechaliq', YEAR TO FRACTION), Operacion = $this->operacion, LiquidadorID = '$this->liquidadorid', FaltanteANA = $this->faltanteana, IngresoELU_ANA = $this->ingresoelu_ana, Conteo = $this->conteo, FechaInicioDictamen = EXTEND('$this->fechainiciodictamen', YEAR TO FRACTION), FechaFinDictamen = EXTEND('$this->fechafindictamen', YEAR TO FRACTION)"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "TurnoID = $this->turnoid, CasetaID = $this->casetaid, TramoID = $this->tramoid, Cuerpo = '$this->cuerpo', UsuarioID = '$this->usuarioid', CarrilID = $this->carrilid, FechaOperacion = " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", FechaTurno = " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", HoraInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", FechaFin = " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", HoraFin = " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", OperacionID = '$this->operacionid', FolioCierre = '$this->foliocierre', EstatusCarril = '$this->estatuscarril', Observacion = '$this->observacion', PreLiquidado = $this->preliquidado, MontoCR = $this->montocr, MontoANA = $this->montoana, CantidadMXN = $this->cantidadmxn, CantidadUSD = $this->cantidadusd, ImporteMXN = $this->importemxn, ImporteUSD = $this->importeusd, FolioInicialCR = $this->folioinicialcr, FolioFinalCR = $this->foliofinalcr, FolioInicialEAP = $this->folioinicialeap, FolioFinalEAP = $this->foliofinaleap, Faltante = $this->faltante, IngresoELU_PRE = $this->ingresoelu_pre, Entregado = $this->entregado, AdministradorID = $this->administradorid, EncargadoTurnoID = $this->encargadoturnoid, EncargadoTurnoID_Pre = $this->encargadoturnoid_pre, FechaCierre = " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", FechaPreLiq = " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . ", FechaLiq = " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . ", Operacion = $this->operacion, LiquidadorID = '$this->liquidadorid', FaltanteANA = $this->faltanteana, IngresoELU_ANA = $this->ingresoelu_ana, Conteo = $this->conteo, FechaInicioDictamen = " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", FechaFinDictamen = " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . ""; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "TurnoID = $this->turnoid, CasetaID = $this->casetaid, TramoID = $this->tramoid, Cuerpo = '$this->cuerpo', UsuarioID = '$this->usuarioid', CarrilID = $this->carrilid, FechaOperacion = " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", FechaTurno = " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", HoraInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", FechaFin = " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", HoraFin = " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", OperacionID = '$this->operacionid', FolioCierre = '$this->foliocierre', EstatusCarril = '$this->estatuscarril', Observacion = '$this->observacion', PreLiquidado = $this->preliquidado, MontoCR = $this->montocr, MontoANA = $this->montoana, CantidadMXN = $this->cantidadmxn, CantidadUSD = $this->cantidadusd, ImporteMXN = $this->importemxn, ImporteUSD = $this->importeusd, FolioInicialCR = $this->folioinicialcr, FolioFinalCR = $this->foliofinalcr, FolioInicialEAP = $this->folioinicialeap, FolioFinalEAP = $this->foliofinaleap, Faltante = $this->faltante, IngresoELU_PRE = $this->ingresoelu_pre, Entregado = $this->entregado, AdministradorID = $this->administradorid, EncargadoTurnoID = $this->encargadoturnoid, EncargadoTurnoID_Pre = $this->encargadoturnoid_pre, FechaCierre = " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", FechaPreLiq = " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . ", FechaLiq = " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . ", Operacion = $this->operacion, LiquidadorID = '$this->liquidadorid', FaltanteANA = $this->faltanteana, IngresoELU_ANA = $this->ingresoelu_ana, Conteo = $this->conteo, FechaInicioDictamen = " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", FechaFinDictamen = " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . ""; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "TurnoID = $this->turnoid, CasetaID = $this->casetaid, TramoID = $this->tramoid, Cuerpo = '$this->cuerpo', UsuarioID = '$this->usuarioid', CarrilID = $this->carrilid, FechaOperacion = " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", FechaTurno = " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", HoraInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", FechaFin = " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", HoraFin = " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", OperacionID = '$this->operacionid', FolioCierre = '$this->foliocierre', EstatusCarril = '$this->estatuscarril', Observacion = '$this->observacion', PreLiquidado = $this->preliquidado, MontoCR = $this->montocr, MontoANA = $this->montoana, CantidadMXN = $this->cantidadmxn, CantidadUSD = $this->cantidadusd, ImporteMXN = $this->importemxn, ImporteUSD = $this->importeusd, FolioInicialCR = $this->folioinicialcr, FolioFinalCR = $this->foliofinalcr, FolioInicialEAP = $this->folioinicialeap, FolioFinalEAP = $this->foliofinaleap, Faltante = $this->faltante, IngresoELU_PRE = $this->ingresoelu_pre, Entregado = $this->entregado, AdministradorID = $this->administradorid, EncargadoTurnoID = $this->encargadoturnoid, EncargadoTurnoID_Pre = $this->encargadoturnoid_pre, FechaCierre = " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", FechaPreLiq = " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . ", FechaLiq = " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . ", Operacion = $this->operacion, LiquidadorID = '$this->liquidadorid', FaltanteANA = $this->faltanteana, IngresoELU_ANA = $this->ingresoelu_ana, Conteo = $this->conteo, FechaInicioDictamen = " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", FechaFinDictamen = " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . ""; 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE Consecutivo = $this->consecutivo ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE Consecutivo = $this->consecutivo ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE Consecutivo = $this->consecutivo ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE Consecutivo = $this->consecutivo ";  
              }  
              else  
              {
                  $comando .= " WHERE Consecutivo = $this->consecutivo ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_muestra_ingresoEluPre_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->cuerpo = $this->cuerpo_before_qstr;
              $this->usuarioid = $this->usuarioid_before_qstr;
              $this->operacionid = $this->operacionid_before_qstr;
              $this->foliocierre = $this->foliocierre_before_qstr;
              $this->estatuscarril = $this->estatuscarril_before_qstr;
              $this->observacion = $this->observacion_before_qstr;
              $this->liquidadorid = $this->liquidadorid_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['consecutivo'])) { $this->consecutivo = $NM_val_form['consecutivo']; }
              elseif (isset($this->consecutivo)) { $this->nm_limpa_alfa($this->consecutivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['turnoid'])) { $this->turnoid = $NM_val_form['turnoid']; }
              elseif (isset($this->turnoid)) { $this->nm_limpa_alfa($this->turnoid); }
              if     (isset($NM_val_form) && isset($NM_val_form['casetaid'])) { $this->casetaid = $NM_val_form['casetaid']; }
              elseif (isset($this->casetaid)) { $this->nm_limpa_alfa($this->casetaid); }
              if     (isset($NM_val_form) && isset($NM_val_form['tramoid'])) { $this->tramoid = $NM_val_form['tramoid']; }
              elseif (isset($this->tramoid)) { $this->nm_limpa_alfa($this->tramoid); }
              if     (isset($NM_val_form) && isset($NM_val_form['cuerpo'])) { $this->cuerpo = $NM_val_form['cuerpo']; }
              elseif (isset($this->cuerpo)) { $this->nm_limpa_alfa($this->cuerpo); }
              if     (isset($NM_val_form) && isset($NM_val_form['usuarioid'])) { $this->usuarioid = $NM_val_form['usuarioid']; }
              elseif (isset($this->usuarioid)) { $this->nm_limpa_alfa($this->usuarioid); }
              if     (isset($NM_val_form) && isset($NM_val_form['carrilid'])) { $this->carrilid = $NM_val_form['carrilid']; }
              elseif (isset($this->carrilid)) { $this->nm_limpa_alfa($this->carrilid); }
              if     (isset($NM_val_form) && isset($NM_val_form['operacionid'])) { $this->operacionid = $NM_val_form['operacionid']; }
              elseif (isset($this->operacionid)) { $this->nm_limpa_alfa($this->operacionid); }
              if     (isset($NM_val_form) && isset($NM_val_form['foliocierre'])) { $this->foliocierre = $NM_val_form['foliocierre']; }
              elseif (isset($this->foliocierre)) { $this->nm_limpa_alfa($this->foliocierre); }
              if     (isset($NM_val_form) && isset($NM_val_form['estatuscarril'])) { $this->estatuscarril = $NM_val_form['estatuscarril']; }
              elseif (isset($this->estatuscarril)) { $this->nm_limpa_alfa($this->estatuscarril); }
              if     (isset($NM_val_form) && isset($NM_val_form['observacion'])) { $this->observacion = $NM_val_form['observacion']; }
              elseif (isset($this->observacion)) { $this->nm_limpa_alfa($this->observacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['preliquidado'])) { $this->preliquidado = $NM_val_form['preliquidado']; }
              elseif (isset($this->preliquidado)) { $this->nm_limpa_alfa($this->preliquidado); }
              if     (isset($NM_val_form) && isset($NM_val_form['montocr'])) { $this->montocr = $NM_val_form['montocr']; }
              elseif (isset($this->montocr)) { $this->nm_limpa_alfa($this->montocr); }
              if     (isset($NM_val_form) && isset($NM_val_form['montoana'])) { $this->montoana = $NM_val_form['montoana']; }
              elseif (isset($this->montoana)) { $this->nm_limpa_alfa($this->montoana); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidadmxn'])) { $this->cantidadmxn = $NM_val_form['cantidadmxn']; }
              elseif (isset($this->cantidadmxn)) { $this->nm_limpa_alfa($this->cantidadmxn); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidadusd'])) { $this->cantidadusd = $NM_val_form['cantidadusd']; }
              elseif (isset($this->cantidadusd)) { $this->nm_limpa_alfa($this->cantidadusd); }
              if     (isset($NM_val_form) && isset($NM_val_form['importemxn'])) { $this->importemxn = $NM_val_form['importemxn']; }
              elseif (isset($this->importemxn)) { $this->nm_limpa_alfa($this->importemxn); }
              if     (isset($NM_val_form) && isset($NM_val_form['importeusd'])) { $this->importeusd = $NM_val_form['importeusd']; }
              elseif (isset($this->importeusd)) { $this->nm_limpa_alfa($this->importeusd); }
              if     (isset($NM_val_form) && isset($NM_val_form['folioinicialcr'])) { $this->folioinicialcr = $NM_val_form['folioinicialcr']; }
              elseif (isset($this->folioinicialcr)) { $this->nm_limpa_alfa($this->folioinicialcr); }
              if     (isset($NM_val_form) && isset($NM_val_form['foliofinalcr'])) { $this->foliofinalcr = $NM_val_form['foliofinalcr']; }
              elseif (isset($this->foliofinalcr)) { $this->nm_limpa_alfa($this->foliofinalcr); }
              if     (isset($NM_val_form) && isset($NM_val_form['folioinicialeap'])) { $this->folioinicialeap = $NM_val_form['folioinicialeap']; }
              elseif (isset($this->folioinicialeap)) { $this->nm_limpa_alfa($this->folioinicialeap); }
              if     (isset($NM_val_form) && isset($NM_val_form['foliofinaleap'])) { $this->foliofinaleap = $NM_val_form['foliofinaleap']; }
              elseif (isset($this->foliofinaleap)) { $this->nm_limpa_alfa($this->foliofinaleap); }
              if     (isset($NM_val_form) && isset($NM_val_form['faltante'])) { $this->faltante = $NM_val_form['faltante']; }
              elseif (isset($this->faltante)) { $this->nm_limpa_alfa($this->faltante); }
              if     (isset($NM_val_form) && isset($NM_val_form['ingresoelu_pre'])) { $this->ingresoelu_pre = $NM_val_form['ingresoelu_pre']; }
              elseif (isset($this->ingresoelu_pre)) { $this->nm_limpa_alfa($this->ingresoelu_pre); }
              if     (isset($NM_val_form) && isset($NM_val_form['entregado'])) { $this->entregado = $NM_val_form['entregado']; }
              elseif (isset($this->entregado)) { $this->nm_limpa_alfa($this->entregado); }
              if     (isset($NM_val_form) && isset($NM_val_form['administradorid'])) { $this->administradorid = $NM_val_form['administradorid']; }
              elseif (isset($this->administradorid)) { $this->nm_limpa_alfa($this->administradorid); }
              if     (isset($NM_val_form) && isset($NM_val_form['encargadoturnoid'])) { $this->encargadoturnoid = $NM_val_form['encargadoturnoid']; }
              elseif (isset($this->encargadoturnoid)) { $this->nm_limpa_alfa($this->encargadoturnoid); }
              if     (isset($NM_val_form) && isset($NM_val_form['encargadoturnoid_pre'])) { $this->encargadoturnoid_pre = $NM_val_form['encargadoturnoid_pre']; }
              elseif (isset($this->encargadoturnoid_pre)) { $this->nm_limpa_alfa($this->encargadoturnoid_pre); }
              if     (isset($NM_val_form) && isset($NM_val_form['operacion'])) { $this->operacion = $NM_val_form['operacion']; }
              elseif (isset($this->operacion)) { $this->nm_limpa_alfa($this->operacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['liquidadorid'])) { $this->liquidadorid = $NM_val_form['liquidadorid']; }
              elseif (isset($this->liquidadorid)) { $this->nm_limpa_alfa($this->liquidadorid); }
              if     (isset($NM_val_form) && isset($NM_val_form['faltanteana'])) { $this->faltanteana = $NM_val_form['faltanteana']; }
              elseif (isset($this->faltanteana)) { $this->nm_limpa_alfa($this->faltanteana); }
              if     (isset($NM_val_form) && isset($NM_val_form['ingresoelu_ana'])) { $this->ingresoelu_ana = $NM_val_form['ingresoelu_ana']; }
              elseif (isset($this->ingresoelu_ana)) { $this->nm_limpa_alfa($this->ingresoelu_ana); }
              if     (isset($NM_val_form) && isset($NM_val_form['conteo'])) { $this->conteo = $NM_val_form['conteo']; }
              elseif (isset($this->conteo)) { $this->nm_limpa_alfa($this->conteo); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('consecutivo', 'turnoid', 'casetaid', 'tramoid', 'cuerpo', 'usuarioid', 'carrilid', 'fechaoperacion', 'fechaturno', 'horainicio', 'fechafin', 'horafin', 'operacionid', 'foliocierre', 'estatuscarril', 'observacion', 'preliquidado', 'montocr', 'montoana', 'cantidadmxn', 'cantidadusd', 'importemxn', 'importeusd', 'folioinicialcr', 'foliofinalcr', 'folioinicialeap', 'foliofinaleap', 'faltante', 'ingresoelu_pre', 'entregado', 'administradorid', 'encargadoturnoid', 'encargadoturnoid_pre', 'fechacierre', 'fechapreliq', 'fechaliq', 'operacion', 'liquidadorid', 'faltanteana', 'ingresoelu_ana', 'conteo', 'fechainiciodictamen', 'fechafindictamen'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "Consecutivo, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where FechaOperacion = " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . " AND TurnoID = " . $this->turnoid . " AND CasetaID = " . $this->casetaid . " AND CarrilID = " . $this->carrilid . " AND HoraInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . " AND Cuerpo = '" . $this->cuerpo . "'";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
              {
                  $dbErrorMessage = $this->Db->ErrorMsg();
                  $dbErrorCode = $this->Db->ErrorNo();
                  $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                  {
                      $this->sc_erro_insert = $dbErrorMessage;
                      $this->nmgp_opcao     = 'refresh_insert';
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_muestra_ingresoEluPre_pack_ajax_response();
                          exit;
                      }
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " Fecha Operacion, Turno ID, Caseta ID, Carril ID, Hora Inicio, Cuerpo"); 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'fechaoperacion+turnoid+casetaid+carrilid+horainicio+cuerpo';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_muestra_ingresoEluPre_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->montocr != "")
                  { 
                       $compl_insert     .= ", MontoCR";
                       $compl_insert_val .= ", $this->montocr";
                  } 
                  if ($this->importemxn != "")
                  { 
                       $compl_insert     .= ", ImporteMXN";
                       $compl_insert_val .= ", $this->importemxn";
                  } 
                  if ($this->importeusd != "")
                  { 
                       $compl_insert     .= ", ImporteUSD";
                       $compl_insert_val .= ", $this->importeusd";
                  } 
                  if ($this->faltante != "")
                  { 
                       $compl_insert     .= ", Faltante";
                       $compl_insert_val .= ", $this->faltante";
                  } 
                  if ($this->entregado != "")
                  { 
                       $compl_insert     .= ", Entregado";
                       $compl_insert_val .= ", $this->entregado";
                  } 
                  if ($this->fechapreliq != "")
                  { 
                       $compl_insert     .= ", FechaPreLiq";
                       $compl_insert_val .= ", #$this->fechapreliq#";
                  } 
                  if ($this->fechaliq != "")
                  { 
                       $compl_insert     .= ", FechaLiq";
                       $compl_insert_val .= ", #$this->fechaliq#";
                  } 
                  if ($this->faltanteana != "")
                  { 
                       $compl_insert     .= ", FaltanteANA";
                       $compl_insert_val .= ", $this->faltanteana";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoANA, CantidadMXN, CantidadUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, IngresoELU_PRE, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, Operacion, LiquidadorID, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen $compl_insert) VALUES ($this->turnoid, $this->casetaid, $this->tramoid, '$this->cuerpo', '$this->usuarioid', $this->carrilid, #$this->fechaoperacion#, #$this->fechaturno#, #$this->horainicio#, #$this->fechafin#, #$this->horafin#, '$this->operacionid', '$this->foliocierre', '$this->estatuscarril', '$this->observacion', $this->preliquidado, $this->montoana, $this->cantidadmxn, $this->cantidadusd, $this->folioinicialcr, $this->foliofinalcr, $this->folioinicialeap, $this->foliofinaleap, $this->ingresoelu_pre, $this->administradorid, $this->encargadoturnoid, $this->encargadoturnoid_pre, #$this->fechacierre#, $this->operacion, '$this->liquidadorid', $this->ingresoelu_ana, $this->conteo, #$this->fechainiciodictamen#, #$this->fechafindictamen# $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->montocr != "")
                  { 
                       $compl_insert     .= ", MontoCR";
                       $compl_insert_val .= ", $this->montocr";
                  } 
                  if ($this->importemxn != "")
                  { 
                       $compl_insert     .= ", ImporteMXN";
                       $compl_insert_val .= ", $this->importemxn";
                  } 
                  if ($this->importeusd != "")
                  { 
                       $compl_insert     .= ", ImporteUSD";
                       $compl_insert_val .= ", $this->importeusd";
                  } 
                  if ($this->faltante != "")
                  { 
                       $compl_insert     .= ", Faltante";
                       $compl_insert_val .= ", $this->faltante";
                  } 
                  if ($this->entregado != "")
                  { 
                       $compl_insert     .= ", Entregado";
                       $compl_insert_val .= ", $this->entregado";
                  } 
                  if ($this->fechapreliq != "")
                  { 
                       $compl_insert     .= ", FechaPreLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->fechaliq != "")
                  { 
                       $compl_insert     .= ", FechaLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->faltanteana != "")
                  { 
                       $compl_insert     .= ", FaltanteANA";
                       $compl_insert_val .= ", $this->faltanteana";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoANA, CantidadMXN, CantidadUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, IngresoELU_PRE, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, Operacion, LiquidadorID, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen $compl_insert) VALUES (" . $NM_seq_auto . "$this->turnoid, $this->casetaid, $this->tramoid, '$this->cuerpo', '$this->usuarioid', $this->carrilid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->operacionid', '$this->foliocierre', '$this->estatuscarril', '$this->observacion', $this->preliquidado, $this->montoana, $this->cantidadmxn, $this->cantidadusd, $this->folioinicialcr, $this->foliofinalcr, $this->folioinicialeap, $this->foliofinaleap, $this->ingresoelu_pre, $this->administradorid, $this->encargadoturnoid, $this->encargadoturnoid_pre, " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", $this->operacion, '$this->liquidadorid', $this->ingresoelu_ana, $this->conteo, " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->montocr != "")
                  { 
                       $compl_insert     .= ", MontoCR";
                       $compl_insert_val .= ", $this->montocr";
                  } 
                  if ($this->importemxn != "")
                  { 
                       $compl_insert     .= ", ImporteMXN";
                       $compl_insert_val .= ", $this->importemxn";
                  } 
                  if ($this->importeusd != "")
                  { 
                       $compl_insert     .= ", ImporteUSD";
                       $compl_insert_val .= ", $this->importeusd";
                  } 
                  if ($this->faltante != "")
                  { 
                       $compl_insert     .= ", Faltante";
                       $compl_insert_val .= ", $this->faltante";
                  } 
                  if ($this->entregado != "")
                  { 
                       $compl_insert     .= ", Entregado";
                       $compl_insert_val .= ", $this->entregado";
                  } 
                  if ($this->fechapreliq != "")
                  { 
                       $compl_insert     .= ", FechaPreLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->fechaliq != "")
                  { 
                       $compl_insert     .= ", FechaLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->faltanteana != "")
                  { 
                       $compl_insert     .= ", FaltanteANA";
                       $compl_insert_val .= ", $this->faltanteana";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoANA, CantidadMXN, CantidadUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, IngresoELU_PRE, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, Operacion, LiquidadorID, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen $compl_insert) VALUES (" . $NM_seq_auto . "$this->turnoid, $this->casetaid, $this->tramoid, '$this->cuerpo', '$this->usuarioid', $this->carrilid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->operacionid', '$this->foliocierre', '$this->estatuscarril', '$this->observacion', $this->preliquidado, $this->montoana, $this->cantidadmxn, $this->cantidadusd, $this->folioinicialcr, $this->foliofinalcr, $this->folioinicialeap, $this->foliofinaleap, $this->ingresoelu_pre, $this->administradorid, $this->encargadoturnoid, $this->encargadoturnoid_pre, " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", $this->operacion, '$this->liquidadorid', $this->ingresoelu_ana, $this->conteo, " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->montocr != "")
                  { 
                       $compl_insert     .= ", MontoCR";
                       $compl_insert_val .= ", $this->montocr";
                  } 
                  if ($this->importemxn != "")
                  { 
                       $compl_insert     .= ", ImporteMXN";
                       $compl_insert_val .= ", $this->importemxn";
                  } 
                  if ($this->importeusd != "")
                  { 
                       $compl_insert     .= ", ImporteUSD";
                       $compl_insert_val .= ", $this->importeusd";
                  } 
                  if ($this->faltante != "")
                  { 
                       $compl_insert     .= ", Faltante";
                       $compl_insert_val .= ", $this->faltante";
                  } 
                  if ($this->entregado != "")
                  { 
                       $compl_insert     .= ", Entregado";
                       $compl_insert_val .= ", $this->entregado";
                  } 
                  if ($this->fechapreliq != "")
                  { 
                       $compl_insert     .= ", FechaPreLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->fechaliq != "")
                  { 
                       $compl_insert     .= ", FechaLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->faltanteana != "")
                  { 
                       $compl_insert     .= ", FaltanteANA";
                       $compl_insert_val .= ", $this->faltanteana";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoANA, CantidadMXN, CantidadUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, IngresoELU_PRE, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, Operacion, LiquidadorID, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen $compl_insert) VALUES (" . $NM_seq_auto . "$this->turnoid, $this->casetaid, $this->tramoid, '$this->cuerpo', '$this->usuarioid', $this->carrilid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->operacionid', '$this->foliocierre', '$this->estatuscarril', '$this->observacion', $this->preliquidado, $this->montoana, $this->cantidadmxn, $this->cantidadusd, $this->folioinicialcr, $this->foliofinalcr, $this->folioinicialeap, $this->foliofinaleap, $this->ingresoelu_pre, $this->administradorid, $this->encargadoturnoid, $this->encargadoturnoid_pre, " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", $this->operacion, '$this->liquidadorid', $this->ingresoelu_ana, $this->conteo, " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->montocr != "")
                  { 
                       $compl_insert     .= ", MontoCR";
                       $compl_insert_val .= ", $this->montocr";
                  } 
                  if ($this->importemxn != "")
                  { 
                       $compl_insert     .= ", ImporteMXN";
                       $compl_insert_val .= ", $this->importemxn";
                  } 
                  if ($this->importeusd != "")
                  { 
                       $compl_insert     .= ", ImporteUSD";
                       $compl_insert_val .= ", $this->importeusd";
                  } 
                  if ($this->faltante != "")
                  { 
                       $compl_insert     .= ", Faltante";
                       $compl_insert_val .= ", $this->faltante";
                  } 
                  if ($this->entregado != "")
                  { 
                       $compl_insert     .= ", Entregado";
                       $compl_insert_val .= ", $this->entregado";
                  } 
                  if ($this->fechapreliq != "")
                  { 
                       $compl_insert     .= ", FechaPreLiq";
                       $compl_insert_val .= ", EXTEND('$this->fechapreliq', YEAR TO FRACTION)";
                  } 
                  if ($this->fechaliq != "")
                  { 
                       $compl_insert     .= ", FechaLiq";
                       $compl_insert_val .= ", EXTEND('$this->fechaliq', YEAR TO FRACTION)";
                  } 
                  if ($this->faltanteana != "")
                  { 
                       $compl_insert     .= ", FaltanteANA";
                       $compl_insert_val .= ", $this->faltanteana";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoANA, CantidadMXN, CantidadUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, IngresoELU_PRE, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, Operacion, LiquidadorID, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen $compl_insert) VALUES (" . $NM_seq_auto . "$this->turnoid, $this->casetaid, $this->tramoid, '$this->cuerpo', '$this->usuarioid', $this->carrilid, EXTEND('$this->fechaoperacion', YEAR TO DAY), EXTEND('$this->fechaturno', YEAR TO DAY), " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", EXTEND('$this->fechafin', YEAR TO DAY), " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->operacionid', '$this->foliocierre', '$this->estatuscarril', '$this->observacion', $this->preliquidado, $this->montoana, $this->cantidadmxn, $this->cantidadusd, $this->folioinicialcr, $this->foliofinalcr, $this->folioinicialeap, $this->foliofinaleap, $this->ingresoelu_pre, $this->administradorid, $this->encargadoturnoid, $this->encargadoturnoid_pre, EXTEND('$this->fechacierre', YEAR TO FRACTION), $this->operacion, '$this->liquidadorid', $this->ingresoelu_ana, $this->conteo, EXTEND('$this->fechainiciodictamen', YEAR TO FRACTION), EXTEND('$this->fechafindictamen', YEAR TO FRACTION) $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->montocr != "")
                  { 
                       $compl_insert     .= ", MontoCR";
                       $compl_insert_val .= ", $this->montocr";
                  } 
                  if ($this->importemxn != "")
                  { 
                       $compl_insert     .= ", ImporteMXN";
                       $compl_insert_val .= ", $this->importemxn";
                  } 
                  if ($this->importeusd != "")
                  { 
                       $compl_insert     .= ", ImporteUSD";
                       $compl_insert_val .= ", $this->importeusd";
                  } 
                  if ($this->faltante != "")
                  { 
                       $compl_insert     .= ", Faltante";
                       $compl_insert_val .= ", $this->faltante";
                  } 
                  if ($this->entregado != "")
                  { 
                       $compl_insert     .= ", Entregado";
                       $compl_insert_val .= ", $this->entregado";
                  } 
                  if ($this->fechapreliq != "")
                  { 
                       $compl_insert     .= ", FechaPreLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->fechaliq != "")
                  { 
                       $compl_insert     .= ", FechaLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->faltanteana != "")
                  { 
                       $compl_insert     .= ", FaltanteANA";
                       $compl_insert_val .= ", $this->faltanteana";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoANA, CantidadMXN, CantidadUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, IngresoELU_PRE, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, Operacion, LiquidadorID, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen $compl_insert) VALUES (" . $NM_seq_auto . "$this->turnoid, $this->casetaid, $this->tramoid, '$this->cuerpo', '$this->usuarioid', $this->carrilid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->operacionid', '$this->foliocierre', '$this->estatuscarril', '$this->observacion', $this->preliquidado, $this->montoana, $this->cantidadmxn, $this->cantidadusd, $this->folioinicialcr, $this->foliofinalcr, $this->folioinicialeap, $this->foliofinaleap, $this->ingresoelu_pre, $this->administradorid, $this->encargadoturnoid, $this->encargadoturnoid_pre, " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", $this->operacion, '$this->liquidadorid', $this->ingresoelu_ana, $this->conteo, " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->montocr != "")
                  { 
                       $compl_insert     .= ", MontoCR";
                       $compl_insert_val .= ", $this->montocr";
                  } 
                  if ($this->importemxn != "")
                  { 
                       $compl_insert     .= ", ImporteMXN";
                       $compl_insert_val .= ", $this->importemxn";
                  } 
                  if ($this->importeusd != "")
                  { 
                       $compl_insert     .= ", ImporteUSD";
                       $compl_insert_val .= ", $this->importeusd";
                  } 
                  if ($this->faltante != "")
                  { 
                       $compl_insert     .= ", Faltante";
                       $compl_insert_val .= ", $this->faltante";
                  } 
                  if ($this->entregado != "")
                  { 
                       $compl_insert     .= ", Entregado";
                       $compl_insert_val .= ", $this->entregado";
                  } 
                  if ($this->fechapreliq != "")
                  { 
                       $compl_insert     .= ", FechaPreLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->fechaliq != "")
                  { 
                       $compl_insert     .= ", FechaLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->faltanteana != "")
                  { 
                       $compl_insert     .= ", FaltanteANA";
                       $compl_insert_val .= ", $this->faltanteana";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoANA, CantidadMXN, CantidadUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, IngresoELU_PRE, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, Operacion, LiquidadorID, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen $compl_insert) VALUES (" . $NM_seq_auto . "$this->turnoid, $this->casetaid, $this->tramoid, '$this->cuerpo', '$this->usuarioid', $this->carrilid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->operacionid', '$this->foliocierre', '$this->estatuscarril', '$this->observacion', $this->preliquidado, $this->montoana, $this->cantidadmxn, $this->cantidadusd, $this->folioinicialcr, $this->foliofinalcr, $this->folioinicialeap, $this->foliofinaleap, $this->ingresoelu_pre, $this->administradorid, $this->encargadoturnoid, $this->encargadoturnoid_pre, " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", $this->operacion, '$this->liquidadorid', $this->ingresoelu_ana, $this->conteo, " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->montocr != "")
                  { 
                       $compl_insert     .= ", MontoCR";
                       $compl_insert_val .= ", $this->montocr";
                  } 
                  if ($this->importemxn != "")
                  { 
                       $compl_insert     .= ", ImporteMXN";
                       $compl_insert_val .= ", $this->importemxn";
                  } 
                  if ($this->importeusd != "")
                  { 
                       $compl_insert     .= ", ImporteUSD";
                       $compl_insert_val .= ", $this->importeusd";
                  } 
                  if ($this->faltante != "")
                  { 
                       $compl_insert     .= ", Faltante";
                       $compl_insert_val .= ", $this->faltante";
                  } 
                  if ($this->entregado != "")
                  { 
                       $compl_insert     .= ", Entregado";
                       $compl_insert_val .= ", $this->entregado";
                  } 
                  if ($this->fechapreliq != "")
                  { 
                       $compl_insert     .= ", FechaPreLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->fechaliq != "")
                  { 
                       $compl_insert     .= ", FechaLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->faltanteana != "")
                  { 
                       $compl_insert     .= ", FaltanteANA";
                       $compl_insert_val .= ", $this->faltanteana";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoANA, CantidadMXN, CantidadUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, IngresoELU_PRE, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, Operacion, LiquidadorID, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen $compl_insert) VALUES (" . $NM_seq_auto . "$this->turnoid, $this->casetaid, $this->tramoid, '$this->cuerpo', '$this->usuarioid', $this->carrilid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->operacionid', '$this->foliocierre', '$this->estatuscarril', '$this->observacion', $this->preliquidado, $this->montoana, $this->cantidadmxn, $this->cantidadusd, $this->folioinicialcr, $this->foliofinalcr, $this->folioinicialeap, $this->foliofinaleap, $this->ingresoelu_pre, $this->administradorid, $this->encargadoturnoid, $this->encargadoturnoid_pre, " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", $this->operacion, '$this->liquidadorid', $this->ingresoelu_ana, $this->conteo, " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->montocr != "")
                  { 
                       $compl_insert     .= ", MontoCR";
                       $compl_insert_val .= ", $this->montocr";
                  } 
                  if ($this->importemxn != "")
                  { 
                       $compl_insert     .= ", ImporteMXN";
                       $compl_insert_val .= ", $this->importemxn";
                  } 
                  if ($this->importeusd != "")
                  { 
                       $compl_insert     .= ", ImporteUSD";
                       $compl_insert_val .= ", $this->importeusd";
                  } 
                  if ($this->faltante != "")
                  { 
                       $compl_insert     .= ", Faltante";
                       $compl_insert_val .= ", $this->faltante";
                  } 
                  if ($this->entregado != "")
                  { 
                       $compl_insert     .= ", Entregado";
                       $compl_insert_val .= ", $this->entregado";
                  } 
                  if ($this->fechapreliq != "")
                  { 
                       $compl_insert     .= ", FechaPreLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechapreliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->fechaliq != "")
                  { 
                       $compl_insert     .= ", FechaLiq";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fechaliq . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->faltanteana != "")
                  { 
                       $compl_insert     .= ", FaltanteANA";
                       $compl_insert_val .= ", $this->faltanteana";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoANA, CantidadMXN, CantidadUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, IngresoELU_PRE, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, Operacion, LiquidadorID, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen $compl_insert) VALUES (" . $NM_seq_auto . "$this->turnoid, $this->casetaid, $this->tramoid, '$this->cuerpo', '$this->usuarioid', $this->carrilid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->operacionid', '$this->foliocierre', '$this->estatuscarril', '$this->observacion', $this->preliquidado, $this->montoana, $this->cantidadmxn, $this->cantidadusd, $this->folioinicialcr, $this->foliofinalcr, $this->folioinicialeap, $this->foliofinaleap, $this->ingresoelu_pre, $this->administradorid, $this->encargadoturnoid, $this->encargadoturnoid_pre, " . $this->Ini->date_delim . $this->fechacierre . $this->Ini->date_delim1 . ", $this->operacion, '$this->liquidadorid', $this->ingresoelu_ana, $this->conteo, " . $this->Ini->date_delim . $this->fechainiciodictamen . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechafindictamen . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_muestra_ingresoEluPre_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_muestra_ingresoEluPre_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->consecutivo =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->consecutivo = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->consecutivo = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->consecutivo = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->consecutivo = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->consecutivo = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->consecutivo = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->consecutivo = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->cuerpo = $this->cuerpo_before_qstr;
              $this->usuarioid = $this->usuarioid_before_qstr;
              $this->operacionid = $this->operacionid_before_qstr;
              $this->foliocierre = $this->foliocierre_before_qstr;
              $this->estatuscarril = $this->estatuscarril_before_qstr;
              $this->observacion = $this->observacion_before_qstr;
              $this->liquidadorid = $this->liquidadorid_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->cuerpo = $this->cuerpo_before_qstr;
              $this->usuarioid = $this->usuarioid_before_qstr;
              $this->operacionid = $this->operacionid_before_qstr;
              $this->foliocierre = $this->foliocierre_before_qstr;
              $this->estatuscarril = $this->estatuscarril_before_qstr;
              $this->observacion = $this->observacion_before_qstr;
              $this->liquidadorid = $this->liquidadorid_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->consecutivo = substr($this->Db->qstr($this->consecutivo), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Consecutivo = $this->consecutivo "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_muestra_ingresoEluPre_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['parms'] = "consecutivo?#?$this->consecutivo?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->consecutivo = null === $this->consecutivo ? null : substr($this->Db->qstr($this->consecutivo), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "R")
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['iframe_evento']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->consecutivo)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->consecutivo) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_muestra_ingresoEluPre = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total'] = $qt_geral_reg_form_muestra_ingresoEluPre;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->consecutivo))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "Consecutivo < $this->consecutivo "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "Consecutivo < $this->consecutivo "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "Consecutivo < $this->consecutivo "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "Consecutivo < $this->consecutivo "; 
              }
              else  
              {
                  $Key_Where = "Consecutivo < $this->consecutivo "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_muestra_ingresoEluPre = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] > $qt_geral_reg_form_muestra_ingresoEluPre)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] = $qt_geral_reg_form_muestra_ingresoEluPre; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] = $qt_geral_reg_form_muestra_ingresoEluPre; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_muestra_ingresoEluPre) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT Consecutivo, TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20), str_replace (convert(char(10),FechaTurno,102), '.', '-') + ' ' + convert(char(8),FechaTurno,20), str_replace (convert(char(10),HoraInicio,102), '.', '-') + ' ' + convert(char(8),HoraInicio,20), str_replace (convert(char(10),FechaFin,102), '.', '-') + ' ' + convert(char(8),FechaFin,20), str_replace (convert(char(10),HoraFin,102), '.', '-') + ' ' + convert(char(8),HoraFin,20), OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoCR, MontoANA, CantidadMXN, CantidadUSD, ImporteMXN, ImporteUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, Faltante, IngresoELU_PRE, Entregado, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, str_replace (convert(char(10),FechaCierre,102), '.', '-') + ' ' + convert(char(8),FechaCierre,20), str_replace (convert(char(10),FechaPreLiq,102), '.', '-') + ' ' + convert(char(8),FechaPreLiq,20), str_replace (convert(char(10),FechaLiq,102), '.', '-') + ' ' + convert(char(8),FechaLiq,20), Operacion, LiquidadorID, FaltanteANA, IngresoELU_ANA, Conteo, str_replace (convert(char(10),FechaInicioDictamen,102), '.', '-') + ' ' + convert(char(8),FechaInicioDictamen,20), str_replace (convert(char(10),FechaFinDictamen,102), '.', '-') + ' ' + convert(char(8),FechaFinDictamen,20) from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT Consecutivo, TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, convert(char(23),FechaOperacion,121), convert(char(23),FechaTurno,121), convert(char(23),HoraInicio,121), convert(char(23),FechaFin,121), convert(char(23),HoraFin,121), OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoCR, MontoANA, CantidadMXN, CantidadUSD, ImporteMXN, ImporteUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, Faltante, IngresoELU_PRE, Entregado, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, convert(char(23),FechaCierre,121), convert(char(23),FechaPreLiq,121), convert(char(23),FechaLiq,121), Operacion, LiquidadorID, FaltanteANA, IngresoELU_ANA, Conteo, convert(char(23),FechaInicioDictamen,121), convert(char(23),FechaFinDictamen,121) from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT Consecutivo, TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoCR, MontoANA, CantidadMXN, CantidadUSD, ImporteMXN, ImporteUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, Faltante, IngresoELU_PRE, Entregado, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, FechaPreLiq, FechaLiq, Operacion, LiquidadorID, FaltanteANA, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT Consecutivo, TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, EXTEND(FechaOperacion, YEAR TO DAY), EXTEND(FechaTurno, YEAR TO DAY), HoraInicio, EXTEND(FechaFin, YEAR TO DAY), HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoCR, MontoANA, CantidadMXN, CantidadUSD, ImporteMXN, ImporteUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, Faltante, IngresoELU_PRE, Entregado, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, EXTEND(FechaCierre, YEAR TO FRACTION), EXTEND(FechaPreLiq, YEAR TO FRACTION), EXTEND(FechaLiq, YEAR TO FRACTION), Operacion, LiquidadorID, FaltanteANA, IngresoELU_ANA, Conteo, EXTEND(FechaInicioDictamen, YEAR TO FRACTION), EXTEND(FechaFinDictamen, YEAR TO FRACTION) from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT Consecutivo, TurnoID, CasetaID, TramoID, Cuerpo, UsuarioID, CarrilID, FechaOperacion, FechaTurno, HoraInicio, FechaFin, HoraFin, OperacionID, FolioCierre, EstatusCarril, Observacion, PreLiquidado, MontoCR, MontoANA, CantidadMXN, CantidadUSD, ImporteMXN, ImporteUSD, FolioInicialCR, FolioFinalCR, FolioInicialEAP, FolioFinalEAP, Faltante, IngresoELU_PRE, Entregado, AdministradorID, EncargadoTurnoID, EncargadoTurnoID_Pre, FechaCierre, FechaPreLiq, FechaLiq, Operacion, LiquidadorID, FaltanteANA, IngresoELU_ANA, Conteo, FechaInicioDictamen, FechaFinDictamen from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "Consecutivo = $this->consecutivo"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "Consecutivo = $this->consecutivo"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "Consecutivo = $this->consecutivo"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "Consecutivo = $this->consecutivo"; 
              }  
              else  
              {
                  $aWhere[] = "Consecutivo = $this->consecutivo"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "Consecutivo";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->consecutivo = $rs->fields[0] ; 
              $this->nmgp_dados_select['consecutivo'] = $this->consecutivo;
              $this->turnoid = $rs->fields[1] ; 
              $this->nmgp_dados_select['turnoid'] = $this->turnoid;
              $this->casetaid = $rs->fields[2] ; 
              $this->nmgp_dados_select['casetaid'] = $this->casetaid;
              $this->tramoid = $rs->fields[3] ; 
              $this->nmgp_dados_select['tramoid'] = $this->tramoid;
              $this->cuerpo = $rs->fields[4] ; 
              $this->nmgp_dados_select['cuerpo'] = $this->cuerpo;
              $this->usuarioid = $rs->fields[5] ; 
              $this->nmgp_dados_select['usuarioid'] = $this->usuarioid;
              $this->carrilid = $rs->fields[6] ; 
              $this->nmgp_dados_select['carrilid'] = $this->carrilid;
              $this->fechaoperacion = $rs->fields[7] ; 
              $this->nmgp_dados_select['fechaoperacion'] = $this->fechaoperacion;
              $this->fechaturno = $rs->fields[8] ; 
              $this->nmgp_dados_select['fechaturno'] = $this->fechaturno;
              $this->horainicio = $rs->fields[9] ; 
              $this->nmgp_dados_select['horainicio'] = $this->horainicio;
              $this->fechafin = $rs->fields[10] ; 
              $this->nmgp_dados_select['fechafin'] = $this->fechafin;
              $this->horafin = $rs->fields[11] ; 
              $this->nmgp_dados_select['horafin'] = $this->horafin;
              $this->operacionid = $rs->fields[12] ; 
              $this->nmgp_dados_select['operacionid'] = $this->operacionid;
              $this->foliocierre = $rs->fields[13] ; 
              $this->nmgp_dados_select['foliocierre'] = $this->foliocierre;
              $this->estatuscarril = $rs->fields[14] ; 
              $this->nmgp_dados_select['estatuscarril'] = $this->estatuscarril;
              $this->observacion = $rs->fields[15] ; 
              $this->nmgp_dados_select['observacion'] = $this->observacion;
              $this->preliquidado = $rs->fields[16] ; 
              $this->nmgp_dados_select['preliquidado'] = $this->preliquidado;
              $this->montocr = $rs->fields[17] ; 
              $this->nmgp_dados_select['montocr'] = $this->montocr;
              $this->montoana = $rs->fields[18] ; 
              $this->nmgp_dados_select['montoana'] = $this->montoana;
              $this->cantidadmxn = $rs->fields[19] ; 
              $this->nmgp_dados_select['cantidadmxn'] = $this->cantidadmxn;
              $this->cantidadusd = $rs->fields[20] ; 
              $this->nmgp_dados_select['cantidadusd'] = $this->cantidadusd;
              $this->importemxn = $rs->fields[21] ; 
              $this->nmgp_dados_select['importemxn'] = $this->importemxn;
              $this->importeusd = $rs->fields[22] ; 
              $this->nmgp_dados_select['importeusd'] = $this->importeusd;
              $this->folioinicialcr = $rs->fields[23] ; 
              $this->nmgp_dados_select['folioinicialcr'] = $this->folioinicialcr;
              $this->foliofinalcr = $rs->fields[24] ; 
              $this->nmgp_dados_select['foliofinalcr'] = $this->foliofinalcr;
              $this->folioinicialeap = $rs->fields[25] ; 
              $this->nmgp_dados_select['folioinicialeap'] = $this->folioinicialeap;
              $this->foliofinaleap = $rs->fields[26] ; 
              $this->nmgp_dados_select['foliofinaleap'] = $this->foliofinaleap;
              $this->faltante = $rs->fields[27] ; 
              $this->nmgp_dados_select['faltante'] = $this->faltante;
              $this->ingresoelu_pre = $rs->fields[28] ; 
              $this->nmgp_dados_select['ingresoelu_pre'] = $this->ingresoelu_pre;
              $this->entregado = $rs->fields[29] ; 
              $this->nmgp_dados_select['entregado'] = $this->entregado;
              $this->administradorid = $rs->fields[30] ; 
              $this->nmgp_dados_select['administradorid'] = $this->administradorid;
              $this->encargadoturnoid = $rs->fields[31] ; 
              $this->nmgp_dados_select['encargadoturnoid'] = $this->encargadoturnoid;
              $this->encargadoturnoid_pre = $rs->fields[32] ; 
              $this->nmgp_dados_select['encargadoturnoid_pre'] = $this->encargadoturnoid_pre;
              $this->fechacierre = $rs->fields[33] ; 
              if (substr($this->fechacierre, 10, 1) == "-") 
              { 
                 $this->fechacierre = substr($this->fechacierre, 0, 10) . " " . substr($this->fechacierre, 11);
              } 
              if (substr($this->fechacierre, 13, 1) == ".") 
              { 
                 $this->fechacierre = substr($this->fechacierre, 0, 13) . ":" . substr($this->fechacierre, 14, 2) . ":" . substr($this->fechacierre, 17);
              } 
              $this->nmgp_dados_select['fechacierre'] = $this->fechacierre;
              $this->fechapreliq = $rs->fields[34] ; 
              if (substr($this->fechapreliq, 10, 1) == "-") 
              { 
                 $this->fechapreliq = substr($this->fechapreliq, 0, 10) . " " . substr($this->fechapreliq, 11);
              } 
              if (substr($this->fechapreliq, 13, 1) == ".") 
              { 
                 $this->fechapreliq = substr($this->fechapreliq, 0, 13) . ":" . substr($this->fechapreliq, 14, 2) . ":" . substr($this->fechapreliq, 17);
              } 
              $this->nmgp_dados_select['fechapreliq'] = $this->fechapreliq;
              $this->fechaliq = $rs->fields[35] ; 
              if (substr($this->fechaliq, 10, 1) == "-") 
              { 
                 $this->fechaliq = substr($this->fechaliq, 0, 10) . " " . substr($this->fechaliq, 11);
              } 
              if (substr($this->fechaliq, 13, 1) == ".") 
              { 
                 $this->fechaliq = substr($this->fechaliq, 0, 13) . ":" . substr($this->fechaliq, 14, 2) . ":" . substr($this->fechaliq, 17);
              } 
              $this->nmgp_dados_select['fechaliq'] = $this->fechaliq;
              $this->operacion = $rs->fields[36] ; 
              $this->nmgp_dados_select['operacion'] = $this->operacion;
              $this->liquidadorid = $rs->fields[37] ; 
              $this->nmgp_dados_select['liquidadorid'] = $this->liquidadorid;
              $this->faltanteana = $rs->fields[38] ; 
              $this->nmgp_dados_select['faltanteana'] = $this->faltanteana;
              $this->ingresoelu_ana = $rs->fields[39] ; 
              $this->nmgp_dados_select['ingresoelu_ana'] = $this->ingresoelu_ana;
              $this->conteo = $rs->fields[40] ; 
              $this->nmgp_dados_select['conteo'] = $this->conteo;
              $this->fechainiciodictamen = $rs->fields[41] ; 
              if (substr($this->fechainiciodictamen, 10, 1) == "-") 
              { 
                 $this->fechainiciodictamen = substr($this->fechainiciodictamen, 0, 10) . " " . substr($this->fechainiciodictamen, 11);
              } 
              if (substr($this->fechainiciodictamen, 13, 1) == ".") 
              { 
                 $this->fechainiciodictamen = substr($this->fechainiciodictamen, 0, 13) . ":" . substr($this->fechainiciodictamen, 14, 2) . ":" . substr($this->fechainiciodictamen, 17);
              } 
              $this->nmgp_dados_select['fechainiciodictamen'] = $this->fechainiciodictamen;
              $this->fechafindictamen = $rs->fields[42] ; 
              if (substr($this->fechafindictamen, 10, 1) == "-") 
              { 
                 $this->fechafindictamen = substr($this->fechafindictamen, 0, 10) . " " . substr($this->fechafindictamen, 11);
              } 
              if (substr($this->fechafindictamen, 13, 1) == ".") 
              { 
                 $this->fechafindictamen = substr($this->fechafindictamen, 0, 13) . ":" . substr($this->fechafindictamen, 14, 2) . ":" . substr($this->fechafindictamen, 17);
              } 
              $this->nmgp_dados_select['fechafindictamen'] = $this->fechafindictamen;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->consecutivo = (string)$this->consecutivo; 
              $this->turnoid = (string)$this->turnoid; 
              $this->casetaid = (string)$this->casetaid; 
              $this->tramoid = (string)$this->tramoid; 
              $this->carrilid = (string)$this->carrilid; 
              $this->preliquidado = (string)$this->preliquidado; 
              $this->montocr = (string)$this->montocr; 
              $this->montoana = (string)$this->montoana; 
              $this->cantidadmxn = (string)$this->cantidadmxn; 
              $this->cantidadusd = (string)$this->cantidadusd; 
              $this->importemxn = (string)$this->importemxn; 
              $this->importeusd = (string)$this->importeusd; 
              $this->folioinicialcr = (string)$this->folioinicialcr; 
              $this->foliofinalcr = (string)$this->foliofinalcr; 
              $this->folioinicialeap = (string)$this->folioinicialeap; 
              $this->foliofinaleap = (string)$this->foliofinaleap; 
              $this->faltante = (string)$this->faltante; 
              $this->ingresoelu_pre = (string)$this->ingresoelu_pre; 
              $this->entregado = (string)$this->entregado; 
              $this->administradorid = (string)$this->administradorid; 
              $this->encargadoturnoid = (string)$this->encargadoturnoid; 
              $this->encargadoturnoid_pre = (string)$this->encargadoturnoid_pre; 
              $this->operacion = (string)$this->operacion; 
              $this->faltanteana = (string)$this->faltanteana; 
              $this->ingresoelu_ana = (string)$this->ingresoelu_ana; 
              $this->conteo = (string)$this->conteo; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['parms'] = "consecutivo?#?$this->consecutivo?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] < $qt_geral_reg_form_muestra_ingresoEluPre;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->consecutivo = "";  
              $this->nmgp_dados_form["consecutivo"] = $this->consecutivo;
              $this->turnoid = "";  
              $this->nmgp_dados_form["turnoid"] = $this->turnoid;
              $this->casetaid = "";  
              $this->nmgp_dados_form["casetaid"] = $this->casetaid;
              $this->tramoid = "";  
              $this->nmgp_dados_form["tramoid"] = $this->tramoid;
              $this->cuerpo = "";  
              $this->nmgp_dados_form["cuerpo"] = $this->cuerpo;
              $this->usuarioid = "";  
              $this->nmgp_dados_form["usuarioid"] = $this->usuarioid;
              $this->carrilid = "";  
              $this->nmgp_dados_form["carrilid"] = $this->carrilid;
              $this->fechaoperacion = "";  
              $this->fechaoperacion_hora = "" ;  
              $this->nmgp_dados_form["fechaoperacion"] = $this->fechaoperacion;
              $this->fechaturno = "";  
              $this->fechaturno_hora = "" ;  
              $this->nmgp_dados_form["fechaturno"] = $this->fechaturno;
              $this->horainicio = "";  
              $this->horainicio_hora = "" ;  
              $this->nmgp_dados_form["horainicio"] = $this->horainicio;
              $this->fechafin = "";  
              $this->fechafin_hora = "" ;  
              $this->nmgp_dados_form["fechafin"] = $this->fechafin;
              $this->horafin = "";  
              $this->horafin_hora = "" ;  
              $this->nmgp_dados_form["horafin"] = $this->horafin;
              $this->operacionid = "";  
              $this->nmgp_dados_form["operacionid"] = $this->operacionid;
              $this->foliocierre = "";  
              $this->nmgp_dados_form["foliocierre"] = $this->foliocierre;
              $this->estatuscarril = "";  
              $this->nmgp_dados_form["estatuscarril"] = $this->estatuscarril;
              $this->observacion = "";  
              $this->nmgp_dados_form["observacion"] = $this->observacion;
              $this->preliquidado = "";  
              $this->nmgp_dados_form["preliquidado"] = $this->preliquidado;
              $this->montocr = "";  
              $this->nmgp_dados_form["montocr"] = $this->montocr;
              $this->montoana = "";  
              $this->nmgp_dados_form["montoana"] = $this->montoana;
              $this->cantidadmxn = "";  
              $this->nmgp_dados_form["cantidadmxn"] = $this->cantidadmxn;
              $this->cantidadusd = "";  
              $this->nmgp_dados_form["cantidadusd"] = $this->cantidadusd;
              $this->importemxn = "";  
              $this->nmgp_dados_form["importemxn"] = $this->importemxn;
              $this->importeusd = "";  
              $this->nmgp_dados_form["importeusd"] = $this->importeusd;
              $this->folioinicialcr = "";  
              $this->nmgp_dados_form["folioinicialcr"] = $this->folioinicialcr;
              $this->foliofinalcr = "";  
              $this->nmgp_dados_form["foliofinalcr"] = $this->foliofinalcr;
              $this->folioinicialeap = "";  
              $this->nmgp_dados_form["folioinicialeap"] = $this->folioinicialeap;
              $this->foliofinaleap = "";  
              $this->nmgp_dados_form["foliofinaleap"] = $this->foliofinaleap;
              $this->faltante = "";  
              $this->nmgp_dados_form["faltante"] = $this->faltante;
              $this->ingresoelu_pre = "";  
              $this->nmgp_dados_form["ingresoelu_pre"] = $this->ingresoelu_pre;
              $this->entregado = "";  
              $this->nmgp_dados_form["entregado"] = $this->entregado;
              $this->administradorid = "";  
              $this->nmgp_dados_form["administradorid"] = $this->administradorid;
              $this->encargadoturnoid = "";  
              $this->nmgp_dados_form["encargadoturnoid"] = $this->encargadoturnoid;
              $this->encargadoturnoid_pre = "";  
              $this->nmgp_dados_form["encargadoturnoid_pre"] = $this->encargadoturnoid_pre;
              $this->fechacierre = "";  
              $this->fechacierre_hora = "" ;  
              $this->nmgp_dados_form["fechacierre"] = $this->fechacierre;
              $this->fechapreliq = "";  
              $this->fechapreliq_hora = "" ;  
              $this->nmgp_dados_form["fechapreliq"] = $this->fechapreliq;
              $this->fechaliq = "";  
              $this->fechaliq_hora = "" ;  
              $this->nmgp_dados_form["fechaliq"] = $this->fechaliq;
              $this->operacion = "";  
              $this->nmgp_dados_form["operacion"] = $this->operacion;
              $this->liquidadorid = "";  
              $this->nmgp_dados_form["liquidadorid"] = $this->liquidadorid;
              $this->faltanteana = "";  
              $this->nmgp_dados_form["faltanteana"] = $this->faltanteana;
              $this->ingresoelu_ana = "";  
              $this->nmgp_dados_form["ingresoelu_ana"] = $this->ingresoelu_ana;
              $this->conteo = "";  
              $this->nmgp_dados_form["conteo"] = $this->conteo;
              $this->fechainiciodictamen = "";  
              $this->fechainiciodictamen_hora = "" ;  
              $this->nmgp_dados_form["fechainiciodictamen"] = $this->fechainiciodictamen;
              $this->fechafindictamen = "";  
              $this->fechafindictamen_hora = "" ;  
              $this->nmgp_dados_form["fechafindictamen"] = $this->fechafindictamen;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo < $this->consecutivo" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo < $this->consecutivo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo < $this->consecutivo" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo < $this->consecutivo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo < $this->consecutivo" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo < $this->consecutivo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo < $this->consecutivo" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo < $this->consecutivo" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo < $this->consecutivo" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo < $this->consecutivo" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->consecutivo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo > $this->consecutivo" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo > $this->consecutivo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo > $this->consecutivo" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo > $this->consecutivo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo > $this->consecutivo" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo > $this->consecutivo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo > $this->consecutivo" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo > $this->consecutivo" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo > $this->consecutivo" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Consecutivo) from " . $this->Ini->nm_tabela . " where Consecutivo > $this->consecutivo" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->consecutivo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter']))
         { 
             $rs->Close();  
             return ; 
         } 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->consecutivo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Consecutivo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->consecutivo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
   function NM_gera_log_key($evt) 
   {
       $this->SC_log_arr = array();
       $this->SC_log_atv = true;
       if ($evt == "incluir")
       {
           $this->SC_log_evt = "insert";
       }
       if ($evt == "alterar")
       {
           $this->SC_log_evt = "update";
       }
       if ($evt == "excluir")
       {
           $this->SC_log_evt = "delete";
       }
       $this->SC_log_arr['keys']['consecutivo'] =  $this->consecutivo;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dados_select'];
           $this->SC_log_arr['fields']['TurnoID']['0'] =  $nmgp_dados_select['turnoid'];
           $this->SC_log_arr['fields']['CasetaID']['0'] =  $nmgp_dados_select['casetaid'];
           $this->SC_log_arr['fields']['TramoID']['0'] =  $nmgp_dados_select['tramoid'];
           $this->SC_log_arr['fields']['Cuerpo']['0'] =  $nmgp_dados_select['cuerpo'];
           $this->SC_log_arr['fields']['UsuarioID']['0'] =  $nmgp_dados_select['usuarioid'];
           $this->SC_log_arr['fields']['CarrilID']['0'] =  $nmgp_dados_select['carrilid'];
           $this->SC_log_arr['fields']['FechaOperacion']['0'] =  $nmgp_dados_select['fechaoperacion'];
           $this->SC_log_arr['fields']['FechaTurno']['0'] =  $nmgp_dados_select['fechaturno'];
           $this->SC_log_arr['fields']['HoraInicio']['0'] =  $nmgp_dados_select['horainicio'];
           $this->SC_log_arr['fields']['FechaFin']['0'] =  $nmgp_dados_select['fechafin'];
           $this->SC_log_arr['fields']['HoraFin']['0'] =  $nmgp_dados_select['horafin'];
           $this->SC_log_arr['fields']['OperacionID']['0'] =  $nmgp_dados_select['operacionid'];
           $this->SC_log_arr['fields']['FolioCierre']['0'] =  $nmgp_dados_select['foliocierre'];
           $this->SC_log_arr['fields']['EstatusCarril']['0'] =  $nmgp_dados_select['estatuscarril'];
           $this->SC_log_arr['fields']['Observacion']['0'] =  $nmgp_dados_select['observacion'];
           $this->SC_log_arr['fields']['PreLiquidado']['0'] =  $nmgp_dados_select['preliquidado'];
           $this->SC_log_arr['fields']['MontoCR']['0'] =  $nmgp_dados_select['montocr'];
           $this->SC_log_arr['fields']['MontoANA']['0'] =  $nmgp_dados_select['montoana'];
           $this->SC_log_arr['fields']['CantidadMXN']['0'] =  $nmgp_dados_select['cantidadmxn'];
           $this->SC_log_arr['fields']['CantidadUSD']['0'] =  $nmgp_dados_select['cantidadusd'];
           $this->SC_log_arr['fields']['ImporteMXN']['0'] =  $nmgp_dados_select['importemxn'];
           $this->SC_log_arr['fields']['ImporteUSD']['0'] =  $nmgp_dados_select['importeusd'];
           $this->SC_log_arr['fields']['FolioInicialCR']['0'] =  $nmgp_dados_select['folioinicialcr'];
           $this->SC_log_arr['fields']['FolioFinalCR']['0'] =  $nmgp_dados_select['foliofinalcr'];
           $this->SC_log_arr['fields']['FolioInicialEAP']['0'] =  $nmgp_dados_select['folioinicialeap'];
           $this->SC_log_arr['fields']['FolioFinalEAP']['0'] =  $nmgp_dados_select['foliofinaleap'];
           $this->SC_log_arr['fields']['Faltante']['0'] =  $nmgp_dados_select['faltante'];
           $this->SC_log_arr['fields']['IngresoELU_PRE']['0'] =  $nmgp_dados_select['ingresoelu_pre'];
           $this->SC_log_arr['fields']['Entregado']['0'] =  $nmgp_dados_select['entregado'];
           $this->SC_log_arr['fields']['AdministradorID']['0'] =  $nmgp_dados_select['administradorid'];
           $this->SC_log_arr['fields']['EncargadoTurnoID']['0'] =  $nmgp_dados_select['encargadoturnoid'];
           $this->SC_log_arr['fields']['EncargadoTurnoID_Pre']['0'] =  $nmgp_dados_select['encargadoturnoid_pre'];
           $this->SC_log_arr['fields']['FechaCierre']['0'] =  $nmgp_dados_select['fechacierre'];
           $this->SC_log_arr['fields']['FechaPreLiq']['0'] =  $nmgp_dados_select['fechapreliq'];
           $this->SC_log_arr['fields']['FechaLiq']['0'] =  $nmgp_dados_select['fechaliq'];
           $this->SC_log_arr['fields']['Operacion']['0'] =  $nmgp_dados_select['operacion'];
           $this->SC_log_arr['fields']['LiquidadorID']['0'] =  $nmgp_dados_select['liquidadorid'];
           $this->SC_log_arr['fields']['FaltanteANA']['0'] =  $nmgp_dados_select['faltanteana'];
           $this->SC_log_arr['fields']['IngresoELU_ANA']['0'] =  $nmgp_dados_select['ingresoelu_ana'];
           $this->SC_log_arr['fields']['Conteo']['0'] =  $nmgp_dados_select['conteo'];
           $this->SC_log_arr['fields']['FechaInicioDictamen']['0'] =  $nmgp_dados_select['fechainiciodictamen'];
           $this->SC_log_arr['fields']['FechaFinDictamen']['0'] =  $nmgp_dados_select['fechafindictamen'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['TurnoID']['1'] =  $this->turnoid;
       $this->SC_log_arr['fields']['CasetaID']['1'] =  $this->casetaid;
       $this->SC_log_arr['fields']['TramoID']['1'] =  $this->tramoid;
       $this->SC_log_arr['fields']['Cuerpo']['1'] =  $this->cuerpo;
       $this->SC_log_arr['fields']['UsuarioID']['1'] =  $this->usuarioid;
       $this->SC_log_arr['fields']['CarrilID']['1'] =  $this->carrilid;
       $this->SC_log_arr['fields']['FechaOperacion']['1'] =  $this->fechaoperacion;
       $this->SC_log_arr['fields']['FechaTurno']['1'] =  $this->fechaturno;
       $this->SC_log_arr['fields']['HoraInicio']['1'] =  $this->horainicio;
       $this->SC_log_arr['fields']['FechaFin']['1'] =  $this->fechafin;
       $this->SC_log_arr['fields']['HoraFin']['1'] =  $this->horafin;
       $this->SC_log_arr['fields']['OperacionID']['1'] =  $this->operacionid;
       $this->SC_log_arr['fields']['FolioCierre']['1'] =  $this->foliocierre;
       $this->SC_log_arr['fields']['EstatusCarril']['1'] =  $this->estatuscarril;
       $this->SC_log_arr['fields']['Observacion']['1'] =  $this->observacion;
       $this->SC_log_arr['fields']['PreLiquidado']['1'] =  $this->preliquidado;
       $this->SC_log_arr['fields']['MontoCR']['1'] =  $this->montocr;
       $this->SC_log_arr['fields']['MontoANA']['1'] =  $this->montoana;
       $this->SC_log_arr['fields']['CantidadMXN']['1'] =  $this->cantidadmxn;
       $this->SC_log_arr['fields']['CantidadUSD']['1'] =  $this->cantidadusd;
       $this->SC_log_arr['fields']['ImporteMXN']['1'] =  $this->importemxn;
       $this->SC_log_arr['fields']['ImporteUSD']['1'] =  $this->importeusd;
       $this->SC_log_arr['fields']['FolioInicialCR']['1'] =  $this->folioinicialcr;
       $this->SC_log_arr['fields']['FolioFinalCR']['1'] =  $this->foliofinalcr;
       $this->SC_log_arr['fields']['FolioInicialEAP']['1'] =  $this->folioinicialeap;
       $this->SC_log_arr['fields']['FolioFinalEAP']['1'] =  $this->foliofinaleap;
       $this->SC_log_arr['fields']['Faltante']['1'] =  $this->faltante;
       $this->SC_log_arr['fields']['IngresoELU_PRE']['1'] =  $this->ingresoelu_pre;
       $this->SC_log_arr['fields']['Entregado']['1'] =  $this->entregado;
       $this->SC_log_arr['fields']['AdministradorID']['1'] =  $this->administradorid;
       $this->SC_log_arr['fields']['EncargadoTurnoID']['1'] =  $this->encargadoturnoid;
       $this->SC_log_arr['fields']['EncargadoTurnoID_Pre']['1'] =  $this->encargadoturnoid_pre;
       $this->SC_log_arr['fields']['FechaCierre']['1'] =  $this->fechacierre;
       $this->SC_log_arr['fields']['FechaPreLiq']['1'] =  $this->fechapreliq;
       $this->SC_log_arr['fields']['FechaLiq']['1'] =  $this->fechaliq;
       $this->SC_log_arr['fields']['Operacion']['1'] =  $this->operacion;
       $this->SC_log_arr['fields']['LiquidadorID']['1'] =  $this->liquidadorid;
       $this->SC_log_arr['fields']['FaltanteANA']['1'] =  $this->faltanteana;
       $this->SC_log_arr['fields']['IngresoELU_ANA']['1'] =  $this->ingresoelu_ana;
       $this->SC_log_arr['fields']['Conteo']['1'] =  $this->conteo;
       $this->SC_log_arr['fields']['FechaInicioDictamen']['1'] =  $this->fechainiciodictamen;
       $this->SC_log_arr['fields']['FechaFinDictamen']['1'] =  $this->fechafindictamen;
   }
// 
   function NM_gera_log_compress() 
   {
       foreach ($this->SC_log_arr['fields'] as $fild => $data_f)
       {
           if ($data_f[0] == $data_f[1] || ($data_f[0] == "" && $data_f[1] == "null"))
           {
               unset($this->SC_log_arr['fields'][$fild]);
           }
       }
   }
// 
   function NM_gera_log_output() 
   {
       $Log_output = "";
       $prim_delim = "";
       $Log_labels = array();
       $Log_labels['TurnoID'] =  "Turno ID";
       $Log_labels['CasetaID'] =  "Caseta ID";
       $Log_labels['TramoID'] =  "Tramo ID";
       $Log_labels['Cuerpo'] =  "Cuerpo";
       $Log_labels['UsuarioID'] =  "Usuario ID";
       $Log_labels['CarrilID'] =  "Carril ID";
       $Log_labels['FechaOperacion'] =  "Fecha Operacion";
       $Log_labels['FechaTurno'] =  "Fecha Turno";
       $Log_labels['HoraInicio'] =  "Hora Inicio";
       $Log_labels['FechaFin'] =  "Fecha Fin";
       $Log_labels['HoraFin'] =  "Hora Fin";
       $Log_labels['OperacionID'] =  "Operacion ID";
       $Log_labels['FolioCierre'] =  "Folio Cierre";
       $Log_labels['EstatusCarril'] =  "Estatus Carril";
       $Log_labels['Observacion'] =  "Observacion";
       $Log_labels['PreLiquidado'] =  "Pre Liquidado";
       $Log_labels['MontoCR'] =  "Monto CR";
       $Log_labels['MontoANA'] =  "Monto ANA";
       $Log_labels['CantidadMXN'] =  "Cantidad MXN";
       $Log_labels['CantidadUSD'] =  "Cantidad USD";
       $Log_labels['ImporteMXN'] =  "Importe MXN";
       $Log_labels['ImporteUSD'] =  "Importe USD";
       $Log_labels['FolioInicialCR'] =  "Folio Inicial CR";
       $Log_labels['FolioFinalCR'] =  "Folio Final CR";
       $Log_labels['FolioInicialEAP'] =  "Folio Inicial EAP";
       $Log_labels['FolioFinalEAP'] =  "Folio Final EAP";
       $Log_labels['Faltante'] =  "Faltante";
       $Log_labels['IngresoELU_PRE'] =  "Ingreso ELU PRE";
       $Log_labels['Entregado'] =  "Entregado";
       $Log_labels['AdministradorID'] =  "Administrador ID";
       $Log_labels['EncargadoTurnoID'] =  "Encargado Turno ID";
       $Log_labels['EncargadoTurnoID_Pre'] =  "Encargado Turno ID Pre";
       $Log_labels['FechaCierre'] =  "Fecha Cierre";
       $Log_labels['FechaPreLiq'] =  "Fecha Pre Liq";
       $Log_labels['FechaLiq'] =  "Fecha Liq";
       $Log_labels['Operacion'] =  "Operacion";
       $Log_labels['LiquidadorID'] =  "Liquidador ID";
       $Log_labels['FaltanteANA'] =  "Faltante ANA";
       $Log_labels['IngresoELU_ANA'] =  "Ingreso ELU ANA";
       $Log_labels['Conteo'] =  "Conteo";
       $Log_labels['FechaInicioDictamen'] =  "Fecha Inicio Dictamen";
       $Log_labels['FechaFinDictamen'] =  "Fecha Fin Dictamen";
       foreach ($this->SC_log_arr as $type => $dats)
       {
           if ($type == "keys")
           {
               $Log_output .= "--> keys <-- ";
               foreach ($dats as $key => $data)
               {
                   $Log_output .=  $prim_delim . $key . " : " . $data;
                   $prim_delim  = "||";
               }
           }
           if ($type == "fields")
           {
               $Log_output .= $prim_delim . "--> fields <-- ";
               $prim_delim = "";
               if (empty($dats) && $this->SC_log_evt == "update")
               {
                   return;
               }
               foreach ($dats as $key => $data)
               {
                   foreach ($data as $tp => $val)
                   {
                      $tpok = ($tp == 0) ? " (old) " : " (new) ";
                      $Log_output .= $prim_delim . $key . $tpok . " : " . $val;
                      $prim_delim  = "||";
                   }
                   $Log_output .= $prim_delim . $key . " (label) " . " : " . $Log_labels[$key];
               }
           }
       }
       $this->NM_gera_log_insert("Scriptcase", $this->SC_log_evt, $Log_output);
   }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] + 1;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (!isset($this->Ini->Str_toolbarnav_separator))
           {
               $this->Ini->Str_toolbarnav_separator = "";
           }
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_muestra_ingresoEluPre_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_muestra_ingresoEluPre_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("consecutivo", "turnoid", "casetaid", "tramoid", "cuerpo", "usuarioid", "carrilid", "fechaoperacion", "fechaturno", "horainicio", "fechafin", "horafin", "operacionid", "foliocierre", "estatuscarril", "observacion", "preliquidado", "montocr", "montoana", "cantidadmxn", "cantidadusd", "importemxn", "importeusd", "folioinicialcr", "foliofinalcr", "folioinicialeap", "foliofinaleap", "faltante", "ingresoelu_pre", "entregado", "administradorid", "encargadoturnoid", "encargadoturnoid_pre", "fechacierre", "fechapreliq", "fechaliq", "operacion", "liquidadorid", "faltanteana", "ingresoelu_ana", "conteo", "fechainiciodictamen", "fechafindictamen"))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array("consecutivo", "turnoid", "casetaid", "tramoid", "cuerpo", "usuarioid", "carrilid", "fechaoperacion", "fechaturno", "horainicio", "fechafin", "horafin", "operacionid", "foliocierre", "estatuscarril", "observacion", "preliquidado", "montocr", "montoana", "cantidadmxn", "cantidadusd", "importemxn", "importeusd", "folioinicialcr", "foliofinalcr", "folioinicialeap", "foliofinaleap", "faltante", "ingresoelu_pre", "entregado", "administradorid", "encargadoturnoid", "encargadoturnoid_pre", "fechacierre", "fechapreliq", "fechaliq", "operacion", "liquidadorid", "faltanteana", "ingresoelu_ana", "conteo", "fechainiciodictamen", "fechafindictamen"))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_muestra_ingresoEluPre_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp" || $field == "consecutivo") 
          {
              $this->SC_monta_condicao($comando, "Consecutivo", $arg_search, str_replace(",", ".", $data_search), "BIGINT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "turnoid") 
          {
              $this->SC_monta_condicao($comando, "TurnoID", $arg_search, str_replace(",", ".", $data_search), "TINYINT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "casetaid") 
          {
              $this->SC_monta_condicao($comando, "CasetaID", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "tramoid") 
          {
              $this->SC_monta_condicao($comando, "TramoID", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "cuerpo") 
          {
              $this->SC_monta_condicao($comando, "Cuerpo", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp" || $field == "usuarioid") 
          {
              $this->SC_monta_condicao($comando, "UsuarioID", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp" || $field == "carrilid") 
          {
              $this->SC_monta_condicao($comando, "CarrilID", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "fechaoperacion") 
          {
              $this->SC_monta_condicao($comando, "FechaOperacion", $arg_search, $data_search, "DATE", false);
          }
          if ($field == "SC_all_Cmp" || $field == "fechaturno") 
          {
              $this->SC_monta_condicao($comando, "FechaTurno", $arg_search, $data_search, "DATE", false);
          }
          if ($field == "SC_all_Cmp" || $field == "horainicio") 
          {
              $this->SC_monta_condicao($comando, "HoraInicio", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "SC_all_Cmp" || $field == "fechafin") 
          {
              $this->SC_monta_condicao($comando, "FechaFin", $arg_search, $data_search, "DATE", false);
          }
          if ($field == "SC_all_Cmp" || $field == "horafin") 
          {
              $this->SC_monta_condicao($comando, "HoraFin", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "SC_all_Cmp" || $field == "operacionid") 
          {
              $this->SC_monta_condicao($comando, "OperacionID", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp" || $field == "foliocierre") 
          {
              $this->SC_monta_condicao($comando, "FolioCierre", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp" || $field == "estatuscarril") 
          {
              $this->SC_monta_condicao($comando, "EstatusCarril", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp" || $field == "observacion") 
          {
              $this->SC_monta_condicao($comando, "Observacion", $arg_search, $data_search, "TEXT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "preliquidado") 
          {
              $this->SC_monta_condicao($comando, "PreLiquidado", $arg_search, str_replace(",", ".", $data_search), "TINYINT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "montocr") 
          {
              $this->SC_monta_condicao($comando, "MontoCR", $arg_search, str_replace(",", ".", $data_search), "DECIMAL", false);
          }
          if ($field == "SC_all_Cmp" || $field == "montoana") 
          {
              $this->SC_monta_condicao($comando, "MontoANA", $arg_search, str_replace(",", ".", $data_search), "DECIMAL", false);
          }
          if ($field == "SC_all_Cmp" || $field == "cantidadmxn") 
          {
              $this->SC_monta_condicao($comando, "CantidadMXN", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "cantidadusd") 
          {
              $this->SC_monta_condicao($comando, "CantidadUSD", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "importemxn") 
          {
              $this->SC_monta_condicao($comando, "ImporteMXN", $arg_search, str_replace(",", ".", $data_search), "DECIMAL", false);
          }
          if ($field == "SC_all_Cmp" || $field == "importeusd") 
          {
              $this->SC_monta_condicao($comando, "ImporteUSD", $arg_search, str_replace(",", ".", $data_search), "DECIMAL", false);
          }
          if ($field == "SC_all_Cmp" || $field == "folioinicialcr") 
          {
              $this->SC_monta_condicao($comando, "FolioInicialCR", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "foliofinalcr") 
          {
              $this->SC_monta_condicao($comando, "FolioFinalCR", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "folioinicialeap") 
          {
              $this->SC_monta_condicao($comando, "FolioInicialEAP", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "foliofinaleap") 
          {
              $this->SC_monta_condicao($comando, "FolioFinalEAP", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "faltante") 
          {
              $this->SC_monta_condicao($comando, "Faltante", $arg_search, str_replace(",", ".", $data_search), "DECIMAL", false);
          }
          if ($field == "SC_all_Cmp" || $field == "ingresoelu_pre") 
          {
              $this->SC_monta_condicao($comando, "IngresoELU_PRE", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "entregado") 
          {
              $this->SC_monta_condicao($comando, "Entregado", $arg_search, str_replace(",", ".", $data_search), "DECIMAL", false);
          }
          if ($field == "SC_all_Cmp" || $field == "administradorid") 
          {
              $this->SC_monta_condicao($comando, "AdministradorID", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "encargadoturnoid") 
          {
              $this->SC_monta_condicao($comando, "EncargadoTurnoID", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "encargadoturnoid_pre") 
          {
              $this->SC_monta_condicao($comando, "EncargadoTurnoID_Pre", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "fechacierre") 
          {
              $this->SC_monta_condicao($comando, "FechaCierre", $arg_search, $data_search, "DATETIME", false);
          }
          if ($field == "SC_all_Cmp" || $field == "fechapreliq") 
          {
              $this->SC_monta_condicao($comando, "FechaPreLiq", $arg_search, $data_search, "DATETIME", false);
          }
          if ($field == "SC_all_Cmp" || $field == "fechaliq") 
          {
              $this->SC_monta_condicao($comando, "FechaLiq", $arg_search, $data_search, "DATETIME", false);
          }
          if ($field == "SC_all_Cmp" || $field == "operacion") 
          {
              $this->SC_monta_condicao($comando, "Operacion", $arg_search, str_replace(",", ".", $data_search), "DECIMAL", false);
          }
          if ($field == "SC_all_Cmp" || $field == "liquidadorid") 
          {
              $this->SC_monta_condicao($comando, "LiquidadorID", $arg_search, $data_search, "CHAR", false);
          }
          if ($field == "SC_all_Cmp" || $field == "faltanteana") 
          {
              $this->SC_monta_condicao($comando, "FaltanteANA", $arg_search, str_replace(",", ".", $data_search), "DECIMAL", false);
          }
          if ($field == "SC_all_Cmp" || $field == "ingresoelu_ana") 
          {
              $this->SC_monta_condicao($comando, "IngresoELU_ANA", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "conteo") 
          {
              $this->SC_monta_condicao($comando, "Conteo", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "fechainiciodictamen") 
          {
              $this->SC_monta_condicao($comando, "FechaInicioDictamen", $arg_search, $data_search, "DATETIME", false);
          }
          if ($field == "SC_all_Cmp" || $field == "fechafindictamen") 
          {
              $this->SC_monta_condicao($comando, "FechaFinDictamen", $arg_search, $data_search, "DATETIME", false);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_muestra_ingresoEluPre = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total'] = $qt_geral_reg_form_muestra_ingresoEluPre;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_muestra_ingresoEluPre_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_muestra_ingresoEluPre_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="", $tp_unaccent=false)
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_accent = $this->Ini->Nm_accent_no;
      if ($tp_unaccent) {
          $Nm_accent = $this->Ini->Nm_accent_yes;
      }
      $nm_numeric[] = "consecutivo";$nm_numeric[] = "turnoid";$nm_numeric[] = "casetaid";$nm_numeric[] = "tramoid";$nm_numeric[] = "carrilid";$nm_numeric[] = "preliquidado";$nm_numeric[] = "montocr";$nm_numeric[] = "montoana";$nm_numeric[] = "cantidadmxn";$nm_numeric[] = "cantidadusd";$nm_numeric[] = "importemxn";$nm_numeric[] = "importeusd";$nm_numeric[] = "folioinicialcr";$nm_numeric[] = "foliofinalcr";$nm_numeric[] = "folioinicialeap";$nm_numeric[] = "foliofinaleap";$nm_numeric[] = "faltante";$nm_numeric[] = "ingresoelu_pre";$nm_numeric[] = "entregado";$nm_numeric[] = "administradorid";$nm_numeric[] = "encargadoturnoid";$nm_numeric[] = "encargadoturnoid_pre";$nm_numeric[] = "operacion";$nm_numeric[] = "faltanteana";$nm_numeric[] = "ingresoelu_ana";$nm_numeric[] = "conteo";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR(255))";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas["fechaoperacion"] = "date";$Nm_datas["fechaturno"] = "date";$Nm_datas["horainicio"] = "time";$Nm_datas["fechafin"] = "date";$Nm_datas["horafin"] = "time";$Nm_datas["fechacierre"] = "datetime";$Nm_datas["fechapreliq"] = "datetime";$Nm_datas["fechaliq"] = "datetime";$Nm_datas["fechainiciodictamen"] = "datetime";$Nm_datas["fechafindictamen"] = "datetime";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . " not" . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_muestra_ingresoEluPre_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_muestra_ingresoEluPre_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_muestra_ingresoEluPre_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   <link rel="stylesheet" type="text/css" href="../_lib/css/peaje_module_ui.css?v=20260912-preliq-ui" />
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "new":
                return array("sc_b_new_t.sc-unique-btn-1");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-3");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-4");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-5");
                break;
            case "breload":
                return array("sc_b_reload_t.sc-unique-btn-6");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-10", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-11");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-12");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-13");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-14");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-15");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " detalleturno"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " detalleturno"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div>
    </td></tr>
<?php
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R") {
        } else {
            return false;
        }
        return true;
    } // displayAppToolbars

    function displayTopToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayTopToolbar

    function displayBottomToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayBottomToolbar

    function scGetColumnOrderRule($fieldName, &$orderColName, &$orderColOrient, &$orderColRule)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['ordem_ord'] == " desc") {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
                $orderColRule = $sortRule = 'desc';
            } else {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
                $orderColRule = $sortRule = 'asc';
            }
        }
        return $sortRule;
    }

    function scGetColumnOrderIcon($fieldName, $sortRule)
    {        if ('desc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('asc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('' != $this->Ini->Label_sort) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } else {
            return '';
        }
    }

    function scIsFieldNumeric($fieldName)
    {
        switch ($fieldName) {
            case "Consecutivo":
                return true;
            case "TurnoID":
                return true;
            case "CasetaID":
                return true;
            case "TramoID":
                return true;
            case "CarrilID":
                return true;
            case "PreLiquidado":
                return true;
            case "MontoCR":
                return true;
            case "MontoANA":
                return true;
            case "CantidadMXN":
                return true;
            case "CantidadUSD":
                return true;
            case "ImporteMXN":
                return true;
            case "ImporteUSD":
                return true;
            case "FolioInicialCR":
                return true;
            case "FolioFinalCR":
                return true;
            case "FolioInicialEAP":
                return true;
            case "FolioFinalEAP":
                return true;
            case "Faltante":
                return true;
            case "IngresoELU_PRE":
                return true;
            case "Entregado":
                return true;
            case "AdministradorID":
                return true;
            case "EncargadoTurnoID":
                return true;
            case "EncargadoTurnoID_Pre":
                return true;
            case "Operacion":
                return true;
            case "FaltanteANA":
                return true;
            case "IngresoELU_ANA":
                return true;
            case "Conteo":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "Consecutivo":
                return 'desc';
            case "TurnoID":
                return 'desc';
            case "CasetaID":
                return 'desc';
            case "TramoID":
                return 'desc';
            case "CarrilID":
                return 'desc';
            case "FechaOperacion":
                return 'desc';
            case "FechaTurno":
                return 'desc';
            case "HoraInicio":
                return 'desc';
            case "FechaFin":
                return 'desc';
            case "HoraFin":
                return 'desc';
            case "PreLiquidado":
                return 'desc';
            case "MontoCR":
                return 'desc';
            case "MontoANA":
                return 'desc';
            case "CantidadMXN":
                return 'desc';
            case "CantidadUSD":
                return 'desc';
            case "ImporteMXN":
                return 'desc';
            case "ImporteUSD":
                return 'desc';
            case "FolioInicialCR":
                return 'desc';
            case "FolioFinalCR":
                return 'desc';
            case "FolioInicialEAP":
                return 'desc';
            case "FolioFinalEAP":
                return 'desc';
            case "Faltante":
                return 'desc';
            case "IngresoELU_PRE":
                return 'desc';
            case "Entregado":
                return 'desc';
            case "AdministradorID":
                return 'desc';
            case "EncargadoTurnoID":
                return 'desc';
            case "EncargadoTurnoID_Pre":
                return 'desc';
            case "FechaCierre":
                return 'desc';
            case "FechaPreLiq":
                return 'desc';
            case "FechaLiq":
                return 'desc';
            case "Operacion":
                return 'desc';
            case "FaltanteANA":
                return 'desc';
            case "IngresoELU_ANA":
                return 'desc';
            case "Conteo":
                return 'desc';
            case "FechaInicioDictamen":
                return 'desc';
            case "FechaFinDictamen":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
