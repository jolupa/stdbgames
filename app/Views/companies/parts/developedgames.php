<div class="content">
	<h1 class="title">
		Developed Games:
	</h1>
</div>
<div class="columns is-mobile is-multiline">
	<?php foreach ($games_developed as $game_developed): ?>
		<div class="column is-half-mobile is-4-desktop">
			<div class="card is-equal">
				<div class="card-image">
					<figure class="image is-5by3">
						<img src="<?= base_url ('/assets/images/games/'.$game_developed ['image'].'.jpeg') ?>" />
					</figure>
				</div>
				<div class="card-content">
					<?php if ($game_developed ['rumor'] == 1): ?>
						<p class="help">
							<a href="<?= base_url ('/game/rumors') ?>">[RUMOR]</a>
						</p>
					<?php endif; ?>
					<h1 class="title is-5">
						<a href="<?= base_url ('/game/'.$game_developed ['slug']) ?>"><?= $game_developed ['name'] ?></a>
					</h1>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php if ($how_many_developed > 6): ?>
	<div class="content">
		<p class="has-text-right">
			<a href="#">See All Developed Games...</a>
		</p>
	</div>
<?php endif; ?>
