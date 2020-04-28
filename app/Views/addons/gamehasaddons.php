<div class="columns">
	<div class="column">
		<p class="subtitle is-5">Addons Avalaible</p>
		<p class="title is-3">for this Game:</p>
	</div>
</div>
<div class="columns is-multiline">
	<?php if(!$gamehasaddons): ?>
		<div class="column is-3">
			<div class="media">
				<div class="media-left">
					<figure class="image is-256x256">
						<img title="This Game has no addons at the momment" src="<?= base_url() ?>/images/avatar/avatar01.jpg">
					</figure>
				</div>
			</div>
		</div>
	<?php else: ?>
		<?php foreach($gamehasaddons as $gamehasaddons): ?>
			<div class="column is-3 is-inline-block">
				<div class="media">
					<div class="media-left">
						<figure class="image is-256x256">
							<img title="<?= $gamehasaddons['aName'] ?>" src="<?= base_url() ?>/images/<?= $gamehasaddons['aImage'] ?>-thumb.jpeg" title="<?= $gamehasaddons['aName'] ?>">
						</figure>
					</div>
				</div>
				<div class="media">
					<div class="media-content">
						<a title="<?= $gamehasaddons['aName'] ?>" href="<?= base_url() ?>/addons/addon/<?= $gamehasaddons['aSlug'] ?>"><p class="heading has-text-centered"><?= $gamehasaddons['aName'] ?></p></a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
