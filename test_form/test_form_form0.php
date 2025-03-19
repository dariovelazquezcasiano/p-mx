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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Dictamina: Aforo | Ingreso"); } else { echo strip_tags("Dictamina: Aforo | Ingreso"); } ?></TITLE>
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
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>test_form/test_form_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("test_form_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['last'] : 'off'); ?>";
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

 function Cierra() {
  // $("#sc_Liquida_top").hide();
  // $("#id_img_sc_Valida_top").hide();
  // top.parent.frames[0].frames[0].location.reload();
  //top.opener.location.reload();
  top.close();
  
 } // Cierra

 function Reload() {
  // var fram = parent.document.getElementById('nmsc_iframe_grid_aforo_liquidacion'); // Nombre del iframe
  
  // var fram = parent.document.getElementById('id-iframe-0'); // Nombre del iframe
  // var srcant = fram.src;
  // fram.src='';
  // fram.src = srcant; 
  parent.frames[0].frames[0].location.reload();
  
  //document.getElementById('id-iframe-0').contentDocument.location.reload(true);
  //nmsc_iframe_grid_aforo_liquidacion
  
  
  
 } // Reload
<?php

include_once('test_form_jquery.php');

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
$str_iframe_body = 'margin-left: 1px; margin-right: 1px; margin-top: 1px; margin-bottom: 1px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['link_info']['remove_border']) {
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
 include_once("test_form_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['test_form'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['test_form'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "R")
{
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['video'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['video']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['video']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['video']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['video']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['video'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "video", "scBtnFn_video()", "scBtnFn_video()", "sc_video_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['secuencial']))
           {
               $this->nmgp_cmp_readonly['secuencial'] = 'on';
           }
?>


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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_consecutivo_label" id="hidden_field_label_consecutivo" style="<?php echo $sStyleHidden_consecutivo; ?>"><span id="id_label_consecutivo"><?php echo $this->nm_new_label['consecutivo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['php_cmp_required']['consecutivo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['php_cmp_required']['consecutivo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_consecutivo_line" id="hidden_field_data_consecutivo" style="<?php echo $sStyleHidden_consecutivo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_consecutivo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["consecutivo"]) &&  $this->nmgp_cmp_readonly["consecutivo"] == "on")) { 

 ?>
<input type="hidden" name="consecutivo" value="<?php echo $this->form_encode_input($consecutivo) . "\"><span id=\"id_ajax_label_consecutivo\">" . $consecutivo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_consecutivo" class="sc-ui-readonly-consecutivo css_consecutivo_line" style="<?php echo $sStyleReadLab_consecutivo; ?>"><?php echo $this->form_format_readonly("consecutivo", $this->form_encode_input($this->consecutivo)); ?></span><span id="id_read_off_consecutivo" class="css_read_off_consecutivo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_consecutivo; ?>">
 <input class="sc-js-input scFormObjectOdd css_consecutivo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_consecutivo" type=text name="consecutivo" value="<?php echo $this->form_encode_input($consecutivo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'integer', maxLength: 19, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['consecutivo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['consecutivo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['consecutivo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_consecutivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_consecutivo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['secuencial']))
    {
        $this->nm_new_label['secuencial'] = "Secuencial";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $secuencial = $this->secuencial;
   $sStyleHidden_secuencial = '';
   if (isset($this->nmgp_cmp_hidden['secuencial']) && $this->nmgp_cmp_hidden['secuencial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['secuencial']);
       $sStyleHidden_secuencial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_secuencial = 'display: none;';
   $sStyleReadInp_secuencial = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["secuencial"]) &&  $this->nmgp_cmp_readonly["secuencial"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['secuencial']);
       $sStyleReadLab_secuencial = '';
       $sStyleReadInp_secuencial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['secuencial']) && $this->nmgp_cmp_hidden['secuencial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="secuencial" value="<?php echo $this->form_encode_input($secuencial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_secuencial_label" id="hidden_field_label_secuencial" style="<?php echo $sStyleHidden_secuencial; ?>"><span id="id_label_secuencial"><?php echo $this->nm_new_label['secuencial']; ?></span></TD>
    <TD class="scFormDataOdd css_secuencial_line" id="hidden_field_data_secuencial" style="<?php echo $sStyleHidden_secuencial; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_secuencial_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["secuencial"]) &&  $this->nmgp_cmp_readonly["secuencial"] == "on")) { 

 ?>
<input type="hidden" name="secuencial" value="<?php echo $this->form_encode_input($secuencial) . "\"><span id=\"id_ajax_label_secuencial\">" . $secuencial . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_secuencial" class="sc-ui-readonly-secuencial css_secuencial_line" style="<?php echo $sStyleReadLab_secuencial; ?>"><?php echo $this->form_format_readonly("secuencial", $this->form_encode_input($this->secuencial)); ?></span><span id="id_read_off_secuencial" class="css_read_off_secuencial<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_secuencial; ?>">
 <input class="sc-js-input scFormObjectOdd css_secuencial_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_secuencial" type=text name="secuencial" value="<?php echo $this->form_encode_input($secuencial) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['secuencial']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['secuencial']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['secuencial']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_secuencial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_secuencial_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vehiculocorrecto']))
    {
        $this->nm_new_label['vehiculocorrecto'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculocorrecto = $this->vehiculocorrecto;
   $sStyleHidden_vehiculocorrecto = '';
   if (isset($this->nmgp_cmp_hidden['vehiculocorrecto']) && $this->nmgp_cmp_hidden['vehiculocorrecto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculocorrecto']);
       $sStyleHidden_vehiculocorrecto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculocorrecto = 'display: none;';
   $sStyleReadInp_vehiculocorrecto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vehiculocorrecto']) && $this->nmgp_cmp_readonly['vehiculocorrecto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculocorrecto']);
       $sStyleReadLab_vehiculocorrecto = '';
       $sStyleReadInp_vehiculocorrecto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculocorrecto']) && $this->nmgp_cmp_hidden['vehiculocorrecto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculocorrecto" value="<?php echo $this->form_encode_input($vehiculocorrecto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculocorrecto_label" id="hidden_field_label_vehiculocorrecto" style="<?php echo $sStyleHidden_vehiculocorrecto; ?>"><span id="id_label_vehiculocorrecto"><?php echo $this->nm_new_label['vehiculocorrecto']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculocorrecto_line" id="hidden_field_data_vehiculocorrecto" style="<?php echo $sStyleHidden_vehiculocorrecto; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculocorrecto_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vehiculocorrecto"]) &&  $this->nmgp_cmp_readonly["vehiculocorrecto"] == "on") { 

 if ("1" == $this->vehiculocorrecto) { $vehiculocorrecto_look = "PRE";} 
 if ("2" == $this->vehiculocorrecto) { $vehiculocorrecto_look = "CR";} 
 if ("3" == $this->vehiculocorrecto) { $vehiculocorrecto_look = "POS";} 
?>
<input type="hidden" name="vehiculocorrecto" value="<?php echo $this->form_encode_input($vehiculocorrecto) . "\">" . $vehiculocorrecto_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->vehiculocorrecto) { $vehiculocorrecto_look = "PRE";} 
 if ("2" == $this->vehiculocorrecto) { $vehiculocorrecto_look = "CR";} 
 if ("3" == $this->vehiculocorrecto) { $vehiculocorrecto_look = "POS";} 
?>
<span id="id_read_on_vehiculocorrecto"  class="css_vehiculocorrecto_line" style="<?php echo $sStyleReadLab_vehiculocorrecto; ?>"><?php echo $this->form_format_readonly("vehiculocorrecto", $this->form_encode_input($vehiculocorrecto_look)); ?></span><span id="id_read_off_vehiculocorrecto" class="css_read_off_vehiculocorrecto css_vehiculocorrecto_line" style="<?php echo $sStyleReadInp_vehiculocorrecto; ?>"><div id="idAjaxRadio_vehiculocorrecto" style="display: inline-block"  class="css_vehiculocorrecto_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_vehiculocorrecto_line"><?php $tempOptionId = "id-opt-vehiculocorrecto" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-vehiculocorrecto sc-ui-radio-vehiculocorrecto" type=radio name="vehiculocorrecto" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculocorrecto'][] = '1'; ?>
<?php  if ("1" == $this->vehiculocorrecto)  { echo " checked" ;} ?>  onClick="do_ajax_test_form_event_vehiculocorrecto_onclick();" ><label for="<?php echo $tempOptionId ?>">PRE</label></TD>
  <TD class="scFormDataFontOdd css_vehiculocorrecto_line"><?php $tempOptionId = "id-opt-vehiculocorrecto" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-vehiculocorrecto sc-ui-radio-vehiculocorrecto" type=radio name="vehiculocorrecto" value="2"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculocorrecto'][] = '2'; ?>
<?php  if ("2" == $this->vehiculocorrecto)  { echo " checked" ;} ?><?php  if (empty($this->vehiculocorrecto)) { echo " checked" ;} ?>  onClick="do_ajax_test_form_event_vehiculocorrecto_onclick();" ><label for="<?php echo $tempOptionId ?>">CR</label></TD>
  <TD class="scFormDataFontOdd css_vehiculocorrecto_line"><?php $tempOptionId = "id-opt-vehiculocorrecto" . $sc_seq_vert . "-3"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-vehiculocorrecto sc-ui-radio-vehiculocorrecto" type=radio name="vehiculocorrecto" value="3"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculocorrecto'][] = '3'; ?>
<?php  if ("3" == $this->vehiculocorrecto)  { echo " checked" ;} ?>  onClick="do_ajax_test_form_event_vehiculocorrecto_onclick();" ><label for="<?php echo $tempOptionId ?>">POS</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculocorrecto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculocorrecto_text"></span></td></tr></table></td></tr></table></TD>
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
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['importe_ana']))
           {
               $this->nmgp_cmp_readonly['importe_ana'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['pagoid_ana']))
   {
       $this->nm_new_label['pagoid_ana'] = "Pago ANA";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pagoid_ana = $this->pagoid_ana;
   $sStyleHidden_pagoid_ana = '';
   if (isset($this->nmgp_cmp_hidden['pagoid_ana']) && $this->nmgp_cmp_hidden['pagoid_ana'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pagoid_ana']);
       $sStyleHidden_pagoid_ana = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pagoid_ana = 'display: none;';
   $sStyleReadInp_pagoid_ana = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pagoid_ana']) && $this->nmgp_cmp_readonly['pagoid_ana'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pagoid_ana']);
       $sStyleReadLab_pagoid_ana = '';
       $sStyleReadInp_pagoid_ana = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pagoid_ana']) && $this->nmgp_cmp_hidden['pagoid_ana'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pagoid_ana" value="<?php echo $this->form_encode_input($this->pagoid_ana) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pagoid_ana_label" id="hidden_field_label_pagoid_ana" style="<?php echo $sStyleHidden_pagoid_ana; ?>"><span id="id_label_pagoid_ana"><?php echo $this->nm_new_label['pagoid_ana']; ?></span></TD>
    <TD class="scFormDataOdd css_pagoid_ana_line" id="hidden_field_data_pagoid_ana" style="<?php echo $sStyleHidden_pagoid_ana; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pagoid_ana_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pagoid_ana"]) &&  $this->nmgp_cmp_readonly["pagoid_ana"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_pagoid_ana']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_pagoid_ana'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_pagoid_ana']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_pagoid_ana'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_pagoid_ana']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_pagoid_ana'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_pagoid_ana']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_pagoid_ana'] = array(); 
    }

   $old_value_consecutivo = $this->consecutivo;
   $old_value_secuencial = $this->secuencial;
   $old_value_importe_ana = $this->importe_ana;
   $old_value_cantidadeje_ana = $this->cantidadeje_ana;
   $old_value_tarifaee_ana = $this->tarifaee_ana;
   $old_value_fld_importe_eeana = $this->fld_importe_eeana;
   $this->nm_tira_formatacao();


   $unformatted_value_consecutivo = $this->consecutivo;
   $unformatted_value_secuencial = $this->secuencial;
   $unformatted_value_importe_ana = $this->importe_ana;
   $unformatted_value_cantidadeje_ana = $this->cantidadeje_ana;
   $unformatted_value_tarifaee_ana = $this->tarifaee_ana;
   $unformatted_value_fld_importe_eeana = $this->fld_importe_eeana;

   $nm_comando = "SELECT TipoPagoID, TipoPagoID FROM tipopago  ORDER BY Orden";

   $this->consecutivo = $old_value_consecutivo;
   $this->secuencial = $old_value_secuencial;
   $this->importe_ana = $old_value_importe_ana;
   $this->cantidadeje_ana = $old_value_cantidadeje_ana;
   $this->tarifaee_ana = $old_value_tarifaee_ana;
   $this->fld_importe_eeana = $old_value_fld_importe_eeana;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_pagoid_ana'][] = $rs->fields[0];
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
   $pagoid_ana_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pagoid_ana_1))
          {
              foreach ($this->pagoid_ana_1 as $tmp_pagoid_ana)
              {
                  if (trim($tmp_pagoid_ana) === trim($cadaselect[1])) { $pagoid_ana_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pagoid_ana) === trim($cadaselect[1])) { $pagoid_ana_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="pagoid_ana" value="<?php echo $this->form_encode_input($pagoid_ana) . "\">" . $pagoid_ana_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_pagoid_ana();
   $x = 0 ; 
   $pagoid_ana_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pagoid_ana_1))
          {
              foreach ($this->pagoid_ana_1 as $tmp_pagoid_ana)
              {
                  if (trim($tmp_pagoid_ana) === trim($cadaselect[1])) { $pagoid_ana_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pagoid_ana) === trim($cadaselect[1])) { $pagoid_ana_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($pagoid_ana_look))
          {
              $pagoid_ana_look = $this->pagoid_ana;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_pagoid_ana\" class=\"css_pagoid_ana_line\" style=\"" .  $sStyleReadLab_pagoid_ana . "\">" . $this->form_format_readonly("pagoid_ana", $this->form_encode_input($pagoid_ana_look)) . "</span><span id=\"id_read_off_pagoid_ana\" class=\"css_read_off_pagoid_ana" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_pagoid_ana . "\">";
   echo " <span id=\"idAjaxSelect_pagoid_ana\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_pagoid_ana_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_pagoid_ana\" name=\"pagoid_ana\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->pagoid_ana) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->pagoid_ana)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pagoid_ana_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pagoid_ana_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['vehiculoid_ana']))
   {
       $this->nm_new_label['vehiculoid_ana'] = "Vehiculo ANA";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculoid_ana = $this->vehiculoid_ana;
   $sStyleHidden_vehiculoid_ana = '';
   if (isset($this->nmgp_cmp_hidden['vehiculoid_ana']) && $this->nmgp_cmp_hidden['vehiculoid_ana'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculoid_ana']);
       $sStyleHidden_vehiculoid_ana = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculoid_ana = 'display: none;';
   $sStyleReadInp_vehiculoid_ana = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vehiculoid_ana']) && $this->nmgp_cmp_readonly['vehiculoid_ana'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculoid_ana']);
       $sStyleReadLab_vehiculoid_ana = '';
       $sStyleReadInp_vehiculoid_ana = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculoid_ana']) && $this->nmgp_cmp_hidden['vehiculoid_ana'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="vehiculoid_ana" value="<?php echo $this->form_encode_input($this->vehiculoid_ana) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculoid_ana_label" id="hidden_field_label_vehiculoid_ana" style="<?php echo $sStyleHidden_vehiculoid_ana; ?>"><span id="id_label_vehiculoid_ana"><?php echo $this->nm_new_label['vehiculoid_ana']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculoid_ana_line" id="hidden_field_data_vehiculoid_ana" style="<?php echo $sStyleHidden_vehiculoid_ana; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculoid_ana_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vehiculoid_ana"]) &&  $this->nmgp_cmp_readonly["vehiculoid_ana"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculoid_ana']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculoid_ana'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculoid_ana']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculoid_ana'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculoid_ana']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculoid_ana'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculoid_ana']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculoid_ana'] = array(); 
    }

   $old_value_consecutivo = $this->consecutivo;
   $old_value_secuencial = $this->secuencial;
   $old_value_importe_ana = $this->importe_ana;
   $old_value_cantidadeje_ana = $this->cantidadeje_ana;
   $old_value_tarifaee_ana = $this->tarifaee_ana;
   $old_value_fld_importe_eeana = $this->fld_importe_eeana;
   $this->nm_tira_formatacao();


   $unformatted_value_consecutivo = $this->consecutivo;
   $unformatted_value_secuencial = $this->secuencial;
   $unformatted_value_importe_ana = $this->importe_ana;
   $unformatted_value_cantidadeje_ana = $this->cantidadeje_ana;
   $unformatted_value_tarifaee_ana = $this->tarifaee_ana;
   $unformatted_value_fld_importe_eeana = $this->fld_importe_eeana;

   $nm_comando = "SELECT fld_tipo_equipo, fld_tipo_equipo FROM cat_tipoveh  ORDER BY fld_orden";

   $this->consecutivo = $old_value_consecutivo;
   $this->secuencial = $old_value_secuencial;
   $this->importe_ana = $old_value_importe_ana;
   $this->cantidadeje_ana = $old_value_cantidadeje_ana;
   $this->tarifaee_ana = $old_value_tarifaee_ana;
   $this->fld_importe_eeana = $old_value_fld_importe_eeana;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['Lookup_vehiculoid_ana'][] = $rs->fields[0];
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
   $vehiculoid_ana_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->vehiculoid_ana_1))
          {
              foreach ($this->vehiculoid_ana_1 as $tmp_vehiculoid_ana)
              {
                  if (trim($tmp_vehiculoid_ana) === trim($cadaselect[1])) { $vehiculoid_ana_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->vehiculoid_ana) === trim($cadaselect[1])) { $vehiculoid_ana_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="vehiculoid_ana" value="<?php echo $this->form_encode_input($vehiculoid_ana) . "\">" . $vehiculoid_ana_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_vehiculoid_ana();
   $x = 0 ; 
   $vehiculoid_ana_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->vehiculoid_ana_1))
          {
              foreach ($this->vehiculoid_ana_1 as $tmp_vehiculoid_ana)
              {
                  if (trim($tmp_vehiculoid_ana) === trim($cadaselect[1])) { $vehiculoid_ana_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->vehiculoid_ana) === trim($cadaselect[1])) { $vehiculoid_ana_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($vehiculoid_ana_look))
          {
              $vehiculoid_ana_look = $this->vehiculoid_ana;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_vehiculoid_ana\" class=\"css_vehiculoid_ana_line\" style=\"" .  $sStyleReadLab_vehiculoid_ana . "\">" . $this->form_format_readonly("vehiculoid_ana", $this->form_encode_input($vehiculoid_ana_look)) . "</span><span id=\"id_read_off_vehiculoid_ana\" class=\"css_read_off_vehiculoid_ana" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_vehiculoid_ana . "\">";
   echo " <span id=\"idAjaxSelect_vehiculoid_ana\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_vehiculoid_ana_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_vehiculoid_ana\" name=\"vehiculoid_ana\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->vehiculoid_ana) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->vehiculoid_ana)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculoid_ana_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculoid_ana_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cantidadeje_ana']))
           {
               $this->nmgp_cmp_readonly['cantidadeje_ana'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['tarifaee_ana']))
           {
               $this->nmgp_cmp_readonly['tarifaee_ana'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['importe_ana']))
    {
        $this->nm_new_label['importe_ana'] = "Importe ANA";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importe_ana = $this->importe_ana;
   $sStyleHidden_importe_ana = '';
   if (isset($this->nmgp_cmp_hidden['importe_ana']) && $this->nmgp_cmp_hidden['importe_ana'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importe_ana']);
       $sStyleHidden_importe_ana = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importe_ana = 'display: none;';
   $sStyleReadInp_importe_ana = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["importe_ana"]) &&  $this->nmgp_cmp_readonly["importe_ana"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importe_ana']);
       $sStyleReadLab_importe_ana = '';
       $sStyleReadInp_importe_ana = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importe_ana']) && $this->nmgp_cmp_hidden['importe_ana'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importe_ana" value="<?php echo $this->form_encode_input($importe_ana) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_importe_ana_label" id="hidden_field_label_importe_ana" style="<?php echo $sStyleHidden_importe_ana; ?>"><span id="id_label_importe_ana"><?php echo $this->nm_new_label['importe_ana']; ?></span></TD>
    <TD class="scFormDataOdd css_importe_ana_line" id="hidden_field_data_importe_ana" style="<?php echo $sStyleHidden_importe_ana; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_importe_ana_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["importe_ana"]) &&  $this->nmgp_cmp_readonly["importe_ana"] == "on")) { 

 ?>
<input type="hidden" name="importe_ana" value="<?php echo $this->form_encode_input($importe_ana) . "\"><span id=\"id_ajax_label_importe_ana\">" . $importe_ana . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_importe_ana" class="sc-ui-readonly-importe_ana css_importe_ana_line" style="<?php echo $sStyleReadLab_importe_ana; ?>"><?php echo $this->form_format_readonly("importe_ana", $this->form_encode_input($this->importe_ana)); ?></span><span id="id_read_off_importe_ana" class="css_read_off_importe_ana<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importe_ana; ?>">
 <input class="sc-js-input scFormObjectOdd css_importe_ana_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importe_ana" type=text name="importe_ana" value="<?php echo $this->form_encode_input($importe_ana) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importe_ana']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importe_ana']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importe_ana']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importe_ana']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_importe_ana_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_importe_ana_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cantidadeje_ana']))
    {
        $this->nm_new_label['cantidadeje_ana'] = "Cantidad EE ANA";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantidadeje_ana = $this->cantidadeje_ana;
   $sStyleHidden_cantidadeje_ana = '';
   if (isset($this->nmgp_cmp_hidden['cantidadeje_ana']) && $this->nmgp_cmp_hidden['cantidadeje_ana'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantidadeje_ana']);
       $sStyleHidden_cantidadeje_ana = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantidadeje_ana = 'display: none;';
   $sStyleReadInp_cantidadeje_ana = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cantidadeje_ana"]) &&  $this->nmgp_cmp_readonly["cantidadeje_ana"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantidadeje_ana']);
       $sStyleReadLab_cantidadeje_ana = '';
       $sStyleReadInp_cantidadeje_ana = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantidadeje_ana']) && $this->nmgp_cmp_hidden['cantidadeje_ana'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidadeje_ana" value="<?php echo $this->form_encode_input($cantidadeje_ana) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cantidadeje_ana_label" id="hidden_field_label_cantidadeje_ana" style="<?php echo $sStyleHidden_cantidadeje_ana; ?>"><span id="id_label_cantidadeje_ana"><?php echo $this->nm_new_label['cantidadeje_ana']; ?></span></TD>
    <TD class="scFormDataOdd css_cantidadeje_ana_line" id="hidden_field_data_cantidadeje_ana" style="<?php echo $sStyleHidden_cantidadeje_ana; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantidadeje_ana_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cantidadeje_ana"]) &&  $this->nmgp_cmp_readonly["cantidadeje_ana"] == "on")) { 

 ?>
<input type="hidden" name="cantidadeje_ana" value="<?php echo $this->form_encode_input($cantidadeje_ana) . "\"><span id=\"id_ajax_label_cantidadeje_ana\">" . $cantidadeje_ana . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cantidadeje_ana" class="sc-ui-readonly-cantidadeje_ana css_cantidadeje_ana_line" style="<?php echo $sStyleReadLab_cantidadeje_ana; ?>"><?php echo $this->form_format_readonly("cantidadeje_ana", $this->form_encode_input($this->cantidadeje_ana)); ?></span><span id="id_read_off_cantidadeje_ana" class="css_read_off_cantidadeje_ana<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidadeje_ana; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidadeje_ana_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidadeje_ana" type=text name="cantidadeje_ana" value="<?php echo $this->form_encode_input($cantidadeje_ana) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> alt="{datatype: 'integer', maxLength: 5, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidadeje_ana']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidadeje_ana']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidadeje_ana']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidadeje_ana_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidadeje_ana_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fld_importe_eeana']))
           {
               $this->nmgp_cmp_readonly['fld_importe_eeana'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['tarifaee_ana']))
    {
        $this->nm_new_label['tarifaee_ana'] = "Tarifa EE ANA";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarifaee_ana = $this->tarifaee_ana;
   $sStyleHidden_tarifaee_ana = '';
   if (isset($this->nmgp_cmp_hidden['tarifaee_ana']) && $this->nmgp_cmp_hidden['tarifaee_ana'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarifaee_ana']);
       $sStyleHidden_tarifaee_ana = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarifaee_ana = 'display: none;';
   $sStyleReadInp_tarifaee_ana = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["tarifaee_ana"]) &&  $this->nmgp_cmp_readonly["tarifaee_ana"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarifaee_ana']);
       $sStyleReadLab_tarifaee_ana = '';
       $sStyleReadInp_tarifaee_ana = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarifaee_ana']) && $this->nmgp_cmp_hidden['tarifaee_ana'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarifaee_ana" value="<?php echo $this->form_encode_input($tarifaee_ana) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarifaee_ana_label" id="hidden_field_label_tarifaee_ana" style="<?php echo $sStyleHidden_tarifaee_ana; ?>"><span id="id_label_tarifaee_ana"><?php echo $this->nm_new_label['tarifaee_ana']; ?></span></TD>
    <TD class="scFormDataOdd css_tarifaee_ana_line" id="hidden_field_data_tarifaee_ana" style="<?php echo $sStyleHidden_tarifaee_ana; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tarifaee_ana_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["tarifaee_ana"]) &&  $this->nmgp_cmp_readonly["tarifaee_ana"] == "on")) { 

 ?>
<input type="hidden" name="tarifaee_ana" value="<?php echo $this->form_encode_input($tarifaee_ana) . "\"><span id=\"id_ajax_label_tarifaee_ana\">" . $tarifaee_ana . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_tarifaee_ana" class="sc-ui-readonly-tarifaee_ana css_tarifaee_ana_line" style="<?php echo $sStyleReadLab_tarifaee_ana; ?>"><?php echo $this->form_format_readonly("tarifaee_ana", $this->form_encode_input($this->tarifaee_ana)); ?></span><span id="id_read_off_tarifaee_ana" class="css_read_off_tarifaee_ana<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tarifaee_ana; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarifaee_ana_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tarifaee_ana" type=text name="tarifaee_ana" value="<?php echo $this->form_encode_input($tarifaee_ana) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['tarifaee_ana']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tarifaee_ana']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tarifaee_ana']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tarifaee_ana']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tarifaee_ana_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tarifaee_ana_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fld_importe_eeana']))
    {
        $this->nm_new_label['fld_importe_eeana'] = "EjeEx($)";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fld_importe_eeana = $this->fld_importe_eeana;
   $sStyleHidden_fld_importe_eeana = '';
   if (isset($this->nmgp_cmp_hidden['fld_importe_eeana']) && $this->nmgp_cmp_hidden['fld_importe_eeana'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fld_importe_eeana']);
       $sStyleHidden_fld_importe_eeana = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fld_importe_eeana = 'display: none;';
   $sStyleReadInp_fld_importe_eeana = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fld_importe_eeana"]) &&  $this->nmgp_cmp_readonly["fld_importe_eeana"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fld_importe_eeana']);
       $sStyleReadLab_fld_importe_eeana = '';
       $sStyleReadInp_fld_importe_eeana = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fld_importe_eeana']) && $this->nmgp_cmp_hidden['fld_importe_eeana'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fld_importe_eeana" value="<?php echo $this->form_encode_input($fld_importe_eeana) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fld_importe_eeana_label" id="hidden_field_label_fld_importe_eeana" style="<?php echo $sStyleHidden_fld_importe_eeana; ?>"><span id="id_label_fld_importe_eeana"><?php echo $this->nm_new_label['fld_importe_eeana']; ?></span></TD>
    <TD class="scFormDataOdd css_fld_importe_eeana_line" id="hidden_field_data_fld_importe_eeana" style="<?php echo $sStyleHidden_fld_importe_eeana; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fld_importe_eeana_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fld_importe_eeana"]) &&  $this->nmgp_cmp_readonly["fld_importe_eeana"] == "on")) { 

 ?>
<input type="hidden" name="fld_importe_eeana" value="<?php echo $this->form_encode_input($fld_importe_eeana) . "\"><span id=\"id_ajax_label_fld_importe_eeana\">" . $fld_importe_eeana . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fld_importe_eeana" class="sc-ui-readonly-fld_importe_eeana css_fld_importe_eeana_line" style="<?php echo $sStyleReadLab_fld_importe_eeana; ?>"><?php echo $this->form_format_readonly("fld_importe_eeana", $this->form_encode_input($this->fld_importe_eeana)); ?></span><span id="id_read_off_fld_importe_eeana" class="css_read_off_fld_importe_eeana<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fld_importe_eeana; ?>">
 <input class="sc-js-input scFormObjectOdd css_fld_importe_eeana_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fld_importe_eeana" type=text name="fld_importe_eeana" value="<?php echo $this->form_encode_input($fld_importe_eeana) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['fld_importe_eeana']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['fld_importe_eeana']['format_pos'] || 3 == $this->field_config['fld_importe_eeana']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['fld_importe_eeana']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['fld_importe_eeana']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['fld_importe_eeana']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['fld_importe_eeana']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fld_importe_eeana_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fld_importe_eeana_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "R")
{
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "Dictamina";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['forward'];
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
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['run_iframe'] != "R")
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
  $nm_sc_blocos_da_pag = array(0,1);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("test_form");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("test_form");
 parent.scAjaxDetailHeight("test_form", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("test_form", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("test_form", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['sc_modal'])
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
	function scBtnFn_video() {
		if ($("#sc_video_top").length && $("#sc_video_top").is(":visible")) {
		    if ($("#sc_video_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_video()
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_b.sc-unique-btn-1").length && $("#sc_b_upd_b.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_upd_b.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-2").length && $("#sc_b_ret_b.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-3").length && $("#sc_b_avc_b.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-4").length && $("#sc_b_fim_b.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_b.sc-unique-btn-5").length && $("#sc_b_sai_b.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_sai_b.sc-unique-btn-5").hasClass("disabled")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['test_form']['buttonStatus'] = $this->nmgp_botoes;
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
