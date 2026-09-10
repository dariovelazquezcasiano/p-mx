# Candidatos de limpieza legacy

Fecha de revision: 2026-09-10.

Inventario generado con `tools/peaje_legacy_inventory.ps1`, revisando carpetas con nombres tipicos de copia/prueba y cruzando:

- existencia de carpeta en el proyecto
- registro en `seg_apps`
- grupos con `priv_access = 'Y'`
- referencias en archivos principales (`index.php`, `*_grid.class.php`, `*_apl.php`)

## Candidatos altos

Estas carpetas existian en raiz, estan registradas en `seg_apps`, no tienen grupos con acceso activo y no tienen referencias detectadas en codigo principal. Fueron aisladas en `legacy_disabled/2026-09-10/`:

- `chart_aforo_1`
- `grid_discrepancias_2`
- `ResumenPrePDF_nuevo`

## Mantener por ahora

Estas carpetas no tienen referencias detectadas, pero si tienen acceso activo para al menos un grupo:

- `blank_1`
- `blank_5`
- `burbuja_2`
- `PreLiqPDF_new`

Estas carpetas no tienen acceso activo, pero si aparecen referenciadas en codigo principal:

- `dashboard_liquidacionVW_1`
- `Eludidos_2022`

## Siguiente accion recomendada

Despues de unos ciclos de validacion, estos candidatos altos pueden eliminarse del repositorio y limpiar sus registros de `seg_apps`/`seg_groups_apps` si no aparece uso real por liga directa.
