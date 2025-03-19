<?php
class form_autopista_form extends form_autopista_apl
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_autopista/form_autopista_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("form_autopista_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_autopista_jquery.php');

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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['link_info']['remove_border']) {
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
 include_once("form_autopista_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_autopista'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_autopista'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['run_iframe'] != "R")
{
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['empty_filter'] = true;
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


    ?>

    <TD class="scFormLabelOddMult sc-col-title" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php
    $sStyleHidden_autopistaid_ = '';
    if (isset($this->nmgp_cmp_hidden['autopistaid_']) && $this->nmgp_cmp_hidden['autopistaid_'] == 'off') {
        $sStyleHidden_autopistaid_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['autopistaid_']) || $this->nmgp_cmp_hidden['autopistaid_'] == 'on') {
        if (!isset($this->nm_new_label['autopistaid_'])) {
            $this->nm_new_label['autopistaid_'] = "Autopista ID";
        }
        $SC_Label = "" . $this->nm_new_label['autopistaid_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_autopistaid__label sc-col-title" id="hidden_field_label_autopistaid_" style="<?php echo $sStyleHidden_autopistaid_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_autopista_ = '';
    if (isset($this->nmgp_cmp_hidden['autopista_']) && $this->nmgp_cmp_hidden['autopista_'] == 'off') {
        $sStyleHidden_autopista_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['autopista_']) || $this->nmgp_cmp_hidden['autopista_'] == 'on') {
        if (!isset($this->nm_new_label['autopista_'])) {
            $this->nm_new_label['autopista_'] = "Autopista";
        }
        $SC_Label = "" . $this->nm_new_label['autopista_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_autopista__label sc-col-title" id="hidden_field_label_autopista_" style="<?php echo $sStyleHidden_autopista_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_kmini_ = '';
    if (isset($this->nmgp_cmp_hidden['kmini_']) && $this->nmgp_cmp_hidden['kmini_'] == 'off') {
        $sStyleHidden_kmini_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['kmini_']) || $this->nmgp_cmp_hidden['kmini_'] == 'on') {
        if (!isset($this->nm_new_label['kmini_'])) {
            $this->nm_new_label['kmini_'] = "Km Inicial";
        }
        $SC_Label = "" . $this->nm_new_label['kmini_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_kmini__label sc-col-title" id="hidden_field_label_kmini_" style="<?php echo $sStyleHidden_kmini_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_kmfin_ = '';
    if (isset($this->nmgp_cmp_hidden['kmfin_']) && $this->nmgp_cmp_hidden['kmfin_'] == 'off') {
        $sStyleHidden_kmfin_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['kmfin_']) || $this->nmgp_cmp_hidden['kmfin_'] == 'on') {
        if (!isset($this->nm_new_label['kmfin_'])) {
            $this->nm_new_label['kmfin_'] = "Km Final";
        }
        $SC_Label = "" . $this->nm_new_label['kmfin_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_kmfin__label sc-col-title" id="hidden_field_label_kmfin_" style="<?php echo $sStyleHidden_kmfin_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_responsable_ = '';
    if (isset($this->nmgp_cmp_hidden['responsable_']) && $this->nmgp_cmp_hidden['responsable_'] == 'off') {
        $sStyleHidden_responsable_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['responsable_']) || $this->nmgp_cmp_hidden['responsable_'] == 'on') {
        if (!isset($this->nm_new_label['responsable_'])) {
            $this->nm_new_label['responsable_'] = "Responsable";
        }
        $SC_Label = "" . $this->nm_new_label['responsable_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_responsable__label sc-col-title" id="hidden_field_label_responsable_" style="<?php echo $sStyleHidden_responsable_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_telefono_ = '';
    if (isset($this->nmgp_cmp_hidden['telefono_']) && $this->nmgp_cmp_hidden['telefono_'] == 'off') {
        $sStyleHidden_telefono_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['telefono_']) || $this->nmgp_cmp_hidden['telefono_'] == 'on') {
        if (!isset($this->nm_new_label['telefono_'])) {
            $this->nm_new_label['telefono_'] = "Telefono";
        }
        $SC_Label = "" . $this->nm_new_label['telefono_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_telefono__label sc-col-title" id="hidden_field_label_telefono_" style="<?php echo $sStyleHidden_telefono_; ?>" > <?php echo $label_final ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_autopista);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_autopista = $this->form_vert_form_autopista;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_autopista))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['autopistaid_']))
           {
               $this->nmgp_cmp_readonly['autopistaid_'] = 'on';
           }
   foreach ($this->form_vert_form_autopista as $sc_seq_vert => $sc_lixo)
   {
       $this->form_fixed_column_no = 0;
       $this->loadRecordState($sc_seq_vert);
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['autopistaid_'] = true;
           $this->nmgp_cmp_readonly['autopista_'] = true;
           $this->nmgp_cmp_readonly['kmini_'] = true;
           $this->nmgp_cmp_readonly['kmfin_'] = true;
           $this->nmgp_cmp_readonly['responsable_'] = true;
           $this->nmgp_cmp_readonly['telefono_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['autopistaid_']) || $this->nmgp_cmp_readonly['autopistaid_'] != "on") {$this->nmgp_cmp_readonly['autopistaid_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['autopista_']) || $this->nmgp_cmp_readonly['autopista_'] != "on") {$this->nmgp_cmp_readonly['autopista_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['kmini_']) || $this->nmgp_cmp_readonly['kmini_'] != "on") {$this->nmgp_cmp_readonly['kmini_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['kmfin_']) || $this->nmgp_cmp_readonly['kmfin_'] != "on") {$this->nmgp_cmp_readonly['kmfin_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['responsable_']) || $this->nmgp_cmp_readonly['responsable_'] != "on") {$this->nmgp_cmp_readonly['responsable_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['telefono_']) || $this->nmgp_cmp_readonly['telefono_'] != "on") {$this->nmgp_cmp_readonly['telefono_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->autopistaid_ = $this->form_vert_form_autopista[$sc_seq_vert]['autopistaid_']; 
       $autopistaid_ = $this->autopistaid_; 
       $sStyleHidden_autopistaid_ = '';
       if (isset($sCheckRead_autopistaid_))
       {
           unset($sCheckRead_autopistaid_);
       }
       if (isset($this->nmgp_cmp_readonly['autopistaid_']))
       {
           $sCheckRead_autopistaid_ = $this->nmgp_cmp_readonly['autopistaid_'];
       }
       if (isset($this->nmgp_cmp_hidden['autopistaid_']) && $this->nmgp_cmp_hidden['autopistaid_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['autopistaid_']);
           $sStyleHidden_autopistaid_ = 'display: none;';
       }
       $bTestReadOnly_autopistaid_ = true;
       $sStyleReadLab_autopistaid_ = 'display: none;';
       $sStyleReadInp_autopistaid_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["autopistaid_"]) &&  $this->nmgp_cmp_readonly["autopistaid_"] == "on"))
       {
           $bTestReadOnly_autopistaid_ = false;
           unset($this->nmgp_cmp_readonly['autopistaid_']);
           $sStyleReadLab_autopistaid_ = '';
           $sStyleReadInp_autopistaid_ = 'display: none;';
       }
       $this->autopista_ = $this->form_vert_form_autopista[$sc_seq_vert]['autopista_']; 
       $autopista_ = $this->autopista_; 
       $sStyleHidden_autopista_ = '';
       if (isset($sCheckRead_autopista_))
       {
           unset($sCheckRead_autopista_);
       }
       if (isset($this->nmgp_cmp_readonly['autopista_']))
       {
           $sCheckRead_autopista_ = $this->nmgp_cmp_readonly['autopista_'];
       }
       if (isset($this->nmgp_cmp_hidden['autopista_']) && $this->nmgp_cmp_hidden['autopista_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['autopista_']);
           $sStyleHidden_autopista_ = 'display: none;';
       }
       $bTestReadOnly_autopista_ = true;
       $sStyleReadLab_autopista_ = 'display: none;';
       $sStyleReadInp_autopista_ = '';
       if (isset($this->nmgp_cmp_readonly['autopista_']) && $this->nmgp_cmp_readonly['autopista_'] == 'on')
       {
           $bTestReadOnly_autopista_ = false;
           unset($this->nmgp_cmp_readonly['autopista_']);
           $sStyleReadLab_autopista_ = '';
           $sStyleReadInp_autopista_ = 'display: none;';
       }
       $this->kmini_ = $this->form_vert_form_autopista[$sc_seq_vert]['kmini_']; 
       $kmini_ = $this->kmini_; 
       $sStyleHidden_kmini_ = '';
       if (isset($sCheckRead_kmini_))
       {
           unset($sCheckRead_kmini_);
       }
       if (isset($this->nmgp_cmp_readonly['kmini_']))
       {
           $sCheckRead_kmini_ = $this->nmgp_cmp_readonly['kmini_'];
       }
       if (isset($this->nmgp_cmp_hidden['kmini_']) && $this->nmgp_cmp_hidden['kmini_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['kmini_']);
           $sStyleHidden_kmini_ = 'display: none;';
       }
       $bTestReadOnly_kmini_ = true;
       $sStyleReadLab_kmini_ = 'display: none;';
       $sStyleReadInp_kmini_ = '';
       if (isset($this->nmgp_cmp_readonly['kmini_']) && $this->nmgp_cmp_readonly['kmini_'] == 'on')
       {
           $bTestReadOnly_kmini_ = false;
           unset($this->nmgp_cmp_readonly['kmini_']);
           $sStyleReadLab_kmini_ = '';
           $sStyleReadInp_kmini_ = 'display: none;';
       }
       $this->kmfin_ = $this->form_vert_form_autopista[$sc_seq_vert]['kmfin_']; 
       $kmfin_ = $this->kmfin_; 
       $sStyleHidden_kmfin_ = '';
       if (isset($sCheckRead_kmfin_))
       {
           unset($sCheckRead_kmfin_);
       }
       if (isset($this->nmgp_cmp_readonly['kmfin_']))
       {
           $sCheckRead_kmfin_ = $this->nmgp_cmp_readonly['kmfin_'];
       }
       if (isset($this->nmgp_cmp_hidden['kmfin_']) && $this->nmgp_cmp_hidden['kmfin_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['kmfin_']);
           $sStyleHidden_kmfin_ = 'display: none;';
       }
       $bTestReadOnly_kmfin_ = true;
       $sStyleReadLab_kmfin_ = 'display: none;';
       $sStyleReadInp_kmfin_ = '';
       if (isset($this->nmgp_cmp_readonly['kmfin_']) && $this->nmgp_cmp_readonly['kmfin_'] == 'on')
       {
           $bTestReadOnly_kmfin_ = false;
           unset($this->nmgp_cmp_readonly['kmfin_']);
           $sStyleReadLab_kmfin_ = '';
           $sStyleReadInp_kmfin_ = 'display: none;';
       }
       $this->responsable_ = $this->form_vert_form_autopista[$sc_seq_vert]['responsable_']; 
       $responsable_ = $this->responsable_; 
       $sStyleHidden_responsable_ = '';
       if (isset($sCheckRead_responsable_))
       {
           unset($sCheckRead_responsable_);
       }
       if (isset($this->nmgp_cmp_readonly['responsable_']))
       {
           $sCheckRead_responsable_ = $this->nmgp_cmp_readonly['responsable_'];
       }
       if (isset($this->nmgp_cmp_hidden['responsable_']) && $this->nmgp_cmp_hidden['responsable_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['responsable_']);
           $sStyleHidden_responsable_ = 'display: none;';
       }
       $bTestReadOnly_responsable_ = true;
       $sStyleReadLab_responsable_ = 'display: none;';
       $sStyleReadInp_responsable_ = '';
       if (isset($this->nmgp_cmp_readonly['responsable_']) && $this->nmgp_cmp_readonly['responsable_'] == 'on')
       {
           $bTestReadOnly_responsable_ = false;
           unset($this->nmgp_cmp_readonly['responsable_']);
           $sStyleReadLab_responsable_ = '';
           $sStyleReadInp_responsable_ = 'display: none;';
       }
       $this->telefono_ = $this->form_vert_form_autopista[$sc_seq_vert]['telefono_']; 
       $telefono_ = $this->telefono_; 
       $sStyleHidden_telefono_ = '';
       if (isset($sCheckRead_telefono_))
       {
           unset($sCheckRead_telefono_);
       }
       if (isset($this->nmgp_cmp_readonly['telefono_']))
       {
           $sCheckRead_telefono_ = $this->nmgp_cmp_readonly['telefono_'];
       }
       if (isset($this->nmgp_cmp_hidden['telefono_']) && $this->nmgp_cmp_hidden['telefono_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['telefono_']);
           $sStyleHidden_telefono_ = 'display: none;';
       }
       $bTestReadOnly_telefono_ = true;
       $sStyleReadLab_telefono_ = 'display: none;';
       $sStyleReadInp_telefono_ = '';
       if (isset($this->nmgp_cmp_readonly['telefono_']) && $this->nmgp_cmp_readonly['telefono_'] == 'on')
       {
           $bTestReadOnly_telefono_ = false;
           unset($this->nmgp_cmp_readonly['telefono_']);
           $sStyleReadLab_telefono_ = '';
           $sStyleReadInp_telefono_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?> class="sc-row" data-sc-row-number="<?php echo $sc_seq_vert; ?>">


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_autopista_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_autopista_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_autopista_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_autopista_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_autopista_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_autopista_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['autopistaid_']) && $this->nmgp_cmp_hidden['autopistaid_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="autopistaid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($autopistaid_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_autopistaid__line" id="hidden_field_data_autopistaid_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_autopistaid_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_autopistaid__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_autopistaid_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["autopistaid_"]) &&  $this->nmgp_cmp_readonly["autopistaid_"] == "on")) { 

 ?>
<input type="hidden" name="autopistaid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($autopistaid_) . "\"><span id=\"id_ajax_label_autopistaid_" . $sc_seq_vert . "\">" . $autopistaid_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_autopistaid_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-autopistaid_<?php echo $sc_seq_vert ?> css_autopistaid__line" style="<?php echo $sStyleReadLab_autopistaid_; ?>"><?php echo $this->form_format_readonly("autopistaid_", $this->form_encode_input($this->autopistaid_)); ?></span><span id="id_read_off_autopistaid_<?php echo $sc_seq_vert ?>" class="css_read_off_autopistaid_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_autopistaid_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_autopistaid__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_autopistaid_<?php echo $sc_seq_vert ?>" type=text name="autopistaid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($autopistaid_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['autopistaid_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['autopistaid_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['autopistaid_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_autopistaid_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_autopistaid_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['autopista_']) && $this->nmgp_cmp_hidden['autopista_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="autopista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($autopista_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_autopista__line" id="hidden_field_data_autopista_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_autopista_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_autopista__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_autopista_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["autopista_"]) &&  $this->nmgp_cmp_readonly["autopista_"] == "on") { 

 ?>
<input type="hidden" name="autopista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($autopista_) . "\">" . $autopista_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_autopista_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-autopista_<?php echo $sc_seq_vert ?> css_autopista__line" style="<?php echo $sStyleReadLab_autopista_; ?>"><?php echo $this->form_format_readonly("autopista_", $this->form_encode_input($this->autopista_)); ?></span><span id="id_read_off_autopista_<?php echo $sc_seq_vert ?>" class="css_read_off_autopista_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_autopista_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_autopista__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_autopista_<?php echo $sc_seq_vert ?>" type=text name="autopista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($autopista_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_autopista_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_autopista_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['kmini_']) && $this->nmgp_cmp_hidden['kmini_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kmini_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kmini_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_kmini__line" id="hidden_field_data_kmini_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_kmini_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_kmini__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_kmini_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kmini_"]) &&  $this->nmgp_cmp_readonly["kmini_"] == "on") { 

 ?>
<input type="hidden" name="kmini_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kmini_) . "\">" . $kmini_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_kmini_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-kmini_<?php echo $sc_seq_vert ?> css_kmini__line" style="<?php echo $sStyleReadLab_kmini_; ?>"><?php echo $this->form_format_readonly("kmini_", $this->form_encode_input($this->kmini_)); ?></span><span id="id_read_off_kmini_<?php echo $sc_seq_vert ?>" class="css_read_off_kmini_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_kmini_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_kmini__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_kmini_<?php echo $sc_seq_vert ?>" type=text name="kmini_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kmini_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=7"; } ?> maxlength=14 alt="{datatype: 'mask', maxLength: 7, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', maskList: '999+999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kmini_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kmini_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['kmfin_']) && $this->nmgp_cmp_hidden['kmfin_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kmfin_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kmfin_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_kmfin__line" id="hidden_field_data_kmfin_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_kmfin_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_kmfin__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_kmfin_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kmfin_"]) &&  $this->nmgp_cmp_readonly["kmfin_"] == "on") { 

 ?>
<input type="hidden" name="kmfin_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kmfin_) . "\">" . $kmfin_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_kmfin_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-kmfin_<?php echo $sc_seq_vert ?> css_kmfin__line" style="<?php echo $sStyleReadLab_kmfin_; ?>"><?php echo $this->form_format_readonly("kmfin_", $this->form_encode_input($this->kmfin_)); ?></span><span id="id_read_off_kmfin_<?php echo $sc_seq_vert ?>" class="css_read_off_kmfin_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_kmfin_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_kmfin__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_kmfin_<?php echo $sc_seq_vert ?>" type=text name="kmfin_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kmfin_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=7"; } ?> maxlength=14 alt="{datatype: 'mask', maxLength: 7, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', maskList: '999+999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kmfin_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kmfin_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['responsable_']) && $this->nmgp_cmp_hidden['responsable_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="responsable_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->responsable_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_responsable__line" id="hidden_field_data_responsable_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_responsable_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_responsable__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_responsable_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["responsable_"]) &&  $this->nmgp_cmp_readonly["responsable_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['Lookup_responsable_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['Lookup_responsable_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['Lookup_responsable_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['Lookup_responsable_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['Lookup_responsable_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['Lookup_responsable_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['Lookup_responsable_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['Lookup_responsable_'] = array(); 
    }

   $old_value_autopistaid_ = $this->autopistaid_;
   $old_value_kmini_ = $this->kmini_;
   $old_value_kmfin_ = $this->kmfin_;
   $old_value_telefono_ = $this->telefono_;
   $this->nm_tira_formatacao();


   $unformatted_value_autopistaid_ = $this->autopistaid_;
   $unformatted_value_kmini_ = $this->kmini_;
   $unformatted_value_kmfin_ = $this->kmfin_;
   $unformatted_value_telefono_ = $this->telefono_;

   $nm_comando = "SELECT login, name  FROM seg_users  ORDER BY name";

   $this->autopistaid_ = $old_value_autopistaid_;
   $this->kmini_ = $old_value_kmini_;
   $this->kmfin_ = $old_value_kmfin_;
   $this->telefono_ = $old_value_telefono_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['Lookup_responsable_'][] = $rs->fields[0];
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
   $responsable__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->responsable__1))
          {
              foreach ($this->responsable__1 as $tmp_responsable_)
              {
                  if (trim($tmp_responsable_) === trim($cadaselect[1])) { $responsable__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->responsable_) === trim($cadaselect[1])) { $responsable__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="responsable_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($responsable_) . "\">" . $responsable__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_responsable_();
   $x = 0 ; 
   $responsable__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->responsable__1))
          {
              foreach ($this->responsable__1 as $tmp_responsable_)
              {
                  if (trim($tmp_responsable_) === trim($cadaselect[1])) { $responsable__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->responsable_) === trim($cadaselect[1])) { $responsable__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($responsable__look))
          {
              $responsable__look = $this->responsable_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_responsable_" . $sc_seq_vert . "\" class=\"css_responsable__line\" style=\"" .  $sStyleReadLab_responsable_ . "\">" . $this->form_format_readonly("responsable_", $this->form_encode_input($responsable__look)) . "</span><span id=\"id_read_off_responsable_" . $sc_seq_vert . "\" class=\"css_read_off_responsable_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_responsable_ . "\">";
   echo " <span id=\"idAjaxSelect_responsable_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_responsable__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_responsable_" . $sc_seq_vert . "\" name=\"responsable_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->responsable_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->responsable_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_responsable_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_responsable_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['telefono_']) && $this->nmgp_cmp_hidden['telefono_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($telefono_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_telefono__line" id="hidden_field_data_telefono_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_telefono_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_telefono__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_telefono_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefono_"]) &&  $this->nmgp_cmp_readonly["telefono_"] == "on") { 

 ?>
<input type="hidden" name="telefono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($telefono_) . "\">" . $telefono_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefono_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-telefono_<?php echo $sc_seq_vert ?> css_telefono__line" style="<?php echo $sStyleReadLab_telefono_; ?>"><?php echo $this->form_format_readonly("telefono_", $this->form_encode_input($this->telefono_)); ?></span><span id="id_read_off_telefono_<?php echo $sc_seq_vert ?>" class="css_read_off_telefono_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telefono_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_telefono__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_telefono_<?php echo $sc_seq_vert ?>" type=text name="telefono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($telefono_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=22 alt="{datatype: 'mask', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', maskList: '99-9999-9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefono_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefono_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_autopistaid_))
       {
           $this->nmgp_cmp_readonly['autopistaid_'] = $sCheckRead_autopistaid_;
       }
       if ('display: none;' == $sStyleHidden_autopistaid_)
       {
           $this->nmgp_cmp_hidden['autopistaid_'] = 'off';
       }
       if (isset($sCheckRead_autopista_))
       {
           $this->nmgp_cmp_readonly['autopista_'] = $sCheckRead_autopista_;
       }
       if ('display: none;' == $sStyleHidden_autopista_)
       {
           $this->nmgp_cmp_hidden['autopista_'] = 'off';
       }
       if (isset($sCheckRead_kmini_))
       {
           $this->nmgp_cmp_readonly['kmini_'] = $sCheckRead_kmini_;
       }
       if ('display: none;' == $sStyleHidden_kmini_)
       {
           $this->nmgp_cmp_hidden['kmini_'] = 'off';
       }
       if (isset($sCheckRead_kmfin_))
       {
           $this->nmgp_cmp_readonly['kmfin_'] = $sCheckRead_kmfin_;
       }
       if ('display: none;' == $sStyleHidden_kmfin_)
       {
           $this->nmgp_cmp_hidden['kmfin_'] = 'off';
       }
       if (isset($sCheckRead_responsable_))
       {
           $this->nmgp_cmp_readonly['responsable_'] = $sCheckRead_responsable_;
       }
       if ('display: none;' == $sStyleHidden_responsable_)
       {
           $this->nmgp_cmp_hidden['responsable_'] = 'off';
       }
       if (isset($sCheckRead_telefono_))
       {
           $this->nmgp_cmp_readonly['telefono_'] = $sCheckRead_telefono_;
       }
       if ('display: none;' == $sStyleHidden_telefono_)
       {
           $this->nmgp_cmp_hidden['telefono_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_autopista = $guarda_form_vert_form_autopista;
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_autopista");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_autopista");
 parent.scAjaxDetailHeight("form_autopista", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_autopista", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_autopista", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['sc_modal'])
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
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-1").length && $("#sc_b_upd_t.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_autopista']['buttonStatus'] = $this->nmgp_botoes;
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
