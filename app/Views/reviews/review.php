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
    <?php if(!empty($reviews['rAbout'])): ?>
    <div class="columns">
      <div class="column is-full-width has-background-color-grey-lighter">
        <article class="media">
          <figure class="media-left image is-96x96">
            <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.$reviews['ruImage'].'.jpeg') === TRUE): ?>
              <a id="Review<?= $reviews['rId'] ?>"><img src="<?= base_url() ?>/images/avatar/<?= $reviews['ruImage'] ?>.jpeg"></a>
            <?php else: ?>
              <a id="Review<?= $reviews['rId'] ?>"><img src="<?= base_url() ?>/images/avatar/avatar01.jpeg"></a>
            <?php endif; ?>
          </figure>
          <div class="media-content">
            <small>Author: <strong><?= $reviews['ruName'] ?></strong> Posted: <strong><?= $reviews['rDate'] ?></strong> Voted: <strong><?= view_cell('\App\Controllers\Votes::total', 'gameid='.$game['gId'].' userid='.$reviews['rUid']) ?></strong></small>
            <?= $reviews['rAbout'] ?>
          </div>
        </article>
        <hr>
      </div>
    </div>
    <?php endif; ?>
    <?php if(empty($reviews['rAbout'])): ?>
      <div class="columns">
        <div class="column is-full-width">
          <article class="media">
            <figure class="media-left image is-96x96">
              <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.$reviews['ruImage'].'.jpeg') === TRUE): ?>
                <a id="Review<?= $reviews['rId'] ?>"><img src="<?= base_url() ?>/images/avatar/<?= $reviews['ruImage'] ?>.jpeg"></a>
              <?php else: ?>
                <a id="Review<?= $reviews['rId'] ?>"><img src="<?= base_url() ?>/images/avatar/avatar01.jpeg"></a>
              <?php endif; ?>
            </figure>
            <figure class="media-right image is-96x96 has-background-primary has-text-centered">
              <br><p class="title is-5"><?= view_cell('\App\Controllers\Votes::total', 'gameid='.$game['gId'].' userid='.$reviews['rUid']) ?></p>
            </figure>
            <hr>
          </article>
          <hr>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>
