-- Complementa los indices del bloque de cruces/liquidacion.
-- Ejecutar fuera de horario si aforo ya tiene muchos registros.

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
    'idx_aforo_trafico_base',
    '`Cancelado`, `PagoID_ANA`, `FechaOperacion`, `HoraEvento`, `TurnoID`, `FechaTurno`, `CasetaID`'
) $$

CALL peaje_add_index_if_missing(
    'excentos',
    'idx_excentos_caseta_dependencia',
    '`CasetaID`, `Dependencia`'
) $$

DROP PROCEDURE IF EXISTS peaje_add_index_if_missing $$

DELIMITER ;

SET SESSION sql_mode = @peaje_old_sql_mode;
