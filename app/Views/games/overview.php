<section class="section">
	<div class="container">
		<div class="columns">
			<div class="card">
				<div class="card-image">
					<figure class="image is16by9">
						<img src="<?= base_url() ?>/images/<?= $game['gImage'] ?>.jpeg">
					</figure>
				</div>
				<div class="card-content">
					<div class="content">
						<nav class="level">
							<div class="level-item has-text-centered">
								<div>
									<p class="heading">Title</p>
									<p class="title is-6"><?= $game['gName'] ?> <?php if ( session('role') == 1  ): ?><span class="icon has-text-color-info"><a href="<?= base_url() ?>/games/update/<?= $game['gSlug'] ?>"><i class="far fa-edit"></i></a></span><?php endif; ?></p>
								</div>
							</div>
							<div class="level-item has-text-centered">
								<div>
									<p class="heading">Developer</p>
									<p class="title is-6"><?php if (isset ($game['gdSlug'])): ?><a href="<?= base_url() ?>/developers/developer/<?= $game['gdSlug'] ?>"><?= $game['gdName'] ?></a><?php else: ?><?= $game['gdName'] ?><?php endif; ?></p>
								</div>
							</div>
							<div class="level-item has-text-centered">
								<div>
									<p class="heading">Publisher</p>
									<p class="title is-6"><?php if ( isset ($game['gpSlug'])): ?><a href="<?= base_url() ?>/publishers/publisher/<?= $game['gpSlug'] ?>"><?= $game['gpName'] ?></a><?php else: ?><?= $game['gpName'] ?><?php endif; ?></p>
								</div>
							</div>
							<div class="level-item has-text-centered">
								<div>
									<p class="heading">Release Date</p>
									<p class="title is-6"><?= $game['gRelease'] ?></p>
								</div>
							</div>
							<?= view_cell( 'App\Controllers\Votes::total', 'gameid='.$game['gId'] ) ?>
						</nav>
					</div>
				</div>
				<div class="card-content">
					<div class="content">
						<div class="columns">
							<div class="column is-full-width">
								<p>
									<?php if(date('Y-m-d') > $game['gRelease'] && isset($game['gSku'])): ?>
										<?= view_cell('App\Controllers\Games::store') ?>
									<?php endif; ?>&nbsp;
									<?php if(date('Y-m-d') > $game['gRelease']): ?>
										<?= view_cell( '\App\Controllers\Games::gameproinfo' ) ?>
									<?php endif; ?>&nbsp;
									<?php if(date('Y-m-d') >= $game['gRelease'] && session('is_logged') == TRUE): ?><?= view_cell('\App\Controllers\Libraries::checklibrary', 'userid='.session('id').', gameid='.$game['gId']) ?> <?= view_cell('\App\Controllers\Votes::checkvote', 'userid='.session('id').', gameid='.$game['gId']) ?>
									<?php endif; ?>
								</p>
							</div>
						</div>
						<div class="columns">
							<div class="column is-full-widht">
								<p class="subtitle is-5">About the</p>
								<p class="title is-3">Game:</p>
								<?= $game['gAbout'] ?>
							</div>
						</div>
						<?php if(date('Y-m-d') >= $game['gRelease']): ?>
							<?= view_cell('\App\Controllers\Addons::gamehasaddons', 'gameid='.$game['gId']) ?>
							<?= view_cell('\App\Controllers\Prices::pricehistory', 'gameid='.$game['gId']) ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
