<?php
   include_once('PreLiqPDF_new_session.php');
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_samesite', 'Lax');
   @ini_set('session.cookie_secure', (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 1 : 0);
   @session_start() ;
   $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_cache']      = "";
   $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_doc']        = "";
    //check publication with the prod
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
    $str_path_apl_url = $_SERVER['PHP_SELF'];
    $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
    $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class PreLiqPDF_new_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $Arr_result;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_google_fonts;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_arr_db_extra_args = array();
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_ger_css_emb;
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_access;
   var $nm_bases_db2;
   var $nm_bases_ibase;
   var $nm_bases_informix;
   var $nm_bases_mssql;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_oracle;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $nm_bases_progress;
   var $sc_page;
   var $sc_lig_md5 = array();
   var $sc_lig_target = array();
   var $sc_export_ajax = false;
   var $sc_export_ajax_img = false;
   var $force_db_utf8 = true;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      if (!function_exists("sc_check_mobile"))
      {
          include_once("../_lib/lib/php/nm_check_mobile.php");
      }
          include_once("../_lib/lib/php/fix.php");
      $_SESSION['scriptcase']['proc_mobile'] = sc_check_mobile();
        if (isset($_GET['_sc_force_mobile'])) {
            $_SESSION['scriptcase']['force_mobile'] = 'Y' == $_GET['_sc_force_mobile'];
        }
        if (isset($_SESSION['scriptcase']['force_mobile'])) {
            $_SESSION['scriptcase']['proc_mobile'] = $_SESSION['scriptcase']['force_mobile'];
        }
      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
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
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "PreLiqPDF_new"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "BackOffice_Acapulco"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20180808"; 
      $this->nm_hr_criacao   = "132359"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20230316"; 
      $this->nm_hr_ult_alt   = "211035"; 
      $this->Apl_paginacao   = "PARCIAL"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
// 
// 
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
      $this->sc_site_ssl     = $this->appIsSsl();
      $this->sc_protocolo    = $this->sc_site_ssl ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_doc'];
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
      if (!isset($_SESSION['scriptcase']['PreLiqPDF_new']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['PreLiqPDF_new']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['PreLiqPDF_new']['save_session']['data'] = '';
      } 
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "rhino_tkz/rhino_tkz";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->server_pdf      = $this->java_protocol . $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/PreLiqPDF_new';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $pos_path = strrpos($this->path_prod, "/");
      $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_chart_theme = $this->root . $this->path_link . "_lib/chart/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      $this->Cmp_Sql_Time     = array();
      if (isset($_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['PreLiqPDF_new']['actual_lang']) || $_SESSION['scriptcase']['PreLiqPDF_new']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['PreLiqPDF_new']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_BackOffice_Acapulco',$this->str_lang,'0','/');
      }
      if (!isset($_SESSION['scriptcase']['fusioncharts_new']))
      {
          $_SESSION['scriptcase']['fusioncharts_new'] = @is_dir($this->path_third . '/oem_fs');
      }
      if (!isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs');
      }
      if (isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $aTmpOS = $this->getRunningOS();
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs/' . $aTmpOS['os']);
      }
      if (!class_exists('Services_JSON'))
      {
          include_once("PreLiqPDF_new_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_Link_View'] = true;
          }
      }
            if (isset($_POST['nmgp_opcao']) && 'ajax_check_file' == $_POST['nmgp_opcao'] ){
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_REQUEST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

    $out1_img_cache = $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imag_temp'] . $file_name;
    $orig_img = $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imag_temp']. '/'.basename($_POST['AjaxCheckImg']);
    copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
    echo $orig_img . '_@@NM@@_';
    if(file_exists($out1_img_cache)){
        echo $out1_img_cache;
        exit;
    }

         include_once("../_lib/lib/php/nm_trata_img.php");
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['ancor_save'] = $_POST['ancor_save'];
          $oJson = new Services_JSON();
          if ($_SESSION['scriptcase']['sem_session']) {
              unset($_SESSION['sc_session']);
          }
          exit;
      }
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
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_event" || $_POST['nmgp_opcao'] == "ajax_navigate"))
                  {
                      $this->Arr_result = array();
                      $this->Arr_result['redirInfo']['action']              = $nm_apl_dest;
                      $this->Arr_result['redirInfo']['target']              = $parms['T'];
                      $this->Arr_result['redirInfo']['metodo']              = "post";
                      $this->Arr_result['redirInfo']['script_case_init']    = $this->sc_page;
                      $oJson = new Services_JSON();
                      echo $oJson->encode($this->Arr_result);
                      exit;
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
      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin, $remove_border;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["PreLiqPDF_new"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["PreLiqPDF_new"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
        global $link_compact_mode, $link_remove_margin, $link_remove_border;
        if (isset($link_compact_mode) && 'ok' == $link_compact_mode) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['link_info']['compact_mode'] = true;
        }
        if (isset($link_remove_margin) && 'ok' == $link_remove_margin) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['link_info']['remove_margin'] = true;
        }
        if (isset($link_remove_border) && 'ok' == $link_remove_border) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['link_info']['remove_border'] = true;
        }

      if (!isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['responsive_chart']))
      {
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['responsive_chart'] = array(
              'enabled' => false,
              'active'  => false,
          );
      }
      if ($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['responsive_chart']['enabled'])
      {
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['responsive_chart']['active'] = true;
      }
      elseif ($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['dashboard_info']['maximized'])
      {
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['responsive_chart']['active'] = true;
      }
      else
      {
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['responsive_chart']['active'] = false;
      }
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
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
      $_SESSION['sc_session']['SC_download_violation'] = $this->Nm_lang['lang_errm_fnfd'];
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['redir']))
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
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family:Verdana, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer;  }";
          echo ".scButton_default:hover { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_default:hover img, .scButton_default:hover img, .scButton_default:hover img{filter: brightness(2);}.scButton_default:hover{; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer;  }";
          echo ".scButton_default:active { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1.5px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_default:active img{filter: brightness(2)}.scButton_default:active{; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer;  }";
          echo ".scButton_default_disabled { font-family:Verdana, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:16px; background-color:#FFFFFF; filter: alpha(opacity=40); opacity:0.4; line-height:31px; height:34px; padding:0 12px; cursor:default;  }";
          echo ".scButton_default_selected { font-family:Verdana, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer;  }";
          echo ".scButton_default_list { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_default_list:hover { font-family:Arial, sans-serif; color:#3C4858; font-size:13px; text-decoration:none; background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_default_list:active { font-family:Arial, sans-serif; color:#3C4858; font-size:13px; text-decoration:none; background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_default_list_disabled { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=45); opacity:0.45; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_default_list_selected { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_group { font-family:Tahoma, Arial, sans-serif;box-sizing: border-box;; color:#3C4858; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer;  }";
          echo ".scButton_group:hover { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_group:hover img, .scButton_group:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_group:hover{; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer;  }";
          echo ".scButton_group:active { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1.5px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_group:active img{filter: brightness(2)}.scButton_group:active{; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer;  }";
          echo ".scButton_group_disabled { font-family:Tahoma, Arial, sans-serif;box-sizing: border-box;; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=40); opacity:0.4; padding:7.8px 15px;margin:0px -5px; cursor:default;  }";
          echo ".scButton_group_selected { font-family:Tahoma, Arial, sans-serif;box-sizing: border-box;; color:#3C4858; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer;  }";
          echo ".scButton_small { font-family:Tahoma, Arial, sans-serif;box-sizing: border-box;; color:#3C4858; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small:hover { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_small:hover img, .scButton_small:hover img, .scButton_small:hover img{filter: brightness(2);}.scButton_small:hover{; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small:active { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1.5px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_small:active img{filter: brightness(2)}.scButton_small:active{; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small_disabled { font-family:Verdana, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:16px; background-color:#FFFFFF; filter: alpha(opacity=40); opacity:0.4; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:Tahoma, Arial, sans-serif;box-sizing: border-box;; color:#3C4858; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small_list { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_small_list:hover { font-family:Arial, sans-serif; color:#3C4858; font-size:13px; text-decoration:none; background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_small_list:active { font-family:Arial, sans-serif; color:#3C4858; font-size:13px; text-decoration:none; background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_small_list_disabled { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=45); opacity:0.45; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_small_list_selected { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_image { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_image:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_image:active { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_image_disabled { filter: alpha(opacity=40); opacity:0.4;  }";
          echo ".scButton_image_selected { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->nm_ger_css_emb = true;
      $this->path_atual     = getcwd();
      $opsys = strtolower(php_uname());

// 
      include_once($this->path_aplicacao . "PreLiqPDF_new_erro.class.php"); 
      $this->Erro = new PreLiqPDF_new_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('PreLiqPDF_new'); 
// 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("es");
      if (is_file("../_lib/css/" . $this->str_schema_all . "_grid.php")) {
          include("../_lib/css/" . $this->str_schema_all . "_grid.php");
      } else {
          $str_tree_col = "";
          $str_tree_exp = "";
          $str_button   = "";
      }
      $this->Color_bg_ajax = (!isset($str_ajax_bg)       || "" == trim($str_ajax_bg))       ? "#000" : $str_ajax_bg;
      $this->Border_c_ajax = (!isset($str_ajax_border_c) || "" == trim($str_ajax_border_c)) ? ""     : $str_ajax_border_c;
      $this->Border_s_ajax = (!isset($str_ajax_border_s) || "" == trim($str_ajax_border_s)) ? ""     : $str_ajax_border_s;
      $this->Border_w_ajax = (!isset($str_ajax_border_w) || "" == trim($str_ajax_border_w)) ? ""     : $str_ajax_border_w;
      $this->Tree_img_col    = trim($str_tree_col);
      $this->Tree_img_exp    = trim($str_tree_exp);
      $this->scGridRefinedSearchExpandFAIcon    = trim($scGridRefinedSearchExpandFAIcon);
      $this->scGridRefinedSearchCollapseFAIcon    = trim($scGridRefinedSearchCollapseFAIcon);
      $_SESSION['scriptcase']['nmamd'] = array();
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->str_google_fonts= isset($str_google_fonts)?$str_google_fonts:'';
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      if (is_file($this->path_btn . $this->Str_btn_grid)) {
          include($this->path_btn . $this->Str_btn_grid);
      }
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      if (isset($_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['redir'])) {
          $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">';
          $SS_cod_html .= "<HTML>\r\n";
          $SS_cod_html .= " <HEAD>\r\n";
          $SS_cod_html .= "  <TITLE></TITLE>\r\n";
          $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
          if ($_SESSION['scriptcase']['proc_mobile']) {
              $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
          }
          $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
          $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
          if ($_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scGridPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scGridBorder\">\r\n";
              $SS_cod_html .= "    <table class=\"scGridTabela\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scGridFieldOdd\"><td class=\"scGridFieldOddFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && ((isset($_POST['nmgp_opcao']) && substr($_POST['nmgp_opcao'], 0, 5) == "ajax_") || (isset($_GET['nmgp_opcao']) && substr($_GET['nmgp_opcao'], 0, 5) == "ajax_")))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      $this->nm_bases_access     = array("access", "ado_access", "ace_access");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
      $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib", "azure_mssql", "azure_ado_mssql", "azure_adooledb_mssql", "azure_odbc_mssql", "azure_mssqlnative", "azure_pdo_sqlsrv", "azure_pdo_dblib", "googlecloud_mssql", "googlecloud_ado_mssql", "googlecloud_adooledb_mssql", "googlecloud_odbc_mssql", "googlecloud_mssqlnative", "googlecloud_pdo_sqlsrv", "googlecloud_pdo_dblib", "amazonrds_mssql", "amazonrds_ado_mssql", "amazonrds_adooledb_mssql", "amazonrds_odbc_mssql", "amazonrds_mssqlnative", "amazonrds_pdo_sqlsrv", "amazonrds_pdo_dblib");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle", "oraclecloud_oci8", "oraclecloud_oci805", "oraclecloud_oci8po", "oraclecloud_odbc_oracle", "oraclecloud_oracle", "oraclecloud_pdo_oracle", "amazonrds_oci8", "amazonrds_oci805", "amazonrds_oci8po", "amazonrds_odbc_oracle", "amazonrds_oracle", "amazonrds_pdo_oracle");
      $this->sqlite_version      = "old";
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_progress     = array("pdo_progress_odbc", "progress");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQFYZSFGHAvOV5XGHuzGVcBOH5XKVEFGD9XOZ1FGD1rwV5JeDErKVkJGH5FYHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWJeHMBiD9BsVIraD1rwV5X7HgBeHErsDWF/ZuFaD9NmZSFUHAvOV5JeHuzGVIBsV5F/HIF7HQXGZ1X7DSrYV5B/HgBeHEFiV5B3DoF7D9XsDuFaHAveD5JwHuzGVcXKV5X7VoBOD9XOZSB/Z1BeV5FUDENOVkXeDWFqHIJsD9XsZ9JeD1BeD5F7DMvmVcFiV5X7HIBiD9XOZSB/HArYHuBqDEBeHEJGDWX7HMJsHQXsDQFaHAN7V5raHuNOVIBODWFYVEF7HQFYZSFaHArKV5XGDErKHErCDWF/VoBiDcJUZSX7Z1BYHuFaHuzGVcBUDWJeVENUDcFYVIJsD1rKD5BiHgNOHArCV5FaHIB/HQXsZSBiHIrKHQF7DMNOVIBODWF/DoBiHQJmZ1F7Z1vmD5rqDEBOHArCDWF/HMBqHQJeH9BiHArYHuX7HgvOVIB/H5FqHMXGHQFYZkFGHANOHuXGDMvCVkJ3DuXKZuJeHQXGDuFaHANOHuXGDMNOVcFeDWFYHIXGHQFYZ1BODSNOHQNUHgBeVkJqH5F/HIBiDcJUZSX7HIBeD5BqHgvsZSJ3H5FqHMBOHQBqVINUHAvCZMFaHgBYHArCH5FGZuBOHQXGDuBqHIrwHuJeDMvmDkBsHEX7HMJeHQFYZ1BODSrYHuJsHgrKHErCHEXCHIBOHQXGDuFaD1veHuraHgvOVcFeDuX7HIXGDcBwH9B/HIrwV5JeDMBYDkBsH5FYHIF7HQJeH9FUHAvmVWBODMzGDkB/DWF/HIrqHQFYZkFGZ1vOD5XGHgveDkXKH5F/HMFGHQXGDuBqHABYHQXGDMNODkBsDWF/HMraHQFYZkBiD1rwHQFUHgvsVkJqDWBmZuFaDcJUZSX7HIBeD5BqHgvsZSJ3H5FqVoFGDcBqH9BOZ1BeD5BqDMBYHEJGH5F/VoJeDcXOZSBiD1BOVWFaDMrwDkB/DWXCVoX7D9BsH9B/HIBeD5XGDMBYHEXeV5B7DoNUHQXsH9X7DSBYD5rqHgrKVcFCH5B7VoraHQBiZSB/HArYZMB/HgvsHEXeDWX7VoJwDcBwDuBOZ1rwVWJeDMvsV9FiV5FYVorqD9JmZ1rqHAvsZMXGHgveHAFKV5FaZuBqD9NmZSFGHIrwV5BOHuNODkBOV5X7VENUHQFYH9FaD1rwD5rqDErKVkXeHEFqDoBOD9NmDQJsD1BeV5FUHuzGDkBOH5XKVoraDcBwH9B/HIrwV5JeDMBYDkBsH5FYDoXGDcJeZSFUZ1rwD5BOHuNODkFCH5FqVENUDcNwH9BqHIrwHQJsHgNOHENiH5F/HMXGHQFYDQBOZ1zGVWJwDMBYVcXKDWF/HMFaHQXOZ1X7D1rKHuXGHgBYHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMvOZSNiDWB3VoX7HQNmVIJsHAvsD5JeHgveHArsDuFaHIJsD9XsZ9JeD1BeD5F7DMvmVcXKV5X7VoraHQNmZSB/HAN7HQBqDMzGZSJGDWF/DoXGDcBiZ9JeZ1BYD5B/HgvsVIBsDWXCDoJsDcBwH9B/Z1rYHQJwHgBOHArCH5F/HIB/HQJKDQFUHANOHuNUDMBYZSJ3DWXCHMB/HQJmZ1BOHAN7HQX7HgrKHArCDWX7HIJsD9XsZ9JeD1BeD5F7DMvmVcBUHEX/DoJsHQNmZ1XGZ1veZMNU";
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_TKZ_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_TKZ_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = ""; 
      }
      $this->Nm_accent_access    = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_db2       = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_ibase     = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_informix  = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_mssql     = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_mysql     = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_postgres  = array('cmp_i'=>"unaccent(",'cmp_f'=>")",'cmp_apos'=>"",'arg_i'=>"' || unaccent('",'arg_f'=>"') || '",'arg_apos'=>"");
      $this->Nm_accent_oracle    = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_sqlite    = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_sybase    = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_vfp       = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_odbc      = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_progress  = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");

      $this->Nm_accent_no = array('cmp_i'=>'','cmp_f'=>'','cmp_apos'=>'','arg_i'=>'','arg_f'=>'','arg_apos'=>'');
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
          $this->Nm_accent_yes = $this->Nm_accent_access;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2)) {
          $this->Nm_accent_yes = $this->Nm_accent_db2;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
          $this->Nm_accent_yes = $this->Nm_accent_ibase;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
          $this->Nm_accent_yes = $this->Nm_accent_informix;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
          $this->Nm_accent_yes = $this->Nm_accent_mssql;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
          $this->Nm_accent_yes = $this->Nm_accent_mysql;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
          $this->Nm_accent_yes = $this->Nm_accent_postgres;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
          $this->Nm_accent_yes = $this->Nm_accent_oracle;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
          $this->Nm_accent_yes = $this->Nm_accent_sqlite;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase)) {
          $this->Nm_accent_yes = $this->Nm_accent_sybase;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_vfp)) {
          $this->Nm_accent_yes = $this->Nm_accent_vfp;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_odbc)) {
          $this->Nm_accent_yes = $this->Nm_accent_odbc;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
          $this->Nm_accent_yes = $this->Nm_accent_progress;
      }
      else {
          $this->Nm_accent_yes = $this->Nm_accent_no;
      }
   }

   function getRunningOS()
   {
       $aOSInfo = array();

       if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
       {
           $aOSInfo['os'] = 'win';
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
       {
           $aOSInfo['os'] = 'linux-i386';
           if(strpos(strtolower(php_uname()), 'x86_64') !== FALSE) 
            {
               $aOSInfo['os'] = 'linux-amd64';
            }
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
       {
           $aOSInfo['os'] = 'macos';
       }

       return $aOSInfo;
   }

   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao']) && $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_perfil']) && $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['PreLiqPDF_new']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['PreLiqPDF_new']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao']))
      {
          if (!isset($_GET['nmgp_opcao']) || ('pdf' != $_GET['nmgp_opcao'] && 'pdf_res' != $_GET['nmgp_opcao'])) {
              ob_start();
          } else {
              @ini_set('zlib.output_compression',0);
              $bufferSize = @ini_get('output_buffering');
              if ('' != $bufferSize) {
                  $bufferSize = min($bufferSize * 10, 65536);
                  echo str_repeat('&nbsp;', $bufferSize);
              }
              
          }
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'BackOffice_Acapulco', 2, $this->force_db_utf8); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['embutida_init']) 
      {
          if (!isset($_SESSION['caseta'])) 
          {
              $this->nm_falta_var .= "caseta; ";
          }
          if (!isset($_SESSION['turno'])) 
          {
              $this->nm_falta_var .= "turno; ";
          }
          if (!isset($_SESSION['carril'])) 
          {
              $this->nm_falta_var .= "carril; ";
          }
          if (!isset($_SESSION['fecha_op'])) 
          {
              $this->nm_falta_var .= "fecha_op; ";
          }
      }
// 
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      $this->nm_arr_db_extra_args = array(); 
      if (isset($_SESSION['scriptcase']['glo_use_ssl']))
      {
          $this->nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['oracle_type']))
      {
          $this->nm_arr_db_extra_args['oracle_type'] = $_SESSION['scriptcase']['oracle_type']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->date_delim  = "";
          $this->date_delim1 = "";
      }
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family:Verdana, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer;  }";
          echo ".scButton_default:hover { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_default:hover img, .scButton_default:hover img, .scButton_default:hover img{filter: brightness(2);}.scButton_default:hover{; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer;  }";
          echo ".scButton_default:active { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1.5px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_default:active img{filter: brightness(2)}.scButton_default:active{; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer;  }";
          echo ".scButton_default_disabled { font-family:Verdana, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:16px; background-color:#FFFFFF; filter: alpha(opacity=40); opacity:0.4; line-height:31px; height:34px; padding:0 12px; cursor:default;  }";
          echo ".scButton_default_selected { font-family:Verdana, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer;  }";
          echo ".scButton_default_list { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_default_list:hover { font-family:Arial, sans-serif; color:#3C4858; font-size:13px; text-decoration:none; background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_default_list:active { font-family:Arial, sans-serif; color:#3C4858; font-size:13px; text-decoration:none; background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_default_list_disabled { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=45); opacity:0.45; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_default_list_selected { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_group { font-family:Tahoma, Arial, sans-serif;box-sizing: border-box;; color:#3C4858; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer;  }";
          echo ".scButton_group:hover { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_group:hover img, .scButton_group:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_group:hover{; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer;  }";
          echo ".scButton_group:active { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1.5px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_group:active img{filter: brightness(2)}.scButton_group:active{; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer;  }";
          echo ".scButton_group_disabled { font-family:Tahoma, Arial, sans-serif;box-sizing: border-box;; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=40); opacity:0.4; padding:7.8px 15px;margin:0px -5px; cursor:default;  }";
          echo ".scButton_group_selected { font-family:Tahoma, Arial, sans-serif;box-sizing: border-box;; color:#3C4858; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer;  }";
          echo ".scButton_small { font-family:Tahoma, Arial, sans-serif;box-sizing: border-box;; color:#3C4858; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small:hover { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_small:hover img, .scButton_small:hover img, .scButton_small:hover img{filter: brightness(2);}.scButton_small:hover{; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small:active { font-family:Verdana, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:bold; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1.5px; border-color:#878BA3; border-style:solid; border-radius:16px; background-color:#2451A1;}.scButton_small:active img{filter: brightness(2)}.scButton_small:active{; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small_disabled { font-family:Verdana, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:16px; background-color:#FFFFFF; filter: alpha(opacity=40); opacity:0.4; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:Tahoma, Arial, sans-serif;box-sizing: border-box;; color:#3C4858; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small_list { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_small_list:hover { font-family:Arial, sans-serif; color:#3C4858; font-size:13px; text-decoration:none; background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_small_list:active { font-family:Arial, sans-serif; color:#3C4858; font-size:13px; text-decoration:none; background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_small_list_disabled { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=45); opacity:0.45; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_small_list_selected { color:#3C4858; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer;  }";
          echo ".scButton_image { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_image:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_image:active { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_image_disabled { filter: alpha(opacity=40); opacity:0.4;  }";
          echo ".scButton_image_selected { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
   }
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_conexao'], $this->root . $this->path_prod, 'BackOffice_Acapulco', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['embutida']) || !$_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_start();
          } 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
          $this->Ibase_version = "old";
          if ($ibase_version = $this->Db->Execute("SELECT RDB\$GET_CONTEXT('SYSTEM','ENGINE_VERSION') AS \"Version\" FROM RDB\$DATABASE"))
          {
              if (isset($ibase_version->fields[0]) && substr($ibase_version->fields[0], 0, 1) > 2) {$this->Ibase_version = "new";}
          }
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
          $this->Db->Execute("set dateformat ymd");
          $this->Db->Execute("set quoted_identifier ON");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2))
      {
          $this->Db->fetchMode = ADODB_FETCH_NUM;
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      if (!isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['embutida']) || !$_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_end_clean();
          } 
      } 
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
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_mysql")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               $delim  = "#";
               $delim1 = "#";
           }
           if (isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
   function sc_Date_Protect($val_dt)
   {
       $dd = substr($val_dt, 8, 2);
       $mm = substr($val_dt, 5, 2);
       $yy = substr($val_dt, 0, 4);
       $hh = (strlen($val_dt) > 10) ? substr($val_dt, 10) : "";
       if ($mm > 12) {
           $mm = 12;
       }
       $dd_max = 31;
       if ($mm == '04' || $mm == '06' || $mm == '09' || $mm == 11) {
           $dd_max = 30;
       }
       if ($mm == '02') {
           $dd_max = ($yy % 4 == 0) ? 29 : 28;
       }
       if ($dd > $dd_max) {
           $dd = $dd_max;
       }
       return $yy . "-" . $mm . "-" . $dd . $hh;
   }
	function appIsSsl() {
		if (isset($_SERVER['HTTPS'])) {
			if ('on' == strtolower($_SERVER['HTTPS'])) {
				return true;
			}
			if ('1' == $_SERVER['HTTPS']) {
				return true;
			}
		}

		if (isset($_SERVER['REQUEST_SCHEME'])) {
			if ('https' == $_SERVER['REQUEST_SCHEME']) {
				return true;
			}
		}

		if (isset($_SERVER['SERVER_PORT'])) {
			if ('443' == $_SERVER['SERVER_PORT']) {
				return true;
			}
		}

		return false;
	}
   function Get_Gb_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['PreLiqPDF_new']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
   }

   function GB_date_format($val, $format, $prefix, $conf_region="S", $mask="")
   {
           return $val;
   }
   function Get_arg_groupby($val, $format)
   {
       return $val; 
   }
   function Get_format_dimension($ind_ini, $ind_qb, $campo, $rs, $conf_region="S", $mask="")
   {
       $retorno    = array();
       $format     = $this->Get_Gb_date_format($ind_qb, $campo);
       $Prefix_dat = $this->Get_Gb_prefix_date_format($ind_qb, $campo);
       if (empty($format) || $rs->fields[$ind_ini] == "")
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHIISS')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3,4");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3] . ":" . $rs->fields[$ind_ini + 4];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDD2')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMM')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'BIMONTHLY' || $format == 'QUARTER' || $format == 'FOURMONTHS' || $format == 'SEMIANNUAL' || $format == 'WEEK')
       {
           $temp            = (substr($rs->fields[$ind_ini], 0, 1) == 0) ? substr($rs->fields[$ind_ini], 1) : $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $Prefix_dat . $temp;
           return $retorno;
       }
       if ($format == 'DAYNAME'|| $format == 'YYYYDAYNAME')
       {
           if ($format == 'DAYNAME')
           {
               $retorno['orig'] = $rs->fields[$ind_ini];
               $ano             = "";
               $daynum          = $rs->fields[$ind_ini];
           }
           else
           {
               $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
               $ano             = " " . $rs->fields[$ind_ini];
               $daynum          = $rs->fields[$ind_ini + 1];
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
           {
               $daynum--;
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               $daynum = ($daynum == 6) ? 0 : $daynum + 1;
           }
           if ($daynum == 0) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_sund'] . $ano;
           }
           if ($daynum == 1) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_mond'] . $ano;
           }
           if ($daynum == 2) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_tued'] . $ano;
           }
           if ($daynum == 3) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_wend'] . $ano;
           }
           if ($daynum == 4) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_thud'] . $ano;
           }
           if ($daynum == 5) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_frid'] . $ano;
           }
           if ($daynum == 6) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_satd'] . $ano;
           }
           return $retorno;
       }
       if ($format == 'HH')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-00 " . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'DD')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'MM')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $temp            = $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-00 " . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'YYYYWEEK' || $format == 'YYYYBIMONTHLY' || $format == 'YYYYQUARTER' || $format == 'YYYYFOURMONTHS' || $format == 'YYYYSEMIANNUAL')
       {
           $temp            = (substr($rs->fields[$ind_ini + 1], 0, 1) == 0) ? substr($rs->fields[$ind_ini + 1], 1) : $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $Prefix_dat . $temp . " " . $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYHH' || $format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $rs->fields[$ind_ini] . $_SESSION['scriptcase']['reg_conf']['date_sep'] . $rs->fields[$ind_ini + 1];
           return $retorno;
       }
       elseif ($format == 'HHIISS')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1,2");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1] . ":" . $rs->fields[$ind_ini + 2];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'HHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       else
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
   }
   function Ajust_fields($ind_ini, &$rs, $parts)
   {
       $prep = explode(",", $parts);
       foreach ($prep as $ind)
       {
           $ind_ok = $ind_ini + $ind;
           $rs->fields[$ind_ok] = (int) $rs->fields[$ind_ok];
           if (strlen($rs->fields[$ind_ok]) == 1)
           {
               $rs->fields[$ind_ok] = "0" . $rs->fields[$ind_ok];
           }
       }
   }
   function Get_date_order_groupby($sql_def, $order, $format="", $order_old="")
   {
       $order      = " " . trim($order);
       $order_old .= (!empty($order_old)) ? ", " : "";
       return $order_old . $sql_def . $order;
   }
}
//===============================================================================
//
class PreLiqPDF_new_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
   }
//
//----- 
   function controle()
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $glo_senha_protect;

      $this->Ini = new PreLiqPDF_new_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['PreLiqPDF_new']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['PreLiqPDF_new']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['PreLiqPDF_new']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['PreLiqPDF_new'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['PreLiqPDF_new']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['PreLiqPDF_new']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('PreLiqPDF_new') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['PreLiqPDF_new']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "PreLiqPDF_new")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['PreLiqPDF_new']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['PreLiqPDF_new']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['PreLiqPDF_new']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      $this->nm_data = new nm_data("es");
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      $this->Db = $this->Ini->Db; 
      include_once($this->Ini->path_aplicacao . "PreLiqPDF_new_erro.class.php"); 
      $this->Erro      = new PreLiqPDF_new_erro();
      $this->Erro->Ini = $this->Ini;
      $old_dir = getcwd();
      chdir($this->Ini->path_third . "/tcpdf/");
      include_once("tcpdf.php");
      chdir($old_dir);
//
      header("X-XSS-Protection: 1; mode=block");
      header("X-Frame-Options: SAMEORIGIN");
      $_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
if (!isset($_SESSION['caseta'])) {$_SESSION['caseta'] = "";}
if (!isset($this->sc_temp_caseta)) {$this->sc_temp_caseta = (isset($_SESSION['caseta'])) ? $_SESSION['caseta'] : "";}
if (!isset($_SESSION['carril'])) {$_SESSION['carril'] = "";}
if (!isset($this->sc_temp_carril)) {$this->sc_temp_carril = (isset($_SESSION['carril'])) ? $_SESSION['carril'] : "";}
if (!isset($_SESSION['turno'])) {$_SESSION['turno'] = "";}
if (!isset($this->sc_temp_turno)) {$this->sc_temp_turno = (isset($_SESSION['turno'])) ? $_SESSION['turno'] : "";}
if (!isset($_SESSION['fecha_op'])) {$_SESSION['fecha_op'] = "";}
if (!isset($this->sc_temp_fecha_op)) {$this->sc_temp_fecha_op = (isset($_SESSION['fecha_op'])) ? $_SESSION['fecha_op'] : "";}
  $aforo_a = $aforo_i = $this->armamatriz();

$ruta = $this->leeConfig('RUTA','PreTurnoPDF');
$operacion = 0;
$montoTAG = 0;
$montoCRE = 0;
$turnogen = "";
	$fechaOperacion = str_replace('/','-',$this->sc_temp_fecha_op);
	$fechaOperacion = strtotime($fechaOperacion);
	$fechaOperacion = date('Y-m-d',$fechaOperacion);


if($this->sc_temp_turno == "" && $this->sc_temp_carril == ""){
	$condicional = " CasetaID = ".$this->sc_temp_caseta." and FechaOperacion = '".$fechaOperacion."' ";
	$carril = "Todos";
	$turnogen = "Todos";
	$narchivo =$fechaOperacion ;
	$ruta = $this->leeConfig('RUTA','PreDiaPDF');
	$titulo = "PRELIQUIDACIÓN DE DÍA";
	}elseif($this->sc_temp_carril == ""){
	$condicional = " CasetaID = ".$this->sc_temp_caseta." and FechaOperacion = '".$fechaOperacion."' and TurnoID = ".$this->sc_temp_turno;
	$carril = "Todos";
	$narchivo =$fechaOperacion.'_T'.$this->sc_temp_turno;
	$ruta = $this->leeConfig('RUTA','PreTurnoPDF');
	$titulo = "PRELIQUIDACIÓN DE TURNO";
	}else{
	$condicional = " CasetaID = ".$this->sc_temp_caseta." and FechaOperacion = '".$fechaOperacion."' and TurnoID = ".$this->sc_temp_turno. " and CarrilID = ".$this->sc_temp_carril;
	$carril = $this->sc_temp_carril;
	$narchivo =$fechaOperacion.'_T'.$this->sc_temp_turno."_C".$carril; 
	$ruta = $this->leeConfig('RUTA','PreTurnoCarrilPDF');
	$titulo = "PRELIQUIDACIÓN DE TURNO CARRIL";
	}
unset($this->sc_temp_turno);
unset($this->sc_temp_caseta);
unset($this->sc_temp_fecha_op);




$dia_hora =  time();
$fld_diag=date("d/m/Y", $dia_hora);
$fld_horag=date("H:i:s", $dia_hora);

$check_sql = "
SELECT
    TurnoID,
    CasetaID,
    TramoID,
    Cuerpo,
    UsuarioID,
    CarrilID,
    FechaOperacion,
    FechaTurno,
    HoraInicio,
    FechaFin,
    HoraFin, 
    OperacionID,
    FolioCierre,
    sum(CantidadMXN),
    SUM(CantidadUSD),
    SUM(ImporteMXN),
    SUM(ImporteUSD),
    FolioInicialCR,
    FolioFinalCR,
    FolioInicialEAP,
    FolioFinalEAP,
    SUM(Faltante),
    Observacion,
    SUM(MontoCR),
	AdministradorID,
	EncargadoTurnoID_Pre,
	UsuarioID,
	SUM(Entregado),
	SUM(Operacion),
	SUM(if(Faltante > 0, Faltante, 0)),
	SUM(if(Faltante < 0, Faltante, 0))
FROM
    detalleturno
	WHERE  $condicional ";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (isset($this->rs[0][0]))     
{
	$fecha_op = $this->rs[0][6];
	$fecha_turno = $this->rs[0][7];
	$turno =$this->rs[0][0];
	$caseta =$this->rs[0][1];
	$usuario =$this->rs[0][4];
	$hora_ini=$this->rs[0][8];
	$hora_fin=$this->rs[0][10];
	$folio_fin=$this->rs[0][12];
    $fld_ccant_mxn =$this->rs[0][13];
	$fld_ccant_usd =$this->rs[0][14]; 
	$fld_importeGE =$this->rs[0][15];
	$fld_cimporte_usd =$this->rs[0][16];
	$fld_folio_inicr =$this->rs[0][17];
	$fld_folio_fincr =$this->rs[0][18];
	$sec_ini =$this->rs[0][19];
	$sec_fin =$this->rs[0][20];
	$fld_faltante =$this->rs[0][21];
	$fld_observacion = $this->rs[0][22];
	$MontoCR = $this->rs[0][23];
	$administrador = $this->rs[0][24];
	$encargado_t = $this->rs[0][25];
	$usuarioID = $this->rs[0][26];
	$entregadoCajero = $this->rs[0][27];
	$operacion = $this->rs[0][28];
	$faltanteCajero = $this->rs[0][29];
	$sobranteCajero = ABS($this->rs[0][30]);
}
		else     
{	
			echo $check_sql."No existen datos";
			exit;
}

$nombre_archivo ='PreLiqTur_'.$caseta.'_'.$narchivo;
$nombre_archivo = str_replace('-', '', $nombre_archivo);


if($fecha_op==""){
	echo "No existen datos";
	?>
		<script>
		function CloseModal()
		{
		window.parent.tb_remove();
		}
		</script>
		<style> 
		input[type=button] {
			background-color: #2454a4;
			border: none;
			color: white;
			padding: 10px 32px;
			text-decoration: none;
			margin: 2px 2px;
			cursor: pointer;
			border-radius: 12px;
		}
		</style>
		<center><input type = "button" name = "btn_return" value = "Cerrar" onClick = 'Javascript:CloseModal();'></center>
		<?php
	exit;
	}


 
      $nm_select = "SELECT Caseta, Autopista, ModoOperacion FROM casetas WHERE CasetaID = '$caseta'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$caseta = $caseta." - ". $this->dataset[0][0];
		$autopista = "1 - ". $this->dataset[0][1];
		$modooperacion = $this->dataset[0][2];
	}


$check_sql = "SELECT TurnoID, CasetaID,TramoID,Cuerpo,CarrilID,FechaOperacion,FechaTurno, FolioInicialCR,FolioFinalCR,FolioInicialEAP,FolioFinalEAP, CantidadMXN FROM detalleturno WHERE  $condicional ";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
}
else
{
	$Folios = 0;
	$Secuenciales = 0;
   while(!$this->rs->EOF)
    {
		$Folios += $this->diferencia($this->rs->fields[8],$this->rs->fields[7])-$this->rs->fields[11];
		$Secuenciales += $this->diferencia($this->rs->fields[10],$this->rs->fields[9]);
		
		$this->rs->MoveNext();
    }
    $this->rs->Close();
}	
$check_aforo = "SELECT count(*) FROM aforo WHERE $condicional and (Folio != 0) ";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0])) {    
		$Folios = $this->ra[0][0];

	} else  {   
		$Folios=0;
	}





$totalCajero = 0;
$montoCajero =0;
$totalNOR = 0;
$foliosCR = 0;
$montoCRE= 0;
$foliosCR=0;
$codigo ="";
$PagoEfectivo = $this->ArmaCondicion();
$MontoMarcado =0;
$check_aforo = "SELECT 'CR',PagoID,SUM(ABS((Importe_$modooperacion + TarifaEE_$modooperacion)-(Importe_CR + TarifaEE_CR))), count(Consecutivo) FROM aforo WHERE $condicional and (VehiculoID_$modooperacion <> VehiculoID_CR and concat(VehiculoID_ECT,VehiculoID_CR) not in  ('T02CT02B','T03CT03B','T04CT04B'))";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0])) {    
		$MontoRecla = $this->ra[0][2];
		$CantidadRecla = $this->ra[0][3];
	} else  {   
		$MontoRecla=0;
		$CantidadRecla = 0;
	}


$style = 'style= "background-color:#dfdfdf; font-weight: bold";';
$check_aforo = "SELECT 'CR',PagoID,SUM(Importe_CR + TarifaEE_CR), count(Consecutivo) FROM aforo WHERE $condicional  $PagoEfectivo ";	   
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0])) {    
		$MontoMarcado = $this->ra[0][2];
		$cantidadMarc = $this->ra[0][3];
		$entregado = $MontoMarcado;
	} else  {   
		$MontoMarcado=0;
		$cantidadMarc = 0;
		$entregado = $MontoMarcado;
	}





$style = 'style= "background-color:#dfdfdf; font-weight: bold";';

	$montoCajero = $operacion + $fld_importeGE;
	$MarcadoEfectivo = $MontoMarcado;
	$FoliosEfectivo = $Folios;
	$FoliosOriginal = $Folios - $fld_ccant_mxn - $fld_ccant_usd;
	$codigo .= '
		<tr '.$style.' >
		<td width="40%">Aforo Efectivo</td>
		<td width="10%" align="right">'.number_format($montoCajero,2).'</td>
		<td width="10%" align="right">'.$FoliosEfectivo.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadMarc.'</td>
		<td width="10%" align="right">'.number_format($montoCajero-$MontoMarcado,2).'</td>
		<td width="10%" align="right">'.($cantidadMarc-$FoliosEfectivo).'</td>
		</tr>		
		';


$check_sql = "SELECT TipoPagoID, Tipo FROM tipopago WHERE PagoEfectivo <> 1 AND ( TipoPagoID <> 'GE') order by Orden";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $this->rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
}
else
{
   while(!$this->rs->EOF)
	  {
  	if($this->rs->fields[0]=="NOR"){
	 	$style = 'style= "background-color:#dfdfdf; font-weight: bold";';
	}else{
		$style = ''; 
	}
	$check_aforo = "SELECT 'CR',PagoID,SUM(Importe_CR + (TarifaEE_CR)), count(Consecutivo) FROM aforo WHERE $condicional AND PagoID = '". $this->rs->fields[0] ."'  and VehiculoID_CR <> '' GROUP BY PagoID";
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0]))     
	{
		$MontoMarcado = $this->ra[0][2];
		$FoliosEfectivo += $this->ra[0][3];
		if($this->rs->fields[1]=="TAG"){$montoTAG=$this->ra[0][2];}
		if($this->rs->fields[1]=="CRE"){$montoCRE=$this->ra[0][2];}
		if($this->rs->fields[1]<>"TAG"){$montoCajero += $MontoMarcado;}
		$cantidadCR = $this->ra[0][3];	
	} else {    
		$MontoMarcado=0;
		$cantidadCR = 0;
	}
		$codigo .= '
		<tr '.$style.' >
		<td width="40%">'.  $this->rs->fields[1] .'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format(($MontoMarcado-$MontoMarcado),2).'</td>
		<td width="10%" align="right">'.($cantidadCR-$cantidadCR).'</td>
		</tr>		
		'; 
	   $this->rs->MoveNext();
    }
    $this->rs->Close();
}

		$check_aforo = "SELECT PagoID,SUM(Importe_CR + (TarifaEE_CR)), count(Consecutivo) FROM aforo WHERE $condicional";
	 
      $nm_select = $check_aforo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ra = false;
          $this->ra_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->ra[0][0]))     
	{
		$MontoMarcado = $this->ra[0][1];
		$cantidadCR = $this->ra[0][2];
	} else {    
		$MontoMarcado= 0.0;
		$cantidadCR = 0;
	}
$codigo .= '
		<tr style= "background-color:#dfdfdf; font-weight: bold"; >
		<td width="40%">Totales </td>
		<td width="10%" align="right">'.number_format(($montoCajero),2).'</td>
		<td width="10%" align="right">'.$FoliosEfectivo.'</td>
		<td width="10%" align="right">'.number_format($MontoMarcado-$montoTAG,2).'</td>
		<td width="10%" align="right">'.$cantidadCR.'</td>
		<td width="10%" align="right">'.number_format(($montoCajero-$MontoMarcado+$montoTAG),2).'</td>
		<td width="10%" align="right">'.($cantidadCR-$FoliosEfectivo).'</td>
		</tr>
		';

						
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $encargado_t"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$encargado_t .= " - ". $this->dataset[0][0]." ". $this->dataset[0][1]." ". $this->dataset[0][2];
	}	
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $usuarioID"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$usuarioID .= " - ". $this->dataset[0][0]." ". $this->dataset[0][1]." ". $this->dataset[0][2];
	}	
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $administrador"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($this->dataset[0][0]))     
	{
		$administrador .= " - ". $this->dataset[0][0]." ". $this->dataset[0][1]." ". $this->dataset[0][2];
	}
if($turnogen != ""){
	$turno = $turnogen;
}else{
	 
      $nm_select = "SELECT Nombre FROM turnos where TipoID = $turno"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

		if (isset($this->dataset[0][0]))     
		{
			$turno .= " - ". $this->dataset[0][0];
		}	
}

$diferenciaCR_Efe = $entregadoCajero;
$diferenciaCR_Efe2= $entregadoCajero-$faltanteCajero;

if($MarcadoEfectivo > ($operacion + $fld_importeGE)){

	$depositar = $MarcadoEfectivo - $fld_importeGE + $sobranteCajero;
	}else{
	$depositar = $operacion  + $entregadoCajero + abs($diferenciaCR_Efe2);
		}



$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('TKZ');
$pdf->SetTitle('LIQUIDACIÓN DE CAJERO-RECEPTOR');
$pdf->SetSubject('Tránsito Vehicular');
$pdf->SetKeywords('Aforo, PDF, Liquidacion');
$pdf->AddPage('P','LETTER'); 


$tbl = '
	<table class = "roundedCorners" cellpadding="5" cellspacing="2">
	<tr>
		<th style="background-color:#FFFFFF";color:#0000FF; colspan="5" align="center"><b><br>'.$titulo.'</b>
		</th>
	</tr>
</table>
<table class = "estilo1"  cellpadding="2" cellspacing="2">
	<tr>
		<td>Fecha:</td>
		<td style= "border-bottom: 0.5px solid Black">' . $fecha_op .'</td>
		<td rowspan="6"></td>
		<td></td>
		<td ></td>
		
	</tr>
	<tr>
		<td>No. y Nombre de Delegación:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$autopista.'</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>No. y Nombre Plaza de C.:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$caseta.'</td>
		<td></td>
		<td ></td>
	</tr>
	<tr>
		<td>Turno:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$turno .'</td>
		<td>Carril:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$carril.'</td>
	</tr>
	<tr>
		<td>Fecha de Generación::</td>
		<td style= "border-bottom: 0.5px solid Black">'.$fld_diag.'</td>
		<td>Hora de Generación:</td>
		<td style= "border-bottom: 0.5px solid Black">'.$fld_horag.'</td>
	</tr>

</table>

<table class = "roundedCorners" cellpadding="2" cellspacing="0">
	<tr>
		<th style="background-color:#FFFF00";color:#0000FF; colspan="7"; align="center"><b>ENTREGADO CAJERO-RECEPTOR</b>
		</th>
	</tr>
	<tr align="center" valign="middle">
		<th width="40%" rowspan="2">Concepto</th>
		<th width="20%">Marcado</th>
		<th width="20%">Verificado</th>
		<th width="20%">Diferencia</th>
	</tr>
	<tr align="center" valign="middle">
		<th width="10%">$</th>
		<th width="10%">Eventos</th>
		<th width="10%">$</th>
		<th width="10%">Eventos</th>
		<th width="10%">$</th>
		<th width="10%">Eventos</th>
	</tr>
	<tr>
		<td width="40%">Efectivo M.N.</td>
		<td width="10%" align="right">'.$operacion.'</td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
	</tr>
	<tr>
		<td width="40%">Boletos Generados por Error</td>
		<td width="10%" align="right">'.$fld_importeGE.'</td>
		<td width="10%" align="right">'.$fld_ccant_mxn.'</td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
	</tr>
	
	'. $codigo  .' 

	<tr>
		<td width="40%">Efectivo Dls</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right">0</td>
	</tr>
	<tr>
		<td width="40%">Boletos Generados por Error Moneda Extranjera</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right">0</td>
		<td width="10%" align="right">0</td>
	</tr>
		<tr style="background-color:#dfdfdf";>
		<td width="40%"><b>Subtotal Marcado como pagado</b></td>
		<td width="10%" align="right"><b>'.$fld_cimporte_usd.'</b></td>
		<td width="10%" align="right"><b>'.$fld_ccant_usd.'</b></td>
		<td width="10%" align="right"><b></b></td>
		<td width="10%" align="right"><b></b></td>
		<td width="10%" align="right"><b></b></td>
		<td width="10%" align="right"><b></b></td>
	</tr>

	<tr>
		<td width="40%">Reclasificados</td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"><b>'.$MontoRecla.'</b></td>
		<td width="10%" align="right"><b>'.$CantidadRecla.'</b></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
	</tr>
	<tr>
		<td width="100%"> </td>
	</tr>
</table>
<table class = "estilo1" cellpadding="1" cellspacing="0">

<tr>
	<th style="background-color: #ffff00; border-right: 0.5px solid Black; border-left: 0.5px solid Black" colspan="4" align="center" width="60%"><strong>DIFERENCIA CAJERO-RECEPTOR (MARCADO Y ENTREGADO)</strong></th>
	<th style="background-color: #ffff00; border-right: 0.5px solid Black" colspan="2color:#0000FF;" align="center" width="40%"><strong>SOBRANTE POR DEPOSITO ENTREGADO</strong>	</th>
</tr>
<tr style="text-align: center; background-color: #ffff00;">
	<td style = "border-left: 0.5px solid Black; border-bottom: 0.5px solid Black" colspan="2"; >M.N. $ ENTREGADO DLLS $</td>
	<td style = "border-right: 0.5px solid Black; border-bottom: 0.5px solid Black" colspan="2";>M.N. $ POR ENTREGAR DLLS $</td>
 	<td style = "border-bottom: 0.5px solid Black"><strong>M.N.</strong></td>
  	<td style = "border-right: 0.5px solid Black; border-bottom: 0.5px solid Black"><strong>DLLS</strong></td>
</tr>
<tr style="text-align: center; background-color: #ffff00">
  <td style ="border: 0.5px solid black" width="15%"><strong>'.number_format($diferenciaCR_Efe,2).'</strong></td>
  <td style ="border: 0.5px solid black" width="15%"><strong> 0.0 </strong></td>
  <td style ="border: 0.5px solid black" width="15%"><strong>'.number_format(abs($diferenciaCR_Efe2),2).'</strong></td>
  <td style ="border: 0.5px solid black" width="15%"><strong>  </strong> 0.0 </td>
  <td style ="border: 0.5px solid black" width="20%"><strong>'.number_format($sobranteCajero,2).'  </strong></td>
  <td style ="border: 0.5px solid black" width="20%"><strong>  </strong></td>
</tr>
</table>
<table class = "estilo1" cellpadding="1" cellspacing="0">
	<tr>
		<th style="border-right: 0.5px solid Black; border-left: 0.5px solid Black" colspan="4" align="center" width="60%"><strong>FOLIOS NETOS</strong></th>
		<th style="border-right: 0.5px solid Black" colspan="2color:#0000FF;" align="center" width="40%"><strong>EVENTOS NETOS</strong>	</th>
	</tr>

</table>

<table class = "estilo1" cellpadding="1" cellspacing="0">
	<tr align="center">
		<td width="15%"></td>
		<td width="10%" ></td>
		<td width="2.5%" rowspan = "7"></td>
		<td width="10%" ></td>
		<td width="2.5%" rowspan = "7"></td>
		<td width="10%" ></td>
		<td style= "border-right: 0.5px solid Black" width="10%" ></td>
		<td width="20%" ></td>
		<td width="20%" ></td>
	</tr>
	<tr  align="right">
		<td  align="left">Transito Vehícular</td>
		<td ></td>
		<td ></td>
		<td style= "border-bottom: 0.5px solid Black">'.$Folios .'</td>
		<td style= "border-right: 0.5px solid Black"></td>
		<td ><b>Transito Vehícular</b></td>
		<td style= "border-bottom: 0.5px solid Black"><b>'.$Secuenciales.'</b></td>
	</tr>
		<tr  align="right">
		<td  align="left">Transito Peatonal</td>
		<td > </td>
		<td > </td>
		<td style= "border-bottom: 0.5px solid Black">0</td>
		<td style= "border-right: 0.5px solid Black"></td>
		<td ><b>Transito Peatonal</b></td>
		<td style= "border-bottom: 0.5px solid Black" align:"right"><b>0</b></td>
	</tr>
		<tr  align="right">
		<td  align="left">Transito Triciclos</td>
		<td ></td>
		<td ></td>
		<td style= "border-bottom: 0.5px solid Black"></td>
		<td style= "border-right: 0.5px solid Black"></td>
		<td ></td>
		<td ></td>
	</tr>

	<tr align="right">
		<td ></td>
		<td ></td>
		<td ></td>
		<td ></td>
		<td style= "border-right: 0.5px solid Black"></td>
		<td ></td>
		<td ></td>
	</tr>
	
</table>

<table class = "estilo1" cellpadding="1" cellspacing="0">
	<tr>
		<th style="border-bottom: 1px solid Black; background-color:#FFFF00";color:#0000FF; colspan="7"; align="center"><b>Tránsito FFNN</b>
		</th>
	</tr>
	<tr>
		<th style="background-color: #ffff00; border-right: 0.5px solid Black; border-left: 0.5px solid Black" colspan="4" align="center" width="60%"><strong>Concepto</strong></th>
		<th style="background-color: #ffff00; border-right: 0.5px solid Black" colspan="2color:#0000FF;" align="center" width="10%"><strong>Número</strong>	
		</th>
		<th style="background-color: #ffff00; border-right: 0.5px solid Black" colspan="2color:#0000FF;" align="center" width="10%"><strong>Tarifa</strong>	
		</th>
		<th style="background-color: #ffff00; border-right: 0.5px solid Black" colspan="2color:#0000FF;" align="center" width="20%"><strong>Ingreso por recibir</strong>
		</th>
	</tr>
	<tr align="center">
		<td style="border-right: 0.5px solid Black" align="left" width="60%">Locomotoras</td>
		<td style="border-bottom: 0.5px solid Black; border-right: 0.5px solid Black" width="10%"></td>
		<td style="border-bottom: 0.5px solid Black; border-right: 0.5px solid Black" width="10%"></td>
		<td style="border-bottom: 0.5px solid Black" width="20%"></td>
	</tr>
	<tr align="right">
		<td  style="border-right: 0.5px solid Black" align="left">Carros</td>
		<td style="border-bottom: 0.5px solid Black; border-right: 0.5px solid Black"></td>
		<td style="border-bottom: 0.5px solid Black; border-right: 0.5px solid Black"></td>
		<td style="border-bottom: 0.5px solid Black"></td>

	</tr>
	<tr align="right">
		<td style="border-bottom: 0.5px solid Black; border-right: 0.5px solid Black"></td>
		<td style="border-bottom: 0.5px solid Black; border-right: 0.5px solid Black"> </td>
		<td style="border-bottom: 0.5px solid Black; border-right: 0.5px solid Black"></td>
		<td style="border-bottom: 0.5px solid Black"> </td>

	</tr>
</table>



<table class = "estilo1" cellpadding="10" cellspacing="0">
	
	<tr style="background-color:#dfdfdf"; align="center"; valign="middle">
		<th width="50%" align="right"><b>CANTIDAD A DEPOSITAR M.N. $</b></th>
		<th width="20%" align="right"><b>'.number_format($depositar,2).'</b></th>
		<th width="10%" align="right"><b>DLLS $</b></th>
		<th width="20%" align="right"></th>
		
	</tr>
</table>

<table class = "estilo1" cellpadding="1" cellspacing="0">
	<tr>
	<td width="100%">LOS SERVIDORES PÚBLiCOS FIRMANTES, ASUMEN LA RESPONSABILIDAD DE LOS FONDOS Y VALORES PATRIMONIO DE LA CONCESIONARIA QUE SON CONFIADOS.POR LO QUE SE HACEN RESPONSABLES DEL FALTANTE QUE SEA DETECTADO MEDIANTE LOS PROCESOS ESTABLECIDOS POR EL ORGANISMO EN LOS INGRESOSCAPTADOS DURANTE EL TURNO CARRIL LABORADO QUE SE ENCUENTRA REFERIDO EN EL RUBRO DEL PRESENTE DOCUMENTO.OBLIGANDOSE A EFECTURA EL PAGO CORRESPONDIENTE A LA DIFERENCIA DETECTADA EN SU CONTRA EN LA ETAPA DEL PROCESO DE LIQUIDACIÒN DEFINITIVA.SEA DESCONTADO SE SU SALARIO EN LA QUINCENA INMEDIATA POSTERIOR A LA QUE OCURRA EL EVENTO ANTES DESCRITO </td>
	</tr>
	<tr>
		<td width="10%">Obsrv:</td>
		<td width="90%" style= "border-bottom: 0.25px solid Black">'.$fld_observacion.'</td>
	</tr>
		<tr>
		<td ></td>
	</tr>
	<tr>
		<td ></td>
	</tr>
	<tr>
		<td width="100%" ></td>
	</tr>
		<tr>
		<td width="10%"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="40%" align="center"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
		<td width="10%" align="right"></td>
	</tr>
	<tr>
		<td width="100%" ></td>
	</tr>
		<tr>
		<td width="5%"></td>
		<td width="25%" align="center">Entrega<br><br>  '.$encargado_t.' <br>Encargado de Turno<br>Nombre y Firma</td>
		<td width="10%" align="right"></td>
		<td width="25%" align="center"></td>
		<td width="10%" align="right"></td>
		<td width="25%" align="center">Enterado<br><br>'.$administrador.'<br>Empleado Supervisor de Caseta</td>
		<td width="5%" align="right"></td>
	</tr>
	<tr>
		<td width="100%" ></td>
	
	</tr>
</table>

';

$style = <<<EOD
<style>
table.estilo1 {
    border: 1px solid black;
	font-size:6px
	align="right" 
}

table.roundedCorners {
border: 1px solid Black;
border-radius: 13px;
border-spacing: 0;
border-collapse: collapse;
}
table.roundedCorners td,
table.roundedCorners th {
border: 0.5px solid gray;
font-size:7px;
cellpadding: 15;
padding: 10px;
}
table.roundedCorners tr:last-child > td {
border-bottom: solid;
}
</style>
EOD;


$styleComparativo=<<<EOD
<style>
	table.titulos {
		font-size:6px
		align="right" 	
	}
	table.roundedCorners {
		border: 1px solid Black;
		border-radius: 13px;
		border-spacing: 0;
		border-collapse: collapse;
	}
	table.roundedCorners td,
		table.roundedCorners th {
		border: 0.5px solid gray;
		font-size:5.5px;
		cellpadding: 15;
		padding: 10px;
	}
	table.roundedCorners tr:last-child > td {
		border-bottom: solid;
	}
</style>
EOD;
$pdf->writeHTML($style . $tbl, true, false, false, false, '');
$pdf->AddPage('L','LETTER'); 
$tbl = $this->Comparativo($fechaOperacion);
$pdf->writeHTML($styleComparativo . $tbl, true, false, false, false, '');

if (!file_exists($ruta)) {
    		mkdir($ruta, 0777, true);
		}
$pdf->Output($ruta.'Preliq_'.$nombre_archivo.'.pdf', 'F');
$pdf->Output('PreliqCR_'.$nombre_archivo.'.pdf', 'I');
if (isset($this->sc_temp_fecha_op)) {$_SESSION['fecha_op'] = $this->sc_temp_fecha_op;}
if (isset($this->sc_temp_turno)) {$_SESSION['turno'] = $this->sc_temp_turno;}
if (isset($this->sc_temp_carril)) {$_SESSION['carril'] = $this->sc_temp_carril;}
if (isset($this->sc_temp_caseta)) {$_SESSION['caseta'] = $this->sc_temp_caseta;}
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off'; 
//--- 
       $this->Db->Close(); 
       if ($this->Change_Menu)
       {
           $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
           $Arr_rastro = array();
           if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
           {
               foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
               {
                  $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
               }
               $ult_apl = count($Arr_rastro) - 1;
               unset($Arr_rastro[$ult_apl]);
               $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
           }
           else
           {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
           }
       }
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
?>
              <HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
               <HEAD>
                <TITLE></TITLE>
               <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
           if ($_SESSION['scriptcase']['proc_mobile'])
           {
?>
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
           }
?>
                <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>                <META http-equiv="Pragma" content="no-cache"/>
                <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
                <script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
                <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
                <script type="text/javascript"><?php echo $this->redir_modal ?></script>
               </HEAD>
              </HTML>
<?php
       } 
       exit;
   } 
function ArmaCondicion()
{
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
  
$PagoEfectivo = " AND (";
$check_sql = "SELECT TipoPagoID,Tipo FROM tipopago WHERE PagoEfectivo = 1 and (TipoPagoID <> 'DE' AND TipoPagoID <> 'GE' )  order by Orden";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
}
else
{
   while(!$rs->EOF)
    {
	$PagoEfectivo .= "PagoID = '".$rs->fields[0] . "' OR ";
	 $rs->MoveNext();
    }
    $rs->Close();
}
$PagoEfectivo = substr($PagoEfectivo,0,-4);
$PagoEfectivo .= ")";
return $PagoEfectivo;
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function Comparativo($fechaOperacion)
{
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
if (!isset($_SESSION['carril'])) {$_SESSION['carril'] = "";}
if (!isset($this->sc_temp_carril)) {$this->sc_temp_carril = (isset($_SESSION['carril'])) ? $_SESSION['carril'] : "";}
if (!isset($_SESSION['caseta'])) {$_SESSION['caseta'] = "";}
if (!isset($this->sc_temp_caseta)) {$this->sc_temp_caseta = (isset($_SESSION['caseta'])) ? $_SESSION['caseta'] : "";}
if (!isset($_SESSION['turno'])) {$_SESSION['turno'] = "";}
if (!isset($this->sc_temp_turno)) {$this->sc_temp_turno = (isset($_SESSION['turno'])) ? $_SESSION['turno'] : "";}
  
$fecha_op = $fechaOperacion;

$caseta = $this->sc_temp_caseta;
$usuario = "";
$encargado_t="";
if($this->sc_temp_turno == "" && $this->sc_temp_carril == ""){
	$sql_where = " FechaOperacion = '$fecha_op' and CasetaID= $caseta";
	$carril = "Todos";
	$turno = "Todos";
	$titulo = "DÍA";
	}elseif($this->sc_temp_carril == ""){
	$sql_where = " FechaOperacion = '$fecha_op' and CasetaID= $caseta  and TurnoID = ".$this->sc_temp_turno;
	$carril = "Todos";
	$turno = $this->sc_temp_turno;
	$titulo = "TURNO";
	}else{
	$sql_where = " FechaOperacion = '$fecha_op' and CasetaID= $caseta  and TurnoID = ".$this->sc_temp_turno." AND  CarrilID = ".$this->sc_temp_carril;
	$carril = $this->sc_temp_carril;
	$turno = $this->sc_temp_turno;
	$titulo = "TURNO - CARRIL";
	}


$check_sql = "SELECT HoraInicio, FolioInicialCR FROM detalleturno WHERE CasetaID = $caseta and FechaOperacion = '$fecha_op' and PreLiquidado =1 ORDER BY HoraInicio ASC Limit 1";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (isset($rs[0][0]))     
{

	$hora_ini=$rs[0][0];
	$folio_inicial = $rs[0][1];
}
		else     
{
	$hora_ini="";
	$folio_inicial = "";
}
$check_sql = "SELECT HoraFin, FolioFinalCR  FROM detalleturno WHERE  CasetaID = $caseta and FechaOperacion = '$fecha_op' and PreLiquidado = 1 ORDER BY HoraFin DESC Limit 1";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (isset($rs[0][0]))     
{

	$hora_fin=$rs[0][0];
	$folio_final = $rs[0][1];
}
		else     
{
	$hora_fin="";
	$folio_final = "";
}


 
      $nm_select = "SELECT Caseta, Autopista, ModoOperacion FROM casetas WHERE CasetaID = '$caseta'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$caseta = $caseta." - ". $dataset[0][0];
		$autopista = "1 - ". $dataset[0][1];
		$modooperacion = $dataset[0][2];
	}
						
 
      $nm_select = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno FROM usuario WHERE UsuarioID = $encargado_t"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$encargado_t .= " - ". $dataset[0][0]." ". $dataset[0][1]." ". $dataset[0][2];
	}	
 
      $nm_select = "SELECT Caseta FROM casetas WHERE CasetaID = $caseta"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$caseta .= " - ". $dataset[0][0];
	}	


$dia_hora =  time();
$fld_diag=date("d/m/Y", $dia_hora);
$fld_horag=date("H:i:s", $dia_hora);



$vtarifa = array("T01A"=>0,"T01M"=>0,"T02B"=>0,"T03B"=>0,"T04B"=>0,"T02C"=>0,"T03C"=>0,"T04C"=>0,"T05C"=>0,"T06C"=>0,"T07C"=>0,"T08C"=>0,"T09C"=>0,"EEA"=>0,"EEC"=>0);

$dia_hora =  time();
$fld_diag=date("d/m/Y", $dia_hora);
$fld_horag=date("H:i:s", $dia_hora);

$tipospago = "";
$codigo_html="";
$categoria ="";
$check_sql = "SELECT categoria.Descripcion, categoriatipopago.TipoPagoID , categoria.Efectivo FROM categoria RIGHT JOIN categoriatipopago ON categoriatipopago.CategoriaID = categoria.CategoriaID ORDER BY categoria.Orden";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
}else{
	while(!$rs->EOF){
		if($categoria <> $rs->fields[0]){

			if($tipospago <> ""){

				$tipospago = substr($tipospago,0,-3);	
				$tipospago .= ") AND" ;
				$fila_a= $this->saca_aforo($tipospago, "Total" , $sql_where);
				$codigo_html .= $fila_a[0];
				$tipospago = "";
				if($fila_efectivo == 1){ 
					$codigo_html .= $fila_a[1];
				}
			}
			$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" >' .$rs->fields[0]. '</th></tr>';
			$tipospago = "(";
		}
		$tipospago .= " PagoID = '".$rs->fields[1]. "' OR";
		$categoria = $rs->fields[0];
		$fila_a= $this->saca_aforo("PagoID = '".$rs->fields[1]."' AND", $rs->fields[1], $sql_where);
		$codigo_html .= $fila_a[0];
		$fila_efectivo = $rs->fields[2];
		if($rs->fields[2]==1){ 
			$codigo_html .= $fila_a[1];
		}
		$rs->MoveNext();
	}
	
	$fila_a= $this->saca_aforo($tipospago, "Total" , $sql_where);
	$codigo_html .= $fila_a[0];
    $rs->Close();
}
$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" > Total Marcado por Cajero-Receptor incluyendo vehículos sin pago </th></tr>';
$fila_a = $this->saca_aforo("","",$sql_where);
$codigo_html .=  $fila_a[0];
$codigo_html .=  $fila_a[1];
$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" >Total Detectado por '.$modooperacion.' incluyendo vehículos sin pago </th></tr>';
$fila_a = $this->aforoECT("","",$sql_where,$modooperacion);
$codigo_html .=  $fila_a[0];
$codigo_html .=  $fila_a[1];
$codigo_html .= '<tr><th style = "font-size:9px; color:#ff0000" colspan="20" >Diferencia entre el Total Marcado por el C-R y el '.$modooperacion.' </th></tr>';
$fila_a = $this->DiferenciaTotales($sql_where,$modooperacion);
$codigo_html .=  $fila_a[0];
$codigo_html .=  $fila_a[1];

$check_sql = "SELECT VehiculoID, Importe, ImporteEjeLigero, ImporteEjePesado from tarifa 
WHERE CasetaID = '$caseta' and TipoPagoID = 'NOR' AND '$fecha_op' BETWEEN FechaInicio and FechaFin;";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
  }else{
   while(!$rs->EOF){
	   
	   $vtarifa[$rs->fields[0]] = $rs->fields[1];
	   $vtarifa['EEA'] = $rs->fields[2];
	   $vtarifa['EEC'] = $rs->fields[3];
	   
	   $rs->MoveNext();
	}
    $rs->Close();
}
$tarifas = $this->crea_tr($vtarifa,"TARIFA REF.NOR"); 



 
      $nm_select = "SELECT Nombre FROM turnos where TipoID =". $this->sc_temp_turno; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $Dataset = array();
      $dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $Dataset = false;
          $Dataset_erro = $this->Db->ErrorMsg();
          $dataset = false;
          $dataset_erro = $this->Db->ErrorMsg();
      } 

	if (isset($dataset[0][0]))     
	{
		$turno = $this->sc_temp_turno." - ". $dataset[0][0];
	}	else{ $turno = "Todos";}

$tbl = <<<EOD
<table class = "roundedCorners" cellpadding="2" cellspacing="0">
	<tr>
		<th style="background-color:#FFFFFF";color:#0000FF; colspan="5" align="center"><b>REPORTE COMPARATIVO PRELIMINAR DE AFORO E INGRESO POR $titulo <br>Tránsito Vehicular</b>
		</th>
	</tr>
</table>

<table class = "titulos"  cellpadding="4" cellspacing="0">
<tbody>
	<tr>
		<th  width="14.5%">No. y Nombre de la Delegación:</th>
		<td  style= "border-bottom: 0.5px solid Black" colspan="3" width="13.5%" >$autopista</td>
		<th  width="4.5%"></th>
		<th  colspan="2" width="9%" ></th>
		<th  width="4.5%">Tramo:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="5" width="22.5%"></th>

		<th  width="4.5%"></th>
		<th  width="4.5%"></th>
		<th  width="4.5%"></th>
		<th width="2%">&nbsp;</th>
		<th width="4.5%">&nbsp;</th>
		<th width="4.5%">&nbsp;</th>
		<th width="7%">&nbsp;</th>
	</tr>
	<tr>
		<th  width="14.5%">No. y Nombre de Caseta:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="3" width="13.5%">$caseta</th>
		<th  colspan="2" width="9%">Carril:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="2" width="9%" >$carril</th>
		<th  colspan="2" width="9%">No. Turno:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="2" width="9%">$turno</th>
		<th  colspan="2" width="9%">Fecha de Operación:</th>
		<th  style= "border-bottom: 0.5px solid Black" colspan="2" width="9%">$fecha_op</th>
		<th  colspan="2" width="9%">Fecha de Emisión:</th>
		<th style= "border-bottom: 0.5px solid Black" colspan="2" width="9%">$fld_diag</th>

	</tr>
	<tr>
		<th  width="14.5%"></th>
		<th  colspan="3" width="13.5%">$encargado_t</th>
		<th  colspan="2" width="9%">:</th>
		<th  colspan="2" width="9%" ></th>
		<th  colspan="2" width="9%"></th>
		<th  colspan="2" width="9%"></th>
		<th  colspan="2" width="9%"></th>
		<th  colspan="2" width="9%"></th>
		<th  colspan="2" width="9%"></th>
		<th  colspan="2" width="9%"></th>
	</tr>
<tr>
	<th colspan="20" ></th>
</tr>
</tbody>
</table>

<table class = "roundedCorners" cellpadding="1" cellspacing="0">
<tbody>
	<tr>
		<th rowspan="2" width="14.5%">&nbsp;</th>
		<th rowspan="2" width="4.5%">Autos</th>
		<th rowspan="2	" width="4.5%">Motos</th>
		<th colspan="3" width="13.5%">Autobuses</th>
		<th colspan="8" width="36%">CAMIONES</th>
		<th colspan="2" width="9%">Ejes Excedentes</th>
		<th width="2%">&nbsp;</th>
		<th width="4.5%">&nbsp;</th>
		<th width="4.5%">&nbsp;</th>
		<th width="7%">&nbsp;</th>
	</tr>
	<tr>
		<th width="4.5%">2</th>
		<th width="4.5%">3</th>
		<th width="4.5%">4</th>
		<th width="4.5%">2</th>
		<th width="4.5%">3</th>
		<th width="4.5%">4</th>
		<th width="4.5%">5</th>
		<th width="4.5%">6</th>
		<th width="4.5%">7</th>
		<th width="4.5%">8</th>
		<th width="4.5%">9</th>
		<th width="4.5%">EE1</th>
		<th width="4.5%">EE2</th>
		<th width="2%">&nbsp;</th>
		<th width="4.5%">Aforo</th>
		<th width="4.5%">Ingreso</th>
		<th width="7%">&nbsp;</th>
	</tr>
	$tarifas
	$codigo_html
	
	</tbody>

</table>

EOD;



return $tbl;
if (isset($this->sc_temp_turno)) {$_SESSION['turno'] = $this->sc_temp_turno;}
if (isset($this->sc_temp_caseta)) {$_SESSION['caseta'] = $this->sc_temp_caseta;}
if (isset($this->sc_temp_carril)) {$_SESSION['carril'] = $this->sc_temp_carril;}
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function DiferenciaTotales($sql_where, $modooperacion)
{
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
  
$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;


$check_sql = "SELECT VehiculoID_CR, ClaseVehiculo_CR, SUBSTR(ClaseVehiculo_CR,1,1), SUBSTR(VehiculoID_CR,4,1), CantidadEje_CR,count(*), SUM(Importe_CR), CantidadEje_CR, SUM(TarifaEE_CR), PagoID FROM aforo 
WHERE $sql_where
GROUP BY VehiculoID_CR";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
	}else{
	while(!$rs->EOF){

		if($rs->fields[2] =="A" || $rs->fields[2]=="M"){
			$clase = $rs->fields[2];
			$vAforo[$clase] += $rs->fields[5];
			$vIngreso[$clase] += $rs->fields[6];
			$EEA = $EEA + ($rs->fields[7]*$rs->fields[5]);
			$EEA_i = $EEA_i + ($rs->fields[8]);
			
		}elseif($rs->fields[2] =="C"){ 
				if($rs->fields[7]>0){
				$clase = "C9";
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				
					$EEC = $EEC + ($rs->fields[7]*$rs->fields[5]);
					$EEC_i = $EEC_i+ ($rs->fields[8]);
					
				}else{
				$clase = $rs->fields[1];
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				
					$EEC = $EEC + ($rs->fields[7]*$rs->fields[5]);
					$EEC_i = $EEC_i + ($rs->fields[8]);
					
				}
			
			}elseif($rs->fields[2] ==""){ 
			}else{
			$clase = $rs->fields[1];
			$vAforo[$clase] += $rs->fields[5];
			$vIngreso[$clase] += $rs->fields[6];
			
				$EEA = $EEA + ($rs->fields[7]*$rs->fields[5]);
				$EEA_i = $EEA_i+($rs->fields[8]);
			
			}
	
			
		$rs->MoveNext();
	}
    $rs->Close();
}
if($modooperacion=="EAP"){
$check_sql = "SELECT VehiculoID_EAP, ClaseVehiculo_EAP, SUBSTR(ClaseVehiculo_EAP,1,1), SUBSTR(VehiculoID_EAP,4,1), CantidadEje_EAP,count(*), SUM(Importe_EAP), CantidadEje_EAP, SUM(TarifaEE_EAP), PagoID FROM aforo 
WHERE  $sql_where
GROUP BY VehiculoID_EAP";
	}else{
$check_sql = "SELECT VehiculoID_ECT, ClaseVehiculo_ECT, SUBSTR(ClaseVehiculo_ECT,1,1), SUBSTR(VehiculoID_ECT,4,1), CantidadEje_ECT,count(*), SUM(Importe_ECT), CantidadEje_ECT, SUM(TarifaEE_ECT), PagoID FROM aforo 
WHERE  $sql_where
GROUP BY VehiculoID_ECT";
}
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
	}else{
	while(!$rs->EOF){
		if($rs->fields[2] =="A" || $rs->fields[2]=="M"){
			$clase = $rs->fields[2];
			$vAforo[$clase] -= $rs->fields[5];
			$vIngreso[$clase] -= $rs->fields[6];
			$EEA -=  ($rs->fields[7]*$rs->fields[5]);
			$EEA_i -= ($rs->fields[8]);

		}elseif($rs->fields[2] =="C"){
				if($rs->fields[7]>0){
				$clase = "C9";
				$vAforo[$clase] -= $rs->fields[5];
				$vIngreso[$clase] -= $rs->fields[6];
				
					$EEC -=  ($rs->fields[7]*$rs->fields[5]);
					$EEC_i -=  ($rs->fields[8]);
					
				}else{
				$clase = $rs->fields[1];
				$vAforo[$clase] -= $rs->fields[5];
				$vIngreso[$clase] -= $rs->fields[6];
				
					$EEC -=  ($rs->fields[7]*$rs->fields[5]);
					$EEC_i -= ($rs->fields[8]);
				}
			
			}elseif($rs->fields[2] ==""){
			
			}
			else{
			$clase = $rs->fields[1];
			$vAforo[$clase] -= $rs->fields[5];
			$vIngreso[$clase] -= $rs->fields[6];
			
				$EEA -= ($rs->fields[7]*$rs->fields[5]);
				$EEA_i -= ($rs->fields[8]);
			
			}
	
			
		$rs->MoveNext();
	}
    $rs->Close();
}

$fila_a =  "
		<tr>
		<td width='14.5%'><b>Aforo</b></td>
		<td width='4.5%'>".$vAforo['A']."</td>
		<td width='4.5%'>".$vAforo['M']."</td>
		<td width='4.5%'>".$vAforo['B2']."</td>
		<td width='4.5%'>".$vAforo['B3']."</td>
		<td width='4.5%'>".$vAforo['B4']."</td>
		<td width='4.5%'>".$vAforo['C2']."</td>
		<td width='4.5%'>".$vAforo['C3']."</td>
		<td width='4.5%'>".$vAforo['C4']."</td>
		<td width='4.5%'>".$vAforo['C5']."</td>
		<td width='4.5%'>".$vAforo['C6']."</td>
		<td width='4.5%'>".$vAforo['C7']."</td>
		<td width='4.5%'>".$vAforo['C8']."</td>
		<td width='4.5%'>".$vAforo['C9']."</td>
		<td width='4.5%'>$EEA</td>
		<td width='4.5%'>$EEC</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'>".array_sum($vAforo)."</td>
		<td width='4.5%'></td>
		<td width='7%'></td>
	</tr>";
$fila_i =  "
		<tr>
		<td width='14.5%'><b>Ingreso</b></td>
		<td width='4.5%'>".$vIngreso['A']."</td>
		<td width='4.5%'>".$vIngreso['M']."</td>
		<td width='4.5%'>".$vIngreso['B2']."</td>
		<td width='4.5%'>".$vIngreso['B3']."</td>
		<td width='4.5%'>".$vIngreso['B4']."</td>
		<td width='4.5%'>".$vIngreso['C2']."</td>
		<td width='4.5%'>".$vIngreso['C3']."</td>
		<td width='4.5%'>".$vIngreso['C4']."</td>
		<td width='4.5%'>".$vIngreso['C5']."</td>
		<td width='4.5%'>".$vIngreso['C6']."</td>
		<td width='4.5%'>".$vIngreso['C7']."</td>
		<td width='4.5%'>".$vIngreso['C8']."</td>
		<td width='4.5%'>".$vIngreso['C9']."</td>
		<td width='4.5%'>$EEA_i</td>
		<td width='4.5%'>$EEC_i</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'></td>
		<td width='4.5%'>".number_format((array_sum($vIngreso)+$EEA_i+$EEC_i),2)."</td>
		<td width='7%'></td>
	</tr>";
return array($fila_a,$fila_i);
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function aforoECT($pago, $titulo, $sql_where, $modooperacion)
{
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
  
$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;
if($modooperacion=="EAP"){
$check_sql = "SELECT VehiculoID_EAP, ClaseVehiculo_EAP, SUBSTR(ClaseVehiculo_EAP,1,1), SUBSTR(VehiculoID_EAP,4,1), CantidadEje_EAP,count(*), SUM(Importe_EAP), CantidadEje_EAP, SUM(TarifaEE_EAP), PagoID FROM aforo 
WHERE $pago $sql_where
GROUP BY VehiculoID_EAP";
	}else{
$check_sql = "SELECT VehiculoID_ECT, ClaseVehiculo_ECT, SUBSTR(ClaseVehiculo_ECT,1,1), SUBSTR(VehiculoID_ECT,4,1), CantidadEje_ECT,count(*), SUM(Importe_ECT), CantidadEje_ECT, SUM(TarifaEE_ECT), PagoID FROM aforo 
WHERE $pago $sql_where
GROUP BY VehiculoID_ECT";
}
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
	}else{
	while(!$rs->EOF){
		if($rs->fields[2] =="A" || $rs->fields[2]=="M"){
			$clase = $rs->fields[2];
			$vAforo[$clase] += $rs->fields[5];
			$vIngreso[$clase] += $rs->fields[6];
			$EEA = $EEA + ($rs->fields[7]*$rs->fields[5]);
			$EEA_i = $EEA_i + ($rs->fields[8]);

		}elseif($rs->fields[2] =="C"){
				if($rs->fields[7]>0){
				$clase = "C9";
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				
					$EEC = $EEC + ($rs->fields[7]*$rs->fields[5]);
					$EEC_i = $EEC_i+ ($rs->fields[8]);
					
				}else{
				$clase = $rs->fields[1];
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				
					$EEC = $EEC + ($rs->fields[7]*$rs->fields[5]);
					$EEC_i = $EEC_i + ($rs->fields[8]);
				}
			
			}elseif($rs->fields[2] ==""){
			
			}
			else{
			$clase = $rs->fields[1];
			$vAforo[$clase] += $rs->fields[5];
			$vIngreso[$clase] += $rs->fields[6];
			
				$EEA = $EEA + ($rs->fields[7]*$rs->fields[5]);
				$EEA_i = $EEA_i+($rs->fields[8]);
			
			}
	
			
		$rs->MoveNext();
	}
    $rs->Close();
}
$fila_a =  "
		<tr>
		<td width='14.5%'>$titulo Aforo</td>
		<td width='4.5%'>".$vAforo['A']."</td>
		<td width='4.5%'>".$vAforo['M']."</td>
		<td width='4.5%'>".$vAforo['B2']."</td>
		<td width='4.5%'>".$vAforo['B3']."</td>
		<td width='4.5%'>".$vAforo['B4']."</td>
		<td width='4.5%'>".$vAforo['C2']."</td>
		<td width='4.5%'>".$vAforo['C3']."</td>
		<td width='4.5%'>".$vAforo['C4']."</td>
		<td width='4.5%'>".$vAforo['C5']."</td>
		<td width='4.5%'>".$vAforo['C6']."</td>
		<td width='4.5%'>".$vAforo['C7']."</td>
		<td width='4.5%'>".$vAforo['C8']."</td>
		<td width='4.5%'>".$vAforo['C9']."</td>
		<td width='4.5%'>$EEA</td>
		<td width='4.5%'>$EEC</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'><b>".array_sum($vAforo)."</b></td>
		<td width='4.5%'></td>
		<td width='7%'></td>
	</tr>";
$fila_i =  "
		<tr>
		<td width='14.5%'>$titulo Ingreso</td>
		<td width='4.5%'>".$vIngreso['A']."</td>
		<td width='4.5%'>".$vIngreso['M']."</td>
		<td width='4.5%'>".$vIngreso['B2']."</td>
		<td width='4.5%'>".$vIngreso['B3']."</td>
		<td width='4.5%'>".$vIngreso['B4']."</td>
		<td width='4.5%'>".$vIngreso['C2']."</td>
		<td width='4.5%'>".$vIngreso['C3']."</td>
		<td width='4.5%'>".$vIngreso['C4']."</td>
		<td width='4.5%'>".$vIngreso['C5']."</td>
		<td width='4.5%'>".$vIngreso['C6']."</td>
		<td width='4.5%'>".$vIngreso['C7']."</td>
		<td width='4.5%'>".$vIngreso['C8']."</td>
		<td width='4.5%'>".$vIngreso['C9']."</td>
		<td width='4.5%'>$EEA_i</td>
		<td width='4.5%'>$EEC_i</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'></td>
		<td width='4.5%'><b>".number_format((array_sum($vIngreso)+$EEA_i+$EEC_i),2)."</b></td>
		<td width='7%'></td>
	</tr>";
return array($fila_a,$fila_i);
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function armamatriz()
{
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
  
$vVehiculo = array("A","M","B2","B3","B4","C2","C3","C4","C5","C6","C7","C8","C9","EEA","EEC");
$vUsuario  = array();

$check_sql = "select distinct(TipoPagoID) from categoriatipopago";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
} else {
  	$i = 0;
	while(!$rs->EOF)
    {
		$vUsuario[$i] = $rs->fields[0];
		$i++;
		$rs->MoveNext();
    }
    $rs->Close();
}

$vTurnos   = array("1","2","3");
$nTurno    = array("Nocturno","Matutino","Vespertino");
$rango_v = count($vVehiculo);
$rango_u = count($vUsuario);
$rango_t = count($vTurnos);
for($m=0;$m<$rango_u;$m++){
	$pago = $vUsuario[$m];
	for($k=0;$k<2;$k++){
		for($i=0; $i<$rango_v; $i++) {
			$tipo = $vVehiculo[$i];			
   			$matriz[$pago][$k][$tipo] = 0;						
		}
	}
}

$check_sql = "SELECT VehiculoID_CR, ClaseVehiculo_CR, SUBSTR(ClaseVehiculo_CR,1,1), SUBSTR(VehiculoID_CR,4,1), 
CantidadEje_CR, count(*), SUM(Importe_CR), CantidadEje_CR, SUM(TarifaEE_CR), PagoID, c.CategoriaID, o.Orden 
FROM aforo a 
left join categoriatipopago c ON a.PagoID = c.TipoPagoID
left join categoria o on c.CategoriaID = o.CategoriaID
where a.FechaOperacion = '2019-09-20' 
Group by PagoID, VehiculoID_CR
Order by o.Orden";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs )     
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
} else {
   while(!$rs->EOF)
    {
	   $pago = $rs->fields[9];
	   
	   if($rs->fields[2] =="A" || $rs->fields[2]=="M"){
			$clase = $rs->fields[2];
			$matriz[$pago][0][$clase] += $rs->fields[5];
			$matriz[$pago][1][$clase]  += $rs->fields[6];
			$matriz[$pago][0]['EEA'] = ($rs->fields[7]*$rs->fields[5]);
			$matriz[$pago][1]['EEA']  = ($rs->fields[8]);
		}elseif($rs->fields[2] =="C"){ 
				if($rs->fields[7]>0){
				$clase = "C9";
				$matriz[$pago][0][$clase] += $rs->fields[5];
				$matriz[$pago][1][$clase]  += $rs->fields[6];
				
					$matriz[$pago][0]['EEC']  = ($rs->fields[7]*$rs->fields[5]);
					$matriz[$pago][1]['EEC'] = ($rs->fields[8]);
					
				}else{
				$clase = $rs->fields[1];
				$matriz[$pago][0][$clase]  += $rs->fields[5];
				$matriz[$pago][1][$clase] += $rs->fields[6];
				
					$matriz[$pago][0]['EEC'] = ($rs->fields[7]*$rs->fields[5]);
					$matriz[$pago][1]['EEC'] = ($rs->fields[8]);
					
				}
				}elseif($rs->fields[2] ==""){
			}
			else{
			$clase = $rs->fields[1];
			$matriz[$pago][0][$clase] += $rs->fields[5];
			$matriz[$pago][1][$clase] += $rs->fields[6];
				$matriz[$pago][0]['EEA'] = ($rs->fields[7]*$rs->fields[5]);
				$matriz[$pago][1]['EEA'] = ($rs->fields[8]);
			}
		$rs->MoveNext();
    }
    $rs->Close();
}




return($matriz);
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function crea_tr($array_fuente, $titulo)
{
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
  
$fila_n =  "
		<tr>
		<th width='14.5%'>$titulo</th>
		<th width='4.5%'>".$array_fuente['T01A']."</th>
		<th width='4.5%'>".$array_fuente['T01M']."</th>
		<th width='4.5%'>".$array_fuente['T02B']."</th>
		<th width='4.5%'>".$array_fuente['T03B']."</th>
		<th width='4.5%'>".$array_fuente['T04B']."</th>
		<th width='4.5%'>".$array_fuente['T02C']."</th>
		<th width='4.5%'>".$array_fuente['T03C']."</th>
		<th width='4.5%'>".$array_fuente['T04C']."</th>
		<th width='4.5%'>".$array_fuente['T05C']."</th>
		<th width='4.5%'>".$array_fuente['T06C']."</th>
		<th width='4.5%'>".$array_fuente['T07C']."</th>
		<th width='4.5%'>".$array_fuente['T08C']."</th>
		<th width='4.5%'>".$array_fuente['T09C']."</th>
		<th width='4.5%'>".$array_fuente['EEA']."</th>
		<th width='4.5%'>".$array_fuente['EEC']."</th>
		<th width='2%'>&nbsp;</th>
		<th width='4.5%'></th>
		<th width='4.5%'></th>
		<th width='7%'></th>
	</tr>";
return $fila_n;

$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function diferencia($fin, $ini)
{
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
  
if($fin == 0 && $ini ==0){
	$diferencia = 0;
	}else{
	$diferencia = $fin - $ini + 1;
}
return $diferencia;

$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function saca_aforo($pago, $titulo, $sql_where)
{
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
  
$vAforo = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$vIngreso = array("A"=>0,"M"=>0,"B2"=>0,"B3"=>0,"B4"=>0,"C2"=>0,"C3"=>0,"C4"=>0,"C5"=>0,"C6"=>0,"C7"=>0,"C8"=>0,"C9"=>0,"EEA"=>0,"EEC"=>0);
$EEA=0;
$EEC=0;
$EEA_i=0;
$EEC_i=0;

$check_sql = "SELECT VehiculoID_CR, ClaseVehiculo_CR, SUBSTR(ClaseVehiculo_CR,1,1), SUBSTR(VehiculoID_CR,4,1), CantidadEje_CR,count(*), SUM(Importe_CR), CantidadEje_CR, SUM(TarifaEE_CR), PagoID FROM aforo 
WHERE $pago $sql_where
GROUP BY VehiculoID_CR";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 

if (false == $rs ){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Error while accessing database.';
;
	}else{
	while(!$rs->EOF){

		if($rs->fields[2] =="A" || $rs->fields[2]=="M"){
			$clase = $rs->fields[2];
			$vAforo[$clase] += $rs->fields[5];
			$vIngreso[$clase] += $rs->fields[6];
			$EEA = $EEA + ($rs->fields[7]*$rs->fields[5]);
			$EEA_i = $EEA_i + ($rs->fields[8]);
		}elseif($rs->fields[2] =="C"){ 
				if($rs->fields[7]>0){
				$clase = "C9";
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				
					$EEC = $EEC + ($rs->fields[7]*$rs->fields[5]);
					$EEC_i = $EEC_i+ ($rs->fields[8]);
					
				}else{
				$clase = $rs->fields[1];
				$vAforo[$clase] += $rs->fields[5];
				$vIngreso[$clase] += $rs->fields[6];
				
					$EEC = $EEC + ($rs->fields[7]*$rs->fields[5]);
					$EEC_i = $EEC_i + ($rs->fields[8]);
					
				}
			
			}elseif($rs->fields[2] ==""){
			}
			else{
			$clase = $rs->fields[1];
			$vAforo[$clase] += $rs->fields[5];
			$vIngreso[$clase] += $rs->fields[6];
			
				$EEA = $EEA + ($rs->fields[7]*$rs->fields[5]);
				$EEA_i = $EEA_i+($rs->fields[8]);
			
			}
	
			
		$rs->MoveNext();
	}
    $rs->Close();
}
		 
$fila_a =  "
		<tr>
		<td width='14.5%'>$titulo Aforo</td>
		<td width='4.5%'>".$vAforo['A']."</td>
		<td width='4.5%'>".$vAforo['M']."</td>
		<td width='4.5%'>".$vAforo['B2']."</td>
		<td width='4.5%'>".$vAforo['B3']."</td>
		<td width='4.5%'>".$vAforo['B4']."</td>
		<td width='4.5%'>".$vAforo['C2']."</td>
		<td width='4.5%'>".$vAforo['C3']."</td>
		<td width='4.5%'>".$vAforo['C4']."</td>
		<td width='4.5%'>".$vAforo['C5']."</td>
		<td width='4.5%'>".$vAforo['C6']."</td>
		<td width='4.5%'>".$vAforo['C7']."</td>
		<td width='4.5%'>".$vAforo['C8']."</td>
		<td width='4.5%'>".$vAforo['C9']."</td>
		<td width='4.5%'>$EEA</td>
		<td width='4.5%'>$EEC</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'><b>".array_sum($vAforo)."</b></td>
		<td width='4.5%'></td>
		<td width='7%'></td>
	</tr>";
$fila_i =  "
		<tr>
		<td width='14.5%'>$titulo Ingreso</td>
		<td width='4.5%'>".$vIngreso['A']."</td>
		<td width='4.5%'>".$vIngreso['M']."</td>
		<td width='4.5%'>".$vIngreso['B2']."</td>
		<td width='4.5%'>".$vIngreso['B3']."</td>
		<td width='4.5%'>".$vIngreso['B4']."</td>
		<td width='4.5%'>".$vIngreso['C2']."</td>
		<td width='4.5%'>".$vIngreso['C3']."</td>
		<td width='4.5%'>".$vIngreso['C4']."</td>
		<td width='4.5%'>".$vIngreso['C5']."</td>
		<td width='4.5%'>".$vIngreso['C6']."</td>
		<td width='4.5%'>".$vIngreso['C7']."</td>
		<td width='4.5%'>".$vIngreso['C8']."</td>
		<td width='4.5%'>".$vIngreso['C9']."</td>
		<td width='4.5%'>$EEA_i</td>
		<td width='4.5%'>$EEC_i</td>
		<td width='2%'>&nbsp;</td>
		<td width='4.5%'></td>
		<td width='4.5%'><b>".number_format((array_sum($vIngreso)+$EEA_i+$EEC_i),2)."</b></td>
		<td width='7%'></td>
	</tr>";
return array($fila_a,$fila_i);
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function rv_logAcceso ($accion, $key) {
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
if (!isset($_SESSION['sm_global_login'])) {$_SESSION['sm_global_login'] = "";}
if (!isset($this->sc_temp_sm_global_login)) {$this->sc_temp_sm_global_login = (isset($_SESSION['sm_global_login'])) ? $_SESSION['sm_global_login'] : "";}
   
$aplicacion = $this->Ini->nm_cod_apl; 
$tablaLog = $this->Ini->nm_tabela; 
$fechaLog = date('Y-m-d H:i:s');  
$loginLog = $this->sc_temp_sm_global_login; 
$ipLog = $_SERVER['REMOTE_ADDR'];  

     $nm_select = "INSERT INTO sec_application_logs (Application_Name, Date_Time, Login, Ip_User, Action_Held, tabla, llave)                VALUES ('$aplicacion', '$fechaLog', '$loginLog', '$ipLog', '$accion', '$tablaLog', '$key')"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      
if (isset($this->sc_temp_sm_global_login)) {$_SESSION['sm_global_login'] = $this->sc_temp_sm_global_login;}
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function rv_revisaBotones() {
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
if (!isset($_SESSION['sm_nivel'])) {$_SESSION['sm_nivel'] = "";}
if (!isset($this->sc_temp_sm_nivel)) {$this->sc_temp_sm_nivel = (isset($_SESSION['sm_nivel'])) ? $_SESSION['sm_nivel'] : "";}
   
$parm = (strpos($this->sc_temp_sm_nivel, '1') === false ? 'off' : 'on'); $this->nmgp_botoes["filter"] = "$parm";; 
$parm = (strpos($this->sc_temp_sm_nivel, '2') === false ? 'off' : 'on'); $this->nmgp_botoes["sel_col"] = "$parm";; 
$parm = (strpos($this->sc_temp_sm_nivel, '3') === false ? 'off' : 'on'); $this->nmgp_botoes["sort_col"] = "$parm";; 
$parm = (strpos($this->sc_temp_sm_nivel, '4') === false ? 'off' : 'on'); $this->nmgp_botoes["pdf"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '5') === false ? 'off' : 'on'); $this->nmgp_botoes["word"] = "$parm";;     
 $parm = (strpos($this->sc_temp_sm_nivel, '6') === false ? 'off' : 'on'); $this->nmgp_botoes["xls"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '7') === false ? 'off' : 'on'); $this->nmgp_botoes["xml"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '8') === false ? 'off' : 'on'); $this->nmgp_botoes["csv"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, '9') === false ? 'off' : 'on'); $this->nmgp_botoes["rtf"] = "$parm";; 
 $parm = (strpos($this->sc_temp_sm_nivel, 'P') === false ? 'off' : 'on'); $this->nmgp_botoes["print"] = "$parm";;
if (isset($this->sc_temp_sm_nivel)) {$_SESSION['sm_nivel'] = $this->sc_temp_sm_nivel;}
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function leeConfig($ident, $clasif, &$obj = NULL) {
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
   
 $sql = "select params from sec_configura where identidad = '$ident' and clasifica = '$clasif'"; 
  
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 
 
 if (isset($rs[0][0])){ 
    $ruta = $rs[0][0];   
}else{ 
    $ruta = 'ERROR: No está registrada la identificación: '.$ident.', clasificación: '.$clasif.'<br />';   
} 
 if (is_object($obj)) { 
    $_SESSION['sc_session'][$obj->Ini->sc_page][$obj->Ini->nm_cod_apl]['path_doc'] = $obj->Ini->path_doc = $ruta; 
 } else return $ruta;
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
function guardaIdAplicacion() {
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'on';
if (!isset($_SESSION['idmodulo'])) {$_SESSION['idmodulo'] = "";}
if (!isset($this->sc_temp_idmodulo)) {$this->sc_temp_idmodulo = (isset($_SESSION['idmodulo'])) ? $_SESSION['idmodulo'] : "";}
if (!isset($_SESSION['aplicacion_origen'])) {$_SESSION['aplicacion_origen'] = "";}
if (!isset($this->sc_temp_aplicacion_origen)) {$this->sc_temp_aplicacion_origen = (isset($_SESSION['aplicacion_origen'])) ? $_SESSION['aplicacion_origen'] : "";}
   
 $this->sc_temp_aplicacion_origen = substr(10000+$this->sc_temp_idmodulo, 2).$this->Ini->nm_cod_apl; 
 
if (isset($this->sc_temp_aplicacion_origen)) {$_SESSION['aplicacion_origen'] = $this->sc_temp_aplicacion_origen;}
if (isset($this->sc_temp_idmodulo)) {$_SESSION['idmodulo'] = $this->sc_temp_idmodulo;}
$_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
}
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('BackOffice_Acapulco');
   $_SESSION['scriptcase']['PreLiqPDF_new']['contr_erro'] = 'off';
   $Sc_lig_md5 = false;
   $Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
   $_SESSION['scriptcase']['sem_session'] = false;
   if (!empty($_POST))
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
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                     $Sc_lig_md5 = true;
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
            }
            nm_limpa_str_PreLiqPDF_new($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
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
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                     $Sc_lig_md5 = true;
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
            }
            nm_limpa_str_PreLiqPDF_new($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($nmgp_start) ))
   {
       $Sem_Session = false;
   }
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
       elseif (is_file($root . $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imag_temp'] . "/sc_apl_default_BackOffice_Acapulco.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['PreLiqPDF_new']['glo_nm_path_imag_temp'] . "/sc_apl_default_BackOffice_Acapulco.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "PreLiqPDF_new") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_BackOffice_Acapulco'])) {
               $_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_BackOffice_Acapulco'];
           }
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($_POST["caseta"])) 
   {
       $_SESSION["caseta"] = $_POST["caseta"];
       nm_limpa_str_PreLiqPDF_new($_SESSION["caseta"]);
   }
   if (isset($_GET["caseta"])) 
   {
       $_SESSION["caseta"] = $_GET["caseta"];
       nm_limpa_str_PreLiqPDF_new($_SESSION["caseta"]);
   }
   if (!isset($_SESSION["caseta"])) 
   {
       $_SESSION["caseta"] = "";
   }
   if (isset($_POST["turno"])) 
   {
       $_SESSION["turno"] = $_POST["turno"];
       nm_limpa_str_PreLiqPDF_new($_SESSION["turno"]);
   }
   if (isset($_GET["turno"])) 
   {
       $_SESSION["turno"] = $_GET["turno"];
       nm_limpa_str_PreLiqPDF_new($_SESSION["turno"]);
   }
   if (!isset($_SESSION["turno"])) 
   {
       $_SESSION["turno"] = "";
   }
   if (isset($_POST["carril"])) 
   {
       $_SESSION["carril"] = $_POST["carril"];
       nm_limpa_str_PreLiqPDF_new($_SESSION["carril"]);
   }
   if (isset($_GET["carril"])) 
   {
       $_SESSION["carril"] = $_GET["carril"];
       nm_limpa_str_PreLiqPDF_new($_SESSION["carril"]);
   }
   if (!isset($_SESSION["carril"])) 
   {
       $_SESSION["carril"] = "";
   }
   if (isset($_POST["fecha_op"])) 
   {
       $_SESSION["fecha_op"] = $_POST["fecha_op"];
       nm_limpa_str_PreLiqPDF_new($_SESSION["fecha_op"]);
   }
   if (isset($_GET["fecha_op"])) 
   {
       $_SESSION["fecha_op"] = $_GET["fecha_op"];
       nm_limpa_str_PreLiqPDF_new($_SESSION["fecha_op"]);
   }
   if (!isset($_SESSION["fecha_op"])) 
   {
       $_SESSION["fecha_op"] = "";
   }
   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['iframe_menu']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "PreLiqPDF_new";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'PreLiqPDF_new' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('PreLiqPDF_new' == $sReferer || 'PreLiqPDF_new_' == substr($sReferer, 0, 14))
       {
           $_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
   if (isset($_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['lang'])) {
       $STR_lang = $_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['lang'];
   }
     $STR_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "rhino_tkz/rhino_tkz";
   $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
   $Nm_lang = array();
   if (is_file($NM_arq_lang))
   {
       $Lixo = file($NM_arq_lang);
       foreach ($Lixo as $Cada_lin) 
       {
           if (strpos($Cada_lin, "array()") === false && (trim($Cada_lin) != "<?php")  && (trim($Cada_lin) != "?" . ">"))
           {
               eval (str_replace("\$this->", "\$", $Cada_lin));
           }
       }
   }
   $_SESSION['scriptcase']['charset'] = "UTF-8";
   ini_set('default_charset', $_SESSION['scriptcase']['charset']);
   foreach ($Nm_lang as $ind => $dados)
   {
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
      {
          $Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   }
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'PreLiqPDF_new')
   {
       $_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/PreLiqPDF_new_erro.php");
   }
   if (!empty($nmgp_parms)) 
   { 
       $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
       $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
       $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
       $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
       $todo  = explode("?@?", $todox);
       $ix = 0;
       while (!empty($todo[$ix]))
       {
            $cadapar = explode("?#?", $todo[$ix]);
            if (1 < sizeof($cadapar))
            {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                nm_limpa_str_PreLiqPDF_new($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
       if (isset($caseta)) 
       {
           $_SESSION['caseta'] = $caseta;
           nm_limpa_str_PreLiqPDF_new($_SESSION["caseta"]);
       }
       if (isset($turno)) 
       {
           $_SESSION['turno'] = $turno;
           nm_limpa_str_PreLiqPDF_new($_SESSION["turno"]);
       }
       if (isset($carril)) 
       {
           $_SESSION['carril'] = $carril;
           nm_limpa_str_PreLiqPDF_new($_SESSION["carril"]);
       }
       if (isset($fecha_op)) 
       {
           $_SESSION['fecha_op'] = $fecha_op;
           nm_limpa_str_PreLiqPDF_new($_SESSION["fecha_op"]);
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
       { 
           $_SESSION['scriptcase']['sc_apl_seg']['PreLiqPDF_new'] = "on";
       } 
       if (!$_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['opc_psq'] && !isset($_SESSION['scriptcase']['PreLiqPDF_new']['session_timeout']['redir'])) 
       { 
          if (!isset($_SESSION['scriptcase']['sc_apl_seg']['PreLiqPDF_new']) || $_SESSION['scriptcase']['sc_apl_seg']['PreLiqPDF_new'] != "on")
          { 
              $NM_Mens_Erro = $Nm_lang['lang_errm_unth_user'];
              $nm_botao_ok = ($_SESSION['sc_session'][$script_case_init]['PreLiqPDF_new']['iframe_menu']) ? false : true;
              if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
              {
                  foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
                  {
                      if (in_array("PreLiqPDF_new", $apls_aba))
                      {
                          $nm_botao_ok = false;
                           break;
                      }
                  }
              }
              $str_schema_app = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "rhino_tkz/rhino_tkz";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
              <HTML>
               <HEAD>
                <TITLE></TITLE>
               <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
              if ($_SESSION['scriptcase']['proc_mobile'])
              {
?>
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
              }
?>
                <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>                <META http-equiv="Pragma" content="no-cache"/>
                <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
                <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_app ?>_grid.css" /> 
                <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_app ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
               </HEAD>
               <body>
                <table align="center" class="scGridBorder"><tr><td style="padding: 0">
                <table style="width: 100%" class="scGridTabela"><tr class="scGridFieldOdd"><td class="scGridFieldOddFont" style="padding: 15px 30px; text-align: center">
                 <?php echo $NM_Mens_Erro; ?>
<?php
              if ($nm_botao_ok)
              {
?>
                <br />
                <form name="Fseg" method="post" 
                                    action="<?php echo $nm_url_saida; ?>" 
                                    target="_self"> 
                 <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($script_case_init) ?>"/> 
                 <input type="submit" name="sc_sai_seg" value="OK"> 
                </form> 
<?php
              }
?>
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
    <?php echo $Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
              }
?>
               </body>
              </HTML>
<?php
              exit;
          } 
       } 
   $contr_PreLiqPDF_new = new PreLiqPDF_new_apl();
   $contr_PreLiqPDF_new->controle();
//
   function nm_limpa_str_PreLiqPDF_new(&$str)
   {
   }
?>
