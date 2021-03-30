<div class="columns">
  <div class="column">
    <p class="subtitle is-5">Latests</p>
    <p class="title is-3">Reviews</p>
  </div>
</div>
<div class="columns is-multiline">
    <?php foreach($review as $review): ?>
      <div class="column is-12">
        <article class="media">
          <figure class="media-left image is-64x64 is-fullwidth">
            <img src="<?= base_url() ?>/images/<?= $review['game_image'] ?>-thumb.jpeg" alt="<?= $review['game_name'] ?>" title="<?= $review['game_name'] ?>">
          </figure>
          <div class="media-content">
            <p><?= $review['user_name'] ?>&nbsp;<?php if($review['user_role'] == 2): ?><span class="icon has-text-danger is-small"><i class="far fa-newspaper"></i></span><?php endif; ?></p>
            <p class="title is-7">
              <?php if(!empty($review['about'])): ?>
                Reviewed <a href="<?= base_url() ?>/game/<?= $review['game_slug'] ?>#Review<?= $review['id'] ?>"><?= character_limiter($review['game_name'], 15, '...') ?></a>
              <?php endif; ?>
            </p>
          </div>
        </article>
      </div>
    <?php endforeach; ?>
</div>
