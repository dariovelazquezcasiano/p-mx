<?php

require_once dirname(__FILE__) . '/peaje_sql_guard.php';

if (!function_exists('peaje_config_value')) {
    function peaje_config_value($db, $ident, $clasif)
    {
        $sql = "select params from sec_configura where identidad = " . peaje_sql_qstr($db, $ident)
            . " and clasifica = " . peaje_sql_qstr($db, $clasif);
        $error = null;
        $rows = peaje_db_fetch_all($db, $sql, $error);

        if ($rows !== false && isset($rows[0][0])) {
            return $rows[0][0];
        }

        return 'ERROR: No esta registrada la identificacion: ' . $ident . ', clasificacion: ' . $clasif . '<br />';
    }
}

if (!function_exists('peaje_config_apply_path_doc')) {
    function peaje_config_apply_path_doc($ruta, $obj)
    {
        if (is_object($obj)) {
            $_SESSION['sc_session'][$obj->Ini->sc_page][$obj->Ini->nm_cod_apl]['path_doc'] = $obj->Ini->path_doc = $ruta;
        }
    }
}
