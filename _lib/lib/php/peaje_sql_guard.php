<?php

if (!function_exists('peaje_sql_qstr')) {
    function peaje_sql_qstr($db, $value)
    {
        $value = (string) $value;

        if ($db && method_exists($db, 'qstr')) {
            return $db->qstr($value);
        }

        return "'" . str_replace("'", "''", $value) . "'";
    }
}

if (!function_exists('peaje_sql_int')) {
    function peaje_sql_int($value, $default = '0')
    {
        $value = trim((string) $value);

        if ($value !== '' && preg_match('/^-?[0-9]+$/', $value)) {
            return (string) ((int) $value);
        }

        return $default;
    }
}

if (!function_exists('peaje_liquidacion_modo_operacion')) {
    function peaje_liquidacion_modo_operacion($value)
    {
        $value = strtoupper(trim((string) $value));
        return in_array($value, array('ECT', 'EAP'), true) ? $value : 'ECT';
    }
}

if (!function_exists('peaje_liquidacion_discrepancia_sql')) {
    function peaje_liquidacion_discrepancia_sql($modoOperacion)
    {
        $vehiculoModo = 'VehiculoID_' . peaje_liquidacion_modo_operacion($modoOperacion);

        return "IF(VehiculoID_CR <> " . $vehiculoModo
            . " AND CONCAT(" . $vehiculoModo . ", VehiculoID_CR) NOT IN "
            . "('T02CT02B','T03CT03B','T04CT04B','T02BT02C','T03BT03C','T04BT04C'), 1, 0)";
    }
}
