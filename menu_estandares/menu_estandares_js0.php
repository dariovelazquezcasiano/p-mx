<form name="F2" method=post 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="master_nav" value="off">
<input type="hidden" name="sc_ifr_height" value="">
<input type="hidden" name="nmgp_parms" value=""/>
<input type="hidden" name="nmgp_ordem" value=""/>
<input type="hidden" name="nmgp_clone" value=""/>
<input type="hidden" name="nmgp_arg_dyn_search" value=""/>
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
</form> 
<form name="F4" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_url_saida" value=""/>
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
</form> 
<form name="F5" method="post" 
                  action="./" 
                  target="_self"> 
  <input type="hidden" name="nmgp_opcao" value="<?php if ($this->nm_Start_new) {echo "ini";} else {echo "igual";}?>"/>
  <input type="hidden" name="nmgp_parms" value="<?php if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_estandares']['parms'])) {echo $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['menu_estandares']['parms']);} ?>"/>
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
</form> 
<form name="F6" method="post" 
                  action="./" 
                  target="_self"> 
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
</form> 
<form name="FCAP" action="" method="post" target="_blank"> 
  <input type="hidden" name="SC_lig_apl_orig" value="menu_estandares"/>
  <input type="hidden" name="nmgp_parms" value=""> 
  <input type="hidden" name="nmgp_outra_jan" value="true"> 
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
</form> 
<div id="id_div_process" style="display: none; margin: 10px; whitespace: nowrap" class="scFormProcessFixed"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</span></div>
<div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</span></div>
<div id="id_fatal_error" class="scFormLabelOdd" style="display: none; position: absolute"></div>
<script type="text/javascript"> 
 NM_tp_critica(1);
function nm_gp_submit(apl_lig, apl_saida, parms, opc, target, modal_h, modal_w, apl_name) 
{ 
   if (target == 'modal') 
   {
       par_modal = '?script_case_init=<?php echo $this->form_encode_input($this->Ini->sc_page) ?>&script_case_session=<?php echo $this->form_encode_input(session_id()) ?>&nmgp_outra_jan=true&nmgp_url_saida=modal';
       if (opc != null && opc != '') 
       {
           par_modal += '&nmgp_opcao=grid';
       }
       if (parms != null && parms != '') 
       {
           par_modal += '&nmgp_parms=' + parms;
       }
<?php
  if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_estandares']['where_detal']))
  {
?>  
       parent.tb_show('', apl_lig + par_modal + '&TB_iframe=true&modal=true&height=' + modal_h + '&width=' + modal_w, '');
<?php
  }
  else
  {
?>  
       tb_show('', apl_lig + par_modal + '&TB_iframe=true&modal=true&height=' + modal_h + '&width=' + modal_w, '');
<?php
  }
?>  
       return;
   }
   document.F3.target               = "_self"; 
   document.F3.action               = apl_lig  ;
   document.F3.nmgp_outra_jan.value = "";
   if (opc != null && opc != "") 
   {
       document.F3.nmgp_opcao.value = "grid" ;
   }
   else
   {
       document.F3.nmgp_opcao.value = "" ;
   }
   if (target != null && target == '_blank') 
   {
       document.F3.nmgp_outra_jan.value = "true" ;
       window.open('','jan_sc','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');
       document.F3.target = "jan_sc";
   }
   if (target != null && target == 'new_tab') 
   {
       document.F3.nmgp_outra_jan.value = "true";
       window.open('','jan_sc','');
       document.F3.target = "jan_sc";
   }
   document.F3.nmgp_url_saida.value = apl_saida ;
   document.F3.nmgp_parms.value     = parms ;
   document.F3.submit() ;
} 

function sc_inline_form(seqRow, keyParams, width, height)
{
  var callParams = "", i, listParams = keyParams.split(",");
  for (i = 0; i < listParams.length; i++)
  {
    callParams += listParams[i] + "*scin" + $("#id_sc_field_" + listParams[i] + seqRow).val() + "*scout";
  }
  nm_gp_submit('<?php echo $this->Ini->link_menu_estandares_inline ?>', '<?php echo $this->nm_location ?>', 'NM_btn_insert*scinN*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scoutNMSC_modal*scinok*scoutsc_redir_atualiz*scinok*scoutsc_inline_call*scinY*scoutsc_seq_row*scin' + seqRow + '*scout' + callParams, '', 'modal', height, width);
}

function sc_inline_form_add(width, height)
{
  nm_gp_submit('<?php echo $this->Ini->link_menu_estandares_inline ?>', '<?php echo $this->nm_location ?>', 'NM_btn_insert*scinY*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scoutNMSC_modal*scinok*scoutsc_redir_atualiz*scinok*scoutsc_inline_call*scinY*scoutnmgp_opcao*scinnovo*scout', '', 'modal', height, width);
}

function scInlineFormReceive(oResponse, iLine)
{
  var i;
  oResp = oResponse;
  if (oResp["fldList"])
  {
    for (i = 0; i < oResp["fldList"].length; i++)
    {
      oResp["fldList"][i].fldName += iLine;
    }
  }
  scAjaxSetFields(false);
  scAjaxSetVariables();
  scAjaxRedir();
}


function scInlineFormSend()
{
  return false;
}

function nm_move(x, y, z) 
{ 
    if (x == "modal_igual")
    {
        x = "igual";
    }
    else
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    if (("inicio" == x || "retorna" == x) && "S" != Nav_permite_ret)
    {
        return;
    }
    if (("avanca" == x || "final" == x) && "S" != Nav_permite_ava)
    {
        return;
    }
    document.F2.nmgp_opcao.value = x; 
    document.F2.nmgp_ordem.value = y; 
    document.F2.nmgp_clone.value = "";
    if ("apl_detalhe" == x)
    {
        document.F2.nmgp_opcao.value = 'igual'; 
        document.F2.master_nav.value = 'on'; 
        if (z)
        {
            document.F2.sc_ifr_height.value = z;
        }
        document.F2.submit();
        return;
    }
    if ("clone" == x)
    {
        x = "novo";
        document.F2.nmgp_clone.value = "S";
        document.F2.nmgp_opcao.value = x; 
    }
    if ("novo" == x || "edit_novo" == x || "reload_novo" == x)
    {
<?php
       $NM_parm_ifr = (isset($NM_run_iframe) && $NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
        document.F2.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
        document.F2.submit();
    }
    else
    {
        do_ajax_menu_estandares_navigate_form();
    }
} 
var sc_mupload_ok = true;
var Nm_submit_ok = true; 
function nm_atualiza(x, y) 
{ 
    scForm_submit(x, y);
    return;
<?php 
    if (isset($this->Refresh_aba_menu)) 
    {
?>
        parent.Tab_refresh['<?php echo $this->Refresh_aba_menu ?>'] = "S";
<?php 
    }
?>
    if (!sc_mupload_ok)
    {
        if (!confirm("<?php echo $this->Ini->Nm_lang['lang_errm_muok'] ?>"))
        {
            return;
        }
        sc_mupload_ok = true;
    }
    Nm_submit_ok = true; 
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    if (!scAjaxDetailProc())
    {
        return;
    }
<?php
    $NM_parm_ifr = (isset($NM_run_iframe) && $NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
    document.F1.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
    document.F1.target = "_self";
    if (x == "muda_form") 
    { 
       document.F1.nmgp_num_form.value = y; 
    } 
    document.F1.nmgp_opcao.value = x; 
    document.F1.submit(); 
    if (Nm_submit_ok)
    { 
        Nm_Proc_Atualiz = true;
    } 
} 

<?php
$NM_parm_ifr = (isset($NM_run_iframe) && $NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
function scForm_cancel() {
	return;
}
function scForm_submit(x, y) {
	if (!scForm_initSubmit(x, y)) { return; }
	scForm_checkMultiUpload(function() { scForm_general_prepare(x, y); }, scForm_cancel);
} // scForm_submit

function scForm_general_prepare(x, y) {
	sc_mupload_ok = true;
	if (false === scForm_onSubmit(x)) {
		return;
	}
	scForm_setFormValues(x, y);
	scForm_packMultiSelect_single();
	scForm_packSignature_single();
	scForm_submit_control(x);
} // scForm_general_prepare

function scForm_initSubmit(x, y) {
<?php
if (isset($this->Refresh_aba_menu)) {
?>
	parent.Tab_refresh["<?php echo $this->Refresh_aba_menu ?>"] = "S";
<?php
}
?>

	Nm_submit_ok = true;
	if (Nm_Proc_Atualiz) {
		return false;
	}
	if (!scAjaxDetailProc()) {
		return false;
	}

	return true;
} // scForm_initSubmit


function scForm_checkMultiUpload(callbackOk, callbackCancel) {
	if (!sc_mupload_ok) {
		scJs_confirm("<?php echo $this->Ini->Nm_lang['lang_errm_muok'] ?>", callbackOk, callbackCancel);
	}
	else {
		callbackOk();
	}
} // scForm_checkMultiUpload

function scForm_onSubmit(x) {
	return true;
} // scForm_onSubmit

function scForm_setFormValues(x, y) {
	document.F1.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
	document.F1.target = "_self";
	if (x == "muda_form") {
		document.F1.nmgp_num_form.value = y;
	}
} // scForm_setFormValues

function scForm_packMultiSelect_single() {
} //scForm_packMultiSelect_single

function scForm_packMultiSelect_multi() {
	NM_count_mult = document.F1.sc_contr_vert.value;
} // scForm_packMultiSelect_multi

function scForm_packSignature_single() {
} // scForm_packSignature_single

function scForm_packSignature_multi() {
	NM_count_mult = document.F1.sc_contr_vert.value;
} // scForm_packSignature_multi

function scForm_confirmDelete(callbackOk, callbackCancel) {
	scJs_confirm("<?php echo html_entity_decode($this->Ini->Nm_lang['lang_errm_remv'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>", callbackOk, callbackCancel);
} // scForm_confirmDelete

function scForm_confirmInsert_single(callbackOk, callbackCancel) {
	callbackOk();
} // scForm_confirmInsert_single

function scForm_confirmUpdate_single(callbackOk, callbackCancel) {
	callbackOk();
} // scForm_confirmUpdate_single

function scForm_submit_control(x) {
	document.F1.nmgp_opcao.value = x;
	document.F1.submit();
	if (Nm_submit_ok) {
		Nm_Proc_Atualiz = true;
	}
} // scForm_submit_control

function scForm_submit_single(x) {
	if (x != "excluir")
	{
		document.F1.nmgp_opcao.value = x;
		if ("incluir" == x || "muda_form" == x || "recarga" == x || "recarga_mobile" == x) {
            scAjaxProcOn();
			Nm_Proc_Atualiz = true;
			document.F1.submit();
		}
		else {
			Nm_Proc_Atualiz = true;
			do_ajax_menu_estandares_submit_form();
		}
	}
	if (Nm_submit_ok) {
		Nm_Proc_Atualiz = true;
	}
} // scForm_submit_single

function nm_saida_glo()
{
  document.F4.target = "_self";
  document.F4.action = "menu_estandares_fim.php";
  document.F4.submit();
}
function nm_mostra_img(imagem, altura, largura)
{
    tb_show('', imagem, '');
}
function nm_recarga_form(nm_ult_ancora, nm_ult_page) 
{ 
    document.F1.target = "_self";
    document.F1.nmgp_parms.value = "";
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_opcao.value= "recarga"; 
    document.F1.action += "#" +  nm_ult_ancora;
    document.F1.submit(); 
} 
function nm_link_url(Sc_url)
{
    if (Sc_url.substr(0, 7) != 'http://' && Sc_url.substr(0, 8) != 'https://')
    {
        Sc_url = 'http://' + Sc_url;
    }
    return Sc_url;
}
function sc_trim(str, chars) {
        return sc_ltrim(sc_rtrim(str, chars), chars);
}
function sc_ltrim(str, chars) {
        chars = chars || "\\s";
        return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}
function sc_rtrim(str, chars) {
        chars = chars || "\\s";
        return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}
function sc_formato_onchange()
{
   //------------------------------o-gp
//html de campos opcionales
var codigosHtml = Array("<td class='scFormLabelOdd scUiLabelWidthFix css_sentido_label' id='hidden_field_label_sentido' style='width: 230px;'><span id='id_label_sentido'>SENTIDO</span></td><td class='scFormDataOdd css_sentido_line' id='hidden_field_data_sentido' style=''><span id='id_read_on_sentido class='css_sentido_line' style='display: none;'></span><span id='id_read_off_sentido' class='css_read_off_sentido' style='white-space: nowrap; '><span id='idAjaxSelect_sentido'><select class='sc-js-input scFormObjectOdd css_sentido_obj' style='' id='id_sc_field_sentido' name='sentido' size='1' alt='{type: \'select\', enterTab: false}' maxlength='1'><option value='1'>A</option><option value='2'>B</option><option value='3'>AMBOS</option></select></span></span></td>", "<td class='scFormLabelOdd scUiLabelWidthFix css_opcion_label' id='hidden_field_label_opcion' style='width: 246px;'><span id='id_label_opcion'>OPCION</span></td><td class='scFormDataOdd css_opcion_line' id='hidden_field_data_opcion' style=''> <span id='id_read_on_opcion' class='css_opcion_line' style='display: none;'></span><span id='id_read_off_opcion' class='css_read_off_opcion' style='white-space: nowrap; '>  <span id='idAjaxSelect_opcion'>    <select class='sc-js-input scFormObjectOdd css_opcion_obj' style='' id='id_sc_field_opcion' name='opcion' size='1' alt='{type: \'select\', enterTab: false}' maxlength='1'><option value='1'>AFORO</option><option value='2'>IMPORTE</option></select></span></span></td>");

//optenemos el valor del campo formato para saber cual fue seleccionado
var formato = parseInt(document.getElementsByName('formato')[0].value);

//cambiamos el nombre del formato
var titulo = document.getElementsByClassName('scFormHeader')[0].firstElementChild;
switch(formato) {
  case 1:
   titulo.textContent = 'REPORTE DE INGRESOS POR CUOTAS DE PEAJES.';
    break;
  case 2:
    titulo.textContent = 'REPORTE DE INGRESOS POR CUAOTAS DE TELEPEAJE.';
    break;
  case 3:
    titulo.textContent = 'REPORTE DE CONTROL VEHICULAR.';
    break;
  case 4:
    titulo.textContent = 'REPORTE DE FALTANTES Y SOBRANTES DE LAS CUAOTAS COBRADAS.';
    break;
  case 5:
    titulo.textContent = 'REPORTE DE DEPOSITO DE INGRESOS POR CUOTAS DE PEAJE (EFECTIVO Y TELEPEAJE).';
    break;
  case 6:
    titulo.textContent = 'REPORTE DE NIVEL DE SERVICIO DE LA PLAZA DE COBRO.';
    break;
  case 7:
    titulo.textContent = 'REPORTE DE  PRECISIÓN DEL SISTEMA AUTOMATICO DE CLASIFICACION.';
    break;	
  case 8:
    titulo.textContent = 'REPORTE DE DISPONIBILIDAD DE CARRILES.';
	//alert('FORMATO: O-GP-5-R1\n NO DISPONIBLE');
    break;		
  case 9:
    titulo.textContent = 'REPORTE DE FALLA DE SERVIDORES DE PLAZAS DE COBRO, CENTRO DE GESTION Y SISTEMA DE COMUNICACIONES.';
	//alert('FORMATO: O-GP-6-R1\n NO DISPONIBLE');
    break;		
  case 10:
    titulo.textContent = 'REPORTE DE TRANSACCIONES DE TELEPEAJE.';
    break;
  case 11:
    titulo.textContent = 'REPORTE DE CONCILIACION DE TELEPEAJE.';
    break;
  case 12:
    titulo.textContent = 'REPORTE DE CUENTAS POR COBRAR Y EJECUCIÓN DE GARANTIAS.';
    break;	
  case 13:
    titulo.textContent = 'INTEROPERABILIDAD DE TELEPEAJE E INTERCAMBIO DE INFORMACION.';
    break;		
  case 14:
    titulo.textContent = 'REPORTE DE TRANSACCIONES DE MEDIOS ELECTRONICOS DE PAGO.';
    break;		
  case 15:
    titulo.textContent = 'REPORTE DE CONCILIACION DE MEDIO ELECTRONICOS DE PAGO.';
    break;
  case 16:
    titulo.textContent = 'REPORTE SOBRE EL PROMEDIO DIARIO DE LAS 10 MEJORES VELOCIDADES DE CRUCE EN CARRILES EXCLUSIVOS DE TELEPEAJE';
    break;
  case 17:
    titulo.textContent = 'REPORTE GENERAL SOBRE VELOCIDADES DE CRUCE EN CARRILES EXCLUSIVOS DE TELEPEAJE';
    break;		
  default:
    titulo.textContent = 'FORMATOS';
}

//seleccionamos el cuarpo de la tabla
var filas = document.querySelectorAll('#hidden_bloco_0 tbody')[0];
var numFilas = filas.childElementCount;

//---------------------------------------------- opcion 1 (posible crear 1 eliminar 1)
if ((formato < 4 || formato == 5 || formato == 7) && numFilas != 5) {
    if (numFilas == 4) {//crear 1
      var fila2 = document.createElement("TR");
      fila2.innerHTML = codigosHtml[0];
      filas.appendChild(fila2);
    }
	if(numFilas == 6){//eliminar 1
    filas.removeChild(filas.lastChild);
	}
	/*else {//crear 2
     var fila1 = document.createElement("TR");
      var fila2 = document.createElement("TR");
      filas.appendChild(fila1);
      filas.appendChild(fila2);
      fila1.innerHTML = codigosHtml[0];
      fila2.innerHTML = codigosHtml[1];
    }*/
	}
//---------------------------------------------- opcion 2 (eliminar 1 o 2)
if ((formato == 4 || formato == 6 || formato > 9) && numFilas != 4) {
	if (numFilas == 6) {//eliminar dos
		filas.removeChild(filas.lastChild);
		filas.removeChild(filas.lastChild);
	}
	if (numFilas == 5) {//eliminar 1
	filas.removeChild(filas.lastChild);
	}
	}
//---------------------------------------------- opcion 3 ( crear 1 o 2)
if ((formato == 8 || formato == 9) && numFilas != 6) {
	if (numFilas == 5) {//crear 1
		var fila2 = document.createElement("TR");
		fila2.innerHTML = codigosHtml[1];
		filas.appendChild(fila2);
	}
	if (numFilas == 4) {//crear 2
		var fila1 = document.createElement("TR");
    	var fila2 = document.createElement("TR");
    	filas.appendChild(fila1);
    	filas.appendChild(fila2);
    	fila1.innerHTML = codigosHtml[0];
    	fila2.innerHTML = codigosHtml[1];
  }
  
}
}
var hasJsFormOnload = true;
function sc_form_onload()
{
   //optenemos el valor del campo formato para saber cual fue seleccionado
var formato = parseInt(document.getElementsByName('formato')[0].value);

//cambiamos el nombre del formato
var titulo = document.getElementsByClassName('scFormHeader')[0].firstElementChild;
switch(formato) {
  case 1:
   titulo.textContent = 'REPORTE DE INGRESOS POR CUOTAS DE PEAJES.';
    break;
  case 2:
    titulo.textContent = 'REPORTE DE INGRESOS POR CUAOTAS DE TELEPEAJE.';
    break;
  case 3:
    titulo.textContent = 'REPORTE DE CONTROL VEHICULAR.';
    break;
  case 4:
    titulo.textContent = 'REPORTE DE FALTANTES Y SOBRANTES DE LAS CUAOTAS COBRADAS.';
    break;
  case 5:
    titulo.textContent = 'REPORTE DE DEPOSITO DE INGRESOS POR CUOTAS DE PEAJE (EFECTIVO Y TELEPEAJE).';
    break;
  case 6:
    titulo.textContent = 'REPORTE DE NIVEL DE SERVICIO DE LA PLAZA DE COBRO.';
    break;
  case 7:
    titulo.textContent = 'REPORTE DE  PRECISIÓN DEL SISTEMA AUTOMATICO DE CLASIFICACION.';
    break;	
  case 8:
    titulo.textContent = 'REPORTE DE DISPONIBILIDAD DE CARRILES.';
    break;		
  case 9:
    titulo.textContent = 'REPORTE DE FALLA DE SERVIDORES DE PLAZAS DE COBRO, CENTRO DE GESTION Y SISTEMA DE COMUNICACIONES.';
    break;		
  case 10:
    titulo.textContent = 'REPORTE DE TRANSACCIONES DE TELEPEAJE.';
    break;
  case 11:
    titulo.textContent = 'REPORTE DE CONCILIACION DE TELEPEAJE.';
    break;
  case 12:
    titulo.textContent = 'REPORTE DE CUENTAS POR COBRAR Y EJECUCIÓN DE GARANTIAS.';
    break;	
  case 13:
    titulo.textContent = 'INTEROPERABILIDAD DE TELEPEAJE E INTERCAMBIO DE INFORMACION.';
    break;		
  case 14:
    titulo.textContent = 'REPORTE DE TRANSACCIONES DE MEDIOS ELECTRONICOS DE PAGO.';
    break;		
  case 15:
    titulo.textContent = 'REPORTE DE CONCILIACION DE MEDIO ELECTRONICOS DE PAGO.';
    break;
  case 16:
    titulo.textContent = 'REPORTE SOBRE EL PROMEDIO DIARIO DE LAS 10 MEJORES VELOCIDADES DE CRUCE EN CARRILES EXCLUSIVOS DE TELEPEAJE';
    break;
  case 17:
    titulo.textContent = 'REPORTE GENERAL SOBRE VELOCIDADES DE CRUCE EN CARRILES EXCLUSIVOS DE TELEPEAJE';
    break;		
  default:
    titulo.textContent = 'FORMATOS';
}

//seleccionamos el cuarpo de la tabla
var filas = document.querySelectorAll('#hidden_bloco_0 tbody')[0];
var numFilas = filas.childElementCount;

//---------------------------------------------- opcion 1 (posible crear 1 eliminar 1)
if ((formato < 4 || formato == 5 || formato == 7) && numFilas != 5) {
   
	if(numFilas == 6){//eliminar 1
    filas.removeChild(filas.lastChild);
	}
	}
//---------------------------------------------- opcion 2 (eliminar 1 o 2)
if ((formato == 4 || formato == 6 || formato > 9) && numFilas != 4) {
	if (numFilas == 6) {//eliminar dos
		filas.removeChild(filas.lastChild);
		filas.removeChild(filas.lastChild);
	}
	if (numFilas == 5) {//eliminar 1
		filas.removeChild(filas.lastChild);
	}
}

}

function scCssFocus(oHtmlObj)
{
  if (navigator.userAgent && 0 < navigator.userAgent.indexOf("MSIE") && "select" == oHtmlObj.type.substr(0, 6))
    return;
  if ($(oHtmlObj).hasClass('sc-ui-pwd-toggle')) {
    $(oHtmlObj).addClass('scFormObjectFocusOddPwdInput')
               .addClass('scFormObjectFocusOddPwdText')
               .removeClass('scFormObjectOddPwdInput')
               .removeClass('scFormObjectOddPwdText');
    $(oHtmlObj).parent().addClass('scFormObjectFocusOddPwdBox')
                        .removeClass('scFormObjectOddPwdBox');
  } else {
    $(oHtmlObj).addClass('scFormObjectFocusOdd')
               .removeClass('scFormObjectOdd');
  }
}

function scCssBlur(oHtmlObj)
{
  if (navigator.userAgent && 0 < navigator.userAgent.indexOf("MSIE") && "select" == oHtmlObj.type.substr(0, 6))
    return;
  if ($(oHtmlObj).hasClass('sc-ui-pwd-toggle')) {
    $(oHtmlObj).addClass('scFormObjectOddPwdInput')
               .addClass('scFormObjectOddPwdText')
               .removeClass('scFormObjectFocusOddPwdInput')
               .removeClass('scFormObjectFocusOddPwdText');
    $(oHtmlObj).parent().addClass('scFormObjectOddPwdBox')
                        .removeClass('scFormObjectFocusOddPwdBox');
  } else {
    $(oHtmlObj).addClass('scFormObjectOdd')
               .removeClass('scFormObjectFocusOdd');
  }
}

 function nm_submit_cap(apl_dest, parms)
 {
    document.FCAP.action = apl_dest;
    document.FCAP.nmgp_parms.value = parms;
    window.open('','jan_cap','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');
    document.FCAP.target = "jan_cap"; 
    document.FCAP.submit();
 }
</script> 
