<?php if($wishlist == false): ?>
  <a class="tag is-info is-small mt-1 mr-2" style="border: none;" href="<?= base_url() ?>/add/towishlist/<?= $game['id'] ?>">Add To Wishlist</a>
<?php else: ?>
  <a class="tag is-danger is-small mt-1 mr-2" href="<?= base_url() ?>/wishlists/deleteuserwishlist/<?= $game['id'] ?>"><strong>Remove</strong>&nbsp;from your Wishlist</a>
<?php endif; ?>
