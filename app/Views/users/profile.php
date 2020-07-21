<?php if(isset($error)): ?>
  <div class="columns my-2">
    <div class="column is-fullwidth has-text-centered">
      <div class="content">
        <p><?= $error ?></p>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="columns mt-2">
    <div class="column">
      <div class="media">
        <figure class="media-left">
          <p class="image is-128x128">
            <?php if(file_exists(ROOTPATH.'public/images/avatar/'.$user['image'].'.jpeg') == TRUE): ?>
              <img src="<?= base_url() ?>/images/avatar/<?= $user['image'] ?>.jpeg" title="<?= $user['name'] ?>">
            <?php else: ?>
              <img src="<?= base_url() ?>/images/avatar/avatar01.jpeg" title="<?= $user['name'] ?>">
            <?php endif; ?>
          </p>
        </figure>
        <div class="media-content">
          <p class="title is-5"><?= $user['name'] ?> <?php if($user['role'] == 2): ?><span class="tag is-danger has-text-white is-small">MEDIA MEMBER</span><?php endif; ?></p>
          <p class="subtitle is-7">E-mail: <?= $user['email'] ?><br>
            Birthdate: <?= $user['birth_date'] ?><br>
            Registered: <?= $user['created_at'] ?>
          </p>
          <a href="<?= base_url() ?>/user/edit/<?= $user['id'] ?>"><p class="button is-primary is-small has-text-dark">Edit Profile</p></a>
        </div>
      </div>
    </div>
  </div>
  <div class="columns mt-2">
    <div class="column is-fullwidth">
      <p class="subtitle is-5">Your</p>
      <p class="title is-3">Library</p>
    </div>
  </div>
  <?= view_cell('App\Controllers\Libraries::userlibrary', 'user_id='.$user['id']) ?>
  <div class="columns mt-2">
    <div class="column is-fullwidth">
      <p class="subtitle is-5">Your</p>
      <p class="title is-3">Whishlist</p>
    </div>
  </div>
  <?= view_cell('App\Controllers\Wishlists::userwishlist', 'user_id='.$user['id']) ?>
  <?php if(session('role') == 1): ?>
    <?= view_cell('App\Controllers\Users::listusers') ?>
  <?php endif; ?>
<?php endif; ?>
