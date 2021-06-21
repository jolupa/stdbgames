<div class="navbar-item has-dropdown is-hoverable">
  <a class="navbar-link">DB! Statistics</a>
  <div class="navbar-dropdown">
    <a class="navbar-item" href="<?= base_url ( '/db/list') ?>"><strong><?= $total ?></strong>&nbsp;Games in DB!</a>
    <a class="navbar-item" href="<?= base_url ( '/games/launched' ) ?>"><strong><?= $launched ?></strong>&nbsp;Games launched</a>
    <a class="navbar-item" href="<?= base_url ( '/games/coming' ) ?>"><strong><?= $waiting ?></strong>&nbsp;Games coming soon</a>
    <a class="navbar-item" href="<?= base_url ( '/games/pro' ) ?>"><strong><?= $totalpro ?></strong>&nbsp;Pro games since launch</a>
    <a class="navbar-item" href="<?= base_url ( '/games/rumours' ) ?>"><strong><?= $rumors ?></strong>&nbsp;Rumoured games</a>
    <a class="navbar-item" href="<?= base_url ( '/games/nodate' ) ?>"><strong><?= $nodate ?></strong>&nbsp;Games without date</a>
    <hr class="navbar-divider">
    <a class="navbar-item" href="<?= base_url ( '/charts') ?>">Charts</a>
  </div>
</div>
