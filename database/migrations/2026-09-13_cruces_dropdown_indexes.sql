-- Complementa indices de catalogos usados por filtros y submenus de cruces.
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
    'casetas',
    'idx_casetas_nombre',
    '`Caseta`'
) $$

CALL peaje_add_index_if_missing(
    'turnos',
    'idx_turnos_nombre',
    '`Nombre`'
) $$

CALL peaje_add_index_if_missing(
    'usuario',
    'idx_usuario_tipo_nombre',
    '`UsuarioTipoID`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`'
) $$

DROP PROCEDURE IF EXISTS peaje_add_index_if_missing $$

DELIMITER ;

SET SESSION sql_mode = @peaje_old_sql_mode;
