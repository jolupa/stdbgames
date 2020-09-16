<?php if(isset($error)): ?>
  <p><?= $error ?></p>
<?php else: ?>
  <?php foreach($library as $library): ?>
    <div class="card is-shadowless is-inline-block">
      <div class="card-image">
        <figure class="image is-96x96">
          <a href="<?= base_url() ?>/game/<?= $library['game_slug'] ?>" title="<?= $library['game_name'] ?>"><img src="<?= base_url() ?>/images/<?= $library['game_image'] ?>-thumb.jpeg"></a>
        </figure>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
