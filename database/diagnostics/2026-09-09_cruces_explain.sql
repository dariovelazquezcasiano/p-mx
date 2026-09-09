-- Diagnostico rapido para cruces/liquidacion.
-- Uso:
--   mysql -uroot demo < database/diagnostics/2026-09-09_cruces_explain.sql

SET @fecha_ini := COALESCE((SELECT MIN(FechaOperacion) FROM aforo), CURDATE());
SET @fecha_fin := DATE_ADD(@fecha_ini, INTERVAL 1 DAY);
SET @tarifa_caseta := COALESCE((SELECT CasetaID FROM tarifa LIMIT 1), 24);
SET @tarifa_pago := COALESCE((SELECT TipoPagoID FROM tarifa WHERE CasetaID = @tarifa_caseta LIMIT 1), 'NOR');
SET @tarifa_vehiculo := COALESCE((SELECT VehiculoID FROM tarifa WHERE CasetaID = @tarifa_caseta AND TipoPagoID = @tarifa_pago LIMIT 1), 'T01A');
SET @tarifa_fecha := COALESCE((SELECT FechaInicio FROM tarifa WHERE CasetaID = @tarifa_caseta AND TipoPagoID = @tarifa_pago AND VehiculoID = @tarifa_vehiculo LIMIT 1), CONCAT(@fecha_ini, ' 00:00:00'));
SET @tipo_equipo := COALESCE((SELECT fld_tipo_equipo FROM cat_tipoveh LIMIT 1), 'T01M');
SET @cat_grupo := COALESCE((SELECT fld_grupo FROM cat_tarifas LIMIT 1), 'A');
SET @cat_caseta := COALESCE((SELECT fld_caseta FROM cat_tarifas WHERE fld_grupo = @cat_grupo LIMIT 1), '24');
SET @cat_fecha := COALESCE((SELECT fld_fecha_ini FROM cat_tarifas WHERE fld_grupo = @cat_grupo AND fld_caseta = @cat_caseta LIMIT 1), @fecha_ini);
SET @sec_identidad := COALESCE((SELECT identidad FROM sec_configura LIMIT 1), 'x');
SET @sec_clasifica := COALESCE((SELECT clasifica FROM sec_configura WHERE identidad = @sec_identidad LIMIT 1), 'x');
SET @dt_caseta := COALESCE((SELECT CasetaID FROM detalleturno LIMIT 1), 0);
SET @dt_fecha_operacion := COALESCE((SELECT FechaOperacion FROM detalleturno WHERE CasetaID = @dt_caseta LIMIT 1), @fecha_ini);
SET @dt_turno := COALESCE((SELECT TurnoID FROM detalleturno WHERE CasetaID = @dt_caseta AND FechaOperacion = @dt_fecha_operacion LIMIT 1), 0);
SET @dt_carril := COALESCE((SELECT CarrilID FROM detalleturno WHERE CasetaID = @dt_caseta AND FechaOperacion = @dt_fecha_operacion AND TurnoID = @dt_turno LIMIT 1), 0);
SET @dt_cuerpo := COALESCE((SELECT Cuerpo FROM detalleturno WHERE CasetaID = @dt_caseta AND FechaOperacion = @dt_fecha_operacion AND TurnoID = @dt_turno AND CarrilID = @dt_carril LIMIT 1), '');
SET @dt_operacion := COALESCE((SELECT OperacionID FROM detalleturno WHERE CasetaID = @dt_caseta AND FechaOperacion = @dt_fecha_operacion AND TurnoID = @dt_turno AND CarrilID = @dt_carril AND Cuerpo = @dt_cuerpo LIMIT 1), '');
SET @dt_fhi := COALESCE((SELECT CONCAT(FechaTurno,' ',HoraInicio) FROM detalleturno WHERE CasetaID = @dt_caseta AND FechaOperacion = @dt_fecha_operacion AND TurnoID = @dt_turno AND CarrilID = @dt_carril AND Cuerpo = @dt_cuerpo AND OperacionID = @dt_operacion LIMIT 1), '');
SET @dt_fhf := COALESCE((SELECT CONCAT(FechaFin,' ',HoraFin) FROM detalleturno WHERE CasetaID = @dt_caseta AND FechaOperacion = @dt_fecha_operacion AND TurnoID = @dt_turno AND CarrilID = @dt_carril AND Cuerpo = @dt_cuerpo AND OperacionID = @dt_operacion LIMIT 1), '');

SELECT @fecha_ini AS fecha_ini, @fecha_fin AS fecha_fin;

SELECT 'aforo' AS tabla, COUNT(*) AS registros FROM aforo;
SELECT 'detalleturno' AS tabla, COUNT(*) AS registros FROM detalleturno;
SELECT 'tarifa' AS tabla, COUNT(*) AS registros FROM tarifa;
SELECT 'cat_tipoveh' AS tabla, COUNT(*) AS registros FROM cat_tipoveh;
SELECT 'cat_tarifas' AS tabla, COUNT(*) AS registros FROM cat_tarifas;
SELECT 'sec_configura' AS tabla, COUNT(*) AS registros FROM sec_configura;

EXPLAIN
SELECT
    CasetaID,
    FechaOperacion,
    HoraEvento,
    TurnoID,
    CarrilID,
    VehiculoID_CR,
    PagoID_ANA,
    Importe_ANA,
    Consecutivo
FROM aforo
WHERE FechaOperacion >= @fecha_ini
  AND FechaOperacion < @fecha_fin
ORDER BY CasetaID, CarrilID, HoraEvento
LIMIT 100;

EXPLAIN
SELECT
    IF(FechaOperacion != FechaTurno AND TurnoID = 3, 23, HOUR(HoraEvento)) AS hora,
    SUM(IF(ClaseVehiculo_ANA = 'A', 1, 0)) AS a,
    SUM(IF(ClaseVehiculo_ANA = 'M', 1, 0)) AS m,
    SUM(IF(PagoID_ANA = 'ELU', 1, 0)) AS elu,
    CasetaID,
    FechaOperacion
FROM aforo
WHERE FechaOperacion >= @fecha_ini
  AND FechaOperacion < @fecha_fin
GROUP BY CasetaID, FechaOperacion, hora;

EXPLAIN
SELECT
    TurnoID,
    CasetaID,
    CarrilID,
    FechaOperacion,
    FolioInicialCR,
    FolioFinalCR,
    MontoCR,
    MontoANA
FROM detalleturno
WHERE FechaOperacion >= @fecha_ini
  AND FechaOperacion < @fecha_fin
ORDER BY CasetaID, CarrilID, TurnoID;

EXPLAIN
SELECT FechaInicioDictamen
FROM detalleturno
WHERE CasetaID = @dt_caseta
  AND FechaOperacion = @dt_fecha_operacion
  AND TurnoID = @dt_turno
  AND CarrilID = @dt_carril
  AND Cuerpo = @dt_cuerpo
  AND OperacionID = @dt_operacion
  AND CONCAT(FechaTurno,' ',HoraInicio) = @dt_fhi
  AND CONCAT(FechaFin,' ',HoraFin) = @dt_fhf;

EXPLAIN
SELECT importe, ImporteEjeLigero, ImporteEjePesado
FROM tarifa
WHERE VehiculoID = @tarifa_vehiculo
  AND CasetaID = @tarifa_caseta
  AND TipoPagoID = @tarifa_pago
  AND FechaInicio <= @tarifa_fecha
  AND FechaFin >= @tarifa_fecha;

EXPLAIN
SELECT fld_tipo_pago, fld_ee, fld_tipo, fld_grupo
FROM cat_tipoveh
WHERE fld_tipo_equipo = @tipo_equipo;

EXPLAIN
SELECT fld_tarifa
FROM cat_tarifas
WHERE fld_grupo = @cat_grupo
  AND fld_caseta = @cat_caseta
  AND fld_fecha_ini <= @cat_fecha
  AND (fld_fecha_fin IS NULL OR fld_fecha_fin >= @cat_fecha);

EXPLAIN
SELECT params
FROM sec_configura
WHERE identidad = @sec_identidad
  AND clasifica = @sec_clasifica;
