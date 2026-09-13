<?php
//
class control_importe_total_mob_apl
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
   var $fld_complementa;
   var $leyenda;
   var $iden;
   var $fechacierre;
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
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['fld_complementa']))
          {
              $this->fld_complementa = $this->NM_ajax_info['param']['fld_complementa'];
          }
          if (isset($this->NM_ajax_info['param']['leyenda']))
          {
              $this->leyenda = $this->NM_ajax_info['param']['leyenda'];
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
      if (isset($this->identificador) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['identificador'] = $this->identificador;
      }
      if (isset($_POST["identificador"]) && isset($this->identificador)) 
      {
          $_SESSION['identificador'] = $this->identificador;
      }
      if (isset($_GET["identificador"]) && isset($this->identificador)) 
      {
          $_SESSION['identificador'] = $this->identificador;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['embutida_parms']);
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
                 nm_limpa_str_control_importe_total_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->identificador)) 
          {
              $_SESSION['identificador'] = $this->identificador;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->identificador)) 
          {
              $_SESSION['identificador'] = $this->identificador;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new control_importe_total_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['control_importe_total_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_importe_total_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_importe_total_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_importe_total_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_importe_total_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('control_importe_total_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_importe_total_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "control_importe_total_mob")
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



      $_SESSION['scriptcase']['error_icon']['control_importe_total_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['control_importe_total_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_importe_total_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['control_importe_total_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['control_importe_total_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dados_form'];
          if (!isset($this->iden)){$this->iden = $this->nmgp_dados_form['iden'];} 
          if (!isset($this->fechacierre)){$this->fechacierre = $this->nmgp_dados_form['fechacierre'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("control_importe_total_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'control_importe_total_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'control_importe_total_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'control_importe_total/control_importe_total_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "control_importe_total_mob_erro.class.php"); 
      }
      $this->Erro      = new control_importe_total_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['control_importe_total_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $old_dir = getcwd();
      chdir($this->Ini->path_third . "/tcpdf/");
      include_once("tcpdf.php");
      chdir($old_dir);
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['control_importe_total_mob']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['control_importe_total_mob']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- fld_complementa
      $this->field_config['fld_complementa']               = array();
      $this->field_config['fld_complementa']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['fld_complementa']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['fld_complementa']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['fld_complementa']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['fld_complementa']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['fld_complementa']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- iden
      $this->field_config['iden']               = array();
      $this->field_config['iden']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['iden']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['iden']['symbol_dec'] = '';
      $this->field_config['iden']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['iden']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['Gera_log_access'] = false;
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
          if ('validate_leyenda' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'leyenda');
          }
          if ('validate_fld_complementa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fld_complementa');
          }
          control_importe_total_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['inline_form_seq'] = $this->sc_seq_row;
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
              control_importe_total_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_importe_total_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
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
          $_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_importe_total_mob_pack_ajax_response();
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
          $this->fld_complementa = "" ;  
          $this->leyenda = "" ;  
          $this->iden = "" ;  
          $this->fechacierre = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dados_form'] as $NM_campo => $NM_valor)
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['campos']))
              { 
                  $leyenda = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['campos'][0]; 
                  $fld_complementa = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['campos'][1]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['campos'][0] = $this->leyenda; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['campos'][1] = $this->fld_complementa; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("control_importe_total_mob", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("control_importe_total_mob_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              control_importe_total_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "control_importe_total_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob'][$path_doc_md5][1] = $Zip_name;
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
<form name="Fdown" method="get" action="control_importe_total_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="control_importe_total_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="control_importe_total_mob.php" target="_self" style="display: none"> 
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['SC_sep_date1'];
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
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'control_importe_total_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'control_importe_total_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'control_importe_total_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               control_importe_total_mob_pack_ajax_response();
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
           case 'leyenda':
               return " ";
               break;
           case 'fld_complementa':
               return "Monto<br>Complementario";
               break;
           case 'iden':
               return "iden";
               break;
           case 'fechacierre':
               return "fechacierre";
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
              if (!isset($this->NM_ajax_info['errList']['geral_control_importe_total_mob']) || !is_array($this->NM_ajax_info['errList']['geral_control_importe_total_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_control_importe_total_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_control_importe_total_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'leyenda' == $filtro)) || (is_array($filtro) && in_array('leyenda', $filtro)))
        $this->ValidateField_leyenda($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fld_complementa' == $filtro)) || (is_array($filtro) && in_array('fld_complementa', $filtro)))
        $this->ValidateField_fld_complementa($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  

$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off'; 
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

      if (empty($Campos_Crit) && empty($Campos_Falta) && empty($this->Campos_Mens_erro))
      {
          if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
          {
              $_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fld_complementa = $this->fld_complementa;
}
  
     $nm_select ="UPDATE detalleturno SET Entregado = ".$this->fld_complementa ." WHERE FolioCierre = '".$this->iden ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                control_importe_total_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


      $this->NM_commit_db();
      $this->NM_close_db();
echo "<script type=\"text/javascript\">";
echo "setTimeout(function() { window.location = \"" . $this->nmgp_url_saida . "?script_case_init=" . $this->form_encode_input($this->Ini->sc_page) . "\"; }, 500);";
echo "</script>";
exit;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fld_complementa != $this->fld_complementa || (isset($bFlagRead_fld_complementa) && $bFlagRead_fld_complementa)))
    {
        $this->ajax_return_values_fld_complementa(true);
    }
}
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_leyenda(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->leyenda) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "  " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['leyenda']))
              {
                  $Campos_Erros['leyenda'] = array();
              }
              $Campos_Erros['leyenda'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['leyenda']) || !is_array($this->NM_ajax_info['errList']['leyenda']))
              {
                  $this->NM_ajax_info['errList']['leyenda'] = array();
              }
              $this->NM_ajax_info['errList']['leyenda'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'leyenda';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_leyenda

    function ValidateField_fld_complementa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fld_complementa === "" || is_null($this->fld_complementa))  
      { 
          $this->fld_complementa = 0;
          $this->sc_force_zero[] = 'fld_complementa';
      } 
      if (!empty($this->field_config['fld_complementa']['symbol_dec']))
      {
          $this->sc_remove_currency($this->fld_complementa, $this->field_config['fld_complementa']['symbol_dec'], $this->field_config['fld_complementa']['symbol_grp'], $this->field_config['fld_complementa']['symbol_mon']); 
          nm_limpa_valor($this->fld_complementa, $this->field_config['fld_complementa']['symbol_dec'], $this->field_config['fld_complementa']['symbol_grp']) ; 
          if ('.' == substr($this->fld_complementa, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->fld_complementa, 1)))
              {
                  $this->fld_complementa = '';
              }
              else
              {
                  $this->fld_complementa = '0' . $this->fld_complementa;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->fld_complementa != '')  
          { 
              $iTestSize = 21;
              if (strlen($this->fld_complementa) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Monto<br>Complementario: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['fld_complementa']))
                  {
                      $Campos_Erros['fld_complementa'] = array();
                  }
                  $Campos_Erros['fld_complementa'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['fld_complementa']) || !is_array($this->NM_ajax_info['errList']['fld_complementa']))
                  {
                      $this->NM_ajax_info['errList']['fld_complementa'] = array();
                  }
                  $this->NM_ajax_info['errList']['fld_complementa'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->fld_complementa, 18, 2, -0, 1.0E+20, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Monto<br>Complementario; " ; 
                  if (!isset($Campos_Erros['fld_complementa']))
                  {
                      $Campos_Erros['fld_complementa'] = array();
                  }
                  $Campos_Erros['fld_complementa'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fld_complementa']) || !is_array($this->NM_ajax_info['errList']['fld_complementa']))
                  {
                      $this->NM_ajax_info['errList']['fld_complementa'] = array();
                  }
                  $this->NM_ajax_info['errList']['fld_complementa'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fld_complementa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fld_complementa

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
    $this->nmgp_dados_form['leyenda'] = $this->leyenda;
    $this->nmgp_dados_form['fld_complementa'] = $this->fld_complementa;
    $this->nmgp_dados_form['iden'] = $this->iden;
    $this->nmgp_dados_form['fechacierre'] = $this->fechacierre;
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['fld_complementa'] = $this->fld_complementa;
      if (!empty($this->field_config['fld_complementa']['symbol_dec']))
      {
         $this->sc_remove_currency($this->fld_complementa, $this->field_config['fld_complementa']['symbol_dec'], $this->field_config['fld_complementa']['symbol_grp'], $this->field_config['fld_complementa']['symbol_mon']);
         nm_limpa_valor($this->fld_complementa, $this->field_config['fld_complementa']['symbol_dec'], $this->field_config['fld_complementa']['symbol_grp']);
      }
      $this->Before_unformat['iden'] = $this->iden;
      nm_limpa_numero($this->iden, $this->field_config['iden']['symbol_grp']) ; 
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
      if ($Nome_Campo == "fld_complementa")
      {
          if (!empty($this->field_config['fld_complementa']['symbol_dec']))
          {
             $this->sc_remove_currency($this->fld_complementa, $this->field_config['fld_complementa']['symbol_dec'], $this->field_config['fld_complementa']['symbol_grp'], $this->field_config['fld_complementa']['symbol_mon']);
             nm_limpa_valor($this->fld_complementa, $this->field_config['fld_complementa']['symbol_dec'], $this->field_config['fld_complementa']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "iden")
      {
          nm_limpa_numero($this->iden, $this->field_config['iden']['symbol_grp']) ; 
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
      if ('' !== $this->fld_complementa || (!empty($format_fields) && isset($format_fields['fld_complementa'])))
      {
          nmgp_Form_Num_Val($this->fld_complementa, $this->field_config['fld_complementa']['symbol_grp'], $this->field_config['fld_complementa']['symbol_dec'], "2", "S", $this->field_config['fld_complementa']['format_neg'], "", "", "-", $this->field_config['fld_complementa']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['fld_complementa']['symbol_mon'];
          $this->sc_add_currency($this->fld_complementa, $sMonSymb, $this->field_config['fld_complementa']['format_pos']); 
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
          $this->ajax_return_values_leyenda();
          $this->ajax_return_values_fld_complementa();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- leyenda
   function ajax_return_values_leyenda($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("leyenda", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->leyenda);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['leyenda'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("leyenda", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- fld_complementa
   function ajax_return_values_fld_complementa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fld_complementa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fld_complementa);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fld_complementa'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['upload_dir'][$fieldName][] = $newName;
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
function SC_function_0()
{
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  
?>
<script>
top.opener.location.reload();
</script>
<?php


$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function ResumenPre($ruta, $FolioCierre)
{
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  
;
$identificador = $FolioCierre;
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('KZ');
$pdf->SetTitle('LIQUIDACIÓN DE CAJERO-RECEPTOR');
$pdf->SetSubject('Tránsito Vehicular');
$pdf->SetKeywords('Aforo, PDF, Liquidacion');
$pdf->AddPage('P','LETTER'); 

$style = <<<EOD
<style>
	table.estilo1 {
		border: 1px solid black;
		font-size:6px
		align="right" 
	}
	table.roundedCorners {
		border: 1px solid Black;
		border-radius: 13px;
		border-spacing: 0;
		border-collapse: collapse;
	}
	table.roundedCorners td,
	table.roundedCorners th {
		border: 0.5px solid gray;
		font-size:7px;
		cellpadding: 15;
		padding: 10px;
	}
	table.roundedCorners tr:last-child > td {
		border-bottom: solid;
	}
</style>
EOD;

$styleComparativo = <<<EOD
<style>
	table.titulos {
		font-size:6px
		align="right" 	
	}
	table.roundedCorners {
		border: 1px solid Black;
		border-radius: 13px;
		border-spacing: 0;
		border-collapse: collapse;
	}
	table.roundedCorners td,
		table.roundedCorners th {
		border: 0.5px solid gray;
		font-size:5.5px;
		cellpadding: 15;
		padding: 10px;
	}
	table.roundedCorners tr:last-child > td {
		border-bottom: solid;
	}
</style>
EOD;

$tblpre = $this->forma_pre($identificador);
$nombre_archivo = $tblpre[1];
$tbl = $tblpre[0];
$pdf->writeHTML($style . $tbl, true, false, false, false, '');


$js = 'print(true);';
if (!file_exists($ruta)) {
    		mkdir($ruta, 0777, true);
		}
$pdf->Output($ruta.$nombre_archivo.'.pdf', 'F');

$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function rv_logAcceso ($accion, $key) {
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sm_global_login)) {$this->sc_temp_sm_global_login = (isset($_SESSION['sm_global_login'])) ? $_SESSION['sm_global_login'] : "";}
   
$aplicacion = $this->Ini->nm_cod_apl; 
$tablaLog = $this->Ini->nm_tabela; 
$fechaLog = date('Y-m-d H:i:s');  
$loginLog = $this->sc_temp_sm_global_login; 
$ipLog = $_SERVER['REMOTE_ADDR'];  

     $nm_select ="INSERT INTO sec_application_logs (Application_Name, Date_Time, Login, Ip_User, Action_Held, tabla, llave)                VALUES ('$aplicacion', '$fechaLog', '$loginLog', '$ipLog', '$accion', '$tablaLog', '$key')"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                control_importe_total_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
if (isset($this->sc_temp_sm_global_login)) { $_SESSION['sm_global_login'] = $this->sc_temp_sm_global_login;}
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function rv_revisaBotones() {
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sm_nivel)) {$this->sc_temp_sm_nivel = (isset($_SESSION['sm_nivel'])) ? $_SESSION['sm_nivel'] : "";}
   
$parm = (strpos($this->sc_temp_sm_nivel, '1') === false ? 'off' : 'on'); $this->NM_ajax_info['buttonDisplay']['filter'] = $this->nmgp_botoes["filter"] = "$parm";; 
$parm = (strpos($this->sc_temp_sm_nivel, '2') === false ? 'off' : 'on'); $this->NM_ajax_info['buttonDisplay']['sel_col'] = $this->nmgp_botoes["sel_col"] = "$parm";; 
$parm = (strpos($this->sc_temp_sm_nivel, '3') === false ? 'off' : 'on'); $this->NM_ajax_info['buttonDisplay']['sort_col'] = $this->nmgp_botoes["sort_col"] = "$parm";; 
$parm = (strpos($this->sc_temp_sm_nivel, '4') === false ? 'off' : 'on'); $this->NM_ajax_info['buttonDisplay']['pdf'] = $this->nmgp_botoes["pdf"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '5') === false ? 'off' : 'on'); $this->NM_ajax_info['buttonDisplay']['word'] = $this->nmgp_botoes["word"] = "$parm";;     
 $parm = (strpos($this->sc_temp_sm_nivel, '6') === false ? 'off' : 'on'); $this->NM_ajax_info['buttonDisplay']['xls'] = $this->nmgp_botoes["xls"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '7') === false ? 'off' : 'on'); $this->NM_ajax_info['buttonDisplay']['xml'] = $this->nmgp_botoes["xml"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '8') === false ? 'off' : 'on'); $this->NM_ajax_info['buttonDisplay']['csv'] = $this->nmgp_botoes["csv"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '9') === false ? 'off' : 'on'); $this->NM_ajax_info['buttonDisplay']['rtf'] = $this->nmgp_botoes["rtf"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, 'P') === false ? 'off' : 'on'); $this->NM_ajax_info['buttonDisplay']['print'] = $this->nmgp_botoes["print"] = "$parm";;
if (isset($this->sc_temp_sm_nivel)) { $_SESSION['sm_nivel'] = $this->sc_temp_sm_nivel;}
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function leeConfig($ident, $clasif, &$obj = NULL) {
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
   
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
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function guardaIdAplicacion() {
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_idmodulo)) {$this->sc_temp_idmodulo = (isset($_SESSION['idmodulo'])) ? $_SESSION['idmodulo'] : "";}
if (!isset($this->sc_temp_aplicacion_origen)) {$this->sc_temp_aplicacion_origen = (isset($_SESSION['aplicacion_origen'])) ? $_SESSION['aplicacion_origen'] : "";}
   
 $this->sc_temp_aplicacion_origen = substr(10000+$this->sc_temp_idmodulo, 2).$this->Ini->nm_cod_apl; 
 
if (isset($this->sc_temp_aplicacion_origen)) { $_SESSION['aplicacion_origen'] = $this->sc_temp_aplicacion_origen;}
if (isset($this->sc_temp_idmodulo)) { $_SESSION['idmodulo'] = $this->sc_temp_idmodulo;}
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function forma_pre($identificador, $FechaOperacion){
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  
	$montoTAG = 0;
	$montoCRE = 0;
	;
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
	$cuerpo =$this->rs[0][3];
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
$this->leyenda = "";
 
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

if (false == $this->rs)     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Error while accessing database.';
 }
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

if (false == $this->rs)     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Error while accessing database.';
 }
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

if (false == $this->rs) {     
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= '¡Error al acceder a la base de datos!.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = '¡Error al acceder a la base de datos!.';
 }
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
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function ArmaCondicion(){
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  
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

if (false == $this->rs)     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Error while accessing database.';
 }
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
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function Comparativo($identificador, $FechaOperacion){
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  
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
	$caseta = $casetaid = $this->rs[0][1];
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

if (false == $this->rs){
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Error while accessing database.';
 }
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
$fila_aECT = $this->aforoECT("","",$where_folio, $casetaid);
$codigo_html .=  $fila_aECT[0];
$codigo_html .=  $fila_aECT[1];

$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" >Diferencia entre el Total Marcado por el C-R y el '.$modooperacion.' </th></tr>';
 $fila_a = $this->DiferenciaTotales($sql_where,$where_folio,$casetaid);
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

if (false == $this->rs){
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Error while accessing database.';
 }
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
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function DiferenciaTotales($sql_where,$where_folio,$casetaid){
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  
	$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;
 
      $nm_select = "SELECT ModoOperacion FROM casetas WHERE CasetaID = '$casetaid'"; 
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

if (false == $this->rs){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Error while accessing database.';
 }
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

if (false == $this->rs){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Error while accessing database.';
 }
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
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function aforoECT($pago, $titulo, $sql_where, $casetaid){
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  
	$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;
 
      $nm_select = "SELECT ModoOperacion FROM casetas WHERE CasetaID = '$casetaid'"; 
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

if (false == $this->rs){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Error while accessing database.';
 }
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
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function crea_tr($array_fuente, $titulo){
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  
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
	
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function diferencia($fin, $ini){
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  
	if($fin == 0 && $ini ==0){
	$diferencia = 0;
	}else{
	$diferencia = $fin - $ini + 1;
}
return $diferencia;

$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
}
function saca_aforo($pago, $titulo, $sql_where)	{
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
  
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

if (false == $this->rs){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Error while accessing database.';
 }
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
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              control_importe_total_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['retorno_edit'] . "';";
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
    if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
    $_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fld_complementa = $this->fld_complementa;
    $original_leyenda = $this->leyenda;
}
if (!isset($this->sc_temp_identificador)) {$this->sc_temp_identificador = (isset($_SESSION['identificador'])) ? $_SESSION['identificador'] : "";}
  $identificador = $this->sc_temp_identificador;
$this->iden  = $this->sc_temp_identificador;
$fld_importe_cr = 0;
$check_sql = "SELECT CasetaID, CarrilID, TurnoID, FechaOperacion,MontoCR, HoraInicio, HoraFin,ImporteMXN,IngresoELU_PRE FROM detalleturno WHERE FolioCierre = '".$identificador."'";
 
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
	$check_sql2 = "SELECT Importe,TipoOperacion FROM operacion WHERE 
	CasetaID = '".$this->rs[0][0]."' AND 
	CarrilID = '".$this->rs[0][1]."' AND 
	TurnoID = '".$this->rs[0][2]."' AND 
	FechaOperacion = '".$this->rs[0][3]."' AND
	HoraInicio = '".$this->rs[0][5]."';";
	 
      $nm_select = $check_sql2; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs2 = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs2 = false;
          $this->rs2_erro = $this->Db->ErrorMsg();
      } 

	if (false == $this->rs2 )     
	{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_control_importe_total_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Error while accessing database.';
 }
;
	} else {
	   while(!$this->rs2->EOF)
		{
		if($this->rs2->fields[1]=="FONDO"){
				$fld_importe_cr -= $this->rs2->fields[0];
					}else{
				$fld_importe_cr += $this->rs2->fields[0];
					}
		   $this->rs2->MoveNext();
		}
		$this->rs2->Close();
	}
	$this->fechacierre  = date("Y-m-d H:m:i"); 
	$total = ($this->rs[0][4] - $fld_importe_cr) - ($this->rs[0][7] - $this->rs[0][8]);
	
     $nm_select ="UPDATE detalleturno SET Operacion = $fld_importe_cr , Faltante = $total, FechaPreLiq = '$this->fechacierre' WHERE FolioCierre = '".$identificador."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                control_importe_total_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
		

	if($total<0) {
		$this->leyenda  = "Hay un sobrante de: $ ";
		$this->leyenda .= ABS($total);
		$this->nmgp_cmp_hidden["fld_complementa"] = "off"; $this->NM_ajax_info['fieldDisplay']['fld_complementa'] = 'off';
	} elseif ($total == 0) {
		$this->leyenda  = "Sin faltantes ni sobrantes";
	}else {
		$this->leyenda  = "Hay un faltante de: $ ";
		$this->leyenda  .= ABS($total);
		$this->leyenda .= "<br>";
	}
}
		else     
{
			$this->leyenda .= "No existe el registro.. Verificar!!";
			$this->nmgp_cmp_hidden["fld_complementa"] = "off"; $this->NM_ajax_info['fieldDisplay']['fld_complementa'] = 'off';
}
$total = 0;
$fld_importe_cr = 0;
if (isset($this->sc_temp_identificador)) { $_SESSION['identificador'] = $this->sc_temp_identificador;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fld_complementa != $this->fld_complementa || (isset($bFlagRead_fld_complementa) && $bFlagRead_fld_complementa)))
    {
        $this->ajax_return_values_fld_complementa(true);
    }
    if (($original_leyenda != $this->leyenda || (isset($bFlagRead_leyenda) && $bFlagRead_leyenda)))
    {
        $this->ajax_return_values_leyenda(true);
    }
}
$_SESSION['scriptcase']['control_importe_total_mob']['contr_erro'] = 'off'; 
    }
    if (!empty($this->Campos_Mens_erro)) 
    {
        $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
    }
    $this->nm_guardar_campos();
    $this->nm_formatar_campos();
        $this->initFormPages();
    include_once("control_importe_total_mob_form0.php");
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['csrf_token'];
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
       $nmgp_saida_form = "control_importe_total_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "control_importe_total_mob_fim.php";
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
       control_importe_total_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           control_importe_total_mob_pack_ajax_response();
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
       control_importe_total_mob_pack_ajax_response();
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
            case "ok":
                return array("sub_form_b.sc-unique-btn-1", "sub_form_b.sc-unique-btn-2");
                break;
            case "help":
                return array("sc_b_hlp_b");
                break;
            case "exit":
                return array("Bsair_b.sc-unique-btn-3", "Bsair_b.sc-unique-btn-4");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"></div>
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_importe_total_mob']['ordem_ord'] == " desc") {
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
