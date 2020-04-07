<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-full-width">
        <div class="cards">
          <div class="card-content">
            <div class="content">
              <div class="media">
                <figure class="media-left">
                  <p class="image is-96x96">
                    <img src="<?= base_url() ?>/images/avatars/<?= session('username') ?>">
                  </p>
                </figure>
                <div class="media-content">
                  <p class="title is-4"><strong><?= $user['Username'] ?></strong></p>
                  <p class="subtitle is-7">E-mail: <?= $user['Usermail'] ?><br>
                    Birthday: <?= $user['Userbirthdate'] ?><br>
                    Registry date: <?= $user['Userdateregistry'] ?><br>
                    <a href="<?= base_url() ?>/users/edit/<?= session('username') ?>"><span class="tag is-primary"><span class="heading">Edit Profile</span></span></a> <a href="<?= base_url() ?>/users/deleteuser/<?= session('id') ?>"><span class="tag is-danger"><span class="heading">Delete Profile</span></span></a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</setion>
