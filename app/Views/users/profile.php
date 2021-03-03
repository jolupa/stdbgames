<div class="container">
  <section class="section">
    <div class="content">
      <?php if(isset($error)): ?>
        <p><?= $error ?></p>
      <?php else: ?>
        <div class="media">
          <figure class="media-left">
            <p class="image is-128x128">
              <?php if(file_exists(ROOTPATH.'public/images/avatar/'.$user['image'].'.png')): ?>
                <img src="<?= base_url() ?>/images/avatar/<?= $user['image'] ?>.png" title="<?= $user['name'] ?>">
              <?php else: ?>
                <img src="<?= base_url() ?>/images/avatar/avatar01.png" title="<?= $user['name'] ?>">
              <?php endif; ?>
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-5"><?= $user['name'] ?> <?php if($user['role'] == 2): ?>&nbsp;<span class="has-background-danger has-text-white subtitle is-7 px-1">MEDIA MEMBER</span><?php endif; ?></p>
            <p class="subtitle is-7">E-mail: <?= $user['email'] ?><br>
              Birthdate: <?= date('d-m-Y H:m:s', strtotime($user['birth_date'])) ?><br>
              Registered: <?= date('d-m-Y H:m:s', strtotime($user['created_at'])) ?>
            </p>
            <a href="<?= base_url() ?>/user/edit/<?= $user['id'] ?>"><p class="button is-primary is-small has-text-dark">Edit Profile</p></a>
          </div>
        </div>
      </div>
      <div class="content mt-2">
        <p class="subtitle is-5">Your</p>
        <p class="title is-3">Library</p>
        <?= view_cell('App\Controllers\Libraries::userlibrary', 'user_id='.$user['id']) ?>
      </div>
      <div class="content mt-2">
        <p class="subtitle is-5">Your</p>
        <p class="title is-3">Wishlist</p>
        <?= view_cell('App\Controllers\Wishlists::userwishlist', 'user_id='.$user['id']) ?>
      </div>
      <?php if(session('role') == 1): ?>
        <?= view_cell('App\Controllers\Users::listusers') ?>
      <?php endif; ?>
    <?php endif; ?>
  </section>
</div>
