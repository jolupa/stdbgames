<div class="columns">
	<div class="column">
		<p class="subtitle is-5">Your</p>
		<p class="title is-3">WishList:</p>
	</div>
</div>
<?php if(!empty($wishlist)): ?>
  <div class="columns is-multiline">
  	<?php foreach($wishlist as $wishlist): ?>
  		<div class="column is-1 is-inline-block">
  			<div class="media">
  				<div class="media-left">
  					<figure class="image is-64x64">
  						<a href="<?= base_url() ?>/games/game/<?= $wishlist['wgSlug'] ?>"><img title="<?= $wishlist['wgName'] ?>" src="<?= base_url() ?>/images/<?= $wishlist['wgImage'] ?>-thumb.jpeg" alt="<?= $wishlist['wgName'] ?>"></a>
  					</figure>
  				</div>
  			</div>
  		</div>
  	<?php endforeach; ?>
  </div>
<?php else: ?>
  <div class="columns is-multiline">
    <div class="column is-full-width has-text-centered">
      <p>You Don't Have Wishes!</p>
    </div>
  </div>
<?php endif; ?>
