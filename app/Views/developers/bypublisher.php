<div class="card-content">
	<div class="columns">
		<div class="column">
			<p class="subtitle is-5">Games</p>
			<p class="title is-3">Developed:</p>
		</div>
	</div>
	<div class="columns is-multiline">
		<?php foreach ($publisherdeveloper as $publisherdeveloper): ?>
			<div class="column is-one-quarter">
				<div class="media">
					<figure class="media-left">
						<p class="image is-64x64">
							<img title="<?= $publisherdeveloper['gName'] ?>" src="<?= base_url() ?>/images/<?= $publisherdeveloper['gImage'] ?>-thumb">
						</p>
					</figure>
					<div class="media-content">
						<p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $publisherdeveloper['gSlug'] ?>"><?= character_limiter($publisherdeveloper['gName'], 15, '...') ?></a></p>
						<p class="subtitle is-7">Publisher: <strong><a href="<?= base_url() ?>/publishers/publisher/<?= $publisherdeveloper['pSlug'] ?>"><?= $publisherdeveloper['pName'] ?></a></strong><br>
							Released: <strong><?= $publisherdeveloper['gRelease'] ?></strong></p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
