<?php

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
