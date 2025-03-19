<?php
class pdfreport_aforo_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $titulo = array();
   var $casetaid = array();
   var $fechaoperacion = array();
   var $fechaturno = array();
   var $turnoid = array();
   var $horaevento = array();
   var $tramoid = array();
   var $carrilid = array();
   var $cuerpo = array();
   var $secuencial = array();
   var $folio = array();
   var $vehiculoid_cr = array();
   var $clasevehiculo_cr = array();
   var $importe_cr = array();
   var $cantidadeje_cr = array();
   var $tarifaee_cr = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("es");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "LETTER";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_aforo']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   include_once($this->Ini->path_aplicacao . "pdfreport_aforo_head_foot.php"); 
   $this->Pdf = new Header_Footer('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->Db   = $this->Db;
   $this->Pdf->Erro = $this->Erro;
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_aforo", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->casetaid[0] = (isset($Busca_temp['casetaid'])) ? $Busca_temp['casetaid'] : ""; 
       $tmp_pos = (is_string($this->casetaid[0])) ? strpos($this->casetaid[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->casetaid[0]))
       {
           $this->casetaid[0] = substr($this->casetaid[0], 0, $tmp_pos);
       }
       $this->fechaoperacion[0] = (isset($Busca_temp['fechaoperacion'])) ? $Busca_temp['fechaoperacion'] : ""; 
       $tmp_pos = (is_string($this->fechaoperacion[0])) ? strpos($this->fechaoperacion[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->fechaoperacion[0]))
       {
           $this->fechaoperacion[0] = substr($this->fechaoperacion[0], 0, $tmp_pos);
       }
       $fechaoperacion_2 = (isset($Busca_temp['fechaoperacion_input_2'])) ? $Busca_temp['fechaoperacion_input_2'] : ""; 
       $this->fechaoperacion_2 = $fechaoperacion_2; 
       $this->fechaturno[0] = (isset($Busca_temp['fechaturno'])) ? $Busca_temp['fechaturno'] : ""; 
       $tmp_pos = (is_string($this->fechaturno[0])) ? strpos($this->fechaturno[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->fechaturno[0]))
       {
           $this->fechaturno[0] = substr($this->fechaturno[0], 0, $tmp_pos);
       }
       $fechaturno_2 = (isset($Busca_temp['fechaturno_input_2'])) ? $Busca_temp['fechaturno_input_2'] : ""; 
       $this->fechaturno_2 = $fechaturno_2; 
       $this->turnoid[0] = (isset($Busca_temp['turnoid'])) ? $Busca_temp['turnoid'] : ""; 
       $tmp_pos = (is_string($this->turnoid[0])) ? strpos($this->turnoid[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->turnoid[0]))
       {
           $this->turnoid[0] = substr($this->turnoid[0], 0, $tmp_pos);
       }
       $this->tarifaee_cr[0] = (isset($Busca_temp['tarifaee_cr'])) ? $Busca_temp['tarifaee_cr'] : ""; 
       $tmp_pos = (is_string($this->tarifaee_cr[0])) ? strpos($this->tarifaee_cr[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->tarifaee_cr[0]))
       {
           $this->tarifaee_cr[0] = substr($this->tarifaee_cr[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->fechaoperacion_2 = ""; 
       $this->fechaturno_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq_filtro'];
   $_SESSION['scriptcase']['pdfreport_aforo']['contr_erro'] = 'on';
 $this->titulo[$this->nm_grid_colunas]  = "Este es mi titulo";
$_SESSION['scriptcase']['pdfreport_aforo']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_aforo']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_aforo']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_aforo']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_aforo']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_orig'] = " where (Secuencial < 200)";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT CasetaID, str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20), str_replace (convert(char(10),FechaTurno,102), '.', '-') + ' ' + convert(char(8),FechaTurno,20), TurnoID, str_replace (convert(char(10),HoraEvento,102), '.', '-') + ' ' + convert(char(8),HoraEvento,20), TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT CasetaID, convert(char(23),FechaOperacion,121), convert(char(23),FechaTurno,121), TurnoID, convert(char(23),HoraEvento,121), TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT CasetaID, EXTEND(FechaOperacion, YEAR TO DAY), EXTEND(FechaTurno, YEAR TO DAY), TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT CasetaID, FechaOperacion, FechaTurno, TurnoID, HoraEvento, TramoID, CarrilID, Cuerpo, Secuencial, Folio, VehiculoID_CR, ClaseVehiculo_CR, Importe_CR, CantidadEje_CR, TarifaEE_CR from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['casetaid'] = "Caseta ID";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['fechaoperacion'] = "Fecha Operacion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['fechaturno'] = "Fecha Turno";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['turnoid'] = "Turno ID";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['horaevento'] = "Hora Evento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['tramoid'] = "Tramo ID";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['carrilid'] = "Carril ID";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['cuerpo'] = "Cuerpo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['secuencial'] = "Secuencial";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['folio'] = "Folio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['vehiculoid_cr'] = "Vehiculo ID CR";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['clasevehiculo_cr'] = "Clase Vehiculo CR";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['importe_cr'] = "Importe CR";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['cantidadeje_cr'] = "Cantidad Eje CR";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['tarifaee_cr'] = "Tarifa EE CR";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['labels']['titulo'] = "Titulo";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_aforo']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_aforo']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_aforo']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(0.000000, 0.000000, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_aforo']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->casetaid[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->fechaoperacion[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->fechaturno[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->turnoid[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->turnoid[$this->nm_grid_colunas] = (string)$this->turnoid[$this->nm_grid_colunas];
          $this->horaevento[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->tramoid[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->tramoid[$this->nm_grid_colunas] = (string)$this->tramoid[$this->nm_grid_colunas];
          $this->carrilid[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->carrilid[$this->nm_grid_colunas] = (string)$this->carrilid[$this->nm_grid_colunas];
          $this->cuerpo[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->secuencial[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->secuencial[$this->nm_grid_colunas] = (string)$this->secuencial[$this->nm_grid_colunas];
          $this->folio[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->folio[$this->nm_grid_colunas] = (string)$this->folio[$this->nm_grid_colunas];
          $this->vehiculoid_cr[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->clasevehiculo_cr[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->importe_cr[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->importe_cr[$this->nm_grid_colunas] =  str_replace(",", ".", $this->importe_cr[$this->nm_grid_colunas]);
          $this->importe_cr[$this->nm_grid_colunas] = (string)$this->importe_cr[$this->nm_grid_colunas];
          $this->cantidadeje_cr[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->cantidadeje_cr[$this->nm_grid_colunas] = (string)$this->cantidadeje_cr[$this->nm_grid_colunas];
          $this->tarifaee_cr[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->tarifaee_cr[$this->nm_grid_colunas] =  str_replace(",", ".", $this->tarifaee_cr[$this->nm_grid_colunas]);
          $this->tarifaee_cr[$this->nm_grid_colunas] = (string)$this->tarifaee_cr[$this->nm_grid_colunas];
          $this->titulo[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_casetaid($this->casetaid[$this->nm_grid_colunas] , $this->casetaid[$this->nm_grid_colunas]) ; 
          $this->casetaid[$this->nm_grid_colunas] = sc_strip_script($this->casetaid[$this->nm_grid_colunas]);
          if ($this->casetaid[$this->nm_grid_colunas] === "") 
          { 
              $this->casetaid[$this->nm_grid_colunas] = "" ;  
          } 
          $this->casetaid[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->casetaid[$this->nm_grid_colunas]);
          $this->fechaoperacion[$this->nm_grid_colunas] = sc_strip_script($this->fechaoperacion[$this->nm_grid_colunas]);
          if ($this->fechaoperacion[$this->nm_grid_colunas] === "") 
          { 
              $this->fechaoperacion[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fechaoperacion_x =  $this->fechaoperacion[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fechaoperacion_x, "YYYY-MM-DD");
               if (is_numeric($fechaoperacion_x) && strlen($fechaoperacion_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fechaoperacion[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fechaoperacion[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fechaoperacion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechaoperacion[$this->nm_grid_colunas]);
          $this->fechaturno[$this->nm_grid_colunas] = sc_strip_script($this->fechaturno[$this->nm_grid_colunas]);
          if ($this->fechaturno[$this->nm_grid_colunas] === "") 
          { 
              $this->fechaturno[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fechaturno_x =  $this->fechaturno[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fechaturno_x, "YYYY-MM-DD");
               if (is_numeric($fechaturno_x) && strlen($fechaturno_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fechaturno[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fechaturno[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fechaturno[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechaturno[$this->nm_grid_colunas]);
          $this->turnoid[$this->nm_grid_colunas] = sc_strip_script($this->turnoid[$this->nm_grid_colunas]);
          if ($this->turnoid[$this->nm_grid_colunas] === "") 
          { 
              $this->turnoid[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->turnoid[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->turnoid[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->turnoid[$this->nm_grid_colunas]);
          $this->horaevento[$this->nm_grid_colunas] = sc_strip_script($this->horaevento[$this->nm_grid_colunas]);
          if ($this->horaevento[$this->nm_grid_colunas] === "") 
          { 
              $this->horaevento[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $horaevento_x =  $this->horaevento[$this->nm_grid_colunas];
               nm_conv_limpa_dado($horaevento_x, "HH:II:SS");
               if (is_numeric($horaevento_x) && strlen($horaevento_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->horaevento[$this->nm_grid_colunas], "HH:II:SS");
                   $this->horaevento[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->horaevento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->horaevento[$this->nm_grid_colunas]);
          $this->tramoid[$this->nm_grid_colunas] = sc_strip_script($this->tramoid[$this->nm_grid_colunas]);
          if ($this->tramoid[$this->nm_grid_colunas] === "") 
          { 
              $this->tramoid[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tramoid[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->tramoid[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tramoid[$this->nm_grid_colunas]);
          $this->carrilid[$this->nm_grid_colunas] = sc_strip_script($this->carrilid[$this->nm_grid_colunas]);
          if ($this->carrilid[$this->nm_grid_colunas] === "") 
          { 
              $this->carrilid[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->carrilid[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->carrilid[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->carrilid[$this->nm_grid_colunas]);
          $this->cuerpo[$this->nm_grid_colunas] = sc_strip_script($this->cuerpo[$this->nm_grid_colunas]);
          if ($this->cuerpo[$this->nm_grid_colunas] === "") 
          { 
              $this->cuerpo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cuerpo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cuerpo[$this->nm_grid_colunas]);
          $this->secuencial[$this->nm_grid_colunas] = sc_strip_script($this->secuencial[$this->nm_grid_colunas]);
          if ($this->secuencial[$this->nm_grid_colunas] === "") 
          { 
              $this->secuencial[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->secuencial[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->secuencial[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->secuencial[$this->nm_grid_colunas]);
          $this->folio[$this->nm_grid_colunas] = sc_strip_script($this->folio[$this->nm_grid_colunas]);
          if ($this->folio[$this->nm_grid_colunas] === "") 
          { 
              $this->folio[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->folio[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->folio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->folio[$this->nm_grid_colunas]);
          $this->vehiculoid_cr[$this->nm_grid_colunas] = sc_strip_script($this->vehiculoid_cr[$this->nm_grid_colunas]);
          if ($this->vehiculoid_cr[$this->nm_grid_colunas] === "") 
          { 
              $this->vehiculoid_cr[$this->nm_grid_colunas] = "" ;  
          } 
          $this->vehiculoid_cr[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->vehiculoid_cr[$this->nm_grid_colunas]);
          $this->clasevehiculo_cr[$this->nm_grid_colunas] = sc_strip_script($this->clasevehiculo_cr[$this->nm_grid_colunas]);
          if ($this->clasevehiculo_cr[$this->nm_grid_colunas] === "") 
          { 
              $this->clasevehiculo_cr[$this->nm_grid_colunas] = "" ;  
          } 
          $this->clasevehiculo_cr[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->clasevehiculo_cr[$this->nm_grid_colunas]);
          $this->importe_cr[$this->nm_grid_colunas] = sc_strip_script($this->importe_cr[$this->nm_grid_colunas]);
          if ($this->importe_cr[$this->nm_grid_colunas] === "") 
          { 
              $this->importe_cr[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->importe_cr[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->importe_cr[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->importe_cr[$this->nm_grid_colunas]);
          $this->cantidadeje_cr[$this->nm_grid_colunas] = sc_strip_script($this->cantidadeje_cr[$this->nm_grid_colunas]);
          if ($this->cantidadeje_cr[$this->nm_grid_colunas] === "") 
          { 
              $this->cantidadeje_cr[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->cantidadeje_cr[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->cantidadeje_cr[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cantidadeje_cr[$this->nm_grid_colunas]);
          $this->tarifaee_cr[$this->nm_grid_colunas] = sc_strip_script($this->tarifaee_cr[$this->nm_grid_colunas]);
          if ($this->tarifaee_cr[$this->nm_grid_colunas] === "") 
          { 
              $this->tarifaee_cr[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tarifaee_cr[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->tarifaee_cr[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tarifaee_cr[$this->nm_grid_colunas]);
          if ($this->titulo[$this->nm_grid_colunas] === "") 
          { 
              $this->titulo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->titulo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->titulo[$this->nm_grid_colunas]);
          $_SESSION['pdfreport_aforo']['casetaid'] = $this->casetaid[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['fechaoperacion'] = $this->fechaoperacion[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['turnoid'] = $this->turnoid[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['tramoid'] = $this->tramoid[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['titulo'] = $this->titulo[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['fechaturno'] = $this->fechaturno[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['horaevento'] = $this->horaevento[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['carrilid'] = $this->carrilid[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['cuerpo'] = $this->cuerpo[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['secuencial'] = $this->secuencial[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['folio'] = $this->folio[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['vehiculoid_cr'] = $this->vehiculoid_cr[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['clasevehiculo_cr'] = $this->clasevehiculo_cr[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['importe_cr'] = $this->importe_cr[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['cantidadeje_cr'] = $this->cantidadeje_cr[$this->nm_grid_colunas];
          $_SESSION['pdfreport_aforo']['tarifaee_cr'] = $this->tarifaee_cr[$this->nm_grid_colunas];
          if ($Init_Pdf)
          {
              $this->Pdf_init();
              $this->Pdf->setImageScale(1.33);
              $this->Pdf->AddPage();
              $this->Pdf->SetY(40);
              $Init_Pdf = false;
          }
                      /*-------- Def. Header --------*/
            $cell_CasetaID = array('posx' => '11.583802291665206', 'posy' => '12.906718958331707', 'data' => $this->casetaid[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_FechaOperacion = array('posx' => '10.777643333331973', 'posy' => '20.51764374999741', 'data' => $this->fechaoperacion[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_TurnoID = array('posx' => '11.840104166665174', 'posy' => '28.34772291666309', 'data' => $this->turnoid[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_TramoID = array('posx' => '116.08593749998536', 'posy' => '13.423476666664973', 'data' => $this->tramoid[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Titulo = array('posx' => '12', 'posy' => '13', 'data' => $this->titulo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'B');
          /*-------- Def. Body --------*/
            $cell_FechaTurno = array('posx' => '10', 'posy' => '0', 'data' => $this->fechaturno[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_HoraEvento = array('posx' => '36.454556249995406', 'posy' => '0', 'data' => $this->horaevento[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_CarrilID = array('posx' => '38', 'posy' => '0', 'data' => $this->carrilid[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Cuerpo = array('posx' => '185.73644166664323', 'posy' => '0', 'data' => $this->cuerpo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Secuencial = array('posx' => '50.7420562499936', 'posy' => '0', 'data' => $this->secuencial[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Folio = array('posx' => '29.839972916662905', 'posy' => '0', 'data' => $this->folio[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_VehiculoID_CR = array('posx' => '77.9941395833235', 'posy' => '0', 'data' => $this->vehiculoid_cr[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ClaseVehiculo_CR = array('posx' => '102.0712229166538', 'posy' => '0', 'data' => $this->clasevehiculo_cr[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Importe_CR = array('posx' => '63.706639583325305', 'posy' => '0', 'data' => $this->importe_cr[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_CantidadEje_CR = array('posx' => '164.56977499997924', 'posy' => '0', 'data' => $this->cantidadeje_cr[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_TarifaEE_CR = array('posx' => '126.40997916665073', 'posy' => '0', 'data' => $this->tarifaee_cr[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);



            $this->Pdf->SetFont($cell_FechaTurno['font_type'], $cell_FechaTurno['font_style'], $cell_FechaTurno['font_size']);
            $this->pdf_text_color($cell_FechaTurno['data'], $cell_FechaTurno['color_r'], $cell_FechaTurno['color_g'], $cell_FechaTurno['color_b']);
            if (!empty($cell_FechaTurno['posx']) && !empty($cell_FechaTurno['posy']))
            {
                $this->Pdf->SetXY($cell_FechaTurno['posx'], $cell_FechaTurno['posy']);
            }
            elseif (!empty($cell_FechaTurno['posx']))
            {
                $this->Pdf->SetX($cell_FechaTurno['posx']);
            }
            elseif (!empty($cell_FechaTurno['posy']))
            {
                $this->Pdf->SetY($cell_FechaTurno['posy']);
            }
            $this->Pdf->Cell($cell_FechaTurno['width'], 0, $cell_FechaTurno['data'], 0, 0, $cell_FechaTurno['align']);

            $this->Pdf->SetFont($cell_HoraEvento['font_type'], $cell_HoraEvento['font_style'], $cell_HoraEvento['font_size']);
            $this->pdf_text_color($cell_HoraEvento['data'], $cell_HoraEvento['color_r'], $cell_HoraEvento['color_g'], $cell_HoraEvento['color_b']);
            if (!empty($cell_HoraEvento['posx']) && !empty($cell_HoraEvento['posy']))
            {
                $this->Pdf->SetXY($cell_HoraEvento['posx'], $cell_HoraEvento['posy']);
            }
            elseif (!empty($cell_HoraEvento['posx']))
            {
                $this->Pdf->SetX($cell_HoraEvento['posx']);
            }
            elseif (!empty($cell_HoraEvento['posy']))
            {
                $this->Pdf->SetY($cell_HoraEvento['posy']);
            }
            $this->Pdf->Cell($cell_HoraEvento['width'], 0, $cell_HoraEvento['data'], 0, 0, $cell_HoraEvento['align']);

            $this->Pdf->SetFont($cell_CarrilID['font_type'], $cell_CarrilID['font_style'], $cell_CarrilID['font_size']);
            $this->pdf_text_color($cell_CarrilID['data'], $cell_CarrilID['color_r'], $cell_CarrilID['color_g'], $cell_CarrilID['color_b']);
            if (!empty($cell_CarrilID['posx']) && !empty($cell_CarrilID['posy']))
            {
                $this->Pdf->SetXY($cell_CarrilID['posx'], $cell_CarrilID['posy']);
            }
            elseif (!empty($cell_CarrilID['posx']))
            {
                $this->Pdf->SetX($cell_CarrilID['posx']);
            }
            elseif (!empty($cell_CarrilID['posy']))
            {
                $this->Pdf->SetY($cell_CarrilID['posy']);
            }
            $this->Pdf->Cell($cell_CarrilID['width'], 0, $cell_CarrilID['data'], 0, 0, $cell_CarrilID['align']);

            $this->Pdf->SetFont($cell_Cuerpo['font_type'], $cell_Cuerpo['font_style'], $cell_Cuerpo['font_size']);
            $this->pdf_text_color($cell_Cuerpo['data'], $cell_Cuerpo['color_r'], $cell_Cuerpo['color_g'], $cell_Cuerpo['color_b']);
            if (!empty($cell_Cuerpo['posx']) && !empty($cell_Cuerpo['posy']))
            {
                $this->Pdf->SetXY($cell_Cuerpo['posx'], $cell_Cuerpo['posy']);
            }
            elseif (!empty($cell_Cuerpo['posx']))
            {
                $this->Pdf->SetX($cell_Cuerpo['posx']);
            }
            elseif (!empty($cell_Cuerpo['posy']))
            {
                $this->Pdf->SetY($cell_Cuerpo['posy']);
            }
            $this->Pdf->Cell($cell_Cuerpo['width'], 0, $cell_Cuerpo['data'], 0, 0, $cell_Cuerpo['align']);

            $this->Pdf->SetFont($cell_Secuencial['font_type'], $cell_Secuencial['font_style'], $cell_Secuencial['font_size']);
            $this->pdf_text_color($cell_Secuencial['data'], $cell_Secuencial['color_r'], $cell_Secuencial['color_g'], $cell_Secuencial['color_b']);
            if (!empty($cell_Secuencial['posx']) && !empty($cell_Secuencial['posy']))
            {
                $this->Pdf->SetXY($cell_Secuencial['posx'], $cell_Secuencial['posy']);
            }
            elseif (!empty($cell_Secuencial['posx']))
            {
                $this->Pdf->SetX($cell_Secuencial['posx']);
            }
            elseif (!empty($cell_Secuencial['posy']))
            {
                $this->Pdf->SetY($cell_Secuencial['posy']);
            }
            $this->Pdf->Cell($cell_Secuencial['width'], 0, $cell_Secuencial['data'], 0, 0, $cell_Secuencial['align']);

            $this->Pdf->SetFont($cell_Folio['font_type'], $cell_Folio['font_style'], $cell_Folio['font_size']);
            $this->pdf_text_color($cell_Folio['data'], $cell_Folio['color_r'], $cell_Folio['color_g'], $cell_Folio['color_b']);
            if (!empty($cell_Folio['posx']) && !empty($cell_Folio['posy']))
            {
                $this->Pdf->SetXY($cell_Folio['posx'], $cell_Folio['posy']);
            }
            elseif (!empty($cell_Folio['posx']))
            {
                $this->Pdf->SetX($cell_Folio['posx']);
            }
            elseif (!empty($cell_Folio['posy']))
            {
                $this->Pdf->SetY($cell_Folio['posy']);
            }
            $this->Pdf->Cell($cell_Folio['width'], 0, $cell_Folio['data'], 0, 0, $cell_Folio['align']);

            $this->Pdf->SetFont($cell_VehiculoID_CR['font_type'], $cell_VehiculoID_CR['font_style'], $cell_VehiculoID_CR['font_size']);
            $this->pdf_text_color($cell_VehiculoID_CR['data'], $cell_VehiculoID_CR['color_r'], $cell_VehiculoID_CR['color_g'], $cell_VehiculoID_CR['color_b']);
            if (!empty($cell_VehiculoID_CR['posx']) && !empty($cell_VehiculoID_CR['posy']))
            {
                $this->Pdf->SetXY($cell_VehiculoID_CR['posx'], $cell_VehiculoID_CR['posy']);
            }
            elseif (!empty($cell_VehiculoID_CR['posx']))
            {
                $this->Pdf->SetX($cell_VehiculoID_CR['posx']);
            }
            elseif (!empty($cell_VehiculoID_CR['posy']))
            {
                $this->Pdf->SetY($cell_VehiculoID_CR['posy']);
            }
            $this->Pdf->Cell($cell_VehiculoID_CR['width'], 0, $cell_VehiculoID_CR['data'], 0, 0, $cell_VehiculoID_CR['align']);

            $this->Pdf->SetFont($cell_ClaseVehiculo_CR['font_type'], $cell_ClaseVehiculo_CR['font_style'], $cell_ClaseVehiculo_CR['font_size']);
            $this->pdf_text_color($cell_ClaseVehiculo_CR['data'], $cell_ClaseVehiculo_CR['color_r'], $cell_ClaseVehiculo_CR['color_g'], $cell_ClaseVehiculo_CR['color_b']);
            if (!empty($cell_ClaseVehiculo_CR['posx']) && !empty($cell_ClaseVehiculo_CR['posy']))
            {
                $this->Pdf->SetXY($cell_ClaseVehiculo_CR['posx'], $cell_ClaseVehiculo_CR['posy']);
            }
            elseif (!empty($cell_ClaseVehiculo_CR['posx']))
            {
                $this->Pdf->SetX($cell_ClaseVehiculo_CR['posx']);
            }
            elseif (!empty($cell_ClaseVehiculo_CR['posy']))
            {
                $this->Pdf->SetY($cell_ClaseVehiculo_CR['posy']);
            }
            $this->Pdf->Cell($cell_ClaseVehiculo_CR['width'], 0, $cell_ClaseVehiculo_CR['data'], 0, 0, $cell_ClaseVehiculo_CR['align']);

            $this->Pdf->SetFont($cell_Importe_CR['font_type'], $cell_Importe_CR['font_style'], $cell_Importe_CR['font_size']);
            $this->pdf_text_color($cell_Importe_CR['data'], $cell_Importe_CR['color_r'], $cell_Importe_CR['color_g'], $cell_Importe_CR['color_b']);
            if (!empty($cell_Importe_CR['posx']) && !empty($cell_Importe_CR['posy']))
            {
                $this->Pdf->SetXY($cell_Importe_CR['posx'], $cell_Importe_CR['posy']);
            }
            elseif (!empty($cell_Importe_CR['posx']))
            {
                $this->Pdf->SetX($cell_Importe_CR['posx']);
            }
            elseif (!empty($cell_Importe_CR['posy']))
            {
                $this->Pdf->SetY($cell_Importe_CR['posy']);
            }
            $this->Pdf->Cell($cell_Importe_CR['width'], 0, $cell_Importe_CR['data'], 0, 0, $cell_Importe_CR['align']);

            $this->Pdf->SetFont($cell_CantidadEje_CR['font_type'], $cell_CantidadEje_CR['font_style'], $cell_CantidadEje_CR['font_size']);
            $this->pdf_text_color($cell_CantidadEje_CR['data'], $cell_CantidadEje_CR['color_r'], $cell_CantidadEje_CR['color_g'], $cell_CantidadEje_CR['color_b']);
            if (!empty($cell_CantidadEje_CR['posx']) && !empty($cell_CantidadEje_CR['posy']))
            {
                $this->Pdf->SetXY($cell_CantidadEje_CR['posx'], $cell_CantidadEje_CR['posy']);
            }
            elseif (!empty($cell_CantidadEje_CR['posx']))
            {
                $this->Pdf->SetX($cell_CantidadEje_CR['posx']);
            }
            elseif (!empty($cell_CantidadEje_CR['posy']))
            {
                $this->Pdf->SetY($cell_CantidadEje_CR['posy']);
            }
            $this->Pdf->Cell($cell_CantidadEje_CR['width'], 0, $cell_CantidadEje_CR['data'], 0, 0, $cell_CantidadEje_CR['align']);

            $this->Pdf->SetFont($cell_TarifaEE_CR['font_type'], $cell_TarifaEE_CR['font_style'], $cell_TarifaEE_CR['font_size']);
            $this->pdf_text_color($cell_TarifaEE_CR['data'], $cell_TarifaEE_CR['color_r'], $cell_TarifaEE_CR['color_g'], $cell_TarifaEE_CR['color_b']);
            if (!empty($cell_TarifaEE_CR['posx']) && !empty($cell_TarifaEE_CR['posy']))
            {
                $this->Pdf->SetXY($cell_TarifaEE_CR['posx'], $cell_TarifaEE_CR['posy']);
            }
            elseif (!empty($cell_TarifaEE_CR['posx']))
            {
                $this->Pdf->SetX($cell_TarifaEE_CR['posx']);
            }
            elseif (!empty($cell_TarifaEE_CR['posy']))
            {
                $this->Pdf->SetY($cell_TarifaEE_CR['posy']);
            }
            $this->Pdf->Cell($cell_TarifaEE_CR['width'], 0, $cell_TarifaEE_CR['data'], 0, 0, $cell_TarifaEE_CR['align']);

          $this->Pdf->Ln(4.2333333333333);
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     if (is_array($val)) {
         $val = "";
     }
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
