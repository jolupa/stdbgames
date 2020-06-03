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
      <div class="column is-full-width">
        <article class="media">
          <figure class="media-left image is-96x96">
            <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.$reviews['ruImage'].'.jpeg') === TRUE): ?>
              <a id="Review<?= $reviews['rId'] ?>"><img src="<?= base_url() ?>/images/avatar/<?= $reviews['ruImage'] ?>.jpeg"></a>
            <?php else: ?>
              <a id="Review<?= $reviews['rId'] ?>"><img src="<?= base_url() ?>/images/avatar/avatar01.jpeg"></a>
            <?php endif; ?>
            <?php if($reviews['ruRole'] == 2): ?>
              <div class="tags is-normal">
                <p class="tag is-danger has-text-white">MEDIA MEMBER</p>
              </div>
            <?php endif; ?>
          </figure>
          <div class="media-content">
            <small>Author: <strong><?= $reviews['ruName'] ?></strong> Posted: <strong><?= $reviews['rDate'] ?></strong> Voted: <strong><?= $reviews['rScore'] ?></strong></small>
            <?= $reviews['rAbout'] ?>
            <?php if($reviews['rExturl']): ?>
              <small>Read full review in <a href="<?= $reviews['rExturl'] ?>" target="_blank"><?= $reviews['rExturl'] ?></a></small>
            <?php endif; ?>
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
            <figure class="media-left image is-64x64">
              <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.$reviews['ruImage'].'.jpeg') === TRUE): ?>
                <a id="Review<?= $reviews['rId'] ?>"><img src="<?= base_url() ?>/images/avatar/<?= $reviews['ruImage'] ?>.jpeg"></a>
              <?php else: ?>
                <a id="Review<?= $reviews['rId'] ?>"><img src="<?= base_url() ?>/images/avatar/avatar01.jpeg"></a>
              <?php endif; ?>
            </figure>
            <div class="media-content">
              <small><?= $reviews['ruName'] ?> Just voted with <strong><?= $reviews['rScore'] ?></strong> on <?= $reviews['rDate'] ?></small>
            </div>
            <hr>
          </article>
          <hr>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>
