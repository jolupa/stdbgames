<div class="columns">
	<div class="column">
		<p class="subtitle is-5">Your</p>
		<p class="title is-3">Library:</p>
	</div>
</div>
<div class="columns is-multiline">
	<?php foreach($library as $library): ?>
		<div class="column is-1 is-inline-block">
			<div class="media">
				<div class="media-left">
					<figure class="image is-64x64">
						<a href="<?= base_url() ?>/games/game/<?= $library['gSlug'] ?>"><img title="<?= $library['gImage'] ?>" src="<?= base_url() ?>/images/<?= $library['gImage'] ?>-thumb.jpeg" title="<?= $library['gName'] ?>"></a>
					</figure>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
