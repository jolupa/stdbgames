<div class="content">
	<h1 class="title">
		Published Games:
	</h1>
</div>
<div class="columns is-mobile is-multiline">
	<?php foreach ($games_published as $game_published): ?>
		<div class="column is-half-mobile is-4-desktop">
			<div class="card is-equal">
				<div class="card-image">
					<figure class="image is-5by3">
						<img src="<?= base_url ('/assets/images/games/'.$game_published ['image'].'.jpeg') ?>" />
					</figure>
				</div>
				<div class="card-content">
					<?php if ($game_published ['rumor'] == 1): ?>
						<p class="help">
							<a href="<?= base_url ('/game/rumors') ?>">[RUMOR]</a>
						</p>
					<?php endif; ?>
					<h1 class="title is-5">
						<a href="<?= base_url ('/game/'.$game_published ['slug']) ?>"><?= $game_published ['name'] ?></a>
					</h1>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php if ($how_many_published > 6): ?>
	<div class="content">
		<p class="has-text-right">
			<a href="#">See All Published Games...</a>
		</p>
	</div>
<?php endif; ?>
