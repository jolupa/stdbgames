<?php if($wishlist == false): ?>
  <a href="<?= base_url() ?>/add/towishlist/<?= $game['id'] ?>"><button class="button is-danger has-text-white is-small mt-1 mr-2">Add To Wishlist</button></a>
<?php else: ?>
  <button class="button is-primary has-text-dark is-small mt-1 mr-2">In Your Wishlist</button>
<?php endif; ?>
