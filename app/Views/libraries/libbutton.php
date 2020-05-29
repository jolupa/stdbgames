<?php if($lib_buttontype == FALSE): ?>
  <button class="button is-primary has-text-black is-small">In your Library</button>
<?php else: ?>
  <a href="<?= base_url() ?>/libraries/addtolibrary/<?= session('id') ?>/<?= $game['gId'] ?>"><button class="button is-danger has-text-white is-small">Add to Library</button></a>
<?php endif; ?>
<?php if($error): ?>
  <p class="help"><?= $error ?></p>
<?php endif; ?>
