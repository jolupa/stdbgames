<?php if($wishlist == false): ?>
  <div class="columns">
    <div class="column is-fullwidth">
      <div class="content">
        <p>No Games on your Wishlist. Go to add someones!</p>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="columns is-multiline">
    <div class="column">
      <?php foreach($wishlist as $wishlist): ?>
        <div class="card is-inline-block">
          <div class="card-image">
            <figure class="image is-96x96">
              <a href="<?= base_url() ?>/game/<?= $wishlist['game_slug'] ?>" title="<?= $wishlist['game_name'] ?>"><img src="<?= base_url() ?>/images/<?= $wishlist['game_image'] ?>-thumb.jpeg"></a>
            </figure>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>
