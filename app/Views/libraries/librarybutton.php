<?php if($library == false): ?>
  <a href="<?= base_url() ?>/add/tolibrary/<?= $game['id'] ?>"><button class="button is-danger has-text-white is-small">Add To Library</button></a>&nbsp;
<?php else: ?>
  <button class="button is-primary has-text-dark is-small">In Your Library</button>&nbsp;
<?php endif; ?>
<?php if($library == false): ?>
  <?= view_cell('App\Controllers\Wishlists::isinwishlist', 'id='.$game['id']) ?>
<?php endif; ?>
