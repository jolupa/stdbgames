<?php if(count($wishlist) === 0): ?>
  <p>You don't have games on your wishlist. Add some games!</p>
<?php else: ?>
  <?php foreach($wishlist as $wishlistGame): ?>
    <figure class="image is-96x96 is-fullwidth is-inline-block mr-0 ml-0 mt-0">
      <a href="<?= base_url() ?>/game/<?= $wishlistGame['game_slug'] ?>" title="<?= $wishlistGame['game_name'] ?>"><img src="<?= base_url() ?>/images/<?= $wishlistGame['game_image'] ?>-thumb.jpeg"></a>
    </figure>
  <?php endforeach; ?>
<?php endif; ?>
