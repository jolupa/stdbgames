<div class="columns">
  <div class="column is-full-width">
    <p class="subtitle is-5">Users</p>
    <p class="title is-3">Reviews:</p>
  </div>
</div>
<?php if($insert === TRUE && session('is_logged') === TRUE): ?>
  <div class="columns">
    <div class="column is-full-width">
      <article class="media">
        <figure class="media-left image is-128x128">
          <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.session('username').'.jpeg') === TRUE): ?>
            <img src="<?= base_url() ?>/images/avatar/<?= session('username') ?>.jpeg">
          <?php else: ?>
            <img src="<?= base_url() ?>/images/avatar/avatar01.jpeg">
          <?php endif; ?>
        </figure>
        <div class="media-content">
          <form method="post" action="<?= base_url() ?>/reviews/addreview">
            <input type="hidden" name="Userid" value="<?= session('id') ?>">
            <input type="hidden" name="Gameid" value="<?= $game['gId'] ?>">
            <div class="field">
              <div class="control">
                <textarea class="textarea" name="About" placeholder="You can use HTML tags p,strong"></textarea>
              </div>
            </div>
            <div class="field is-grouped is-grouped-multiline">
              <div class="control">
                <?= view_cell('\App\Controllers\Votes::checkvote', 'gameid= '.$game['gId'].', userid= '.session('id')) ?>
              </div>
              <div class="control">
                <button class="button is-primary" type="submit">Add Review!</button>
              </div>
            </div>
          </form>
        </div>
      </article>
    </div>
  </div>
<?php endif; ?>
<?php if(!$reviews): ?>
  <div class="columns">
    <div class="column is-full-width has-text-centered">
      <p>There's no Reviews for <strong><?= $game['gName'] ?></strong> <?php if(!session('is_logged')): ?> <a href="<?= base_url() ?>/users/register">Register</a> or <a href="<?= base_url() ?>/users/login">Login</a> and<?php endif; ?> be the first one to post a Review!</p>
    </div>
  </div>
<?php else: ?>
  <?php foreach($reviews as $reviews): ?>
    <div class="columns">
      <div class="column is-full-width">
        <article class="media">
          <figure class="media-left image is-96x96">
            <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.$reviews['ruImage'].'.jpeg') === TRUE): ?>
              <img src="<?= base_url() ?>/images/avatar/<?= $reviews['ruImage'] ?>.jpeg">
            <?php else: ?>
              <img src="<?= base_url() ?>/images/avatar/avatar01.jpeg">
            <?php endif; ?>
          </figure>
          <div class="media-content">
            <?= $reviews['rAbout'] ?>
            <small>Author: <strong><?= $reviews['ruName'] ?></strong> Posted: <strong><?= $reviews['rDate'] ?></strong> Voted: <strong><?= view_cell('\App\Controllers\Votes::total', 'gameid='.$game['gId'].' userid='.session('id')) ?></strong></small>
          </div>
        </article>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
