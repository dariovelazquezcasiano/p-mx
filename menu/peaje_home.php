<?php
if (!function_exists('peaje_home_render'))
{
    function peaje_home_render()
    {
        $pmx_user = '';
        if (isset($_SESSION['fld_usuarios']) && '' !== trim((string) $_SESSION['fld_usuarios']))
        {
            $pmx_user = trim((string) $_SESSION['fld_usuarios']);
        }

        $pmx_user = htmlspecialchars($pmx_user, ENT_QUOTES, 'UTF-8');
        $pmx_date = date('d/m/Y H:i');
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
      <p class="pmx-kicker">Administracion de cruces</p>
      <h1>Control operativo</h1>
      <p class="pmx-home-subtitle">Back Office</p>
    </div>

    <div class="pmx-home-status" aria-label="Contexto">
      <?php if ('' !== $pmx_user) { ?>
      <span><?php echo $pmx_user; ?></span>
      <?php } ?>
      <span><?php echo $pmx_date; ?></span>
    </div>

    <div class="pmx-home-modules" aria-label="Modulos">
      <span>Cruces</span>
      <span>Trafico</span>
      <span>Liquidacion</span>
    </div>
  </section>
</main>
<?php
    }
}
?>
