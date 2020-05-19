<div class="columns">
  <div class="column is-full-width">
    <p class="subtitle is-5">Best Rated</p>
    <p class="title is-3">Games:</p>
  </div>
</div>
<div class="columns">
  <div class="column is-full-width is-multiline">
    <?php foreach($bestvoted as $bestvoted): ?>
      <div class="media">
        <figure class="media-left">
          <p class="image is-64x64">
            <img title="<?= $bestvoted['vgName'] ?>" src="<?= base_url() ?>/images/<?= $bestvoted['vgImage'] ?>-thumb.jpeg">
          </p>
        </figure>
        <div class="media-content">
          <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $bestvoted['vgSlug'] ?>"><?= $bestvoted['vgName'] ?></a></p>
          <p class="subtitle is-7">Developer by: <?= $bestvoted['vdName'] ?> / Published by: <?= $bestvoted['vpName'] ?></p>
        </div>
        <div class="media-right">
          <figure class="image <?php if($bestvoted['vScore'] > 9): ?>has-background-primary<?php elseif($bestvoted['vScore'] > 5): ?>has-background-warning<?php elseif($bestvoted['vScore'] > 3): ?>has-background-link has-text-color-white<? else: ?>has-background-danger has-text-color-white<?php endif; ?> is-64x64 has-text-centered">
            <br><p class="title is-5"><strong><?= $bestvoted['vScore'] ?></strong></p>
          </figure>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
