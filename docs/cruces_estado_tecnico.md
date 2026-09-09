# Cruces - Estado tecnico

## Hecho

- Se centralizaron consultas repetidas de aforo/trafico en `_lib/lib/php/peaje_sql_guard.php` y `_lib/lib/php/peaje_aforo_cache.php`.
- Se agregaron indices para tablas base de cruces/liquidacion en `database/migrations/2026-09-07_cruces_indexes.sql`.
- Se agregaron indices para liquidacion en `database/migrations/2026-09-08_cruces_liquidacion_indexes.sql`.
- Se agregaron indices complementarios de catalogos en `database/migrations/2026-09-09_cruces_catalog_indexes.sql`.
- Se reforzaron cookies de sesion en entradas principales de login, menu, aforo, trafico, liquidacion y dashboards.
- Se normalizo `sqlmodoOperacion` para que solo genere expresiones de discrepancia validas para `ECT` o `EAP`.
- Se centralizo el `SELECT/UPDATE` de inicio y fin de dictamen de `detalleturno` para evitar SQL manual repetido en grid, forms y exports.
- Se agrego `tools/peaje_smoke.ps1` para revisar rapidamente que las paginas principales respondan sin errores PHP visibles.
- Se agrego `database/diagnostics/2026-09-09_cruces_explain.sql` para repetir mediciones con `EXPLAIN` cuando haya mas datos.

## Candidatos a revisar antes de borrar

No se encontraron referencias directas en PHP/JS/HTML/CSS para estos modulos, pero se dejan sin borrar hasta validar con uso real:

- `_shorts`
- `blank_1`
- `blank_5`
- `dashboard_liquidacionVW_1`
- `Eludidos_2022`
- `grid_trafico00`
- `trafico2`

## Validacion pendiente

- Probar flujo real con usuario: login, filtros, exportaciones, liquidacion/preliquidacion y cierre.
- Medir tiempos con una base mas parecida a produccion; la base local actual tiene pocos registros de `aforo`.
- Revisar logs de Apache/PHP despues de navegar el flujo completo.
- Dejar el cambio visual para la fase final, como se acordo.
