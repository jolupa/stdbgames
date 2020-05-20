<div class="columns">
  <div class="column is-full-width">
    <p class="subtitle is-5">Users</p>
    <p class="title is-3"><a id="Reviews">#</a>Reviews:</p>
  </div>
</div>
<?php if(session('is_logged') === TRUE): ?>
  <?= view_cell('App\Controllers\Reviews::checkreview', 'gameid='.$game['gId'].' userid='.session('id')) ?>
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
      <div class="column is-full-width <?php if(($reviews['rId'] % 2) === 0): ?>has-background-color-grey-lighter<?php endif; ?>">
        <article class="media">
          <figure class="media-left image is-96x96">
            <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.$reviews['ruImage'].'.jpeg') === TRUE): ?>
              <a id="Review<?= $reviews['rId'] ?>"><img src="<?= base_url() ?>/images/avatar/<?= $reviews['ruImage'] ?>.jpeg"></a>
            <?php else: ?>
              <a id="Review<?= $reviews['rId'] ?>"><img src="<?= base_url() ?>/images/avatar/avatar01.jpeg"></a>
            <?php endif; ?>
          </figure>
          <div class="media-content">
            <?= $reviews['rAbout'] ?>
            <small>Author: <strong><?= $reviews['ruName'] ?></strong> Posted: <strong><?= $reviews['rDate'] ?></strong> Voted: <strong><?= view_cell('\App\Controllers\Votes::total', 'gameid='.$game['gId'].' userid='.$reviews['rUid']) ?></strong></small>
          </div>
        </article>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
