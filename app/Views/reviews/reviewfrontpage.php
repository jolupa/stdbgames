<div class="columns">
  <div class="column">
    <p class="subtitle is-5">Latests</p>
    <p class="title is-3">Votes/Reviews</p>
  </div>
</div>
<div class="columns is-multiline">
    <?php foreach($review as $review): ?>
      <div class="column is-12">
        <div class="media">
          <figure class="media-left">
            <img class="image is-64x64" src="<?= base_url() ?>/images/<?= $review['game_image'] ?>-thumb.jpeg">
          </figure>
          <div class="media-content">
            <p><?= $review['user_name'] ?>&nbsp;<?php if($review['user_role'] == 2): ?><span class="tag is-small is-danger has-text-white">MEDIA MEMBER</span><?php endif; ?></p>
            <p class="title is-7">
              <?php if(!empty($review['about'])): ?>
                Reviewed <a href="<?= base_url() ?>/game/<?= $review['game_slug'] ?>#Review<?= $review['id'] ?>"><?= $review['game_name'] ?></a>
              <?php elseif(!empty($review['score'])): ?>
                Voted <a href="<?= base_url() ?>/game/<?= $review['game_slug'] ?>#Review<?= $review['id'] ?>"><?= $review['game_name'] ?></a>
              <?php endif; ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
</div>
