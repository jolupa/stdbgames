<?php if($wishlist == false): ?>
  <a class="button is-danger has-text-white is-small mt-1 mr-2" style="border: none;" href="<?= base_url() ?>/add/towishlist/<?= $game['id'] ?>">Add To Wishlist</a>
<?php else: ?>
  <button class="button is-primary has-text-dark is-small mt-1 mr-2">In Your Wishlist</button>
<?php endif; ?>
