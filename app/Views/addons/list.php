<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column is-full-time">
				<p class="subtitle is-5">Game</p>
				<p class="title is-3">Addons</p>
			</div>
		</div>
		<div class="columns is-multiline">
			<?php foreach ($addons as $addons): ?>
				<div class="column is-one-quarter">
					<div class="media">
						<figure class="media-left">
							<p class="image is-64x64">
								<img title="<?= $addons['aName'] ?>" src="<?= base_url() ?>/images/<?= $addons['aImage'] ?>-thumb">
							</p>
						</figure>
						<div class="media-content">
							<p class="title is-5"><a href="<?= base_url() ?>/addons/addon/<?= $addons['aSlug'] ?>"><?= 	character_limiter($addons['aName'], 15, '...') ?></a></p>
							<p class="subtitle is-7"><?= $addons['adName'] ?> / <?= $addons['apName'] ?><br><?= $addons['aRelease'] ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
