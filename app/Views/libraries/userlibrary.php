<?php if(isset($error)): ?>
  <p><?= $error ?></p>
<?php else: ?>
  <?php foreach($library as $library): ?>
    <figure class="image is-96x96 is-fullwidth is-inline-block ml-0 mr-0 mt-0">
      <a href="<?= base_url() ?>/game/<?= $library['game_slug'] ?>" title="<?= $library['game_name'] ?>"><img src="<?= base_url() ?>/images/<?= $library['game_image'] ?>-thumb.jpeg"></a>
    </figure>
  <?php endforeach; ?>
<?php endif; ?>
