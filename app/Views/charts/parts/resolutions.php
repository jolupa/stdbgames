<?php foreach ( $resolutions as $res ): ?>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading"><?= $res['resolution'] ?></p>
      <p class="title"><?= $res['total'] ?></p>
    </div>
  </div>
<?php endforeach; ?>
