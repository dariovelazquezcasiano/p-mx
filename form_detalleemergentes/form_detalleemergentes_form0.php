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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " detalleemergentes"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " detalleemergentes"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_detalleemergentes/form_detalleemergentes_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("form_detalleemergentes_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['last'] : 'off'); ?>";
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
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_t")) document.getElementById("sc_b_navpage_t").innerHTML = str_navpage;
}
<?php

include_once('form_detalleemergentes_jquery.php');

?>
var applicationKeys = "";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
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
    return false;
}

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

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
   });
 if($(".sc-ui-block-control").length) {
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
    if ("hidden_bloco_1" == block_id) {
      scAjaxDetailHeight("form_emergentes", "800");
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/peaje_module_ui.css?v=20260913-palette" />
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['link_info']['remove_border']) {
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
 include_once("form_detalleemergentes_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_detalleemergentes'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_detalleemergentes'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="100%">
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "R")
{
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_t" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "Nuevo Corte";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['new'];
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
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "Inserta Corte";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['insert'];
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
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "Borrar Corte";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['Inserta'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['inserta']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['inserta']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['inserta']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['inserta']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['inserta'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "inserta", "scBtnFn_Inserta()", "scBtnFn_Inserta()", "sc_Inserta_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['Inserta'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['inserta']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['inserta']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['inserta']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['inserta']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['inserta'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "inserta", "scBtnFn_Inserta()", "scBtnFn_Inserta()", "sc_Inserta_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call || $this->form_3versions_single) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['casetaid']))
           {
               $this->nmgp_cmp_readonly['casetaid'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fechaoperacion']))
           {
               $this->nmgp_cmp_readonly['fechaoperacion'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['turnoid']))
           {
               $this->nmgp_cmp_readonly['turnoid'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['usuarioid']))
           {
               $this->nmgp_cmp_readonly['usuarioid'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['carrilid']))
           {
               $this->nmgp_cmp_readonly['carrilid'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusemergente']))
    {
        $this->nm_new_label['estatusemergente'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusemergente = $this->estatusemergente;
   $sStyleHidden_estatusemergente = '';
   if (isset($this->nmgp_cmp_hidden['estatusemergente']) && $this->nmgp_cmp_hidden['estatusemergente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusemergente']);
       $sStyleHidden_estatusemergente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusemergente = 'display: none;';
   $sStyleReadInp_estatusemergente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusemergente']) && $this->nmgp_cmp_readonly['estatusemergente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusemergente']);
       $sStyleReadLab_estatusemergente = '';
       $sStyleReadInp_estatusemergente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusemergente']) && $this->nmgp_cmp_hidden['estatusemergente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusemergente" value="<?php echo $this->form_encode_input($estatusemergente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusemergente_line" id="hidden_field_data_estatusemergente" style="<?php echo $sStyleHidden_estatusemergente; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estatusemergente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estatusemergente_label" style=""><span id="id_label_estatusemergente"><?php echo $this->nm_new_label['estatusemergente']; ?></span></span><br><span id="id_ajax_label_estatusemergente"><?php echo $estatusemergente?></span>
<input type="hidden" name="estatusemergente" value="<?php echo $this->form_encode_input($estatusemergente); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estatusemergente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estatusemergente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['casetaid']))
   {
       $this->nm_new_label['casetaid'] = "Caseta";
   }
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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["casetaid"]) &&  $this->nmgp_cmp_readonly["casetaid"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['casetaid']);
       $sStyleReadLab_casetaid = '';
       $sStyleReadInp_casetaid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['casetaid']) && $this->nmgp_cmp_hidden['casetaid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="casetaid" value="<?php echo $this->form_encode_input($this->casetaid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_casetaid_line" id="hidden_field_data_casetaid" style="<?php echo $sStyleHidden_casetaid; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_casetaid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_casetaid_label" style=""><span id="id_label_casetaid"><?php echo $this->nm_new_label['casetaid']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['casetaid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['casetaid'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["casetaid"]) &&  $this->nmgp_cmp_readonly["casetaid"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_casetaid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_casetaid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_casetaid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_casetaid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_casetaid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_casetaid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_casetaid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_casetaid'] = array(); 
    }

   $old_value_fechaoperacion = $this->fechaoperacion;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaoperacion = $this->fechaoperacion;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $nm_comando = "SELECT CasetaID, Caseta  FROM casetas  ORDER BY Caseta";

   $this->fechaoperacion = $old_value_fechaoperacion;
   $this->horainicio = $old_value_horainicio;
   $this->horafin = $old_value_horafin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_casetaid'][] = $rs->fields[0];
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
   $x = 0; 
   $casetaid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->casetaid_1))
          {
              foreach ($this->casetaid_1 as $tmp_casetaid)
              {
                  if (trim($tmp_casetaid) === trim($cadaselect[1])) { $casetaid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->casetaid) === trim($cadaselect[1])) { $casetaid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="casetaid" value="<?php echo $this->form_encode_input($casetaid) . "\"><span id=\"id_ajax_label_casetaid\">" . $casetaid_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_casetaid();
   $x = 0 ; 
   $casetaid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->casetaid_1))
          {
              foreach ($this->casetaid_1 as $tmp_casetaid)
              {
                  if (trim($tmp_casetaid) === trim($cadaselect[1])) { $casetaid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->casetaid) === trim($cadaselect[1])) { $casetaid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($casetaid_look))
          {
              $casetaid_look = $this->casetaid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_casetaid\" class=\"css_casetaid_line\" style=\"" .  $sStyleReadLab_casetaid . "\">" . $this->form_format_readonly("casetaid", $this->form_encode_input($casetaid_look)) . "</span><span id=\"id_read_off_casetaid\" class=\"css_read_off_casetaid" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_casetaid . "\">";
   echo " <span id=\"idAjaxSelect_casetaid\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_casetaid_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_casetaid\" name=\"casetaid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_casetaid'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->casetaid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->casetaid)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_casetaid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_casetaid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fechaoperacion']))
    {
        $this->nm_new_label['fechaoperacion'] = "Fecha";
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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fechaoperacion"]) &&  $this->nmgp_cmp_readonly["fechaoperacion"] == "on"))
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

    <TD class="scFormDataOdd css_fechaoperacion_line" id="hidden_field_data_fechaoperacion" style="<?php echo $sStyleHidden_fechaoperacion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechaoperacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechaoperacion_label" style=""><span id="id_label_fechaoperacion"><?php echo $this->nm_new_label['fechaoperacion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['fechaoperacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['fechaoperacion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fechaoperacion"]) &&  $this->nmgp_cmp_readonly["fechaoperacion"] == "on")) { 

 ?>
<input type="hidden" name="fechaoperacion" value="<?php echo $this->form_encode_input($fechaoperacion) . "\"><span id=\"id_ajax_label_fechaoperacion\">" . $fechaoperacion . "</span>"; ?>
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
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechaoperacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechaoperacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['turnoid']))
   {
       $this->nm_new_label['turnoid'] = "Turno";
   }
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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["turnoid"]) &&  $this->nmgp_cmp_readonly["turnoid"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['turnoid']);
       $sStyleReadLab_turnoid = '';
       $sStyleReadInp_turnoid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['turnoid']) && $this->nmgp_cmp_hidden['turnoid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="turnoid" value="<?php echo $this->form_encode_input($this->turnoid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_turnoid_line" id="hidden_field_data_turnoid" style="<?php echo $sStyleHidden_turnoid; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_turnoid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_turnoid_label" style=""><span id="id_label_turnoid"><?php echo $this->nm_new_label['turnoid']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['turnoid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['turnoid'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["turnoid"]) &&  $this->nmgp_cmp_readonly["turnoid"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_turnoid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_turnoid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_turnoid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_turnoid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_turnoid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_turnoid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_turnoid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_turnoid'] = array(); 
    }

   $old_value_fechaoperacion = $this->fechaoperacion;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaoperacion = $this->fechaoperacion;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $nm_comando = "SELECT TipoID, Nombre  FROM turnos  ORDER BY TipoID";

   $this->fechaoperacion = $old_value_fechaoperacion;
   $this->horainicio = $old_value_horainicio;
   $this->horafin = $old_value_horafin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_turnoid'][] = $rs->fields[0];
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
   $x = 0; 
   $turnoid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->turnoid_1))
          {
              foreach ($this->turnoid_1 as $tmp_turnoid)
              {
                  if (trim($tmp_turnoid) === trim($cadaselect[1])) { $turnoid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->turnoid) === trim($cadaselect[1])) { $turnoid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="turnoid" value="<?php echo $this->form_encode_input($turnoid) . "\"><span id=\"id_ajax_label_turnoid\">" . $turnoid_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_turnoid();
   $x = 0 ; 
   $turnoid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->turnoid_1))
          {
              foreach ($this->turnoid_1 as $tmp_turnoid)
              {
                  if (trim($tmp_turnoid) === trim($cadaselect[1])) { $turnoid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->turnoid) === trim($cadaselect[1])) { $turnoid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($turnoid_look))
          {
              $turnoid_look = $this->turnoid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_turnoid\" class=\"css_turnoid_line\" style=\"" .  $sStyleReadLab_turnoid . "\">" . $this->form_format_readonly("turnoid", $this->form_encode_input($turnoid_look)) . "</span><span id=\"id_read_off_turnoid\" class=\"css_read_off_turnoid" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_turnoid . "\">";
   echo " <span id=\"idAjaxSelect_turnoid\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_turnoid_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_turnoid\" name=\"turnoid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->turnoid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->turnoid)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_turnoid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_turnoid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['usuarioid']))
   {
       $this->nm_new_label['usuarioid'] = "Usuario";
   }
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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["usuarioid"]) &&  $this->nmgp_cmp_readonly["usuarioid"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuarioid']);
       $sStyleReadLab_usuarioid = '';
       $sStyleReadInp_usuarioid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuarioid']) && $this->nmgp_cmp_hidden['usuarioid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="usuarioid" value="<?php echo $this->form_encode_input($this->usuarioid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_usuarioid_line" id="hidden_field_data_usuarioid" style="<?php echo $sStyleHidden_usuarioid; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usuarioid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_usuarioid_label" style=""><span id="id_label_usuarioid"><?php echo $this->nm_new_label['usuarioid']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["usuarioid"]) &&  $this->nmgp_cmp_readonly["usuarioid"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_usuarioid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_usuarioid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_usuarioid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_usuarioid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_usuarioid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_usuarioid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_usuarioid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_usuarioid'] = array(); 
    }

   $old_value_fechaoperacion = $this->fechaoperacion;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaoperacion = $this->fechaoperacion;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $nm_comando = "SELECT UsuarioID, Concat(Nombre,' ',ApellidoPaterno,'',ApellidoMaterno)  FROM usuario  Where UsuarioTipoID = 5 ORDER BY Nombre";

   $this->fechaoperacion = $old_value_fechaoperacion;
   $this->horainicio = $old_value_horainicio;
   $this->horafin = $old_value_horafin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_usuarioid'][] = $rs->fields[0];
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
   $x = 0; 
   $usuarioid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->usuarioid_1))
          {
              foreach ($this->usuarioid_1 as $tmp_usuarioid)
              {
                  if (trim($tmp_usuarioid) === trim($cadaselect[1])) { $usuarioid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->usuarioid) === trim($cadaselect[1])) { $usuarioid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="usuarioid" value="<?php echo $this->form_encode_input($usuarioid) . "\"><span id=\"id_ajax_label_usuarioid\">" . $usuarioid_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_usuarioid();
   $x = 0 ; 
   $usuarioid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->usuarioid_1))
          {
              foreach ($this->usuarioid_1 as $tmp_usuarioid)
              {
                  if (trim($tmp_usuarioid) === trim($cadaselect[1])) { $usuarioid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->usuarioid) === trim($cadaselect[1])) { $usuarioid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($usuarioid_look))
          {
              $usuarioid_look = $this->usuarioid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_usuarioid\" class=\"css_usuarioid_line\" style=\"" .  $sStyleReadLab_usuarioid . "\">" . $this->form_format_readonly("usuarioid", $this->form_encode_input($usuarioid_look)) . "</span><span id=\"id_read_off_usuarioid\" class=\"css_read_off_usuarioid" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_usuarioid . "\">";
   echo " <span id=\"idAjaxSelect_usuarioid\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_usuarioid_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_usuarioid\" name=\"usuarioid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->usuarioid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->usuarioid)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuarioid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuarioid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_estatusemergente_dumb = ('' == $sStyleHidden_estatusemergente) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_estatusemergente_dumb" style="<?php echo $sStyleHidden_estatusemergente_dumb; ?>"></TD>
<?php $sStyleHidden_casetaid_dumb = ('' == $sStyleHidden_casetaid) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_casetaid_dumb" style="<?php echo $sStyleHidden_casetaid_dumb; ?>"></TD>
<?php $sStyleHidden_fechaoperacion_dumb = ('' == $sStyleHidden_fechaoperacion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fechaoperacion_dumb" style="<?php echo $sStyleHidden_fechaoperacion_dumb; ?>"></TD>
<?php $sStyleHidden_turnoid_dumb = ('' == $sStyleHidden_turnoid) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_turnoid_dumb" style="<?php echo $sStyleHidden_turnoid_dumb; ?>"></TD>
<?php $sStyleHidden_usuarioid_dumb = ('' == $sStyleHidden_usuarioid) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_usuarioid_dumb" style="<?php echo $sStyleHidden_usuarioid_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cuerpo']))
           {
               $this->nmgp_cmp_readonly['cuerpo'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['horainicio']))
           {
               $this->nmgp_cmp_readonly['horainicio'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['horafin']))
           {
               $this->nmgp_cmp_readonly['horafin'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['encargadoturnoid']))
           {
               $this->nmgp_cmp_readonly['encargadoturnoid'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['carrilid']))
   {
       $this->nm_new_label['carrilid'] = "Carril";
   }
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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["carrilid"]) &&  $this->nmgp_cmp_readonly["carrilid"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['carrilid']);
       $sStyleReadLab_carrilid = '';
       $sStyleReadInp_carrilid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['carrilid']) && $this->nmgp_cmp_hidden['carrilid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="carrilid" value="<?php echo $this->form_encode_input($this->carrilid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_carrilid_line" id="hidden_field_data_carrilid" style="<?php echo $sStyleHidden_carrilid; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_carrilid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_carrilid_label" style=""><span id="id_label_carrilid"><?php echo $this->nm_new_label['carrilid']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['carrilid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['carrilid'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["carrilid"]) &&  $this->nmgp_cmp_readonly["carrilid"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_carrilid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_carrilid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_carrilid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_carrilid'] = array(); 
}
if ($this->casetaid != "")
{ 
   $this->nm_clear_val("casetaid");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_carrilid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_carrilid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_carrilid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_carrilid'] = array(); 
    }

   $old_value_fechaoperacion = $this->fechaoperacion;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaoperacion = $this->fechaoperacion;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $nm_comando = "SELECT CarrilID, CarrilNacional  FROM carril  WHERE CasetaID = $this->casetaid ORDER BY CarrilNacional";

   $this->fechaoperacion = $old_value_fechaoperacion;
   $this->horainicio = $old_value_horainicio;
   $this->horafin = $old_value_horafin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_carrilid'][] = $rs->fields[0];
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
} 
   $x = 0; 
   $carrilid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->carrilid_1))
          {
              foreach ($this->carrilid_1 as $tmp_carrilid)
              {
                  if (trim($tmp_carrilid) === trim($cadaselect[1])) { $carrilid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->carrilid) === trim($cadaselect[1])) { $carrilid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="carrilid" value="<?php echo $this->form_encode_input($carrilid) . "\"><span id=\"id_ajax_label_carrilid\">" . $carrilid_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_carrilid();
   $x = 0 ; 
   $carrilid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->carrilid_1))
          {
              foreach ($this->carrilid_1 as $tmp_carrilid)
              {
                  if (trim($tmp_carrilid) === trim($cadaselect[1])) { $carrilid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->carrilid) === trim($cadaselect[1])) { $carrilid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($carrilid_look))
          {
              $carrilid_look = $this->carrilid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_carrilid\" class=\"css_carrilid_line\" style=\"" .  $sStyleReadLab_carrilid . "\">" . $this->form_format_readonly("carrilid", $this->form_encode_input($carrilid_look)) . "</span><span id=\"id_read_off_carrilid\" class=\"css_read_off_carrilid" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_carrilid . "\">";
   echo " <span id=\"idAjaxSelect_carrilid\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_carrilid_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_carrilid\" name=\"carrilid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_carrilid'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->carrilid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->carrilid)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_carrilid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_carrilid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['cuerpo']))
   {
       $this->nm_new_label['cuerpo'] = "Cuerpo";
   }
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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cuerpo"]) &&  $this->nmgp_cmp_readonly["cuerpo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cuerpo']);
       $sStyleReadLab_cuerpo = '';
       $sStyleReadInp_cuerpo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cuerpo']) && $this->nmgp_cmp_hidden['cuerpo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cuerpo" value="<?php echo $this->form_encode_input($this->cuerpo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cuerpo_line" id="hidden_field_data_cuerpo" style="<?php echo $sStyleHidden_cuerpo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cuerpo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cuerpo_label" style=""><span id="id_label_cuerpo"><?php echo $this->nm_new_label['cuerpo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['cuerpo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['cuerpo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cuerpo"]) &&  $this->nmgp_cmp_readonly["cuerpo"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_cuerpo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_cuerpo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_cuerpo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_cuerpo'] = array(); 
}
if ($this->carrilid != "")
{ 
   $this->nm_clear_val("carrilid");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_cuerpo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_cuerpo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_cuerpo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_cuerpo'] = array(); 
    }

   $old_value_fechaoperacion = $this->fechaoperacion;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaoperacion = $this->fechaoperacion;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $nm_comando = "SELECT Cuerpo , Cuerpo  FROM carril  where CarrilID = '$this->carrilid' ORDER BY Cuerpo";

   $this->fechaoperacion = $old_value_fechaoperacion;
   $this->horainicio = $old_value_horainicio;
   $this->horafin = $old_value_horafin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_cuerpo'][] = $rs->fields[0];
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
} 
   $x = 0; 
   $cuerpo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->cuerpo_1))
          {
              foreach ($this->cuerpo_1 as $tmp_cuerpo)
              {
                  if (trim($tmp_cuerpo) === trim($cadaselect[1])) { $cuerpo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->cuerpo) === trim($cadaselect[1])) { $cuerpo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="cuerpo" value="<?php echo $this->form_encode_input($cuerpo) . "\"><span id=\"id_ajax_label_cuerpo\">" . $cuerpo_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_cuerpo();
   $x = 0 ; 
   $cuerpo_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->cuerpo_1))
          {
              foreach ($this->cuerpo_1 as $tmp_cuerpo)
              {
                  if (trim($tmp_cuerpo) === trim($cadaselect[1])) { $cuerpo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->cuerpo) === trim($cadaselect[1])) { $cuerpo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($cuerpo_look))
          {
              $cuerpo_look = $this->cuerpo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_cuerpo\" class=\"css_cuerpo_line\" style=\"" .  $sStyleReadLab_cuerpo . "\">" . $this->form_format_readonly("cuerpo", $this->form_encode_input($cuerpo_look)) . "</span><span id=\"id_read_off_cuerpo\" class=\"css_read_off_cuerpo" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_cuerpo . "\">";
   echo " <span id=\"idAjaxSelect_cuerpo\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_cuerpo_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_cuerpo\" name=\"cuerpo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->cuerpo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->cuerpo)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cuerpo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cuerpo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["horainicio"]) &&  $this->nmgp_cmp_readonly["horainicio"] == "on"))
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

    <TD class="scFormDataOdd css_horainicio_line" id="hidden_field_data_horainicio" style="<?php echo $sStyleHidden_horainicio; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_horainicio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_horainicio_label" style=""><span id="id_label_horainicio"><?php echo $this->nm_new_label['horainicio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['horainicio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['horainicio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["horainicio"]) &&  $this->nmgp_cmp_readonly["horainicio"] == "on")) { 

 ?>
<input type="hidden" name="horainicio" value="<?php echo $this->form_encode_input($horainicio) . "\"><span id=\"id_ajax_label_horainicio\">" . $horainicio . "</span>"; ?>
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_horainicio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_horainicio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["horafin"]) &&  $this->nmgp_cmp_readonly["horafin"] == "on"))
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

    <TD class="scFormDataOdd css_horafin_line" id="hidden_field_data_horafin" style="<?php echo $sStyleHidden_horafin; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_horafin_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_horafin_label" style=""><span id="id_label_horafin"><?php echo $this->nm_new_label['horafin']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['horafin']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['php_cmp_required']['horafin'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["horafin"]) &&  $this->nmgp_cmp_readonly["horafin"] == "on")) { 

 ?>
<input type="hidden" name="horafin" value="<?php echo $this->form_encode_input($horafin) . "\"><span id=\"id_ajax_label_horafin\">" . $horafin . "</span>"; ?>
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_horafin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_horafin_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['encargadoturnoid']))
   {
       $this->nm_new_label['encargadoturnoid'] = "Encargado Turno";
   }
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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["encargadoturnoid"]) &&  $this->nmgp_cmp_readonly["encargadoturnoid"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['encargadoturnoid']);
       $sStyleReadLab_encargadoturnoid = '';
       $sStyleReadInp_encargadoturnoid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['encargadoturnoid']) && $this->nmgp_cmp_hidden['encargadoturnoid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="encargadoturnoid" value="<?php echo $this->form_encode_input($this->encargadoturnoid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_encargadoturnoid_line" id="hidden_field_data_encargadoturnoid" style="<?php echo $sStyleHidden_encargadoturnoid; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_encargadoturnoid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_encargadoturnoid_label" style=""><span id="id_label_encargadoturnoid"><?php echo $this->nm_new_label['encargadoturnoid']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["encargadoturnoid"]) &&  $this->nmgp_cmp_readonly["encargadoturnoid"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_encargadoturnoid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_encargadoturnoid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_encargadoturnoid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_encargadoturnoid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_encargadoturnoid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_encargadoturnoid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_encargadoturnoid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_encargadoturnoid'] = array(); 
    }

   $old_value_fechaoperacion = $this->fechaoperacion;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaoperacion = $this->fechaoperacion;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $nm_comando = "SELECT UsuarioID, Concat(Nombre,' ',ApellidoPaterno,'',ApellidoMaterno) FROM usuario  Where UsuarioTipoID = 4 ORDER BY UsuarioID";

   $this->fechaoperacion = $old_value_fechaoperacion;
   $this->horainicio = $old_value_horainicio;
   $this->horafin = $old_value_horafin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['Lookup_encargadoturnoid'][] = $rs->fields[0];
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
   $x = 0; 
   $encargadoturnoid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->encargadoturnoid_1))
          {
              foreach ($this->encargadoturnoid_1 as $tmp_encargadoturnoid)
              {
                  if (trim($tmp_encargadoturnoid) === trim($cadaselect[1])) { $encargadoturnoid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->encargadoturnoid) === trim($cadaselect[1])) { $encargadoturnoid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="encargadoturnoid" value="<?php echo $this->form_encode_input($encargadoturnoid) . "\"><span id=\"id_ajax_label_encargadoturnoid\">" . $encargadoturnoid_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_encargadoturnoid();
   $x = 0 ; 
   $encargadoturnoid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->encargadoturnoid_1))
          {
              foreach ($this->encargadoturnoid_1 as $tmp_encargadoturnoid)
              {
                  if (trim($tmp_encargadoturnoid) === trim($cadaselect[1])) { $encargadoturnoid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->encargadoturnoid) === trim($cadaselect[1])) { $encargadoturnoid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($encargadoturnoid_look))
          {
              $encargadoturnoid_look = $this->encargadoturnoid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_encargadoturnoid\" class=\"css_encargadoturnoid_line\" style=\"" .  $sStyleReadLab_encargadoturnoid . "\">" . $this->form_format_readonly("encargadoturnoid", $this->form_encode_input($encargadoturnoid_look)) . "</span><span id=\"id_read_off_encargadoturnoid\" class=\"css_read_off_encargadoturnoid" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_encargadoturnoid . "\">";
   echo " <span id=\"idAjaxSelect_encargadoturnoid\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_encargadoturnoid_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_encargadoturnoid\" name=\"encargadoturnoid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->encargadoturnoid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->encargadoturnoid)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_encargadoturnoid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_encargadoturnoid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_carrilid_dumb = ('' == $sStyleHidden_carrilid) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_carrilid_dumb" style="<?php echo $sStyleHidden_carrilid_dumb; ?>"></TD>
<?php $sStyleHidden_cuerpo_dumb = ('' == $sStyleHidden_cuerpo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cuerpo_dumb" style="<?php echo $sStyleHidden_cuerpo_dumb; ?>"></TD>
<?php $sStyleHidden_horainicio_dumb = ('' == $sStyleHidden_horainicio) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_horainicio_dumb" style="<?php echo $sStyleHidden_horainicio_dumb; ?>"></TD>
<?php $sStyleHidden_horafin_dumb = ('' == $sStyleHidden_horafin) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_horafin_dumb" style="<?php echo $sStyleHidden_horafin_dumb; ?>"></TD>
<?php $sStyleHidden_encargadoturnoid_dumb = ('' == $sStyleHidden_encargadoturnoid) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_encargadoturnoid_dumb" style="<?php echo $sStyleHidden_encargadoturnoid_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="80%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emergentes']))
    {
        $this->nm_new_label['emergentes'] = "Emergentes";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emergentes = $this->emergentes;
   $sStyleHidden_emergentes = '';
   if (isset($this->nmgp_cmp_hidden['emergentes']) && $this->nmgp_cmp_hidden['emergentes'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emergentes']);
       $sStyleHidden_emergentes = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emergentes = 'display: none;';
   $sStyleReadInp_emergentes = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emergentes']) && $this->nmgp_cmp_readonly['emergentes'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emergentes']);
       $sStyleReadLab_emergentes = '';
       $sStyleReadInp_emergentes = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emergentes']) && $this->nmgp_cmp_hidden['emergentes'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emergentes" value="<?php echo $this->form_encode_input($emergentes) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emergentes_line" id="hidden_field_data_emergentes" style="<?php echo $sStyleHidden_emergentes; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_emergentes_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_emergentes'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_emergentes'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_emergentes'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_liga_qtd_reg'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['embutida_parms'] = "estatusem*scin" . $this->nmgp_dados_form['estatus'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['foreign_key']['id'] = $this->nmgp_dados_form['consecutivo'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['where_filter'] = "id = " . $this->nmgp_dados_form['consecutivo'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['where_detal']  = "id = " . $this->nmgp_dados_form['consecutivo'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_detalleemergentes']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init'] ]['form_emergentes']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_detalleemergentes_empty.htm' : $this->Ini->link_form_emergentes_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=800';
if (isset($this->Ini->sc_lig_target['C_@scinf_emergentes']) && 'nmsc_iframe_liga_form_emergentes' != $this->Ini->sc_lig_target['C_@scinf_emergentes'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_emergentes'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['form_emergentes_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_emergentes'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_emergentes"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="800" width="100%" name="nmsc_iframe_liga_form_emergentes"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emergentes_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emergentes_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="20%" height="">
   <a name="bloco_2"></a>
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cantidadtotal']))
    {
        $this->nm_new_label['cantidadtotal'] = "Total de Eventos <br>";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantidadtotal = $this->cantidadtotal;
   $sStyleHidden_cantidadtotal = '';
   if (isset($this->nmgp_cmp_hidden['cantidadtotal']) && $this->nmgp_cmp_hidden['cantidadtotal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantidadtotal']);
       $sStyleHidden_cantidadtotal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantidadtotal = 'display: none;';
   $sStyleReadInp_cantidadtotal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantidadtotal']) && $this->nmgp_cmp_readonly['cantidadtotal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantidadtotal']);
       $sStyleReadLab_cantidadtotal = '';
       $sStyleReadInp_cantidadtotal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantidadtotal']) && $this->nmgp_cmp_hidden['cantidadtotal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidadtotal" value="<?php echo $this->form_encode_input($cantidadtotal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cantidadtotal_line" id="hidden_field_data_cantidadtotal" style="<?php echo $sStyleHidden_cantidadtotal; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantidadtotal_line" style="padding: 0px"><span class="scFormLabelOddFormat css_cantidadtotal_label" style=""><span id="id_label_cantidadtotal"><?php echo $this->nm_new_label['cantidadtotal']; ?></span></span><br><span id="id_ajax_label_cantidadtotal"><?php echo $cantidadtotal?></span>
<input type="hidden" name="cantidadtotal" value="<?php echo $this->form_encode_input($cantidadtotal); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidadtotal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidadtotal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_detalleemergentes");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_detalleemergentes");
 parent.scAjaxDetailHeight("form_detalleemergentes", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_detalleemergentes", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_detalleemergentes", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['sc_modal'])
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
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_t.sc-unique-btn-1").length && $("#sc_b_ret_t.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_ret_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_t.sc-unique-btn-2").length && $("#sc_b_avc_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_avc_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-3").length && $("#sc_b_new_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-4").length && $("#sc_b_ins_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-6").length && $("#sc_b_del_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_Inserta() {
		if ($("#sc_Inserta_top").length && $("#sc_Inserta_top").is(":visible")) {
		    if ($("#sc_Inserta_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_Inserta()
			 return;
		}
		if ($("#sc_Inserta_top").length && $("#sc_Inserta_top").is(":visible")) {
		    if ($("#sc_Inserta_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_Inserta()
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalleemergentes']['buttonStatus'] = $this->nmgp_botoes;
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
