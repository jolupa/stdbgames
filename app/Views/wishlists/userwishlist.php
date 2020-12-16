<?php if(isset($error)): ?>
  <p><?= $error ?></p>
<?php else: ?>
  <?php foreach($wishlist as $wishlist): ?>
    <figure class="image is-96x96 is-fullwidth is-inline-block mt-1 mr-1">
      <a href="<?= base_url() ?>/game/<?= $wishlist['game_slug'] ?>" title="<?= $wishlist['game_name'] ?>"><img src="<?= base_url() ?>/images/<?= $wishlist['game_image'] ?>-thumb.jpeg"></a>
    </figure>
  <?php endforeach; ?>
<?php endif; ?>
