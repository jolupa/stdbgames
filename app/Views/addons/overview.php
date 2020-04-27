<section class="section">
	<div class="container">
		<div class="columns">
			<div class="card">
				<div class="card-image">
					<figure class="image is16by9">
						<img src="<?= base_url() ?>/images/<?= $addon['aImage'] ?>.jpeg">
					</figure>
				</div>
				<div class="card-content">
					<div class="content">
						<nav class="level">
							<div class="level-item has-text-centered">
								<div>
									<p class="heading">Title</p>
									<p class="title is-6"><?= $addon['aName'] ?> <?php if ( session('role') == 1  ): ?><span class="icon has-text-color-info"><a href="<?= base_url() ?>/addons/update/<?= $addon['aSlug'] ?>"><i class="far fa-edit"></i></a></span><?php endif; ?></p>
								</div>
							</div>
							<div class="level-item has-text-centered">
								<div>
									<p class="heading">Is for</p>
									<p class="title is-6"><a href="<?= base_url() ?>/games/game/<?= $addon['agSlug'] ?>"><?= $addon['agName'] ?></a></p>
								</div>
							</div>
							<div class="level-item has-text-centered">
								<div>
									<p class="heading">Developer</p>
									<p class="title is-6"><?php if (isset ($addon['adSlug'])): ?><a href="<?= base_url() ?>/developers/developer/<?= $addon['adSlug'] ?>"><?= $addon['adName'] ?></a><?php else: ?><?= $addon['adName'] ?><?php endif; ?></p>
								</div>
							</div>
							<div class="level-item has-text-centered">
								<div>
									<p class="heading">Publisher</p>
									<p class="title is-6"><?php if ( isset ($addon['apSlug'])): ?><a href="<?= base_url() ?>/publishers/publisher/<?= $addon['apSlug'] ?>"><?= $addon['apName'] ?></a><?php else: ?><?= $addon['apName'] ?><?php endif; ?></p>
								</div>
							</div>
							<div class="level-item has-text-centered">
								<div>
									<p class="heading">Release Date</p>
									<p class="title is-6"><?= $addon['aRelease'] ?></p>
								</div>
							</div>
						</nav>
					</div>
				</div>
				<div class="card-content">
					<div class="content">
						<div class="columns">
							<div class="column is-full-widht">
								<p class="subtitle is-5">Adds to</p>
								<p class="title is-3">the History:</p>
								<?= $addon['aAbout'] ?>
							</div>
						</div>
							<?php if(date('Y-m-d') >= $addon['aRelease']): ?>
								<?= view_cell('\App\Controllers\Prices::pricehistoryaddon', 'addonid='.$addon['aId']) ?>
							<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
