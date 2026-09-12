<?php
if (!function_exists('peaje_home_render'))
{
    function peaje_home_render()
    {
?>
<main class="pmx-home-shell">
  <section class="pmx-home-rail" aria-label="P-MX">
    <div class="pmx-brand-block">
      <span class="pmx-brand-mark">P</span>
      <div class="pmx-brand-copy">
        <span>Peaje MX</span>
        <strong>P-MX</strong>
      </div>
    </div>

    <div class="pmx-home-copy">
      <p class="pmx-kicker">Administración de cruces</p>
      <h1>Control operativo</h1>
      <p class="pmx-home-subtitle">Back Office</p>
    </div>

    <div class="pmx-home-modules" aria-label="Módulos">
      <span>Cruces</span>
      <span>Tarifas</span>
      <span>Cortes</span>
      <span>Preliquidación</span>
      <span>Liquidación</span>
      <span>Informes</span>
    </div>
  </section>
</main>
<?php
    }
}
?>
