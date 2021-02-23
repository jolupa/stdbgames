<?php if(session('logged') == TRUE): ?>
  <?php if($review_user == FALSE): ?>
    <p class="subtitle is-5">Add your</p>
    <p class="title is-3">#Review:</p>
    <form method="post" action="<?= base_url() ?>/reviews/addreview" class="mb-5">
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
      <div class="field">
        <div class="control">
          <button class="button is-primary has-text-dark" value="submit">Add Review!</button>
        </div>
      </div>
    </form>
  <?php elseif($review_user == TRUE): ?>
    <p class="subtitle is-5">Update your</p>
    <p class="title is-3">#Review:</p>
    <form method="post" action="<?= base_url() ?>/reviews/updatereview" class="mb-5">
      <input type="hidden" name="id" value="<?= $review_user['id'] ?>">
      <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
      <input type="hidden" name="user_id" value="<?= session('user_id') ?>">
      <input type="hidden" name="game_name" value="<?= $game['name'] ?>">
      <input type="hidden" name="return" value="<?= $game['slug'] ?>">
      <div class="field">
        <div class="control is-expanded">
          <textarea class="textarea" id="textarea" name="about" placeholder="Write Your Review here!"><?= $review_user['about'] ?></textarea>
        </div>
      </div>
      <?php if(session('role') == 2): ?>
        <div class="field">
          <div class="control">
            <input class="input" name="url" placeholder="Url to original Review" value="<?= $review_user['url'] ?>">
          </div>
        </div>
      <?php endif; ?>
      <div class="field">
        <div class="control">
          <button class="button is-primary has-text-dark" value="submit">Update Review!</button>
        </div>
      </div>
    </form>
  <?php endif; ?>
<?php endif; ?>
<?php if($review == FALSE): ?>
  <div class="has-text-centered">
    <p>Be the first to add a Review for <strong><?= $game['name'] ?></strong>. <?php if(session('logged') !== true): ?> <a href="<?= base_url() ?>/signup" title="Sign Up">Sign Up</a> or <a href="<?= base_url() ?>/login" title="Log In">Log In</a> to add yours.<?php endif; ?></p>
  </div>
<?php else: ?>
  <p class="subtitle is-5">Game</p>
  <p class="title is-3">#Reviews:</p>
  <?php foreach($review as $review): ?>
    <div class="media">
      <figure class="media-left">
        <p class="image is-96x96">
          <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.$review['user_image'].'.jpeg') == TRUE): ?>
            <img src="<?= base_url() ?>/images/avatar/<?= $review['user_image'] ?>.jpeg" alt="<?= $review['user_name'] ?>" title="<?= $review['user_name'] ?>">
          <?php else: ?>
            <img src="<?= base_url() ?>/images/avatar/avatar01.jpeg" title="Generic Avatar" alt="Generic Avatar">
          <?php endif; ?>
        </p>
      </figure>
      <div class="media-content">
        <div class="content has-background-gunmetal">
          <p>
            <a id="Review<?= $review['id'] ?>">#</a>Review by <strong><?= $review['user_name'] ?></strong><?php if($review['user_role'] == 2): ?>&nbsp;<span class="icon has-text-danger is-small"><i class="far fa-newspaper"></i></span><?php endif; ?><br>
            Writted on: <strong><?= date('d-m-Y', strtotime($review['date'])) ?></strong><br>
            <?php if($review['updated_at'] != ''): ?>
              Edited on: <strong><?= date('d-m-Y', strtotime($review['updated_at'])) ?></strong><br>
            <?php endif; ?></strong>
          </p>
        </div>
        <?= $review['about'] ?>
        <?php if($review['url']): ?>
          <p>Read full Review <a href="<?= $review['url'] ?>" target="_blank">HERE</a></p>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
