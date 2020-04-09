<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-full-width">
        <div class="media">
          <figure class="media-left">
            <p class="image is-128x128">
              <img title="<?= session('username') ?>" src="<?= base_url() ?>/images/avatar/<?php if ( is_file(ROOTPATH.'/images/avatar'.session('username')) == FALSE): ?><?= session('username') ?><?php else: ?>avatar01<?php endif; ?>">
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-4"><strong><?= $user['Name'] ?></strong></p>
            <p class="subtitle is-7">E-mail: <?= $user['Mail'] ?><br>
                    Birthday: <?= $user['Birthdate'] ?><br>
                    Registry date: <?= $user['Registrydate'] ?>
            </p>
            <p>
              <a href="<?= base_url() ?>/users/edit/<?= session('username') ?>"><span class="tag is-primary"><span class="heading">Edit Profile</span></span></a> <a href="<?= base_url() ?>/users/deleteuser/<?= session('id') ?>"><span class="tag is-danger"><span class="heading">Delete Profile</span></span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
