<div class="columns mt-2">
  <div class="column">
    <p class="subtitle is-5">Search</p>
    <p class="title is-3">Results:</p>
  </div>
</div>
<?php if($search == FALSE): ?>
  <div class="columns mb-2">
    <div class="column is-fullwidth">
      <p>We found nothing for <strong><?= $keyword ?></strong> in your search, but you can try again!</p>
    </div>
  </div>
  <?= view_cell('App\Controllers\Search::searchform') ?>
<?php else: ?>
  <div class="columns is-multiline mb-2">
    <?php foreach($search as $search): ?>
      <div class="column is-3">
        <div class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img src="<?= base_url() ?>/images/<?= $search['image'] ?>-thumb.jpeg">
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-5"><a href="<?= base_url() ?>/game/<?= $search['slug'] ?>"><strong><?= character_limiter($search['name'], 15, '...') ?></strong></a></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
