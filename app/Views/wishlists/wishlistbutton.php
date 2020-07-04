<?php if($wishlist == false): ?>
  &nbsp;<a href="<?= base_url() ?>/add/towishlist/<?= $game['id'] ?>"><button class="button is-danger has-text-white is-small">Add To Wishlist</button></a>
<?php else: ?>
  &nbsp;<button class="button is-primary has-text-dark is-small">In Your Wishlist</button>
<?php endif; ?>
