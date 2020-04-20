<div class="columns">
	<div class="column">
		<p class="subtitle is-5">Games</p>
		<p class="title is-3">you voted:</p>
	</div>
</div>
<div class="columns is-multiline">
	<?php foreach($votesbyuser as $votesbyuser): ?>
		<div class="column is-1 is-inline-block">
			<div class="media">
				<div class="media-left">
					<figure class="image is-64x64">
						<a href="<?= base_url() ?>/games/game/<?= $votesbyuser['gSlug'] ?>"><img title="<?= $votesbyuser['gName'] ?>" src="<?= base_url() ?>/images/<?= $votesbyuser['gImage'] ?>-thumb" alt="<?= $votesbyuser['gName'] ?>"></a>
					</figure>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
