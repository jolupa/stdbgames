<div class="content">
	<h1 class="title">
		Future Games:
	</h1>
</div>
<div class="columns is-mobile is-multiline">
	<?php $i = 0; if (count ($games_future) < 6) {$total = count ($games_future);}else{$total=6;}; while ($i < $total): ?>
		<div class="column is-half-mobile is-4-desktop">
			<div class="card is-equal">
				<div class="card-image">
					<figure class="image is-5by3">
						<img src="<?= base_url ('/assets/images/games/'.$games_future [$i]['image'].'.jpeg') ?>" />
					</figure>
				</div>
				<div class="card-content">
					<?php if ($games_future [$i]['rumor'] == 1): ?>
						<p class="help">
							<a href="<?= base_url ('/game/rumors') ?>">[RUMOR]</a>
						</p>
					<?php endif; ?>
					<h1 class="title is-5">
						<a href="<?= base_url ('/game/'.$games_future [$i]['slug']) ?>"><?= $games_future [$i]['name'] ?></a>
					</h1>
				</div>
			</div>
		</div>
	<?php $i++; endwhile; ?>
</div>
<?php if ($how_many_future > 6): ?>
	<div class="content">
		<p class="has-text-right">
			<a href="#">See All Future Games...</a>
		</p>
	</div>
<?php endif; ?>
