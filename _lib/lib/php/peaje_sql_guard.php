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

if (!function_exists('peaje_sql_datetime_parts')) {
    function peaje_sql_datetime_parts($value)
    {
        $value = trim((string) $value);

        if (preg_match('/^([0-9]{4}-[0-9]{2}-[0-9]{2})[ T]([0-9]{2}:[0-9]{2}(?::[0-9]{2})?)/', $value, $matches)) {
            $time = $matches[2];
            if (strlen($time) === 5) {
                $time .= ':00';
            }

            return array($matches[1], $time);
        }

        return false;
    }
}

if (!function_exists('peaje_sql_datetime_condition')) {
    function peaje_sql_datetime_condition($db, $dateColumn, $timeColumn, $operator, $dateTime)
    {
        $operator = trim((string) $operator);
        $parts = peaje_sql_datetime_parts($dateTime);

        if ($parts === false) {
            return "CONCAT(" . $dateColumn . ",' '," . $timeColumn . ") " . $operator . " " . peaje_sql_qstr($db, $dateTime);
        }

        $dateSql = peaje_sql_qstr($db, $parts[0]);
        $timeSql = peaje_sql_qstr($db, $parts[1]);

        if ($operator === '=') {
            return "(" . $dateColumn . " = " . $dateSql . " AND " . $timeColumn . " = " . $timeSql . ")";
        }

        if ($operator === '>=') {
            return "(" . $dateColumn . " > " . $dateSql . " OR (" . $dateColumn . " = " . $dateSql . " AND " . $timeColumn . " >= " . $timeSql . "))";
        }

        if ($operator === '<=') {
            return "(" . $dateColumn . " < " . $dateSql . " OR (" . $dateColumn . " = " . $dateSql . " AND " . $timeColumn . " <= " . $timeSql . "))";
        }

        return "CONCAT(" . $dateColumn . ",' '," . $timeColumn . ") " . $operator . " " . peaje_sql_qstr($db, $dateTime);
    }
}

if (!function_exists('peaje_sql_datetime_between_condition')) {
    function peaje_sql_datetime_between_condition($db, $dateColumn, $timeColumn, $startDateTime, $endDateTime)
    {
        return "("
            . peaje_sql_datetime_condition($db, $dateColumn, $timeColumn, '>=', $startDateTime)
            . " AND "
            . peaje_sql_datetime_condition($db, $dateColumn, $timeColumn, '<=', $endDateTime)
            . ")";
    }
}

if (!function_exists('peaje_detalleturno_periodo_where')) {
    function peaje_detalleturno_periodo_where($db, $casetaId, $fechaOperacion, $turnoId, $carrilId, $cuerpo, $operacionId, $fechaHoraInicio, $fechaHoraFin)
    {
        return "CasetaID = " . peaje_sql_int($casetaId, '0')
            . " AND FechaOperacion = " . peaje_sql_qstr($db, $fechaOperacion)
            . " AND TurnoID = " . peaje_sql_int($turnoId, '0')
            . " AND CarrilID = " . peaje_sql_int($carrilId, '0')
            . " AND Cuerpo = " . peaje_sql_qstr($db, $cuerpo)
            . " AND OperacionID = " . peaje_sql_int($operacionId, '0')
            . " AND " . peaje_sql_datetime_condition($db, 'FechaOperacion', 'HoraInicio', '=', $fechaHoraInicio)
            . " AND " . peaje_sql_datetime_condition($db, 'FechaOperacion', 'HoraFin', '=', $fechaHoraFin);
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

if (!function_exists('peaje_trafico_metricas_sql')) {
    function peaje_trafico_metricas_sql()
    {
        return "SUM(IF(ClaseVehiculo_ANA = 'A',1,0)) as a, "
            . "SUM(IF(ClaseVehiculo_ANA LIKE 'A_%' && CasetaID != 15,1,0)) as ar, "
            . "SUM(IF(ClaseVehiculo_ANA = 'M',1,0)) as m, "
            . "SUM(IF(ClaseVehiculo_ANA = 'B2',1,0)) as b2, "
            . "SUM(IF(ClaseVehiculo_ANA = 'B3',1,0)) as b3, "
            . "SUM(IF(ClaseVehiculo_ANA = 'B4',1,0)) as b4, "
            . "SUM(IF(ClaseVehiculo_ANA = 'C2',1,0)) as c2, "
            . "SUM(IF(ClaseVehiculo_ANA = 'C3',1,0)) as c3, "
            . "SUM(IF(ClaseVehiculo_ANA = 'C4',1,0)) as c4, "
            . "SUM(IF(ClaseVehiculo_ANA = 'C5',1,0)) as c5, "
            . "SUM(IF(ClaseVehiculo_ANA = 'C6',1,0)) as c6, "
            . "SUM(IF(ClaseVehiculo_ANA = 'C7',1,0)) as c7, "
            . "SUM(IF(ClaseVehiculo_ANA = 'C8',1,0)) as c8, "
            . "SUM(IF(ClaseVehiculo_ANA = 'C9' || ClaseVehiculo_ANA LIKE 'C__',1,0)) as c9, "
            . "SUM(IF(PagoID_ANA = 'EXE' || PagoID_ANA = 'VSC' || PagoID_ANA = 'RSP' && CasetaID != 15,1,0)) as exe, "
            . "SUM(IF(PagoID_ANA = 'ELU',1,0)) as elu";
    }
}

if (!function_exists('peaje_trafico_fecha_operacion_sql')) {
    function peaje_trafico_fecha_operacion_sql($databaseType, $basesSybase = array(), $basesMssql = array(), $basesInformix = array())
    {
        $databaseType = strtolower((string) $databaseType);

        if (in_array($databaseType, $basesSybase)) {
            return "str_replace (convert(char(10),FechaOperacion,102), '.', '-') + ' ' + convert(char(8),FechaOperacion,20)";
        }

        if (in_array($databaseType, $basesMssql)) {
            return "convert(char(23),FechaOperacion,121)";
        }

        if (in_array($databaseType, $basesInformix)) {
            return "EXTEND(FechaOperacion, YEAR TO DAY)";
        }

        return "FechaOperacion";
    }
}

if (!function_exists('peaje_trafico_select_sql')) {
    function peaje_trafico_select_sql($tableName, $databaseType, $basesSybase = array(), $basesMssql = array(), $basesInformix = array())
    {
        return "SELECT " . peaje_trafico_hora_sql()
            . " as hora, " . peaje_trafico_metricas_sql()
            . ", CasetaID, " . peaje_trafico_fecha_operacion_sql($databaseType, $basesSybase, $basesMssql, $basesInformix)
            . " from " . $tableName;
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

if (!function_exists('peaje_liquidacion_discrepancia_normalize_sql')) {
    function peaje_liquidacion_discrepancia_normalize_sql($value)
    {
        $value = strtoupper((string) $value);
        $modoOperacion = (strpos($value, 'VEHICULOID_EAP') !== false || trim($value) === 'EAP') ? 'EAP' : 'ECT';
        return peaje_liquidacion_discrepancia_sql($modoOperacion);
    }
}

if (!function_exists('peaje_carril_modo_operacion_sql')) {
    function peaje_carril_modo_operacion_sql($db, $casetaId, $carrilId)
    {
        return "SELECT ModoOperacion FROM carril WHERE CasetaID = " . peaje_sql_int($casetaId, '0')
            . " AND CarrilID = " . peaje_sql_int($carrilId, '0');
    }
}

if (!function_exists('peaje_carril_modo_operacion')) {
    function peaje_carril_modo_operacion($db, $casetaId, $carrilId, &$sql = null, &$error = null)
    {
        $sql = peaje_carril_modo_operacion_sql($db, $casetaId, $carrilId);
        $rows = peaje_db_fetch_all($db, $sql, $error);

        if ($rows !== false && !empty($rows) && isset($rows[0][0])) {
            return peaje_liquidacion_modo_operacion($rows[0][0]);
        }

        return 'ECT';
    }
}

if (!function_exists('peaje_detalleturno_dictamen_where_sql')) {
    function peaje_detalleturno_dictamen_where_sql($db, $casetaId, $fechaOperacion, $turnoId, $carrilId, $cuerpo, $operacionId, $fechaHoraInicio, $fechaHoraFin)
    {
        return " WHERE CasetaID = " . peaje_sql_int($casetaId, '0')
            . " AND FechaOperacion = " . peaje_sql_qstr($db, $fechaOperacion)
            . " AND TurnoID = " . peaje_sql_int($turnoId, '0')
            . " AND CarrilID = " . peaje_sql_int($carrilId, '0')
            . " AND Cuerpo = " . peaje_sql_qstr($db, $cuerpo)
            . " AND OperacionID = " . peaje_sql_qstr($db, $operacionId)
            . " AND " . peaje_sql_datetime_condition($db, 'FechaTurno', 'HoraInicio', '=', $fechaHoraInicio)
            . " AND " . peaje_sql_datetime_condition($db, 'FechaFin', 'HoraFin', '=', $fechaHoraFin);
    }
}

if (!function_exists('peaje_detalleturno_inicio_dictamen_select_sql')) {
    function peaje_detalleturno_inicio_dictamen_select_sql($db, $casetaId, $fechaOperacion, $turnoId, $carrilId, $cuerpo, $operacionId, $fechaHoraInicio, $fechaHoraFin)
    {
        return "SELECT FechaInicioDictamen FROM `detalleturno`"
            . peaje_detalleturno_dictamen_where_sql($db, $casetaId, $fechaOperacion, $turnoId, $carrilId, $cuerpo, $operacionId, $fechaHoraInicio, $fechaHoraFin);
    }
}

if (!function_exists('peaje_detalleturno_inicio_dictamen_update_sql')) {
    function peaje_detalleturno_inicio_dictamen_update_sql($db, $fechaHora, $casetaId, $fechaOperacion, $turnoId, $carrilId, $cuerpo, $operacionId, $fechaHoraInicio, $fechaHoraFin)
    {
        return "UPDATE detalleturno SET FechaInicioDictamen = " . peaje_sql_qstr($db, $fechaHora)
            . peaje_detalleturno_dictamen_where_sql($db, $casetaId, $fechaOperacion, $turnoId, $carrilId, $cuerpo, $operacionId, $fechaHoraInicio, $fechaHoraFin);
    }
}

if (!function_exists('peaje_detalleturno_fin_dictamen_update_sql')) {
    function peaje_detalleturno_fin_dictamen_update_sql($db, $fechaHora, $casetaId, $fechaOperacion, $turnoId, $carrilId, $cuerpo, $operacionId, $fechaHoraInicio, $fechaHoraFin)
    {
        return "UPDATE detalleturno SET FechaFinDictamen = " . peaje_sql_qstr($db, $fechaHora)
            . peaje_detalleturno_dictamen_where_sql($db, $casetaId, $fechaOperacion, $turnoId, $carrilId, $cuerpo, $operacionId, $fechaHoraInicio, $fechaHoraFin);
    }
}
