<?php
class form_carril_form extends form_carril_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " carriles"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " carriles"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_carril/form_carril_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("form_carril_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['last'] : 'off'); ?>";
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
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
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

include_once('form_carril_jquery.php');

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

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

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
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/peaje_module_ui.css?v=20260913-palette" />
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['link_info']['remove_border']) {
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
 include_once("form_carril_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_carril'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_carril'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R")
{
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input id='fast_search_f0_t' type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <select id='cond_fast_search_f0_t' class="scFormToolbarInput" style="vertical-align: middle;display:none;" name="nmgp_cond_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $OPC_sel = ("qp" == $OPC_arg) ? " selected" : "";
           echo "           <option value='qp'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>";
?> 
          </select>
          <span id="quicksearchph_t" class="scFormToolbarInput" style='display: inline-block; vertical-align: inherit'>
              <span>
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <img style="display: <?php echo $stateSearchIconSearch ?>; "  id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
                  <img style="display: <?php echo $stateSearchIconClose ?>; " id="SC_fast_search_close_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
          </span>  </div>
  <?php
      }
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['insert'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['bcancelar'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['update'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call || $this->form_3versions_single) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['empty_filter'] = true;
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
<?php
     $Span = 0;
     if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Span = 2; }
     if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Span = 2; }
     $Col_span = ($Span == 0) ? "" : " colspan=$Span";
 ?>
    <TR class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['pdf_view'])
     { 
 ?>
     <TD class="scFormLabelOddMult" <?php echo $Col_span ?>>&nbsp;</TD>
<?php
     } 
 ?>
     <TD class="scFormLabelOddMult" colspan=5>&nbsp;</TD>
     <TD class="scFormLabelOddMult" colspan=3 style="text-align:center;vertical-align:middle;">Canal vídeo</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
    </TR>
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
            $this->nm_new_label['casetaid_'] = "Caseta ID";
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
    $sStyleHidden_carrilid_ = '';
    if (isset($this->nmgp_cmp_hidden['carrilid_']) && $this->nmgp_cmp_hidden['carrilid_'] == 'off') {
        $sStyleHidden_carrilid_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['carrilid_']) || $this->nmgp_cmp_hidden['carrilid_'] == 'on') {
        if (!isset($this->nm_new_label['carrilid_'])) {
            $this->nm_new_label['carrilid_'] = "Carril";
        }
        $SC_Label = "" . $this->nm_new_label['carrilid_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_carrilid__label sc-col-title" id="hidden_field_label_carrilid_" style="<?php echo $sStyleHidden_carrilid_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_carrilnacional_ = '';
    if (isset($this->nmgp_cmp_hidden['carrilnacional_']) && $this->nmgp_cmp_hidden['carrilnacional_'] == 'off') {
        $sStyleHidden_carrilnacional_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['carrilnacional_']) || $this->nmgp_cmp_hidden['carrilnacional_'] == 'on') {
        if (!isset($this->nm_new_label['carrilnacional_'])) {
            $this->nm_new_label['carrilnacional_'] = "Carril Nacional";
        }
        $SC_Label = "" . $this->nm_new_label['carrilnacional_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_carrilnacional__label sc-col-title" id="hidden_field_label_carrilnacional_" style="<?php echo $sStyleHidden_carrilnacional_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_cuerpo_ = '';
    if (isset($this->nmgp_cmp_hidden['cuerpo_']) && $this->nmgp_cmp_hidden['cuerpo_'] == 'off') {
        $sStyleHidden_cuerpo_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['cuerpo_']) || $this->nmgp_cmp_hidden['cuerpo_'] == 'on') {
        if (!isset($this->nm_new_label['cuerpo_'])) {
            $this->nm_new_label['cuerpo_'] = "Cuerpo";
        }
        $SC_Label = "" . $this->nm_new_label['cuerpo_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_cuerpo__label sc-col-title" id="hidden_field_label_cuerpo_" style="<?php echo $sStyleHidden_cuerpo_; ?>" > <?php echo $label_final ?> </TD>
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
    $sStyleHidden_tramoid_ = '';
    if (isset($this->nmgp_cmp_hidden['tramoid_']) && $this->nmgp_cmp_hidden['tramoid_'] == 'off') {
        $sStyleHidden_tramoid_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['tramoid_']) || $this->nmgp_cmp_hidden['tramoid_'] == 'on') {
        if (!isset($this->nm_new_label['tramoid_'])) {
            $this->nm_new_label['tramoid_'] = "Tramo ID";
        }
        $SC_Label = "" . $this->nm_new_label['tramoid_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_tramoid__label sc-col-title" id="hidden_field_label_tramoid_" style="<?php echo $sStyleHidden_tramoid_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_v1_ = '';
    if (isset($this->nmgp_cmp_hidden['v1_']) && $this->nmgp_cmp_hidden['v1_'] == 'off') {
        $sStyleHidden_v1_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['v1_']) || $this->nmgp_cmp_hidden['v1_'] == 'on') {
        if (!isset($this->nm_new_label['v1_'])) {
            $this->nm_new_label['v1_'] = "V1";
        }
        $SC_Label = "" . $this->nm_new_label['v1_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_v1__label sc-col-title" id="hidden_field_label_v1_" style="<?php echo $sStyleHidden_v1_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_v2_ = '';
    if (isset($this->nmgp_cmp_hidden['v2_']) && $this->nmgp_cmp_hidden['v2_'] == 'off') {
        $sStyleHidden_v2_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['v2_']) || $this->nmgp_cmp_hidden['v2_'] == 'on') {
        if (!isset($this->nm_new_label['v2_'])) {
            $this->nm_new_label['v2_'] = "V2";
        }
        $SC_Label = "" . $this->nm_new_label['v2_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_v2__label sc-col-title" id="hidden_field_label_v2_" style="<?php echo $sStyleHidden_v2_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_v3_ = '';
    if (isset($this->nmgp_cmp_hidden['v3_']) && $this->nmgp_cmp_hidden['v3_'] == 'off') {
        $sStyleHidden_v3_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['v3_']) || $this->nmgp_cmp_hidden['v3_'] == 'on') {
        if (!isset($this->nm_new_label['v3_'])) {
            $this->nm_new_label['v3_'] = "V3";
        }
        $SC_Label = "" . $this->nm_new_label['v3_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_v3__label sc-col-title" id="hidden_field_label_v3_" style="<?php echo $sStyleHidden_v3_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_esexclusivo_ = '';
    if (isset($this->nmgp_cmp_hidden['esexclusivo_']) && $this->nmgp_cmp_hidden['esexclusivo_'] == 'off') {
        $sStyleHidden_esexclusivo_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['esexclusivo_']) || $this->nmgp_cmp_hidden['esexclusivo_'] == 'on') {
        if (!isset($this->nm_new_label['esexclusivo_'])) {
            $this->nm_new_label['esexclusivo_'] = "Es Exclusivo";
        }
        $SC_Label = "" . $this->nm_new_label['esexclusivo_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_esexclusivo__label sc-col-title" id="hidden_field_label_esexclusivo_" style="<?php echo $sStyleHidden_esexclusivo_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_ip_ = '';
    if (isset($this->nmgp_cmp_hidden['ip_']) && $this->nmgp_cmp_hidden['ip_'] == 'off') {
        $sStyleHidden_ip_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['ip_']) || $this->nmgp_cmp_hidden['ip_'] == 'on') {
        if (!isset($this->nm_new_label['ip_'])) {
            $this->nm_new_label['ip_'] = "IP";
        }
        $SC_Label = "" . $this->nm_new_label['ip_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_ip__label sc-col-title" id="hidden_field_label_ip_" style="<?php echo $sStyleHidden_ip_; ?>" > <?php echo $label_final ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_carril);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_carril = $this->form_vert_form_carril;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_carril))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['casetaid_']))
           {
               $this->nmgp_cmp_readonly['casetaid_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['carrilid_']))
           {
               $this->nmgp_cmp_readonly['carrilid_'] = 'on';
           }
   foreach ($this->form_vert_form_carril as $sc_seq_vert => $sc_lixo)
   {
       $this->form_fixed_column_no = 0;
       $this->loadRecordState($sc_seq_vert);
       $this->caseta_ = $this->form_vert_form_carril[$sc_seq_vert]['caseta_'];
       $this->tramo_ = $this->form_vert_form_carril[$sc_seq_vert]['tramo_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['casetaid_'] = true;
           $this->nmgp_cmp_readonly['carrilid_'] = true;
           $this->nmgp_cmp_readonly['carrilnacional_'] = true;
           $this->nmgp_cmp_readonly['cuerpo_'] = true;
           $this->nmgp_cmp_readonly['toperetiro_'] = true;
           $this->nmgp_cmp_readonly['tramoid_'] = true;
           $this->nmgp_cmp_readonly['v1_'] = true;
           $this->nmgp_cmp_readonly['v2_'] = true;
           $this->nmgp_cmp_readonly['v3_'] = true;
           $this->nmgp_cmp_readonly['esexclusivo_'] = true;
           $this->nmgp_cmp_readonly['ip_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['casetaid_']) || $this->nmgp_cmp_readonly['casetaid_'] != "on") {$this->nmgp_cmp_readonly['casetaid_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['carrilid_']) || $this->nmgp_cmp_readonly['carrilid_'] != "on") {$this->nmgp_cmp_readonly['carrilid_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['carrilnacional_']) || $this->nmgp_cmp_readonly['carrilnacional_'] != "on") {$this->nmgp_cmp_readonly['carrilnacional_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cuerpo_']) || $this->nmgp_cmp_readonly['cuerpo_'] != "on") {$this->nmgp_cmp_readonly['cuerpo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['toperetiro_']) || $this->nmgp_cmp_readonly['toperetiro_'] != "on") {$this->nmgp_cmp_readonly['toperetiro_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tramoid_']) || $this->nmgp_cmp_readonly['tramoid_'] != "on") {$this->nmgp_cmp_readonly['tramoid_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['v1_']) || $this->nmgp_cmp_readonly['v1_'] != "on") {$this->nmgp_cmp_readonly['v1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['v2_']) || $this->nmgp_cmp_readonly['v2_'] != "on") {$this->nmgp_cmp_readonly['v2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['v3_']) || $this->nmgp_cmp_readonly['v3_'] != "on") {$this->nmgp_cmp_readonly['v3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['esexclusivo_']) || $this->nmgp_cmp_readonly['esexclusivo_'] != "on") {$this->nmgp_cmp_readonly['esexclusivo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ip_']) || $this->nmgp_cmp_readonly['ip_'] != "on") {$this->nmgp_cmp_readonly['ip_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->casetaid_ = $this->form_vert_form_carril[$sc_seq_vert]['casetaid_']; 
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
       $this->carrilid_ = $this->form_vert_form_carril[$sc_seq_vert]['carrilid_']; 
       $carrilid_ = $this->carrilid_; 
       $sStyleHidden_carrilid_ = '';
       if (isset($sCheckRead_carrilid_))
       {
           unset($sCheckRead_carrilid_);
       }
       if (isset($this->nmgp_cmp_readonly['carrilid_']))
       {
           $sCheckRead_carrilid_ = $this->nmgp_cmp_readonly['carrilid_'];
       }
       if (isset($this->nmgp_cmp_hidden['carrilid_']) && $this->nmgp_cmp_hidden['carrilid_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['carrilid_']);
           $sStyleHidden_carrilid_ = 'display: none;';
       }
       $bTestReadOnly_carrilid_ = true;
       $sStyleReadLab_carrilid_ = 'display: none;';
       $sStyleReadInp_carrilid_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["carrilid_"]) &&  $this->nmgp_cmp_readonly["carrilid_"] == "on"))
       {
           $bTestReadOnly_carrilid_ = false;
           unset($this->nmgp_cmp_readonly['carrilid_']);
           $sStyleReadLab_carrilid_ = '';
           $sStyleReadInp_carrilid_ = 'display: none;';
       }
       $this->carrilnacional_ = $this->form_vert_form_carril[$sc_seq_vert]['carrilnacional_']; 
       $carrilnacional_ = $this->carrilnacional_; 
       $sStyleHidden_carrilnacional_ = '';
       if (isset($sCheckRead_carrilnacional_))
       {
           unset($sCheckRead_carrilnacional_);
       }
       if (isset($this->nmgp_cmp_readonly['carrilnacional_']))
       {
           $sCheckRead_carrilnacional_ = $this->nmgp_cmp_readonly['carrilnacional_'];
       }
       if (isset($this->nmgp_cmp_hidden['carrilnacional_']) && $this->nmgp_cmp_hidden['carrilnacional_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['carrilnacional_']);
           $sStyleHidden_carrilnacional_ = 'display: none;';
       }
       $bTestReadOnly_carrilnacional_ = true;
       $sStyleReadLab_carrilnacional_ = 'display: none;';
       $sStyleReadInp_carrilnacional_ = '';
       if (isset($this->nmgp_cmp_readonly['carrilnacional_']) && $this->nmgp_cmp_readonly['carrilnacional_'] == 'on')
       {
           $bTestReadOnly_carrilnacional_ = false;
           unset($this->nmgp_cmp_readonly['carrilnacional_']);
           $sStyleReadLab_carrilnacional_ = '';
           $sStyleReadInp_carrilnacional_ = 'display: none;';
       }
       $this->cuerpo_ = $this->form_vert_form_carril[$sc_seq_vert]['cuerpo_']; 
       $cuerpo_ = $this->cuerpo_; 
       $sStyleHidden_cuerpo_ = '';
       if (isset($sCheckRead_cuerpo_))
       {
           unset($sCheckRead_cuerpo_);
       }
       if (isset($this->nmgp_cmp_readonly['cuerpo_']))
       {
           $sCheckRead_cuerpo_ = $this->nmgp_cmp_readonly['cuerpo_'];
       }
       if (isset($this->nmgp_cmp_hidden['cuerpo_']) && $this->nmgp_cmp_hidden['cuerpo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cuerpo_']);
           $sStyleHidden_cuerpo_ = 'display: none;';
       }
       $bTestReadOnly_cuerpo_ = true;
       $sStyleReadLab_cuerpo_ = 'display: none;';
       $sStyleReadInp_cuerpo_ = '';
       if (isset($this->nmgp_cmp_readonly['cuerpo_']) && $this->nmgp_cmp_readonly['cuerpo_'] == 'on')
       {
           $bTestReadOnly_cuerpo_ = false;
           unset($this->nmgp_cmp_readonly['cuerpo_']);
           $sStyleReadLab_cuerpo_ = '';
           $sStyleReadInp_cuerpo_ = 'display: none;';
       }
       $this->toperetiro_ = $this->form_vert_form_carril[$sc_seq_vert]['toperetiro_']; 
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
       $this->tramoid_ = $this->form_vert_form_carril[$sc_seq_vert]['tramoid_']; 
       $tramoid_ = $this->tramoid_; 
       $sStyleHidden_tramoid_ = '';
       if (isset($sCheckRead_tramoid_))
       {
           unset($sCheckRead_tramoid_);
       }
       if (isset($this->nmgp_cmp_readonly['tramoid_']))
       {
           $sCheckRead_tramoid_ = $this->nmgp_cmp_readonly['tramoid_'];
       }
       if (isset($this->nmgp_cmp_hidden['tramoid_']) && $this->nmgp_cmp_hidden['tramoid_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tramoid_']);
           $sStyleHidden_tramoid_ = 'display: none;';
       }
       $bTestReadOnly_tramoid_ = true;
       $sStyleReadLab_tramoid_ = 'display: none;';
       $sStyleReadInp_tramoid_ = '';
       if (isset($this->nmgp_cmp_readonly['tramoid_']) && $this->nmgp_cmp_readonly['tramoid_'] == 'on')
       {
           $bTestReadOnly_tramoid_ = false;
           unset($this->nmgp_cmp_readonly['tramoid_']);
           $sStyleReadLab_tramoid_ = '';
           $sStyleReadInp_tramoid_ = 'display: none;';
       }
       $this->v1_ = $this->form_vert_form_carril[$sc_seq_vert]['v1_']; 
       $v1_ = $this->v1_; 
       $sStyleHidden_v1_ = '';
       if (isset($sCheckRead_v1_))
       {
           unset($sCheckRead_v1_);
       }
       if (isset($this->nmgp_cmp_readonly['v1_']))
       {
           $sCheckRead_v1_ = $this->nmgp_cmp_readonly['v1_'];
       }
       if (isset($this->nmgp_cmp_hidden['v1_']) && $this->nmgp_cmp_hidden['v1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['v1_']);
           $sStyleHidden_v1_ = 'display: none;';
       }
       $bTestReadOnly_v1_ = true;
       $sStyleReadLab_v1_ = 'display: none;';
       $sStyleReadInp_v1_ = '';
       if (isset($this->nmgp_cmp_readonly['v1_']) && $this->nmgp_cmp_readonly['v1_'] == 'on')
       {
           $bTestReadOnly_v1_ = false;
           unset($this->nmgp_cmp_readonly['v1_']);
           $sStyleReadLab_v1_ = '';
           $sStyleReadInp_v1_ = 'display: none;';
       }
       $this->v2_ = $this->form_vert_form_carril[$sc_seq_vert]['v2_']; 
       $v2_ = $this->v2_; 
       $sStyleHidden_v2_ = '';
       if (isset($sCheckRead_v2_))
       {
           unset($sCheckRead_v2_);
       }
       if (isset($this->nmgp_cmp_readonly['v2_']))
       {
           $sCheckRead_v2_ = $this->nmgp_cmp_readonly['v2_'];
       }
       if (isset($this->nmgp_cmp_hidden['v2_']) && $this->nmgp_cmp_hidden['v2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['v2_']);
           $sStyleHidden_v2_ = 'display: none;';
       }
       $bTestReadOnly_v2_ = true;
       $sStyleReadLab_v2_ = 'display: none;';
       $sStyleReadInp_v2_ = '';
       if (isset($this->nmgp_cmp_readonly['v2_']) && $this->nmgp_cmp_readonly['v2_'] == 'on')
       {
           $bTestReadOnly_v2_ = false;
           unset($this->nmgp_cmp_readonly['v2_']);
           $sStyleReadLab_v2_ = '';
           $sStyleReadInp_v2_ = 'display: none;';
       }
       $this->v3_ = $this->form_vert_form_carril[$sc_seq_vert]['v3_']; 
       $v3_ = $this->v3_; 
       $sStyleHidden_v3_ = '';
       if (isset($sCheckRead_v3_))
       {
           unset($sCheckRead_v3_);
       }
       if (isset($this->nmgp_cmp_readonly['v3_']))
       {
           $sCheckRead_v3_ = $this->nmgp_cmp_readonly['v3_'];
       }
       if (isset($this->nmgp_cmp_hidden['v3_']) && $this->nmgp_cmp_hidden['v3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['v3_']);
           $sStyleHidden_v3_ = 'display: none;';
       }
       $bTestReadOnly_v3_ = true;
       $sStyleReadLab_v3_ = 'display: none;';
       $sStyleReadInp_v3_ = '';
       if (isset($this->nmgp_cmp_readonly['v3_']) && $this->nmgp_cmp_readonly['v3_'] == 'on')
       {
           $bTestReadOnly_v3_ = false;
           unset($this->nmgp_cmp_readonly['v3_']);
           $sStyleReadLab_v3_ = '';
           $sStyleReadInp_v3_ = 'display: none;';
       }
       $this->esexclusivo_ = $this->form_vert_form_carril[$sc_seq_vert]['esexclusivo_']; 
       $esexclusivo_ = $this->esexclusivo_; 
       $sStyleHidden_esexclusivo_ = '';
       if (isset($sCheckRead_esexclusivo_))
       {
           unset($sCheckRead_esexclusivo_);
       }
       if (isset($this->nmgp_cmp_readonly['esexclusivo_']))
       {
           $sCheckRead_esexclusivo_ = $this->nmgp_cmp_readonly['esexclusivo_'];
       }
       if (isset($this->nmgp_cmp_hidden['esexclusivo_']) && $this->nmgp_cmp_hidden['esexclusivo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['esexclusivo_']);
           $sStyleHidden_esexclusivo_ = 'display: none;';
       }
       $bTestReadOnly_esexclusivo_ = true;
       $sStyleReadLab_esexclusivo_ = 'display: none;';
       $sStyleReadInp_esexclusivo_ = '';
       if (isset($this->nmgp_cmp_readonly['esexclusivo_']) && $this->nmgp_cmp_readonly['esexclusivo_'] == 'on')
       {
           $bTestReadOnly_esexclusivo_ = false;
           unset($this->nmgp_cmp_readonly['esexclusivo_']);
           $sStyleReadLab_esexclusivo_ = '';
           $sStyleReadInp_esexclusivo_ = 'display: none;';
       }
       $this->ip_ = $this->form_vert_form_carril[$sc_seq_vert]['ip_']; 
       $ip_ = $this->ip_; 
       $sStyleHidden_ip_ = '';
       if (isset($sCheckRead_ip_))
       {
           unset($sCheckRead_ip_);
       }
       if (isset($this->nmgp_cmp_readonly['ip_']))
       {
           $sCheckRead_ip_ = $this->nmgp_cmp_readonly['ip_'];
       }
       if (isset($this->nmgp_cmp_hidden['ip_']) && $this->nmgp_cmp_hidden['ip_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ip_']);
           $sStyleHidden_ip_ = 'display: none;';
       }
       $bTestReadOnly_ip_ = true;
       $sStyleReadLab_ip_ = 'display: none;';
       $sStyleReadInp_ip_ = '';
       if (isset($this->nmgp_cmp_readonly['ip_']) && $this->nmgp_cmp_readonly['ip_'] == 'on')
       {
           $bTestReadOnly_ip_ = false;
           unset($this->nmgp_cmp_readonly['ip_']);
           $sStyleReadLab_ip_ = '';
           $sStyleReadInp_ip_ = 'display: none;';
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_carril_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_carril_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_carril_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_carril_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_carril_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_carril_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['casetaid_']) && $this->nmgp_cmp_hidden['casetaid_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="casetaid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->casetaid_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_casetaid__line" id="hidden_field_data_casetaid_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_casetaid_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_casetaid__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_casetaid_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["casetaid_"]) &&  $this->nmgp_cmp_readonly["casetaid_"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_casetaid_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_casetaid_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_casetaid_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_casetaid_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_casetaid_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_casetaid_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_casetaid_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_casetaid_'] = array(); 
    }

   $old_value_carrilid_ = $this->carrilid_;
   $old_value_carrilnacional_ = $this->carrilnacional_;
   $old_value_toperetiro_ = $this->toperetiro_;
   $old_value_v1_ = $this->v1_;
   $old_value_v2_ = $this->v2_;
   $old_value_v3_ = $this->v3_;
   $this->nm_tira_formatacao();


   $unformatted_value_carrilid_ = $this->carrilid_;
   $unformatted_value_carrilnacional_ = $this->carrilnacional_;
   $unformatted_value_toperetiro_ = $this->toperetiro_;
   $unformatted_value_v1_ = $this->v1_;
   $unformatted_value_v2_ = $this->v2_;
   $unformatted_value_v3_ = $this->v3_;

   $nm_comando = "SELECT CasetaID, Caseta  FROM casetas  ORDER BY Caseta";

   $this->carrilid_ = $old_value_carrilid_;
   $this->carrilnacional_ = $old_value_carrilnacional_;
   $this->toperetiro_ = $old_value_toperetiro_;
   $this->v1_ = $old_value_v1_;
   $this->v2_ = $old_value_v2_;
   $this->v3_ = $old_value_v3_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_casetaid_'][] = $rs->fields[0];
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
   $casetaid__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->casetaid__1))
          {
              foreach ($this->casetaid__1 as $tmp_casetaid_)
              {
                  if (trim($tmp_casetaid_) === trim($cadaselect[1])) { $casetaid__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->casetaid_) === trim($cadaselect[1])) { $casetaid__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="casetaid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($casetaid_) . "\"><span id=\"id_ajax_label_casetaid_" . $sc_seq_vert . "\">" . $casetaid__look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_casetaid_();
   $x = 0 ; 
   $casetaid__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->casetaid__1))
          {
              foreach ($this->casetaid__1 as $tmp_casetaid_)
              {
                  if (trim($tmp_casetaid_) === trim($cadaselect[1])) { $casetaid__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->casetaid_) === trim($cadaselect[1])) { $casetaid__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($casetaid__look))
          {
              $casetaid__look = $this->casetaid_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_casetaid_" . $sc_seq_vert . "\" class=\"css_casetaid__line\" style=\"" .  $sStyleReadLab_casetaid_ . "\">" . $this->form_format_readonly("casetaid_", $this->form_encode_input($casetaid__look)) . "</span><span id=\"id_read_off_casetaid_" . $sc_seq_vert . "\" class=\"css_read_off_casetaid_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_casetaid_ . "\">";
   echo " <span id=\"idAjaxSelect_casetaid_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_casetaid__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_casetaid_" . $sc_seq_vert . "\" name=\"casetaid_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->casetaid_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->casetaid_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_casetaid_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_casetaid_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['carrilid_']) && $this->nmgp_cmp_hidden['carrilid_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="carrilid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($carrilid_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_carrilid__line" id="hidden_field_data_carrilid_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_carrilid_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_carrilid__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_carrilid_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["carrilid_"]) &&  $this->nmgp_cmp_readonly["carrilid_"] == "on")) { 

 ?>
<input type="hidden" name="carrilid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($carrilid_) . "\"><span id=\"id_ajax_label_carrilid_" . $sc_seq_vert . "\">" . $carrilid_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_carrilid_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-carrilid_<?php echo $sc_seq_vert ?> css_carrilid__line" style="<?php echo $sStyleReadLab_carrilid_; ?>"><?php echo $this->form_format_readonly("carrilid_", $this->form_encode_input($this->carrilid_)); ?></span><span id="id_read_off_carrilid_<?php echo $sc_seq_vert ?>" class="css_read_off_carrilid_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_carrilid_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_carrilid__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_carrilid_<?php echo $sc_seq_vert ?>" type=text name="carrilid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($carrilid_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> maxlength=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['carrilid_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['carrilid_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['carrilid_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_carrilid_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_carrilid_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['carrilnacional_']) && $this->nmgp_cmp_hidden['carrilnacional_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="carrilnacional_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($carrilnacional_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_carrilnacional__line" id="hidden_field_data_carrilnacional_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_carrilnacional_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_carrilnacional__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_carrilnacional_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["carrilnacional_"]) &&  $this->nmgp_cmp_readonly["carrilnacional_"] == "on") { 

 ?>
<input type="hidden" name="carrilnacional_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($carrilnacional_) . "\">" . $carrilnacional_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_carrilnacional_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-carrilnacional_<?php echo $sc_seq_vert ?> css_carrilnacional__line" style="<?php echo $sStyleReadLab_carrilnacional_; ?>"><?php echo $this->form_format_readonly("carrilnacional_", $this->form_encode_input($this->carrilnacional_)); ?></span><span id="id_read_off_carrilnacional_<?php echo $sc_seq_vert ?>" class="css_read_off_carrilnacional_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_carrilnacional_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_carrilnacional__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_carrilnacional_<?php echo $sc_seq_vert ?>" type=text name="carrilnacional_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($carrilnacional_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> maxlength=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['carrilnacional_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['carrilnacional_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['carrilnacional_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_carrilnacional_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_carrilnacional_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cuerpo_']) && $this->nmgp_cmp_hidden['cuerpo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cuerpo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cuerpo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cuerpo__line" id="hidden_field_data_cuerpo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cuerpo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cuerpo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cuerpo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cuerpo_"]) &&  $this->nmgp_cmp_readonly["cuerpo_"] == "on") { 

 if ("A" == $this->cuerpo_) { $cuerpo__look = "A";} 
 if ("B" == $this->cuerpo_) { $cuerpo__look = "B";} 
?>
<input type="hidden" name="cuerpo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cuerpo_) . "\">" . $cuerpo__look . ""; ?>
<?php } else { ?>

<?php

 if ("A" == $this->cuerpo_) { $cuerpo__look = "A";} 
 if ("B" == $this->cuerpo_) { $cuerpo__look = "B";} 
?>
<span id="id_read_on_cuerpo_<?php echo $sc_seq_vert ; ?>"  class="css_cuerpo__line" style="<?php echo $sStyleReadLab_cuerpo_; ?>"><?php echo $this->form_format_readonly("cuerpo_", $this->form_encode_input($cuerpo__look)); ?></span><span id="id_read_off_cuerpo_<?php echo $sc_seq_vert ; ?>" class="css_read_off_cuerpo_ css_cuerpo__line" style="<?php echo $sStyleReadInp_cuerpo_; ?>"><div id="idAjaxRadio_cuerpo_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_cuerpo__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_cuerpo__line"><?php $tempOptionId = "id-opt-cuerpo_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-cuerpo_ sc-ui-radio-cuerpo_<?php echo $sc_seq_vert ?>" type=radio name="cuerpo_<?php echo $sc_seq_vert ?>" value="A"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_cuerpo_'][] = 'A'; ?>
<?php  if ("A" == $this->cuerpo_)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">A</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_cuerpo__line"><?php $tempOptionId = "id-opt-cuerpo_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-cuerpo_ sc-ui-radio-cuerpo_<?php echo $sc_seq_vert ?>" type=radio name="cuerpo_<?php echo $sc_seq_vert ?>" value="B"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_cuerpo_'][] = 'B'; ?>
<?php  if ("B" == $this->cuerpo_)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">B</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cuerpo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cuerpo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['toperetiro_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['toperetiro_']['format_pos'] || 3 == $this->field_config['toperetiro_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 18, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['toperetiro_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['toperetiro_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['toperetiro_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['toperetiro_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_toperetiro_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_toperetiro_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tramoid_']) && $this->nmgp_cmp_hidden['tramoid_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tramoid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tramoid_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tramoid__line" id="hidden_field_data_tramoid_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tramoid_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tramoid__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tramoid_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tramoid_"]) &&  $this->nmgp_cmp_readonly["tramoid_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_tramoid_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_tramoid_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_tramoid_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_tramoid_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_tramoid_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_tramoid_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_tramoid_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_tramoid_'] = array(); 
    }

   $old_value_carrilid_ = $this->carrilid_;
   $old_value_carrilnacional_ = $this->carrilnacional_;
   $old_value_toperetiro_ = $this->toperetiro_;
   $old_value_v1_ = $this->v1_;
   $old_value_v2_ = $this->v2_;
   $old_value_v3_ = $this->v3_;
   $this->nm_tira_formatacao();


   $unformatted_value_carrilid_ = $this->carrilid_;
   $unformatted_value_carrilnacional_ = $this->carrilnacional_;
   $unformatted_value_toperetiro_ = $this->toperetiro_;
   $unformatted_value_v1_ = $this->v1_;
   $unformatted_value_v2_ = $this->v2_;
   $unformatted_value_v3_ = $this->v3_;

   $nm_comando = "SELECT TramoID, Descripcion  FROM tramo  ORDER BY Descripcion";

   $this->carrilid_ = $old_value_carrilid_;
   $this->carrilnacional_ = $old_value_carrilnacional_;
   $this->toperetiro_ = $old_value_toperetiro_;
   $this->v1_ = $old_value_v1_;
   $this->v2_ = $old_value_v2_;
   $this->v3_ = $old_value_v3_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_tramoid_'][] = $rs->fields[0];
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
   $tramoid__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tramoid__1))
          {
              foreach ($this->tramoid__1 as $tmp_tramoid_)
              {
                  if (trim($tmp_tramoid_) === trim($cadaselect[1])) { $tramoid__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tramoid_) === trim($cadaselect[1])) { $tramoid__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tramoid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tramoid_) . "\">" . $tramoid__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tramoid_();
   $x = 0 ; 
   $tramoid__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tramoid__1))
          {
              foreach ($this->tramoid__1 as $tmp_tramoid_)
              {
                  if (trim($tmp_tramoid_) === trim($cadaselect[1])) { $tramoid__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tramoid_) === trim($cadaselect[1])) { $tramoid__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tramoid__look))
          {
              $tramoid__look = $this->tramoid_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tramoid_" . $sc_seq_vert . "\" class=\"css_tramoid__line\" style=\"" .  $sStyleReadLab_tramoid_ . "\">" . $this->form_format_readonly("tramoid_", $this->form_encode_input($tramoid__look)) . "</span><span id=\"id_read_off_tramoid_" . $sc_seq_vert . "\" class=\"css_read_off_tramoid_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_tramoid_ . "\">";
   echo " <span id=\"idAjaxSelect_tramoid_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_tramoid__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_tramoid_" . $sc_seq_vert . "\" name=\"tramoid_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tramoid_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tramoid_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tramoid_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tramoid_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['v1_']) && $this->nmgp_cmp_hidden['v1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="v1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($v1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_v1__line" id="hidden_field_data_v1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_v1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_v1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_v1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["v1_"]) &&  $this->nmgp_cmp_readonly["v1_"] == "on") { 

 ?>
<input type="hidden" name="v1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($v1_) . "\">" . $v1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_v1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-v1_<?php echo $sc_seq_vert ?> css_v1__line" style="<?php echo $sStyleReadLab_v1_; ?>"><?php echo $this->form_format_readonly("v1_", $this->form_encode_input($this->v1_)); ?></span><span id="id_read_off_v1_<?php echo $sc_seq_vert ?>" class="css_read_off_v1_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_v1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_v1__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_v1_<?php echo $sc_seq_vert ?>" type=text name="v1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($v1_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['v1_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['v1_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['v1_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_v1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_v1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['v2_']) && $this->nmgp_cmp_hidden['v2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="v2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($v2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_v2__line" id="hidden_field_data_v2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_v2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_v2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_v2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["v2_"]) &&  $this->nmgp_cmp_readonly["v2_"] == "on") { 

 ?>
<input type="hidden" name="v2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($v2_) . "\">" . $v2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_v2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-v2_<?php echo $sc_seq_vert ?> css_v2__line" style="<?php echo $sStyleReadLab_v2_; ?>"><?php echo $this->form_format_readonly("v2_", $this->form_encode_input($this->v2_)); ?></span><span id="id_read_off_v2_<?php echo $sc_seq_vert ?>" class="css_read_off_v2_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_v2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_v2__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_v2_<?php echo $sc_seq_vert ?>" type=text name="v2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($v2_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['v2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['v2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['v2_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_v2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_v2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['v3_']) && $this->nmgp_cmp_hidden['v3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="v3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($v3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_v3__line" id="hidden_field_data_v3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_v3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_v3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_v3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["v3_"]) &&  $this->nmgp_cmp_readonly["v3_"] == "on") { 

 ?>
<input type="hidden" name="v3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($v3_) . "\">" . $v3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_v3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-v3_<?php echo $sc_seq_vert ?> css_v3__line" style="<?php echo $sStyleReadLab_v3_; ?>"><?php echo $this->form_format_readonly("v3_", $this->form_encode_input($this->v3_)); ?></span><span id="id_read_off_v3_<?php echo $sc_seq_vert ?>" class="css_read_off_v3_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_v3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_v3__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_v3_<?php echo $sc_seq_vert ?>" type=text name="v3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($v3_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['v3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['v3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['v3_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_v3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_v3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['esexclusivo_']) && $this->nmgp_cmp_hidden['esexclusivo_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="esexclusivo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->esexclusivo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_esexclusivo__line" id="hidden_field_data_esexclusivo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_esexclusivo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_esexclusivo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_esexclusivo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["esexclusivo_"]) &&  $this->nmgp_cmp_readonly["esexclusivo_"] == "on") { 

$esexclusivo__look = "";
 if ($this->esexclusivo_ == "0") { $esexclusivo__look .= "No" ;} 
 if ($this->esexclusivo_ == "1") { $esexclusivo__look .= "Si" ;} 
 if (empty($esexclusivo__look)) { $esexclusivo__look = $this->esexclusivo_; }
?>
<input type="hidden" name="esexclusivo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($esexclusivo_) . "\">" . $esexclusivo__look . ""; ?>
<?php } else { ?>
<?php

$esexclusivo__look = "";
 if ($this->esexclusivo_ == "0") { $esexclusivo__look .= "No" ;} 
 if ($this->esexclusivo_ == "1") { $esexclusivo__look .= "Si" ;} 
 if (empty($esexclusivo__look)) { $esexclusivo__look = $this->esexclusivo_; }
?>
<span id="id_read_on_esexclusivo_<?php echo $sc_seq_vert ; ?>" class="css_esexclusivo__line"  style="<?php echo $sStyleReadLab_esexclusivo_; ?>"><?php echo $this->form_format_readonly("esexclusivo_", $this->form_encode_input($esexclusivo__look)); ?></span><span id="id_read_off_esexclusivo_<?php echo $sc_seq_vert ; ?>" class="css_read_off_esexclusivo_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_esexclusivo_; ?>">
 <span id="idAjaxSelect_esexclusivo_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_esexclusivo__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_esexclusivo_<?php echo $sc_seq_vert ?>" name="esexclusivo_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->esexclusivo_ == "0") { echo " selected" ;} ?>>No</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_esexclusivo_'][] = '0'; ?>
 <option  value="1" <?php  if ($this->esexclusivo_ == "1") { echo " selected" ;} ?>>Si</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['Lookup_esexclusivo_'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_esexclusivo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_esexclusivo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ip_']) && $this->nmgp_cmp_hidden['ip_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ip_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ip_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ip__line" id="hidden_field_data_ip_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ip_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ip__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ip_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ip_"]) &&  $this->nmgp_cmp_readonly["ip_"] == "on") { 

 ?>
<input type="hidden" name="ip_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ip_) . "\">" . $ip_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ip_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ip_<?php echo $sc_seq_vert ?> css_ip__line" style="<?php echo $sStyleReadLab_ip_; ?>"><?php echo $this->form_format_readonly("ip_", $this->form_encode_input($this->ip_)); ?></span><span id="id_read_off_ip_<?php echo $sc_seq_vert ?>" class="css_read_off_ip_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ip_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ip__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ip_<?php echo $sc_seq_vert ?>" type=text name="ip_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ip_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ip_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ip_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
       if (isset($sCheckRead_carrilid_))
       {
           $this->nmgp_cmp_readonly['carrilid_'] = $sCheckRead_carrilid_;
       }
       if ('display: none;' == $sStyleHidden_carrilid_)
       {
           $this->nmgp_cmp_hidden['carrilid_'] = 'off';
       }
       if (isset($sCheckRead_carrilnacional_))
       {
           $this->nmgp_cmp_readonly['carrilnacional_'] = $sCheckRead_carrilnacional_;
       }
       if ('display: none;' == $sStyleHidden_carrilnacional_)
       {
           $this->nmgp_cmp_hidden['carrilnacional_'] = 'off';
       }
       if (isset($sCheckRead_cuerpo_))
       {
           $this->nmgp_cmp_readonly['cuerpo_'] = $sCheckRead_cuerpo_;
       }
       if ('display: none;' == $sStyleHidden_cuerpo_)
       {
           $this->nmgp_cmp_hidden['cuerpo_'] = 'off';
       }
       if (isset($sCheckRead_toperetiro_))
       {
           $this->nmgp_cmp_readonly['toperetiro_'] = $sCheckRead_toperetiro_;
       }
       if ('display: none;' == $sStyleHidden_toperetiro_)
       {
           $this->nmgp_cmp_hidden['toperetiro_'] = 'off';
       }
       if (isset($sCheckRead_tramoid_))
       {
           $this->nmgp_cmp_readonly['tramoid_'] = $sCheckRead_tramoid_;
       }
       if ('display: none;' == $sStyleHidden_tramoid_)
       {
           $this->nmgp_cmp_hidden['tramoid_'] = 'off';
       }
       if (isset($sCheckRead_v1_))
       {
           $this->nmgp_cmp_readonly['v1_'] = $sCheckRead_v1_;
       }
       if ('display: none;' == $sStyleHidden_v1_)
       {
           $this->nmgp_cmp_hidden['v1_'] = 'off';
       }
       if (isset($sCheckRead_v2_))
       {
           $this->nmgp_cmp_readonly['v2_'] = $sCheckRead_v2_;
       }
       if ('display: none;' == $sStyleHidden_v2_)
       {
           $this->nmgp_cmp_hidden['v2_'] = 'off';
       }
       if (isset($sCheckRead_v3_))
       {
           $this->nmgp_cmp_readonly['v3_'] = $sCheckRead_v3_;
       }
       if ('display: none;' == $sStyleHidden_v3_)
       {
           $this->nmgp_cmp_hidden['v3_'] = 'off';
       }
       if (isset($sCheckRead_esexclusivo_))
       {
           $this->nmgp_cmp_readonly['esexclusivo_'] = $sCheckRead_esexclusivo_;
       }
       if ('display: none;' == $sStyleHidden_esexclusivo_)
       {
           $this->nmgp_cmp_hidden['esexclusivo_'] = 'off';
       }
       if (isset($sCheckRead_ip_))
       {
           $this->nmgp_cmp_readonly['ip_'] = $sCheckRead_ip_;
       }
       if ('display: none;' == $sStyleHidden_ip_)
       {
           $this->nmgp_cmp_hidden['ip_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_carril = $guarda_form_vert_form_carril;
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
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R")
{
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq('b')", "scBtnFn_sys_GridPermiteSeq('b')", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['back'];
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
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_carril");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_carril");
 parent.scAjaxDetailHeight("form_carril", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_carril", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_carril", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['sc_modal'])
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
			do_ajax_form_carril_add_new_line(); return false;
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
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-11").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-12").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-13").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-14").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_carril']['buttonStatus'] = $this->nmgp_botoes;
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
