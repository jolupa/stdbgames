<div class="hero-foot">
  <div class="container">
    <p class="has-text-right mb-2">
      <span class="icon-text">
        <span class="tag is-green-eagle is-medium">
          <span>
            <?php if ($like['total'] == null): ?>
              0 Likes
            <?php elseif ($like['total'] == 1): ?>
              <?= $like['total'] ?> Like
            <?php else: ?>
              <?= $like['total'] ?> Likes
            <?php endif; ?>
          </span>
          <span class="icon">
            <?php if(isset($user_like) && $user_like == 0): ?>
              <a href="<?= base_url() ?>/likedislike/insertlike/<?= $game['id'] ?>" title="Like this game">
                <i class="fas fa-heart has-text-coral"></i>
              </a>
            <?php else: ?>
              <a href="<?= base_url() ?>/likedislike/unsetlike/<?= $game['id'] ?>" title="Unset like">
                <i class="fas fa-heart has-text-coral"></i>
              </a>
            <?php endif; ?>
          </span>
        </span>
        <span class="tag is-green-eagle-2 is-medium ml-1 mr-1">
          <span class="icon">
            <?php if(isset($user_dislike) && $user_dislike == 0): ?>
              <a href="<?= base_url() ?>/likedislike/insertdislike/<?= $game['id'] ?>" title="Dislike this game">
                <i class="fas fa-heart-broken has-text-coral"></i>
              </a>
            <?php else: ?>
              <a href="<?= base_url() ?>/likedislike/unsetdislike/<?= $game['id'] ?>" title="Unset Dislike">
                <i class="fas fa-heart-broken has-text-coral"></i>
              </a>
            <?php endif; ?>
          </span>
          <span>
            <?php if($dislike['total'] == null): ?>
              0 Dislikes
            <?php elseif($dislike['total'] == 1): ?>
              <?= $dislike['total'] ?> Dislike
            <?php else: ?>
              <?= $dislike['total'] ?> Dislikes
            <?php endif; ?>
          </span>
        </span>
        <?php if (session('logged') == false): ?>
          <span class="tag is-gunmetal is-medium">
            <a href="<?= base_url() ?>/login" title="Log in">Log in</a>&nbsp;or&nbsp;<a href="<?= base_url() ?>/signup" title="Sign Up">Register</a>&nbsp;to Like or Dislike
          </span>
        <?php endif; ?>
      </span>
    </p>
  </div>
</div>
