<?php foreach ( $gamebyyear as $gby ): ?>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading"><?= $gby['year'] ?></p>
      <p class="title"><?= $gby['total'] ?></p>
    </div>
  </div>
<?php endforeach; ?>
