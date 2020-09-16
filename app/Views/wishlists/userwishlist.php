<?php if(isset($error)): ?>
  <p><?= $error ?></p>
<?php else: ?>
  <?php foreach($wishlist as $wishlist): ?>
    <div class="card is-shadowless is-inline-block">
      <div class="card-image">
        <figure class="image is-96x96">
          <a href="<?= base_url() ?>/game/<?= $wishlist['game_slug'] ?>" title="<?= $wishlist['game_name'] ?>"><img src="<?= base_url() ?>/images/<?= $wishlist['game_image'] ?>-thumb.jpeg"></a>
        </figure>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
