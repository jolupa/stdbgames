<p class="subtitle is-5">Game</p>
<p class="title is-3">Reviews:</p>
<?php if(session('logged') == TRUE): ?>
  <?php if($review_user == FALSE): ?>
    <form method="post" action="<?= base_url() ?>/reviews/addreview">
      <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
      <input type="hidden" name="user_id" value="<?= session('user_id') ?>">
      <input type="hidden" name="game_name" value="<?= $game['name'] ?>">
      <input type="hidden" name="return" value="<?= $game['slug'] ?>">
      <div class="field">
        <div class="control is-expanded">
          <textarea class="textarea" id="textarea" name="about" placeholder="Write Your Review here!"></textarea>
        </div>
      </div>
      <?php if(session('role') == 2): ?>
        <div class="field">
          <div class="control">
            <input class="input" name="url" placeholder="Url to original Review">
          </div>
        </div>
      <?php endif; ?>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <div class="select">
            <select name="score">
              <option disabled selected>Cast Your Vote!</option>
              <?php $i = 0; while($i < 11): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
              <?php $i++; endwhile; ?>
            </select>
          </div>
        </div>
        <div class="control">
          <button class="button is-primary has-text-dark" value="submit">Add Review!</button>
        </div>
      </div>
    </form>
    <hr>
  <?php else: ?>
    <div class="media">
      <figure class="media-left">
        <p class="image is-96x96">
          <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.$review_user['user_image'].'.jpeg') == TRUE): ?>
            <img src="<?= base_url() ?>/images/avatar/<?= $review_user['user_image'] ?>.jpeg">
          <?php else: ?>
            <img src="<?= base_url() ?>/images/avatar/avatar01.jpeg">
          <?php endif; ?>
        </p>
      </figure>
      <div class="media-content">
        <p><a id="Review<?= $review_user['id'] ?>">#</a>Review by <strong><?= $review_user['user_name'] ?></strong>&nbsp;writted at <?= $review_user['date'] ?>&nbsp; and voted with <strong><?= $review_user['score'] ?></strong></p>
        <?php if(isset($review_user['about'])): ?>
          <?= $review_user['about'] ?>
        <?php endif; ?>
        <?php if($review_user['url']): ?>
          <p>Read full review <a href="<?= $review_user['url'] ?>" target="_blank">HERE</a></p>
        <?php endif; ?>
      </div>
    </div>
    <hr>
  <?php endif; ?>
<?php endif; ?>
<?php if($review == FALSE): ?>
  <div class="has-text-centered">
    <p>Be the first to add a Review for <strong><?= $game['name'] ?></strong>. <?php if(session('logged') !== true): ?> <a href="<?= base_url() ?>/signup" title="Sign Up">Sign Up</a> or <a href="<?= base_url() ?>/login" title="Log In">Log In</a> to add yours.<?php endif; ?></p>
  </div>
<?php else: ?>
  <?php foreach($review as $review): ?>
    <div class="media">
      <figure class="media-left">
        <p class="image is-96x96">
          <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.$review['user_image'].'.jpeg') == TRUE): ?>
            <img src="<?= base_url() ?>/images/avatar/<?= $review['user_image'] ?>.jpeg">
          <?php else: ?>
            <img src="<?= base_url() ?>/images/avatar/avatar01.jpeg">
          <?php endif; ?>
        </p>
      </figure>
      <div class="media-content">
        <p><a id="Review<?= $review['id'] ?>">#</a>Review by <strong><?= $review['user_name'] ?></strong><?php if($review['user_role'] == 2): ?>&nbsp;<span class="has-background-danger has-text-white subtitle is-7 px-1">MEDIA MEMBER</span><?php endif; ?>&nbsp;writted at <?= $review['date'] ?>&nbsp;and voted with <strong><?= $review['score'] ?></strong></p>
        <?= $review['about'] ?>
        <?php if($review['url']): ?>
          <p>Read full Review <a href="<?= $review['url'] ?>" target="_blank">HERE</a></p>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
