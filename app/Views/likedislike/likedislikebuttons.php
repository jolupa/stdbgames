<div class="hero-foot">
  <div class="container">
    <p class="has-text-right mb-2">
      <span class="icon-text">
        <span class="tag is-green-eagle is-medium">
          <span>
            <?php if ($like['total'] == null): ?>
              0 Likes
            <?php elseif ($like['total'] == 1): ?>
              <?php if (isset($user_like) && $user_like == 1): ?>
                You Liked this game
              <?php else: ?>
                <?= $like['total'] ?> Like
              <?php endif; ?>
            <?php else: ?>
              <?php if(isset($user_like) && $user_like == 1): ?>
                You and <?= $like['total'] ?> more peopleLike this games
              <?php else: ?>
                <?= $like['total'] ?> Likes
              <?php endif; ?>
            <?php endif; ?>
          </span>
          <?php if(isset($user_like) && $user_like == 0 && isset($user_dislike) && $user_dislike != 1 && session('logged') == true): ?>
            <span class="icon">
              <a href="<?= base_url() ?>/likedislike/insertlike/<?= $game['id'] ?>" title="Like this game">
                <i class="fas fa-heart has-text-coral"></i>
              </a>
            </span>
          <?php endif; ?>
        </span>
        <span class="tag is-green-eagle-2 is-medium ml-1 mr-1">
          <?php if(isset($user_dislike) && $user_dislike == 0 && isset($user_like) && $user_like != 1 && session('logged') == true): ?>
            <span class="icon">
              <a href="<?= base_url() ?>/likedislike/insertdislike/<?= $game['id'] ?>" title="Dislike this game">
                <i class="fas fa-heart-broken has-text-coral"></i>
              </a>
            </span>
          <?php endif; ?>
          <span>
            <?php if($dislike['total'] == null): ?>
              0 Dislikes
            <?php elseif($dislike['total'] == 1): ?>
              <?php if(isset($user_dislike) && $user_dislike == 1): ?>
                You disliked this game
              <?php else: ?>
                <?= $dislike['total'] ?> Dislike
              <?php endif; ?>
            <?php else: ?>
              <?php if(isset($user_dislike) && $user_dislike == 1): ?>
                You and <?= $dislike['total'] ?> more people Dislike this games
              <?php else: ?>
                <?= $dislike['total'] ?> Dislikes
              <?php endif; ?>
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
