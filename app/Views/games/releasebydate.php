<?php if(!$released_day): ?>
  <div class="columns is-centered">
    <div class="column is-10">
      <div class="content has-text-centered">
        <?php if($game['release'] > date('Y-m-d')): ?>
          <p><strong><?= $game['name'] ?></strong> is the only game, at this moment, with this launch date</p>
        <?php else: ?>
          <p><strong><?= $game['name'] ?></strong> is the only game released on this day.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="columns is-centered">
    <div class="column is-10 is-inline-block">
      <?php foreach($released_day as $released_day): ?>
        <div class="card is-inline-block">
          <div class="card-image">
            <figure class="image is-96x96">
              <a href="<?= base_url() ?>/game/<?= $released_day['slug'] ?>" title="<?= $released_day['name'] ?>"><img src="<?= base_url() ?>/images/<?= $released_day['image'] ?>-thumb.jpeg" alt="<?= $released_day['name'] ?>" title="<?= $released_day['name'] ?>"></a>
            </figure>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>
