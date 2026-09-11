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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags(""); } else { echo strip_tags("SCT"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>menu_sct/menu_sct_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("menu_sct_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['last'] : 'off'); ?>";
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

 function setElements(elements) {
  //elementos = elements;
  
  //console.log(elements);
 } // setElements
<?php

include_once('menu_sct_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  sc_form_onload();

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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/peaje_module_ui.css?v=20260911-ui" />
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['link_info']['remove_border']) {
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
 include_once("menu_sct_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['menu_sct'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['menu_sct'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['empty_filter'] = true;
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
   if (!isset($this->nm_new_label['formato']))
   {
       $this->nm_new_label['formato'] = "FORMATO";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $formato = $this->formato;
   $sStyleHidden_formato = '';
   if (isset($this->nmgp_cmp_hidden['formato']) && $this->nmgp_cmp_hidden['formato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['formato']);
       $sStyleHidden_formato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_formato = 'display: none;';
   $sStyleReadInp_formato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['formato']) && $this->nmgp_cmp_readonly['formato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['formato']);
       $sStyleReadLab_formato = '';
       $sStyleReadInp_formato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['formato']) && $this->nmgp_cmp_hidden['formato'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="formato" value="<?php echo $this->form_encode_input($this->formato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_formato_label" id="hidden_field_label_formato" style="<?php echo $sStyleHidden_formato; ?>"><span id="id_label_formato"><?php echo $this->nm_new_label['formato']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['php_cmp_required']['formato']) || $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['php_cmp_required']['formato'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_formato_line" id="hidden_field_data_formato" style="<?php echo $sStyleHidden_formato; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["formato"]) &&  $this->nmgp_cmp_readonly["formato"] == "on") { 

$formato_look = "";
 if ($this->formato == "1") { $formato_look .= "IBIM" ;} 
 if ($this->formato == "2") { $formato_look .= "IBVPM" ;} 
 if ($this->formato == "5") { $formato_look .= "IDMN" ;} 
 if ($this->formato == "3") { $formato_look .= "IDTCNM" ;} 
 if ($this->formato == "6") { $formato_look .= "VACM" ;} 
 if ($this->formato == "7") { $formato_look .= "VDMN" ;} 
 if ($this->formato == "4") { $formato_look .= "VDTCNM" ;} 
 if ($this->formato == "8") { $formato_look .= "VDTMNM" ;} 
 if ($this->formato == "9") { $formato_look .= "VHMD" ;} 
 if (empty($formato_look)) { $formato_look = $this->formato; }
?>
<input type="hidden" name="formato" value="<?php echo $this->form_encode_input($formato) . "\">" . $formato_look . ""; ?>
<?php } else { ?>
<?php

$formato_look = "";
 if ($this->formato == "1") { $formato_look .= "IBIM" ;} 
 if ($this->formato == "2") { $formato_look .= "IBVPM" ;} 
 if ($this->formato == "5") { $formato_look .= "IDMN" ;} 
 if ($this->formato == "3") { $formato_look .= "IDTCNM" ;} 
 if ($this->formato == "6") { $formato_look .= "VACM" ;} 
 if ($this->formato == "7") { $formato_look .= "VDMN" ;} 
 if ($this->formato == "4") { $formato_look .= "VDTCNM" ;} 
 if ($this->formato == "8") { $formato_look .= "VDTMNM" ;} 
 if ($this->formato == "9") { $formato_look .= "VHMD" ;} 
 if (empty($formato_look)) { $formato_look = $this->formato; }
?>
<span id="id_read_on_formato" class="css_formato_line"  style="<?php echo $sStyleReadLab_formato; ?>"><?php echo $this->form_format_readonly("formato", $this->form_encode_input($formato_look)); ?></span><span id="id_read_off_formato" class="css_read_off_formato<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_formato; ?>">
 <span id="idAjaxSelect_formato" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_formato_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_formato" name="formato" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->formato == "1") { echo " selected" ;} ?><?php  if (empty($this->formato)) { echo " selected" ;} ?>>IBIM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_formato'][] = '1'; ?>
 <option  value="2" <?php  if ($this->formato == "2") { echo " selected" ;} ?>>IBVPM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_formato'][] = '2'; ?>
 <option  value="5" <?php  if ($this->formato == "5") { echo " selected" ;} ?>>IDMN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_formato'][] = '5'; ?>
 <option  value="3" <?php  if ($this->formato == "3") { echo " selected" ;} ?>>IDTCNM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_formato'][] = '3'; ?>
 <option  value="6" <?php  if ($this->formato == "6") { echo " selected" ;} ?>>VACM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_formato'][] = '6'; ?>
 <option  value="7" <?php  if ($this->formato == "7") { echo " selected" ;} ?>>VDMN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_formato'][] = '7'; ?>
 <option  value="4" <?php  if ($this->formato == "4") { echo " selected" ;} ?>>VDTCNM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_formato'][] = '4'; ?>
 <option  value="8" <?php  if ($this->formato == "8") { echo " selected" ;} ?>>VDTMNM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_formato'][] = '8'; ?>
 <option  value="9" <?php  if ($this->formato == "9") { echo " selected" ;} ?>>VHMD</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_formato'][] = '9'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['year']))
    {
        $this->nm_new_label['year'] = "AÑO";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $year = $this->year;
   $sStyleHidden_year = '';
   if (isset($this->nmgp_cmp_hidden['year']) && $this->nmgp_cmp_hidden['year'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['year']);
       $sStyleHidden_year = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_year = 'display: none;';
   $sStyleReadInp_year = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['year']) && $this->nmgp_cmp_readonly['year'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['year']);
       $sStyleReadLab_year = '';
       $sStyleReadInp_year = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['year']) && $this->nmgp_cmp_hidden['year'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="year" value="<?php echo $this->form_encode_input($year) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_year_label" id="hidden_field_label_year" style="<?php echo $sStyleHidden_year; ?>"><span id="id_label_year"><?php echo $this->nm_new_label['year']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['php_cmp_required']['year']) || $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['php_cmp_required']['year'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_year_line" id="hidden_field_data_year" style="<?php echo $sStyleHidden_year; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["year"]) &&  $this->nmgp_cmp_readonly["year"] == "on") { 

 ?>
<input type="hidden" name="year" value="<?php echo $this->form_encode_input($year) . "\">" . $year . ""; ?>
<?php } else { ?>
<span id="id_read_on_year" class="sc-ui-readonly-year css_year_line" style="<?php echo $sStyleReadLab_year; ?>"><?php echo $this->form_format_readonly("year", $this->form_encode_input($year)); ?></span><span id="id_read_off_year" class="css_read_off_year<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_year; ?>"><?php
$tmp_form_data = $this->field_config['year']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_year_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_year" type=text name="year" value="<?php echo $this->form_encode_input($year) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['year']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['year']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['mesini']))
   {
       $this->nm_new_label['mesini'] = "MES";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mesini = $this->mesini;
   $sStyleHidden_mesini = '';
   if (isset($this->nmgp_cmp_hidden['mesini']) && $this->nmgp_cmp_hidden['mesini'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mesini']);
       $sStyleHidden_mesini = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mesini = 'display: none;';
   $sStyleReadInp_mesini = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mesini']) && $this->nmgp_cmp_readonly['mesini'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mesini']);
       $sStyleReadLab_mesini = '';
       $sStyleReadInp_mesini = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mesini']) && $this->nmgp_cmp_hidden['mesini'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="mesini" value="<?php echo $this->form_encode_input($this->mesini) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_mesini_label" id="hidden_field_label_mesini" style="<?php echo $sStyleHidden_mesini; ?>"><span id="id_label_mesini"><?php echo $this->nm_new_label['mesini']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['php_cmp_required']['mesini']) || $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['php_cmp_required']['mesini'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_mesini_line" id="hidden_field_data_mesini" style="<?php echo $sStyleHidden_mesini; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mesini"]) &&  $this->nmgp_cmp_readonly["mesini"] == "on") { 

$mesini_look = "";
 if ($this->mesini == "1") { $mesini_look .= "01" ;} 
 if ($this->mesini == "2") { $mesini_look .= "02" ;} 
 if ($this->mesini == "3") { $mesini_look .= "03" ;} 
 if ($this->mesini == "4") { $mesini_look .= "04" ;} 
 if ($this->mesini == "5") { $mesini_look .= "05" ;} 
 if ($this->mesini == "6") { $mesini_look .= "06" ;} 
 if ($this->mesini == "7") { $mesini_look .= "07" ;} 
 if ($this->mesini == "8") { $mesini_look .= "08" ;} 
 if ($this->mesini == "9") { $mesini_look .= "09" ;} 
 if ($this->mesini == "10") { $mesini_look .= "10" ;} 
 if ($this->mesini == "11") { $mesini_look .= "11" ;} 
 if ($this->mesini == "12") { $mesini_look .= "12" ;} 
 if (empty($mesini_look)) { $mesini_look = $this->mesini; }
?>
<input type="hidden" name="mesini" value="<?php echo $this->form_encode_input($mesini) . "\">" . $mesini_look . ""; ?>
<?php } else { ?>
<?php

$mesini_look = "";
 if ($this->mesini == "1") { $mesini_look .= "01" ;} 
 if ($this->mesini == "2") { $mesini_look .= "02" ;} 
 if ($this->mesini == "3") { $mesini_look .= "03" ;} 
 if ($this->mesini == "4") { $mesini_look .= "04" ;} 
 if ($this->mesini == "5") { $mesini_look .= "05" ;} 
 if ($this->mesini == "6") { $mesini_look .= "06" ;} 
 if ($this->mesini == "7") { $mesini_look .= "07" ;} 
 if ($this->mesini == "8") { $mesini_look .= "08" ;} 
 if ($this->mesini == "9") { $mesini_look .= "09" ;} 
 if ($this->mesini == "10") { $mesini_look .= "10" ;} 
 if ($this->mesini == "11") { $mesini_look .= "11" ;} 
 if ($this->mesini == "12") { $mesini_look .= "12" ;} 
 if (empty($mesini_look)) { $mesini_look = $this->mesini; }
?>
<span id="id_read_on_mesini" class="css_mesini_line"  style="<?php echo $sStyleReadLab_mesini; ?>"><?php echo $this->form_format_readonly("mesini", $this->form_encode_input($mesini_look)); ?></span><span id="id_read_off_mesini" class="css_read_off_mesini<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_mesini; ?>">
 <span id="idAjaxSelect_mesini" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_mesini_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_mesini" name="mesini" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->mesini == "1") { echo " selected" ;} ?><?php  if (empty($this->mesini)) { echo " selected" ;} ?>>01</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '1'; ?>
 <option  value="2" <?php  if ($this->mesini == "2") { echo " selected" ;} ?>>02</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '2'; ?>
 <option  value="3" <?php  if ($this->mesini == "3") { echo " selected" ;} ?>>03</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '3'; ?>
 <option  value="4" <?php  if ($this->mesini == "4") { echo " selected" ;} ?>>04</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '4'; ?>
 <option  value="5" <?php  if ($this->mesini == "5") { echo " selected" ;} ?>>05</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '5'; ?>
 <option  value="6" <?php  if ($this->mesini == "6") { echo " selected" ;} ?>>06</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '6'; ?>
 <option  value="7" <?php  if ($this->mesini == "7") { echo " selected" ;} ?>>07</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '7'; ?>
 <option  value="8" <?php  if ($this->mesini == "8") { echo " selected" ;} ?>>08</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '8'; ?>
 <option  value="9" <?php  if ($this->mesini == "9") { echo " selected" ;} ?>>09</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '9'; ?>
 <option  value="10" <?php  if ($this->mesini == "10") { echo " selected" ;} ?>>10</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '10'; ?>
 <option  value="11" <?php  if ($this->mesini == "11") { echo " selected" ;} ?>>11</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '11'; ?>
 <option  value="12" <?php  if ($this->mesini == "12") { echo " selected" ;} ?>>12</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesini'][] = '12'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['mesfin']))
   {
       $this->nm_new_label['mesfin'] = "MES FIN";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mesfin = $this->mesfin;
   $sStyleHidden_mesfin = '';
   if (isset($this->nmgp_cmp_hidden['mesfin']) && $this->nmgp_cmp_hidden['mesfin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mesfin']);
       $sStyleHidden_mesfin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mesfin = 'display: none;';
   $sStyleReadInp_mesfin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mesfin']) && $this->nmgp_cmp_readonly['mesfin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mesfin']);
       $sStyleReadLab_mesfin = '';
       $sStyleReadInp_mesfin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mesfin']) && $this->nmgp_cmp_hidden['mesfin'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="mesfin" value="<?php echo $this->form_encode_input($this->mesfin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_mesfin_label" id="hidden_field_label_mesfin" style="<?php echo $sStyleHidden_mesfin; ?>"><span id="id_label_mesfin"><?php echo $this->nm_new_label['mesfin']; ?></span></TD>
    <TD class="scFormDataOdd css_mesfin_line" id="hidden_field_data_mesfin" style="<?php echo $sStyleHidden_mesfin; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mesfin"]) &&  $this->nmgp_cmp_readonly["mesfin"] == "on") { 

$mesfin_look = "";
 if ($this->mesfin == "1") { $mesfin_look .= "01" ;} 
 if ($this->mesfin == "2") { $mesfin_look .= "02" ;} 
 if ($this->mesfin == "3") { $mesfin_look .= "03" ;} 
 if ($this->mesfin == "4") { $mesfin_look .= "04" ;} 
 if ($this->mesfin == "5") { $mesfin_look .= "05" ;} 
 if ($this->mesfin == "6") { $mesfin_look .= "06" ;} 
 if ($this->mesfin == "7") { $mesfin_look .= "07" ;} 
 if ($this->mesfin == "8") { $mesfin_look .= "08" ;} 
 if ($this->mesfin == "9") { $mesfin_look .= "09" ;} 
 if ($this->mesfin == "10") { $mesfin_look .= "10" ;} 
 if ($this->mesfin == "11") { $mesfin_look .= "11" ;} 
 if ($this->mesfin == "12") { $mesfin_look .= "12" ;} 
 if (empty($mesfin_look)) { $mesfin_look = $this->mesfin; }
?>
<input type="hidden" name="mesfin" value="<?php echo $this->form_encode_input($mesfin) . "\">" . $mesfin_look . ""; ?>
<?php } else { ?>
<?php

$mesfin_look = "";
 if ($this->mesfin == "1") { $mesfin_look .= "01" ;} 
 if ($this->mesfin == "2") { $mesfin_look .= "02" ;} 
 if ($this->mesfin == "3") { $mesfin_look .= "03" ;} 
 if ($this->mesfin == "4") { $mesfin_look .= "04" ;} 
 if ($this->mesfin == "5") { $mesfin_look .= "05" ;} 
 if ($this->mesfin == "6") { $mesfin_look .= "06" ;} 
 if ($this->mesfin == "7") { $mesfin_look .= "07" ;} 
 if ($this->mesfin == "8") { $mesfin_look .= "08" ;} 
 if ($this->mesfin == "9") { $mesfin_look .= "09" ;} 
 if ($this->mesfin == "10") { $mesfin_look .= "10" ;} 
 if ($this->mesfin == "11") { $mesfin_look .= "11" ;} 
 if ($this->mesfin == "12") { $mesfin_look .= "12" ;} 
 if (empty($mesfin_look)) { $mesfin_look = $this->mesfin; }
?>
<span id="id_read_on_mesfin" class="css_mesfin_line"  style="<?php echo $sStyleReadLab_mesfin; ?>"><?php echo $this->form_format_readonly("mesfin", $this->form_encode_input($mesfin_look)); ?></span><span id="id_read_off_mesfin" class="css_read_off_mesfin<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_mesfin; ?>">
 <span id="idAjaxSelect_mesfin" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_mesfin_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_mesfin" name="mesfin" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->mesfin == "1") { echo " selected" ;} ?><?php  if (empty($this->mesfin)) { echo " selected" ;} ?>>01</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '1'; ?>
 <option  value="2" <?php  if ($this->mesfin == "2") { echo " selected" ;} ?>>02</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '2'; ?>
 <option  value="3" <?php  if ($this->mesfin == "3") { echo " selected" ;} ?>>03</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '3'; ?>
 <option  value="4" <?php  if ($this->mesfin == "4") { echo " selected" ;} ?>>04</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '4'; ?>
 <option  value="5" <?php  if ($this->mesfin == "5") { echo " selected" ;} ?>>05</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '5'; ?>
 <option  value="6" <?php  if ($this->mesfin == "6") { echo " selected" ;} ?>>06</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '6'; ?>
 <option  value="7" <?php  if ($this->mesfin == "7") { echo " selected" ;} ?>>07</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '7'; ?>
 <option  value="8" <?php  if ($this->mesfin == "8") { echo " selected" ;} ?>>08</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '8'; ?>
 <option  value="9" <?php  if ($this->mesfin == "9") { echo " selected" ;} ?>>09</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '9'; ?>
 <option  value="10" <?php  if ($this->mesfin == "10") { echo " selected" ;} ?>>10</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '10'; ?>
 <option  value="11" <?php  if ($this->mesfin == "11") { echo " selected" ;} ?>>11</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '11'; ?>
 <option  value="12" <?php  if ($this->mesfin == "12") { echo " selected" ;} ?>>12</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_mesfin'][] = '12'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['caseta']))
   {
       $this->nm_new_label['caseta'] = "CASETA";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $caseta = $this->caseta;
   $sStyleHidden_caseta = '';
   if (isset($this->nmgp_cmp_hidden['caseta']) && $this->nmgp_cmp_hidden['caseta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['caseta']);
       $sStyleHidden_caseta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_caseta = 'display: none;';
   $sStyleReadInp_caseta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['caseta']) && $this->nmgp_cmp_readonly['caseta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['caseta']);
       $sStyleReadLab_caseta = '';
       $sStyleReadInp_caseta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['caseta']) && $this->nmgp_cmp_hidden['caseta'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="caseta" value="<?php echo $this->form_encode_input($this->caseta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_caseta_label" id="hidden_field_label_caseta" style="<?php echo $sStyleHidden_caseta; ?>"><span id="id_label_caseta"><?php echo $this->nm_new_label['caseta']; ?></span></TD>
    <TD class="scFormDataOdd css_caseta_line" id="hidden_field_data_caseta" style="<?php echo $sStyleHidden_caseta; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["caseta"]) &&  $this->nmgp_cmp_readonly["caseta"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_caseta']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_caseta'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_caseta']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_caseta'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_caseta']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_caseta'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_caseta']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_caseta'] = array(); 
    }

   $old_value_year = $this->year;
   $old_value_mesini = $this->mesini;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_year = $this->year;
   $unformatted_value_mesini = $this->mesini;

   $nm_comando = "SELECT CasetaID, Caseta  FROM casetas  ORDER BY Caseta";

   $this->year = $old_value_year;
   $this->mesini = $old_value_mesini;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_caseta'][] = $rs->fields[0];
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
   $caseta_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->caseta_1))
          {
              foreach ($this->caseta_1 as $tmp_caseta)
              {
                  if (trim($tmp_caseta) === trim($cadaselect[1])) { $caseta_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->caseta) === trim($cadaselect[1])) { $caseta_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="caseta" value="<?php echo $this->form_encode_input($caseta) . "\">" . $caseta_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_caseta();
   $x = 0 ; 
   $caseta_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->caseta_1))
          {
              foreach ($this->caseta_1 as $tmp_caseta)
              {
                  if (trim($tmp_caseta) === trim($cadaselect[1])) { $caseta_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->caseta) === trim($cadaselect[1])) { $caseta_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($caseta_look))
          {
              $caseta_look = $this->caseta;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_caseta\" class=\"css_caseta_line\" style=\"" .  $sStyleReadLab_caseta . "\">" . $this->form_format_readonly("caseta", $this->form_encode_input($caseta_look)) . "</span><span id=\"id_read_off_caseta\" class=\"css_read_off_caseta" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_caseta . "\">";
   echo " <span id=\"idAjaxSelect_caseta\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_caseta_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_caseta\" name=\"caseta\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->caseta) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->caseta)) 
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
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sentido']))
   {
       $this->nm_new_label['sentido'] = "SENTIDO";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sentido = $this->sentido;
   $sStyleHidden_sentido = '';
   if (isset($this->nmgp_cmp_hidden['sentido']) && $this->nmgp_cmp_hidden['sentido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sentido']);
       $sStyleHidden_sentido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sentido = 'display: none;';
   $sStyleReadInp_sentido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sentido']) && $this->nmgp_cmp_readonly['sentido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sentido']);
       $sStyleReadLab_sentido = '';
       $sStyleReadInp_sentido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sentido']) && $this->nmgp_cmp_hidden['sentido'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sentido" value="<?php echo $this->form_encode_input($this->sentido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sentido_label" id="hidden_field_label_sentido" style="<?php echo $sStyleHidden_sentido; ?>"><span id="id_label_sentido"><?php echo $this->nm_new_label['sentido']; ?></span></TD>
    <TD class="scFormDataOdd css_sentido_line" id="hidden_field_data_sentido" style="<?php echo $sStyleHidden_sentido; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sentido"]) &&  $this->nmgp_cmp_readonly["sentido"] == "on") { 

$sentido_look = "";
 if ($this->sentido == "A") { $sentido_look .= "A" ;} 
 if ($this->sentido == "B") { $sentido_look .= "B" ;} 
 if (empty($sentido_look)) { $sentido_look = $this->sentido; }
?>
<input type="hidden" name="sentido" value="<?php echo $this->form_encode_input($sentido) . "\">" . $sentido_look . ""; ?>
<?php } else { ?>
<?php

$sentido_look = "";
 if ($this->sentido == "A") { $sentido_look .= "A" ;} 
 if ($this->sentido == "B") { $sentido_look .= "B" ;} 
 if (empty($sentido_look)) { $sentido_look = $this->sentido; }
?>
<span id="id_read_on_sentido" class="css_sentido_line"  style="<?php echo $sStyleReadLab_sentido; ?>"><?php echo $this->form_format_readonly("sentido", $this->form_encode_input($sentido_look)); ?></span><span id="id_read_off_sentido" class="css_read_off_sentido<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_sentido; ?>">
 <span id="idAjaxSelect_sentido" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_sentido_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sentido" name="sentido" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="A" <?php  if ($this->sentido == "A") { echo " selected" ;} ?><?php  if (empty($this->sentido)) { echo " selected" ;} ?>>A</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_sentido'][] = 'A'; ?>
 <option  value="B" <?php  if ($this->sentido == "B") { echo " selected" ;} ?>>B</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['Lookup_sentido'][] = 'B'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['ok']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['ok']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['ok']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['ok']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['ok'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['btn_label']['exit'];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("menu_sct");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("menu_sct");
 parent.scAjaxDetailHeight("menu_sct", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("menu_sct", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("menu_sct", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['menu_sct']['buttonStatus'] = $this->nmgp_botoes;
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
