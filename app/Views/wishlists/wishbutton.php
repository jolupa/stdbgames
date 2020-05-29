<?php if($wis_buttontype == FALSE): ?>
  <button class="button is-small is-primary has-text-black has-addons">In your Wishlist</button><a title="Delete from Wishlist" href="<?= base_url() ?>/wishlists/deletefromlibrary/<?= session('id') ?>/<?= $game['gId'] ?>"><button class="button is-small is-primary has-text-black"><strong>-</strong></button></a>
<?php else: ?>
  <a href="<?= base_url() ?>/wishlists/addtowishlist/<?= session('id') ?>/<?= $game['gId'] ?>"><button class="button is-small is-danger has-text-color-white">Add to Wishlist</button></a>
<?php endif; ?>
<?php if($error): ?>
  <p class="help"><?= $error ?></p>
<?php endif; ?>
