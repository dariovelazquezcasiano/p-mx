<?php

require_once __DIR__ . '/peaje_sql_guard.php';

if (!function_exists('peaje_aforo_carril_v1')) {
    function peaje_aforo_carril_v1($db, $casetaId, $carrilId)
    {
        static $cache = array();

        $casetaId = (int) $casetaId;
        $carrilId = (int) $carrilId;
        $cacheKey = $casetaId . ':' . $carrilId;

        if (isset($cache[$cacheKey])) {
            return $cache[$cacheKey];
        }

        $canalCarril = 99;
        if ($db) {
            $sql = "SELECT V1 FROM carril WHERE CasetaID = " . $casetaId . " AND CarrilID = " . $carrilId;
            if ($rs = $db->Execute($sql)) {
                if (!$rs->EOF && isset($rs->fields[0])) {
                    $canalCarril = $rs->fields[0];
                }
                $rs->Close();
            }
        }

        $cache[$cacheKey] = $canalCarril;
        return $canalCarril;
    }
}

if (!function_exists('peaje_aforo_fecha_sql')) {
    function peaje_aforo_fecha_sql($field, $databaseType, $basesSybase = array(), $basesMssql = array(), $basesInformix = array())
    {
        $databaseType = strtolower((string) $databaseType);

        if (in_array($databaseType, $basesSybase)) {
            return "str_replace (convert(char(10)," . $field . ",102), '.', '-') + ' ' + convert(char(8)," . $field . ",20)";
        }

        if (in_array($databaseType, $basesMssql)) {
            return "convert(char(23)," . $field . ",121)";
        }

        if (in_array($databaseType, $basesInformix)) {
            return "EXTEND(" . $field . ", YEAR TO DAY)";
        }

        return $field;
    }
}

if (!function_exists('peaje_aforo_hora_evento_sql')) {
    function peaje_aforo_hora_evento_sql($databaseType, $basesSybase = array(), $basesMssql = array())
    {
        $databaseType = strtolower((string) $databaseType);

        if (in_array($databaseType, $basesSybase)) {
            return "str_replace (convert(char(10),HoraEvento,102), '.', '-') + ' ' + convert(char(8),HoraEvento,20)";
        }

        if (in_array($databaseType, $basesMssql)) {
            return "convert(char(23),HoraEvento,121)";
        }

        return "HoraEvento";
    }
}

if (!function_exists('peaje_aforo_export_select_sql')) {
    function peaje_aforo_export_select_sql($tableName, $databaseType, $basesSybase = array(), $basesMssql = array(), $basesInformix = array())
    {
        $fechaOperacion = peaje_aforo_fecha_sql('FechaOperacion', $databaseType, $basesSybase, $basesMssql, $basesInformix);
        $horaEvento = peaje_aforo_hora_evento_sql($databaseType, $basesSybase, $basesMssql);
        $fechaTurno = peaje_aforo_fecha_sql('FechaTurno', $databaseType, $basesSybase, $basesMssql, $basesInformix);

        return "SELECT CasetaID, " . $fechaOperacion . ", " . $horaEvento
            . ", TurnoID, CarrilID, Cuerpo, UsuarioID, Secuencial, Folio, VehiculoID_ECT, VehiculoID_CR, VehiculoID_EAP, PagoID_ANA, ExcentoID, Placas, NumeroTarjeta, VehiculoID_ANA, CantidadEje_ANA, Importe_ANA, TarifaEE_ANA, TipoTLP, OperadorTLP, Cancelado, PagoID, CategoriaTLP, "
            . $fechaTurno . ", ClaseVehiculo_ANA, NombreImagen, Consecutivo from " . $tableName;
    }
}
