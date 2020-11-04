<div class="navbar-item has-dropdown is-hoverable">
	<a class="navbar-link">Site Statistics</a>
	<div class="navbar-dropdown">
		<a class="navbar-item" href="<?= base_url() ?>/list"><strong><?= $totalgames ?></strong>&nbsp;Games in DB</a>
		<a class="navbar-item" href="<?= base_url() ?>/list/launched"><strong><?= $launchedgames ?></strong>&nbsp;Games Launched</a>
		<a class="navbar-item" href="<?= base_url() ?>/list/soon"><strong><?= $cominggames ?></strong>&nbsp;Waiting for Launch</a>
		<a class="navbar-item" href="<?= base_url() ?>/list/pro"><strong><?= $prostats ?></strong>&nbsp;Pro Games since launch</a>
		<a class="navbar-item" href="<?= base_url() ?>/list/rumors"><strong><?= $rumoredgames ?></strong>&nbsp;Rumoured Games</a>
	</div>
</div>
