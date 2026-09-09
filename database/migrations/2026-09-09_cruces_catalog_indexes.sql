-- Complementa indices de catalogos usados por cruces/liquidacion.
-- Ejecutar fuera de horario si las tablas ya tienen muchos registros.

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
    'cat_tipoveh',
    'idx_cat_tipoveh_tipo_equipo',
    '`fld_tipo_equipo`'
) $$

CALL peaje_add_index_if_missing(
    'cat_tarifas',
    'idx_cat_tarifas_lookup',
    '`fld_grupo`, `fld_caseta`, `fld_fecha_ini`, `fld_fecha_fin`'
) $$

CALL peaje_add_index_if_missing(
    'sec_configura',
    'idx_sec_configura_identidad_clasifica',
    '`identidad`, `clasifica`'
) $$

DROP PROCEDURE IF EXISTS peaje_add_index_if_missing $$

DELIMITER ;

SET SESSION sql_mode = @peaje_old_sql_mode;
