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

if (!function_exists('peaje_db_fetch_all')) {
    function peaje_db_fetch_all($db, $sql, &$error = null)
    {
        $error = null;
        $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sql;
        $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';

        if (!$db) {
            $error = 'Database connection is not available.';
            return false;
        }

        $rows = array();
        if ($rs = $db->Execute($sql)) {
            $rowIndex = 0;
            $fieldCount = $rs->FieldCount();
            while (!$rs->EOF) {
                for ($fieldIndex = 0; $fieldIndex < $fieldCount; $fieldIndex++) {
                    $rows[$rowIndex][$fieldIndex] = $rs->fields[$fieldIndex];
                }
                $rowIndex++;
                $rs->MoveNext();
            }
            $rs->Close();
            return $rows;
        }

        if (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1) {
            $error = $db->ErrorMsg();
        }

        return false;
    }
}

if (!function_exists('peaje_tarifa_sql')) {
    function peaje_tarifa_sql($db, $vehiculoId, $casetaId, $tipoPagoId, $fechaHora)
    {
        $fechaHoraSql = peaje_sql_qstr($db, $fechaHora);

        return "SELECT importe, ImporteEjeLigero, ImporteEjePesado "
            . "FROM tarifa "
            . "WHERE VehiculoID = " . peaje_sql_qstr($db, $vehiculoId)
            . " AND CasetaID = " . peaje_sql_int($casetaId, '0')
            . " AND TipoPagoID = " . peaje_sql_qstr($db, $tipoPagoId)
            . " AND (FechaInicio <= " . $fechaHoraSql . " AND FechaFin >= " . $fechaHoraSql . ")";
    }
}

if (!function_exists('peaje_tarifa_lookup')) {
    function peaje_tarifa_lookup($db, $vehiculoId, $casetaId, $tipoPagoId, $fechaHora, &$sql = null, &$error = null)
    {
        static $cache = array();

        $casetaId = peaje_sql_int($casetaId, '0');
        $cacheKey = implode('|', array((string) $vehiculoId, $casetaId, (string) $tipoPagoId, (string) $fechaHora));
        $sql = peaje_tarifa_sql($db, $vehiculoId, $casetaId, $tipoPagoId, $fechaHora);

        if (isset($cache[$cacheKey])) {
            $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sql;
            $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
            $error = null;
            return $cache[$cacheKey];
        }

        $rows = peaje_db_fetch_all($db, $sql, $error);
        if ($rows !== false) {
            $cache[$cacheKey] = $rows;
        }

        return $rows;
    }
}

if (!function_exists('peaje_trafico_hora_sql')) {
    function peaje_trafico_hora_sql()
    {
        return "IF(FechaOperacion != FechaTurno && TurnoID = 3, 23, HOUR(HoraEvento))";
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
    function peaje_liquidacion_discrepancia_sql($modoOperacion, $tablePrefix = '')
    {
        $tablePrefix = trim((string) $tablePrefix);
        $tablePrefix = $tablePrefix === '' ? '' : rtrim($tablePrefix, '.') . '.';
        $vehiculoModo = $tablePrefix . 'VehiculoID_' . peaje_liquidacion_modo_operacion($modoOperacion);
        $vehiculoCr = $tablePrefix . 'VehiculoID_CR';

        return "IF(" . $vehiculoCr . " <> " . $vehiculoModo
            . " AND CONCAT(" . $vehiculoModo . ", " . $vehiculoCr . ") NOT IN "
            . "('T02CT02B','T03CT03B','T04CT04B','T02BT02C','T03BT03C','T04BT04C'), 1, 0)";
    }
}
