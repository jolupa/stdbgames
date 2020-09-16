<?php if(!$released_day): ?>
  <div class="content mt-4">
    <p class="title is-5">Also released</p>
    <p class="subtitle is-3">this day:</p>
    <?php if(date('Y-m-d') <= $game['release']): ?>
      <p class="has-text-centered"><strong><?= $game['name'] ?></strong> is the only game, at this moment, with this launch date</p>
    <?php else: ?>
      <p class="has-text-centered"><strong><?= $game['name'] ?></strong> is the only game released on this day.</p>
    <?php endif; ?>
  </div>
<?php else: ?>
  <div class="content mt-2">
    <p class="title is-5">Also released</p>
    <p class="subtitle is-3">this day:</p>
    <?php foreach($released_day as $released_day): ?>
      <figure class="image is-96x96 is-inline-block">
        <a href="<?= base_url() ?>/game/<?= $released_day['slug'] ?>" title="<?= $released_day['name'] ?>"><img src="<?= base_url() ?>/images/<?= $released_day['image'] ?>-thumb.jpeg" alt="<?= $released_day['name'] ?>" title="<?= $released_day['name'] ?>"></a>
      </figure>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
