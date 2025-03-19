<?php
class form_casetas_form extends form_casetas_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " autopista"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " autopista"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
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
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
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
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
 </style>
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
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_casetas/form_casetas_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("form_casetas_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_casetas_jquery.php');

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


  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

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
$str_iframe_body = 'margin-top: 1px; margin-bottom: 1px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['link_info']['remove_border']) {
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
 include_once("form_casetas_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php if (!isset($sc_check_excl)) {$sc_check_excl = array();} echo count($sc_check_excl); ?>; 
  <?php if (!isset($sc_check_incl)) {$sc_check_incl = array();}?>; 
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
<?php
$_SESSION['scriptcase']['error_span_title']['form_casetas'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_casetas'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<tr><td>
<?php
$this->displayTopToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "R")
{
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['insert'];
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
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call || $this->form_3versions_single) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_iframe'] != "R")
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
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
$orderColRule = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult sc-col-title" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php
    $sStyleHidden_casetaid_ = '';
    if (isset($this->nmgp_cmp_hidden['casetaid_']) && $this->nmgp_cmp_hidden['casetaid_'] == 'off') {
        $sStyleHidden_casetaid_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['casetaid_']) || $this->nmgp_cmp_hidden['casetaid_'] == 'on') {
        if (!isset($this->nm_new_label['casetaid_'])) {
            $this->nm_new_label['casetaid_'] = "ID";
        }
        $SC_Label = "" . $this->nm_new_label['casetaid_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_fieldName .= "&nbsp;<span class=\"scFormRequiredOddMult\">*</span>&nbsp;";
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_casetaid__label sc-col-title" id="hidden_field_label_casetaid_" style="<?php echo $sStyleHidden_casetaid_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_caseta_ = '';
    if (isset($this->nmgp_cmp_hidden['caseta_']) && $this->nmgp_cmp_hidden['caseta_'] == 'off') {
        $sStyleHidden_caseta_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['caseta_']) || $this->nmgp_cmp_hidden['caseta_'] == 'on') {
        if (!isset($this->nm_new_label['caseta_'])) {
            $this->nm_new_label['caseta_'] = "Caseta";
        }
        $SC_Label = "" . $this->nm_new_label['caseta_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_caseta__label sc-col-title" id="hidden_field_label_caseta_" style="<?php echo $sStyleHidden_caseta_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_troncal_ = '';
    if (isset($this->nmgp_cmp_hidden['troncal_']) && $this->nmgp_cmp_hidden['troncal_'] == 'off') {
        $sStyleHidden_troncal_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['troncal_']) || $this->nmgp_cmp_hidden['troncal_'] == 'on') {
        if (!isset($this->nm_new_label['troncal_'])) {
            $this->nm_new_label['troncal_'] = "Troncal";
        }
        $SC_Label = "" . $this->nm_new_label['troncal_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_troncal__label sc-col-title" id="hidden_field_label_troncal_" style="<?php echo $sStyleHidden_troncal_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_modooperacion_ = '';
    if (isset($this->nmgp_cmp_hidden['modooperacion_']) && $this->nmgp_cmp_hidden['modooperacion_'] == 'off') {
        $sStyleHidden_modooperacion_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['modooperacion_']) || $this->nmgp_cmp_hidden['modooperacion_'] == 'on') {
        if (!isset($this->nm_new_label['modooperacion_'])) {
            $this->nm_new_label['modooperacion_'] = "Modo Operacion";
        }
        $SC_Label = "" . $this->nm_new_label['modooperacion_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_modooperacion__label sc-col-title" id="hidden_field_label_modooperacion_" style="<?php echo $sStyleHidden_modooperacion_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_videoip_ = '';
    if (isset($this->nmgp_cmp_hidden['videoip_']) && $this->nmgp_cmp_hidden['videoip_'] == 'off') {
        $sStyleHidden_videoip_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['videoip_']) || $this->nmgp_cmp_hidden['videoip_'] == 'on') {
        if (!isset($this->nm_new_label['videoip_'])) {
            $this->nm_new_label['videoip_'] = "Video IP";
        }
        $SC_Label = "" . $this->nm_new_label['videoip_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_videoip__label sc-col-title" id="hidden_field_label_videoip_" style="<?php echo $sStyleHidden_videoip_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_toleranciacorte_ = '';
    if (isset($this->nmgp_cmp_hidden['toleranciacorte_']) && $this->nmgp_cmp_hidden['toleranciacorte_'] == 'off') {
        $sStyleHidden_toleranciacorte_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['toleranciacorte_']) || $this->nmgp_cmp_hidden['toleranciacorte_'] == 'on') {
        if (!isset($this->nm_new_label['toleranciacorte_'])) {
            $this->nm_new_label['toleranciacorte_'] = "Tolerancia Corte";
        }
        $SC_Label = "" . $this->nm_new_label['toleranciacorte_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_toleranciacorte__label sc-col-title" id="hidden_field_label_toleranciacorte_" style="<?php echo $sStyleHidden_toleranciacorte_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_toperetiro_ = '';
    if (isset($this->nmgp_cmp_hidden['toperetiro_']) && $this->nmgp_cmp_hidden['toperetiro_'] == 'off') {
        $sStyleHidden_toperetiro_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['toperetiro_']) || $this->nmgp_cmp_hidden['toperetiro_'] == 'on') {
        if (!isset($this->nm_new_label['toperetiro_'])) {
            $this->nm_new_label['toperetiro_'] = "Tope Retiro";
        }
        $SC_Label = "" . $this->nm_new_label['toperetiro_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_toperetiro__label sc-col-title" id="hidden_field_label_toperetiro_" style="<?php echo $sStyleHidden_toperetiro_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_carriles_ = '';
    if (isset($this->nmgp_cmp_hidden['carriles_']) && $this->nmgp_cmp_hidden['carriles_'] == 'off') {
        $sStyleHidden_carriles_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['carriles_']) || $this->nmgp_cmp_hidden['carriles_'] == 'on') {
        if (!isset($this->nm_new_label['carriles_'])) {
            $this->nm_new_label['carriles_'] = "Carriles";
        }
        $SC_Label = "" . $this->nm_new_label['carriles_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_carriles__label sc-col-title" id="hidden_field_label_carriles_" style="<?php echo $sStyleHidden_carriles_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     orderColRule = "<?php echo $orderColRule ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert, $sc_check_incl, $sc_check_excl; 
   $sc_hidden_no = 1; $sc_hidden_yes = 0;
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_casetas);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_casetas = $this->form_vert_form_casetas;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_casetas))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['casetaid_']))
           {
               $this->nmgp_cmp_readonly['casetaid_'] = 'on';
           }
   foreach ($this->form_vert_form_casetas as $sc_seq_vert => $sc_lixo)
   {
       $this->form_fixed_column_no = 0;
       $this->loadRecordState($sc_seq_vert);
       $this->autopista_ = $this->form_vert_form_casetas[$sc_seq_vert]['autopista_'];
       $this->estatus_ = $this->form_vert_form_casetas[$sc_seq_vert]['estatus_'];
       $this->ubicacion_ = $this->form_vert_form_casetas[$sc_seq_vert]['ubicacion_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['casetaid_'] = true;
           $this->nmgp_cmp_readonly['caseta_'] = true;
           $this->nmgp_cmp_readonly['troncal_'] = true;
           $this->nmgp_cmp_readonly['modooperacion_'] = true;
           $this->nmgp_cmp_readonly['videoip_'] = true;
           $this->nmgp_cmp_readonly['toleranciacorte_'] = true;
           $this->nmgp_cmp_readonly['toperetiro_'] = true;
           $this->nmgp_cmp_readonly['carriles_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['casetaid_']) || $this->nmgp_cmp_readonly['casetaid_'] != "on") {$this->nmgp_cmp_readonly['casetaid_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['caseta_']) || $this->nmgp_cmp_readonly['caseta_'] != "on") {$this->nmgp_cmp_readonly['caseta_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['troncal_']) || $this->nmgp_cmp_readonly['troncal_'] != "on") {$this->nmgp_cmp_readonly['troncal_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['modooperacion_']) || $this->nmgp_cmp_readonly['modooperacion_'] != "on") {$this->nmgp_cmp_readonly['modooperacion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['videoip_']) || $this->nmgp_cmp_readonly['videoip_'] != "on") {$this->nmgp_cmp_readonly['videoip_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['toleranciacorte_']) || $this->nmgp_cmp_readonly['toleranciacorte_'] != "on") {$this->nmgp_cmp_readonly['toleranciacorte_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['toperetiro_']) || $this->nmgp_cmp_readonly['toperetiro_'] != "on") {$this->nmgp_cmp_readonly['toperetiro_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['carriles_']) || $this->nmgp_cmp_readonly['carriles_'] != "on") {$this->nmgp_cmp_readonly['carriles_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->casetaid_ = $this->form_vert_form_casetas[$sc_seq_vert]['casetaid_']; 
       $casetaid_ = $this->casetaid_; 
       $sStyleHidden_casetaid_ = '';
       if (isset($sCheckRead_casetaid_))
       {
           unset($sCheckRead_casetaid_);
       }
       if (isset($this->nmgp_cmp_readonly['casetaid_']))
       {
           $sCheckRead_casetaid_ = $this->nmgp_cmp_readonly['casetaid_'];
       }
       if (isset($this->nmgp_cmp_hidden['casetaid_']) && $this->nmgp_cmp_hidden['casetaid_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['casetaid_']);
           $sStyleHidden_casetaid_ = 'display: none;';
       }
       $bTestReadOnly_casetaid_ = true;
       $sStyleReadLab_casetaid_ = 'display: none;';
       $sStyleReadInp_casetaid_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["casetaid_"]) &&  $this->nmgp_cmp_readonly["casetaid_"] == "on"))
       {
           $bTestReadOnly_casetaid_ = false;
           unset($this->nmgp_cmp_readonly['casetaid_']);
           $sStyleReadLab_casetaid_ = '';
           $sStyleReadInp_casetaid_ = 'display: none;';
       }
       $this->caseta_ = $this->form_vert_form_casetas[$sc_seq_vert]['caseta_']; 
       $caseta_ = $this->caseta_; 
       $sStyleHidden_caseta_ = '';
       if (isset($sCheckRead_caseta_))
       {
           unset($sCheckRead_caseta_);
       }
       if (isset($this->nmgp_cmp_readonly['caseta_']))
       {
           $sCheckRead_caseta_ = $this->nmgp_cmp_readonly['caseta_'];
       }
       if (isset($this->nmgp_cmp_hidden['caseta_']) && $this->nmgp_cmp_hidden['caseta_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['caseta_']);
           $sStyleHidden_caseta_ = 'display: none;';
       }
       $bTestReadOnly_caseta_ = true;
       $sStyleReadLab_caseta_ = 'display: none;';
       $sStyleReadInp_caseta_ = '';
       if (isset($this->nmgp_cmp_readonly['caseta_']) && $this->nmgp_cmp_readonly['caseta_'] == 'on')
       {
           $bTestReadOnly_caseta_ = false;
           unset($this->nmgp_cmp_readonly['caseta_']);
           $sStyleReadLab_caseta_ = '';
           $sStyleReadInp_caseta_ = 'display: none;';
       }
       $this->troncal_ = $this->form_vert_form_casetas[$sc_seq_vert]['troncal_']; 
       $troncal_ = $this->troncal_; 
       $sStyleHidden_troncal_ = '';
       if (isset($sCheckRead_troncal_))
       {
           unset($sCheckRead_troncal_);
       }
       if (isset($this->nmgp_cmp_readonly['troncal_']))
       {
           $sCheckRead_troncal_ = $this->nmgp_cmp_readonly['troncal_'];
       }
       if (isset($this->nmgp_cmp_hidden['troncal_']) && $this->nmgp_cmp_hidden['troncal_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['troncal_']);
           $sStyleHidden_troncal_ = 'display: none;';
       }
       $bTestReadOnly_troncal_ = true;
       $sStyleReadLab_troncal_ = 'display: none;';
       $sStyleReadInp_troncal_ = '';
       if (isset($this->nmgp_cmp_readonly['troncal_']) && $this->nmgp_cmp_readonly['troncal_'] == 'on')
       {
           $bTestReadOnly_troncal_ = false;
           unset($this->nmgp_cmp_readonly['troncal_']);
           $sStyleReadLab_troncal_ = '';
           $sStyleReadInp_troncal_ = 'display: none;';
       }
       $this->modooperacion_ = $this->form_vert_form_casetas[$sc_seq_vert]['modooperacion_']; 
       $modooperacion_ = $this->modooperacion_; 
       $sStyleHidden_modooperacion_ = '';
       if (isset($sCheckRead_modooperacion_))
       {
           unset($sCheckRead_modooperacion_);
       }
       if (isset($this->nmgp_cmp_readonly['modooperacion_']))
       {
           $sCheckRead_modooperacion_ = $this->nmgp_cmp_readonly['modooperacion_'];
       }
       if (isset($this->nmgp_cmp_hidden['modooperacion_']) && $this->nmgp_cmp_hidden['modooperacion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['modooperacion_']);
           $sStyleHidden_modooperacion_ = 'display: none;';
       }
       $bTestReadOnly_modooperacion_ = true;
       $sStyleReadLab_modooperacion_ = 'display: none;';
       $sStyleReadInp_modooperacion_ = '';
       if (isset($this->nmgp_cmp_readonly['modooperacion_']) && $this->nmgp_cmp_readonly['modooperacion_'] == 'on')
       {
           $bTestReadOnly_modooperacion_ = false;
           unset($this->nmgp_cmp_readonly['modooperacion_']);
           $sStyleReadLab_modooperacion_ = '';
           $sStyleReadInp_modooperacion_ = 'display: none;';
       }
       $this->videoip_ = $this->form_vert_form_casetas[$sc_seq_vert]['videoip_']; 
       $videoip_ = $this->videoip_; 
       $sStyleHidden_videoip_ = '';
       if (isset($sCheckRead_videoip_))
       {
           unset($sCheckRead_videoip_);
       }
       if (isset($this->nmgp_cmp_readonly['videoip_']))
       {
           $sCheckRead_videoip_ = $this->nmgp_cmp_readonly['videoip_'];
       }
       if (isset($this->nmgp_cmp_hidden['videoip_']) && $this->nmgp_cmp_hidden['videoip_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['videoip_']);
           $sStyleHidden_videoip_ = 'display: none;';
       }
       $bTestReadOnly_videoip_ = true;
       $sStyleReadLab_videoip_ = 'display: none;';
       $sStyleReadInp_videoip_ = '';
       if (isset($this->nmgp_cmp_readonly['videoip_']) && $this->nmgp_cmp_readonly['videoip_'] == 'on')
       {
           $bTestReadOnly_videoip_ = false;
           unset($this->nmgp_cmp_readonly['videoip_']);
           $sStyleReadLab_videoip_ = '';
           $sStyleReadInp_videoip_ = 'display: none;';
       }
       $this->toleranciacorte_ = $this->form_vert_form_casetas[$sc_seq_vert]['toleranciacorte_']; 
       $toleranciacorte_ = $this->toleranciacorte_; 
       $sStyleHidden_toleranciacorte_ = '';
       if (isset($sCheckRead_toleranciacorte_))
       {
           unset($sCheckRead_toleranciacorte_);
       }
       if (isset($this->nmgp_cmp_readonly['toleranciacorte_']))
       {
           $sCheckRead_toleranciacorte_ = $this->nmgp_cmp_readonly['toleranciacorte_'];
       }
       if (isset($this->nmgp_cmp_hidden['toleranciacorte_']) && $this->nmgp_cmp_hidden['toleranciacorte_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['toleranciacorte_']);
           $sStyleHidden_toleranciacorte_ = 'display: none;';
       }
       $bTestReadOnly_toleranciacorte_ = true;
       $sStyleReadLab_toleranciacorte_ = 'display: none;';
       $sStyleReadInp_toleranciacorte_ = '';
       if (isset($this->nmgp_cmp_readonly['toleranciacorte_']) && $this->nmgp_cmp_readonly['toleranciacorte_'] == 'on')
       {
           $bTestReadOnly_toleranciacorte_ = false;
           unset($this->nmgp_cmp_readonly['toleranciacorte_']);
           $sStyleReadLab_toleranciacorte_ = '';
           $sStyleReadInp_toleranciacorte_ = 'display: none;';
       }
       $this->toperetiro_ = $this->form_vert_form_casetas[$sc_seq_vert]['toperetiro_']; 
       $toperetiro_ = $this->toperetiro_; 
       $sStyleHidden_toperetiro_ = '';
       if (isset($sCheckRead_toperetiro_))
       {
           unset($sCheckRead_toperetiro_);
       }
       if (isset($this->nmgp_cmp_readonly['toperetiro_']))
       {
           $sCheckRead_toperetiro_ = $this->nmgp_cmp_readonly['toperetiro_'];
       }
       if (isset($this->nmgp_cmp_hidden['toperetiro_']) && $this->nmgp_cmp_hidden['toperetiro_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['toperetiro_']);
           $sStyleHidden_toperetiro_ = 'display: none;';
       }
       $bTestReadOnly_toperetiro_ = true;
       $sStyleReadLab_toperetiro_ = 'display: none;';
       $sStyleReadInp_toperetiro_ = '';
       if (isset($this->nmgp_cmp_readonly['toperetiro_']) && $this->nmgp_cmp_readonly['toperetiro_'] == 'on')
       {
           $bTestReadOnly_toperetiro_ = false;
           unset($this->nmgp_cmp_readonly['toperetiro_']);
           $sStyleReadLab_toperetiro_ = '';
           $sStyleReadInp_toperetiro_ = 'display: none;';
       }
       $this->carriles_ = $this->form_vert_form_casetas[$sc_seq_vert]['carriles_']; 
       $carriles_ = $this->carriles_; 
       $sStyleHidden_carriles_ = '';
       if (isset($sCheckRead_carriles_))
       {
           unset($sCheckRead_carriles_);
       }
       if (isset($this->nmgp_cmp_readonly['carriles_']))
       {
           $sCheckRead_carriles_ = $this->nmgp_cmp_readonly['carriles_'];
       }
       if (isset($this->nmgp_cmp_hidden['carriles_']) && $this->nmgp_cmp_hidden['carriles_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['carriles_']);
           $sStyleHidden_carriles_ = 'display: none;';
       }
       $bTestReadOnly_carriles_ = true;
       $sStyleReadLab_carriles_ = 'display: none;';
       $sStyleReadInp_carriles_ = '';
       if (isset($this->nmgp_cmp_readonly['carriles_']) && $this->nmgp_cmp_readonly['carriles_'] == 'on')
       {
           $bTestReadOnly_carriles_ = false;
           unset($this->nmgp_cmp_readonly['carriles_']);
           $sStyleReadLab_carriles_ = '';
           $sStyleReadInp_carriles_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?> class="sc-row" data-sc-row-number="<?php echo $sc_seq_vert; ?>">


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_casetas_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_casetas_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_casetas_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_casetas_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_casetas_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_casetas_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['casetaid_']) && $this->nmgp_cmp_hidden['casetaid_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="casetaid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($casetaid_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_casetaid__line" id="hidden_field_data_casetaid_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_casetaid_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_casetaid__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_casetaid_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["casetaid_"]) &&  $this->nmgp_cmp_readonly["casetaid_"] == "on")) { 

 ?>
<input type="hidden" name="casetaid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($casetaid_) . "\"><span id=\"id_ajax_label_casetaid_" . $sc_seq_vert . "\">" . $casetaid_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_casetaid_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-casetaid_<?php echo $sc_seq_vert ?> css_casetaid__line" style="<?php echo $sStyleReadLab_casetaid_; ?>"><?php echo $this->form_format_readonly("casetaid_", $this->form_encode_input($this->casetaid_)); ?></span><span id="id_read_off_casetaid_<?php echo $sc_seq_vert ?>" class="css_read_off_casetaid_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_casetaid_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_casetaid__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_casetaid_<?php echo $sc_seq_vert ?>" type=text name="casetaid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($casetaid_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> maxlength=6 alt="{datatype: 'text', maxLength: 6, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_casetaid_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_casetaid_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['caseta_']) && $this->nmgp_cmp_hidden['caseta_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="caseta_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($caseta_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_caseta__line" id="hidden_field_data_caseta_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_caseta_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_caseta__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_caseta_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["caseta_"]) &&  $this->nmgp_cmp_readonly["caseta_"] == "on") { 

 ?>
<input type="hidden" name="caseta_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($caseta_) . "\">" . $caseta_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_caseta_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-caseta_<?php echo $sc_seq_vert ?> css_caseta__line" style="<?php echo $sStyleReadLab_caseta_; ?>"><?php echo $this->form_format_readonly("caseta_", $this->form_encode_input($this->caseta_)); ?></span><span id="id_read_off_caseta_<?php echo $sc_seq_vert ?>" class="css_read_off_caseta_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_caseta_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_caseta__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_caseta_<?php echo $sc_seq_vert ?>" type=text name="caseta_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($caseta_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_caseta_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_caseta_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['troncal_']) && $this->nmgp_cmp_hidden['troncal_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="troncal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($troncal_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_troncal__line" id="hidden_field_data_troncal_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_troncal_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_troncal__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_troncal_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["troncal_"]) &&  $this->nmgp_cmp_readonly["troncal_"] == "on") { 

 if ("1" == $this->troncal_) { $troncal__look = "Si";} 
 if ("0" == $this->troncal_) { $troncal__look = "No";} 
?>
<input type="hidden" name="troncal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($troncal_) . "\">" . $troncal__look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->troncal_) { $troncal__look = "Si";} 
 if ("0" == $this->troncal_) { $troncal__look = "No";} 
?>
<span id="id_read_on_troncal_<?php echo $sc_seq_vert ; ?>"  class="css_troncal__line" style="<?php echo $sStyleReadLab_troncal_; ?>"><?php echo $this->form_format_readonly("troncal_", $this->form_encode_input($troncal__look)); ?></span><span id="id_read_off_troncal_<?php echo $sc_seq_vert ; ?>" class="css_read_off_troncal_ css_troncal__line" style="<?php echo $sStyleReadInp_troncal_; ?>"><div id="idAjaxRadio_troncal_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_troncal__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_troncal__line"><?php $tempOptionId = "id-opt-troncal_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-troncal_ sc-ui-radio-troncal_<?php echo $sc_seq_vert ?>" type=radio name="troncal_<?php echo $sc_seq_vert ?>" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['Lookup_troncal_'][] = '1'; ?>
<?php  if ("1" == $this->troncal_)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Si</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_troncal__line"><?php $tempOptionId = "id-opt-troncal_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-troncal_ sc-ui-radio-troncal_<?php echo $sc_seq_vert ?>" type=radio name="troncal_<?php echo $sc_seq_vert ?>" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['Lookup_troncal_'][] = '0'; ?>
<?php  if ("0" == $this->troncal_)  { echo " checked" ;} ?><?php  if (empty($this->troncal_)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">No</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_troncal_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_troncal_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['modooperacion_']) && $this->nmgp_cmp_hidden['modooperacion_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="modooperacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->modooperacion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_modooperacion__line" id="hidden_field_data_modooperacion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_modooperacion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_modooperacion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_modooperacion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["modooperacion_"]) &&  $this->nmgp_cmp_readonly["modooperacion_"] == "on") { 

$modooperacion__look = "";
 if ($this->modooperacion_ == "ECT") { $modooperacion__look .= "ECT" ;} 
 if ($this->modooperacion_ == "EAP") { $modooperacion__look .= "EAP" ;} 
 if (empty($modooperacion__look)) { $modooperacion__look = $this->modooperacion_; }
?>
<input type="hidden" name="modooperacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($modooperacion_) . "\">" . $modooperacion__look . ""; ?>
<?php } else { ?>
<?php

$modooperacion__look = "";
 if ($this->modooperacion_ == "ECT") { $modooperacion__look .= "ECT" ;} 
 if ($this->modooperacion_ == "EAP") { $modooperacion__look .= "EAP" ;} 
 if (empty($modooperacion__look)) { $modooperacion__look = $this->modooperacion_; }
?>
<span id="id_read_on_modooperacion_<?php echo $sc_seq_vert ; ?>" class="css_modooperacion__line"  style="<?php echo $sStyleReadLab_modooperacion_; ?>"><?php echo $this->form_format_readonly("modooperacion_", $this->form_encode_input($modooperacion__look)); ?></span><span id="id_read_off_modooperacion_<?php echo $sc_seq_vert ; ?>" class="css_read_off_modooperacion_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_modooperacion_; ?>">
 <span id="idAjaxSelect_modooperacion_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_modooperacion__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_modooperacion_<?php echo $sc_seq_vert ?>" name="modooperacion_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="ECT" <?php  if ($this->modooperacion_ == "ECT") { echo " selected" ;} ?>>ECT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['Lookup_modooperacion_'][] = 'ECT'; ?>
 <option  value="EAP" <?php  if ($this->modooperacion_ == "EAP") { echo " selected" ;} ?>>EAP</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['Lookup_modooperacion_'][] = 'EAP'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modooperacion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modooperacion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['videoip_']) && $this->nmgp_cmp_hidden['videoip_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="videoip_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($videoip_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_videoip__line" id="hidden_field_data_videoip_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_videoip_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_videoip__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_videoip_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["videoip_"]) &&  $this->nmgp_cmp_readonly["videoip_"] == "on") { 

 ?>
<input type="hidden" name="videoip_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($videoip_) . "\">" . $videoip_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_videoip_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-videoip_<?php echo $sc_seq_vert ?> css_videoip__line" style="<?php echo $sStyleReadLab_videoip_; ?>"><?php echo $this->form_format_readonly("videoip_", $this->form_encode_input($this->videoip_)); ?></span><span id="id_read_off_videoip_<?php echo $sc_seq_vert ?>" class="css_read_off_videoip_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_videoip_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_videoip__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_videoip_<?php echo $sc_seq_vert ?>" type=text name="videoip_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($videoip_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_videoip_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_videoip_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['toleranciacorte_']) && $this->nmgp_cmp_hidden['toleranciacorte_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="toleranciacorte_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($toleranciacorte_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_toleranciacorte__line" id="hidden_field_data_toleranciacorte_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_toleranciacorte_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_toleranciacorte__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_toleranciacorte_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["toleranciacorte_"]) &&  $this->nmgp_cmp_readonly["toleranciacorte_"] == "on") { 

 ?>
<input type="hidden" name="toleranciacorte_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($toleranciacorte_) . "\">" . $toleranciacorte_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_toleranciacorte_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-toleranciacorte_<?php echo $sc_seq_vert ?> css_toleranciacorte__line" style="<?php echo $sStyleReadLab_toleranciacorte_; ?>"><?php echo $this->form_format_readonly("toleranciacorte_", $this->form_encode_input($this->toleranciacorte_)); ?></span><span id="id_read_off_toleranciacorte_<?php echo $sc_seq_vert ?>" class="css_read_off_toleranciacorte_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_toleranciacorte_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_toleranciacorte__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_toleranciacorte_<?php echo $sc_seq_vert ?>" type=text name="toleranciacorte_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($toleranciacorte_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['toleranciacorte_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['toleranciacorte_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['toleranciacorte_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_toleranciacorte_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_toleranciacorte_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['toperetiro_']) && $this->nmgp_cmp_hidden['toperetiro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="toperetiro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($toperetiro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_toperetiro__line" id="hidden_field_data_toperetiro_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_toperetiro_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_toperetiro__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_toperetiro_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["toperetiro_"]) &&  $this->nmgp_cmp_readonly["toperetiro_"] == "on") { 

 ?>
<input type="hidden" name="toperetiro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($toperetiro_) . "\">" . $toperetiro_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_toperetiro_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-toperetiro_<?php echo $sc_seq_vert ?> css_toperetiro__line" style="<?php echo $sStyleReadLab_toperetiro_; ?>"><?php echo $this->form_format_readonly("toperetiro_", $this->form_encode_input($this->toperetiro_)); ?></span><span id="id_read_off_toperetiro_<?php echo $sc_seq_vert ?>" class="css_read_off_toperetiro_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_toperetiro_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_toperetiro__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_toperetiro_<?php echo $sc_seq_vert ?>" type=text name="toperetiro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($toperetiro_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['toperetiro_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['toperetiro_']['format_pos'] || 3 == $this->field_config['toperetiro_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['toperetiro_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['toperetiro_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['toperetiro_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['toperetiro_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_toperetiro_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_toperetiro_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['carriles_']) && $this->nmgp_cmp_hidden['carriles_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="carriles_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($carriles_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_carriles__line" id="hidden_field_data_carriles_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_carriles_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_carriles__line" style="vertical-align: top;padding: 0px"><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__navigate_right_16.png"))
          { 
              $carriles_ = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__navigate_right_16.png";
                  $carriles_ = "<img border=\"0\" src=\"scriptcase__NM__ico__NM__navigate_right_16.png\"/>" ; 
              }
              else {
                  $carriles_ = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__navigate_right_16.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_carriles_<?php echo $sc_seq_vert; ?>"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_form_carril_edit . "', '$this->nm_location', 'fld_caseta*scin" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dados_form'][$sc_seq_vert]['casetaid_'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout', '', '_self', '0', '0', 'form_carril')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $carriles_ ; ?></font></a></span>
<?php if ($bTestReadOnly_carriles_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["carriles_"]) &&  $this->nmgp_cmp_readonly["carriles_"] == "on") { 

 ?>
<input type="hidden" name="carriles_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($carriles_) . "\">" . $carriles_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_carriles_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-carriles_<?php echo $sc_seq_vert ?> css_carriles__line" style="<?php echo $sStyleReadLab_carriles_; ?>"><?php echo $this->form_format_readonly("carriles_", $this->form_encode_input($this->carriles_)); ?></span><span id="id_read_off_carriles_<?php echo $sc_seq_vert ?>" class="css_read_off_carriles_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_carriles_; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_carriles_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_carriles_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_casetaid_))
       {
           $this->nmgp_cmp_readonly['casetaid_'] = $sCheckRead_casetaid_;
       }
       if ('display: none;' == $sStyleHidden_casetaid_)
       {
           $this->nmgp_cmp_hidden['casetaid_'] = 'off';
       }
       if (isset($sCheckRead_caseta_))
       {
           $this->nmgp_cmp_readonly['caseta_'] = $sCheckRead_caseta_;
       }
       if ('display: none;' == $sStyleHidden_caseta_)
       {
           $this->nmgp_cmp_hidden['caseta_'] = 'off';
       }
       if (isset($sCheckRead_troncal_))
       {
           $this->nmgp_cmp_readonly['troncal_'] = $sCheckRead_troncal_;
       }
       if ('display: none;' == $sStyleHidden_troncal_)
       {
           $this->nmgp_cmp_hidden['troncal_'] = 'off';
       }
       if (isset($sCheckRead_modooperacion_))
       {
           $this->nmgp_cmp_readonly['modooperacion_'] = $sCheckRead_modooperacion_;
       }
       if ('display: none;' == $sStyleHidden_modooperacion_)
       {
           $this->nmgp_cmp_hidden['modooperacion_'] = 'off';
       }
       if (isset($sCheckRead_videoip_))
       {
           $this->nmgp_cmp_readonly['videoip_'] = $sCheckRead_videoip_;
       }
       if ('display: none;' == $sStyleHidden_videoip_)
       {
           $this->nmgp_cmp_hidden['videoip_'] = 'off';
       }
       if (isset($sCheckRead_toleranciacorte_))
       {
           $this->nmgp_cmp_readonly['toleranciacorte_'] = $sCheckRead_toleranciacorte_;
       }
       if ('display: none;' == $sStyleHidden_toleranciacorte_)
       {
           $this->nmgp_cmp_hidden['toleranciacorte_'] = 'off';
       }
       if (isset($sCheckRead_toperetiro_))
       {
           $this->nmgp_cmp_readonly['toperetiro_'] = $sCheckRead_toperetiro_;
       }
       if ('display: none;' == $sStyleHidden_toperetiro_)
       {
           $this->nmgp_cmp_hidden['toperetiro_'] = 'off';
       }
       if (isset($sCheckRead_carriles_))
       {
           $this->nmgp_cmp_readonly['carriles_'] = $sCheckRead_carriles_;
       }
       if ('display: none;' == $sStyleHidden_carriles_)
       {
           $this->nmgp_cmp_hidden['carriles_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_casetas = $guarda_form_vert_form_casetas;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
 <div id="sc-id-fixedheaders-placeholder" style="display: none; position: fixed; top: 0; z-index: 500"></div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

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
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_casetas");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_casetas");
 parent.scAjaxDetailHeight("form_casetas", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_casetas", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_casetas", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['sc_modal'])
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
			do_ajax_form_casetas_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
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
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
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
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
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
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_casetas']['buttonStatus'] = $this->nmgp_botoes;
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
<?php 
 } 
} 
?> 
