<div id="user_profile" class="container mt-5">
  <div class="mx-3">
    <div class="columns">
      <div class="column">
        <div class="media">
          <div class="media-left">
            <p class="image is-128x128">
              <img <?php if ( ! empty ( $profile['image'] ) ): ?>src="<?= base_url ( '/img/users/'.$profile['image'].'.png' ) ?>"<?php else: ?>src="<?= base_url ( '/img/users/avatar01.png' ) ?>"<?php endif; ?>>
            </p>
          </div>
          <div class="media-content">
            <p class="title is-4"><?= $profile['name'] ?> Profile:</p>
            <p class="subtitle is-6">
              Birthdate: <?= date ( 'd-m-Y', strtotime ( $profile['birth_date'] ) ) ?><br>
              Registered: <?= date( 'd-m-Y', strtotime ( $profile['created_at'] ) ) ?><br>
              <a href="<?= base_url ( '/users/updateprofileform/'.$profile['id'] ) ?>"><button class="button is-primary mt-1" type="button">Edit</button></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= view_cell ( 'App\Controllers\Libraries::gamesinlibrary' ) ?>
<?= view_cell ( 'App\Controllers\Wishlists::gameswishlisted' ) ?>
<?= view_cell ( 'App\Controllers\Users::lastusers' ) ?>
