<?php $games = count($totgames); $launched = count($totlaunched); $coming = count($totcoming); ?>

<div class="navbar-item has-dropdown is-hoverable">
  <a class="navbar-link">Statistics</a>
  <div class="navbar-dropdown">
    <a class="navbar-item" href="#"><strong><?= $games ?></strong>&nbsp;Games in the DB</a>
    <a class="navbar-item" href="#"><strong><?= $launched ?></strong>&nbsp;Games launched</a>
    <a class="navbar-item" href="#"><strong><?= $coming ?></strong>&nbsp;Games coming</a>
  </div>
</div>
