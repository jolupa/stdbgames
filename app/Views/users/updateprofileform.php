<div id="users_edit_from" class="container mt-5">
  <div class="mx-3">
    <div class="columns">
      <div class="column">
        <p class="title is-4">Update Profile</p>
        <form action="<?= base_url ( '/users/updateprofile' ) ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
          <input type="hidden" name="slug" value="<?= $user['slug'] ?>">
          <div class="field">
            <label class="label">Name</label>
            <div class="control">
              <input class="input" name="name" placeholder="John Doe..." value="<?= $user['name'] ?>">
            </div>
          </div>
          <div class="field">
            <label class="label">E-Mail</label>
            <div class="control">
              <input class="input" type="email" name="email" placeholder="john@doe.com" value="<?= $user['email'] ?>">
            </div>
          </div>
          <div class="field">
            <label class="label">Birthdate</label>
            <div class="control">
              <input class="input" type="date" name="birth_date" placeholder="01/02/1975" value="<?= $user['birth_date'] ?>">
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <label class="checkbox">
                <input type="checkbox" name="patreon" <?php if ( ! empty ( $user['patreon_username'] ) ): ?>checked<?php endif; ?>>
                Are you a Patreon subscriber?
              </label>
            </div>
            <div class="control is-expanded">
              <label class="label">Your Patreon username</label>
              <div class="control">
                <input class="input" type="text" name="patreon_username" <?php if ( ! empty ( $user['patreon_username'] ) ): ?>value="<?= $user['patreon_username'] ?>"<?php endif; ?>>
                <?php if ( isset ( $validation ) && $validation->hasError( 'patreon_username' ) ): ?>
                  <p class="help has-text-coral"><?= $validation->getError( 'patreon_username' ) ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="field">
            <label class="label">Stadia User Profile Number</label>
            <div class="control">
              <input class="input" type="text" name="stadia_profile" placeholder="12345678901234567890" <?php if ( ! empty ( $user['profile'] ) ): ?>value="<?= $user['profile'] ?>"<?php endif; ?>>
              <p class="help">The last number series in your profile URL (https://stadia.google.com/profile/<strong>12345678901234567890</strong>)</p>
            </div>
          </div>
          <div class="field">
            <label class="label">Avatar</label>
            <div class="control">
              <input type="hidden" name="old_image" value="<?= $user['image'] ?>">
              <input class="input" type="file" name="image">
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-primary" type="submit">Update</button>
            </div>
            <div class="control">
              <button class="button is-coral" type="reset">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="columns">
      <div class="column">
        <p class="title is-4 mt-5">Change Password</p>
        <form action="<?= base_url ( 'users/resetpassword/logged' ) ?>" method="post" enctype="multipart/form-data">
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">Current Password</label>
              <input class="input" type="password" name="password">
            </div>
            <div class="control is-expanded">
              <label class="label">New Password</label>
              <input class="input" type="password" name="new_password">
            </div>
            <div class="control is-expanded">
              <label class="label">Confirm New Password</label>
              <input class="input" type="password" name="confirm">
            </div>
          </div>
          <?php if ( ! empty ( session ( 'validation' ) ) ): ?>
            <div class="field">
              <div class="control">
                <p class="help has-text-coral"><?= session ( 'validation' ) ?></p>
              </div>
            </div>
          <?php endif; ?>
          <?php if ( ! empty ( session ( 'success' ) ) ): ?>
            <div class="field">
              <div class="control">
                <p class="title is-4"><?= session ( 'success' ) ?></p>
              </div>
            </div>
          <?php endif; ?>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-coral" type="submit">Change Password</button>
            </div>
            <div class="control">
              <button class="button is-info" type="reset">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
