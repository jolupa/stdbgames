<div class="hero-foot">
  <div class="container">
    <p class="has-text-right mb-2">
      <span class="icon-text">
        <span class="tag is-green-eagle is-medium">
          <span><?php if ($like['total'] == null): ?>0 Likes<?php elseif ($like['total'] == 1): ?><?= $like['total'] ?> Like<?php else: ?><?= $like['total'] ?> Likes<?php endif; ?></span>
          <span class="icon"><a href="<?= base_url() ?>/likedislike/insertlike/<?= $game['id'] ?>" title="Like this game"><i class="fas fa-heart has-text-coral"></i></a></span>
        </span>
        <span class="tag is-green-eagle-2 is-medium ml-1 mr-1">
          <span class="icon"><a href="<?= base_url() ?>/likedislike/insertdislike/<?= $game['id'] ?>" title="Dislike this game"><i class="fas fa-heart-broken has-text-coral"></i></a></span>
          <span><?php if($dislike['total'] == null): ?>0 Dislikes<?php elseif($dislike['total'] == 1): ?><?= $dislike['total'] ?> Dislike<?php else: ?><?= $dislike['total'] ?> Likes<?php endif; ?></span>
        </span>
      </span>
    </p>
  </div>
</div>
