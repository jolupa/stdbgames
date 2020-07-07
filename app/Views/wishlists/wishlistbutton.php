<?php if($wishlist == false): ?>
  <a href="<?= base_url() ?>/add/towishlist/<?= $game['id'] ?>"><button class="button is-danger has-text-white is-small">Add To Wishlist</button></a>&nbsp;
<?php else: ?>
  <button class="button is-primary has-text-dark is-small">In Your Wishlist</button>&nbsp;
<?php endif; ?>
