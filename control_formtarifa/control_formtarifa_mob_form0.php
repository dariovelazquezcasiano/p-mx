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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>control_formtarifa/control_formtarifa_mob_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("control_formtarifa_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('control_formtarifa_mob_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-contr" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['control_formtarifa']['error_buffer']) && '' != $_SESSION['scriptcase']['control_formtarifa']['error_buffer'])
{
    echo $_SESSION['scriptcase']['control_formtarifa']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("control_formtarifa_mob_js0.php");
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
               action="control_formtarifa_mob.php" 
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
$_SESSION['scriptcase']['error_span_title']['control_formtarifa_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['control_formtarifa_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['a']))
           {
               $this->nmgp_cmp_readonly['a'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['a']))
    {
        $this->nm_new_label['a'] = "A";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $a = $this->a;
   $sStyleHidden_a = '';
   if (isset($this->nmgp_cmp_hidden['a']) && $this->nmgp_cmp_hidden['a'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['a']);
       $sStyleHidden_a = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_a = 'display: none;';
   $sStyleReadInp_a = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["a"]) &&  $this->nmgp_cmp_readonly["a"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['a']);
       $sStyleReadLab_a = '';
       $sStyleReadInp_a = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['a']) && $this->nmgp_cmp_hidden['a'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="a" value="<?php echo $this->form_encode_input($a) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_a_line" id="hidden_field_data_a" style="<?php echo $sStyleHidden_a; ?>"> <span class="scFormLabelOddFormat css_a_label" style=""><span id="id_label_a"><?php echo $this->nm_new_label['a']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["a"]) &&  $this->nmgp_cmp_readonly["a"] == "on")) { 

 ?>
<input type="hidden" name="a" value="<?php echo $this->form_encode_input($a) . "\"><span id=\"id_ajax_label_a\">" . $a . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_a" class="sc-ui-readonly-a css_a_line" style="<?php echo $sStyleReadLab_a; ?>"><?php echo $this->form_format_readonly("a", $this->form_encode_input($this->a)); ?></span><span id="id_read_off_a" class="css_read_off_a<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_a; ?>">
 <input class="sc-js-input scFormObjectOdd css_a_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_a" type=text name="a" value="<?php echo $this->form_encode_input($a) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importea']))
    {
        $this->nm_new_label['importea'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importea = $this->importea;
   $sStyleHidden_importea = '';
   if (isset($this->nmgp_cmp_hidden['importea']) && $this->nmgp_cmp_hidden['importea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importea']);
       $sStyleHidden_importea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importea = 'display: none;';
   $sStyleReadInp_importea = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importea']) && $this->nmgp_cmp_readonly['importea'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importea']);
       $sStyleReadLab_importea = '';
       $sStyleReadInp_importea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importea']) && $this->nmgp_cmp_hidden['importea'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importea" value="<?php echo $this->form_encode_input($importea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importea_line" id="hidden_field_data_importea" style="<?php echo $sStyleHidden_importea; ?>"> <span class="scFormLabelOddFormat css_importea_label" style=""><span id="id_label_importea"><?php echo $this->nm_new_label['importea']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importea']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importea'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importea"]) &&  $this->nmgp_cmp_readonly["importea"] == "on") { 

 ?>
<input type="hidden" name="importea" value="<?php echo $this->form_encode_input($importea) . "\">" . $importea . ""; ?>
<?php } else { ?>
<span id="id_read_on_importea" class="sc-ui-readonly-importea css_importea_line" style="<?php echo $sStyleReadLab_importea; ?>"><?php echo $this->form_format_readonly("importea", $this->form_encode_input($this->importea)); ?></span><span id="id_read_off_importea" class="css_read_off_importea<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importea; ?>">
 <input class="sc-js-input scFormObjectOdd css_importea_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importea" type=text name="importea" value="<?php echo $this->form_encode_input($importea) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importea']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importea']['format_pos'] || 3 == $this->field_config['importea']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importea']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importea']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importea']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importea']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeela']))
    {
        $this->nm_new_label['importeela'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeela = $this->importeela;
   $sStyleHidden_importeela = '';
   if (isset($this->nmgp_cmp_hidden['importeela']) && $this->nmgp_cmp_hidden['importeela'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeela']);
       $sStyleHidden_importeela = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeela = 'display: none;';
   $sStyleReadInp_importeela = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeela']) && $this->nmgp_cmp_readonly['importeela'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeela']);
       $sStyleReadLab_importeela = '';
       $sStyleReadInp_importeela = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeela']) && $this->nmgp_cmp_hidden['importeela'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeela" value="<?php echo $this->form_encode_input($importeela) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeela_line" id="hidden_field_data_importeela" style="<?php echo $sStyleHidden_importeela; ?>"> <span class="scFormLabelOddFormat css_importeela_label" style=""><span id="id_label_importeela"><?php echo $this->nm_new_label['importeela']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeela']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeela'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeela"]) &&  $this->nmgp_cmp_readonly["importeela"] == "on") { 

 ?>
<input type="hidden" name="importeela" value="<?php echo $this->form_encode_input($importeela) . "\">" . $importeela . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeela" class="sc-ui-readonly-importeela css_importeela_line" style="<?php echo $sStyleReadLab_importeela; ?>"><?php echo $this->form_format_readonly("importeela", $this->form_encode_input($this->importeela)); ?></span><span id="id_read_off_importeela" class="css_read_off_importeela<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeela; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeela_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeela" type=text name="importeela" value="<?php echo $this->form_encode_input($importeela) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeela']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeela']['format_pos'] || 3 == $this->field_config['importeela']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeela']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeela']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeela']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeela']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepa']))
    {
        $this->nm_new_label['importeepa'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepa = $this->importeepa;
   $sStyleHidden_importeepa = '';
   if (isset($this->nmgp_cmp_hidden['importeepa']) && $this->nmgp_cmp_hidden['importeepa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepa']);
       $sStyleHidden_importeepa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepa = 'display: none;';
   $sStyleReadInp_importeepa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepa']) && $this->nmgp_cmp_readonly['importeepa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepa']);
       $sStyleReadLab_importeepa = '';
       $sStyleReadInp_importeepa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepa']) && $this->nmgp_cmp_hidden['importeepa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepa" value="<?php echo $this->form_encode_input($importeepa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepa_line" id="hidden_field_data_importeepa" style="<?php echo $sStyleHidden_importeepa; ?>"> <span class="scFormLabelOddFormat css_importeepa_label" style=""><span id="id_label_importeepa"><?php echo $this->nm_new_label['importeepa']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepa'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepa"]) &&  $this->nmgp_cmp_readonly["importeepa"] == "on") { 

 ?>
<input type="hidden" name="importeepa" value="<?php echo $this->form_encode_input($importeepa) . "\">" . $importeepa . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepa" class="sc-ui-readonly-importeepa css_importeepa_line" style="<?php echo $sStyleReadLab_importeepa; ?>"><?php echo $this->form_format_readonly("importeepa", $this->form_encode_input($this->importeepa)); ?></span><span id="id_read_off_importeepa" class="css_read_off_importeepa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepa; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepa" type=text name="importeepa" value="<?php echo $this->form_encode_input($importeepa) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepa']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepa']['format_pos'] || 3 == $this->field_config['importeepa']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepa']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepa']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepa']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepa']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['m']))
           {
               $this->nmgp_cmp_readonly['m'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusa']))
    {
        $this->nm_new_label['estatusa'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusa = $this->estatusa;
   $sStyleHidden_estatusa = '';
   if (isset($this->nmgp_cmp_hidden['estatusa']) && $this->nmgp_cmp_hidden['estatusa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusa']);
       $sStyleHidden_estatusa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusa = 'display: none;';
   $sStyleReadInp_estatusa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusa']) && $this->nmgp_cmp_readonly['estatusa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusa']);
       $sStyleReadLab_estatusa = '';
       $sStyleReadInp_estatusa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusa']) && $this->nmgp_cmp_hidden['estatusa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusa" value="<?php echo $this->form_encode_input($estatusa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusa_line" id="hidden_field_data_estatusa" style="<?php echo $sStyleHidden_estatusa; ?>"> <span class="scFormLabelOddFormat css_estatusa_label" style=""><span id="id_label_estatusa"><?php echo $this->nm_new_label['estatusa']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusa'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusa"]) &&  $this->nmgp_cmp_readonly["estatusa"] == "on") { 

 if ("1" == $this->estatusa) { $estatusa_look = "Activo";} 
 if ("0" == $this->estatusa) { $estatusa_look = "Inactivo";} 
?>
<input type="hidden" name="estatusa" value="<?php echo $this->form_encode_input($estatusa) . "\">" . $estatusa_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusa) { $estatusa_look = "Activo";} 
 if ("0" == $this->estatusa) { $estatusa_look = "Inactivo";} 
?>
<span id="id_read_on_estatusa"  class="css_estatusa_line" style="<?php echo $sStyleReadLab_estatusa; ?>"><?php echo $this->form_format_readonly("estatusa", $this->form_encode_input($estatusa_look)); ?></span><span id="id_read_off_estatusa" class="css_read_off_estatusa css_estatusa_line" style="<?php echo $sStyleReadInp_estatusa; ?>"><div id="idAjaxRadio_estatusa" style="display: inline-block"  class="css_estatusa_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusa_line"><?php $tempOptionId = "id-opt-estatusa" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusa sc-ui-radio-estatusa" type=radio name="estatusa" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusa'][] = '1'; ?>
<?php  if ("1" == $this->estatusa)  { echo " checked" ;} ?><?php  if (empty($this->estatusa)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusa_line"><?php $tempOptionId = "id-opt-estatusa" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusa sc-ui-radio-estatusa" type=radio name="estatusa" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusa'][] = '0'; ?>
<?php  if ("0" == $this->estatusa)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['m']))
    {
        $this->nm_new_label['m'] = "M";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $m = $this->m;
   $sStyleHidden_m = '';
   if (isset($this->nmgp_cmp_hidden['m']) && $this->nmgp_cmp_hidden['m'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['m']);
       $sStyleHidden_m = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_m = 'display: none;';
   $sStyleReadInp_m = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["m"]) &&  $this->nmgp_cmp_readonly["m"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['m']);
       $sStyleReadLab_m = '';
       $sStyleReadInp_m = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['m']) && $this->nmgp_cmp_hidden['m'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="m" value="<?php echo $this->form_encode_input($m) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_m_line" id="hidden_field_data_m" style="<?php echo $sStyleHidden_m; ?>"> <span class="scFormLabelOddFormat css_m_label" style=""><span id="id_label_m"><?php echo $this->nm_new_label['m']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["m"]) &&  $this->nmgp_cmp_readonly["m"] == "on")) { 

 ?>
<input type="hidden" name="m" value="<?php echo $this->form_encode_input($m) . "\"><span id=\"id_ajax_label_m\">" . $m . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_m" class="sc-ui-readonly-m css_m_line" style="<?php echo $sStyleReadLab_m; ?>"><?php echo $this->form_format_readonly("m", $this->form_encode_input($this->m)); ?></span><span id="id_read_off_m" class="css_read_off_m<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_m; ?>">
 <input class="sc-js-input scFormObjectOdd css_m_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_m" type=text name="m" value="<?php echo $this->form_encode_input($m) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importem']))
    {
        $this->nm_new_label['importem'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importem = $this->importem;
   $sStyleHidden_importem = '';
   if (isset($this->nmgp_cmp_hidden['importem']) && $this->nmgp_cmp_hidden['importem'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importem']);
       $sStyleHidden_importem = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importem = 'display: none;';
   $sStyleReadInp_importem = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importem']) && $this->nmgp_cmp_readonly['importem'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importem']);
       $sStyleReadLab_importem = '';
       $sStyleReadInp_importem = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importem']) && $this->nmgp_cmp_hidden['importem'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importem" value="<?php echo $this->form_encode_input($importem) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importem_line" id="hidden_field_data_importem" style="<?php echo $sStyleHidden_importem; ?>"> <span class="scFormLabelOddFormat css_importem_label" style=""><span id="id_label_importem"><?php echo $this->nm_new_label['importem']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importem']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importem'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importem"]) &&  $this->nmgp_cmp_readonly["importem"] == "on") { 

 ?>
<input type="hidden" name="importem" value="<?php echo $this->form_encode_input($importem) . "\">" . $importem . ""; ?>
<?php } else { ?>
<span id="id_read_on_importem" class="sc-ui-readonly-importem css_importem_line" style="<?php echo $sStyleReadLab_importem; ?>"><?php echo $this->form_format_readonly("importem", $this->form_encode_input($this->importem)); ?></span><span id="id_read_off_importem" class="css_read_off_importem<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importem; ?>">
 <input class="sc-js-input scFormObjectOdd css_importem_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importem" type=text name="importem" value="<?php echo $this->form_encode_input($importem) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importem']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importem']['format_pos'] || 3 == $this->field_config['importem']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importem']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importem']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importem']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importem']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelm']))
    {
        $this->nm_new_label['importeelm'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelm = $this->importeelm;
   $sStyleHidden_importeelm = '';
   if (isset($this->nmgp_cmp_hidden['importeelm']) && $this->nmgp_cmp_hidden['importeelm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelm']);
       $sStyleHidden_importeelm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelm = 'display: none;';
   $sStyleReadInp_importeelm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelm']) && $this->nmgp_cmp_readonly['importeelm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelm']);
       $sStyleReadLab_importeelm = '';
       $sStyleReadInp_importeelm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelm']) && $this->nmgp_cmp_hidden['importeelm'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelm" value="<?php echo $this->form_encode_input($importeelm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelm_line" id="hidden_field_data_importeelm" style="<?php echo $sStyleHidden_importeelm; ?>"> <span class="scFormLabelOddFormat css_importeelm_label" style=""><span id="id_label_importeelm"><?php echo $this->nm_new_label['importeelm']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelm'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelm"]) &&  $this->nmgp_cmp_readonly["importeelm"] == "on") { 

 ?>
<input type="hidden" name="importeelm" value="<?php echo $this->form_encode_input($importeelm) . "\">" . $importeelm . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelm" class="sc-ui-readonly-importeelm css_importeelm_line" style="<?php echo $sStyleReadLab_importeelm; ?>"><?php echo $this->form_format_readonly("importeelm", $this->form_encode_input($this->importeelm)); ?></span><span id="id_read_off_importeelm" class="css_read_off_importeelm<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelm; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelm_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelm" type=text name="importeelm" value="<?php echo $this->form_encode_input($importeelm) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelm']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelm']['format_pos'] || 3 == $this->field_config['importeelm']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelm']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelm']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelm']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelm']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepm']))
    {
        $this->nm_new_label['importeepm'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepm = $this->importeepm;
   $sStyleHidden_importeepm = '';
   if (isset($this->nmgp_cmp_hidden['importeepm']) && $this->nmgp_cmp_hidden['importeepm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepm']);
       $sStyleHidden_importeepm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepm = 'display: none;';
   $sStyleReadInp_importeepm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepm']) && $this->nmgp_cmp_readonly['importeepm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepm']);
       $sStyleReadLab_importeepm = '';
       $sStyleReadInp_importeepm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepm']) && $this->nmgp_cmp_hidden['importeepm'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepm" value="<?php echo $this->form_encode_input($importeepm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepm_line" id="hidden_field_data_importeepm" style="<?php echo $sStyleHidden_importeepm; ?>"> <span class="scFormLabelOddFormat css_importeepm_label" style=""><span id="id_label_importeepm"><?php echo $this->nm_new_label['importeepm']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepm'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepm"]) &&  $this->nmgp_cmp_readonly["importeepm"] == "on") { 

 ?>
<input type="hidden" name="importeepm" value="<?php echo $this->form_encode_input($importeepm) . "\">" . $importeepm . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepm" class="sc-ui-readonly-importeepm css_importeepm_line" style="<?php echo $sStyleReadLab_importeepm; ?>"><?php echo $this->form_format_readonly("importeepm", $this->form_encode_input($this->importeepm)); ?></span><span id="id_read_off_importeepm" class="css_read_off_importeepm<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepm; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepm_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepm" type=text name="importeepm" value="<?php echo $this->form_encode_input($importeepm) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepm']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepm']['format_pos'] || 3 == $this->field_config['importeepm']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepm']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepm']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepm']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepm']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['b2']))
           {
               $this->nmgp_cmp_readonly['b2'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusm']))
    {
        $this->nm_new_label['estatusm'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusm = $this->estatusm;
   $sStyleHidden_estatusm = '';
   if (isset($this->nmgp_cmp_hidden['estatusm']) && $this->nmgp_cmp_hidden['estatusm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusm']);
       $sStyleHidden_estatusm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusm = 'display: none;';
   $sStyleReadInp_estatusm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusm']) && $this->nmgp_cmp_readonly['estatusm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusm']);
       $sStyleReadLab_estatusm = '';
       $sStyleReadInp_estatusm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusm']) && $this->nmgp_cmp_hidden['estatusm'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusm" value="<?php echo $this->form_encode_input($estatusm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusm_line" id="hidden_field_data_estatusm" style="<?php echo $sStyleHidden_estatusm; ?>"> <span class="scFormLabelOddFormat css_estatusm_label" style=""><span id="id_label_estatusm"><?php echo $this->nm_new_label['estatusm']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusm'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusm"]) &&  $this->nmgp_cmp_readonly["estatusm"] == "on") { 

 if ("1" == $this->estatusm) { $estatusm_look = "Activo";} 
 if ("0" == $this->estatusm) { $estatusm_look = "Inactivo";} 
?>
<input type="hidden" name="estatusm" value="<?php echo $this->form_encode_input($estatusm) . "\">" . $estatusm_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusm) { $estatusm_look = "Activo";} 
 if ("0" == $this->estatusm) { $estatusm_look = "Inactivo";} 
?>
<span id="id_read_on_estatusm"  class="css_estatusm_line" style="<?php echo $sStyleReadLab_estatusm; ?>"><?php echo $this->form_format_readonly("estatusm", $this->form_encode_input($estatusm_look)); ?></span><span id="id_read_off_estatusm" class="css_read_off_estatusm css_estatusm_line" style="<?php echo $sStyleReadInp_estatusm; ?>"><div id="idAjaxRadio_estatusm" style="display: inline-block"  class="css_estatusm_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusm_line"><?php $tempOptionId = "id-opt-estatusm" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusm sc-ui-radio-estatusm" type=radio name="estatusm" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusm'][] = '1'; ?>
<?php  if ("1" == $this->estatusm)  { echo " checked" ;} ?><?php  if (empty($this->estatusm)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusm_line"><?php $tempOptionId = "id-opt-estatusm" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusm sc-ui-radio-estatusm" type=radio name="estatusm" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusm'][] = '0'; ?>
<?php  if ("0" == $this->estatusm)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['b2']))
    {
        $this->nm_new_label['b2'] = "B2";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $b2 = $this->b2;
   $sStyleHidden_b2 = '';
   if (isset($this->nmgp_cmp_hidden['b2']) && $this->nmgp_cmp_hidden['b2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['b2']);
       $sStyleHidden_b2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_b2 = 'display: none;';
   $sStyleReadInp_b2 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["b2"]) &&  $this->nmgp_cmp_readonly["b2"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['b2']);
       $sStyleReadLab_b2 = '';
       $sStyleReadInp_b2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['b2']) && $this->nmgp_cmp_hidden['b2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="b2" value="<?php echo $this->form_encode_input($b2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_b2_line" id="hidden_field_data_b2" style="<?php echo $sStyleHidden_b2; ?>"> <span class="scFormLabelOddFormat css_b2_label" style=""><span id="id_label_b2"><?php echo $this->nm_new_label['b2']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["b2"]) &&  $this->nmgp_cmp_readonly["b2"] == "on")) { 

 ?>
<input type="hidden" name="b2" value="<?php echo $this->form_encode_input($b2) . "\"><span id=\"id_ajax_label_b2\">" . $b2 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_b2" class="sc-ui-readonly-b2 css_b2_line" style="<?php echo $sStyleReadLab_b2; ?>"><?php echo $this->form_format_readonly("b2", $this->form_encode_input($this->b2)); ?></span><span id="id_read_off_b2" class="css_read_off_b2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_b2; ?>">
 <input class="sc-js-input scFormObjectOdd css_b2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_b2" type=text name="b2" value="<?php echo $this->form_encode_input($b2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeb2']))
    {
        $this->nm_new_label['importeb2'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeb2 = $this->importeb2;
   $sStyleHidden_importeb2 = '';
   if (isset($this->nmgp_cmp_hidden['importeb2']) && $this->nmgp_cmp_hidden['importeb2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeb2']);
       $sStyleHidden_importeb2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeb2 = 'display: none;';
   $sStyleReadInp_importeb2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeb2']) && $this->nmgp_cmp_readonly['importeb2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeb2']);
       $sStyleReadLab_importeb2 = '';
       $sStyleReadInp_importeb2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeb2']) && $this->nmgp_cmp_hidden['importeb2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeb2" value="<?php echo $this->form_encode_input($importeb2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeb2_line" id="hidden_field_data_importeb2" style="<?php echo $sStyleHidden_importeb2; ?>"> <span class="scFormLabelOddFormat css_importeb2_label" style=""><span id="id_label_importeb2"><?php echo $this->nm_new_label['importeb2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeb2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeb2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeb2"]) &&  $this->nmgp_cmp_readonly["importeb2"] == "on") { 

 ?>
<input type="hidden" name="importeb2" value="<?php echo $this->form_encode_input($importeb2) . "\">" . $importeb2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeb2" class="sc-ui-readonly-importeb2 css_importeb2_line" style="<?php echo $sStyleReadLab_importeb2; ?>"><?php echo $this->form_format_readonly("importeb2", $this->form_encode_input($this->importeb2)); ?></span><span id="id_read_off_importeb2" class="css_read_off_importeb2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeb2; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeb2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeb2" type=text name="importeb2" value="<?php echo $this->form_encode_input($importeb2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeb2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeb2']['format_pos'] || 3 == $this->field_config['importeb2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeb2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeb2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeb2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeb2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelb2']))
    {
        $this->nm_new_label['importeelb2'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelb2 = $this->importeelb2;
   $sStyleHidden_importeelb2 = '';
   if (isset($this->nmgp_cmp_hidden['importeelb2']) && $this->nmgp_cmp_hidden['importeelb2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelb2']);
       $sStyleHidden_importeelb2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelb2 = 'display: none;';
   $sStyleReadInp_importeelb2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelb2']) && $this->nmgp_cmp_readonly['importeelb2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelb2']);
       $sStyleReadLab_importeelb2 = '';
       $sStyleReadInp_importeelb2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelb2']) && $this->nmgp_cmp_hidden['importeelb2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelb2" value="<?php echo $this->form_encode_input($importeelb2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelb2_line" id="hidden_field_data_importeelb2" style="<?php echo $sStyleHidden_importeelb2; ?>"> <span class="scFormLabelOddFormat css_importeelb2_label" style=""><span id="id_label_importeelb2"><?php echo $this->nm_new_label['importeelb2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelb2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelb2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelb2"]) &&  $this->nmgp_cmp_readonly["importeelb2"] == "on") { 

 ?>
<input type="hidden" name="importeelb2" value="<?php echo $this->form_encode_input($importeelb2) . "\">" . $importeelb2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelb2" class="sc-ui-readonly-importeelb2 css_importeelb2_line" style="<?php echo $sStyleReadLab_importeelb2; ?>"><?php echo $this->form_format_readonly("importeelb2", $this->form_encode_input($this->importeelb2)); ?></span><span id="id_read_off_importeelb2" class="css_read_off_importeelb2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelb2; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelb2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelb2" type=text name="importeelb2" value="<?php echo $this->form_encode_input($importeelb2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelb2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelb2']['format_pos'] || 3 == $this->field_config['importeelb2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelb2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelb2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelb2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelb2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepb2']))
    {
        $this->nm_new_label['importeepb2'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepb2 = $this->importeepb2;
   $sStyleHidden_importeepb2 = '';
   if (isset($this->nmgp_cmp_hidden['importeepb2']) && $this->nmgp_cmp_hidden['importeepb2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepb2']);
       $sStyleHidden_importeepb2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepb2 = 'display: none;';
   $sStyleReadInp_importeepb2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepb2']) && $this->nmgp_cmp_readonly['importeepb2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepb2']);
       $sStyleReadLab_importeepb2 = '';
       $sStyleReadInp_importeepb2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepb2']) && $this->nmgp_cmp_hidden['importeepb2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepb2" value="<?php echo $this->form_encode_input($importeepb2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepb2_line" id="hidden_field_data_importeepb2" style="<?php echo $sStyleHidden_importeepb2; ?>"> <span class="scFormLabelOddFormat css_importeepb2_label" style=""><span id="id_label_importeepb2"><?php echo $this->nm_new_label['importeepb2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepb2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepb2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepb2"]) &&  $this->nmgp_cmp_readonly["importeepb2"] == "on") { 

 ?>
<input type="hidden" name="importeepb2" value="<?php echo $this->form_encode_input($importeepb2) . "\">" . $importeepb2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepb2" class="sc-ui-readonly-importeepb2 css_importeepb2_line" style="<?php echo $sStyleReadLab_importeepb2; ?>"><?php echo $this->form_format_readonly("importeepb2", $this->form_encode_input($this->importeepb2)); ?></span><span id="id_read_off_importeepb2" class="css_read_off_importeepb2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepb2; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepb2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepb2" type=text name="importeepb2" value="<?php echo $this->form_encode_input($importeepb2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepb2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepb2']['format_pos'] || 3 == $this->field_config['importeepb2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepb2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepb2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepb2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepb2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['b3']))
           {
               $this->nmgp_cmp_readonly['b3'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusb2']))
    {
        $this->nm_new_label['estatusb2'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusb2 = $this->estatusb2;
   $sStyleHidden_estatusb2 = '';
   if (isset($this->nmgp_cmp_hidden['estatusb2']) && $this->nmgp_cmp_hidden['estatusb2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusb2']);
       $sStyleHidden_estatusb2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusb2 = 'display: none;';
   $sStyleReadInp_estatusb2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusb2']) && $this->nmgp_cmp_readonly['estatusb2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusb2']);
       $sStyleReadLab_estatusb2 = '';
       $sStyleReadInp_estatusb2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusb2']) && $this->nmgp_cmp_hidden['estatusb2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusb2" value="<?php echo $this->form_encode_input($estatusb2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusb2_line" id="hidden_field_data_estatusb2" style="<?php echo $sStyleHidden_estatusb2; ?>"> <span class="scFormLabelOddFormat css_estatusb2_label" style=""><span id="id_label_estatusb2"><?php echo $this->nm_new_label['estatusb2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusb2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusb2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusb2"]) &&  $this->nmgp_cmp_readonly["estatusb2"] == "on") { 

 if ("1" == $this->estatusb2) { $estatusb2_look = "Activo";} 
 if ("0" == $this->estatusb2) { $estatusb2_look = "Inactivo";} 
?>
<input type="hidden" name="estatusb2" value="<?php echo $this->form_encode_input($estatusb2) . "\">" . $estatusb2_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusb2) { $estatusb2_look = "Activo";} 
 if ("0" == $this->estatusb2) { $estatusb2_look = "Inactivo";} 
?>
<span id="id_read_on_estatusb2"  class="css_estatusb2_line" style="<?php echo $sStyleReadLab_estatusb2; ?>"><?php echo $this->form_format_readonly("estatusb2", $this->form_encode_input($estatusb2_look)); ?></span><span id="id_read_off_estatusb2" class="css_read_off_estatusb2 css_estatusb2_line" style="<?php echo $sStyleReadInp_estatusb2; ?>"><div id="idAjaxRadio_estatusb2" style="display: inline-block"  class="css_estatusb2_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusb2_line"><?php $tempOptionId = "id-opt-estatusb2" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusb2 sc-ui-radio-estatusb2" type=radio name="estatusb2" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusb2'][] = '1'; ?>
<?php  if ("1" == $this->estatusb2)  { echo " checked" ;} ?><?php  if (empty($this->estatusb2)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusb2_line"><?php $tempOptionId = "id-opt-estatusb2" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusb2 sc-ui-radio-estatusb2" type=radio name="estatusb2" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusb2'][] = '0'; ?>
<?php  if ("0" == $this->estatusb2)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['b3']))
    {
        $this->nm_new_label['b3'] = "B3";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $b3 = $this->b3;
   $sStyleHidden_b3 = '';
   if (isset($this->nmgp_cmp_hidden['b3']) && $this->nmgp_cmp_hidden['b3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['b3']);
       $sStyleHidden_b3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_b3 = 'display: none;';
   $sStyleReadInp_b3 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["b3"]) &&  $this->nmgp_cmp_readonly["b3"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['b3']);
       $sStyleReadLab_b3 = '';
       $sStyleReadInp_b3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['b3']) && $this->nmgp_cmp_hidden['b3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="b3" value="<?php echo $this->form_encode_input($b3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_b3_line" id="hidden_field_data_b3" style="<?php echo $sStyleHidden_b3; ?>"> <span class="scFormLabelOddFormat css_b3_label" style=""><span id="id_label_b3"><?php echo $this->nm_new_label['b3']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["b3"]) &&  $this->nmgp_cmp_readonly["b3"] == "on")) { 

 ?>
<input type="hidden" name="b3" value="<?php echo $this->form_encode_input($b3) . "\"><span id=\"id_ajax_label_b3\">" . $b3 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_b3" class="sc-ui-readonly-b3 css_b3_line" style="<?php echo $sStyleReadLab_b3; ?>"><?php echo $this->form_format_readonly("b3", $this->form_encode_input($this->b3)); ?></span><span id="id_read_off_b3" class="css_read_off_b3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_b3; ?>">
 <input class="sc-js-input scFormObjectOdd css_b3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_b3" type=text name="b3" value="<?php echo $this->form_encode_input($b3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeb3']))
    {
        $this->nm_new_label['importeb3'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeb3 = $this->importeb3;
   $sStyleHidden_importeb3 = '';
   if (isset($this->nmgp_cmp_hidden['importeb3']) && $this->nmgp_cmp_hidden['importeb3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeb3']);
       $sStyleHidden_importeb3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeb3 = 'display: none;';
   $sStyleReadInp_importeb3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeb3']) && $this->nmgp_cmp_readonly['importeb3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeb3']);
       $sStyleReadLab_importeb3 = '';
       $sStyleReadInp_importeb3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeb3']) && $this->nmgp_cmp_hidden['importeb3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeb3" value="<?php echo $this->form_encode_input($importeb3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeb3_line" id="hidden_field_data_importeb3" style="<?php echo $sStyleHidden_importeb3; ?>"> <span class="scFormLabelOddFormat css_importeb3_label" style=""><span id="id_label_importeb3"><?php echo $this->nm_new_label['importeb3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeb3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeb3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeb3"]) &&  $this->nmgp_cmp_readonly["importeb3"] == "on") { 

 ?>
<input type="hidden" name="importeb3" value="<?php echo $this->form_encode_input($importeb3) . "\">" . $importeb3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeb3" class="sc-ui-readonly-importeb3 css_importeb3_line" style="<?php echo $sStyleReadLab_importeb3; ?>"><?php echo $this->form_format_readonly("importeb3", $this->form_encode_input($this->importeb3)); ?></span><span id="id_read_off_importeb3" class="css_read_off_importeb3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeb3; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeb3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeb3" type=text name="importeb3" value="<?php echo $this->form_encode_input($importeb3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeb3']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeb3']['format_pos'] || 3 == $this->field_config['importeb3']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeb3']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeb3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeb3']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeb3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelb3']))
    {
        $this->nm_new_label['importeelb3'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelb3 = $this->importeelb3;
   $sStyleHidden_importeelb3 = '';
   if (isset($this->nmgp_cmp_hidden['importeelb3']) && $this->nmgp_cmp_hidden['importeelb3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelb3']);
       $sStyleHidden_importeelb3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelb3 = 'display: none;';
   $sStyleReadInp_importeelb3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelb3']) && $this->nmgp_cmp_readonly['importeelb3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelb3']);
       $sStyleReadLab_importeelb3 = '';
       $sStyleReadInp_importeelb3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelb3']) && $this->nmgp_cmp_hidden['importeelb3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelb3" value="<?php echo $this->form_encode_input($importeelb3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelb3_line" id="hidden_field_data_importeelb3" style="<?php echo $sStyleHidden_importeelb3; ?>"> <span class="scFormLabelOddFormat css_importeelb3_label" style=""><span id="id_label_importeelb3"><?php echo $this->nm_new_label['importeelb3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelb3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelb3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelb3"]) &&  $this->nmgp_cmp_readonly["importeelb3"] == "on") { 

 ?>
<input type="hidden" name="importeelb3" value="<?php echo $this->form_encode_input($importeelb3) . "\">" . $importeelb3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelb3" class="sc-ui-readonly-importeelb3 css_importeelb3_line" style="<?php echo $sStyleReadLab_importeelb3; ?>"><?php echo $this->form_format_readonly("importeelb3", $this->form_encode_input($this->importeelb3)); ?></span><span id="id_read_off_importeelb3" class="css_read_off_importeelb3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelb3; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelb3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelb3" type=text name="importeelb3" value="<?php echo $this->form_encode_input($importeelb3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelb3']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelb3']['format_pos'] || 3 == $this->field_config['importeelb3']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelb3']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelb3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelb3']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelb3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepb3']))
    {
        $this->nm_new_label['importeepb3'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepb3 = $this->importeepb3;
   $sStyleHidden_importeepb3 = '';
   if (isset($this->nmgp_cmp_hidden['importeepb3']) && $this->nmgp_cmp_hidden['importeepb3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepb3']);
       $sStyleHidden_importeepb3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepb3 = 'display: none;';
   $sStyleReadInp_importeepb3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepb3']) && $this->nmgp_cmp_readonly['importeepb3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepb3']);
       $sStyleReadLab_importeepb3 = '';
       $sStyleReadInp_importeepb3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepb3']) && $this->nmgp_cmp_hidden['importeepb3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepb3" value="<?php echo $this->form_encode_input($importeepb3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepb3_line" id="hidden_field_data_importeepb3" style="<?php echo $sStyleHidden_importeepb3; ?>"> <span class="scFormLabelOddFormat css_importeepb3_label" style=""><span id="id_label_importeepb3"><?php echo $this->nm_new_label['importeepb3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepb3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepb3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepb3"]) &&  $this->nmgp_cmp_readonly["importeepb3"] == "on") { 

 ?>
<input type="hidden" name="importeepb3" value="<?php echo $this->form_encode_input($importeepb3) . "\">" . $importeepb3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepb3" class="sc-ui-readonly-importeepb3 css_importeepb3_line" style="<?php echo $sStyleReadLab_importeepb3; ?>"><?php echo $this->form_format_readonly("importeepb3", $this->form_encode_input($this->importeepb3)); ?></span><span id="id_read_off_importeepb3" class="css_read_off_importeepb3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepb3; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepb3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepb3" type=text name="importeepb3" value="<?php echo $this->form_encode_input($importeepb3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepb3']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepb3']['format_pos'] || 3 == $this->field_config['importeepb3']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepb3']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepb3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepb3']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepb3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['b4']))
           {
               $this->nmgp_cmp_readonly['b4'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusb3']))
    {
        $this->nm_new_label['estatusb3'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusb3 = $this->estatusb3;
   $sStyleHidden_estatusb3 = '';
   if (isset($this->nmgp_cmp_hidden['estatusb3']) && $this->nmgp_cmp_hidden['estatusb3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusb3']);
       $sStyleHidden_estatusb3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusb3 = 'display: none;';
   $sStyleReadInp_estatusb3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusb3']) && $this->nmgp_cmp_readonly['estatusb3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusb3']);
       $sStyleReadLab_estatusb3 = '';
       $sStyleReadInp_estatusb3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusb3']) && $this->nmgp_cmp_hidden['estatusb3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusb3" value="<?php echo $this->form_encode_input($estatusb3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusb3_line" id="hidden_field_data_estatusb3" style="<?php echo $sStyleHidden_estatusb3; ?>"> <span class="scFormLabelOddFormat css_estatusb3_label" style=""><span id="id_label_estatusb3"><?php echo $this->nm_new_label['estatusb3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusb3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusb3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusb3"]) &&  $this->nmgp_cmp_readonly["estatusb3"] == "on") { 

 if ("1" == $this->estatusb3) { $estatusb3_look = "Activo";} 
 if ("0" == $this->estatusb3) { $estatusb3_look = "Inactivo";} 
?>
<input type="hidden" name="estatusb3" value="<?php echo $this->form_encode_input($estatusb3) . "\">" . $estatusb3_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusb3) { $estatusb3_look = "Activo";} 
 if ("0" == $this->estatusb3) { $estatusb3_look = "Inactivo";} 
?>
<span id="id_read_on_estatusb3"  class="css_estatusb3_line" style="<?php echo $sStyleReadLab_estatusb3; ?>"><?php echo $this->form_format_readonly("estatusb3", $this->form_encode_input($estatusb3_look)); ?></span><span id="id_read_off_estatusb3" class="css_read_off_estatusb3 css_estatusb3_line" style="<?php echo $sStyleReadInp_estatusb3; ?>"><div id="idAjaxRadio_estatusb3" style="display: inline-block"  class="css_estatusb3_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusb3_line"><?php $tempOptionId = "id-opt-estatusb3" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusb3 sc-ui-radio-estatusb3" type=radio name="estatusb3" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusb3'][] = '1'; ?>
<?php  if ("1" == $this->estatusb3)  { echo " checked" ;} ?><?php  if (empty($this->estatusb3)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusb3_line"><?php $tempOptionId = "id-opt-estatusb3" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusb3 sc-ui-radio-estatusb3" type=radio name="estatusb3" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusb3'][] = '0'; ?>
<?php  if ("0" == $this->estatusb3)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['b4']))
    {
        $this->nm_new_label['b4'] = "B4";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $b4 = $this->b4;
   $sStyleHidden_b4 = '';
   if (isset($this->nmgp_cmp_hidden['b4']) && $this->nmgp_cmp_hidden['b4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['b4']);
       $sStyleHidden_b4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_b4 = 'display: none;';
   $sStyleReadInp_b4 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["b4"]) &&  $this->nmgp_cmp_readonly["b4"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['b4']);
       $sStyleReadLab_b4 = '';
       $sStyleReadInp_b4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['b4']) && $this->nmgp_cmp_hidden['b4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="b4" value="<?php echo $this->form_encode_input($b4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_b4_line" id="hidden_field_data_b4" style="<?php echo $sStyleHidden_b4; ?>"> <span class="scFormLabelOddFormat css_b4_label" style=""><span id="id_label_b4"><?php echo $this->nm_new_label['b4']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["b4"]) &&  $this->nmgp_cmp_readonly["b4"] == "on")) { 

 ?>
<input type="hidden" name="b4" value="<?php echo $this->form_encode_input($b4) . "\"><span id=\"id_ajax_label_b4\">" . $b4 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_b4" class="sc-ui-readonly-b4 css_b4_line" style="<?php echo $sStyleReadLab_b4; ?>"><?php echo $this->form_format_readonly("b4", $this->form_encode_input($this->b4)); ?></span><span id="id_read_off_b4" class="css_read_off_b4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_b4; ?>">
 <input class="sc-js-input scFormObjectOdd css_b4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_b4" type=text name="b4" value="<?php echo $this->form_encode_input($b4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeb4']))
    {
        $this->nm_new_label['importeb4'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeb4 = $this->importeb4;
   $sStyleHidden_importeb4 = '';
   if (isset($this->nmgp_cmp_hidden['importeb4']) && $this->nmgp_cmp_hidden['importeb4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeb4']);
       $sStyleHidden_importeb4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeb4 = 'display: none;';
   $sStyleReadInp_importeb4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeb4']) && $this->nmgp_cmp_readonly['importeb4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeb4']);
       $sStyleReadLab_importeb4 = '';
       $sStyleReadInp_importeb4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeb4']) && $this->nmgp_cmp_hidden['importeb4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeb4" value="<?php echo $this->form_encode_input($importeb4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeb4_line" id="hidden_field_data_importeb4" style="<?php echo $sStyleHidden_importeb4; ?>"> <span class="scFormLabelOddFormat css_importeb4_label" style=""><span id="id_label_importeb4"><?php echo $this->nm_new_label['importeb4']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeb4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeb4'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeb4"]) &&  $this->nmgp_cmp_readonly["importeb4"] == "on") { 

 ?>
<input type="hidden" name="importeb4" value="<?php echo $this->form_encode_input($importeb4) . "\">" . $importeb4 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeb4" class="sc-ui-readonly-importeb4 css_importeb4_line" style="<?php echo $sStyleReadLab_importeb4; ?>"><?php echo $this->form_format_readonly("importeb4", $this->form_encode_input($this->importeb4)); ?></span><span id="id_read_off_importeb4" class="css_read_off_importeb4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeb4; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeb4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeb4" type=text name="importeb4" value="<?php echo $this->form_encode_input($importeb4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeb4']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeb4']['format_pos'] || 3 == $this->field_config['importeb4']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeb4']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeb4']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeb4']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeb4']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelb4']))
    {
        $this->nm_new_label['importeelb4'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelb4 = $this->importeelb4;
   $sStyleHidden_importeelb4 = '';
   if (isset($this->nmgp_cmp_hidden['importeelb4']) && $this->nmgp_cmp_hidden['importeelb4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelb4']);
       $sStyleHidden_importeelb4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelb4 = 'display: none;';
   $sStyleReadInp_importeelb4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelb4']) && $this->nmgp_cmp_readonly['importeelb4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelb4']);
       $sStyleReadLab_importeelb4 = '';
       $sStyleReadInp_importeelb4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelb4']) && $this->nmgp_cmp_hidden['importeelb4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelb4" value="<?php echo $this->form_encode_input($importeelb4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelb4_line" id="hidden_field_data_importeelb4" style="<?php echo $sStyleHidden_importeelb4; ?>"> <span class="scFormLabelOddFormat css_importeelb4_label" style=""><span id="id_label_importeelb4"><?php echo $this->nm_new_label['importeelb4']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelb4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelb4'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelb4"]) &&  $this->nmgp_cmp_readonly["importeelb4"] == "on") { 

 ?>
<input type="hidden" name="importeelb4" value="<?php echo $this->form_encode_input($importeelb4) . "\">" . $importeelb4 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelb4" class="sc-ui-readonly-importeelb4 css_importeelb4_line" style="<?php echo $sStyleReadLab_importeelb4; ?>"><?php echo $this->form_format_readonly("importeelb4", $this->form_encode_input($this->importeelb4)); ?></span><span id="id_read_off_importeelb4" class="css_read_off_importeelb4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelb4; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelb4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelb4" type=text name="importeelb4" value="<?php echo $this->form_encode_input($importeelb4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelb4']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelb4']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelb4']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelb4']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepb4']))
    {
        $this->nm_new_label['importeepb4'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepb4 = $this->importeepb4;
   $sStyleHidden_importeepb4 = '';
   if (isset($this->nmgp_cmp_hidden['importeepb4']) && $this->nmgp_cmp_hidden['importeepb4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepb4']);
       $sStyleHidden_importeepb4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepb4 = 'display: none;';
   $sStyleReadInp_importeepb4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepb4']) && $this->nmgp_cmp_readonly['importeepb4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepb4']);
       $sStyleReadLab_importeepb4 = '';
       $sStyleReadInp_importeepb4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepb4']) && $this->nmgp_cmp_hidden['importeepb4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepb4" value="<?php echo $this->form_encode_input($importeepb4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepb4_line" id="hidden_field_data_importeepb4" style="<?php echo $sStyleHidden_importeepb4; ?>"> <span class="scFormLabelOddFormat css_importeepb4_label" style=""><span id="id_label_importeepb4"><?php echo $this->nm_new_label['importeepb4']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepb4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepb4'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepb4"]) &&  $this->nmgp_cmp_readonly["importeepb4"] == "on") { 

 ?>
<input type="hidden" name="importeepb4" value="<?php echo $this->form_encode_input($importeepb4) . "\">" . $importeepb4 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepb4" class="sc-ui-readonly-importeepb4 css_importeepb4_line" style="<?php echo $sStyleReadLab_importeepb4; ?>"><?php echo $this->form_format_readonly("importeepb4", $this->form_encode_input($this->importeepb4)); ?></span><span id="id_read_off_importeepb4" class="css_read_off_importeepb4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepb4; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepb4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepb4" type=text name="importeepb4" value="<?php echo $this->form_encode_input($importeepb4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepb4']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepb4']['format_pos'] || 3 == $this->field_config['importeepb4']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepb4']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepb4']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepb4']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepb4']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['c2']))
           {
               $this->nmgp_cmp_readonly['c2'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusb4']))
    {
        $this->nm_new_label['estatusb4'] = "EstatusB4";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusb4 = $this->estatusb4;
   $sStyleHidden_estatusb4 = '';
   if (isset($this->nmgp_cmp_hidden['estatusb4']) && $this->nmgp_cmp_hidden['estatusb4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusb4']);
       $sStyleHidden_estatusb4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusb4 = 'display: none;';
   $sStyleReadInp_estatusb4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusb4']) && $this->nmgp_cmp_readonly['estatusb4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusb4']);
       $sStyleReadLab_estatusb4 = '';
       $sStyleReadInp_estatusb4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusb4']) && $this->nmgp_cmp_hidden['estatusb4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusb4" value="<?php echo $this->form_encode_input($estatusb4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusb4_line" id="hidden_field_data_estatusb4" style="<?php echo $sStyleHidden_estatusb4; ?>"> <span class="scFormLabelOddFormat css_estatusb4_label" style=""><span id="id_label_estatusb4"><?php echo $this->nm_new_label['estatusb4']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusb4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusb4'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusb4"]) &&  $this->nmgp_cmp_readonly["estatusb4"] == "on") { 

 if ("1" == $this->estatusb4) { $estatusb4_look = "Activo";} 
 if ("0" == $this->estatusb4) { $estatusb4_look = "Inactivo";} 
?>
<input type="hidden" name="estatusb4" value="<?php echo $this->form_encode_input($estatusb4) . "\">" . $estatusb4_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusb4) { $estatusb4_look = "Activo";} 
 if ("0" == $this->estatusb4) { $estatusb4_look = "Inactivo";} 
?>
<span id="id_read_on_estatusb4"  class="css_estatusb4_line" style="<?php echo $sStyleReadLab_estatusb4; ?>"><?php echo $this->form_format_readonly("estatusb4", $this->form_encode_input($estatusb4_look)); ?></span><span id="id_read_off_estatusb4" class="css_read_off_estatusb4 css_estatusb4_line" style="<?php echo $sStyleReadInp_estatusb4; ?>"><div id="idAjaxRadio_estatusb4" style="display: inline-block"  class="css_estatusb4_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusb4_line"><?php $tempOptionId = "id-opt-estatusb4" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusb4 sc-ui-radio-estatusb4" type=radio name="estatusb4" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusb4'][] = '1'; ?>
<?php  if ("1" == $this->estatusb4)  { echo " checked" ;} ?><?php  if (empty($this->estatusb4)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusb4_line"><?php $tempOptionId = "id-opt-estatusb4" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusb4 sc-ui-radio-estatusb4" type=radio name="estatusb4" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusb4'][] = '0'; ?>
<?php  if ("0" == $this->estatusb4)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['c2']))
    {
        $this->nm_new_label['c2'] = "C2";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $c2 = $this->c2;
   $sStyleHidden_c2 = '';
   if (isset($this->nmgp_cmp_hidden['c2']) && $this->nmgp_cmp_hidden['c2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['c2']);
       $sStyleHidden_c2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_c2 = 'display: none;';
   $sStyleReadInp_c2 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["c2"]) &&  $this->nmgp_cmp_readonly["c2"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['c2']);
       $sStyleReadLab_c2 = '';
       $sStyleReadInp_c2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['c2']) && $this->nmgp_cmp_hidden['c2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="c2" value="<?php echo $this->form_encode_input($c2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_c2_line" id="hidden_field_data_c2" style="<?php echo $sStyleHidden_c2; ?>"> <span class="scFormLabelOddFormat css_c2_label" style=""><span id="id_label_c2"><?php echo $this->nm_new_label['c2']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["c2"]) &&  $this->nmgp_cmp_readonly["c2"] == "on")) { 

 ?>
<input type="hidden" name="c2" value="<?php echo $this->form_encode_input($c2) . "\"><span id=\"id_ajax_label_c2\">" . $c2 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_c2" class="sc-ui-readonly-c2 css_c2_line" style="<?php echo $sStyleReadLab_c2; ?>"><?php echo $this->form_format_readonly("c2", $this->form_encode_input($this->c2)); ?></span><span id="id_read_off_c2" class="css_read_off_c2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_c2; ?>">
 <input class="sc-js-input scFormObjectOdd css_c2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_c2" type=text name="c2" value="<?php echo $this->form_encode_input($c2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importec2']))
    {
        $this->nm_new_label['importec2'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importec2 = $this->importec2;
   $sStyleHidden_importec2 = '';
   if (isset($this->nmgp_cmp_hidden['importec2']) && $this->nmgp_cmp_hidden['importec2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importec2']);
       $sStyleHidden_importec2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importec2 = 'display: none;';
   $sStyleReadInp_importec2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importec2']) && $this->nmgp_cmp_readonly['importec2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importec2']);
       $sStyleReadLab_importec2 = '';
       $sStyleReadInp_importec2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importec2']) && $this->nmgp_cmp_hidden['importec2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importec2" value="<?php echo $this->form_encode_input($importec2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importec2_line" id="hidden_field_data_importec2" style="<?php echo $sStyleHidden_importec2; ?>"> <span class="scFormLabelOddFormat css_importec2_label" style=""><span id="id_label_importec2"><?php echo $this->nm_new_label['importec2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importec2"]) &&  $this->nmgp_cmp_readonly["importec2"] == "on") { 

 ?>
<input type="hidden" name="importec2" value="<?php echo $this->form_encode_input($importec2) . "\">" . $importec2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importec2" class="sc-ui-readonly-importec2 css_importec2_line" style="<?php echo $sStyleReadLab_importec2; ?>"><?php echo $this->form_format_readonly("importec2", $this->form_encode_input($this->importec2)); ?></span><span id="id_read_off_importec2" class="css_read_off_importec2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importec2; ?>">
 <input class="sc-js-input scFormObjectOdd css_importec2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importec2" type=text name="importec2" value="<?php echo $this->form_encode_input($importec2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importec2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importec2']['format_pos'] || 3 == $this->field_config['importec2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importec2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importec2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importec2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importec2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelc2']))
    {
        $this->nm_new_label['importeelc2'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelc2 = $this->importeelc2;
   $sStyleHidden_importeelc2 = '';
   if (isset($this->nmgp_cmp_hidden['importeelc2']) && $this->nmgp_cmp_hidden['importeelc2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelc2']);
       $sStyleHidden_importeelc2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelc2 = 'display: none;';
   $sStyleReadInp_importeelc2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelc2']) && $this->nmgp_cmp_readonly['importeelc2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelc2']);
       $sStyleReadLab_importeelc2 = '';
       $sStyleReadInp_importeelc2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelc2']) && $this->nmgp_cmp_hidden['importeelc2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelc2" value="<?php echo $this->form_encode_input($importeelc2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelc2_line" id="hidden_field_data_importeelc2" style="<?php echo $sStyleHidden_importeelc2; ?>"> <span class="scFormLabelOddFormat css_importeelc2_label" style=""><span id="id_label_importeelc2"><?php echo $this->nm_new_label['importeelc2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelc2"]) &&  $this->nmgp_cmp_readonly["importeelc2"] == "on") { 

 ?>
<input type="hidden" name="importeelc2" value="<?php echo $this->form_encode_input($importeelc2) . "\">" . $importeelc2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelc2" class="sc-ui-readonly-importeelc2 css_importeelc2_line" style="<?php echo $sStyleReadLab_importeelc2; ?>"><?php echo $this->form_format_readonly("importeelc2", $this->form_encode_input($this->importeelc2)); ?></span><span id="id_read_off_importeelc2" class="css_read_off_importeelc2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelc2; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelc2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelc2" type=text name="importeelc2" value="<?php echo $this->form_encode_input($importeelc2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelc2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelc2']['format_pos'] || 3 == $this->field_config['importeelc2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelc2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelc2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepc2']))
    {
        $this->nm_new_label['importeepc2'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepc2 = $this->importeepc2;
   $sStyleHidden_importeepc2 = '';
   if (isset($this->nmgp_cmp_hidden['importeepc2']) && $this->nmgp_cmp_hidden['importeepc2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepc2']);
       $sStyleHidden_importeepc2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepc2 = 'display: none;';
   $sStyleReadInp_importeepc2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepc2']) && $this->nmgp_cmp_readonly['importeepc2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepc2']);
       $sStyleReadLab_importeepc2 = '';
       $sStyleReadInp_importeepc2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepc2']) && $this->nmgp_cmp_hidden['importeepc2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepc2" value="<?php echo $this->form_encode_input($importeepc2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepc2_line" id="hidden_field_data_importeepc2" style="<?php echo $sStyleHidden_importeepc2; ?>"> <span class="scFormLabelOddFormat css_importeepc2_label" style=""><span id="id_label_importeepc2"><?php echo $this->nm_new_label['importeepc2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepc2"]) &&  $this->nmgp_cmp_readonly["importeepc2"] == "on") { 

 ?>
<input type="hidden" name="importeepc2" value="<?php echo $this->form_encode_input($importeepc2) . "\">" . $importeepc2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepc2" class="sc-ui-readonly-importeepc2 css_importeepc2_line" style="<?php echo $sStyleReadLab_importeepc2; ?>"><?php echo $this->form_format_readonly("importeepc2", $this->form_encode_input($this->importeepc2)); ?></span><span id="id_read_off_importeepc2" class="css_read_off_importeepc2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepc2; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepc2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepc2" type=text name="importeepc2" value="<?php echo $this->form_encode_input($importeepc2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepc2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepc2']['format_pos'] || 3 == $this->field_config['importeepc2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepc2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepc2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['c3']))
           {
               $this->nmgp_cmp_readonly['c3'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusc2']))
    {
        $this->nm_new_label['estatusc2'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusc2 = $this->estatusc2;
   $sStyleHidden_estatusc2 = '';
   if (isset($this->nmgp_cmp_hidden['estatusc2']) && $this->nmgp_cmp_hidden['estatusc2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusc2']);
       $sStyleHidden_estatusc2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusc2 = 'display: none;';
   $sStyleReadInp_estatusc2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusc2']) && $this->nmgp_cmp_readonly['estatusc2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusc2']);
       $sStyleReadLab_estatusc2 = '';
       $sStyleReadInp_estatusc2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusc2']) && $this->nmgp_cmp_hidden['estatusc2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusc2" value="<?php echo $this->form_encode_input($estatusc2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusc2_line" id="hidden_field_data_estatusc2" style="<?php echo $sStyleHidden_estatusc2; ?>"> <span class="scFormLabelOddFormat css_estatusc2_label" style=""><span id="id_label_estatusc2"><?php echo $this->nm_new_label['estatusc2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusc2"]) &&  $this->nmgp_cmp_readonly["estatusc2"] == "on") { 

 if ("1" == $this->estatusc2) { $estatusc2_look = "Activo";} 
 if ("0" == $this->estatusc2) { $estatusc2_look = "Inactivo";} 
?>
<input type="hidden" name="estatusc2" value="<?php echo $this->form_encode_input($estatusc2) . "\">" . $estatusc2_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusc2) { $estatusc2_look = "Activo";} 
 if ("0" == $this->estatusc2) { $estatusc2_look = "Inactivo";} 
?>
<span id="id_read_on_estatusc2"  class="css_estatusc2_line" style="<?php echo $sStyleReadLab_estatusc2; ?>"><?php echo $this->form_format_readonly("estatusc2", $this->form_encode_input($estatusc2_look)); ?></span><span id="id_read_off_estatusc2" class="css_read_off_estatusc2 css_estatusc2_line" style="<?php echo $sStyleReadInp_estatusc2; ?>"><div id="idAjaxRadio_estatusc2" style="display: inline-block"  class="css_estatusc2_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusc2_line"><?php $tempOptionId = "id-opt-estatusc2" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc2 sc-ui-radio-estatusc2" type=radio name="estatusc2" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc2'][] = '1'; ?>
<?php  if ("1" == $this->estatusc2)  { echo " checked" ;} ?><?php  if (empty($this->estatusc2)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusc2_line"><?php $tempOptionId = "id-opt-estatusc2" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc2 sc-ui-radio-estatusc2" type=radio name="estatusc2" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc2'][] = '0'; ?>
<?php  if ("0" == $this->estatusc2)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['c3']))
    {
        $this->nm_new_label['c3'] = "C3";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $c3 = $this->c3;
   $sStyleHidden_c3 = '';
   if (isset($this->nmgp_cmp_hidden['c3']) && $this->nmgp_cmp_hidden['c3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['c3']);
       $sStyleHidden_c3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_c3 = 'display: none;';
   $sStyleReadInp_c3 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["c3"]) &&  $this->nmgp_cmp_readonly["c3"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['c3']);
       $sStyleReadLab_c3 = '';
       $sStyleReadInp_c3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['c3']) && $this->nmgp_cmp_hidden['c3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="c3" value="<?php echo $this->form_encode_input($c3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_c3_line" id="hidden_field_data_c3" style="<?php echo $sStyleHidden_c3; ?>"> <span class="scFormLabelOddFormat css_c3_label" style=""><span id="id_label_c3"><?php echo $this->nm_new_label['c3']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["c3"]) &&  $this->nmgp_cmp_readonly["c3"] == "on")) { 

 ?>
<input type="hidden" name="c3" value="<?php echo $this->form_encode_input($c3) . "\"><span id=\"id_ajax_label_c3\">" . $c3 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_c3" class="sc-ui-readonly-c3 css_c3_line" style="<?php echo $sStyleReadLab_c3; ?>"><?php echo $this->form_format_readonly("c3", $this->form_encode_input($this->c3)); ?></span><span id="id_read_off_c3" class="css_read_off_c3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_c3; ?>">
 <input class="sc-js-input scFormObjectOdd css_c3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_c3" type=text name="c3" value="<?php echo $this->form_encode_input($c3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importec3']))
    {
        $this->nm_new_label['importec3'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importec3 = $this->importec3;
   $sStyleHidden_importec3 = '';
   if (isset($this->nmgp_cmp_hidden['importec3']) && $this->nmgp_cmp_hidden['importec3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importec3']);
       $sStyleHidden_importec3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importec3 = 'display: none;';
   $sStyleReadInp_importec3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importec3']) && $this->nmgp_cmp_readonly['importec3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importec3']);
       $sStyleReadLab_importec3 = '';
       $sStyleReadInp_importec3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importec3']) && $this->nmgp_cmp_hidden['importec3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importec3" value="<?php echo $this->form_encode_input($importec3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importec3_line" id="hidden_field_data_importec3" style="<?php echo $sStyleHidden_importec3; ?>"> <span class="scFormLabelOddFormat css_importec3_label" style=""><span id="id_label_importec3"><?php echo $this->nm_new_label['importec3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importec3"]) &&  $this->nmgp_cmp_readonly["importec3"] == "on") { 

 ?>
<input type="hidden" name="importec3" value="<?php echo $this->form_encode_input($importec3) . "\">" . $importec3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importec3" class="sc-ui-readonly-importec3 css_importec3_line" style="<?php echo $sStyleReadLab_importec3; ?>"><?php echo $this->form_format_readonly("importec3", $this->form_encode_input($this->importec3)); ?></span><span id="id_read_off_importec3" class="css_read_off_importec3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importec3; ?>">
 <input class="sc-js-input scFormObjectOdd css_importec3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importec3" type=text name="importec3" value="<?php echo $this->form_encode_input($importec3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importec3']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importec3']['format_pos'] || 3 == $this->field_config['importec3']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importec3']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importec3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importec3']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importec3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelc3']))
    {
        $this->nm_new_label['importeelc3'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelc3 = $this->importeelc3;
   $sStyleHidden_importeelc3 = '';
   if (isset($this->nmgp_cmp_hidden['importeelc3']) && $this->nmgp_cmp_hidden['importeelc3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelc3']);
       $sStyleHidden_importeelc3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelc3 = 'display: none;';
   $sStyleReadInp_importeelc3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelc3']) && $this->nmgp_cmp_readonly['importeelc3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelc3']);
       $sStyleReadLab_importeelc3 = '';
       $sStyleReadInp_importeelc3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelc3']) && $this->nmgp_cmp_hidden['importeelc3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelc3" value="<?php echo $this->form_encode_input($importeelc3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelc3_line" id="hidden_field_data_importeelc3" style="<?php echo $sStyleHidden_importeelc3; ?>"> <span class="scFormLabelOddFormat css_importeelc3_label" style=""><span id="id_label_importeelc3"><?php echo $this->nm_new_label['importeelc3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelc3"]) &&  $this->nmgp_cmp_readonly["importeelc3"] == "on") { 

 ?>
<input type="hidden" name="importeelc3" value="<?php echo $this->form_encode_input($importeelc3) . "\">" . $importeelc3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelc3" class="sc-ui-readonly-importeelc3 css_importeelc3_line" style="<?php echo $sStyleReadLab_importeelc3; ?>"><?php echo $this->form_format_readonly("importeelc3", $this->form_encode_input($this->importeelc3)); ?></span><span id="id_read_off_importeelc3" class="css_read_off_importeelc3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelc3; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelc3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelc3" type=text name="importeelc3" value="<?php echo $this->form_encode_input($importeelc3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelc3']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelc3']['format_pos'] || 3 == $this->field_config['importeelc3']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc3']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelc3']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelc3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepc3']))
    {
        $this->nm_new_label['importeepc3'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepc3 = $this->importeepc3;
   $sStyleHidden_importeepc3 = '';
   if (isset($this->nmgp_cmp_hidden['importeepc3']) && $this->nmgp_cmp_hidden['importeepc3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepc3']);
       $sStyleHidden_importeepc3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepc3 = 'display: none;';
   $sStyleReadInp_importeepc3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepc3']) && $this->nmgp_cmp_readonly['importeepc3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepc3']);
       $sStyleReadLab_importeepc3 = '';
       $sStyleReadInp_importeepc3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepc3']) && $this->nmgp_cmp_hidden['importeepc3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepc3" value="<?php echo $this->form_encode_input($importeepc3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepc3_line" id="hidden_field_data_importeepc3" style="<?php echo $sStyleHidden_importeepc3; ?>"> <span class="scFormLabelOddFormat css_importeepc3_label" style=""><span id="id_label_importeepc3"><?php echo $this->nm_new_label['importeepc3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepc3"]) &&  $this->nmgp_cmp_readonly["importeepc3"] == "on") { 

 ?>
<input type="hidden" name="importeepc3" value="<?php echo $this->form_encode_input($importeepc3) . "\">" . $importeepc3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepc3" class="sc-ui-readonly-importeepc3 css_importeepc3_line" style="<?php echo $sStyleReadLab_importeepc3; ?>"><?php echo $this->form_format_readonly("importeepc3", $this->form_encode_input($this->importeepc3)); ?></span><span id="id_read_off_importeepc3" class="css_read_off_importeepc3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepc3; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepc3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepc3" type=text name="importeepc3" value="<?php echo $this->form_encode_input($importeepc3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepc3']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepc3']['format_pos'] || 3 == $this->field_config['importeepc3']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc3']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepc3']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepc3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['c4']))
           {
               $this->nmgp_cmp_readonly['c4'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusc3']))
    {
        $this->nm_new_label['estatusc3'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusc3 = $this->estatusc3;
   $sStyleHidden_estatusc3 = '';
   if (isset($this->nmgp_cmp_hidden['estatusc3']) && $this->nmgp_cmp_hidden['estatusc3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusc3']);
       $sStyleHidden_estatusc3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusc3 = 'display: none;';
   $sStyleReadInp_estatusc3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusc3']) && $this->nmgp_cmp_readonly['estatusc3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusc3']);
       $sStyleReadLab_estatusc3 = '';
       $sStyleReadInp_estatusc3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusc3']) && $this->nmgp_cmp_hidden['estatusc3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusc3" value="<?php echo $this->form_encode_input($estatusc3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusc3_line" id="hidden_field_data_estatusc3" style="<?php echo $sStyleHidden_estatusc3; ?>"> <span class="scFormLabelOddFormat css_estatusc3_label" style=""><span id="id_label_estatusc3"><?php echo $this->nm_new_label['estatusc3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusc3"]) &&  $this->nmgp_cmp_readonly["estatusc3"] == "on") { 

 if ("1" == $this->estatusc3) { $estatusc3_look = "Activo";} 
 if ("0" == $this->estatusc3) { $estatusc3_look = "Inactivo";} 
?>
<input type="hidden" name="estatusc3" value="<?php echo $this->form_encode_input($estatusc3) . "\">" . $estatusc3_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusc3) { $estatusc3_look = "Activo";} 
 if ("0" == $this->estatusc3) { $estatusc3_look = "Inactivo";} 
?>
<span id="id_read_on_estatusc3"  class="css_estatusc3_line" style="<?php echo $sStyleReadLab_estatusc3; ?>"><?php echo $this->form_format_readonly("estatusc3", $this->form_encode_input($estatusc3_look)); ?></span><span id="id_read_off_estatusc3" class="css_read_off_estatusc3 css_estatusc3_line" style="<?php echo $sStyleReadInp_estatusc3; ?>"><div id="idAjaxRadio_estatusc3" style="display: inline-block"  class="css_estatusc3_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusc3_line"><?php $tempOptionId = "id-opt-estatusc3" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc3 sc-ui-radio-estatusc3" type=radio name="estatusc3" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc3'][] = '1'; ?>
<?php  if ("1" == $this->estatusc3)  { echo " checked" ;} ?><?php  if (empty($this->estatusc3)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusc3_line"><?php $tempOptionId = "id-opt-estatusc3" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc3 sc-ui-radio-estatusc3" type=radio name="estatusc3" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc3'][] = '0'; ?>
<?php  if ("0" == $this->estatusc3)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['c4']))
    {
        $this->nm_new_label['c4'] = "C4";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $c4 = $this->c4;
   $sStyleHidden_c4 = '';
   if (isset($this->nmgp_cmp_hidden['c4']) && $this->nmgp_cmp_hidden['c4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['c4']);
       $sStyleHidden_c4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_c4 = 'display: none;';
   $sStyleReadInp_c4 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["c4"]) &&  $this->nmgp_cmp_readonly["c4"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['c4']);
       $sStyleReadLab_c4 = '';
       $sStyleReadInp_c4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['c4']) && $this->nmgp_cmp_hidden['c4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="c4" value="<?php echo $this->form_encode_input($c4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_c4_line" id="hidden_field_data_c4" style="<?php echo $sStyleHidden_c4; ?>"> <span class="scFormLabelOddFormat css_c4_label" style=""><span id="id_label_c4"><?php echo $this->nm_new_label['c4']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["c4"]) &&  $this->nmgp_cmp_readonly["c4"] == "on")) { 

 ?>
<input type="hidden" name="c4" value="<?php echo $this->form_encode_input($c4) . "\"><span id=\"id_ajax_label_c4\">" . $c4 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_c4" class="sc-ui-readonly-c4 css_c4_line" style="<?php echo $sStyleReadLab_c4; ?>"><?php echo $this->form_format_readonly("c4", $this->form_encode_input($this->c4)); ?></span><span id="id_read_off_c4" class="css_read_off_c4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_c4; ?>">
 <input class="sc-js-input scFormObjectOdd css_c4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_c4" type=text name="c4" value="<?php echo $this->form_encode_input($c4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importec4']))
    {
        $this->nm_new_label['importec4'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importec4 = $this->importec4;
   $sStyleHidden_importec4 = '';
   if (isset($this->nmgp_cmp_hidden['importec4']) && $this->nmgp_cmp_hidden['importec4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importec4']);
       $sStyleHidden_importec4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importec4 = 'display: none;';
   $sStyleReadInp_importec4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importec4']) && $this->nmgp_cmp_readonly['importec4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importec4']);
       $sStyleReadLab_importec4 = '';
       $sStyleReadInp_importec4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importec4']) && $this->nmgp_cmp_hidden['importec4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importec4" value="<?php echo $this->form_encode_input($importec4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importec4_line" id="hidden_field_data_importec4" style="<?php echo $sStyleHidden_importec4; ?>"> <span class="scFormLabelOddFormat css_importec4_label" style=""><span id="id_label_importec4"><?php echo $this->nm_new_label['importec4']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec4'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importec4"]) &&  $this->nmgp_cmp_readonly["importec4"] == "on") { 

 ?>
<input type="hidden" name="importec4" value="<?php echo $this->form_encode_input($importec4) . "\">" . $importec4 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importec4" class="sc-ui-readonly-importec4 css_importec4_line" style="<?php echo $sStyleReadLab_importec4; ?>"><?php echo $this->form_format_readonly("importec4", $this->form_encode_input($this->importec4)); ?></span><span id="id_read_off_importec4" class="css_read_off_importec4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importec4; ?>">
 <input class="sc-js-input scFormObjectOdd css_importec4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importec4" type=text name="importec4" value="<?php echo $this->form_encode_input($importec4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importec4']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importec4']['format_pos'] || 3 == $this->field_config['importec4']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importec4']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importec4']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importec4']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importec4']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelc4']))
    {
        $this->nm_new_label['importeelc4'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelc4 = $this->importeelc4;
   $sStyleHidden_importeelc4 = '';
   if (isset($this->nmgp_cmp_hidden['importeelc4']) && $this->nmgp_cmp_hidden['importeelc4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelc4']);
       $sStyleHidden_importeelc4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelc4 = 'display: none;';
   $sStyleReadInp_importeelc4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelc4']) && $this->nmgp_cmp_readonly['importeelc4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelc4']);
       $sStyleReadLab_importeelc4 = '';
       $sStyleReadInp_importeelc4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelc4']) && $this->nmgp_cmp_hidden['importeelc4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelc4" value="<?php echo $this->form_encode_input($importeelc4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelc4_line" id="hidden_field_data_importeelc4" style="<?php echo $sStyleHidden_importeelc4; ?>"> <span class="scFormLabelOddFormat css_importeelc4_label" style=""><span id="id_label_importeelc4"><?php echo $this->nm_new_label['importeelc4']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc4'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelc4"]) &&  $this->nmgp_cmp_readonly["importeelc4"] == "on") { 

 ?>
<input type="hidden" name="importeelc4" value="<?php echo $this->form_encode_input($importeelc4) . "\">" . $importeelc4 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelc4" class="sc-ui-readonly-importeelc4 css_importeelc4_line" style="<?php echo $sStyleReadLab_importeelc4; ?>"><?php echo $this->form_format_readonly("importeelc4", $this->form_encode_input($this->importeelc4)); ?></span><span id="id_read_off_importeelc4" class="css_read_off_importeelc4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelc4; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelc4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelc4" type=text name="importeelc4" value="<?php echo $this->form_encode_input($importeelc4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelc4']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelc4']['format_pos'] || 3 == $this->field_config['importeelc4']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc4']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc4']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelc4']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelc4']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepc4']))
    {
        $this->nm_new_label['importeepc4'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepc4 = $this->importeepc4;
   $sStyleHidden_importeepc4 = '';
   if (isset($this->nmgp_cmp_hidden['importeepc4']) && $this->nmgp_cmp_hidden['importeepc4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepc4']);
       $sStyleHidden_importeepc4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepc4 = 'display: none;';
   $sStyleReadInp_importeepc4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepc4']) && $this->nmgp_cmp_readonly['importeepc4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepc4']);
       $sStyleReadLab_importeepc4 = '';
       $sStyleReadInp_importeepc4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepc4']) && $this->nmgp_cmp_hidden['importeepc4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepc4" value="<?php echo $this->form_encode_input($importeepc4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepc4_line" id="hidden_field_data_importeepc4" style="<?php echo $sStyleHidden_importeepc4; ?>"> <span class="scFormLabelOddFormat css_importeepc4_label" style=""><span id="id_label_importeepc4"><?php echo $this->nm_new_label['importeepc4']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc4'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepc4"]) &&  $this->nmgp_cmp_readonly["importeepc4"] == "on") { 

 ?>
<input type="hidden" name="importeepc4" value="<?php echo $this->form_encode_input($importeepc4) . "\">" . $importeepc4 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepc4" class="sc-ui-readonly-importeepc4 css_importeepc4_line" style="<?php echo $sStyleReadLab_importeepc4; ?>"><?php echo $this->form_format_readonly("importeepc4", $this->form_encode_input($this->importeepc4)); ?></span><span id="id_read_off_importeepc4" class="css_read_off_importeepc4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepc4; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepc4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepc4" type=text name="importeepc4" value="<?php echo $this->form_encode_input($importeepc4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepc4']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepc4']['format_pos'] || 3 == $this->field_config['importeepc4']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc4']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc4']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepc4']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepc4']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['c5']))
           {
               $this->nmgp_cmp_readonly['c5'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusc4']))
    {
        $this->nm_new_label['estatusc4'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusc4 = $this->estatusc4;
   $sStyleHidden_estatusc4 = '';
   if (isset($this->nmgp_cmp_hidden['estatusc4']) && $this->nmgp_cmp_hidden['estatusc4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusc4']);
       $sStyleHidden_estatusc4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusc4 = 'display: none;';
   $sStyleReadInp_estatusc4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusc4']) && $this->nmgp_cmp_readonly['estatusc4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusc4']);
       $sStyleReadLab_estatusc4 = '';
       $sStyleReadInp_estatusc4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusc4']) && $this->nmgp_cmp_hidden['estatusc4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusc4" value="<?php echo $this->form_encode_input($estatusc4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusc4_line" id="hidden_field_data_estatusc4" style="<?php echo $sStyleHidden_estatusc4; ?>"> <span class="scFormLabelOddFormat css_estatusc4_label" style=""><span id="id_label_estatusc4"><?php echo $this->nm_new_label['estatusc4']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc4'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusc4"]) &&  $this->nmgp_cmp_readonly["estatusc4"] == "on") { 

 if ("1" == $this->estatusc4) { $estatusc4_look = "Activo";} 
 if ("0" == $this->estatusc4) { $estatusc4_look = "Inactivo";} 
?>
<input type="hidden" name="estatusc4" value="<?php echo $this->form_encode_input($estatusc4) . "\">" . $estatusc4_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusc4) { $estatusc4_look = "Activo";} 
 if ("0" == $this->estatusc4) { $estatusc4_look = "Inactivo";} 
?>
<span id="id_read_on_estatusc4"  class="css_estatusc4_line" style="<?php echo $sStyleReadLab_estatusc4; ?>"><?php echo $this->form_format_readonly("estatusc4", $this->form_encode_input($estatusc4_look)); ?></span><span id="id_read_off_estatusc4" class="css_read_off_estatusc4 css_estatusc4_line" style="<?php echo $sStyleReadInp_estatusc4; ?>"><div id="idAjaxRadio_estatusc4" style="display: inline-block"  class="css_estatusc4_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusc4_line"><?php $tempOptionId = "id-opt-estatusc4" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc4 sc-ui-radio-estatusc4" type=radio name="estatusc4" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc4'][] = '1'; ?>
<?php  if ("1" == $this->estatusc4)  { echo " checked" ;} ?><?php  if (empty($this->estatusc4)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusc4_line"><?php $tempOptionId = "id-opt-estatusc4" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc4 sc-ui-radio-estatusc4" type=radio name="estatusc4" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc4'][] = '0'; ?>
<?php  if ("0" == $this->estatusc4)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['c5']))
    {
        $this->nm_new_label['c5'] = "C5";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $c5 = $this->c5;
   $sStyleHidden_c5 = '';
   if (isset($this->nmgp_cmp_hidden['c5']) && $this->nmgp_cmp_hidden['c5'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['c5']);
       $sStyleHidden_c5 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_c5 = 'display: none;';
   $sStyleReadInp_c5 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["c5"]) &&  $this->nmgp_cmp_readonly["c5"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['c5']);
       $sStyleReadLab_c5 = '';
       $sStyleReadInp_c5 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['c5']) && $this->nmgp_cmp_hidden['c5'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="c5" value="<?php echo $this->form_encode_input($c5) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_c5_line" id="hidden_field_data_c5" style="<?php echo $sStyleHidden_c5; ?>"> <span class="scFormLabelOddFormat css_c5_label" style=""><span id="id_label_c5"><?php echo $this->nm_new_label['c5']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["c5"]) &&  $this->nmgp_cmp_readonly["c5"] == "on")) { 

 ?>
<input type="hidden" name="c5" value="<?php echo $this->form_encode_input($c5) . "\"><span id=\"id_ajax_label_c5\">" . $c5 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_c5" class="sc-ui-readonly-c5 css_c5_line" style="<?php echo $sStyleReadLab_c5; ?>"><?php echo $this->form_format_readonly("c5", $this->form_encode_input($this->c5)); ?></span><span id="id_read_off_c5" class="css_read_off_c5<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_c5; ?>">
 <input class="sc-js-input scFormObjectOdd css_c5_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_c5" type=text name="c5" value="<?php echo $this->form_encode_input($c5) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importec5']))
    {
        $this->nm_new_label['importec5'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importec5 = $this->importec5;
   $sStyleHidden_importec5 = '';
   if (isset($this->nmgp_cmp_hidden['importec5']) && $this->nmgp_cmp_hidden['importec5'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importec5']);
       $sStyleHidden_importec5 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importec5 = 'display: none;';
   $sStyleReadInp_importec5 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importec5']) && $this->nmgp_cmp_readonly['importec5'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importec5']);
       $sStyleReadLab_importec5 = '';
       $sStyleReadInp_importec5 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importec5']) && $this->nmgp_cmp_hidden['importec5'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importec5" value="<?php echo $this->form_encode_input($importec5) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importec5_line" id="hidden_field_data_importec5" style="<?php echo $sStyleHidden_importec5; ?>"> <span class="scFormLabelOddFormat css_importec5_label" style=""><span id="id_label_importec5"><?php echo $this->nm_new_label['importec5']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec5']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec5'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importec5"]) &&  $this->nmgp_cmp_readonly["importec5"] == "on") { 

 ?>
<input type="hidden" name="importec5" value="<?php echo $this->form_encode_input($importec5) . "\">" . $importec5 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importec5" class="sc-ui-readonly-importec5 css_importec5_line" style="<?php echo $sStyleReadLab_importec5; ?>"><?php echo $this->form_format_readonly("importec5", $this->form_encode_input($this->importec5)); ?></span><span id="id_read_off_importec5" class="css_read_off_importec5<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importec5; ?>">
 <input class="sc-js-input scFormObjectOdd css_importec5_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importec5" type=text name="importec5" value="<?php echo $this->form_encode_input($importec5) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importec5']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importec5']['format_pos'] || 3 == $this->field_config['importec5']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importec5']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importec5']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importec5']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importec5']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelc5']))
    {
        $this->nm_new_label['importeelc5'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelc5 = $this->importeelc5;
   $sStyleHidden_importeelc5 = '';
   if (isset($this->nmgp_cmp_hidden['importeelc5']) && $this->nmgp_cmp_hidden['importeelc5'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelc5']);
       $sStyleHidden_importeelc5 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelc5 = 'display: none;';
   $sStyleReadInp_importeelc5 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelc5']) && $this->nmgp_cmp_readonly['importeelc5'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelc5']);
       $sStyleReadLab_importeelc5 = '';
       $sStyleReadInp_importeelc5 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelc5']) && $this->nmgp_cmp_hidden['importeelc5'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelc5" value="<?php echo $this->form_encode_input($importeelc5) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelc5_line" id="hidden_field_data_importeelc5" style="<?php echo $sStyleHidden_importeelc5; ?>"> <span class="scFormLabelOddFormat css_importeelc5_label" style=""><span id="id_label_importeelc5"><?php echo $this->nm_new_label['importeelc5']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc5']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc5'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelc5"]) &&  $this->nmgp_cmp_readonly["importeelc5"] == "on") { 

 ?>
<input type="hidden" name="importeelc5" value="<?php echo $this->form_encode_input($importeelc5) . "\">" . $importeelc5 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelc5" class="sc-ui-readonly-importeelc5 css_importeelc5_line" style="<?php echo $sStyleReadLab_importeelc5; ?>"><?php echo $this->form_format_readonly("importeelc5", $this->form_encode_input($this->importeelc5)); ?></span><span id="id_read_off_importeelc5" class="css_read_off_importeelc5<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelc5; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelc5_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelc5" type=text name="importeelc5" value="<?php echo $this->form_encode_input($importeelc5) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelc5']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelc5']['format_pos'] || 3 == $this->field_config['importeelc5']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc5']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc5']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelc5']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelc5']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepc5']))
    {
        $this->nm_new_label['importeepc5'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepc5 = $this->importeepc5;
   $sStyleHidden_importeepc5 = '';
   if (isset($this->nmgp_cmp_hidden['importeepc5']) && $this->nmgp_cmp_hidden['importeepc5'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepc5']);
       $sStyleHidden_importeepc5 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepc5 = 'display: none;';
   $sStyleReadInp_importeepc5 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepc5']) && $this->nmgp_cmp_readonly['importeepc5'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepc5']);
       $sStyleReadLab_importeepc5 = '';
       $sStyleReadInp_importeepc5 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepc5']) && $this->nmgp_cmp_hidden['importeepc5'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepc5" value="<?php echo $this->form_encode_input($importeepc5) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepc5_line" id="hidden_field_data_importeepc5" style="<?php echo $sStyleHidden_importeepc5; ?>"> <span class="scFormLabelOddFormat css_importeepc5_label" style=""><span id="id_label_importeepc5"><?php echo $this->nm_new_label['importeepc5']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc5']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc5'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepc5"]) &&  $this->nmgp_cmp_readonly["importeepc5"] == "on") { 

 ?>
<input type="hidden" name="importeepc5" value="<?php echo $this->form_encode_input($importeepc5) . "\">" . $importeepc5 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepc5" class="sc-ui-readonly-importeepc5 css_importeepc5_line" style="<?php echo $sStyleReadLab_importeepc5; ?>"><?php echo $this->form_format_readonly("importeepc5", $this->form_encode_input($this->importeepc5)); ?></span><span id="id_read_off_importeepc5" class="css_read_off_importeepc5<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepc5; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepc5_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepc5" type=text name="importeepc5" value="<?php echo $this->form_encode_input($importeepc5) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepc5']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepc5']['format_pos'] || 3 == $this->field_config['importeepc5']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc5']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc5']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepc5']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepc5']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['c6']))
           {
               $this->nmgp_cmp_readonly['c6'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusc5']))
    {
        $this->nm_new_label['estatusc5'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusc5 = $this->estatusc5;
   $sStyleHidden_estatusc5 = '';
   if (isset($this->nmgp_cmp_hidden['estatusc5']) && $this->nmgp_cmp_hidden['estatusc5'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusc5']);
       $sStyleHidden_estatusc5 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusc5 = 'display: none;';
   $sStyleReadInp_estatusc5 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusc5']) && $this->nmgp_cmp_readonly['estatusc5'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusc5']);
       $sStyleReadLab_estatusc5 = '';
       $sStyleReadInp_estatusc5 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusc5']) && $this->nmgp_cmp_hidden['estatusc5'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusc5" value="<?php echo $this->form_encode_input($estatusc5) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusc5_line" id="hidden_field_data_estatusc5" style="<?php echo $sStyleHidden_estatusc5; ?>"> <span class="scFormLabelOddFormat css_estatusc5_label" style=""><span id="id_label_estatusc5"><?php echo $this->nm_new_label['estatusc5']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc5']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc5'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusc5"]) &&  $this->nmgp_cmp_readonly["estatusc5"] == "on") { 

 if ("1" == $this->estatusc5) { $estatusc5_look = "Activo";} 
 if ("0" == $this->estatusc5) { $estatusc5_look = "Inactivo";} 
?>
<input type="hidden" name="estatusc5" value="<?php echo $this->form_encode_input($estatusc5) . "\">" . $estatusc5_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusc5) { $estatusc5_look = "Activo";} 
 if ("0" == $this->estatusc5) { $estatusc5_look = "Inactivo";} 
?>
<span id="id_read_on_estatusc5"  class="css_estatusc5_line" style="<?php echo $sStyleReadLab_estatusc5; ?>"><?php echo $this->form_format_readonly("estatusc5", $this->form_encode_input($estatusc5_look)); ?></span><span id="id_read_off_estatusc5" class="css_read_off_estatusc5 css_estatusc5_line" style="<?php echo $sStyleReadInp_estatusc5; ?>"><div id="idAjaxRadio_estatusc5" style="display: inline-block"  class="css_estatusc5_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusc5_line"><?php $tempOptionId = "id-opt-estatusc5" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc5 sc-ui-radio-estatusc5" type=radio name="estatusc5" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc5'][] = '1'; ?>
<?php  if ("1" == $this->estatusc5)  { echo " checked" ;} ?><?php  if (empty($this->estatusc5)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusc5_line"><?php $tempOptionId = "id-opt-estatusc5" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc5 sc-ui-radio-estatusc5" type=radio name="estatusc5" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc5'][] = '0'; ?>
<?php  if ("0" == $this->estatusc5)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['c6']))
    {
        $this->nm_new_label['c6'] = "C6";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $c6 = $this->c6;
   $sStyleHidden_c6 = '';
   if (isset($this->nmgp_cmp_hidden['c6']) && $this->nmgp_cmp_hidden['c6'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['c6']);
       $sStyleHidden_c6 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_c6 = 'display: none;';
   $sStyleReadInp_c6 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["c6"]) &&  $this->nmgp_cmp_readonly["c6"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['c6']);
       $sStyleReadLab_c6 = '';
       $sStyleReadInp_c6 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['c6']) && $this->nmgp_cmp_hidden['c6'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="c6" value="<?php echo $this->form_encode_input($c6) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_c6_line" id="hidden_field_data_c6" style="<?php echo $sStyleHidden_c6; ?>"> <span class="scFormLabelOddFormat css_c6_label" style=""><span id="id_label_c6"><?php echo $this->nm_new_label['c6']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["c6"]) &&  $this->nmgp_cmp_readonly["c6"] == "on")) { 

 ?>
<input type="hidden" name="c6" value="<?php echo $this->form_encode_input($c6) . "\"><span id=\"id_ajax_label_c6\">" . $c6 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_c6" class="sc-ui-readonly-c6 css_c6_line" style="<?php echo $sStyleReadLab_c6; ?>"><?php echo $this->form_format_readonly("c6", $this->form_encode_input($this->c6)); ?></span><span id="id_read_off_c6" class="css_read_off_c6<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_c6; ?>">
 <input class="sc-js-input scFormObjectOdd css_c6_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_c6" type=text name="c6" value="<?php echo $this->form_encode_input($c6) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importec6']))
    {
        $this->nm_new_label['importec6'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importec6 = $this->importec6;
   $sStyleHidden_importec6 = '';
   if (isset($this->nmgp_cmp_hidden['importec6']) && $this->nmgp_cmp_hidden['importec6'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importec6']);
       $sStyleHidden_importec6 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importec6 = 'display: none;';
   $sStyleReadInp_importec6 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importec6']) && $this->nmgp_cmp_readonly['importec6'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importec6']);
       $sStyleReadLab_importec6 = '';
       $sStyleReadInp_importec6 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importec6']) && $this->nmgp_cmp_hidden['importec6'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importec6" value="<?php echo $this->form_encode_input($importec6) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importec6_line" id="hidden_field_data_importec6" style="<?php echo $sStyleHidden_importec6; ?>"> <span class="scFormLabelOddFormat css_importec6_label" style=""><span id="id_label_importec6"><?php echo $this->nm_new_label['importec6']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec6']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec6'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importec6"]) &&  $this->nmgp_cmp_readonly["importec6"] == "on") { 

 ?>
<input type="hidden" name="importec6" value="<?php echo $this->form_encode_input($importec6) . "\">" . $importec6 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importec6" class="sc-ui-readonly-importec6 css_importec6_line" style="<?php echo $sStyleReadLab_importec6; ?>"><?php echo $this->form_format_readonly("importec6", $this->form_encode_input($this->importec6)); ?></span><span id="id_read_off_importec6" class="css_read_off_importec6<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importec6; ?>">
 <input class="sc-js-input scFormObjectOdd css_importec6_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importec6" type=text name="importec6" value="<?php echo $this->form_encode_input($importec6) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importec6']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importec6']['format_pos'] || 3 == $this->field_config['importec6']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importec6']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importec6']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importec6']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importec6']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelc6']))
    {
        $this->nm_new_label['importeelc6'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelc6 = $this->importeelc6;
   $sStyleHidden_importeelc6 = '';
   if (isset($this->nmgp_cmp_hidden['importeelc6']) && $this->nmgp_cmp_hidden['importeelc6'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelc6']);
       $sStyleHidden_importeelc6 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelc6 = 'display: none;';
   $sStyleReadInp_importeelc6 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelc6']) && $this->nmgp_cmp_readonly['importeelc6'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelc6']);
       $sStyleReadLab_importeelc6 = '';
       $sStyleReadInp_importeelc6 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelc6']) && $this->nmgp_cmp_hidden['importeelc6'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelc6" value="<?php echo $this->form_encode_input($importeelc6) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelc6_line" id="hidden_field_data_importeelc6" style="<?php echo $sStyleHidden_importeelc6; ?>"> <span class="scFormLabelOddFormat css_importeelc6_label" style=""><span id="id_label_importeelc6"><?php echo $this->nm_new_label['importeelc6']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc6']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc6'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelc6"]) &&  $this->nmgp_cmp_readonly["importeelc6"] == "on") { 

 ?>
<input type="hidden" name="importeelc6" value="<?php echo $this->form_encode_input($importeelc6) . "\">" . $importeelc6 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelc6" class="sc-ui-readonly-importeelc6 css_importeelc6_line" style="<?php echo $sStyleReadLab_importeelc6; ?>"><?php echo $this->form_format_readonly("importeelc6", $this->form_encode_input($this->importeelc6)); ?></span><span id="id_read_off_importeelc6" class="css_read_off_importeelc6<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelc6; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelc6_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelc6" type=text name="importeelc6" value="<?php echo $this->form_encode_input($importeelc6) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelc6']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelc6']['format_pos'] || 3 == $this->field_config['importeelc6']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc6']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc6']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelc6']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelc6']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepc6']))
    {
        $this->nm_new_label['importeepc6'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepc6 = $this->importeepc6;
   $sStyleHidden_importeepc6 = '';
   if (isset($this->nmgp_cmp_hidden['importeepc6']) && $this->nmgp_cmp_hidden['importeepc6'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepc6']);
       $sStyleHidden_importeepc6 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepc6 = 'display: none;';
   $sStyleReadInp_importeepc6 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepc6']) && $this->nmgp_cmp_readonly['importeepc6'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepc6']);
       $sStyleReadLab_importeepc6 = '';
       $sStyleReadInp_importeepc6 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepc6']) && $this->nmgp_cmp_hidden['importeepc6'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepc6" value="<?php echo $this->form_encode_input($importeepc6) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepc6_line" id="hidden_field_data_importeepc6" style="<?php echo $sStyleHidden_importeepc6; ?>"> <span class="scFormLabelOddFormat css_importeepc6_label" style=""><span id="id_label_importeepc6"><?php echo $this->nm_new_label['importeepc6']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc6']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc6'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepc6"]) &&  $this->nmgp_cmp_readonly["importeepc6"] == "on") { 

 ?>
<input type="hidden" name="importeepc6" value="<?php echo $this->form_encode_input($importeepc6) . "\">" . $importeepc6 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepc6" class="sc-ui-readonly-importeepc6 css_importeepc6_line" style="<?php echo $sStyleReadLab_importeepc6; ?>"><?php echo $this->form_format_readonly("importeepc6", $this->form_encode_input($this->importeepc6)); ?></span><span id="id_read_off_importeepc6" class="css_read_off_importeepc6<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepc6; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepc6_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepc6" type=text name="importeepc6" value="<?php echo $this->form_encode_input($importeepc6) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepc6']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepc6']['format_pos'] || 3 == $this->field_config['importeepc6']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc6']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc6']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepc6']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepc6']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['c7']))
           {
               $this->nmgp_cmp_readonly['c7'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusc6']))
    {
        $this->nm_new_label['estatusc6'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusc6 = $this->estatusc6;
   $sStyleHidden_estatusc6 = '';
   if (isset($this->nmgp_cmp_hidden['estatusc6']) && $this->nmgp_cmp_hidden['estatusc6'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusc6']);
       $sStyleHidden_estatusc6 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusc6 = 'display: none;';
   $sStyleReadInp_estatusc6 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusc6']) && $this->nmgp_cmp_readonly['estatusc6'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusc6']);
       $sStyleReadLab_estatusc6 = '';
       $sStyleReadInp_estatusc6 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusc6']) && $this->nmgp_cmp_hidden['estatusc6'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusc6" value="<?php echo $this->form_encode_input($estatusc6) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusc6_line" id="hidden_field_data_estatusc6" style="<?php echo $sStyleHidden_estatusc6; ?>"> <span class="scFormLabelOddFormat css_estatusc6_label" style=""><span id="id_label_estatusc6"><?php echo $this->nm_new_label['estatusc6']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc6']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc6'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusc6"]) &&  $this->nmgp_cmp_readonly["estatusc6"] == "on") { 

 if ("1" == $this->estatusc6) { $estatusc6_look = "Activo";} 
 if ("0" == $this->estatusc6) { $estatusc6_look = "Inactivo";} 
?>
<input type="hidden" name="estatusc6" value="<?php echo $this->form_encode_input($estatusc6) . "\">" . $estatusc6_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusc6) { $estatusc6_look = "Activo";} 
 if ("0" == $this->estatusc6) { $estatusc6_look = "Inactivo";} 
?>
<span id="id_read_on_estatusc6"  class="css_estatusc6_line" style="<?php echo $sStyleReadLab_estatusc6; ?>"><?php echo $this->form_format_readonly("estatusc6", $this->form_encode_input($estatusc6_look)); ?></span><span id="id_read_off_estatusc6" class="css_read_off_estatusc6 css_estatusc6_line" style="<?php echo $sStyleReadInp_estatusc6; ?>"><div id="idAjaxRadio_estatusc6" style="display: inline-block"  class="css_estatusc6_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusc6_line"><?php $tempOptionId = "id-opt-estatusc6" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc6 sc-ui-radio-estatusc6" type=radio name="estatusc6" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc6'][] = '1'; ?>
<?php  if ("1" == $this->estatusc6)  { echo " checked" ;} ?><?php  if (empty($this->estatusc6)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusc6_line"><?php $tempOptionId = "id-opt-estatusc6" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc6 sc-ui-radio-estatusc6" type=radio name="estatusc6" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc6'][] = '0'; ?>
<?php  if ("0" == $this->estatusc6)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['c7']))
    {
        $this->nm_new_label['c7'] = "C7";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $c7 = $this->c7;
   $sStyleHidden_c7 = '';
   if (isset($this->nmgp_cmp_hidden['c7']) && $this->nmgp_cmp_hidden['c7'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['c7']);
       $sStyleHidden_c7 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_c7 = 'display: none;';
   $sStyleReadInp_c7 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["c7"]) &&  $this->nmgp_cmp_readonly["c7"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['c7']);
       $sStyleReadLab_c7 = '';
       $sStyleReadInp_c7 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['c7']) && $this->nmgp_cmp_hidden['c7'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="c7" value="<?php echo $this->form_encode_input($c7) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_c7_line" id="hidden_field_data_c7" style="<?php echo $sStyleHidden_c7; ?>"> <span class="scFormLabelOddFormat css_c7_label" style=""><span id="id_label_c7"><?php echo $this->nm_new_label['c7']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["c7"]) &&  $this->nmgp_cmp_readonly["c7"] == "on")) { 

 ?>
<input type="hidden" name="c7" value="<?php echo $this->form_encode_input($c7) . "\"><span id=\"id_ajax_label_c7\">" . $c7 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_c7" class="sc-ui-readonly-c7 css_c7_line" style="<?php echo $sStyleReadLab_c7; ?>"><?php echo $this->form_format_readonly("c7", $this->form_encode_input($this->c7)); ?></span><span id="id_read_off_c7" class="css_read_off_c7<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_c7; ?>">
 <input class="sc-js-input scFormObjectOdd css_c7_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_c7" type=text name="c7" value="<?php echo $this->form_encode_input($c7) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importec7']))
    {
        $this->nm_new_label['importec7'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importec7 = $this->importec7;
   $sStyleHidden_importec7 = '';
   if (isset($this->nmgp_cmp_hidden['importec7']) && $this->nmgp_cmp_hidden['importec7'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importec7']);
       $sStyleHidden_importec7 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importec7 = 'display: none;';
   $sStyleReadInp_importec7 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importec7']) && $this->nmgp_cmp_readonly['importec7'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importec7']);
       $sStyleReadLab_importec7 = '';
       $sStyleReadInp_importec7 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importec7']) && $this->nmgp_cmp_hidden['importec7'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importec7" value="<?php echo $this->form_encode_input($importec7) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importec7_line" id="hidden_field_data_importec7" style="<?php echo $sStyleHidden_importec7; ?>"> <span class="scFormLabelOddFormat css_importec7_label" style=""><span id="id_label_importec7"><?php echo $this->nm_new_label['importec7']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec7']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec7'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importec7"]) &&  $this->nmgp_cmp_readonly["importec7"] == "on") { 

 ?>
<input type="hidden" name="importec7" value="<?php echo $this->form_encode_input($importec7) . "\">" . $importec7 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importec7" class="sc-ui-readonly-importec7 css_importec7_line" style="<?php echo $sStyleReadLab_importec7; ?>"><?php echo $this->form_format_readonly("importec7", $this->form_encode_input($this->importec7)); ?></span><span id="id_read_off_importec7" class="css_read_off_importec7<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importec7; ?>">
 <input class="sc-js-input scFormObjectOdd css_importec7_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importec7" type=text name="importec7" value="<?php echo $this->form_encode_input($importec7) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importec7']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importec7']['format_pos'] || 3 == $this->field_config['importec7']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importec7']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importec7']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importec7']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importec7']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelc7']))
    {
        $this->nm_new_label['importeelc7'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelc7 = $this->importeelc7;
   $sStyleHidden_importeelc7 = '';
   if (isset($this->nmgp_cmp_hidden['importeelc7']) && $this->nmgp_cmp_hidden['importeelc7'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelc7']);
       $sStyleHidden_importeelc7 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelc7 = 'display: none;';
   $sStyleReadInp_importeelc7 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelc7']) && $this->nmgp_cmp_readonly['importeelc7'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelc7']);
       $sStyleReadLab_importeelc7 = '';
       $sStyleReadInp_importeelc7 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelc7']) && $this->nmgp_cmp_hidden['importeelc7'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelc7" value="<?php echo $this->form_encode_input($importeelc7) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelc7_line" id="hidden_field_data_importeelc7" style="<?php echo $sStyleHidden_importeelc7; ?>"> <span class="scFormLabelOddFormat css_importeelc7_label" style=""><span id="id_label_importeelc7"><?php echo $this->nm_new_label['importeelc7']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc7']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc7'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelc7"]) &&  $this->nmgp_cmp_readonly["importeelc7"] == "on") { 

 ?>
<input type="hidden" name="importeelc7" value="<?php echo $this->form_encode_input($importeelc7) . "\">" . $importeelc7 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelc7" class="sc-ui-readonly-importeelc7 css_importeelc7_line" style="<?php echo $sStyleReadLab_importeelc7; ?>"><?php echo $this->form_format_readonly("importeelc7", $this->form_encode_input($this->importeelc7)); ?></span><span id="id_read_off_importeelc7" class="css_read_off_importeelc7<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelc7; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelc7_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelc7" type=text name="importeelc7" value="<?php echo $this->form_encode_input($importeelc7) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelc7']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelc7']['format_pos'] || 3 == $this->field_config['importeelc7']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc7']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc7']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelc7']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelc7']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepc7']))
    {
        $this->nm_new_label['importeepc7'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepc7 = $this->importeepc7;
   $sStyleHidden_importeepc7 = '';
   if (isset($this->nmgp_cmp_hidden['importeepc7']) && $this->nmgp_cmp_hidden['importeepc7'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepc7']);
       $sStyleHidden_importeepc7 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepc7 = 'display: none;';
   $sStyleReadInp_importeepc7 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepc7']) && $this->nmgp_cmp_readonly['importeepc7'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepc7']);
       $sStyleReadLab_importeepc7 = '';
       $sStyleReadInp_importeepc7 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepc7']) && $this->nmgp_cmp_hidden['importeepc7'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepc7" value="<?php echo $this->form_encode_input($importeepc7) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepc7_line" id="hidden_field_data_importeepc7" style="<?php echo $sStyleHidden_importeepc7; ?>"> <span class="scFormLabelOddFormat css_importeepc7_label" style=""><span id="id_label_importeepc7"><?php echo $this->nm_new_label['importeepc7']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc7']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc7'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepc7"]) &&  $this->nmgp_cmp_readonly["importeepc7"] == "on") { 

 ?>
<input type="hidden" name="importeepc7" value="<?php echo $this->form_encode_input($importeepc7) . "\">" . $importeepc7 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepc7" class="sc-ui-readonly-importeepc7 css_importeepc7_line" style="<?php echo $sStyleReadLab_importeepc7; ?>"><?php echo $this->form_format_readonly("importeepc7", $this->form_encode_input($this->importeepc7)); ?></span><span id="id_read_off_importeepc7" class="css_read_off_importeepc7<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepc7; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepc7_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepc7" type=text name="importeepc7" value="<?php echo $this->form_encode_input($importeepc7) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepc7']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepc7']['format_pos'] || 3 == $this->field_config['importeepc7']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc7']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc7']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepc7']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepc7']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['c8']))
           {
               $this->nmgp_cmp_readonly['c8'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusc7']))
    {
        $this->nm_new_label['estatusc7'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusc7 = $this->estatusc7;
   $sStyleHidden_estatusc7 = '';
   if (isset($this->nmgp_cmp_hidden['estatusc7']) && $this->nmgp_cmp_hidden['estatusc7'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusc7']);
       $sStyleHidden_estatusc7 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusc7 = 'display: none;';
   $sStyleReadInp_estatusc7 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusc7']) && $this->nmgp_cmp_readonly['estatusc7'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusc7']);
       $sStyleReadLab_estatusc7 = '';
       $sStyleReadInp_estatusc7 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusc7']) && $this->nmgp_cmp_hidden['estatusc7'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusc7" value="<?php echo $this->form_encode_input($estatusc7) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusc7_line" id="hidden_field_data_estatusc7" style="<?php echo $sStyleHidden_estatusc7; ?>"> <span class="scFormLabelOddFormat css_estatusc7_label" style=""><span id="id_label_estatusc7"><?php echo $this->nm_new_label['estatusc7']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc7']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc7'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusc7"]) &&  $this->nmgp_cmp_readonly["estatusc7"] == "on") { 

 if ("1" == $this->estatusc7) { $estatusc7_look = "Activo";} 
 if ("0" == $this->estatusc7) { $estatusc7_look = "Inactivo";} 
?>
<input type="hidden" name="estatusc7" value="<?php echo $this->form_encode_input($estatusc7) . "\">" . $estatusc7_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusc7) { $estatusc7_look = "Activo";} 
 if ("0" == $this->estatusc7) { $estatusc7_look = "Inactivo";} 
?>
<span id="id_read_on_estatusc7"  class="css_estatusc7_line" style="<?php echo $sStyleReadLab_estatusc7; ?>"><?php echo $this->form_format_readonly("estatusc7", $this->form_encode_input($estatusc7_look)); ?></span><span id="id_read_off_estatusc7" class="css_read_off_estatusc7 css_estatusc7_line" style="<?php echo $sStyleReadInp_estatusc7; ?>"><div id="idAjaxRadio_estatusc7" style="display: inline-block"  class="css_estatusc7_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusc7_line"><?php $tempOptionId = "id-opt-estatusc7" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc7 sc-ui-radio-estatusc7" type=radio name="estatusc7" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc7'][] = '1'; ?>
<?php  if ("1" == $this->estatusc7)  { echo " checked" ;} ?><?php  if (empty($this->estatusc7)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusc7_line"><?php $tempOptionId = "id-opt-estatusc7" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc7 sc-ui-radio-estatusc7" type=radio name="estatusc7" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc7'][] = '0'; ?>
<?php  if ("0" == $this->estatusc7)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['c8']))
    {
        $this->nm_new_label['c8'] = "C8";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $c8 = $this->c8;
   $sStyleHidden_c8 = '';
   if (isset($this->nmgp_cmp_hidden['c8']) && $this->nmgp_cmp_hidden['c8'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['c8']);
       $sStyleHidden_c8 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_c8 = 'display: none;';
   $sStyleReadInp_c8 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["c8"]) &&  $this->nmgp_cmp_readonly["c8"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['c8']);
       $sStyleReadLab_c8 = '';
       $sStyleReadInp_c8 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['c8']) && $this->nmgp_cmp_hidden['c8'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="c8" value="<?php echo $this->form_encode_input($c8) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_c8_line" id="hidden_field_data_c8" style="<?php echo $sStyleHidden_c8; ?>"> <span class="scFormLabelOddFormat css_c8_label" style=""><span id="id_label_c8"><?php echo $this->nm_new_label['c8']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["c8"]) &&  $this->nmgp_cmp_readonly["c8"] == "on")) { 

 ?>
<input type="hidden" name="c8" value="<?php echo $this->form_encode_input($c8) . "\"><span id=\"id_ajax_label_c8\">" . $c8 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_c8" class="sc-ui-readonly-c8 css_c8_line" style="<?php echo $sStyleReadLab_c8; ?>"><?php echo $this->form_format_readonly("c8", $this->form_encode_input($this->c8)); ?></span><span id="id_read_off_c8" class="css_read_off_c8<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_c8; ?>">
 <input class="sc-js-input scFormObjectOdd css_c8_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_c8" type=text name="c8" value="<?php echo $this->form_encode_input($c8) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelc8']))
    {
        $this->nm_new_label['importeelc8'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelc8 = $this->importeelc8;
   $sStyleHidden_importeelc8 = '';
   if (isset($this->nmgp_cmp_hidden['importeelc8']) && $this->nmgp_cmp_hidden['importeelc8'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelc8']);
       $sStyleHidden_importeelc8 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelc8 = 'display: none;';
   $sStyleReadInp_importeelc8 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelc8']) && $this->nmgp_cmp_readonly['importeelc8'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelc8']);
       $sStyleReadLab_importeelc8 = '';
       $sStyleReadInp_importeelc8 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelc8']) && $this->nmgp_cmp_hidden['importeelc8'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelc8" value="<?php echo $this->form_encode_input($importeelc8) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelc8_line" id="hidden_field_data_importeelc8" style="<?php echo $sStyleHidden_importeelc8; ?>"> <span class="scFormLabelOddFormat css_importeelc8_label" style=""><span id="id_label_importeelc8"><?php echo $this->nm_new_label['importeelc8']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc8']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc8'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelc8"]) &&  $this->nmgp_cmp_readonly["importeelc8"] == "on") { 

 ?>
<input type="hidden" name="importeelc8" value="<?php echo $this->form_encode_input($importeelc8) . "\">" . $importeelc8 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelc8" class="sc-ui-readonly-importeelc8 css_importeelc8_line" style="<?php echo $sStyleReadLab_importeelc8; ?>"><?php echo $this->form_format_readonly("importeelc8", $this->form_encode_input($this->importeelc8)); ?></span><span id="id_read_off_importeelc8" class="css_read_off_importeelc8<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelc8; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelc8_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelc8" type=text name="importeelc8" value="<?php echo $this->form_encode_input($importeelc8) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelc8']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelc8']['format_pos'] || 3 == $this->field_config['importeelc8']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc8']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc8']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelc8']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelc8']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importec8']))
    {
        $this->nm_new_label['importec8'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importec8 = $this->importec8;
   $sStyleHidden_importec8 = '';
   if (isset($this->nmgp_cmp_hidden['importec8']) && $this->nmgp_cmp_hidden['importec8'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importec8']);
       $sStyleHidden_importec8 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importec8 = 'display: none;';
   $sStyleReadInp_importec8 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importec8']) && $this->nmgp_cmp_readonly['importec8'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importec8']);
       $sStyleReadLab_importec8 = '';
       $sStyleReadInp_importec8 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importec8']) && $this->nmgp_cmp_hidden['importec8'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importec8" value="<?php echo $this->form_encode_input($importec8) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importec8_line" id="hidden_field_data_importec8" style="<?php echo $sStyleHidden_importec8; ?>"> <span class="scFormLabelOddFormat css_importec8_label" style=""><span id="id_label_importec8"><?php echo $this->nm_new_label['importec8']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec8']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec8'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importec8"]) &&  $this->nmgp_cmp_readonly["importec8"] == "on") { 

 ?>
<input type="hidden" name="importec8" value="<?php echo $this->form_encode_input($importec8) . "\">" . $importec8 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importec8" class="sc-ui-readonly-importec8 css_importec8_line" style="<?php echo $sStyleReadLab_importec8; ?>"><?php echo $this->form_format_readonly("importec8", $this->form_encode_input($this->importec8)); ?></span><span id="id_read_off_importec8" class="css_read_off_importec8<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importec8; ?>">
 <input class="sc-js-input scFormObjectOdd css_importec8_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importec8" type=text name="importec8" value="<?php echo $this->form_encode_input($importec8) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importec8']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importec8']['format_pos'] || 3 == $this->field_config['importec8']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importec8']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importec8']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importec8']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importec8']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepc8']))
    {
        $this->nm_new_label['importeepc8'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepc8 = $this->importeepc8;
   $sStyleHidden_importeepc8 = '';
   if (isset($this->nmgp_cmp_hidden['importeepc8']) && $this->nmgp_cmp_hidden['importeepc8'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepc8']);
       $sStyleHidden_importeepc8 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepc8 = 'display: none;';
   $sStyleReadInp_importeepc8 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepc8']) && $this->nmgp_cmp_readonly['importeepc8'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepc8']);
       $sStyleReadLab_importeepc8 = '';
       $sStyleReadInp_importeepc8 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepc8']) && $this->nmgp_cmp_hidden['importeepc8'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepc8" value="<?php echo $this->form_encode_input($importeepc8) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepc8_line" id="hidden_field_data_importeepc8" style="<?php echo $sStyleHidden_importeepc8; ?>"> <span class="scFormLabelOddFormat css_importeepc8_label" style=""><span id="id_label_importeepc8"><?php echo $this->nm_new_label['importeepc8']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc8']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc8'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepc8"]) &&  $this->nmgp_cmp_readonly["importeepc8"] == "on") { 

 ?>
<input type="hidden" name="importeepc8" value="<?php echo $this->form_encode_input($importeepc8) . "\">" . $importeepc8 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepc8" class="sc-ui-readonly-importeepc8 css_importeepc8_line" style="<?php echo $sStyleReadLab_importeepc8; ?>"><?php echo $this->form_format_readonly("importeepc8", $this->form_encode_input($this->importeepc8)); ?></span><span id="id_read_off_importeepc8" class="css_read_off_importeepc8<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepc8; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepc8_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepc8" type=text name="importeepc8" value="<?php echo $this->form_encode_input($importeepc8) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepc8']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepc8']['format_pos'] || 3 == $this->field_config['importeepc8']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc8']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc8']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepc8']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepc8']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['c9']))
           {
               $this->nmgp_cmp_readonly['c9'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estatusc8']))
    {
        $this->nm_new_label['estatusc8'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusc8 = $this->estatusc8;
   $sStyleHidden_estatusc8 = '';
   if (isset($this->nmgp_cmp_hidden['estatusc8']) && $this->nmgp_cmp_hidden['estatusc8'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusc8']);
       $sStyleHidden_estatusc8 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusc8 = 'display: none;';
   $sStyleReadInp_estatusc8 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusc8']) && $this->nmgp_cmp_readonly['estatusc8'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusc8']);
       $sStyleReadLab_estatusc8 = '';
       $sStyleReadInp_estatusc8 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusc8']) && $this->nmgp_cmp_hidden['estatusc8'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusc8" value="<?php echo $this->form_encode_input($estatusc8) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusc8_line" id="hidden_field_data_estatusc8" style="<?php echo $sStyleHidden_estatusc8; ?>"> <span class="scFormLabelOddFormat css_estatusc8_label" style=""><span id="id_label_estatusc8"><?php echo $this->nm_new_label['estatusc8']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc8']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc8'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusc8"]) &&  $this->nmgp_cmp_readonly["estatusc8"] == "on") { 

 if ("1" == $this->estatusc8) { $estatusc8_look = "Activo";} 
 if ("0" == $this->estatusc8) { $estatusc8_look = "Inactivo";} 
?>
<input type="hidden" name="estatusc8" value="<?php echo $this->form_encode_input($estatusc8) . "\">" . $estatusc8_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusc8) { $estatusc8_look = "Activo";} 
 if ("0" == $this->estatusc8) { $estatusc8_look = "Inactivo";} 
?>
<span id="id_read_on_estatusc8"  class="css_estatusc8_line" style="<?php echo $sStyleReadLab_estatusc8; ?>"><?php echo $this->form_format_readonly("estatusc8", $this->form_encode_input($estatusc8_look)); ?></span><span id="id_read_off_estatusc8" class="css_read_off_estatusc8 css_estatusc8_line" style="<?php echo $sStyleReadInp_estatusc8; ?>"><div id="idAjaxRadio_estatusc8" style="display: inline-block"  class="css_estatusc8_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusc8_line"><?php $tempOptionId = "id-opt-estatusc8" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc8 sc-ui-radio-estatusc8" type=radio name="estatusc8" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc8'][] = '1'; ?>
<?php  if ("1" == $this->estatusc8)  { echo " checked" ;} ?><?php  if (empty($this->estatusc8)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusc8_line"><?php $tempOptionId = "id-opt-estatusc8" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc8 sc-ui-radio-estatusc8" type=radio name="estatusc8" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc8'][] = '0'; ?>
<?php  if ("0" == $this->estatusc8)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['c9']))
    {
        $this->nm_new_label['c9'] = "C9";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $c9 = $this->c9;
   $sStyleHidden_c9 = '';
   if (isset($this->nmgp_cmp_hidden['c9']) && $this->nmgp_cmp_hidden['c9'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['c9']);
       $sStyleHidden_c9 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_c9 = 'display: none;';
   $sStyleReadInp_c9 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["c9"]) &&  $this->nmgp_cmp_readonly["c9"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['c9']);
       $sStyleReadLab_c9 = '';
       $sStyleReadInp_c9 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['c9']) && $this->nmgp_cmp_hidden['c9'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="c9" value="<?php echo $this->form_encode_input($c9) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_c9_line" id="hidden_field_data_c9" style="<?php echo $sStyleHidden_c9; ?>"> <span class="scFormLabelOddFormat css_c9_label" style=""><span id="id_label_c9"><?php echo $this->nm_new_label['c9']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["c9"]) &&  $this->nmgp_cmp_readonly["c9"] == "on")) { 

 ?>
<input type="hidden" name="c9" value="<?php echo $this->form_encode_input($c9) . "\"><span id=\"id_ajax_label_c9\">" . $c9 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_c9" class="sc-ui-readonly-c9 css_c9_line" style="<?php echo $sStyleReadLab_c9; ?>"><?php echo $this->form_format_readonly("c9", $this->form_encode_input($this->c9)); ?></span><span id="id_read_off_c9" class="css_read_off_c9<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_c9; ?>">
 <input class="sc-js-input scFormObjectOdd css_c9_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_c9" type=text name="c9" value="<?php echo $this->form_encode_input($c9) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importec9']))
    {
        $this->nm_new_label['importec9'] = "Importe";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importec9 = $this->importec9;
   $sStyleHidden_importec9 = '';
   if (isset($this->nmgp_cmp_hidden['importec9']) && $this->nmgp_cmp_hidden['importec9'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importec9']);
       $sStyleHidden_importec9 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importec9 = 'display: none;';
   $sStyleReadInp_importec9 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importec9']) && $this->nmgp_cmp_readonly['importec9'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importec9']);
       $sStyleReadLab_importec9 = '';
       $sStyleReadInp_importec9 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importec9']) && $this->nmgp_cmp_hidden['importec9'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importec9" value="<?php echo $this->form_encode_input($importec9) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importec9_line" id="hidden_field_data_importec9" style="<?php echo $sStyleHidden_importec9; ?>"> <span class="scFormLabelOddFormat css_importec9_label" style=""><span id="id_label_importec9"><?php echo $this->nm_new_label['importec9']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec9']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importec9'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importec9"]) &&  $this->nmgp_cmp_readonly["importec9"] == "on") { 

 ?>
<input type="hidden" name="importec9" value="<?php echo $this->form_encode_input($importec9) . "\">" . $importec9 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importec9" class="sc-ui-readonly-importec9 css_importec9_line" style="<?php echo $sStyleReadLab_importec9; ?>"><?php echo $this->form_format_readonly("importec9", $this->form_encode_input($this->importec9)); ?></span><span id="id_read_off_importec9" class="css_read_off_importec9<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importec9; ?>">
 <input class="sc-js-input scFormObjectOdd css_importec9_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importec9" type=text name="importec9" value="<?php echo $this->form_encode_input($importec9) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importec9']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importec9']['format_pos'] || 3 == $this->field_config['importec9']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importec9']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importec9']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importec9']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importec9']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeelc9']))
    {
        $this->nm_new_label['importeelc9'] = "Importe EEL";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeelc9 = $this->importeelc9;
   $sStyleHidden_importeelc9 = '';
   if (isset($this->nmgp_cmp_hidden['importeelc9']) && $this->nmgp_cmp_hidden['importeelc9'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeelc9']);
       $sStyleHidden_importeelc9 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeelc9 = 'display: none;';
   $sStyleReadInp_importeelc9 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeelc9']) && $this->nmgp_cmp_readonly['importeelc9'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeelc9']);
       $sStyleReadLab_importeelc9 = '';
       $sStyleReadInp_importeelc9 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeelc9']) && $this->nmgp_cmp_hidden['importeelc9'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeelc9" value="<?php echo $this->form_encode_input($importeelc9) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeelc9_line" id="hidden_field_data_importeelc9" style="<?php echo $sStyleHidden_importeelc9; ?>"> <span class="scFormLabelOddFormat css_importeelc9_label" style=""><span id="id_label_importeelc9"><?php echo $this->nm_new_label['importeelc9']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc9']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeelc9'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeelc9"]) &&  $this->nmgp_cmp_readonly["importeelc9"] == "on") { 

 ?>
<input type="hidden" name="importeelc9" value="<?php echo $this->form_encode_input($importeelc9) . "\">" . $importeelc9 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeelc9" class="sc-ui-readonly-importeelc9 css_importeelc9_line" style="<?php echo $sStyleReadLab_importeelc9; ?>"><?php echo $this->form_format_readonly("importeelc9", $this->form_encode_input($this->importeelc9)); ?></span><span id="id_read_off_importeelc9" class="css_read_off_importeelc9<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeelc9; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeelc9_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeelc9" type=text name="importeelc9" value="<?php echo $this->form_encode_input($importeelc9) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeelc9']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeelc9']['format_pos'] || 3 == $this->field_config['importeelc9']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc9']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeelc9']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeelc9']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeelc9']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importeepc9']))
    {
        $this->nm_new_label['importeepc9'] = "Importe EEP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importeepc9 = $this->importeepc9;
   $sStyleHidden_importeepc9 = '';
   if (isset($this->nmgp_cmp_hidden['importeepc9']) && $this->nmgp_cmp_hidden['importeepc9'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importeepc9']);
       $sStyleHidden_importeepc9 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importeepc9 = 'display: none;';
   $sStyleReadInp_importeepc9 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importeepc9']) && $this->nmgp_cmp_readonly['importeepc9'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importeepc9']);
       $sStyleReadLab_importeepc9 = '';
       $sStyleReadInp_importeepc9 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importeepc9']) && $this->nmgp_cmp_hidden['importeepc9'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importeepc9" value="<?php echo $this->form_encode_input($importeepc9) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importeepc9_line" id="hidden_field_data_importeepc9" style="<?php echo $sStyleHidden_importeepc9; ?>"> <span class="scFormLabelOddFormat css_importeepc9_label" style=""><span id="id_label_importeepc9"><?php echo $this->nm_new_label['importeepc9']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc9']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['importeepc9'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importeepc9"]) &&  $this->nmgp_cmp_readonly["importeepc9"] == "on") { 

 ?>
<input type="hidden" name="importeepc9" value="<?php echo $this->form_encode_input($importeepc9) . "\">" . $importeepc9 . ""; ?>
<?php } else { ?>
<span id="id_read_on_importeepc9" class="sc-ui-readonly-importeepc9 css_importeepc9_line" style="<?php echo $sStyleReadLab_importeepc9; ?>"><?php echo $this->form_format_readonly("importeepc9", $this->form_encode_input($this->importeepc9)); ?></span><span id="id_read_off_importeepc9" class="css_read_off_importeepc9<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importeepc9; ?>">
 <input class="sc-js-input scFormObjectOdd css_importeepc9_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importeepc9" type=text name="importeepc9" value="<?php echo $this->form_encode_input($importeepc9) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importeepc9']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importeepc9']['format_pos'] || 3 == $this->field_config['importeepc9']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc9']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importeepc9']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importeepc9']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importeepc9']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ ', alignment: 'left'}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estatusc9']))
    {
        $this->nm_new_label['estatusc9'] = "Estatus";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatusc9 = $this->estatusc9;
   $sStyleHidden_estatusc9 = '';
   if (isset($this->nmgp_cmp_hidden['estatusc9']) && $this->nmgp_cmp_hidden['estatusc9'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatusc9']);
       $sStyleHidden_estatusc9 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatusc9 = 'display: none;';
   $sStyleReadInp_estatusc9 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatusc9']) && $this->nmgp_cmp_readonly['estatusc9'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatusc9']);
       $sStyleReadLab_estatusc9 = '';
       $sStyleReadInp_estatusc9 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatusc9']) && $this->nmgp_cmp_hidden['estatusc9'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatusc9" value="<?php echo $this->form_encode_input($estatusc9) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatusc9_line" id="hidden_field_data_estatusc9" style="<?php echo $sStyleHidden_estatusc9; ?>"> <span class="scFormLabelOddFormat css_estatusc9_label" style=""><span id="id_label_estatusc9"><?php echo $this->nm_new_label['estatusc9']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc9']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['php_cmp_required']['estatusc9'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatusc9"]) &&  $this->nmgp_cmp_readonly["estatusc9"] == "on") { 

 if ("1" == $this->estatusc9) { $estatusc9_look = "Activo";} 
 if ("0" == $this->estatusc9) { $estatusc9_look = "Inactivo";} 
?>
<input type="hidden" name="estatusc9" value="<?php echo $this->form_encode_input($estatusc9) . "\">" . $estatusc9_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->estatusc9) { $estatusc9_look = "Activo";} 
 if ("0" == $this->estatusc9) { $estatusc9_look = "Inactivo";} 
?>
<span id="id_read_on_estatusc9"  class="css_estatusc9_line" style="<?php echo $sStyleReadLab_estatusc9; ?>"><?php echo $this->form_format_readonly("estatusc9", $this->form_encode_input($estatusc9_look)); ?></span><span id="id_read_off_estatusc9" class="css_read_off_estatusc9 css_estatusc9_line" style="<?php echo $sStyleReadInp_estatusc9; ?>"><div id="idAjaxRadio_estatusc9" style="display: inline-block"  class="css_estatusc9_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_estatusc9_line"><?php $tempOptionId = "id-opt-estatusc9" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc9 sc-ui-radio-estatusc9" type=radio name="estatusc9" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc9'][] = '1'; ?>
<?php  if ("1" == $this->estatusc9)  { echo " checked" ;} ?><?php  if (empty($this->estatusc9)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Activo</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_estatusc9_line"><?php $tempOptionId = "id-opt-estatusc9" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-estatusc9 sc-ui-radio-estatusc9" type=radio name="estatusc9" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['Lookup_estatusc9'][] = '0'; ?>
<?php  if ("0" == $this->estatusc9)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Inactivo</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['ok']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['ok']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['ok']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['ok']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['ok'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['btn_label']['exit'];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("control_formtarifa_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("control_formtarifa_mob");
 parent.scAjaxDetailHeight("control_formtarifa_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("control_formtarifa_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("control_formtarifa_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['sc_modal'])
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
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-1").length && $("#sub_form_b.sc-unique-btn-1").is(":visible")) {
		    if ($("#sub_form_b.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza('alterar');
			 return;
		}
		if ($("#sub_form_b.sc-unique-btn-4").length && $("#sub_form_b.sc-unique-btn-4").is(":visible")) {
		    if ($("#sub_form_b.sc-unique-btn-4").hasClass("disabled")) {
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
		if ($("#Bsair_b.sc-unique-btn-5").length && $("#Bsair_b.sc-unique-btn-5").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-6").length && $("#Bsair_b.sc-unique-btn-6").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-6").hasClass("disabled")) {
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['buttonStatus'] = $this->nmgp_botoes;
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
