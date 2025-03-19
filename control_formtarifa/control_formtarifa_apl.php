<?php
//
class control_formtarifa_apl
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
   var $a;
   var $m;
   var $b2;
   var $b3;
   var $b4;
   var $c2;
   var $c3;
   var $c4;
   var $c5;
   var $c6;
   var $c7;
   var $c8;
   var $c9;
   var $importea;
   var $importem;
   var $importeb2;
   var $importeb3;
   var $importeb4;
   var $importec2;
   var $importec3;
   var $importec4;
   var $importec5;
   var $importec6;
   var $importec7;
   var $importec8;
   var $importec9;
   var $importeela;
   var $importeelm;
   var $importeelb2;
   var $importeelb3;
   var $importeelb4;
   var $importeelc2;
   var $importeelc3;
   var $importeelc4;
   var $importeelc5;
   var $importeelc6;
   var $importeelc7;
   var $importeelc8;
   var $importeelc9;
   var $importeepa;
   var $importeepm;
   var $importeepb2;
   var $importeepb3;
   var $importeepb4;
   var $importeepc2;
   var $importeepc3;
   var $importeepc4;
   var $importeepc5;
   var $importeepc6;
   var $importeepc7;
   var $importeepc8;
   var $importeepc9;
   var $estatusa;
   var $estatusm;
   var $estatusb2;
   var $estatusb3;
   var $estatusb4;
   var $estatusc2;
   var $estatusc3;
   var $estatusc4;
   var $estatusc5;
   var $estatusc6;
   var $estatusc7;
   var $estatusc8;
   var $estatusc9;
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
          if (isset($this->NM_ajax_info['param']['a']))
          {
              $this->a = $this->NM_ajax_info['param']['a'];
          }
          if (isset($this->NM_ajax_info['param']['b2']))
          {
              $this->b2 = $this->NM_ajax_info['param']['b2'];
          }
          if (isset($this->NM_ajax_info['param']['b3']))
          {
              $this->b3 = $this->NM_ajax_info['param']['b3'];
          }
          if (isset($this->NM_ajax_info['param']['b4']))
          {
              $this->b4 = $this->NM_ajax_info['param']['b4'];
          }
          if (isset($this->NM_ajax_info['param']['c2']))
          {
              $this->c2 = $this->NM_ajax_info['param']['c2'];
          }
          if (isset($this->NM_ajax_info['param']['c3']))
          {
              $this->c3 = $this->NM_ajax_info['param']['c3'];
          }
          if (isset($this->NM_ajax_info['param']['c4']))
          {
              $this->c4 = $this->NM_ajax_info['param']['c4'];
          }
          if (isset($this->NM_ajax_info['param']['c5']))
          {
              $this->c5 = $this->NM_ajax_info['param']['c5'];
          }
          if (isset($this->NM_ajax_info['param']['c6']))
          {
              $this->c6 = $this->NM_ajax_info['param']['c6'];
          }
          if (isset($this->NM_ajax_info['param']['c7']))
          {
              $this->c7 = $this->NM_ajax_info['param']['c7'];
          }
          if (isset($this->NM_ajax_info['param']['c8']))
          {
              $this->c8 = $this->NM_ajax_info['param']['c8'];
          }
          if (isset($this->NM_ajax_info['param']['c9']))
          {
              $this->c9 = $this->NM_ajax_info['param']['c9'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['estatusa']))
          {
              $this->estatusa = $this->NM_ajax_info['param']['estatusa'];
          }
          if (isset($this->NM_ajax_info['param']['estatusb2']))
          {
              $this->estatusb2 = $this->NM_ajax_info['param']['estatusb2'];
          }
          if (isset($this->NM_ajax_info['param']['estatusb3']))
          {
              $this->estatusb3 = $this->NM_ajax_info['param']['estatusb3'];
          }
          if (isset($this->NM_ajax_info['param']['estatusb4']))
          {
              $this->estatusb4 = $this->NM_ajax_info['param']['estatusb4'];
          }
          if (isset($this->NM_ajax_info['param']['estatusc2']))
          {
              $this->estatusc2 = $this->NM_ajax_info['param']['estatusc2'];
          }
          if (isset($this->NM_ajax_info['param']['estatusc3']))
          {
              $this->estatusc3 = $this->NM_ajax_info['param']['estatusc3'];
          }
          if (isset($this->NM_ajax_info['param']['estatusc4']))
          {
              $this->estatusc4 = $this->NM_ajax_info['param']['estatusc4'];
          }
          if (isset($this->NM_ajax_info['param']['estatusc5']))
          {
              $this->estatusc5 = $this->NM_ajax_info['param']['estatusc5'];
          }
          if (isset($this->NM_ajax_info['param']['estatusc6']))
          {
              $this->estatusc6 = $this->NM_ajax_info['param']['estatusc6'];
          }
          if (isset($this->NM_ajax_info['param']['estatusc7']))
          {
              $this->estatusc7 = $this->NM_ajax_info['param']['estatusc7'];
          }
          if (isset($this->NM_ajax_info['param']['estatusc8']))
          {
              $this->estatusc8 = $this->NM_ajax_info['param']['estatusc8'];
          }
          if (isset($this->NM_ajax_info['param']['estatusc9']))
          {
              $this->estatusc9 = $this->NM_ajax_info['param']['estatusc9'];
          }
          if (isset($this->NM_ajax_info['param']['estatusm']))
          {
              $this->estatusm = $this->NM_ajax_info['param']['estatusm'];
          }
          if (isset($this->NM_ajax_info['param']['importea']))
          {
              $this->importea = $this->NM_ajax_info['param']['importea'];
          }
          if (isset($this->NM_ajax_info['param']['importeb2']))
          {
              $this->importeb2 = $this->NM_ajax_info['param']['importeb2'];
          }
          if (isset($this->NM_ajax_info['param']['importeb3']))
          {
              $this->importeb3 = $this->NM_ajax_info['param']['importeb3'];
          }
          if (isset($this->NM_ajax_info['param']['importeb4']))
          {
              $this->importeb4 = $this->NM_ajax_info['param']['importeb4'];
          }
          if (isset($this->NM_ajax_info['param']['importec2']))
          {
              $this->importec2 = $this->NM_ajax_info['param']['importec2'];
          }
          if (isset($this->NM_ajax_info['param']['importec3']))
          {
              $this->importec3 = $this->NM_ajax_info['param']['importec3'];
          }
          if (isset($this->NM_ajax_info['param']['importec4']))
          {
              $this->importec4 = $this->NM_ajax_info['param']['importec4'];
          }
          if (isset($this->NM_ajax_info['param']['importec5']))
          {
              $this->importec5 = $this->NM_ajax_info['param']['importec5'];
          }
          if (isset($this->NM_ajax_info['param']['importec6']))
          {
              $this->importec6 = $this->NM_ajax_info['param']['importec6'];
          }
          if (isset($this->NM_ajax_info['param']['importec7']))
          {
              $this->importec7 = $this->NM_ajax_info['param']['importec7'];
          }
          if (isset($this->NM_ajax_info['param']['importec8']))
          {
              $this->importec8 = $this->NM_ajax_info['param']['importec8'];
          }
          if (isset($this->NM_ajax_info['param']['importec9']))
          {
              $this->importec9 = $this->NM_ajax_info['param']['importec9'];
          }
          if (isset($this->NM_ajax_info['param']['importeela']))
          {
              $this->importeela = $this->NM_ajax_info['param']['importeela'];
          }
          if (isset($this->NM_ajax_info['param']['importeelb2']))
          {
              $this->importeelb2 = $this->NM_ajax_info['param']['importeelb2'];
          }
          if (isset($this->NM_ajax_info['param']['importeelb3']))
          {
              $this->importeelb3 = $this->NM_ajax_info['param']['importeelb3'];
          }
          if (isset($this->NM_ajax_info['param']['importeelb4']))
          {
              $this->importeelb4 = $this->NM_ajax_info['param']['importeelb4'];
          }
          if (isset($this->NM_ajax_info['param']['importeelc2']))
          {
              $this->importeelc2 = $this->NM_ajax_info['param']['importeelc2'];
          }
          if (isset($this->NM_ajax_info['param']['importeelc3']))
          {
              $this->importeelc3 = $this->NM_ajax_info['param']['importeelc3'];
          }
          if (isset($this->NM_ajax_info['param']['importeelc4']))
          {
              $this->importeelc4 = $this->NM_ajax_info['param']['importeelc4'];
          }
          if (isset($this->NM_ajax_info['param']['importeelc5']))
          {
              $this->importeelc5 = $this->NM_ajax_info['param']['importeelc5'];
          }
          if (isset($this->NM_ajax_info['param']['importeelc6']))
          {
              $this->importeelc6 = $this->NM_ajax_info['param']['importeelc6'];
          }
          if (isset($this->NM_ajax_info['param']['importeelc7']))
          {
              $this->importeelc7 = $this->NM_ajax_info['param']['importeelc7'];
          }
          if (isset($this->NM_ajax_info['param']['importeelc8']))
          {
              $this->importeelc8 = $this->NM_ajax_info['param']['importeelc8'];
          }
          if (isset($this->NM_ajax_info['param']['importeelc9']))
          {
              $this->importeelc9 = $this->NM_ajax_info['param']['importeelc9'];
          }
          if (isset($this->NM_ajax_info['param']['importeelm']))
          {
              $this->importeelm = $this->NM_ajax_info['param']['importeelm'];
          }
          if (isset($this->NM_ajax_info['param']['importeepa']))
          {
              $this->importeepa = $this->NM_ajax_info['param']['importeepa'];
          }
          if (isset($this->NM_ajax_info['param']['importeepb2']))
          {
              $this->importeepb2 = $this->NM_ajax_info['param']['importeepb2'];
          }
          if (isset($this->NM_ajax_info['param']['importeepb3']))
          {
              $this->importeepb3 = $this->NM_ajax_info['param']['importeepb3'];
          }
          if (isset($this->NM_ajax_info['param']['importeepb4']))
          {
              $this->importeepb4 = $this->NM_ajax_info['param']['importeepb4'];
          }
          if (isset($this->NM_ajax_info['param']['importeepc2']))
          {
              $this->importeepc2 = $this->NM_ajax_info['param']['importeepc2'];
          }
          if (isset($this->NM_ajax_info['param']['importeepc3']))
          {
              $this->importeepc3 = $this->NM_ajax_info['param']['importeepc3'];
          }
          if (isset($this->NM_ajax_info['param']['importeepc4']))
          {
              $this->importeepc4 = $this->NM_ajax_info['param']['importeepc4'];
          }
          if (isset($this->NM_ajax_info['param']['importeepc5']))
          {
              $this->importeepc5 = $this->NM_ajax_info['param']['importeepc5'];
          }
          if (isset($this->NM_ajax_info['param']['importeepc6']))
          {
              $this->importeepc6 = $this->NM_ajax_info['param']['importeepc6'];
          }
          if (isset($this->NM_ajax_info['param']['importeepc7']))
          {
              $this->importeepc7 = $this->NM_ajax_info['param']['importeepc7'];
          }
          if (isset($this->NM_ajax_info['param']['importeepc8']))
          {
              $this->importeepc8 = $this->NM_ajax_info['param']['importeepc8'];
          }
          if (isset($this->NM_ajax_info['param']['importeepc9']))
          {
              $this->importeepc9 = $this->NM_ajax_info['param']['importeepc9'];
          }
          if (isset($this->NM_ajax_info['param']['importeepm']))
          {
              $this->importeepm = $this->NM_ajax_info['param']['importeepm'];
          }
          if (isset($this->NM_ajax_info['param']['importem']))
          {
              $this->importem = $this->NM_ajax_info['param']['importem'];
          }
          if (isset($this->NM_ajax_info['param']['m']))
          {
              $this->m = $this->NM_ajax_info['param']['m'];
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
      if (isset($this->FechaInicial) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['FechaInicial'] = $this->FechaInicial;
      }
      if (isset($this->FechaFinal) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['FechaFinal'] = $this->FechaFinal;
      }
      if (isset($this->Caseta) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['Caseta'] = $this->Caseta;
      }
      if (isset($this->TipoPago) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['TipoPago'] = $this->TipoPago;
      }
      if (isset($_POST["FechaInicial"]) && isset($this->FechaInicial)) 
      {
          $_SESSION['FechaInicial'] = $this->FechaInicial;
      }
      if (!isset($_POST["FechaInicial"]) && isset($_POST["fechainicial"])) 
      {
          $_SESSION['FechaInicial'] = $_POST["fechainicial"];
      }
      if (isset($_POST["FechaFinal"]) && isset($this->FechaFinal)) 
      {
          $_SESSION['FechaFinal'] = $this->FechaFinal;
      }
      if (!isset($_POST["FechaFinal"]) && isset($_POST["fechafinal"])) 
      {
          $_SESSION['FechaFinal'] = $_POST["fechafinal"];
      }
      if (isset($_POST["Caseta"]) && isset($this->Caseta)) 
      {
          $_SESSION['Caseta'] = $this->Caseta;
      }
      if (!isset($_POST["Caseta"]) && isset($_POST["caseta"])) 
      {
          $_SESSION['Caseta'] = $_POST["caseta"];
      }
      if (isset($_POST["TipoPago"]) && isset($this->TipoPago)) 
      {
          $_SESSION['TipoPago'] = $this->TipoPago;
      }
      if (!isset($_POST["TipoPago"]) && isset($_POST["tipopago"])) 
      {
          $_SESSION['TipoPago'] = $_POST["tipopago"];
      }
      if (isset($_GET["FechaInicial"]) && isset($this->FechaInicial)) 
      {
          $_SESSION['FechaInicial'] = $this->FechaInicial;
      }
      if (!isset($_GET["FechaInicial"]) && isset($_GET["fechainicial"])) 
      {
          $_SESSION['FechaInicial'] = $_GET["fechainicial"];
      }
      if (isset($_GET["FechaFinal"]) && isset($this->FechaFinal)) 
      {
          $_SESSION['FechaFinal'] = $this->FechaFinal;
      }
      if (!isset($_GET["FechaFinal"]) && isset($_GET["fechafinal"])) 
      {
          $_SESSION['FechaFinal'] = $_GET["fechafinal"];
      }
      if (isset($_GET["Caseta"]) && isset($this->Caseta)) 
      {
          $_SESSION['Caseta'] = $this->Caseta;
      }
      if (!isset($_GET["Caseta"]) && isset($_GET["caseta"])) 
      {
          $_SESSION['Caseta'] = $_GET["caseta"];
      }
      if (isset($_GET["TipoPago"]) && isset($this->TipoPago)) 
      {
          $_SESSION['TipoPago'] = $this->TipoPago;
      }
      if (!isset($_GET["TipoPago"]) && isset($_GET["tipopago"])) 
      {
          $_SESSION['TipoPago'] = $_GET["tipopago"];
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control_formtarifa']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['control_formtarifa']['embutida_parms']);
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
                 nm_limpa_str_control_formtarifa($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->FechaInicial) && isset($this->fechainicial)) 
          {
              $this->FechaInicial = $this->fechainicial;
          }
          if (isset($this->FechaInicial)) 
          {
              $_SESSION['FechaInicial'] = $this->FechaInicial;
          }
          if (!isset($this->FechaFinal) && isset($this->fechafinal)) 
          {
              $this->FechaFinal = $this->fechafinal;
          }
          if (isset($this->FechaFinal)) 
          {
              $_SESSION['FechaFinal'] = $this->FechaFinal;
          }
          if (!isset($this->Caseta) && isset($this->caseta)) 
          {
              $this->Caseta = $this->caseta;
          }
          if (isset($this->Caseta)) 
          {
              $_SESSION['Caseta'] = $this->Caseta;
          }
          if (!isset($this->TipoPago) && isset($this->tipopago)) 
          {
              $this->TipoPago = $this->tipopago;
          }
          if (isset($this->TipoPago)) 
          {
              $_SESSION['TipoPago'] = $this->TipoPago;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['control_formtarifa']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->FechaInicial) && isset($this->fechainicial)) 
          {
              $this->FechaInicial = $this->fechainicial;
          }
          if (isset($this->FechaInicial)) 
          {
              $_SESSION['FechaInicial'] = $this->FechaInicial;
          }
          if (!isset($this->FechaFinal) && isset($this->fechafinal)) 
          {
              $this->FechaFinal = $this->fechafinal;
          }
          if (isset($this->FechaFinal)) 
          {
              $_SESSION['FechaFinal'] = $this->FechaFinal;
          }
          if (!isset($this->Caseta) && isset($this->caseta)) 
          {
              $this->Caseta = $this->caseta;
          }
          if (isset($this->Caseta)) 
          {
              $_SESSION['Caseta'] = $this->Caseta;
          }
          if (!isset($this->TipoPago) && isset($this->tipopago)) 
          {
              $this->TipoPago = $this->tipopago;
          }
          if (isset($this->TipoPago)) 
          {
              $_SESSION['TipoPago'] = $this->TipoPago;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['control_formtarifa']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control_formtarifa']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new control_formtarifa_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['control_formtarifa']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_formtarifa']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_formtarifa'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_formtarifa']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_formtarifa']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('control_formtarifa') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_formtarifa']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "control_formtarifa")
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



      $_SESSION['scriptcase']['error_icon']['control_formtarifa']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['control_formtarifa'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_formtarifa']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['control_formtarifa'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['control_formtarifa'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("control_formtarifa", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'control_formtarifa_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'control_formtarifa_help.txt');
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
          require_once($this->Ini->path_embutida . 'control_formtarifa/control_formtarifa_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "control_formtarifa_erro.class.php"); 
      }
      $this->Erro      = new control_formtarifa_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['control_formtarifa']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dados_form'];
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

            $out1_img_cache = $_SESSION['scriptcase']['control_formtarifa']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['control_formtarifa']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- importea
      $this->field_config['importea']               = array();
      $this->field_config['importea']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importea']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importea']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importea']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importea']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importea']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeela
      $this->field_config['importeela']               = array();
      $this->field_config['importeela']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeela']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeela']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeela']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeela']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeela']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepa
      $this->field_config['importeepa']               = array();
      $this->field_config['importeepa']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepa']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepa']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepa']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepa']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepa']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importem
      $this->field_config['importem']               = array();
      $this->field_config['importem']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importem']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importem']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importem']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importem']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importem']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelm
      $this->field_config['importeelm']               = array();
      $this->field_config['importeelm']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelm']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelm']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelm']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelm']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelm']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepm
      $this->field_config['importeepm']               = array();
      $this->field_config['importeepm']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepm']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepm']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepm']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepm']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepm']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeb2
      $this->field_config['importeb2']               = array();
      $this->field_config['importeb2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeb2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeb2']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeb2']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeb2']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeb2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelb2
      $this->field_config['importeelb2']               = array();
      $this->field_config['importeelb2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelb2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelb2']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelb2']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelb2']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelb2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepb2
      $this->field_config['importeepb2']               = array();
      $this->field_config['importeepb2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepb2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepb2']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepb2']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepb2']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepb2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeb3
      $this->field_config['importeb3']               = array();
      $this->field_config['importeb3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeb3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeb3']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeb3']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeb3']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeb3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelb3
      $this->field_config['importeelb3']               = array();
      $this->field_config['importeelb3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelb3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelb3']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelb3']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelb3']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelb3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepb3
      $this->field_config['importeepb3']               = array();
      $this->field_config['importeepb3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepb3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepb3']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepb3']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepb3']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepb3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeb4
      $this->field_config['importeb4']               = array();
      $this->field_config['importeb4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeb4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeb4']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeb4']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeb4']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeb4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelb4
      $this->field_config['importeelb4']               = array();
      $this->field_config['importeelb4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelb4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelb4']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelb4']['symbol_mon'] = '';
      $this->field_config['importeelb4']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelb4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepb4
      $this->field_config['importeepb4']               = array();
      $this->field_config['importeepb4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepb4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepb4']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepb4']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepb4']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepb4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importec2
      $this->field_config['importec2']               = array();
      $this->field_config['importec2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importec2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importec2']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importec2']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importec2']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importec2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelc2
      $this->field_config['importeelc2']               = array();
      $this->field_config['importeelc2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelc2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelc2']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelc2']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelc2']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelc2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepc2
      $this->field_config['importeepc2']               = array();
      $this->field_config['importeepc2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepc2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepc2']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepc2']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepc2']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepc2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importec3
      $this->field_config['importec3']               = array();
      $this->field_config['importec3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importec3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importec3']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importec3']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importec3']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importec3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelc3
      $this->field_config['importeelc3']               = array();
      $this->field_config['importeelc3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelc3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelc3']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelc3']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelc3']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelc3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepc3
      $this->field_config['importeepc3']               = array();
      $this->field_config['importeepc3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepc3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepc3']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepc3']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepc3']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepc3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importec4
      $this->field_config['importec4']               = array();
      $this->field_config['importec4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importec4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importec4']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importec4']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importec4']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importec4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelc4
      $this->field_config['importeelc4']               = array();
      $this->field_config['importeelc4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelc4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelc4']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelc4']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelc4']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelc4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepc4
      $this->field_config['importeepc4']               = array();
      $this->field_config['importeepc4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepc4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepc4']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepc4']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepc4']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepc4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importec5
      $this->field_config['importec5']               = array();
      $this->field_config['importec5']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importec5']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importec5']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importec5']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importec5']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importec5']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelc5
      $this->field_config['importeelc5']               = array();
      $this->field_config['importeelc5']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelc5']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelc5']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelc5']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelc5']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelc5']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepc5
      $this->field_config['importeepc5']               = array();
      $this->field_config['importeepc5']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepc5']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepc5']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepc5']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepc5']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepc5']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importec6
      $this->field_config['importec6']               = array();
      $this->field_config['importec6']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importec6']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importec6']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importec6']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importec6']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importec6']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelc6
      $this->field_config['importeelc6']               = array();
      $this->field_config['importeelc6']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelc6']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelc6']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelc6']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelc6']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelc6']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepc6
      $this->field_config['importeepc6']               = array();
      $this->field_config['importeepc6']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepc6']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepc6']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepc6']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepc6']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepc6']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importec7
      $this->field_config['importec7']               = array();
      $this->field_config['importec7']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importec7']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importec7']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importec7']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importec7']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importec7']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelc7
      $this->field_config['importeelc7']               = array();
      $this->field_config['importeelc7']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelc7']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelc7']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelc7']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelc7']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelc7']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepc7
      $this->field_config['importeepc7']               = array();
      $this->field_config['importeepc7']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepc7']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepc7']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepc7']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepc7']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepc7']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelc8
      $this->field_config['importeelc8']               = array();
      $this->field_config['importeelc8']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelc8']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelc8']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelc8']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelc8']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelc8']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importec8
      $this->field_config['importec8']               = array();
      $this->field_config['importec8']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importec8']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importec8']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importec8']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importec8']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importec8']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepc8
      $this->field_config['importeepc8']               = array();
      $this->field_config['importeepc8']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepc8']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepc8']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepc8']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepc8']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepc8']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importec9
      $this->field_config['importec9']               = array();
      $this->field_config['importec9']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importec9']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importec9']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importec9']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importec9']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importec9']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeelc9
      $this->field_config['importeelc9']               = array();
      $this->field_config['importeelc9']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeelc9']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeelc9']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeelc9']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeelc9']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeelc9']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importeepc9
      $this->field_config['importeepc9']               = array();
      $this->field_config['importeepc9']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importeepc9']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importeepc9']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importeepc9']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['importeepc9']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importeepc9']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      $this->ini_controle();

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
          if ('validate_a' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'a');
          }
          if ('validate_importea' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importea');
          }
          if ('validate_importeela' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeela');
          }
          if ('validate_importeepa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepa');
          }
          if ('validate_estatusa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusa');
          }
          if ('validate_m' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'm');
          }
          if ('validate_importem' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importem');
          }
          if ('validate_importeelm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelm');
          }
          if ('validate_importeepm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepm');
          }
          if ('validate_estatusm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusm');
          }
          if ('validate_b2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'b2');
          }
          if ('validate_importeb2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeb2');
          }
          if ('validate_importeelb2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelb2');
          }
          if ('validate_importeepb2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepb2');
          }
          if ('validate_estatusb2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusb2');
          }
          if ('validate_b3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'b3');
          }
          if ('validate_importeb3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeb3');
          }
          if ('validate_importeelb3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelb3');
          }
          if ('validate_importeepb3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepb3');
          }
          if ('validate_estatusb3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusb3');
          }
          if ('validate_b4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'b4');
          }
          if ('validate_importeb4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeb4');
          }
          if ('validate_importeelb4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelb4');
          }
          if ('validate_importeepb4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepb4');
          }
          if ('validate_estatusb4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusb4');
          }
          if ('validate_c2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'c2');
          }
          if ('validate_importec2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importec2');
          }
          if ('validate_importeelc2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelc2');
          }
          if ('validate_importeepc2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepc2');
          }
          if ('validate_estatusc2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusc2');
          }
          if ('validate_c3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'c3');
          }
          if ('validate_importec3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importec3');
          }
          if ('validate_importeelc3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelc3');
          }
          if ('validate_importeepc3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepc3');
          }
          if ('validate_estatusc3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusc3');
          }
          if ('validate_c4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'c4');
          }
          if ('validate_importec4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importec4');
          }
          if ('validate_importeelc4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelc4');
          }
          if ('validate_importeepc4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepc4');
          }
          if ('validate_estatusc4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusc4');
          }
          if ('validate_c5' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'c5');
          }
          if ('validate_importec5' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importec5');
          }
          if ('validate_importeelc5' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelc5');
          }
          if ('validate_importeepc5' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepc5');
          }
          if ('validate_estatusc5' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusc5');
          }
          if ('validate_c6' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'c6');
          }
          if ('validate_importec6' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importec6');
          }
          if ('validate_importeelc6' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelc6');
          }
          if ('validate_importeepc6' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepc6');
          }
          if ('validate_estatusc6' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusc6');
          }
          if ('validate_c7' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'c7');
          }
          if ('validate_importec7' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importec7');
          }
          if ('validate_importeelc7' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelc7');
          }
          if ('validate_importeepc7' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepc7');
          }
          if ('validate_estatusc7' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusc7');
          }
          if ('validate_c8' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'c8');
          }
          if ('validate_importeelc8' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelc8');
          }
          if ('validate_importec8' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importec8');
          }
          if ('validate_importeepc8' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepc8');
          }
          if ('validate_estatusc8' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusc8');
          }
          if ('validate_c9' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'c9');
          }
          if ('validate_importec9' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importec9');
          }
          if ('validate_importeelc9' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeelc9');
          }
          if ('validate_importeepc9' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importeepc9');
          }
          if ('validate_estatusc9' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatusc9');
          }
          control_formtarifa_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['inline_form_seq'] = $this->sc_seq_row;
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
              control_formtarifa_pack_ajax_response();
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
          $_SESSION['scriptcase']['control_formtarifa']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_formtarifa_pack_ajax_response();
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
          $_SESSION['scriptcase']['control_formtarifa']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_formtarifa_pack_ajax_response();
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
          $this->a = "" ;  
          $this->m = "" ;  
          $this->b2 = "" ;  
          $this->b3 = "" ;  
          $this->b4 = "" ;  
          $this->c2 = "" ;  
          $this->c3 = "" ;  
          $this->c4 = "" ;  
          $this->c5 = "" ;  
          $this->c6 = "" ;  
          $this->c7 = "" ;  
          $this->c8 = "" ;  
          $this->c9 = "" ;  
          $this->importea = "" ;  
          $this->importem = "" ;  
          $this->importeb2 = "" ;  
          $this->importeb3 = "" ;  
          $this->importeb4 = "" ;  
          $this->importec2 = "" ;  
          $this->importec3 = "" ;  
          $this->importec4 = "" ;  
          $this->importec5 = "" ;  
          $this->importec6 = "" ;  
          $this->importec7 = "" ;  
          $this->importec8 = "" ;  
          $this->importec9 = "" ;  
          $this->importeela = "" ;  
          $this->importeelm = "" ;  
          $this->importeelb2 = "" ;  
          $this->importeelb3 = "" ;  
          $this->importeelb4 = "" ;  
          $this->importeelc2 = "" ;  
          $this->importeelc3 = "" ;  
          $this->importeelc4 = "" ;  
          $this->importeelc5 = "" ;  
          $this->importeelc6 = "" ;  
          $this->importeelc7 = "" ;  
          $this->importeelc8 = "" ;  
          $this->importeelc9 = "" ;  
          $this->importeepa = "" ;  
          $this->importeepm = "" ;  
          $this->importeepb2 = "" ;  
          $this->importeepb3 = "" ;  
          $this->importeepb4 = "" ;  
          $this->importeepc2 = "" ;  
          $this->importeepc3 = "" ;  
          $this->importeepc4 = "" ;  
          $this->importeepc5 = "" ;  
          $this->importeepc6 = "" ;  
          $this->importeepc7 = "" ;  
          $this->importeepc8 = "" ;  
          $this->importeepc9 = "" ;  
          $this->estatusa = "" ;  
          $this->estatusm = "" ;  
          $this->estatusb2 = "" ;  
          $this->estatusb3 = "" ;  
          $this->estatusb4 = "" ;  
          $this->estatusc2 = "" ;  
          $this->estatusc3 = "" ;  
          $this->estatusc4 = "" ;  
          $this->estatusc5 = "" ;  
          $this->estatusc6 = "" ;  
          $this->estatusc7 = "" ;  
          $this->estatusc8 = "" ;  
          $this->estatusc9 = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dados_form'] as $NM_campo => $NM_valor)
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos']))
              { 
                  $a = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][0]; 
                  $importea = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][1]; 
                  $importeela = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][2]; 
                  $importeepa = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][3]; 
                  $estatusa = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][4]; 
                  $m = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][5]; 
                  $importem = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][6]; 
                  $importeelm = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][7]; 
                  $importeepm = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][8]; 
                  $estatusm = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][9]; 
                  $b2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][10]; 
                  $importeb2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][11]; 
                  $importeelb2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][12]; 
                  $importeepb2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][13]; 
                  $estatusb2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][14]; 
                  $b3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][15]; 
                  $importeb3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][16]; 
                  $importeelb3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][17]; 
                  $importeepb3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][18]; 
                  $estatusb3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][19]; 
                  $b4 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][20]; 
                  $importeb4 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][21]; 
                  $importeelb4 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][22]; 
                  $importeepb4 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][23]; 
                  $estatusb4 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][24]; 
                  $c2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][25]; 
                  $importec2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][26]; 
                  $importeelc2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][27]; 
                  $importeepc2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][28]; 
                  $estatusc2 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][29]; 
                  $c3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][30]; 
                  $importec3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][31]; 
                  $importeelc3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][32]; 
                  $importeepc3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][33]; 
                  $estatusc3 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][34]; 
                  $c4 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][35]; 
                  $importec4 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][36]; 
                  $importeelc4 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][37]; 
                  $importeepc4 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][38]; 
                  $estatusc4 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][39]; 
                  $c5 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][40]; 
                  $importec5 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][41]; 
                  $importeelc5 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][42]; 
                  $importeepc5 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][43]; 
                  $estatusc5 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][44]; 
                  $c6 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][45]; 
                  $importec6 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][46]; 
                  $importeelc6 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][47]; 
                  $importeepc6 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][48]; 
                  $estatusc6 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][49]; 
                  $c7 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][50]; 
                  $importec7 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][51]; 
                  $importeelc7 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][52]; 
                  $importeepc7 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][53]; 
                  $estatusc7 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][54]; 
                  $c8 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][55]; 
                  $importeelc8 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][56]; 
                  $importec8 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][57]; 
                  $importeepc8 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][58]; 
                  $estatusc8 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][59]; 
                  $c9 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][60]; 
                  $importec9 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][61]; 
                  $importeelc9 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][62]; 
                  $importeepc9 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][63]; 
                  $estatusc9 = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][64]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][0] = $this->a; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][1] = $this->importea; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][2] = $this->importeela; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][3] = $this->importeepa; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][4] = $this->estatusa; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][5] = $this->m; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][6] = $this->importem; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][7] = $this->importeelm; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][8] = $this->importeepm; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][9] = $this->estatusm; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][10] = $this->b2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][11] = $this->importeb2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][12] = $this->importeelb2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][13] = $this->importeepb2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][14] = $this->estatusb2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][15] = $this->b3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][16] = $this->importeb3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][17] = $this->importeelb3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][18] = $this->importeepb3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][19] = $this->estatusb3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][20] = $this->b4; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][21] = $this->importeb4; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][22] = $this->importeelb4; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][23] = $this->importeepb4; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][24] = $this->estatusb4; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][25] = $this->c2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][26] = $this->importec2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][27] = $this->importeelc2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][28] = $this->importeepc2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][29] = $this->estatusc2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][30] = $this->c3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][31] = $this->importec3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][32] = $this->importeelc3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][33] = $this->importeepc3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][34] = $this->estatusc3; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][35] = $this->c4; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][36] = $this->importec4; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][37] = $this->importeelc4; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][38] = $this->importeepc4; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][39] = $this->estatusc4; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][40] = $this->c5; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][41] = $this->importec5; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][42] = $this->importeelc5; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][43] = $this->importeepc5; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][44] = $this->estatusc5; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][45] = $this->c6; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][46] = $this->importec6; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][47] = $this->importeelc6; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][48] = $this->importeepc6; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][49] = $this->estatusc6; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][50] = $this->c7; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][51] = $this->importec7; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][52] = $this->importeelc7; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][53] = $this->importeepc7; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][54] = $this->estatusc7; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][55] = $this->c8; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][56] = $this->importeelc8; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][57] = $this->importec8; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][58] = $this->importeepc8; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][59] = $this->estatusc8; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][60] = $this->c9; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][61] = $this->importec9; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][62] = $this->importeelc9; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][63] = $this->importeepc9; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['campos'][64] = $this->estatusc9; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("control_formtarifa", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("control_formtarifa_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              control_formtarifa_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "control_formtarifa.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa'][$path_doc_md5][1] = $Zip_name;
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
<form name="Fdown" method="get" action="control_formtarifa_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="control_formtarifa"> 
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
           case 'a':
               return "A";
               break;
           case 'importea':
               return "Importe";
               break;
           case 'importeela':
               return "Importe EEL";
               break;
           case 'importeepa':
               return "Importe EEP";
               break;
           case 'estatusa':
               return "Estatus";
               break;
           case 'm':
               return "M";
               break;
           case 'importem':
               return "Importe";
               break;
           case 'importeelm':
               return "Importe EEL";
               break;
           case 'importeepm':
               return "Importe EEP";
               break;
           case 'estatusm':
               return "Estatus";
               break;
           case 'b2':
               return "B2";
               break;
           case 'importeb2':
               return "Importe";
               break;
           case 'importeelb2':
               return "Importe EEL";
               break;
           case 'importeepb2':
               return "Importe EEP";
               break;
           case 'estatusb2':
               return "Estatus";
               break;
           case 'b3':
               return "B3";
               break;
           case 'importeb3':
               return "Importe";
               break;
           case 'importeelb3':
               return "Importe EEL";
               break;
           case 'importeepb3':
               return "Importe EEP";
               break;
           case 'estatusb3':
               return "Estatus";
               break;
           case 'b4':
               return "B4";
               break;
           case 'importeb4':
               return "Importe";
               break;
           case 'importeelb4':
               return "Importe EEL";
               break;
           case 'importeepb4':
               return "Importe EEP";
               break;
           case 'estatusb4':
               return "EstatusB4";
               break;
           case 'c2':
               return "C2";
               break;
           case 'importec2':
               return "Importe";
               break;
           case 'importeelc2':
               return "Importe EEL";
               break;
           case 'importeepc2':
               return "Importe EEP";
               break;
           case 'estatusc2':
               return "Estatus";
               break;
           case 'c3':
               return "C3";
               break;
           case 'importec3':
               return "Importe";
               break;
           case 'importeelc3':
               return "Importe EEL";
               break;
           case 'importeepc3':
               return "Importe EEP";
               break;
           case 'estatusc3':
               return "Estatus";
               break;
           case 'c4':
               return "C4";
               break;
           case 'importec4':
               return "Importe";
               break;
           case 'importeelc4':
               return "Importe EEL";
               break;
           case 'importeepc4':
               return "Importe EEP";
               break;
           case 'estatusc4':
               return "Estatus";
               break;
           case 'c5':
               return "C5";
               break;
           case 'importec5':
               return "Importe";
               break;
           case 'importeelc5':
               return "Importe EEL";
               break;
           case 'importeepc5':
               return "Importe EEP";
               break;
           case 'estatusc5':
               return "Estatus";
               break;
           case 'c6':
               return "C6";
               break;
           case 'importec6':
               return "Importe";
               break;
           case 'importeelc6':
               return "Importe EEL";
               break;
           case 'importeepc6':
               return "Importe EEP";
               break;
           case 'estatusc6':
               return "Estatus";
               break;
           case 'c7':
               return "C7";
               break;
           case 'importec7':
               return "Importe";
               break;
           case 'importeelc7':
               return "Importe EEL";
               break;
           case 'importeepc7':
               return "Importe EEP";
               break;
           case 'estatusc7':
               return "Estatus";
               break;
           case 'c8':
               return "C8";
               break;
           case 'importeelc8':
               return "Importe";
               break;
           case 'importec8':
               return "Importe EEL";
               break;
           case 'importeepc8':
               return "Importe EEP";
               break;
           case 'estatusc8':
               return "Estatus";
               break;
           case 'c9':
               return "C9";
               break;
           case 'importec9':
               return "Importe";
               break;
           case 'importeelc9':
               return "Importe EEL";
               break;
           case 'importeepc9':
               return "Importe EEP";
               break;
           case 'estatusc9':
               return "Estatus";
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
              if (!isset($this->NM_ajax_info['errList']['geral_control_formtarifa']) || !is_array($this->NM_ajax_info['errList']['geral_control_formtarifa']))
              {
                  $this->NM_ajax_info['errList']['geral_control_formtarifa'] = array();
              }
              $this->NM_ajax_info['errList']['geral_control_formtarifa'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'a' == $filtro)) || (is_array($filtro) && in_array('a', $filtro)))
        $this->ValidateField_a($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importea' == $filtro)) || (is_array($filtro) && in_array('importea', $filtro)))
        $this->ValidateField_importea($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeela' == $filtro)) || (is_array($filtro) && in_array('importeela', $filtro)))
        $this->ValidateField_importeela($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepa' == $filtro)) || (is_array($filtro) && in_array('importeepa', $filtro)))
        $this->ValidateField_importeepa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusa' == $filtro)) || (is_array($filtro) && in_array('estatusa', $filtro)))
        $this->ValidateField_estatusa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'm' == $filtro)) || (is_array($filtro) && in_array('m', $filtro)))
        $this->ValidateField_m($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importem' == $filtro)) || (is_array($filtro) && in_array('importem', $filtro)))
        $this->ValidateField_importem($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelm' == $filtro)) || (is_array($filtro) && in_array('importeelm', $filtro)))
        $this->ValidateField_importeelm($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepm' == $filtro)) || (is_array($filtro) && in_array('importeepm', $filtro)))
        $this->ValidateField_importeepm($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusm' == $filtro)) || (is_array($filtro) && in_array('estatusm', $filtro)))
        $this->ValidateField_estatusm($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'b2' == $filtro)) || (is_array($filtro) && in_array('b2', $filtro)))
        $this->ValidateField_b2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeb2' == $filtro)) || (is_array($filtro) && in_array('importeb2', $filtro)))
        $this->ValidateField_importeb2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelb2' == $filtro)) || (is_array($filtro) && in_array('importeelb2', $filtro)))
        $this->ValidateField_importeelb2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepb2' == $filtro)) || (is_array($filtro) && in_array('importeepb2', $filtro)))
        $this->ValidateField_importeepb2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusb2' == $filtro)) || (is_array($filtro) && in_array('estatusb2', $filtro)))
        $this->ValidateField_estatusb2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'b3' == $filtro)) || (is_array($filtro) && in_array('b3', $filtro)))
        $this->ValidateField_b3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeb3' == $filtro)) || (is_array($filtro) && in_array('importeb3', $filtro)))
        $this->ValidateField_importeb3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelb3' == $filtro)) || (is_array($filtro) && in_array('importeelb3', $filtro)))
        $this->ValidateField_importeelb3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepb3' == $filtro)) || (is_array($filtro) && in_array('importeepb3', $filtro)))
        $this->ValidateField_importeepb3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusb3' == $filtro)) || (is_array($filtro) && in_array('estatusb3', $filtro)))
        $this->ValidateField_estatusb3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'b4' == $filtro)) || (is_array($filtro) && in_array('b4', $filtro)))
        $this->ValidateField_b4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeb4' == $filtro)) || (is_array($filtro) && in_array('importeb4', $filtro)))
        $this->ValidateField_importeb4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelb4' == $filtro)) || (is_array($filtro) && in_array('importeelb4', $filtro)))
        $this->ValidateField_importeelb4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepb4' == $filtro)) || (is_array($filtro) && in_array('importeepb4', $filtro)))
        $this->ValidateField_importeepb4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusb4' == $filtro)) || (is_array($filtro) && in_array('estatusb4', $filtro)))
        $this->ValidateField_estatusb4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'c2' == $filtro)) || (is_array($filtro) && in_array('c2', $filtro)))
        $this->ValidateField_c2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importec2' == $filtro)) || (is_array($filtro) && in_array('importec2', $filtro)))
        $this->ValidateField_importec2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelc2' == $filtro)) || (is_array($filtro) && in_array('importeelc2', $filtro)))
        $this->ValidateField_importeelc2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepc2' == $filtro)) || (is_array($filtro) && in_array('importeepc2', $filtro)))
        $this->ValidateField_importeepc2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusc2' == $filtro)) || (is_array($filtro) && in_array('estatusc2', $filtro)))
        $this->ValidateField_estatusc2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'c3' == $filtro)) || (is_array($filtro) && in_array('c3', $filtro)))
        $this->ValidateField_c3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importec3' == $filtro)) || (is_array($filtro) && in_array('importec3', $filtro)))
        $this->ValidateField_importec3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelc3' == $filtro)) || (is_array($filtro) && in_array('importeelc3', $filtro)))
        $this->ValidateField_importeelc3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepc3' == $filtro)) || (is_array($filtro) && in_array('importeepc3', $filtro)))
        $this->ValidateField_importeepc3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusc3' == $filtro)) || (is_array($filtro) && in_array('estatusc3', $filtro)))
        $this->ValidateField_estatusc3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'c4' == $filtro)) || (is_array($filtro) && in_array('c4', $filtro)))
        $this->ValidateField_c4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importec4' == $filtro)) || (is_array($filtro) && in_array('importec4', $filtro)))
        $this->ValidateField_importec4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelc4' == $filtro)) || (is_array($filtro) && in_array('importeelc4', $filtro)))
        $this->ValidateField_importeelc4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepc4' == $filtro)) || (is_array($filtro) && in_array('importeepc4', $filtro)))
        $this->ValidateField_importeepc4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusc4' == $filtro)) || (is_array($filtro) && in_array('estatusc4', $filtro)))
        $this->ValidateField_estatusc4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'c5' == $filtro)) || (is_array($filtro) && in_array('c5', $filtro)))
        $this->ValidateField_c5($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importec5' == $filtro)) || (is_array($filtro) && in_array('importec5', $filtro)))
        $this->ValidateField_importec5($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelc5' == $filtro)) || (is_array($filtro) && in_array('importeelc5', $filtro)))
        $this->ValidateField_importeelc5($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepc5' == $filtro)) || (is_array($filtro) && in_array('importeepc5', $filtro)))
        $this->ValidateField_importeepc5($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusc5' == $filtro)) || (is_array($filtro) && in_array('estatusc5', $filtro)))
        $this->ValidateField_estatusc5($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'c6' == $filtro)) || (is_array($filtro) && in_array('c6', $filtro)))
        $this->ValidateField_c6($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importec6' == $filtro)) || (is_array($filtro) && in_array('importec6', $filtro)))
        $this->ValidateField_importec6($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelc6' == $filtro)) || (is_array($filtro) && in_array('importeelc6', $filtro)))
        $this->ValidateField_importeelc6($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepc6' == $filtro)) || (is_array($filtro) && in_array('importeepc6', $filtro)))
        $this->ValidateField_importeepc6($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusc6' == $filtro)) || (is_array($filtro) && in_array('estatusc6', $filtro)))
        $this->ValidateField_estatusc6($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'c7' == $filtro)) || (is_array($filtro) && in_array('c7', $filtro)))
        $this->ValidateField_c7($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importec7' == $filtro)) || (is_array($filtro) && in_array('importec7', $filtro)))
        $this->ValidateField_importec7($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelc7' == $filtro)) || (is_array($filtro) && in_array('importeelc7', $filtro)))
        $this->ValidateField_importeelc7($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepc7' == $filtro)) || (is_array($filtro) && in_array('importeepc7', $filtro)))
        $this->ValidateField_importeepc7($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusc7' == $filtro)) || (is_array($filtro) && in_array('estatusc7', $filtro)))
        $this->ValidateField_estatusc7($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'c8' == $filtro)) || (is_array($filtro) && in_array('c8', $filtro)))
        $this->ValidateField_c8($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelc8' == $filtro)) || (is_array($filtro) && in_array('importeelc8', $filtro)))
        $this->ValidateField_importeelc8($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importec8' == $filtro)) || (is_array($filtro) && in_array('importec8', $filtro)))
        $this->ValidateField_importec8($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepc8' == $filtro)) || (is_array($filtro) && in_array('importeepc8', $filtro)))
        $this->ValidateField_importeepc8($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusc8' == $filtro)) || (is_array($filtro) && in_array('estatusc8', $filtro)))
        $this->ValidateField_estatusc8($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'c9' == $filtro)) || (is_array($filtro) && in_array('c9', $filtro)))
        $this->ValidateField_c9($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importec9' == $filtro)) || (is_array($filtro) && in_array('importec9', $filtro)))
        $this->ValidateField_importec9($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeelc9' == $filtro)) || (is_array($filtro) && in_array('importeelc9', $filtro)))
        $this->ValidateField_importeelc9($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importeepc9' == $filtro)) || (is_array($filtro) && in_array('importeepc9', $filtro)))
        $this->ValidateField_importeepc9($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estatusc9' == $filtro)) || (is_array($filtro) && in_array('estatusc9', $filtro)))
        $this->ValidateField_estatusc9($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['control_formtarifa']['contr_erro'] = 'on';
if (!isset($this->sc_temp_TipoPago)) {$this->sc_temp_TipoPago = (isset($_SESSION['TipoPago'])) ? $_SESSION['TipoPago'] : "";}
if (!isset($this->sc_temp_Caseta)) {$this->sc_temp_Caseta = (isset($_SESSION['Caseta'])) ? $_SESSION['Caseta'] : "";}
if (!isset($this->sc_temp_FechaFinal)) {$this->sc_temp_FechaFinal = (isset($_SESSION['FechaFinal'])) ? $_SESSION['FechaFinal'] : "";}
if (!isset($this->sc_temp_FechaInicial)) {$this->sc_temp_FechaInicial = (isset($_SESSION['FechaInicial'])) ? $_SESSION['FechaInicial'] : "";}
 $FechaInicial = $this->sc_temp_FechaInicial;
$FechaFinal = $this->sc_temp_FechaFinal;
$Caseta = $this->sc_temp_Caseta;
$TipoPago = $this->sc_temp_TipoPago;	

$dia_hora =  time();
$fld_diag=date("Y-m-d", $dia_hora);
$fld_horag=date("H:i:s", $dia_hora);
$Fecha = $fld_diag." ".$fld_horag;

$check_sql = "SELECT 
	CasetaID,
	TipoPagoID,
	FechaInicio,
	FechaFin
FROM
	tarifa
WHERE
	CasetaID = $Caseta and TipoPagoID = '$TipoPago' and FechaFin > '$FechaInicial'
GROUP BY FechaInicio ORDER BY FechaInicio DESC LIMIT 1";

 
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

if (isset($this->rs[0][0])) {
	$check_sql = "UPDATE tarifa SET FechaFin = date_sub('$FechaInicial', INTERVAL 1 SECOND) WHERE CasetaID = $Caseta and TipoPagoID = '$TipoPago' and FechaFin = '".$this->rs[0][3]."'";
}
		else {
}



     $nm_select ="INSERT INTO tarifa(CasetaID, TramoID, TipoPagoID, VehiculoID, Importe, FechaInicio, FechaFin, ImporteEjeLigero, ImporteEjePesado, FechaCarga, Activo) VALUES  ($Caseta,0,'$TipoPago','T01A',$this->importea ,'$FechaInicial','$FechaFinal',$this->importeela ,$this->importeepa ,'$Fecha',$this->estatusa ), ($Caseta,0,'$TipoPago','T01M',$this->importem ,'$FechaInicial','$FechaFinal',$this->importeelm ,$this->importeepm ,'$Fecha',$this->estatusm ), ($Caseta,0,'$TipoPago','T02B',$this->importeb2 ,'$FechaInicial','$FechaFinal',$this->importeelb2 ,$this->importeepb2 ,'$Fecha',$this->estatusb2 ), ($Caseta,0,'$TipoPago','T03B',$this->importeb3 ,'$FechaInicial','$FechaFinal',$this->importeelb3 ,$this->importeepb3 ,'$Fecha',$this->estatusb3 ), ($Caseta,0,'$TipoPago','T04B',$this->importeb4 ,'$FechaInicial','$FechaFinal',$this->importeelb4 ,$this->importeepb4 ,'$Fecha',$this->estatusb4 ), ($Caseta,0,'$TipoPago','T02C',$this->importec2 ,'$FechaInicial','$FechaFinal',$this->importeelc2 ,$this->importeepc2 ,'$Fecha',$this->estatusc2 ), ($Caseta,0,'$TipoPago','T03C',$this->importec3 ,'$FechaInicial','$FechaFinal',$this->importeelc3 ,$this->importeepc3 ,'$Fecha',$this->estatusc3 ), ($Caseta,0,'$TipoPago','T04C',$this->importec4 ,'$FechaInicial','$FechaFinal',$this->importeelc4 ,$this->importeepc4 ,'$Fecha',$this->estatusc4 ), ($Caseta,0,'$TipoPago','T05C',$this->importec5 ,'$FechaInicial','$FechaFinal',$this->importeelc5 ,$this->importeepc5 ,'$Fecha',$this->estatusc5 ), ($Caseta,0,'$TipoPago','T06C',$this->importec6 ,'$FechaInicial','$FechaFinal',$this->importeelc6 ,$this->importeepc6 ,'$Fecha',$this->estatusc6 ), ($Caseta,0,'$TipoPago','T07C',$this->importec7 ,'$FechaInicial','$FechaFinal',$this->importeelc7 ,$this->importeepc7 ,'$Fecha',$this->estatusc7 ), ($Caseta,0,'$TipoPago','T08C',$this->importec8 ,'$FechaInicial','$FechaFinal',$this->importeelc8 ,$this->importeepc8 ,'$Fecha',$this->estatusc8 ), ($Caseta,0,'$TipoPago','T09C',$this->importec9 ,'$FechaInicial','$FechaFinal',$this->importeelc9 ,$this->importeepc9 ,'$Fecha',$this->estatusc9 )"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                control_formtarifa_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      

$this->nm_mens_alert[] = "Se han agregado las tarifas"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Se han agregado las tarifas"); }
if (isset($this->sc_temp_FechaInicial)) { $_SESSION['FechaInicial'] = $this->sc_temp_FechaInicial;}
if (isset($this->sc_temp_FechaFinal)) { $_SESSION['FechaFinal'] = $this->sc_temp_FechaFinal;}
if (isset($this->sc_temp_Caseta)) { $_SESSION['Caseta'] = $this->sc_temp_Caseta;}
if (isset($this->sc_temp_TipoPago)) { $_SESSION['TipoPago'] = $this->sc_temp_TipoPago;}
$_SESSION['scriptcase']['control_formtarifa']['contr_erro'] = 'off'; 
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
              $_SESSION['scriptcase']['control_formtarifa']['contr_erro'] = 'on';
 $this->NM_ajax_info['buttonDisplay']['ok'] = $this->nmgp_botoes["ok"] = "off";;
$_SESSION['scriptcase']['control_formtarifa']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_a(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->a) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "A " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['a']))
              {
                  $Campos_Erros['a'] = array();
              }
              $Campos_Erros['a'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['a']) || !is_array($this->NM_ajax_info['errList']['a']))
              {
                  $this->NM_ajax_info['errList']['a'] = array();
              }
              $this->NM_ajax_info['errList']['a'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'a';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_a

    function ValidateField_importea(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importea']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importea, $this->field_config['importea']['symbol_dec'], $this->field_config['importea']['symbol_grp'], $this->field_config['importea']['symbol_mon']); 
          nm_limpa_valor($this->importea, $this->field_config['importea']['symbol_dec'], $this->field_config['importea']['symbol_grp']) ; 
          if ('.' == substr($this->importea, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importea, 1)))
              {
                  $this->importea = '';
              }
              else
              {
                  $this->importea = '0' . $this->importea;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importea != '')  
          { 
              $iTestSize = 11;
              if ('-' == substr($this->importea, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importea, -1))
              {
                  $iTestSize++;
                  $this->importea = '-' . substr($this->importea, 0, -1);
              }
              if (strlen($this->importea) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importea']))
                  {
                      $Campos_Erros['importea'] = array();
                  }
                  $Campos_Erros['importea'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importea']) || !is_array($this->NM_ajax_info['errList']['importea']))
                  {
                      $this->NM_ajax_info['errList']['importea'] = array();
                  }
                  $this->NM_ajax_info['errList']['importea'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importea, 10, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importea']))
                  {
                      $Campos_Erros['importea'] = array();
                  }
                  $Campos_Erros['importea'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importea']) || !is_array($this->NM_ajax_info['errList']['importea']))
                  {
                      $this->NM_ajax_info['errList']['importea'] = array();
                  }
                  $this->NM_ajax_info['errList']['importea'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importea']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importea'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importea']))
              {
                  $Campos_Erros['importea'] = array();
              }
              $Campos_Erros['importea'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importea']) || !is_array($this->NM_ajax_info['errList']['importea']))
                  {
                      $this->NM_ajax_info['errList']['importea'] = array();
                  }
                  $this->NM_ajax_info['errList']['importea'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importea';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importea

    function ValidateField_importeela(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeela']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeela, $this->field_config['importeela']['symbol_dec'], $this->field_config['importeela']['symbol_grp'], $this->field_config['importeela']['symbol_mon']); 
          nm_limpa_valor($this->importeela, $this->field_config['importeela']['symbol_dec'], $this->field_config['importeela']['symbol_grp']) ; 
          if ('.' == substr($this->importeela, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeela, 1)))
              {
                  $this->importeela = '';
              }
              else
              {
                  $this->importeela = '0' . $this->importeela;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeela != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeela, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeela, -1))
              {
                  $iTestSize++;
                  $this->importeela = '-' . substr($this->importeela, 0, -1);
              }
              if (strlen($this->importeela) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeela']))
                  {
                      $Campos_Erros['importeela'] = array();
                  }
                  $Campos_Erros['importeela'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeela']) || !is_array($this->NM_ajax_info['errList']['importeela']))
                  {
                      $this->NM_ajax_info['errList']['importeela'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeela'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeela, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeela']))
                  {
                      $Campos_Erros['importeela'] = array();
                  }
                  $Campos_Erros['importeela'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeela']) || !is_array($this->NM_ajax_info['errList']['importeela']))
                  {
                      $this->NM_ajax_info['errList']['importeela'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeela'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeela']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeela'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeela']))
              {
                  $Campos_Erros['importeela'] = array();
              }
              $Campos_Erros['importeela'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeela']) || !is_array($this->NM_ajax_info['errList']['importeela']))
                  {
                      $this->NM_ajax_info['errList']['importeela'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeela'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeela';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeela

    function ValidateField_importeepa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepa']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepa, $this->field_config['importeepa']['symbol_dec'], $this->field_config['importeepa']['symbol_grp'], $this->field_config['importeepa']['symbol_mon']); 
          nm_limpa_valor($this->importeepa, $this->field_config['importeepa']['symbol_dec'], $this->field_config['importeepa']['symbol_grp']) ; 
          if ('.' == substr($this->importeepa, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepa, 1)))
              {
                  $this->importeepa = '';
              }
              else
              {
                  $this->importeepa = '0' . $this->importeepa;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepa != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepa, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepa, -1))
              {
                  $iTestSize++;
                  $this->importeepa = '-' . substr($this->importeepa, 0, -1);
              }
              if (strlen($this->importeepa) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepa']))
                  {
                      $Campos_Erros['importeepa'] = array();
                  }
                  $Campos_Erros['importeepa'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepa']) || !is_array($this->NM_ajax_info['errList']['importeepa']))
                  {
                      $this->NM_ajax_info['errList']['importeepa'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepa'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepa, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepa']))
                  {
                      $Campos_Erros['importeepa'] = array();
                  }
                  $Campos_Erros['importeepa'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepa']) || !is_array($this->NM_ajax_info['errList']['importeepa']))
                  {
                      $this->NM_ajax_info['errList']['importeepa'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepa'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepa'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepa']))
              {
                  $Campos_Erros['importeepa'] = array();
              }
              $Campos_Erros['importeepa'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepa']) || !is_array($this->NM_ajax_info['errList']['importeepa']))
                  {
                      $this->NM_ajax_info['errList']['importeepa'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepa'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepa

    function ValidateField_estatusa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusa == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusa'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusa']))
          {
              $Campos_Erros['estatusa'] = array();
          }
          $Campos_Erros['estatusa'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusa']) || !is_array($this->NM_ajax_info['errList']['estatusa']))
                  {
                      $this->NM_ajax_info['errList']['estatusa'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusa'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusa != "" && !in_array("estatusa", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusa']) && !in_array($this->estatusa, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusa']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusa']))
              {
                  $Campos_Erros['estatusa'] = array();
              }
              $Campos_Erros['estatusa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusa']) || !is_array($this->NM_ajax_info['errList']['estatusa']))
              {
                  $this->NM_ajax_info['errList']['estatusa'] = array();
              }
              $this->NM_ajax_info['errList']['estatusa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusa

    function ValidateField_m(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->m) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "M " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['m']))
              {
                  $Campos_Erros['m'] = array();
              }
              $Campos_Erros['m'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['m']) || !is_array($this->NM_ajax_info['errList']['m']))
              {
                  $this->NM_ajax_info['errList']['m'] = array();
              }
              $this->NM_ajax_info['errList']['m'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'm';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_m

    function ValidateField_importem(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importem']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importem, $this->field_config['importem']['symbol_dec'], $this->field_config['importem']['symbol_grp'], $this->field_config['importem']['symbol_mon']); 
          nm_limpa_valor($this->importem, $this->field_config['importem']['symbol_dec'], $this->field_config['importem']['symbol_grp']) ; 
          if ('.' == substr($this->importem, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importem, 1)))
              {
                  $this->importem = '';
              }
              else
              {
                  $this->importem = '0' . $this->importem;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importem != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importem, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importem, -1))
              {
                  $iTestSize++;
                  $this->importem = '-' . substr($this->importem, 0, -1);
              }
              if (strlen($this->importem) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importem']))
                  {
                      $Campos_Erros['importem'] = array();
                  }
                  $Campos_Erros['importem'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importem']) || !is_array($this->NM_ajax_info['errList']['importem']))
                  {
                      $this->NM_ajax_info['errList']['importem'] = array();
                  }
                  $this->NM_ajax_info['errList']['importem'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importem, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importem']))
                  {
                      $Campos_Erros['importem'] = array();
                  }
                  $Campos_Erros['importem'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importem']) || !is_array($this->NM_ajax_info['errList']['importem']))
                  {
                      $this->NM_ajax_info['errList']['importem'] = array();
                  }
                  $this->NM_ajax_info['errList']['importem'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importem']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importem'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importem']))
              {
                  $Campos_Erros['importem'] = array();
              }
              $Campos_Erros['importem'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importem']) || !is_array($this->NM_ajax_info['errList']['importem']))
                  {
                      $this->NM_ajax_info['errList']['importem'] = array();
                  }
                  $this->NM_ajax_info['errList']['importem'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importem';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importem

    function ValidateField_importeelm(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelm']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelm, $this->field_config['importeelm']['symbol_dec'], $this->field_config['importeelm']['symbol_grp'], $this->field_config['importeelm']['symbol_mon']); 
          nm_limpa_valor($this->importeelm, $this->field_config['importeelm']['symbol_dec'], $this->field_config['importeelm']['symbol_grp']) ; 
          if ('.' == substr($this->importeelm, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelm, 1)))
              {
                  $this->importeelm = '';
              }
              else
              {
                  $this->importeelm = '0' . $this->importeelm;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelm != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelm, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelm, -1))
              {
                  $iTestSize++;
                  $this->importeelm = '-' . substr($this->importeelm, 0, -1);
              }
              if (strlen($this->importeelm) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelm']))
                  {
                      $Campos_Erros['importeelm'] = array();
                  }
                  $Campos_Erros['importeelm'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelm']) || !is_array($this->NM_ajax_info['errList']['importeelm']))
                  {
                      $this->NM_ajax_info['errList']['importeelm'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelm'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelm, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelm']))
                  {
                      $Campos_Erros['importeelm'] = array();
                  }
                  $Campos_Erros['importeelm'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelm']) || !is_array($this->NM_ajax_info['errList']['importeelm']))
                  {
                      $this->NM_ajax_info['errList']['importeelm'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelm'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelm'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelm']))
              {
                  $Campos_Erros['importeelm'] = array();
              }
              $Campos_Erros['importeelm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelm']) || !is_array($this->NM_ajax_info['errList']['importeelm']))
                  {
                      $this->NM_ajax_info['errList']['importeelm'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelm';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelm

    function ValidateField_importeepm(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepm']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepm, $this->field_config['importeepm']['symbol_dec'], $this->field_config['importeepm']['symbol_grp'], $this->field_config['importeepm']['symbol_mon']); 
          nm_limpa_valor($this->importeepm, $this->field_config['importeepm']['symbol_dec'], $this->field_config['importeepm']['symbol_grp']) ; 
          if ('.' == substr($this->importeepm, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepm, 1)))
              {
                  $this->importeepm = '';
              }
              else
              {
                  $this->importeepm = '0' . $this->importeepm;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepm != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepm, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepm, -1))
              {
                  $iTestSize++;
                  $this->importeepm = '-' . substr($this->importeepm, 0, -1);
              }
              if (strlen($this->importeepm) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepm']))
                  {
                      $Campos_Erros['importeepm'] = array();
                  }
                  $Campos_Erros['importeepm'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepm']) || !is_array($this->NM_ajax_info['errList']['importeepm']))
                  {
                      $this->NM_ajax_info['errList']['importeepm'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepm'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepm, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepm']))
                  {
                      $Campos_Erros['importeepm'] = array();
                  }
                  $Campos_Erros['importeepm'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepm']) || !is_array($this->NM_ajax_info['errList']['importeepm']))
                  {
                      $this->NM_ajax_info['errList']['importeepm'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepm'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepm'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepm']))
              {
                  $Campos_Erros['importeepm'] = array();
              }
              $Campos_Erros['importeepm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepm']) || !is_array($this->NM_ajax_info['errList']['importeepm']))
                  {
                      $this->NM_ajax_info['errList']['importeepm'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepm';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepm

    function ValidateField_estatusm(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusm == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusm'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusm']))
          {
              $Campos_Erros['estatusm'] = array();
          }
          $Campos_Erros['estatusm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusm']) || !is_array($this->NM_ajax_info['errList']['estatusm']))
                  {
                      $this->NM_ajax_info['errList']['estatusm'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusm != "" && !in_array("estatusm", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusm']) && !in_array($this->estatusm, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusm']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusm']))
              {
                  $Campos_Erros['estatusm'] = array();
              }
              $Campos_Erros['estatusm'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusm']) || !is_array($this->NM_ajax_info['errList']['estatusm']))
              {
                  $this->NM_ajax_info['errList']['estatusm'] = array();
              }
              $this->NM_ajax_info['errList']['estatusm'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusm';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusm

    function ValidateField_b2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->b2) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "B2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['b2']))
              {
                  $Campos_Erros['b2'] = array();
              }
              $Campos_Erros['b2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['b2']) || !is_array($this->NM_ajax_info['errList']['b2']))
              {
                  $this->NM_ajax_info['errList']['b2'] = array();
              }
              $this->NM_ajax_info['errList']['b2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'b2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_b2

    function ValidateField_importeb2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeb2']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeb2, $this->field_config['importeb2']['symbol_dec'], $this->field_config['importeb2']['symbol_grp'], $this->field_config['importeb2']['symbol_mon']); 
          nm_limpa_valor($this->importeb2, $this->field_config['importeb2']['symbol_dec'], $this->field_config['importeb2']['symbol_grp']) ; 
          if ('.' == substr($this->importeb2, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeb2, 1)))
              {
                  $this->importeb2 = '';
              }
              else
              {
                  $this->importeb2 = '0' . $this->importeb2;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeb2 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeb2, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeb2, -1))
              {
                  $iTestSize++;
                  $this->importeb2 = '-' . substr($this->importeb2, 0, -1);
              }
              if (strlen($this->importeb2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeb2']))
                  {
                      $Campos_Erros['importeb2'] = array();
                  }
                  $Campos_Erros['importeb2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeb2']) || !is_array($this->NM_ajax_info['errList']['importeb2']))
                  {
                      $this->NM_ajax_info['errList']['importeb2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeb2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeb2, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importeb2']))
                  {
                      $Campos_Erros['importeb2'] = array();
                  }
                  $Campos_Erros['importeb2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeb2']) || !is_array($this->NM_ajax_info['errList']['importeb2']))
                  {
                      $this->NM_ajax_info['errList']['importeb2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeb2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeb2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeb2'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importeb2']))
              {
                  $Campos_Erros['importeb2'] = array();
              }
              $Campos_Erros['importeb2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeb2']) || !is_array($this->NM_ajax_info['errList']['importeb2']))
                  {
                      $this->NM_ajax_info['errList']['importeb2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeb2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeb2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeb2

    function ValidateField_importeelb2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelb2']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelb2, $this->field_config['importeelb2']['symbol_dec'], $this->field_config['importeelb2']['symbol_grp'], $this->field_config['importeelb2']['symbol_mon']); 
          nm_limpa_valor($this->importeelb2, $this->field_config['importeelb2']['symbol_dec'], $this->field_config['importeelb2']['symbol_grp']) ; 
          if ('.' == substr($this->importeelb2, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelb2, 1)))
              {
                  $this->importeelb2 = '';
              }
              else
              {
                  $this->importeelb2 = '0' . $this->importeelb2;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelb2 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelb2, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelb2, -1))
              {
                  $iTestSize++;
                  $this->importeelb2 = '-' . substr($this->importeelb2, 0, -1);
              }
              if (strlen($this->importeelb2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelb2']))
                  {
                      $Campos_Erros['importeelb2'] = array();
                  }
                  $Campos_Erros['importeelb2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelb2']) || !is_array($this->NM_ajax_info['errList']['importeelb2']))
                  {
                      $this->NM_ajax_info['errList']['importeelb2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelb2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelb2, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelb2']))
                  {
                      $Campos_Erros['importeelb2'] = array();
                  }
                  $Campos_Erros['importeelb2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelb2']) || !is_array($this->NM_ajax_info['errList']['importeelb2']))
                  {
                      $this->NM_ajax_info['errList']['importeelb2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelb2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelb2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelb2'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelb2']))
              {
                  $Campos_Erros['importeelb2'] = array();
              }
              $Campos_Erros['importeelb2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelb2']) || !is_array($this->NM_ajax_info['errList']['importeelb2']))
                  {
                      $this->NM_ajax_info['errList']['importeelb2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelb2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelb2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelb2

    function ValidateField_importeepb2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepb2']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepb2, $this->field_config['importeepb2']['symbol_dec'], $this->field_config['importeepb2']['symbol_grp'], $this->field_config['importeepb2']['symbol_mon']); 
          nm_limpa_valor($this->importeepb2, $this->field_config['importeepb2']['symbol_dec'], $this->field_config['importeepb2']['symbol_grp']) ; 
          if ('.' == substr($this->importeepb2, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepb2, 1)))
              {
                  $this->importeepb2 = '';
              }
              else
              {
                  $this->importeepb2 = '0' . $this->importeepb2;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepb2 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepb2, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepb2, -1))
              {
                  $iTestSize++;
                  $this->importeepb2 = '-' . substr($this->importeepb2, 0, -1);
              }
              if (strlen($this->importeepb2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepb2']))
                  {
                      $Campos_Erros['importeepb2'] = array();
                  }
                  $Campos_Erros['importeepb2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepb2']) || !is_array($this->NM_ajax_info['errList']['importeepb2']))
                  {
                      $this->NM_ajax_info['errList']['importeepb2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepb2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepb2, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepb2']))
                  {
                      $Campos_Erros['importeepb2'] = array();
                  }
                  $Campos_Erros['importeepb2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepb2']) || !is_array($this->NM_ajax_info['errList']['importeepb2']))
                  {
                      $this->NM_ajax_info['errList']['importeepb2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepb2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepb2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepb2'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepb2']))
              {
                  $Campos_Erros['importeepb2'] = array();
              }
              $Campos_Erros['importeepb2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepb2']) || !is_array($this->NM_ajax_info['errList']['importeepb2']))
                  {
                      $this->NM_ajax_info['errList']['importeepb2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepb2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepb2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepb2

    function ValidateField_estatusb2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusb2 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusb2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusb2'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusb2']))
          {
              $Campos_Erros['estatusb2'] = array();
          }
          $Campos_Erros['estatusb2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusb2']) || !is_array($this->NM_ajax_info['errList']['estatusb2']))
                  {
                      $this->NM_ajax_info['errList']['estatusb2'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusb2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusb2 != "" && !in_array("estatusb2", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb2']) && !in_array($this->estatusb2, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb2']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusb2']))
              {
                  $Campos_Erros['estatusb2'] = array();
              }
              $Campos_Erros['estatusb2'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusb2']) || !is_array($this->NM_ajax_info['errList']['estatusb2']))
              {
                  $this->NM_ajax_info['errList']['estatusb2'] = array();
              }
              $this->NM_ajax_info['errList']['estatusb2'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusb2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusb2

    function ValidateField_b3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->b3) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "B3 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['b3']))
              {
                  $Campos_Erros['b3'] = array();
              }
              $Campos_Erros['b3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['b3']) || !is_array($this->NM_ajax_info['errList']['b3']))
              {
                  $this->NM_ajax_info['errList']['b3'] = array();
              }
              $this->NM_ajax_info['errList']['b3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'b3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_b3

    function ValidateField_importeb3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeb3']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeb3, $this->field_config['importeb3']['symbol_dec'], $this->field_config['importeb3']['symbol_grp'], $this->field_config['importeb3']['symbol_mon']); 
          nm_limpa_valor($this->importeb3, $this->field_config['importeb3']['symbol_dec'], $this->field_config['importeb3']['symbol_grp']) ; 
          if ('.' == substr($this->importeb3, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeb3, 1)))
              {
                  $this->importeb3 = '';
              }
              else
              {
                  $this->importeb3 = '0' . $this->importeb3;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeb3 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeb3, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeb3, -1))
              {
                  $iTestSize++;
                  $this->importeb3 = '-' . substr($this->importeb3, 0, -1);
              }
              if (strlen($this->importeb3) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeb3']))
                  {
                      $Campos_Erros['importeb3'] = array();
                  }
                  $Campos_Erros['importeb3'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeb3']) || !is_array($this->NM_ajax_info['errList']['importeb3']))
                  {
                      $this->NM_ajax_info['errList']['importeb3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeb3'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeb3, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importeb3']))
                  {
                      $Campos_Erros['importeb3'] = array();
                  }
                  $Campos_Erros['importeb3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeb3']) || !is_array($this->NM_ajax_info['errList']['importeb3']))
                  {
                      $this->NM_ajax_info['errList']['importeb3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeb3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeb3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeb3'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importeb3']))
              {
                  $Campos_Erros['importeb3'] = array();
              }
              $Campos_Erros['importeb3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeb3']) || !is_array($this->NM_ajax_info['errList']['importeb3']))
                  {
                      $this->NM_ajax_info['errList']['importeb3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeb3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeb3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeb3

    function ValidateField_importeelb3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelb3']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelb3, $this->field_config['importeelb3']['symbol_dec'], $this->field_config['importeelb3']['symbol_grp'], $this->field_config['importeelb3']['symbol_mon']); 
          nm_limpa_valor($this->importeelb3, $this->field_config['importeelb3']['symbol_dec'], $this->field_config['importeelb3']['symbol_grp']) ; 
          if ('.' == substr($this->importeelb3, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelb3, 1)))
              {
                  $this->importeelb3 = '';
              }
              else
              {
                  $this->importeelb3 = '0' . $this->importeelb3;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelb3 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelb3, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelb3, -1))
              {
                  $iTestSize++;
                  $this->importeelb3 = '-' . substr($this->importeelb3, 0, -1);
              }
              if (strlen($this->importeelb3) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelb3']))
                  {
                      $Campos_Erros['importeelb3'] = array();
                  }
                  $Campos_Erros['importeelb3'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelb3']) || !is_array($this->NM_ajax_info['errList']['importeelb3']))
                  {
                      $this->NM_ajax_info['errList']['importeelb3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelb3'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelb3, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelb3']))
                  {
                      $Campos_Erros['importeelb3'] = array();
                  }
                  $Campos_Erros['importeelb3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelb3']) || !is_array($this->NM_ajax_info['errList']['importeelb3']))
                  {
                      $this->NM_ajax_info['errList']['importeelb3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelb3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelb3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelb3'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelb3']))
              {
                  $Campos_Erros['importeelb3'] = array();
              }
              $Campos_Erros['importeelb3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelb3']) || !is_array($this->NM_ajax_info['errList']['importeelb3']))
                  {
                      $this->NM_ajax_info['errList']['importeelb3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelb3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelb3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelb3

    function ValidateField_importeepb3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepb3']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepb3, $this->field_config['importeepb3']['symbol_dec'], $this->field_config['importeepb3']['symbol_grp'], $this->field_config['importeepb3']['symbol_mon']); 
          nm_limpa_valor($this->importeepb3, $this->field_config['importeepb3']['symbol_dec'], $this->field_config['importeepb3']['symbol_grp']) ; 
          if ('.' == substr($this->importeepb3, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepb3, 1)))
              {
                  $this->importeepb3 = '';
              }
              else
              {
                  $this->importeepb3 = '0' . $this->importeepb3;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepb3 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepb3, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepb3, -1))
              {
                  $iTestSize++;
                  $this->importeepb3 = '-' . substr($this->importeepb3, 0, -1);
              }
              if (strlen($this->importeepb3) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepb3']))
                  {
                      $Campos_Erros['importeepb3'] = array();
                  }
                  $Campos_Erros['importeepb3'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepb3']) || !is_array($this->NM_ajax_info['errList']['importeepb3']))
                  {
                      $this->NM_ajax_info['errList']['importeepb3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepb3'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepb3, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepb3']))
                  {
                      $Campos_Erros['importeepb3'] = array();
                  }
                  $Campos_Erros['importeepb3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepb3']) || !is_array($this->NM_ajax_info['errList']['importeepb3']))
                  {
                      $this->NM_ajax_info['errList']['importeepb3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepb3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepb3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepb3'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepb3']))
              {
                  $Campos_Erros['importeepb3'] = array();
              }
              $Campos_Erros['importeepb3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepb3']) || !is_array($this->NM_ajax_info['errList']['importeepb3']))
                  {
                      $this->NM_ajax_info['errList']['importeepb3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepb3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepb3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepb3

    function ValidateField_estatusb3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusb3 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusb3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusb3'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusb3']))
          {
              $Campos_Erros['estatusb3'] = array();
          }
          $Campos_Erros['estatusb3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusb3']) || !is_array($this->NM_ajax_info['errList']['estatusb3']))
                  {
                      $this->NM_ajax_info['errList']['estatusb3'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusb3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusb3 != "" && !in_array("estatusb3", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb3']) && !in_array($this->estatusb3, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb3']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusb3']))
              {
                  $Campos_Erros['estatusb3'] = array();
              }
              $Campos_Erros['estatusb3'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusb3']) || !is_array($this->NM_ajax_info['errList']['estatusb3']))
              {
                  $this->NM_ajax_info['errList']['estatusb3'] = array();
              }
              $this->NM_ajax_info['errList']['estatusb3'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusb3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusb3

    function ValidateField_b4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->b4) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "B4 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['b4']))
              {
                  $Campos_Erros['b4'] = array();
              }
              $Campos_Erros['b4'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['b4']) || !is_array($this->NM_ajax_info['errList']['b4']))
              {
                  $this->NM_ajax_info['errList']['b4'] = array();
              }
              $this->NM_ajax_info['errList']['b4'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'b4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_b4

    function ValidateField_importeb4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeb4']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeb4, $this->field_config['importeb4']['symbol_dec'], $this->field_config['importeb4']['symbol_grp'], $this->field_config['importeb4']['symbol_mon']); 
          nm_limpa_valor($this->importeb4, $this->field_config['importeb4']['symbol_dec'], $this->field_config['importeb4']['symbol_grp']) ; 
          if ('.' == substr($this->importeb4, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeb4, 1)))
              {
                  $this->importeb4 = '';
              }
              else
              {
                  $this->importeb4 = '0' . $this->importeb4;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeb4 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeb4, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeb4, -1))
              {
                  $iTestSize++;
                  $this->importeb4 = '-' . substr($this->importeb4, 0, -1);
              }
              if (strlen($this->importeb4) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeb4']))
                  {
                      $Campos_Erros['importeb4'] = array();
                  }
                  $Campos_Erros['importeb4'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeb4']) || !is_array($this->NM_ajax_info['errList']['importeb4']))
                  {
                      $this->NM_ajax_info['errList']['importeb4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeb4'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeb4, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importeb4']))
                  {
                      $Campos_Erros['importeb4'] = array();
                  }
                  $Campos_Erros['importeb4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeb4']) || !is_array($this->NM_ajax_info['errList']['importeb4']))
                  {
                      $this->NM_ajax_info['errList']['importeb4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeb4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeb4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeb4'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importeb4']))
              {
                  $Campos_Erros['importeb4'] = array();
              }
              $Campos_Erros['importeb4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeb4']) || !is_array($this->NM_ajax_info['errList']['importeb4']))
                  {
                      $this->NM_ajax_info['errList']['importeb4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeb4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeb4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeb4

    function ValidateField_importeelb4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelb4']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelb4, $this->field_config['importeelb4']['symbol_dec'], $this->field_config['importeelb4']['symbol_grp'], $this->field_config['importeelb4']['symbol_mon']); 
          nm_limpa_valor($this->importeelb4, $this->field_config['importeelb4']['symbol_dec'], $this->field_config['importeelb4']['symbol_grp']) ; 
          if ('.' == substr($this->importeelb4, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelb4, 1)))
              {
                  $this->importeelb4 = '';
              }
              else
              {
                  $this->importeelb4 = '0' . $this->importeelb4;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelb4 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelb4, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelb4, -1))
              {
                  $iTestSize++;
                  $this->importeelb4 = '-' . substr($this->importeelb4, 0, -1);
              }
              if (strlen($this->importeelb4) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelb4']))
                  {
                      $Campos_Erros['importeelb4'] = array();
                  }
                  $Campos_Erros['importeelb4'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelb4']) || !is_array($this->NM_ajax_info['errList']['importeelb4']))
                  {
                      $this->NM_ajax_info['errList']['importeelb4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelb4'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelb4, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelb4']))
                  {
                      $Campos_Erros['importeelb4'] = array();
                  }
                  $Campos_Erros['importeelb4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelb4']) || !is_array($this->NM_ajax_info['errList']['importeelb4']))
                  {
                      $this->NM_ajax_info['errList']['importeelb4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelb4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelb4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelb4'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelb4']))
              {
                  $Campos_Erros['importeelb4'] = array();
              }
              $Campos_Erros['importeelb4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelb4']) || !is_array($this->NM_ajax_info['errList']['importeelb4']))
                  {
                      $this->NM_ajax_info['errList']['importeelb4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelb4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelb4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelb4

    function ValidateField_importeepb4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepb4']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepb4, $this->field_config['importeepb4']['symbol_dec'], $this->field_config['importeepb4']['symbol_grp'], $this->field_config['importeepb4']['symbol_mon']); 
          nm_limpa_valor($this->importeepb4, $this->field_config['importeepb4']['symbol_dec'], $this->field_config['importeepb4']['symbol_grp']) ; 
          if ('.' == substr($this->importeepb4, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepb4, 1)))
              {
                  $this->importeepb4 = '';
              }
              else
              {
                  $this->importeepb4 = '0' . $this->importeepb4;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepb4 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepb4, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepb4, -1))
              {
                  $iTestSize++;
                  $this->importeepb4 = '-' . substr($this->importeepb4, 0, -1);
              }
              if (strlen($this->importeepb4) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepb4']))
                  {
                      $Campos_Erros['importeepb4'] = array();
                  }
                  $Campos_Erros['importeepb4'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepb4']) || !is_array($this->NM_ajax_info['errList']['importeepb4']))
                  {
                      $this->NM_ajax_info['errList']['importeepb4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepb4'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepb4, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepb4']))
                  {
                      $Campos_Erros['importeepb4'] = array();
                  }
                  $Campos_Erros['importeepb4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepb4']) || !is_array($this->NM_ajax_info['errList']['importeepb4']))
                  {
                      $this->NM_ajax_info['errList']['importeepb4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepb4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepb4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepb4'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepb4']))
              {
                  $Campos_Erros['importeepb4'] = array();
              }
              $Campos_Erros['importeepb4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepb4']) || !is_array($this->NM_ajax_info['errList']['importeepb4']))
                  {
                      $this->NM_ajax_info['errList']['importeepb4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepb4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepb4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepb4

    function ValidateField_estatusb4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusb4 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusb4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusb4'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "EstatusB4" ; 
          if (!isset($Campos_Erros['estatusb4']))
          {
              $Campos_Erros['estatusb4'] = array();
          }
          $Campos_Erros['estatusb4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusb4']) || !is_array($this->NM_ajax_info['errList']['estatusb4']))
                  {
                      $this->NM_ajax_info['errList']['estatusb4'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusb4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusb4 != "" && !in_array("estatusb4", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb4']) && !in_array($this->estatusb4, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb4']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusb4']))
              {
                  $Campos_Erros['estatusb4'] = array();
              }
              $Campos_Erros['estatusb4'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusb4']) || !is_array($this->NM_ajax_info['errList']['estatusb4']))
              {
                  $this->NM_ajax_info['errList']['estatusb4'] = array();
              }
              $this->NM_ajax_info['errList']['estatusb4'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusb4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusb4

    function ValidateField_c2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->c2) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "C2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['c2']))
              {
                  $Campos_Erros['c2'] = array();
              }
              $Campos_Erros['c2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['c2']) || !is_array($this->NM_ajax_info['errList']['c2']))
              {
                  $this->NM_ajax_info['errList']['c2'] = array();
              }
              $this->NM_ajax_info['errList']['c2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'c2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_c2

    function ValidateField_importec2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importec2']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importec2, $this->field_config['importec2']['symbol_dec'], $this->field_config['importec2']['symbol_grp'], $this->field_config['importec2']['symbol_mon']); 
          nm_limpa_valor($this->importec2, $this->field_config['importec2']['symbol_dec'], $this->field_config['importec2']['symbol_grp']) ; 
          if ('.' == substr($this->importec2, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importec2, 1)))
              {
                  $this->importec2 = '';
              }
              else
              {
                  $this->importec2 = '0' . $this->importec2;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importec2 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importec2, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importec2, -1))
              {
                  $iTestSize++;
                  $this->importec2 = '-' . substr($this->importec2, 0, -1);
              }
              if (strlen($this->importec2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importec2']))
                  {
                      $Campos_Erros['importec2'] = array();
                  }
                  $Campos_Erros['importec2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importec2']) || !is_array($this->NM_ajax_info['errList']['importec2']))
                  {
                      $this->NM_ajax_info['errList']['importec2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importec2, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importec2']))
                  {
                      $Campos_Erros['importec2'] = array();
                  }
                  $Campos_Erros['importec2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importec2']) || !is_array($this->NM_ajax_info['errList']['importec2']))
                  {
                      $this->NM_ajax_info['errList']['importec2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec2'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importec2']))
              {
                  $Campos_Erros['importec2'] = array();
              }
              $Campos_Erros['importec2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importec2']) || !is_array($this->NM_ajax_info['errList']['importec2']))
                  {
                      $this->NM_ajax_info['errList']['importec2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importec2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importec2

    function ValidateField_importeelc2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelc2']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelc2, $this->field_config['importeelc2']['symbol_dec'], $this->field_config['importeelc2']['symbol_grp'], $this->field_config['importeelc2']['symbol_mon']); 
          nm_limpa_valor($this->importeelc2, $this->field_config['importeelc2']['symbol_dec'], $this->field_config['importeelc2']['symbol_grp']) ; 
          if ('.' == substr($this->importeelc2, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelc2, 1)))
              {
                  $this->importeelc2 = '';
              }
              else
              {
                  $this->importeelc2 = '0' . $this->importeelc2;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelc2 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelc2, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelc2, -1))
              {
                  $iTestSize++;
                  $this->importeelc2 = '-' . substr($this->importeelc2, 0, -1);
              }
              if (strlen($this->importeelc2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelc2']))
                  {
                      $Campos_Erros['importeelc2'] = array();
                  }
                  $Campos_Erros['importeelc2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc2']) || !is_array($this->NM_ajax_info['errList']['importeelc2']))
                  {
                      $this->NM_ajax_info['errList']['importeelc2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelc2, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelc2']))
                  {
                      $Campos_Erros['importeelc2'] = array();
                  }
                  $Campos_Erros['importeelc2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelc2']) || !is_array($this->NM_ajax_info['errList']['importeelc2']))
                  {
                      $this->NM_ajax_info['errList']['importeelc2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc2'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelc2']))
              {
                  $Campos_Erros['importeelc2'] = array();
              }
              $Campos_Erros['importeelc2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc2']) || !is_array($this->NM_ajax_info['errList']['importeelc2']))
                  {
                      $this->NM_ajax_info['errList']['importeelc2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelc2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelc2

    function ValidateField_importeepc2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepc2']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepc2, $this->field_config['importeepc2']['symbol_dec'], $this->field_config['importeepc2']['symbol_grp'], $this->field_config['importeepc2']['symbol_mon']); 
          nm_limpa_valor($this->importeepc2, $this->field_config['importeepc2']['symbol_dec'], $this->field_config['importeepc2']['symbol_grp']) ; 
          if ('.' == substr($this->importeepc2, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepc2, 1)))
              {
                  $this->importeepc2 = '';
              }
              else
              {
                  $this->importeepc2 = '0' . $this->importeepc2;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepc2 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepc2, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepc2, -1))
              {
                  $iTestSize++;
                  $this->importeepc2 = '-' . substr($this->importeepc2, 0, -1);
              }
              if (strlen($this->importeepc2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepc2']))
                  {
                      $Campos_Erros['importeepc2'] = array();
                  }
                  $Campos_Erros['importeepc2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc2']) || !is_array($this->NM_ajax_info['errList']['importeepc2']))
                  {
                      $this->NM_ajax_info['errList']['importeepc2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepc2, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepc2']))
                  {
                      $Campos_Erros['importeepc2'] = array();
                  }
                  $Campos_Erros['importeepc2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepc2']) || !is_array($this->NM_ajax_info['errList']['importeepc2']))
                  {
                      $this->NM_ajax_info['errList']['importeepc2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc2'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepc2']))
              {
                  $Campos_Erros['importeepc2'] = array();
              }
              $Campos_Erros['importeepc2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc2']) || !is_array($this->NM_ajax_info['errList']['importeepc2']))
                  {
                      $this->NM_ajax_info['errList']['importeepc2'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepc2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepc2

    function ValidateField_estatusc2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusc2 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc2'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusc2']))
          {
              $Campos_Erros['estatusc2'] = array();
          }
          $Campos_Erros['estatusc2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusc2']) || !is_array($this->NM_ajax_info['errList']['estatusc2']))
                  {
                      $this->NM_ajax_info['errList']['estatusc2'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusc2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusc2 != "" && !in_array("estatusc2", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc2']) && !in_array($this->estatusc2, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc2']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusc2']))
              {
                  $Campos_Erros['estatusc2'] = array();
              }
              $Campos_Erros['estatusc2'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusc2']) || !is_array($this->NM_ajax_info['errList']['estatusc2']))
              {
                  $this->NM_ajax_info['errList']['estatusc2'] = array();
              }
              $this->NM_ajax_info['errList']['estatusc2'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusc2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusc2

    function ValidateField_c3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->c3) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "C3 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['c3']))
              {
                  $Campos_Erros['c3'] = array();
              }
              $Campos_Erros['c3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['c3']) || !is_array($this->NM_ajax_info['errList']['c3']))
              {
                  $this->NM_ajax_info['errList']['c3'] = array();
              }
              $this->NM_ajax_info['errList']['c3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'c3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_c3

    function ValidateField_importec3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importec3']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importec3, $this->field_config['importec3']['symbol_dec'], $this->field_config['importec3']['symbol_grp'], $this->field_config['importec3']['symbol_mon']); 
          nm_limpa_valor($this->importec3, $this->field_config['importec3']['symbol_dec'], $this->field_config['importec3']['symbol_grp']) ; 
          if ('.' == substr($this->importec3, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importec3, 1)))
              {
                  $this->importec3 = '';
              }
              else
              {
                  $this->importec3 = '0' . $this->importec3;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importec3 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importec3, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importec3, -1))
              {
                  $iTestSize++;
                  $this->importec3 = '-' . substr($this->importec3, 0, -1);
              }
              if (strlen($this->importec3) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importec3']))
                  {
                      $Campos_Erros['importec3'] = array();
                  }
                  $Campos_Erros['importec3'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importec3']) || !is_array($this->NM_ajax_info['errList']['importec3']))
                  {
                      $this->NM_ajax_info['errList']['importec3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec3'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importec3, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importec3']))
                  {
                      $Campos_Erros['importec3'] = array();
                  }
                  $Campos_Erros['importec3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importec3']) || !is_array($this->NM_ajax_info['errList']['importec3']))
                  {
                      $this->NM_ajax_info['errList']['importec3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec3'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importec3']))
              {
                  $Campos_Erros['importec3'] = array();
              }
              $Campos_Erros['importec3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importec3']) || !is_array($this->NM_ajax_info['errList']['importec3']))
                  {
                      $this->NM_ajax_info['errList']['importec3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importec3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importec3

    function ValidateField_importeelc3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelc3']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelc3, $this->field_config['importeelc3']['symbol_dec'], $this->field_config['importeelc3']['symbol_grp'], $this->field_config['importeelc3']['symbol_mon']); 
          nm_limpa_valor($this->importeelc3, $this->field_config['importeelc3']['symbol_dec'], $this->field_config['importeelc3']['symbol_grp']) ; 
          if ('.' == substr($this->importeelc3, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelc3, 1)))
              {
                  $this->importeelc3 = '';
              }
              else
              {
                  $this->importeelc3 = '0' . $this->importeelc3;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelc3 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelc3, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelc3, -1))
              {
                  $iTestSize++;
                  $this->importeelc3 = '-' . substr($this->importeelc3, 0, -1);
              }
              if (strlen($this->importeelc3) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelc3']))
                  {
                      $Campos_Erros['importeelc3'] = array();
                  }
                  $Campos_Erros['importeelc3'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc3']) || !is_array($this->NM_ajax_info['errList']['importeelc3']))
                  {
                      $this->NM_ajax_info['errList']['importeelc3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc3'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelc3, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelc3']))
                  {
                      $Campos_Erros['importeelc3'] = array();
                  }
                  $Campos_Erros['importeelc3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelc3']) || !is_array($this->NM_ajax_info['errList']['importeelc3']))
                  {
                      $this->NM_ajax_info['errList']['importeelc3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc3'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelc3']))
              {
                  $Campos_Erros['importeelc3'] = array();
              }
              $Campos_Erros['importeelc3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc3']) || !is_array($this->NM_ajax_info['errList']['importeelc3']))
                  {
                      $this->NM_ajax_info['errList']['importeelc3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelc3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelc3

    function ValidateField_importeepc3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepc3']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepc3, $this->field_config['importeepc3']['symbol_dec'], $this->field_config['importeepc3']['symbol_grp'], $this->field_config['importeepc3']['symbol_mon']); 
          nm_limpa_valor($this->importeepc3, $this->field_config['importeepc3']['symbol_dec'], $this->field_config['importeepc3']['symbol_grp']) ; 
          if ('.' == substr($this->importeepc3, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepc3, 1)))
              {
                  $this->importeepc3 = '';
              }
              else
              {
                  $this->importeepc3 = '0' . $this->importeepc3;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepc3 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepc3, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepc3, -1))
              {
                  $iTestSize++;
                  $this->importeepc3 = '-' . substr($this->importeepc3, 0, -1);
              }
              if (strlen($this->importeepc3) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepc3']))
                  {
                      $Campos_Erros['importeepc3'] = array();
                  }
                  $Campos_Erros['importeepc3'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc3']) || !is_array($this->NM_ajax_info['errList']['importeepc3']))
                  {
                      $this->NM_ajax_info['errList']['importeepc3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc3'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepc3, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepc3']))
                  {
                      $Campos_Erros['importeepc3'] = array();
                  }
                  $Campos_Erros['importeepc3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepc3']) || !is_array($this->NM_ajax_info['errList']['importeepc3']))
                  {
                      $this->NM_ajax_info['errList']['importeepc3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc3'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepc3']))
              {
                  $Campos_Erros['importeepc3'] = array();
              }
              $Campos_Erros['importeepc3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc3']) || !is_array($this->NM_ajax_info['errList']['importeepc3']))
                  {
                      $this->NM_ajax_info['errList']['importeepc3'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepc3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepc3

    function ValidateField_estatusc3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusc3 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc3'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusc3']))
          {
              $Campos_Erros['estatusc3'] = array();
          }
          $Campos_Erros['estatusc3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusc3']) || !is_array($this->NM_ajax_info['errList']['estatusc3']))
                  {
                      $this->NM_ajax_info['errList']['estatusc3'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusc3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusc3 != "" && !in_array("estatusc3", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc3']) && !in_array($this->estatusc3, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc3']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusc3']))
              {
                  $Campos_Erros['estatusc3'] = array();
              }
              $Campos_Erros['estatusc3'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusc3']) || !is_array($this->NM_ajax_info['errList']['estatusc3']))
              {
                  $this->NM_ajax_info['errList']['estatusc3'] = array();
              }
              $this->NM_ajax_info['errList']['estatusc3'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusc3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusc3

    function ValidateField_c4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->c4) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "C4 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['c4']))
              {
                  $Campos_Erros['c4'] = array();
              }
              $Campos_Erros['c4'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['c4']) || !is_array($this->NM_ajax_info['errList']['c4']))
              {
                  $this->NM_ajax_info['errList']['c4'] = array();
              }
              $this->NM_ajax_info['errList']['c4'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'c4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_c4

    function ValidateField_importec4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importec4']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importec4, $this->field_config['importec4']['symbol_dec'], $this->field_config['importec4']['symbol_grp'], $this->field_config['importec4']['symbol_mon']); 
          nm_limpa_valor($this->importec4, $this->field_config['importec4']['symbol_dec'], $this->field_config['importec4']['symbol_grp']) ; 
          if ('.' == substr($this->importec4, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importec4, 1)))
              {
                  $this->importec4 = '';
              }
              else
              {
                  $this->importec4 = '0' . $this->importec4;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importec4 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importec4, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importec4, -1))
              {
                  $iTestSize++;
                  $this->importec4 = '-' . substr($this->importec4, 0, -1);
              }
              if (strlen($this->importec4) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importec4']))
                  {
                      $Campos_Erros['importec4'] = array();
                  }
                  $Campos_Erros['importec4'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importec4']) || !is_array($this->NM_ajax_info['errList']['importec4']))
                  {
                      $this->NM_ajax_info['errList']['importec4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec4'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importec4, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importec4']))
                  {
                      $Campos_Erros['importec4'] = array();
                  }
                  $Campos_Erros['importec4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importec4']) || !is_array($this->NM_ajax_info['errList']['importec4']))
                  {
                      $this->NM_ajax_info['errList']['importec4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec4'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importec4']))
              {
                  $Campos_Erros['importec4'] = array();
              }
              $Campos_Erros['importec4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importec4']) || !is_array($this->NM_ajax_info['errList']['importec4']))
                  {
                      $this->NM_ajax_info['errList']['importec4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importec4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importec4

    function ValidateField_importeelc4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelc4']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelc4, $this->field_config['importeelc4']['symbol_dec'], $this->field_config['importeelc4']['symbol_grp'], $this->field_config['importeelc4']['symbol_mon']); 
          nm_limpa_valor($this->importeelc4, $this->field_config['importeelc4']['symbol_dec'], $this->field_config['importeelc4']['symbol_grp']) ; 
          if ('.' == substr($this->importeelc4, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelc4, 1)))
              {
                  $this->importeelc4 = '';
              }
              else
              {
                  $this->importeelc4 = '0' . $this->importeelc4;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelc4 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelc4, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelc4, -1))
              {
                  $iTestSize++;
                  $this->importeelc4 = '-' . substr($this->importeelc4, 0, -1);
              }
              if (strlen($this->importeelc4) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelc4']))
                  {
                      $Campos_Erros['importeelc4'] = array();
                  }
                  $Campos_Erros['importeelc4'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc4']) || !is_array($this->NM_ajax_info['errList']['importeelc4']))
                  {
                      $this->NM_ajax_info['errList']['importeelc4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc4'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelc4, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelc4']))
                  {
                      $Campos_Erros['importeelc4'] = array();
                  }
                  $Campos_Erros['importeelc4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelc4']) || !is_array($this->NM_ajax_info['errList']['importeelc4']))
                  {
                      $this->NM_ajax_info['errList']['importeelc4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc4'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelc4']))
              {
                  $Campos_Erros['importeelc4'] = array();
              }
              $Campos_Erros['importeelc4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc4']) || !is_array($this->NM_ajax_info['errList']['importeelc4']))
                  {
                      $this->NM_ajax_info['errList']['importeelc4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelc4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelc4

    function ValidateField_importeepc4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepc4']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepc4, $this->field_config['importeepc4']['symbol_dec'], $this->field_config['importeepc4']['symbol_grp'], $this->field_config['importeepc4']['symbol_mon']); 
          nm_limpa_valor($this->importeepc4, $this->field_config['importeepc4']['symbol_dec'], $this->field_config['importeepc4']['symbol_grp']) ; 
          if ('.' == substr($this->importeepc4, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepc4, 1)))
              {
                  $this->importeepc4 = '';
              }
              else
              {
                  $this->importeepc4 = '0' . $this->importeepc4;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepc4 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepc4, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepc4, -1))
              {
                  $iTestSize++;
                  $this->importeepc4 = '-' . substr($this->importeepc4, 0, -1);
              }
              if (strlen($this->importeepc4) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepc4']))
                  {
                      $Campos_Erros['importeepc4'] = array();
                  }
                  $Campos_Erros['importeepc4'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc4']) || !is_array($this->NM_ajax_info['errList']['importeepc4']))
                  {
                      $this->NM_ajax_info['errList']['importeepc4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc4'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepc4, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepc4']))
                  {
                      $Campos_Erros['importeepc4'] = array();
                  }
                  $Campos_Erros['importeepc4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepc4']) || !is_array($this->NM_ajax_info['errList']['importeepc4']))
                  {
                      $this->NM_ajax_info['errList']['importeepc4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc4'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepc4']))
              {
                  $Campos_Erros['importeepc4'] = array();
              }
              $Campos_Erros['importeepc4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc4']) || !is_array($this->NM_ajax_info['errList']['importeepc4']))
                  {
                      $this->NM_ajax_info['errList']['importeepc4'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepc4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepc4

    function ValidateField_estatusc4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusc4 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc4'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusc4']))
          {
              $Campos_Erros['estatusc4'] = array();
          }
          $Campos_Erros['estatusc4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusc4']) || !is_array($this->NM_ajax_info['errList']['estatusc4']))
                  {
                      $this->NM_ajax_info['errList']['estatusc4'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusc4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusc4 != "" && !in_array("estatusc4", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc4']) && !in_array($this->estatusc4, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc4']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusc4']))
              {
                  $Campos_Erros['estatusc4'] = array();
              }
              $Campos_Erros['estatusc4'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusc4']) || !is_array($this->NM_ajax_info['errList']['estatusc4']))
              {
                  $this->NM_ajax_info['errList']['estatusc4'] = array();
              }
              $this->NM_ajax_info['errList']['estatusc4'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusc4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusc4

    function ValidateField_c5(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->c5) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "C5 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['c5']))
              {
                  $Campos_Erros['c5'] = array();
              }
              $Campos_Erros['c5'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['c5']) || !is_array($this->NM_ajax_info['errList']['c5']))
              {
                  $this->NM_ajax_info['errList']['c5'] = array();
              }
              $this->NM_ajax_info['errList']['c5'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'c5';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_c5

    function ValidateField_importec5(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importec5']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importec5, $this->field_config['importec5']['symbol_dec'], $this->field_config['importec5']['symbol_grp'], $this->field_config['importec5']['symbol_mon']); 
          nm_limpa_valor($this->importec5, $this->field_config['importec5']['symbol_dec'], $this->field_config['importec5']['symbol_grp']) ; 
          if ('.' == substr($this->importec5, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importec5, 1)))
              {
                  $this->importec5 = '';
              }
              else
              {
                  $this->importec5 = '0' . $this->importec5;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importec5 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importec5, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importec5, -1))
              {
                  $iTestSize++;
                  $this->importec5 = '-' . substr($this->importec5, 0, -1);
              }
              if (strlen($this->importec5) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importec5']))
                  {
                      $Campos_Erros['importec5'] = array();
                  }
                  $Campos_Erros['importec5'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importec5']) || !is_array($this->NM_ajax_info['errList']['importec5']))
                  {
                      $this->NM_ajax_info['errList']['importec5'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec5'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importec5, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importec5']))
                  {
                      $Campos_Erros['importec5'] = array();
                  }
                  $Campos_Erros['importec5'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importec5']) || !is_array($this->NM_ajax_info['errList']['importec5']))
                  {
                      $this->NM_ajax_info['errList']['importec5'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec5'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec5']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec5'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importec5']))
              {
                  $Campos_Erros['importec5'] = array();
              }
              $Campos_Erros['importec5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importec5']) || !is_array($this->NM_ajax_info['errList']['importec5']))
                  {
                      $this->NM_ajax_info['errList']['importec5'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importec5';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importec5

    function ValidateField_importeelc5(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelc5']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelc5, $this->field_config['importeelc5']['symbol_dec'], $this->field_config['importeelc5']['symbol_grp'], $this->field_config['importeelc5']['symbol_mon']); 
          nm_limpa_valor($this->importeelc5, $this->field_config['importeelc5']['symbol_dec'], $this->field_config['importeelc5']['symbol_grp']) ; 
          if ('.' == substr($this->importeelc5, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelc5, 1)))
              {
                  $this->importeelc5 = '';
              }
              else
              {
                  $this->importeelc5 = '0' . $this->importeelc5;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelc5 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelc5, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelc5, -1))
              {
                  $iTestSize++;
                  $this->importeelc5 = '-' . substr($this->importeelc5, 0, -1);
              }
              if (strlen($this->importeelc5) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelc5']))
                  {
                      $Campos_Erros['importeelc5'] = array();
                  }
                  $Campos_Erros['importeelc5'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc5']) || !is_array($this->NM_ajax_info['errList']['importeelc5']))
                  {
                      $this->NM_ajax_info['errList']['importeelc5'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc5'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelc5, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelc5']))
                  {
                      $Campos_Erros['importeelc5'] = array();
                  }
                  $Campos_Erros['importeelc5'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelc5']) || !is_array($this->NM_ajax_info['errList']['importeelc5']))
                  {
                      $this->NM_ajax_info['errList']['importeelc5'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc5'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc5']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc5'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelc5']))
              {
                  $Campos_Erros['importeelc5'] = array();
              }
              $Campos_Erros['importeelc5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc5']) || !is_array($this->NM_ajax_info['errList']['importeelc5']))
                  {
                      $this->NM_ajax_info['errList']['importeelc5'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelc5';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelc5

    function ValidateField_importeepc5(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepc5']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepc5, $this->field_config['importeepc5']['symbol_dec'], $this->field_config['importeepc5']['symbol_grp'], $this->field_config['importeepc5']['symbol_mon']); 
          nm_limpa_valor($this->importeepc5, $this->field_config['importeepc5']['symbol_dec'], $this->field_config['importeepc5']['symbol_grp']) ; 
          if ('.' == substr($this->importeepc5, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepc5, 1)))
              {
                  $this->importeepc5 = '';
              }
              else
              {
                  $this->importeepc5 = '0' . $this->importeepc5;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepc5 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepc5, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepc5, -1))
              {
                  $iTestSize++;
                  $this->importeepc5 = '-' . substr($this->importeepc5, 0, -1);
              }
              if (strlen($this->importeepc5) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepc5']))
                  {
                      $Campos_Erros['importeepc5'] = array();
                  }
                  $Campos_Erros['importeepc5'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc5']) || !is_array($this->NM_ajax_info['errList']['importeepc5']))
                  {
                      $this->NM_ajax_info['errList']['importeepc5'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc5'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepc5, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepc5']))
                  {
                      $Campos_Erros['importeepc5'] = array();
                  }
                  $Campos_Erros['importeepc5'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepc5']) || !is_array($this->NM_ajax_info['errList']['importeepc5']))
                  {
                      $this->NM_ajax_info['errList']['importeepc5'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc5'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc5']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc5'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepc5']))
              {
                  $Campos_Erros['importeepc5'] = array();
              }
              $Campos_Erros['importeepc5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc5']) || !is_array($this->NM_ajax_info['errList']['importeepc5']))
                  {
                      $this->NM_ajax_info['errList']['importeepc5'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepc5';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepc5

    function ValidateField_estatusc5(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusc5 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc5']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc5'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusc5']))
          {
              $Campos_Erros['estatusc5'] = array();
          }
          $Campos_Erros['estatusc5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusc5']) || !is_array($this->NM_ajax_info['errList']['estatusc5']))
                  {
                      $this->NM_ajax_info['errList']['estatusc5'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusc5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusc5 != "" && !in_array("estatusc5", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc5']) && !in_array($this->estatusc5, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc5']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusc5']))
              {
                  $Campos_Erros['estatusc5'] = array();
              }
              $Campos_Erros['estatusc5'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusc5']) || !is_array($this->NM_ajax_info['errList']['estatusc5']))
              {
                  $this->NM_ajax_info['errList']['estatusc5'] = array();
              }
              $this->NM_ajax_info['errList']['estatusc5'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusc5';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusc5

    function ValidateField_c6(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->c6) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "C6 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['c6']))
              {
                  $Campos_Erros['c6'] = array();
              }
              $Campos_Erros['c6'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['c6']) || !is_array($this->NM_ajax_info['errList']['c6']))
              {
                  $this->NM_ajax_info['errList']['c6'] = array();
              }
              $this->NM_ajax_info['errList']['c6'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'c6';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_c6

    function ValidateField_importec6(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importec6']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importec6, $this->field_config['importec6']['symbol_dec'], $this->field_config['importec6']['symbol_grp'], $this->field_config['importec6']['symbol_mon']); 
          nm_limpa_valor($this->importec6, $this->field_config['importec6']['symbol_dec'], $this->field_config['importec6']['symbol_grp']) ; 
          if ('.' == substr($this->importec6, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importec6, 1)))
              {
                  $this->importec6 = '';
              }
              else
              {
                  $this->importec6 = '0' . $this->importec6;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importec6 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importec6, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importec6, -1))
              {
                  $iTestSize++;
                  $this->importec6 = '-' . substr($this->importec6, 0, -1);
              }
              if (strlen($this->importec6) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importec6']))
                  {
                      $Campos_Erros['importec6'] = array();
                  }
                  $Campos_Erros['importec6'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importec6']) || !is_array($this->NM_ajax_info['errList']['importec6']))
                  {
                      $this->NM_ajax_info['errList']['importec6'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec6'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importec6, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importec6']))
                  {
                      $Campos_Erros['importec6'] = array();
                  }
                  $Campos_Erros['importec6'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importec6']) || !is_array($this->NM_ajax_info['errList']['importec6']))
                  {
                      $this->NM_ajax_info['errList']['importec6'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec6'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec6']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec6'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importec6']))
              {
                  $Campos_Erros['importec6'] = array();
              }
              $Campos_Erros['importec6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importec6']) || !is_array($this->NM_ajax_info['errList']['importec6']))
                  {
                      $this->NM_ajax_info['errList']['importec6'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importec6';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importec6

    function ValidateField_importeelc6(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelc6']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelc6, $this->field_config['importeelc6']['symbol_dec'], $this->field_config['importeelc6']['symbol_grp'], $this->field_config['importeelc6']['symbol_mon']); 
          nm_limpa_valor($this->importeelc6, $this->field_config['importeelc6']['symbol_dec'], $this->field_config['importeelc6']['symbol_grp']) ; 
          if ('.' == substr($this->importeelc6, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelc6, 1)))
              {
                  $this->importeelc6 = '';
              }
              else
              {
                  $this->importeelc6 = '0' . $this->importeelc6;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelc6 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelc6, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelc6, -1))
              {
                  $iTestSize++;
                  $this->importeelc6 = '-' . substr($this->importeelc6, 0, -1);
              }
              if (strlen($this->importeelc6) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelc6']))
                  {
                      $Campos_Erros['importeelc6'] = array();
                  }
                  $Campos_Erros['importeelc6'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc6']) || !is_array($this->NM_ajax_info['errList']['importeelc6']))
                  {
                      $this->NM_ajax_info['errList']['importeelc6'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc6'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelc6, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelc6']))
                  {
                      $Campos_Erros['importeelc6'] = array();
                  }
                  $Campos_Erros['importeelc6'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelc6']) || !is_array($this->NM_ajax_info['errList']['importeelc6']))
                  {
                      $this->NM_ajax_info['errList']['importeelc6'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc6'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc6']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc6'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelc6']))
              {
                  $Campos_Erros['importeelc6'] = array();
              }
              $Campos_Erros['importeelc6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc6']) || !is_array($this->NM_ajax_info['errList']['importeelc6']))
                  {
                      $this->NM_ajax_info['errList']['importeelc6'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelc6';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelc6

    function ValidateField_importeepc6(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepc6']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepc6, $this->field_config['importeepc6']['symbol_dec'], $this->field_config['importeepc6']['symbol_grp'], $this->field_config['importeepc6']['symbol_mon']); 
          nm_limpa_valor($this->importeepc6, $this->field_config['importeepc6']['symbol_dec'], $this->field_config['importeepc6']['symbol_grp']) ; 
          if ('.' == substr($this->importeepc6, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepc6, 1)))
              {
                  $this->importeepc6 = '';
              }
              else
              {
                  $this->importeepc6 = '0' . $this->importeepc6;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepc6 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepc6, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepc6, -1))
              {
                  $iTestSize++;
                  $this->importeepc6 = '-' . substr($this->importeepc6, 0, -1);
              }
              if (strlen($this->importeepc6) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepc6']))
                  {
                      $Campos_Erros['importeepc6'] = array();
                  }
                  $Campos_Erros['importeepc6'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc6']) || !is_array($this->NM_ajax_info['errList']['importeepc6']))
                  {
                      $this->NM_ajax_info['errList']['importeepc6'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc6'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepc6, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepc6']))
                  {
                      $Campos_Erros['importeepc6'] = array();
                  }
                  $Campos_Erros['importeepc6'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepc6']) || !is_array($this->NM_ajax_info['errList']['importeepc6']))
                  {
                      $this->NM_ajax_info['errList']['importeepc6'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc6'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc6']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc6'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepc6']))
              {
                  $Campos_Erros['importeepc6'] = array();
              }
              $Campos_Erros['importeepc6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc6']) || !is_array($this->NM_ajax_info['errList']['importeepc6']))
                  {
                      $this->NM_ajax_info['errList']['importeepc6'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepc6';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepc6

    function ValidateField_estatusc6(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusc6 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc6']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc6'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusc6']))
          {
              $Campos_Erros['estatusc6'] = array();
          }
          $Campos_Erros['estatusc6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusc6']) || !is_array($this->NM_ajax_info['errList']['estatusc6']))
                  {
                      $this->NM_ajax_info['errList']['estatusc6'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusc6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusc6 != "" && !in_array("estatusc6", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc6']) && !in_array($this->estatusc6, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc6']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusc6']))
              {
                  $Campos_Erros['estatusc6'] = array();
              }
              $Campos_Erros['estatusc6'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusc6']) || !is_array($this->NM_ajax_info['errList']['estatusc6']))
              {
                  $this->NM_ajax_info['errList']['estatusc6'] = array();
              }
              $this->NM_ajax_info['errList']['estatusc6'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusc6';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusc6

    function ValidateField_c7(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->c7) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "C7 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['c7']))
              {
                  $Campos_Erros['c7'] = array();
              }
              $Campos_Erros['c7'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['c7']) || !is_array($this->NM_ajax_info['errList']['c7']))
              {
                  $this->NM_ajax_info['errList']['c7'] = array();
              }
              $this->NM_ajax_info['errList']['c7'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'c7';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_c7

    function ValidateField_importec7(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importec7']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importec7, $this->field_config['importec7']['symbol_dec'], $this->field_config['importec7']['symbol_grp'], $this->field_config['importec7']['symbol_mon']); 
          nm_limpa_valor($this->importec7, $this->field_config['importec7']['symbol_dec'], $this->field_config['importec7']['symbol_grp']) ; 
          if ('.' == substr($this->importec7, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importec7, 1)))
              {
                  $this->importec7 = '';
              }
              else
              {
                  $this->importec7 = '0' . $this->importec7;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importec7 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importec7, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importec7, -1))
              {
                  $iTestSize++;
                  $this->importec7 = '-' . substr($this->importec7, 0, -1);
              }
              if (strlen($this->importec7) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importec7']))
                  {
                      $Campos_Erros['importec7'] = array();
                  }
                  $Campos_Erros['importec7'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importec7']) || !is_array($this->NM_ajax_info['errList']['importec7']))
                  {
                      $this->NM_ajax_info['errList']['importec7'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec7'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importec7, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importec7']))
                  {
                      $Campos_Erros['importec7'] = array();
                  }
                  $Campos_Erros['importec7'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importec7']) || !is_array($this->NM_ajax_info['errList']['importec7']))
                  {
                      $this->NM_ajax_info['errList']['importec7'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec7'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec7']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec7'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importec7']))
              {
                  $Campos_Erros['importec7'] = array();
              }
              $Campos_Erros['importec7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importec7']) || !is_array($this->NM_ajax_info['errList']['importec7']))
                  {
                      $this->NM_ajax_info['errList']['importec7'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importec7';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importec7

    function ValidateField_importeelc7(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelc7']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelc7, $this->field_config['importeelc7']['symbol_dec'], $this->field_config['importeelc7']['symbol_grp'], $this->field_config['importeelc7']['symbol_mon']); 
          nm_limpa_valor($this->importeelc7, $this->field_config['importeelc7']['symbol_dec'], $this->field_config['importeelc7']['symbol_grp']) ; 
          if ('.' == substr($this->importeelc7, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelc7, 1)))
              {
                  $this->importeelc7 = '';
              }
              else
              {
                  $this->importeelc7 = '0' . $this->importeelc7;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelc7 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelc7, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelc7, -1))
              {
                  $iTestSize++;
                  $this->importeelc7 = '-' . substr($this->importeelc7, 0, -1);
              }
              if (strlen($this->importeelc7) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelc7']))
                  {
                      $Campos_Erros['importeelc7'] = array();
                  }
                  $Campos_Erros['importeelc7'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc7']) || !is_array($this->NM_ajax_info['errList']['importeelc7']))
                  {
                      $this->NM_ajax_info['errList']['importeelc7'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc7'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelc7, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelc7']))
                  {
                      $Campos_Erros['importeelc7'] = array();
                  }
                  $Campos_Erros['importeelc7'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelc7']) || !is_array($this->NM_ajax_info['errList']['importeelc7']))
                  {
                      $this->NM_ajax_info['errList']['importeelc7'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc7'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc7']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc7'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelc7']))
              {
                  $Campos_Erros['importeelc7'] = array();
              }
              $Campos_Erros['importeelc7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc7']) || !is_array($this->NM_ajax_info['errList']['importeelc7']))
                  {
                      $this->NM_ajax_info['errList']['importeelc7'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelc7';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelc7

    function ValidateField_importeepc7(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepc7']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepc7, $this->field_config['importeepc7']['symbol_dec'], $this->field_config['importeepc7']['symbol_grp'], $this->field_config['importeepc7']['symbol_mon']); 
          nm_limpa_valor($this->importeepc7, $this->field_config['importeepc7']['symbol_dec'], $this->field_config['importeepc7']['symbol_grp']) ; 
          if ('.' == substr($this->importeepc7, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepc7, 1)))
              {
                  $this->importeepc7 = '';
              }
              else
              {
                  $this->importeepc7 = '0' . $this->importeepc7;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepc7 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepc7, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepc7, -1))
              {
                  $iTestSize++;
                  $this->importeepc7 = '-' . substr($this->importeepc7, 0, -1);
              }
              if (strlen($this->importeepc7) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepc7']))
                  {
                      $Campos_Erros['importeepc7'] = array();
                  }
                  $Campos_Erros['importeepc7'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc7']) || !is_array($this->NM_ajax_info['errList']['importeepc7']))
                  {
                      $this->NM_ajax_info['errList']['importeepc7'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc7'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepc7, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepc7']))
                  {
                      $Campos_Erros['importeepc7'] = array();
                  }
                  $Campos_Erros['importeepc7'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepc7']) || !is_array($this->NM_ajax_info['errList']['importeepc7']))
                  {
                      $this->NM_ajax_info['errList']['importeepc7'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc7'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc7']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc7'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepc7']))
              {
                  $Campos_Erros['importeepc7'] = array();
              }
              $Campos_Erros['importeepc7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc7']) || !is_array($this->NM_ajax_info['errList']['importeepc7']))
                  {
                      $this->NM_ajax_info['errList']['importeepc7'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepc7';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepc7

    function ValidateField_estatusc7(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusc7 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc7']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc7'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusc7']))
          {
              $Campos_Erros['estatusc7'] = array();
          }
          $Campos_Erros['estatusc7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusc7']) || !is_array($this->NM_ajax_info['errList']['estatusc7']))
                  {
                      $this->NM_ajax_info['errList']['estatusc7'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusc7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusc7 != "" && !in_array("estatusc7", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc7']) && !in_array($this->estatusc7, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc7']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusc7']))
              {
                  $Campos_Erros['estatusc7'] = array();
              }
              $Campos_Erros['estatusc7'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusc7']) || !is_array($this->NM_ajax_info['errList']['estatusc7']))
              {
                  $this->NM_ajax_info['errList']['estatusc7'] = array();
              }
              $this->NM_ajax_info['errList']['estatusc7'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusc7';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusc7

    function ValidateField_c8(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->c8) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "C8 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['c8']))
              {
                  $Campos_Erros['c8'] = array();
              }
              $Campos_Erros['c8'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['c8']) || !is_array($this->NM_ajax_info['errList']['c8']))
              {
                  $this->NM_ajax_info['errList']['c8'] = array();
              }
              $this->NM_ajax_info['errList']['c8'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'c8';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_c8

    function ValidateField_importeelc8(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelc8']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelc8, $this->field_config['importeelc8']['symbol_dec'], $this->field_config['importeelc8']['symbol_grp'], $this->field_config['importeelc8']['symbol_mon']); 
          nm_limpa_valor($this->importeelc8, $this->field_config['importeelc8']['symbol_dec'], $this->field_config['importeelc8']['symbol_grp']) ; 
          if ('.' == substr($this->importeelc8, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelc8, 1)))
              {
                  $this->importeelc8 = '';
              }
              else
              {
                  $this->importeelc8 = '0' . $this->importeelc8;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelc8 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelc8, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelc8, -1))
              {
                  $iTestSize++;
                  $this->importeelc8 = '-' . substr($this->importeelc8, 0, -1);
              }
              if (strlen($this->importeelc8) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelc8']))
                  {
                      $Campos_Erros['importeelc8'] = array();
                  }
                  $Campos_Erros['importeelc8'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc8']) || !is_array($this->NM_ajax_info['errList']['importeelc8']))
                  {
                      $this->NM_ajax_info['errList']['importeelc8'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc8'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelc8, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importeelc8']))
                  {
                      $Campos_Erros['importeelc8'] = array();
                  }
                  $Campos_Erros['importeelc8'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelc8']) || !is_array($this->NM_ajax_info['errList']['importeelc8']))
                  {
                      $this->NM_ajax_info['errList']['importeelc8'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc8'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc8']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc8'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importeelc8']))
              {
                  $Campos_Erros['importeelc8'] = array();
              }
              $Campos_Erros['importeelc8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc8']) || !is_array($this->NM_ajax_info['errList']['importeelc8']))
                  {
                      $this->NM_ajax_info['errList']['importeelc8'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelc8';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelc8

    function ValidateField_importec8(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importec8']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importec8, $this->field_config['importec8']['symbol_dec'], $this->field_config['importec8']['symbol_grp'], $this->field_config['importec8']['symbol_mon']); 
          nm_limpa_valor($this->importec8, $this->field_config['importec8']['symbol_dec'], $this->field_config['importec8']['symbol_grp']) ; 
          if ('.' == substr($this->importec8, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importec8, 1)))
              {
                  $this->importec8 = '';
              }
              else
              {
                  $this->importec8 = '0' . $this->importec8;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importec8 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importec8, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importec8, -1))
              {
                  $iTestSize++;
                  $this->importec8 = '-' . substr($this->importec8, 0, -1);
              }
              if (strlen($this->importec8) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importec8']))
                  {
                      $Campos_Erros['importec8'] = array();
                  }
                  $Campos_Erros['importec8'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importec8']) || !is_array($this->NM_ajax_info['errList']['importec8']))
                  {
                      $this->NM_ajax_info['errList']['importec8'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec8'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importec8, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importec8']))
                  {
                      $Campos_Erros['importec8'] = array();
                  }
                  $Campos_Erros['importec8'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importec8']) || !is_array($this->NM_ajax_info['errList']['importec8']))
                  {
                      $this->NM_ajax_info['errList']['importec8'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec8'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec8']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec8'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importec8']))
              {
                  $Campos_Erros['importec8'] = array();
              }
              $Campos_Erros['importec8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importec8']) || !is_array($this->NM_ajax_info['errList']['importec8']))
                  {
                      $this->NM_ajax_info['errList']['importec8'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importec8';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importec8

    function ValidateField_importeepc8(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepc8']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepc8, $this->field_config['importeepc8']['symbol_dec'], $this->field_config['importeepc8']['symbol_grp'], $this->field_config['importeepc8']['symbol_mon']); 
          nm_limpa_valor($this->importeepc8, $this->field_config['importeepc8']['symbol_dec'], $this->field_config['importeepc8']['symbol_grp']) ; 
          if ('.' == substr($this->importeepc8, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepc8, 1)))
              {
                  $this->importeepc8 = '';
              }
              else
              {
                  $this->importeepc8 = '0' . $this->importeepc8;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepc8 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepc8, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepc8, -1))
              {
                  $iTestSize++;
                  $this->importeepc8 = '-' . substr($this->importeepc8, 0, -1);
              }
              if (strlen($this->importeepc8) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepc8']))
                  {
                      $Campos_Erros['importeepc8'] = array();
                  }
                  $Campos_Erros['importeepc8'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc8']) || !is_array($this->NM_ajax_info['errList']['importeepc8']))
                  {
                      $this->NM_ajax_info['errList']['importeepc8'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc8'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepc8, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepc8']))
                  {
                      $Campos_Erros['importeepc8'] = array();
                  }
                  $Campos_Erros['importeepc8'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepc8']) || !is_array($this->NM_ajax_info['errList']['importeepc8']))
                  {
                      $this->NM_ajax_info['errList']['importeepc8'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc8'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc8']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc8'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepc8']))
              {
                  $Campos_Erros['importeepc8'] = array();
              }
              $Campos_Erros['importeepc8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc8']) || !is_array($this->NM_ajax_info['errList']['importeepc8']))
                  {
                      $this->NM_ajax_info['errList']['importeepc8'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepc8';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepc8

    function ValidateField_estatusc8(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusc8 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc8']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc8'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusc8']))
          {
              $Campos_Erros['estatusc8'] = array();
          }
          $Campos_Erros['estatusc8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusc8']) || !is_array($this->NM_ajax_info['errList']['estatusc8']))
                  {
                      $this->NM_ajax_info['errList']['estatusc8'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusc8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusc8 != "" && !in_array("estatusc8", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc8']) && !in_array($this->estatusc8, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc8']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusc8']))
              {
                  $Campos_Erros['estatusc8'] = array();
              }
              $Campos_Erros['estatusc8'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusc8']) || !is_array($this->NM_ajax_info['errList']['estatusc8']))
              {
                  $this->NM_ajax_info['errList']['estatusc8'] = array();
              }
              $this->NM_ajax_info['errList']['estatusc8'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusc8';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusc8

    function ValidateField_c9(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->c9) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "C9 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['c9']))
              {
                  $Campos_Erros['c9'] = array();
              }
              $Campos_Erros['c9'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['c9']) || !is_array($this->NM_ajax_info['errList']['c9']))
              {
                  $this->NM_ajax_info['errList']['c9'] = array();
              }
              $this->NM_ajax_info['errList']['c9'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'c9';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_c9

    function ValidateField_importec9(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importec9']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importec9, $this->field_config['importec9']['symbol_dec'], $this->field_config['importec9']['symbol_grp'], $this->field_config['importec9']['symbol_mon']); 
          nm_limpa_valor($this->importec9, $this->field_config['importec9']['symbol_dec'], $this->field_config['importec9']['symbol_grp']) ; 
          if ('.' == substr($this->importec9, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importec9, 1)))
              {
                  $this->importec9 = '';
              }
              else
              {
                  $this->importec9 = '0' . $this->importec9;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importec9 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importec9, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importec9, -1))
              {
                  $iTestSize++;
                  $this->importec9 = '-' . substr($this->importec9, 0, -1);
              }
              if (strlen($this->importec9) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importec9']))
                  {
                      $Campos_Erros['importec9'] = array();
                  }
                  $Campos_Erros['importec9'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importec9']) || !is_array($this->NM_ajax_info['errList']['importec9']))
                  {
                      $this->NM_ajax_info['errList']['importec9'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec9'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importec9, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe; " ; 
                  if (!isset($Campos_Erros['importec9']))
                  {
                      $Campos_Erros['importec9'] = array();
                  }
                  $Campos_Erros['importec9'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importec9']) || !is_array($this->NM_ajax_info['errList']['importec9']))
                  {
                      $this->NM_ajax_info['errList']['importec9'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec9'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec9']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importec9'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe" ; 
              if (!isset($Campos_Erros['importec9']))
              {
                  $Campos_Erros['importec9'] = array();
              }
              $Campos_Erros['importec9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importec9']) || !is_array($this->NM_ajax_info['errList']['importec9']))
                  {
                      $this->NM_ajax_info['errList']['importec9'] = array();
                  }
                  $this->NM_ajax_info['errList']['importec9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importec9';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importec9

    function ValidateField_importeelc9(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeelc9']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeelc9, $this->field_config['importeelc9']['symbol_dec'], $this->field_config['importeelc9']['symbol_grp'], $this->field_config['importeelc9']['symbol_mon']); 
          nm_limpa_valor($this->importeelc9, $this->field_config['importeelc9']['symbol_dec'], $this->field_config['importeelc9']['symbol_grp']) ; 
          if ('.' == substr($this->importeelc9, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeelc9, 1)))
              {
                  $this->importeelc9 = '';
              }
              else
              {
                  $this->importeelc9 = '0' . $this->importeelc9;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeelc9 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeelc9, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeelc9, -1))
              {
                  $iTestSize++;
                  $this->importeelc9 = '-' . substr($this->importeelc9, 0, -1);
              }
              if (strlen($this->importeelc9) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeelc9']))
                  {
                      $Campos_Erros['importeelc9'] = array();
                  }
                  $Campos_Erros['importeelc9'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc9']) || !is_array($this->NM_ajax_info['errList']['importeelc9']))
                  {
                      $this->NM_ajax_info['errList']['importeelc9'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc9'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeelc9, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEL; " ; 
                  if (!isset($Campos_Erros['importeelc9']))
                  {
                      $Campos_Erros['importeelc9'] = array();
                  }
                  $Campos_Erros['importeelc9'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeelc9']) || !is_array($this->NM_ajax_info['errList']['importeelc9']))
                  {
                      $this->NM_ajax_info['errList']['importeelc9'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc9'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc9']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeelc9'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEL" ; 
              if (!isset($Campos_Erros['importeelc9']))
              {
                  $Campos_Erros['importeelc9'] = array();
              }
              $Campos_Erros['importeelc9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeelc9']) || !is_array($this->NM_ajax_info['errList']['importeelc9']))
                  {
                      $this->NM_ajax_info['errList']['importeelc9'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeelc9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeelc9';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeelc9

    function ValidateField_importeepc9(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importeepc9']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importeepc9, $this->field_config['importeepc9']['symbol_dec'], $this->field_config['importeepc9']['symbol_grp'], $this->field_config['importeepc9']['symbol_mon']); 
          nm_limpa_valor($this->importeepc9, $this->field_config['importeepc9']['symbol_dec'], $this->field_config['importeepc9']['symbol_grp']) ; 
          if ('.' == substr($this->importeepc9, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importeepc9, 1)))
              {
                  $this->importeepc9 = '';
              }
              else
              {
                  $this->importeepc9 = '0' . $this->importeepc9;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importeepc9 != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->importeepc9, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importeepc9, -1))
              {
                  $iTestSize++;
                  $this->importeepc9 = '-' . substr($this->importeepc9, 0, -1);
              }
              if (strlen($this->importeepc9) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importeepc9']))
                  {
                      $Campos_Erros['importeepc9'] = array();
                  }
                  $Campos_Erros['importeepc9'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc9']) || !is_array($this->NM_ajax_info['errList']['importeepc9']))
                  {
                      $this->NM_ajax_info['errList']['importeepc9'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc9'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importeepc9, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe EEP; " ; 
                  if (!isset($Campos_Erros['importeepc9']))
                  {
                      $Campos_Erros['importeepc9'] = array();
                  }
                  $Campos_Erros['importeepc9'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importeepc9']) || !is_array($this->NM_ajax_info['errList']['importeepc9']))
                  {
                      $this->NM_ajax_info['errList']['importeepc9'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc9'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc9']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['importeepc9'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Importe EEP" ; 
              if (!isset($Campos_Erros['importeepc9']))
              {
                  $Campos_Erros['importeepc9'] = array();
              }
              $Campos_Erros['importeepc9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importeepc9']) || !is_array($this->NM_ajax_info['errList']['importeepc9']))
                  {
                      $this->NM_ajax_info['errList']['importeepc9'] = array();
                  }
                  $this->NM_ajax_info['errList']['importeepc9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importeepc9';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importeepc9

    function ValidateField_estatusc9(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->estatusc9 == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc9']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['php_cmp_required']['estatusc9'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Estatus" ; 
          if (!isset($Campos_Erros['estatusc9']))
          {
              $Campos_Erros['estatusc9'] = array();
          }
          $Campos_Erros['estatusc9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estatusc9']) || !is_array($this->NM_ajax_info['errList']['estatusc9']))
                  {
                      $this->NM_ajax_info['errList']['estatusc9'] = array();
                  }
                  $this->NM_ajax_info['errList']['estatusc9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->estatusc9 != "" && !in_array("estatusc9", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc9']) && !in_array($this->estatusc9, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc9']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatusc9']))
              {
                  $Campos_Erros['estatusc9'] = array();
              }
              $Campos_Erros['estatusc9'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatusc9']) || !is_array($this->NM_ajax_info['errList']['estatusc9']))
              {
                  $this->NM_ajax_info['errList']['estatusc9'] = array();
              }
              $this->NM_ajax_info['errList']['estatusc9'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estatusc9';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estatusc9

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
    $this->nmgp_dados_form['a'] = $this->a;
    $this->nmgp_dados_form['importea'] = $this->importea;
    $this->nmgp_dados_form['importeela'] = $this->importeela;
    $this->nmgp_dados_form['importeepa'] = $this->importeepa;
    $this->nmgp_dados_form['estatusa'] = $this->estatusa;
    $this->nmgp_dados_form['m'] = $this->m;
    $this->nmgp_dados_form['importem'] = $this->importem;
    $this->nmgp_dados_form['importeelm'] = $this->importeelm;
    $this->nmgp_dados_form['importeepm'] = $this->importeepm;
    $this->nmgp_dados_form['estatusm'] = $this->estatusm;
    $this->nmgp_dados_form['b2'] = $this->b2;
    $this->nmgp_dados_form['importeb2'] = $this->importeb2;
    $this->nmgp_dados_form['importeelb2'] = $this->importeelb2;
    $this->nmgp_dados_form['importeepb2'] = $this->importeepb2;
    $this->nmgp_dados_form['estatusb2'] = $this->estatusb2;
    $this->nmgp_dados_form['b3'] = $this->b3;
    $this->nmgp_dados_form['importeb3'] = $this->importeb3;
    $this->nmgp_dados_form['importeelb3'] = $this->importeelb3;
    $this->nmgp_dados_form['importeepb3'] = $this->importeepb3;
    $this->nmgp_dados_form['estatusb3'] = $this->estatusb3;
    $this->nmgp_dados_form['b4'] = $this->b4;
    $this->nmgp_dados_form['importeb4'] = $this->importeb4;
    $this->nmgp_dados_form['importeelb4'] = $this->importeelb4;
    $this->nmgp_dados_form['importeepb4'] = $this->importeepb4;
    $this->nmgp_dados_form['estatusb4'] = $this->estatusb4;
    $this->nmgp_dados_form['c2'] = $this->c2;
    $this->nmgp_dados_form['importec2'] = $this->importec2;
    $this->nmgp_dados_form['importeelc2'] = $this->importeelc2;
    $this->nmgp_dados_form['importeepc2'] = $this->importeepc2;
    $this->nmgp_dados_form['estatusc2'] = $this->estatusc2;
    $this->nmgp_dados_form['c3'] = $this->c3;
    $this->nmgp_dados_form['importec3'] = $this->importec3;
    $this->nmgp_dados_form['importeelc3'] = $this->importeelc3;
    $this->nmgp_dados_form['importeepc3'] = $this->importeepc3;
    $this->nmgp_dados_form['estatusc3'] = $this->estatusc3;
    $this->nmgp_dados_form['c4'] = $this->c4;
    $this->nmgp_dados_form['importec4'] = $this->importec4;
    $this->nmgp_dados_form['importeelc4'] = $this->importeelc4;
    $this->nmgp_dados_form['importeepc4'] = $this->importeepc4;
    $this->nmgp_dados_form['estatusc4'] = $this->estatusc4;
    $this->nmgp_dados_form['c5'] = $this->c5;
    $this->nmgp_dados_form['importec5'] = $this->importec5;
    $this->nmgp_dados_form['importeelc5'] = $this->importeelc5;
    $this->nmgp_dados_form['importeepc5'] = $this->importeepc5;
    $this->nmgp_dados_form['estatusc5'] = $this->estatusc5;
    $this->nmgp_dados_form['c6'] = $this->c6;
    $this->nmgp_dados_form['importec6'] = $this->importec6;
    $this->nmgp_dados_form['importeelc6'] = $this->importeelc6;
    $this->nmgp_dados_form['importeepc6'] = $this->importeepc6;
    $this->nmgp_dados_form['estatusc6'] = $this->estatusc6;
    $this->nmgp_dados_form['c7'] = $this->c7;
    $this->nmgp_dados_form['importec7'] = $this->importec7;
    $this->nmgp_dados_form['importeelc7'] = $this->importeelc7;
    $this->nmgp_dados_form['importeepc7'] = $this->importeepc7;
    $this->nmgp_dados_form['estatusc7'] = $this->estatusc7;
    $this->nmgp_dados_form['c8'] = $this->c8;
    $this->nmgp_dados_form['importeelc8'] = $this->importeelc8;
    $this->nmgp_dados_form['importec8'] = $this->importec8;
    $this->nmgp_dados_form['importeepc8'] = $this->importeepc8;
    $this->nmgp_dados_form['estatusc8'] = $this->estatusc8;
    $this->nmgp_dados_form['c9'] = $this->c9;
    $this->nmgp_dados_form['importec9'] = $this->importec9;
    $this->nmgp_dados_form['importeelc9'] = $this->importeelc9;
    $this->nmgp_dados_form['importeepc9'] = $this->importeepc9;
    $this->nmgp_dados_form['estatusc9'] = $this->estatusc9;
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['importea'] = $this->importea;
      if (!empty($this->field_config['importea']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importea, $this->field_config['importea']['symbol_dec'], $this->field_config['importea']['symbol_grp'], $this->field_config['importea']['symbol_mon']);
         nm_limpa_valor($this->importea, $this->field_config['importea']['symbol_dec'], $this->field_config['importea']['symbol_grp']);
      }
      $this->Before_unformat['importeela'] = $this->importeela;
      if (!empty($this->field_config['importeela']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeela, $this->field_config['importeela']['symbol_dec'], $this->field_config['importeela']['symbol_grp'], $this->field_config['importeela']['symbol_mon']);
         nm_limpa_valor($this->importeela, $this->field_config['importeela']['symbol_dec'], $this->field_config['importeela']['symbol_grp']);
      }
      $this->Before_unformat['importeepa'] = $this->importeepa;
      if (!empty($this->field_config['importeepa']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepa, $this->field_config['importeepa']['symbol_dec'], $this->field_config['importeepa']['symbol_grp'], $this->field_config['importeepa']['symbol_mon']);
         nm_limpa_valor($this->importeepa, $this->field_config['importeepa']['symbol_dec'], $this->field_config['importeepa']['symbol_grp']);
      }
      $this->Before_unformat['importem'] = $this->importem;
      if (!empty($this->field_config['importem']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importem, $this->field_config['importem']['symbol_dec'], $this->field_config['importem']['symbol_grp'], $this->field_config['importem']['symbol_mon']);
         nm_limpa_valor($this->importem, $this->field_config['importem']['symbol_dec'], $this->field_config['importem']['symbol_grp']);
      }
      $this->Before_unformat['importeelm'] = $this->importeelm;
      if (!empty($this->field_config['importeelm']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelm, $this->field_config['importeelm']['symbol_dec'], $this->field_config['importeelm']['symbol_grp'], $this->field_config['importeelm']['symbol_mon']);
         nm_limpa_valor($this->importeelm, $this->field_config['importeelm']['symbol_dec'], $this->field_config['importeelm']['symbol_grp']);
      }
      $this->Before_unformat['importeepm'] = $this->importeepm;
      if (!empty($this->field_config['importeepm']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepm, $this->field_config['importeepm']['symbol_dec'], $this->field_config['importeepm']['symbol_grp'], $this->field_config['importeepm']['symbol_mon']);
         nm_limpa_valor($this->importeepm, $this->field_config['importeepm']['symbol_dec'], $this->field_config['importeepm']['symbol_grp']);
      }
      $this->Before_unformat['importeb2'] = $this->importeb2;
      if (!empty($this->field_config['importeb2']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeb2, $this->field_config['importeb2']['symbol_dec'], $this->field_config['importeb2']['symbol_grp'], $this->field_config['importeb2']['symbol_mon']);
         nm_limpa_valor($this->importeb2, $this->field_config['importeb2']['symbol_dec'], $this->field_config['importeb2']['symbol_grp']);
      }
      $this->Before_unformat['importeelb2'] = $this->importeelb2;
      if (!empty($this->field_config['importeelb2']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelb2, $this->field_config['importeelb2']['symbol_dec'], $this->field_config['importeelb2']['symbol_grp'], $this->field_config['importeelb2']['symbol_mon']);
         nm_limpa_valor($this->importeelb2, $this->field_config['importeelb2']['symbol_dec'], $this->field_config['importeelb2']['symbol_grp']);
      }
      $this->Before_unformat['importeepb2'] = $this->importeepb2;
      if (!empty($this->field_config['importeepb2']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepb2, $this->field_config['importeepb2']['symbol_dec'], $this->field_config['importeepb2']['symbol_grp'], $this->field_config['importeepb2']['symbol_mon']);
         nm_limpa_valor($this->importeepb2, $this->field_config['importeepb2']['symbol_dec'], $this->field_config['importeepb2']['symbol_grp']);
      }
      $this->Before_unformat['importeb3'] = $this->importeb3;
      if (!empty($this->field_config['importeb3']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeb3, $this->field_config['importeb3']['symbol_dec'], $this->field_config['importeb3']['symbol_grp'], $this->field_config['importeb3']['symbol_mon']);
         nm_limpa_valor($this->importeb3, $this->field_config['importeb3']['symbol_dec'], $this->field_config['importeb3']['symbol_grp']);
      }
      $this->Before_unformat['importeelb3'] = $this->importeelb3;
      if (!empty($this->field_config['importeelb3']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelb3, $this->field_config['importeelb3']['symbol_dec'], $this->field_config['importeelb3']['symbol_grp'], $this->field_config['importeelb3']['symbol_mon']);
         nm_limpa_valor($this->importeelb3, $this->field_config['importeelb3']['symbol_dec'], $this->field_config['importeelb3']['symbol_grp']);
      }
      $this->Before_unformat['importeepb3'] = $this->importeepb3;
      if (!empty($this->field_config['importeepb3']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepb3, $this->field_config['importeepb3']['symbol_dec'], $this->field_config['importeepb3']['symbol_grp'], $this->field_config['importeepb3']['symbol_mon']);
         nm_limpa_valor($this->importeepb3, $this->field_config['importeepb3']['symbol_dec'], $this->field_config['importeepb3']['symbol_grp']);
      }
      $this->Before_unformat['importeb4'] = $this->importeb4;
      if (!empty($this->field_config['importeb4']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeb4, $this->field_config['importeb4']['symbol_dec'], $this->field_config['importeb4']['symbol_grp'], $this->field_config['importeb4']['symbol_mon']);
         nm_limpa_valor($this->importeb4, $this->field_config['importeb4']['symbol_dec'], $this->field_config['importeb4']['symbol_grp']);
      }
      $this->Before_unformat['importeelb4'] = $this->importeelb4;
      if (!empty($this->field_config['importeelb4']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelb4, $this->field_config['importeelb4']['symbol_dec'], $this->field_config['importeelb4']['symbol_grp'], $this->field_config['importeelb4']['symbol_mon']);
         nm_limpa_valor($this->importeelb4, $this->field_config['importeelb4']['symbol_dec'], $this->field_config['importeelb4']['symbol_grp']);
      }
      $this->Before_unformat['importeepb4'] = $this->importeepb4;
      if (!empty($this->field_config['importeepb4']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepb4, $this->field_config['importeepb4']['symbol_dec'], $this->field_config['importeepb4']['symbol_grp'], $this->field_config['importeepb4']['symbol_mon']);
         nm_limpa_valor($this->importeepb4, $this->field_config['importeepb4']['symbol_dec'], $this->field_config['importeepb4']['symbol_grp']);
      }
      $this->Before_unformat['importec2'] = $this->importec2;
      if (!empty($this->field_config['importec2']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importec2, $this->field_config['importec2']['symbol_dec'], $this->field_config['importec2']['symbol_grp'], $this->field_config['importec2']['symbol_mon']);
         nm_limpa_valor($this->importec2, $this->field_config['importec2']['symbol_dec'], $this->field_config['importec2']['symbol_grp']);
      }
      $this->Before_unformat['importeelc2'] = $this->importeelc2;
      if (!empty($this->field_config['importeelc2']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelc2, $this->field_config['importeelc2']['symbol_dec'], $this->field_config['importeelc2']['symbol_grp'], $this->field_config['importeelc2']['symbol_mon']);
         nm_limpa_valor($this->importeelc2, $this->field_config['importeelc2']['symbol_dec'], $this->field_config['importeelc2']['symbol_grp']);
      }
      $this->Before_unformat['importeepc2'] = $this->importeepc2;
      if (!empty($this->field_config['importeepc2']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepc2, $this->field_config['importeepc2']['symbol_dec'], $this->field_config['importeepc2']['symbol_grp'], $this->field_config['importeepc2']['symbol_mon']);
         nm_limpa_valor($this->importeepc2, $this->field_config['importeepc2']['symbol_dec'], $this->field_config['importeepc2']['symbol_grp']);
      }
      $this->Before_unformat['importec3'] = $this->importec3;
      if (!empty($this->field_config['importec3']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importec3, $this->field_config['importec3']['symbol_dec'], $this->field_config['importec3']['symbol_grp'], $this->field_config['importec3']['symbol_mon']);
         nm_limpa_valor($this->importec3, $this->field_config['importec3']['symbol_dec'], $this->field_config['importec3']['symbol_grp']);
      }
      $this->Before_unformat['importeelc3'] = $this->importeelc3;
      if (!empty($this->field_config['importeelc3']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelc3, $this->field_config['importeelc3']['symbol_dec'], $this->field_config['importeelc3']['symbol_grp'], $this->field_config['importeelc3']['symbol_mon']);
         nm_limpa_valor($this->importeelc3, $this->field_config['importeelc3']['symbol_dec'], $this->field_config['importeelc3']['symbol_grp']);
      }
      $this->Before_unformat['importeepc3'] = $this->importeepc3;
      if (!empty($this->field_config['importeepc3']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepc3, $this->field_config['importeepc3']['symbol_dec'], $this->field_config['importeepc3']['symbol_grp'], $this->field_config['importeepc3']['symbol_mon']);
         nm_limpa_valor($this->importeepc3, $this->field_config['importeepc3']['symbol_dec'], $this->field_config['importeepc3']['symbol_grp']);
      }
      $this->Before_unformat['importec4'] = $this->importec4;
      if (!empty($this->field_config['importec4']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importec4, $this->field_config['importec4']['symbol_dec'], $this->field_config['importec4']['symbol_grp'], $this->field_config['importec4']['symbol_mon']);
         nm_limpa_valor($this->importec4, $this->field_config['importec4']['symbol_dec'], $this->field_config['importec4']['symbol_grp']);
      }
      $this->Before_unformat['importeelc4'] = $this->importeelc4;
      if (!empty($this->field_config['importeelc4']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelc4, $this->field_config['importeelc4']['symbol_dec'], $this->field_config['importeelc4']['symbol_grp'], $this->field_config['importeelc4']['symbol_mon']);
         nm_limpa_valor($this->importeelc4, $this->field_config['importeelc4']['symbol_dec'], $this->field_config['importeelc4']['symbol_grp']);
      }
      $this->Before_unformat['importeepc4'] = $this->importeepc4;
      if (!empty($this->field_config['importeepc4']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepc4, $this->field_config['importeepc4']['symbol_dec'], $this->field_config['importeepc4']['symbol_grp'], $this->field_config['importeepc4']['symbol_mon']);
         nm_limpa_valor($this->importeepc4, $this->field_config['importeepc4']['symbol_dec'], $this->field_config['importeepc4']['symbol_grp']);
      }
      $this->Before_unformat['importec5'] = $this->importec5;
      if (!empty($this->field_config['importec5']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importec5, $this->field_config['importec5']['symbol_dec'], $this->field_config['importec5']['symbol_grp'], $this->field_config['importec5']['symbol_mon']);
         nm_limpa_valor($this->importec5, $this->field_config['importec5']['symbol_dec'], $this->field_config['importec5']['symbol_grp']);
      }
      $this->Before_unformat['importeelc5'] = $this->importeelc5;
      if (!empty($this->field_config['importeelc5']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelc5, $this->field_config['importeelc5']['symbol_dec'], $this->field_config['importeelc5']['symbol_grp'], $this->field_config['importeelc5']['symbol_mon']);
         nm_limpa_valor($this->importeelc5, $this->field_config['importeelc5']['symbol_dec'], $this->field_config['importeelc5']['symbol_grp']);
      }
      $this->Before_unformat['importeepc5'] = $this->importeepc5;
      if (!empty($this->field_config['importeepc5']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepc5, $this->field_config['importeepc5']['symbol_dec'], $this->field_config['importeepc5']['symbol_grp'], $this->field_config['importeepc5']['symbol_mon']);
         nm_limpa_valor($this->importeepc5, $this->field_config['importeepc5']['symbol_dec'], $this->field_config['importeepc5']['symbol_grp']);
      }
      $this->Before_unformat['importec6'] = $this->importec6;
      if (!empty($this->field_config['importec6']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importec6, $this->field_config['importec6']['symbol_dec'], $this->field_config['importec6']['symbol_grp'], $this->field_config['importec6']['symbol_mon']);
         nm_limpa_valor($this->importec6, $this->field_config['importec6']['symbol_dec'], $this->field_config['importec6']['symbol_grp']);
      }
      $this->Before_unformat['importeelc6'] = $this->importeelc6;
      if (!empty($this->field_config['importeelc6']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelc6, $this->field_config['importeelc6']['symbol_dec'], $this->field_config['importeelc6']['symbol_grp'], $this->field_config['importeelc6']['symbol_mon']);
         nm_limpa_valor($this->importeelc6, $this->field_config['importeelc6']['symbol_dec'], $this->field_config['importeelc6']['symbol_grp']);
      }
      $this->Before_unformat['importeepc6'] = $this->importeepc6;
      if (!empty($this->field_config['importeepc6']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepc6, $this->field_config['importeepc6']['symbol_dec'], $this->field_config['importeepc6']['symbol_grp'], $this->field_config['importeepc6']['symbol_mon']);
         nm_limpa_valor($this->importeepc6, $this->field_config['importeepc6']['symbol_dec'], $this->field_config['importeepc6']['symbol_grp']);
      }
      $this->Before_unformat['importec7'] = $this->importec7;
      if (!empty($this->field_config['importec7']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importec7, $this->field_config['importec7']['symbol_dec'], $this->field_config['importec7']['symbol_grp'], $this->field_config['importec7']['symbol_mon']);
         nm_limpa_valor($this->importec7, $this->field_config['importec7']['symbol_dec'], $this->field_config['importec7']['symbol_grp']);
      }
      $this->Before_unformat['importeelc7'] = $this->importeelc7;
      if (!empty($this->field_config['importeelc7']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelc7, $this->field_config['importeelc7']['symbol_dec'], $this->field_config['importeelc7']['symbol_grp'], $this->field_config['importeelc7']['symbol_mon']);
         nm_limpa_valor($this->importeelc7, $this->field_config['importeelc7']['symbol_dec'], $this->field_config['importeelc7']['symbol_grp']);
      }
      $this->Before_unformat['importeepc7'] = $this->importeepc7;
      if (!empty($this->field_config['importeepc7']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepc7, $this->field_config['importeepc7']['symbol_dec'], $this->field_config['importeepc7']['symbol_grp'], $this->field_config['importeepc7']['symbol_mon']);
         nm_limpa_valor($this->importeepc7, $this->field_config['importeepc7']['symbol_dec'], $this->field_config['importeepc7']['symbol_grp']);
      }
      $this->Before_unformat['importeelc8'] = $this->importeelc8;
      if (!empty($this->field_config['importeelc8']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelc8, $this->field_config['importeelc8']['symbol_dec'], $this->field_config['importeelc8']['symbol_grp'], $this->field_config['importeelc8']['symbol_mon']);
         nm_limpa_valor($this->importeelc8, $this->field_config['importeelc8']['symbol_dec'], $this->field_config['importeelc8']['symbol_grp']);
      }
      $this->Before_unformat['importec8'] = $this->importec8;
      if (!empty($this->field_config['importec8']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importec8, $this->field_config['importec8']['symbol_dec'], $this->field_config['importec8']['symbol_grp'], $this->field_config['importec8']['symbol_mon']);
         nm_limpa_valor($this->importec8, $this->field_config['importec8']['symbol_dec'], $this->field_config['importec8']['symbol_grp']);
      }
      $this->Before_unformat['importeepc8'] = $this->importeepc8;
      if (!empty($this->field_config['importeepc8']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepc8, $this->field_config['importeepc8']['symbol_dec'], $this->field_config['importeepc8']['symbol_grp'], $this->field_config['importeepc8']['symbol_mon']);
         nm_limpa_valor($this->importeepc8, $this->field_config['importeepc8']['symbol_dec'], $this->field_config['importeepc8']['symbol_grp']);
      }
      $this->Before_unformat['importec9'] = $this->importec9;
      if (!empty($this->field_config['importec9']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importec9, $this->field_config['importec9']['symbol_dec'], $this->field_config['importec9']['symbol_grp'], $this->field_config['importec9']['symbol_mon']);
         nm_limpa_valor($this->importec9, $this->field_config['importec9']['symbol_dec'], $this->field_config['importec9']['symbol_grp']);
      }
      $this->Before_unformat['importeelc9'] = $this->importeelc9;
      if (!empty($this->field_config['importeelc9']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeelc9, $this->field_config['importeelc9']['symbol_dec'], $this->field_config['importeelc9']['symbol_grp'], $this->field_config['importeelc9']['symbol_mon']);
         nm_limpa_valor($this->importeelc9, $this->field_config['importeelc9']['symbol_dec'], $this->field_config['importeelc9']['symbol_grp']);
      }
      $this->Before_unformat['importeepc9'] = $this->importeepc9;
      if (!empty($this->field_config['importeepc9']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importeepc9, $this->field_config['importeepc9']['symbol_dec'], $this->field_config['importeepc9']['symbol_grp'], $this->field_config['importeepc9']['symbol_mon']);
         nm_limpa_valor($this->importeepc9, $this->field_config['importeepc9']['symbol_dec'], $this->field_config['importeepc9']['symbol_grp']);
      }
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
      if ($Nome_Campo == "importea")
      {
          if (!empty($this->field_config['importea']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importea, $this->field_config['importea']['symbol_dec'], $this->field_config['importea']['symbol_grp'], $this->field_config['importea']['symbol_mon']);
             nm_limpa_valor($this->importea, $this->field_config['importea']['symbol_dec'], $this->field_config['importea']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeela")
      {
          if (!empty($this->field_config['importeela']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeela, $this->field_config['importeela']['symbol_dec'], $this->field_config['importeela']['symbol_grp'], $this->field_config['importeela']['symbol_mon']);
             nm_limpa_valor($this->importeela, $this->field_config['importeela']['symbol_dec'], $this->field_config['importeela']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepa")
      {
          if (!empty($this->field_config['importeepa']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepa, $this->field_config['importeepa']['symbol_dec'], $this->field_config['importeepa']['symbol_grp'], $this->field_config['importeepa']['symbol_mon']);
             nm_limpa_valor($this->importeepa, $this->field_config['importeepa']['symbol_dec'], $this->field_config['importeepa']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importem")
      {
          if (!empty($this->field_config['importem']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importem, $this->field_config['importem']['symbol_dec'], $this->field_config['importem']['symbol_grp'], $this->field_config['importem']['symbol_mon']);
             nm_limpa_valor($this->importem, $this->field_config['importem']['symbol_dec'], $this->field_config['importem']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelm")
      {
          if (!empty($this->field_config['importeelm']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelm, $this->field_config['importeelm']['symbol_dec'], $this->field_config['importeelm']['symbol_grp'], $this->field_config['importeelm']['symbol_mon']);
             nm_limpa_valor($this->importeelm, $this->field_config['importeelm']['symbol_dec'], $this->field_config['importeelm']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepm")
      {
          if (!empty($this->field_config['importeepm']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepm, $this->field_config['importeepm']['symbol_dec'], $this->field_config['importeepm']['symbol_grp'], $this->field_config['importeepm']['symbol_mon']);
             nm_limpa_valor($this->importeepm, $this->field_config['importeepm']['symbol_dec'], $this->field_config['importeepm']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeb2")
      {
          if (!empty($this->field_config['importeb2']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeb2, $this->field_config['importeb2']['symbol_dec'], $this->field_config['importeb2']['symbol_grp'], $this->field_config['importeb2']['symbol_mon']);
             nm_limpa_valor($this->importeb2, $this->field_config['importeb2']['symbol_dec'], $this->field_config['importeb2']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelb2")
      {
          if (!empty($this->field_config['importeelb2']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelb2, $this->field_config['importeelb2']['symbol_dec'], $this->field_config['importeelb2']['symbol_grp'], $this->field_config['importeelb2']['symbol_mon']);
             nm_limpa_valor($this->importeelb2, $this->field_config['importeelb2']['symbol_dec'], $this->field_config['importeelb2']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepb2")
      {
          if (!empty($this->field_config['importeepb2']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepb2, $this->field_config['importeepb2']['symbol_dec'], $this->field_config['importeepb2']['symbol_grp'], $this->field_config['importeepb2']['symbol_mon']);
             nm_limpa_valor($this->importeepb2, $this->field_config['importeepb2']['symbol_dec'], $this->field_config['importeepb2']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeb3")
      {
          if (!empty($this->field_config['importeb3']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeb3, $this->field_config['importeb3']['symbol_dec'], $this->field_config['importeb3']['symbol_grp'], $this->field_config['importeb3']['symbol_mon']);
             nm_limpa_valor($this->importeb3, $this->field_config['importeb3']['symbol_dec'], $this->field_config['importeb3']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelb3")
      {
          if (!empty($this->field_config['importeelb3']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelb3, $this->field_config['importeelb3']['symbol_dec'], $this->field_config['importeelb3']['symbol_grp'], $this->field_config['importeelb3']['symbol_mon']);
             nm_limpa_valor($this->importeelb3, $this->field_config['importeelb3']['symbol_dec'], $this->field_config['importeelb3']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepb3")
      {
          if (!empty($this->field_config['importeepb3']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepb3, $this->field_config['importeepb3']['symbol_dec'], $this->field_config['importeepb3']['symbol_grp'], $this->field_config['importeepb3']['symbol_mon']);
             nm_limpa_valor($this->importeepb3, $this->field_config['importeepb3']['symbol_dec'], $this->field_config['importeepb3']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeb4")
      {
          if (!empty($this->field_config['importeb4']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeb4, $this->field_config['importeb4']['symbol_dec'], $this->field_config['importeb4']['symbol_grp'], $this->field_config['importeb4']['symbol_mon']);
             nm_limpa_valor($this->importeb4, $this->field_config['importeb4']['symbol_dec'], $this->field_config['importeb4']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelb4")
      {
          if (!empty($this->field_config['importeelb4']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelb4, $this->field_config['importeelb4']['symbol_dec'], $this->field_config['importeelb4']['symbol_grp'], $this->field_config['importeelb4']['symbol_mon']);
             nm_limpa_valor($this->importeelb4, $this->field_config['importeelb4']['symbol_dec'], $this->field_config['importeelb4']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepb4")
      {
          if (!empty($this->field_config['importeepb4']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepb4, $this->field_config['importeepb4']['symbol_dec'], $this->field_config['importeepb4']['symbol_grp'], $this->field_config['importeepb4']['symbol_mon']);
             nm_limpa_valor($this->importeepb4, $this->field_config['importeepb4']['symbol_dec'], $this->field_config['importeepb4']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importec2")
      {
          if (!empty($this->field_config['importec2']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importec2, $this->field_config['importec2']['symbol_dec'], $this->field_config['importec2']['symbol_grp'], $this->field_config['importec2']['symbol_mon']);
             nm_limpa_valor($this->importec2, $this->field_config['importec2']['symbol_dec'], $this->field_config['importec2']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelc2")
      {
          if (!empty($this->field_config['importeelc2']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelc2, $this->field_config['importeelc2']['symbol_dec'], $this->field_config['importeelc2']['symbol_grp'], $this->field_config['importeelc2']['symbol_mon']);
             nm_limpa_valor($this->importeelc2, $this->field_config['importeelc2']['symbol_dec'], $this->field_config['importeelc2']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepc2")
      {
          if (!empty($this->field_config['importeepc2']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepc2, $this->field_config['importeepc2']['symbol_dec'], $this->field_config['importeepc2']['symbol_grp'], $this->field_config['importeepc2']['symbol_mon']);
             nm_limpa_valor($this->importeepc2, $this->field_config['importeepc2']['symbol_dec'], $this->field_config['importeepc2']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importec3")
      {
          if (!empty($this->field_config['importec3']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importec3, $this->field_config['importec3']['symbol_dec'], $this->field_config['importec3']['symbol_grp'], $this->field_config['importec3']['symbol_mon']);
             nm_limpa_valor($this->importec3, $this->field_config['importec3']['symbol_dec'], $this->field_config['importec3']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelc3")
      {
          if (!empty($this->field_config['importeelc3']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelc3, $this->field_config['importeelc3']['symbol_dec'], $this->field_config['importeelc3']['symbol_grp'], $this->field_config['importeelc3']['symbol_mon']);
             nm_limpa_valor($this->importeelc3, $this->field_config['importeelc3']['symbol_dec'], $this->field_config['importeelc3']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepc3")
      {
          if (!empty($this->field_config['importeepc3']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepc3, $this->field_config['importeepc3']['symbol_dec'], $this->field_config['importeepc3']['symbol_grp'], $this->field_config['importeepc3']['symbol_mon']);
             nm_limpa_valor($this->importeepc3, $this->field_config['importeepc3']['symbol_dec'], $this->field_config['importeepc3']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importec4")
      {
          if (!empty($this->field_config['importec4']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importec4, $this->field_config['importec4']['symbol_dec'], $this->field_config['importec4']['symbol_grp'], $this->field_config['importec4']['symbol_mon']);
             nm_limpa_valor($this->importec4, $this->field_config['importec4']['symbol_dec'], $this->field_config['importec4']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelc4")
      {
          if (!empty($this->field_config['importeelc4']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelc4, $this->field_config['importeelc4']['symbol_dec'], $this->field_config['importeelc4']['symbol_grp'], $this->field_config['importeelc4']['symbol_mon']);
             nm_limpa_valor($this->importeelc4, $this->field_config['importeelc4']['symbol_dec'], $this->field_config['importeelc4']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepc4")
      {
          if (!empty($this->field_config['importeepc4']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepc4, $this->field_config['importeepc4']['symbol_dec'], $this->field_config['importeepc4']['symbol_grp'], $this->field_config['importeepc4']['symbol_mon']);
             nm_limpa_valor($this->importeepc4, $this->field_config['importeepc4']['symbol_dec'], $this->field_config['importeepc4']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importec5")
      {
          if (!empty($this->field_config['importec5']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importec5, $this->field_config['importec5']['symbol_dec'], $this->field_config['importec5']['symbol_grp'], $this->field_config['importec5']['symbol_mon']);
             nm_limpa_valor($this->importec5, $this->field_config['importec5']['symbol_dec'], $this->field_config['importec5']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelc5")
      {
          if (!empty($this->field_config['importeelc5']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelc5, $this->field_config['importeelc5']['symbol_dec'], $this->field_config['importeelc5']['symbol_grp'], $this->field_config['importeelc5']['symbol_mon']);
             nm_limpa_valor($this->importeelc5, $this->field_config['importeelc5']['symbol_dec'], $this->field_config['importeelc5']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepc5")
      {
          if (!empty($this->field_config['importeepc5']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepc5, $this->field_config['importeepc5']['symbol_dec'], $this->field_config['importeepc5']['symbol_grp'], $this->field_config['importeepc5']['symbol_mon']);
             nm_limpa_valor($this->importeepc5, $this->field_config['importeepc5']['symbol_dec'], $this->field_config['importeepc5']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importec6")
      {
          if (!empty($this->field_config['importec6']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importec6, $this->field_config['importec6']['symbol_dec'], $this->field_config['importec6']['symbol_grp'], $this->field_config['importec6']['symbol_mon']);
             nm_limpa_valor($this->importec6, $this->field_config['importec6']['symbol_dec'], $this->field_config['importec6']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelc6")
      {
          if (!empty($this->field_config['importeelc6']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelc6, $this->field_config['importeelc6']['symbol_dec'], $this->field_config['importeelc6']['symbol_grp'], $this->field_config['importeelc6']['symbol_mon']);
             nm_limpa_valor($this->importeelc6, $this->field_config['importeelc6']['symbol_dec'], $this->field_config['importeelc6']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepc6")
      {
          if (!empty($this->field_config['importeepc6']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepc6, $this->field_config['importeepc6']['symbol_dec'], $this->field_config['importeepc6']['symbol_grp'], $this->field_config['importeepc6']['symbol_mon']);
             nm_limpa_valor($this->importeepc6, $this->field_config['importeepc6']['symbol_dec'], $this->field_config['importeepc6']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importec7")
      {
          if (!empty($this->field_config['importec7']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importec7, $this->field_config['importec7']['symbol_dec'], $this->field_config['importec7']['symbol_grp'], $this->field_config['importec7']['symbol_mon']);
             nm_limpa_valor($this->importec7, $this->field_config['importec7']['symbol_dec'], $this->field_config['importec7']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelc7")
      {
          if (!empty($this->field_config['importeelc7']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelc7, $this->field_config['importeelc7']['symbol_dec'], $this->field_config['importeelc7']['symbol_grp'], $this->field_config['importeelc7']['symbol_mon']);
             nm_limpa_valor($this->importeelc7, $this->field_config['importeelc7']['symbol_dec'], $this->field_config['importeelc7']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepc7")
      {
          if (!empty($this->field_config['importeepc7']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepc7, $this->field_config['importeepc7']['symbol_dec'], $this->field_config['importeepc7']['symbol_grp'], $this->field_config['importeepc7']['symbol_mon']);
             nm_limpa_valor($this->importeepc7, $this->field_config['importeepc7']['symbol_dec'], $this->field_config['importeepc7']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelc8")
      {
          if (!empty($this->field_config['importeelc8']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelc8, $this->field_config['importeelc8']['symbol_dec'], $this->field_config['importeelc8']['symbol_grp'], $this->field_config['importeelc8']['symbol_mon']);
             nm_limpa_valor($this->importeelc8, $this->field_config['importeelc8']['symbol_dec'], $this->field_config['importeelc8']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importec8")
      {
          if (!empty($this->field_config['importec8']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importec8, $this->field_config['importec8']['symbol_dec'], $this->field_config['importec8']['symbol_grp'], $this->field_config['importec8']['symbol_mon']);
             nm_limpa_valor($this->importec8, $this->field_config['importec8']['symbol_dec'], $this->field_config['importec8']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepc8")
      {
          if (!empty($this->field_config['importeepc8']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepc8, $this->field_config['importeepc8']['symbol_dec'], $this->field_config['importeepc8']['symbol_grp'], $this->field_config['importeepc8']['symbol_mon']);
             nm_limpa_valor($this->importeepc8, $this->field_config['importeepc8']['symbol_dec'], $this->field_config['importeepc8']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importec9")
      {
          if (!empty($this->field_config['importec9']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importec9, $this->field_config['importec9']['symbol_dec'], $this->field_config['importec9']['symbol_grp'], $this->field_config['importec9']['symbol_mon']);
             nm_limpa_valor($this->importec9, $this->field_config['importec9']['symbol_dec'], $this->field_config['importec9']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeelc9")
      {
          if (!empty($this->field_config['importeelc9']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeelc9, $this->field_config['importeelc9']['symbol_dec'], $this->field_config['importeelc9']['symbol_grp'], $this->field_config['importeelc9']['symbol_mon']);
             nm_limpa_valor($this->importeelc9, $this->field_config['importeelc9']['symbol_dec'], $this->field_config['importeelc9']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importeepc9")
      {
          if (!empty($this->field_config['importeepc9']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importeepc9, $this->field_config['importeepc9']['symbol_dec'], $this->field_config['importeepc9']['symbol_grp'], $this->field_config['importeepc9']['symbol_mon']);
             nm_limpa_valor($this->importeepc9, $this->field_config['importeepc9']['symbol_dec'], $this->field_config['importeepc9']['symbol_grp']);
          }
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
      if ('' !== $this->importea || (!empty($format_fields) && isset($format_fields['importea'])))
      {
          nmgp_Form_Num_Val($this->importea, $this->field_config['importea']['symbol_grp'], $this->field_config['importea']['symbol_dec'], "0", "S", $this->field_config['importea']['format_neg'], "", "", "-", $this->field_config['importea']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importea']['symbol_mon'];
          $this->sc_add_currency($this->importea, $sMonSymb, $this->field_config['importea']['format_pos']); 
      }
      if ('' !== $this->importeela || (!empty($format_fields) && isset($format_fields['importeela'])))
      {
          nmgp_Form_Num_Val($this->importeela, $this->field_config['importeela']['symbol_grp'], $this->field_config['importeela']['symbol_dec'], "0", "S", $this->field_config['importeela']['format_neg'], "", "", "-", $this->field_config['importeela']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeela']['symbol_mon'];
          $this->sc_add_currency($this->importeela, $sMonSymb, $this->field_config['importeela']['format_pos']); 
      }
      if ('' !== $this->importeepa || (!empty($format_fields) && isset($format_fields['importeepa'])))
      {
          nmgp_Form_Num_Val($this->importeepa, $this->field_config['importeepa']['symbol_grp'], $this->field_config['importeepa']['symbol_dec'], "0", "S", $this->field_config['importeepa']['format_neg'], "", "", "-", $this->field_config['importeepa']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepa']['symbol_mon'];
          $this->sc_add_currency($this->importeepa, $sMonSymb, $this->field_config['importeepa']['format_pos']); 
      }
      if ('' !== $this->importem || (!empty($format_fields) && isset($format_fields['importem'])))
      {
          nmgp_Form_Num_Val($this->importem, $this->field_config['importem']['symbol_grp'], $this->field_config['importem']['symbol_dec'], "0", "S", $this->field_config['importem']['format_neg'], "", "", "-", $this->field_config['importem']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importem']['symbol_mon'];
          $this->sc_add_currency($this->importem, $sMonSymb, $this->field_config['importem']['format_pos']); 
      }
      if ('' !== $this->importeelm || (!empty($format_fields) && isset($format_fields['importeelm'])))
      {
          nmgp_Form_Num_Val($this->importeelm, $this->field_config['importeelm']['symbol_grp'], $this->field_config['importeelm']['symbol_dec'], "0", "S", $this->field_config['importeelm']['format_neg'], "", "", "-", $this->field_config['importeelm']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelm']['symbol_mon'];
          $this->sc_add_currency($this->importeelm, $sMonSymb, $this->field_config['importeelm']['format_pos']); 
      }
      if ('' !== $this->importeepm || (!empty($format_fields) && isset($format_fields['importeepm'])))
      {
          nmgp_Form_Num_Val($this->importeepm, $this->field_config['importeepm']['symbol_grp'], $this->field_config['importeepm']['symbol_dec'], "0", "S", $this->field_config['importeepm']['format_neg'], "", "", "-", $this->field_config['importeepm']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepm']['symbol_mon'];
          $this->sc_add_currency($this->importeepm, $sMonSymb, $this->field_config['importeepm']['format_pos']); 
      }
      if ('' !== $this->importeb2 || (!empty($format_fields) && isset($format_fields['importeb2'])))
      {
          nmgp_Form_Num_Val($this->importeb2, $this->field_config['importeb2']['symbol_grp'], $this->field_config['importeb2']['symbol_dec'], "0", "S", $this->field_config['importeb2']['format_neg'], "", "", "-", $this->field_config['importeb2']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeb2']['symbol_mon'];
          $this->sc_add_currency($this->importeb2, $sMonSymb, $this->field_config['importeb2']['format_pos']); 
      }
      if ('' !== $this->importeelb2 || (!empty($format_fields) && isset($format_fields['importeelb2'])))
      {
          nmgp_Form_Num_Val($this->importeelb2, $this->field_config['importeelb2']['symbol_grp'], $this->field_config['importeelb2']['symbol_dec'], "0", "S", $this->field_config['importeelb2']['format_neg'], "", "", "-", $this->field_config['importeelb2']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelb2']['symbol_mon'];
          $this->sc_add_currency($this->importeelb2, $sMonSymb, $this->field_config['importeelb2']['format_pos']); 
      }
      if ('' !== $this->importeepb2 || (!empty($format_fields) && isset($format_fields['importeepb2'])))
      {
          nmgp_Form_Num_Val($this->importeepb2, $this->field_config['importeepb2']['symbol_grp'], $this->field_config['importeepb2']['symbol_dec'], "0", "S", $this->field_config['importeepb2']['format_neg'], "", "", "-", $this->field_config['importeepb2']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepb2']['symbol_mon'];
          $this->sc_add_currency($this->importeepb2, $sMonSymb, $this->field_config['importeepb2']['format_pos']); 
      }
      if ('' !== $this->importeb3 || (!empty($format_fields) && isset($format_fields['importeb3'])))
      {
          nmgp_Form_Num_Val($this->importeb3, $this->field_config['importeb3']['symbol_grp'], $this->field_config['importeb3']['symbol_dec'], "0", "S", $this->field_config['importeb3']['format_neg'], "", "", "-", $this->field_config['importeb3']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeb3']['symbol_mon'];
          $this->sc_add_currency($this->importeb3, $sMonSymb, $this->field_config['importeb3']['format_pos']); 
      }
      if ('' !== $this->importeelb3 || (!empty($format_fields) && isset($format_fields['importeelb3'])))
      {
          nmgp_Form_Num_Val($this->importeelb3, $this->field_config['importeelb3']['symbol_grp'], $this->field_config['importeelb3']['symbol_dec'], "0", "S", $this->field_config['importeelb3']['format_neg'], "", "", "-", $this->field_config['importeelb3']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelb3']['symbol_mon'];
          $this->sc_add_currency($this->importeelb3, $sMonSymb, $this->field_config['importeelb3']['format_pos']); 
      }
      if ('' !== $this->importeepb3 || (!empty($format_fields) && isset($format_fields['importeepb3'])))
      {
          nmgp_Form_Num_Val($this->importeepb3, $this->field_config['importeepb3']['symbol_grp'], $this->field_config['importeepb3']['symbol_dec'], "0", "S", $this->field_config['importeepb3']['format_neg'], "", "", "-", $this->field_config['importeepb3']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepb3']['symbol_mon'];
          $this->sc_add_currency($this->importeepb3, $sMonSymb, $this->field_config['importeepb3']['format_pos']); 
      }
      if ('' !== $this->importeb4 || (!empty($format_fields) && isset($format_fields['importeb4'])))
      {
          nmgp_Form_Num_Val($this->importeb4, $this->field_config['importeb4']['symbol_grp'], $this->field_config['importeb4']['symbol_dec'], "0", "S", $this->field_config['importeb4']['format_neg'], "", "", "-", $this->field_config['importeb4']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeb4']['symbol_mon'];
          $this->sc_add_currency($this->importeb4, $sMonSymb, $this->field_config['importeb4']['format_pos']); 
      }
      if ('' !== $this->importeelb4 || (!empty($format_fields) && isset($format_fields['importeelb4'])))
      {
          nmgp_Form_Num_Val($this->importeelb4, $this->field_config['importeelb4']['symbol_grp'], $this->field_config['importeelb4']['symbol_dec'], "0", "S", $this->field_config['importeelb4']['format_neg'], "", "", "-", $this->field_config['importeelb4']['symbol_fmt']) ; 
      }
      if ('' !== $this->importeepb4 || (!empty($format_fields) && isset($format_fields['importeepb4'])))
      {
          nmgp_Form_Num_Val($this->importeepb4, $this->field_config['importeepb4']['symbol_grp'], $this->field_config['importeepb4']['symbol_dec'], "0", "S", $this->field_config['importeepb4']['format_neg'], "", "", "-", $this->field_config['importeepb4']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepb4']['symbol_mon'];
          $this->sc_add_currency($this->importeepb4, $sMonSymb, $this->field_config['importeepb4']['format_pos']); 
      }
      if ('' !== $this->importec2 || (!empty($format_fields) && isset($format_fields['importec2'])))
      {
          nmgp_Form_Num_Val($this->importec2, $this->field_config['importec2']['symbol_grp'], $this->field_config['importec2']['symbol_dec'], "0", "S", $this->field_config['importec2']['format_neg'], "", "", "-", $this->field_config['importec2']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importec2']['symbol_mon'];
          $this->sc_add_currency($this->importec2, $sMonSymb, $this->field_config['importec2']['format_pos']); 
      }
      if ('' !== $this->importeelc2 || (!empty($format_fields) && isset($format_fields['importeelc2'])))
      {
          nmgp_Form_Num_Val($this->importeelc2, $this->field_config['importeelc2']['symbol_grp'], $this->field_config['importeelc2']['symbol_dec'], "0", "S", $this->field_config['importeelc2']['format_neg'], "", "", "-", $this->field_config['importeelc2']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelc2']['symbol_mon'];
          $this->sc_add_currency($this->importeelc2, $sMonSymb, $this->field_config['importeelc2']['format_pos']); 
      }
      if ('' !== $this->importeepc2 || (!empty($format_fields) && isset($format_fields['importeepc2'])))
      {
          nmgp_Form_Num_Val($this->importeepc2, $this->field_config['importeepc2']['symbol_grp'], $this->field_config['importeepc2']['symbol_dec'], "0", "S", $this->field_config['importeepc2']['format_neg'], "", "", "-", $this->field_config['importeepc2']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepc2']['symbol_mon'];
          $this->sc_add_currency($this->importeepc2, $sMonSymb, $this->field_config['importeepc2']['format_pos']); 
      }
      if ('' !== $this->importec3 || (!empty($format_fields) && isset($format_fields['importec3'])))
      {
          nmgp_Form_Num_Val($this->importec3, $this->field_config['importec3']['symbol_grp'], $this->field_config['importec3']['symbol_dec'], "0", "S", $this->field_config['importec3']['format_neg'], "", "", "-", $this->field_config['importec3']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importec3']['symbol_mon'];
          $this->sc_add_currency($this->importec3, $sMonSymb, $this->field_config['importec3']['format_pos']); 
      }
      if ('' !== $this->importeelc3 || (!empty($format_fields) && isset($format_fields['importeelc3'])))
      {
          nmgp_Form_Num_Val($this->importeelc3, $this->field_config['importeelc3']['symbol_grp'], $this->field_config['importeelc3']['symbol_dec'], "0", "S", $this->field_config['importeelc3']['format_neg'], "", "", "-", $this->field_config['importeelc3']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelc3']['symbol_mon'];
          $this->sc_add_currency($this->importeelc3, $sMonSymb, $this->field_config['importeelc3']['format_pos']); 
      }
      if ('' !== $this->importeepc3 || (!empty($format_fields) && isset($format_fields['importeepc3'])))
      {
          nmgp_Form_Num_Val($this->importeepc3, $this->field_config['importeepc3']['symbol_grp'], $this->field_config['importeepc3']['symbol_dec'], "0", "S", $this->field_config['importeepc3']['format_neg'], "", "", "-", $this->field_config['importeepc3']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepc3']['symbol_mon'];
          $this->sc_add_currency($this->importeepc3, $sMonSymb, $this->field_config['importeepc3']['format_pos']); 
      }
      if ('' !== $this->importec4 || (!empty($format_fields) && isset($format_fields['importec4'])))
      {
          nmgp_Form_Num_Val($this->importec4, $this->field_config['importec4']['symbol_grp'], $this->field_config['importec4']['symbol_dec'], "0", "S", $this->field_config['importec4']['format_neg'], "", "", "-", $this->field_config['importec4']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importec4']['symbol_mon'];
          $this->sc_add_currency($this->importec4, $sMonSymb, $this->field_config['importec4']['format_pos']); 
      }
      if ('' !== $this->importeelc4 || (!empty($format_fields) && isset($format_fields['importeelc4'])))
      {
          nmgp_Form_Num_Val($this->importeelc4, $this->field_config['importeelc4']['symbol_grp'], $this->field_config['importeelc4']['symbol_dec'], "0", "S", $this->field_config['importeelc4']['format_neg'], "", "", "-", $this->field_config['importeelc4']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelc4']['symbol_mon'];
          $this->sc_add_currency($this->importeelc4, $sMonSymb, $this->field_config['importeelc4']['format_pos']); 
      }
      if ('' !== $this->importeepc4 || (!empty($format_fields) && isset($format_fields['importeepc4'])))
      {
          nmgp_Form_Num_Val($this->importeepc4, $this->field_config['importeepc4']['symbol_grp'], $this->field_config['importeepc4']['symbol_dec'], "0", "S", $this->field_config['importeepc4']['format_neg'], "", "", "-", $this->field_config['importeepc4']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepc4']['symbol_mon'];
          $this->sc_add_currency($this->importeepc4, $sMonSymb, $this->field_config['importeepc4']['format_pos']); 
      }
      if ('' !== $this->importec5 || (!empty($format_fields) && isset($format_fields['importec5'])))
      {
          nmgp_Form_Num_Val($this->importec5, $this->field_config['importec5']['symbol_grp'], $this->field_config['importec5']['symbol_dec'], "0", "S", $this->field_config['importec5']['format_neg'], "", "", "-", $this->field_config['importec5']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importec5']['symbol_mon'];
          $this->sc_add_currency($this->importec5, $sMonSymb, $this->field_config['importec5']['format_pos']); 
      }
      if ('' !== $this->importeelc5 || (!empty($format_fields) && isset($format_fields['importeelc5'])))
      {
          nmgp_Form_Num_Val($this->importeelc5, $this->field_config['importeelc5']['symbol_grp'], $this->field_config['importeelc5']['symbol_dec'], "0", "S", $this->field_config['importeelc5']['format_neg'], "", "", "-", $this->field_config['importeelc5']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelc5']['symbol_mon'];
          $this->sc_add_currency($this->importeelc5, $sMonSymb, $this->field_config['importeelc5']['format_pos']); 
      }
      if ('' !== $this->importeepc5 || (!empty($format_fields) && isset($format_fields['importeepc5'])))
      {
          nmgp_Form_Num_Val($this->importeepc5, $this->field_config['importeepc5']['symbol_grp'], $this->field_config['importeepc5']['symbol_dec'], "0", "S", $this->field_config['importeepc5']['format_neg'], "", "", "-", $this->field_config['importeepc5']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepc5']['symbol_mon'];
          $this->sc_add_currency($this->importeepc5, $sMonSymb, $this->field_config['importeepc5']['format_pos']); 
      }
      if ('' !== $this->importec6 || (!empty($format_fields) && isset($format_fields['importec6'])))
      {
          nmgp_Form_Num_Val($this->importec6, $this->field_config['importec6']['symbol_grp'], $this->field_config['importec6']['symbol_dec'], "0", "S", $this->field_config['importec6']['format_neg'], "", "", "-", $this->field_config['importec6']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importec6']['symbol_mon'];
          $this->sc_add_currency($this->importec6, $sMonSymb, $this->field_config['importec6']['format_pos']); 
      }
      if ('' !== $this->importeelc6 || (!empty($format_fields) && isset($format_fields['importeelc6'])))
      {
          nmgp_Form_Num_Val($this->importeelc6, $this->field_config['importeelc6']['symbol_grp'], $this->field_config['importeelc6']['symbol_dec'], "0", "S", $this->field_config['importeelc6']['format_neg'], "", "", "-", $this->field_config['importeelc6']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelc6']['symbol_mon'];
          $this->sc_add_currency($this->importeelc6, $sMonSymb, $this->field_config['importeelc6']['format_pos']); 
      }
      if ('' !== $this->importeepc6 || (!empty($format_fields) && isset($format_fields['importeepc6'])))
      {
          nmgp_Form_Num_Val($this->importeepc6, $this->field_config['importeepc6']['symbol_grp'], $this->field_config['importeepc6']['symbol_dec'], "0", "S", $this->field_config['importeepc6']['format_neg'], "", "", "-", $this->field_config['importeepc6']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepc6']['symbol_mon'];
          $this->sc_add_currency($this->importeepc6, $sMonSymb, $this->field_config['importeepc6']['format_pos']); 
      }
      if ('' !== $this->importec7 || (!empty($format_fields) && isset($format_fields['importec7'])))
      {
          nmgp_Form_Num_Val($this->importec7, $this->field_config['importec7']['symbol_grp'], $this->field_config['importec7']['symbol_dec'], "0", "S", $this->field_config['importec7']['format_neg'], "", "", "-", $this->field_config['importec7']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importec7']['symbol_mon'];
          $this->sc_add_currency($this->importec7, $sMonSymb, $this->field_config['importec7']['format_pos']); 
      }
      if ('' !== $this->importeelc7 || (!empty($format_fields) && isset($format_fields['importeelc7'])))
      {
          nmgp_Form_Num_Val($this->importeelc7, $this->field_config['importeelc7']['symbol_grp'], $this->field_config['importeelc7']['symbol_dec'], "0", "S", $this->field_config['importeelc7']['format_neg'], "", "", "-", $this->field_config['importeelc7']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelc7']['symbol_mon'];
          $this->sc_add_currency($this->importeelc7, $sMonSymb, $this->field_config['importeelc7']['format_pos']); 
      }
      if ('' !== $this->importeepc7 || (!empty($format_fields) && isset($format_fields['importeepc7'])))
      {
          nmgp_Form_Num_Val($this->importeepc7, $this->field_config['importeepc7']['symbol_grp'], $this->field_config['importeepc7']['symbol_dec'], "0", "S", $this->field_config['importeepc7']['format_neg'], "", "", "-", $this->field_config['importeepc7']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepc7']['symbol_mon'];
          $this->sc_add_currency($this->importeepc7, $sMonSymb, $this->field_config['importeepc7']['format_pos']); 
      }
      if ('' !== $this->importeelc8 || (!empty($format_fields) && isset($format_fields['importeelc8'])))
      {
          nmgp_Form_Num_Val($this->importeelc8, $this->field_config['importeelc8']['symbol_grp'], $this->field_config['importeelc8']['symbol_dec'], "0", "S", $this->field_config['importeelc8']['format_neg'], "", "", "-", $this->field_config['importeelc8']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelc8']['symbol_mon'];
          $this->sc_add_currency($this->importeelc8, $sMonSymb, $this->field_config['importeelc8']['format_pos']); 
      }
      if ('' !== $this->importec8 || (!empty($format_fields) && isset($format_fields['importec8'])))
      {
          nmgp_Form_Num_Val($this->importec8, $this->field_config['importec8']['symbol_grp'], $this->field_config['importec8']['symbol_dec'], "0", "S", $this->field_config['importec8']['format_neg'], "", "", "-", $this->field_config['importec8']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importec8']['symbol_mon'];
          $this->sc_add_currency($this->importec8, $sMonSymb, $this->field_config['importec8']['format_pos']); 
      }
      if ('' !== $this->importeepc8 || (!empty($format_fields) && isset($format_fields['importeepc8'])))
      {
          nmgp_Form_Num_Val($this->importeepc8, $this->field_config['importeepc8']['symbol_grp'], $this->field_config['importeepc8']['symbol_dec'], "0", "S", $this->field_config['importeepc8']['format_neg'], "", "", "-", $this->field_config['importeepc8']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepc8']['symbol_mon'];
          $this->sc_add_currency($this->importeepc8, $sMonSymb, $this->field_config['importeepc8']['format_pos']); 
      }
      if ('' !== $this->importec9 || (!empty($format_fields) && isset($format_fields['importec9'])))
      {
          nmgp_Form_Num_Val($this->importec9, $this->field_config['importec9']['symbol_grp'], $this->field_config['importec9']['symbol_dec'], "0", "S", $this->field_config['importec9']['format_neg'], "", "", "-", $this->field_config['importec9']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importec9']['symbol_mon'];
          $this->sc_add_currency($this->importec9, $sMonSymb, $this->field_config['importec9']['format_pos']); 
      }
      if ('' !== $this->importeelc9 || (!empty($format_fields) && isset($format_fields['importeelc9'])))
      {
          nmgp_Form_Num_Val($this->importeelc9, $this->field_config['importeelc9']['symbol_grp'], $this->field_config['importeelc9']['symbol_dec'], "0", "S", $this->field_config['importeelc9']['format_neg'], "", "", "-", $this->field_config['importeelc9']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeelc9']['symbol_mon'];
          $this->sc_add_currency($this->importeelc9, $sMonSymb, $this->field_config['importeelc9']['format_pos']); 
      }
      if ('' !== $this->importeepc9 || (!empty($format_fields) && isset($format_fields['importeepc9'])))
      {
          nmgp_Form_Num_Val($this->importeepc9, $this->field_config['importeepc9']['symbol_grp'], $this->field_config['importeepc9']['symbol_dec'], "0", "S", $this->field_config['importeepc9']['format_neg'], "", "", "-", $this->field_config['importeepc9']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importeepc9']['symbol_mon'];
          $this->sc_add_currency($this->importeepc9, $sMonSymb, $this->field_config['importeepc9']['format_pos']); 
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
          $this->ajax_return_values_a();
          $this->ajax_return_values_importea();
          $this->ajax_return_values_importeela();
          $this->ajax_return_values_importeepa();
          $this->ajax_return_values_estatusa();
          $this->ajax_return_values_m();
          $this->ajax_return_values_importem();
          $this->ajax_return_values_importeelm();
          $this->ajax_return_values_importeepm();
          $this->ajax_return_values_estatusm();
          $this->ajax_return_values_b2();
          $this->ajax_return_values_importeb2();
          $this->ajax_return_values_importeelb2();
          $this->ajax_return_values_importeepb2();
          $this->ajax_return_values_estatusb2();
          $this->ajax_return_values_b3();
          $this->ajax_return_values_importeb3();
          $this->ajax_return_values_importeelb3();
          $this->ajax_return_values_importeepb3();
          $this->ajax_return_values_estatusb3();
          $this->ajax_return_values_b4();
          $this->ajax_return_values_importeb4();
          $this->ajax_return_values_importeelb4();
          $this->ajax_return_values_importeepb4();
          $this->ajax_return_values_estatusb4();
          $this->ajax_return_values_c2();
          $this->ajax_return_values_importec2();
          $this->ajax_return_values_importeelc2();
          $this->ajax_return_values_importeepc2();
          $this->ajax_return_values_estatusc2();
          $this->ajax_return_values_c3();
          $this->ajax_return_values_importec3();
          $this->ajax_return_values_importeelc3();
          $this->ajax_return_values_importeepc3();
          $this->ajax_return_values_estatusc3();
          $this->ajax_return_values_c4();
          $this->ajax_return_values_importec4();
          $this->ajax_return_values_importeelc4();
          $this->ajax_return_values_importeepc4();
          $this->ajax_return_values_estatusc4();
          $this->ajax_return_values_c5();
          $this->ajax_return_values_importec5();
          $this->ajax_return_values_importeelc5();
          $this->ajax_return_values_importeepc5();
          $this->ajax_return_values_estatusc5();
          $this->ajax_return_values_c6();
          $this->ajax_return_values_importec6();
          $this->ajax_return_values_importeelc6();
          $this->ajax_return_values_importeepc6();
          $this->ajax_return_values_estatusc6();
          $this->ajax_return_values_c7();
          $this->ajax_return_values_importec7();
          $this->ajax_return_values_importeelc7();
          $this->ajax_return_values_importeepc7();
          $this->ajax_return_values_estatusc7();
          $this->ajax_return_values_c8();
          $this->ajax_return_values_importeelc8();
          $this->ajax_return_values_importec8();
          $this->ajax_return_values_importeepc8();
          $this->ajax_return_values_estatusc8();
          $this->ajax_return_values_c9();
          $this->ajax_return_values_importec9();
          $this->ajax_return_values_importeelc9();
          $this->ajax_return_values_importeepc9();
          $this->ajax_return_values_estatusc9();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- a
   function ajax_return_values_a($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("a", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->a);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['a'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("a", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importea
   function ajax_return_values_importea($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importea", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importea);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importea'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeela
   function ajax_return_values_importeela($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeela", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeela);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeela'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepa
   function ajax_return_values_importeepa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepa);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepa'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusa
   function ajax_return_values_estatusa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusa);
              $aLookup = array();
              $this->_tmp_lookup_estatusa = $this->estatusa;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusa'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusa'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusa']) && !empty($this->NM_ajax_info['select_html']['estatusa']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusa']);
          }
          $this->NM_ajax_info['fldList']['estatusa'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusa']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusa']['labList'] = $aLabel;
          }
   }

          //----- m
   function ajax_return_values_m($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("m", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->m);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['m'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("m", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importem
   function ajax_return_values_importem($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importem", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importem);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importem'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelm
   function ajax_return_values_importeelm($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelm", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelm);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelm'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepm
   function ajax_return_values_importeepm($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepm", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepm);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepm'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusm
   function ajax_return_values_estatusm($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusm", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusm);
              $aLookup = array();
              $this->_tmp_lookup_estatusm = $this->estatusm;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusm'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusm'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusm']) && !empty($this->NM_ajax_info['select_html']['estatusm']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusm']);
          }
          $this->NM_ajax_info['fldList']['estatusm'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusm']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusm']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusm']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusm']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusm']['labList'] = $aLabel;
          }
   }

          //----- b2
   function ajax_return_values_b2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("b2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->b2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['b2'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("b2", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importeb2
   function ajax_return_values_importeb2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeb2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeb2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeb2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelb2
   function ajax_return_values_importeelb2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelb2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelb2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelb2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepb2
   function ajax_return_values_importeepb2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepb2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepb2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepb2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusb2
   function ajax_return_values_estatusb2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusb2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusb2);
              $aLookup = array();
              $this->_tmp_lookup_estatusb2 = $this->estatusb2;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb2'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb2'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusb2']) && !empty($this->NM_ajax_info['select_html']['estatusb2']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusb2']);
          }
          $this->NM_ajax_info['fldList']['estatusb2'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusb2']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusb2']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusb2']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusb2']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusb2']['labList'] = $aLabel;
          }
   }

          //----- b3
   function ajax_return_values_b3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("b3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->b3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['b3'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("b3", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importeb3
   function ajax_return_values_importeb3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeb3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeb3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeb3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelb3
   function ajax_return_values_importeelb3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelb3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelb3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelb3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepb3
   function ajax_return_values_importeepb3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepb3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepb3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepb3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusb3
   function ajax_return_values_estatusb3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusb3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusb3);
              $aLookup = array();
              $this->_tmp_lookup_estatusb3 = $this->estatusb3;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb3'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb3'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusb3']) && !empty($this->NM_ajax_info['select_html']['estatusb3']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusb3']);
          }
          $this->NM_ajax_info['fldList']['estatusb3'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusb3']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusb3']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusb3']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusb3']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusb3']['labList'] = $aLabel;
          }
   }

          //----- b4
   function ajax_return_values_b4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("b4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->b4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['b4'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("b4", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importeb4
   function ajax_return_values_importeb4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeb4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeb4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeb4'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelb4
   function ajax_return_values_importeelb4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelb4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelb4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelb4'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepb4
   function ajax_return_values_importeepb4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepb4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepb4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepb4'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusb4
   function ajax_return_values_estatusb4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusb4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusb4);
              $aLookup = array();
              $this->_tmp_lookup_estatusb4 = $this->estatusb4;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb4'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusb4'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusb4']) && !empty($this->NM_ajax_info['select_html']['estatusb4']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusb4']);
          }
          $this->NM_ajax_info['fldList']['estatusb4'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusb4']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusb4']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusb4']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusb4']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusb4']['labList'] = $aLabel;
          }
   }

          //----- c2
   function ajax_return_values_c2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("c2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->c2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['c2'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("c2", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importec2
   function ajax_return_values_importec2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importec2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importec2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importec2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelc2
   function ajax_return_values_importeelc2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelc2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelc2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelc2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepc2
   function ajax_return_values_importeepc2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepc2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepc2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepc2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusc2
   function ajax_return_values_estatusc2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusc2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusc2);
              $aLookup = array();
              $this->_tmp_lookup_estatusc2 = $this->estatusc2;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc2'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc2'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusc2']) && !empty($this->NM_ajax_info['select_html']['estatusc2']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusc2']);
          }
          $this->NM_ajax_info['fldList']['estatusc2'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusc2']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusc2']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusc2']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusc2']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusc2']['labList'] = $aLabel;
          }
   }

          //----- c3
   function ajax_return_values_c3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("c3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->c3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['c3'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("c3", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importec3
   function ajax_return_values_importec3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importec3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importec3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importec3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelc3
   function ajax_return_values_importeelc3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelc3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelc3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelc3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepc3
   function ajax_return_values_importeepc3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepc3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepc3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepc3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusc3
   function ajax_return_values_estatusc3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusc3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusc3);
              $aLookup = array();
              $this->_tmp_lookup_estatusc3 = $this->estatusc3;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc3'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc3'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusc3']) && !empty($this->NM_ajax_info['select_html']['estatusc3']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusc3']);
          }
          $this->NM_ajax_info['fldList']['estatusc3'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusc3']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusc3']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusc3']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusc3']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusc3']['labList'] = $aLabel;
          }
   }

          //----- c4
   function ajax_return_values_c4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("c4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->c4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['c4'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("c4", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importec4
   function ajax_return_values_importec4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importec4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importec4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importec4'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelc4
   function ajax_return_values_importeelc4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelc4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelc4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelc4'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepc4
   function ajax_return_values_importeepc4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepc4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepc4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepc4'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusc4
   function ajax_return_values_estatusc4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusc4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusc4);
              $aLookup = array();
              $this->_tmp_lookup_estatusc4 = $this->estatusc4;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc4'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc4'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusc4']) && !empty($this->NM_ajax_info['select_html']['estatusc4']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusc4']);
          }
          $this->NM_ajax_info['fldList']['estatusc4'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusc4']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusc4']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusc4']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusc4']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusc4']['labList'] = $aLabel;
          }
   }

          //----- c5
   function ajax_return_values_c5($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("c5", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->c5);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['c5'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("c5", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importec5
   function ajax_return_values_importec5($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importec5", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importec5);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importec5'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelc5
   function ajax_return_values_importeelc5($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelc5", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelc5);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelc5'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepc5
   function ajax_return_values_importeepc5($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepc5", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepc5);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepc5'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusc5
   function ajax_return_values_estatusc5($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusc5", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusc5);
              $aLookup = array();
              $this->_tmp_lookup_estatusc5 = $this->estatusc5;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc5'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc5'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusc5']) && !empty($this->NM_ajax_info['select_html']['estatusc5']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusc5']);
          }
          $this->NM_ajax_info['fldList']['estatusc5'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusc5']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusc5']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusc5']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusc5']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusc5']['labList'] = $aLabel;
          }
   }

          //----- c6
   function ajax_return_values_c6($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("c6", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->c6);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['c6'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("c6", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importec6
   function ajax_return_values_importec6($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importec6", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importec6);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importec6'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelc6
   function ajax_return_values_importeelc6($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelc6", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelc6);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelc6'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepc6
   function ajax_return_values_importeepc6($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepc6", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepc6);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepc6'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusc6
   function ajax_return_values_estatusc6($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusc6", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusc6);
              $aLookup = array();
              $this->_tmp_lookup_estatusc6 = $this->estatusc6;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc6'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc6'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusc6']) && !empty($this->NM_ajax_info['select_html']['estatusc6']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusc6']);
          }
          $this->NM_ajax_info['fldList']['estatusc6'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusc6']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusc6']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusc6']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusc6']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusc6']['labList'] = $aLabel;
          }
   }

          //----- c7
   function ajax_return_values_c7($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("c7", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->c7);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['c7'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("c7", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importec7
   function ajax_return_values_importec7($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importec7", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importec7);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importec7'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelc7
   function ajax_return_values_importeelc7($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelc7", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelc7);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelc7'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepc7
   function ajax_return_values_importeepc7($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepc7", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepc7);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepc7'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusc7
   function ajax_return_values_estatusc7($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusc7", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusc7);
              $aLookup = array();
              $this->_tmp_lookup_estatusc7 = $this->estatusc7;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc7'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc7'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusc7']) && !empty($this->NM_ajax_info['select_html']['estatusc7']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusc7']);
          }
          $this->NM_ajax_info['fldList']['estatusc7'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusc7']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusc7']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusc7']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusc7']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusc7']['labList'] = $aLabel;
          }
   }

          //----- c8
   function ajax_return_values_c8($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("c8", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->c8);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['c8'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("c8", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importeelc8
   function ajax_return_values_importeelc8($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelc8", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelc8);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelc8'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importec8
   function ajax_return_values_importec8($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importec8", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importec8);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importec8'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepc8
   function ajax_return_values_importeepc8($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepc8", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepc8);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepc8'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusc8
   function ajax_return_values_estatusc8($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusc8", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusc8);
              $aLookup = array();
              $this->_tmp_lookup_estatusc8 = $this->estatusc8;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc8'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc8'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusc8']) && !empty($this->NM_ajax_info['select_html']['estatusc8']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusc8']);
          }
          $this->NM_ajax_info['fldList']['estatusc8'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusc8']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusc8']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusc8']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusc8']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusc8']['labList'] = $aLabel;
          }
   }

          //----- c9
   function ajax_return_values_c9($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("c9", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->c9);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['c9'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("c9", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importec9
   function ajax_return_values_importec9($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importec9", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importec9);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importec9'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeelc9
   function ajax_return_values_importeelc9($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeelc9", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeelc9);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeelc9'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- importeepc9
   function ajax_return_values_importeepc9($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importeepc9", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importeepc9);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importeepc9'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatusc9
   function ajax_return_values_estatusc9($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatusc9", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatusc9);
              $aLookup = array();
              $this->_tmp_lookup_estatusc9 = $this->estatusc9;

$aLookup[] = array(control_formtarifa_pack_protect_string('1') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Activo")));
$aLookup[] = array(control_formtarifa_pack_protect_string('0') => str_replace('<', '&lt;',control_formtarifa_pack_protect_string("Inactivo")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc9'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['Lookup_estatusc9'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatusc9']) && !empty($this->NM_ajax_info['select_html']['estatusc9']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['estatusc9']);
          }
          $this->NM_ajax_info['fldList']['estatusc9'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatusc9']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatusc9']['valList'][$i] = control_formtarifa_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatusc9']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatusc9']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatusc9']['labList'] = $aLabel;
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['upload_dir'][$fieldName][] = $newName;
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              control_formtarifa_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['retorno_edit'] . "';";
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
    include_once("control_formtarifa_form0.php");
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['csrf_token'];
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

   function Form_lookup_estatusa()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusm()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusb2()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusb3()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusb4()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusc2()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusc3()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusc4()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusc5()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusc6()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusc7()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusc8()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_estatusc9()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Activo?#?1?#?S?@?";
       $nmgp_def_dados .= "Inactivo?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

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
       $nmgp_saida_form = "control_formtarifa_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['nm_run_menu'] = 2;
       $nmgp_saida_form = "control_formtarifa_fim.php";
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
       control_formtarifa_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           control_formtarifa_pack_ajax_response();
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
       control_formtarifa_pack_ajax_response();
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
    function sc_ajax_alert($sMessage, $params = array())
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxAlert']['message'] = NM_charset_to_utf8($sMessage);
            $this->NM_ajax_info['ajaxAlert']['params']  = $this->sc_ajax_alert_params($params);
        }
    } // sc_ajax_alert

    function sc_ajax_alert_params($params)
    {
        $paramList = array();
        foreach ($params as $paramName => $paramValue)
        {
            if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding', 'position')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('background' == $paramName)
            {
                $paramList[$paramName] = $this->sc_ajax_alert_image(NM_charset_to_utf8($paramValue));
            }
        }
        return $paramList;
    } // sc_ajax_alert_params

    function sc_ajax_alert_image($background)
    {
        $image_param = $background;
        preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $background, $matches, PREG_PATTERN_ORDER);
        if (isset($matches[3])) {
            foreach ($matches[3] as $match) {
                if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                    $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                }
            }
        }
        return $image_param;
    } // sc_ajax_alert_image
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "ok":
                return array("sub_form_b.sc-unique-btn-1");
                break;
            case "help":
                return array("sc_b_hlp_b");
                break;
            case "exit":
                return array("Bsair_b.sc-unique-btn-2", "Bsair_b.sc-unique-btn-3");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php echo "Fecha Inicial: " . $_SESSION['FechaInicial'] . " <br>  Fecha Final: " . $_SESSION['FechaFinal'] . "" ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo "Caseta: " . $_SESSION['Caseta'] . " <br>  Tipo de Pago: " . $_SESSION['TipoPago'] . "" ?></div>
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa']['ordem_ord'] == " desc") {
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
