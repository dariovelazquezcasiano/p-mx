-- Indices para acelerar cruces, preliquidacion y liquidacion.
-- Ejecutar despues de respaldo de base de datos.

SET @schema_name = DATABASE();

SET @idx_exists = (
    SELECT COUNT(1)
    FROM INFORMATION_SCHEMA.STATISTICS
    WHERE TABLE_SCHEMA = @schema_name
      AND TABLE_NAME = 'discrepancias'
      AND INDEX_NAME = 'idx_discrepancias_turno_carril'
);
SET @sql = IF(
    @idx_exists = 0,
    'ALTER TABLE discrepancias ADD INDEX idx_discrepancias_turno_carril (CasetaID, Fecha, TurnoID, CarrilID)',
    'SELECT ''idx_discrepancias_turno_carril already exists'' AS info'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists = (
    SELECT COUNT(1)
    FROM INFORMATION_SCHEMA.STATISTICS
    WHERE TABLE_SCHEMA = @schema_name
      AND TABLE_NAME = 'detalleturno'
      AND INDEX_NAME = 'idx_detalleturno_preliquidado_filtros'
);
SET @sql = IF(
    @idx_exists = 0,
    'ALTER TABLE detalleturno ADD INDEX idx_detalleturno_preliquidado_filtros (PreLiquidado, FechaOperacion, CasetaID, TurnoID, CarrilID)',
    'SELECT ''idx_detalleturno_preliquidado_filtros already exists'' AS info'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists = (
    SELECT COUNT(1)
    FROM INFORMATION_SCHEMA.STATISTICS
    WHERE TABLE_SCHEMA = @schema_name
      AND TABLE_NAME = 'detalleturno'
      AND INDEX_NAME = 'idx_detalleturno_preliq_inicio'
);
SET @sql = IF(
    @idx_exists = 0,
    'ALTER TABLE detalleturno ADD INDEX idx_detalleturno_preliq_inicio (CasetaID, FechaOperacion, PreLiquidado, HoraInicio, FolioInicialCR)',
    'SELECT ''idx_detalleturno_preliq_inicio already exists'' AS info'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists = (
    SELECT COUNT(1)
    FROM INFORMATION_SCHEMA.STATISTICS
    WHERE TABLE_SCHEMA = @schema_name
      AND TABLE_NAME = 'detalleturno'
      AND INDEX_NAME = 'idx_detalleturno_preliq_fin'
);
SET @sql = IF(
    @idx_exists = 0,
    'ALTER TABLE detalleturno ADD INDEX idx_detalleturno_preliq_fin (CasetaID, FechaOperacion, PreLiquidado, HoraFin, FolioFinalCR)',
    'SELECT ''idx_detalleturno_preliq_fin already exists'' AS info'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists = (
    SELECT COUNT(1)
    FROM INFORMATION_SCHEMA.STATISTICS
    WHERE TABLE_SCHEMA = @schema_name
      AND TABLE_NAME = 'detalleturno'
      AND INDEX_NAME = 'idx_detalleturno_periodo_exacto'
);
SET @sql = IF(
    @idx_exists = 0,
    'ALTER TABLE detalleturno ADD INDEX idx_detalleturno_periodo_exacto (CasetaID, FechaOperacion, TurnoID, CarrilID, Cuerpo, OperacionID, HoraInicio, HoraFin)',
    'SELECT ''idx_detalleturno_periodo_exacto already exists'' AS info'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists = (
    SELECT COUNT(1)
    FROM INFORMATION_SCHEMA.STATISTICS
    WHERE TABLE_SCHEMA = @schema_name
      AND TABLE_NAME = 'detalleturno'
      AND INDEX_NAME = 'idx_detalleturno_restablece_preliq'
);
SET @sql = IF(
    @idx_exists = 0,
    'ALTER TABLE detalleturno ADD INDEX idx_detalleturno_restablece_preliq (PreLiquidado, FolioCierre, FechaOperacion, TurnoID, CasetaID, CarrilID)',
    'SELECT ''idx_detalleturno_restablece_preliq already exists'' AS info'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists = (
    SELECT COUNT(1)
    FROM INFORMATION_SCHEMA.STATISTICS
    WHERE TABLE_SCHEMA = @schema_name
      AND TABLE_NAME = 'aforo'
      AND INDEX_NAME = 'idx_aforo_liquidacion_intervalo'
);
SET @sql = IF(
    @idx_exists = 0,
    'ALTER TABLE aforo ADD INDEX idx_aforo_liquidacion_intervalo (CasetaID, FechaOperacion, TurnoID, CarrilID, Cuerpo, OperacionID, FechaTurno, HoraEvento, Revisado)',
    'SELECT ''idx_aforo_liquidacion_intervalo already exists'' AS info'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists = (
    SELECT COUNT(1)
    FROM INFORMATION_SCHEMA.STATISTICS
    WHERE TABLE_SCHEMA = @schema_name
      AND TABLE_NAME = 'detallealarma'
      AND INDEX_NAME = 'idx_detallealarma_operacion_periodo'
);
SET @sql = IF(
    @idx_exists = 0,
    'ALTER TABLE detallealarma ADD INDEX idx_detallealarma_operacion_periodo (CasetaID, TurnoID, CarrilID, Cuerpo, Fecha, Hora, AlarmaID)',
    'SELECT ''idx_detallealarma_operacion_periodo already exists'' AS info'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
