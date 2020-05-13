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
									<p class="title is-6"><?= $game['gName'] ?>&nbsp;<?php if ( session('role') == 1  ): ?><span class="icon has-text-color-info"><a href="<?= base_url() ?>/games/update/<?= $game['gSlug'] ?>"><i class="far fa-edit"></i></a></span>&nbsp;<span class="icon has-text-color-alert"><a href="<?= base_url() ?>/games/delete/<?= $game['gId'] ?>"><i class="fas fa-trash-alt"></i></a></span><?php endif; ?></p>
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
							<div class="level-item has-text-centered">
								<div>
									<p class="heading">Score</p>
									<?php if ( $game['gRelease'] > date('Y-m-d')): ?>
										<p class="title is-6">Not Released</p>
									<?php else: ?>
										<p class="title is-6"><?= view_cell( 'App\Controllers\Votes::total', 'gameid='.$game['gId'] ) ?></p>
									<?php endif; ?>
								</div>
							</div>
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
									<?php if(date('Y-m-d') >= $game['gRelease']): ?>
										<?= view_cell('\App\Controllers\Libraries::checklibrary', 'userid='.session('id').', gameid='.$game['gId']) ?>
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
							<?= view_cell('\App\Controllers\Reviews::review', 'gameid='.$game['gId'].' userid='.session('id')) ?>
						<?php endif; ?>
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
