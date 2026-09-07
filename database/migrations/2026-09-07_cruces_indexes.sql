-- Optimiza consultas del bloque de cruces sin cambiar reglas de negocio.
-- Ejecutar fuera de horario si aforo ya tiene muchos registros.

-- La base heredada puede tener defaults de fecha no aceptados por modo estricto.
SET @peaje_old_sql_mode = @@SESSION.sql_mode;
SET SESSION sql_mode = '';

DELIMITER $$

DROP PROCEDURE IF EXISTS peaje_add_index_if_missing $$
CREATE PROCEDURE peaje_add_index_if_missing(
    IN p_table_name VARCHAR(64),
    IN p_index_name VARCHAR(64),
    IN p_index_columns VARCHAR(1000)
)
BEGIN
    IF NOT EXISTS (
        SELECT 1
          FROM information_schema.statistics
         WHERE table_schema = DATABASE()
           AND table_name = p_table_name
           AND index_name = p_index_name
         LIMIT 1
    ) THEN
        SET @peaje_sql = CONCAT(
            'ALTER TABLE `', REPLACE(p_table_name, '`', '``'),
            '` ADD INDEX `', REPLACE(p_index_name, '`', '``'),
            '` (', p_index_columns, ')'
        );
        PREPARE peaje_stmt FROM @peaje_sql;
        EXECUTE peaje_stmt;
        DEALLOCATE PREPARE peaje_stmt;
    END IF;
END $$

CALL peaje_add_index_if_missing(
    'aforo',
    'idx_aforo_cruces_filtros',
    '`CasetaID`, `FechaOperacion`, `TurnoID`, `CarrilID`, `Cuerpo`, `EstatusANA`, `Secuencial`'
) $$

CALL peaje_add_index_if_missing(
    'aforo',
    'idx_aforo_trafico_resumen',
    '`CasetaID`, `FechaOperacion`, `TurnoID`, `HoraEvento`, `FechaTurno`, `ClaseVehiculo_ANA`, `PagoID_ANA`'
) $$

CALL peaje_add_index_if_missing(
    'detalleturno',
    'idx_detalleturno_cruces',
    '`CasetaID`, `FechaOperacion`, `TurnoID`, `CarrilID`, `Cuerpo`, `OperacionID`, `FechaTurno`'
) $$

CALL peaje_add_index_if_missing(
    'tarifa',
    'idx_tarifa_lookup',
    '`CasetaID`, `TipoPagoID`, `VehiculoID`, `FechaInicio`, `FechaFin`'
) $$

CALL peaje_add_index_if_missing(
    'carril',
    'idx_carril_caseta_carril',
    '`CasetaID`, `CarrilID`'
) $$

DROP PROCEDURE IF EXISTS peaje_add_index_if_missing $$

DELIMITER ;

SET SESSION sql_mode = @peaje_old_sql_mode;
