<div class="columns">
  <div class="column is-12">
    <p class="subtitle is-5">Game</p>
    <p class="title is-3">Deals:</p>
  </div>
</div>
<div class="columns is-multiline">
  <?php if(!is_array($prices)): ?>
    <div class="column is-12">
      <div class="content has-text-centered">
        <p>There's no Game Deals at this moment</p>
      </div>
    </div>
  <?php else: ?>
    <?php foreach($prices as $prices): ?>
      <div class="column is-12">
        <div class="media">
          <figure class="media-left image is-64x64 is-fullwidth">
            <img src="<?= base_url() ?>/images/<?= $prices['game_image'] ?>-thumb.jpeg" alt="<?= $prices['game_name'] ?>" title="<?= $prices['game_name'] ?>">
          </figure>
          <div class="media-content">
            <p><a href="<?= base_url() ?>/game/<?= $prices['game_url'] ?>"><strong><?= $prices['game_name'] ?></strong></a></p>
            <p class="title is-7">Till <?php if($prices['date_till_pro']): ?><?= $prices['date_till_pro'] ?> Pro <?php endif; ?>
              <?php if($prices['date_till_nonpro'] != ''): ?><br><?= $prices['date_till_nonpro'] ?> Everyone<?php endif; ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="column is-12 has-text-centered">
      <a class="button is-info" href="<?= base_url() ?>/list/deals">See all Discounts</a>
    </div>
  <?php endif; ?>
</div>
