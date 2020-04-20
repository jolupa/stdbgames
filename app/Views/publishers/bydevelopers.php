<div class="card-content">
	<div class="columns">
		<div class="column">
			<p class="subtitle is-5">Games</p>
			<p class="title is-3">Published:</p>
		</div>
	</div>
	<div class="columns is-multiline">
		<?php foreach ($developerpublisher as $developerpublisher): ?>
			<div class="column is-one-quarter">
				<div class="media">
					<figure class="media-left">
						<p class="image is-64x64">
							<img title="<?= $developerpublisher['gName'] ?>" src="<?= base_url() ?>/images/<?= $developerpublisher['gImage'] ?>-thumb">
						</p>
					</figure>
					<div class="media-content">
						<p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $developerpublisher['gSlug'] ?>"><?= character_limiter($developerpublisher['gName'], 15, '...') ?></a></p>
						<p class="subtitle is-7">Developer: <strong><a href="<?= base_url() ?>/developers/developer/<?= $developerpublisher['dSlug'] ?>"><?= $developerpublisher['dName'] ?></a></strong><br>
							Released: <strong><?= $developerpublisher['gRelease'] ?></strong></p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
