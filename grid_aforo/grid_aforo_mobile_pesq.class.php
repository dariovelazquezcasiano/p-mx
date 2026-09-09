<?php
require_once dirname(__DIR__) . '/_lib/lib/php/peaje_sql_guard.php';

class grid_aforo_pesq
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $cmp_formatado;
   var $nm_data;
   var $Campos_Mens_erro;

   var $comando;
   var $comando_sum;
   var $comando_filtro;
   var $comando_ini;
   var $comando_fim;
   var $NM_operador;
   var $NM_data_qp;
   var $NM_path_filter;
   var $NM_curr_fil;
   var $nm_location;
   var $NM_ajax_opcao;
   var $nmgp_botoes = array();
   var $NM_fil_ant = array();

   /**
    * @access  public
    */
   function __construct()
   {
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   function monta_busca()
   {
      global $bprocessa;
      include("../_lib/css/" . $this->Ini->str_schema_filter . "_filter.php");
      $this->Ini->Str_btn_filter = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_filter_css  = trim($str_button) . "/" . trim($str_button) . ".css";
      $this->Ini->str_google_fonts = (isset($str_google_fonts) && !empty($str_google_fonts))?$str_google_fonts:'';
      include($this->Ini->path_btn . $this->Ini->Str_btn_filter);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['path_libs_php'] = $this->Ini->path_lib_php;
      $this->Img_sep_filter = "/" . trim($str_toolbar_separator);
      $this->Block_img_col  = trim($str_block_col);
      $this->Block_img_exp  = trim($str_block_exp);
      $this->Bubble_tail    = trim($str_bubble_tail);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
      $this->NM_case_insensitive = false;
      $this->init();
      if ($this->NM_ajax_flag && $this->NM_ajax_opcao == "ajax_grid_search_change_fil")
      {
          $arr_new_fil = $this->recupera_filtro($this->NM_ajax_grid_fil);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'] = array(); 
          foreach ($arr_new_fil as $tp)
          {
              foreach ($tp as $ind => $cada_dado)
              {
                  $field = $cada_dado['field'];
                  if (substr($cada_dado['field'], 0, 3) == "SC_")
                  {
                      $field = substr($cada_dado['field'], 3);
                  }
                  if (substr($cada_dado['field'], 0, 6) == "id_ac_")
                  {
                      $field = substr($cada_dado['field'], 6);
                  }
                  if (is_array($cada_dado['value']))
                  {
                      $arr_tmp = array();
                      foreach($cada_dado['value'] as $ix => $dados)
                      {
                          if (isset($dados['opt']))
                          {
                              $arr_tmp[] = $dados['opt'];
                          }
                          else
                          {
                              $arr_tmp[] = $dados;
                          }
                      }
                      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'][$field] = $arr_tmp; 
                  }
                  else
                  {
                      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'][$field] = $cada_dado['value']; 
                  }
              }
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->processa_busca();
          if (!empty($this->Campos_Mens_erro)) 
          {
              scriptcase_error_display($this->Campos_Mens_erro, ""); 
              return false;
          }
          return true;
      }
      if ($this->NM_ajax_flag && $this->NM_ajax_opcao == "ajax_grid_search")
      {
         $this->processa_busca();
         return;
      }
      if ($this->NM_ajax_flag)
      {
          ob_start();
          $this->Arr_result = array();
          $this->processa_ajax();
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          if ($this->Db)
          {
              $this->Db->Close(); 
          }
          exit;
      }
      if (isset($bprocessa) && "pesq" == $bprocessa)
      {
         $this->processa_busca();
      }
      else
      {
         $this->monta_formulario();
      }
   }

   /**
    * @access  public
    */
   function monta_formulario()
   {
      $this->monta_html_ini();
      $this->monta_cabecalho();
      $this->monta_form();
      $this->monta_html_fim();
   }

   /**
    * @access  public
    */
   function init()
   {
      global $bprocessa;
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
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_api.php", "", "") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("es");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['opcao'] = "igual";
   }

   function processa_ajax()
   {
      global $NM_filters, $NM_filters_del, $nmgp_save_name, $nmgp_save_option, $NM_fields_refresh, $NM_parms_refresh, $Campo_bi, $Opc_bi, $NM_operador, $nmgp_save_origem;
//-- ajax metodos ---
      if ($this->NM_ajax_opcao == "ajax_ch_bi_search")
      {
          ob_end_clean();
          ob_end_clean();
          $Campo_bi = "SC_" . $Campo_bi;
          $this->Ini->process_cond_bi($Opc_bi, $BI_data1, $BI_data2);
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_dia", 'value' => trim(substr($BI_data1, 0, 2)));
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_mes", 'value' => trim(substr($BI_data1, 2, 2)));
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_ano", 'value' => trim(substr($BI_data1, 4, 4)));
          if (strlen($BI_data1) > 8)
          {
              $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_hor", 'value' => trim(substr($BI_data1, 8, 2)));
              $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_min", 'value' => trim(substr($BI_data1, 10, 2)));
              $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_seg", 'value' => trim(substr($BI_data1, 12, 2)));
          }
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_input_2_dia", 'value' => trim(substr($BI_data2, 0, 2)));
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_input_2_mes", 'value' => trim(substr($BI_data2, 2, 2)));
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_input_2_ano", 'value' => trim(substr($BI_data2, 4, 4)));
          if (strlen($BI_data2) > 8)
          {
              $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_input_2_hor", 'value' => trim(substr($BI_data2, 8, 2)));
              $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_input_2_min", 'value' => trim(substr($BI_data2, 10, 2)));
              $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_input_2_seg", 'value' => trim(substr($BI_data2, 12, 2)));
          }
          $this->Arr_result['setVar'][] = array('var' => "ret_bi_opc", 'value' => $Opc_bi);
          $this->Arr_result['setVar'][] = array('var' => "ret_bi_dt", 'value' => $BI_data1);
      }
      if ($this->NM_ajax_opcao == "ajax_refresh_field")
      {
          ob_end_clean();
          ob_end_clean();
          $NM_fields_refresh = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($NM_fields_refresh)) ? sc_convert_encoding($NM_fields_refresh, $_SESSION['scriptcase']['charset'], "UTF-8") : $NM_fields_refresh;
          $NM_parms_refresh  = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($NM_parms_refresh))  ? sc_convert_encoding($NM_parms_refresh,  $_SESSION['scriptcase']['charset'], "UTF-8") : $NM_parms_refresh;
          $NMcmp_refr   = explode("@NMF@", $NM_fields_refresh);
          $NMparms_refr = explode("@NMF@", $NM_parms_refresh);
          foreach ($NMparms_refr as $Cada_cmp)
          {
              $Cada_cmp = explode("#NMF#", $Cada_cmp);
              $Cmp_name = (substr($Cada_cmp[0],0,3) == "SC_") ?  substr($Cada_cmp[0], 3) : $Cada_cmp[0] ;
              $list = array();
              if (substr($Cada_cmp[1], 0, 10) == "_NM_array_")
              {
                  if (substr($Cada_cmp[1], 0, 17) == "_NM_array_#NMARR#")
                  {
                      $Sc_temp = explode("#NMARR#", substr($Cada_cmp[1], 17));
                      foreach ($Sc_temp as $Cada_val)
                      {
                          $list[] = $Cada_val;
                      }
                  }
                  $$Cmp_name = $list;
              }
              else
              {
                  $$Cmp_name = $Cada_cmp[1];
              }
          }
          if (in_array("excentoid", $NMcmp_refr))
          {
              $list = array();
              $nmgp_def_dados = $this->lookup_ajax_excentoid($casetaid);
              foreach ($nmgp_def_dados as $ind => $parms)
              {
                  foreach ($parms as $opt => $val)
                  {
                      $list[] = array('opt' => $opt, 'value' => $val);
                  }
              }
              $this->Arr_result['set_option'][] = array('field' => 'SC_excentoid', 'value' => $list);
          }
      }
      if ($this->NM_ajax_opcao == 'autocomp_operadortlp')
      {
          $operadortlp = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_operadortlp($operadortlp);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
   }
   function lookup_ajax_operadortlp($operadortlp)
   {
      $operadortlp = substr($this->Db->qstr($operadortlp), 1, -1);
            $operadortlp_look = (is_string($operadortlp) ? substr($this->Db->qstr($operadortlp), 1, -1) : $operadortlp); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct OperadorTLP from " . $this->Ini->nm_tabela . " where  OperadorTLP like '%" . $operadortlp . "%' order by OperadorTLP"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_excentoid($casetaid)
   {
      $tmp_pos = (is_string($casetaid)) ? strpos($casetaid, "##@@") : false;
      if ($tmp_pos !== false)
      {
          $casetaid = substr($casetaid, 0, $tmp_pos);
      }
            $excentoid_look = (is_string($excentoid) ? substr($this->Db->qstr($excentoid), 1, -1) : $excentoid); 
      $nmgp_def_dados = array(); 
      $nmgp_def_dados[] = array("" => NM_charset_to_utf8("")); 
      $nm_comando = "SELECT ExcentoID, Dependencia  FROM excentos  WHERE CasetaID = " . peaje_sql_int($casetaid, '0') . " ORDER BY Dependencia";
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['excentoid'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['excentoid'][] = trim($rs->fields[0]);
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp2 = NM_charset_to_utf8(trim($rs->fields[1]));
            $nmgp_def_dados[] = array($cmp1 . "##@@" . $cmp2 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   

   /**
    * @access  public
    */
   function processa_busca()
   {
      $this->inicializa_vars();
      $this->trata_campos();
      if ($this->NM_ajax_flag && ($this->NM_ajax_opcao == "ajax_grid_search" || $this->NM_ajax_opcao == "ajax_grid_search_change_fil"))
      {
          $this->finaliza_resultado_ajax();
          return;
      }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->monta_formulario();
      }
      else
      {
          $this->finaliza_resultado();
      }
   }

   /**
    * @access  public
    */
   function and_or()
   {
      $posWhere = strpos(strtolower($this->comando), "where");
      if (FALSE === $posWhere)
      {
         $this->comando     .= " where (";
         $this->comando_sum .= " and (";
         $this->comando_fim  = " ) ";
      }
      if ($this->comando_ini == "ini")
      {
          if (FALSE !== $posWhere)
          {
              $this->comando     .= " and ( ";
              $this->comando_sum .= " and ( ";
              $this->comando_fim  = " ) ";
          }
         $this->comando_ini  = "";
      }
      elseif ("or" == $this->NM_operador)
      {
         $this->comando        .= " or ";
         $this->comando_sum    .= " or ";
         $this->comando_filtro .= " or ";
      }
      else
      {
         $this->comando        .= " and ";
         $this->comando_sum    .= " and ";
         $this->comando_filtro .= " and ";
      }
   }

   /**
    * @access  public
    * @param  string  $nome  
    * @param  string  $condicao  
    * @param  mixed  $campo  
    * @param  mixed  $campo2  
    * @param  string  $nome_campo  
    * @param  string  $tp_campo  
    * @global  array  $nmgp_tab_label  
    */
   function monta_condicao($nome, $condicao, $campo, $campo2 = "", $nome_campo="", $tp_campo="", $tp_unaccent=false)
   {
      global $nmgp_tab_label;
      $condicao   = strtoupper($condicao);
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $Nm_numeric = array();
      $nm_esp_postgres = array();
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_accent = $this->Ini->Nm_accent_no;
      if ($tp_unaccent) {
          $Nm_accent = $this->Ini->Nm_accent_yes;
      }
      $Nm_datas[] = "FechaOperacion";$Nm_datas[] = "FechaTurno";$Nm_datas[] = "HoraEvento";$Nm_datas[] = "FechaEnvio";$Nm_datas[] = "FechaModificadoANA";$Nm_datas[] = "FechaMarcacionCR";$Nm_datas[] = "FechaDeteccionECT";$Nm_datas[] = "FechaDeteccionEAP";$Nm_numeric[] = "consecutivo";$Nm_numeric[] = "turnoid";$Nm_numeric[] = "tramoid";$Nm_numeric[] = "carrilid";$Nm_numeric[] = "secuencial";$Nm_numeric[] = "folio";$Nm_numeric[] = "importe_ect";$Nm_numeric[] = "cantidadeje_ect";$Nm_numeric[] = "tarifaee_ect";$Nm_numeric[] = "importe_cr";$Nm_numeric[] = "cantidadeje_cr";$Nm_numeric[] = "tarifaee_cr";$Nm_numeric[] = "importe_eap";$Nm_numeric[] = "cantidadeje_eap";$Nm_numeric[] = "tarifaee_eap";$Nm_numeric[] = "excentoid";$Nm_numeric[] = "usuarioid";$Nm_numeric[] = "importe_ana";$Nm_numeric[] = "estatusana";$Nm_numeric[] = "cantidadeje_ana";$Nm_numeric[] = "tarifaee_ana";$Nm_numeric[] = "eludidoextra";$Nm_numeric[] = "revisado";$Nm_numeric[] = "tramoidorigen";$Nm_numeric[] = "operacionid";$Nm_numeric[] = "cancelado";$Nm_numeric[] = "estatustlp";$Nm_numeric[] = "generadoxml";$Nm_numeric[] = "importe";$Nm_numeric[] = "detectadospreid";$Nm_numeric[] = "";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
          if ($condicao == "EP" || $condicao == "NE")
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$campo_join]);
              return;
          }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['decimal_db'] == ".")
         {
            $nm_aspas  = "";
            $nm_aspas1 = "";
         }
         if ($condicao != "IN")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['decimal_db'] == ".")
            {
               $campo  = str_replace(",", ".", $campo);
               $campo2 = str_replace(",", ".", $campo2);
            }
         }
      }
      $Nm_datas[] = "FechaOperacion";$Nm_datas[] = "FechaTurno";$Nm_datas[] = "HoraEvento";$Nm_datas[] = "FechaEnvio";$Nm_datas[] = "FechaModificadoANA";$Nm_datas[] = "FechaMarcacionCR";$Nm_datas[] = "FechaDeteccionECT";$Nm_datas[] = "FechaDeteccionEAP";
      if (in_array($campo_join, $Nm_datas))
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['SC_sep_date']))
          {
              $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['SC_sep_date'];
              $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['SC_sep_date1'];
          }
      }
      if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
      {
         return;
      }
      else
      {
         $tmp_pos = (is_string($campo)) ? strpos($campo, "##@@") : false;
         if ($tmp_pos === false)
         {
             $res_lookup = $campo;
         }
         else
         {
             $res_lookup = substr($campo, $tmp_pos + 4);
             $campo = substr($campo, 0, $tmp_pos);
             if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
             {
                 return;
             }
         }
         $tmp_pos = (is_string($this->cmp_formatado[$nome_campo])) ? strpos($this->cmp_formatado[$nome_campo], "##@@") : false;
         if ($tmp_pos !== false)
         {
             $this->cmp_formatado[$nome_campo] = substr($this->cmp_formatado[$nome_campo], $tmp_pos + 4);
         }
         $this->and_or();
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $campo2 = substr($this->Db->qstr($campo2), 1, -1);
         $nome_sum = "aforo.$nome";
         if ($tp_campo == "TIMESTAMP")
         {
             $tp_campo = "DATETIME";
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD hh24:mi:ss')";
             }
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD')";
             }
         }
         elseif (substr($tp_campo, 0, 4) == "TIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'hh24:mi:ss')";
             }
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS VARCHAR)";
             $nome_sum = "CAST ($nome_sum AS VARCHAR)";
         }
         if ($tp_campo == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "convert(char(10),$nome,121)";
                 $nome_sum = "convert(char(10),$nome_sum,121)";
             }
         }
         if ($tp_campo == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "convert(char(19),$nome,121)";
                 $nome_sum = "convert(char(19),$nome_sum,121)";
             }
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !$this->Date_part)
         {
             $nome     = "TO_DATE(TO_CHAR($nome, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $nome_sum = "TO_DATE(TO_CHAR($nome_sum, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $tp_campo = "DATETIME";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix) && !$this->Date_part)
         {
             $nome     = "EXTEND($nome, YEAR TO FRACTION)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO FRACTION)";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix) && !$this->Date_part)
         {
             $nome     = "EXTEND($nome, YEAR TO DAY)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO DAY)";
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS VARCHAR(255))";
             $nome_sum = "CAST ($nome_sum AS VARCHAR(255))";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD hh24:mi:ss')";
             }
         }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD')";
             }
         }
         switch ($condicao)
         {
            case "EQ":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower. " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "II":     // 
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
               {
                   $op_all       = " ilike ";
                   $nm_ini_lower = "";
                   $nm_fim_lower = "";
               }
               else
               {
                   $op_all = " like ";
               }
               $this->comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_all . $nm_ini_lower . "'" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
               $this->comando_sum    .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome_sum . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_all . $nm_ini_lower . "'" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
               $this->comando_filtro .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_all . $nm_ini_lower . "'" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo];
            break;
             case "QP";     // 
             case "NP";     // 
                $concat = " " . $this->NM_operador . " ";
                if ($condicao == "QP")
                {
                    $op_all    = " #sc_like_# ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_like'];
                }
                else
                {
                    $op_all    = " not #sc_like_# ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_not_like'];
                }
               $NM_cond    = "";
               $NM_cmd     = "";
               $NM_cmd_sum = "";
               if (substr($tp_campo, 0, 4) == "DATE" && $this->Date_part)
               {
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%Y', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%Y', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('year' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('year' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'YYYY')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'YYYY')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(year, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(year, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "year (" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "year (" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "year(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "year(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%m', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%m', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('month' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('month' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MM')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MM')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(month, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(month, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "month (" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "month (" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "month(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "month(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%d', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%d', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('day' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('day' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'DD')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'DD')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(day, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(day, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "DAYOFMONTH(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "DAYOFMONTH(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "day(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "day(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                   }
               }
               if (strpos($tp_campo, "TIME") !== false && $this->Date_part)
               {
                   if ($this->NM_data_qp['hor'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_time'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['hor'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%H', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%H', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('hour' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('hour' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'HH24')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'HH24')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(hour, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(hour, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "hour(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "hour(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "hour(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "hour(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['min'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mint'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['min'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%M', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%M', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('minute' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('minute' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MI')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MI')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(minute, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(minute, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "minute(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "minute(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "minute(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "minute(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['seg'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_scnd'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['seg'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%S', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%S', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('second' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('second' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'SS')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'SS')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(second, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(second, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "second(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "second(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "second(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "second(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                   }
               }
               if ($this->Date_part)
               {
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . ": " . $NM_cond . "##*@@";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $NM_cond;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $NM_cond;
                   }
               }
               else
               {
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
                   {
                       $op_all       = str_replace("#sc_like_#", "ilike", $op_all);
                       $nm_ini_lower = "";
                       $nm_fim_lower = "";
                   }
                   else
                   {
                       $op_all = str_replace("#sc_like_#", "like", $op_all);
                   }
                   $this->comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_all . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
                   $this->comando_sum    .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome_sum . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_all . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
                   $this->comando_filtro .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_all . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $lang_like . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $lang_like . " " . $this->cmp_formatado[$nome_campo];
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $lang_like . " " . $this->cmp_formatado[$nome_campo];
               }
            break;
            case "DF":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo];
            break;
            case "BW":     // 
               $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"];
            break;
            case "IN":     // 
               $nm_sc_valores = explode(",", $campo);
               $cond_str  = "";
               $nm_cond   = "";
               $cond_descr  = "";
               $count_descr = 0;
               $end_descr   = false;
               $lim_descr   = 15;
               $lang_descr  = strlen($this->Ini->Nm_lang['lang_srch_orr_cond']);
               if (!empty($nm_sc_valores))
               {
                   foreach ($nm_sc_valores as $nm_sc_valor)
                   {
                      if (in_array($campo_join, $Nm_numeric) && substr_count($nm_sc_valor, ".") > 1)
                      {
                         $nm_sc_valor = str_replace(".", "", $nm_sc_valor);
                      }
                      if ("" != $cond_str)
                      {
                         $cond_str .= ",";
                         $nm_cond  .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
                      }
                      $cond_str .= $nm_ini_lower . $nm_aspas . $nm_sc_valor . $nm_aspas1 . $nm_fim_lower;
                      $nm_cond  .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                      if (((strlen($cond_descr) + strlen($nm_sc_valor) + $lang_descr) < $lim_descr) || empty($cond_descr))
                      {
                          $cond_descr .= (empty($cond_descr)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
                          $cond_descr .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                          $count_descr++;
                      }
                      elseif (!$end_descr)
                      {
                          $cond_descr .= " +" . (count($nm_sc_valores) - $count_descr);
                          $end_descr = true;
                      };
                   }
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $cond_descr;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond;
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_null'];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_null'];
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_nnul'];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_nnul'];
            break;
            case "EP":     // 
               $this->comando        .= " $nome = '' ";
               $this->comando_sum    .= " $nome_sum = '' ";
               $this->comando_filtro .= " $nome = '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_empty'] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_empty'];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_empty'];
            break;
            case "NE":     // 
               $this->comando        .= " $nome <> '' ";
               $this->comando_sum    .= " $nome_sum <> '' ";
               $this->comando_filtro .= " $nome <> '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['label'] = $nmgp_tab_label[$nome_campo];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['descr'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_nempty'];
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'][$nome_campo]['hint'] = $nmgp_tab_label[$nome_campo] . ": " . $this->Ini->Nm_lang['lang_srch_nempty'];
            break;
         }
      }
   }

   function nm_prep_date(&$val, $tp, $tsql, &$cond, $format_nd, $tp_nd)
   {
       $fill_dt = false;
       if ($tsql == "TIMESTAMP")
       {
           $tsql = "DATETIME";
       }
       $cond = strtoupper($cond);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && $tp != "ND")
       {
           if ($cond == "EP")
           {
               $cond = "NU";
           }
           if ($cond == "NE")
           {
               $cond = "NN";
           }
       }
       if ($cond == "NU" || $cond == "NN" || $cond == "EP" || $cond == "NE")
       {
           $val    = array();
           $val[0] = "";
           return;
       }
       if ($cond != "II" && $cond != "QP" && $cond != "NP")
       {
           $fill_dt = true;
       }
       if (substr($cond, 0, 3) == "BI_")
       {
           $this->Ini->process_cond_bi($cond, $BI_data1, $BI_data2);
           $cond = strtoupper($cond);
           if ($tp == "ND")
           {
               $out_dt1 = $format_nd;
               $out_dt1 = str_replace("yyyy", substr($BI_data1, 4, 4), $out_dt1);
               $out_dt1 = str_replace("mm",   substr($BI_data1, 2, 2), $out_dt1);
               $out_dt1 = str_replace("dd",   substr($BI_data1, 0, 2), $out_dt1);
               $out_dt2 = $format_nd;
               $out_dt2 = str_replace("yyyy", substr($BI_data2, 4, 4), $out_dt2);
               $out_dt2 = str_replace("mm",   substr($BI_data2, 2, 2), $out_dt2);
               $out_dt2 = str_replace("dd",   substr($BI_data2, 0, 2), $out_dt2);
               if ($tp_nd == "datahora")
               {
                   if ($cond != "BW")
                   {
                       $out_dt2  = $out_dt1;
                       $BI_data2 = $BI_data1;
                       $cond     = "BW";
                   }
                   if (strlen($BI_data1) < 14)
                   {
                       $out_dt1 = str_replace("hh",   "00", $out_dt1);
                       $out_dt1 = str_replace("ii",   "00", $out_dt1);
                       $out_dt1 = str_replace("ss",   "00", $out_dt1);
                   }
                   else
                   {
                       $out_dt1 = str_replace("hh",   substr($BI_data1,  8, 2), $out_dt1);
                       $out_dt1 = str_replace("ii",   substr($BI_data1, 10, 2), $out_dt1);
                       $out_dt1 = str_replace("ss",   substr($BI_data1, 12, 2), $out_dt1);
                   }
                   if (strlen($BI_data2) < 14)
                   {
                       $out_dt2 = str_replace("hh",   "23", $out_dt2);
                       $out_dt2 = str_replace("ii",   "59", $out_dt2);
                       $out_dt2 = str_replace("ss",   "59", $out_dt2);
                   }
                   else
                   {
                       $out_dt2 = str_replace("hh",   substr($BI_data2,  8, 2), $out_dt2);
                       $out_dt2 = str_replace("ii",   substr($BI_data2, 10, 2), $out_dt2);
                       $out_dt2 = str_replace("ss",   substr($BI_data2, 12, 2), $out_dt2);
                   }
               }
           }
           else
           {
               $out_dt1 = substr($BI_data1, 4, 4) . "-" . substr($BI_data1, 2, 2) . "-" . substr($BI_data1, 0, 2);
               $out_dt2 = substr($BI_data2, 4, 4) . "-" . substr($BI_data2, 2, 2) . "-" . substr($BI_data2, 0, 2);
               if ($tsql == "DATETIME")
               {
                   if ($cond != "BW")
                   {
                       $out_dt2  = $out_dt1;
                       $BI_data2 = $BI_data1;
                       $cond     = "BW";
                   }
                   if (strlen($BI_data1) < 14)
                   {
                      $out_dt1 .= " 00:00:00";
                   }
                   else
                   {
                       $out_dt1 .= " " . substr($BI_data1, 8, 2) . ":" . substr($BI_data1, 10, 2) . ":" . substr($BI_data1, 12, 2);
                   }
                   if (strlen($BI_data2) < 14)
                   {
                      $out_dt2 .= " 23:59:59";
                   }
                   else
                   {
                       $out_dt2 .= " " . substr($BI_data2, 8, 2) . ":" . substr($BI_data2, 10, 2) . ":" . substr($BI_data2, 12, 2);
                   }
               }
           }
           $val = array();
           $val[0] = $out_dt1;
           $val[1] = $out_dt2;
           return;
       }
       if ($fill_dt)
       {
           $val[0]['dia'] = (!empty($val[0]['dia']) && strlen($val[0]['dia']) == 1) ? "0" . $val[0]['dia'] : $val[0]['dia'];
           $val[0]['mes'] = (!empty($val[0]['mes']) && strlen($val[0]['mes']) == 1) ? "0" . $val[0]['mes'] : $val[0]['mes'];
           if ($tp == "DH")
           {
               $val[0]['hor'] = (!empty($val[0]['hor']) && strlen($val[0]['hor']) == 1) ? "0" . $val[0]['hor'] : $val[0]['hor'];
               $val[0]['min'] = (!empty($val[0]['min']) && strlen($val[0]['min']) == 1) ? "0" . $val[0]['min'] : $val[0]['min'];
               $val[0]['seg'] = (!empty($val[0]['seg']) && strlen($val[0]['seg']) == 1) ? "0" . $val[0]['seg'] : $val[0]['seg'];
           }
           if ($cond == "BW")
           {
               $val[1]['dia'] = (!empty($val[1]['dia']) && strlen($val[1]['dia']) == 1) ? "0" . $val[1]['dia'] : $val[1]['dia'];
               $val[1]['mes'] = (!empty($val[1]['mes']) && strlen($val[1]['mes']) == 1) ? "0" . $val[1]['mes'] : $val[1]['mes'];
               if ($tp == "DH")
               {
                   $val[1]['hor'] = (!empty($val[1]['hor']) && strlen($val[1]['hor']) == 1) ? "0" . $val[1]['hor'] : $val[1]['hor'];
                   $val[1]['min'] = (!empty($val[1]['min']) && strlen($val[1]['min']) == 1) ? "0" . $val[1]['min'] : $val[1]['min'];
                   $val[1]['seg'] = (!empty($val[1]['seg']) && strlen($val[1]['seg']) == 1) ? "0" . $val[1]['seg'] : $val[1]['seg'];
               }
           }
       }
       if ($cond == "BW")
       {
           $this->NM_data_1 = array();
           $this->NM_data_1['ano'] = (isset($val[0]['ano']) && !empty($val[0]['ano'])) ? $val[0]['ano'] : "____";
           $this->NM_data_1['mes'] = (isset($val[0]['mes']) && !empty($val[0]['mes'])) ? $val[0]['mes'] : "__";
           $this->NM_data_1['dia'] = (isset($val[0]['dia']) && !empty($val[0]['dia'])) ? $val[0]['dia'] : "__";
           $this->NM_data_1['hor'] = (isset($val[0]['hor']) && !empty($val[0]['hor'])) ? $val[0]['hor'] : "__";
           $this->NM_data_1['min'] = (isset($val[0]['min']) && !empty($val[0]['min'])) ? $val[0]['min'] : "__";
           $this->NM_data_1['seg'] = (isset($val[0]['seg']) && !empty($val[0]['seg'])) ? $val[0]['seg'] : "__";
           $this->data_menor($this->NM_data_1);
           $this->NM_data_2 = array();
           $this->NM_data_2['ano'] = (isset($val[1]['ano']) && !empty($val[1]['ano'])) ? $val[1]['ano'] : "____";
           $this->NM_data_2['mes'] = (isset($val[1]['mes']) && !empty($val[1]['mes'])) ? $val[1]['mes'] : "__";
           $this->NM_data_2['dia'] = (isset($val[1]['dia']) && !empty($val[1]['dia'])) ? $val[1]['dia'] : "__";
           $this->NM_data_2['hor'] = (isset($val[1]['hor']) && !empty($val[1]['hor'])) ? $val[1]['hor'] : "__";
           $this->NM_data_2['min'] = (isset($val[1]['min']) && !empty($val[1]['min'])) ? $val[1]['min'] : "__";
           $this->NM_data_2['seg'] = (isset($val[1]['seg']) && !empty($val[1]['seg'])) ? $val[1]['seg'] : "__";
           $this->data_maior($this->NM_data_2);
           $val = array();
           if ($tp == "ND")
           {
               $out_dt1 = $format_nd;
               $out_dt1 = str_replace("yyyy", $this->NM_data_1['ano'], $out_dt1);
               $out_dt1 = str_replace("mm",   $this->NM_data_1['mes'], $out_dt1);
               $out_dt1 = str_replace("dd",   $this->NM_data_1['dia'], $out_dt1);
               $out_dt1 = str_replace("hh",   "", $out_dt1);
               $out_dt1 = str_replace("ii",   "", $out_dt1);
               $out_dt1 = str_replace("ss",   "", $out_dt1);
               $out_dt2 = $format_nd;
               $out_dt2 = str_replace("yyyy", $this->NM_data_2['ano'], $out_dt2);
               $out_dt2 = str_replace("mm",   $this->NM_data_2['mes'], $out_dt2);
               $out_dt2 = str_replace("dd",   $this->NM_data_2['dia'], $out_dt2);
               $out_dt2 = str_replace("hh",   "", $out_dt2);
               $out_dt2 = str_replace("ii",   "", $out_dt2);
               $out_dt2 = str_replace("ss",   "", $out_dt2);
               $val[0] = $out_dt1;
               $val[1] = $out_dt2;
               return;
           }
           if ($tsql == "TIME")
           {
               $val[0] = $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
               $val[1] = $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
           }
           elseif (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] = $this->NM_data_1['ano'] . "-" . $this->NM_data_1['mes'] . "-" . $this->NM_data_1['dia'];
               $val[1] = $this->NM_data_2['ano'] . "-" . $this->NM_data_2['mes'] . "-" . $this->NM_data_2['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " " . $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
                   $val[1] .= " " . $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
               }
           }
           return;
       }
       $this->NM_data_qp = array();
       $this->NM_data_qp['ano'] = (isset($val[0]['ano']) && $val[0]['ano'] != "") ? $val[0]['ano'] : "____";
       $this->NM_data_qp['mes'] = (isset($val[0]['mes']) && $val[0]['mes'] != "") ? $val[0]['mes'] : "__";
       $this->NM_data_qp['dia'] = (isset($val[0]['dia']) && $val[0]['dia'] != "") ? $val[0]['dia'] : "__";
       $this->NM_data_qp['hor'] = (isset($val[0]['hor']) && $val[0]['hor'] != "") ? $val[0]['hor'] : "__";
       $this->NM_data_qp['min'] = (isset($val[0]['min']) && $val[0]['min'] != "") ? $val[0]['min'] : "__";
       $this->NM_data_qp['seg'] = (isset($val[0]['seg']) && $val[0]['seg'] != "") ? $val[0]['seg'] : "__";
       if ($tp != "ND" && ($cond == "LE" || $cond == "LT" || $cond == "GE" || $cond == "GT"))
       {
           $count_fill = 0;
           foreach ($this->NM_data_qp as $x => $tx)
           {
               if (substr($tx, 0, 2) != "__")
               {
                   $count_fill++;
               }
           }
           if ($count_fill > 1)
           {
               if ($cond == "LE" || $cond == "GT")
               {
                   $this->data_maior($this->NM_data_qp);
               }
               else
               {
                   $this->data_menor($this->NM_data_qp);
               }
               if ($tsql == "TIME")
               {
                   $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
               }
               elseif (substr($tsql, 0, 4) == "DATE")
               {
                   $val[0] = $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
                   if (strpos($tsql, "TIME") !== false)
                   {
                       $val[0] .= " " . $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
                   }
               }
               return;
           }
       }
       foreach ($this->NM_data_qp as $x => $tx)
       {
           if (substr($tx, 0, 2) == "__" && ($x == "dia" || $x == "mes" || $x == "ano"))
           {
               if (substr($tsql, 0, 4) == "DATE")
               {
                   $this->Date_part = true;
                   break;
               }
           }
           if (substr($tx, 0, 2) == "__" && ($x == "hor" || $x == "min" || $x == "seg"))
           {
               if (strpos($tsql, "TIME") !== false && ($tp == "DH" || ($tp == "DT" && $cond != "LE" && $cond != "LT" && $cond != "GE" && $cond != "GT")))
               {
                   $this->Date_part = true;
                   break;
               }
           }
       }
       if ($this->Date_part)
       {
           $this->Ini_date_part = "";
           $this->End_date_part = "";
           $this->Ini_date_char = "";
           $this->End_date_char = "";
           if (isset($this->Ini->nm_bases_sqlite) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
           {
               $this->Ini_date_part = "'";
               $this->End_date_part = "'";
           }
           if ($tp != "ND")
           {
               if ($cond == "EQ")
               {
                   $this->Operador_date_part = " = ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
               }
               elseif ($cond == "II")
               {
                   $this->Operador_date_part = " like ";
                   $this->Ini_date_part = "'";
                   $this->End_date_part = "%'";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_strt'];
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
               elseif ($cond == "DF")
               {
                   $this->Operador_date_part = " <> ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
               }
               elseif ($cond == "GT")
               {
                   $this->Operador_date_part = " > ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['pesq_cond_maior'];
               }
               elseif ($cond == "GE")
               {
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_grtr_equl'];
                   $this->Operador_date_part = " >= ";
               }
               elseif ($cond == "LT")
               {
                   $this->Operador_date_part = " < ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less'];
               }
               elseif ($cond == "LE")
               {
                   $this->Operador_date_part = " <= ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less_equl'];
               }
               elseif ($cond == "NP")
               {
                   $this->Operador_date_part = " not like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
               else
               {
                   $this->Operador_date_part = " like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
           }
           if ($cond == "DF")
           {
               $cond = "NP";
           }
           if ($cond != "NP")
           {
               $cond = "QP";
           }
       }
       $val = array();
       if ($tp != "ND" && ($cond == "QP" || $cond == "NP"))
       {
           $val[0] = "";
           if (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " ";
               }
           }
           if (strpos($tsql, "TIME") !== false)
           {
               $val[0] .= $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           }
           return;
       }
       if ($cond == "II" || $cond == "DF" || $cond == "EQ" || $cond == "LT" || $cond == "GE")
       {
           $this->data_menor($this->NM_data_qp);
       }
       else
       {
           $this->data_maior($this->NM_data_qp);
       }
       if ($tsql == "TIME")
       {
           $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           return;
       }
       $format_sql = "";
       if (substr($tsql, 0, 4) == "DATE")
       {
           $format_sql .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
           if (strpos($tsql, "TIME") !== false)
           {
               $format_sql .= " ";
           }
       }
       if (strpos($tsql, "TIME") !== false)
       {
           $format_sql .=  $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
       }
       if ($tp != "ND")
       {
           $val[0] = $format_sql;
           return;
       }
       if ($tp == "ND")
       {
           $format_nd = str_replace("yyyy", $this->NM_data_qp['ano'], $format_nd);
           $format_nd = str_replace("mm",   $this->NM_data_qp['mes'], $format_nd);
           $format_nd = str_replace("dd",   $this->NM_data_qp['dia'], $format_nd);
           $format_nd = str_replace("hh",   $this->NM_data_qp['hor'], $format_nd);
           $format_nd = str_replace("ii",   $this->NM_data_qp['min'], $format_nd);
           $format_nd = str_replace("ss",   $this->NM_data_qp['seg'], $format_nd);
           $val[0] = $format_nd;
           return;
       }
   }
   function data_menor(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0001" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
       $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   function data_maior(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
       if ("__" == $data_arr["dia"])
       {
           $data_arr["dia"] = "31";
           if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
           {
               $data_arr["dia"] = 30;
           }
           elseif ($data_arr["mes"] == "02")
           { 
                if  ($data_arr["ano"] % 4 == 0)
                {
                     $data_arr["dia"] = 29;
                }
                else 
                {
                     $data_arr["dia"] = 28;
                }
           }
       }
   }

   /**
    * @access  public
    * @param  string  $nm_data_hora  
    */
   function limpa_dt_hor_pesq(&$nm_data_hora)
   {
      $nm_data_hora = str_replace("Y", "", $nm_data_hora); 
      $nm_data_hora = str_replace("M", "", $nm_data_hora); 
      $nm_data_hora = str_replace("D", "", $nm_data_hora); 
      $nm_data_hora = str_replace("H", "", $nm_data_hora); 
      $nm_data_hora = str_replace("I", "", $nm_data_hora); 
      $nm_data_hora = str_replace("S", "", $nm_data_hora); 
      $tmp_pos = strpos($nm_data_hora, "--");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("--", "-", $nm_data_hora); 
      }
      $tmp_pos = strpos($nm_data_hora, "::");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("::", ":", $nm_data_hora); 
      }
   }

   /**
    * @access  public
    */
   function retorna_pesq()
   {
      global $nm_apl_dependente;
   $NM_retorno = "./";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
 <TITLE> aforo</TITLE>
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
</HEAD>
<BODY id="grid_search" class="scGridPage">
<FORM style="display:none;" name="form_ok" method="POST" action="<?php echo $NM_retorno; ?>" target="_self">
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="pesq"> 
</FORM>
<SCRIPT type="text/javascript">
 document.form_ok.submit();
</SCRIPT>
</BODY>
</HTML>
<?php
}

   /**
    * @access  public
    */
   function monta_html_ini()
   {
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE> aforo</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/scInput.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput2.js"></script>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Str_btn_filter_css ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>grid_aforo/grid_aforo_fil_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
</HEAD>
<?php
$vertical_center = '';
?>
<BODY id="grid_search" class="scFilterPage" style="<?php echo $vertical_center ?>">
<?php echo $this->Ini->Ajax_result_set ?>
<SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>"></SCRIPT>
   <script type="text/javascript">
     var applicationKeys = '';
     var hotkeyList = '';
     function execHotKey(e, h) {
         var hotkey_fired = false
         switch (true) {
         }
         if (hotkey_fired) {
             e.preventDefault();
             return false;
         } else {
             return true;
         }
     }
   </script>
   <script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
   <script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
 <script type="text/javascript" src="grid_aforo_ajax_search.js"></script>
 <script type="text/javascript" src="grid_aforo_ajax.js"></script>
 <script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
   var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax ?>';
   var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax ?>';
   var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax ?>';
   var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax ?>';
 </script>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
$Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo $Cod_Btn ?>&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script type="text/javascript" src="grid_aforo_message.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_sweetalert.css" />
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['grid_aforo']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['grid_aforo']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonText  = $this->Ini->Nm_lang['lang_btns_cfrm'];
$cancelButtonText   = $this->Ini->Nm_lang['lang_btns_cncl'];
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
    $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
    $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
    $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
    $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
    $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
    $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
    $confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
    $cancelButtonFAPos = 'text_right';
}
?>
<script type="text/javascript">
  var scSweetAlertConfirmButton = "<?php echo $confirmButtonClass ?>";
  var scSweetAlertCancelButton = "<?php echo $cancelButtonClass ?>";
  var scSweetAlertConfirmButtonText = "<?php echo $confirmButtonText ?>";
  var scSweetAlertCancelButtonText = "<?php echo $cancelButtonText ?>";
  var scSweetAlertConfirmButtonFA = "<?php echo $confirmButtonFA ?>";
  var scSweetAlertCancelButtonFA = "<?php echo $cancelButtonFA ?>";
  var scSweetAlertConfirmButtonFAPos = "<?php echo $confirmButtonFAPos ?>";
  var scSweetAlertCancelButtonFAPos = "<?php echo $cancelButtonFAPos ?>";
</script>
<script type="text/javascript">
$(function() {
<?php
if ((isset($this->nm_mens_alert) && count($this->nm_mens_alert)) || (isset($this->Ini->nm_mens_alert) && count($this->Ini->nm_mens_alert))) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['ajax_nav'])
           { 
               $this->Ini->Arr_result['AlertJS'][] = NM_charset_to_utf8($mensagem);
               $this->Ini->Arr_result['AlertJSParam'][] = $alertParams;
           } 
           else 
           { 
?>
       scJs_alert('<?php echo $mensagem ?>', <?php echo $jsonParams ?>);
<?php
           } 
       }
   }
}
?>
});
</script>
<?php
if ('' != $this->Campos_Mens_erro) {
?>
<script type="text/javascript">
$(function() {
	_nmAjaxShowMessage({title: "<?php echo $this->Ini->Nm_lang['lang_errm_errt']; ?>", message: "<?php echo $this->Campos_Mens_erro ?>", isModal: false, timeout: "", showButton: true, buttonLabel: "", topPos: "", leftPos: "", width: "", height: "", redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: false, isToast: false, toastPos: "", type: "error"});
});
</script>
<?php
}
?>
<script type="text/javascript" src="grid_aforo_message.js"></script>
 <SCRIPT type="text/javascript">

<?php
if (is_file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js"))
{
    $Tb_err_js = file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js");
    foreach ($Tb_err_js as $Lines)
    {
        if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Lines = sc_convert_encoding($Lines, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        echo $Lines;
    }
}
 $Msg_Inval = "Inv�lido";
 if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
 {
    $Msg_Inval = sc_convert_encoding($Msg_Inval, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
var SC_crit_inv = "<?php echo $Msg_Inval ?>";
var nmdg_Form = "F1";

function scJQCalendarAdd() {
  $("#sc_fechaoperacion_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_fechaoperacion_dia').value + '/';
          var_dt_ini += document.getElementById('SC_fechaoperacion_mes').value + '/';
          var_dt_ini += document.getElementById('SC_fechaoperacion_ano').value;
          document.getElementById('sc_fechaoperacion_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_fechaoperacion_dia').value = aParts[0];
          document.getElementById('SC_fechaoperacion_mes').value = aParts[1];
          document.getElementById('SC_fechaoperacion_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_fechaoperacion_jq2").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_fechaoperacion_input_2_dia').value + '/';
          var_dt_ini += document.getElementById('SC_fechaoperacion_input_2_mes').value + '/';
          var_dt_ini += document.getElementById('SC_fechaoperacion_input_2_ano').value;
          document.getElementById('sc_fechaoperacion_jq2').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_fechaoperacion_input_2_dia').value = aParts[0];
          document.getElementById('SC_fechaoperacion_input_2_mes').value = aParts[1];
          document.getElementById('SC_fechaoperacion_input_2_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd


 $(function() {

   SC_carga_evt_jquery();
   scLoadScInput('input:text.sc-js-input');
   scJQCalendarAdd('');
 });
 function nm_campos_between(nm_campo, nm_cond, nm_nome_obj)
 {
  opc = nm_cond.value;
  if (opc.substring(0, 3) == "bi_")
  {
      xx = eval("document.getElementById('opc_bi_TP_" + nm_nome_obj + "').style.display = 'none'");
      ajax_ch_bi_search(nm_nome_obj, nm_cond.value);
  }
  else
  {
      if (nm_nome_obj == "fechaoperacion")
      {
          xx = eval("document.getElementById('Nm_bi_dados_" + nm_nome_obj + "').style.display = 'none'");
          xx = eval("document.getElementById('opc_bi_TP_" + nm_nome_obj + "').style.display = ''");
      }
  }
  if (nm_cond.value == "bw")
  {
   nm_campo.style.display = "";
  }
  else
  {
    if (nm_campo)
    {
      nm_campo.style.display = "none";
    }
  }
  if (document.getElementById('id_hide_' + nm_nome_obj))
  {
      if (nm_cond.value == "nu" || nm_cond.value == "nn" || nm_cond.value == "ep" || nm_cond.value == "ne")
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = 'none';
      }
      else
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = '';
      }
  }
 }
 function nm_refresh_casetaid(Proc_on)
 {
   var parms  = "";
   var fields = "excentoid";
   parms += 'casetaid#NMF#' + search_get_select('SC_casetaid') + '@NMF@';
   ajax_refresh_field(fields, parms, Proc_on);
 }
 function search_get_select(obj_id)
 {
    var index = document.getElementById(obj_id).selectedIndex;
    if (index != -1) {
        return document.getElementById(obj_id).options[index].value;
    }
    else {
        return '';
    }
 }
 function search_get_selmult(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
        if (obj[iSelect].selected)
        {
            val += "#NMARR#" + obj[iSelect].value;
        }
    }
    return val;
 }
 function search_get_Dselelect(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
         val += "#NMARR#" + obj[iSelect].value;
    }
    return val;
 }
 function search_get_radio(obj_id)
 {
    var val  = "";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       for (iRadio = 0; iRadio < obj.length; iRadio++) {
           if (obj[iRadio].checked) {
               val = obj[iRadio].value;
           }
       }
    }
    return val;
 }
 function search_get_checkbox(obj_id)
 {
    var val  = "_NM_array_";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       if (!obj.length) {
           if (obj.checked) {
               val += "#NMARR#" + obj.value;
           }
       }
       else {
           for (iCheck = 0; iCheck < obj.length; iCheck++) {
               if (obj[iCheck].checked) {
                   val += "#NMARR#" + obj[iCheck].value;
               }
           }
       }
    }
    return val;
 }
 function search_get_text(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return (obj) ? obj.value : '';
 }
 function search_get_title(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return (obj) ? obj.title : '';
 }
 function search_get_sel_txt(obj_id)
 {
    var val = "";
    obj_part  = document.getElementById(obj_id);
    if (obj_part && obj_part.type.substr(0, 6) == 'select')
    {
        val = search_get_select(obj_id);
    }
    else
    {
        val = (obj_part) ? obj_part.value : '';
    }
    return val;
 }
 function search_get_html(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return obj.innerHTML;
 }
function nm_open_popup(parms)
{
    NovaJanela = window.open (parms, '', 'resizable, scrollbars');
}
 </SCRIPT>
<script type="text/javascript">
 $(function() {
   scClass = $("#id_ac_operadortlp").attr('class').split(' ');
   scClass = scClass[ scClass.length-1 ];
   $("#id_ac_operadortlp").autocomplete({
     minLength: 1,
     classes: { 'ui-autocomplete': scClass + 'Ac' },
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_operadortlp",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_operadortlp").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_operadortlp").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_operadortlp").val( $(this).val() );
       }
     }
   });
 });
</script>
 <FORM name="F1" action="./" method="post" target="_self"> 
 <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <div id="idJSSpecChar" style="display:none;"></div>
 <div id="id_div_process" style="display: none; position: absolute"><table class="scFilterTable"><tr><td class="scFilterLabelOdd"><?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</td></tr></table></div>
 <div id="id_fatal_error" class="scFilterFieldOdd" style="display:none; position: absolute"></div>
<TABLE id="main_table" align="center" valign="top" >
<tr>
<td>
<div class="scFilterBorder">
  <div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs'] ?>...</span></div>
<table cellspacing=0 cellpadding=0 width='100%'>
<?php
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   /**
    * @access  public
    */
   function monta_cabecalho()
   {
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['dashboard_info']['compact_mode'])
      {
          return;
      }
      $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
      $Lim   = strlen($Str_date);
      $Ult   = "";
      $Arr_D = array();
      for ($I = 0; $I < $Lim; $I++)
      {
          $Char = substr($Str_date, $I, 1);
          if ($Char != $Ult)
          {
              $Arr_D[] = $Char;
          }
          $Ult = $Char;
      }
      $Prim = true;
      $Str  = "";
      foreach ($Arr_D as $Cada_d)
      {
          $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $Str .= $Cada_d;
          $Prim = false;
      }
      $Str = str_replace("a", "Y", $Str);
      $Str = str_replace("y", "Y", $Str);
      $nm_data_fixa = date($Str); 
?>
 <TR align="center">
  <TD class="scFilterTableTd scGridPage">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFilterHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFilterHeaderFont" style="float: left; text-transform: uppercase;"><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> aforo</div>
    <div class="scFilterHeaderFont" style="float: right;"></div>
</div>  </TD>
 </TR>
<?php
   }

   /**
    * @access  public
    * @global  string  $nm_url_saida  $this->Ini->Nm_lang['pesq_global_nm_url_saida']
    * @global  integer  $nm_apl_dependente  $this->Ini->Nm_lang['pesq_global_nm_apl_dependente']
    * @global  string  $nmgp_parms  
    * @global  string  $bprocessa  $this->Ini->Nm_lang['pesq_global_bprocessa']
    */
   function monta_form()
   {
      global 
             $casetaid_cond, $casetaid,
             $fechaoperacion_cond, $fechaoperacion, $fechaoperacion_dia, $fechaoperacion_mes, $fechaoperacion_ano, $fechaoperacion_input_2_dia, $fechaoperacion_input_2_mes, $fechaoperacion_input_2_ano,
             $horaevento_cond, $horaevento, $horaevento_hor, $horaevento_min, $horaevento_seg, $horaevento_input_2_hor, $horaevento_input_2_min, $horaevento_input_2_seg,
             $turnoid_cond, $turnoid,
             $carrilid_cond, $carrilid,
             $cuerpo_cond, $cuerpo,
             $pagoid_ana_cond, $pagoid_ana,
             $vehiculoid_ana_cond, $vehiculoid_ana,
             $operadortlp_cond, $operadortlp, $operadortlp_autocomp,
             $usuarioid_cond, $usuarioid,
             $excentoid_cond, $excentoid,
             $fld_ar_sct_cond, $fld_ar_sct,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_aforo']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_aforo']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_aforo']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("grid_aforo", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      {
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $casetaid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['casetaid']; 
          $casetaid_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['casetaid_cond']; 
          $fechaoperacion_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_dia']; 
          $fechaoperacion_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_mes']; 
          $fechaoperacion_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_ano']; 
          $fechaoperacion_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_dia']; 
          $fechaoperacion_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_mes']; 
          $fechaoperacion_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_ano']; 
          $fechaoperacion_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_cond']; 
          $horaevento_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_hor']; 
          $horaevento_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_min']; 
          $horaevento_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_seg']; 
          $horaevento_input_2_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_input_2_hor']; 
          $horaevento_input_2_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_input_2_min']; 
          $horaevento_input_2_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_input_2_seg']; 
          $horaevento_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_cond']; 
          $turnoid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['turnoid']; 
          $turnoid_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['turnoid_cond']; 
          $carrilid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['carrilid']; 
          $carrilid_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['carrilid_cond']; 
          $cuerpo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['cuerpo']; 
          $cuerpo_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['cuerpo_cond']; 
          $pagoid_ana = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['pagoid_ana']; 
          $pagoid_ana_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['pagoid_ana_cond']; 
          $vehiculoid_ana = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['vehiculoid_ana']; 
          $vehiculoid_ana_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['vehiculoid_ana_cond']; 
          $operadortlp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['operadortlp']; 
          $operadortlp_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['operadortlp_cond']; 
          $usuarioid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['usuarioid']; 
          $usuarioid_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['usuarioid_cond']; 
          $excentoid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['excentoid']; 
          $excentoid_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['excentoid_cond']; 
          $fld_ar_sct = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fld_ar_sct']; 
          $fld_ar_sct_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fld_ar_sct_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['NM_operador']; 
      } 
      if (!isset($casetaid_cond) || empty($casetaid_cond))
      {
         $casetaid_cond = "eq";
      }
      if (!isset($horaevento_cond) || empty($horaevento_cond))
      {
         $horaevento_cond = "qp";
      }
      if (!isset($turnoid_cond) || empty($turnoid_cond))
      {
         $turnoid_cond = "eq";
      }
      if (!isset($carrilid_cond) || empty($carrilid_cond))
      {
         $carrilid_cond = "eq";
      }
      if (!isset($cuerpo_cond) || empty($cuerpo_cond))
      {
         $cuerpo_cond = "eq";
      }
      if (!isset($pagoid_ana_cond) || empty($pagoid_ana_cond))
      {
         $pagoid_ana_cond = "eq";
      }
      if (!isset($vehiculoid_ana_cond) || empty($vehiculoid_ana_cond))
      {
         $vehiculoid_ana_cond = "eq";
      }
      if (!isset($operadortlp_cond) || empty($operadortlp_cond))
      {
         $operadortlp_cond = "qp";
      }
      if (!isset($usuarioid_cond) || empty($usuarioid_cond))
      {
         $usuarioid_cond = "eq";
      }
      if (!isset($excentoid_cond) || empty($excentoid_cond))
      {
         $excentoid_cond = "eq";
      }
      if (!isset($fld_ar_sct_cond) || empty($fld_ar_sct_cond))
      {
         $fld_ar_sct_cond = "eq";
      }
      if (!isset($fechaoperacion_cond) || empty($fechaoperacion_cond))
      {
         $fechaoperacion_cond = "bi_este_mes_full";
      }
      if (isset($fechaoperacion_cond) && substr($fechaoperacion_cond, 0, 3) == "bi_")
      {
         $Temp_cond = $fechaoperacion_cond;
         $this->Ini->process_cond_bi($Temp_cond, $BI_data1, $BI_data2);
         $fechaoperacion_dia = substr($BI_data1, 0, 2);
         $fechaoperacion_mes = substr($BI_data1, 2, 2);
         $fechaoperacion_ano = substr($BI_data1, 4, 4);
         if (strlen($BI_data1) > 8)
         {
             $fechaoperacion_hor = substr($BI_data1, 8, 2);
             $fechaoperacion_min = substr($BI_data1, 10, 2);
             $fechaoperacion_seg = substr($BI_data1, 12, 2);
         }
         $fechaoperacion_input_2_dia = substr($BI_data2, 0, 2);
         $fechaoperacion_input_2_mes = substr($BI_data2, 2, 2);
         $fechaoperacion_input_2_ano = substr($BI_data2, 4, 4);
         if (strlen($BI_data2) > 8)
         {
             $fechaoperacion_input_2_hor = substr($BI_data2, 8, 2);
             $fechaoperacion_input_2_min = substr($BI_data2, 10, 2);
             $fechaoperacion_input_2_seg = substr($BI_data2, 12, 2);
         }
         $Script_BI .= "  formata_bi_fechaoperacion('" . $fechaoperacion_cond . "', '" . $Temp_cond . "', '" . $BI_data1 . "');\r\n";
      }
      $display_aberto  = "style=display:";
      $display_fechado = "style=display:none";
      $opc_hide_input = array("nu","nn","ep","ne");
      $str_hide_casetaid = (in_array($casetaid_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_fechaoperacion = (in_array($fechaoperacion_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_horaevento = (in_array($horaevento_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_turnoid = (in_array($turnoid_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_carrilid = (in_array($carrilid_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_cuerpo = (in_array($cuerpo_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_pagoid_ana = (in_array($pagoid_ana_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_vehiculoid_ana = (in_array($vehiculoid_ana_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_operadortlp = (in_array($operadortlp_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_usuarioid = (in_array($usuarioid_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_excentoid = (in_array($excentoid_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_fld_ar_sct = (in_array($fld_ar_sct_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;

      $str_display_casetaid = ('bw' == $casetaid_cond) ? $display_aberto : $display_fechado;
      $str_display_fechaoperacion = ('bw' == $fechaoperacion_cond || 'bi_' == substr($fechaoperacion_cond, 0, 3)) ? $display_aberto : $display_fechado;
      $str_display_horaevento = ('bw' == $horaevento_cond) ? $display_aberto : $display_fechado;
      $str_display_turnoid = ('bw' == $turnoid_cond) ? $display_aberto : $display_fechado;
      $str_display_carrilid = ('bw' == $carrilid_cond) ? $display_aberto : $display_fechado;
      $str_display_cuerpo = ('bw' == $cuerpo_cond) ? $display_aberto : $display_fechado;
      $str_display_pagoid_ana = ('bw' == $pagoid_ana_cond) ? $display_aberto : $display_fechado;
      $str_display_vehiculoid_ana = ('bw' == $vehiculoid_ana_cond) ? $display_aberto : $display_fechado;
      $str_display_operadortlp = ('bw' == $operadortlp_cond) ? $display_aberto : $display_fechado;
      $str_display_usuarioid = ('bw' == $usuarioid_cond) ? $display_aberto : $display_fechado;
      $str_display_excentoid = ('bw' == $excentoid_cond) ? $display_aberto : $display_fechado;
      $str_display_fld_ar_sct = ('bw' == $fld_ar_sct_cond) ? $display_aberto : $display_fechado;

      if (!isset($casetaid) || $casetaid == "")
      {
          $casetaid = "";
      }
      if (isset($casetaid) && !empty($casetaid))
      {
         $tmp_pos = (is_string($casetaid)) ? strpos($casetaid, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $casetaid = substr($casetaid, 0, $tmp_pos);
         }
      }
      if (!isset($fechaoperacion) || $fechaoperacion == "")
      {
          $fechaoperacion = "";
      }
      if (isset($fechaoperacion) && !empty($fechaoperacion))
      {
         $tmp_pos = (is_string($fechaoperacion)) ? strpos($fechaoperacion, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $fechaoperacion = substr($fechaoperacion, 0, $tmp_pos);
         }
      }
      if (!isset($horaevento) || $horaevento == "")
      {
          $horaevento = "";
      }
      if (isset($horaevento) && !empty($horaevento))
      {
         $tmp_pos = (is_string($horaevento)) ? strpos($horaevento, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $horaevento = substr($horaevento, 0, $tmp_pos);
         }
      }
      if (!isset($turnoid) || $turnoid == "")
      {
          $turnoid = "";
      }
      if (isset($turnoid) && !empty($turnoid))
      {
         $tmp_pos = (is_string($turnoid)) ? strpos($turnoid, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $turnoid = substr($turnoid, 0, $tmp_pos);
         }
      }
      if (!isset($carrilid) || $carrilid == "")
      {
          $carrilid = "";
      }
      if (isset($carrilid) && !empty($carrilid))
      {
         $tmp_pos = (is_string($carrilid)) ? strpos($carrilid, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $carrilid = substr($carrilid, 0, $tmp_pos);
         }
      }
      if (!isset($cuerpo) || $cuerpo == "")
      {
          $cuerpo = "";
      }
      if (isset($cuerpo) && !empty($cuerpo))
      {
         $tmp_pos = (is_string($cuerpo)) ? strpos($cuerpo, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $cuerpo = substr($cuerpo, 0, $tmp_pos);
         }
      }
      if (!isset($pagoid_ana) || $pagoid_ana == "")
      {
          $pagoid_ana = "";
      }
      if (isset($pagoid_ana) && !empty($pagoid_ana))
      {
         $tmp_pos = (is_string($pagoid_ana)) ? strpos($pagoid_ana, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $pagoid_ana = substr($pagoid_ana, 0, $tmp_pos);
         }
      }
      if (!isset($vehiculoid_ana) || $vehiculoid_ana == "")
      {
          $vehiculoid_ana = "";
      }
      if (isset($vehiculoid_ana) && !empty($vehiculoid_ana))
      {
         $tmp_pos = (is_string($vehiculoid_ana)) ? strpos($vehiculoid_ana, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $vehiculoid_ana = substr($vehiculoid_ana, 0, $tmp_pos);
         }
      }
      if (!isset($operadortlp) || $operadortlp == "")
      {
          $operadortlp = "";
      }
      if (isset($operadortlp) && !empty($operadortlp))
      {
         $tmp_pos = (is_string($operadortlp)) ? strpos($operadortlp, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $operadortlp = substr($operadortlp, 0, $tmp_pos);
         }
      }
      if (!isset($usuarioid) || $usuarioid == "")
      {
          $usuarioid = "";
      }
      if (isset($usuarioid) && !empty($usuarioid))
      {
         $tmp_pos = (is_string($usuarioid)) ? strpos($usuarioid, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $usuarioid = substr($usuarioid, 0, $tmp_pos);
         }
      }
      if (!isset($excentoid) || $excentoid == "")
      {
          $excentoid = "";
      }
      if (isset($excentoid) && !empty($excentoid))
      {
         $tmp_pos = (is_string($excentoid)) ? strpos($excentoid, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $excentoid = substr($excentoid, 0, $tmp_pos);
         }
      }
      if (!isset($fld_ar_sct) || $fld_ar_sct == "")
      {
          $fld_ar_sct = "";
      }
      if (isset($fld_ar_sct) && !empty($fld_ar_sct))
      {
         $tmp_pos = (is_string($fld_ar_sct)) ? strpos($fld_ar_sct, "##@@") : false;
         if ($tmp_pos === false)
         { }
         else
         {
         $fld_ar_sct = substr($fld_ar_sct, 0, $tmp_pos);
         }
      }
?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_0" valign="top" width="100%" style="height: 100%;">
   <tr>



   
      <INPUT type="hidden" id="SC_casetaid_cond" name="casetaid_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['casetaid'])) ? $this->New_label['casetaid'] : "Caseta";
 $nmgp_tab_label .= "casetaid?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span> <span class="scFilterRequiredOdd">*</span><br><span id="id_hide_casetaid"  <?php echo $str_hide_casetaid?>>
<?php
      $casetaid_look = (is_string($casetaid) ? substr($this->Db->qstr($casetaid), 1, -1) : $casetaid); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT CasetaID, Caseta  FROM casetas  ORDER BY Caseta"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['casetaid'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['casetaid'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_casetaid">
      <SELECT class="scFilterObjectOdd" id="SC_casetaid" name="casetaid" onChange="nm_refresh_casetaid();" size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $casetaid)
            {
                    $casetaid_sel = ($nm_opc_cod === $casetaid) ? "selected" : "";
            }
            else
            {
               $casetaid_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $casetaid_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr><tr>



   
    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['fechaoperacion'])) ? $this->New_label['fechaoperacion'] : "Fecha Operacion";
 $nmgp_tab_label .= "fechaoperacion?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br>
      <SELECT class="SC_Cond_Selector scFilterObjectEven" id="SC_fechaoperacion_cond" name="fechaoperacion_cond" onChange="nm_campos_between(document.getElementById('id_vis_fechaoperacion'), this, 'fechaoperacion')">
       <optgroup label="<?php echo $this->Ini->Nm_lang['lang_srch_spec'] ?>">
       <OPTION value="bi_este_mes_full" <?php if ("bi_este_mes_full" == $fechaoperacion_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_search_este_mes_full'] ?></OPTION>
       <OPTION value="bi_UM" <?php if ("bi_UM" == $fechaoperacion_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_mnth'] ?></OPTION>
       <OPTION value="bi_M3" <?php if ("bi_M3" == $fechaoperacion_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_03mo'] ?></OPTION>
       <optgroup label="<?php echo $this->Ini->Nm_lang['lang_srch_nrml'] ?>">
       <OPTION value="eq" <?php if ("eq" == $fechaoperacion_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="gt" <?php if ("gt" == $fechaoperacion_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $fechaoperacion_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $fechaoperacion_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
      <br><span id="id_hide_fechaoperacion"  <?php echo $str_hide_fechaoperacion?>>
<SPAN id="Nm_bi_dados_fechaoperacion" style="display:none"></SPAN>
<SPAN id="opc_bi_TP_fechaoperacion"  style="display:''">

<?php
  $Form_base = "ddmmyyyy";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $Arr_format = $Arr_D;
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_fechaoperacion_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fechaoperacion_dia" name="fechaoperacion_dia" value="<?php echo NM_encode_input($fechaoperacion_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_fechaoperacion_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fechaoperacion_mes" name="fechaoperacion_mes" value="<?php echo NM_encode_input($fechaoperacion_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_fechaoperacion_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fechaoperacion_ano" name="fechaoperacion_ano" value="<?php echo NM_encode_input($fechaoperacion_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 <INPUT type="hidden" id="sc_fechaoperacion_jq">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_fechaoperacion"  class="scFilterFieldFontEven">
 <br><?php echo $date_format_show ?>         </SPAN>
                  <br />
        <SPAN id="id_vis_fechaoperacion"  <?php echo $str_display_fechaoperacion; ?> class="scFilterFieldFontEven">
         <?php echo $date_sep_bw ?> 
         <BR>
         
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_fechaoperacion_input_2_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fechaoperacion_input_2_dia" name="fechaoperacion_input_2_dia" value="<?php echo NM_encode_input($fechaoperacion_input_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_fechaoperacion_input_2_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fechaoperacion_input_2_mes" name="fechaoperacion_input_2_mes" value="<?php echo NM_encode_input($fechaoperacion_input_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_fechaoperacion_input_2_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fechaoperacion_input_2_ano" name="fechaoperacion_input_2_ano" value="<?php echo NM_encode_input($fechaoperacion_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 <INPUT type="hidden" id="sc_fechaoperacion_jq2">
</span>

<?php
  }
?>

<?php

}

?>
         </SPAN>
          </TD>
   



   </tr><tr>



   
    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['horaevento'])) ? $this->New_label['horaevento'] : "Hora Evento";
 $nmgp_tab_label .= "horaevento?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br>
      <SELECT class="SC_Cond_Selector scFilterObjectOdd" id="SC_horaevento_cond" name="horaevento_cond" onChange="nm_campos_between(document.getElementById('id_vis_horaevento'), this, 'horaevento')">
       <OPTION value="qp" <?php if ("qp" == $horaevento_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $horaevento_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
      <br><span id="id_hide_horaevento"  <?php echo $str_hide_horaevento?>>
<?php
  $Form_base = "hhiiss";
  $date_format_show = "";
  $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
  $Lim   = strlen($Str_time);
  $Str   = "";
  $Ult   = "";
  $Arr_T = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_time, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_T[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_T[] = $Str;
  $Prim = true;
  foreach ($Arr_T as $Cada_t)
  {
      if (strpos($Form_base, $Cada_t) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
          $date_format_show .= $Cada_t;
          $Prim = false;
      }
  }
  $Arr_format = $Arr_T;
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_horaevento_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_horaevento_hor" name="horaevento_hor" value="<?php echo NM_encode_input($horaevento_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_horaevento_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_horaevento_min" name="horaevento_min" value="<?php echo NM_encode_input($horaevento_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_horaevento_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_horaevento_seg" name="horaevento_seg" value="<?php echo NM_encode_input($horaevento_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
<INPUT  type="hidden" id="SC_horaevento_dia" name="horaevento_dia" value="<?php echo NM_encode_input($horaevento_dia); ?>">
 <INPUT  type="hidden" id="SC_horaevento_mes" name="horaevento_mes" value="<?php echo NM_encode_input($horaevento_mes); ?>">
 <INPUT  type="hidden" id="SC_horaevento_ano" name="horaevento_ano" value="<?php echo NM_encode_input($horaevento_ano); ?>">
         <SPAN id="id_css_horaevento"  class="scFilterFieldFontOdd">
 <br><?php echo $date_format_show ?>         </SPAN>
                  <br />
        <SPAN id="id_vis_horaevento"  <?php echo $str_display_horaevento; ?> class="scFilterFieldFontOdd">
         <?php echo $date_sep_bw ?> 
         <BR>
         
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_horaevento_input_2_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_horaevento_input_2_hor" name="horaevento_input_2_hor" value="<?php echo NM_encode_input($horaevento_input_2_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_horaevento_input_2_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_horaevento_input_2_min" name="horaevento_input_2_min" value="<?php echo NM_encode_input($horaevento_input_2_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<span id='id_date_part_horaevento_input_2_SS' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_horaevento_input_2_seg" name="horaevento_input_2_seg" value="<?php echo NM_encode_input($horaevento_input_2_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>

<?php

}

?>
<INPUT  type="hidden" id="SC_horaevento_input_2_dia" name="horaevento_input_2_dia" value="<?php echo NM_encode_input($horaevento_input_2_dia); ?>">
 <INPUT  type="hidden" id="SC_horaevento_input_2_mes" name="horaevento_input_2_mes" value="<?php echo NM_encode_input($horaevento_input_2_mes); ?>">
 <INPUT  type="hidden" id="SC_horaevento_input_2_ano" name="horaevento_input_2_ano" value="<?php echo NM_encode_input($horaevento_input_2_ano); ?>">
          </SPAN>
          </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_turnoid_cond" name="turnoid_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['turnoid'])) ? $this->New_label['turnoid'] : "Turno";
 $nmgp_tab_label .= "turnoid?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_turnoid"  <?php echo $str_hide_turnoid?>>
<?php
      $turnoid_look = (is_string($turnoid) ? substr($this->Db->qstr($turnoid), 1, -1) : $turnoid); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT TipoID, Nombre  FROM turnos  ORDER BY TipoID"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['turnoid'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['turnoid'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[0]) . " - " . trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_turnoid">
      <SELECT class="scFilterObjectEven" id="SC_turnoid" name="turnoid"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $turnoid)
            {
                    $turnoid_sel = ($nm_opc_cod === $turnoid) ? "selected" : "";
            }
            else
            {
               $turnoid_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $turnoid_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_carrilid_cond" name="carrilid_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['carrilid'])) ? $this->New_label['carrilid'] : "Carril";
 $nmgp_tab_label .= "carrilid?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_carrilid"  <?php echo $str_hide_carrilid?>>
<?php
      $carrilid_look = (is_string($carrilid) ? substr($this->Db->qstr($carrilid), 1, -1) : $carrilid); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT CarrilID, CarrilNacional  FROM carril  ORDER BY CarrilNacional"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['carrilid'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['carrilid'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_carrilid">
      <SELECT class="scFilterObjectOdd" id="SC_carrilid" name="carrilid"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $carrilid)
            {
                    $carrilid_sel = ($nm_opc_cod === $carrilid) ? "selected" : "";
            }
            else
            {
               $carrilid_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $carrilid_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_cuerpo_cond" name="cuerpo_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['cuerpo'])) ? $this->New_label['cuerpo'] : "Cuerpo";
 $nmgp_tab_label .= "cuerpo?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_cuerpo"  <?php echo $str_hide_cuerpo?>> 
<?php
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['cuerpo'] = array();
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['cuerpo'][] = "A";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['cuerpo'][] = "B";
 ?>

 <SELECT class="scFilterObjectEven" id="SC_cuerpo"  name="cuerpo"  size="1">
 <OPTION value=""></option>
 <OPTION value="A##@@A"<?php if ($cuerpo == "A") { echo " selected" ;} ?>>A</option>
 <OPTION value="B##@@B"<?php if ($cuerpo == "B") { echo " selected" ;} ?>>B</option>
 </SELECT>
 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_pagoid_ana_cond" name="pagoid_ana_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['pagoid_ana'])) ? $this->New_label['pagoid_ana'] : "Tipo Pago Analista";
 $nmgp_tab_label .= "pagoid_ana?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_pagoid_ana"  <?php echo $str_hide_pagoid_ana?>>
<?php
      $pagoid_ana_look = (is_string($pagoid_ana) ? substr($this->Db->qstr($pagoid_ana), 1, -1) : $pagoid_ana); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT TipoPagoID, Tipo  FROM tipopago  ORDER BY Tipo"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['pagoid_ana'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['pagoid_ana'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_pagoid_ana">
      <SELECT class="scFilterObjectOdd" id="SC_pagoid_ana" name="pagoid_ana"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $pagoid_ana)
            {
                    $pagoid_ana_sel = ($nm_opc_cod === $pagoid_ana) ? "selected" : "";
            }
            else
            {
               $pagoid_ana_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $pagoid_ana_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_vehiculoid_ana_cond" name="vehiculoid_ana_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['vehiculoid_ana'])) ? $this->New_label['vehiculoid_ana'] : "Vehiculo ID ANA";
 $nmgp_tab_label .= "vehiculoid_ana?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_vehiculoid_ana"  <?php echo $str_hide_vehiculoid_ana?>>
<?php
      $vehiculoid_ana_look = (is_string($vehiculoid_ana) ? substr($this->Db->qstr($vehiculoid_ana), 1, -1) : $vehiculoid_ana); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT fld_tipo_equipo, fld_tipo_equipo  FROM cat_tipoveh  ORDER BY fld_tipo_equipo"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['vehiculoid_ana'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['vehiculoid_ana'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_vehiculoid_ana">
      <SELECT class="scFilterObjectEven" id="SC_vehiculoid_ana" name="vehiculoid_ana"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $vehiculoid_ana)
            {
                    $vehiculoid_ana_sel = ($nm_opc_cod === $vehiculoid_ana) ? "selected" : "";
            }
            else
            {
               $vehiculoid_ana_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $vehiculoid_ana_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_operadortlp_cond" name="operadortlp_cond" value="qp">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['operadortlp'])) ? $this->New_label['operadortlp'] : "Operador TLP";
 $nmgp_tab_label .= "operadortlp?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_operadortlp"  <?php echo $str_hide_operadortlp?>><?php
      if ($operadortlp != "")
      {
      $operadortlp_look = (is_string($operadortlp) ? substr($this->Db->qstr($operadortlp), 1, -1) : $operadortlp); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct OperadorTLP from " . $this->Ini->nm_tabela . " where OperadorTLP = '$operadortlp_look' order by OperadorTLP"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$operadortlp]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$operadortlp];
      }
      else
      {
          $sAutocompValue = $operadortlp;
      }
?>
<INPUT  type="text" id="SC_operadortlp" name="operadortlp" value="<?php echo NM_encode_input($operadortlp) ?>"  size=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_operadortlp" name="operadortlp_autocomp" size="20"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 20, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_usuarioid_cond" name="usuarioid_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['usuarioid'])) ? $this->New_label['usuarioid'] : "Cajero";
 $nmgp_tab_label .= "usuarioid?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_usuarioid"  <?php echo $str_hide_usuarioid?>>
<?php
      $usuarioid_look = (is_string($usuarioid) ? substr($this->Db->qstr($usuarioid), 1, -1) : $usuarioid); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT UsuarioID, CONCAT(Nombre,' ',ApellidoPaterno) as sc_alias_0 FROM usuario  WHERE UsuarioTipoID = 5 ORDER BY Nombre"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['usuarioid'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['usuarioid'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[0]) . " - " . trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_usuarioid">
      <SELECT class="scFilterObjectEven" id="SC_usuarioid" name="usuarioid"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $usuarioid)
            {
                    $usuarioid_sel = ($nm_opc_cod === $usuarioid) ? "selected" : "";
            }
            else
            {
               $usuarioid_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $usuarioid_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_excentoid_cond" name="excentoid_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['excentoid'])) ? $this->New_label['excentoid'] : "Dependencia";
 $nmgp_tab_label .= "excentoid?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_excentoid"  <?php echo $str_hide_excentoid?>>
<?php
      $excentoid_look = (is_string($excentoid) ? substr($this->Db->qstr($excentoid), 1, -1) : $excentoid); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT ExcentoID, Dependencia  FROM excentos  WHERE CasetaID = " . peaje_sql_int($casetaid, '0') . " ORDER BY Dependencia";
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['excentoid'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['excentoid'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_excentoid">
      <SELECT class="scFilterObjectOdd" id="SC_excentoid" name="excentoid"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $excentoid)
            {
                    $excentoid_sel = ($nm_opc_cod === $excentoid) ? "selected" : "";
            }
            else
            {
               $excentoid_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $excentoid_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_fld_ar_sct_cond" name="fld_ar_sct_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['fld_ar_sct'])) ? $this->New_label['fld_ar_sct'] : "Error Asociado";
 $nmgp_tab_label .= "fld_ar_sct?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_fld_ar_sct"  <?php echo $str_hide_fld_ar_sct?>> 
<?php
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['fld_ar_sct'] = array();
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['fld_ar_sct'][] = "1";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['fld_ar_sct'][] = "2";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['fld_ar_sct'][] = "3";
 ?>

 <SELECT class="scFilterObjectEven" id="SC_fld_ar_sct"  name="fld_ar_sct"  size="1">
 <OPTION value=""></option>
 <OPTION value="1##@@Cobrador"<?php if ($fld_ar_sct == "1") { echo " selected" ;} ?>>Cobrador</option>
 <OPTION value="2##@@Sistema"<?php if ($fld_ar_sct == "2") { echo " selected" ;} ?>>Sistema</option>
 <OPTION value="3##@@Usuario"<?php if ($fld_ar_sct == "3") { echo " selected" ;} ?>>Usuario</option>
 </SELECT>
 </TD>
   



   </tr>
   </TABLE>
  </TD>
 </TR>
 </TABLE>
 </TD>
 </TR>
 <TR>
  <TD class="scFilterTableTd" align="center">
<INPUT type="hidden" id="SC_NM_operador" name="NM_operador" value="and">  </TD>
 </TR>
   <INPUT type="hidden" name="nmgp_tab_label" value="<?php echo NM_encode_input($nmgp_tab_label); ?>"> 
   <INPUT type="hidden" name="bprocessa" value="pesq"> 
<?php
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['pesq_tab_label'] = $nmgp_tab_label;
?>
 <?php
     if ($_SESSION['scriptcase']['proc_mobile'])
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd" id='sc_filter_toolbar_bot'>
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "sc_b_pesq_bot", "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   if (is_file("grid_aforo_help.txt"))
   {
      $Arq_WebHelp = file("grid_aforo_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if ($nm_apl_dependente == 1 || (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['opc_psq'] && !$this->aba_iframe))
   {
       if ($nm_apl_dependente == 1) 
       { 
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       } 
       elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['dashboard_info']['under_dashboard'])
       { }
       else 
       { 
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       } 
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['opc_psq'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['sc_modal'])
       {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "self.parent.tb_remove();", "self.parent.tb_remove();", "sai_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       }
       else
       {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "window.close();", "window.close();", "sai_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       }
   }
?>
    </td>
   </tr></table>
  </TD>
 </TR>
     <?php
     }
     if (!$_SESSION['scriptcase']['proc_mobile'])
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd" id='sc_filter_toolbar_bot'>
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "sc_b_pesq_bot", "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   if (is_file("grid_aforo_help.txt"))
   {
      $Arq_WebHelp = file("grid_aforo_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if ($nm_apl_dependente == 1 || (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['opc_psq'] && !$this->aba_iframe))
   {
       if ($nm_apl_dependente == 1) 
       { 
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       } 
       elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['dashboard_info']['under_dashboard'])
       { }
       else 
       { 
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       } 
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['opc_psq'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['sc_modal'])
       {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "self.parent.tb_remove();", "self.parent.tb_remove();", "sai_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       }
       else
       {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "window.close();", "window.close();", "sai_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       }
   }
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
  </TD>
 </TR>
     <?php
     }
 ?>
<?php
   }

   function monta_html_fim()
   {
       global $bprocessa, $nm_url_saida, $Script_BI;
?>

</TABLE>
   <INPUT type="hidden" name="form_condicao" value="3">
</FORM> 
   <FORM style="display:none;" name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
   <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<?php
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['orig_pesq']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['orig_pesq'] == "grid")
   {
       $Ret_cancel_pesq = "volta_grid";
   }
   else
   {
       $Ret_cancel_pesq = "resumo";
   }
?>
   <INPUT type="hidden" name="nmgp_opcao" value="<?php echo $Ret_cancel_pesq; ?>"> 
   </FORM> 
<SCRIPT type="text/javascript">
 function nm_move()
 {
     document.form_cancel.target = "_self"; 
     document.form_cancel.action = "./"; 
     document.form_cancel.submit(); 
 }
 function nm_submit_form()
 {
    document.F1.submit();
 }
 function limpa_form()
 {
   document.F1.reset();
   document.F1.casetaid_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_casetaid'), document.F1.casetaid_cond, 'casetaid');
   document.F1.casetaid.value = "";
   document.F1.fechaoperacion_cond.value = 'bi_este_mes_full';
   nm_campos_between(document.getElementById('id_vis_fechaoperacion'), document.F1.fechaoperacion_cond, 'fechaoperacion');
   document.F1.fechaoperacion_dia.value = "";
   document.F1.fechaoperacion_mes.value = "";
   document.F1.fechaoperacion_ano.value = "";
   document.F1.fechaoperacion_input_2_dia.value = "";
   document.F1.fechaoperacion_input_2_mes.value = "";
   document.F1.fechaoperacion_input_2_ano.value = "";
   document.F1.horaevento_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_horaevento'), document.F1.horaevento_cond, 'horaevento');
   document.F1.horaevento_hor.value = "";
   document.F1.horaevento_min.value = "";
   document.F1.horaevento_seg.value = "";
   document.F1.horaevento_input_2_hor.value = "";
   document.F1.horaevento_input_2_min.value = "";
   document.F1.horaevento_input_2_seg.value = "";
   document.F1.turnoid_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_turnoid'), document.F1.turnoid_cond, 'turnoid');
   document.F1.turnoid.value = "";
   document.F1.carrilid_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_carrilid'), document.F1.carrilid_cond, 'carrilid');
   document.F1.carrilid.value = "";
   document.F1.cuerpo_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_cuerpo'), document.F1.cuerpo_cond, 'cuerpo');
   document.F1.cuerpo.value = "";
   document.F1.pagoid_ana_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_pagoid_ana'), document.F1.pagoid_ana_cond, 'pagoid_ana');
   document.F1.pagoid_ana.value = "";
   document.F1.vehiculoid_ana_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_vehiculoid_ana'), document.F1.vehiculoid_ana_cond, 'vehiculoid_ana');
   document.F1.vehiculoid_ana.value = "";
   document.F1.operadortlp_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_operadortlp'), document.F1.operadortlp_cond, 'operadortlp');
   document.F1.operadortlp.value = "";
   document.F1.operadortlp_autocomp.value = "";
   document.F1.usuarioid_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_usuarioid'), document.F1.usuarioid_cond, 'usuarioid');
   document.F1.usuarioid.value = "";
   document.F1.excentoid_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_excentoid'), document.F1.excentoid_cond, 'excentoid');
   document.F1.excentoid.value = "";
   document.F1.fld_ar_sct_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_fld_ar_sct'), document.F1.fld_ar_sct_cond, 'fld_ar_sct');
   document.F1.fld_ar_sct.value = "";
 }
 function SC_carga_evt_jquery()
 {
    $('#SC_fechaoperacion_dia').bind('change', function() {sc_grid_aforo_valida_dia(this)});
    $('#SC_fechaoperacion_input_2_dia').bind('change', function() {sc_grid_aforo_valida_dia(this)});
    $('#SC_fechaoperacion_input_2_mes').bind('change', function() {sc_grid_aforo_valida_mes(this)});
    $('#SC_fechaoperacion_mes').bind('change', function() {sc_grid_aforo_valida_mes(this)});
    $('#SC_horaevento_hor').bind('change', function() {sc_grid_aforo_valida_hora(this)});
    $('#SC_horaevento_input_2_hor').bind('change', function() {sc_grid_aforo_valida_hora(this)});
    $('#SC_horaevento_input_2_min').bind('change', function() {sc_grid_aforo_valida_min(this)});
    $('#SC_horaevento_input_2_seg').bind('change', function() {sc_grid_aforo_valida_seg(this)});
    $('#SC_horaevento_min').bind('change', function() {sc_grid_aforo_valida_min(this)});
    $('#SC_horaevento_seg').bind('change', function() {sc_grid_aforo_valida_seg(this)});
 }
 function sc_grid_aforo_valida_dia(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 31))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_aforo_valida_mes(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 12))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_aforo_valida_hora(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 23))
     {
         if (confirm (Nm_erro['lang_jscr_ivtm'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_aforo_valida_min(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 59))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mint'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_aforo_valida_seg(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 59))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_secd'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
function formata_bi_fechaoperacion(opc, opc_bi, dt_fmt)
{
   if (opc.substring(0,3) != "bi_")
   {
       document.getElementById('Nm_bi_dados_fechaoperacion').style.display = 'none';
       document.getElementById('opc_bi_TP_fechaoperacion').style.display = '';
       return;
   }
   if (opc == "bi_TP")
   {
       document.getElementById('Nm_bi_dados_fechaoperacion').style.display = 'none';
       document.getElementById('opc_bi_TP_fechaoperacion').style.display = 'none';
       return;
   }
<?php
   $date_format_show = "";
   $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
   $Str_date = str_replace("y", "Y", $Str_date);
   $Lim   = strlen($Str_date);
   $Ult   = "";
   $Arr_D = array();
   for ($I = 0; $I < $Lim; $I++)
   {
        $Char = substr($Str_date, $I, 1);
        if ($Char != $Ult)
        {
            $Arr_D[] = $Char;
        }
        $Ult = $Char;
   }
   $Prim = true;
   foreach ($Arr_D as $Cada_d)
   {
       $date_format_show .= (!$Prim) ? " + '" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . "' + ": "";
       $date_format_show .= ($Cada_d == "d") ? "document.F1.fechaoperacion_dia.value" : "";
       $date_format_show .= ($Cada_d == "m") ? "document.F1.fechaoperacion_mes.value" : "";
       $date_format_show .= ($Cada_d == "Y") ? "document.F1.fechaoperacion_ano.value" : "";
       $Prim = false;
   }
?> 
   saida = <?php echo $date_format_show ?>;
   if (opc_bi == "bw")
   {
       saida += " <?php echo $this->Ini->Nm_lang['lang_srch_between_values'] ?> ";
<?php
   $date_format_show = "";
   $Prim = true;
   foreach ($Arr_D as $Cada_d)
   {
       $date_format_show .= (!$Prim) ? " + '" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . "' + ": "";
       $date_format_show .= ($Cada_d == "d") ? "document.F1.fechaoperacion_input_2_dia.value" : "";
       $date_format_show .= ($Cada_d == "m") ? "document.F1.fechaoperacion_input_2_mes.value" : "";
       $date_format_show .= ($Cada_d == "Y") ? "document.F1.fechaoperacion_input_2_ano.value" : "";
       $Prim = false;
   }
?> 
       saida += <?php echo $date_format_show ?>;
   }
   document.getElementById('Nm_bi_dados_fechaoperacion').innerHTML = saida;
   document.getElementById('opc_bi_TP_fechaoperacion').style.display = 'none';
   document.getElementById('Nm_bi_dados_fechaoperacion').style.display = '';
}
<?php
  echo $Script_BI;
?>
   function process_hotkeys(hotkey)
   {
   return false;
   }
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   /**
    * @access  public
    * @param  string  $NM_operador  $this->Ini->Nm_lang['pesq_global_NM_operador']
    * @param  array  $nmgp_tab_label  
    */
   function inicializa_vars()
   {
      global $NM_operador, $nmgp_tab_label;

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/");  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1);  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz;
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("es");
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] = "";
      if ($this->NM_ajax_flag && ($this->NM_ajax_opcao == "ajax_grid_search" || $this->NM_ajax_opcao == "ajax_grid_search_change_fil"))
      {
          $nmgp_tab_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['pesq_tab_label'];
      }
      if (!empty($nmgp_tab_label))
      {
         $nm_tab_campos = explode("?@?", $nmgp_tab_label);
         $nmgp_tab_label = array();
         foreach ($nm_tab_campos as $cada_campo)
         {
             $parte_campo = explode("?#?", $cada_campo);
             $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
         }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_orig']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_orig'] = "";
      }
      if ($this->NM_ajax_flag && ($this->NM_ajax_opcao == "ajax_grid_search" || $this->NM_ajax_opcao == "ajax_grid_search_change_fil"))
      {
          $this->comando = "";
      }
      else
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_orig'];
      }
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   /**
    * @access  public
    */
   function trata_campos()
   {
      global $casetaid_cond, $casetaid,
             $fechaoperacion_cond, $fechaoperacion, $fechaoperacion_dia, $fechaoperacion_mes, $fechaoperacion_ano, $fechaoperacion_input_2_dia, $fechaoperacion_input_2_mes, $fechaoperacion_input_2_ano,
             $horaevento_cond, $horaevento, $horaevento_hor, $horaevento_min, $horaevento_seg, $horaevento_input_2_hor, $horaevento_input_2_min, $horaevento_input_2_seg,
             $turnoid_cond, $turnoid,
             $carrilid_cond, $carrilid,
             $cuerpo_cond, $cuerpo,
             $pagoid_ana_cond, $pagoid_ana,
             $vehiculoid_ana_cond, $vehiculoid_ana,
             $operadortlp_cond, $operadortlp, $operadortlp_autocomp,
             $usuarioid_cond, $usuarioid,
             $excentoid_cond, $excentoid,
             $fld_ar_sct_cond, $fld_ar_sct, $nmgp_tab_label;

      $C_formatado = true;
      if ($this->NM_ajax_flag && ($this->NM_ajax_opcao == "ajax_grid_search" || $this->NM_ajax_opcao == "ajax_grid_search_change_fil"))
      {
          if ($this->NM_ajax_opcao == "ajax_grid_search")
          {
              $C_formatado = false;
          }
          $Temp_Busca  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && $this->NM_ajax_opcao != "ajax_grid_search_change_fil")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'] as $Cmps => $Vals)
          {
              $$Cmps = $Vals;
          }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq'] = array();
      if (!empty($operadortlp_autocomp) && empty($operadortlp))
      {
          $operadortlp = $operadortlp_autocomp;
      }
      $casetaid_cond_salva = $casetaid_cond; 
      if (!isset($casetaid_input_2) || $casetaid_input_2 == "")
      {
          $casetaid_input_2 = $casetaid;
      }
      $fechaoperacion_cond_salva = $fechaoperacion_cond; 
      if (!isset($fechaoperacion_input_2_dia) || $fechaoperacion_input_2_dia == "")
      {
          $fechaoperacion_input_2_dia = $fechaoperacion_dia;
      }
      if (!isset($fechaoperacion_input_2_mes) || $fechaoperacion_input_2_mes == "")
      {
          $fechaoperacion_input_2_mes = $fechaoperacion_mes;
      }
      if (!isset($fechaoperacion_input_2_ano) || $fechaoperacion_input_2_ano == "")
      {
          $fechaoperacion_input_2_ano = $fechaoperacion_ano;
      }
      $horaevento_cond_salva = $horaevento_cond; 
      if (!isset($horaevento_input_2_hor) || $horaevento_input_2_hor == "")
      {
          $horaevento_input_2_hor = $horaevento_hor;
      }
      if (!isset($horaevento_input_2_min) || $horaevento_input_2_min == "")
      {
          $horaevento_input_2_min = $horaevento_min;
      }
      if (!isset($horaevento_input_2_seg) || $horaevento_input_2_seg == "")
      {
          $horaevento_input_2_seg = $horaevento_seg;
      }
      $turnoid_cond_salva = $turnoid_cond; 
      if (!isset($turnoid_input_2) || $turnoid_input_2 == "")
      {
          $turnoid_input_2 = $turnoid;
      }
      $carrilid_cond_salva = $carrilid_cond; 
      if (!isset($carrilid_input_2) || $carrilid_input_2 == "")
      {
          $carrilid_input_2 = $carrilid;
      }
      $cuerpo_cond_salva = $cuerpo_cond; 
      if (!isset($cuerpo_input_2) || $cuerpo_input_2 == "")
      {
          $cuerpo_input_2 = $cuerpo;
      }
      $pagoid_ana_cond_salva = $pagoid_ana_cond; 
      if (!isset($pagoid_ana_input_2) || $pagoid_ana_input_2 == "")
      {
          $pagoid_ana_input_2 = $pagoid_ana;
      }
      $vehiculoid_ana_cond_salva = $vehiculoid_ana_cond; 
      if (!isset($vehiculoid_ana_input_2) || $vehiculoid_ana_input_2 == "")
      {
          $vehiculoid_ana_input_2 = $vehiculoid_ana;
      }
      $operadortlp_cond_salva = $operadortlp_cond; 
      if (!isset($operadortlp_input_2) || $operadortlp_input_2 == "")
      {
          $operadortlp_input_2 = $operadortlp;
      }
      $usuarioid_cond_salva = $usuarioid_cond; 
      if (!isset($usuarioid_input_2) || $usuarioid_input_2 == "")
      {
          $usuarioid_input_2 = $usuarioid;
      }
      $excentoid_cond_salva = $excentoid_cond; 
      if (!isset($excentoid_input_2) || $excentoid_input_2 == "")
      {
          $excentoid_input_2 = $excentoid;
      }
      $fld_ar_sct_cond_salva = $fld_ar_sct_cond; 
      if (!isset($fld_ar_sct_input_2) || $fld_ar_sct_input_2 == "")
      {
          $fld_ar_sct_input_2 = $fld_ar_sct;
      }
      if (!$this->NM_ajax_flag || $this->NM_ajax_opcao != "ajax_grid_search")
      {
          if ($casetaid_cond != "nu" && $casetaid_cond != "nn" && $casetaid_cond != "ep" && $casetaid_cond != "ne")
          {
              if ($casetaid == "")
              {
                  if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Caseta : " . $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
              }
          }
      }
      $tmp_pos = (is_string($casetaid)) ? strpos($casetaid, "##@@") : false;
      if ($tmp_pos === false) {
          $L_lookup = $casetaid;
      }
      else {
          $L_lookup = substr($casetaid, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['casetaid'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Caseta : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = (is_string($turnoid)) ? strpos($turnoid, "##@@") : false;
      if ($tmp_pos === false) {
          $L_lookup = $turnoid;
      }
      else {
          $L_lookup = substr($turnoid, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['turnoid'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Turno : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = (is_string($carrilid)) ? strpos($carrilid, "##@@") : false;
      if ($tmp_pos === false) {
          $L_lookup = $carrilid;
      }
      else {
          $L_lookup = substr($carrilid, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['carrilid'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Carril : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = (is_string($cuerpo)) ? strpos($cuerpo, "##@@") : false;
      if ($tmp_pos === false) {
          $L_lookup = $cuerpo;
      }
      else {
          $L_lookup = substr($cuerpo, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['cuerpo'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Cuerpo : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = (is_string($pagoid_ana)) ? strpos($pagoid_ana, "##@@") : false;
      if ($tmp_pos === false) {
          $L_lookup = $pagoid_ana;
      }
      else {
          $L_lookup = substr($pagoid_ana, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['pagoid_ana'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Tipo Pago Analista : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = (is_string($vehiculoid_ana)) ? strpos($vehiculoid_ana, "##@@") : false;
      if ($tmp_pos === false) {
          $L_lookup = $vehiculoid_ana;
      }
      else {
          $L_lookup = substr($vehiculoid_ana, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['vehiculoid_ana'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Vehiculo ID ANA : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = (is_string($usuarioid)) ? strpos($usuarioid, "##@@") : false;
      if ($tmp_pos === false) {
          $L_lookup = $usuarioid;
      }
      else {
          $L_lookup = substr($usuarioid, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['usuarioid'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Cajero : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = (is_string($excentoid)) ? strpos($excentoid, "##@@") : false;
      if ($tmp_pos === false) {
          $L_lookup = $excentoid;
      }
      else {
          $L_lookup = substr($excentoid, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['excentoid'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Dependencia : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = (is_string($fld_ar_sct)) ? strpos($fld_ar_sct, "##@@") : false;
      if ($tmp_pos === false) {
          $L_lookup = $fld_ar_sct;
      }
      else {
          $L_lookup = substr($fld_ar_sct, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['psq_check_ret']['fld_ar_sct'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Error Asociado : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search']  = array(); 
      $I_Grid = 0;
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['casetaid'] = $casetaid; 
      if (is_array($casetaid) && !empty($casetaid))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0] = $casetaid;
      }
      elseif ($casetaid_cond_salva == "nu" || $casetaid_cond_salva == "nn" || $casetaid_cond_salva == "ep" || $casetaid_cond_salva == "ne" || !empty($casetaid))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][0] = $casetaid;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['casetaid_cond'] = $casetaid_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "casetaid"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $casetaid_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['casetaid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_dia'] = $fechaoperacion_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_mes'] = $fechaoperacion_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_ano'] = $fechaoperacion_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_dia'] = $fechaoperacion_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_mes'] = $fechaoperacion_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_ano'] = $fechaoperacion_input_2_ano; 
      if (!empty($fechaoperacion_dia) || !empty($fechaoperacion_mes) || !empty($fechaoperacion_ano) || $fechaoperacion_cond_salva == "nu" || $fechaoperacion_cond_salva == "nn" || $fechaoperacion_cond_salva == "ep" || $fechaoperacion_cond_salva == "ne")
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][] = "D:" . $fechaoperacion_dia;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][] = "M:" . $fechaoperacion_mes;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][] = "Y:" . $fechaoperacion_ano;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][1][] = "D:" . $fechaoperacion_input_2_dia;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][1][] = "M:" . $fechaoperacion_input_2_mes;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][1][] = "Y:" . $fechaoperacion_input_2_ano;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_cond'] = $fechaoperacion_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "fechaoperacion"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $fechaoperacion_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['fechaoperacion'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_hor'] = $horaevento_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_min'] = $horaevento_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_seg'] = $horaevento_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_input_2_hor'] = $horaevento_input_2_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_input_2_min'] = $horaevento_input_2_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_input_2_seg'] = $horaevento_input_2_seg; 
      if (!empty($horaevento_hor) || !empty($horaevento_min) || !empty($horaevento_seg) || $horaevento_cond_salva == "nu" || $horaevento_cond_salva == "nn" || $horaevento_cond_salva == "ep" || $horaevento_cond_salva == "ne")
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][] = "H:" . $horaevento_hor;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][] = "I:" . $horaevento_min;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][] = "S:" . $horaevento_seg;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][1][] = "H:" . $horaevento_input_2_hor;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][1][] = "I:" . $horaevento_input_2_min;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][1][] = "S:" . $horaevento_input_2_seg;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_cond'] = $horaevento_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "horaevento"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $horaevento_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['horaevento'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['turnoid'] = $turnoid; 
      if (is_array($turnoid) && !empty($turnoid))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0] = $turnoid;
      }
      elseif ($turnoid_cond_salva == "nu" || $turnoid_cond_salva == "nn" || $turnoid_cond_salva == "ep" || $turnoid_cond_salva == "ne" || !empty($turnoid))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][0] = $turnoid;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['turnoid_cond'] = $turnoid_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "turnoid"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $turnoid_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['turnoid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['carrilid'] = $carrilid; 
      if (is_array($carrilid) && !empty($carrilid))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0] = $carrilid;
      }
      elseif ($carrilid_cond_salva == "nu" || $carrilid_cond_salva == "nn" || $carrilid_cond_salva == "ep" || $carrilid_cond_salva == "ne" || !empty($carrilid))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][0] = $carrilid;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['carrilid_cond'] = $carrilid_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "carrilid"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $carrilid_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['carrilid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['cuerpo'] = $cuerpo; 
      if (is_array($cuerpo) && !empty($cuerpo))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0] = $cuerpo;
      }
      elseif ($cuerpo_cond_salva == "nu" || $cuerpo_cond_salva == "nn" || $cuerpo_cond_salva == "ep" || $cuerpo_cond_salva == "ne" || !empty($cuerpo))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][0] = $cuerpo;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['cuerpo_cond'] = $cuerpo_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "cuerpo"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $cuerpo_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['cuerpo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['pagoid_ana'] = $pagoid_ana; 
      if (is_array($pagoid_ana) && !empty($pagoid_ana))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0] = $pagoid_ana;
      }
      elseif ($pagoid_ana_cond_salva == "nu" || $pagoid_ana_cond_salva == "nn" || $pagoid_ana_cond_salva == "ep" || $pagoid_ana_cond_salva == "ne" || !empty($pagoid_ana))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][0] = $pagoid_ana;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['pagoid_ana_cond'] = $pagoid_ana_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "pagoid_ana"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $pagoid_ana_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['pagoid_ana'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['vehiculoid_ana'] = $vehiculoid_ana; 
      if (is_array($vehiculoid_ana) && !empty($vehiculoid_ana))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0] = $vehiculoid_ana;
      }
      elseif ($vehiculoid_ana_cond_salva == "nu" || $vehiculoid_ana_cond_salva == "nn" || $vehiculoid_ana_cond_salva == "ep" || $vehiculoid_ana_cond_salva == "ne" || !empty($vehiculoid_ana))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][0] = $vehiculoid_ana;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['vehiculoid_ana_cond'] = $vehiculoid_ana_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "vehiculoid_ana"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $vehiculoid_ana_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['vehiculoid_ana'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['operadortlp'] = $operadortlp; 
      if (is_array($operadortlp) && !empty($operadortlp))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0] = $operadortlp;
      }
      elseif ($operadortlp_cond_salva == "nu" || $operadortlp_cond_salva == "nn" || $operadortlp_cond_salva == "ep" || $operadortlp_cond_salva == "ne" || !empty($operadortlp))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][0] = $operadortlp;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['operadortlp_cond'] = $operadortlp_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "operadortlp"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $operadortlp_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['operadortlp'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['usuarioid'] = $usuarioid; 
      if (is_array($usuarioid) && !empty($usuarioid))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0] = $usuarioid;
      }
      elseif ($usuarioid_cond_salva == "nu" || $usuarioid_cond_salva == "nn" || $usuarioid_cond_salva == "ep" || $usuarioid_cond_salva == "ne" || !empty($usuarioid))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][0] = $usuarioid;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['usuarioid_cond'] = $usuarioid_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "usuarioid"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $usuarioid_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['usuarioid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['excentoid'] = $excentoid; 
      if (is_array($excentoid) && !empty($excentoid))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0] = $excentoid;
      }
      elseif ($excentoid_cond_salva == "nu" || $excentoid_cond_salva == "nn" || $excentoid_cond_salva == "ep" || $excentoid_cond_salva == "ne" || !empty($excentoid))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][0] = $excentoid;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['excentoid_cond'] = $excentoid_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "excentoid"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $excentoid_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['excentoid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $Dyn_ok = false;
      $Grid_ok = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fld_ar_sct'] = $fld_ar_sct; 
      if (is_array($fld_ar_sct) && !empty($fld_ar_sct))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0] = $fld_ar_sct;
      }
      elseif ($fld_ar_sct_cond_salva == "nu" || $fld_ar_sct_cond_salva == "nn" || $fld_ar_sct_cond_salva == "ep" || $fld_ar_sct_cond_salva == "ne" || !empty($fld_ar_sct))
      {
          $Grid_ok = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['val'][0][0] = $fld_ar_sct;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fld_ar_sct_cond'] = $fld_ar_sct_cond_salva; 
      if ($Grid_ok)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['cmp'] = "fld_ar_sct"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid]['opc'] = $fld_ar_sct_cond_salva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['fld_ar_sct'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['Grid_search'][$I_Grid];
          $I_Grid++;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['NM_operador'] = $this->NM_operador; 
      if ($this->NM_ajax_flag && $this->NM_ajax_opcao == "ajax_grid_search")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'] = $Temp_Busca;
      }
      $casetaid_LKP = $casetaid;
      $Tmp_pos = (is_string($casetaid)) ? strpos($casetaid, "##@@") : false;
      if ($Tmp_pos !== false)
      {
          $casetaid = substr($casetaid, 0, $Tmp_pos);
          $casetaid_LKP = $casetaid;
      }
      $turnoid_LKP = $turnoid;
      $Tmp_pos = (is_string($turnoid)) ? strpos($turnoid, "##@@") : false;
      if ($Tmp_pos !== false)
      {
          $turnoid = substr($turnoid, 0, $Tmp_pos);
          $turnoid_LKP = $turnoid;
      }
      $carrilid_LKP = $carrilid;
      $Tmp_pos = (is_string($carrilid)) ? strpos($carrilid, "##@@") : false;
      if ($Tmp_pos !== false)
      {
          $carrilid = substr($carrilid, 0, $Tmp_pos);
          $carrilid_LKP = $carrilid;
      }
      $cuerpo_LKP = $cuerpo;
      $Tmp_pos = (is_string($cuerpo)) ? strpos($cuerpo, "##@@") : false;
      if ($Tmp_pos !== false)
      {
          $cuerpo = substr($cuerpo, 0, $Tmp_pos);
          $cuerpo_LKP = $cuerpo;
      }
      $pagoid_ana_LKP = $pagoid_ana;
      $Tmp_pos = (is_string($pagoid_ana)) ? strpos($pagoid_ana, "##@@") : false;
      if ($Tmp_pos !== false)
      {
          $pagoid_ana = substr($pagoid_ana, 0, $Tmp_pos);
          $pagoid_ana_LKP = $pagoid_ana;
      }
      $vehiculoid_ana_LKP = $vehiculoid_ana;
      $Tmp_pos = (is_string($vehiculoid_ana)) ? strpos($vehiculoid_ana, "##@@") : false;
      if ($Tmp_pos !== false)
      {
          $vehiculoid_ana = substr($vehiculoid_ana, 0, $Tmp_pos);
          $vehiculoid_ana_LKP = $vehiculoid_ana;
      }
      $usuarioid_LKP = $usuarioid;
      $Tmp_pos = (is_string($usuarioid)) ? strpos($usuarioid, "##@@") : false;
      if ($Tmp_pos !== false)
      {
          $usuarioid = substr($usuarioid, 0, $Tmp_pos);
          $usuarioid_LKP = $usuarioid;
      }
      $excentoid_LKP = $excentoid;
      $Tmp_pos = (is_string($excentoid)) ? strpos($excentoid, "##@@") : false;
      if ($Tmp_pos !== false)
      {
          $excentoid = substr($excentoid, 0, $Tmp_pos);
          $excentoid_LKP = $excentoid;
      }
      $fld_ar_sct_LKP = $fld_ar_sct;
      $Tmp_pos = (is_string($fld_ar_sct)) ? strpos($fld_ar_sct, "##@@") : false;
      if ($Tmp_pos !== false)
      {
          $fld_ar_sct = substr($fld_ar_sct, 0, $Tmp_pos);
          $fld_ar_sct_LKP = $fld_ar_sct;
      }
      $fechaoperacion_day   = $fechaoperacion_dia; 
      $fechaoperacion_month = $fechaoperacion_mes; 
      $fechaoperacion_year  = $fechaoperacion_ano; 
      $fechaoperacion_diaSv = $fechaoperacion_dia; 
      $fechaoperacion_mesSv = $fechaoperacion_mes; 
      $fechaoperacion_anoSv = $fechaoperacion_ano; 
      $fechaoperacion  = str_repeat(0, (4 - strlen($fechaoperacion_ano))) . $fechaoperacion_ano . "-"; 
      $fechaoperacion .= str_repeat(0, (2 - strlen($fechaoperacion_mes))) . $fechaoperacion_mes . "-"; 
      $fechaoperacion .= str_repeat(0, (2 - strlen($fechaoperacion_dia))) . $fechaoperacion_dia; 
      $fechaoperacion_input_2_day   = $fechaoperacion_input_2_dia; 
      $fechaoperacion_input_2_month = $fechaoperacion_input_2_mes; 
      $fechaoperacion_input_2_year  = $fechaoperacion_input_2_ano; 
      $fechaoperacion_input_2_diaSv = $fechaoperacion_input_2_dia; 
      $fechaoperacion_input_2_mesSv = $fechaoperacion_input_2_mes; 
      $fechaoperacion_input_2_anoSv = $fechaoperacion_input_2_ano; 
      $fechaoperacion_2  = str_repeat(0, (4 - strlen($fechaoperacion_input_2_ano))) . $fechaoperacion_input_2_ano . "-"; 
      $fechaoperacion_2 .= str_repeat(0, (2 - strlen($fechaoperacion_input_2_mes))) . $fechaoperacion_input_2_mes . "-"; 
      $fechaoperacion_2 .= str_repeat(0, (2 - strlen($fechaoperacion_input_2_dia))) . $fechaoperacion_input_2_dia; 
      $horaevento_input_2_Sv = $horaevento_input_2; 
      $horaevento_2          = $horaevento_input_2; 
      $_SESSION['scriptcase']['grid_aforo']['contr_erro'] = 'on';
if (!isset($_SESSION['ModoImagen'])) {$_SESSION['ModoImagen'] = "";}
if (!isset($this->sc_temp_ModoImagen)) {$this->sc_temp_ModoImagen = (isset($_SESSION['ModoImagen'])) ? $_SESSION['ModoImagen'] : "";}
if (!isset($_SESSION['VideoIP'])) {$_SESSION['VideoIP'] = "";}
if (!isset($this->sc_temp_VideoIP)) {$this->sc_temp_VideoIP = (isset($_SESSION['VideoIP'])) ? $_SESSION['VideoIP'] : "";}
 $check_sql = "SELECT VideoiP, ModoImagen FROM casetas WHERE CasetaID = " . peaje_sql_int($casetaid, '0');
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 


if (isset($rs[0][0])) 
{
$this->sc_temp_VideoIP = $rs[0][0];
$this->sc_temp_ModoImagen = $rs[0][1];
}
else 
{
$this->sc_temp_VideoIP = 0;

}
if (isset($this->sc_temp_VideoIP)) {$_SESSION['VideoIP'] = $this->sc_temp_VideoIP;}
if (isset($this->sc_temp_ModoImagen)) {$_SESSION['ModoImagen'] = $this->sc_temp_ModoImagen;}
$_SESSION['scriptcase']['grid_aforo']['contr_erro'] = 'off'; 
      if ($casetaid_LKP == $casetaid)
      {
          $casetaid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['casetaid'];
      }
      if ($turnoid_LKP == $turnoid)
      {
          $turnoid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['turnoid'];
      }
      if ($carrilid_LKP == $carrilid)
      {
          $carrilid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['carrilid'];
      }
      if ($cuerpo_LKP == $cuerpo)
      {
          $cuerpo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['cuerpo'];
      }
      if ($pagoid_ana_LKP == $pagoid_ana)
      {
          $pagoid_ana = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['pagoid_ana'];
      }
      if ($vehiculoid_ana_LKP == $vehiculoid_ana)
      {
          $vehiculoid_ana = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['vehiculoid_ana'];
      }
      if ($usuarioid_LKP == $usuarioid)
      {
          $usuarioid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['usuarioid'];
      }
      if ($excentoid_LKP == $excentoid)
      {
          $excentoid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['excentoid'];
      }
      if ($fld_ar_sct_LKP == $fld_ar_sct)
      {
          $fld_ar_sct = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fld_ar_sct'];
      }
      if ($fechaoperacion_day != $fechaoperacion_diaSv)
      {
          $fechaoperacion_dia = $fechaoperacion_day; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_dia'] = $fechaoperacion_dia; 
      }
      if ($fechaoperacion_month != $fechaoperacion_mesSv)
      {
          $fechaoperacion_mes = $fechaoperacion_month; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_mes'] = $fechaoperacion_mes; 
      }
      if ($fechaoperacion_year != $fechaoperacion_anoSv)
      {
          $fechaoperacion_ano = $fechaoperacion_year; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_ano'] = $fechaoperacion_ano; 
      }
      $fechaoperacion = str_replace("0000", "", $fechaoperacion);
      $fechaoperacion = str_replace("-00", "-", $fechaoperacion);
      $fechaoperacionXX = explode("-", $fechaoperacion);
      if (isset($fechaoperacionXX[2]) && $fechaoperacionXX[2] != $fechaoperacion_diaSv)
      {
          $fechaoperacion_dia = $fechaoperacionXX[2]; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_dia'] = $fechaoperacionXX[2]; 
      }
      if (isset($fechaoperacionXX[1]) && $fechaoperacionXX[1] != $fechaoperacion_mesSv)
      {
          $fechaoperacion_mes = $fechaoperacionXX[1]; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_mes'] = $fechaoperacionXX[1]; 
      }
      if (isset($fechaoperacionXX[0]) && $fechaoperacionXX[0] != $fechaoperacion_anoSv)
      {
          $fechaoperacion_ano = $fechaoperacionXX[0]; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_ano'] = $fechaoperacionXX[0]; 
      }
      if ($fechaoperacion_input_2_day != $fechaoperacion_input_2_diaSv)
      {
          $fechaoperacion_input_2_dia = $fechaoperacion_input_2_day; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_dia'] = $fechaoperacion_input_2_dia; 
      }
      if ($fechaoperacion_input_2_month != $fechaoperacion_input_2_mesSv)
      {
          $fechaoperacion_input_2_mes = $fechaoperacion_input_2_month; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_mes'] = $fechaoperacion_input_2_mes; 
      }
      if ($fechaoperacion_input_2_year != $fechaoperacion_input_2_anoSv)
      {
          $fechaoperacion_input_2_ano = $fechaoperacion_input_2_year; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_ano'] = $fechaoperacion_input_2_ano; 
      }
      $fechaoperacion_2 = str_replace("0000", "", $fechaoperacion_2);
      $fechaoperacion_2 = str_replace("-00", "-", $fechaoperacion_2);
      $fechaoperacionXX = explode("-", $fechaoperacion_2);
      if (isset($fechaoperacionXX[2]) && $fechaoperacionXX[2] != $fechaoperacion_input_2_diaSv)
      {
          $fechaoperacion_input_2_dia = $fechaoperacionXX[2]; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_dia'] = $fechaoperacionXX[2]; 
      }
      if (isset($fechaoperacionXX[1]) && $fechaoperacionXX[1] != $fechaoperacion_input_2_mesSv)
      {
          $fechaoperacion_input_2_mes = $fechaoperacionXX[1]; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_mes'] = $fechaoperacionXX[1]; 
      }
      if (isset($fechaoperacionXX[0]) && $fechaoperacionXX[0] != $fechaoperacion_input_2_anoSv)
      {
          $fechaoperacion_input_2_ano = $fechaoperacionXX[0]; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2_ano'] = $fechaoperacionXX[0]; 
      }
      if (isset($horaevento_2) && $horaevento_2 != $horaevento_input_2_Sv)
      {
          $horaevento_input_2 = $horaevento_2; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_input_2'] = $horaevento_2; 
      }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      $Conteudo = $casetaid;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['casetaid'] = $Conteudo;
      $Conteudo = $turnoid;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['turnoid'] = $Conteudo;
      $Conteudo = $carrilid;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['carrilid'] = $Conteudo;
      $Conteudo = $cuerpo;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['cuerpo'] = $Conteudo;
      $Conteudo = $pagoid_ana;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['pagoid_ana'] = $Conteudo;
      $Conteudo = $vehiculoid_ana;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['vehiculoid_ana'] = $Conteudo;
      $nmgp_def_dados = array();
    if ($operadortlp != '') {
      $operadortlp_look = (is_string($operadortlp) ? substr($this->Db->qstr($operadortlp), 1, -1) : $operadortlp); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct OperadorTLP from " . $this->Ini->nm_tabela . " where OperadorTLP = '$operadortlp_look' order by OperadorTLP"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->SelectLimit($nm_comando, 10, 0)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

    }
      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['operadortlp'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['operadortlp'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['operadortlp'] = $operadortlp;
      }
      $Conteudo = $usuarioid;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['usuarioid'] = $Conteudo;
      $Conteudo = $excentoid;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['excentoid'] = $Conteudo;
      $Conteudo = $fld_ar_sct;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['fld_ar_sct'] = $Conteudo;

      //----- $casetaid
      $this->Date_part = false;
      if (isset($casetaid))
      {
         $this->monta_condicao("CasetaID", $casetaid_cond, $casetaid, "", "casetaid", "CHAR", false);
      }

      //----- $fechaoperacion
      $this->Date_part = false;
      if ($fechaoperacion_cond != "bi_TP")
      {
          $fechaoperacion_cond = strtoupper($fechaoperacion_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $fechaoperacion_ano;
          $Dtxt .= $fechaoperacion_mes;
          $Dtxt .= $fechaoperacion_dia;
          $val[0]['ano'] = $fechaoperacion_ano;
          $val[0]['mes'] = $fechaoperacion_mes;
          $val[0]['dia'] = $fechaoperacion_dia;
          if ($fechaoperacion_cond == "BW")
          {
              $val[1]['ano'] = $fechaoperacion_input_2_ano;
              $val[1]['mes'] = $fechaoperacion_input_2_mes;
              $val[1]['dia'] = $fechaoperacion_input_2_dia;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->nm_prep_date($val, "DT", "DATETIME", $fechaoperacion_cond, "", "data");
          }
          else
          {
              $this->nm_prep_date($val, "DT", "DATE", $fechaoperacion_cond, "", "data");
          }
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $fechaoperacion = $val[0];
          $this->cmp_formatado['fechaoperacion'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['fechaoperacion'], "YYYY-MM-DD");
          $this->cmp_formatado['fechaoperacion'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          if ($fechaoperacion_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $fechaoperacion_input_2     = $val[1];
              $this->cmp_formatado['fechaoperacion_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['fechaoperacion_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['fechaoperacion_input_2'], "YYYY-MM-DD");
              $this->cmp_formatado['fechaoperacion_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          }
          if (!empty($Dtxt) || $fechaoperacion_cond == "NU" || $fechaoperacion_cond == "NN"|| $fechaoperacion_cond == "EP"|| $fechaoperacion_cond == "NE")
          {
              $this->monta_condicao("FechaOperacion", $fechaoperacion_cond, $fechaoperacion, $fechaoperacion_input_2, 'fechaoperacion', 'DATE');
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['fechaoperacion']['label'] = $nmgp_tab_label['fechaoperacion'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['fechaoperacion']['descr'] = $nmgp_tab_label['fechaoperacion'] . " " . $this->Ini->Nm_lang['lang_srch_ever'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['fechaoperacion']['hint']  = $nmgp_tab_label['fechaoperacion'] . " " . $this->Ini->Nm_lang['lang_srch_ever'];
      }

      //----- $horaevento
      $this->Date_part = false;
      if ($horaevento_cond != "bi_TP")
      {
          $horaevento_cond = strtoupper($horaevento_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $horaevento_hor;
          $Dtxt .= $horaevento_min;
          $Dtxt .= $horaevento_seg;
          $val[0]['hor'] = $horaevento_hor;
          $val[0]['min'] = $horaevento_min;
          $val[0]['seg'] = $horaevento_seg;
          if ($horaevento_cond == "BW")
          {
              $val[1]['ano'] = $horaevento_input_2_ano;
              $val[1]['mes'] = $horaevento_input_2_mes;
              $val[1]['dia'] = $horaevento_input_2_dia;
              $val[1]['hor'] = $horaevento_input_2_hor;
              $val[1]['min'] = $horaevento_input_2_min;
              $val[1]['seg'] = $horaevento_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "HH", "TIME", $horaevento_cond, "", "hora");
          $horaevento = $val[0];
          $this->cmp_formatado['horaevento'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['horaevento'], "HH:II:SS");
          $this->cmp_formatado['horaevento'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "his"));
          if ($horaevento_cond == "BW")
          {
              $horaevento_input_2     = $val[1];
              $this->cmp_formatado['horaevento_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']['horaevento_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['horaevento_input_2'], "HH:II:SS");
              $this->cmp_formatado['horaevento_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "his"));
          }
          if (!empty($Dtxt) || $horaevento_cond == "NU" || $horaevento_cond == "NN"|| $horaevento_cond == "EP"|| $horaevento_cond == "NE")
          {
              $this->monta_condicao("HoraEvento", $horaevento_cond, $horaevento, $horaevento_input_2, 'horaevento', 'TIME');
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['horaevento']['label'] = $nmgp_tab_label['horaevento'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['horaevento']['descr'] = $nmgp_tab_label['horaevento'] . " " . $this->Ini->Nm_lang['lang_srch_ever'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['grid_pesq']['horaevento']['hint']  = $nmgp_tab_label['horaevento'] . " " . $this->Ini->Nm_lang['lang_srch_ever'];
      }

      //----- $turnoid
      $this->Date_part = false;
      if (isset($turnoid))
      {
         $this->monta_condicao("TurnoID", $turnoid_cond, $turnoid, "", "turnoid", "TINYINT", false);
      }

      //----- $carrilid
      $this->Date_part = false;
      if (isset($carrilid))
      {
         $this->monta_condicao("CarrilID", $carrilid_cond, $carrilid, "", "carrilid", "TINYINT", false);
      }

      //----- $cuerpo
      $this->Date_part = false;
      if (isset($cuerpo))
      {
         $this->monta_condicao("Cuerpo", $cuerpo_cond, $cuerpo, "", "cuerpo", "CHAR", false);
      }

      //----- $pagoid_ana
      $this->Date_part = false;
      if (isset($pagoid_ana))
      {
         $this->monta_condicao("PagoID_ANA", $pagoid_ana_cond, $pagoid_ana, "", "pagoid_ana", "VARCHAR", false);
      }

      //----- $vehiculoid_ana
      $this->Date_part = false;
      if (isset($vehiculoid_ana))
      {
         $this->monta_condicao("VehiculoID_ANA", $vehiculoid_ana_cond, $vehiculoid_ana, "", "vehiculoid_ana", "VARCHAR", false);
      }

      //----- $operadortlp
      $this->Date_part = false;
      if (isset($operadortlp) || $operadortlp_cond == "nu" || $operadortlp_cond == "nn" || $operadortlp_cond == "ep" || $operadortlp_cond == "ne")
      {
         $this->monta_condicao("OperadorTLP", $operadortlp_cond, $operadortlp, "", "operadortlp", "VARCHAR", false);
      }

      //----- $usuarioid
      $this->Date_part = false;
      if (isset($usuarioid))
      {
         $this->monta_condicao("UsuarioID", $usuarioid_cond, $usuarioid, "", "usuarioid", "MEDIUMINT", false);
      }

      //----- $excentoid
      $this->Date_part = false;
      if (isset($excentoid))
      {
         $this->monta_condicao("ExcentoID", $excentoid_cond, $excentoid, "", "excentoid", "INT", false);
      }

      //----- $fld_ar_sct
      $this->Date_part = false;
      if (isset($fld_ar_sct))
      {
         $this->monta_condicao("fld_ar_sct", $fld_ar_sct_cond, $fld_ar_sct, "", "fld_ar_sct", "CHAR", false);
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado_ajax()
   {
       $this->comando = substr($this->comando, 8);
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq_grid'] = $this->comando;
       if (empty($this->comando)) 
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq_filtro'] = "";
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_orig'];
       }
       else
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq_filtro'] = "( " . $this->comando . " )";
           if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_orig'])) 
           {
               $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_orig'] . " and (" . $this->comando . ")"; 
           }
           else
           {
               $this->comando = " where " . $this->comando; 
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq'] = $this->comando;
       }
   }
   function finaliza_resultado()
   {
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['dyn_search']      = array();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_dyn_search'] = "";
      if ("" == $this->comando_filtro)
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_orig'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['campos_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq_grid']    = $this->comando_filtro;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_aforo']['where_pesq'];

      if ($this->NM_ajax_flag && ($this->NM_ajax_opcao == "ajax_grid_search" || $this->NM_ajax_opcao == "ajax_grid_search_change_fil"))
      {
         return;
      }
      $this->retorna_pesq();
   }
   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

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

   
   function css_obj_select_ajax($Obj)
   {
      switch ($Obj)
      {
         case "casetaid" : return ('class="scFilterObjectOdd"'); break;
         case "turnoid" : return ('class="scFilterObjectEven"'); break;
         case "carrilid" : return ('class="scFilterObjectOdd"'); break;
         case "pagoid_ana" : return ('class="scFilterObjectOdd"'); break;
         case "vehiculoid_ana" : return ('class="scFilterObjectEven"'); break;
         case "usuarioid" : return ('class="scFilterObjectEven"'); break;
         case "excentoid" : return ('class="scFilterObjectOdd"'); break;
         default       : return ("");
      }
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
}

?>
