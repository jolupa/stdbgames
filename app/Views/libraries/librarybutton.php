<?php if($game['release'] <= date('Y-m-d')): ?>
  <?php if($library == false): ?>
    <a class="button is-danger has-text-white is-small mt-1 mr-2" style="border: none;" href="<?= base_url() ?>/add/tolibrary/<?= $game['id'] ?>">Add To Library</a>
  <?php else: ?>
    <a class="button is-primary has-text-dark is-small mt-1 mr-2" href="<?= base_url() ?>/libraries/deleteuserlibrary/<?= $game['id'] ?>"><strong>Remove</strong>&nbsp;from your Library</a>
  <?php endif; ?>
<?php endif; ?>
<?php if($library == false): ?>
  <?= view_cell('App\Controllers\Wishlists::isinwishlist', 'id='.$game['id']) ?>
<?php endif; ?>
