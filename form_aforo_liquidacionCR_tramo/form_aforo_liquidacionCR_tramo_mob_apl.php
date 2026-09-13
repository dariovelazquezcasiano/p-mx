<?php
//
class form_aforo_liquidacionCR_tramo_mob_apl
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
   var $consecutivo;
   var $casetaid;
   var $fechaoperacion;
   var $fechaturno;
   var $turnoid;
   var $horaevento;
   var $tramoid;
   var $carrilid;
   var $cuerpo;
   var $secuencial;
   var $folio;
   var $vehiculoid_ect;
   var $clasevehiculo_ect;
   var $importe_ect;
   var $cantidadeje_ect;
   var $tarifaee_ect;
   var $vehiculoid_cr;
   var $clasevehiculo_cr;
   var $importe_cr;
   var $cantidadeje_cr;
   var $tarifaee_cr;
   var $vehiculoid_eap;
   var $clasevehiculo_eap;
   var $importe_eap;
   var $cantidadeje_eap;
   var $tarifaee_eap;
   var $pagoid;
   var $excentoid;
   var $usuarioid;
   var $placas;
   var $numerotarjeta;
   var $tipotarjeta;
   var $fechaenvio;
   var $codigofacturacion;
   var $vehiculoid_ana;
   var $vehiculoid_ana_1;
   var $clasevehiculo_ana;
   var $importe_ana;
   var $pagoid_ana;
   var $pagoid_ana_1;
   var $estatusana;
   var $estatusana_1;
   var $fld_ar_sct;
   var $cantidadeje_ana;
   var $tarifaee_ana;
   var $fechamodificadoana;
   var $fechamodificadoana_hora;
   var $eludidoextra;
   var $revisado;
   var $fechamarcacioncr;
   var $fechamarcacioncr_hora;
   var $fechadeteccionect;
   var $fechadeteccionect_hora;
   var $fechadeteccioneap;
   var $fechadeteccioneap_hora;
   var $tramoidorigen;
   var $operacionid;
   var $residente;
   var $vehiculocorrecto;
   var $fld_importe_eeana;
   var $video;
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
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cantidadeje_ana']))
          {
              $this->cantidadeje_ana = $this->NM_ajax_info['param']['cantidadeje_ana'];
          }
          if (isset($this->NM_ajax_info['param']['consecutivo']))
          {
              $this->consecutivo = $this->NM_ajax_info['param']['consecutivo'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['fld_importe_eeana']))
          {
              $this->fld_importe_eeana = $this->NM_ajax_info['param']['fld_importe_eeana'];
          }
          if (isset($this->NM_ajax_info['param']['importe_ana']))
          {
              $this->importe_ana = $this->NM_ajax_info['param']['importe_ana'];
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
          if (isset($this->NM_ajax_info['param']['pagoid_ana']))
          {
              $this->pagoid_ana = $this->NM_ajax_info['param']['pagoid_ana'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tarifaee_ana']))
          {
              $this->tarifaee_ana = $this->NM_ajax_info['param']['tarifaee_ana'];
          }
          if (isset($this->NM_ajax_info['param']['vehiculocorrecto']))
          {
              $this->vehiculocorrecto = $this->NM_ajax_info['param']['vehiculocorrecto'];
          }
          if (isset($this->NM_ajax_info['param']['vehiculoid_ana']))
          {
              $this->vehiculoid_ana = $this->NM_ajax_info['param']['vehiculoid_ana'];
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
      if (isset($this->CasetaID) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['CasetaID'] = $this->CasetaID;
      }
      if (isset($this->FechaOperacion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['FechaOperacion'] = $this->FechaOperacion;
      }
      if (isset($this->TurnoID) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['TurnoID'] = $this->TurnoID;
      }
      if (isset($this->CarrilID) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['CarrilID'] = $this->CarrilID;
      }
      if (isset($this->Cuerpo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['Cuerpo'] = $this->Cuerpo;
      }
      if (isset($this->OperacionID) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['OperacionID'] = $this->OperacionID;
      }
      if (isset($this->Fechat) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['Fechat'] = $this->Fechat;
      }
      if (isset($this->Hora) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['Hora'] = $this->Hora;
      }
      if (isset($this->Camara) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['Camara'] = $this->Camara;
      }
      if (isset($this->Sec_iniL) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['Sec_iniL'] = $this->Sec_iniL;
      }
      if (isset($this->Sec_finL) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['Sec_finL'] = $this->Sec_finL;
      }
      if (isset($this->sm_global_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sm_global_login'] = $this->sm_global_login;
      }
      if (isset($_POST["CasetaID"]) && isset($this->CasetaID)) 
      {
          $_SESSION['CasetaID'] = $this->CasetaID;
      }
      if (!isset($_POST["CasetaID"]) && isset($_POST["casetaid"])) 
      {
          $_SESSION['CasetaID'] = $_POST["casetaid"];
      }
      if (isset($_POST["FechaOperacion"]) && isset($this->FechaOperacion)) 
      {
          $_SESSION['FechaOperacion'] = $this->FechaOperacion;
      }
      if (!isset($_POST["FechaOperacion"]) && isset($_POST["fechaoperacion"])) 
      {
          $_SESSION['FechaOperacion'] = $_POST["fechaoperacion"];
      }
      if (isset($_POST["TurnoID"]) && isset($this->TurnoID)) 
      {
          $_SESSION['TurnoID'] = $this->TurnoID;
      }
      if (!isset($_POST["TurnoID"]) && isset($_POST["turnoid"])) 
      {
          $_SESSION['TurnoID'] = $_POST["turnoid"];
      }
      if (isset($_POST["CarrilID"]) && isset($this->CarrilID)) 
      {
          $_SESSION['CarrilID'] = $this->CarrilID;
      }
      if (!isset($_POST["CarrilID"]) && isset($_POST["carrilid"])) 
      {
          $_SESSION['CarrilID'] = $_POST["carrilid"];
      }
      if (isset($_POST["Cuerpo"]) && isset($this->Cuerpo)) 
      {
          $_SESSION['Cuerpo'] = $this->Cuerpo;
      }
      if (!isset($_POST["Cuerpo"]) && isset($_POST["cuerpo"])) 
      {
          $_SESSION['Cuerpo'] = $_POST["cuerpo"];
      }
      if (isset($_POST["OperacionID"]) && isset($this->OperacionID)) 
      {
          $_SESSION['OperacionID'] = $this->OperacionID;
      }
      if (!isset($_POST["OperacionID"]) && isset($_POST["operacionid"])) 
      {
          $_SESSION['OperacionID'] = $_POST["operacionid"];
      }
      if (isset($_POST["Fechat"]) && isset($this->Fechat)) 
      {
          $_SESSION['Fechat'] = $this->Fechat;
      }
      if (!isset($_POST["Fechat"]) && isset($_POST["fechat"])) 
      {
          $_SESSION['Fechat'] = $_POST["fechat"];
      }
      if (isset($_POST["Hora"]) && isset($this->Hora)) 
      {
          $_SESSION['Hora'] = $this->Hora;
      }
      if (!isset($_POST["Hora"]) && isset($_POST["hora"])) 
      {
          $_SESSION['Hora'] = $_POST["hora"];
      }
      if (isset($_POST["Camara"]) && isset($this->Camara)) 
      {
          $_SESSION['Camara'] = $this->Camara;
      }
      if (!isset($_POST["Camara"]) && isset($_POST["camara"])) 
      {
          $_SESSION['Camara'] = $_POST["camara"];
      }
      if (isset($_POST["Sec_iniL"]) && isset($this->Sec_iniL)) 
      {
          $_SESSION['Sec_iniL'] = $this->Sec_iniL;
      }
      if (!isset($_POST["Sec_iniL"]) && isset($_POST["sec_inil"])) 
      {
          $_SESSION['Sec_iniL'] = $_POST["sec_inil"];
      }
      if (isset($_POST["Sec_finL"]) && isset($this->Sec_finL)) 
      {
          $_SESSION['Sec_finL'] = $this->Sec_finL;
      }
      if (!isset($_POST["Sec_finL"]) && isset($_POST["sec_finl"])) 
      {
          $_SESSION['Sec_finL'] = $_POST["sec_finl"];
      }
      if (isset($_POST["sm_global_login"]) && isset($this->sm_global_login)) 
      {
          $_SESSION['sm_global_login'] = $this->sm_global_login;
      }
      if (isset($_GET["CasetaID"]) && isset($this->CasetaID)) 
      {
          $_SESSION['CasetaID'] = $this->CasetaID;
      }
      if (!isset($_GET["CasetaID"]) && isset($_GET["casetaid"])) 
      {
          $_SESSION['CasetaID'] = $_GET["casetaid"];
      }
      if (isset($_GET["FechaOperacion"]) && isset($this->FechaOperacion)) 
      {
          $_SESSION['FechaOperacion'] = $this->FechaOperacion;
      }
      if (!isset($_GET["FechaOperacion"]) && isset($_GET["fechaoperacion"])) 
      {
          $_SESSION['FechaOperacion'] = $_GET["fechaoperacion"];
      }
      if (isset($_GET["TurnoID"]) && isset($this->TurnoID)) 
      {
          $_SESSION['TurnoID'] = $this->TurnoID;
      }
      if (!isset($_GET["TurnoID"]) && isset($_GET["turnoid"])) 
      {
          $_SESSION['TurnoID'] = $_GET["turnoid"];
      }
      if (isset($_GET["CarrilID"]) && isset($this->CarrilID)) 
      {
          $_SESSION['CarrilID'] = $this->CarrilID;
      }
      if (!isset($_GET["CarrilID"]) && isset($_GET["carrilid"])) 
      {
          $_SESSION['CarrilID'] = $_GET["carrilid"];
      }
      if (isset($_GET["Cuerpo"]) && isset($this->Cuerpo)) 
      {
          $_SESSION['Cuerpo'] = $this->Cuerpo;
      }
      if (!isset($_GET["Cuerpo"]) && isset($_GET["cuerpo"])) 
      {
          $_SESSION['Cuerpo'] = $_GET["cuerpo"];
      }
      if (isset($_GET["OperacionID"]) && isset($this->OperacionID)) 
      {
          $_SESSION['OperacionID'] = $this->OperacionID;
      }
      if (!isset($_GET["OperacionID"]) && isset($_GET["operacionid"])) 
      {
          $_SESSION['OperacionID'] = $_GET["operacionid"];
      }
      if (isset($_GET["Fechat"]) && isset($this->Fechat)) 
      {
          $_SESSION['Fechat'] = $this->Fechat;
      }
      if (!isset($_GET["Fechat"]) && isset($_GET["fechat"])) 
      {
          $_SESSION['Fechat'] = $_GET["fechat"];
      }
      if (isset($_GET["Hora"]) && isset($this->Hora)) 
      {
          $_SESSION['Hora'] = $this->Hora;
      }
      if (!isset($_GET["Hora"]) && isset($_GET["hora"])) 
      {
          $_SESSION['Hora'] = $_GET["hora"];
      }
      if (isset($_GET["Camara"]) && isset($this->Camara)) 
      {
          $_SESSION['Camara'] = $this->Camara;
      }
      if (!isset($_GET["Camara"]) && isset($_GET["camara"])) 
      {
          $_SESSION['Camara'] = $_GET["camara"];
      }
      if (isset($_GET["Sec_iniL"]) && isset($this->Sec_iniL)) 
      {
          $_SESSION['Sec_iniL'] = $this->Sec_iniL;
      }
      if (!isset($_GET["Sec_iniL"]) && isset($_GET["sec_inil"])) 
      {
          $_SESSION['Sec_iniL'] = $_GET["sec_inil"];
      }
      if (isset($_GET["Sec_finL"]) && isset($this->Sec_finL)) 
      {
          $_SESSION['Sec_finL'] = $this->Sec_finL;
      }
      if (!isset($_GET["Sec_finL"]) && isset($_GET["sec_finl"])) 
      {
          $_SESSION['Sec_finL'] = $_GET["sec_finl"];
      }
      if (isset($_GET["sm_global_login"]) && isset($this->sm_global_login)) 
      {
          $_SESSION['sm_global_login'] = $this->sm_global_login;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['embutida_parms']);
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
                 nm_limpa_str_form_aforo_liquidacionCR_tramo_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->CasetaID) && isset($this->casetaid)) 
          {
              $this->CasetaID = $this->casetaid;
          }
          if (isset($this->CasetaID)) 
          {
              $_SESSION['CasetaID'] = $this->CasetaID;
          }
          if (!isset($this->FechaOperacion) && isset($this->fechaoperacion)) 
          {
              $this->FechaOperacion = $this->fechaoperacion;
          }
          if (isset($this->FechaOperacion)) 
          {
              $_SESSION['FechaOperacion'] = $this->FechaOperacion;
          }
          if (!isset($this->TurnoID) && isset($this->turnoid)) 
          {
              $this->TurnoID = $this->turnoid;
          }
          if (isset($this->TurnoID)) 
          {
              $_SESSION['TurnoID'] = $this->TurnoID;
          }
          if (!isset($this->CarrilID) && isset($this->carrilid)) 
          {
              $this->CarrilID = $this->carrilid;
          }
          if (isset($this->CarrilID)) 
          {
              $_SESSION['CarrilID'] = $this->CarrilID;
          }
          if (!isset($this->Cuerpo) && isset($this->cuerpo)) 
          {
              $this->Cuerpo = $this->cuerpo;
          }
          if (isset($this->Cuerpo)) 
          {
              $_SESSION['Cuerpo'] = $this->Cuerpo;
          }
          if (!isset($this->OperacionID) && isset($this->operacionid)) 
          {
              $this->OperacionID = $this->operacionid;
          }
          if (isset($this->OperacionID)) 
          {
              $_SESSION['OperacionID'] = $this->OperacionID;
          }
          if (!isset($this->Fechat) && isset($this->fechat)) 
          {
              $this->Fechat = $this->fechat;
          }
          if (isset($this->Fechat)) 
          {
              $_SESSION['Fechat'] = $this->Fechat;
          }
          if (!isset($this->Hora) && isset($this->hora)) 
          {
              $this->Hora = $this->hora;
          }
          if (isset($this->Hora)) 
          {
              $_SESSION['Hora'] = $this->Hora;
          }
          if (!isset($this->Camara) && isset($this->camara)) 
          {
              $this->Camara = $this->camara;
          }
          if (isset($this->Camara)) 
          {
              $_SESSION['Camara'] = $this->Camara;
          }
          if (!isset($this->Sec_iniL) && isset($this->sec_inil)) 
          {
              $this->Sec_iniL = $this->sec_inil;
          }
          if (isset($this->Sec_iniL)) 
          {
              $_SESSION['Sec_iniL'] = $this->Sec_iniL;
          }
          if (!isset($this->Sec_finL) && isset($this->sec_finl)) 
          {
              $this->Sec_finL = $this->sec_finl;
          }
          if (isset($this->Sec_finL)) 
          {
              $_SESSION['Sec_finL'] = $this->Sec_finL;
          }
          if (isset($this->sm_global_login)) 
          {
              $_SESSION['sm_global_login'] = $this->sm_global_login;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->CasetaID) && isset($this->casetaid)) 
          {
              $this->CasetaID = $this->casetaid;
          }
          if (isset($this->CasetaID)) 
          {
              $_SESSION['CasetaID'] = $this->CasetaID;
          }
          if (!isset($this->FechaOperacion) && isset($this->fechaoperacion)) 
          {
              $this->FechaOperacion = $this->fechaoperacion;
          }
          if (isset($this->FechaOperacion)) 
          {
              $_SESSION['FechaOperacion'] = $this->FechaOperacion;
          }
          if (!isset($this->TurnoID) && isset($this->turnoid)) 
          {
              $this->TurnoID = $this->turnoid;
          }
          if (isset($this->TurnoID)) 
          {
              $_SESSION['TurnoID'] = $this->TurnoID;
          }
          if (!isset($this->CarrilID) && isset($this->carrilid)) 
          {
              $this->CarrilID = $this->carrilid;
          }
          if (isset($this->CarrilID)) 
          {
              $_SESSION['CarrilID'] = $this->CarrilID;
          }
          if (!isset($this->Cuerpo) && isset($this->cuerpo)) 
          {
              $this->Cuerpo = $this->cuerpo;
          }
          if (isset($this->Cuerpo)) 
          {
              $_SESSION['Cuerpo'] = $this->Cuerpo;
          }
          if (!isset($this->OperacionID) && isset($this->operacionid)) 
          {
              $this->OperacionID = $this->operacionid;
          }
          if (isset($this->OperacionID)) 
          {
              $_SESSION['OperacionID'] = $this->OperacionID;
          }
          if (!isset($this->Fechat) && isset($this->fechat)) 
          {
              $this->Fechat = $this->fechat;
          }
          if (isset($this->Fechat)) 
          {
              $_SESSION['Fechat'] = $this->Fechat;
          }
          if (!isset($this->Hora) && isset($this->hora)) 
          {
              $this->Hora = $this->hora;
          }
          if (isset($this->Hora)) 
          {
              $_SESSION['Hora'] = $this->Hora;
          }
          if (!isset($this->Camara) && isset($this->camara)) 
          {
              $this->Camara = $this->camara;
          }
          if (isset($this->Camara)) 
          {
              $_SESSION['Camara'] = $this->Camara;
          }
          if (!isset($this->Sec_iniL) && isset($this->sec_inil)) 
          {
              $this->Sec_iniL = $this->sec_inil;
          }
          if (isset($this->Sec_iniL)) 
          {
              $_SESSION['Sec_iniL'] = $this->Sec_iniL;
          }
          if (!isset($this->Sec_finL) && isset($this->sec_finl)) 
          {
              $this->Sec_finL = $this->sec_finl;
          }
          if (isset($this->Sec_finL)) 
          {
              $_SESSION['Sec_finL'] = $this->Sec_finL;
          }
          if (isset($this->sm_global_login)) 
          {
              $_SESSION['sm_global_login'] = $this->sm_global_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_aforo_liquidacionCR_tramo_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['initialize'])
          {
              $_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
  $this->Ini->nm_hidden_blocos[0] = "off"; $this->NM_ajax_info['blockDisplay']['0'] = 'off';
$this->Ini->nm_hidden_blocos[1] = "off"; $this->NM_ajax_info['blockDisplay']['1'] = 'off';
$this->NM_ajax_info['buttonDisplay']['video'] = $this->nmgp_botoes["video"] = "off";;
if($this->consecutivo ==""){
	$this->consecutivo  = 0;
	}
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob'][$I_conf]  = $Conf_opt;
              }
          }
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_aforo_liquidacionCR_tramo_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_aforo_liquidacionCR_tramo_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_aforo_liquidacionCR_tramo_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_aforo_liquidacionCR_tramo_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_aforo_liquidacionCR_tramo_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_aforo_liquidacionCR_tramo_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_aforo_liquidacionCR_tramo_mob']['label'] = "Dictamina: Aforo | Ingreso";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_aforo_liquidacionCR_tramo_mob")
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


      $this->arr_buttons['valida']['hint']             = "Auditar todos los eventos";
      $this->arr_buttons['valida']['type']             = "image";
      $this->arr_buttons['valida']['value']            = "Valida";
      $this->arr_buttons['valida']['display']          = "only_img";
      $this->arr_buttons['valida']['display_position'] = "text_right";
      $this->arr_buttons['valida']['style']            = "";
      $this->arr_buttons['valida']['image']            = "scriptcase__NM__ico__NM__checks_32.png";

      $this->arr_buttons['salir']['hint']             = "";
      $this->arr_buttons['salir']['type']             = "button";
      $this->arr_buttons['salir']['value']            = "Salir";
      $this->arr_buttons['salir']['display']          = "only_text";
      $this->arr_buttons['salir']['display_position'] = "text_right";
      $this->arr_buttons['salir']['style']            = "default";
      $this->arr_buttons['salir']['image']            = "";

      $this->arr_buttons['liquida']['hint']             = "Valida los datos auditados y cierra";
      $this->arr_buttons['liquida']['type']             = "button";
      $this->arr_buttons['liquida']['value']            = "Liquidación";
      $this->arr_buttons['liquida']['display']          = "only_text";
      $this->arr_buttons['liquida']['display_position'] = "text_right";
      $this->arr_buttons['liquida']['style']            = "default";
      $this->arr_buttons['liquida']['image']            = "";

      $this->arr_buttons['video']['hint']             = "";
      $this->arr_buttons['video']['type']             = "button";
      $this->arr_buttons['video']['value']            = "Vid1";
      $this->arr_buttons['video']['display']          = "only_text";
      $this->arr_buttons['video']['display_position'] = "text_right";
      $this->arr_buttons['video']['style']            = "default";
      $this->arr_buttons['video']['image']            = "";

      $this->arr_buttons['video2']['hint']             = "";
      $this->arr_buttons['video2']['type']             = "button";
      $this->arr_buttons['video2']['value']            = "Vid2";
      $this->arr_buttons['video2']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['video2']['display_position'] = "text_right";
      $this->arr_buttons['video2']['style']            = "default";
      $this->arr_buttons['video2']['image']            = "";
      $this->arr_buttons['video2']['has_fa']            = "true";
      $this->arr_buttons['video2']['fontawesomeicon']            = "";

      $this->arr_buttons['video3']['hint']             = "";
      $this->arr_buttons['video3']['type']             = "button";
      $this->arr_buttons['video3']['value']            = "Vid3";
      $this->arr_buttons['video3']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['video3']['display_position'] = "text_right";
      $this->arr_buttons['video3']['style']            = "default";
      $this->arr_buttons['video3']['image']            = "";
      $this->arr_buttons['video3']['has_fa']            = "true";
      $this->arr_buttons['video3']['fontawesomeicon']            = "";


      $_SESSION['scriptcase']['error_icon']['form_aforo_liquidacionCR_tramo_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_aforo_liquidacionCR_tramo_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      $this->nmgp_botoes['Valida'] = "on";
      $this->nmgp_botoes['Salir'] = "on";
      $this->nmgp_botoes['Liquida'] = "on";
      $this->nmgp_botoes['video'] = "on";
      $this->nmgp_botoes['video2'] = "on";
      $this->nmgp_botoes['Video3'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_orig'] = " where (Revisado = 0)";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_pesq'] = " where (Revisado = 0)";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_aforo_liquidacionCR_tramo_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_aforo_liquidacionCR_tramo_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_aforo_liquidacionCR_tramo_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form'];
          if (!isset($this->consecutivo)){$this->consecutivo = $this->nmgp_dados_form['consecutivo'];} 
          if (!isset($this->casetaid)){$this->casetaid = $this->nmgp_dados_form['casetaid'];} 
          if (!isset($this->fechaoperacion)){$this->fechaoperacion = $this->nmgp_dados_form['fechaoperacion'];} 
          if (!isset($this->fechaturno)){$this->fechaturno = $this->nmgp_dados_form['fechaturno'];} 
          if (!isset($this->turnoid)){$this->turnoid = $this->nmgp_dados_form['turnoid'];} 
          if (!isset($this->horaevento)){$this->horaevento = $this->nmgp_dados_form['horaevento'];} 
          if (!isset($this->tramoid)){$this->tramoid = $this->nmgp_dados_form['tramoid'];} 
          if (!isset($this->carrilid)){$this->carrilid = $this->nmgp_dados_form['carrilid'];} 
          if (!isset($this->cuerpo)){$this->cuerpo = $this->nmgp_dados_form['cuerpo'];} 
          if (!isset($this->secuencial)){$this->secuencial = $this->nmgp_dados_form['secuencial'];} 
          if (!isset($this->folio)){$this->folio = $this->nmgp_dados_form['folio'];} 
          if (!isset($this->vehiculoid_ect)){$this->vehiculoid_ect = $this->nmgp_dados_form['vehiculoid_ect'];} 
          if (!isset($this->clasevehiculo_ect)){$this->clasevehiculo_ect = $this->nmgp_dados_form['clasevehiculo_ect'];} 
          if (!isset($this->importe_ect)){$this->importe_ect = $this->nmgp_dados_form['importe_ect'];} 
          if (!isset($this->cantidadeje_ect)){$this->cantidadeje_ect = $this->nmgp_dados_form['cantidadeje_ect'];} 
          if (!isset($this->tarifaee_ect)){$this->tarifaee_ect = $this->nmgp_dados_form['tarifaee_ect'];} 
          if (!isset($this->vehiculoid_cr)){$this->vehiculoid_cr = $this->nmgp_dados_form['vehiculoid_cr'];} 
          if (!isset($this->clasevehiculo_cr)){$this->clasevehiculo_cr = $this->nmgp_dados_form['clasevehiculo_cr'];} 
          if (!isset($this->importe_cr)){$this->importe_cr = $this->nmgp_dados_form['importe_cr'];} 
          if (!isset($this->cantidadeje_cr)){$this->cantidadeje_cr = $this->nmgp_dados_form['cantidadeje_cr'];} 
          if (!isset($this->tarifaee_cr)){$this->tarifaee_cr = $this->nmgp_dados_form['tarifaee_cr'];} 
          if (!isset($this->vehiculoid_eap)){$this->vehiculoid_eap = $this->nmgp_dados_form['vehiculoid_eap'];} 
          if (!isset($this->clasevehiculo_eap)){$this->clasevehiculo_eap = $this->nmgp_dados_form['clasevehiculo_eap'];} 
          if (!isset($this->importe_eap)){$this->importe_eap = $this->nmgp_dados_form['importe_eap'];} 
          if (!isset($this->cantidadeje_eap)){$this->cantidadeje_eap = $this->nmgp_dados_form['cantidadeje_eap'];} 
          if (!isset($this->tarifaee_eap)){$this->tarifaee_eap = $this->nmgp_dados_form['tarifaee_eap'];} 
          if (!isset($this->pagoid)){$this->pagoid = $this->nmgp_dados_form['pagoid'];} 
          if (!isset($this->excentoid)){$this->excentoid = $this->nmgp_dados_form['excentoid'];} 
          if (!isset($this->usuarioid)){$this->usuarioid = $this->nmgp_dados_form['usuarioid'];} 
          if (!isset($this->placas)){$this->placas = $this->nmgp_dados_form['placas'];} 
          if (!isset($this->numerotarjeta)){$this->numerotarjeta = $this->nmgp_dados_form['numerotarjeta'];} 
          if (!isset($this->tipotarjeta)){$this->tipotarjeta = $this->nmgp_dados_form['tipotarjeta'];} 
          if (!isset($this->fechaenvio)){$this->fechaenvio = $this->nmgp_dados_form['fechaenvio'];} 
          if (!isset($this->codigofacturacion)){$this->codigofacturacion = $this->nmgp_dados_form['codigofacturacion'];} 
          if (!isset($this->clasevehiculo_ana)){$this->clasevehiculo_ana = $this->nmgp_dados_form['clasevehiculo_ana'];} 
          if (!isset($this->estatusana)){$this->estatusana = $this->nmgp_dados_form['estatusana'];} 
          if (!isset($this->fld_ar_sct)){$this->fld_ar_sct = $this->nmgp_dados_form['fld_ar_sct'];} 
          if (!isset($this->fechamodificadoana)){$this->fechamodificadoana = $this->nmgp_dados_form['fechamodificadoana'];} 
          if (!isset($this->eludidoextra)){$this->eludidoextra = $this->nmgp_dados_form['eludidoextra'];} 
          if (!isset($this->revisado)){$this->revisado = $this->nmgp_dados_form['revisado'];} 
          if (!isset($this->fechamarcacioncr)){$this->fechamarcacioncr = $this->nmgp_dados_form['fechamarcacioncr'];} 
          if (!isset($this->fechadeteccionect)){$this->fechadeteccionect = $this->nmgp_dados_form['fechadeteccionect'];} 
          if (!isset($this->fechadeteccioneap)){$this->fechadeteccioneap = $this->nmgp_dados_form['fechadeteccioneap'];} 
          if (!isset($this->tramoidorigen)){$this->tramoidorigen = $this->nmgp_dados_form['tramoidorigen'];} 
          if (!isset($this->operacionid)){$this->operacionid = $this->nmgp_dados_form['operacionid'];} 
          if (!isset($this->residente)){$this->residente = $this->nmgp_dados_form['residente'];} 
          if (!isset($this->video)){$this->video = $this->nmgp_dados_form['video'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_aforo_liquidacionCR_tramo_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_aforo_liquidacionCR_tramo_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_aforo_liquidacionCR_tramo_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_aforo_liquidacionCR_tramo/form_aforo_liquidacionCR_tramo_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_aforo_liquidacionCR_tramo_mob_erro.class.php"); 
      }
      $this->Erro      = new form_aforo_liquidacionCR_tramo_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ((!isset($nm_opc_lookup) || $nm_opc_lookup != "lookup") && (!isset($nm_opc_php) || $nm_opc_php != "formphp"))
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opcao']))
         { 
             if ($this->consecutivo != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_aforo_liquidacionCR_tramo_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['Valida'] = "off";
          $this->nmgp_botoes['Salir'] = "off";
          $this->nmgp_botoes['Liquida'] = "off";
          $this->nmgp_botoes['video'] = "off";
          $this->nmgp_botoes['video2'] = "off";
          $this->nmgp_botoes['Video3'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['Valida'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['botoes']['Valida'];
          $this->nmgp_botoes['Salir'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['botoes']['Salir'];
          $this->nmgp_botoes['Liquida'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['botoes']['Liquida'];
          $this->nmgp_botoes['video'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['botoes']['video'];
          $this->nmgp_botoes['video2'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['botoes']['video2'];
          $this->nmgp_botoes['Video3'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['botoes']['Video3'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form'];
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
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_OperacionID)) {$this->sc_temp_OperacionID = (isset($_SESSION['OperacionID'])) ? $_SESSION['OperacionID'] : "";}
if (!isset($this->sc_temp_Cuerpo)) {$this->sc_temp_Cuerpo = (isset($_SESSION['Cuerpo'])) ? $_SESSION['Cuerpo'] : "";}
if (!isset($this->sc_temp_CarrilID)) {$this->sc_temp_CarrilID = (isset($_SESSION['CarrilID'])) ? $_SESSION['CarrilID'] : "";}
if (!isset($this->sc_temp_TurnoID)) {$this->sc_temp_TurnoID = (isset($_SESSION['TurnoID'])) ? $_SESSION['TurnoID'] : "";}
if (!isset($this->sc_temp_FechaOperacion)) {$this->sc_temp_FechaOperacion = (isset($_SESSION['FechaOperacion'])) ? $_SESSION['FechaOperacion'] : "";}
if (!isset($this->sc_temp_CasetaID)) {$this->sc_temp_CasetaID = (isset($_SESSION['CasetaID'])) ? $_SESSION['CasetaID'] : "";}
  $this->NM_ajax_info['buttonDisplay']['video'] = $this->nmgp_botoes["video"] = "off";;
$this->NM_ajax_info['buttonDisplay']['video2'] = $this->nmgp_botoes["video2"] = "off";;
$this->NM_ajax_info['buttonDisplay']['Video3'] = $this->nmgp_botoes["Video3"] = "off";;
$this->casetaid  = $this->sc_temp_CasetaID;
$this->fechaoperacion  = $this->sc_temp_FechaOperacion;
$this->turnoid  = $this->sc_temp_TurnoID;
$this->carrilid  = $this->sc_temp_CarrilID; 
$this->cuerpo  = $this->sc_temp_Cuerpo;
$this->operacionid  = $this->sc_temp_OperacionID;
if (isset($this->sc_temp_CasetaID)) { $_SESSION['CasetaID'] = $this->sc_temp_CasetaID;}
if (isset($this->sc_temp_FechaOperacion)) { $_SESSION['FechaOperacion'] = $this->sc_temp_FechaOperacion;}
if (isset($this->sc_temp_TurnoID)) { $_SESSION['TurnoID'] = $this->sc_temp_TurnoID;}
if (isset($this->sc_temp_CarrilID)) { $_SESSION['CarrilID'] = $this->sc_temp_CarrilID;}
if (isset($this->sc_temp_Cuerpo)) { $_SESSION['Cuerpo'] = $this->sc_temp_Cuerpo;}
if (isset($this->sc_temp_OperacionID)) { $_SESSION['OperacionID'] = $this->sc_temp_OperacionID;}
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->vehiculoid_ana)) { $this->nm_limpa_alfa($this->vehiculoid_ana); }
      if (isset($this->importe_ana)) { $this->nm_limpa_alfa($this->importe_ana); }
      if (isset($this->pagoid_ana)) { $this->nm_limpa_alfa($this->pagoid_ana); }
      if (isset($this->cantidadeje_ana)) { $this->nm_limpa_alfa($this->cantidadeje_ana); }
      if (isset($this->tarifaee_ana)) { $this->nm_limpa_alfa($this->tarifaee_ana); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "Valida")
          { 
              $this->sc_btn_Valida();
          } 
          if ($nm_call_php == "Liquida")
          { 
              $this->sc_btn_Liquida();
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- importe_ana
      $this->field_config['importe_ana']               = array();
      $this->field_config['importe_ana']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importe_ana']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importe_ana']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importe_ana']['symbol_mon'] = '';
      $this->field_config['importe_ana']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importe_ana']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cantidadeje_ana
      $this->field_config['cantidadeje_ana']               = array();
      $this->field_config['cantidadeje_ana']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidadeje_ana']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidadeje_ana']['symbol_dec'] = '';
      $this->field_config['cantidadeje_ana']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidadeje_ana']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tarifaee_ana
      $this->field_config['tarifaee_ana']               = array();
      $this->field_config['tarifaee_ana']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['tarifaee_ana']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['tarifaee_ana']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['tarifaee_ana']['symbol_mon'] = '';
      $this->field_config['tarifaee_ana']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['tarifaee_ana']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fld_importe_eeana
      $this->field_config['fld_importe_eeana']               = array();
      $this->field_config['fld_importe_eeana']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['fld_importe_eeana']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['fld_importe_eeana']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['fld_importe_eeana']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['fld_importe_eeana']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['fld_importe_eeana']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- consecutivo
      $this->field_config['consecutivo']               = array();
      $this->field_config['consecutivo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['consecutivo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['consecutivo']['symbol_dec'] = '';
      $this->field_config['consecutivo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['consecutivo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
      //-- turnoid
      $this->field_config['turnoid']               = array();
      $this->field_config['turnoid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['turnoid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['turnoid']['symbol_dec'] = '';
      $this->field_config['turnoid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['turnoid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- horaevento
      $this->field_config['horaevento']                 = array();
      $this->field_config['horaevento']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['horaevento']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['horaevento']['date_display'] = "";
      $this->new_date_format('HH', 'horaevento');
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
      //-- secuencial
      $this->field_config['secuencial']               = array();
      $this->field_config['secuencial']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['secuencial']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['secuencial']['symbol_dec'] = '';
      $this->field_config['secuencial']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['secuencial']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- folio
      $this->field_config['folio']               = array();
      $this->field_config['folio']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['folio']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['folio']['symbol_dec'] = '';
      $this->field_config['folio']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['folio']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- importe_ect
      $this->field_config['importe_ect']               = array();
      $this->field_config['importe_ect']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importe_ect']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importe_ect']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importe_ect']['symbol_mon'] = '';
      $this->field_config['importe_ect']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importe_ect']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cantidadeje_ect
      $this->field_config['cantidadeje_ect']               = array();
      $this->field_config['cantidadeje_ect']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidadeje_ect']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidadeje_ect']['symbol_dec'] = '';
      $this->field_config['cantidadeje_ect']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidadeje_ect']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tarifaee_ect
      $this->field_config['tarifaee_ect']               = array();
      $this->field_config['tarifaee_ect']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['tarifaee_ect']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['tarifaee_ect']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['tarifaee_ect']['symbol_mon'] = '';
      $this->field_config['tarifaee_ect']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['tarifaee_ect']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importe_cr
      $this->field_config['importe_cr']               = array();
      $this->field_config['importe_cr']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importe_cr']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importe_cr']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importe_cr']['symbol_mon'] = '';
      $this->field_config['importe_cr']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importe_cr']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cantidadeje_cr
      $this->field_config['cantidadeje_cr']               = array();
      $this->field_config['cantidadeje_cr']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidadeje_cr']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidadeje_cr']['symbol_dec'] = '';
      $this->field_config['cantidadeje_cr']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidadeje_cr']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tarifaee_cr
      $this->field_config['tarifaee_cr']               = array();
      $this->field_config['tarifaee_cr']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['tarifaee_cr']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['tarifaee_cr']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['tarifaee_cr']['symbol_mon'] = '';
      $this->field_config['tarifaee_cr']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['tarifaee_cr']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- importe_eap
      $this->field_config['importe_eap']               = array();
      $this->field_config['importe_eap']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importe_eap']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importe_eap']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importe_eap']['symbol_mon'] = '';
      $this->field_config['importe_eap']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importe_eap']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cantidadeje_eap
      $this->field_config['cantidadeje_eap']               = array();
      $this->field_config['cantidadeje_eap']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidadeje_eap']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidadeje_eap']['symbol_dec'] = '';
      $this->field_config['cantidadeje_eap']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidadeje_eap']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tarifaee_eap
      $this->field_config['tarifaee_eap']               = array();
      $this->field_config['tarifaee_eap']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['tarifaee_eap']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['tarifaee_eap']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['tarifaee_eap']['symbol_mon'] = '';
      $this->field_config['tarifaee_eap']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['tarifaee_eap']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- excentoid
      $this->field_config['excentoid']               = array();
      $this->field_config['excentoid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['excentoid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['excentoid']['symbol_dec'] = '';
      $this->field_config['excentoid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['excentoid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- usuarioid
      $this->field_config['usuarioid']               = array();
      $this->field_config['usuarioid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['usuarioid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['usuarioid']['symbol_dec'] = '';
      $this->field_config['usuarioid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['usuarioid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fechaenvio
      $this->field_config['fechaenvio']                 = array();
      $this->field_config['fechaenvio']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechaenvio']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechaenvio']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechaenvio');
      //-- fechamodificadoana
      $this->field_config['fechamodificadoana']                 = array();
      $this->field_config['fechamodificadoana']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechamodificadoana']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechamodificadoana']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechamodificadoana']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechamodificadoana');
      //-- eludidoextra
      $this->field_config['eludidoextra']               = array();
      $this->field_config['eludidoextra']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['eludidoextra']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eludidoextra']['symbol_dec'] = '';
      $this->field_config['eludidoextra']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['eludidoextra']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- revisado
      $this->field_config['revisado']               = array();
      $this->field_config['revisado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['revisado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['revisado']['symbol_dec'] = '';
      $this->field_config['revisado']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['revisado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fechamarcacioncr
      $this->field_config['fechamarcacioncr']                 = array();
      $this->field_config['fechamarcacioncr']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechamarcacioncr']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechamarcacioncr']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechamarcacioncr']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechamarcacioncr');
      //-- fechadeteccionect
      $this->field_config['fechadeteccionect']                 = array();
      $this->field_config['fechadeteccionect']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechadeteccionect']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechadeteccionect']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechadeteccionect']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechadeteccionect');
      //-- fechadeteccioneap
      $this->field_config['fechadeteccioneap']                 = array();
      $this->field_config['fechadeteccioneap']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechadeteccioneap']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechadeteccioneap']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechadeteccioneap']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechadeteccioneap');
      //-- tramoidorigen
      $this->field_config['tramoidorigen']               = array();
      $this->field_config['tramoidorigen']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tramoidorigen']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tramoidorigen']['symbol_dec'] = '';
      $this->field_config['tramoidorigen']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tramoidorigen']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- operacionid
      $this->field_config['operacionid']               = array();
      $this->field_config['operacionid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['operacionid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['operacionid']['symbol_dec'] = '';
      $this->field_config['operacionid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['operacionid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


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
          if ('validate_vehiculocorrecto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vehiculocorrecto');
          }
          if ('validate_pagoid_ana' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pagoid_ana');
          }
          if ('validate_vehiculoid_ana' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vehiculoid_ana');
          }
          if ('validate_importe_ana' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importe_ana');
          }
          if ('validate_cantidadeje_ana' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidadeje_ana');
          }
          if ('validate_tarifaee_ana' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarifaee_ana');
          }
          if ('validate_fld_importe_eeana' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fld_importe_eeana');
          }
          form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_pagoid_ana_onchange' == $this->NM_ajax_opcao)
          {
              $this->PagoID_ANA_onChange();
          }
          if ('event_vehiculocorrecto_onclick' == $this->NM_ajax_opcao)
          {
              $this->VehiculoCorrecto_onClick();
          }
          if ('event_vehiculoid_ana_onchange' == $this->NM_ajax_opcao)
          {
              $this->VehiculoID_ANA_onChange();
          }
          form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
          form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_aforo_liquidacionCR_tramo_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Dictamina: Aforo | Ingreso") ?></TITLE>
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
<form name="Fdown" method="get" action="form_aforo_liquidacionCR_tramo_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_aforo_liquidacionCR_tramo_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_aforo_liquidacionCR_tramo_mob.php" target="_self" style="display: none"> 
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
   function sc_btn_Valida() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
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
include_once("form_aforo_liquidacionCR_tramo_mob_sajax_js.php");
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
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "form_aforo_liquidacionCR_tramo_mob.php";
      if (!empty($this->field_config['importe_ana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importe_ana, $this->field_config['importe_ana']['symbol_dec'], $this->field_config['importe_ana']['symbol_grp'], $this->field_config['importe_ana']['symbol_mon']); 
          nm_limpa_valor($this->importe_ana, $this->field_config['importe_ana']['symbol_dec'], $this->field_config['importe_ana']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->cantidadeje_ana, $this->field_config['cantidadeje_ana']['symbol_grp']) ; 
      if (!empty($this->field_config['tarifaee_ana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_dec'], $this->field_config['tarifaee_ana']['symbol_grp'], $this->field_config['tarifaee_ana']['symbol_mon']); 
          nm_limpa_valor($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_dec'], $this->field_config['tarifaee_ana']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['fld_importe_eeana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_dec'], $this->field_config['fld_importe_eeana']['symbol_grp'], $this->field_config['fld_importe_eeana']['symbol_mon']); 
          nm_limpa_valor($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_dec'], $this->field_config['fld_importe_eeana']['symbol_grp']) ; 
      }
      $_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_Sec_finL)) {$this->sc_temp_Sec_finL = (isset($_SESSION['Sec_finL'])) ? $_SESSION['Sec_finL'] : "";}
if (!isset($this->sc_temp_Sec_iniL)) {$this->sc_temp_Sec_iniL = (isset($_SESSION['Sec_iniL'])) ? $_SESSION['Sec_iniL'] : "";}
if (!isset($this->sc_temp_Cuerpo)) {$this->sc_temp_Cuerpo = (isset($_SESSION['Cuerpo'])) ? $_SESSION['Cuerpo'] : "";}
if (!isset($this->sc_temp_CarrilID)) {$this->sc_temp_CarrilID = (isset($_SESSION['CarrilID'])) ? $_SESSION['CarrilID'] : "";}
if (!isset($this->sc_temp_TurnoID)) {$this->sc_temp_TurnoID = (isset($_SESSION['TurnoID'])) ? $_SESSION['TurnoID'] : "";}
if (!isset($this->sc_temp_FechaOperacion)) {$this->sc_temp_FechaOperacion = (isset($_SESSION['FechaOperacion'])) ? $_SESSION['FechaOperacion'] : "";}
if (!isset($this->sc_temp_CasetaID)) {$this->sc_temp_CasetaID = (isset($_SESSION['CasetaID'])) ? $_SESSION['CasetaID'] : "";}
  
     $nm_select ="UPDATE aforo SET EstatusANA = 1 WHERE CasetaID = '$this->sc_temp_CasetaID' and FechaOperacion = '$this->sc_temp_FechaOperacion' and TurnoID = '$this->sc_temp_TurnoID' and CarrilID = '$this->sc_temp_CarrilID' and Cuerpo = '$this->sc_temp_Cuerpo' and Secuencial BETWEEN '$this->sc_temp_Sec_iniL' and '$this->sc_temp_Sec_finL' and EstatusANA = 0"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      




?>
<script>
top.parent.frames[0].frames[0].location.reload();
</script>
<?php

 if (isset($this->sc_temp_CasetaID)) { $_SESSION['CasetaID'] = $this->sc_temp_CasetaID;}
 if (isset($this->sc_temp_FechaOperacion)) { $_SESSION['FechaOperacion'] = $this->sc_temp_FechaOperacion;}
 if (isset($this->sc_temp_TurnoID)) { $_SESSION['TurnoID'] = $this->sc_temp_TurnoID;}
 if (isset($this->sc_temp_CarrilID)) { $_SESSION['CarrilID'] = $this->sc_temp_CarrilID;}
 if (isset($this->sc_temp_Cuerpo)) { $_SESSION['Cuerpo'] = $this->sc_temp_Cuerpo;}
 if (isset($this->sc_temp_Sec_iniL)) { $_SESSION['Sec_iniL'] = $this->sc_temp_Sec_iniL;}
 if (isset($this->sc_temp_Sec_finL)) { $_SESSION['Sec_finL'] = $this->sc_temp_Sec_finL;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_aforo_liquidacion') . "/", $this->nm_location, "","_self", '', 440, 630);
 };
if (isset($this->sc_temp_CasetaID)) { $_SESSION['CasetaID'] = $this->sc_temp_CasetaID;}
if (isset($this->sc_temp_FechaOperacion)) { $_SESSION['FechaOperacion'] = $this->sc_temp_FechaOperacion;}
if (isset($this->sc_temp_TurnoID)) { $_SESSION['TurnoID'] = $this->sc_temp_TurnoID;}
if (isset($this->sc_temp_CarrilID)) { $_SESSION['CarrilID'] = $this->sc_temp_CarrilID;}
if (isset($this->sc_temp_Cuerpo)) { $_SESSION['Cuerpo'] = $this->sc_temp_Cuerpo;}
if (isset($this->sc_temp_Sec_iniL)) { $_SESSION['Sec_iniL'] = $this->sc_temp_Sec_iniL;}
if (isset($this->sc_temp_Sec_finL)) { $_SESSION['Sec_finL'] = $this->sc_temp_Sec_finL;}
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="consecutivo" value="<?php echo $this->form_encode_input($this->consecutivo) ?>"/>
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
   function sc_btn_Liquida() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
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
include_once("form_aforo_liquidacionCR_tramo_mob_sajax_js.php");
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->casetaid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['casetaid']))
          {
              $varloc_btn_php['casetaid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['casetaid'];
          }
          if (!isset($this->fechaoperacion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['fechaoperacion']))
          {
              $varloc_btn_php['fechaoperacion'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['fechaoperacion'];
          }
          if (!isset($this->turnoid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['turnoid']))
          {
              $varloc_btn_php['turnoid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['turnoid'];
          }
          if (!isset($this->carrilid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['carrilid']))
          {
              $varloc_btn_php['carrilid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['carrilid'];
          }
          if (!isset($this->cuerpo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['cuerpo']))
          {
              $varloc_btn_php['cuerpo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['cuerpo'];
          }
          if (!isset($this->operacionid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['operacionid']))
          {
              $varloc_btn_php['operacionid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['operacionid'];
          }
          if (!isset($this->casetaid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['casetaid']))
          {
              $varloc_btn_php['casetaid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['casetaid'];
          }
          if (!isset($this->fechaoperacion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['fechaoperacion']))
          {
              $varloc_btn_php['fechaoperacion'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['fechaoperacion'];
          }
          if (!isset($this->turnoid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['turnoid']))
          {
              $varloc_btn_php['turnoid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['turnoid'];
          }
          if (!isset($this->carrilid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['carrilid']))
          {
              $varloc_btn_php['carrilid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['carrilid'];
          }
          if (!isset($this->cuerpo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['cuerpo']))
          {
              $varloc_btn_php['cuerpo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['cuerpo'];
          }
          if (!isset($this->operacionid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['operacionid']))
          {
              $varloc_btn_php['operacionid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form']['operacionid'];
          }
      }
      $nm_f_saida = "form_aforo_liquidacionCR_tramo_mob.php";
      if (!empty($this->field_config['importe_ana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importe_ana, $this->field_config['importe_ana']['symbol_dec'], $this->field_config['importe_ana']['symbol_grp'], $this->field_config['importe_ana']['symbol_mon']); 
          nm_limpa_valor($this->importe_ana, $this->field_config['importe_ana']['symbol_dec'], $this->field_config['importe_ana']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->cantidadeje_ana, $this->field_config['cantidadeje_ana']['symbol_grp']) ; 
      if (!empty($this->field_config['tarifaee_ana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_dec'], $this->field_config['tarifaee_ana']['symbol_grp'], $this->field_config['tarifaee_ana']['symbol_mon']); 
          nm_limpa_valor($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_dec'], $this->field_config['tarifaee_ana']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['fld_importe_eeana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_dec'], $this->field_config['fld_importe_eeana']['symbol_grp'], $this->field_config['fld_importe_eeana']['symbol_mon']); 
          nm_limpa_valor($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_dec'], $this->field_config['fld_importe_eeana']['symbol_grp']) ; 
      }
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_Sec_finL)) {$this->sc_temp_Sec_finL = (isset($_SESSION['Sec_finL'])) ? $_SESSION['Sec_finL'] : "";}
if (!isset($this->sc_temp_Sec_iniL)) {$this->sc_temp_Sec_iniL = (isset($_SESSION['Sec_iniL'])) ? $_SESSION['Sec_iniL'] : "";}
if (!isset($this->sc_temp_sm_global_login)) {$this->sc_temp_sm_global_login = (isset($_SESSION['sm_global_login'])) ? $_SESSION['sm_global_login'] : "";}
  if($this->sc_temp_sm_global_login==''){
		?>
	<script>
	top.opener.top.location.href = "../acceso/";
	top.close();
	</script>
	<?php
	echo "<h2>La sesion ha terminado por tiempo, no podrá liquidar hasta que cierre e inicie sesion nuevamente.</h2>";
}else{

	$condicionL = "CasetaID = '$this->casetaid' and FechaOperacion = '$this->fechaoperacion' and TurnoID = '$this->turnoid' and CarrilID = '$this->carrilid' and Cuerpo = '$this->cuerpo' and OperacionID = $this->operacionid  and FolioInicialEAP = '$this->sc_temp_Sec_iniL' and FolioFinalEAP = '$this->sc_temp_Sec_finL'";
	$condicionLa="CasetaID = '$this->casetaid' and FechaOperacion = '$this->fechaoperacion' and TurnoID = '$this->turnoid' and CarrilID = '$this->carrilid' and Cuerpo = '$this->cuerpo' and OperacionID = $this->operacionid  and (Secuencial BETWEEN '$this->sc_temp_Sec_iniL' and '$this->sc_temp_Sec_finL' ) ";
	
     $nm_select ="UPDATE aforo SET Revisado = 1 WHERE $condicionLa"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
	$PagoEfectivoAna = $this->PagoEfectivo();
	
     $nm_select ="UPDATE detalleturno SET PreLiquidado = 2 , FechaLiq = now() ,LiquidadorID = $this->sc_temp_sm_global_login , MontoANA = (SELECT IFNULL(SUM(Importe_ANA + (TarifaEE_ANA)),0) FROM aforo WHERE $condicionLa and $PagoEfectivoAna)   WHERE $condicionL"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
	
     $nm_select ="UPDATE detalleturno SET FaltanteANA = (MontoANA -(MontoCR-ImporteMXN) + Faltante-Entregado) WHERE $condicionL"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
	$check_sql = "Select FolioCierre from detalleturno where $condicionL";
	 
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
		$FolioCierre = $this->rs[0][0];
	}
			else     
	{
	   ?>
		<script>
		top.opener.top.location.href = "../acceso/";
		top.close();
		</script>
		<?php
	}
	$sql_liq = "INSERT INTO aforo_liq(CasetaID, FechaOperacion, FechaTurno, TurnoID, CarrilID, VehiculoID_ANA, ClaseVehiculo_ANA, CantidadVeh, Importe_ANA, CantidadEje_ANA, TarifaEE_ANA, PagoID, OperacionID, FolioCierre) SELECT CasetaID, FechaOperacion,FechaTurno, TurnoID, CarrilID, VehiculoID_ANA, ClaseVehiculo_ANA, count(VehiculoID_ANA), sum(Importe_ANA), sum(CantidadEje_ANA), sum(TarifaEE_ANA), PagoID_ANA, OperacionID, '".$FolioCierre."' FROM aforo WHERE $condicionLa GROUP BY FechaOperacion,CasetaID,OperacionID,PagoID_ANA, CarrilID,VehiculoID_ANA;";
	
     $nm_select = $sql_liq; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      	
	?>
	<script>
	top.opener.location.reload();
	top.close();
	</script>
	<?php

	}
if (isset($this->sc_temp_sm_global_login)) { $_SESSION['sm_global_login'] = $this->sc_temp_sm_global_login;}
if (isset($this->sc_temp_Sec_iniL)) { $_SESSION['Sec_iniL'] = $this->sc_temp_Sec_iniL;}
if (isset($this->sc_temp_Sec_finL)) { $_SESSION['Sec_finL'] = $this->sc_temp_Sec_finL;}
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="consecutivo" value="<?php echo $this->form_encode_input($this->consecutivo) ?>"/>
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
           case 'vehiculocorrecto':
               return "";
               break;
           case 'pagoid_ana':
               return "Pago ANA";
               break;
           case 'vehiculoid_ana':
               return "Vehiculo ANA";
               break;
           case 'importe_ana':
               return "Importe ANA";
               break;
           case 'cantidadeje_ana':
               return "Cantidad EE ANA";
               break;
           case 'tarifaee_ana':
               return "Tarifa EE ANA";
               break;
           case 'fld_importe_eeana':
               return "EjeEx($)";
               break;
           case 'consecutivo':
               return "Consecutivo";
               break;
           case 'casetaid':
               return "Caseta ID";
               break;
           case 'fechaoperacion':
               return "Fecha Operacion";
               break;
           case 'fechaturno':
               return "Fecha Turno";
               break;
           case 'turnoid':
               return "Turno ID";
               break;
           case 'horaevento':
               return "Hora Evento";
               break;
           case 'tramoid':
               return "Tramo ID";
               break;
           case 'carrilid':
               return "Carril";
               break;
           case 'cuerpo':
               return "Cuerpo";
               break;
           case 'secuencial':
               return "Secuencial";
               break;
           case 'folio':
               return "Folio";
               break;
           case 'vehiculoid_ect':
               return "Vehiculo ID ECT";
               break;
           case 'clasevehiculo_ect':
               return "Clase Vehiculo ECT";
               break;
           case 'importe_ect':
               return "Importe ECT";
               break;
           case 'cantidadeje_ect':
               return "Cantidad Eje ECT";
               break;
           case 'tarifaee_ect':
               return "Tarifa EE ECT";
               break;
           case 'vehiculoid_cr':
               return "Vehiculo ID CR";
               break;
           case 'clasevehiculo_cr':
               return "Clase Vehiculo CR";
               break;
           case 'importe_cr':
               return "Importe CR";
               break;
           case 'cantidadeje_cr':
               return "Cantidad Eje CR";
               break;
           case 'tarifaee_cr':
               return "Tarifa EE CR";
               break;
           case 'vehiculoid_eap':
               return "Vehiculo ID EAP";
               break;
           case 'clasevehiculo_eap':
               return "Clase Vehiculo EAP";
               break;
           case 'importe_eap':
               return "Importe EAP";
               break;
           case 'cantidadeje_eap':
               return "Cantidad Eje EAP";
               break;
           case 'tarifaee_eap':
               return "Tarifa EE EAP";
               break;
           case 'pagoid':
               return "Pago ID";
               break;
           case 'excentoid':
               return "Excento ID";
               break;
           case 'usuarioid':
               return "Usuario ID";
               break;
           case 'placas':
               return "Placas";
               break;
           case 'numerotarjeta':
               return "Numero Tarjeta";
               break;
           case 'tipotarjeta':
               return "Tipo Tarjeta";
               break;
           case 'fechaenvio':
               return "Fecha Envio";
               break;
           case 'codigofacturacion':
               return "Codigo Facturacion";
               break;
           case 'clasevehiculo_ana':
               return "Clase Vehiculo ANA";
               break;
           case 'estatusana':
               return "Estatus ANA";
               break;
           case 'fld_ar_sct':
               return "Fld Ar Sct";
               break;
           case 'fechamodificadoana':
               return "Fecha Modificado ANA";
               break;
           case 'eludidoextra':
               return "Eludido Extra";
               break;
           case 'revisado':
               return "Revisado";
               break;
           case 'fechamarcacioncr':
               return "Fecha Marcacion CR";
               break;
           case 'fechadeteccionect':
               return "Fecha Deteccion ECT";
               break;
           case 'fechadeteccioneap':
               return "Fecha Deteccion EAP";
               break;
           case 'tramoidorigen':
               return "Tramo ID Origen";
               break;
           case 'operacionid':
               return "Operacion ID";
               break;
           case 'residente':
               return "Residente";
               break;
           case 'video':
               return "video";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_aforo_liquidacionCR_tramo_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_aforo_liquidacionCR_tramo_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_aforo_liquidacionCR_tramo_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_aforo_liquidacionCR_tramo_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'vehiculocorrecto' == $filtro)) || (is_array($filtro) && in_array('vehiculocorrecto', $filtro)))
        $this->ValidateField_vehiculocorrecto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pagoid_ana' == $filtro)) || (is_array($filtro) && in_array('pagoid_ana', $filtro)))
        $this->ValidateField_pagoid_ana($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'vehiculoid_ana' == $filtro)) || (is_array($filtro) && in_array('vehiculoid_ana', $filtro)))
        $this->ValidateField_vehiculoid_ana($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'importe_ana' == $filtro)) || (is_array($filtro) && in_array('importe_ana', $filtro)))
        $this->ValidateField_importe_ana($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cantidadeje_ana' == $filtro)) || (is_array($filtro) && in_array('cantidadeje_ana', $filtro)))
        $this->ValidateField_cantidadeje_ana($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tarifaee_ana' == $filtro)) || (is_array($filtro) && in_array('tarifaee_ana', $filtro)))
        $this->ValidateField_tarifaee_ana($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fld_importe_eeana' == $filtro)) || (is_array($filtro) && in_array('fld_importe_eeana', $filtro)))
        $this->ValidateField_fld_importe_eeana($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_vehiculocorrecto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->vehiculocorrecto == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->vehiculocorrecto != "" && !in_array("vehiculocorrecto", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculocorrecto']) && !in_array($this->vehiculocorrecto, $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculocorrecto']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['vehiculocorrecto']))
              {
                  $Campos_Erros['vehiculocorrecto'] = array();
              }
              $Campos_Erros['vehiculocorrecto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['vehiculocorrecto']) || !is_array($this->NM_ajax_info['errList']['vehiculocorrecto']))
              {
                  $this->NM_ajax_info['errList']['vehiculocorrecto'] = array();
              }
              $this->NM_ajax_info['errList']['vehiculocorrecto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'vehiculocorrecto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_vehiculocorrecto

    function ValidateField_pagoid_ana(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->pagoid_ana) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana']) && !in_array($this->pagoid_ana, $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['pagoid_ana']))
                   {
                       $Campos_Erros['pagoid_ana'] = array();
                   }
                   $Campos_Erros['pagoid_ana'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['pagoid_ana']) || !is_array($this->NM_ajax_info['errList']['pagoid_ana']))
                   {
                       $this->NM_ajax_info['errList']['pagoid_ana'] = array();
                   }
                   $this->NM_ajax_info['errList']['pagoid_ana'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pagoid_ana';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pagoid_ana

    function ValidateField_vehiculoid_ana(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->vehiculoid_ana) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana']) && !in_array($this->vehiculoid_ana, $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['vehiculoid_ana']))
                   {
                       $Campos_Erros['vehiculoid_ana'] = array();
                   }
                   $Campos_Erros['vehiculoid_ana'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['vehiculoid_ana']) || !is_array($this->NM_ajax_info['errList']['vehiculoid_ana']))
                   {
                       $this->NM_ajax_info['errList']['vehiculoid_ana'] = array();
                   }
                   $this->NM_ajax_info['errList']['vehiculoid_ana'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'vehiculoid_ana';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_vehiculoid_ana

    function ValidateField_importe_ana(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->importe_ana === "" || is_null($this->importe_ana))  
      { 
          $this->importe_ana = 0;
          $this->sc_force_zero[] = 'importe_ana';
      } 
      if (!empty($this->field_config['importe_ana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importe_ana, $this->field_config['importe_ana']['symbol_dec'], $this->field_config['importe_ana']['symbol_grp'], $this->field_config['importe_ana']['symbol_mon']); 
          nm_limpa_valor($this->importe_ana, $this->field_config['importe_ana']['symbol_dec'], $this->field_config['importe_ana']['symbol_grp']) ; 
          if ('.' == substr($this->importe_ana, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importe_ana, 1)))
              {
                  $this->importe_ana = '';
              }
              else
              {
                  $this->importe_ana = '0' . $this->importe_ana;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->importe_ana != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->importe_ana) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe ANA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importe_ana']))
                  {
                      $Campos_Erros['importe_ana'] = array();
                  }
                  $Campos_Erros['importe_ana'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importe_ana']) || !is_array($this->NM_ajax_info['errList']['importe_ana']))
                  {
                      $this->NM_ajax_info['errList']['importe_ana'] = array();
                  }
                  $this->NM_ajax_info['errList']['importe_ana'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importe_ana, 4, 2, -0, 999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Importe ANA; " ; 
                  if (!isset($Campos_Erros['importe_ana']))
                  {
                      $Campos_Erros['importe_ana'] = array();
                  }
                  $Campos_Erros['importe_ana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importe_ana']) || !is_array($this->NM_ajax_info['errList']['importe_ana']))
                  {
                      $this->NM_ajax_info['errList']['importe_ana'] = array();
                  }
                  $this->NM_ajax_info['errList']['importe_ana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importe_ana';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importe_ana

    function ValidateField_cantidadeje_ana(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cantidadeje_ana === "" || is_null($this->cantidadeje_ana))  
      { 
          $this->cantidadeje_ana = 0;
          $this->sc_force_zero[] = 'cantidadeje_ana';
      } 
      nm_limpa_numero($this->cantidadeje_ana, $this->field_config['cantidadeje_ana']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->cantidadeje_ana != '')  
          { 
              $iTestSize = 5;
              if (strlen($this->cantidadeje_ana) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad EE ANA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidadeje_ana']))
                  {
                      $Campos_Erros['cantidadeje_ana'] = array();
                  }
                  $Campos_Erros['cantidadeje_ana'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidadeje_ana']) || !is_array($this->NM_ajax_info['errList']['cantidadeje_ana']))
                  {
                      $this->NM_ajax_info['errList']['cantidadeje_ana'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidadeje_ana'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidadeje_ana, 5, 0, -0, 99999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad EE ANA; " ; 
                  if (!isset($Campos_Erros['cantidadeje_ana']))
                  {
                      $Campos_Erros['cantidadeje_ana'] = array();
                  }
                  $Campos_Erros['cantidadeje_ana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidadeje_ana']) || !is_array($this->NM_ajax_info['errList']['cantidadeje_ana']))
                  {
                      $this->NM_ajax_info['errList']['cantidadeje_ana'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidadeje_ana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cantidadeje_ana';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cantidadeje_ana

    function ValidateField_tarifaee_ana(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tarifaee_ana === "" || is_null($this->tarifaee_ana))  
      { 
          $this->tarifaee_ana = 0;
          $this->sc_force_zero[] = 'tarifaee_ana';
      } 
      if (!empty($this->field_config['tarifaee_ana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_dec'], $this->field_config['tarifaee_ana']['symbol_grp'], $this->field_config['tarifaee_ana']['symbol_mon']); 
          nm_limpa_valor($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_dec'], $this->field_config['tarifaee_ana']['symbol_grp']) ; 
          if ('.' == substr($this->tarifaee_ana, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->tarifaee_ana, 1)))
              {
                  $this->tarifaee_ana = '';
              }
              else
              {
                  $this->tarifaee_ana = '0' . $this->tarifaee_ana;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->tarifaee_ana != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->tarifaee_ana) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tarifa EE ANA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tarifaee_ana']))
                  {
                      $Campos_Erros['tarifaee_ana'] = array();
                  }
                  $Campos_Erros['tarifaee_ana'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tarifaee_ana']) || !is_array($this->NM_ajax_info['errList']['tarifaee_ana']))
                  {
                      $this->NM_ajax_info['errList']['tarifaee_ana'] = array();
                  }
                  $this->NM_ajax_info['errList']['tarifaee_ana'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tarifaee_ana, 4, 2, -0, 999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tarifa EE ANA; " ; 
                  if (!isset($Campos_Erros['tarifaee_ana']))
                  {
                      $Campos_Erros['tarifaee_ana'] = array();
                  }
                  $Campos_Erros['tarifaee_ana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tarifaee_ana']) || !is_array($this->NM_ajax_info['errList']['tarifaee_ana']))
                  {
                      $this->NM_ajax_info['errList']['tarifaee_ana'] = array();
                  }
                  $this->NM_ajax_info['errList']['tarifaee_ana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarifaee_ana';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarifaee_ana

    function ValidateField_fld_importe_eeana(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fld_importe_eeana === "" || is_null($this->fld_importe_eeana))  
      { 
          $this->fld_importe_eeana = 0;
          $this->sc_force_zero[] = 'fld_importe_eeana';
      } 
      if (!empty($this->field_config['fld_importe_eeana']['symbol_dec']))
      {
          $this->sc_remove_currency($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_dec'], $this->field_config['fld_importe_eeana']['symbol_grp'], $this->field_config['fld_importe_eeana']['symbol_mon']); 
          nm_limpa_valor($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_dec'], $this->field_config['fld_importe_eeana']['symbol_grp']) ; 
          if ('.' == substr($this->fld_importe_eeana, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->fld_importe_eeana, 1)))
              {
                  $this->fld_importe_eeana = '';
              }
              else
              {
                  $this->fld_importe_eeana = '0' . $this->fld_importe_eeana;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->fld_importe_eeana != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->fld_importe_eeana, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->fld_importe_eeana, -1))
              {
                  $iTestSize++;
                  $this->fld_importe_eeana = '-' . substr($this->fld_importe_eeana, 0, -1);
              }
              if (strlen($this->fld_importe_eeana) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "EjeEx($): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['fld_importe_eeana']))
                  {
                      $Campos_Erros['fld_importe_eeana'] = array();
                  }
                  $Campos_Erros['fld_importe_eeana'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['fld_importe_eeana']) || !is_array($this->NM_ajax_info['errList']['fld_importe_eeana']))
                  {
                      $this->NM_ajax_info['errList']['fld_importe_eeana'] = array();
                  }
                  $this->NM_ajax_info['errList']['fld_importe_eeana'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->fld_importe_eeana, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "EjeEx($); " ; 
                  if (!isset($Campos_Erros['fld_importe_eeana']))
                  {
                      $Campos_Erros['fld_importe_eeana'] = array();
                  }
                  $Campos_Erros['fld_importe_eeana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fld_importe_eeana']) || !is_array($this->NM_ajax_info['errList']['fld_importe_eeana']))
                  {
                      $this->NM_ajax_info['errList']['fld_importe_eeana'] = array();
                  }
                  $this->NM_ajax_info['errList']['fld_importe_eeana'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fld_importe_eeana';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fld_importe_eeana

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
    $this->nmgp_dados_form['vehiculocorrecto'] = $this->vehiculocorrecto;
    $this->nmgp_dados_form['pagoid_ana'] = $this->pagoid_ana;
    $this->nmgp_dados_form['vehiculoid_ana'] = $this->vehiculoid_ana;
    $this->nmgp_dados_form['importe_ana'] = $this->importe_ana;
    $this->nmgp_dados_form['cantidadeje_ana'] = $this->cantidadeje_ana;
    $this->nmgp_dados_form['tarifaee_ana'] = $this->tarifaee_ana;
    $this->nmgp_dados_form['fld_importe_eeana'] = $this->fld_importe_eeana;
    $this->nmgp_dados_form['consecutivo'] = $this->consecutivo;
    $this->nmgp_dados_form['casetaid'] = $this->casetaid;
    $this->nmgp_dados_form['fechaoperacion'] = $this->fechaoperacion;
    $this->nmgp_dados_form['fechaturno'] = $this->fechaturno;
    $this->nmgp_dados_form['turnoid'] = $this->turnoid;
    $this->nmgp_dados_form['horaevento'] = $this->horaevento;
    $this->nmgp_dados_form['tramoid'] = $this->tramoid;
    $this->nmgp_dados_form['carrilid'] = $this->carrilid;
    $this->nmgp_dados_form['cuerpo'] = $this->cuerpo;
    $this->nmgp_dados_form['secuencial'] = $this->secuencial;
    $this->nmgp_dados_form['folio'] = $this->folio;
    $this->nmgp_dados_form['vehiculoid_ect'] = $this->vehiculoid_ect;
    $this->nmgp_dados_form['clasevehiculo_ect'] = $this->clasevehiculo_ect;
    $this->nmgp_dados_form['importe_ect'] = $this->importe_ect;
    $this->nmgp_dados_form['cantidadeje_ect'] = $this->cantidadeje_ect;
    $this->nmgp_dados_form['tarifaee_ect'] = $this->tarifaee_ect;
    $this->nmgp_dados_form['vehiculoid_cr'] = $this->vehiculoid_cr;
    $this->nmgp_dados_form['clasevehiculo_cr'] = $this->clasevehiculo_cr;
    $this->nmgp_dados_form['importe_cr'] = $this->importe_cr;
    $this->nmgp_dados_form['cantidadeje_cr'] = $this->cantidadeje_cr;
    $this->nmgp_dados_form['tarifaee_cr'] = $this->tarifaee_cr;
    $this->nmgp_dados_form['vehiculoid_eap'] = $this->vehiculoid_eap;
    $this->nmgp_dados_form['clasevehiculo_eap'] = $this->clasevehiculo_eap;
    $this->nmgp_dados_form['importe_eap'] = $this->importe_eap;
    $this->nmgp_dados_form['cantidadeje_eap'] = $this->cantidadeje_eap;
    $this->nmgp_dados_form['tarifaee_eap'] = $this->tarifaee_eap;
    $this->nmgp_dados_form['pagoid'] = $this->pagoid;
    $this->nmgp_dados_form['excentoid'] = $this->excentoid;
    $this->nmgp_dados_form['usuarioid'] = $this->usuarioid;
    $this->nmgp_dados_form['placas'] = $this->placas;
    $this->nmgp_dados_form['numerotarjeta'] = $this->numerotarjeta;
    $this->nmgp_dados_form['tipotarjeta'] = $this->tipotarjeta;
    $this->nmgp_dados_form['fechaenvio'] = $this->fechaenvio;
    $this->nmgp_dados_form['codigofacturacion'] = $this->codigofacturacion;
    $this->nmgp_dados_form['clasevehiculo_ana'] = $this->clasevehiculo_ana;
    $this->nmgp_dados_form['estatusana'] = $this->estatusana;
    $this->nmgp_dados_form['fld_ar_sct'] = $this->fld_ar_sct;
    $this->nmgp_dados_form['fechamodificadoana'] = $this->fechamodificadoana;
    $this->nmgp_dados_form['eludidoextra'] = $this->eludidoextra;
    $this->nmgp_dados_form['revisado'] = $this->revisado;
    $this->nmgp_dados_form['fechamarcacioncr'] = $this->fechamarcacioncr;
    $this->nmgp_dados_form['fechadeteccionect'] = $this->fechadeteccionect;
    $this->nmgp_dados_form['fechadeteccioneap'] = $this->fechadeteccioneap;
    $this->nmgp_dados_form['tramoidorigen'] = $this->tramoidorigen;
    $this->nmgp_dados_form['operacionid'] = $this->operacionid;
    $this->nmgp_dados_form['residente'] = $this->residente;
    $this->nmgp_dados_form['video'] = $this->video;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['importe_ana'] = $this->importe_ana;
      if (!empty($this->field_config['importe_ana']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importe_ana, $this->field_config['importe_ana']['symbol_dec'], $this->field_config['importe_ana']['symbol_grp'], $this->field_config['importe_ana']['symbol_mon']);
         nm_limpa_valor($this->importe_ana, $this->field_config['importe_ana']['symbol_dec'], $this->field_config['importe_ana']['symbol_grp']);
      }
      $this->Before_unformat['cantidadeje_ana'] = $this->cantidadeje_ana;
      nm_limpa_numero($this->cantidadeje_ana, $this->field_config['cantidadeje_ana']['symbol_grp']) ; 
      $this->Before_unformat['tarifaee_ana'] = $this->tarifaee_ana;
      if (!empty($this->field_config['tarifaee_ana']['symbol_dec']))
      {
         $this->sc_remove_currency($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_dec'], $this->field_config['tarifaee_ana']['symbol_grp'], $this->field_config['tarifaee_ana']['symbol_mon']);
         nm_limpa_valor($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_dec'], $this->field_config['tarifaee_ana']['symbol_grp']);
      }
      $this->Before_unformat['fld_importe_eeana'] = $this->fld_importe_eeana;
      if (!empty($this->field_config['fld_importe_eeana']['symbol_dec']))
      {
         $this->sc_remove_currency($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_dec'], $this->field_config['fld_importe_eeana']['symbol_grp'], $this->field_config['fld_importe_eeana']['symbol_mon']);
         nm_limpa_valor($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_dec'], $this->field_config['fld_importe_eeana']['symbol_grp']);
      }
      $this->Before_unformat['consecutivo'] = $this->consecutivo;
      nm_limpa_numero($this->consecutivo, $this->field_config['consecutivo']['symbol_grp']) ; 
      $this->Before_unformat['fechaoperacion'] = $this->fechaoperacion;
      nm_limpa_data($this->fechaoperacion, $this->field_config['fechaoperacion']['date_sep']) ; 
      $this->Before_unformat['fechaturno'] = $this->fechaturno;
      nm_limpa_data($this->fechaturno, $this->field_config['fechaturno']['date_sep']) ; 
      $this->Before_unformat['turnoid'] = $this->turnoid;
      nm_limpa_numero($this->turnoid, $this->field_config['turnoid']['symbol_grp']) ; 
      $this->Before_unformat['horaevento'] = $this->horaevento;
      nm_limpa_hora($this->horaevento, $this->field_config['horaevento']['time_sep']) ; 
      $this->Before_unformat['tramoid'] = $this->tramoid;
      nm_limpa_numero($this->tramoid, $this->field_config['tramoid']['symbol_grp']) ; 
      $this->Before_unformat['carrilid'] = $this->carrilid;
      nm_limpa_numero($this->carrilid, $this->field_config['carrilid']['symbol_grp']) ; 
      $this->Before_unformat['secuencial'] = $this->secuencial;
      nm_limpa_numero($this->secuencial, $this->field_config['secuencial']['symbol_grp']) ; 
      $this->Before_unformat['folio'] = $this->folio;
      nm_limpa_numero($this->folio, $this->field_config['folio']['symbol_grp']) ; 
      $this->Before_unformat['importe_ect'] = $this->importe_ect;
      if (!empty($this->field_config['importe_ect']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importe_ect, $this->field_config['importe_ect']['symbol_dec'], $this->field_config['importe_ect']['symbol_grp'], $this->field_config['importe_ect']['symbol_mon']);
         nm_limpa_valor($this->importe_ect, $this->field_config['importe_ect']['symbol_dec'], $this->field_config['importe_ect']['symbol_grp']);
      }
      $this->Before_unformat['cantidadeje_ect'] = $this->cantidadeje_ect;
      nm_limpa_numero($this->cantidadeje_ect, $this->field_config['cantidadeje_ect']['symbol_grp']) ; 
      $this->Before_unformat['tarifaee_ect'] = $this->tarifaee_ect;
      if (!empty($this->field_config['tarifaee_ect']['symbol_dec']))
      {
         $this->sc_remove_currency($this->tarifaee_ect, $this->field_config['tarifaee_ect']['symbol_dec'], $this->field_config['tarifaee_ect']['symbol_grp'], $this->field_config['tarifaee_ect']['symbol_mon']);
         nm_limpa_valor($this->tarifaee_ect, $this->field_config['tarifaee_ect']['symbol_dec'], $this->field_config['tarifaee_ect']['symbol_grp']);
      }
      $this->Before_unformat['importe_cr'] = $this->importe_cr;
      if (!empty($this->field_config['importe_cr']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importe_cr, $this->field_config['importe_cr']['symbol_dec'], $this->field_config['importe_cr']['symbol_grp'], $this->field_config['importe_cr']['symbol_mon']);
         nm_limpa_valor($this->importe_cr, $this->field_config['importe_cr']['symbol_dec'], $this->field_config['importe_cr']['symbol_grp']);
      }
      $this->Before_unformat['cantidadeje_cr'] = $this->cantidadeje_cr;
      nm_limpa_numero($this->cantidadeje_cr, $this->field_config['cantidadeje_cr']['symbol_grp']) ; 
      $this->Before_unformat['tarifaee_cr'] = $this->tarifaee_cr;
      if (!empty($this->field_config['tarifaee_cr']['symbol_dec']))
      {
         $this->sc_remove_currency($this->tarifaee_cr, $this->field_config['tarifaee_cr']['symbol_dec'], $this->field_config['tarifaee_cr']['symbol_grp'], $this->field_config['tarifaee_cr']['symbol_mon']);
         nm_limpa_valor($this->tarifaee_cr, $this->field_config['tarifaee_cr']['symbol_dec'], $this->field_config['tarifaee_cr']['symbol_grp']);
      }
      $this->Before_unformat['importe_eap'] = $this->importe_eap;
      if (!empty($this->field_config['importe_eap']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importe_eap, $this->field_config['importe_eap']['symbol_dec'], $this->field_config['importe_eap']['symbol_grp'], $this->field_config['importe_eap']['symbol_mon']);
         nm_limpa_valor($this->importe_eap, $this->field_config['importe_eap']['symbol_dec'], $this->field_config['importe_eap']['symbol_grp']);
      }
      $this->Before_unformat['cantidadeje_eap'] = $this->cantidadeje_eap;
      nm_limpa_numero($this->cantidadeje_eap, $this->field_config['cantidadeje_eap']['symbol_grp']) ; 
      $this->Before_unformat['tarifaee_eap'] = $this->tarifaee_eap;
      if (!empty($this->field_config['tarifaee_eap']['symbol_dec']))
      {
         $this->sc_remove_currency($this->tarifaee_eap, $this->field_config['tarifaee_eap']['symbol_dec'], $this->field_config['tarifaee_eap']['symbol_grp'], $this->field_config['tarifaee_eap']['symbol_mon']);
         nm_limpa_valor($this->tarifaee_eap, $this->field_config['tarifaee_eap']['symbol_dec'], $this->field_config['tarifaee_eap']['symbol_grp']);
      }
      $this->Before_unformat['excentoid'] = $this->excentoid;
      nm_limpa_numero($this->excentoid, $this->field_config['excentoid']['symbol_grp']) ; 
      $this->Before_unformat['usuarioid'] = $this->usuarioid;
      nm_limpa_numero($this->usuarioid, $this->field_config['usuarioid']['symbol_grp']) ; 
      $this->Before_unformat['fechaenvio'] = $this->fechaenvio;
      nm_limpa_data($this->fechaenvio, $this->field_config['fechaenvio']['date_sep']) ; 
      $this->Before_unformat['fechamodificadoana'] = $this->fechamodificadoana;
      $this->Before_unformat['fechamodificadoana_hora'] = $this->fechamodificadoana_hora;
      nm_limpa_data($this->fechamodificadoana, $this->field_config['fechamodificadoana']['date_sep']) ; 
      nm_limpa_hora($this->fechamodificadoana_hora, $this->field_config['fechamodificadoana']['time_sep']) ; 
      $this->Before_unformat['eludidoextra'] = $this->eludidoextra;
      nm_limpa_numero($this->eludidoextra, $this->field_config['eludidoextra']['symbol_grp']) ; 
      $this->Before_unformat['revisado'] = $this->revisado;
      nm_limpa_numero($this->revisado, $this->field_config['revisado']['symbol_grp']) ; 
      $this->Before_unformat['fechamarcacioncr'] = $this->fechamarcacioncr;
      $this->Before_unformat['fechamarcacioncr_hora'] = $this->fechamarcacioncr_hora;
      nm_limpa_data($this->fechamarcacioncr, $this->field_config['fechamarcacioncr']['date_sep']) ; 
      nm_limpa_hora($this->fechamarcacioncr_hora, $this->field_config['fechamarcacioncr']['time_sep']) ; 
      $this->Before_unformat['fechadeteccionect'] = $this->fechadeteccionect;
      $this->Before_unformat['fechadeteccionect_hora'] = $this->fechadeteccionect_hora;
      nm_limpa_data($this->fechadeteccionect, $this->field_config['fechadeteccionect']['date_sep']) ; 
      nm_limpa_hora($this->fechadeteccionect_hora, $this->field_config['fechadeteccionect']['time_sep']) ; 
      $this->Before_unformat['fechadeteccioneap'] = $this->fechadeteccioneap;
      $this->Before_unformat['fechadeteccioneap_hora'] = $this->fechadeteccioneap_hora;
      nm_limpa_data($this->fechadeteccioneap, $this->field_config['fechadeteccioneap']['date_sep']) ; 
      nm_limpa_hora($this->fechadeteccioneap_hora, $this->field_config['fechadeteccioneap']['time_sep']) ; 
      $this->Before_unformat['tramoidorigen'] = $this->tramoidorigen;
      nm_limpa_numero($this->tramoidorigen, $this->field_config['tramoidorigen']['symbol_grp']) ; 
      $this->Before_unformat['operacionid'] = $this->operacionid;
      nm_limpa_numero($this->operacionid, $this->field_config['operacionid']['symbol_grp']) ; 
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
      if ($Nome_Campo == "importe_ana")
      {
          if (!empty($this->field_config['importe_ana']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importe_ana, $this->field_config['importe_ana']['symbol_dec'], $this->field_config['importe_ana']['symbol_grp'], $this->field_config['importe_ana']['symbol_mon']);
             nm_limpa_valor($this->importe_ana, $this->field_config['importe_ana']['symbol_dec'], $this->field_config['importe_ana']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cantidadeje_ana")
      {
          nm_limpa_numero($this->cantidadeje_ana, $this->field_config['cantidadeje_ana']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tarifaee_ana")
      {
          if (!empty($this->field_config['tarifaee_ana']['symbol_dec']))
          {
             $this->sc_remove_currency($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_dec'], $this->field_config['tarifaee_ana']['symbol_grp'], $this->field_config['tarifaee_ana']['symbol_mon']);
             nm_limpa_valor($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_dec'], $this->field_config['tarifaee_ana']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "fld_importe_eeana")
      {
          if (!empty($this->field_config['fld_importe_eeana']['symbol_dec']))
          {
             $this->sc_remove_currency($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_dec'], $this->field_config['fld_importe_eeana']['symbol_grp'], $this->field_config['fld_importe_eeana']['symbol_mon']);
             nm_limpa_valor($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_dec'], $this->field_config['fld_importe_eeana']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "consecutivo")
      {
          nm_limpa_numero($this->consecutivo, $this->field_config['consecutivo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "turnoid")
      {
          nm_limpa_numero($this->turnoid, $this->field_config['turnoid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tramoid")
      {
          nm_limpa_numero($this->tramoid, $this->field_config['tramoid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "carrilid")
      {
          nm_limpa_numero($this->carrilid, $this->field_config['carrilid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "secuencial")
      {
          nm_limpa_numero($this->secuencial, $this->field_config['secuencial']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "folio")
      {
          nm_limpa_numero($this->folio, $this->field_config['folio']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "importe_ect")
      {
          if (!empty($this->field_config['importe_ect']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importe_ect, $this->field_config['importe_ect']['symbol_dec'], $this->field_config['importe_ect']['symbol_grp'], $this->field_config['importe_ect']['symbol_mon']);
             nm_limpa_valor($this->importe_ect, $this->field_config['importe_ect']['symbol_dec'], $this->field_config['importe_ect']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cantidadeje_ect")
      {
          nm_limpa_numero($this->cantidadeje_ect, $this->field_config['cantidadeje_ect']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tarifaee_ect")
      {
          if (!empty($this->field_config['tarifaee_ect']['symbol_dec']))
          {
             $this->sc_remove_currency($this->tarifaee_ect, $this->field_config['tarifaee_ect']['symbol_dec'], $this->field_config['tarifaee_ect']['symbol_grp'], $this->field_config['tarifaee_ect']['symbol_mon']);
             nm_limpa_valor($this->tarifaee_ect, $this->field_config['tarifaee_ect']['symbol_dec'], $this->field_config['tarifaee_ect']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importe_cr")
      {
          if (!empty($this->field_config['importe_cr']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importe_cr, $this->field_config['importe_cr']['symbol_dec'], $this->field_config['importe_cr']['symbol_grp'], $this->field_config['importe_cr']['symbol_mon']);
             nm_limpa_valor($this->importe_cr, $this->field_config['importe_cr']['symbol_dec'], $this->field_config['importe_cr']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cantidadeje_cr")
      {
          nm_limpa_numero($this->cantidadeje_cr, $this->field_config['cantidadeje_cr']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tarifaee_cr")
      {
          if (!empty($this->field_config['tarifaee_cr']['symbol_dec']))
          {
             $this->sc_remove_currency($this->tarifaee_cr, $this->field_config['tarifaee_cr']['symbol_dec'], $this->field_config['tarifaee_cr']['symbol_grp'], $this->field_config['tarifaee_cr']['symbol_mon']);
             nm_limpa_valor($this->tarifaee_cr, $this->field_config['tarifaee_cr']['symbol_dec'], $this->field_config['tarifaee_cr']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importe_eap")
      {
          if (!empty($this->field_config['importe_eap']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importe_eap, $this->field_config['importe_eap']['symbol_dec'], $this->field_config['importe_eap']['symbol_grp'], $this->field_config['importe_eap']['symbol_mon']);
             nm_limpa_valor($this->importe_eap, $this->field_config['importe_eap']['symbol_dec'], $this->field_config['importe_eap']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cantidadeje_eap")
      {
          nm_limpa_numero($this->cantidadeje_eap, $this->field_config['cantidadeje_eap']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tarifaee_eap")
      {
          if (!empty($this->field_config['tarifaee_eap']['symbol_dec']))
          {
             $this->sc_remove_currency($this->tarifaee_eap, $this->field_config['tarifaee_eap']['symbol_dec'], $this->field_config['tarifaee_eap']['symbol_grp'], $this->field_config['tarifaee_eap']['symbol_mon']);
             nm_limpa_valor($this->tarifaee_eap, $this->field_config['tarifaee_eap']['symbol_dec'], $this->field_config['tarifaee_eap']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "excentoid")
      {
          nm_limpa_numero($this->excentoid, $this->field_config['excentoid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "usuarioid")
      {
          nm_limpa_numero($this->usuarioid, $this->field_config['usuarioid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "eludidoextra")
      {
          nm_limpa_numero($this->eludidoextra, $this->field_config['eludidoextra']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "revisado")
      {
          nm_limpa_numero($this->revisado, $this->field_config['revisado']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tramoidorigen")
      {
          nm_limpa_numero($this->tramoidorigen, $this->field_config['tramoidorigen']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "operacionid")
      {
          nm_limpa_numero($this->operacionid, $this->field_config['operacionid']['symbol_grp']) ; 
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
      if ('' !== $this->importe_ana || (!empty($format_fields) && isset($format_fields['importe_ana'])))
      {
          nmgp_Form_Num_Val($this->importe_ana, $this->field_config['importe_ana']['symbol_grp'], $this->field_config['importe_ana']['symbol_dec'], "2", "S", $this->field_config['importe_ana']['format_neg'], "", "", "-", $this->field_config['importe_ana']['symbol_fmt']) ; 
      }
      if ('' !== $this->cantidadeje_ana || (!empty($format_fields) && isset($format_fields['cantidadeje_ana'])))
      {
          nmgp_Form_Num_Val($this->cantidadeje_ana, $this->field_config['cantidadeje_ana']['symbol_grp'], $this->field_config['cantidadeje_ana']['symbol_dec'], "0", "S", $this->field_config['cantidadeje_ana']['format_neg'], "", "", "-", $this->field_config['cantidadeje_ana']['symbol_fmt']) ; 
      }
      if ('' !== $this->tarifaee_ana || (!empty($format_fields) && isset($format_fields['tarifaee_ana'])))
      {
          nmgp_Form_Num_Val($this->tarifaee_ana, $this->field_config['tarifaee_ana']['symbol_grp'], $this->field_config['tarifaee_ana']['symbol_dec'], "2", "S", $this->field_config['tarifaee_ana']['format_neg'], "", "", "-", $this->field_config['tarifaee_ana']['symbol_fmt']) ; 
      }
      if ('' !== $this->fld_importe_eeana || (!empty($format_fields) && isset($format_fields['fld_importe_eeana'])))
      {
          nmgp_Form_Num_Val($this->fld_importe_eeana, $this->field_config['fld_importe_eeana']['symbol_grp'], $this->field_config['fld_importe_eeana']['symbol_dec'], "0", "S", $this->field_config['fld_importe_eeana']['format_neg'], "", "", "-", $this->field_config['fld_importe_eeana']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['fld_importe_eeana']['symbol_mon'];
          $this->sc_add_currency($this->fld_importe_eeana, $sMonSymb, $this->field_config['fld_importe_eeana']['format_pos']); 
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
          $this->ajax_return_values_vehiculocorrecto();
          $this->ajax_return_values_pagoid_ana();
          $this->ajax_return_values_vehiculoid_ana();
          $this->ajax_return_values_importe_ana();
          $this->ajax_return_values_cantidadeje_ana();
          $this->ajax_return_values_tarifaee_ana();
          $this->ajax_return_values_fld_importe_eeana();
          $this->ajax_return_values_consecutivo();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['consecutivo']['keyVal'] = form_aforo_liquidacionCR_tramo_mob_pack_protect_string($this->nmgp_dados_form['consecutivo']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['grid_dat_video_script_case_init'] ]['grid_dat_video']['embutida_form_full'] = false;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['grid_dat_video_script_case_init'] ]['grid_dat_video']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['grid_dat_video_script_case_init'] ]['grid_dat_video']['embutida_pai']        = "form_aforo_liquidacionCR_tramo_mob";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['grid_dat_video_script_case_init'] ]['grid_dat_video']['embutida_form_parms'] = "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['grid_dat_video_script_case_init'] ]['grid_dat_video']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['grid_dat_video_script_case_init'] ]['grid_dat_video']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['grid_dat_video_script_case_init'] ]['grid_dat_video'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['grid_dat_video_script_case_init'] ]['grid_dat_video'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['grid_dat_video_script_case_init'] ]['grid_dat_video']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['grid_dat_video_script_case_init'] ]['grid_dat_video']['total']);
              }
          }
   } // ajax_return_values

          //----- vehiculocorrecto
   function ajax_return_values_vehiculocorrecto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vehiculocorrecto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vehiculocorrecto);
              $aLookup = array();
              $this->_tmp_lookup_vehiculocorrecto = $this->vehiculocorrecto;

$aLookup[] = array(form_aforo_liquidacionCR_tramo_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_aforo_liquidacionCR_tramo_mob_pack_protect_string("PRE")));
$aLookup[] = array(form_aforo_liquidacionCR_tramo_mob_pack_protect_string('2') => str_replace('<', '&lt;',form_aforo_liquidacionCR_tramo_mob_pack_protect_string("CR")));
$aLookup[] = array(form_aforo_liquidacionCR_tramo_mob_pack_protect_string('3') => str_replace('<', '&lt;',form_aforo_liquidacionCR_tramo_mob_pack_protect_string("POS")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculocorrecto'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculocorrecto'][] = '2';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculocorrecto'][] = '3';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['vehiculocorrecto']) && !empty($this->NM_ajax_info['select_html']['vehiculocorrecto']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['vehiculocorrecto']);
          }
          $this->NM_ajax_info['fldList']['vehiculocorrecto'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 3,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['vehiculocorrecto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['vehiculocorrecto']['valList'][$i] = form_aforo_liquidacionCR_tramo_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['vehiculocorrecto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['vehiculocorrecto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['vehiculocorrecto']['labList'] = $aLabel;
          }
   }

          //----- pagoid_ana
   function ajax_return_values_pagoid_ana($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pagoid_ana", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pagoid_ana);
              $aLookup = array();
              $this->_tmp_lookup_pagoid_ana = $this->pagoid_ana;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_importe_ana = $this->importe_ana;
   $old_value_cantidadeje_ana = $this->cantidadeje_ana;
   $old_value_tarifaee_ana = $this->tarifaee_ana;
   $old_value_fld_importe_eeana = $this->fld_importe_eeana;
   $this->nm_tira_formatacao();


   $unformatted_value_importe_ana = $this->importe_ana;
   $unformatted_value_cantidadeje_ana = $this->cantidadeje_ana;
   $unformatted_value_tarifaee_ana = $this->tarifaee_ana;
   $unformatted_value_fld_importe_eeana = $this->fld_importe_eeana;

   $nm_comando = "SELECT TipoPagoID, TipoPagoID FROM tipopago  ORDER BY Orden";

   $this->importe_ana = $old_value_importe_ana;
   $this->cantidadeje_ana = $old_value_cantidadeje_ana;
   $this->tarifaee_ana = $old_value_tarifaee_ana;
   $this->fld_importe_eeana = $old_value_fld_importe_eeana;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_aforo_liquidacionCR_tramo_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_aforo_liquidacionCR_tramo_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"pagoid_ana\"";
          if (isset($this->NM_ajax_info['select_html']['pagoid_ana']) && !empty($this->NM_ajax_info['select_html']['pagoid_ana']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['pagoid_ana']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->pagoid_ana == $sValue)
                  {
                      $this->_tmp_lookup_pagoid_ana = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['pagoid_ana'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['pagoid_ana']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['pagoid_ana']['valList'][$i] = form_aforo_liquidacionCR_tramo_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['pagoid_ana']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['pagoid_ana']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['pagoid_ana']['labList'] = $aLabel;
          }
   }

          //----- vehiculoid_ana
   function ajax_return_values_vehiculoid_ana($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vehiculoid_ana", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vehiculoid_ana);
              $aLookup = array();
              $this->_tmp_lookup_vehiculoid_ana = $this->vehiculoid_ana;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_importe_ana = $this->importe_ana;
   $old_value_cantidadeje_ana = $this->cantidadeje_ana;
   $old_value_tarifaee_ana = $this->tarifaee_ana;
   $old_value_fld_importe_eeana = $this->fld_importe_eeana;
   $this->nm_tira_formatacao();


   $unformatted_value_importe_ana = $this->importe_ana;
   $unformatted_value_cantidadeje_ana = $this->cantidadeje_ana;
   $unformatted_value_tarifaee_ana = $this->tarifaee_ana;
   $unformatted_value_fld_importe_eeana = $this->fld_importe_eeana;

   $nm_comando = "SELECT fld_tipo_equipo, fld_tipo_equipo FROM cat_tipoveh  ORDER BY fld_orden";

   $this->importe_ana = $old_value_importe_ana;
   $this->cantidadeje_ana = $old_value_cantidadeje_ana;
   $this->tarifaee_ana = $old_value_tarifaee_ana;
   $this->fld_importe_eeana = $old_value_fld_importe_eeana;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_aforo_liquidacionCR_tramo_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_aforo_liquidacionCR_tramo_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"vehiculoid_ana\"";
          if (isset($this->NM_ajax_info['select_html']['vehiculoid_ana']) && !empty($this->NM_ajax_info['select_html']['vehiculoid_ana']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['vehiculoid_ana']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->vehiculoid_ana == $sValue)
                  {
                      $this->_tmp_lookup_vehiculoid_ana = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['vehiculoid_ana'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['vehiculoid_ana']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['vehiculoid_ana']['valList'][$i] = form_aforo_liquidacionCR_tramo_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['vehiculoid_ana']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['vehiculoid_ana']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['vehiculoid_ana']['labList'] = $aLabel;
          }
   }

          //----- importe_ana
   function ajax_return_values_importe_ana($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importe_ana", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importe_ana);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importe_ana'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("importe_ana", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- cantidadeje_ana
   function ajax_return_values_cantidadeje_ana($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidadeje_ana", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cantidadeje_ana);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cantidadeje_ana'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("cantidadeje_ana", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- tarifaee_ana
   function ajax_return_values_tarifaee_ana($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarifaee_ana", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarifaee_ana);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarifaee_ana'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("tarifaee_ana", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- fld_importe_eeana
   function ajax_return_values_fld_importe_eeana($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fld_importe_eeana", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fld_importe_eeana);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fld_importe_eeana'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("fld_importe_eeana", $this->form_encode_input($sTmpValue))),
              );
          }
   }

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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['upload_dir'][$fieldName][] = $newName;
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
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fld_importe_eeana = $this->fld_importe_eeana;
}
if (!isset($this->sc_temp_Camara)) {$this->sc_temp_Camara = (isset($_SESSION['Camara'])) ? $_SESSION['Camara'] : "";}
if (!isset($this->sc_temp_Hora)) {$this->sc_temp_Hora = (isset($_SESSION['Hora'])) ? $_SESSION['Hora'] : "";}
if (!isset($this->sc_temp_Fechat)) {$this->sc_temp_Fechat = (isset($_SESSION['Fechat'])) ? $_SESSION['Fechat'] : "";}
  $Hora = new DateTime($this->fechaturno .' '.$this->horaevento );
$Hora -> modify('+10 second');



$this->sc_temp_Fechat = $Hora->format('Y-m-d');
$this->sc_temp_Hora= $Hora->format('H:i:s');
$this->sc_temp_Camara=33;



$this->Ini->nm_hidden_blocos[0] = "on"; $this->NM_ajax_info['blockDisplay']['0'] = 'on';
$this->Ini->nm_hidden_blocos[1] = "on"; $this->NM_ajax_info['blockDisplay']['1'] = 'on';
$this->NM_ajax_info['buttonDisplay']['video'] = $this->nmgp_botoes["video"] = "on";;
$this->NM_ajax_info['buttonDisplay']['video2'] = $this->nmgp_botoes["video2"] = "on";;
$this->NM_ajax_info['buttonDisplay']['Video3'] = $this->nmgp_botoes["Video3"] = "on";;


if(substr($this->clasevehiculo_ana ,0,1) =="A" || substr($this->clasevehiculo_ana ,0,1) =="M"){
	if($this->casetaid =='59'){
		$this->fld_importe_eeana  = $this->tarifaee_ana ;
	}else{
		$this->fld_importe_eeana  = $this->cantidadeje_ana *$this->tarifaee_ana ;
		}
} else {
	if(strlen($this->vehiculoid_ana ) > 4){
		$this->fld_importe_eeana  = $this->tarifaee_ana *$this->cantidadeje_ana ;
	}else{
		$this->tarifaee_ana  =0;
		$this->fld_importe_eeana =0;
	}
}

$parm = array($this->fechaturno );
$funcion_v = 'clip_video';
$this->sc_ajax_javascript($funcion_v,array($this->fechaturno ,$this->horaevento ,33));
if (isset($this->sc_temp_Fechat)) { $_SESSION['Fechat'] = $this->sc_temp_Fechat;}
if (isset($this->sc_temp_Hora)) { $_SESSION['Hora'] = $this->sc_temp_Hora;}
if (isset($this->sc_temp_Camara)) { $_SESSION['Camara'] = $this->sc_temp_Camara;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fld_importe_eeana != $this->fld_importe_eeana || (isset($bFlagRead_fld_importe_eeana) && $bFlagRead_fld_importe_eeana)))
    {
        $this->ajax_return_values_fld_importe_eeana(true);
    }
}
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->fechamodificadoana))
      {
          $this->fechamodificadoana_hora = $this->fechamodificadoana;
      }
      if (empty($this->fechamarcacioncr))
      {
          $this->fechamarcacioncr_hora = $this->fechamarcacioncr;
      }
      if (empty($this->fechadeteccionect))
      {
          $this->fechadeteccionect_hora = $this->fechadeteccionect;
      }
      if (empty($this->fechadeteccioneap))
      {
          $this->fechadeteccioneap_hora = $this->fechadeteccioneap;
      }
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
      $this->importe_ana = str_replace($sc_parm1, $sc_parm2, $this->importe_ana); 
      $this->tarifaee_ana = str_replace($sc_parm1, $sc_parm2, $this->tarifaee_ana); 
      $this->fld_importe_eeana = str_replace($sc_parm1, $sc_parm2, $this->fld_importe_eeana); 
      $this->importe_ect = str_replace($sc_parm1, $sc_parm2, $this->importe_ect); 
      $this->tarifaee_ect = str_replace($sc_parm1, $sc_parm2, $this->tarifaee_ect); 
      $this->importe_cr = str_replace($sc_parm1, $sc_parm2, $this->importe_cr); 
      $this->tarifaee_cr = str_replace($sc_parm1, $sc_parm2, $this->tarifaee_cr); 
      $this->importe_eap = str_replace($sc_parm1, $sc_parm2, $this->importe_eap); 
      $this->tarifaee_eap = str_replace($sc_parm1, $sc_parm2, $this->tarifaee_eap); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->importe_ana = "'" . $this->importe_ana . "'";
      $this->tarifaee_ana = "'" . $this->tarifaee_ana . "'";
      $this->fld_importe_eeana = "'" . $this->fld_importe_eeana . "'";
      $this->importe_ect = "'" . $this->importe_ect . "'";
      $this->tarifaee_ect = "'" . $this->tarifaee_ect . "'";
      $this->importe_cr = "'" . $this->importe_cr . "'";
      $this->tarifaee_cr = "'" . $this->tarifaee_cr . "'";
      $this->importe_eap = "'" . $this->importe_eap . "'";
      $this->tarifaee_eap = "'" . $this->tarifaee_eap . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->importe_ana = str_replace("'", "", $this->importe_ana); 
      $this->tarifaee_ana = str_replace("'", "", $this->tarifaee_ana); 
      $this->fld_importe_eeana = str_replace("'", "", $this->fld_importe_eeana); 
      $this->importe_ect = str_replace("'", "", $this->importe_ect); 
      $this->tarifaee_ect = str_replace("'", "", $this->tarifaee_ect); 
      $this->importe_cr = str_replace("'", "", $this->importe_cr); 
      $this->tarifaee_cr = str_replace("'", "", $this->tarifaee_cr); 
      $this->importe_eap = str_replace("'", "", $this->importe_eap); 
      $this->tarifaee_eap = str_replace("'", "", $this->tarifaee_eap); 
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
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fld_importe_eeana = $this->fld_importe_eeana;
}
  $PagoID_ANA = ($this->pagoid_ana  == "GE") ? $PagoID_ANA = $this->pagoid  : $PagoID_ANA = $this->pagoid_ana ;

$tarifa_sql = "SELECT fld_tipo_pago, fld_ee, fld_tipo, fld_grupo FROM cat_tipoveh WHERE fld_tipo_equipo = '".$this->vehiculoid_ana ."'";
 
      $nm_select = $tarifa_sql; 
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
		$grupo = $this->rs[0][3];
		$fld_tipo = $this->rs[0][2];
		$this->cantidadeje_ana  = $this->rs[0][1];
		$this->clasevehiculo_ana  = $this->rs[0][0];
	}
	else{
	}
$tarifa_sql = "SELECT importe, ImporteEjeLigero,ImporteEjePesado FROM tarifa WHERE VehiculoID = '".$fld_tipo."' and CasetaID = ".$this->casetaid ." AND TipoPagoID = '".$PagoID_ANA."' AND TramoID = ".$this->tramoidorigen ." AND (FechaInicio <= '".$this->fechaturno ." ". $this->horaevento  ."' and FechaFin >= '".$this->fechaturno ." ". $this->horaevento ."')";
	 
      $nm_select = $tarifa_sql; 
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
		$this->importe_ana  = $this->rs[0][0];
		if($grupo =="A" || $grupo =="M"){
			
			if(strlen($this->vehiculoid_ana ) > 4){
				if($this->casetaid  !='15'){
					$this->fld_importe_eeana  = $this->rs[0][1];
					$this->tarifaee_ana  = $this->rs[0][1];
				}else{
					$this->fld_importe_eeana  = $this->rs[0][1]*$this->cantidadeje_ana ;
					$this->tarifaee_ana  = $this->fld_importe_eeana ;
					}
			}else{
				$this->tarifaee_ana  =0;
				$this->fld_importe_eeana  = 0;
			}
		}else{
			
			if(strlen($this->vehiculoid_ana ) > 4){
				$this->fld_importe_eeana  = $this->rs[0][2]*$this->cantidadeje_ana ;
				$this->tarifaee_ana  = $this->fld_importe_eeana ;
			}else{
				$this->tarifaee_ana  =0;
				$this->fld_importe_eeana =0;
				}
		}
	  }else{
		echo "No hay tarifa cargada..";
		$this->importe_ana  = 0;
		$this->fld_importe_eeana  = 0;
		$this->tarifaee_ana  = 0;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fld_importe_eeana != $this->fld_importe_eeana || (isset($bFlagRead_fld_importe_eeana) && $bFlagRead_fld_importe_eeana)))
    {
        $this->ajax_return_values_fld_importe_eeana(true);
    }
}
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
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
      if (('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) && empty($this->estatusana)){$this->estatusana = "1"; $NM_val_null[] = "estatusana";}  
      $NM_val_form['vehiculocorrecto'] = $this->vehiculocorrecto;
      $NM_val_form['pagoid_ana'] = $this->pagoid_ana;
      $NM_val_form['vehiculoid_ana'] = $this->vehiculoid_ana;
      $NM_val_form['importe_ana'] = $this->importe_ana;
      $NM_val_form['cantidadeje_ana'] = $this->cantidadeje_ana;
      $NM_val_form['tarifaee_ana'] = $this->tarifaee_ana;
      $NM_val_form['fld_importe_eeana'] = $this->fld_importe_eeana;
      $NM_val_form['consecutivo'] = $this->consecutivo;
      $NM_val_form['casetaid'] = $this->casetaid;
      $NM_val_form['fechaoperacion'] = $this->fechaoperacion;
      $NM_val_form['fechaturno'] = $this->fechaturno;
      $NM_val_form['turnoid'] = $this->turnoid;
      $NM_val_form['horaevento'] = $this->horaevento;
      $NM_val_form['tramoid'] = $this->tramoid;
      $NM_val_form['carrilid'] = $this->carrilid;
      $NM_val_form['cuerpo'] = $this->cuerpo;
      $NM_val_form['secuencial'] = $this->secuencial;
      $NM_val_form['folio'] = $this->folio;
      $NM_val_form['vehiculoid_ect'] = $this->vehiculoid_ect;
      $NM_val_form['clasevehiculo_ect'] = $this->clasevehiculo_ect;
      $NM_val_form['importe_ect'] = $this->importe_ect;
      $NM_val_form['cantidadeje_ect'] = $this->cantidadeje_ect;
      $NM_val_form['tarifaee_ect'] = $this->tarifaee_ect;
      $NM_val_form['vehiculoid_cr'] = $this->vehiculoid_cr;
      $NM_val_form['clasevehiculo_cr'] = $this->clasevehiculo_cr;
      $NM_val_form['importe_cr'] = $this->importe_cr;
      $NM_val_form['cantidadeje_cr'] = $this->cantidadeje_cr;
      $NM_val_form['tarifaee_cr'] = $this->tarifaee_cr;
      $NM_val_form['vehiculoid_eap'] = $this->vehiculoid_eap;
      $NM_val_form['clasevehiculo_eap'] = $this->clasevehiculo_eap;
      $NM_val_form['importe_eap'] = $this->importe_eap;
      $NM_val_form['cantidadeje_eap'] = $this->cantidadeje_eap;
      $NM_val_form['tarifaee_eap'] = $this->tarifaee_eap;
      $NM_val_form['pagoid'] = $this->pagoid;
      $NM_val_form['excentoid'] = $this->excentoid;
      $NM_val_form['usuarioid'] = $this->usuarioid;
      $NM_val_form['placas'] = $this->placas;
      $NM_val_form['numerotarjeta'] = $this->numerotarjeta;
      $NM_val_form['tipotarjeta'] = $this->tipotarjeta;
      $NM_val_form['fechaenvio'] = $this->fechaenvio;
      $NM_val_form['codigofacturacion'] = $this->codigofacturacion;
      $NM_val_form['clasevehiculo_ana'] = $this->clasevehiculo_ana;
      $NM_val_form['estatusana'] = $this->estatusana;
      $NM_val_form['fld_ar_sct'] = $this->fld_ar_sct;
      $NM_val_form['fechamodificadoana'] = $this->fechamodificadoana;
      $NM_val_form['eludidoextra'] = $this->eludidoextra;
      $NM_val_form['revisado'] = $this->revisado;
      $NM_val_form['fechamarcacioncr'] = $this->fechamarcacioncr;
      $NM_val_form['fechadeteccionect'] = $this->fechadeteccionect;
      $NM_val_form['fechadeteccioneap'] = $this->fechadeteccioneap;
      $NM_val_form['tramoidorigen'] = $this->tramoidorigen;
      $NM_val_form['operacionid'] = $this->operacionid;
      $NM_val_form['residente'] = $this->residente;
      $NM_val_form['video'] = $this->video;
      if ($this->consecutivo === "" || is_null($this->consecutivo))  
      { 
          $this->consecutivo = 0;
      } 
      if ($this->casetaid === "" || is_null($this->casetaid))  
      { 
          $this->casetaid = 0;
          $this->sc_force_zero[] = 'casetaid';
      } 
      if ($this->turnoid === "" || is_null($this->turnoid))  
      { 
          $this->turnoid = 0;
          $this->sc_force_zero[] = 'turnoid';
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
      if ($this->secuencial === "" || is_null($this->secuencial))  
      { 
          $this->secuencial = 0;
          $this->sc_force_zero[] = 'secuencial';
      } 
      if ($this->folio === "" || is_null($this->folio))  
      { 
          $this->folio = 0;
          $this->sc_force_zero[] = 'folio';
      } 
      if ($this->importe_ect === "" || is_null($this->importe_ect))  
      { 
          $this->importe_ect = 0;
          $this->sc_force_zero[] = 'importe_ect';
      } 
      if ($this->cantidadeje_ect === "" || is_null($this->cantidadeje_ect))  
      { 
          $this->cantidadeje_ect = 0;
          $this->sc_force_zero[] = 'cantidadeje_ect';
      } 
      if ($this->tarifaee_ect === "" || is_null($this->tarifaee_ect))  
      { 
          $this->tarifaee_ect = 0;
          $this->sc_force_zero[] = 'tarifaee_ect';
      } 
      if ($this->importe_cr === "" || is_null($this->importe_cr))  
      { 
          $this->importe_cr = 0;
          $this->sc_force_zero[] = 'importe_cr';
      } 
      if ($this->cantidadeje_cr === "" || is_null($this->cantidadeje_cr))  
      { 
          $this->cantidadeje_cr = 0;
          $this->sc_force_zero[] = 'cantidadeje_cr';
      } 
      if ($this->tarifaee_cr === "" || is_null($this->tarifaee_cr))  
      { 
          $this->tarifaee_cr = 0;
          $this->sc_force_zero[] = 'tarifaee_cr';
      } 
      if ($this->importe_eap === "" || is_null($this->importe_eap))  
      { 
          $this->importe_eap = 0;
          $this->sc_force_zero[] = 'importe_eap';
      } 
      if ($this->cantidadeje_eap === "" || is_null($this->cantidadeje_eap))  
      { 
          $this->cantidadeje_eap = 0;
          $this->sc_force_zero[] = 'cantidadeje_eap';
      } 
      if ($this->tarifaee_eap === "" || is_null($this->tarifaee_eap))  
      { 
          $this->tarifaee_eap = 0;
          $this->sc_force_zero[] = 'tarifaee_eap';
      } 
      if ($this->excentoid === "" || is_null($this->excentoid))  
      { 
          $this->excentoid = 0;
          $this->sc_force_zero[] = 'excentoid';
      } 
      if ($this->usuarioid === "" || is_null($this->usuarioid))  
      { 
          $this->usuarioid = 0;
          $this->sc_force_zero[] = 'usuarioid';
      } 
      if ($this->importe_ana === "" || is_null($this->importe_ana))  
      { 
          $this->importe_ana = 0;
          $this->sc_force_zero[] = 'importe_ana';
      } 
      if ($this->estatusana === "" || is_null($this->estatusana))  
      { 
          $this->estatusana = 0;
          $this->sc_force_zero[] = 'estatusana';
      } 
      if ($this->cantidadeje_ana === "" || is_null($this->cantidadeje_ana))  
      { 
          $this->cantidadeje_ana = 0;
          $this->sc_force_zero[] = 'cantidadeje_ana';
      } 
      if ($this->tarifaee_ana === "" || is_null($this->tarifaee_ana))  
      { 
          $this->tarifaee_ana = 0;
          $this->sc_force_zero[] = 'tarifaee_ana';
      } 
      if ($this->eludidoextra === "" || is_null($this->eludidoextra))  
      { 
          $this->eludidoextra = 0;
          $this->sc_force_zero[] = 'eludidoextra';
      } 
      if ($this->revisado === "" || is_null($this->revisado))  
      { 
          $this->revisado = 0;
          $this->sc_force_zero[] = 'revisado';
      } 
      if ($this->tramoidorigen === "" || is_null($this->tramoidorigen))  
      { 
          $this->tramoidorigen = 0;
          $this->sc_force_zero[] = 'tramoidorigen';
      } 
      if ($this->operacionid === "" || is_null($this->operacionid))  
      { 
          $this->operacionid = 0;
          $this->sc_force_zero[] = 'operacionid';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
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
          if ($this->horaevento == "")  
          { 
              $this->horaevento = "null"; 
              $NM_val_null[] = "horaevento";
          } 
          $this->cuerpo_before_qstr = $this->cuerpo;
          $this->cuerpo = substr($this->Db->qstr($this->cuerpo), 1, -1); 
          if ($this->cuerpo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cuerpo = "null"; 
              $NM_val_null[] = "cuerpo";
          } 
          $this->vehiculoid_ect_before_qstr = $this->vehiculoid_ect;
          $this->vehiculoid_ect = substr($this->Db->qstr($this->vehiculoid_ect), 1, -1); 
          if ($this->vehiculoid_ect == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->vehiculoid_ect = "null"; 
              $NM_val_null[] = "vehiculoid_ect";
          } 
          $this->clasevehiculo_ect_before_qstr = $this->clasevehiculo_ect;
          $this->clasevehiculo_ect = substr($this->Db->qstr($this->clasevehiculo_ect), 1, -1); 
          if ($this->clasevehiculo_ect == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->clasevehiculo_ect = "null"; 
              $NM_val_null[] = "clasevehiculo_ect";
          } 
          $this->vehiculoid_cr_before_qstr = $this->vehiculoid_cr;
          $this->vehiculoid_cr = substr($this->Db->qstr($this->vehiculoid_cr), 1, -1); 
          if ($this->vehiculoid_cr == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->vehiculoid_cr = "null"; 
              $NM_val_null[] = "vehiculoid_cr";
          } 
          $this->clasevehiculo_cr_before_qstr = $this->clasevehiculo_cr;
          $this->clasevehiculo_cr = substr($this->Db->qstr($this->clasevehiculo_cr), 1, -1); 
          if ($this->clasevehiculo_cr == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->clasevehiculo_cr = "null"; 
              $NM_val_null[] = "clasevehiculo_cr";
          } 
          $this->vehiculoid_eap_before_qstr = $this->vehiculoid_eap;
          $this->vehiculoid_eap = substr($this->Db->qstr($this->vehiculoid_eap), 1, -1); 
          if ($this->vehiculoid_eap == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->vehiculoid_eap = "null"; 
              $NM_val_null[] = "vehiculoid_eap";
          } 
          $this->clasevehiculo_eap_before_qstr = $this->clasevehiculo_eap;
          $this->clasevehiculo_eap = substr($this->Db->qstr($this->clasevehiculo_eap), 1, -1); 
          if ($this->clasevehiculo_eap == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->clasevehiculo_eap = "null"; 
              $NM_val_null[] = "clasevehiculo_eap";
          } 
          $this->pagoid_before_qstr = $this->pagoid;
          $this->pagoid = substr($this->Db->qstr($this->pagoid), 1, -1); 
          if ($this->pagoid == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pagoid = "null"; 
              $NM_val_null[] = "pagoid";
          } 
          $this->placas_before_qstr = $this->placas;
          $this->placas = substr($this->Db->qstr($this->placas), 1, -1); 
          if ($this->placas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->placas = "null"; 
              $NM_val_null[] = "placas";
          } 
          $this->numerotarjeta_before_qstr = $this->numerotarjeta;
          $this->numerotarjeta = substr($this->Db->qstr($this->numerotarjeta), 1, -1); 
          if ($this->numerotarjeta == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numerotarjeta = "null"; 
              $NM_val_null[] = "numerotarjeta";
          } 
          $this->tipotarjeta_before_qstr = $this->tipotarjeta;
          $this->tipotarjeta = substr($this->Db->qstr($this->tipotarjeta), 1, -1); 
          if ($this->tipotarjeta == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipotarjeta = "null"; 
              $NM_val_null[] = "tipotarjeta";
          } 
          if ($this->fechaenvio == "")  
          { 
              $this->fechaenvio = "null"; 
              $NM_val_null[] = "fechaenvio";
          } 
          $this->codigofacturacion_before_qstr = $this->codigofacturacion;
          $this->codigofacturacion = substr($this->Db->qstr($this->codigofacturacion), 1, -1); 
          if ($this->codigofacturacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigofacturacion = "null"; 
              $NM_val_null[] = "codigofacturacion";
          } 
          $this->vehiculoid_ana_before_qstr = $this->vehiculoid_ana;
          $this->vehiculoid_ana = substr($this->Db->qstr($this->vehiculoid_ana), 1, -1); 
          if ($this->vehiculoid_ana == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->vehiculoid_ana = "null"; 
              $NM_val_null[] = "vehiculoid_ana";
          } 
          $this->clasevehiculo_ana_before_qstr = $this->clasevehiculo_ana;
          $this->clasevehiculo_ana = substr($this->Db->qstr($this->clasevehiculo_ana), 1, -1); 
          if ($this->clasevehiculo_ana == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->clasevehiculo_ana = "null"; 
              $NM_val_null[] = "clasevehiculo_ana";
          } 
          $this->pagoid_ana_before_qstr = $this->pagoid_ana;
          $this->pagoid_ana = substr($this->Db->qstr($this->pagoid_ana), 1, -1); 
          if ($this->pagoid_ana == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pagoid_ana = "null"; 
              $NM_val_null[] = "pagoid_ana";
          } 
          $this->fld_ar_sct_before_qstr = $this->fld_ar_sct;
          $this->fld_ar_sct = substr($this->Db->qstr($this->fld_ar_sct), 1, -1); 
          if ($this->fld_ar_sct == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fld_ar_sct = "null"; 
              $NM_val_null[] = "fld_ar_sct";
          } 
          if ($this->fechamodificadoana == "")  
          { 
              $this->fechamodificadoana = "null"; 
              $NM_val_null[] = "fechamodificadoana";
          } 
          if ($this->fechamarcacioncr == "")  
          { 
              $this->fechamarcacioncr = "null"; 
              $NM_val_null[] = "fechamarcacioncr";
          } 
          if ($this->fechadeteccionect == "")  
          { 
              $this->fechadeteccionect = "null"; 
              $NM_val_null[] = "fechadeteccionect";
          } 
          if ($this->fechadeteccioneap == "")  
          { 
              $this->fechadeteccioneap = "null"; 
              $NM_val_null[] = "fechadeteccioneap";
          } 
          $this->residente_before_qstr = $this->residente;
          $this->residente = substr($this->Db->qstr($this->residente), 1, -1); 
          if ($this->residente == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->residente = "null"; 
              $NM_val_null[] = "residente";
          } 
          $this->video_before_qstr = $this->video;
          $this->video = substr($this->Db->qstr($this->video), 1, -1); 
          if ($this->video == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->video = "null"; 
              $NM_val_null[] = "video";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['decimal_db'] == ",") 
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
                 form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $aDoNotUpdate = array();
              $this->fechamodificadoana =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->fechamodificadoana_hora =  date('H') . ":" . date('i') . ":" . date('s');
              $NM_val_form['fechamodificadoana'] = $this->fechamodificadoana;
              $this->NM_ajax_changed['fechamodificadoana'] = true;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "VehiculoID_ANA = '$this->vehiculoid_ana', PagoID_ANA = '$this->pagoid_ana'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "VehiculoID_ANA = '$this->vehiculoid_ana', PagoID_ANA = '$this->pagoid_ana'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "VehiculoID_ANA = '$this->vehiculoid_ana', PagoID_ANA = '$this->pagoid_ana'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "VehiculoID_ANA = '$this->vehiculoid_ana', PagoID_ANA = '$this->pagoid_ana'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "VehiculoID_ANA = '$this->vehiculoid_ana', PagoID_ANA = '$this->pagoid_ana'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "VehiculoID_ANA = '$this->vehiculoid_ana', PagoID_ANA = '$this->pagoid_ana'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "VehiculoID_ANA = '$this->vehiculoid_ana', PagoID_ANA = '$this->pagoid_ana'"; 
              } 
              if (isset($NM_val_form['casetaid']) && $NM_val_form['casetaid'] != $this->nmgp_dados_select['casetaid']) 
              { 
                  $SC_fields_update[] = "CasetaID = $this->casetaid"; 
              } 
              if (isset($NM_val_form['fechaoperacion']) && $NM_val_form['fechaoperacion'] != $this->nmgp_dados_select['fechaoperacion']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "FechaOperacion = #$this->fechaoperacion#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "FechaOperacion = EXTEND('" . $this->fechaoperacion . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "FechaOperacion = " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['fechaturno']) && $NM_val_form['fechaturno'] != $this->nmgp_dados_select['fechaturno']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "FechaTurno = #$this->fechaturno#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "FechaTurno = EXTEND('" . $this->fechaturno . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "FechaTurno = " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['turnoid']) && $NM_val_form['turnoid'] != $this->nmgp_dados_select['turnoid']) 
              { 
                  $SC_fields_update[] = "TurnoID = $this->turnoid"; 
              } 
              if (isset($NM_val_form['horaevento']) && $NM_val_form['horaevento'] != $this->nmgp_dados_select['horaevento']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "HoraEvento = #$this->horaevento#"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "HoraEvento = " . $this->Ini->date_delim . $this->horaevento . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['tramoid']) && $NM_val_form['tramoid'] != $this->nmgp_dados_select['tramoid']) 
              { 
                  $SC_fields_update[] = "TramoID = $this->tramoid"; 
              } 
              if (isset($NM_val_form['carrilid']) && $NM_val_form['carrilid'] != $this->nmgp_dados_select['carrilid']) 
              { 
                  $SC_fields_update[] = "CarrilID = $this->carrilid"; 
              } 
              if (isset($NM_val_form['cuerpo']) && $NM_val_form['cuerpo'] != $this->nmgp_dados_select['cuerpo']) 
              { 
                  $SC_fields_update[] = "Cuerpo = '$this->cuerpo'"; 
              } 
              if (isset($NM_val_form['secuencial']) && $NM_val_form['secuencial'] != $this->nmgp_dados_select['secuencial']) 
              { 
                  $SC_fields_update[] = "Secuencial = $this->secuencial"; 
              } 
              if (isset($NM_val_form['folio']) && $NM_val_form['folio'] != $this->nmgp_dados_select['folio']) 
              { 
                  $SC_fields_update[] = "Folio = $this->folio"; 
              } 
              if (isset($NM_val_form['vehiculoid_ect']) && $NM_val_form['vehiculoid_ect'] != $this->nmgp_dados_select['vehiculoid_ect']) 
              { 
                  $SC_fields_update[] = "VehiculoID_ECT = '$this->vehiculoid_ect'"; 
              } 
              if (isset($NM_val_form['clasevehiculo_ect']) && $NM_val_form['clasevehiculo_ect'] != $this->nmgp_dados_select['clasevehiculo_ect']) 
              { 
                  $SC_fields_update[] = "ClaseVehiculo_ECT = '$this->clasevehiculo_ect'"; 
              } 
              if (isset($NM_val_form['importe_ect']) && $NM_val_form['importe_ect'] != $this->nmgp_dados_select['importe_ect']) 
              { 
                  $SC_fields_update[] = "Importe_ECT = $this->importe_ect"; 
              } 
              if (isset($NM_val_form['cantidadeje_ect']) && $NM_val_form['cantidadeje_ect'] != $this->nmgp_dados_select['cantidadeje_ect']) 
              { 
                  $SC_fields_update[] = "CantidadEje_ECT = $this->cantidadeje_ect"; 
              } 
              if (isset($NM_val_form['tarifaee_ect']) && $NM_val_form['tarifaee_ect'] != $this->nmgp_dados_select['tarifaee_ect']) 
              { 
                  $SC_fields_update[] = "TarifaEE_ECT = $this->tarifaee_ect"; 
              } 
              if (isset($NM_val_form['vehiculoid_cr']) && $NM_val_form['vehiculoid_cr'] != $this->nmgp_dados_select['vehiculoid_cr']) 
              { 
                  $SC_fields_update[] = "VehiculoID_CR = '$this->vehiculoid_cr'"; 
              } 
              if (isset($NM_val_form['clasevehiculo_cr']) && $NM_val_form['clasevehiculo_cr'] != $this->nmgp_dados_select['clasevehiculo_cr']) 
              { 
                  $SC_fields_update[] = "ClaseVehiculo_CR = '$this->clasevehiculo_cr'"; 
              } 
              if (isset($NM_val_form['importe_cr']) && $NM_val_form['importe_cr'] != $this->nmgp_dados_select['importe_cr']) 
              { 
                  $SC_fields_update[] = "Importe_CR = $this->importe_cr"; 
              } 
              if (isset($NM_val_form['cantidadeje_cr']) && $NM_val_form['cantidadeje_cr'] != $this->nmgp_dados_select['cantidadeje_cr']) 
              { 
                  $SC_fields_update[] = "CantidadEje_CR = $this->cantidadeje_cr"; 
              } 
              if (isset($NM_val_form['tarifaee_cr']) && $NM_val_form['tarifaee_cr'] != $this->nmgp_dados_select['tarifaee_cr']) 
              { 
                  $SC_fields_update[] = "TarifaEE_CR = $this->tarifaee_cr"; 
              } 
              if (isset($NM_val_form['vehiculoid_eap']) && $NM_val_form['vehiculoid_eap'] != $this->nmgp_dados_select['vehiculoid_eap']) 
              { 
                  $SC_fields_update[] = "VehiculoID_EAP = '$this->vehiculoid_eap'"; 
              } 
              if (isset($NM_val_form['clasevehiculo_eap']) && $NM_val_form['clasevehiculo_eap'] != $this->nmgp_dados_select['clasevehiculo_eap']) 
              { 
                  $SC_fields_update[] = "ClaseVehiculo_EAP = '$this->clasevehiculo_eap'"; 
              } 
              if (isset($NM_val_form['importe_eap']) && $NM_val_form['importe_eap'] != $this->nmgp_dados_select['importe_eap']) 
              { 
                  $SC_fields_update[] = "Importe_EAP = $this->importe_eap"; 
              } 
              if (isset($NM_val_form['cantidadeje_eap']) && $NM_val_form['cantidadeje_eap'] != $this->nmgp_dados_select['cantidadeje_eap']) 
              { 
                  $SC_fields_update[] = "CantidadEje_EAP = $this->cantidadeje_eap"; 
              } 
              if (isset($NM_val_form['tarifaee_eap']) && $NM_val_form['tarifaee_eap'] != $this->nmgp_dados_select['tarifaee_eap']) 
              { 
                  $SC_fields_update[] = "TarifaEE_EAP = $this->tarifaee_eap"; 
              } 
              if (isset($NM_val_form['pagoid']) && $NM_val_form['pagoid'] != $this->nmgp_dados_select['pagoid']) 
              { 
                  $SC_fields_update[] = "PagoID = '$this->pagoid'"; 
              } 
              if (isset($NM_val_form['excentoid']) && $NM_val_form['excentoid'] != $this->nmgp_dados_select['excentoid']) 
              { 
                  $SC_fields_update[] = "ExcentoID = $this->excentoid"; 
              } 
              if (isset($NM_val_form['usuarioid']) && $NM_val_form['usuarioid'] != $this->nmgp_dados_select['usuarioid']) 
              { 
                  $SC_fields_update[] = "UsuarioID = $this->usuarioid"; 
              } 
              if (isset($NM_val_form['placas']) && $NM_val_form['placas'] != $this->nmgp_dados_select['placas']) 
              { 
                  $SC_fields_update[] = "Placas = '$this->placas'"; 
              } 
              if (isset($NM_val_form['numerotarjeta']) && $NM_val_form['numerotarjeta'] != $this->nmgp_dados_select['numerotarjeta']) 
              { 
                  $SC_fields_update[] = "NumeroTarjeta = '$this->numerotarjeta'"; 
              } 
              if (isset($NM_val_form['tipotarjeta']) && $NM_val_form['tipotarjeta'] != $this->nmgp_dados_select['tipotarjeta']) 
              { 
                  $SC_fields_update[] = "TipoTarjeta = '$this->tipotarjeta'"; 
              } 
              if (isset($NM_val_form['fechaenvio']) && $NM_val_form['fechaenvio'] != $this->nmgp_dados_select['fechaenvio']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "FechaEnvio = #$this->fechaenvio#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "FechaEnvio = EXTEND('" . $this->fechaenvio . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "FechaEnvio = " . $this->Ini->date_delim . $this->fechaenvio . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['codigofacturacion']) && $NM_val_form['codigofacturacion'] != $this->nmgp_dados_select['codigofacturacion']) 
              { 
                  $SC_fields_update[] = "CodigoFacturacion = '$this->codigofacturacion'"; 
              } 
              if (isset($NM_val_form['clasevehiculo_ana']) && $NM_val_form['clasevehiculo_ana'] != $this->nmgp_dados_select['clasevehiculo_ana']) 
              { 
                  $SC_fields_update[] = "ClaseVehiculo_ANA = '$this->clasevehiculo_ana'"; 
              } 
              if (isset($NM_val_form['importe_ana']) && $NM_val_form['importe_ana'] != $this->nmgp_dados_select['importe_ana']) 
              { 
                  $SC_fields_update[] = "Importe_ANA = $this->importe_ana"; 
              } 
              if (isset($NM_val_form['estatusana']) && $NM_val_form['estatusana'] != $this->nmgp_dados_select['estatusana']) 
              { 
                  $SC_fields_update[] = "EstatusANA = $this->estatusana"; 
              } 
              if (isset($NM_val_form['fld_ar_sct']) && $NM_val_form['fld_ar_sct'] != $this->nmgp_dados_select['fld_ar_sct']) 
              { 
                  $SC_fields_update[] = "fld_ar_sct = '$this->fld_ar_sct'"; 
              } 
              if (isset($NM_val_form['cantidadeje_ana']) && $NM_val_form['cantidadeje_ana'] != $this->nmgp_dados_select['cantidadeje_ana']) 
              { 
                  $SC_fields_update[] = "CantidadEje_ANA = $this->cantidadeje_ana"; 
              } 
              if (isset($NM_val_form['tarifaee_ana']) && $NM_val_form['tarifaee_ana'] != $this->nmgp_dados_select['tarifaee_ana']) 
              { 
                  $SC_fields_update[] = "TarifaEE_ANA = $this->tarifaee_ana"; 
              } 
              if (isset($NM_val_form['fechamodificadoana']) && $NM_val_form['fechamodificadoana'] != $this->nmgp_dados_select['fechamodificadoana']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "FechaModificadoANA = #$this->fechamodificadoana#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "FechaModificadoANA = EXTEND('" . $this->fechamodificadoana . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "FechaModificadoANA = " . $this->Ini->date_delim . $this->fechamodificadoana . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['eludidoextra']) && $NM_val_form['eludidoextra'] != $this->nmgp_dados_select['eludidoextra']) 
              { 
                  $SC_fields_update[] = "EludidoExtra = $this->eludidoextra"; 
              } 
              if (isset($NM_val_form['revisado']) && $NM_val_form['revisado'] != $this->nmgp_dados_select['revisado']) 
              { 
                  $SC_fields_update[] = "Revisado = $this->revisado"; 
              } 
              if (isset($NM_val_form['fechamarcacioncr']) && $NM_val_form['fechamarcacioncr'] != $this->nmgp_dados_select['fechamarcacioncr']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "FechaMarcacionCR = #$this->fechamarcacioncr#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "FechaMarcacionCR = EXTEND('" . $this->fechamarcacioncr . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "FechaMarcacionCR = " . $this->Ini->date_delim . $this->fechamarcacioncr . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['fechadeteccionect']) && $NM_val_form['fechadeteccionect'] != $this->nmgp_dados_select['fechadeteccionect']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "FechaDeteccionECT = #$this->fechadeteccionect#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "FechaDeteccionECT = EXTEND('" . $this->fechadeteccionect . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "FechaDeteccionECT = " . $this->Ini->date_delim . $this->fechadeteccionect . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['fechadeteccioneap']) && $NM_val_form['fechadeteccioneap'] != $this->nmgp_dados_select['fechadeteccioneap']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "FechaDeteccionEAP = #$this->fechadeteccioneap#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "FechaDeteccionEAP = EXTEND('" . $this->fechadeteccioneap . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "FechaDeteccionEAP = " . $this->Ini->date_delim . $this->fechadeteccioneap . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['tramoidorigen']) && $NM_val_form['tramoidorigen'] != $this->nmgp_dados_select['tramoidorigen']) 
              { 
                  $SC_fields_update[] = "TramoIDOrigen = $this->tramoidorigen"; 
              } 
              if (isset($NM_val_form['operacionid']) && $NM_val_form['operacionid'] != $this->nmgp_dados_select['operacionid']) 
              { 
                  $SC_fields_update[] = "OperacionID = $this->operacionid"; 
              } 
              if (isset($NM_val_form['residente']) && $NM_val_form['residente'] != $this->nmgp_dados_select['residente']) 
              { 
                  $SC_fields_update[] = "Residente = '$this->residente'"; 
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
                                  form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->cuerpo = $this->cuerpo_before_qstr;
              $this->vehiculoid_ect = $this->vehiculoid_ect_before_qstr;
              $this->clasevehiculo_ect = $this->clasevehiculo_ect_before_qstr;
              $this->vehiculoid_cr = $this->vehiculoid_cr_before_qstr;
              $this->clasevehiculo_cr = $this->clasevehiculo_cr_before_qstr;
              $this->vehiculoid_eap = $this->vehiculoid_eap_before_qstr;
              $this->clasevehiculo_eap = $this->clasevehiculo_eap_before_qstr;
              $this->pagoid = $this->pagoid_before_qstr;
              $this->placas = $this->placas_before_qstr;
              $this->numerotarjeta = $this->numerotarjeta_before_qstr;
              $this->tipotarjeta = $this->tipotarjeta_before_qstr;
              $this->codigofacturacion = $this->codigofacturacion_before_qstr;
              $this->vehiculoid_ana = $this->vehiculoid_ana_before_qstr;
              $this->clasevehiculo_ana = $this->clasevehiculo_ana_before_qstr;
              $this->pagoid_ana = $this->pagoid_ana_before_qstr;
              $this->fld_ar_sct = $this->fld_ar_sct_before_qstr;
              $this->residente = $this->residente_before_qstr;
              $this->video = $this->video_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['consecutivo'])) { $this->consecutivo = $NM_val_form['consecutivo']; }
              elseif (isset($this->consecutivo)) { $this->nm_limpa_alfa($this->consecutivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['vehiculoid_ana'])) { $this->vehiculoid_ana = $NM_val_form['vehiculoid_ana']; }
              elseif (isset($this->vehiculoid_ana)) { $this->nm_limpa_alfa($this->vehiculoid_ana); }
              if     (isset($NM_val_form) && isset($NM_val_form['importe_ana'])) { $this->importe_ana = $NM_val_form['importe_ana']; }
              elseif (isset($this->importe_ana)) { $this->nm_limpa_alfa($this->importe_ana); }
              if     (isset($NM_val_form) && isset($NM_val_form['pagoid_ana'])) { $this->pagoid_ana = $NM_val_form['pagoid_ana']; }
              elseif (isset($this->pagoid_ana)) { $this->nm_limpa_alfa($this->pagoid_ana); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidadeje_ana'])) { $this->cantidadeje_ana = $NM_val_form['cantidadeje_ana']; }
              elseif (isset($this->cantidadeje_ana)) { $this->nm_limpa_alfa($this->cantidadeje_ana); }
              if     (isset($NM_val_form) && isset($NM_val_form['tarifaee_ana'])) { $this->tarifaee_ana = $NM_val_form['tarifaee_ana']; }
              elseif (isset($this->tarifaee_ana)) { $this->nm_limpa_alfa($this->tarifaee_ana); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('vehiculocorrecto', 'pagoid_ana', 'vehiculoid_ana', 'importe_ana', 'cantidadeje_ana', 'tarifaee_ana', 'fld_importe_eeana'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
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
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente) VALUES ($this->consecutivo, $this->casetaid, #$this->fechaoperacion#, #$this->fechaturno#, $this->turnoid, #$this->horaevento#, $this->tramoid, $this->carrilid, '$this->cuerpo', $this->secuencial, $this->folio, '$this->vehiculoid_ect', '$this->clasevehiculo_ect', $this->importe_ect, $this->cantidadeje_ect, $this->tarifaee_ect, '$this->vehiculoid_cr', '$this->clasevehiculo_cr', $this->importe_cr, $this->cantidadeje_cr, $this->tarifaee_cr, '$this->vehiculoid_eap', '$this->clasevehiculo_eap', $this->importe_eap, $this->cantidadeje_eap, $this->tarifaee_eap, '$this->pagoid', $this->excentoid, $this->usuarioid, '$this->placas', '$this->numerotarjeta', '$this->tipotarjeta', #$this->fechaenvio#, '$this->codigofacturacion', '$this->vehiculoid_ana', '$this->clasevehiculo_ana', $this->importe_ana, '$this->pagoid_ana', $this->estatusana, '$this->fld_ar_sct', $this->cantidadeje_ana, $this->tarifaee_ana, #$this->fechamodificadoana#, $this->eludidoextra, $this->revisado, #$this->fechamarcacioncr#, #$this->fechadeteccionect#, #$this->fechadeteccioneap#, $this->tramoidorigen, $this->operacionid, '$this->residente')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente) VALUES (" . $NM_seq_auto . "$this->consecutivo, $this->casetaid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", $this->turnoid, " . $this->Ini->date_delim . $this->horaevento . $this->Ini->date_delim1 . ", $this->tramoid, $this->carrilid, '$this->cuerpo', $this->secuencial, $this->folio, '$this->vehiculoid_ect', '$this->clasevehiculo_ect', $this->importe_ect, $this->cantidadeje_ect, $this->tarifaee_ect, '$this->vehiculoid_cr', '$this->clasevehiculo_cr', $this->importe_cr, $this->cantidadeje_cr, $this->tarifaee_cr, '$this->vehiculoid_eap', '$this->clasevehiculo_eap', $this->importe_eap, $this->cantidadeje_eap, $this->tarifaee_eap, '$this->pagoid', $this->excentoid, $this->usuarioid, '$this->placas', '$this->numerotarjeta', '$this->tipotarjeta', " . $this->Ini->date_delim . $this->fechaenvio . $this->Ini->date_delim1 . ", '$this->codigofacturacion', '$this->vehiculoid_ana', '$this->clasevehiculo_ana', $this->importe_ana, '$this->pagoid_ana', $this->estatusana, '$this->fld_ar_sct', $this->cantidadeje_ana, $this->tarifaee_ana, " . $this->Ini->date_delim . $this->fechamodificadoana . $this->Ini->date_delim1 . ", $this->eludidoextra, $this->revisado, " . $this->Ini->date_delim . $this->fechamarcacioncr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccionect . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccioneap . $this->Ini->date_delim1 . ", $this->tramoidorigen, $this->operacionid, '$this->residente')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente) VALUES (" . $NM_seq_auto . "$this->consecutivo, $this->casetaid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", $this->turnoid, " . $this->Ini->date_delim . $this->horaevento . $this->Ini->date_delim1 . ", $this->tramoid, $this->carrilid, '$this->cuerpo', $this->secuencial, $this->folio, '$this->vehiculoid_ect', '$this->clasevehiculo_ect', $this->importe_ect, $this->cantidadeje_ect, $this->tarifaee_ect, '$this->vehiculoid_cr', '$this->clasevehiculo_cr', $this->importe_cr, $this->cantidadeje_cr, $this->tarifaee_cr, '$this->vehiculoid_eap', '$this->clasevehiculo_eap', $this->importe_eap, $this->cantidadeje_eap, $this->tarifaee_eap, '$this->pagoid', $this->excentoid, $this->usuarioid, '$this->placas', '$this->numerotarjeta', '$this->tipotarjeta', " . $this->Ini->date_delim . $this->fechaenvio . $this->Ini->date_delim1 . ", '$this->codigofacturacion', '$this->vehiculoid_ana', '$this->clasevehiculo_ana', $this->importe_ana, '$this->pagoid_ana', $this->estatusana, '$this->fld_ar_sct', $this->cantidadeje_ana, $this->tarifaee_ana, " . $this->Ini->date_delim . $this->fechamodificadoana . $this->Ini->date_delim1 . ", $this->eludidoextra, $this->revisado, " . $this->Ini->date_delim . $this->fechamarcacioncr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccionect . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccioneap . $this->Ini->date_delim1 . ", $this->tramoidorigen, $this->operacionid, '$this->residente')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente) VALUES (" . $NM_seq_auto . "$this->consecutivo, $this->casetaid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", $this->turnoid, " . $this->Ini->date_delim . $this->horaevento . $this->Ini->date_delim1 . ", $this->tramoid, $this->carrilid, '$this->cuerpo', $this->secuencial, $this->folio, '$this->vehiculoid_ect', '$this->clasevehiculo_ect', $this->importe_ect, $this->cantidadeje_ect, $this->tarifaee_ect, '$this->vehiculoid_cr', '$this->clasevehiculo_cr', $this->importe_cr, $this->cantidadeje_cr, $this->tarifaee_cr, '$this->vehiculoid_eap', '$this->clasevehiculo_eap', $this->importe_eap, $this->cantidadeje_eap, $this->tarifaee_eap, '$this->pagoid', $this->excentoid, $this->usuarioid, '$this->placas', '$this->numerotarjeta', '$this->tipotarjeta', " . $this->Ini->date_delim . $this->fechaenvio . $this->Ini->date_delim1 . ", '$this->codigofacturacion', '$this->vehiculoid_ana', '$this->clasevehiculo_ana', $this->importe_ana, '$this->pagoid_ana', $this->estatusana, '$this->fld_ar_sct', $this->cantidadeje_ana, $this->tarifaee_ana, " . $this->Ini->date_delim . $this->fechamodificadoana . $this->Ini->date_delim1 . ", $this->eludidoextra, $this->revisado, " . $this->Ini->date_delim . $this->fechamarcacioncr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccionect . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccioneap . $this->Ini->date_delim1 . ", $this->tramoidorigen, $this->operacionid, '$this->residente')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente) VALUES (" . $NM_seq_auto . "$this->consecutivo, $this->casetaid, EXTEND('$this->fechaoperacion', YEAR TO DAY), EXTEND('$this->fechaturno', YEAR TO DAY), $this->turnoid, " . $this->Ini->date_delim . $this->horaevento . $this->Ini->date_delim1 . ", $this->tramoid, $this->carrilid, '$this->cuerpo', $this->secuencial, $this->folio, '$this->vehiculoid_ect', '$this->clasevehiculo_ect', $this->importe_ect, $this->cantidadeje_ect, $this->tarifaee_ect, '$this->vehiculoid_cr', '$this->clasevehiculo_cr', $this->importe_cr, $this->cantidadeje_cr, $this->tarifaee_cr, '$this->vehiculoid_eap', '$this->clasevehiculo_eap', $this->importe_eap, $this->cantidadeje_eap, $this->tarifaee_eap, '$this->pagoid', $this->excentoid, $this->usuarioid, '$this->placas', '$this->numerotarjeta', '$this->tipotarjeta', EXTEND('$this->fechaenvio', YEAR TO DAY), '$this->codigofacturacion', '$this->vehiculoid_ana', '$this->clasevehiculo_ana', $this->importe_ana, '$this->pagoid_ana', $this->estatusana, '$this->fld_ar_sct', $this->cantidadeje_ana, $this->tarifaee_ana, EXTEND('$this->fechamodificadoana', YEAR TO FRACTION), $this->eludidoextra, $this->revisado, EXTEND('$this->fechamarcacioncr', YEAR TO FRACTION), EXTEND('$this->fechadeteccionect', YEAR TO FRACTION), EXTEND('$this->fechadeteccioneap', YEAR TO FRACTION), $this->tramoidorigen, $this->operacionid, '$this->residente')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente) VALUES (" . $NM_seq_auto . "$this->consecutivo, $this->casetaid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", $this->turnoid, " . $this->Ini->date_delim . $this->horaevento . $this->Ini->date_delim1 . ", $this->tramoid, $this->carrilid, '$this->cuerpo', $this->secuencial, $this->folio, '$this->vehiculoid_ect', '$this->clasevehiculo_ect', $this->importe_ect, $this->cantidadeje_ect, $this->tarifaee_ect, '$this->vehiculoid_cr', '$this->clasevehiculo_cr', $this->importe_cr, $this->cantidadeje_cr, $this->tarifaee_cr, '$this->vehiculoid_eap', '$this->clasevehiculo_eap', $this->importe_eap, $this->cantidadeje_eap, $this->tarifaee_eap, '$this->pagoid', $this->excentoid, $this->usuarioid, '$this->placas', '$this->numerotarjeta', '$this->tipotarjeta', " . $this->Ini->date_delim . $this->fechaenvio . $this->Ini->date_delim1 . ", '$this->codigofacturacion', '$this->vehiculoid_ana', '$this->clasevehiculo_ana', $this->importe_ana, '$this->pagoid_ana', $this->estatusana, '$this->fld_ar_sct', $this->cantidadeje_ana, $this->tarifaee_ana, " . $this->Ini->date_delim . $this->fechamodificadoana . $this->Ini->date_delim1 . ", $this->eludidoextra, $this->revisado, " . $this->Ini->date_delim . $this->fechamarcacioncr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccionect . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccioneap . $this->Ini->date_delim1 . ", $this->tramoidorigen, $this->operacionid, '$this->residente')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente) VALUES (" . $NM_seq_auto . "$this->consecutivo, $this->casetaid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", $this->turnoid, " . $this->Ini->date_delim . $this->horaevento . $this->Ini->date_delim1 . ", $this->tramoid, $this->carrilid, '$this->cuerpo', $this->secuencial, $this->folio, '$this->vehiculoid_ect', '$this->clasevehiculo_ect', $this->importe_ect, $this->cantidadeje_ect, $this->tarifaee_ect, '$this->vehiculoid_cr', '$this->clasevehiculo_cr', $this->importe_cr, $this->cantidadeje_cr, $this->tarifaee_cr, '$this->vehiculoid_eap', '$this->clasevehiculo_eap', $this->importe_eap, $this->cantidadeje_eap, $this->tarifaee_eap, '$this->pagoid', $this->excentoid, $this->usuarioid, '$this->placas', '$this->numerotarjeta', '$this->tipotarjeta', " . $this->Ini->date_delim . $this->fechaenvio . $this->Ini->date_delim1 . ", '$this->codigofacturacion', '$this->vehiculoid_ana', '$this->clasevehiculo_ana', $this->importe_ana, '$this->pagoid_ana', $this->estatusana, '$this->fld_ar_sct', $this->cantidadeje_ana, $this->tarifaee_ana, " . $this->Ini->date_delim . $this->fechamodificadoana . $this->Ini->date_delim1 . ", $this->eludidoextra, $this->revisado, " . $this->Ini->date_delim . $this->fechamarcacioncr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccionect . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccioneap . $this->Ini->date_delim1 . ", $this->tramoidorigen, $this->operacionid, '$this->residente')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente) VALUES (" . $NM_seq_auto . "$this->consecutivo, $this->casetaid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", $this->turnoid, " . $this->Ini->date_delim . $this->horaevento . $this->Ini->date_delim1 . ", $this->tramoid, $this->carrilid, '$this->cuerpo', $this->secuencial, $this->folio, '$this->vehiculoid_ect', '$this->clasevehiculo_ect', $this->importe_ect, $this->cantidadeje_ect, $this->tarifaee_ect, '$this->vehiculoid_cr', '$this->clasevehiculo_cr', $this->importe_cr, $this->cantidadeje_cr, $this->tarifaee_cr, '$this->vehiculoid_eap', '$this->clasevehiculo_eap', $this->importe_eap, $this->cantidadeje_eap, $this->tarifaee_eap, '$this->pagoid', $this->excentoid, $this->usuarioid, '$this->placas', '$this->numerotarjeta', '$this->tipotarjeta', " . $this->Ini->date_delim . $this->fechaenvio . $this->Ini->date_delim1 . ", '$this->codigofacturacion', '$this->vehiculoid_ana', '$this->clasevehiculo_ana', $this->importe_ana, '$this->pagoid_ana', $this->estatusana, '$this->fld_ar_sct', $this->cantidadeje_ana, $this->tarifaee_ana, " . $this->Ini->date_delim . $this->fechamodificadoana . $this->Ini->date_delim1 . ", $this->eludidoextra, $this->revisado, " . $this->Ini->date_delim . $this->fechamarcacioncr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccionect . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccioneap . $this->Ini->date_delim1 . ", $this->tramoidorigen, $this->operacionid, '$this->residente')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente) VALUES (" . $NM_seq_auto . "$this->consecutivo, $this->casetaid, " . $this->Ini->date_delim . $this->fechaoperacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechaturno . $this->Ini->date_delim1 . ", $this->turnoid, " . $this->Ini->date_delim . $this->horaevento . $this->Ini->date_delim1 . ", $this->tramoid, $this->carrilid, '$this->cuerpo', $this->secuencial, $this->folio, '$this->vehiculoid_ect', '$this->clasevehiculo_ect', $this->importe_ect, $this->cantidadeje_ect, $this->tarifaee_ect, '$this->vehiculoid_cr', '$this->clasevehiculo_cr', $this->importe_cr, $this->cantidadeje_cr, $this->tarifaee_cr, '$this->vehiculoid_eap', '$this->clasevehiculo_eap', $this->importe_eap, $this->cantidadeje_eap, $this->tarifaee_eap, '$this->pagoid', $this->excentoid, $this->usuarioid, '$this->placas', '$this->numerotarjeta', '$this->tipotarjeta', " . $this->Ini->date_delim . $this->fechaenvio . $this->Ini->date_delim1 . ", '$this->codigofacturacion', '$this->vehiculoid_ana', '$this->clasevehiculo_ana', $this->importe_ana, '$this->pagoid_ana', $this->estatusana, '$this->fld_ar_sct', $this->cantidadeje_ana, $this->tarifaee_ana, " . $this->Ini->date_delim . $this->fechamodificadoana . $this->Ini->date_delim1 . ", $this->eludidoextra, $this->revisado, " . $this->Ini->date_delim . $this->fechamarcacioncr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccionect . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechadeteccioneap . $this->Ini->date_delim1 . ", $this->tramoidorigen, $this->operacionid, '$this->residente')"; 
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
                              form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              $this->cuerpo = $this->cuerpo_before_qstr;
              $this->vehiculoid_ect = $this->vehiculoid_ect_before_qstr;
              $this->clasevehiculo_ect = $this->clasevehiculo_ect_before_qstr;
              $this->vehiculoid_cr = $this->vehiculoid_cr_before_qstr;
              $this->clasevehiculo_cr = $this->clasevehiculo_cr_before_qstr;
              $this->vehiculoid_eap = $this->vehiculoid_eap_before_qstr;
              $this->clasevehiculo_eap = $this->clasevehiculo_eap_before_qstr;
              $this->pagoid = $this->pagoid_before_qstr;
              $this->placas = $this->placas_before_qstr;
              $this->numerotarjeta = $this->numerotarjeta_before_qstr;
              $this->tipotarjeta = $this->tipotarjeta_before_qstr;
              $this->codigofacturacion = $this->codigofacturacion_before_qstr;
              $this->vehiculoid_ana = $this->vehiculoid_ana_before_qstr;
              $this->clasevehiculo_ana = $this->clasevehiculo_ana_before_qstr;
              $this->pagoid_ana = $this->pagoid_ana_before_qstr;
              $this->fld_ar_sct = $this->fld_ar_sct_before_qstr;
              $this->residente = $this->residente_before_qstr;
              $this->video = $this->video_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->cuerpo = $this->cuerpo_before_qstr;
              $this->vehiculoid_ect = $this->vehiculoid_ect_before_qstr;
              $this->clasevehiculo_ect = $this->clasevehiculo_ect_before_qstr;
              $this->vehiculoid_cr = $this->vehiculoid_cr_before_qstr;
              $this->clasevehiculo_cr = $this->clasevehiculo_cr_before_qstr;
              $this->vehiculoid_eap = $this->vehiculoid_eap_before_qstr;
              $this->clasevehiculo_eap = $this->clasevehiculo_eap_before_qstr;
              $this->pagoid = $this->pagoid_before_qstr;
              $this->placas = $this->placas_before_qstr;
              $this->numerotarjeta = $this->numerotarjeta_before_qstr;
              $this->tipotarjeta = $this->tipotarjeta_before_qstr;
              $this->codigofacturacion = $this->codigofacturacion_before_qstr;
              $this->vehiculoid_ana = $this->vehiculoid_ana_before_qstr;
              $this->clasevehiculo_ana = $this->clasevehiculo_ana_before_qstr;
              $this->pagoid_ana = $this->pagoid_ana_before_qstr;
              $this->fld_ar_sct = $this->fld_ar_sct_before_qstr;
              $this->residente = $this->residente_before_qstr;
              $this->video = $this->video_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['decimal_db'] == ",") 
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
                          form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['total']);
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
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['decimal_db'] == ",")
        {
           $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
  $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";$funcion_a = 'Reload';
$this->sc_ajax_javascript($funcion_a);
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['parms'] = "consecutivo?#?$this->consecutivo?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->consecutivo = null === $this->consecutivo ? null : substr($this->Db->qstr($this->consecutivo), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT Consecutivo, CasetaID, str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20), str_replace (convert(char(10),FechaTurno,102), '.', '-') + ' ' + convert(char(8),FechaTurno,20), TurnoID, str_replace (convert(char(10),HoraEvento,102), '.', '-') + ' ' + convert(char(8),HoraEvento,20), TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, str_replace (convert(char(10),FechaEnvio,102), '.', '-') + ' ' + convert(char(8),FechaEnvio,20), CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, str_replace (convert(char(10),FechaModificadoANA,102), '.', '-') + ' ' + convert(char(8),FechaModificadoANA,20), EludidoExtra, Revisado, str_replace (convert(char(10),FechaMarcacionCR,102), '.', '-') + ' ' + convert(char(8),FechaMarcacionCR,20), str_replace (convert(char(10),FechaDeteccionECT,102), '.', '-') + ' ' + convert(char(8),FechaDeteccionECT,20), str_replace (convert(char(10),FechaDeteccionEAP,102), '.', '-') + ' ' + convert(char(8),FechaDeteccionEAP,20), TramoIDOrigen, OperacionID, Residente from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT Consecutivo, CasetaID, convert(char(23),FechaOperacion,121), convert(char(23),FechaTurno,121), TurnoID, convert(char(23),HoraEvento,121), TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, convert(char(23),FechaEnvio,121), CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, convert(char(23),FechaModificadoANA,121), EludidoExtra, Revisado, convert(char(23),FechaMarcacionCR,121), convert(char(23),FechaDeteccionECT,121), convert(char(23),FechaDeteccionEAP,121), TramoIDOrigen, OperacionID, Residente from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT Consecutivo, CasetaID, EXTEND(FechaOperacion, YEAR TO DAY), EXTEND(FechaTurno, YEAR TO DAY), TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, EXTEND(FechaEnvio, YEAR TO DAY), CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, EXTEND(FechaModificadoANA, YEAR TO FRACTION), EludidoExtra, Revisado, EXTEND(FechaMarcacionCR, YEAR TO FRACTION), EXTEND(FechaDeteccionECT, YEAR TO FRACTION), EXTEND(FechaDeteccionEAP, YEAR TO FRACTION), TramoIDOrigen, OperacionID, Residente from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT Consecutivo, CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_ECT, ClaseVehiculo_ECT, Importe_ECT, CantidadEje_ECT, TarifaEE_ECT, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR, VehiculoID_EAP, ClaseVehiculo_EAP, Importe_EAP, CantidadEje_EAP, TarifaEE_EAP, PagoID, ExcentoID, UsuarioID, Placas, NumeroTarjeta, TipoTarjeta, FechaEnvio, CodigoFacturacion, VehiculoID_ANA, ClaseVehiculo_ANA, Importe_ANA, PagoID_ANA, EstatusANA, fld_ar_sct, CantidadEje_ANA, TarifaEE_ANA, FechaModificadoANA, EludidoExtra, Revisado, FechaMarcacionCR, FechaDeteccionECT, FechaDeteccionEAP, TramoIDOrigen, OperacionID, Residente from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "(Revisado = 0)";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
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
              } 
              else
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['Valida'] = $this->nmgp_botoes['Valida'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['Salir'] = $this->nmgp_botoes['Salir'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['Liquida'] = $this->nmgp_botoes['Liquida'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['video'] = $this->nmgp_botoes['video'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['video2'] = $this->nmgp_botoes['video2'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['Video3'] = $this->nmgp_botoes['Video3'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes['update'] = "off";
              $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes['delete'] = "off";
              return; 
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->consecutivo = $rs->fields[0] ; 
              $this->nmgp_dados_select['consecutivo'] = $this->consecutivo;
              $this->casetaid = $rs->fields[1] ; 
              $this->nmgp_dados_select['casetaid'] = $this->casetaid;
              $this->fechaoperacion = $rs->fields[2] ; 
              $this->nmgp_dados_select['fechaoperacion'] = $this->fechaoperacion;
              $this->fechaturno = $rs->fields[3] ; 
              $this->nmgp_dados_select['fechaturno'] = $this->fechaturno;
              $this->turnoid = $rs->fields[4] ; 
              $this->nmgp_dados_select['turnoid'] = $this->turnoid;
              $this->horaevento = $rs->fields[5] ; 
              $this->nmgp_dados_select['horaevento'] = $this->horaevento;
              $this->tramoid = $rs->fields[6] ; 
              $this->nmgp_dados_select['tramoid'] = $this->tramoid;
              $this->carrilid = $rs->fields[7] ; 
              $this->nmgp_dados_select['carrilid'] = $this->carrilid;
              $this->cuerpo = $rs->fields[8] ; 
              $this->nmgp_dados_select['cuerpo'] = $this->cuerpo;
              $this->secuencial = $rs->fields[9] ; 
              $this->nmgp_dados_select['secuencial'] = $this->secuencial;
              $this->folio = $rs->fields[10] ; 
              $this->nmgp_dados_select['folio'] = $this->folio;
              $this->vehiculoid_ect = $rs->fields[11] ; 
              $this->nmgp_dados_select['vehiculoid_ect'] = $this->vehiculoid_ect;
              $this->clasevehiculo_ect = $rs->fields[12] ; 
              $this->nmgp_dados_select['clasevehiculo_ect'] = $this->clasevehiculo_ect;
              $this->importe_ect = $rs->fields[13] ; 
              $this->nmgp_dados_select['importe_ect'] = $this->importe_ect;
              $this->cantidadeje_ect = $rs->fields[14] ; 
              $this->nmgp_dados_select['cantidadeje_ect'] = $this->cantidadeje_ect;
              $this->tarifaee_ect = $rs->fields[15] ; 
              $this->nmgp_dados_select['tarifaee_ect'] = $this->tarifaee_ect;
              $this->vehiculoid_cr = $rs->fields[16] ; 
              $this->nmgp_dados_select['vehiculoid_cr'] = $this->vehiculoid_cr;
              $this->clasevehiculo_cr = $rs->fields[17] ; 
              $this->nmgp_dados_select['clasevehiculo_cr'] = $this->clasevehiculo_cr;
              $this->importe_cr = $rs->fields[18] ; 
              $this->nmgp_dados_select['importe_cr'] = $this->importe_cr;
              $this->cantidadeje_cr = $rs->fields[19] ; 
              $this->nmgp_dados_select['cantidadeje_cr'] = $this->cantidadeje_cr;
              $this->tarifaee_cr = $rs->fields[20] ; 
              $this->nmgp_dados_select['tarifaee_cr'] = $this->tarifaee_cr;
              $this->vehiculoid_eap = $rs->fields[21] ; 
              $this->nmgp_dados_select['vehiculoid_eap'] = $this->vehiculoid_eap;
              $this->clasevehiculo_eap = $rs->fields[22] ; 
              $this->nmgp_dados_select['clasevehiculo_eap'] = $this->clasevehiculo_eap;
              $this->importe_eap = $rs->fields[23] ; 
              $this->nmgp_dados_select['importe_eap'] = $this->importe_eap;
              $this->cantidadeje_eap = $rs->fields[24] ; 
              $this->nmgp_dados_select['cantidadeje_eap'] = $this->cantidadeje_eap;
              $this->tarifaee_eap = $rs->fields[25] ; 
              $this->nmgp_dados_select['tarifaee_eap'] = $this->tarifaee_eap;
              $this->pagoid = $rs->fields[26] ; 
              $this->nmgp_dados_select['pagoid'] = $this->pagoid;
              $this->excentoid = $rs->fields[27] ; 
              $this->nmgp_dados_select['excentoid'] = $this->excentoid;
              $this->usuarioid = $rs->fields[28] ; 
              $this->nmgp_dados_select['usuarioid'] = $this->usuarioid;
              $this->placas = $rs->fields[29] ; 
              $this->nmgp_dados_select['placas'] = $this->placas;
              $this->numerotarjeta = $rs->fields[30] ; 
              $this->nmgp_dados_select['numerotarjeta'] = $this->numerotarjeta;
              $this->tipotarjeta = $rs->fields[31] ; 
              $this->nmgp_dados_select['tipotarjeta'] = $this->tipotarjeta;
              $this->fechaenvio = $rs->fields[32] ; 
              $this->nmgp_dados_select['fechaenvio'] = $this->fechaenvio;
              $this->codigofacturacion = $rs->fields[33] ; 
              $this->nmgp_dados_select['codigofacturacion'] = $this->codigofacturacion;
              $this->vehiculoid_ana = $rs->fields[34] ; 
              $this->nmgp_dados_select['vehiculoid_ana'] = $this->vehiculoid_ana;
              $this->clasevehiculo_ana = $rs->fields[35] ; 
              $this->nmgp_dados_select['clasevehiculo_ana'] = $this->clasevehiculo_ana;
              $this->importe_ana = $rs->fields[36] ; 
              $this->nmgp_dados_select['importe_ana'] = $this->importe_ana;
              $this->pagoid_ana = $rs->fields[37] ; 
              $this->nmgp_dados_select['pagoid_ana'] = $this->pagoid_ana;
              $this->estatusana = $rs->fields[38] ; 
              $this->nmgp_dados_select['estatusana'] = $this->estatusana;
              $this->fld_ar_sct = $rs->fields[39] ; 
              $this->nmgp_dados_select['fld_ar_sct'] = $this->fld_ar_sct;
              $this->cantidadeje_ana = $rs->fields[40] ; 
              $this->nmgp_dados_select['cantidadeje_ana'] = $this->cantidadeje_ana;
              $this->tarifaee_ana = $rs->fields[41] ; 
              $this->nmgp_dados_select['tarifaee_ana'] = $this->tarifaee_ana;
              $this->fechamodificadoana = $rs->fields[42] ; 
              if (substr($this->fechamodificadoana, 10, 1) == "-") 
              { 
                 $this->fechamodificadoana = substr($this->fechamodificadoana, 0, 10) . " " . substr($this->fechamodificadoana, 11);
              } 
              if (substr($this->fechamodificadoana, 13, 1) == ".") 
              { 
                 $this->fechamodificadoana = substr($this->fechamodificadoana, 0, 13) . ":" . substr($this->fechamodificadoana, 14, 2) . ":" . substr($this->fechamodificadoana, 17);
              } 
              $this->nmgp_dados_select['fechamodificadoana'] = $this->fechamodificadoana;
              $this->eludidoextra = $rs->fields[43] ; 
              $this->nmgp_dados_select['eludidoextra'] = $this->eludidoextra;
              $this->revisado = $rs->fields[44] ; 
              $this->nmgp_dados_select['revisado'] = $this->revisado;
              $this->fechamarcacioncr = $rs->fields[45] ; 
              if (substr($this->fechamarcacioncr, 10, 1) == "-") 
              { 
                 $this->fechamarcacioncr = substr($this->fechamarcacioncr, 0, 10) . " " . substr($this->fechamarcacioncr, 11);
              } 
              if (substr($this->fechamarcacioncr, 13, 1) == ".") 
              { 
                 $this->fechamarcacioncr = substr($this->fechamarcacioncr, 0, 13) . ":" . substr($this->fechamarcacioncr, 14, 2) . ":" . substr($this->fechamarcacioncr, 17);
              } 
              $this->nmgp_dados_select['fechamarcacioncr'] = $this->fechamarcacioncr;
              $this->fechadeteccionect = $rs->fields[46] ; 
              if (substr($this->fechadeteccionect, 10, 1) == "-") 
              { 
                 $this->fechadeteccionect = substr($this->fechadeteccionect, 0, 10) . " " . substr($this->fechadeteccionect, 11);
              } 
              if (substr($this->fechadeteccionect, 13, 1) == ".") 
              { 
                 $this->fechadeteccionect = substr($this->fechadeteccionect, 0, 13) . ":" . substr($this->fechadeteccionect, 14, 2) . ":" . substr($this->fechadeteccionect, 17);
              } 
              $this->nmgp_dados_select['fechadeteccionect'] = $this->fechadeteccionect;
              $this->fechadeteccioneap = $rs->fields[47] ; 
              if (substr($this->fechadeteccioneap, 10, 1) == "-") 
              { 
                 $this->fechadeteccioneap = substr($this->fechadeteccioneap, 0, 10) . " " . substr($this->fechadeteccioneap, 11);
              } 
              if (substr($this->fechadeteccioneap, 13, 1) == ".") 
              { 
                 $this->fechadeteccioneap = substr($this->fechadeteccioneap, 0, 13) . ":" . substr($this->fechadeteccioneap, 14, 2) . ":" . substr($this->fechadeteccioneap, 17);
              } 
              $this->nmgp_dados_select['fechadeteccioneap'] = $this->fechadeteccioneap;
              $this->tramoidorigen = $rs->fields[48] ; 
              $this->nmgp_dados_select['tramoidorigen'] = $this->tramoidorigen;
              $this->operacionid = $rs->fields[49] ; 
              $this->nmgp_dados_select['operacionid'] = $this->operacionid;
              $this->residente = $rs->fields[50] ; 
              $this->nmgp_dados_select['residente'] = $this->residente;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->consecutivo = (string)$this->consecutivo; 
              $this->casetaid = (string)$this->casetaid; 
              $this->turnoid = (string)$this->turnoid; 
              $this->tramoid = (string)$this->tramoid; 
              $this->carrilid = (string)$this->carrilid; 
              $this->secuencial = (string)$this->secuencial; 
              $this->folio = (string)$this->folio; 
              $this->importe_ect = (string)$this->importe_ect; 
              $this->cantidadeje_ect = (string)$this->cantidadeje_ect; 
              $this->tarifaee_ect = (string)$this->tarifaee_ect; 
              $this->importe_cr = (string)$this->importe_cr; 
              $this->cantidadeje_cr = (string)$this->cantidadeje_cr; 
              $this->tarifaee_cr = (string)$this->tarifaee_cr; 
              $this->importe_eap = (string)$this->importe_eap; 
              $this->cantidadeje_eap = (string)$this->cantidadeje_eap; 
              $this->tarifaee_eap = (string)$this->tarifaee_eap; 
              $this->excentoid = (string)$this->excentoid; 
              $this->usuarioid = (string)$this->usuarioid; 
              $this->importe_ana = (string)$this->importe_ana; 
              $this->estatusana = (string)$this->estatusana; 
              $this->cantidadeje_ana = (string)$this->cantidadeje_ana; 
              $this->tarifaee_ana = (string)$this->tarifaee_ana; 
              $this->eludidoextra = (string)$this->eludidoextra; 
              $this->revisado = (string)$this->revisado; 
              $this->tramoidorigen = (string)$this->tramoidorigen; 
              $this->operacionid = (string)$this->operacionid; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['parms'] = "consecutivo?#?$this->consecutivo?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['reg_start'] < $qt_geral_reg_form_aforo_liquidacionCR_tramo_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opcao']   = '';
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
              $this->casetaid = "";  
              $this->nmgp_dados_form["casetaid"] = $this->casetaid;
              $this->fechaoperacion = "";  
              $this->fechaoperacion_hora = "" ;  
              $this->nmgp_dados_form["fechaoperacion"] = $this->fechaoperacion;
              $this->fechaturno = "";  
              $this->fechaturno_hora = "" ;  
              $this->nmgp_dados_form["fechaturno"] = $this->fechaturno;
              $this->turnoid = "";  
              $this->nmgp_dados_form["turnoid"] = $this->turnoid;
              $this->horaevento = "";  
              $this->horaevento_hora = "" ;  
              $this->nmgp_dados_form["horaevento"] = $this->horaevento;
              $this->tramoid = "";  
              $this->nmgp_dados_form["tramoid"] = $this->tramoid;
              $this->carrilid = "";  
              $this->nmgp_dados_form["carrilid"] = $this->carrilid;
              $this->cuerpo = "";  
              $this->nmgp_dados_form["cuerpo"] = $this->cuerpo;
              $this->secuencial = "";  
              $this->nmgp_dados_form["secuencial"] = $this->secuencial;
              $this->folio = "";  
              $this->nmgp_dados_form["folio"] = $this->folio;
              $this->vehiculoid_ect = "";  
              $this->nmgp_dados_form["vehiculoid_ect"] = $this->vehiculoid_ect;
              $this->clasevehiculo_ect = "";  
              $this->nmgp_dados_form["clasevehiculo_ect"] = $this->clasevehiculo_ect;
              $this->importe_ect = "";  
              $this->nmgp_dados_form["importe_ect"] = $this->importe_ect;
              $this->cantidadeje_ect = "";  
              $this->nmgp_dados_form["cantidadeje_ect"] = $this->cantidadeje_ect;
              $this->tarifaee_ect = "";  
              $this->nmgp_dados_form["tarifaee_ect"] = $this->tarifaee_ect;
              $this->vehiculoid_cr = "";  
              $this->nmgp_dados_form["vehiculoid_cr"] = $this->vehiculoid_cr;
              $this->clasevehiculo_cr = "";  
              $this->nmgp_dados_form["clasevehiculo_cr"] = $this->clasevehiculo_cr;
              $this->importe_cr = "";  
              $this->nmgp_dados_form["importe_cr"] = $this->importe_cr;
              $this->cantidadeje_cr = "";  
              $this->nmgp_dados_form["cantidadeje_cr"] = $this->cantidadeje_cr;
              $this->tarifaee_cr = "";  
              $this->nmgp_dados_form["tarifaee_cr"] = $this->tarifaee_cr;
              $this->vehiculoid_eap = "";  
              $this->nmgp_dados_form["vehiculoid_eap"] = $this->vehiculoid_eap;
              $this->clasevehiculo_eap = "";  
              $this->nmgp_dados_form["clasevehiculo_eap"] = $this->clasevehiculo_eap;
              $this->importe_eap = "";  
              $this->nmgp_dados_form["importe_eap"] = $this->importe_eap;
              $this->cantidadeje_eap = "";  
              $this->nmgp_dados_form["cantidadeje_eap"] = $this->cantidadeje_eap;
              $this->tarifaee_eap = "";  
              $this->nmgp_dados_form["tarifaee_eap"] = $this->tarifaee_eap;
              $this->pagoid = "";  
              $this->nmgp_dados_form["pagoid"] = $this->pagoid;
              $this->excentoid = "";  
              $this->nmgp_dados_form["excentoid"] = $this->excentoid;
              $this->usuarioid = "";  
              $this->nmgp_dados_form["usuarioid"] = $this->usuarioid;
              $this->placas = "";  
              $this->nmgp_dados_form["placas"] = $this->placas;
              $this->numerotarjeta = "";  
              $this->nmgp_dados_form["numerotarjeta"] = $this->numerotarjeta;
              $this->tipotarjeta = "";  
              $this->nmgp_dados_form["tipotarjeta"] = $this->tipotarjeta;
              $this->fechaenvio = "";  
              $this->fechaenvio_hora = "" ;  
              $this->nmgp_dados_form["fechaenvio"] = $this->fechaenvio;
              $this->codigofacturacion = "";  
              $this->nmgp_dados_form["codigofacturacion"] = $this->codigofacturacion;
              $this->vehiculoid_ana = "";  
              $this->nmgp_dados_form["vehiculoid_ana"] = $this->vehiculoid_ana;
              $this->clasevehiculo_ana = "";  
              $this->nmgp_dados_form["clasevehiculo_ana"] = $this->clasevehiculo_ana;
              $this->importe_ana = "";  
              $this->nmgp_dados_form["importe_ana"] = $this->importe_ana;
              $this->pagoid_ana = "";  
              $this->nmgp_dados_form["pagoid_ana"] = $this->pagoid_ana;
              $this->estatusana = "";  
              $this->nmgp_dados_form["estatusana"] = $this->estatusana;
              $this->fld_ar_sct = "";  
              $this->nmgp_dados_form["fld_ar_sct"] = $this->fld_ar_sct;
              $this->cantidadeje_ana = "";  
              $this->nmgp_dados_form["cantidadeje_ana"] = $this->cantidadeje_ana;
              $this->tarifaee_ana = "";  
              $this->nmgp_dados_form["tarifaee_ana"] = $this->tarifaee_ana;
              $this->fechamodificadoana = "";  
              $this->fechamodificadoana_hora = "" ;  
              $this->nmgp_dados_form["fechamodificadoana"] = $this->fechamodificadoana;
              $this->eludidoextra = "";  
              $this->nmgp_dados_form["eludidoextra"] = $this->eludidoextra;
              $this->revisado = "";  
              $this->nmgp_dados_form["revisado"] = $this->revisado;
              $this->fechamarcacioncr = "";  
              $this->fechamarcacioncr_hora = "" ;  
              $this->nmgp_dados_form["fechamarcacioncr"] = $this->fechamarcacioncr;
              $this->fechadeteccionect = "";  
              $this->fechadeteccionect_hora = "" ;  
              $this->nmgp_dados_form["fechadeteccionect"] = $this->fechadeteccionect;
              $this->fechadeteccioneap = "";  
              $this->fechadeteccioneap_hora = "" ;  
              $this->nmgp_dados_form["fechadeteccioneap"] = $this->fechadeteccioneap;
              $this->tramoidorigen = "";  
              $this->nmgp_dados_form["tramoidorigen"] = $this->tramoidorigen;
              $this->operacionid = "";  
              $this->nmgp_dados_form["operacionid"] = $this->operacionid;
              $this->residente = "";  
              $this->nmgp_dados_form["residente"] = $this->residente;
              $this->vehiculocorrecto = "";  
              $this->nmgp_dados_form["vehiculocorrecto"] = $this->vehiculocorrecto;
              $this->fld_importe_eeana = "";  
              $this->nmgp_dados_form["fld_importe_eeana"] = $this->fld_importe_eeana;
              $this->video = "";  
              $this->nmgp_dados_form["video"] = $this->video;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['foreign_key'] as $sFKName => $sFKValue)
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
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function Liquidacion($CasetaID, $FechaOperacion, $TurnoID, $CarrilID, $Cuerpo)
{
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_Cuerpo)) {$this->sc_temp_Cuerpo = (isset($_SESSION['Cuerpo'])) ? $_SESSION['Cuerpo'] : "";}
if (!isset($this->sc_temp_CarrilID)) {$this->sc_temp_CarrilID = (isset($_SESSION['CarrilID'])) ? $_SESSION['CarrilID'] : "";}
if (!isset($this->sc_temp_TurnoID)) {$this->sc_temp_TurnoID = (isset($_SESSION['TurnoID'])) ? $_SESSION['TurnoID'] : "";}
if (!isset($this->sc_temp_FechaOperacion)) {$this->sc_temp_FechaOperacion = (isset($_SESSION['FechaOperacion'])) ? $_SESSION['FechaOperacion'] : "";}
if (!isset($this->sc_temp_CasetaID)) {$this->sc_temp_CasetaID = (isset($_SESSION['CasetaID'])) ? $_SESSION['CasetaID'] : "";}
  
$ruta = $this->leeConfig('RUTA','LiqTurnoPDF');
;
$CasetaID = $this->sc_temp_CasetaID;
$FechaOperacion = $this->sc_temp_FechaOperacion;
$TurnoID = $this->sc_temp_TurnoID;
$CarrilID = $this->sc_temp_CarrilID;
$Cuerpo = $this->sc_temp_Cuerpo;

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
$tblpre = $this->Liquidacion($CasetaID, $FechaOperacion, $TurnoID, $CarrilID, $Cuerpo);
$nombrearchivo = $tblpre[1];;
$tbl = $tblpre[0];
$pdf->writeHTML($style . $tbl, true, false, false, false, '');
$pdf->AddPage('L','LETTER'); 
$tbl = Comparativo($CasetaID, $FechaOperacion, $TurnoID, $CarrilID, $Cuerpo);
$pdf->writeHTML($styleComparativo . $tbl, true, false, false, false, '');
unset($tblpre,$tbl);
$js = 'print(true);';

if (!file_exists($ruta)) {
    		mkdir($ruta, 0777, true);
		}

$pdf->Output($ruta.'LiquidacionCR_'.$nombrearchivo.'.pdf', 'F');

if (isset($this->sc_temp_CasetaID)) { $_SESSION['CasetaID'] = $this->sc_temp_CasetaID;}
if (isset($this->sc_temp_FechaOperacion)) { $_SESSION['FechaOperacion'] = $this->sc_temp_FechaOperacion;}
if (isset($this->sc_temp_TurnoID)) { $_SESSION['TurnoID'] = $this->sc_temp_TurnoID;}
if (isset($this->sc_temp_CarrilID)) { $_SESSION['CarrilID'] = $this->sc_temp_CarrilID;}
if (isset($this->sc_temp_Cuerpo)) { $_SESSION['Cuerpo'] = $this->sc_temp_Cuerpo;}
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
}
function PagoEfectivo()
{
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
  
$PagoEfectivoANA = " ( ";
$check_sql = "SELECT TipoPagoID,Tipo FROM tipopago WHERE PagoEfectivo = 1 order by Orden";
 
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
   $sErrorIndex = 'geral_form_aforo_liquidacionCR_tramo_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_aforo_liquidacionCR_tramo_mob';
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
	$PagoEfectivoANA .= "PagoID = '".$this->rs->fields[0] . "' OR ";
   
	 $this->rs->MoveNext();
    }
    $this->rs->Close();
}
$PagoEfectivoANA = substr($PagoEfectivoANA,0,-4);
$PagoEfectivoANA .= ")";
return $PagoEfectivoANA;
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
}
function PagoID_ANA_onChange()
{
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
  
$original_pagoid_ana = $this->pagoid_ana;
$original_vehiculoid_ana = $this->vehiculoid_ana;
$original_cantidadeje_ana = $this->cantidadeje_ana;
$original_importe_ana = $this->importe_ana;
$original_fld_importe_eeana = $this->fld_importe_eeana;
$original_tarifaee_ana = $this->tarifaee_ana;

$PagoID_ANA = ($this->pagoid_ana  == "GE") ? $PagoID_ANA = $this->pagoid  : $PagoID_ANA = $this->pagoid_ana ;

$tarifa_sql = "SELECT fld_tipo_pago, fld_ee, fld_tipo, fld_grupo FROM cat_tipoveh WHERE fld_tipo_equipo = '".$this->vehiculoid_ana ."'";
 
      $nm_select = $tarifa_sql; 
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
		$grupo = $this->rs[0][3];
		$fld_tipo = $this->rs[0][2];
		$this->cantidadeje_ana  = $this->rs[0][1];
		$this->clasevehiculo_ana  = $this->rs[0][0];
	}
	else {
	}
$tarifa_sql = "SELECT importe, ImporteEjeLigero,ImporteEjePesado FROM tarifa WHERE VehiculoID = '".$fld_tipo."' and CasetaID = ".$this->casetaid ." AND TipoPagoID = '".$PagoID_ANA."' AND TramoID = ".$this->tramoidorigen ." AND (FechaInicio <= '".$this->fechaturno ." ". $this->horaevento  ."' and FechaFin >= '".$this->fechaturno ." ". $this->horaevento ."')";
	 
      $nm_select = $tarifa_sql; 
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
		$this->importe_ana  = $this->rs[0][0];
		if($grupo =="A" || $grupo =="M"){
			
			if(strlen($this->vehiculoid_ana ) > 4){
				if($this->casetaid  != '15'){
					$this->fld_importe_eeana  = $this->rs[0][1];
					$this->tarifaee_ana  = $this->rs[0][1];
				}else{
					$this->fld_importe_eeana  = $this->rs[0][1]*$this->cantidadeje_ana ;
					$this->tarifaee_ana  = $this->rs[0][1];
					}
			}else{
				$this->tarifaee_ana  =0;
				$this->fld_importe_eeana  = 0;
			}
		}else{
			
			if(strlen($this->vehiculoid_ana ) > 4){
			$this->fld_importe_eeana  = $this->rs[0][2]*$this->cantidadeje_ana ;
			$this->tarifaee_ana  = $this->rs[0][2];
			}else{
				$this->tarifaee_ana  =0;
				$this->fld_importe_eeana =0;
				}
		}
	  }else{
		echo "No hay tarifa cargada..";
		$this->importe_ana  = 0;
		$this->fld_importe_eeana  = 0;
		$this->tarifaee_ana  = 0;
	}



$modificado_pagoid_ana = $this->pagoid_ana;
$modificado_vehiculoid_ana = $this->vehiculoid_ana;
$modificado_cantidadeje_ana = $this->cantidadeje_ana;
$modificado_importe_ana = $this->importe_ana;
$modificado_fld_importe_eeana = $this->fld_importe_eeana;
$modificado_tarifaee_ana = $this->tarifaee_ana;
$this->nm_formatar_campos('pagoid_ana', 'vehiculoid_ana', 'cantidadeje_ana', 'importe_ana', 'fld_importe_eeana', 'tarifaee_ana');
if ($original_pagoid_ana !== $modificado_pagoid_ana || isset($this->nmgp_cmp_readonly['pagoid_ana']) || (isset($bFlagRead_pagoid_ana) && $bFlagRead_pagoid_ana))
{
    $this->ajax_return_values_pagoid_ana(true);
}
if ($original_vehiculoid_ana !== $modificado_vehiculoid_ana || isset($this->nmgp_cmp_readonly['vehiculoid_ana']) || (isset($bFlagRead_vehiculoid_ana) && $bFlagRead_vehiculoid_ana))
{
    $this->ajax_return_values_vehiculoid_ana(true);
}
if ($original_cantidadeje_ana !== $modificado_cantidadeje_ana || isset($this->nmgp_cmp_readonly['cantidadeje_ana']) || (isset($bFlagRead_cantidadeje_ana) && $bFlagRead_cantidadeje_ana))
{
    $this->ajax_return_values_cantidadeje_ana(true);
}
if ($original_importe_ana !== $modificado_importe_ana || isset($this->nmgp_cmp_readonly['importe_ana']) || (isset($bFlagRead_importe_ana) && $bFlagRead_importe_ana))
{
    $this->ajax_return_values_importe_ana(true);
}
if ($original_fld_importe_eeana !== $modificado_fld_importe_eeana || isset($this->nmgp_cmp_readonly['fld_importe_eeana']) || (isset($bFlagRead_fld_importe_eeana) && $bFlagRead_fld_importe_eeana))
{
    $this->ajax_return_values_fld_importe_eeana(true);
}
if ($original_tarifaee_ana !== $modificado_tarifaee_ana || isset($this->nmgp_cmp_readonly['tarifaee_ana']) || (isset($bFlagRead_tarifaee_ana) && $bFlagRead_tarifaee_ana))
{
    $this->ajax_return_values_tarifaee_ana(true);
}
$this->NM_ajax_info['event_field'] = 'PagoID';
form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
}
function VehiculoCorrecto_onClick()
{
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
  
$original_vehiculocorrecto = $this->vehiculocorrecto;
$original_vehiculoid_ana = $this->vehiculoid_ana;
$original_pagoid_ana = $this->pagoid_ana;
$original_cantidadeje_ana = $this->cantidadeje_ana;
$original_importe_ana = $this->importe_ana;
$original_fld_importe_eeana = $this->fld_importe_eeana;
$original_tarifaee_ana = $this->tarifaee_ana;


if($this->vehiculocorrecto ==1){
	$this->vehiculoid_ana  = $this->vehiculoid_ect ;
	$this->actualiza_tarifas();
}elseif($this->vehiculocorrecto ==2){
	$this->vehiculoid_ana  = $this->vehiculoid_cr ;
	$this->actualiza_tarifas();
}else{
	$this->vehiculoid_ana  = $this->vehiculoid_eap ;
	$this->actualiza_tarifas();
	}
	


$modificado_vehiculocorrecto = $this->vehiculocorrecto;
$modificado_vehiculoid_ana = $this->vehiculoid_ana;
$modificado_pagoid_ana = $this->pagoid_ana;
$modificado_cantidadeje_ana = $this->cantidadeje_ana;
$modificado_importe_ana = $this->importe_ana;
$modificado_fld_importe_eeana = $this->fld_importe_eeana;
$modificado_tarifaee_ana = $this->tarifaee_ana;
$this->nm_formatar_campos('vehiculocorrecto', 'vehiculoid_ana', 'pagoid_ana', 'cantidadeje_ana', 'importe_ana', 'fld_importe_eeana', 'tarifaee_ana');
if ($original_vehiculocorrecto !== $modificado_vehiculocorrecto || isset($this->nmgp_cmp_readonly['vehiculocorrecto']) || (isset($bFlagRead_vehiculocorrecto) && $bFlagRead_vehiculocorrecto))
{
    $this->ajax_return_values_vehiculocorrecto(true);
}
if ($original_vehiculoid_ana !== $modificado_vehiculoid_ana || isset($this->nmgp_cmp_readonly['vehiculoid_ana']) || (isset($bFlagRead_vehiculoid_ana) && $bFlagRead_vehiculoid_ana))
{
    $this->ajax_return_values_vehiculoid_ana(true);
}
if ($original_pagoid_ana !== $modificado_pagoid_ana || isset($this->nmgp_cmp_readonly['pagoid_ana']) || (isset($bFlagRead_pagoid_ana) && $bFlagRead_pagoid_ana))
{
    $this->ajax_return_values_pagoid_ana(true);
}
if ($original_cantidadeje_ana !== $modificado_cantidadeje_ana || isset($this->nmgp_cmp_readonly['cantidadeje_ana']) || (isset($bFlagRead_cantidadeje_ana) && $bFlagRead_cantidadeje_ana))
{
    $this->ajax_return_values_cantidadeje_ana(true);
}
if ($original_importe_ana !== $modificado_importe_ana || isset($this->nmgp_cmp_readonly['importe_ana']) || (isset($bFlagRead_importe_ana) && $bFlagRead_importe_ana))
{
    $this->ajax_return_values_importe_ana(true);
}
if ($original_fld_importe_eeana !== $modificado_fld_importe_eeana || isset($this->nmgp_cmp_readonly['fld_importe_eeana']) || (isset($bFlagRead_fld_importe_eeana) && $bFlagRead_fld_importe_eeana))
{
    $this->ajax_return_values_fld_importe_eeana(true);
}
if ($original_tarifaee_ana !== $modificado_tarifaee_ana || isset($this->nmgp_cmp_readonly['tarifaee_ana']) || (isset($bFlagRead_tarifaee_ana) && $bFlagRead_tarifaee_ana))
{
    $this->ajax_return_values_tarifaee_ana(true);
}
$this->NM_ajax_info['event_field'] = 'VehiculoCorrecto';
form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
}
function VehiculoID_ANA_onChange()
{
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
  
$original_pagoid_ana = $this->pagoid_ana;
$original_vehiculoid_ana = $this->vehiculoid_ana;
$original_cantidadeje_ana = $this->cantidadeje_ana;
$original_importe_ana = $this->importe_ana;
$original_fld_importe_eeana = $this->fld_importe_eeana;
$original_tarifaee_ana = $this->tarifaee_ana;

$PagoID_ANA = ($this->pagoid_ana  == "GE") ? $PagoID_ANA = $this->pagoid  : $PagoID_ANA = $this->pagoid_ana ;

$tarifa_sql = "SELECT fld_tipo_pago, fld_ee, fld_tipo, fld_grupo FROM cat_tipoveh WHERE fld_tipo_equipo = '".$this->vehiculoid_ana ."'";
 
      $nm_select = $tarifa_sql; 
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
		$grupo = $this->rs[0][3];
		$fld_tipo = $this->rs[0][2];
		$this->cantidadeje_ana  = $this->rs[0][1];
		$this->clasevehiculo_ana  = $this->rs[0][0];
	}
	else{
	}
$tarifa_sql = "SELECT importe, ImporteEjeLigero,ImporteEjePesado FROM tarifa WHERE VehiculoID = '".$fld_tipo."' and CasetaID = ".$this->casetaid ." AND TipoPagoID = '".$PagoID_ANA."' AND TramoID = ".$this->tramoidorigen ." AND (FechaInicio <= '".$this->fechaturno ." ". $this->horaevento  ."' and FechaFin >= '".$this->fechaturno ." ". $this->horaevento ."')";
	 
      $nm_select = $tarifa_sql; 
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
		$this->importe_ana  = $this->rs[0][0];
		if($grupo =="A" || $grupo =="M"){
			if(strlen($this->vehiculoid_ana ) > 4){
				if($this->casetaid  != '15'){
					$this->fld_importe_eeana  = $this->rs[0][1];
					$this->tarifaee_ana  = $this->rs[0][1];
				}else{
					$this->fld_importe_eeana  = $this->rs[0][1]*$this->cantidadeje_ana ;
					$this->tarifaee_ana  = $this->rs[0][1];
					}
			}else{
				$this->tarifaee_ana  =0;
				$this->fld_importe_eeana  = 0;
			}
		}else{
			if(strlen($this->vehiculoid_ana ) > 4){
			$this->fld_importe_eeana  = $this->rs[0][2]*$this->cantidadeje_ana ;
			$this->tarifaee_ana  = $this->rs[0][2];
			}else{
				$this->tarifaee_ana  =0;
				$this->fld_importe_eeana =0;
				}
		}
	  }else{
		echo "No hay tarifa cargada..";
		$this->importe_ana  = 0;
		$this->fld_importe_eeana  = 0;
		$this->tarifaee_ana  = 0;
	}



$modificado_pagoid_ana = $this->pagoid_ana;
$modificado_vehiculoid_ana = $this->vehiculoid_ana;
$modificado_cantidadeje_ana = $this->cantidadeje_ana;
$modificado_importe_ana = $this->importe_ana;
$modificado_fld_importe_eeana = $this->fld_importe_eeana;
$modificado_tarifaee_ana = $this->tarifaee_ana;
$this->nm_formatar_campos('pagoid_ana', 'vehiculoid_ana', 'cantidadeje_ana', 'importe_ana', 'fld_importe_eeana', 'tarifaee_ana');
if ($original_pagoid_ana !== $modificado_pagoid_ana || isset($this->nmgp_cmp_readonly['pagoid_ana']) || (isset($bFlagRead_pagoid_ana) && $bFlagRead_pagoid_ana))
{
    $this->ajax_return_values_pagoid_ana(true);
}
if ($original_vehiculoid_ana !== $modificado_vehiculoid_ana || isset($this->nmgp_cmp_readonly['vehiculoid_ana']) || (isset($bFlagRead_vehiculoid_ana) && $bFlagRead_vehiculoid_ana))
{
    $this->ajax_return_values_vehiculoid_ana(true);
}
if ($original_cantidadeje_ana !== $modificado_cantidadeje_ana || isset($this->nmgp_cmp_readonly['cantidadeje_ana']) || (isset($bFlagRead_cantidadeje_ana) && $bFlagRead_cantidadeje_ana))
{
    $this->ajax_return_values_cantidadeje_ana(true);
}
if ($original_importe_ana !== $modificado_importe_ana || isset($this->nmgp_cmp_readonly['importe_ana']) || (isset($bFlagRead_importe_ana) && $bFlagRead_importe_ana))
{
    $this->ajax_return_values_importe_ana(true);
}
if ($original_fld_importe_eeana !== $modificado_fld_importe_eeana || isset($this->nmgp_cmp_readonly['fld_importe_eeana']) || (isset($bFlagRead_fld_importe_eeana) && $bFlagRead_fld_importe_eeana))
{
    $this->ajax_return_values_fld_importe_eeana(true);
}
if ($original_tarifaee_ana !== $modificado_tarifaee_ana || isset($this->nmgp_cmp_readonly['tarifaee_ana']) || (isset($bFlagRead_tarifaee_ana) && $bFlagRead_tarifaee_ana))
{
    $this->ajax_return_values_tarifaee_ana(true);
}
$this->NM_ajax_info['event_field'] = 'VehiculoID';
form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
}
function actualiza_tarifas()
{
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
  

$tarifa_sql = "SELECT fld_tipo_pago, fld_ee, fld_tipo, fld_grupo FROM cat_tipoveh WHERE fld_tipo_equipo = '".$this->vehiculoid_ana ."'";
 
      $nm_select = $tarifa_sql; 
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
		$grupo = $this->rs[0][3];
		$fld_tipo = $this->rs[0][2];
		$this->cantidadeje_ana  = $this->rs[0][1];
		$this->clasevehiculo_ana  = $this->rs[0][0];
	}
	else{
	}
$tarifa_sql = "SELECT importe, ImporteEjeLigero,ImporteEjePesado FROM tarifa WHERE VehiculoID = '".$fld_tipo."' and CasetaID = ".$this->casetaid ." AND TipoPagoID = '".$this->pagoid ."' AND TramoID = ".$this->tramoidorigen ." AND (FechaInicio <= '".$this->fechaturno ." ".$this->horaevento  ."' and FechaFin >= '".$this->fechaturno ." ".$this->horaevento ."')";
	 
      $nm_select = $tarifa_sql; 
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
		$this->importe_ana  = $this->rs[0][0];
		if($grupo =="A" || $grupo =="M"){
			
			if(strlen($this->vehiculoid_ana ) > 4){
				if($this->casetaid !='15'){
					$this->fld_importe_eeana  = $this->rs[0][1];
					$this->tarifaee_ana  = $this->rs[0][1];
				}else{
					$this->fld_importe_eeana  = $this->rs[0][1]*$this->cantidadeje_ana ;
					$this->tarifaee_ana  = $this->rs[0][1];
					}
			}else{
				$this->tarifaee_ana  =0;
				$this->fld_importe_eeana  = 0;
			}
		}else{
			
			if(strlen($this->vehiculoid_ana ) > 4){
			$this->fld_importe_eeana  = $this->rs[0][2]*$this->cantidadeje_ana ;
			$this->tarifaee_ana  = $this->rs[0][2];
			}else{
				$this->tarifaee_ana  =0;
				$this->fld_importe_eeana =0;
				}
		}
	  }else{
		echo "No hay tarifa cargada..";
		$this->importe_ana  = 0;
		$this->fld_importe_eeana  = 0;
		$this->tarifaee_ana  = 0;
	}
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
}
function saca_tarifa($fecha_ini, $fecha_fin, $eje, $caseta)
{
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
  
$check_sql = "SELECT fld_tarifa FROM cat_tarifas
WHERE fld_grupo = '$eje' and fld_caseta = '$caseta' and (fld_fecha_ini >= '$fecha_ini' and fld_fecha_fin <= '$fecha_fin')";
 
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


if (isset($this->rs[0][0])){
    $tarifa  = $this->rs[0][0];
  }else{
	$tarifa  = 0;
}
return $tarifa ;
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
}
function rv_logAcceso ($accion, $key) {
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
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
                form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
if (isset($this->sc_temp_sm_global_login)) { $_SESSION['sm_global_login'] = $this->sc_temp_sm_global_login;}
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
}
function rv_revisaBotones() {
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
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
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
}
function leeConfig($ident, $clasif, &$obj = NULL) {
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
   
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
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
}
function guardaIdAplicacion() {
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_idmodulo)) {$this->sc_temp_idmodulo = (isset($_SESSION['idmodulo'])) ? $_SESSION['idmodulo'] : "";}
if (!isset($this->sc_temp_aplicacion_origen)) {$this->sc_temp_aplicacion_origen = (isset($_SESSION['aplicacion_origen'])) ? $_SESSION['aplicacion_origen'] : "";}
   
 $this->sc_temp_aplicacion_origen = substr(10000+$this->sc_temp_idmodulo, 2).$this->Ini->nm_cod_apl; 
 
if (isset($this->sc_temp_aplicacion_origen)) { $_SESSION['aplicacion_origen'] = $this->sc_temp_aplicacion_origen;}
if (isset($this->sc_temp_idmodulo)) { $_SESSION['idmodulo'] = $this->sc_temp_idmodulo;}
$_SESSION['scriptcase']['form_aforo_liquidacionCR_tramo_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_aforo_liquidacionCR_tramo_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("id", "fld_caseta", "fld_turno", "fld_hora", "fld_tramo", "fld_carril", "fld_cuerpo", "fld_evento", "fld_folio", "fld_senal_pos", "fld_importe_pos", "fld_tipo_pos", "fld_ee_pos", "fld_tarifa_eepos", "fld_senal_cr", "fld_importe_cr", "fld_tipo_cr", "fld_ee_cr", "fld_tarifa_ee", "fld_senal_pre", "fld_importe_pre", "fld_tipo_pre", "fld_ee_pre", "fld_tarifa_eepre", "fld_usuario", "fld_exentoid", "fld_usuarioid", "fld_placas", "fld_tarjeta", "fld_tipotarjeta", "fld_idfacturacion", "fld_tipo_vehiculo", "fld_senal_ana", "fld_tipo_ana", "fld_veh_analista", "fld_importe_ana", "fld_usuario_ana", "fld_status", "fld_ar_sct", "fld_ee_ana", "fld_tarifa_eeana", "fld_elu_extra", "fld_rev"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['csrf_token'];
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

   function Form_lookup_vehiculocorrecto()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "PRE?#?1?#?N?@?";
       $nmgp_def_dados .= "CR?#?2?#?S?@?";
       $nmgp_def_dados .= "POS?#?3?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_pagoid_ana()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana'] = array(); 
    }

   $old_value_importe_ana = $this->importe_ana;
   $old_value_cantidadeje_ana = $this->cantidadeje_ana;
   $old_value_tarifaee_ana = $this->tarifaee_ana;
   $old_value_fld_importe_eeana = $this->fld_importe_eeana;
   $this->nm_tira_formatacao();


   $unformatted_value_importe_ana = $this->importe_ana;
   $unformatted_value_cantidadeje_ana = $this->cantidadeje_ana;
   $unformatted_value_tarifaee_ana = $this->tarifaee_ana;
   $unformatted_value_fld_importe_eeana = $this->fld_importe_eeana;

   $nm_comando = "SELECT TipoPagoID, TipoPagoID FROM tipopago  ORDER BY Orden";

   $this->importe_ana = $old_value_importe_ana;
   $this->cantidadeje_ana = $old_value_cantidadeje_ana;
   $this->tarifaee_ana = $old_value_tarifaee_ana;
   $this->fld_importe_eeana = $old_value_fld_importe_eeana;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_pagoid_ana'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_vehiculoid_ana()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana'] = array(); 
    }

   $old_value_importe_ana = $this->importe_ana;
   $old_value_cantidadeje_ana = $this->cantidadeje_ana;
   $old_value_tarifaee_ana = $this->tarifaee_ana;
   $old_value_fld_importe_eeana = $this->fld_importe_eeana;
   $this->nm_tira_formatacao();


   $unformatted_value_importe_ana = $this->importe_ana;
   $unformatted_value_cantidadeje_ana = $this->cantidadeje_ana;
   $unformatted_value_tarifaee_ana = $this->tarifaee_ana;
   $unformatted_value_fld_importe_eeana = $this->fld_importe_eeana;

   $nm_comando = "SELECT fld_tipo_equipo, fld_tipo_equipo FROM cat_tipoveh  ORDER BY fld_orden";

   $this->importe_ana = $old_value_importe_ana;
   $this->cantidadeje_ana = $old_value_cantidadeje_ana;
   $this->tarifaee_ana = $old_value_tarifaee_ana;
   $this->fld_importe_eeana = $old_value_fld_importe_eeana;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['Lookup_vehiculoid_ana'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fld_ar_sct", $arg_search, $data_search, "CHAR", false);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter_form'] . " and ((Revisado = 0)) and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where (Revisado = 0) and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_aforo_liquidacionCR_tramo_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['total'] = $qt_geral_reg_form_aforo_liquidacionCR_tramo_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
      $nm_numeric[] = "consecutivo";$nm_numeric[] = "casetaid";$nm_numeric[] = "turnoid";$nm_numeric[] = "tramoid";$nm_numeric[] = "carrilid";$nm_numeric[] = "secuencial";$nm_numeric[] = "folio";$nm_numeric[] = "importe_ect";$nm_numeric[] = "cantidadeje_ect";$nm_numeric[] = "tarifaee_ect";$nm_numeric[] = "importe_cr";$nm_numeric[] = "cantidadeje_cr";$nm_numeric[] = "tarifaee_cr";$nm_numeric[] = "importe_eap";$nm_numeric[] = "cantidadeje_eap";$nm_numeric[] = "tarifaee_eap";$nm_numeric[] = "excentoid";$nm_numeric[] = "usuarioid";$nm_numeric[] = "importe_ana";$nm_numeric[] = "estatusana";$nm_numeric[] = "cantidadeje_ana";$nm_numeric[] = "tarifaee_ana";$nm_numeric[] = "eludidoextra";$nm_numeric[] = "revisado";$nm_numeric[] = "tramoidorigen";$nm_numeric[] = "operacionid";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['decimal_db'] == ".")
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
      $Nm_datas["fechaoperacion"] = "date";$Nm_datas["fechaturno"] = "date";$Nm_datas["horaevento"] = "time";$Nm_datas["fechaenvio"] = "date";$Nm_datas["fechamodificadoana"] = "datetime";$Nm_datas["fechamarcacioncr"] = "datetime";$Nm_datas["fechadeteccionect"] = "datetime";$Nm_datas["fechadeteccioneap"] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['SC_sep_date1'];
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
       $nmgp_saida_form = "form_aforo_liquidacionCR_tramo_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_aforo_liquidacionCR_tramo_mob_fim.php";
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
       form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
       form_aforo_liquidacionCR_tramo_mob_pack_ajax_response();
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
    function sc_ajax_javascript($sJsFunc, $aParam = array())
    {
        if ($this->NM_ajax_flag)
        {
            foreach ($aParam as $i => $v)
            {
                $aParam[$i] = NM_charset_to_utf8($v);
            }
            $this->NM_ajax_info['ajaxJavascript'][] = array(NM_charset_to_utf8($sJsFunc), $aParam);
        }
        else
        {
            foreach ($aParam as $i => $v)
            {
                $aParam[$i] = '"' . str_replace('"', '\"', $v) . '"';
            }
            $this->NM_non_ajax_info['ajaxJavascript'][] = array($sJsFunc, $aParam);
        }
    } // sc_ajax_javascript
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "liquida":
                return array("sc_Liquida_top.", "sc_Liquida_top.");
                break;
            case "salir":
                return array("sc_Salir_top.", "sc_Salir_top.");
                break;
            case "video":
                return array("sc_video_bot.", "sc_video_bot.");
                break;
            case "video2":
                return array("sc_video2_bot.", "sc_video2_bot.");
                break;
            case "video3":
                return array("sc_Video3_bot.", "sc_Video3_bot.");
                break;
            case "update":
                return array("sc_b_upd_b.sc-unique-btn-1", "sc_b_upd_b.sc-unique-btn-3");
                break;
            case "exit":
                return array("sc_b_sai_b.sc-unique-btn-2", "sc_b_sai_b.sc-unique-btn-4");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
   <TABLE width="100%" class="scFormHeader">
    <TR align="center">
     <TD style="padding: 0px">
      <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <TR align="center" valign="middle">
        <TD align="left" rowspan="2" class="scFormHeaderFont">
          
        </TD>
        <TD class="scFormHeaderFont">
          <?php if ($this->nmgp_opcao == "novo") { echo "Dictamina: Aforo | Ingreso"; } else { echo "Dictamina: Aforo | Ingreso"; } ?>
        </TD>
       </TR>
       <TR align="right" valign="middle">
        <TD class="scFormHeaderFont">
          
        </TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE>
    </td></tr>
<?php
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['run_iframe'] != "R") {
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aforo_liquidacionCR_tramo_mob']['ordem_ord'] == " desc") {
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
            case "Importe_ANA":
                return true;
            case "CantidadEje_ANA":
                return true;
            case "TarifaEE_ANA":
                return true;
            case "":
                return true;
            case "Consecutivo":
                return true;
            case "TurnoID":
                return true;
            case "TramoID":
                return true;
            case "CarrilID":
                return true;
            case "Secuencial":
                return true;
            case "Folio":
                return true;
            case "Importe_ECT":
                return true;
            case "CantidadEje_ECT":
                return true;
            case "TarifaEE_ECT":
                return true;
            case "Importe_CR":
                return true;
            case "CantidadEje_CR":
                return true;
            case "TarifaEE_CR":
                return true;
            case "Importe_EAP":
                return true;
            case "CantidadEje_EAP":
                return true;
            case "TarifaEE_EAP":
                return true;
            case "ExcentoID":
                return true;
            case "UsuarioID":
                return true;
            case "EludidoExtra":
                return true;
            case "Revisado":
                return true;
            case "TramoIDOrigen":
                return true;
            case "OperacionID":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "Importe_ANA":
                return 'desc';
            case "CantidadEje_ANA":
                return 'desc';
            case "TarifaEE_ANA":
                return 'desc';
            case "Consecutivo":
                return 'desc';
            case "FechaOperacion":
                return 'desc';
            case "FechaTurno":
                return 'desc';
            case "TurnoID":
                return 'desc';
            case "TramoID":
                return 'desc';
            case "CarrilID":
                return 'desc';
            case "Secuencial":
                return 'desc';
            case "Folio":
                return 'desc';
            case "Importe_ECT":
                return 'desc';
            case "CantidadEje_ECT":
                return 'desc';
            case "TarifaEE_ECT":
                return 'desc';
            case "Importe_CR":
                return 'desc';
            case "CantidadEje_CR":
                return 'desc';
            case "TarifaEE_CR":
                return 'desc';
            case "Importe_EAP":
                return 'desc';
            case "CantidadEje_EAP":
                return 'desc';
            case "TarifaEE_EAP":
                return 'desc';
            case "ExcentoID":
                return 'desc';
            case "UsuarioID":
                return 'desc';
            case "FechaEnvio":
                return 'desc';
            case "EstatusANA":
                return 'desc';
            case "FechaModificadoANA":
                return 'desc';
            case "EludidoExtra":
                return 'desc';
            case "Revisado":
                return 'desc';
            case "FechaMarcacionCR":
                return 'desc';
            case "FechaDeteccionECT":
                return 'desc';
            case "FechaDeteccionEAP":
                return 'desc';
            case "TramoIDOrigen":
                return 'desc';
            case "OperacionID":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
