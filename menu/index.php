<?php
include_once('menuKZ_session.php');
@ini_set('session.cookie_httponly', 1);
@ini_set('session.use_only_cookies', 1);
@ini_set('session.cookie_secure', 0);
session_start();
if (!function_exists("sc_check_mobile"))
{
    include_once("../_lib/lib/php/nm_check_mobile.php");
}
$_SESSION['scriptcase']['device_mobile'] = sc_check_mobile();
if (!isset($_SESSION['scriptcase']['display_mobile']))
{
    $_SESSION['scriptcase']['display_mobile'] = true;
}
if ($_SESSION['scriptcase']['device_mobile'])
{
    if ($_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'out' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = false;
    }
    elseif (!$_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'in' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = true;
    }
}
    $_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod']      = "";
    $_SESSION['scriptcase']['menuKZ']['glo_nm_perfil']         = "conn_mysql";
    $_SESSION['scriptcase']['menuKZ']['glo_nm_path_imag_temp'] = "";
    $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo']      = "";
    //check publication with the prod
    $str_path_apl_url  = $_SERVER['PHP_SELF'];
    $str_path_apl_url  = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['menuKZ']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['menuKZ']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //end check publication with the prod

ob_start();

class menuKZ_class
{
  var $Db;

 function sc_Include($path, $tp, $name)
 {
     if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
     {
         include_once($path);
     }
 } // sc_Include

 function menuKZ_menu()
 {
    global $menuKZ_menuData, $nm_data_fixa;
     if (isset($_POST["nmgp_idioma"]))  
     { 
         $Temp_lang = explode(";" , $_POST["nmgp_idioma"]);  
         if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
          { 
             $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
         } 
         if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
         { 
             $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
         } 
     } 
   
     if (isset($_POST["nmgp_schema"]))  
     { 
         $_SESSION['scriptcase']['str_schema_all'] = $_POST["nmgp_schema"] . "/" . $_POST["nmgp_schema"];
     } 
   
           $nm_versao_sc  = "" ; 
           $_SESSION['scriptcase']['menuKZ']['contr_erro'] = 'off';
           $Campos_Mens_erro = "";
           $sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
           $NM_dir_atual = getcwd();
           if (empty($NM_dir_atual))
           {
               $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
               $str_path_sys          = str_replace("\\", '/', $str_path_sys);
           }
           else
           {
               $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
               $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
           }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
$this->sc_charset['UTF-8'] = 'utf-8';
$this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
$this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
$this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
$this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
$this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
$this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
$this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
$this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
$this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
$this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
$this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
$this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
$this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
$this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
$this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
$this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
$this->sc_charset['WINDOWS-1250'] = 'windows-1250';
$this->sc_charset['WINDOWS-1251'] = 'windows-1251';
$this->sc_charset['WINDOWS-1252'] = 'windows-1252';
$this->sc_charset['TIS-620'] = 'tis-620';
$this->sc_charset['WINDOWS-1253'] = 'windows-1253';
$this->sc_charset['WINDOWS-1254'] = 'windows-1254';
$this->sc_charset['WINDOWS-1255'] = 'windows-1255';
$this->sc_charset['WINDOWS-1256'] = 'windows-1256';
$this->sc_charset['WINDOWS-1257'] = 'windows-1257';
$this->sc_charset['KOI8-R'] = 'koi8-r';
$this->sc_charset['BIG-5'] = 'big5';
$this->sc_charset['EUC-CN'] = 'EUC-CN';
$this->sc_charset['GB18030'] = 'GB18030';
$this->sc_charset['GB2312'] = 'gb2312';
$this->sc_charset['EUC-JP'] = 'euc-jp';
$this->sc_charset['SJIS'] = 'shift-jis';
$this->sc_charset['EUC-KR'] = 'euc-kr';
$_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
$_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
$_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
$_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
$_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
$str_path_web   = $_SERVER['PHP_SELF'];
$str_path_web   = str_replace("\\", '/', $str_path_web);
$str_path_web   = str_replace('//', '/', $str_path_web);
$str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
$path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
$path_btn       = $str_root . $path_link . "_lib/buttons/";
$path_imag_cab  = $path_link . "_lib/img";
$this->force_mobile = false;
$this->menu_orientacao = 'horizontal';
$this->path_botoes    = '../_lib/img';
$this->path_imag_apl  = $str_root . $path_link . "_lib/img";
$path_help      = $path_link . "_lib/webhelp/";
$path_libs      = $str_root . $_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "menuKZ/img";
$this->path_css = $str_root . $path_link . "_lib/css/";
$_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['menuKZ']['glo_nm_path_imag_temp'];
$this->url_css = "../_lib/css/";
$path_lib_php   = $str_root . $path_link . "_lib/lib/php";
$menu_mobile_hide          = 'N';
$menu_mobile_inicial_state = 'escondido';
$menu_mobile_hide_onclick  = 'S';
$menutree_mobile_float     = 'S';
$menu_mobile_hide_icon     = 'N';
$menu_mobile_hide_icon_menu_position     = 'right';
$mobile_menu_mobile_hide          = 'S';
$mobile_menu_mobile_inicial_state = 'aberto';
$mobile_menu_mobile_hide_onclick  = 'S';
$mobile_menutree_mobile_float     = 'N';
$mobile_menu_mobile_hide_icon     = 'N';
$mobile_menu_mobile_hide_icon_menu_position     = 'right';

$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menuKZ');
if (isset($_SESSION['scriptcase']['user_logout']))
{
    foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
    {
        if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
        {
            unset($_SESSION['scriptcase']['user_logout'][$ind]);
            $nm_apl_dest = $parms['R'];
            $dir = explode("/", $nm_apl_dest);
            if (count($dir) == 1)
            {
                $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/";
            }
?>
            <html>
            <body>
            <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
            </form>
            <script>
             document.FRedirect.submit();
            </script>
            </body>
            </html>
<?php
            exit;
        }
    }
}
if (!defined("SC_ERROR_HANDLER"))
{
    define("SC_ERROR_HANDLER", 1);
    include_once(dirname(__FILE__) . "/menuKZ_erro.php");
}
include_once(dirname(__FILE__) . "/menuKZ_erro.class.php"); 
$this->Erro = new menuKZ_erro();
$str_path = substr($_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod'], 0, strrpos($_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod'], '/') + 1);
if (!is_file($str_root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
{
    unset($_SESSION['scriptcase']['nm_sc_retorno']);
    unset($_SESSION['scriptcase']['menuKZ']['glo_nm_conexao']);
}

/* Path definitions */
$menuKZ_menuData         = array();
$menuKZ_menuData['path'] = array();
$menuKZ_menuData['url']  = array();
$menuKZ_menuData['data'] = "";
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $menuKZ_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $menuKZ_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $menuKZ_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $menuKZ_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$menuKZ_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$menuKZ_menuData['url']['web']   = str_replace("\\", '/', $menuKZ_menuData['url']['web']);
$menuKZ_menuData['path']['root'] = substr($menuKZ_menuData['path']['sys'],  0, -1 * strlen($menuKZ_menuData['url']['web']));
$menuKZ_menuData['path']['app']  = substr($menuKZ_menuData['path']['sys'],  0, strrpos($menuKZ_menuData['path']['sys'],  '/'));
$menuKZ_menuData['path']['link'] = substr($menuKZ_menuData['path']['app'],  0, strrpos($menuKZ_menuData['path']['app'],  '/'));
$menuKZ_menuData['path']['link'] = substr($menuKZ_menuData['path']['link'], 0, strrpos($menuKZ_menuData['path']['link'], '/')) . '/';
$menuKZ_menuData['path']['app'] .= '/';
$menuKZ_menuData['url']['app']   = substr($menuKZ_menuData['url']['web'],  0, strrpos($menuKZ_menuData['url']['web'],  '/'));
$menuKZ_menuData['url']['link']  = substr($menuKZ_menuData['url']['app'],  0, strrpos($menuKZ_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] == "S")
{
    $menuKZ_menuData['url']['link']  = substr($menuKZ_menuData['url']['link'], 0, strrpos($menuKZ_menuData['url']['link'], '/'));
}
$menuKZ_menuData['url']['link']  .= '/';
$menuKZ_menuData['url']['app']   .= '/';


$_SESSION['scriptcase']['menuKZ']['sc_apl_link'] = $menuKZ_menuData['url']['link'];

if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
{
    $_SESSION['scriptcase']['str_lang'] = "es";
}
if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
{
    $_SESSION['scriptcase']['str_conf_reg'] = "es_mx";
}
$this->str_lang        = $_SESSION['scriptcase']['str_lang'];
$this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
if (isset($_SESSION['scriptcase']['menuKZ']['session_timeout']['lang'])) {
    $this->str_lang = $_SESSION['scriptcase']['menuKZ']['session_timeout']['lang'];
}
elseif (!isset($_SESSION['scriptcase']['menuKZ']['actual_lang']) || $_SESSION['scriptcase']['menuKZ']['actual_lang'] != $this->str_lang) {
    $_SESSION['scriptcase']['menuKZ']['actual_lang'] = $this->str_lang;
    setcookie('sc_actual_lang_BackOffice_Acapulco',$this->str_lang,'0','/');
}
if (!function_exists("NM_is_utf8"))
{
   include_once("../_lib/lib/php/nm_utf8.php");
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('BackOffice_Acapulco');
if ($_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] == "S")
{
    $path_apls     = substr($path_apls, 0, strrpos($path_apls, '/'));
}
$path_apls     .= "/";
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "rhino_tkz/rhino_tkz";
include("../_lib/lang/". $this->str_lang .".lang.php");
include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
if(isset($pagina_schemamenu) && !empty($pagina_schemamenu) && is_file("../_lib/menuicons/". $pagina_schemamenu .".php"))
{
    include("../_lib/menuicons/". $pagina_schemamenu .".php");
}
$this->img_sep_toolbar = trim($str_toolbar_separator);
include("../_lib/lang/config_region.php");
include("../_lib/lang/lang_config_region.php");
$this->regionalDefault();
$Str_btn_menu = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
$Str_btn_css  = trim($str_button) . "/" . trim($str_button) . ".css";
include($path_btn . $Str_btn_menu);
if (!function_exists("nmButtonOutput"))
{
   include_once("../_lib/lib/php/nm_gp_config_btn.php");
}
asort($this->Nm_lang_conf_region);
$this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
$this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
$this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
$this->nm_data = new nm_data("es");
include_once("menuKZ_toolbar.php");

$this->tab_grupo[0] = "BackOffice_Acapulco/";
if ($_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] != "S")
{
    $this->tab_grupo[0] = "";
}

     $_SESSION['scriptcase']['menu_atual'] = "menuKZ";
     $_SESSION['scriptcase']['menu_apls']['menuKZ'] = array();
     if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
     {
         foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
         {
             if (isset($_SESSION['scriptcase']['menuKZ']['glo_nm_conexao']) && $_SESSION['scriptcase']['menuKZ']['glo_nm_conexao'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menuKZ']['glo_nm_conexao'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menuKZ']['glo_nm_perfil']) && $_SESSION['scriptcase']['menuKZ']['glo_nm_perfil'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menuKZ']['glo_nm_perfil'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menuKZ']['glo_con_' . $NM_con_orig]))
             {
                 $_SESSION['scriptcase']['menuKZ']['glo_con_' . $NM_con_orig] = $NM_con_dest;
             }
         }
     }
$_SESSION['scriptcase']['charset'] = "UTF-8";
ini_set('default_charset', $_SESSION['scriptcase']['charset']);
$_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
foreach ($this->Nm_lang as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
    {
        $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
        $this->Nm_lang[$ind] = $dados;
    }
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
{
    $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
}
if (isset($_SESSION['scriptcase']['menuKZ']['session_timeout']['redir'])) {
    $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
';
    $SS_cod_html .= "<HTML>\r\n";
    $SS_cod_html .= " <HEAD>\r\n";
    $SS_cod_html .= "  <TITLE></TITLE>\r\n";
    $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
    if ($_SESSION['scriptcase']['proc_mobile']) {
        $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
    }
    $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
    $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
    if ($_SESSION['scriptcase']['menuKZ']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body>\r\n";
    }
    else {
        $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH.css\"/>\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body class=\"scMenuHPage\">\r\n";
        $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div>\r\n";
        $SS_cod_html .= "    <table class=\"scMenuHTable\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scMenuHHeader\"><td class=\"scMenuHHeaderFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
        $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
        $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
        $SS_cod_html .= "           target=\"_self\">\r\n";
        $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['menuKZ']['session_timeout']['redir'] . "');\">\r\n";
        $SS_cod_html .= "     </form>\r\n";
        $SS_cod_html .= "    </td></tr></table>\r\n";
        $SS_cod_html .= "    </div></td></tr></table>\r\n";
    }
    $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
    if ($_SESSION['scriptcase']['menuKZ']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['menuKZ']['session_timeout']['redir'] . "');\r\n";
    }
    $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
    $SS_cod_html .= "      {\r\n";
    $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
    $SS_cod_html .= "         {\r\n";
    $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
    $SS_cod_html .= "         }\r\n";
    $SS_cod_html .= "         else\r\n";
    $SS_cod_html .= "         {\r\n";
    $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
    $SS_cod_html .= "             {\r\n";
    $SS_cod_html .= "                 window.close();\r\n";
    $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
    $SS_cod_html .= "             }\r\n";
    $SS_cod_html .= "             else\r\n";
    $SS_cod_html .= "             {\r\n";
    $SS_cod_html .= "                 window.location = url_redir;\r\n";
    $SS_cod_html .= "             }\r\n";
    $SS_cod_html .= "         }\r\n";
    $SS_cod_html .= "      }\r\n";
    $SS_cod_html .= "    </script>\r\n";
    $SS_cod_html .= " </body>\r\n";
    $SS_cod_html .= "</HTML>\r\n";
    unset($_SESSION['scriptcase']['menuKZ']['session_timeout']);
    unset($_SESSION['sc_session']);
}
if (isset($SS_cod_html))
{
    echo $SS_cod_html;
    exit;
}
$_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
$_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
$_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
if (is_dir($path_img_old))
{
    $Res_dir_img = @opendir($path_img_old);
    if ($Res_dir_img)
    {
        while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
        {
           $Str_arquivo = "/" . $Str_arquivo;
           if (@is_file($path_img_old . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_img_old . $Str_arquivo)
           {
               @unlink($path_img_old . $Str_arquivo);
           }
        }
    }
    @closedir($Res_dir_img);
    rmdir($path_img_old);
}
//
if (isset($_GET) && !empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (isset($_POST) && !empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($nmgp_start) ))
{
    $_SESSION['sc_session']['SC_parm_violation'] = true;
}
if (isset($script_case_init))
{
    $_SESSION['sc_session'][1]['menuKZ']['init'] = $script_case_init;
}
else
if (!isset($_SESSION['sc_session'][1]['menuKZ']['init']))
{
    $_SESSION['sc_session'][1]['menuKZ']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['menuKZ']['init'];
if (isset($nmgp_parms) && !empty($nmgp_parms)) 
{ 
    $nmgp_parms = NM_decode_input($nmgp_parms);
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
    $todo  = explode("?@?", $todox);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
       {
           $cadapar[0] = substr($cadapar[0], 11);
           $cadapar[1] = $_SESSION[$cadapar[1]];
       }
        if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
       $Tmp_par   = $cadapar[0];;
       $$Tmp_par = $cadapar[1];
       $_SESSION[$cadapar[0]] = $cadapar[1];
       $ix++;
     }
} 
if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['menuKZ']['session_timeout']['redir']))
{
    unset($_SESSION['sc_session']['SC_parm_violation']);
    echo "<html>";
    echo "<body>";
    echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
    echo "<tr>";
    echo "   <td align=\"center\">";
    echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
    echo "   </b></td>";
    echo " </tr>";
    echo "</table>";
    echo "</body>";
    echo "</html>";
    exit;
}
$nm_url_saida = "";
if (isset($nmgp_url_saida))
{
    $nm_url_saida = $nmgp_url_saida;
    if (isset($script_case_init))
    {
        $nm_url_saida .= "?script_case_init=" . NM_encode_input($script_case_init);
    }
}
if (isset($_POST["nmgp_idioma"]) || isset($_POST["nmgp_schema"]))  
{ 
    $nm_url_saida = $_SESSION['scriptcase']['sc_saida_menuKZ'];
}
elseif (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_menuKZ'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_menuKZ'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
$this->str_schema_all = $STR_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "rhino_tkz/rhino_tkz";
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['menuKZ'] = "on";
} 
if (!isset($_SESSION['scriptcase']['menuKZ']['session_timeout']['redir']) && (!isset($_SESSION['scriptcase']['sc_apl_seg']['menuKZ']) || $_SESSION['scriptcase']['sc_apl_seg']['menuKZ'] != "on"))
{ 
    $NM_Mens_Erro = $this->Nm_lang['lang_errm_unth_user'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

    <HTML>
     <HEAD>
      <TITLE></TITLE>
     <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
      <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>      <META http-equiv="Pragma" content="no-cache"/>
      <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
     </HEAD>
     <body>
       <table align="center" class="scGridBorder"><tr><td style="padding: 0">
       <table style="width: 100%" class="scGridTabela"><tr class="scGridFieldOdd"><td class="scGridFieldOddFont" style="padding: 15px 30px; text-align: center">
        <?php echo $NM_Mens_Erro; ?>
        <br />
        <form name="Fseg" method="post" target="_self">
         <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($script_case_init) ?>"/> 
         <input type="button" name="sc_sai_seg" value="OK" onclick="nm_saida()"> 
        </form> 
       </td></tr></table>
       </td></tr></table>
<?php
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']))
              {
?>
<br /><br /><br />
<table align="center" class="scGridBorder" style="width: 450px"><tr><td style="padding: 0">
 <table style="width: 100%" class="scGridTabela">
  <tr class="scGridFieldOdd">
   <td class="scGridFieldOddFont" style="padding: 15px 30px">
    <?php echo $this->Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
              }
?>
     </body>
     <?php
     $trab_path             = explode("/", $_SERVER['PHP_SELF']);
     $trab_count_path       = count($trab_path);
     $path_retorno_aplicacao  = "";
     for ($ix = 0; $ix + 2 < $trab_count_path; $ix++)
     {
         $path_retorno_aplicacao .=  $trab_path[$ix] . "/";
     }
     $path_retorno_aplicacao .=  "" . SC_dir_app_name('acceso') . "/";
     $nm_redirect = $path_retorno_aplicacao;
     $saida_final = "window.location = '" . $nm_redirect . "'";
     ?>
    <script type="text/javascript">
      function nm_saida()
      {
<?php 
             echo $saida_final;
?> 
      }
     </script> 
<?php
    exit;
} 
$this->sc_Include($path_libs . "/nm_ini_lib.php", "F", "nm_dir_normaliza") ; 
      $_SESSION['scriptcase']['menuKZ']['contr_erro'] = 'on';
  $NM_tmp_dis = 'item_52,item_58,item_59,item_60,item_61';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menuKZ']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menuKZ'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menuKZ']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menuKZ'][] = trim($Cada_dis);
    }
}

$_SESSION['scriptcase']['menuKZ']['contr_erro'] = 'off';
/* Dados do menu em sessao */
$_SESSION['nm_menu'] = array('prod' => $str_root . $_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod'] . '/third/COOLjsMenu/',
                              'url' => $_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod'] . '/third/COOLjsMenu/');

if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == "true") || (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'menuKZ'))
{
    $_SESSION['sc_session'][1]['menuKZ']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
    $_SESSION['scriptcase']['sc_saida_menuKZ'] = "javascript:window.close()";
}
/* Menu configuration variables */
$menuKZ_menuData['iframe'] = TRUE;

if (!isset($_SESSION['scriptcase']['sc_apl_seg']))
{
    $_SESSION['scriptcase']['sc_apl_seg'] = array();
}
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("portada") . "/portada_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['portada']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['portada'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['portada'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("portada") . "/portada_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['portada']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['portada'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['portada'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detalleturno") . "/grid_detalleturno_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detalleturnoPTC") . "/grid_detalleturnoPTC_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPTC']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPTC'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPTC'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detalleturnoPT") . "/grid_detalleturnoPT_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPT']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPT'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPT'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detalleturnoPD") . "/grid_detalleturnoPD_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPD']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPD'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPD'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("pagos_peaje") . "/pagos_peaje_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['pagos_peaje']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['pagos_peaje'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['pagos_peaje'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("pagos_faltantes") . "/pagos_faltantes_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['pagos_faltantes']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['pagos_faltantes'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['pagos_faltantes'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_preliquidacion_fs") . "/grid_preliquidacion_fs_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_preliquidacion_fs']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_preliquidacion_fs'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_preliquidacion_fs'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("menu_controldiario") . "/menu_controldiario_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['menu_controldiario']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['menu_controldiario'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['menu_controldiario'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_restablecePreL") . "/grid_restablecePreL_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_restablecePreL']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_restablecePreL'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_restablecePreL'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detalleturno_LCR") . "/grid_detalleturno_LCR_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LCR']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LCR'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LCR'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detalleturno_LDT") . "/grid_detalleturno_LDT_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LDT']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LDT'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LDT'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detalleturno_LD") . "/grid_detalleturno_LD_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LD']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LD'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LD'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_liquidacion_fs") . "/grid_liquidacion_fs_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_liquidacion_fs']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_liquidacion_fs'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_liquidacion_fs'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reversaliquidacion") . "/grid_reversaliquidacion_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reversaliquidacion']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_reversaliquidacion'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_reversaliquidacion'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_ano") . "/control_ano_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_ano']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_ano'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_ano'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_eventos_resumen") . "/grid_eventos_resumen_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_resumen']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_resumen'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_resumen'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_eventos_min") . "/grid_eventos_min_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_min']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_min'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_min'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_discrepancias") . "/grid_discrepancias_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_discrepancias']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_discrepancias'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_discrepancias'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_aforo") . "/grid_aforo_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_aforo']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_aforo'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_aforo'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detalleturno_bit") . "/grid_detalleturno_bit_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_bit']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_bit'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_bit'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_trafico") . "/grid_trafico_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_trafico']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_trafico'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_trafico'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_estadodispositivos") . "/grid_estadodispositivos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_estadodispositivos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_estadodispositivos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_estadodispositivos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detallealarma_dia") . "/grid_detallealarma_dia_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detallealarma_dia']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detallealarma_dia'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_detallealarma_dia'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("menu_pisal") . "/menu_pisal_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['menu_pisal']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['menu_pisal'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['menu_pisal'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("menu_sct") . "/menu_sct_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['menu_sct']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['menu_sct'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['menu_sct'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_sc_log") . "/grid_sc_log_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sc_log']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_sc_log'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_sc_log'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reseteos") . "/grid_reseteos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reseteos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_reseteos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_reseteos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard_autopista") . "/dashboard_autopista_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_autopista']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['dashboard_autopista'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['dashboard_autopista'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_usuario") . "/grid_usuario_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usuario']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_usuario'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_usuario'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tarifasPeriodo") . "/grid_tarifasPeriodo_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tarifasPeriodo']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tarifasPeriodo'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tarifasPeriodo'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_categoria") . "/grid_categoria_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_categoria']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_categoria'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_categoria'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tipopago") . "/form_tipopago_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipopago']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_tipopago'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_tipopago'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_excentos") . "/grid_excentos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_excentos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_excentos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_excentos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_sec_configura") . "/form_sec_configura_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_sec_configura']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_sec_configura'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_sec_configura'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_exportadatos") . "/control_exportadatos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_exportadatos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_exportadatos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_exportadatos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_importadatos") . "/control_importadatos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_importadatos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_importadatos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_importadatos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_cfacturacion") . "/control_cfacturacion_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_cfacturacion']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_cfacturacion'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_cfacturacion'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_detalleemergentes") . "/form_detalleemergentes_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_detalleemergentes']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_detalleemergentes'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_detalleemergentes'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario_caseta") . "/grid_inventario_caseta_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_caseta']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_caseta'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_caseta'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("CarrilActivo") . "/CarrilActivo_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['CarrilActivo']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['CarrilActivo'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['CarrilActivo'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_importaArchivo") . "/control_importaArchivo_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_importaArchivo']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_importaArchivo'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_importaArchivo'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("seg_grid_sec_users") . "/seg_grid_sec_users_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("seg_grid_sec_apps") . "/seg_grid_sec_apps_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_apps']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_apps'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_apps'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("seg_grid_sec_groups") . "/seg_grid_sec_groups_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_groups']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_groups'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_groups'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("seg_grid_sec_users_groups") . "/seg_grid_sec_users_groups_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users_groups']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users_groups'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users_groups'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("seg_search_sec_groups") . "/seg_search_sec_groups_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_search_sec_groups']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['seg_search_sec_groups'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['seg_search_sec_groups'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("seg_sync_apps") . "/seg_sync_apps_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_sync_apps']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['seg_sync_apps'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['seg_sync_apps'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("seg_change_pswd") . "/seg_change_pswd_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_change_pswd']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['seg_change_pswd'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['seg_change_pswd'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("video_realtime") . "/video_realtime_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['video_realtime']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['video_realtime'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['video_realtime'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("video_realtime") . "/video_realtime_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['video_realtime']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['video_realtime'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['video_realtime'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("acceso") . "/acceso_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['acceso']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['acceso'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['acceso'] = "on";
} 
/* Menu items */

$sOutputBuffer = ob_get_contents();
ob_end_clean();

 $nm_var_lab[0] = "Inicio";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[0]))
{
    $nm_var_lab[0] = sc_convert_encoding($nm_var_lab[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[1] = "Preliquida";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[1]))
{
    $nm_var_lab[1] = sc_convert_encoding($nm_var_lab[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[2] = "Pre * Carril";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[2]))
{
    $nm_var_lab[2] = sc_convert_encoding($nm_var_lab[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[3] = "Pre * Turno-Carril";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[3]))
{
    $nm_var_lab[3] = sc_convert_encoding($nm_var_lab[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[4] = "Pre * Turno";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[4]))
{
    $nm_var_lab[4] = sc_convert_encoding($nm_var_lab[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[5] = "Pre * Día";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[5]))
{
    $nm_var_lab[5] = sc_convert_encoding($nm_var_lab[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[6] = "Pagos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[6]))
{
    $nm_var_lab[6] = sc_convert_encoding($nm_var_lab[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[7] = "Pagos * Faltante";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[7]))
{
    $nm_var_lab[7] = sc_convert_encoding($nm_var_lab[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[8] = "Reporte * Pres";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[8]))
{
    $nm_var_lab[8] = sc_convert_encoding($nm_var_lab[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[9] = "Reporte * Día Detallado";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[9]))
{
    $nm_var_lab[9] = sc_convert_encoding($nm_var_lab[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[10] = "<-- * Pre";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[10]))
{
    $nm_var_lab[10] = sc_convert_encoding($nm_var_lab[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[11] = "Verificar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[11]))
{
    $nm_var_lab[11] = sc_convert_encoding($nm_var_lab[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[12] = "Verif * Corte";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[12]))
{
    $nm_var_lab[12] = sc_convert_encoding($nm_var_lab[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[13] = "Verif * Turno";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[13]))
{
    $nm_var_lab[13] = sc_convert_encoding($nm_var_lab[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[14] = "Verif * Día";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[14]))
{
    $nm_var_lab[14] = sc_convert_encoding($nm_var_lab[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[15] = "Reporte * Verifs";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[15]))
{
    $nm_var_lab[15] = sc_convert_encoding($nm_var_lab[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[16] = "<-- Verif";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[16]))
{
    $nm_var_lab[16] = sc_convert_encoding($nm_var_lab[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[17] = "Consulta";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[17]))
{
    $nm_var_lab[17] = sc_convert_encoding($nm_var_lab[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[18] = "Resumen mensual";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[18]))
{
    $nm_var_lab[18] = sc_convert_encoding($nm_var_lab[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[19] = "Resumen";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[19]))
{
    $nm_var_lab[19] = sc_convert_encoding($nm_var_lab[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[20] = "Bitácora Diaria";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[20]))
{
    $nm_var_lab[20] = sc_convert_encoding($nm_var_lab[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[21] = "Precisión y Conteo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[21]))
{
    $nm_var_lab[21] = sc_convert_encoding($nm_var_lab[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[22] = "Bitácora General";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[22]))
{
    $nm_var_lab[22] = sc_convert_encoding($nm_var_lab[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[23] = "Cortes Operados";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[23]))
{
    $nm_var_lab[23] = sc_convert_encoding($nm_var_lab[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[24] = "Tráfico horario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[24]))
{
    $nm_var_lab[24] = sc_convert_encoding($nm_var_lab[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[25] = "Estado de Dispositivos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[25]))
{
    $nm_var_lab[25] = sc_convert_encoding($nm_var_lab[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[26] = "Incidencias Carril";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[26]))
{
    $nm_var_lab[26] = sc_convert_encoding($nm_var_lab[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[27] = "Reportes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[27]))
{
    $nm_var_lab[27] = sc_convert_encoding($nm_var_lab[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[28] = "Reportes SCT";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[28]))
{
    $nm_var_lab[28] = sc_convert_encoding($nm_var_lab[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[29] = "Log de accesos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[29]))
{
    $nm_var_lab[29] = sc_convert_encoding($nm_var_lab[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[30] = "Reversas Pre y Lid";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[30]))
{
    $nm_var_lab[30] = sc_convert_encoding($nm_var_lab[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[31] = "Configuración";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[31]))
{
    $nm_var_lab[31] = sc_convert_encoding($nm_var_lab[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[32] = "Autopista";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[32]))
{
    $nm_var_lab[32] = sc_convert_encoding($nm_var_lab[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[33] = "Usuarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[33]))
{
    $nm_var_lab[33] = sc_convert_encoding($nm_var_lab[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[34] = "Tarifas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[34]))
{
    $nm_var_lab[34] = sc_convert_encoding($nm_var_lab[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[35] = "Tipo de Pago";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[35]))
{
    $nm_var_lab[35] = sc_convert_encoding($nm_var_lab[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[36] = "Categorias de pago";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[36]))
{
    $nm_var_lab[36] = sc_convert_encoding($nm_var_lab[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[37] = "Vehículos exentos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[37]))
{
    $nm_var_lab[37] = sc_convert_encoding($nm_var_lab[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[38] = "Direccionamiento";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[38]))
{
    $nm_var_lab[38] = sc_convert_encoding($nm_var_lab[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[39] = "Herramientas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[39]))
{
    $nm_var_lab[39] = sc_convert_encoding($nm_var_lab[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[40] = "Genera Archivo Día";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[40]))
{
    $nm_var_lab[40] = sc_convert_encoding($nm_var_lab[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[41] = "ImportaAuxiliares";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[41]))
{
    $nm_var_lab[41] = sc_convert_encoding($nm_var_lab[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[42] = "Facturación";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[42]))
{
    $nm_var_lab[42] = sc_convert_encoding($nm_var_lab[42], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[43] = "Inserta Emergentes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[43]))
{
    $nm_var_lab[43] = sc_convert_encoding($nm_var_lab[43], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[44] = "Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[44]))
{
    $nm_var_lab[44] = sc_convert_encoding($nm_var_lab[44], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[45] = "Carriles activos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[45]))
{
    $nm_var_lab[45] = sc_convert_encoding($nm_var_lab[45], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[46] = "Inserta eventos carril";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[46]))
{
    $nm_var_lab[46] = sc_convert_encoding($nm_var_lab[46], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[47] = "Cam";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[47]))
{
    $nm_var_lab[47] = sc_convert_encoding($nm_var_lab[47], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[48] = "Atlacomulco";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[48]))
{
    $nm_var_lab[48] = sc_convert_encoding($nm_var_lab[48], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[49] = "Contepec";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[49]))
{
    $nm_var_lab[49] = sc_convert_encoding($nm_var_lab[49], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[0] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[0]))
{
    $nm_var_hint[0] = sc_convert_encoding($nm_var_hint[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[1] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[1]))
{
    $nm_var_hint[1] = sc_convert_encoding($nm_var_hint[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[2] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[2]))
{
    $nm_var_hint[2] = sc_convert_encoding($nm_var_hint[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[3] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[3]))
{
    $nm_var_hint[3] = sc_convert_encoding($nm_var_hint[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[4] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[4]))
{
    $nm_var_hint[4] = sc_convert_encoding($nm_var_hint[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[5] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[5]))
{
    $nm_var_hint[5] = sc_convert_encoding($nm_var_hint[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[6] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[6]))
{
    $nm_var_hint[6] = sc_convert_encoding($nm_var_hint[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[7] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[7]))
{
    $nm_var_hint[7] = sc_convert_encoding($nm_var_hint[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[8] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[8]))
{
    $nm_var_hint[8] = sc_convert_encoding($nm_var_hint[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[9] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[9]))
{
    $nm_var_hint[9] = sc_convert_encoding($nm_var_hint[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[10] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[10]))
{
    $nm_var_hint[10] = sc_convert_encoding($nm_var_hint[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[11] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[11]))
{
    $nm_var_hint[11] = sc_convert_encoding($nm_var_hint[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[12] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[12]))
{
    $nm_var_hint[12] = sc_convert_encoding($nm_var_hint[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[13] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[13]))
{
    $nm_var_hint[13] = sc_convert_encoding($nm_var_hint[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[14] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[14]))
{
    $nm_var_hint[14] = sc_convert_encoding($nm_var_hint[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[15] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[15]))
{
    $nm_var_hint[15] = sc_convert_encoding($nm_var_hint[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[16] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[16]))
{
    $nm_var_hint[16] = sc_convert_encoding($nm_var_hint[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[17] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[17]))
{
    $nm_var_hint[17] = sc_convert_encoding($nm_var_hint[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[18] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[18]))
{
    $nm_var_hint[18] = sc_convert_encoding($nm_var_hint[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[19] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[19]))
{
    $nm_var_hint[19] = sc_convert_encoding($nm_var_hint[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[20] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[20]))
{
    $nm_var_hint[20] = sc_convert_encoding($nm_var_hint[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[21] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[21]))
{
    $nm_var_hint[21] = sc_convert_encoding($nm_var_hint[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[22] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[22]))
{
    $nm_var_hint[22] = sc_convert_encoding($nm_var_hint[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[23] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[23]))
{
    $nm_var_hint[23] = sc_convert_encoding($nm_var_hint[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[24] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[24]))
{
    $nm_var_hint[24] = sc_convert_encoding($nm_var_hint[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[25] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[25]))
{
    $nm_var_hint[25] = sc_convert_encoding($nm_var_hint[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[26] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[26]))
{
    $nm_var_hint[26] = sc_convert_encoding($nm_var_hint[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[27] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[27]))
{
    $nm_var_hint[27] = sc_convert_encoding($nm_var_hint[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[28] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[28]))
{
    $nm_var_hint[28] = sc_convert_encoding($nm_var_hint[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[29] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[29]))
{
    $nm_var_hint[29] = sc_convert_encoding($nm_var_hint[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[30] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[30]))
{
    $nm_var_hint[30] = sc_convert_encoding($nm_var_hint[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[31] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[31]))
{
    $nm_var_hint[31] = sc_convert_encoding($nm_var_hint[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[32] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[32]))
{
    $nm_var_hint[32] = sc_convert_encoding($nm_var_hint[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[33] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[33]))
{
    $nm_var_hint[33] = sc_convert_encoding($nm_var_hint[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[34] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[34]))
{
    $nm_var_hint[34] = sc_convert_encoding($nm_var_hint[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[35] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[35]))
{
    $nm_var_hint[35] = sc_convert_encoding($nm_var_hint[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[36] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[36]))
{
    $nm_var_hint[36] = sc_convert_encoding($nm_var_hint[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[37] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[37]))
{
    $nm_var_hint[37] = sc_convert_encoding($nm_var_hint[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[38] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[38]))
{
    $nm_var_hint[38] = sc_convert_encoding($nm_var_hint[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[39] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[39]))
{
    $nm_var_hint[39] = sc_convert_encoding($nm_var_hint[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[40] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[40]))
{
    $nm_var_hint[40] = sc_convert_encoding($nm_var_hint[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[41] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[41]))
{
    $nm_var_hint[41] = sc_convert_encoding($nm_var_hint[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[42] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[42]))
{
    $nm_var_hint[42] = sc_convert_encoding($nm_var_hint[42], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[43] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[43]))
{
    $nm_var_hint[43] = sc_convert_encoding($nm_var_hint[43], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[44] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[44]))
{
    $nm_var_hint[44] = sc_convert_encoding($nm_var_hint[44], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[45] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[45]))
{
    $nm_var_hint[45] = sc_convert_encoding($nm_var_hint[45], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[46] = "Eventos de carril desde archivo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[46]))
{
    $nm_var_hint[46] = sc_convert_encoding($nm_var_hint[46], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[47] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[47]))
{
    $nm_var_hint[47] = sc_convert_encoding($nm_var_hint[47], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[48] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[48]))
{
    $nm_var_hint[48] = sc_convert_encoding($nm_var_hint[48], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[49] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[49]))
{
    $nm_var_hint[49] = sc_convert_encoding($nm_var_hint[49], $_SESSION['scriptcase']['charset'], "UTF-8");
}
$saida_apl = $_SESSION['scriptcase']['sc_saida_menuKZ'];
if (isset($_SESSION['scriptcase']['sc_apl_seg']['portada']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['portada']) == "on")
{
    $menuKZ_menuData['data'] .= "item_1|.|" . $nm_var_lab[0] . "|menuKZ_form_php.php?sc_item_menu=item_1&sc_apl_menu=portada&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[0] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

$menuKZ_menuData['data'] .= "item_12|.|" . $nm_var_lab[1] . "||" . $nm_var_hint[1] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno']) == "on")
{
    $menuKZ_menuData['data'] .= "item_2|..|" . $nm_var_lab[2] . "|menuKZ_form_php.php?sc_item_menu=item_2&sc_apl_menu=grid_detalleturno&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[2] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPTC']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPTC']) == "on")
{
    $menuKZ_menuData['data'] .= "item_25|..|" . $nm_var_lab[3] . "|menuKZ_form_php.php?sc_item_menu=item_25&sc_apl_menu=grid_detalleturnoPTC&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[3] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPT']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPT']) == "on")
{
    $menuKZ_menuData['data'] .= "item_13|..|" . $nm_var_lab[4] . "|menuKZ_form_php.php?sc_item_menu=item_13&sc_apl_menu=grid_detalleturnoPT&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[4] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPD']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPD']) == "on")
{
    $menuKZ_menuData['data'] .= "item_3|..|" . $nm_var_lab[5] . "|menuKZ_form_php.php?sc_item_menu=item_3&sc_apl_menu=grid_detalleturnoPD&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[5] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['pagos_peaje']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['pagos_peaje']) == "on")
{
    $menuKZ_menuData['data'] .= "item_60|..|" . $nm_var_lab[6] . "|menuKZ_form_php.php?sc_item_menu=item_60&sc_apl_menu=pagos_peaje&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[6] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['pagos_faltantes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['pagos_faltantes']) == "on")
{
    $menuKZ_menuData['data'] .= "item_61|..|" . $nm_var_lab[7] . "|menuKZ_form_php.php?sc_item_menu=item_61&sc_apl_menu=pagos_faltantes&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[7] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_preliquidacion_fs']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_preliquidacion_fs']) == "on")
{
    $menuKZ_menuData['data'] .= "item_56|..|" . $nm_var_lab[8] . "|menuKZ_form_php.php?sc_item_menu=item_56&sc_apl_menu=grid_preliquidacion_fs&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[8] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['menu_controldiario']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['menu_controldiario']) == "on")
{
    $menuKZ_menuData['data'] .= "item_62|..|" . $nm_var_lab[9] . "|menuKZ_form_php.php?sc_item_menu=item_62&sc_apl_menu=menu_controldiario&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[9] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_restablecePreL']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_restablecePreL']) == "on")
{
    $menuKZ_menuData['data'] .= "item_24|..|" . $nm_var_lab[10] . "|menuKZ_form_php.php?sc_item_menu=item_24&sc_apl_menu=grid_restablecePreL&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[10] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

$menuKZ_menuData['data'] .= "item_21|.|" . $nm_var_lab[11] . "||" . $nm_var_hint[11] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LCR']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LCR']) == "on")
{
    $menuKZ_menuData['data'] .= "item_7|..|" . $nm_var_lab[12] . "|menuKZ_form_php.php?sc_item_menu=item_7&sc_apl_menu=grid_detalleturno_LCR&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[12] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LDT']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LDT']) == "on")
{
    $menuKZ_menuData['data'] .= "item_22|..|" . $nm_var_lab[13] . "|menuKZ_form_php.php?sc_item_menu=item_22&sc_apl_menu=grid_detalleturno_LDT&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[13] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LD']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LD']) == "on")
{
    $menuKZ_menuData['data'] .= "item_23|..|" . $nm_var_lab[14] . "|menuKZ_form_php.php?sc_item_menu=item_23&sc_apl_menu=grid_detalleturno_LD&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[14] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_liquidacion_fs']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_liquidacion_fs']) == "on")
{
    $menuKZ_menuData['data'] .= "item_48|..|" . $nm_var_lab[15] . "|menuKZ_form_php.php?sc_item_menu=item_48&sc_apl_menu=grid_liquidacion_fs&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[15] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reversaliquidacion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reversaliquidacion']) == "on")
{
    $menuKZ_menuData['data'] .= "item_28|..|" . $nm_var_lab[16] . "|menuKZ_form_php.php?sc_item_menu=item_28&sc_apl_menu=grid_reversaliquidacion&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[16] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

$menuKZ_menuData['data'] .= "item_14|.|" . $nm_var_lab[17] . "||" . $nm_var_hint[17] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_ano']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_ano']) == "on")
{
    $menuKZ_menuData['data'] .= "item_47|..|" . $nm_var_lab[18] . "|menuKZ_form_php.php?sc_item_menu=item_47&sc_apl_menu=control_ano&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[18] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_resumen']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_resumen']) == "on")
{
    $menuKZ_menuData['data'] .= "item_4|..|" . $nm_var_lab[19] . "|menuKZ_form_php.php?sc_item_menu=item_4&sc_apl_menu=grid_eventos_resumen&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[19] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_min']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_min']) == "on")
{
    $menuKZ_menuData['data'] .= "item_6|..|" . $nm_var_lab[20] . "|menuKZ_form_php.php?sc_item_menu=item_6&sc_apl_menu=grid_eventos_min&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[20] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_discrepancias']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_discrepancias']) == "on")
{
    $menuKZ_menuData['data'] .= "item_51|..|" . $nm_var_lab[21] . "|menuKZ_form_php.php?sc_item_menu=item_51&sc_apl_menu=grid_discrepancias&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[21] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_aforo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_aforo']) == "on")
{
    $menuKZ_menuData['data'] .= "item_45|..|" . $nm_var_lab[22] . "|menuKZ_form_php.php?sc_item_menu=item_45&sc_apl_menu=grid_aforo&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[22] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_bit']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_bit']) == "on")
{
    $menuKZ_menuData['data'] .= "item_46|..|" . $nm_var_lab[23] . "|menuKZ_form_php.php?sc_item_menu=item_46&sc_apl_menu=grid_detalleturno_bit&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[23] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_trafico']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_trafico']) == "on")
{
    $menuKZ_menuData['data'] .= "item_5|..|" . $nm_var_lab[24] . "|menuKZ_form_php.php?sc_item_menu=item_5&sc_apl_menu=grid_trafico&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[24] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_estadodispositivos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_estadodispositivos']) == "on")
{
    $menuKZ_menuData['data'] .= "item_50|..|" . $nm_var_lab[25] . "|menuKZ_form_php.php?sc_item_menu=item_50&sc_apl_menu=grid_estadodispositivos&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[25] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detallealarma_dia']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detallealarma_dia']) == "on")
{
    $menuKZ_menuData['data'] .= "item_11|..|" . $nm_var_lab[26] . "|menuKZ_form_php.php?sc_item_menu=item_11&sc_apl_menu=grid_detallealarma_dia&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[26] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['menu_pisal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['menu_pisal']) == "on")
{
    $menuKZ_menuData['data'] .= "item_31|..|" . $nm_var_lab[27] . "|menuKZ_form_php.php?sc_item_menu=item_31&sc_apl_menu=menu_pisal&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[27] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['menu_sct']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['menu_sct']) == "on")
{
    $menuKZ_menuData['data'] .= "item_44|..|" . $nm_var_lab[28] . "|menuKZ_form_php.php?sc_item_menu=item_44&sc_apl_menu=menu_sct&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[28] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sc_log']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sc_log']) == "on")
{
    $menuKZ_menuData['data'] .= "item_53|..|" . $nm_var_lab[29] . "|menuKZ_form_php.php?sc_item_menu=item_53&sc_apl_menu=grid_sc_log&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[29] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reseteos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reseteos']) == "on")
{
    $menuKZ_menuData['data'] .= "item_64|..|" . $nm_var_lab[30] . "|menuKZ_form_php.php?sc_item_menu=item_64&sc_apl_menu=grid_reseteos&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[30] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

$menuKZ_menuData['data'] .= "item_17|.|" . $nm_var_lab[31] . "||" . $nm_var_hint[31] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_autopista']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard_autopista']) == "on")
{
    $menuKZ_menuData['data'] .= "item_43|..|" . $nm_var_lab[32] . "|menuKZ_form_php.php?sc_item_menu=item_43&sc_apl_menu=dashboard_autopista&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[32] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usuario']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_usuario']) == "on")
{
    $menuKZ_menuData['data'] .= "item_9|..|" . $nm_var_lab[33] . "|menuKZ_form_php.php?sc_item_menu=item_9&sc_apl_menu=grid_usuario&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[33] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tarifasPeriodo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tarifasPeriodo']) == "on")
{
    $menuKZ_menuData['data'] .= "item_16|..|" . $nm_var_lab[34] . "|menuKZ_form_php.php?sc_item_menu=item_16&sc_apl_menu=grid_tarifasPeriodo&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[34] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_categoria']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_categoria']) == "on")
{
    $menuKZ_menuData['data'] .= "item_18|..|" . $nm_var_lab[35] . "|menuKZ_form_php.php?sc_item_menu=item_18&sc_apl_menu=grid_categoria&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[35] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipopago']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tipopago']) == "on")
{
    $menuKZ_menuData['data'] .= "item_19|..|" . $nm_var_lab[36] . "|menuKZ_form_php.php?sc_item_menu=item_19&sc_apl_menu=form_tipopago&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[36] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_excentos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_excentos']) == "on")
{
    $menuKZ_menuData['data'] .= "item_55|..|" . $nm_var_lab[37] . "|menuKZ_form_php.php?sc_item_menu=item_55&sc_apl_menu=grid_excentos&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[37] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_sec_configura']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_sec_configura']) == "on")
{
    $menuKZ_menuData['data'] .= "item_20|..|" . $nm_var_lab[38] . "|menuKZ_form_php.php?sc_item_menu=item_20&sc_apl_menu=form_sec_configura&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[38] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

$menuKZ_menuData['data'] .= "item_29|.|" . $nm_var_lab[39] . "||" . $nm_var_hint[39] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_exportadatos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_exportadatos']) == "on")
{
    $menuKZ_menuData['data'] .= "item_27|..|" . $nm_var_lab[40] . "|menuKZ_form_php.php?sc_item_menu=item_27&sc_apl_menu=control_exportadatos&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[40] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_importadatos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_importadatos']) == "on")
{
    $menuKZ_menuData['data'] .= "item_15|..|" . $nm_var_lab[41] . "|menuKZ_form_php.php?sc_item_menu=item_15&sc_apl_menu=control_importadatos&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[41] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_cfacturacion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_cfacturacion']) == "on")
{
    $menuKZ_menuData['data'] .= "item_8|..|" . $nm_var_lab[42] . "|menuKZ_form_php.php?sc_item_menu=item_8&sc_apl_menu=control_cfacturacion&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[42] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_detalleemergentes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_detalleemergentes']) == "on")
{
    $menuKZ_menuData['data'] .= "item_30|..|" . $nm_var_lab[43] . "|menuKZ_form_php.php?sc_item_menu=item_30&sc_apl_menu=form_detalleemergentes&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[43] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_caseta']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_caseta']) == "on")
{
    $menuKZ_menuData['data'] .= "item_52|..|" . $nm_var_lab[44] . "|menuKZ_form_php.php?sc_item_menu=item_52&sc_apl_menu=grid_inventario_caseta&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[44] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['CarrilActivo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['CarrilActivo']) == "on")
{
    $menuKZ_menuData['data'] .= "item_54|..|" . $nm_var_lab[45] . "|menuKZ_form_php.php?sc_item_menu=item_54&sc_apl_menu=CarrilActivo&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[45] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_importaArchivo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_importaArchivo']) == "on")
{
    $menuKZ_menuData['data'] .= "item_49|..|" . $nm_var_lab[46] . "|menuKZ_form_php.php?sc_item_menu=item_49&sc_apl_menu=control_importaArchivo&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[46] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

$menuKZ_menuData['data'] .= "item_32|.|" . $this->Nm_lang['lang_menu_security'] . "||" . $this->Nm_lang['lang_menu_security'] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users']) == "on")
{
    $menuKZ_menuData['data'] .= "item_33|..|" . $this->Nm_lang['lang_list_users'] . "|menuKZ_form_php.php?sc_item_menu=item_33&sc_apl_menu=seg_grid_sec_users&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_users'] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_apps']) == "on")
{
    $menuKZ_menuData['data'] .= "item_34|..|" . $this->Nm_lang['lang_list_apps'] . "|menuKZ_form_php.php?sc_item_menu=item_34&sc_apl_menu=seg_grid_sec_apps&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_apps'] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_groups']) == "on")
{
    $menuKZ_menuData['data'] .= "item_35|..|" . $this->Nm_lang['lang_list_groups'] . "|menuKZ_form_php.php?sc_item_menu=item_35&sc_apl_menu=seg_grid_sec_groups&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_groups'] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users_groups']) == "on")
{
    $menuKZ_menuData['data'] .= "item_42|..|" . $this->Nm_lang['lang_list_users_x_groups'] . "|menuKZ_form_php.php?sc_item_menu=item_42&sc_apl_menu=seg_grid_sec_users_groups&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_users_x_groups'] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['seg_search_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_search_sec_groups']) == "on")
{
    $menuKZ_menuData['data'] .= "item_36|..|" . $this->Nm_lang['lang_list_apps_x_groups'] . "|menuKZ_form_php.php?sc_item_menu=item_36&sc_apl_menu=seg_search_sec_groups&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_apps_x_groups'] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['seg_sync_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_sync_apps']) == "on")
{
    $menuKZ_menuData['data'] .= "item_37|..|" . $this->Nm_lang['lang_list_sync_apps'] . "|menuKZ_form_php.php?sc_item_menu=item_37&sc_apl_menu=seg_sync_apps&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_sync_apps'] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['seg_change_pswd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_change_pswd']) == "on")
{
    $menuKZ_menuData['data'] .= "item_38|..|" . $this->Nm_lang['lang_change_pswd'] . "|menuKZ_form_php.php?sc_item_menu=item_38&sc_apl_menu=seg_change_pswd&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_change_pswd'] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

$menuKZ_menuData['data'] .= "item_57|.|" . $nm_var_lab[47] . "||" . $nm_var_hint[47] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['video_realtime']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['video_realtime']) == "on")
{
    $menuKZ_menuData['data'] .= "item_58|..|" . $nm_var_lab[48] . "|menuKZ_form_php.php?sc_item_menu=item_58&sc_apl_menu=video_realtime&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[48] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['video_realtime']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['video_realtime']) == "on")
{
    $menuKZ_menuData['data'] .= "item_59|..|" . $nm_var_lab[49] . "|menuKZ_form_php.php?sc_item_menu=item_59&sc_apl_menu=video_realtime&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[49] . "||" . $this->menuKZ_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['acceso']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['acceso']) == "on")
{
    $menuKZ_menuData['data'] .= "item_39|.|" . $this->Nm_lang['lang_exit'] . "|menuKZ_form_php.php?sc_item_menu=item_39&sc_apl_menu=acceso&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_exit'] . "||" . $this->menuKZ_target('_parent') . "|" . "\n";
}

if(isset($_SESSION['scriptcase']['force_menu_orientacao']) && !empty($_SESSION['scriptcase']['force_menu_orientacao']))
{
    $this->menu_orientacao = $_SESSION['scriptcase']['force_menu_orientacao'];
}
elseif($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $this->menu_orientacao = 'vertical';
    $this->mobile_menu_toolbar = '';
}

$menuKZ_menuData['data'] = array();
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_1&sc_apl_menu=portada&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['portada']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['portada']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[0] . "",
        'level'    => "0",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[0] . "",
        'id'       => "item_1",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_1",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menuKZ_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[1] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[1] . "",
    'id'       => "item_12",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_12",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_2&sc_apl_menu=grid_detalleturno&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[2] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[2] . "",
        'id'       => "item_2",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_2",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_25&sc_apl_menu=grid_detalleturnoPTC&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPTC']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPTC']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[3] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[3] . "",
        'id'       => "item_25",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_25",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_13&sc_apl_menu=grid_detalleturnoPT&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPT']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPT']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[4] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[4] . "",
        'id'       => "item_13",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_13",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_3&sc_apl_menu=grid_detalleturnoPD&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPD']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturnoPD']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[5] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[5] . "",
        'id'       => "item_3",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_3",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_60&sc_apl_menu=pagos_peaje&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['pagos_peaje']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['pagos_peaje']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[6] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[6] . "",
        'id'       => "item_60",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_60",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_61&sc_apl_menu=pagos_faltantes&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['pagos_faltantes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['pagos_faltantes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[7] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[7] . "",
        'id'       => "item_61",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_61",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_56&sc_apl_menu=grid_preliquidacion_fs&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_preliquidacion_fs']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_preliquidacion_fs']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[8] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[8] . "",
        'id'       => "item_56",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_56",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_62&sc_apl_menu=menu_controldiario&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['menu_controldiario']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['menu_controldiario']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[9] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[9] . "",
        'id'       => "item_62",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_62",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_24&sc_apl_menu=grid_restablecePreL&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_restablecePreL']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_restablecePreL']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[10] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[10] . "",
        'id'       => "item_24",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_24",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menuKZ_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[11] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[11] . "",
    'id'       => "item_21",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_21",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_7&sc_apl_menu=grid_detalleturno_LCR&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LCR']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LCR']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[12] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[12] . "",
        'id'       => "item_7",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_7",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_22&sc_apl_menu=grid_detalleturno_LDT&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LDT']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LDT']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[13] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[13] . "",
        'id'       => "item_22",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_22",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_23&sc_apl_menu=grid_detalleturno_LD&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LD']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_LD']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[14] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[14] . "",
        'id'       => "item_23",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_23",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_48&sc_apl_menu=grid_liquidacion_fs&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_liquidacion_fs']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_liquidacion_fs']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[15] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[15] . "",
        'id'       => "item_48",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_48",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_28&sc_apl_menu=grid_reversaliquidacion&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reversaliquidacion']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reversaliquidacion']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[16] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[16] . "",
        'id'       => "item_28",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_28",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menuKZ_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[17] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[17] . "",
    'id'       => "item_14",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_14",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_47&sc_apl_menu=control_ano&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_ano']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_ano']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[18] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[18] . "",
        'id'       => "item_47",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_47",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_4&sc_apl_menu=grid_eventos_resumen&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_resumen']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_resumen']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[19] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[19] . "",
        'id'       => "item_4",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_4",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_6&sc_apl_menu=grid_eventos_min&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_min']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_eventos_min']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[20] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[20] . "",
        'id'       => "item_6",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_6",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_51&sc_apl_menu=grid_discrepancias&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_discrepancias']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_discrepancias']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[21] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[21] . "",
        'id'       => "item_51",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_51",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_45&sc_apl_menu=grid_aforo&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_aforo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_aforo']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[22] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[22] . "",
        'id'       => "item_45",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_45",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_46&sc_apl_menu=grid_detalleturno_bit&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_bit']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detalleturno_bit']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[23] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[23] . "",
        'id'       => "item_46",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_46",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_5&sc_apl_menu=grid_trafico&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_trafico']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_trafico']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[24] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[24] . "",
        'id'       => "item_5",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_5",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_50&sc_apl_menu=grid_estadodispositivos&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_estadodispositivos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_estadodispositivos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[25] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[25] . "",
        'id'       => "item_50",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_50",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_11&sc_apl_menu=grid_detallealarma_dia&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detallealarma_dia']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detallealarma_dia']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[26] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[26] . "",
        'id'       => "item_11",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_11",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_31&sc_apl_menu=menu_pisal&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['menu_pisal']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['menu_pisal']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[27] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[27] . "",
        'id'       => "item_31",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_31",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_44&sc_apl_menu=menu_sct&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['menu_sct']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['menu_sct']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[28] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[28] . "",
        'id'       => "item_44",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_44",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_53&sc_apl_menu=grid_sc_log&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sc_log']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sc_log']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[29] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[29] . "",
        'id'       => "item_53",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_53",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_64&sc_apl_menu=grid_reseteos&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reseteos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reseteos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[30] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[30] . "",
        'id'       => "item_64",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_64",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menuKZ_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[31] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[31] . "",
    'id'       => "item_17",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_17",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_43&sc_apl_menu=dashboard_autopista&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard_autopista']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard_autopista']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['container']['active']))
    {
        $icon_aba = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['container']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['container']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[32] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[32] . "",
        'id'       => "item_43",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_43",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_9&sc_apl_menu=grid_usuario&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usuario']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_usuario']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[33] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[33] . "",
        'id'       => "item_9",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_9",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_16&sc_apl_menu=grid_tarifasPeriodo&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tarifasPeriodo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tarifasPeriodo']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[34] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[34] . "",
        'id'       => "item_16",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_16",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_18&sc_apl_menu=grid_categoria&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_categoria']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_categoria']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[35] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[35] . "",
        'id'       => "item_18",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_18",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_19&sc_apl_menu=form_tipopago&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipopago']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tipopago']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[36] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[36] . "",
        'id'       => "item_19",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_19",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_55&sc_apl_menu=grid_excentos&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_excentos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_excentos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[37] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[37] . "",
        'id'       => "item_55",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_55",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_20&sc_apl_menu=form_sec_configura&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_sec_configura']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_sec_configura']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[38] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[38] . "",
        'id'       => "item_20",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_20",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menuKZ_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[39] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[39] . "",
    'id'       => "item_29",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_29",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_27&sc_apl_menu=control_exportadatos&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_exportadatos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_exportadatos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[40] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[40] . "",
        'id'       => "item_27",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_27",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_15&sc_apl_menu=control_importadatos&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_importadatos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_importadatos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[41] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[41] . "",
        'id'       => "item_15",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_15",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_8&sc_apl_menu=control_cfacturacion&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_cfacturacion']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_cfacturacion']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[42] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[42] . "",
        'id'       => "item_8",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_8",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_30&sc_apl_menu=form_detalleemergentes&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_detalleemergentes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_detalleemergentes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[43] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[43] . "",
        'id'       => "item_30",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_30",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_52&sc_apl_menu=grid_inventario_caseta&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_caseta']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_caseta']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[44] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[44] . "",
        'id'       => "item_52",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_52",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_54&sc_apl_menu=CarrilActivo&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['CarrilActivo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['CarrilActivo']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[45] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[45] . "",
        'id'       => "item_54",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_54",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_49&sc_apl_menu=control_importaArchivo&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_importaArchivo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_importaArchivo']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[46] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[46] . "",
        'id'       => "item_49",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_49",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menuKZ_menuData['data'][] = array(
    'label'    => "" . $this->Nm_lang['lang_menu_security'] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $this->Nm_lang['lang_menu_security'] . "",
    'id'       => "item_32",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_32",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_33&sc_apl_menu=seg_grid_sec_users&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_users'] . "",
        'id'       => "item_33",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_33",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_34&sc_apl_menu=seg_grid_sec_apps&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_apps']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_apps']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_apps'] . "",
        'id'       => "item_34",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_34",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_35&sc_apl_menu=seg_grid_sec_groups&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_groups'] . "",
        'id'       => "item_35",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_35",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_42&sc_apl_menu=seg_grid_sec_users_groups&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_grid_sec_users_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users_x_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_users_x_groups'] . "",
        'id'       => "item_42",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_42",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_36&sc_apl_menu=seg_search_sec_groups&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_search_sec_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_search_sec_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['filter']['active']))
    {
        $icon_aba = $arr_menuicons['filter']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['filter']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['filter']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'id'       => "item_36",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_36",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_37&sc_apl_menu=seg_sync_apps&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_sync_apps']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_sync_apps']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'id'       => "item_37",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_37",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_38&sc_apl_menu=seg_change_pswd&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['seg_change_pswd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['seg_change_pswd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'id'       => "item_38",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_38",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menuKZ_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[47] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[47] . "",
    'id'       => "item_57",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_57",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-video",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_58&sc_apl_menu=video_realtime&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['video_realtime']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['video_realtime']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[48] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[48] . "",
        'id'       => "item_58",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_58",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_59&sc_apl_menu=video_realtime&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['video_realtime']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['video_realtime']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[49] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[49] . "",
        'id'       => "item_59",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_self') . "\"",
        'sc_id'    => "item_59",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menuKZ_form_php.php?sc_item_menu=item_39&sc_apl_menu=acceso&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['acceso']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['acceso']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
    $menuKZ_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_exit'] . "",
        'level'    => "0",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_exit'] . "",
        'id'       => "item_39",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menuKZ_target('_parent') . "\"",
        'sc_id'    => "item_39",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );

if (isset($_SESSION['scriptcase']['sc_def_menu']['menuKZ']))
{
    $arr_menu_usu = $this->nm_arr_menu_recursiv($_SESSION['scriptcase']['sc_def_menu']['menuKZ']);
    $this->nm_gera_menus($str_menu_usu, $arr_menu_usu, 1, 'menuKZ');
    $menuKZ_menuData['data'] = $str_menu_usu;
}
if (is_file("menuKZ_help.txt"))
{
    $Arq_WebHelp = file("menuKZ_help.txt"); 
    if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
    {
        $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
        $Tmp = explode(";", $Arq_WebHelp[0]); 
        foreach ($Tmp as $Cada_help)
        {
            $Tmp1 = explode(":", $Cada_help); 
            if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "menu" && is_file($str_root . $path_help . $Tmp1[1]))
            {
                $str_disabled = "N";
                $str_link = "" . $path_help . $Tmp1[1] . "";
                $str_icon = "";
                $icon_aba = "";
                $icon_aba_inactive = "";
                if(empty($icon_aba) && isset($arr_menuicons['']['active']))
                {
                    $icon_aba = $arr_menuicons['']['active'];
                }
                if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
                {
                    $icon_aba_inactive = $arr_menuicons['']['inactive'];
                }
                $menuKZ_menuData['data'][] = array(
                    'label'    => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'level'    => "0",
                    'link'     => $str_link,
                    'hint'     => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'id'       => "item_Help",
                    'icon'     => $str_icon,
                    'icon_aba' => $icon_aba,
                    'icon_aba_inactive' => $icon_aba_inactive,
                    'target'   => "" . $this->menuKZ_target('_blank') . "",
                    'sc_id'    => "item_Help",
                    'disabled' => $str_disabled,
                    'display'     => "text",
                    'display_position'=> "",
                    'icon_fa'     => "",
                    'icon_color'     => "",
                    'icon_color_hover'     => "",
                    'icon_color_disabled'     => "",
                );
            }
        }
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_del']['menuKZ']) && !empty($_SESSION['scriptcase']['sc_menu_del']['menuKZ']))
{
    $nivel = 0;
    $exclui_menu = false;
    foreach ($menuKZ_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_del']['menuKZ']))
       {
          $nivel = $cada_menu['level'];
          $exclui_menu = true;
          unset($menuKZ_menuData['data'][$i_menu]);
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < $cada_menu['level']))
       {
          unset($menuKZ_menuData['data'][$i_menu]);
       }
       else
       {
          $exclui_menu = false;
       }
    }
    $Temp_menu = array();
    foreach ($menuKZ_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $menuKZ_menuData['data'] = $Temp_menu;
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['menuKZ']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['menuKZ']))
{
    $disable_menu = false;
    foreach ($menuKZ_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_disable']['menuKZ']))
       {
          $nivel = $cada_menu['level'];
          $disable_menu = true;
          $menuKZ_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < $cada_menu['level'])
       { 
          $menuKZ_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
       }
    }
}

$level_to_delete = false;
foreach ($menuKZ_menuData['data'] as $chave => $cada_menu)
{
        if($level_to_delete !== false && $menuKZ_menuData['data'][$chave]['level'] > $level_to_delete)
        {
                unset($menuKZ_menuData['data'][$chave]);
        }
        else
        {
                $level_to_delete = false;
                
                if ($menuKZ_menuData['data'][$chave]['disabled'] == 'Y')
                {
                        $level_to_delete = $menuKZ_menuData['data'][$chave]['level'];
                        unset($menuKZ_menuData['data'][$chave]);
                }
        }
}
$menuKZ_menuData['data'] = array_values($menuKZ_menuData['data']);
$flag = 1;
while ($flag == 1)
{
    $flag = 0;
    foreach ($menuKZ_menuData['data'] as $chave => $cada_menu)
    {
        if (!empty($cada_menu))
        {
            if (isset($menuKZ_menuData['data'][$chave + 1]) && !empty($menuKZ_menuData['data'][$chave + 1]))
            {
                if ($menuKZ_menuData['data'][$chave]['link'] == "#")
                {
                    if ($menuKZ_menuData['data'][$chave]['level'] >= $menuKZ_menuData['data'][$chave + 1]['level'] )
                    {
                        unset($menuKZ_menuData['data'][$chave]);
                        $flag = 1;
                    }
                }
            }
            elseif ($menuKZ_menuData['data'][$chave]['link'] == "#")
            {
                unset($menuKZ_menuData['data'][$chave]);
            }
        }
    }
    $menuKZ_menuData['data'] = array_values($menuKZ_menuData['data']);
}

/* HTML header */
if ($menuKZ_menuData['iframe'])
{
    $menuKZ_menuData['height'] = '100%';
    header("X-XSS-Protection: 1; mode=block");
    header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> style="height: 100%">
<head>
 <title>P-MX</title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <?php
 if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
 {
  ?>
   <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
  <?php
 }
 ?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.png">
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <?php 
 if(isset($str_google_fonts) && !empty($str_google_fonts)) 
 { 
     ?> 
     <link rel="stylesheet" type="text/css" href="<?php echo $str_google_fonts ?>" /> 
     <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_btngrp.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_btngrp.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_btngrp.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_menuH.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_menuH.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $Str_btn_css ?>" /> 
 <link rel="stylesheet" href="<?php echo $_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod']; ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../_lib/css/_menuTheme/usr_Fair_Menu2014_<?php echo ($this->menu_orientacao!='vertical')?'hor':'vert'; ?>_<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir']; ?>.css<?php if (@is_file($this->path_css . '_menuTheme/' . "usr_Fair_Menu2014" . '_' . (($this->menu_orientacao!='vertical')?'hor':'vert') . '.css')) { echo '?scp=' . md5($this->path_css . '_menuTheme/' . "usr_Fair_Menu2014" . '_' . (($this->menu_orientacao=='horizontal')?'hor':'vert') . '.css'); } ?>" />
<style>
   .scTabText {
   }
    <?php
        if(isset($_SESSION['scriptcase']['sc_def_menu']) && !empty($_SESSION['scriptcase']['sc_def_menu']))
        {
            foreach($_SESSION['scriptcase']['sc_def_menu'] as $arr_menus)
            {
              foreach($arr_menus as $id => $arr_item)
              {
                  if(isset($arr_item['icon_color']) && !empty($arr_item['icon_color']))
                  {
                      echo "   #" . $id . " .icon_fa{ color: ". $arr_item['icon_color'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . " i{ color:". $arr_item['icon_color'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_hover']) && !empty($arr_item['icon_color_hover']))
                  {
                      echo "   #" . $id . ":hover .icon_fa{ color: ". $arr_item['icon_color_hover'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ":hover i{ color:". $arr_item['icon_color_hover'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_disabled']) && !empty($arr_item['icon_color_disabled']))
                  {
                      echo "   #" . $id . ".scdisabledmain .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      echo "   #" . $id . ".scdisabledsub .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ".scTabInactive i{ color:". $arr_item['icon_color_disabled'] ."  !important}
";
                      }
                  }
              }
            }
        }
    ?>
</style>
<script type="text/javascript">
<?php

if ($this->menu_orientacao=='horizontal')
{
 ?>
 var is_menu_vertical = false;
 <?php
}
else
{
 ?>
 var is_menu_vertical = true;
 <?php
}
?>
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
</head>
<body style="height: 100%" scroll="no" class='scMenuHPage'>
<?php

if ('' != $sOutputBuffer)
{
    echo $sOutputBuffer;
}

    $NM_scr_iframe = (isset($_POST['hid_scr_iframe'])) ? $_POST['hid_scr_iframe'] : "";   
}
else
{
    $menuKZ_menuData['height'] = '30px';
}

/* JS files */
?>
<script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../_lib/lib/js/menu_structure.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menuKZ']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_sweetalert.css" />
<script type="text/javascript" src="menuKZ_message.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
$(function() {
<?php
if (isset($this->nm_mens_alert) && count($this->nm_mens_alert)) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
?>
       scJs_alert('<?php echo $mensagem ?>', <?php echo $jsonParams ?>);
<?php
       }
   }
}
?>
});
</script>
<?php
$_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Nm_lang['lang_mnth_janu'],
                                  $this->Nm_lang['lang_mnth_febr'],
                                  $this->Nm_lang['lang_mnth_marc'],
                                  $this->Nm_lang['lang_mnth_apri'],
                                  $this->Nm_lang['lang_mnth_mayy'],
                                  $this->Nm_lang['lang_mnth_june'],
                                  $this->Nm_lang['lang_mnth_july'],
                                  $this->Nm_lang['lang_mnth_augu'],
                                  $this->Nm_lang['lang_mnth_sept'],
                                  $this->Nm_lang['lang_mnth_octo'],
                                  $this->Nm_lang['lang_mnth_nove'],
                                  $this->Nm_lang['lang_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Nm_lang['lang_shrt_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Nm_lang['lang_days_sund'],
                                  $this->Nm_lang['lang_days_mond'],
                                  $this->Nm_lang['lang_days_tued'],
                                  $this->Nm_lang['lang_days_wend'],
                                  $this->Nm_lang['lang_days_thud'],
                                  $this->Nm_lang['lang_days_frid'],
                                  $this->Nm_lang['lang_days_satd']);
$_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_days_sund'],
                                  $this->Nm_lang['lang_shrt_days_mond'],
                                  $this->Nm_lang['lang_shrt_days_tued'],
                                  $this->Nm_lang['lang_shrt_days_wend'],
                                  $this->Nm_lang['lang_shrt_days_thud'],
                                  $this->Nm_lang['lang_shrt_days_frid'],
                                  $this->Nm_lang['lang_shrt_days_satd']);
$Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
$Lim   = strlen($Str_date);
$Ult   = "";
$Arr_D = array();
for ($I = 0; $I < $Lim; $I++)
{
    $Char = substr($Str_date, $I, 1);
    if ($Char != $Ult)
    {
        $Arr_D[] = $Char;
    }
    $Ult = $Char;
}
$Prim = true;
$Str  = "";
foreach ($Arr_D as $Cada_d)
{
    $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
    $Str .= $Cada_d;
    $Prim = false;
}
$Str = str_replace("a", "Y", $Str);
$Str = str_replace("y", "Y", $Str);
$nm_data_fixa = date($Str); 
?>
<?php
if($this->menu_orientacao=='vertical')
{
  $qtd_col = 2;
  if(is_array($bg_line_degrade) && count($bg_line_degrade)>0)
  {
      $qtd_col = $qtd_col + count($bg_line_degrade);
  }
  $larg_table = "100%";
  $col_span   = ' colspan="'. $qtd_col .'"';
}
else
{
  $larg_table = "100%";
  $col_span   = "";
}
$strAlign = 'align=\'left\'';
?>
<?php
$str_bmenu = nmButtonOutput($this->arr_buttons, "bmenu", "showMenu();", "showMenu();", "bmenu", "", "" . $this->Nm_lang['lang_btns_menu'] . "", "position:absolute; top:0px; left:0px; z-index:102;", "absmiddle", "", "0px", $this->path_botoes, "", "" . $this->Nm_lang['lang_btns_menu_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $menu_mobile_hide          = $mobile_menu_mobile_hide;
    $menu_mobile_inicial_state = $mobile_menu_mobile_inicial_state;
    $menu_mobile_hide_onclick  = $mobile_menu_mobile_hide_onclick;
    $menutree_mobile_float     = $mobile_menutree_mobile_float;
    $menu_mobile_hide_icon     = $mobile_menu_mobile_hide_icon;
    $menu_mobile_hide_icon_menu_position     = $mobile_menu_mobile_hide_icon_menu_position;
}
if($menu_mobile_hide == 'S')
{
    if($menu_mobile_inicial_state =='escondido')
    {
            $str_menu_display="hide";
            $str_btn_display="show";
    }
    else
    {
        $str_menu_display="show";
        $str_btn_display="hide";
    }
    if($menu_mobile_hide_icon != 'S')
    {
        $str_btn_display="show";
    }
?>
<script>
    $( document ).ready(function() {
        $('#bmenu').<?php echo $str_btn_display; ?>();
        $('#idMenuCell').<?php echo $str_menu_display; ?>();
        $('#id_toolbar').<?php echo $str_menu_display; ?>();
        <?php
                    if($this->menu_orientacao != 'vertical')
                    {
                        if($menu_mobile_hide_icon == 'N')
                        {
                        ?>
                            $("#idDivMenu").css("padding-left", $('#bmenu').outerWidth());
                        <?php
                        }
                    }
                    else
                    {
                        if($menu_mobile_hide_icon == 'N')
                        {
                        ?>
                            $("#idMenuToolbar").css("padding-left", $('#bmenu').outerWidth());
                        <?php
                        }
                    }
                    if($menutree_mobile_float == 'S')
                    {
                    ?>
                    str_html_menu    = $('#idMenuCell').html();
                    str_html_toolbar = '';
                    if($('#idMenuToolbar').length)
                    {
                      str_html_toolbar = $('#idMenuToolbar').html();
                    }
                    $('#idMenuCell').remove();
                    $('#idMenuToolbar').remove();
                    $( 'body' ).prepend( "<div id='idMenuFLoat' style='height:0px;'><div id='idMenuCell' style='position:absolute; z-index: 101'>"+ str_html_menu + "</div><div id='id_toolbar' style='position:absolute; z-index: 100;'>" + str_html_toolbar +"</div></div>" );
                    <?php
                    if($this->menu_orientacao == 'vertical')
                    {
                        ?>
                            $("#idMenuCell").css("padding-top", $('#bmenu').outerHeight());
                            $("#idMenuCell").css("left", '0px');
                            $("#id_toolbar").css("padding-left", $('#bmenu').outerWidth());
                            $("#id_toolbar").css("display", 'flex');
                        <?php
                        if($menu_mobile_hide_icon == 'S')
                        {
                        ?>
                            $("#id_toolbar").css("padding-left", '0px');
                        <?php
                        }
                        ?>
                        if($( '#id_toolbar' ).width() < 1  || $( '#id_toolbar' ).width() > $( window ).width())
                        {
                            $('#id_toolbar').css('display', 'block');
                            $('#id_toolbar').css('padding-left', $('#idMenuCell').outerWidth());
                            <?php
                            if($menu_mobile_hide_icon == 'S')
                            {
                            ?>
                                $("#id_toolbar").css("padding-top", '0px');
                            <?php
                            }
                        ?>
                        }
                        <?php
                    }
                    else
                    {
                        ?>
                            $("#id_toolbar").css("top", $('#idMenuCell').outerHeight());
                            <?php
                            if($menu_mobile_hide_icon == 'S')
                            {
                            ?>
                                $("#id_toolbar").css("padding-left", '0px');
                            <?php
                            }
                    }
                    if($menu_mobile_inicial_state =='escondido')
                    {
                        ?>
                            $("#idMenuCell").hide();
                            $("#id_toolbar").hide();
                        <?php
                    }
                }
           ?>
    });
    function showMenu()
    {
      if (!$('#idMenuCell').is(':visible')) { $('body').append('<div class="menu-outclick-overlay" style="height: 100vh; width: 100vw; position: fixed; z-index: 90; top: 0; left: 0;" ></div>');}
      $('.menu-outclick-overlay').on('click', function () {HideMenu();});
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').hide();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
      <?php
      }
      ?>
    }
    function HideMenu()
    {
      $('.menu-outclick-overlay').remove();
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').show();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
      <?php
      }
      ?>
    }
</script>
<?php
echo $str_bmenu;
}
?>
<script>
$(document).ready(function() {
});

function expandMenu()
{
    $('#idMenuHeader').hide();
    $('#<?php echo ($this->menu_orientacao=='vertical')?'idMenuCell':'idMenuLine'; ?>').hide();
    $('#id_toolbar').hide();
    $('#id_expand').hide();
    $('#id_collapse').show();
}

function collapseMenu()
{
    $('#idMenuHeader').show();
    $('#<?php echo ($this->menu_orientacao=='vertical')?'idMenuCell':'idMenuLine'; ?>').show();
    $('#id_toolbar').show();
    $('#id_expand').show();
    $('#id_collapse').hide();
}
Iframe_atual = "menuKZ_iframe";
function writeFastMenu(arr_link)
{
  return false;
}
function clearFastMenu(arr_link)
{
  return false;
}
        function checkSubMenuPosition(str_id)
        {
            submenu = $('#' + str_id + '.menu__link').next('ul');
            if(submenu.length)
            {
                if(submenu.offset().left + submenu.outerWidth() > $('#main_menu_table').width())
                {
                    submenu.css('margin-left', ( $('#main_menu_table').width() - submenu.offset().left - submenu.outerWidth() - 10 ));
                }
           }
        }function openMenuItem(str_id)
{
  if (str_id != "iframe_menuKZ")
  {
      str_id        = str_id.replace("menuKZ_","");
  }
    if($('#Iframe_control').length && $('#' + str_id).parent().length < 0)
    {
        $('#Iframe_control').append('<iframe id="iframe_btn_1" name="menu_btn_1_iframe" frameborder="0" class="scMenuIframe" style="display: none;" src=""></iframe>');
    }
  if($('#' + str_id).parent().length)
  {
      if(!$('#' + str_id).parent().hasClass('menu__item--active'))
      {
        $('#' + str_id).closest('ul').find('li').removeClass('menu__item--active');
      }
       $('#' + str_id).parent().toggleClass('menu__item--active');
  }
  str_link   = $('#' + str_id).attr('item-href');
  str_target = $('#' + str_id).attr('item-target');
  if (typeof str_link !== typeof undefined && str_link !== false) {
    str_id = str_id.replace('iframe_menuKZ', 'menuKZ');
    //test link type
    if (str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        if (str_link.substring(0, 11) == 'javascript:')
        {
            eval(str_link.substring(11));
        }
        else if (str_link != '#' && str_target != '_parent')
        {
            window.open(str_link, str_target);
        }
        else if (str_link != '#' && str_target == '_parent')
        {
            document.location = str_link;
        }
        <?php
        if ($menu_mobile_hide == 'S' && $menu_mobile_hide_onclick == 'S')
        {
        ?>
            HideMenu();
        <?php
        }
        ?>
    }
    if(str_target != '_blank' && $('#iframe_menuKZ').length)
        $('#iframe_menuKZ')[0].contentWindow.focus();
  }
}
</script>
<?php
$fixMainMenuPosition = ($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])) ? '' : '; position: absolute';
?>
<table id="main_menu_table" <?php echo $strAlign; ?> style="border-collapse: collapse; border-width: 0px; height:100%; width: <?php echo $larg_table; ?><?php echo $fixMainMenuPosition; ?>" cellpadding=0 cellspacing=0>
<?php echo ($this->menu_orientacao=='vertical')?$this->nm_show_toolbarmenu($col_span, $saida_apl, $menuKZ_menuData, $path_imag_cab):''; ?>  <tr class="scMenuHTableCssAlt" id='idMenuLine'>
  <?php
  if($this->menu_orientacao != 'vertical')
  {
    ?>
      <td <?php echo $strAlign; ?> valign="top" style="width:100%; height:30;padding: 0px;" id='idMenuCell'>
    <?php
  }
  else
  {
    ?>
      <td <?php echo $strAlign; ?> valign="top" style="vertical-align:top;" id='idMenuCell'>
    <?php
  }
  ?>
<div id="scScrollFix" style="height: 1px"></div>
<script type="text/javascript">
function fnScrollFix() {
 if($('#css3menu1 li').length > 0)
 {
     var txt = document.getElementById("scScrollFix").innerHTML;
     if ("&nbsp;" == txt) { txt = "&nbsp;&nbsp;"; } else { txt = "&nbsp;"; }
     document.getElementById("scScrollFix").innerHTML = txt;
 }
 setTimeout("fnScrollFix()", 1000);
}
setTimeout("fnScrollFix()", 1000);
</script>
<div id="idDivMenu">
<?php
  if($this->menu_orientacao != 'horizontal')    
  {    
    ?>    
<table style='width:100%' cellspacing='0' cellpadding='0'><tr>
    <?php    
  }    
  else    
  {    
    ?>    
<table style='<?php echo ($menutree_mobile_float == 'S' && ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))?'':'width:100%'; ?>' cellspacing='0' cellpadding='0'><tr>
    <?php    
  }    
echo $this->menuKZ_escreveMenu($menuKZ_menuData['data'], $path_imag_cab, $strAlign);
?></tr></table>
</div>
<?php
/* Iframe control */
if ($menuKZ_menuData['iframe'])
{
?>
    </td>
<?php
if($this->menu_orientacao != 'vertical')
{
?>
  </tr>
<?php echo $this->nm_show_toolbarmenu('', $saida_apl, $menuKZ_menuData, $path_imag_cab); ?><?php echo $this->nm_gera_degrade(1, $bg_line_degrade, $path_imag_cab); ?>  <tr>
<?php
}
else
{
    echo $this->nm_gera_degrade(2, $bg_line_degrade, $path_imag_cab);
}
?>
<?php
if($this->menu_orientacao != 'vertical')
{
?>
    <td id="Iframe_control_td" style="border-width: 1px; height: 100%; padding: 0px;vertical-align:top;text-align:center;">
<?php
}
else
{
?>
    <td id='id_iframe_td' style="border-width: 1px; width: 100%; height: 100%; padding: 0px">
      <table cellspacing=0 cellpadding=0 width='100%' height='100%'>
        <tr>
        <td width='100%' height='100%' style='vertical-align:top;text-align:center;'>
<?php
}
?>
    <div id="Iframe_control" style='width:100%; height:100%; margin:0px; padding:0px;'>
<?php
$link_default = "";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['portada']) && $_SESSION['scriptcase']['sc_apl_seg']['portada'] == "on") 
{ 
    $SCR  = "";
    $link_default = " onclick=\"openMenuItem('iframe_menuKZ');\" item-href=\"menuKZ_form_php.php?sc_item_menu=menuKZ&sc_apl_menu=portada&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . "\"  item-target=\"menuKZ_iframe\"";
} 
else
{ 
    $SCR  = ($NM_scr_iframe != "" ? $NM_scr_iframe : "menuKZ_pag_ini.php");
} 
?>
      <iframe id="iframe_menuKZ" name="menuKZ_iframe" frameborder="0" class="scMenuIframe" style="width: 100%; height: 100%;"  src="<?php echo $SCR; ?>" <?php echo $link_default ?>></iframe>
<?php
}
?></div></td>
  </tr>
<?php
  if($this->menu_orientacao=='vertical')
  {
  ?>
</table>
</td>
</tr>
  <?php
  }
?>
</table>
</body>
</html>
<?php

if (isset($link_default) && !empty($link_default))
{
    echo "<script>";
    echo "   document.getElementById('iframe_menuKZ').click()";
    echo "</script>";
}

}

/* Target control */
function menuKZ_escreveMenu($arr_menu, $path_imag_cab = '', $strAlign = '')
{
    global $nm_data_fixa;
    $last      = '';
    $itemClass = ' topfirst';
    $subSize   = 2;
    $subCount  = array();
    $tabSpace  = 1;
    $intMult   = 2;
    $aMenuItemList = array();
    foreach ($arr_menu as $ind => $resto)
    {
        $aMenuItemList[] = $resto;
    }
?>
        <td class='sc-layer-0' style='width:14%;text-align:left;display:none;'>
                        <span class='sc-layer-0-0' style='font-size: 16px;background-color: ;font-family: ;color: #000000;'>   <img src="<?php echo $path_imag_cab ?>/grp__NM__img__NM__kz_system.png" border="0"/></span><br/>

        </td><td <?php echo $strAlign; ?>>
  <div class='mainmenu menu--horizontal'>
      <div class='menu__toggle'>
          <span></span>
          <span></span>
          <span></span>
      </div>
      <div class='menu__container '>
        <ul id="css3menu1" class="topmenu menu__list" style="<?php echo ($this->menu_orientacao=='vertical')?'width:100%;':''; ?>" >
        <?php
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if (0 == $aMenuItemList[$i]['level']) {
                    $last = $aMenuItemList[$i]['id'];
                }
            }
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if ($last == $aMenuItemList[$i]['id']) {
                    $itemClass = ' toplast';
                }
                $htmlClass = '';
                $hasChildrens = false;
                if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level']) {
                    $hasChildrens = true;
                }
                if (0 == $aMenuItemList[$i]['level']) {
                    $htmlClass = 'topmenu' . $itemClass;
                    if ($hasChildrens) {
                        $htmlClass .= ' toproot';
                    }
                }
                else
                {
                    $htmlClass .= ' menu__item--withsubmenu';
                }
                ?>
                <li class='menu__item <?php echo $htmlClass; ?>'>
                <?php
                if ('' != $aMenuItemList[$i]['icon'] && file_exists($this->path_imag_apl . "/" . $aMenuItemList[$i]['icon'])) {
                    $iconHtml = '../_lib/img/' . $aMenuItemList[$i]['icon'];
                }
                else {
                    $iconHtml = '';
                }
                $sDisabledClass = '';
                if ('Y' == $aMenuItemList[$i]['disabled']) {
                    $aMenuItemList[$i]['link']   = '#';
                    $aMenuItemList[$i]['target'] = '';
                    $sDisabledClass               = 0 == $aMenuItemList[$i]['level'] ? ' scdisabledmain' : ' scdisabledsub';
                }
                if (empty($aMenuItemList[$i]['link'])) {
                    $aMenuItemList[$i]['link']   = '#';
                }
                $str_item = "<i class='menu__icon fas'></i>";
                if ($hasChildrens) {
                    $str_item .= "<span>";
                }
                if($aMenuItemList[$i]['display'] == 'only_img' && $iconHtml != '')
                {
                    $str_item .= '<img src=' . $iconHtml . ' border="0" />';
                }
                elseif($aMenuItemList[$i]['display'] == 'text_img' || empty($aMenuItemList[$i]['display']))
                {
                    $str_image = '';
                    $str_image_right = '';
                    if($iconHtml != '')
                    {
                        $str_image = '<img src="' . $iconHtml . '" border="0" />';
                        $str_image_right = '<img src="' . $iconHtml . '" border="0" style="margin-left: 10px; margin-right: 0px;" />';
                    }
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= $str_image . $aMenuItemList[$i]['label'];
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] . $str_image_right;
                    }
                }
                elseif($aMenuItemList[$i]['display'] == 'only_fontawesomeicon')
                {
                    $str_item .= "<i class='icon_fa menu__icon ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                }
                elseif($aMenuItemList[$i]['display'] == 'text_fontawesomeicon')
                {
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= "<i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i> ". $aMenuItemList[$i]['label'] ."";
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] ." <i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                    }
                }
                else
                {
                    $str_item .= $aMenuItemList[$i]['label'];
                }
                if ($hasChildrens) {
                    $str_item .= "</span>";
                }
                ?>
                    <a href="javascript:" <?php if ($hasChildrens){ ?>onmouseover="checkSubMenuPosition('<?php echo $aMenuItemList[$i]['id']; ?>');" <?php } ?> onclick="openMenuItem('menuKZ_<?php echo $aMenuItemList[$i]['id']; ?>');" item-href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>" <?php echo $aMenuItemList[$i]['target']; ?> class='menu__link <?php echo $sDisabledClass; ?>'><?php echo $str_item; ?></a>
                <?php
                if ($hasChildrens) {
                ?>
                    <ul class='menu__submenu' style=''>
                    <?php
                }
                else {
                ?>
                <?php
                }
                if (($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == $aMenuItemList[$i + 1]['level']) || 
                    ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == 0)) {
                    ?>
                    <?php echo str_repeat(' ', $tabSpace * $intMult); ?></li>
                    <?php
                    if (0 != $subSize && 0 < $aMenuItemList[$i]['level']) {
                        if (!isset($subCount[ $aMenuItemList[$i]['level'] ])) {
                            $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                        }
                        $subCount[ $aMenuItemList[$i]['level'] ]++;
                    }
                    if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level'] - $aMenuItemList[$i + 1]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    if ($subSize == $subCount[ $aMenuItemList[$i]['level'] ]) {
                        $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                    }
                }
                $itemClass = '';
            }
        ?>
        </ul>
      </div>
  </div>
</td>
        <td class='sc-layer-1' style='width:-23.86%;text-align:left;'>
                        <span class='sc-layer-1-0' style='font-size: 16px;background-color: ;font-family: ;color: #000000;'><link rel="stylesheet" href="../_lib/libraries/scriptcase/samples/menu/css/menu01.css">
                        <div class="right">
            <div class="menu">
                <li>
                    <a class="menu-toggler" style="pointer-events: none; color: inherit; text-decoration: none;" href="#">
                           <!-- <img src="<?php echo $path_imag_cab ?>/grp__NM__ico__NM__user.png" border="0"/> -->
                        <span {NM_CSS_CAB}><?php echo "" . $_SESSION['fld_usuarios'] . "" ?></span>
                        <i  style="width: 5px; height: 5px;"></i>
                        <!-- <i><img src="../_lib/libraries/scriptcase/samples/menu/img/group_expand.png"></i> -->
                    </a>

                    <!-- <ul>
                        <li class="info">
                            <div class="left">
                                   <img src="<?php echo $path_imag_cab ?>/grp__NM__ico__NM__user.png" border="0"/>
                            </div>
                            
                            <div class="right">
                                <h4>
                                    <?php echo "" . $_SESSION['nom_modulo'] . "" ?>
                                    <small></small>
                                </h4>
                                
                                <a id="sc_id_lnk_label01" href="" target="_blank"></a> | <a id="sc_id_lnk_label02" href="" target="_blank"></a>
                            </div>
                        </li>

                        <li id="sc_id_item_label01" class="menu-item"><a href="" ><?php echo "" . $_SESSION['fld_usuarios'] . "" ?></a></li>
                        <li id="sc_id_item_label02" class="menu-item"><a href="" target="_parent"></a></li>
                    </ul> -->
                </li>
        </div>
    </div>
<script language="javascript" src="../_lib/libraries/scriptcase/samples/menu/js/menu01.js"></script></span><br/>

        </td><?php
}
function menuKZ_target($str_target)
{
    global $menuKZ_menuData;
    if ('_blank' == $str_target)
    {
        return '_blank';
    }
    elseif ('_parent' == $str_target)
    {
        return '_parent';
    }
    elseif ($menuKZ_menuData['iframe'])
    {
        return 'menuKZ_iframe';
    }
    else
    {
        return $str_target;
    }
}

function nm_show_toolbarmenu($col_span, $saida_apl, $menuKZ_menuData, $path_imag_cab)
{
    if(!empty($this->mobile_menu_toolbar) && ($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])))
    {
        return;
    }
}

   function nm_prot_aspas($str_item)
   {
       return str_replace('"', '\"', $str_item);
   }

   function nm_gera_menus(&$str_line_ret, $arr_menu_usu, $int_level, $nome_aplicacao)
   {
       global $menuKZ_menuData; 
       foreach ($arr_menu_usu as $arr_item)
       {
           $str_line   = array();
           $str_line['label']    = $this->nm_prot_aspas($arr_item['label']);
           $str_line['level']    = $int_level - 1;
           $str_line['link']     = "";
           $nome_apl = $arr_item['link'];
           $pos = strrpos($nome_apl, "/");
           if ($pos !== false)
           {
               $nome_apl = substr($nome_apl, $pos + 1);
           }
           if ('' != $arr_item['link'])
           {
               if ($arr_item['target'] == '_parent')
               {
                    $str_line['link'] = "menuKZ_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . ""; 
               }
               else
               {
                    $str_line['link'] = "menuKZ_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menuKZ_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menuKZ']['glo_nm_usa_grupo'] . ""; 
               }
           }
           elseif ($arr_item['target'] == '_parent')
           {
           }
           $str_line['hint']     = ('' != $arr_item['hint']) ? $this->nm_prot_aspas($arr_item['hint']) : '';
           $str_line['id']       = $arr_item['id'];
           $str_line['icon']     = ('' != $arr_item['icon_on']) ? $arr_item['icon_on'] : '';
           $str_line['icon_aba'] = (isset($arr_item['icon_aba']) && '' != $arr_item['icon_aba']) ? $arr_item['icon_aba'] : '';
           $str_line['icon_aba_inactive'] = (isset($arr_item['icon_aba_inactive']) && '' != $arr_item['icon_aba_inactive']) ? $arr_item['icon_aba_inactive'] : '';
           $str_line['display'] = (isset($arr_item['display'])) ? $arr_item['display'] : 'text_img';
           $str_line['display_position'] = (isset($arr_item['display_position'])) ? $arr_item['display_position'] : 'text_right';
           $str_line['icon_fa'] = (isset($arr_item['icon_fa'])) ? $arr_item['icon_fa'] : '';
           $str_line['icon_color'] = (isset($arr_item['icon_color'])) ? $arr_item['icon_color'] : '';
           $str_line['icon_color_hover'] = (isset($arr_item['icon_color_hover'])) ? $arr_item['icon_color_hover'] : '';
           $str_line['icon_color_disabled'] = (isset($arr_item['icon_color_disabled'])) ? $arr_item['icon_color_disabled'] : '';
           if ('' == $arr_item['link'] && $arr_item['target'] == '_parent')
           {
               $str_line['target'] = '_parent';
           }
           else
           {
                $str_line['target'] = ('' != $arr_item['target'] && '' != $arr_item['link']) ?  $this->menuKZ_target( $arr_item['target']) : "_self"; 
           }
           $str_line['target']   = ' item-target="' . $str_line['target']  . '" ';
           $str_line['sc_id']    = $arr_item['id'];
           $str_line['disabled'] = "N";
           $str_line_ret[] = $str_line;
           if (!empty($arr_item['menu_itens']))
           {
               $this->nm_gera_menus($str_line_ret, $arr_item['menu_itens'], $int_level + 1, $nome_aplicacao);
           }
       }
   }

   function nm_arr_menu_recursiv($arr, $id_pai = '')
   {
         $arr_return = array();
         foreach ($arr as $id_menu => $arr_menu)
         {
             if ($id_pai == $arr_menu['pai']) 
             {
                 $arr_return[] = array('label'      => $arr_menu['label'],
                                        'link'       => $arr_menu['link'],
                                        'target'     => $arr_menu['target'],
                                        'icon_on'    => $arr_menu['icon'],
                                        'icon_aba'   => $arr_menu['icon_aba'],
                                        'icon_aba_inactive'   => $arr_menu['icon_aba_inactive'],
                                        'hint'       => $arr_menu['hint'],
                                        'id'         => $id_menu,
                                        'menu_itens' => $this->nm_arr_menu_recursiv($arr, $id_menu),
                                        'display'      => $arr_menu['display'],
                                        'display_position' => $arr_menu['display_position'],
                                        'icon_fa'      => $arr_menu['icon_fa'],
                                        'icon_color'      => $arr_menu['icon_color'],
                                        'icon_color_hover'      => $arr_menu['icon_color_hover'],
                                        'icon_color_disabled'      => $arr_menu['icon_color_disabled'],
                                        );
             }
         }
         return $arr_return;
   }
   //1 horizontal
   //2 vertical
   function nm_gera_degrade($menu_opc, $bg_line_degrade, $path_imag_cab)
   {
       $str_retorno = "";
       //have bg color degrade
       if(!empty($bg_line_degrade) && count($bg_line_degrade)>0)
       {
           if($menu_opc == 1)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<tr style=\"height:1px; padding: 0px;\">\r\n";
                       $str_retorno .= "  <td style=\"height:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\"><img src='". $path_imag_cab ."/transparent.png' border=\"0\" style=\"height:1px;\"></td>\r\n";
                       $str_retorno .= "</tr>\r\n";
                   }
               }
           }
           elseif($menu_opc == 2)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<td style=\"width:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\">\r\n";
                       $str_retorno .= "<img src='" . $path_imag_cab . "/transparent.png' border=\"0\" style=\"width:1px;\">\r\n";
                       $str_retorno .= "</td>\r\n";
                   }
               }
           }
       }
       return $str_retorno;
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['menuKZ']['sc_init'][$apl_menu] = 1;
        return  1;
   }
function userLogin()
{
$_SESSION['scriptcase']['menuKZ']['contr_erro'] = 'on';
  
echo 'Usuario'; 

$_SESSION['scriptcase']['menuKZ']['contr_erro'] = 'off';
}
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }

}
if (isset($_POST['nmgp_start'])) {$nmgp_start = $_POST['nmgp_start'];} 
if (isset($_GET['nmgp_start']))  {$nmgp_start = $_GET['nmgp_start'];} 
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual)) {
    $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys  = str_replace("\\", '/', $str_path_sys);
}
else {
    $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$str_path_web    = $_SERVER['PHP_SELF'];
$str_path_web    = str_replace("\\", '/', $str_path_web);
$str_path_web    = str_replace('//', '/', $str_path_web);
$path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
$root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
    if (isset($_COOKIE['sc_apl_default_BackOffice_Acapulco'])) {
        $apl_def = explode(",", $_COOKIE['sc_apl_default_BackOffice_Acapulco']);
    }
    elseif (is_file($root . $_SESSION['scriptcase']['menuKZ']['glo_nm_path_imag_temp'] . "/sc_apl_default_BackOffice_Acapulco.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['menuKZ']['glo_nm_path_imag_temp'] . "/sc_apl_default_BackOffice_Acapulco.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "menuKZ") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['menuKZ']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['menuKZ']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['menuKZ']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_BackOffice_Acapulco'])) {
            $_SESSION['scriptcase']['menuKZ']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_BackOffice_Acapulco'];
        }
    }
}
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang")
    {
        $nmgp_opcao  = $_POST['nmgp_opcao'];
        $nmgp_idioma = $_POST['nmgp_idioma'];
    }
    else
    {
        $nmgp_opcao  = $_GET['nmgp_opcao'];
        $nmgp_idioma = $_GET['nmgp_idioma'];
    }
    $Temp_lang = explode(";" , $nmgp_idioma);
    if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))
    {
        $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
    }
    if (isset($Temp_lang[1]) && !empty($Temp_lang[1]))
    {
        $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
    }
}
$contr_menuKZ = new menuKZ_class;
$contr_menuKZ->menuKZ_menu();

?>
