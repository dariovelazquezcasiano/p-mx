<?php
//
class control_detalleturno_mob_apl
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
   var $mxn;
   var $usd;
   var $cantidadmxn;
   var $cantidadusd;
   var $importemxn;
   var $importeusd;
   var $folioinicialcr;
   var $foliofinalcr;
   var $folioinicialeap;
   var $foliofinaleap;
   var $folioinir1;
   var $foliofinr1;
   var $folioinir2;
   var $foliofinr2;
   var $folioinir3;
   var $foliofinr3;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
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
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cantidadmxn']))
          {
              $this->cantidadmxn = $this->NM_ajax_info['param']['cantidadmxn'];
          }
          if (isset($this->NM_ajax_info['param']['cantidadusd']))
          {
              $this->cantidadusd = $this->NM_ajax_info['param']['cantidadusd'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['foliofinalcr']))
          {
              $this->foliofinalcr = $this->NM_ajax_info['param']['foliofinalcr'];
          }
          if (isset($this->NM_ajax_info['param']['foliofinaleap']))
          {
              $this->foliofinaleap = $this->NM_ajax_info['param']['foliofinaleap'];
          }
          if (isset($this->NM_ajax_info['param']['foliofinr1']))
          {
              $this->foliofinr1 = $this->NM_ajax_info['param']['foliofinr1'];
          }
          if (isset($this->NM_ajax_info['param']['foliofinr2']))
          {
              $this->foliofinr2 = $this->NM_ajax_info['param']['foliofinr2'];
          }
          if (isset($this->NM_ajax_info['param']['foliofinr3']))
          {
              $this->foliofinr3 = $this->NM_ajax_info['param']['foliofinr3'];
          }
          if (isset($this->NM_ajax_info['param']['folioinicialcr']))
          {
              $this->folioinicialcr = $this->NM_ajax_info['param']['folioinicialcr'];
          }
          if (isset($this->NM_ajax_info['param']['folioinicialeap']))
          {
              $this->folioinicialeap = $this->NM_ajax_info['param']['folioinicialeap'];
          }
          if (isset($this->NM_ajax_info['param']['folioinir1']))
          {
              $this->folioinir1 = $this->NM_ajax_info['param']['folioinir1'];
          }
          if (isset($this->NM_ajax_info['param']['folioinir2']))
          {
              $this->folioinir2 = $this->NM_ajax_info['param']['folioinir2'];
          }
          if (isset($this->NM_ajax_info['param']['folioinir3']))
          {
              $this->folioinir3 = $this->NM_ajax_info['param']['folioinir3'];
          }
          if (isset($this->NM_ajax_info['param']['importemxn']))
          {
              $this->importemxn = $this->NM_ajax_info['param']['importemxn'];
          }
          if (isset($this->NM_ajax_info['param']['importeusd']))
          {
              $this->importeusd = $this->NM_ajax_info['param']['importeusd'];
          }
          if (isset($this->NM_ajax_info['param']['mxn']))
          {
              $this->mxn = $this->NM_ajax_info['param']['mxn'];
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
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['usd']))
          {
              $this->usd = $this->NM_ajax_info['param']['usd'];
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
          $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['embutida_parms']);
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
                 nm_limpa_str_control_detalleturno_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new control_detalleturno_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['control_detalleturno_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_detalleturno_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_detalleturno_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_detalleturno_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_detalleturno_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('control_detalleturno_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_detalleturno_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "control_detalleturno_mob")
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


      $this->arr_buttons['sigue']['hint']             = "";
      $this->arr_buttons['sigue']['type']             = "button";
      $this->arr_buttons['sigue']['value']            = "sigue";
      $this->arr_buttons['sigue']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['sigue']['display_position'] = "text_right";
      $this->arr_buttons['sigue']['style']            = "default";
      $this->arr_buttons['sigue']['image']            = "";
      $this->arr_buttons['sigue']['has_fa']            = "true";
      $this->arr_buttons['sigue']['fontawesomeicon']            = "";

      $this->arr_buttons['mas']['hint']             = "";
      $this->arr_buttons['mas']['type']             = "button";
      $this->arr_buttons['mas']['value']            = "mas";
      $this->arr_buttons['mas']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['mas']['display_position'] = "text_right";
      $this->arr_buttons['mas']['style']            = "default";
      $this->arr_buttons['mas']['image']            = "";
      $this->arr_buttons['mas']['has_fa']            = "true";
      $this->arr_buttons['mas']['fontawesomeicon']            = "";


      $_SESSION['scriptcase']['error_icon']['control_detalleturno_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['control_detalleturno_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      $this->nmgp_botoes['sigue'] = "on";
      $this->nmgp_botoes['mas'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_detalleturno_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['control_detalleturno_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['control_detalleturno_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("control_detalleturno_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'control_detalleturno_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'control_detalleturno_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
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
          require_once($this->Ini->path_embutida . 'control_detalleturno/control_detalleturno_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "control_detalleturno_mob_erro.class.php"); 
      }
      $this->Erro      = new control_detalleturno_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['control_detalleturno_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['sigue'] = "off";
          $this->nmgp_botoes['mas'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sigue'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['botoes']['sigue'];
          $this->nmgp_botoes['mas'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['botoes']['mas'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['control_detalleturno_mob']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['control_detalleturno_mob']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "mas")
          { 
              $this->sc_btn_mas();
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- mxn
      $this->field_config['mxn']               = array();
      $this->field_config['mxn']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['mxn']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['mxn']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['mxn']['symbol_mon'] = '';
      $this->field_config['mxn']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['mxn']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- usd
      $this->field_config['usd']               = array();
      $this->field_config['usd']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['usd']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['usd']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['usd']['symbol_mon'] = '';
      $this->field_config['usd']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['usd']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
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
      //-- folioinir1
      $this->field_config['folioinir1']               = array();
      $this->field_config['folioinir1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['folioinir1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['folioinir1']['symbol_dec'] = '';
      $this->field_config['folioinir1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['folioinir1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- foliofinr1
      $this->field_config['foliofinr1']               = array();
      $this->field_config['foliofinr1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['foliofinr1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['foliofinr1']['symbol_dec'] = '';
      $this->field_config['foliofinr1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['foliofinr1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- folioinir2
      $this->field_config['folioinir2']               = array();
      $this->field_config['folioinir2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['folioinir2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['folioinir2']['symbol_dec'] = '';
      $this->field_config['folioinir2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['folioinir2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- foliofinr2
      $this->field_config['foliofinr2']               = array();
      $this->field_config['foliofinr2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['foliofinr2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['foliofinr2']['symbol_dec'] = '';
      $this->field_config['foliofinr2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['foliofinr2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- folioinir3
      $this->field_config['folioinir3']               = array();
      $this->field_config['folioinir3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['folioinir3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['folioinir3']['symbol_dec'] = '';
      $this->field_config['folioinir3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['folioinir3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- foliofinr3
      $this->field_config['foliofinr3']               = array();
      $this->field_config['foliofinr3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['foliofinr3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['foliofinr3']['symbol_dec'] = '';
      $this->field_config['foliofinr3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['foliofinr3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['Gera_log_access'] = false;
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
          if ('validate_mxn' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'mxn');
          }
          if ('validate_usd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usd');
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
          if ('validate_folioinir1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'folioinir1');
          }
          if ('validate_foliofinr1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'foliofinr1');
          }
          if ('validate_folioinir2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'folioinir2');
          }
          if ('validate_foliofinr2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'foliofinr2');
          }
          if ('validate_folioinir3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'folioinir3');
          }
          if ('validate_foliofinr3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'foliofinr3');
          }
          control_detalleturno_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              control_detalleturno_mob_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['control_detalleturno_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_detalleturno_mob_pack_ajax_response();
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['control_detalleturno_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_detalleturno_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->mxn = "" ;  
          $this->usd = "" ;  
          $this->cantidadmxn = "" ;  
          $this->cantidadusd = "" ;  
          $this->importemxn = "" ;  
          $this->importeusd = "" ;  
          $this->folioinicialcr = "" ;  
          $this->foliofinalcr = "" ;  
          $this->folioinicialeap = "" ;  
          $this->foliofinaleap = "" ;  
          $this->folioinir1 = "" ;  
          $this->foliofinr1 = "" ;  
          $this->folioinir2 = "" ;  
          $this->foliofinr2 = "" ;  
          $this->folioinir3 = "" ;  
          $this->foliofinr3 = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
      }
      else
      {
           if ($this->nmgp_opcao != "nada")
           {
           }
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos']))
              { 
                  $mxn = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][0]; 
                  $usd = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][1]; 
                  $cantidadmxn = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][2]; 
                  $cantidadusd = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][3]; 
                  $importemxn = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][4]; 
                  $importeusd = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][5]; 
                  $folioinicialcr = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][6]; 
                  $foliofinalcr = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][7]; 
                  $folioinicialeap = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][8]; 
                  $foliofinaleap = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][9]; 
                  $folioinir1 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][10]; 
                  $foliofinr1 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][11]; 
                  $folioinir2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][12]; 
                  $foliofinr2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][13]; 
                  $folioinir3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][14]; 
                  $foliofinr3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][15]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][0] = $this->mxn; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][1] = $this->usd; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][2] = $this->cantidadmxn; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][3] = $this->cantidadusd; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][4] = $this->importemxn; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][5] = $this->importeusd; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][6] = $this->folioinicialcr; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][7] = $this->foliofinalcr; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][8] = $this->folioinicialeap; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][9] = $this->foliofinaleap; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][10] = $this->folioinir1; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][11] = $this->foliofinr1; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][12] = $this->folioinir2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][13] = $this->foliofinr2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][14] = $this->folioinir3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['campos'][15] = $this->foliofinr3; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("control_detalleturno_mob", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("control_detalleturno_mob_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              control_detalleturno_mob_pack_ajax_response();
              exit;
          }
      }
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "control_detalleturno_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "") ?></TITLE>
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
<link rel="stylesheet" type="text/css" href="../_lib/css/peaje_module_ui.css?v=20260913-palette" />
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
<form name="Fdown" method="get" action="control_detalleturno_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="control_detalleturno_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="control_detalleturno_mob.php" target="_self" style="display: none"> 
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['SC_sep_date1'];
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
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'control_detalleturno_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'control_detalleturno_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'control_detalleturno_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               control_detalleturno_mob_pack_ajax_response();
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
   function sc_btn_mas() 
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;
 
     ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

      if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
      {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }

?>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript">
      var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
      var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_userSweetAlertDisplayed = false;
    </SCRIPT>
    <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<?php
include_once("control_detalleturno_mob_sajax_js.php");
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
    <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/peaje_module_ui.css?v=20260913-palette" />
 </head>
  <body class="scFormPage">
      <table class="scFormTabela" align="center"><tr><td>
<?php
      $varloc_btn_php = array();
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->mxn) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_form']['mxn']))
          {
              $varloc_btn_php['mxn'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_form']['mxn'];
          }
      }
      $nm_f_saida = "control_detalleturno_mob.php";
      if (!empty($this->field_config['mxn']['symbol_dec']))
      {
          $this->sc_remove_currency($this->mxn, $this->field_config['mxn']['symbol_dec'], $this->field_config['mxn']['symbol_grp'], $this->field_config['mxn']['symbol_mon']); 
          nm_limpa_valor($this->mxn, $this->field_config['mxn']['symbol_dec'], $this->field_config['mxn']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['usd']['symbol_dec']))
      {
          $this->sc_remove_currency($this->usd, $this->field_config['usd']['symbol_dec'], $this->field_config['usd']['symbol_grp'], $this->field_config['usd']['symbol_mon']); 
          nm_limpa_valor($this->usd, $this->field_config['usd']['symbol_dec'], $this->field_config['usd']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->cantidadmxn, $this->field_config['cantidadmxn']['symbol_grp']) ; 
      nm_limpa_numero($this->cantidadusd, $this->field_config['cantidadusd']['symbol_grp']) ; 
      if (!empty($this->field_config['importemxn']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importemxn, $this->field_config['importemxn']['symbol_dec'], $this->field_config['importemxn']['symbol_grp'], $this->field_config['importemxn']['symbol_mon']); 
          nm_limpa_valor($this->importemxn, $this->field_config['importemxn']['symbol_dec'], $this->field_config['importemxn']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['importeusd']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeusd, $this->field_config['importeusd']['symbol_dec'], $this->field_config['importeusd']['symbol_grp'], $this->field_config['importeusd']['symbol_mon']); 
          nm_limpa_valor($this->importeusd, $this->field_config['importeusd']['symbol_dec'], $this->field_config['importeusd']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->folioinicialcr, $this->field_config['folioinicialcr']['symbol_grp']) ; 
      nm_limpa_numero($this->foliofinalcr, $this->field_config['foliofinalcr']['symbol_grp']) ; 
      nm_limpa_numero($this->folioinicialeap, $this->field_config['folioinicialeap']['symbol_grp']) ; 
      nm_limpa_numero($this->foliofinaleap, $this->field_config['foliofinaleap']['symbol_grp']) ; 
      nm_limpa_numero($this->folioinir1, $this->field_config['folioinir1']['symbol_grp']) ; 
      nm_limpa_numero($this->foliofinr1, $this->field_config['foliofinr1']['symbol_grp']) ; 
      nm_limpa_numero($this->folioinir2, $this->field_config['folioinir2']['symbol_grp']) ; 
      nm_limpa_numero($this->foliofinr2, $this->field_config['foliofinr2']['symbol_grp']) ; 
      nm_limpa_numero($this->folioinir3, $this->field_config['folioinir3']['symbol_grp']) ; 
      nm_limpa_numero($this->foliofinr3, $this->field_config['foliofinr3']['symbol_grp']) ; 
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['control_detalleturno_mob']['contr_erro'] = 'on';
 
$_SESSION['scriptcase']['control_detalleturno_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="foliofinr3" value="<?php echo $this->form_encode_input($this->foliofinr3) ?>"/>
      <input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($nmgp_opcao_saida_php); ?>"/>
      <input type=hidden name="nmgp_opc_ant" value="<?php echo $this->form_encode_input($nmgp_opc_ant_saida_php); ?>"/>
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>"/>
      </form>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
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
           case 'mxn':
               return "Moneda (MXN)";
               break;
           case 'usd':
               return "Dolares (USD)";
               break;
           case 'cantidadmxn':
               return "Cantidad Folios GE MXN";
               break;
           case 'cantidadusd':
               return "Cantidad Folios GE USD";
               break;
           case 'importemxn':
               return "Importe GE MXN";
               break;
           case 'importeusd':
               return "Importe GE USD";
               break;
           case 'folioinicialcr':
               return "Folio Inicial CR";
               break;
           case 'foliofinalcr':
               return "Folio Final CR";
               break;
           case 'folioinicialeap':
               return "Secuencial inicial";
               break;
           case 'foliofinaleap':
               return "Secuencial Final";
               break;
           case 'folioinir1':
               return "Rollo 1: Folio Inicial";
               break;
           case 'foliofinr1':
               return "Rollo 1: Folio Final";
               break;
           case 'folioinir2':
               return "Rollo 2: Folio Inicial";
               break;
           case 'foliofinr2':
               return "Rollo 2: Folio Final";
               break;
           case 'folioinir3':
               return "Rollo 3: Folio Inicial";
               break;
           case 'foliofinr3':
               return "Rollo 3: Folio Final";
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
              if (!isset($this->NM_ajax_info['errList']['geral_control_detalleturno_mob']) || !is_array($this->NM_ajax_info['errList']['geral_control_detalleturno_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_control_detalleturno_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_control_detalleturno_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'mxn' == $filtro)) || (is_array($filtro) && in_array('mxn', $filtro)))
        $this->ValidateField_mxn($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'usd' == $filtro)) || (is_array($filtro) && in_array('usd', $filtro)))
        $this->ValidateField_usd($Campos_Crit, $Campos_Falta, $Campos_Erros);
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
      if ((!is_array($filtro) && ('' == $filtro || 'folioinir1' == $filtro)) || (is_array($filtro) && in_array('folioinir1', $filtro)))
        $this->ValidateField_folioinir1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'foliofinr1' == $filtro)) || (is_array($filtro) && in_array('foliofinr1', $filtro)))
        $this->ValidateField_foliofinr1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'folioinir2' == $filtro)) || (is_array($filtro) && in_array('folioinir2', $filtro)))
        $this->ValidateField_folioinir2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'foliofinr2' == $filtro)) || (is_array($filtro) && in_array('foliofinr2', $filtro)))
        $this->ValidateField_foliofinr2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'folioinir3' == $filtro)) || (is_array($filtro) && in_array('folioinir3', $filtro)))
        $this->ValidateField_folioinir3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'foliofinr3' == $filtro)) || (is_array($filtro) && in_array('foliofinr3', $filtro)))
        $this->ValidateField_foliofinr3($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['control_detalleturno_mob']['contr_erro'] = 'on';
 if(empty($this->folioinir1 ) || empty($this->foliofinr1 )){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Folio inicial o final esta vacio";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_detalleturno_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_detalleturno_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Folio inicial o final esta vacio";
 }
;
	}
if($this->foliofinr1 <$this->folioinir1 ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Folio Final no puede ser mayor que folio inicial";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_detalleturno_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_detalleturno_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Folio Final no puede ser mayor que folio inicial";
 }
;
	}
$_SESSION['scriptcase']['control_detalleturno_mob']['contr_erro'] = 'off'; 
      }
      }
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

    function ValidateField_mxn(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->mxn === "" || is_null($this->mxn))  
      { 
          $this->mxn = 0;
          $this->sc_force_zero[] = 'mxn';
      } 
      if (!empty($this->field_config['mxn']['symbol_dec']))
      {
          $this->sc_remove_currency($this->mxn, $this->field_config['mxn']['symbol_dec'], $this->field_config['mxn']['symbol_grp'], $this->field_config['mxn']['symbol_mon']); 
          nm_limpa_valor($this->mxn, $this->field_config['mxn']['symbol_dec'], $this->field_config['mxn']['symbol_grp']) ; 
          if ('.' == substr($this->mxn, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->mxn, 1)))
              {
                  $this->mxn = '';
              }
              else
              {
                  $this->mxn = '0' . $this->mxn;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->mxn != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->mxn, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->mxn, -1))
              {
                  $iTestSize++;
                  $this->mxn = '-' . substr($this->mxn, 0, -1);
              }
              if (strlen($this->mxn) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Moneda (MXN): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['mxn']))
                  {
                      $Campos_Erros['mxn'] = array();
                  }
                  $Campos_Erros['mxn'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['mxn']) || !is_array($this->NM_ajax_info['errList']['mxn']))
                  {
                      $this->NM_ajax_info['errList']['mxn'] = array();
                  }
                  $this->NM_ajax_info['errList']['mxn'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->mxn, 18, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Moneda (MXN); " ; 
                  if (!isset($Campos_Erros['mxn']))
                  {
                      $Campos_Erros['mxn'] = array();
                  }
                  $Campos_Erros['mxn'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['mxn']) || !is_array($this->NM_ajax_info['errList']['mxn']))
                  {
                      $this->NM_ajax_info['errList']['mxn'] = array();
                  }
                  $this->NM_ajax_info['errList']['mxn'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'mxn';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_mxn

    function ValidateField_usd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->usd === "" || is_null($this->usd))  
      { 
          $this->usd = 0;
          $this->sc_force_zero[] = 'usd';
      } 
      if (!empty($this->field_config['usd']['symbol_dec']))
      {
          $this->sc_remove_currency($this->usd, $this->field_config['usd']['symbol_dec'], $this->field_config['usd']['symbol_grp'], $this->field_config['usd']['symbol_mon']); 
          nm_limpa_valor($this->usd, $this->field_config['usd']['symbol_dec'], $this->field_config['usd']['symbol_grp']) ; 
          if ('.' == substr($this->usd, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->usd, 1)))
              {
                  $this->usd = '';
              }
              else
              {
                  $this->usd = '0' . $this->usd;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->usd != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->usd, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->usd, -1))
              {
                  $iTestSize++;
                  $this->usd = '-' . substr($this->usd, 0, -1);
              }
              if (strlen($this->usd) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Dolares (USD): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['usd']))
                  {
                      $Campos_Erros['usd'] = array();
                  }
                  $Campos_Erros['usd'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['usd']) || !is_array($this->NM_ajax_info['errList']['usd']))
                  {
                      $this->NM_ajax_info['errList']['usd'] = array();
                  }
                  $this->NM_ajax_info['errList']['usd'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->usd, 18, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Dolares (USD); " ; 
                  if (!isset($Campos_Erros['usd']))
                  {
                      $Campos_Erros['usd'] = array();
                  }
                  $Campos_Erros['usd'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['usd']) || !is_array($this->NM_ajax_info['errList']['usd']))
                  {
                      $this->NM_ajax_info['errList']['usd'] = array();
                  }
                  $this->NM_ajax_info['errList']['usd'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'usd';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_usd

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
              $iTestSize = 20;
              if ('-' == substr($this->cantidadmxn, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->cantidadmxn, -1))
              {
                  $iTestSize++;
                  $this->cantidadmxn = '-' . substr($this->cantidadmxn, 0, -1);
              }
              if (strlen($this->cantidadmxn) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad Folios GE MXN: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->cantidadmxn, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad Folios GE MXN; " ; 
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
              $iTestSize = 20;
              if ('-' == substr($this->cantidadusd, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->cantidadusd, -1))
              {
                  $iTestSize++;
                  $this->cantidadusd = '-' . substr($this->cantidadusd, 0, -1);
              }
              if (strlen($this->cantidadusd) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad Folios GE USD: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->cantidadusd, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad Folios GE USD; " ; 
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
      if ($this->importemxn === "" || is_null($this->importemxn))  
      { 
          $this->importemxn = 0;
          $this->sc_force_zero[] = 'importemxn';
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
              $iTestSize = 21;
              if ('-' == substr($this->importemxn, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importemxn, -1))
              {
                  $iTestSize++;
                  $this->importemxn = '-' . substr($this->importemxn, 0, -1);
              }
              if (strlen($this->importemxn) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe GE MXN: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->importemxn, 18, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe GE MXN; " ; 
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
      if ($this->importeusd === "" || is_null($this->importeusd))  
      { 
          $this->importeusd = 0;
          $this->sc_force_zero[] = 'importeusd';
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
              $iTestSize = 21;
              if ('-' == substr($this->importeusd, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeusd, -1))
              {
                  $iTestSize++;
                  $this->importeusd = '-' . substr($this->importeusd, 0, -1);
              }
              if (strlen($this->importeusd) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe GE USD: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->importeusd, 18, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe GE USD; " ; 
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
              $iTestSize = 20;
              if ('-' == substr($this->folioinicialcr, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->folioinicialcr, -1))
              {
                  $iTestSize++;
                  $this->folioinicialcr = '-' . substr($this->folioinicialcr, 0, -1);
              }
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
              if ($teste_validade->Valor($this->folioinicialcr, 20, 0, 0, 0, "S") == false)  
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
              $iTestSize = 20;
              if ('-' == substr($this->foliofinalcr, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->foliofinalcr, -1))
              {
                  $iTestSize++;
                  $this->foliofinalcr = '-' . substr($this->foliofinalcr, 0, -1);
              }
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
              if ($teste_validade->Valor($this->foliofinalcr, 20, 0, 0, 0, "S") == false)  
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
              $iTestSize = 20;
              if ('-' == substr($this->folioinicialeap, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->folioinicialeap, -1))
              {
                  $iTestSize++;
                  $this->folioinicialeap = '-' . substr($this->folioinicialeap, 0, -1);
              }
              if (strlen($this->folioinicialeap) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Secuencial inicial: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->folioinicialeap, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Secuencial inicial; " ; 
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
              $iTestSize = 20;
              if ('-' == substr($this->foliofinaleap, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->foliofinaleap, -1))
              {
                  $iTestSize++;
                  $this->foliofinaleap = '-' . substr($this->foliofinaleap, 0, -1);
              }
              if (strlen($this->foliofinaleap) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Secuencial Final: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->foliofinaleap, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Secuencial Final; " ; 
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

    function ValidateField_folioinir1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->folioinir1 === "" || is_null($this->folioinir1))  
      { 
          $this->folioinir1 = 0;
          $this->sc_force_zero[] = 'folioinir1';
      } 
      nm_limpa_numero($this->folioinir1, $this->field_config['folioinir1']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->folioinir1 != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->folioinir1, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->folioinir1, -1))
              {
                  $iTestSize++;
                  $this->folioinir1 = '-' . substr($this->folioinir1, 0, -1);
              }
              if (strlen($this->folioinir1) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 1: Folio Inicial: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['folioinir1']))
                  {
                      $Campos_Erros['folioinir1'] = array();
                  }
                  $Campos_Erros['folioinir1'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['folioinir1']) || !is_array($this->NM_ajax_info['errList']['folioinir1']))
                  {
                      $this->NM_ajax_info['errList']['folioinir1'] = array();
                  }
                  $this->NM_ajax_info['errList']['folioinir1'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->folioinir1, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 1: Folio Inicial; " ; 
                  if (!isset($Campos_Erros['folioinir1']))
                  {
                      $Campos_Erros['folioinir1'] = array();
                  }
                  $Campos_Erros['folioinir1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['folioinir1']) || !is_array($this->NM_ajax_info['errList']['folioinir1']))
                  {
                      $this->NM_ajax_info['errList']['folioinir1'] = array();
                  }
                  $this->NM_ajax_info['errList']['folioinir1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'folioinir1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_folioinir1

    function ValidateField_foliofinr1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->foliofinr1 === "" || is_null($this->foliofinr1))  
      { 
          $this->foliofinr1 = 0;
          $this->sc_force_zero[] = 'foliofinr1';
      } 
      nm_limpa_numero($this->foliofinr1, $this->field_config['foliofinr1']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->foliofinr1 != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->foliofinr1, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->foliofinr1, -1))
              {
                  $iTestSize++;
                  $this->foliofinr1 = '-' . substr($this->foliofinr1, 0, -1);
              }
              if (strlen($this->foliofinr1) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 1: Folio Final: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['foliofinr1']))
                  {
                      $Campos_Erros['foliofinr1'] = array();
                  }
                  $Campos_Erros['foliofinr1'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['foliofinr1']) || !is_array($this->NM_ajax_info['errList']['foliofinr1']))
                  {
                      $this->NM_ajax_info['errList']['foliofinr1'] = array();
                  }
                  $this->NM_ajax_info['errList']['foliofinr1'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->foliofinr1, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 1: Folio Final; " ; 
                  if (!isset($Campos_Erros['foliofinr1']))
                  {
                      $Campos_Erros['foliofinr1'] = array();
                  }
                  $Campos_Erros['foliofinr1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['foliofinr1']) || !is_array($this->NM_ajax_info['errList']['foliofinr1']))
                  {
                      $this->NM_ajax_info['errList']['foliofinr1'] = array();
                  }
                  $this->NM_ajax_info['errList']['foliofinr1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'foliofinr1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_foliofinr1

    function ValidateField_folioinir2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->folioinir2 === "" || is_null($this->folioinir2))  
      { 
          $this->folioinir2 = 0;
          $this->sc_force_zero[] = 'folioinir2';
      } 
      nm_limpa_numero($this->folioinir2, $this->field_config['folioinir2']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->folioinir2 != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->folioinir2, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->folioinir2, -1))
              {
                  $iTestSize++;
                  $this->folioinir2 = '-' . substr($this->folioinir2, 0, -1);
              }
              if (strlen($this->folioinir2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 2: Folio Inicial: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['folioinir2']))
                  {
                      $Campos_Erros['folioinir2'] = array();
                  }
                  $Campos_Erros['folioinir2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['folioinir2']) || !is_array($this->NM_ajax_info['errList']['folioinir2']))
                  {
                      $this->NM_ajax_info['errList']['folioinir2'] = array();
                  }
                  $this->NM_ajax_info['errList']['folioinir2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->folioinir2, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 2: Folio Inicial; " ; 
                  if (!isset($Campos_Erros['folioinir2']))
                  {
                      $Campos_Erros['folioinir2'] = array();
                  }
                  $Campos_Erros['folioinir2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['folioinir2']) || !is_array($this->NM_ajax_info['errList']['folioinir2']))
                  {
                      $this->NM_ajax_info['errList']['folioinir2'] = array();
                  }
                  $this->NM_ajax_info['errList']['folioinir2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'folioinir2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_folioinir2

    function ValidateField_foliofinr2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->foliofinr2 === "" || is_null($this->foliofinr2))  
      { 
          $this->foliofinr2 = 0;
          $this->sc_force_zero[] = 'foliofinr2';
      } 
      nm_limpa_numero($this->foliofinr2, $this->field_config['foliofinr2']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->foliofinr2 != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->foliofinr2, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->foliofinr2, -1))
              {
                  $iTestSize++;
                  $this->foliofinr2 = '-' . substr($this->foliofinr2, 0, -1);
              }
              if (strlen($this->foliofinr2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 2: Folio Final: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['foliofinr2']))
                  {
                      $Campos_Erros['foliofinr2'] = array();
                  }
                  $Campos_Erros['foliofinr2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['foliofinr2']) || !is_array($this->NM_ajax_info['errList']['foliofinr2']))
                  {
                      $this->NM_ajax_info['errList']['foliofinr2'] = array();
                  }
                  $this->NM_ajax_info['errList']['foliofinr2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->foliofinr2, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 2: Folio Final; " ; 
                  if (!isset($Campos_Erros['foliofinr2']))
                  {
                      $Campos_Erros['foliofinr2'] = array();
                  }
                  $Campos_Erros['foliofinr2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['foliofinr2']) || !is_array($this->NM_ajax_info['errList']['foliofinr2']))
                  {
                      $this->NM_ajax_info['errList']['foliofinr2'] = array();
                  }
                  $this->NM_ajax_info['errList']['foliofinr2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'foliofinr2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_foliofinr2

    function ValidateField_folioinir3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->folioinir3 === "" || is_null($this->folioinir3))  
      { 
          $this->folioinir3 = 0;
          $this->sc_force_zero[] = 'folioinir3';
      } 
      nm_limpa_numero($this->folioinir3, $this->field_config['folioinir3']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->folioinir3 != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->folioinir3, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->folioinir3, -1))
              {
                  $iTestSize++;
                  $this->folioinir3 = '-' . substr($this->folioinir3, 0, -1);
              }
              if (strlen($this->folioinir3) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 3: Folio Inicial: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['folioinir3']))
                  {
                      $Campos_Erros['folioinir3'] = array();
                  }
                  $Campos_Erros['folioinir3'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['folioinir3']) || !is_array($this->NM_ajax_info['errList']['folioinir3']))
                  {
                      $this->NM_ajax_info['errList']['folioinir3'] = array();
                  }
                  $this->NM_ajax_info['errList']['folioinir3'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->folioinir3, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 3: Folio Inicial; " ; 
                  if (!isset($Campos_Erros['folioinir3']))
                  {
                      $Campos_Erros['folioinir3'] = array();
                  }
                  $Campos_Erros['folioinir3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['folioinir3']) || !is_array($this->NM_ajax_info['errList']['folioinir3']))
                  {
                      $this->NM_ajax_info['errList']['folioinir3'] = array();
                  }
                  $this->NM_ajax_info['errList']['folioinir3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'folioinir3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_folioinir3

    function ValidateField_foliofinr3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->foliofinr3 === "" || is_null($this->foliofinr3))  
      { 
          $this->foliofinr3 = 0;
          $this->sc_force_zero[] = 'foliofinr3';
      } 
      nm_limpa_numero($this->foliofinr3, $this->field_config['foliofinr3']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->foliofinr3 != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->foliofinr3, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->foliofinr3, -1))
              {
                  $iTestSize++;
                  $this->foliofinr3 = '-' . substr($this->foliofinr3, 0, -1);
              }
              if (strlen($this->foliofinr3) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 3: Folio Final: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['foliofinr3']))
                  {
                      $Campos_Erros['foliofinr3'] = array();
                  }
                  $Campos_Erros['foliofinr3'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['foliofinr3']) || !is_array($this->NM_ajax_info['errList']['foliofinr3']))
                  {
                      $this->NM_ajax_info['errList']['foliofinr3'] = array();
                  }
                  $this->NM_ajax_info['errList']['foliofinr3'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->foliofinr3, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rollo 3: Folio Final; " ; 
                  if (!isset($Campos_Erros['foliofinr3']))
                  {
                      $Campos_Erros['foliofinr3'] = array();
                  }
                  $Campos_Erros['foliofinr3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['foliofinr3']) || !is_array($this->NM_ajax_info['errList']['foliofinr3']))
                  {
                      $this->NM_ajax_info['errList']['foliofinr3'] = array();
                  }
                  $this->NM_ajax_info['errList']['foliofinr3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'foliofinr3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_foliofinr3

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
    $this->nmgp_dados_form['mxn'] = $this->mxn;
    $this->nmgp_dados_form['usd'] = $this->usd;
    $this->nmgp_dados_form['cantidadmxn'] = $this->cantidadmxn;
    $this->nmgp_dados_form['cantidadusd'] = $this->cantidadusd;
    $this->nmgp_dados_form['importemxn'] = $this->importemxn;
    $this->nmgp_dados_form['importeusd'] = $this->importeusd;
    $this->nmgp_dados_form['folioinicialcr'] = $this->folioinicialcr;
    $this->nmgp_dados_form['foliofinalcr'] = $this->foliofinalcr;
    $this->nmgp_dados_form['folioinicialeap'] = $this->folioinicialeap;
    $this->nmgp_dados_form['foliofinaleap'] = $this->foliofinaleap;
    $this->nmgp_dados_form['folioinir1'] = $this->folioinir1;
    $this->nmgp_dados_form['foliofinr1'] = $this->foliofinr1;
    $this->nmgp_dados_form['folioinir2'] = $this->folioinir2;
    $this->nmgp_dados_form['foliofinr2'] = $this->foliofinr2;
    $this->nmgp_dados_form['folioinir3'] = $this->folioinir3;
    $this->nmgp_dados_form['foliofinr3'] = $this->foliofinr3;
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['mxn'] = $this->mxn;
      if (!empty($this->field_config['mxn']['symbol_dec']))
      {
         $this->sc_remove_currency($this->mxn, $this->field_config['mxn']['symbol_dec'], $this->field_config['mxn']['symbol_grp'], $this->field_config['mxn']['symbol_mon']);
         nm_limpa_valor($this->mxn, $this->field_config['mxn']['symbol_dec'], $this->field_config['mxn']['symbol_grp']);
      }
      $this->Before_unformat['usd'] = $this->usd;
      if (!empty($this->field_config['usd']['symbol_dec']))
      {
         $this->sc_remove_currency($this->usd, $this->field_config['usd']['symbol_dec'], $this->field_config['usd']['symbol_grp'], $this->field_config['usd']['symbol_mon']);
         nm_limpa_valor($this->usd, $this->field_config['usd']['symbol_dec'], $this->field_config['usd']['symbol_grp']);
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
      $this->Before_unformat['folioinir1'] = $this->folioinir1;
      nm_limpa_numero($this->folioinir1, $this->field_config['folioinir1']['symbol_grp']) ; 
      $this->Before_unformat['foliofinr1'] = $this->foliofinr1;
      nm_limpa_numero($this->foliofinr1, $this->field_config['foliofinr1']['symbol_grp']) ; 
      $this->Before_unformat['folioinir2'] = $this->folioinir2;
      nm_limpa_numero($this->folioinir2, $this->field_config['folioinir2']['symbol_grp']) ; 
      $this->Before_unformat['foliofinr2'] = $this->foliofinr2;
      nm_limpa_numero($this->foliofinr2, $this->field_config['foliofinr2']['symbol_grp']) ; 
      $this->Before_unformat['folioinir3'] = $this->folioinir3;
      nm_limpa_numero($this->folioinir3, $this->field_config['folioinir3']['symbol_grp']) ; 
      $this->Before_unformat['foliofinr3'] = $this->foliofinr3;
      nm_limpa_numero($this->foliofinr3, $this->field_config['foliofinr3']['symbol_grp']) ; 
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
      if ($Nome_Campo == "mxn")
      {
          if (!empty($this->field_config['mxn']['symbol_dec']))
          {
             $this->sc_remove_currency($this->mxn, $this->field_config['mxn']['symbol_dec'], $this->field_config['mxn']['symbol_grp'], $this->field_config['mxn']['symbol_mon']);
             nm_limpa_valor($this->mxn, $this->field_config['mxn']['symbol_dec'], $this->field_config['mxn']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "usd")
      {
          if (!empty($this->field_config['usd']['symbol_dec']))
          {
             $this->sc_remove_currency($this->usd, $this->field_config['usd']['symbol_dec'], $this->field_config['usd']['symbol_grp'], $this->field_config['usd']['symbol_mon']);
             nm_limpa_valor($this->usd, $this->field_config['usd']['symbol_dec'], $this->field_config['usd']['symbol_grp']);
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
      if ($Nome_Campo == "folioinir1")
      {
          nm_limpa_numero($this->folioinir1, $this->field_config['folioinir1']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "foliofinr1")
      {
          nm_limpa_numero($this->foliofinr1, $this->field_config['foliofinr1']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "folioinir2")
      {
          nm_limpa_numero($this->folioinir2, $this->field_config['folioinir2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "foliofinr2")
      {
          nm_limpa_numero($this->foliofinr2, $this->field_config['foliofinr2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "folioinir3")
      {
          nm_limpa_numero($this->folioinir3, $this->field_config['folioinir3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "foliofinr3")
      {
          nm_limpa_numero($this->foliofinr3, $this->field_config['foliofinr3']['symbol_grp']) ; 
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
      if ('' !== $this->mxn || (!empty($format_fields) && isset($format_fields['mxn'])))
      {
          nmgp_Form_Num_Val($this->mxn, $this->field_config['mxn']['symbol_grp'], $this->field_config['mxn']['symbol_dec'], "2", "S", $this->field_config['mxn']['format_neg'], "", "", "-", $this->field_config['mxn']['symbol_fmt']) ; 
      }
      if ('' !== $this->usd || (!empty($format_fields) && isset($format_fields['usd'])))
      {
          nmgp_Form_Num_Val($this->usd, $this->field_config['usd']['symbol_grp'], $this->field_config['usd']['symbol_dec'], "2", "S", $this->field_config['usd']['format_neg'], "", "", "-", $this->field_config['usd']['symbol_fmt']) ; 
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
      if ('' !== $this->folioinir1 || (!empty($format_fields) && isset($format_fields['folioinir1'])))
      {
          nmgp_Form_Num_Val($this->folioinir1, $this->field_config['folioinir1']['symbol_grp'], $this->field_config['folioinir1']['symbol_dec'], "0", "S", $this->field_config['folioinir1']['format_neg'], "", "", "-", $this->field_config['folioinir1']['symbol_fmt']) ; 
      }
      if ('' !== $this->foliofinr1 || (!empty($format_fields) && isset($format_fields['foliofinr1'])))
      {
          nmgp_Form_Num_Val($this->foliofinr1, $this->field_config['foliofinr1']['symbol_grp'], $this->field_config['foliofinr1']['symbol_dec'], "0", "S", $this->field_config['foliofinr1']['format_neg'], "", "", "-", $this->field_config['foliofinr1']['symbol_fmt']) ; 
      }
      if ('' !== $this->folioinir2 || (!empty($format_fields) && isset($format_fields['folioinir2'])))
      {
          nmgp_Form_Num_Val($this->folioinir2, $this->field_config['folioinir2']['symbol_grp'], $this->field_config['folioinir2']['symbol_dec'], "0", "S", $this->field_config['folioinir2']['format_neg'], "", "", "-", $this->field_config['folioinir2']['symbol_fmt']) ; 
      }
      if ('' !== $this->foliofinr2 || (!empty($format_fields) && isset($format_fields['foliofinr2'])))
      {
          nmgp_Form_Num_Val($this->foliofinr2, $this->field_config['foliofinr2']['symbol_grp'], $this->field_config['foliofinr2']['symbol_dec'], "0", "S", $this->field_config['foliofinr2']['format_neg'], "", "", "-", $this->field_config['foliofinr2']['symbol_fmt']) ; 
      }
      if ('' !== $this->folioinir3 || (!empty($format_fields) && isset($format_fields['folioinir3'])))
      {
          nmgp_Form_Num_Val($this->folioinir3, $this->field_config['folioinir3']['symbol_grp'], $this->field_config['folioinir3']['symbol_dec'], "0", "S", $this->field_config['folioinir3']['format_neg'], "", "", "-", $this->field_config['folioinir3']['symbol_fmt']) ; 
      }
      if ('' !== $this->foliofinr3 || (!empty($format_fields) && isset($format_fields['foliofinr3'])))
      {
          nmgp_Form_Num_Val($this->foliofinr3, $this->field_config['foliofinr3']['symbol_grp'], $this->field_config['foliofinr3']['symbol_dec'], "0", "S", $this->field_config['foliofinr3']['format_neg'], "", "", "-", $this->field_config['foliofinr3']['symbol_fmt']) ; 
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

   function ajax_return_values()
   {
          $this->ajax_return_values_mxn();
          $this->ajax_return_values_usd();
          $this->ajax_return_values_cantidadmxn();
          $this->ajax_return_values_cantidadusd();
          $this->ajax_return_values_importemxn();
          $this->ajax_return_values_importeusd();
          $this->ajax_return_values_folioinicialcr();
          $this->ajax_return_values_foliofinalcr();
          $this->ajax_return_values_folioinicialeap();
          $this->ajax_return_values_foliofinaleap();
          $this->ajax_return_values_folioinir1();
          $this->ajax_return_values_foliofinr1();
          $this->ajax_return_values_folioinir2();
          $this->ajax_return_values_foliofinr2();
          $this->ajax_return_values_folioinir3();
          $this->ajax_return_values_foliofinr3();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- mxn
   function ajax_return_values_mxn($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mxn", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->mxn);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['mxn'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- usd
   function ajax_return_values_usd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("usd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->usd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['usd'] = array(
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

          //----- folioinir1
   function ajax_return_values_folioinir1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("folioinir1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->folioinir1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['folioinir1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- foliofinr1
   function ajax_return_values_foliofinr1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("foliofinr1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->foliofinr1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['foliofinr1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- folioinir2
   function ajax_return_values_folioinir2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("folioinir2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->folioinir2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['folioinir2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- foliofinr2
   function ajax_return_values_foliofinr2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("foliofinr2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->foliofinr2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['foliofinr2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- folioinir3
   function ajax_return_values_folioinir3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("folioinir3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->folioinir3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['folioinir3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- foliofinr3
   function ajax_return_values_foliofinr3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("foliofinr3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->foliofinr3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['foliofinr3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['upload_dir'][$fieldName][] = $newName;
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              control_detalleturno_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    $this->nm_formatar_campos();
        $this->initFormPages();
    include_once("control_detalleturno_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['csrf_token'];
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
       $nmgp_saida_form = "control_detalleturno_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "control_detalleturno_mob_fim.php";
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
       control_detalleturno_mob_pack_ajax_response();
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
   <link rel="stylesheet" type="text/css" href="../_lib/css/peaje_module_ui.css?v=20260913-palette" />
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['masterValue']);
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
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           control_detalleturno_mob_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       }
       control_detalleturno_mob_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
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
    <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
   <link rel="stylesheet" type="text/css" href="../_lib/css/peaje_module_ui.css?v=20260913-palette" />
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "sigue":
                return array("sc_sigue_top.");
                break;
            case "mas":
                return array("sc_mas_top.");
                break;
            case "ok":
                return array("sub_form_b.sc-unique-btn-1", "sub_form_b.sc-unique-btn-4");
                break;
            case "help":
                return array("sc_b_hlp_b");
                break;
            case "exit":
                return array("Bsair_b.sc-unique-btn-2", "Bsair_b.sc-unique-btn-5", "Bsair_b.sc-unique-btn-3", "Bsair_b.sc-unique-btn-6");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php echo "Preliquidacion Turno / Carril" ?></div>
    <div class="scFormHeaderFont" style="float: right;"></div>
</div>
    </td></tr>
<?php
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno_mob']['ordem_ord'] == " desc") {
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
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
