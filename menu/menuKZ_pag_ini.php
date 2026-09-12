<?php
 session_start();
 if (!isset($_SESSION['scriptcase']) || !is_array($_SESSION['scriptcase']))
 {
     $_SESSION['scriptcase'] = array();
 }
 if (!isset($_SESSION['scriptcase']['charset_html']) || empty($_SESSION['scriptcase']['charset_html']))
 {
     $_SESSION['scriptcase']['charset_html'] = 'utf-8';
 }
 if (!isset($_SESSION['scriptcase']['reg_conf']) || !is_array($_SESSION['scriptcase']['reg_conf']))
 {
     $_SESSION['scriptcase']['reg_conf'] = array();
 }
 if (!isset($_SESSION['scriptcase']['reg_conf']['css_dir']) || empty($_SESSION['scriptcase']['reg_conf']['css_dir']))
 {
     $_SESSION['scriptcase']['reg_conf']['css_dir'] = 'LTR';
 }
 $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "rhino_tkz/rhino_tkz";
 include("../_lib/css/" . $str_schema_all . "_menuH.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<HEAD>
 <TITLE></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
   <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
   <META http-equiv="Pragma" content="no-cache"/>
   <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
   <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH.css" /> 
   <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
   <link rel="stylesheet" type="text/css" href="peaje_menu.css?v=20260912-submenu-active" />
</HEAD>
<body class="peaje-menu-home" scroll="no">
<?php
include_once(dirname(__FILE__) . "/peaje_home.php");
peaje_home_render();
?>
</body>
</html>
