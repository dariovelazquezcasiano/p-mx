<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " detalleturno"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " detalleturno"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
<style type="text/css">
.ui-datepicker { z-index: 6 !important }
</style>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_fechaoperacion button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechaturno button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechafin button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechacierre button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechapreliq button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechaliq button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechainiciodictamen button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechafindictamen button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_muestra_ingresoEluPre/form_muestra_ingresoEluPre_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("form_muestra_ingresoEluPre_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['last'] : 'off'); ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if (isset($this->nmgp_botoes['first']) && $this->nmgp_botoes['first'] == "on")
    {
?>
       if ("off" == Nav_binicio_macro_disabled) { $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if (isset($this->nmgp_botoes['back']) && $this->nmgp_botoes['back'] == "on")
    {
?>
       if ("off" == Nav_bretorna_macro_disabled) { $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if (isset($this->nmgp_botoes['first']) && $this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if (isset($this->nmgp_botoes['back']) && $this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if (isset($this->nmgp_botoes['last']) && $this->nmgp_botoes['last'] == "on")
    {
?>
       if ("off" == Nav_bfinal_macro_disabled) { $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if (isset($this->nmgp_botoes['forward']) && $this->nmgp_botoes['forward'] == "on")
    {
?>
       if ("off" == Nav_bavanca_macro_disabled) { $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if (isset($this->nmgp_botoes['last']) && $this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if (isset($this->nmgp_botoes['forward']) && $this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_muestra_ingresoEluPre_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>

<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys.inc.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys_setup.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<script type="text/javascript">

function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
     $("#fast_search_f0_t").select2({
        containerCssClass: 'scGridQuickSearchDivResult',
        dropdownCssClass: 'scGridQuickSearchDivDropdown',
        placeholder: '<?php echo $this->Ini->Nm_lang['lang_srch_all_fields'] ?>',
    });
     $("#cond_fast_search_f0_t").select2({
        containerCssClass: 'scGridQuickSearchDivResult',
        dropdownCssClass: 'scGridQuickSearchDivDropdown',
        minimumResultsForSearch: -1
    });
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchKeyUp(sPos, e) {
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
       else
       {
           $('#SC_fast_search_submit_'+sPos).show();
       }
     }
   }
   function nm_gp_submit_qsearch(pos)
   {
        nm_move('fast_search', pos);
   }
   function nm_gp_open_qsearch_div(pos)
   {
        if (typeof nm_gp_open_qsearch_div_mobile == 'function') {
            return nm_gp_open_qsearch_div_mobile(pos);
        }
        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))
        {
            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())
            {
                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});
            }

            nm_gp_open_qsearch_div_store_temp(pos);
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');
        }
        else
        {
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
        $('#id_qs_div_' + pos).toggle();
   }

   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = "";
   function nm_gp_open_qsearch_div_store_temp(pos)
   {
        tmp_qs_arr_fields = [], tmp_qs_str_cond = "";

        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')
        {
            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();
        }
        else
        {
            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());
        }

        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();
   }

   function nm_gp_cancel_qsearch_div_store_temp(pos)
   {
        $('#fast_search_f0_' + pos).val('');
        $("#fast_search_f0_" + pos + " option").prop('selected', false);
        for(it=0; it<tmp_qs_arr_fields.length; it++)
        {
            $("#fast_search_f0_" + pos + " option[value='"+ tmp_qs_arr_fields[it] +"']").prop('selected', true);
        }
        $("#fast_search_f0_" + pos).change();
        tmp_qs_arr_fields = [];

        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);
        $('#cond_fast_search_f0_' + pos).change();
        tmp_qs_str_cond = "";

        nm_gp_open_qsearch_div(pos);
   } if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_muestra_ingresoEluPre_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_muestra_ingresoEluPre'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_muestra_ingresoEluPre'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->sc_page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="60%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
$this->displayAppHeader();
?>
<tr><td>
<?php
$this->displayTopToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R")
{
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <span id="quicksearchph_t" class="scFormToolbarInput" style='display: inline-block; vertical-align: inherit'>
              <span>
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <i id='SC_fast_search_dropdown_t' style='cursor: pointer;' class='fas fa-caret-down' onclick="nm_gp_open_qsearch_div('t');"></i>
                  <img id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search ?>" onclick="nm_gp_submit_qsearch('t');">
                  <img style="display: <?php echo $stateSearchIconClose ?>" class='css_toolbar_obj_qs_search_img' id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
                  <div id='id_qs_div_t' class='scGridQuickSearchDivMoldura' style='display:none; position:absolute;'>
                                  <div>
                                      <span >
                                        <p class='scGridQuickSearchDivLabel'><?php echo $this->Ini->Nm_lang['lang_btns_clmn'] ?></span></p>
          <select id='fast_search_f0_t' multiple=multiple  class="scFormToolbarInput" style="vertical-align: middle;" name="nmgp_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $SC_Label_atu['SC_all_Cmp'] = $this->Ini->Nm_lang['lang_srch_all_fields']; 
          $SC_Label_atu['consecutivo'] = (isset($this->nm_new_label['consecutivo'])) ? $this->nm_new_label['consecutivo'] : 'Consecutivo'; 
          $SC_Label_atu['turnoid'] = (isset($this->nm_new_label['turnoid'])) ? $this->nm_new_label['turnoid'] : 'Turno ID'; 
          $SC_Label_atu['casetaid'] = (isset($this->nm_new_label['casetaid'])) ? $this->nm_new_label['casetaid'] : 'Caseta ID'; 
          $SC_Label_atu['tramoid'] = (isset($this->nm_new_label['tramoid'])) ? $this->nm_new_label['tramoid'] : 'Tramo ID'; 
          $SC_Label_atu['cuerpo'] = (isset($this->nm_new_label['cuerpo'])) ? $this->nm_new_label['cuerpo'] : 'Cuerpo'; 
          $SC_Label_atu['usuarioid'] = (isset($this->nm_new_label['usuarioid'])) ? $this->nm_new_label['usuarioid'] : 'Usuario ID'; 
          $SC_Label_atu['carrilid'] = (isset($this->nm_new_label['carrilid'])) ? $this->nm_new_label['carrilid'] : 'Carril ID'; 
          $SC_Label_atu['fechaoperacion'] = (isset($this->nm_new_label['fechaoperacion'])) ? $this->nm_new_label['fechaoperacion'] : 'Fecha Operacion'; 
          $SC_Label_atu['fechaturno'] = (isset($this->nm_new_label['fechaturno'])) ? $this->nm_new_label['fechaturno'] : 'Fecha Turno'; 
          $SC_Label_atu['horainicio'] = (isset($this->nm_new_label['horainicio'])) ? $this->nm_new_label['horainicio'] : 'Hora Inicio'; 
          $SC_Label_atu['fechafin'] = (isset($this->nm_new_label['fechafin'])) ? $this->nm_new_label['fechafin'] : 'Fecha Fin'; 
          $SC_Label_atu['horafin'] = (isset($this->nm_new_label['horafin'])) ? $this->nm_new_label['horafin'] : 'Hora Fin'; 
          $SC_Label_atu['operacionid'] = (isset($this->nm_new_label['operacionid'])) ? $this->nm_new_label['operacionid'] : 'Operacion ID'; 
          $SC_Label_atu['foliocierre'] = (isset($this->nm_new_label['foliocierre'])) ? $this->nm_new_label['foliocierre'] : 'Folio Cierre'; 
          $SC_Label_atu['estatuscarril'] = (isset($this->nm_new_label['estatuscarril'])) ? $this->nm_new_label['estatuscarril'] : 'Estatus Carril'; 
          $SC_Label_atu['observacion'] = (isset($this->nm_new_label['observacion'])) ? $this->nm_new_label['observacion'] : 'Observacion'; 
          $SC_Label_atu['preliquidado'] = (isset($this->nm_new_label['preliquidado'])) ? $this->nm_new_label['preliquidado'] : 'Pre Liquidado'; 
          $SC_Label_atu['montocr'] = (isset($this->nm_new_label['montocr'])) ? $this->nm_new_label['montocr'] : 'Monto CR'; 
          $SC_Label_atu['montoana'] = (isset($this->nm_new_label['montoana'])) ? $this->nm_new_label['montoana'] : 'Monto ANA'; 
          $SC_Label_atu['cantidadmxn'] = (isset($this->nm_new_label['cantidadmxn'])) ? $this->nm_new_label['cantidadmxn'] : 'Cantidad MXN'; 
          $SC_Label_atu['cantidadusd'] = (isset($this->nm_new_label['cantidadusd'])) ? $this->nm_new_label['cantidadusd'] : 'Cantidad USD'; 
          $SC_Label_atu['importemxn'] = (isset($this->nm_new_label['importemxn'])) ? $this->nm_new_label['importemxn'] : 'Importe MXN'; 
          $SC_Label_atu['importeusd'] = (isset($this->nm_new_label['importeusd'])) ? $this->nm_new_label['importeusd'] : 'Importe USD'; 
          $SC_Label_atu['folioinicialcr'] = (isset($this->nm_new_label['folioinicialcr'])) ? $this->nm_new_label['folioinicialcr'] : 'Folio Inicial CR'; 
          $SC_Label_atu['foliofinalcr'] = (isset($this->nm_new_label['foliofinalcr'])) ? $this->nm_new_label['foliofinalcr'] : 'Folio Final CR'; 
          $SC_Label_atu['folioinicialeap'] = (isset($this->nm_new_label['folioinicialeap'])) ? $this->nm_new_label['folioinicialeap'] : 'Folio Inicial EAP'; 
          $SC_Label_atu['foliofinaleap'] = (isset($this->nm_new_label['foliofinaleap'])) ? $this->nm_new_label['foliofinaleap'] : 'Folio Final EAP'; 
          $SC_Label_atu['faltante'] = (isset($this->nm_new_label['faltante'])) ? $this->nm_new_label['faltante'] : 'Faltante'; 
          $SC_Label_atu['ingresoelu_pre'] = (isset($this->nm_new_label['ingresoelu_pre'])) ? $this->nm_new_label['ingresoelu_pre'] : 'Ingreso ELU PRE'; 
          $SC_Label_atu['entregado'] = (isset($this->nm_new_label['entregado'])) ? $this->nm_new_label['entregado'] : 'Entregado'; 
          $SC_Label_atu['administradorid'] = (isset($this->nm_new_label['administradorid'])) ? $this->nm_new_label['administradorid'] : 'Administrador ID'; 
          $SC_Label_atu['encargadoturnoid'] = (isset($this->nm_new_label['encargadoturnoid'])) ? $this->nm_new_label['encargadoturnoid'] : 'Encargado Turno ID'; 
          $SC_Label_atu['encargadoturnoid_pre'] = (isset($this->nm_new_label['encargadoturnoid_pre'])) ? $this->nm_new_label['encargadoturnoid_pre'] : 'Encargado Turno ID Pre'; 
          $SC_Label_atu['fechacierre'] = (isset($this->nm_new_label['fechacierre'])) ? $this->nm_new_label['fechacierre'] : 'Fecha Cierre'; 
          $SC_Label_atu['fechapreliq'] = (isset($this->nm_new_label['fechapreliq'])) ? $this->nm_new_label['fechapreliq'] : 'Fecha Pre Liq'; 
          $SC_Label_atu['fechaliq'] = (isset($this->nm_new_label['fechaliq'])) ? $this->nm_new_label['fechaliq'] : 'Fecha Liq'; 
          $SC_Label_atu['operacion'] = (isset($this->nm_new_label['operacion'])) ? $this->nm_new_label['operacion'] : 'Operacion'; 
          $SC_Label_atu['liquidadorid'] = (isset($this->nm_new_label['liquidadorid'])) ? $this->nm_new_label['liquidadorid'] : 'Liquidador ID'; 
          $SC_Label_atu['faltanteana'] = (isset($this->nm_new_label['faltanteana'])) ? $this->nm_new_label['faltanteana'] : 'Faltante ANA'; 
          $SC_Label_atu['ingresoelu_ana'] = (isset($this->nm_new_label['ingresoelu_ana'])) ? $this->nm_new_label['ingresoelu_ana'] : 'Ingreso ELU ANA'; 
          $SC_Label_atu['conteo'] = (isset($this->nm_new_label['conteo'])) ? $this->nm_new_label['conteo'] : 'Conteo'; 
          $SC_Label_atu['fechainiciodictamen'] = (isset($this->nm_new_label['fechainiciodictamen'])) ? $this->nm_new_label['fechainiciodictamen'] : 'Fecha Inicio Dictamen'; 
          $SC_Label_atu['fechafindictamen'] = (isset($this->nm_new_label['fechafindictamen'])) ? $this->nm_new_label['fechafindictamen'] : 'Fecha Fin Dictamen'; 
          foreach ($SC_Label_atu as $CMP => $LABEL)
          {
              if($CMP == 'SC_all_Cmp')
                  continue;
              $OPC_sel = ($CMP == $OPC_cmp) ? " selected" : "";
              echo "           <option value='" . $CMP . "'" . $OPC_sel . ">" . $LABEL . "</option>";
          }
?> 
          </select>
                                      </span>
                                      <span >
                                        <p class='scGridQuickSearchDivLabel'><?php echo $this->Ini->Nm_lang['lang_quck_srchcond'] ?></span></p>
          <select id='cond_fast_search_f0_t' class="scFormToolbarInput" style="vertical-align: middle;display:;" name="nmgp_cond_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $OPC_sel = ("qp" == $OPC_arg) ? " selected" : "";
           echo "           <option value='qp'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>";
          $OPC_sel = ("ii" == $OPC_arg) ? " selected" : "";
           echo "           <option value='ii'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_stts_with'] . "</option>";
          $OPC_sel = ("eq" == $OPC_arg) ? " selected" : "";
           echo "           <option value='eq'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_exac'] . "</option>";
          $OPC_sel = ("np" == $OPC_arg) ? " selected" : "";
           echo "           <option value='np'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_not_like'] . "</option>";
?> 
          </select>
                                      </span>
                                  </div>
                                  <div class='scGridQuickSearchDivToolbar'>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "nm_gp_cancel_qsearch_div_store_temp('t')", "nm_gp_cancel_qsearch_div_store_temp('t')", "qs_cancel", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>
       <?php echo nmButtonOutput($this->arr_buttons, "bapply_appdiv", "nm_gp_submit_qsearch('t');", "nm_gp_submit_qsearch('t');", "qs_search", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>
                                  </div>
                               </div>          </span>  </div>
  <?php
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = ($this->nmgp_botoes['reload'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['breload']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['breload']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['breload']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['breload']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['breload'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "breload", "scBtnFn_sys_format_reload()", "scBtnFn_sys_format_reload()", "sc_b_reload_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call || $this->form_3versions_single) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['consecutivo']))
           {
               $this->nmgp_cmp_readonly['consecutivo'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['consecutivo']))
    {
        $this->nm_new_label['consecutivo'] = "Consecutivo";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $consecutivo = $this->consecutivo;
   $sStyleHidden_consecutivo = '';
   if (isset($this->nmgp_cmp_hidden['consecutivo']) && $this->nmgp_cmp_hidden['consecutivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['consecutivo']);
       $sStyleHidden_consecutivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_consecutivo = 'display: none;';
   $sStyleReadInp_consecutivo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["consecutivo"]) &&  $this->nmgp_cmp_readonly["consecutivo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['consecutivo']);
       $sStyleReadLab_consecutivo = '';
       $sStyleReadInp_consecutivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['consecutivo']) && $this->nmgp_cmp_hidden['consecutivo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consecutivo" value="<?php echo $this->form_encode_input($consecutivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_consecutivo_label" id="hidden_field_label_consecutivo" style="<?php echo $sStyleHidden_consecutivo; ?>"><span id="id_label_consecutivo"><?php echo $this->nm_new_label['consecutivo']; ?></span></TD>
    <TD class="scFormDataOdd css_consecutivo_line" id="hidden_field_data_consecutivo" style="<?php echo $sStyleHidden_consecutivo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_consecutivo_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_consecutivo" class="css_consecutivo_line" style="<?php echo $sStyleReadLab_consecutivo; ?>"><?php echo $this->form_format_readonly("consecutivo", $this->form_encode_input($this->consecutivo)); ?></span><span id="id_read_off_consecutivo" class="css_read_off_consecutivo" style="<?php echo $sStyleReadInp_consecutivo; ?>"><input type="hidden" name="consecutivo" value="<?php echo $this->form_encode_input($consecutivo) . "\">"?><span id="id_ajax_label_consecutivo"><?php echo nl2br($consecutivo); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_consecutivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_consecutivo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['turnoid']))
    {
        $this->nm_new_label['turnoid'] = "Turno ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $turnoid = $this->turnoid;
   $sStyleHidden_turnoid = '';
   if (isset($this->nmgp_cmp_hidden['turnoid']) && $this->nmgp_cmp_hidden['turnoid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['turnoid']);
       $sStyleHidden_turnoid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_turnoid = 'display: none;';
   $sStyleReadInp_turnoid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['turnoid']) && $this->nmgp_cmp_readonly['turnoid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['turnoid']);
       $sStyleReadLab_turnoid = '';
       $sStyleReadInp_turnoid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['turnoid']) && $this->nmgp_cmp_hidden['turnoid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="turnoid" value="<?php echo $this->form_encode_input($turnoid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_turnoid_label" id="hidden_field_label_turnoid" style="<?php echo $sStyleHidden_turnoid; ?>"><span id="id_label_turnoid"><?php echo $this->nm_new_label['turnoid']; ?></span></TD>
    <TD class="scFormDataOdd css_turnoid_line" id="hidden_field_data_turnoid" style="<?php echo $sStyleHidden_turnoid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_turnoid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["turnoid"]) &&  $this->nmgp_cmp_readonly["turnoid"] == "on") { 

 ?>
<input type="hidden" name="turnoid" value="<?php echo $this->form_encode_input($turnoid) . "\">" . $turnoid . ""; ?>
<?php } else { ?>
<span id="id_read_on_turnoid" class="sc-ui-readonly-turnoid css_turnoid_line" style="<?php echo $sStyleReadLab_turnoid; ?>"><?php echo $this->form_format_readonly("turnoid", $this->form_encode_input($this->turnoid)); ?></span><span id="id_read_off_turnoid" class="css_read_off_turnoid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_turnoid; ?>">
 <input class="sc-js-input scFormObjectOdd css_turnoid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_turnoid" type=text name="turnoid" value="<?php echo $this->form_encode_input($turnoid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['turnoid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['turnoid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['turnoid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_turnoid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_turnoid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['casetaid']))
    {
        $this->nm_new_label['casetaid'] = "Caseta ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $casetaid = $this->casetaid;
   $sStyleHidden_casetaid = '';
   if (isset($this->nmgp_cmp_hidden['casetaid']) && $this->nmgp_cmp_hidden['casetaid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['casetaid']);
       $sStyleHidden_casetaid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_casetaid = 'display: none;';
   $sStyleReadInp_casetaid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['casetaid']) && $this->nmgp_cmp_readonly['casetaid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['casetaid']);
       $sStyleReadLab_casetaid = '';
       $sStyleReadInp_casetaid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['casetaid']) && $this->nmgp_cmp_hidden['casetaid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="casetaid" value="<?php echo $this->form_encode_input($casetaid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_casetaid_label" id="hidden_field_label_casetaid" style="<?php echo $sStyleHidden_casetaid; ?>"><span id="id_label_casetaid"><?php echo $this->nm_new_label['casetaid']; ?></span></TD>
    <TD class="scFormDataOdd css_casetaid_line" id="hidden_field_data_casetaid" style="<?php echo $sStyleHidden_casetaid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_casetaid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["casetaid"]) &&  $this->nmgp_cmp_readonly["casetaid"] == "on") { 

 ?>
<input type="hidden" name="casetaid" value="<?php echo $this->form_encode_input($casetaid) . "\">" . $casetaid . ""; ?>
<?php } else { ?>
<span id="id_read_on_casetaid" class="sc-ui-readonly-casetaid css_casetaid_line" style="<?php echo $sStyleReadLab_casetaid; ?>"><?php echo $this->form_format_readonly("casetaid", $this->form_encode_input($this->casetaid)); ?></span><span id="id_read_off_casetaid" class="css_read_off_casetaid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_casetaid; ?>">
 <input class="sc-js-input scFormObjectOdd css_casetaid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_casetaid" type=text name="casetaid" value="<?php echo $this->form_encode_input($casetaid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['casetaid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['casetaid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['casetaid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_casetaid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_casetaid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tramoid']))
    {
        $this->nm_new_label['tramoid'] = "Tramo ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tramoid = $this->tramoid;
   $sStyleHidden_tramoid = '';
   if (isset($this->nmgp_cmp_hidden['tramoid']) && $this->nmgp_cmp_hidden['tramoid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tramoid']);
       $sStyleHidden_tramoid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tramoid = 'display: none;';
   $sStyleReadInp_tramoid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tramoid']) && $this->nmgp_cmp_readonly['tramoid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tramoid']);
       $sStyleReadLab_tramoid = '';
       $sStyleReadInp_tramoid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tramoid']) && $this->nmgp_cmp_hidden['tramoid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tramoid" value="<?php echo $this->form_encode_input($tramoid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tramoid_label" id="hidden_field_label_tramoid" style="<?php echo $sStyleHidden_tramoid; ?>"><span id="id_label_tramoid"><?php echo $this->nm_new_label['tramoid']; ?></span></TD>
    <TD class="scFormDataOdd css_tramoid_line" id="hidden_field_data_tramoid" style="<?php echo $sStyleHidden_tramoid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tramoid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tramoid"]) &&  $this->nmgp_cmp_readonly["tramoid"] == "on") { 

 ?>
<input type="hidden" name="tramoid" value="<?php echo $this->form_encode_input($tramoid) . "\">" . $tramoid . ""; ?>
<?php } else { ?>
<span id="id_read_on_tramoid" class="sc-ui-readonly-tramoid css_tramoid_line" style="<?php echo $sStyleReadLab_tramoid; ?>"><?php echo $this->form_format_readonly("tramoid", $this->form_encode_input($this->tramoid)); ?></span><span id="id_read_off_tramoid" class="css_read_off_tramoid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tramoid; ?>">
 <input class="sc-js-input scFormObjectOdd css_tramoid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tramoid" type=text name="tramoid" value="<?php echo $this->form_encode_input($tramoid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tramoid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tramoid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tramoid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tramoid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tramoid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cuerpo']))
    {
        $this->nm_new_label['cuerpo'] = "Cuerpo";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cuerpo = $this->cuerpo;
   $sStyleHidden_cuerpo = '';
   if (isset($this->nmgp_cmp_hidden['cuerpo']) && $this->nmgp_cmp_hidden['cuerpo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cuerpo']);
       $sStyleHidden_cuerpo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cuerpo = 'display: none;';
   $sStyleReadInp_cuerpo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cuerpo']) && $this->nmgp_cmp_readonly['cuerpo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cuerpo']);
       $sStyleReadLab_cuerpo = '';
       $sStyleReadInp_cuerpo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cuerpo']) && $this->nmgp_cmp_hidden['cuerpo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cuerpo" value="<?php echo $this->form_encode_input($cuerpo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cuerpo_label" id="hidden_field_label_cuerpo" style="<?php echo $sStyleHidden_cuerpo; ?>"><span id="id_label_cuerpo"><?php echo $this->nm_new_label['cuerpo']; ?></span></TD>
    <TD class="scFormDataOdd css_cuerpo_line" id="hidden_field_data_cuerpo" style="<?php echo $sStyleHidden_cuerpo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cuerpo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cuerpo"]) &&  $this->nmgp_cmp_readonly["cuerpo"] == "on") { 

 ?>
<input type="hidden" name="cuerpo" value="<?php echo $this->form_encode_input($cuerpo) . "\">" . $cuerpo . ""; ?>
<?php } else { ?>
<span id="id_read_on_cuerpo" class="sc-ui-readonly-cuerpo css_cuerpo_line" style="<?php echo $sStyleReadLab_cuerpo; ?>"><?php echo $this->form_format_readonly("cuerpo", $this->form_encode_input($this->cuerpo)); ?></span><span id="id_read_off_cuerpo" class="css_read_off_cuerpo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cuerpo; ?>">
 <input class="sc-js-input scFormObjectOdd css_cuerpo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cuerpo" type=text name="cuerpo" value="<?php echo $this->form_encode_input($cuerpo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cuerpo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cuerpo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['usuarioid']))
    {
        $this->nm_new_label['usuarioid'] = "Usuario ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usuarioid = $this->usuarioid;
   $sStyleHidden_usuarioid = '';
   if (isset($this->nmgp_cmp_hidden['usuarioid']) && $this->nmgp_cmp_hidden['usuarioid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usuarioid']);
       $sStyleHidden_usuarioid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usuarioid = 'display: none;';
   $sStyleReadInp_usuarioid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usuarioid']) && $this->nmgp_cmp_readonly['usuarioid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuarioid']);
       $sStyleReadLab_usuarioid = '';
       $sStyleReadInp_usuarioid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuarioid']) && $this->nmgp_cmp_hidden['usuarioid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuarioid" value="<?php echo $this->form_encode_input($usuarioid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_usuarioid_label" id="hidden_field_label_usuarioid" style="<?php echo $sStyleHidden_usuarioid; ?>"><span id="id_label_usuarioid"><?php echo $this->nm_new_label['usuarioid']; ?></span></TD>
    <TD class="scFormDataOdd css_usuarioid_line" id="hidden_field_data_usuarioid" style="<?php echo $sStyleHidden_usuarioid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usuarioid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuarioid"]) &&  $this->nmgp_cmp_readonly["usuarioid"] == "on") { 

 ?>
<input type="hidden" name="usuarioid" value="<?php echo $this->form_encode_input($usuarioid) . "\">" . $usuarioid . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuarioid" class="sc-ui-readonly-usuarioid css_usuarioid_line" style="<?php echo $sStyleReadLab_usuarioid; ?>"><?php echo $this->form_format_readonly("usuarioid", $this->form_encode_input($this->usuarioid)); ?></span><span id="id_read_off_usuarioid" class="css_read_off_usuarioid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_usuarioid; ?>">
 <input class="sc-js-input scFormObjectOdd css_usuarioid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_usuarioid" type=text name="usuarioid" value="<?php echo $this->form_encode_input($usuarioid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuarioid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuarioid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['carrilid']))
    {
        $this->nm_new_label['carrilid'] = "Carril ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $carrilid = $this->carrilid;
   $sStyleHidden_carrilid = '';
   if (isset($this->nmgp_cmp_hidden['carrilid']) && $this->nmgp_cmp_hidden['carrilid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['carrilid']);
       $sStyleHidden_carrilid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_carrilid = 'display: none;';
   $sStyleReadInp_carrilid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['carrilid']) && $this->nmgp_cmp_readonly['carrilid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['carrilid']);
       $sStyleReadLab_carrilid = '';
       $sStyleReadInp_carrilid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['carrilid']) && $this->nmgp_cmp_hidden['carrilid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="carrilid" value="<?php echo $this->form_encode_input($carrilid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_carrilid_label" id="hidden_field_label_carrilid" style="<?php echo $sStyleHidden_carrilid; ?>"><span id="id_label_carrilid"><?php echo $this->nm_new_label['carrilid']; ?></span></TD>
    <TD class="scFormDataOdd css_carrilid_line" id="hidden_field_data_carrilid" style="<?php echo $sStyleHidden_carrilid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_carrilid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["carrilid"]) &&  $this->nmgp_cmp_readonly["carrilid"] == "on") { 

 ?>
<input type="hidden" name="carrilid" value="<?php echo $this->form_encode_input($carrilid) . "\">" . $carrilid . ""; ?>
<?php } else { ?>
<span id="id_read_on_carrilid" class="sc-ui-readonly-carrilid css_carrilid_line" style="<?php echo $sStyleReadLab_carrilid; ?>"><?php echo $this->form_format_readonly("carrilid", $this->form_encode_input($this->carrilid)); ?></span><span id="id_read_off_carrilid" class="css_read_off_carrilid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_carrilid; ?>">
 <input class="sc-js-input scFormObjectOdd css_carrilid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_carrilid" type=text name="carrilid" value="<?php echo $this->form_encode_input($carrilid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['carrilid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['carrilid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['carrilid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_carrilid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_carrilid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechaoperacion']))
    {
        $this->nm_new_label['fechaoperacion'] = "Fecha Operacion";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechaoperacion = $this->fechaoperacion;
   $sStyleHidden_fechaoperacion = '';
   if (isset($this->nmgp_cmp_hidden['fechaoperacion']) && $this->nmgp_cmp_hidden['fechaoperacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechaoperacion']);
       $sStyleHidden_fechaoperacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechaoperacion = 'display: none;';
   $sStyleReadInp_fechaoperacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechaoperacion']) && $this->nmgp_cmp_readonly['fechaoperacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechaoperacion']);
       $sStyleReadLab_fechaoperacion = '';
       $sStyleReadInp_fechaoperacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechaoperacion']) && $this->nmgp_cmp_hidden['fechaoperacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechaoperacion" value="<?php echo $this->form_encode_input($fechaoperacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechaoperacion_label" id="hidden_field_label_fechaoperacion" style="<?php echo $sStyleHidden_fechaoperacion; ?>"><span id="id_label_fechaoperacion"><?php echo $this->nm_new_label['fechaoperacion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechaoperacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechaoperacion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fechaoperacion_line" id="hidden_field_data_fechaoperacion" style="<?php echo $sStyleHidden_fechaoperacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechaoperacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechaoperacion"]) &&  $this->nmgp_cmp_readonly["fechaoperacion"] == "on") { 

 ?>
<input type="hidden" name="fechaoperacion" value="<?php echo $this->form_encode_input($fechaoperacion) . "\">" . $fechaoperacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechaoperacion" class="sc-ui-readonly-fechaoperacion css_fechaoperacion_line" style="<?php echo $sStyleReadLab_fechaoperacion; ?>"><?php echo $this->form_format_readonly("fechaoperacion", $this->form_encode_input($fechaoperacion)); ?></span><span id="id_read_off_fechaoperacion" class="css_read_off_fechaoperacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechaoperacion; ?>"><?php
$tmp_form_data = $this->field_config['fechaoperacion']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fechaoperacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechaoperacion" type=text name="fechaoperacion" value="<?php echo $this->form_encode_input($fechaoperacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechaoperacion']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechaoperacion']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechaoperacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechaoperacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechaturno']))
    {
        $this->nm_new_label['fechaturno'] = "Fecha Turno";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechaturno = $this->fechaturno;
   $sStyleHidden_fechaturno = '';
   if (isset($this->nmgp_cmp_hidden['fechaturno']) && $this->nmgp_cmp_hidden['fechaturno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechaturno']);
       $sStyleHidden_fechaturno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechaturno = 'display: none;';
   $sStyleReadInp_fechaturno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechaturno']) && $this->nmgp_cmp_readonly['fechaturno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechaturno']);
       $sStyleReadLab_fechaturno = '';
       $sStyleReadInp_fechaturno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechaturno']) && $this->nmgp_cmp_hidden['fechaturno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechaturno" value="<?php echo $this->form_encode_input($fechaturno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechaturno_label" id="hidden_field_label_fechaturno" style="<?php echo $sStyleHidden_fechaturno; ?>"><span id="id_label_fechaturno"><?php echo $this->nm_new_label['fechaturno']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechaturno']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechaturno'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fechaturno_line" id="hidden_field_data_fechaturno" style="<?php echo $sStyleHidden_fechaturno; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechaturno_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechaturno"]) &&  $this->nmgp_cmp_readonly["fechaturno"] == "on") { 

 ?>
<input type="hidden" name="fechaturno" value="<?php echo $this->form_encode_input($fechaturno) . "\">" . $fechaturno . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechaturno" class="sc-ui-readonly-fechaturno css_fechaturno_line" style="<?php echo $sStyleReadLab_fechaturno; ?>"><?php echo $this->form_format_readonly("fechaturno", $this->form_encode_input($fechaturno)); ?></span><span id="id_read_off_fechaturno" class="css_read_off_fechaturno<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechaturno; ?>"><?php
$tmp_form_data = $this->field_config['fechaturno']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fechaturno_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechaturno" type=text name="fechaturno" value="<?php echo $this->form_encode_input($fechaturno) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechaturno']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechaturno']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechaturno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechaturno_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['horainicio']))
    {
        $this->nm_new_label['horainicio'] = "Hora Inicio";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $horainicio = $this->horainicio;
   $sStyleHidden_horainicio = '';
   if (isset($this->nmgp_cmp_hidden['horainicio']) && $this->nmgp_cmp_hidden['horainicio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['horainicio']);
       $sStyleHidden_horainicio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_horainicio = 'display: none;';
   $sStyleReadInp_horainicio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['horainicio']) && $this->nmgp_cmp_readonly['horainicio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['horainicio']);
       $sStyleReadLab_horainicio = '';
       $sStyleReadInp_horainicio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['horainicio']) && $this->nmgp_cmp_hidden['horainicio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="horainicio" value="<?php echo $this->form_encode_input($horainicio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_horainicio_label" id="hidden_field_label_horainicio" style="<?php echo $sStyleHidden_horainicio; ?>"><span id="id_label_horainicio"><?php echo $this->nm_new_label['horainicio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['horainicio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['horainicio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_horainicio_line" id="hidden_field_data_horainicio" style="<?php echo $sStyleHidden_horainicio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_horainicio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["horainicio"]) &&  $this->nmgp_cmp_readonly["horainicio"] == "on") { 

 ?>
<input type="hidden" name="horainicio" value="<?php echo $this->form_encode_input($horainicio) . "\">" . $horainicio . ""; ?>
<?php } else { ?>
<span id="id_read_on_horainicio" class="sc-ui-readonly-horainicio css_horainicio_line" style="<?php echo $sStyleReadLab_horainicio; ?>"><?php echo $this->form_format_readonly("horainicio", $this->form_encode_input($horainicio)); ?></span><span id="id_read_off_horainicio" class="css_read_off_horainicio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_horainicio; ?>"><?php
$tmp_form_data = $this->field_config['horainicio']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_horainicio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_horainicio" type=text name="horainicio" value="<?php echo $this->form_encode_input($horainicio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['horainicio']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['horainicio']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_horainicio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_horainicio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechafin']))
    {
        $this->nm_new_label['fechafin'] = "Fecha Fin";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechafin = $this->fechafin;
   $sStyleHidden_fechafin = '';
   if (isset($this->nmgp_cmp_hidden['fechafin']) && $this->nmgp_cmp_hidden['fechafin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechafin']);
       $sStyleHidden_fechafin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechafin = 'display: none;';
   $sStyleReadInp_fechafin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechafin']) && $this->nmgp_cmp_readonly['fechafin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechafin']);
       $sStyleReadLab_fechafin = '';
       $sStyleReadInp_fechafin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechafin']) && $this->nmgp_cmp_hidden['fechafin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechafin" value="<?php echo $this->form_encode_input($fechafin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechafin_label" id="hidden_field_label_fechafin" style="<?php echo $sStyleHidden_fechafin; ?>"><span id="id_label_fechafin"><?php echo $this->nm_new_label['fechafin']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechafin']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['fechafin'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fechafin_line" id="hidden_field_data_fechafin" style="<?php echo $sStyleHidden_fechafin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechafin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechafin"]) &&  $this->nmgp_cmp_readonly["fechafin"] == "on") { 

 ?>
<input type="hidden" name="fechafin" value="<?php echo $this->form_encode_input($fechafin) . "\">" . $fechafin . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechafin" class="sc-ui-readonly-fechafin css_fechafin_line" style="<?php echo $sStyleReadLab_fechafin; ?>"><?php echo $this->form_format_readonly("fechafin", $this->form_encode_input($fechafin)); ?></span><span id="id_read_off_fechafin" class="css_read_off_fechafin<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechafin; ?>"><?php
$tmp_form_data = $this->field_config['fechafin']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fechafin_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechafin" type=text name="fechafin" value="<?php echo $this->form_encode_input($fechafin) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechafin']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechafin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechafin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechafin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['horafin']))
    {
        $this->nm_new_label['horafin'] = "Hora Fin";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $horafin = $this->horafin;
   $sStyleHidden_horafin = '';
   if (isset($this->nmgp_cmp_hidden['horafin']) && $this->nmgp_cmp_hidden['horafin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['horafin']);
       $sStyleHidden_horafin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_horafin = 'display: none;';
   $sStyleReadInp_horafin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['horafin']) && $this->nmgp_cmp_readonly['horafin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['horafin']);
       $sStyleReadLab_horafin = '';
       $sStyleReadInp_horafin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['horafin']) && $this->nmgp_cmp_hidden['horafin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="horafin" value="<?php echo $this->form_encode_input($horafin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_horafin_label" id="hidden_field_label_horafin" style="<?php echo $sStyleHidden_horafin; ?>"><span id="id_label_horafin"><?php echo $this->nm_new_label['horafin']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['horafin']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['php_cmp_required']['horafin'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_horafin_line" id="hidden_field_data_horafin" style="<?php echo $sStyleHidden_horafin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_horafin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["horafin"]) &&  $this->nmgp_cmp_readonly["horafin"] == "on") { 

 ?>
<input type="hidden" name="horafin" value="<?php echo $this->form_encode_input($horafin) . "\">" . $horafin . ""; ?>
<?php } else { ?>
<span id="id_read_on_horafin" class="sc-ui-readonly-horafin css_horafin_line" style="<?php echo $sStyleReadLab_horafin; ?>"><?php echo $this->form_format_readonly("horafin", $this->form_encode_input($horafin)); ?></span><span id="id_read_off_horafin" class="css_read_off_horafin<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_horafin; ?>"><?php
$tmp_form_data = $this->field_config['horafin']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_horafin_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_horafin" type=text name="horafin" value="<?php echo $this->form_encode_input($horafin) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['horafin']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['horafin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_horafin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_horafin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['operacionid']))
    {
        $this->nm_new_label['operacionid'] = "Operacion ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $operacionid = $this->operacionid;
   $sStyleHidden_operacionid = '';
   if (isset($this->nmgp_cmp_hidden['operacionid']) && $this->nmgp_cmp_hidden['operacionid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['operacionid']);
       $sStyleHidden_operacionid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_operacionid = 'display: none;';
   $sStyleReadInp_operacionid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['operacionid']) && $this->nmgp_cmp_readonly['operacionid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['operacionid']);
       $sStyleReadLab_operacionid = '';
       $sStyleReadInp_operacionid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['operacionid']) && $this->nmgp_cmp_hidden['operacionid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="operacionid" value="<?php echo $this->form_encode_input($operacionid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_operacionid_label" id="hidden_field_label_operacionid" style="<?php echo $sStyleHidden_operacionid; ?>"><span id="id_label_operacionid"><?php echo $this->nm_new_label['operacionid']; ?></span></TD>
    <TD class="scFormDataOdd css_operacionid_line" id="hidden_field_data_operacionid" style="<?php echo $sStyleHidden_operacionid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_operacionid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["operacionid"]) &&  $this->nmgp_cmp_readonly["operacionid"] == "on") { 

 ?>
<input type="hidden" name="operacionid" value="<?php echo $this->form_encode_input($operacionid) . "\">" . $operacionid . ""; ?>
<?php } else { ?>
<span id="id_read_on_operacionid" class="sc-ui-readonly-operacionid css_operacionid_line" style="<?php echo $sStyleReadLab_operacionid; ?>"><?php echo $this->form_format_readonly("operacionid", $this->form_encode_input($this->operacionid)); ?></span><span id="id_read_off_operacionid" class="css_read_off_operacionid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_operacionid; ?>">
 <input class="sc-js-input scFormObjectOdd css_operacionid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_operacionid" type=text name="operacionid" value="<?php echo $this->form_encode_input($operacionid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_operacionid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_operacionid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['foliocierre']))
    {
        $this->nm_new_label['foliocierre'] = "Folio Cierre";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foliocierre = $this->foliocierre;
   $sStyleHidden_foliocierre = '';
   if (isset($this->nmgp_cmp_hidden['foliocierre']) && $this->nmgp_cmp_hidden['foliocierre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foliocierre']);
       $sStyleHidden_foliocierre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foliocierre = 'display: none;';
   $sStyleReadInp_foliocierre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foliocierre']) && $this->nmgp_cmp_readonly['foliocierre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foliocierre']);
       $sStyleReadLab_foliocierre = '';
       $sStyleReadInp_foliocierre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foliocierre']) && $this->nmgp_cmp_hidden['foliocierre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foliocierre" value="<?php echo $this->form_encode_input($foliocierre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_foliocierre_label" id="hidden_field_label_foliocierre" style="<?php echo $sStyleHidden_foliocierre; ?>"><span id="id_label_foliocierre"><?php echo $this->nm_new_label['foliocierre']; ?></span></TD>
    <TD class="scFormDataOdd css_foliocierre_line" id="hidden_field_data_foliocierre" style="<?php echo $sStyleHidden_foliocierre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_foliocierre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foliocierre"]) &&  $this->nmgp_cmp_readonly["foliocierre"] == "on") { 

 ?>
<input type="hidden" name="foliocierre" value="<?php echo $this->form_encode_input($foliocierre) . "\">" . $foliocierre . ""; ?>
<?php } else { ?>
<span id="id_read_on_foliocierre" class="sc-ui-readonly-foliocierre css_foliocierre_line" style="<?php echo $sStyleReadLab_foliocierre; ?>"><?php echo $this->form_format_readonly("foliocierre", $this->form_encode_input($this->foliocierre)); ?></span><span id="id_read_off_foliocierre" class="css_read_off_foliocierre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foliocierre; ?>">
 <input class="sc-js-input scFormObjectOdd css_foliocierre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_foliocierre" type=text name="foliocierre" value="<?php echo $this->form_encode_input($foliocierre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foliocierre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foliocierre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estatuscarril']))
    {
        $this->nm_new_label['estatuscarril'] = "Estatus Carril";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatuscarril = $this->estatuscarril;
   $sStyleHidden_estatuscarril = '';
   if (isset($this->nmgp_cmp_hidden['estatuscarril']) && $this->nmgp_cmp_hidden['estatuscarril'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatuscarril']);
       $sStyleHidden_estatuscarril = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatuscarril = 'display: none;';
   $sStyleReadInp_estatuscarril = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatuscarril']) && $this->nmgp_cmp_readonly['estatuscarril'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatuscarril']);
       $sStyleReadLab_estatuscarril = '';
       $sStyleReadInp_estatuscarril = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatuscarril']) && $this->nmgp_cmp_hidden['estatuscarril'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatuscarril" value="<?php echo $this->form_encode_input($estatuscarril) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_estatuscarril_label" id="hidden_field_label_estatuscarril" style="<?php echo $sStyleHidden_estatuscarril; ?>"><span id="id_label_estatuscarril"><?php echo $this->nm_new_label['estatuscarril']; ?></span></TD>
    <TD class="scFormDataOdd css_estatuscarril_line" id="hidden_field_data_estatuscarril" style="<?php echo $sStyleHidden_estatuscarril; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estatuscarril_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatuscarril"]) &&  $this->nmgp_cmp_readonly["estatuscarril"] == "on") { 

 ?>
<input type="hidden" name="estatuscarril" value="<?php echo $this->form_encode_input($estatuscarril) . "\">" . $estatuscarril . ""; ?>
<?php } else { ?>
<span id="id_read_on_estatuscarril" class="sc-ui-readonly-estatuscarril css_estatuscarril_line" style="<?php echo $sStyleReadLab_estatuscarril; ?>"><?php echo $this->form_format_readonly("estatuscarril", $this->form_encode_input($this->estatuscarril)); ?></span><span id="id_read_off_estatuscarril" class="css_read_off_estatuscarril<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estatuscarril; ?>">
 <input class="sc-js-input scFormObjectOdd css_estatuscarril_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estatuscarril" type=text name="estatuscarril" value="<?php echo $this->form_encode_input($estatuscarril) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estatuscarril_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estatuscarril_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['observacion']))
    {
        $this->nm_new_label['observacion'] = "Observacion";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $observacion = $this->observacion;
   $sStyleHidden_observacion = '';
   if (isset($this->nmgp_cmp_hidden['observacion']) && $this->nmgp_cmp_hidden['observacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['observacion']);
       $sStyleHidden_observacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_observacion = 'display: none;';
   $sStyleReadInp_observacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['observacion']) && $this->nmgp_cmp_readonly['observacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['observacion']);
       $sStyleReadLab_observacion = '';
       $sStyleReadInp_observacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['observacion']) && $this->nmgp_cmp_hidden['observacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="observacion" value="<?php echo $this->form_encode_input($observacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_observacion_label" id="hidden_field_label_observacion" style="<?php echo $sStyleHidden_observacion; ?>"><span id="id_label_observacion"><?php echo $this->nm_new_label['observacion']; ?></span></TD>
    <TD class="scFormDataOdd css_observacion_line" id="hidden_field_data_observacion" style="<?php echo $sStyleHidden_observacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observacion_line" style="vertical-align: top;padding: 0px">
<?php
$observacion_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observacion));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observacion"]) &&  $this->nmgp_cmp_readonly["observacion"] == "on") { 

 ?>
<input type="hidden" name="observacion" value="<?php echo $this->form_encode_input($observacion) . "\">" . $observacion_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observacion" class="sc-ui-readonly-observacion css_observacion_line" style="<?php echo $sStyleReadLab_observacion; ?>"><?php echo $this->form_format_readonly("observacion", $this->form_encode_input($observacion_val)); ?></span><span id="id_read_off_observacion" class="css_read_off_observacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observacion; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_observacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observacion" id="id_sc_field_observacion" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $observacion; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['preliquidado']))
    {
        $this->nm_new_label['preliquidado'] = "Pre Liquidado";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preliquidado = $this->preliquidado;
   $sStyleHidden_preliquidado = '';
   if (isset($this->nmgp_cmp_hidden['preliquidado']) && $this->nmgp_cmp_hidden['preliquidado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preliquidado']);
       $sStyleHidden_preliquidado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preliquidado = 'display: none;';
   $sStyleReadInp_preliquidado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preliquidado']) && $this->nmgp_cmp_readonly['preliquidado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preliquidado']);
       $sStyleReadLab_preliquidado = '';
       $sStyleReadInp_preliquidado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preliquidado']) && $this->nmgp_cmp_hidden['preliquidado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preliquidado" value="<?php echo $this->form_encode_input($preliquidado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preliquidado_label" id="hidden_field_label_preliquidado" style="<?php echo $sStyleHidden_preliquidado; ?>"><span id="id_label_preliquidado"><?php echo $this->nm_new_label['preliquidado']; ?></span></TD>
    <TD class="scFormDataOdd css_preliquidado_line" id="hidden_field_data_preliquidado" style="<?php echo $sStyleHidden_preliquidado; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preliquidado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preliquidado"]) &&  $this->nmgp_cmp_readonly["preliquidado"] == "on") { 

 ?>
<input type="hidden" name="preliquidado" value="<?php echo $this->form_encode_input($preliquidado) . "\">" . $preliquidado . ""; ?>
<?php } else { ?>
<span id="id_read_on_preliquidado" class="sc-ui-readonly-preliquidado css_preliquidado_line" style="<?php echo $sStyleReadLab_preliquidado; ?>"><?php echo $this->form_format_readonly("preliquidado", $this->form_encode_input($this->preliquidado)); ?></span><span id="id_read_off_preliquidado" class="css_read_off_preliquidado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preliquidado; ?>">
 <input class="sc-js-input scFormObjectOdd css_preliquidado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preliquidado" type=text name="preliquidado" value="<?php echo $this->form_encode_input($preliquidado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preliquidado']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preliquidado']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preliquidado']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preliquidado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preliquidado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['montocr']))
    {
        $this->nm_new_label['montocr'] = "Monto CR";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $montocr = $this->montocr;
   $sStyleHidden_montocr = '';
   if (isset($this->nmgp_cmp_hidden['montocr']) && $this->nmgp_cmp_hidden['montocr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['montocr']);
       $sStyleHidden_montocr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_montocr = 'display: none;';
   $sStyleReadInp_montocr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['montocr']) && $this->nmgp_cmp_readonly['montocr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['montocr']);
       $sStyleReadLab_montocr = '';
       $sStyleReadInp_montocr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['montocr']) && $this->nmgp_cmp_hidden['montocr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="montocr" value="<?php echo $this->form_encode_input($montocr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_montocr_label" id="hidden_field_label_montocr" style="<?php echo $sStyleHidden_montocr; ?>"><span id="id_label_montocr"><?php echo $this->nm_new_label['montocr']; ?></span></TD>
    <TD class="scFormDataOdd css_montocr_line" id="hidden_field_data_montocr" style="<?php echo $sStyleHidden_montocr; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_montocr_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["montocr"]) &&  $this->nmgp_cmp_readonly["montocr"] == "on") { 

 ?>
<input type="hidden" name="montocr" value="<?php echo $this->form_encode_input($montocr) . "\">" . $montocr . ""; ?>
<?php } else { ?>
<span id="id_read_on_montocr" class="sc-ui-readonly-montocr css_montocr_line" style="<?php echo $sStyleReadLab_montocr; ?>"><?php echo $this->form_format_readonly("montocr", $this->form_encode_input($this->montocr)); ?></span><span id="id_read_off_montocr" class="css_read_off_montocr<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_montocr; ?>">
 <input class="sc-js-input scFormObjectOdd css_montocr_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_montocr" type=text name="montocr" value="<?php echo $this->form_encode_input($montocr) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['montocr']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['montocr']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['montocr']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['montocr']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_montocr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_montocr_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['montoana']))
    {
        $this->nm_new_label['montoana'] = "Monto ANA";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $montoana = $this->montoana;
   $sStyleHidden_montoana = '';
   if (isset($this->nmgp_cmp_hidden['montoana']) && $this->nmgp_cmp_hidden['montoana'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['montoana']);
       $sStyleHidden_montoana = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_montoana = 'display: none;';
   $sStyleReadInp_montoana = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['montoana']) && $this->nmgp_cmp_readonly['montoana'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['montoana']);
       $sStyleReadLab_montoana = '';
       $sStyleReadInp_montoana = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['montoana']) && $this->nmgp_cmp_hidden['montoana'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="montoana" value="<?php echo $this->form_encode_input($montoana) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_montoana_label" id="hidden_field_label_montoana" style="<?php echo $sStyleHidden_montoana; ?>"><span id="id_label_montoana"><?php echo $this->nm_new_label['montoana']; ?></span></TD>
    <TD class="scFormDataOdd css_montoana_line" id="hidden_field_data_montoana" style="<?php echo $sStyleHidden_montoana; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_montoana_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["montoana"]) &&  $this->nmgp_cmp_readonly["montoana"] == "on") { 

 ?>
<input type="hidden" name="montoana" value="<?php echo $this->form_encode_input($montoana) . "\">" . $montoana . ""; ?>
<?php } else { ?>
<span id="id_read_on_montoana" class="sc-ui-readonly-montoana css_montoana_line" style="<?php echo $sStyleReadLab_montoana; ?>"><?php echo $this->form_format_readonly("montoana", $this->form_encode_input($this->montoana)); ?></span><span id="id_read_off_montoana" class="css_read_off_montoana<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_montoana; ?>">
 <input class="sc-js-input scFormObjectOdd css_montoana_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_montoana" type=text name="montoana" value="<?php echo $this->form_encode_input($montoana) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['montoana']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['montoana']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['montoana']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['montoana']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_montoana_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_montoana_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cantidadmxn']))
    {
        $this->nm_new_label['cantidadmxn'] = "Cantidad MXN";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantidadmxn = $this->cantidadmxn;
   $sStyleHidden_cantidadmxn = '';
   if (isset($this->nmgp_cmp_hidden['cantidadmxn']) && $this->nmgp_cmp_hidden['cantidadmxn'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantidadmxn']);
       $sStyleHidden_cantidadmxn = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantidadmxn = 'display: none;';
   $sStyleReadInp_cantidadmxn = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantidadmxn']) && $this->nmgp_cmp_readonly['cantidadmxn'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantidadmxn']);
       $sStyleReadLab_cantidadmxn = '';
       $sStyleReadInp_cantidadmxn = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantidadmxn']) && $this->nmgp_cmp_hidden['cantidadmxn'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidadmxn" value="<?php echo $this->form_encode_input($cantidadmxn) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cantidadmxn_label" id="hidden_field_label_cantidadmxn" style="<?php echo $sStyleHidden_cantidadmxn; ?>"><span id="id_label_cantidadmxn"><?php echo $this->nm_new_label['cantidadmxn']; ?></span></TD>
    <TD class="scFormDataOdd css_cantidadmxn_line" id="hidden_field_data_cantidadmxn" style="<?php echo $sStyleHidden_cantidadmxn; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantidadmxn_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidadmxn"]) &&  $this->nmgp_cmp_readonly["cantidadmxn"] == "on") { 

 ?>
<input type="hidden" name="cantidadmxn" value="<?php echo $this->form_encode_input($cantidadmxn) . "\">" . $cantidadmxn . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidadmxn" class="sc-ui-readonly-cantidadmxn css_cantidadmxn_line" style="<?php echo $sStyleReadLab_cantidadmxn; ?>"><?php echo $this->form_format_readonly("cantidadmxn", $this->form_encode_input($this->cantidadmxn)); ?></span><span id="id_read_off_cantidadmxn" class="css_read_off_cantidadmxn<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidadmxn; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidadmxn_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidadmxn" type=text name="cantidadmxn" value="<?php echo $this->form_encode_input($cantidadmxn) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidadmxn']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidadmxn']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidadmxn']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidadmxn_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidadmxn_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cantidadusd']))
    {
        $this->nm_new_label['cantidadusd'] = "Cantidad USD";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantidadusd = $this->cantidadusd;
   $sStyleHidden_cantidadusd = '';
   if (isset($this->nmgp_cmp_hidden['cantidadusd']) && $this->nmgp_cmp_hidden['cantidadusd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantidadusd']);
       $sStyleHidden_cantidadusd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantidadusd = 'display: none;';
   $sStyleReadInp_cantidadusd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantidadusd']) && $this->nmgp_cmp_readonly['cantidadusd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantidadusd']);
       $sStyleReadLab_cantidadusd = '';
       $sStyleReadInp_cantidadusd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantidadusd']) && $this->nmgp_cmp_hidden['cantidadusd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidadusd" value="<?php echo $this->form_encode_input($cantidadusd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cantidadusd_label" id="hidden_field_label_cantidadusd" style="<?php echo $sStyleHidden_cantidadusd; ?>"><span id="id_label_cantidadusd"><?php echo $this->nm_new_label['cantidadusd']; ?></span></TD>
    <TD class="scFormDataOdd css_cantidadusd_line" id="hidden_field_data_cantidadusd" style="<?php echo $sStyleHidden_cantidadusd; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantidadusd_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidadusd"]) &&  $this->nmgp_cmp_readonly["cantidadusd"] == "on") { 

 ?>
<input type="hidden" name="cantidadusd" value="<?php echo $this->form_encode_input($cantidadusd) . "\">" . $cantidadusd . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidadusd" class="sc-ui-readonly-cantidadusd css_cantidadusd_line" style="<?php echo $sStyleReadLab_cantidadusd; ?>"><?php echo $this->form_format_readonly("cantidadusd", $this->form_encode_input($this->cantidadusd)); ?></span><span id="id_read_off_cantidadusd" class="css_read_off_cantidadusd<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidadusd; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidadusd_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidadusd" type=text name="cantidadusd" value="<?php echo $this->form_encode_input($cantidadusd) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidadusd']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidadusd']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidadusd']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidadusd_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidadusd_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importemxn']))
    {
        $this->nm_new_label['importemxn'] = "Importe MXN";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importemxn = $this->importemxn;
   $sStyleHidden_importemxn = '';
   if (isset($this->nmgp_cmp_hidden['importemxn']) && $this->nmgp_cmp_hidden['importemxn'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importemxn']);
       $sStyleHidden_importemxn = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importemxn = 'display: none;';
   $sStyleReadInp_importemxn = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importemxn']) && $this->nmgp_cmp_readonly['importemxn'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importemxn']);
       $sStyleReadLab_importemxn = '';
       $sStyleReadInp_importemxn = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importemxn']) && $this->nmgp_cmp_hidden['importemxn'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importemxn" value="<?php echo $this->form_encode_input($importemxn) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_importemxn_label" id="hidden_field_label_importemxn" style="<?php echo $sStyleHidden_importemxn; ?>"><span id="id_label_importemxn"><?php echo $this->nm_new_label['importemxn']; ?></span></TD>
    <TD class="scFormDataOdd css_importemxn_line" id="hidden_field_data_importemxn" style="<?php echo $sStyleHidden_importemxn; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_importemxn_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importemxn"]) &&  $this->nmgp_cmp_readonly["importemxn"] == "on") { 

 ?>
<input type="hidden" name="importemxn" value="<?php echo $this->form_encode_input($importemxn) . "\">" . $importemxn . ""; ?>
<?php } else { ?>
<span id="id_read_on_importemxn" class="sc-ui-readonly-importemxn css_importemxn_line" style="<?php echo $sStyleReadLab_importemxn; ?>"><?php echo $this->form_format_readonly("importemxn", $this->form_encode_input($this->importemxn)); ?></span><span id="id_read_off_importemxn" class="css_read_off_importemxn<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importemxn; ?>">
 <input class="sc-js-input scFormObjectOdd css_importemxn_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importemxn" type=text name="importemxn" value="<?php echo $this->form_encode_input($importemxn) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importemxn']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importemxn']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importemxn']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importemxn']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_importemxn_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_importemxn_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeusd']))
    {
        $this->nm_new_label['importeusd'] = "Importe USD";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeusd = $this->importeusd;
   $sStyleHidden_importeusd = '';
   if (isset($this->nmgp_cmp_hidden['importeusd']) && $this->nmgp_cmp_hidden['importeusd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeusd']);
       $sStyleHidden_importeusd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeusd = 'display: none;';
   $sStyleReadInp_importeusd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeusd']) && $this->nmgp_cmp_readonly['importeusd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeusd']);
       $sStyleReadLab_importeusd = '';
       $sStyleReadInp_importeusd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeusd']) && $this->nmgp_cmp_hidden['importeusd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeusd" value="<?php echo $this->form_encode_input($importeusd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_importeusd_label" id="hidden_field_label_importeusd" style="<?php echo $sStyleHidden_importeusd; ?>"><span id="id_label_importeusd"><?php echo $this->nm_new_label['importeusd']; ?></span></TD>
    <TD class="scFormDataOdd css_importeusd_line" id="hidden_field_data_importeusd" style="<?php echo $sStyleHidden_importeusd; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_importeusd_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeusd"]) &&  $this->nmgp_cmp_readonly["importeusd"] == "on") { 

 ?>
<input type="hidden" name="importeusd" value="<?php echo $this->form_encode_input($importeusd) . "\">" . $importeusd . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeusd" class="sc-ui-readonly-importeusd css_importeusd_line" style="<?php echo $sStyleReadLab_importeusd; ?>"><?php echo $this->form_format_readonly("importeusd", $this->form_encode_input($this->importeusd)); ?></span><span id="id_read_off_importeusd" class="css_read_off_importeusd<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeusd; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeusd_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeusd" type=text name="importeusd" value="<?php echo $this->form_encode_input($importeusd) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeusd']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeusd']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeusd']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeusd']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_importeusd_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_importeusd_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['folioinicialcr']))
    {
        $this->nm_new_label['folioinicialcr'] = "Folio Inicial CR";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $folioinicialcr = $this->folioinicialcr;
   $sStyleHidden_folioinicialcr = '';
   if (isset($this->nmgp_cmp_hidden['folioinicialcr']) && $this->nmgp_cmp_hidden['folioinicialcr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['folioinicialcr']);
       $sStyleHidden_folioinicialcr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_folioinicialcr = 'display: none;';
   $sStyleReadInp_folioinicialcr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['folioinicialcr']) && $this->nmgp_cmp_readonly['folioinicialcr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['folioinicialcr']);
       $sStyleReadLab_folioinicialcr = '';
       $sStyleReadInp_folioinicialcr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['folioinicialcr']) && $this->nmgp_cmp_hidden['folioinicialcr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="folioinicialcr" value="<?php echo $this->form_encode_input($folioinicialcr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_folioinicialcr_label" id="hidden_field_label_folioinicialcr" style="<?php echo $sStyleHidden_folioinicialcr; ?>"><span id="id_label_folioinicialcr"><?php echo $this->nm_new_label['folioinicialcr']; ?></span></TD>
    <TD class="scFormDataOdd css_folioinicialcr_line" id="hidden_field_data_folioinicialcr" style="<?php echo $sStyleHidden_folioinicialcr; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_folioinicialcr_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["folioinicialcr"]) &&  $this->nmgp_cmp_readonly["folioinicialcr"] == "on") { 

 ?>
<input type="hidden" name="folioinicialcr" value="<?php echo $this->form_encode_input($folioinicialcr) . "\">" . $folioinicialcr . ""; ?>
<?php } else { ?>
<span id="id_read_on_folioinicialcr" class="sc-ui-readonly-folioinicialcr css_folioinicialcr_line" style="<?php echo $sStyleReadLab_folioinicialcr; ?>"><?php echo $this->form_format_readonly("folioinicialcr", $this->form_encode_input($this->folioinicialcr)); ?></span><span id="id_read_off_folioinicialcr" class="css_read_off_folioinicialcr<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_folioinicialcr; ?>">
 <input class="sc-js-input scFormObjectOdd css_folioinicialcr_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_folioinicialcr" type=text name="folioinicialcr" value="<?php echo $this->form_encode_input($folioinicialcr) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['folioinicialcr']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['folioinicialcr']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['folioinicialcr']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_folioinicialcr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_folioinicialcr_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['foliofinalcr']))
    {
        $this->nm_new_label['foliofinalcr'] = "Folio Final CR";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foliofinalcr = $this->foliofinalcr;
   $sStyleHidden_foliofinalcr = '';
   if (isset($this->nmgp_cmp_hidden['foliofinalcr']) && $this->nmgp_cmp_hidden['foliofinalcr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foliofinalcr']);
       $sStyleHidden_foliofinalcr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foliofinalcr = 'display: none;';
   $sStyleReadInp_foliofinalcr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foliofinalcr']) && $this->nmgp_cmp_readonly['foliofinalcr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foliofinalcr']);
       $sStyleReadLab_foliofinalcr = '';
       $sStyleReadInp_foliofinalcr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foliofinalcr']) && $this->nmgp_cmp_hidden['foliofinalcr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foliofinalcr" value="<?php echo $this->form_encode_input($foliofinalcr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_foliofinalcr_label" id="hidden_field_label_foliofinalcr" style="<?php echo $sStyleHidden_foliofinalcr; ?>"><span id="id_label_foliofinalcr"><?php echo $this->nm_new_label['foliofinalcr']; ?></span></TD>
    <TD class="scFormDataOdd css_foliofinalcr_line" id="hidden_field_data_foliofinalcr" style="<?php echo $sStyleHidden_foliofinalcr; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_foliofinalcr_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foliofinalcr"]) &&  $this->nmgp_cmp_readonly["foliofinalcr"] == "on") { 

 ?>
<input type="hidden" name="foliofinalcr" value="<?php echo $this->form_encode_input($foliofinalcr) . "\">" . $foliofinalcr . ""; ?>
<?php } else { ?>
<span id="id_read_on_foliofinalcr" class="sc-ui-readonly-foliofinalcr css_foliofinalcr_line" style="<?php echo $sStyleReadLab_foliofinalcr; ?>"><?php echo $this->form_format_readonly("foliofinalcr", $this->form_encode_input($this->foliofinalcr)); ?></span><span id="id_read_off_foliofinalcr" class="css_read_off_foliofinalcr<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foliofinalcr; ?>">
 <input class="sc-js-input scFormObjectOdd css_foliofinalcr_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_foliofinalcr" type=text name="foliofinalcr" value="<?php echo $this->form_encode_input($foliofinalcr) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['foliofinalcr']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['foliofinalcr']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['foliofinalcr']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foliofinalcr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foliofinalcr_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['folioinicialeap']))
    {
        $this->nm_new_label['folioinicialeap'] = "Folio Inicial EAP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $folioinicialeap = $this->folioinicialeap;
   $sStyleHidden_folioinicialeap = '';
   if (isset($this->nmgp_cmp_hidden['folioinicialeap']) && $this->nmgp_cmp_hidden['folioinicialeap'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['folioinicialeap']);
       $sStyleHidden_folioinicialeap = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_folioinicialeap = 'display: none;';
   $sStyleReadInp_folioinicialeap = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['folioinicialeap']) && $this->nmgp_cmp_readonly['folioinicialeap'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['folioinicialeap']);
       $sStyleReadLab_folioinicialeap = '';
       $sStyleReadInp_folioinicialeap = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['folioinicialeap']) && $this->nmgp_cmp_hidden['folioinicialeap'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="folioinicialeap" value="<?php echo $this->form_encode_input($folioinicialeap) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_folioinicialeap_label" id="hidden_field_label_folioinicialeap" style="<?php echo $sStyleHidden_folioinicialeap; ?>"><span id="id_label_folioinicialeap"><?php echo $this->nm_new_label['folioinicialeap']; ?></span></TD>
    <TD class="scFormDataOdd css_folioinicialeap_line" id="hidden_field_data_folioinicialeap" style="<?php echo $sStyleHidden_folioinicialeap; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_folioinicialeap_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["folioinicialeap"]) &&  $this->nmgp_cmp_readonly["folioinicialeap"] == "on") { 

 ?>
<input type="hidden" name="folioinicialeap" value="<?php echo $this->form_encode_input($folioinicialeap) . "\">" . $folioinicialeap . ""; ?>
<?php } else { ?>
<span id="id_read_on_folioinicialeap" class="sc-ui-readonly-folioinicialeap css_folioinicialeap_line" style="<?php echo $sStyleReadLab_folioinicialeap; ?>"><?php echo $this->form_format_readonly("folioinicialeap", $this->form_encode_input($this->folioinicialeap)); ?></span><span id="id_read_off_folioinicialeap" class="css_read_off_folioinicialeap<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_folioinicialeap; ?>">
 <input class="sc-js-input scFormObjectOdd css_folioinicialeap_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_folioinicialeap" type=text name="folioinicialeap" value="<?php echo $this->form_encode_input($folioinicialeap) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['folioinicialeap']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['folioinicialeap']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['folioinicialeap']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_folioinicialeap_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_folioinicialeap_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['foliofinaleap']))
    {
        $this->nm_new_label['foliofinaleap'] = "Folio Final EAP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foliofinaleap = $this->foliofinaleap;
   $sStyleHidden_foliofinaleap = '';
   if (isset($this->nmgp_cmp_hidden['foliofinaleap']) && $this->nmgp_cmp_hidden['foliofinaleap'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foliofinaleap']);
       $sStyleHidden_foliofinaleap = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foliofinaleap = 'display: none;';
   $sStyleReadInp_foliofinaleap = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foliofinaleap']) && $this->nmgp_cmp_readonly['foliofinaleap'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foliofinaleap']);
       $sStyleReadLab_foliofinaleap = '';
       $sStyleReadInp_foliofinaleap = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foliofinaleap']) && $this->nmgp_cmp_hidden['foliofinaleap'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foliofinaleap" value="<?php echo $this->form_encode_input($foliofinaleap) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_foliofinaleap_label" id="hidden_field_label_foliofinaleap" style="<?php echo $sStyleHidden_foliofinaleap; ?>"><span id="id_label_foliofinaleap"><?php echo $this->nm_new_label['foliofinaleap']; ?></span></TD>
    <TD class="scFormDataOdd css_foliofinaleap_line" id="hidden_field_data_foliofinaleap" style="<?php echo $sStyleHidden_foliofinaleap; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_foliofinaleap_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foliofinaleap"]) &&  $this->nmgp_cmp_readonly["foliofinaleap"] == "on") { 

 ?>
<input type="hidden" name="foliofinaleap" value="<?php echo $this->form_encode_input($foliofinaleap) . "\">" . $foliofinaleap . ""; ?>
<?php } else { ?>
<span id="id_read_on_foliofinaleap" class="sc-ui-readonly-foliofinaleap css_foliofinaleap_line" style="<?php echo $sStyleReadLab_foliofinaleap; ?>"><?php echo $this->form_format_readonly("foliofinaleap", $this->form_encode_input($this->foliofinaleap)); ?></span><span id="id_read_off_foliofinaleap" class="css_read_off_foliofinaleap<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foliofinaleap; ?>">
 <input class="sc-js-input scFormObjectOdd css_foliofinaleap_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_foliofinaleap" type=text name="foliofinaleap" value="<?php echo $this->form_encode_input($foliofinaleap) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['foliofinaleap']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['foliofinaleap']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['foliofinaleap']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foliofinaleap_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foliofinaleap_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['faltante']))
    {
        $this->nm_new_label['faltante'] = "Faltante";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $faltante = $this->faltante;
   $sStyleHidden_faltante = '';
   if (isset($this->nmgp_cmp_hidden['faltante']) && $this->nmgp_cmp_hidden['faltante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['faltante']);
       $sStyleHidden_faltante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_faltante = 'display: none;';
   $sStyleReadInp_faltante = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['faltante']) && $this->nmgp_cmp_readonly['faltante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['faltante']);
       $sStyleReadLab_faltante = '';
       $sStyleReadInp_faltante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['faltante']) && $this->nmgp_cmp_hidden['faltante'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="faltante" value="<?php echo $this->form_encode_input($faltante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_faltante_label" id="hidden_field_label_faltante" style="<?php echo $sStyleHidden_faltante; ?>"><span id="id_label_faltante"><?php echo $this->nm_new_label['faltante']; ?></span></TD>
    <TD class="scFormDataOdd css_faltante_line" id="hidden_field_data_faltante" style="<?php echo $sStyleHidden_faltante; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_faltante_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["faltante"]) &&  $this->nmgp_cmp_readonly["faltante"] == "on") { 

 ?>
<input type="hidden" name="faltante" value="<?php echo $this->form_encode_input($faltante) . "\">" . $faltante . ""; ?>
<?php } else { ?>
<span id="id_read_on_faltante" class="sc-ui-readonly-faltante css_faltante_line" style="<?php echo $sStyleReadLab_faltante; ?>"><?php echo $this->form_format_readonly("faltante", $this->form_encode_input($this->faltante)); ?></span><span id="id_read_off_faltante" class="css_read_off_faltante<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_faltante; ?>">
 <input class="sc-js-input scFormObjectOdd css_faltante_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_faltante" type=text name="faltante" value="<?php echo $this->form_encode_input($faltante) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['faltante']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['faltante']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['faltante']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['faltante']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_faltante_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_faltante_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ingresoelu_pre']))
    {
        $this->nm_new_label['ingresoelu_pre'] = "Ingreso ELU PRE";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ingresoelu_pre = $this->ingresoelu_pre;
   $sStyleHidden_ingresoelu_pre = '';
   if (isset($this->nmgp_cmp_hidden['ingresoelu_pre']) && $this->nmgp_cmp_hidden['ingresoelu_pre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ingresoelu_pre']);
       $sStyleHidden_ingresoelu_pre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ingresoelu_pre = 'display: none;';
   $sStyleReadInp_ingresoelu_pre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ingresoelu_pre']) && $this->nmgp_cmp_readonly['ingresoelu_pre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ingresoelu_pre']);
       $sStyleReadLab_ingresoelu_pre = '';
       $sStyleReadInp_ingresoelu_pre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ingresoelu_pre']) && $this->nmgp_cmp_hidden['ingresoelu_pre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ingresoelu_pre" value="<?php echo $this->form_encode_input($ingresoelu_pre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ingresoelu_pre_label" id="hidden_field_label_ingresoelu_pre" style="<?php echo $sStyleHidden_ingresoelu_pre; ?>"><span id="id_label_ingresoelu_pre"><?php echo $this->nm_new_label['ingresoelu_pre']; ?></span></TD>
    <TD class="scFormDataOdd css_ingresoelu_pre_line" id="hidden_field_data_ingresoelu_pre" style="<?php echo $sStyleHidden_ingresoelu_pre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ingresoelu_pre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ingresoelu_pre"]) &&  $this->nmgp_cmp_readonly["ingresoelu_pre"] == "on") { 

 ?>
<input type="hidden" name="ingresoelu_pre" value="<?php echo $this->form_encode_input($ingresoelu_pre) . "\">" . $ingresoelu_pre . ""; ?>
<?php } else { ?>
<span id="id_read_on_ingresoelu_pre" class="sc-ui-readonly-ingresoelu_pre css_ingresoelu_pre_line" style="<?php echo $sStyleReadLab_ingresoelu_pre; ?>"><?php echo $this->form_format_readonly("ingresoelu_pre", $this->form_encode_input($this->ingresoelu_pre)); ?></span><span id="id_read_off_ingresoelu_pre" class="css_read_off_ingresoelu_pre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ingresoelu_pre; ?>">
 <input class="sc-js-input scFormObjectOdd css_ingresoelu_pre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ingresoelu_pre" type=text name="ingresoelu_pre" value="<?php echo $this->form_encode_input($ingresoelu_pre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ingresoelu_pre']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ingresoelu_pre']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ingresoelu_pre']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ingresoelu_pre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ingresoelu_pre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['entregado']))
    {
        $this->nm_new_label['entregado'] = "Entregado";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $entregado = $this->entregado;
   $sStyleHidden_entregado = '';
   if (isset($this->nmgp_cmp_hidden['entregado']) && $this->nmgp_cmp_hidden['entregado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['entregado']);
       $sStyleHidden_entregado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_entregado = 'display: none;';
   $sStyleReadInp_entregado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['entregado']) && $this->nmgp_cmp_readonly['entregado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['entregado']);
       $sStyleReadLab_entregado = '';
       $sStyleReadInp_entregado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['entregado']) && $this->nmgp_cmp_hidden['entregado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="entregado" value="<?php echo $this->form_encode_input($entregado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_entregado_label" id="hidden_field_label_entregado" style="<?php echo $sStyleHidden_entregado; ?>"><span id="id_label_entregado"><?php echo $this->nm_new_label['entregado']; ?></span></TD>
    <TD class="scFormDataOdd css_entregado_line" id="hidden_field_data_entregado" style="<?php echo $sStyleHidden_entregado; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_entregado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["entregado"]) &&  $this->nmgp_cmp_readonly["entregado"] == "on") { 

 ?>
<input type="hidden" name="entregado" value="<?php echo $this->form_encode_input($entregado) . "\">" . $entregado . ""; ?>
<?php } else { ?>
<span id="id_read_on_entregado" class="sc-ui-readonly-entregado css_entregado_line" style="<?php echo $sStyleReadLab_entregado; ?>"><?php echo $this->form_format_readonly("entregado", $this->form_encode_input($this->entregado)); ?></span><span id="id_read_off_entregado" class="css_read_off_entregado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_entregado; ?>">
 <input class="sc-js-input scFormObjectOdd css_entregado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_entregado" type=text name="entregado" value="<?php echo $this->form_encode_input($entregado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['entregado']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['entregado']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['entregado']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['entregado']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_entregado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_entregado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['administradorid']))
    {
        $this->nm_new_label['administradorid'] = "Administrador ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $administradorid = $this->administradorid;
   $sStyleHidden_administradorid = '';
   if (isset($this->nmgp_cmp_hidden['administradorid']) && $this->nmgp_cmp_hidden['administradorid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['administradorid']);
       $sStyleHidden_administradorid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_administradorid = 'display: none;';
   $sStyleReadInp_administradorid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['administradorid']) && $this->nmgp_cmp_readonly['administradorid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['administradorid']);
       $sStyleReadLab_administradorid = '';
       $sStyleReadInp_administradorid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['administradorid']) && $this->nmgp_cmp_hidden['administradorid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="administradorid" value="<?php echo $this->form_encode_input($administradorid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_administradorid_label" id="hidden_field_label_administradorid" style="<?php echo $sStyleHidden_administradorid; ?>"><span id="id_label_administradorid"><?php echo $this->nm_new_label['administradorid']; ?></span></TD>
    <TD class="scFormDataOdd css_administradorid_line" id="hidden_field_data_administradorid" style="<?php echo $sStyleHidden_administradorid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_administradorid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["administradorid"]) &&  $this->nmgp_cmp_readonly["administradorid"] == "on") { 

 ?>
<input type="hidden" name="administradorid" value="<?php echo $this->form_encode_input($administradorid) . "\">" . $administradorid . ""; ?>
<?php } else { ?>
<span id="id_read_on_administradorid" class="sc-ui-readonly-administradorid css_administradorid_line" style="<?php echo $sStyleReadLab_administradorid; ?>"><?php echo $this->form_format_readonly("administradorid", $this->form_encode_input($this->administradorid)); ?></span><span id="id_read_off_administradorid" class="css_read_off_administradorid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_administradorid; ?>">
 <input class="sc-js-input scFormObjectOdd css_administradorid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_administradorid" type=text name="administradorid" value="<?php echo $this->form_encode_input($administradorid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['administradorid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['administradorid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['administradorid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_administradorid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_administradorid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['encargadoturnoid']))
    {
        $this->nm_new_label['encargadoturnoid'] = "Encargado Turno ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $encargadoturnoid = $this->encargadoturnoid;
   $sStyleHidden_encargadoturnoid = '';
   if (isset($this->nmgp_cmp_hidden['encargadoturnoid']) && $this->nmgp_cmp_hidden['encargadoturnoid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['encargadoturnoid']);
       $sStyleHidden_encargadoturnoid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_encargadoturnoid = 'display: none;';
   $sStyleReadInp_encargadoturnoid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['encargadoturnoid']) && $this->nmgp_cmp_readonly['encargadoturnoid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['encargadoturnoid']);
       $sStyleReadLab_encargadoturnoid = '';
       $sStyleReadInp_encargadoturnoid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['encargadoturnoid']) && $this->nmgp_cmp_hidden['encargadoturnoid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="encargadoturnoid" value="<?php echo $this->form_encode_input($encargadoturnoid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_encargadoturnoid_label" id="hidden_field_label_encargadoturnoid" style="<?php echo $sStyleHidden_encargadoturnoid; ?>"><span id="id_label_encargadoturnoid"><?php echo $this->nm_new_label['encargadoturnoid']; ?></span></TD>
    <TD class="scFormDataOdd css_encargadoturnoid_line" id="hidden_field_data_encargadoturnoid" style="<?php echo $sStyleHidden_encargadoturnoid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_encargadoturnoid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["encargadoturnoid"]) &&  $this->nmgp_cmp_readonly["encargadoturnoid"] == "on") { 

 ?>
<input type="hidden" name="encargadoturnoid" value="<?php echo $this->form_encode_input($encargadoturnoid) . "\">" . $encargadoturnoid . ""; ?>
<?php } else { ?>
<span id="id_read_on_encargadoturnoid" class="sc-ui-readonly-encargadoturnoid css_encargadoturnoid_line" style="<?php echo $sStyleReadLab_encargadoturnoid; ?>"><?php echo $this->form_format_readonly("encargadoturnoid", $this->form_encode_input($this->encargadoturnoid)); ?></span><span id="id_read_off_encargadoturnoid" class="css_read_off_encargadoturnoid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_encargadoturnoid; ?>">
 <input class="sc-js-input scFormObjectOdd css_encargadoturnoid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_encargadoturnoid" type=text name="encargadoturnoid" value="<?php echo $this->form_encode_input($encargadoturnoid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['encargadoturnoid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['encargadoturnoid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['encargadoturnoid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_encargadoturnoid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_encargadoturnoid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['encargadoturnoid_pre']))
    {
        $this->nm_new_label['encargadoturnoid_pre'] = "Encargado Turno ID Pre";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $encargadoturnoid_pre = $this->encargadoturnoid_pre;
   $sStyleHidden_encargadoturnoid_pre = '';
   if (isset($this->nmgp_cmp_hidden['encargadoturnoid_pre']) && $this->nmgp_cmp_hidden['encargadoturnoid_pre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['encargadoturnoid_pre']);
       $sStyleHidden_encargadoturnoid_pre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_encargadoturnoid_pre = 'display: none;';
   $sStyleReadInp_encargadoturnoid_pre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['encargadoturnoid_pre']) && $this->nmgp_cmp_readonly['encargadoturnoid_pre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['encargadoturnoid_pre']);
       $sStyleReadLab_encargadoturnoid_pre = '';
       $sStyleReadInp_encargadoturnoid_pre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['encargadoturnoid_pre']) && $this->nmgp_cmp_hidden['encargadoturnoid_pre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="encargadoturnoid_pre" value="<?php echo $this->form_encode_input($encargadoturnoid_pre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_encargadoturnoid_pre_label" id="hidden_field_label_encargadoturnoid_pre" style="<?php echo $sStyleHidden_encargadoturnoid_pre; ?>"><span id="id_label_encargadoturnoid_pre"><?php echo $this->nm_new_label['encargadoturnoid_pre']; ?></span></TD>
    <TD class="scFormDataOdd css_encargadoturnoid_pre_line" id="hidden_field_data_encargadoturnoid_pre" style="<?php echo $sStyleHidden_encargadoturnoid_pre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_encargadoturnoid_pre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["encargadoturnoid_pre"]) &&  $this->nmgp_cmp_readonly["encargadoturnoid_pre"] == "on") { 

 ?>
<input type="hidden" name="encargadoturnoid_pre" value="<?php echo $this->form_encode_input($encargadoturnoid_pre) . "\">" . $encargadoturnoid_pre . ""; ?>
<?php } else { ?>
<span id="id_read_on_encargadoturnoid_pre" class="sc-ui-readonly-encargadoturnoid_pre css_encargadoturnoid_pre_line" style="<?php echo $sStyleReadLab_encargadoturnoid_pre; ?>"><?php echo $this->form_format_readonly("encargadoturnoid_pre", $this->form_encode_input($this->encargadoturnoid_pre)); ?></span><span id="id_read_off_encargadoturnoid_pre" class="css_read_off_encargadoturnoid_pre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_encargadoturnoid_pre; ?>">
 <input class="sc-js-input scFormObjectOdd css_encargadoturnoid_pre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_encargadoturnoid_pre" type=text name="encargadoturnoid_pre" value="<?php echo $this->form_encode_input($encargadoturnoid_pre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['encargadoturnoid_pre']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['encargadoturnoid_pre']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['encargadoturnoid_pre']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_encargadoturnoid_pre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_encargadoturnoid_pre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechacierre']))
    {
        $this->nm_new_label['fechacierre'] = "Fecha Cierre";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fechacierre = $this->fechacierre;
   if (strlen($this->fechacierre_hora) > 8 ) {$this->fechacierre_hora = substr($this->fechacierre_hora, 0, 8);}
   $this->fechacierre .= ' ' . $this->fechacierre_hora;
   $this->fechacierre  = trim($this->fechacierre);
   $fechacierre = $this->fechacierre;
   $sStyleHidden_fechacierre = '';
   if (isset($this->nmgp_cmp_hidden['fechacierre']) && $this->nmgp_cmp_hidden['fechacierre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechacierre']);
       $sStyleHidden_fechacierre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechacierre = 'display: none;';
   $sStyleReadInp_fechacierre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechacierre']) && $this->nmgp_cmp_readonly['fechacierre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechacierre']);
       $sStyleReadLab_fechacierre = '';
       $sStyleReadInp_fechacierre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechacierre']) && $this->nmgp_cmp_hidden['fechacierre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechacierre" value="<?php echo $this->form_encode_input($fechacierre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechacierre_label" id="hidden_field_label_fechacierre" style="<?php echo $sStyleHidden_fechacierre; ?>"><span id="id_label_fechacierre"><?php echo $this->nm_new_label['fechacierre']; ?></span></TD>
    <TD class="scFormDataOdd css_fechacierre_line" id="hidden_field_data_fechacierre" style="<?php echo $sStyleHidden_fechacierre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechacierre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechacierre"]) &&  $this->nmgp_cmp_readonly["fechacierre"] == "on") { 

 ?>
<input type="hidden" name="fechacierre" value="<?php echo $this->form_encode_input($fechacierre) . "\">" . $fechacierre . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechacierre" class="sc-ui-readonly-fechacierre css_fechacierre_line" style="<?php echo $sStyleReadLab_fechacierre; ?>"><?php echo $this->form_format_readonly("fechacierre", $this->form_encode_input($fechacierre)); ?></span><span id="id_read_off_fechacierre" class="css_read_off_fechacierre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechacierre; ?>"><?php
$tmp_form_data = $this->field_config['fechacierre']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fechacierre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechacierre" type=text name="fechacierre" value="<?php echo $this->form_encode_input($fechacierre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fechacierre']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechacierre']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fechacierre']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechacierre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechacierre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fechacierre = $old_dt_fechacierre;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechapreliq']))
    {
        $this->nm_new_label['fechapreliq'] = "Fecha Pre Liq";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fechapreliq = $this->fechapreliq;
   if (strlen($this->fechapreliq_hora) > 8 ) {$this->fechapreliq_hora = substr($this->fechapreliq_hora, 0, 8);}
   $this->fechapreliq .= ' ' . $this->fechapreliq_hora;
   $this->fechapreliq  = trim($this->fechapreliq);
   $fechapreliq = $this->fechapreliq;
   $sStyleHidden_fechapreliq = '';
   if (isset($this->nmgp_cmp_hidden['fechapreliq']) && $this->nmgp_cmp_hidden['fechapreliq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechapreliq']);
       $sStyleHidden_fechapreliq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechapreliq = 'display: none;';
   $sStyleReadInp_fechapreliq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechapreliq']) && $this->nmgp_cmp_readonly['fechapreliq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechapreliq']);
       $sStyleReadLab_fechapreliq = '';
       $sStyleReadInp_fechapreliq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechapreliq']) && $this->nmgp_cmp_hidden['fechapreliq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechapreliq" value="<?php echo $this->form_encode_input($fechapreliq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechapreliq_label" id="hidden_field_label_fechapreliq" style="<?php echo $sStyleHidden_fechapreliq; ?>"><span id="id_label_fechapreliq"><?php echo $this->nm_new_label['fechapreliq']; ?></span></TD>
    <TD class="scFormDataOdd css_fechapreliq_line" id="hidden_field_data_fechapreliq" style="<?php echo $sStyleHidden_fechapreliq; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechapreliq_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechapreliq"]) &&  $this->nmgp_cmp_readonly["fechapreliq"] == "on") { 

 ?>
<input type="hidden" name="fechapreliq" value="<?php echo $this->form_encode_input($fechapreliq) . "\">" . $fechapreliq . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechapreliq" class="sc-ui-readonly-fechapreliq css_fechapreliq_line" style="<?php echo $sStyleReadLab_fechapreliq; ?>"><?php echo $this->form_format_readonly("fechapreliq", $this->form_encode_input($fechapreliq)); ?></span><span id="id_read_off_fechapreliq" class="css_read_off_fechapreliq<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechapreliq; ?>"><?php
$tmp_form_data = $this->field_config['fechapreliq']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fechapreliq_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechapreliq" type=text name="fechapreliq" value="<?php echo $this->form_encode_input($fechapreliq) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fechapreliq']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechapreliq']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fechapreliq']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechapreliq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechapreliq_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fechapreliq = $old_dt_fechapreliq;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechaliq']))
    {
        $this->nm_new_label['fechaliq'] = "Fecha Liq";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fechaliq = $this->fechaliq;
   if (strlen($this->fechaliq_hora) > 8 ) {$this->fechaliq_hora = substr($this->fechaliq_hora, 0, 8);}
   $this->fechaliq .= ' ' . $this->fechaliq_hora;
   $this->fechaliq  = trim($this->fechaliq);
   $fechaliq = $this->fechaliq;
   $sStyleHidden_fechaliq = '';
   if (isset($this->nmgp_cmp_hidden['fechaliq']) && $this->nmgp_cmp_hidden['fechaliq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechaliq']);
       $sStyleHidden_fechaliq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechaliq = 'display: none;';
   $sStyleReadInp_fechaliq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechaliq']) && $this->nmgp_cmp_readonly['fechaliq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechaliq']);
       $sStyleReadLab_fechaliq = '';
       $sStyleReadInp_fechaliq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechaliq']) && $this->nmgp_cmp_hidden['fechaliq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechaliq" value="<?php echo $this->form_encode_input($fechaliq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechaliq_label" id="hidden_field_label_fechaliq" style="<?php echo $sStyleHidden_fechaliq; ?>"><span id="id_label_fechaliq"><?php echo $this->nm_new_label['fechaliq']; ?></span></TD>
    <TD class="scFormDataOdd css_fechaliq_line" id="hidden_field_data_fechaliq" style="<?php echo $sStyleHidden_fechaliq; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechaliq_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechaliq"]) &&  $this->nmgp_cmp_readonly["fechaliq"] == "on") { 

 ?>
<input type="hidden" name="fechaliq" value="<?php echo $this->form_encode_input($fechaliq) . "\">" . $fechaliq . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechaliq" class="sc-ui-readonly-fechaliq css_fechaliq_line" style="<?php echo $sStyleReadLab_fechaliq; ?>"><?php echo $this->form_format_readonly("fechaliq", $this->form_encode_input($fechaliq)); ?></span><span id="id_read_off_fechaliq" class="css_read_off_fechaliq<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechaliq; ?>"><?php
$tmp_form_data = $this->field_config['fechaliq']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fechaliq_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechaliq" type=text name="fechaliq" value="<?php echo $this->form_encode_input($fechaliq) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fechaliq']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechaliq']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fechaliq']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechaliq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechaliq_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fechaliq = $old_dt_fechaliq;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['operacion']))
    {
        $this->nm_new_label['operacion'] = "Operacion";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $operacion = $this->operacion;
   $sStyleHidden_operacion = '';
   if (isset($this->nmgp_cmp_hidden['operacion']) && $this->nmgp_cmp_hidden['operacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['operacion']);
       $sStyleHidden_operacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_operacion = 'display: none;';
   $sStyleReadInp_operacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['operacion']) && $this->nmgp_cmp_readonly['operacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['operacion']);
       $sStyleReadLab_operacion = '';
       $sStyleReadInp_operacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['operacion']) && $this->nmgp_cmp_hidden['operacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="operacion" value="<?php echo $this->form_encode_input($operacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_operacion_label" id="hidden_field_label_operacion" style="<?php echo $sStyleHidden_operacion; ?>"><span id="id_label_operacion"><?php echo $this->nm_new_label['operacion']; ?></span></TD>
    <TD class="scFormDataOdd css_operacion_line" id="hidden_field_data_operacion" style="<?php echo $sStyleHidden_operacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_operacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["operacion"]) &&  $this->nmgp_cmp_readonly["operacion"] == "on") { 

 ?>
<input type="hidden" name="operacion" value="<?php echo $this->form_encode_input($operacion) . "\">" . $operacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_operacion" class="sc-ui-readonly-operacion css_operacion_line" style="<?php echo $sStyleReadLab_operacion; ?>"><?php echo $this->form_format_readonly("operacion", $this->form_encode_input($this->operacion)); ?></span><span id="id_read_off_operacion" class="css_read_off_operacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_operacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_operacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_operacion" type=text name="operacion" value="<?php echo $this->form_encode_input($operacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['operacion']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['operacion']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['operacion']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['operacion']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_operacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_operacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['liquidadorid']))
    {
        $this->nm_new_label['liquidadorid'] = "Liquidador ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $liquidadorid = $this->liquidadorid;
   $sStyleHidden_liquidadorid = '';
   if (isset($this->nmgp_cmp_hidden['liquidadorid']) && $this->nmgp_cmp_hidden['liquidadorid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['liquidadorid']);
       $sStyleHidden_liquidadorid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_liquidadorid = 'display: none;';
   $sStyleReadInp_liquidadorid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['liquidadorid']) && $this->nmgp_cmp_readonly['liquidadorid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['liquidadorid']);
       $sStyleReadLab_liquidadorid = '';
       $sStyleReadInp_liquidadorid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['liquidadorid']) && $this->nmgp_cmp_hidden['liquidadorid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="liquidadorid" value="<?php echo $this->form_encode_input($liquidadorid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_liquidadorid_label" id="hidden_field_label_liquidadorid" style="<?php echo $sStyleHidden_liquidadorid; ?>"><span id="id_label_liquidadorid"><?php echo $this->nm_new_label['liquidadorid']; ?></span></TD>
    <TD class="scFormDataOdd css_liquidadorid_line" id="hidden_field_data_liquidadorid" style="<?php echo $sStyleHidden_liquidadorid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_liquidadorid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["liquidadorid"]) &&  $this->nmgp_cmp_readonly["liquidadorid"] == "on") { 

 ?>
<input type="hidden" name="liquidadorid" value="<?php echo $this->form_encode_input($liquidadorid) . "\">" . $liquidadorid . ""; ?>
<?php } else { ?>
<span id="id_read_on_liquidadorid" class="sc-ui-readonly-liquidadorid css_liquidadorid_line" style="<?php echo $sStyleReadLab_liquidadorid; ?>"><?php echo $this->form_format_readonly("liquidadorid", $this->form_encode_input($this->liquidadorid)); ?></span><span id="id_read_off_liquidadorid" class="css_read_off_liquidadorid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_liquidadorid; ?>">
 <input class="sc-js-input scFormObjectOdd css_liquidadorid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_liquidadorid" type=text name="liquidadorid" value="<?php echo $this->form_encode_input($liquidadorid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_liquidadorid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_liquidadorid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['faltanteana']))
    {
        $this->nm_new_label['faltanteana'] = "Faltante ANA";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $faltanteana = $this->faltanteana;
   $sStyleHidden_faltanteana = '';
   if (isset($this->nmgp_cmp_hidden['faltanteana']) && $this->nmgp_cmp_hidden['faltanteana'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['faltanteana']);
       $sStyleHidden_faltanteana = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_faltanteana = 'display: none;';
   $sStyleReadInp_faltanteana = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['faltanteana']) && $this->nmgp_cmp_readonly['faltanteana'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['faltanteana']);
       $sStyleReadLab_faltanteana = '';
       $sStyleReadInp_faltanteana = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['faltanteana']) && $this->nmgp_cmp_hidden['faltanteana'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="faltanteana" value="<?php echo $this->form_encode_input($faltanteana) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_faltanteana_label" id="hidden_field_label_faltanteana" style="<?php echo $sStyleHidden_faltanteana; ?>"><span id="id_label_faltanteana"><?php echo $this->nm_new_label['faltanteana']; ?></span></TD>
    <TD class="scFormDataOdd css_faltanteana_line" id="hidden_field_data_faltanteana" style="<?php echo $sStyleHidden_faltanteana; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_faltanteana_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["faltanteana"]) &&  $this->nmgp_cmp_readonly["faltanteana"] == "on") { 

 ?>
<input type="hidden" name="faltanteana" value="<?php echo $this->form_encode_input($faltanteana) . "\">" . $faltanteana . ""; ?>
<?php } else { ?>
<span id="id_read_on_faltanteana" class="sc-ui-readonly-faltanteana css_faltanteana_line" style="<?php echo $sStyleReadLab_faltanteana; ?>"><?php echo $this->form_format_readonly("faltanteana", $this->form_encode_input($this->faltanteana)); ?></span><span id="id_read_off_faltanteana" class="css_read_off_faltanteana<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_faltanteana; ?>">
 <input class="sc-js-input scFormObjectOdd css_faltanteana_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_faltanteana" type=text name="faltanteana" value="<?php echo $this->form_encode_input($faltanteana) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['faltanteana']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['faltanteana']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['faltanteana']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['faltanteana']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_faltanteana_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_faltanteana_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ingresoelu_ana']))
    {
        $this->nm_new_label['ingresoelu_ana'] = "Ingreso ELU ANA";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ingresoelu_ana = $this->ingresoelu_ana;
   $sStyleHidden_ingresoelu_ana = '';
   if (isset($this->nmgp_cmp_hidden['ingresoelu_ana']) && $this->nmgp_cmp_hidden['ingresoelu_ana'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ingresoelu_ana']);
       $sStyleHidden_ingresoelu_ana = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ingresoelu_ana = 'display: none;';
   $sStyleReadInp_ingresoelu_ana = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ingresoelu_ana']) && $this->nmgp_cmp_readonly['ingresoelu_ana'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ingresoelu_ana']);
       $sStyleReadLab_ingresoelu_ana = '';
       $sStyleReadInp_ingresoelu_ana = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ingresoelu_ana']) && $this->nmgp_cmp_hidden['ingresoelu_ana'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ingresoelu_ana" value="<?php echo $this->form_encode_input($ingresoelu_ana) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ingresoelu_ana_label" id="hidden_field_label_ingresoelu_ana" style="<?php echo $sStyleHidden_ingresoelu_ana; ?>"><span id="id_label_ingresoelu_ana"><?php echo $this->nm_new_label['ingresoelu_ana']; ?></span></TD>
    <TD class="scFormDataOdd css_ingresoelu_ana_line" id="hidden_field_data_ingresoelu_ana" style="<?php echo $sStyleHidden_ingresoelu_ana; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ingresoelu_ana_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ingresoelu_ana"]) &&  $this->nmgp_cmp_readonly["ingresoelu_ana"] == "on") { 

 ?>
<input type="hidden" name="ingresoelu_ana" value="<?php echo $this->form_encode_input($ingresoelu_ana) . "\">" . $ingresoelu_ana . ""; ?>
<?php } else { ?>
<span id="id_read_on_ingresoelu_ana" class="sc-ui-readonly-ingresoelu_ana css_ingresoelu_ana_line" style="<?php echo $sStyleReadLab_ingresoelu_ana; ?>"><?php echo $this->form_format_readonly("ingresoelu_ana", $this->form_encode_input($this->ingresoelu_ana)); ?></span><span id="id_read_off_ingresoelu_ana" class="css_read_off_ingresoelu_ana<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ingresoelu_ana; ?>">
 <input class="sc-js-input scFormObjectOdd css_ingresoelu_ana_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ingresoelu_ana" type=text name="ingresoelu_ana" value="<?php echo $this->form_encode_input($ingresoelu_ana) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ingresoelu_ana']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ingresoelu_ana']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ingresoelu_ana']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ingresoelu_ana_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ingresoelu_ana_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['conteo']))
    {
        $this->nm_new_label['conteo'] = "Conteo";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conteo = $this->conteo;
   $sStyleHidden_conteo = '';
   if (isset($this->nmgp_cmp_hidden['conteo']) && $this->nmgp_cmp_hidden['conteo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conteo']);
       $sStyleHidden_conteo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conteo = 'display: none;';
   $sStyleReadInp_conteo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conteo']) && $this->nmgp_cmp_readonly['conteo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conteo']);
       $sStyleReadLab_conteo = '';
       $sStyleReadInp_conteo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conteo']) && $this->nmgp_cmp_hidden['conteo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="conteo" value="<?php echo $this->form_encode_input($conteo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_conteo_label" id="hidden_field_label_conteo" style="<?php echo $sStyleHidden_conteo; ?>"><span id="id_label_conteo"><?php echo $this->nm_new_label['conteo']; ?></span></TD>
    <TD class="scFormDataOdd css_conteo_line" id="hidden_field_data_conteo" style="<?php echo $sStyleHidden_conteo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_conteo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["conteo"]) &&  $this->nmgp_cmp_readonly["conteo"] == "on") { 

 ?>
<input type="hidden" name="conteo" value="<?php echo $this->form_encode_input($conteo) . "\">" . $conteo . ""; ?>
<?php } else { ?>
<span id="id_read_on_conteo" class="sc-ui-readonly-conteo css_conteo_line" style="<?php echo $sStyleReadLab_conteo; ?>"><?php echo $this->form_format_readonly("conteo", $this->form_encode_input($this->conteo)); ?></span><span id="id_read_off_conteo" class="css_read_off_conteo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_conteo; ?>">
 <input class="sc-js-input scFormObjectOdd css_conteo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_conteo" type=text name="conteo" value="<?php echo $this->form_encode_input($conteo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['conteo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['conteo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['conteo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conteo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conteo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechainiciodictamen']))
    {
        $this->nm_new_label['fechainiciodictamen'] = "Fecha Inicio Dictamen";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fechainiciodictamen = $this->fechainiciodictamen;
   if (strlen($this->fechainiciodictamen_hora) > 8 ) {$this->fechainiciodictamen_hora = substr($this->fechainiciodictamen_hora, 0, 8);}
   $this->fechainiciodictamen .= ' ' . $this->fechainiciodictamen_hora;
   $this->fechainiciodictamen  = trim($this->fechainiciodictamen);
   $fechainiciodictamen = $this->fechainiciodictamen;
   $sStyleHidden_fechainiciodictamen = '';
   if (isset($this->nmgp_cmp_hidden['fechainiciodictamen']) && $this->nmgp_cmp_hidden['fechainiciodictamen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechainiciodictamen']);
       $sStyleHidden_fechainiciodictamen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechainiciodictamen = 'display: none;';
   $sStyleReadInp_fechainiciodictamen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechainiciodictamen']) && $this->nmgp_cmp_readonly['fechainiciodictamen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechainiciodictamen']);
       $sStyleReadLab_fechainiciodictamen = '';
       $sStyleReadInp_fechainiciodictamen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechainiciodictamen']) && $this->nmgp_cmp_hidden['fechainiciodictamen'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechainiciodictamen" value="<?php echo $this->form_encode_input($fechainiciodictamen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechainiciodictamen_label" id="hidden_field_label_fechainiciodictamen" style="<?php echo $sStyleHidden_fechainiciodictamen; ?>"><span id="id_label_fechainiciodictamen"><?php echo $this->nm_new_label['fechainiciodictamen']; ?></span></TD>
    <TD class="scFormDataOdd css_fechainiciodictamen_line" id="hidden_field_data_fechainiciodictamen" style="<?php echo $sStyleHidden_fechainiciodictamen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechainiciodictamen_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechainiciodictamen"]) &&  $this->nmgp_cmp_readonly["fechainiciodictamen"] == "on") { 

 ?>
<input type="hidden" name="fechainiciodictamen" value="<?php echo $this->form_encode_input($fechainiciodictamen) . "\">" . $fechainiciodictamen . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechainiciodictamen" class="sc-ui-readonly-fechainiciodictamen css_fechainiciodictamen_line" style="<?php echo $sStyleReadLab_fechainiciodictamen; ?>"><?php echo $this->form_format_readonly("fechainiciodictamen", $this->form_encode_input($fechainiciodictamen)); ?></span><span id="id_read_off_fechainiciodictamen" class="css_read_off_fechainiciodictamen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechainiciodictamen; ?>"><?php
$tmp_form_data = $this->field_config['fechainiciodictamen']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fechainiciodictamen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechainiciodictamen" type=text name="fechainiciodictamen" value="<?php echo $this->form_encode_input($fechainiciodictamen) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fechainiciodictamen']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechainiciodictamen']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fechainiciodictamen']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechainiciodictamen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechainiciodictamen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fechainiciodictamen = $old_dt_fechainiciodictamen;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechafindictamen']))
    {
        $this->nm_new_label['fechafindictamen'] = "Fecha Fin Dictamen";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fechafindictamen = $this->fechafindictamen;
   if (strlen($this->fechafindictamen_hora) > 8 ) {$this->fechafindictamen_hora = substr($this->fechafindictamen_hora, 0, 8);}
   $this->fechafindictamen .= ' ' . $this->fechafindictamen_hora;
   $this->fechafindictamen  = trim($this->fechafindictamen);
   $fechafindictamen = $this->fechafindictamen;
   $sStyleHidden_fechafindictamen = '';
   if (isset($this->nmgp_cmp_hidden['fechafindictamen']) && $this->nmgp_cmp_hidden['fechafindictamen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechafindictamen']);
       $sStyleHidden_fechafindictamen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechafindictamen = 'display: none;';
   $sStyleReadInp_fechafindictamen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechafindictamen']) && $this->nmgp_cmp_readonly['fechafindictamen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechafindictamen']);
       $sStyleReadLab_fechafindictamen = '';
       $sStyleReadInp_fechafindictamen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechafindictamen']) && $this->nmgp_cmp_hidden['fechafindictamen'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechafindictamen" value="<?php echo $this->form_encode_input($fechafindictamen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechafindictamen_label" id="hidden_field_label_fechafindictamen" style="<?php echo $sStyleHidden_fechafindictamen; ?>"><span id="id_label_fechafindictamen"><?php echo $this->nm_new_label['fechafindictamen']; ?></span></TD>
    <TD class="scFormDataOdd css_fechafindictamen_line" id="hidden_field_data_fechafindictamen" style="<?php echo $sStyleHidden_fechafindictamen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechafindictamen_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechafindictamen"]) &&  $this->nmgp_cmp_readonly["fechafindictamen"] == "on") { 

 ?>
<input type="hidden" name="fechafindictamen" value="<?php echo $this->form_encode_input($fechafindictamen) . "\">" . $fechafindictamen . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechafindictamen" class="sc-ui-readonly-fechafindictamen css_fechafindictamen_line" style="<?php echo $sStyleReadLab_fechafindictamen; ?>"><?php echo $this->form_format_readonly("fechafindictamen", $this->form_encode_input($fechafindictamen)); ?></span><span id="id_read_off_fechafindictamen" class="css_read_off_fechafindictamen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechafindictamen; ?>"><?php
$tmp_form_data = $this->field_config['fechafindictamen']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fechafindictamen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechafindictamen" type=text name="fechafindictamen" value="<?php echo $this->form_encode_input($fechafindictamen) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fechafindictamen']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechafindictamen']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fechafindictamen']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechafindictamen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechafindictamen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fechafindictamen = $old_dt_fechafindictamen;
?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R")
{
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq('b')", "scBtnFn_sys_GridPermiteSeq('b')", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['masterValue']))
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
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_muestra_ingresoEluPre");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_muestra_ingresoEluPre");
 parent.scAjaxDetailHeight("form_muestra_ingresoEluPre", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_muestra_ingresoEluPre", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_muestra_ingresoEluPre", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if (isset($this->scFormFocusErrorName) && '' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_format_reload() {
		if ($("#sc_b_reload_t.sc-unique-btn-6").length && $("#sc_b_reload_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_reload_t.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			scAjax_formReload();
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
		    if ($("#sc_b_hlp_t").hasClass("disabled")) {
		        return;
		    }
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-8").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-9").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-10").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-11").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq(btnPos) {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
		    if ($("#brec_b").hasClass("disabled")) {
		        return;
		    }
			nm_navpage(document.F1['nmgp_rec_' + btnPos].value, 'P'); document.F1['nmgp_rec_' + btnPos].value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-12").length && $("#sc_b_ini_b.sc-unique-btn-12").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-12").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-13").length && $("#sc_b_ret_b.sc-unique-btn-13").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-13").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-14").length && $("#sc_b_avc_b.sc-unique-btn-14").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-14").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-15").length && $("#sc_b_fim_b.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_muestra_ingresoEluPre']['buttonStatus'] = $this->nmgp_botoes;
?>
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
</script>
</body> 
</html> 
