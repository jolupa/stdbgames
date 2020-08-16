<?php if($game['release'] <= date('Y-m-d')): ?>
  <?php if($library == false): ?>
    <a href="<?= base_url() ?>/add/tolibrary/<?= $game['id'] ?>"><button class="button is-danger has-text-white is-small mt-1 mr-2">Add To Library</button></a>
  <?php else: ?>
    <button class="button is-primary has-text-dark is-small mt-1 mr-2">In Your Library</button>
  <?php endif; ?>
<?php endif; ?>
<?php if($library == false): ?>
  <?= view_cell('App\Controllers\Wishlists::isinwishlist', 'id='.$game['id']) ?>
<?php endif; ?>
