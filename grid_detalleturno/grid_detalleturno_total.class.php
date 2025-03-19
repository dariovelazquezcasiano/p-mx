<?php

class grid_detalleturno_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_detalleturno']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_detalleturno']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['campos_busca'];
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
          $this->turnoid = (isset($Busca_temp['turnoid'])) ? $Busca_temp['turnoid'] : ""; 
          $tmp_pos = (is_string($this->turnoid)) ? strpos($this->turnoid, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->turnoid))
          {
              $this->turnoid = substr($this->turnoid, 0, $tmp_pos);
          }
          $this->admonbusqueda = (isset($Busca_temp['admonbusqueda'])) ? $Busca_temp['admonbusqueda'] : ""; 
          $tmp_pos = (is_string($this->admonbusqueda)) ? strpos($this->admonbusqueda, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->admonbusqueda))
          {
              $this->admonbusqueda = substr($this->admonbusqueda, 0, $tmp_pos);
          }
          $this->encargadopreliquida = (isset($Busca_temp['encargadopreliquida'])) ? $Busca_temp['encargadopreliquida'] : ""; 
          $tmp_pos = (is_string($this->encargadopreliquida)) ? strpos($this->encargadopreliquida, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->encargadopreliquida))
          {
              $this->encargadopreliquida = substr($this->encargadopreliquida, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang , $usuarioid, $administradorid, $encargadoturnoid_pre, $encargadoturnoid;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalleturno']['contr_total_geral'] = "OK";
   } 

   function Ajust_statistic($comando)
   {
      if ((isset($this->Ini->nm_bases_vfp) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_vfp)) || (isset($this->Ini->nm_bases_odbc) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_odbc)))
      {
          $comando = str_replace(array('count(distinct ','varp(','stdevp(','variance(','stddev('), array('sum(','sum(','sum(','sum(','sum('), $comando);
      }
      if ($this->Ini->nm_tp_variance == "P")
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $comando = str_replace(array('count(distinct ','varp(','stdevp('), array('count(','var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite) && $this->Ini->sqlite_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $this->Ini->Ibase_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
                  $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
      }
      if ($this->Ini->nm_tp_variance == "A")
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $comando = str_replace(array('count(distinct ','varp(','stdevp('), array('count(','var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite) && $this->Ini->sqlite_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $this->Ini->Ibase_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
                  $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $comando = str_replace(array('varp(','stdevp('), array('var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $comando = str_replace('stddev(', 'stdev(', $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $comando = str_replace(array('variance(','stddev('), array('variance_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
      }
      return $comando;
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
function forma_pre($identificador, $FechaOperacion){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
	$montoTAG = 0;
	$montoCRE = 0;
	
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
	$this->cuerpo =$this->rs[0][3];
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
$leyenda = "";
 
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

if (false == $this->rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
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

if (false == $this->rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
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

if (false == $this->rs ) {     
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= '¡Error al acceder a la base de datos!.';
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
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function ArmaCondicion(){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
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

if (false == $this->rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
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
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function Comparativo($identificador, $FechaOperacion){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
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
	$caseta = $this->casetaid = $this->rs[0][1];
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

if (false == $this->rs ){
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
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
$fila_aECT = $this->aforoECT("","",$where_folio, $this->casetaid);
$codigo_html .=  $fila_aECT[0];
$codigo_html .=  $fila_aECT[1];

$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" >Diferencia entre el Total Marcado por el C-R y el '.$modooperacion.' </th></tr>';
 $fila_a = $this->DiferenciaTotales($sql_where,$where_folio,$this->casetaid);
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

if (false == $this->rs ){
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
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
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function DiferenciaTotales($sql_where,$where_folio,$casetaid){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
	$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;
 
      $nm_select = "SELECT ModoOperacion FROM casetas WHERE CasetaID = '$this->casetaid'"; 
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

if (false == $this->rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
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

if (false == $this->rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
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
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function aforoECT($pago, $titulo, $sql_where, $casetaid){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
	$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;
 
      $nm_select = "SELECT ModoOperacion FROM casetas WHERE CasetaID = '$this->casetaid'"; 
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

if (false == $this->rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
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
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function crea_tr($array_fuente, $titulo){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
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
	
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function diferencia($fin, $ini){
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
	if($fin == 0 && $ini ==0){
	$diferencia = 0;
	}else{
	$diferencia = $fin - $ini + 1;
}
return $diferencia;

$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
function saca_aforo($pago, $titulo, $sql_where)	{
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'on';
  
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

if (false == $this->rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
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
$_SESSION['scriptcase']['grid_detalleturno']['contr_erro'] = 'off';
}
}

?>
