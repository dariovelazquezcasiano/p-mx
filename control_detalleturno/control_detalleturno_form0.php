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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . ""); } ?></TITLE>
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['embutida_pdf']))
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
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>control_detalleturno/control_detalleturno_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("control_detalleturno_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['last'] : 'off'); ?>";
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
<?php

include_once('control_detalleturno_jquery.php');

?>

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-contr" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
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
 include_once("control_detalleturno_js0.php");
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
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['control_detalleturno'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['control_detalleturno'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
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
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 

<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['sigue'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['sigue']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['sigue']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['sigue']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['sigue']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['sigue'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "sigue", "scBtnFn_sigue()", "scBtnFn_sigue()", "sc_sigue_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['mas'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['mas']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['mas']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['mas']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['mas']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['mas'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "mas", "scBtnFn_mas()", "scBtnFn_mas()", "sc_mas_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="50%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Efectivo Entregado</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['mxn']))
    {
        $this->nm_new_label['mxn'] = "Moneda (MXN)";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mxn = $this->mxn;
   $sStyleHidden_mxn = '';
   if (isset($this->nmgp_cmp_hidden['mxn']) && $this->nmgp_cmp_hidden['mxn'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mxn']);
       $sStyleHidden_mxn = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mxn = 'display: none;';
   $sStyleReadInp_mxn = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mxn']) && $this->nmgp_cmp_readonly['mxn'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mxn']);
       $sStyleReadLab_mxn = '';
       $sStyleReadInp_mxn = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mxn']) && $this->nmgp_cmp_hidden['mxn'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mxn" value="<?php echo $this->form_encode_input($mxn) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_mxn_label" id="hidden_field_label_mxn" style="<?php echo $sStyleHidden_mxn; ?>"><span id="id_label_mxn"><?php echo $this->nm_new_label['mxn']; ?></span></TD>
    <TD class="scFormDataOdd css_mxn_line" id="hidden_field_data_mxn" style="<?php echo $sStyleHidden_mxn; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mxn"]) &&  $this->nmgp_cmp_readonly["mxn"] == "on") { 

 ?>
<input type="hidden" name="mxn" value="<?php echo $this->form_encode_input($mxn) . "\">" . $mxn . ""; ?>
<?php } else { ?>
<span id="id_read_on_mxn" class="sc-ui-readonly-mxn css_mxn_line" style="<?php echo $sStyleReadLab_mxn; ?>"><?php echo $this->form_format_readonly("mxn", $this->form_encode_input($this->mxn)); ?></span><span id="id_read_off_mxn" class="css_read_off_mxn<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_mxn; ?>">
 <input class="sc-js-input scFormObjectOdd css_mxn_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_mxn" type=text name="mxn" value="<?php echo $this->form_encode_input($mxn) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['mxn']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['mxn']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['mxn']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['mxn']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['usd']))
    {
        $this->nm_new_label['usd'] = "Dolares (USD)";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usd = $this->usd;
   $sStyleHidden_usd = '';
   if (isset($this->nmgp_cmp_hidden['usd']) && $this->nmgp_cmp_hidden['usd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usd']);
       $sStyleHidden_usd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usd = 'display: none;';
   $sStyleReadInp_usd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usd']) && $this->nmgp_cmp_readonly['usd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usd']);
       $sStyleReadLab_usd = '';
       $sStyleReadInp_usd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usd']) && $this->nmgp_cmp_hidden['usd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usd" value="<?php echo $this->form_encode_input($usd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_usd_label" id="hidden_field_label_usd" style="<?php echo $sStyleHidden_usd; ?>"><span id="id_label_usd"><?php echo $this->nm_new_label['usd']; ?></span></TD>
    <TD class="scFormDataOdd css_usd_line" id="hidden_field_data_usd" style="<?php echo $sStyleHidden_usd; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usd"]) &&  $this->nmgp_cmp_readonly["usd"] == "on") { 

 ?>
<input type="hidden" name="usd" value="<?php echo $this->form_encode_input($usd) . "\">" . $usd . ""; ?>
<?php } else { ?>
<span id="id_read_on_usd" class="sc-ui-readonly-usd css_usd_line" style="<?php echo $sStyleReadLab_usd; ?>"><?php echo $this->form_format_readonly("usd", $this->form_encode_input($this->usd)); ?></span><span id="id_read_off_usd" class="css_read_off_usd<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_usd; ?>">
 <input class="sc-js-input scFormObjectOdd css_usd_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_usd" type=text name="usd" value="<?php echo $this->form_encode_input($usd) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['usd']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['usd']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['usd']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['usd']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="50%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Boletos Cancelados</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cantidadmxn']))
    {
        $this->nm_new_label['cantidadmxn'] = "Cantidad Folios GE MXN";
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
    <TD class="scFormDataOdd css_cantidadmxn_line" id="hidden_field_data_cantidadmxn" style="<?php echo $sStyleHidden_cantidadmxn; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidadmxn"]) &&  $this->nmgp_cmp_readonly["cantidadmxn"] == "on") { 

 ?>
<input type="hidden" name="cantidadmxn" value="<?php echo $this->form_encode_input($cantidadmxn) . "\">" . $cantidadmxn . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidadmxn" class="sc-ui-readonly-cantidadmxn css_cantidadmxn_line" style="<?php echo $sStyleReadLab_cantidadmxn; ?>"><?php echo $this->form_format_readonly("cantidadmxn", $this->form_encode_input($this->cantidadmxn)); ?></span><span id="id_read_off_cantidadmxn" class="css_read_off_cantidadmxn<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidadmxn; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidadmxn_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidadmxn" type=text name="cantidadmxn" value="<?php echo $this->form_encode_input($cantidadmxn) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidadmxn']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidadmxn']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidadmxn']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cantidadusd']))
    {
        $this->nm_new_label['cantidadusd'] = "Cantidad Folios GE USD";
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
    <TD class="scFormDataOdd css_cantidadusd_line" id="hidden_field_data_cantidadusd" style="<?php echo $sStyleHidden_cantidadusd; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidadusd"]) &&  $this->nmgp_cmp_readonly["cantidadusd"] == "on") { 

 ?>
<input type="hidden" name="cantidadusd" value="<?php echo $this->form_encode_input($cantidadusd) . "\">" . $cantidadusd . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidadusd" class="sc-ui-readonly-cantidadusd css_cantidadusd_line" style="<?php echo $sStyleReadLab_cantidadusd; ?>"><?php echo $this->form_format_readonly("cantidadusd", $this->form_encode_input($this->cantidadusd)); ?></span><span id="id_read_off_cantidadusd" class="css_read_off_cantidadusd<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidadusd; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidadusd_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidadusd" type=text name="cantidadusd" value="<?php echo $this->form_encode_input($cantidadusd) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidadusd']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidadusd']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidadusd']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
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
        $this->nm_new_label['importemxn'] = "Importe GE MXN";
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
    <TD class="scFormDataOdd css_importemxn_line" id="hidden_field_data_importemxn" style="<?php echo $sStyleHidden_importemxn; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importemxn"]) &&  $this->nmgp_cmp_readonly["importemxn"] == "on") { 

 ?>
<input type="hidden" name="importemxn" value="<?php echo $this->form_encode_input($importemxn) . "\">" . $importemxn . ""; ?>
<?php } else { ?>
<span id="id_read_on_importemxn" class="sc-ui-readonly-importemxn css_importemxn_line" style="<?php echo $sStyleReadLab_importemxn; ?>"><?php echo $this->form_format_readonly("importemxn", $this->form_encode_input($this->importemxn)); ?></span><span id="id_read_off_importemxn" class="css_read_off_importemxn<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importemxn; ?>">
 <input class="sc-js-input scFormObjectOdd css_importemxn_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importemxn" type=text name="importemxn" value="<?php echo $this->form_encode_input($importemxn) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importemxn']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importemxn']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importemxn']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importemxn']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['importeusd']))
    {
        $this->nm_new_label['importeusd'] = "Importe GE USD";
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
    <TD class="scFormDataOdd css_importeusd_line" id="hidden_field_data_importeusd" style="<?php echo $sStyleHidden_importeusd; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeusd"]) &&  $this->nmgp_cmp_readonly["importeusd"] == "on") { 

 ?>
<input type="hidden" name="importeusd" value="<?php echo $this->form_encode_input($importeusd) . "\">" . $importeusd . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeusd" class="sc-ui-readonly-importeusd css_importeusd_line" style="<?php echo $sStyleReadLab_importeusd; ?>"><?php echo $this->form_format_readonly("importeusd", $this->form_encode_input($this->importeusd)); ?></span><span id="id_read_off_importeusd" class="css_read_off_importeusd<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeusd; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeusd_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeusd" type=text name="importeusd" value="<?php echo $this->form_encode_input($importeusd) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeusd']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeusd']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeusd']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeusd']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Folios de Rollos Utilizados</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
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
    <TD class="scFormDataOdd css_folioinicialcr_line" id="hidden_field_data_folioinicialcr" style="<?php echo $sStyleHidden_folioinicialcr; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["folioinicialcr"]) &&  $this->nmgp_cmp_readonly["folioinicialcr"] == "on") { 

 ?>
<input type="hidden" name="folioinicialcr" value="<?php echo $this->form_encode_input($folioinicialcr) . "\">" . $folioinicialcr . ""; ?>
<?php } else { ?>
<span id="id_read_on_folioinicialcr" class="sc-ui-readonly-folioinicialcr css_folioinicialcr_line" style="<?php echo $sStyleReadLab_folioinicialcr; ?>"><?php echo $this->form_format_readonly("folioinicialcr", $this->form_encode_input($this->folioinicialcr)); ?></span><span id="id_read_off_folioinicialcr" class="css_read_off_folioinicialcr<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_folioinicialcr; ?>">
 <input class="sc-js-input scFormObjectOdd css_folioinicialcr_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_folioinicialcr" type=text name="folioinicialcr" value="<?php echo $this->form_encode_input($folioinicialcr) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['folioinicialcr']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['folioinicialcr']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['folioinicialcr']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

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
    <TD class="scFormDataOdd css_foliofinalcr_line" id="hidden_field_data_foliofinalcr" style="<?php echo $sStyleHidden_foliofinalcr; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foliofinalcr"]) &&  $this->nmgp_cmp_readonly["foliofinalcr"] == "on") { 

 ?>
<input type="hidden" name="foliofinalcr" value="<?php echo $this->form_encode_input($foliofinalcr) . "\">" . $foliofinalcr . ""; ?>
<?php } else { ?>
<span id="id_read_on_foliofinalcr" class="sc-ui-readonly-foliofinalcr css_foliofinalcr_line" style="<?php echo $sStyleReadLab_foliofinalcr; ?>"><?php echo $this->form_format_readonly("foliofinalcr", $this->form_encode_input($this->foliofinalcr)); ?></span><span id="id_read_off_foliofinalcr" class="css_read_off_foliofinalcr<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foliofinalcr; ?>">
 <input class="sc-js-input scFormObjectOdd css_foliofinalcr_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_foliofinalcr" type=text name="foliofinalcr" value="<?php echo $this->form_encode_input($foliofinalcr) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['foliofinalcr']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['foliofinalcr']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['foliofinalcr']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
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
        $this->nm_new_label['folioinicialeap'] = "Secuencial inicial";
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
    <TD class="scFormDataOdd css_folioinicialeap_line" id="hidden_field_data_folioinicialeap" style="<?php echo $sStyleHidden_folioinicialeap; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["folioinicialeap"]) &&  $this->nmgp_cmp_readonly["folioinicialeap"] == "on") { 

 ?>
<input type="hidden" name="folioinicialeap" value="<?php echo $this->form_encode_input($folioinicialeap) . "\">" . $folioinicialeap . ""; ?>
<?php } else { ?>
<span id="id_read_on_folioinicialeap" class="sc-ui-readonly-folioinicialeap css_folioinicialeap_line" style="<?php echo $sStyleReadLab_folioinicialeap; ?>"><?php echo $this->form_format_readonly("folioinicialeap", $this->form_encode_input($this->folioinicialeap)); ?></span><span id="id_read_off_folioinicialeap" class="css_read_off_folioinicialeap<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_folioinicialeap; ?>">
 <input class="sc-js-input scFormObjectOdd css_folioinicialeap_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_folioinicialeap" type=text name="folioinicialeap" value="<?php echo $this->form_encode_input($folioinicialeap) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['folioinicialeap']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['folioinicialeap']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['folioinicialeap']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['foliofinaleap']))
    {
        $this->nm_new_label['foliofinaleap'] = "Secuencial Final";
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
    <TD class="scFormDataOdd css_foliofinaleap_line" id="hidden_field_data_foliofinaleap" style="<?php echo $sStyleHidden_foliofinaleap; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foliofinaleap"]) &&  $this->nmgp_cmp_readonly["foliofinaleap"] == "on") { 

 ?>
<input type="hidden" name="foliofinaleap" value="<?php echo $this->form_encode_input($foliofinaleap) . "\">" . $foliofinaleap . ""; ?>
<?php } else { ?>
<span id="id_read_on_foliofinaleap" class="sc-ui-readonly-foliofinaleap css_foliofinaleap_line" style="<?php echo $sStyleReadLab_foliofinaleap; ?>"><?php echo $this->form_format_readonly("foliofinaleap", $this->form_encode_input($this->foliofinaleap)); ?></span><span id="id_read_off_foliofinaleap" class="css_read_off_foliofinaleap<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foliofinaleap; ?>">
 <input class="sc-js-input scFormObjectOdd css_foliofinaleap_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_foliofinaleap" type=text name="foliofinaleap" value="<?php echo $this->form_encode_input($foliofinaleap) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['foliofinaleap']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['foliofinaleap']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['foliofinaleap']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Captura de Folios</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['folioinir1']))
    {
        $this->nm_new_label['folioinir1'] = "Rollo 1: Folio Inicial";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $folioinir1 = $this->folioinir1;
   $sStyleHidden_folioinir1 = '';
   if (isset($this->nmgp_cmp_hidden['folioinir1']) && $this->nmgp_cmp_hidden['folioinir1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['folioinir1']);
       $sStyleHidden_folioinir1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_folioinir1 = 'display: none;';
   $sStyleReadInp_folioinir1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['folioinir1']) && $this->nmgp_cmp_readonly['folioinir1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['folioinir1']);
       $sStyleReadLab_folioinir1 = '';
       $sStyleReadInp_folioinir1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['folioinir1']) && $this->nmgp_cmp_hidden['folioinir1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="folioinir1" value="<?php echo $this->form_encode_input($folioinir1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_folioinir1_label" id="hidden_field_label_folioinir1" style="<?php echo $sStyleHidden_folioinir1; ?>"><span id="id_label_folioinir1"><?php echo $this->nm_new_label['folioinir1']; ?></span></TD>
    <TD class="scFormDataOdd css_folioinir1_line" id="hidden_field_data_folioinir1" style="<?php echo $sStyleHidden_folioinir1; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["folioinir1"]) &&  $this->nmgp_cmp_readonly["folioinir1"] == "on") { 

 ?>
<input type="hidden" name="folioinir1" value="<?php echo $this->form_encode_input($folioinir1) . "\">" . $folioinir1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_folioinir1" class="sc-ui-readonly-folioinir1 css_folioinir1_line" style="<?php echo $sStyleReadLab_folioinir1; ?>"><?php echo $this->form_format_readonly("folioinir1", $this->form_encode_input($this->folioinir1)); ?></span><span id="id_read_off_folioinir1" class="css_read_off_folioinir1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_folioinir1; ?>">
 <input class="sc-js-input scFormObjectOdd css_folioinir1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_folioinir1" type=text name="folioinir1" value="<?php echo $this->form_encode_input($folioinir1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['folioinir1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['folioinir1']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['folioinir1']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['foliofinr1']))
    {
        $this->nm_new_label['foliofinr1'] = "Rollo 1: Folio Final";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foliofinr1 = $this->foliofinr1;
   $sStyleHidden_foliofinr1 = '';
   if (isset($this->nmgp_cmp_hidden['foliofinr1']) && $this->nmgp_cmp_hidden['foliofinr1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foliofinr1']);
       $sStyleHidden_foliofinr1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foliofinr1 = 'display: none;';
   $sStyleReadInp_foliofinr1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foliofinr1']) && $this->nmgp_cmp_readonly['foliofinr1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foliofinr1']);
       $sStyleReadLab_foliofinr1 = '';
       $sStyleReadInp_foliofinr1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foliofinr1']) && $this->nmgp_cmp_hidden['foliofinr1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foliofinr1" value="<?php echo $this->form_encode_input($foliofinr1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_foliofinr1_label" id="hidden_field_label_foliofinr1" style="<?php echo $sStyleHidden_foliofinr1; ?>"><span id="id_label_foliofinr1"><?php echo $this->nm_new_label['foliofinr1']; ?></span></TD>
    <TD class="scFormDataOdd css_foliofinr1_line" id="hidden_field_data_foliofinr1" style="<?php echo $sStyleHidden_foliofinr1; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foliofinr1"]) &&  $this->nmgp_cmp_readonly["foliofinr1"] == "on") { 

 ?>
<input type="hidden" name="foliofinr1" value="<?php echo $this->form_encode_input($foliofinr1) . "\">" . $foliofinr1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_foliofinr1" class="sc-ui-readonly-foliofinr1 css_foliofinr1_line" style="<?php echo $sStyleReadLab_foliofinr1; ?>"><?php echo $this->form_format_readonly("foliofinr1", $this->form_encode_input($this->foliofinr1)); ?></span><span id="id_read_off_foliofinr1" class="css_read_off_foliofinr1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foliofinr1; ?>">
 <input class="sc-js-input scFormObjectOdd css_foliofinr1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_foliofinr1" type=text name="foliofinr1" value="<?php echo $this->form_encode_input($foliofinr1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['foliofinr1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['foliofinr1']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['foliofinr1']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['folioinir2']))
    {
        $this->nm_new_label['folioinir2'] = "Rollo 2: Folio Inicial";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $folioinir2 = $this->folioinir2;
   $sStyleHidden_folioinir2 = '';
   if (isset($this->nmgp_cmp_hidden['folioinir2']) && $this->nmgp_cmp_hidden['folioinir2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['folioinir2']);
       $sStyleHidden_folioinir2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_folioinir2 = 'display: none;';
   $sStyleReadInp_folioinir2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['folioinir2']) && $this->nmgp_cmp_readonly['folioinir2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['folioinir2']);
       $sStyleReadLab_folioinir2 = '';
       $sStyleReadInp_folioinir2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['folioinir2']) && $this->nmgp_cmp_hidden['folioinir2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="folioinir2" value="<?php echo $this->form_encode_input($folioinir2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_folioinir2_label" id="hidden_field_label_folioinir2" style="<?php echo $sStyleHidden_folioinir2; ?>"><span id="id_label_folioinir2"><?php echo $this->nm_new_label['folioinir2']; ?></span></TD>
    <TD class="scFormDataOdd css_folioinir2_line" id="hidden_field_data_folioinir2" style="<?php echo $sStyleHidden_folioinir2; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["folioinir2"]) &&  $this->nmgp_cmp_readonly["folioinir2"] == "on") { 

 ?>
<input type="hidden" name="folioinir2" value="<?php echo $this->form_encode_input($folioinir2) . "\">" . $folioinir2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_folioinir2" class="sc-ui-readonly-folioinir2 css_folioinir2_line" style="<?php echo $sStyleReadLab_folioinir2; ?>"><?php echo $this->form_format_readonly("folioinir2", $this->form_encode_input($this->folioinir2)); ?></span><span id="id_read_off_folioinir2" class="css_read_off_folioinir2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_folioinir2; ?>">
 <input class="sc-js-input scFormObjectOdd css_folioinir2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_folioinir2" type=text name="folioinir2" value="<?php echo $this->form_encode_input($folioinir2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['folioinir2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['folioinir2']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['folioinir2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['foliofinr2']))
    {
        $this->nm_new_label['foliofinr2'] = "Rollo 2: Folio Final";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foliofinr2 = $this->foliofinr2;
   $sStyleHidden_foliofinr2 = '';
   if (isset($this->nmgp_cmp_hidden['foliofinr2']) && $this->nmgp_cmp_hidden['foliofinr2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foliofinr2']);
       $sStyleHidden_foliofinr2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foliofinr2 = 'display: none;';
   $sStyleReadInp_foliofinr2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foliofinr2']) && $this->nmgp_cmp_readonly['foliofinr2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foliofinr2']);
       $sStyleReadLab_foliofinr2 = '';
       $sStyleReadInp_foliofinr2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foliofinr2']) && $this->nmgp_cmp_hidden['foliofinr2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foliofinr2" value="<?php echo $this->form_encode_input($foliofinr2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_foliofinr2_label" id="hidden_field_label_foliofinr2" style="<?php echo $sStyleHidden_foliofinr2; ?>"><span id="id_label_foliofinr2"><?php echo $this->nm_new_label['foliofinr2']; ?></span></TD>
    <TD class="scFormDataOdd css_foliofinr2_line" id="hidden_field_data_foliofinr2" style="<?php echo $sStyleHidden_foliofinr2; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foliofinr2"]) &&  $this->nmgp_cmp_readonly["foliofinr2"] == "on") { 

 ?>
<input type="hidden" name="foliofinr2" value="<?php echo $this->form_encode_input($foliofinr2) . "\">" . $foliofinr2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_foliofinr2" class="sc-ui-readonly-foliofinr2 css_foliofinr2_line" style="<?php echo $sStyleReadLab_foliofinr2; ?>"><?php echo $this->form_format_readonly("foliofinr2", $this->form_encode_input($this->foliofinr2)); ?></span><span id="id_read_off_foliofinr2" class="css_read_off_foliofinr2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foliofinr2; ?>">
 <input class="sc-js-input scFormObjectOdd css_foliofinr2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_foliofinr2" type=text name="foliofinr2" value="<?php echo $this->form_encode_input($foliofinr2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['foliofinr2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['foliofinr2']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['foliofinr2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['folioinir3']))
    {
        $this->nm_new_label['folioinir3'] = "Rollo 3: Folio Inicial";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $folioinir3 = $this->folioinir3;
   $sStyleHidden_folioinir3 = '';
   if (isset($this->nmgp_cmp_hidden['folioinir3']) && $this->nmgp_cmp_hidden['folioinir3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['folioinir3']);
       $sStyleHidden_folioinir3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_folioinir3 = 'display: none;';
   $sStyleReadInp_folioinir3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['folioinir3']) && $this->nmgp_cmp_readonly['folioinir3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['folioinir3']);
       $sStyleReadLab_folioinir3 = '';
       $sStyleReadInp_folioinir3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['folioinir3']) && $this->nmgp_cmp_hidden['folioinir3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="folioinir3" value="<?php echo $this->form_encode_input($folioinir3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_folioinir3_label" id="hidden_field_label_folioinir3" style="<?php echo $sStyleHidden_folioinir3; ?>"><span id="id_label_folioinir3"><?php echo $this->nm_new_label['folioinir3']; ?></span></TD>
    <TD class="scFormDataOdd css_folioinir3_line" id="hidden_field_data_folioinir3" style="<?php echo $sStyleHidden_folioinir3; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["folioinir3"]) &&  $this->nmgp_cmp_readonly["folioinir3"] == "on") { 

 ?>
<input type="hidden" name="folioinir3" value="<?php echo $this->form_encode_input($folioinir3) . "\">" . $folioinir3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_folioinir3" class="sc-ui-readonly-folioinir3 css_folioinir3_line" style="<?php echo $sStyleReadLab_folioinir3; ?>"><?php echo $this->form_format_readonly("folioinir3", $this->form_encode_input($this->folioinir3)); ?></span><span id="id_read_off_folioinir3" class="css_read_off_folioinir3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_folioinir3; ?>">
 <input class="sc-js-input scFormObjectOdd css_folioinir3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_folioinir3" type=text name="folioinir3" value="<?php echo $this->form_encode_input($folioinir3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['folioinir3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['folioinir3']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['folioinir3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['foliofinr3']))
    {
        $this->nm_new_label['foliofinr3'] = "Rollo 3: Folio Final";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foliofinr3 = $this->foliofinr3;
   $sStyleHidden_foliofinr3 = '';
   if (isset($this->nmgp_cmp_hidden['foliofinr3']) && $this->nmgp_cmp_hidden['foliofinr3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foliofinr3']);
       $sStyleHidden_foliofinr3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foliofinr3 = 'display: none;';
   $sStyleReadInp_foliofinr3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foliofinr3']) && $this->nmgp_cmp_readonly['foliofinr3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foliofinr3']);
       $sStyleReadLab_foliofinr3 = '';
       $sStyleReadInp_foliofinr3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foliofinr3']) && $this->nmgp_cmp_hidden['foliofinr3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foliofinr3" value="<?php echo $this->form_encode_input($foliofinr3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_foliofinr3_label" id="hidden_field_label_foliofinr3" style="<?php echo $sStyleHidden_foliofinr3; ?>"><span id="id_label_foliofinr3"><?php echo $this->nm_new_label['foliofinr3']; ?></span></TD>
    <TD class="scFormDataOdd css_foliofinr3_line" id="hidden_field_data_foliofinr3" style="<?php echo $sStyleHidden_foliofinr3; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foliofinr3"]) &&  $this->nmgp_cmp_readonly["foliofinr3"] == "on") { 

 ?>
<input type="hidden" name="foliofinr3" value="<?php echo $this->form_encode_input($foliofinr3) . "\">" . $foliofinr3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_foliofinr3" class="sc-ui-readonly-foliofinr3 css_foliofinr3_line" style="<?php echo $sStyleReadLab_foliofinr3; ?>"><?php echo $this->form_format_readonly("foliofinr3", $this->form_encode_input($this->foliofinr3)); ?></span><span id="id_read_off_foliofinr3" class="css_read_off_foliofinr3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foliofinr3; ?>">
 <input class="sc-js-input scFormObjectOdd css_foliofinr3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_foliofinr3" type=text name="foliofinr3" value="<?php echo $this->form_encode_input($foliofinr3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['foliofinr3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['foliofinr3']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['foliofinr3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
$this->displayBottomToolbar();
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['ok']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['ok']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['ok']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['ok']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['ok'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bok", "scBtnFn_sys_format_ok()", "scBtnFn_sys_format_ok()", "sub_form_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
?>
       
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("control_detalleturno");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("control_detalleturno");
 parent.scAjaxDetailHeight("control_detalleturno", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("control_detalleturno", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("control_detalleturno", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['sc_modal'])
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
	function scBtnFn_sigue() {
		if ($("#sc_sigue_top").length && $("#sc_sigue_top").is(":visible")) {
		    if ($("#sc_sigue_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_sigue()
			 return;
		}
	}
	function scBtnFn_mas() {
		if ($("#sc_mas_top").length && $("#sc_mas_top").is(":visible")) {
		    if ($("#sc_mas_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_mas()
			 return;
		}
	}
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-1").length && $("#sub_form_b.sc-unique-btn-1").is(":visible")) {
		    if ($("#sub_form_b.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
		    if ($("#sc_b_hlp_b").hasClass("disabled")) {
		        return;
		    }
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#Bsair_b.sc-unique-btn-2").length && $("#Bsair_b.sc-unique-btn-2").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-3").length && $("#Bsair_b.sc-unique-btn-3").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['control_detalleturno']['buttonStatus'] = $this->nmgp_botoes;
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
