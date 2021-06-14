<div id="users_loginform" class="container mt-5">
  <div class="mx-3">
    <div class="columns is-multiline">
      <div class="column is-half">
        <p class="title is-4">Log In</p>
        <form action="<?= base_url ( '/users/userslogin' ) ?>" method="post" enctype="multipart/form-data">
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">E-Mail</label>
              <div class="control">
                <input class="input" type="email" name="email">
                <?php if ( isset ( $validation) && $validation->hasError('email') ): ?>
                  <p class="help has-text-coral"><?= $validation->getError('email') ?></p>
                <?php endif; ?>
              </div>
            </div>
            <div class="control is-expanded">
              <label class="label">Password</label>
              <div class="control">
                <input class="input" type="password" name="password">
                <?php if ( isset ( $validation ) && $validation->hasError('password') ): ?>
                  <p class="help has-text-coral"><?= $validation->getError('password') ?></p>
                <?php endif; ?>
                <?php if ( ! empty ( session ( 'validation_pass' ) ) ): ?>
                  <p class="help has-text-coral"><?= session ( 'validation_pass' ) ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-primary" type="submit">Log In</button>
            </div>
            <div class="control">
              <button class="button is-coral" type="reset">Reset</button>
            </div>
            <div class="control">
              <a href="<?= base_url ( '/users/resetpasswordform' ) ?>"><button class="button is-info" type="button">Change Password</button></a>
            </div>
          </div>
        </form>
      </div>
      <div class="column is-half">
        <p class="title is-4">Sign Up</p>
        <form action="<?= base_url ( '/users/createuserdb' ) ?>" method="post" enctype="multipart/form-data">
          <div class="field">
            <label class="label">Name</label>
            <div class="control">
              <input class="input" name="name_signup" placeholder="John Doe...">
              <?php if ( isset ( $validation ) && $validation->hasError( 'name_signup' ) ): ?>
                <p class="help has-text-coral"><?= $validation->getError( 'name_signup' ) ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="field">
            <label class="label">E-Mail</label>
            <div class="control">
              <input class="input" type="email" name="email_signup" placeholder="john@doe.com">
              <?php if ( isset ( $validation ) && $validation->hasError( 'email_signup' ) ): ?>
                <p class="help has-text-coral"><?= $validation->getError( 'email_signup' ) ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="field">
            <label class="label">Birthdate</label>
            <div class="control">
              <input class="input" type="date" name="birth_date_signup" placeholder="01/02/1975">
              <?php if ( isset ( $validation ) && $validation->hasError( 'birth_date_signup' ) ): ?>
                <p class="help has-text-coral"><?= $validation->getError( 'birth_date_signup' ) ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <label class="checkbox">
                <input type="checkbox" name="patreon">
                Are you a Patreon/Buy Me a Coffe subscriber?
              </label>
            </div>
            <div class="control is-expanded">
              <label class="label">Your Patreon/Buy Me a Coffee username</label>
              <div class="control">
                <input class="input" type="text" name="patreon_username">
                <?php if ( isset ( $validation ) && $validation->hasError( 'patreon_username' ) ): ?>
                  <p class="help has-text-coral"><?= $validation->getError( 'patreon_username' ) ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="field">
            <label class="label">Stadia User Profile Number</label>
            <div class="control">
              <input class="input" type="text" name="stadia_profile" placeholder="12345678901234567890">
              <p class="help">The last number series in your profile URL (https://stadia.google.com/profile/<strong>12345678901234567890</strong>)</p>
            </div>
          </div>
          <div class="field">
            <label class="label">Password</label>
            <div class="control">
              <input class="input" type="password" name="password_signup">
              <?php if ( isset ( $validation ) && $validation->hasError( 'password_signup' ) ): ?>
                <p class="help has-text-coral"><?= $validation->getError( 'password_signup' ) ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="field">
            <label class="label">Confirm Password</label>
            <div class="control">
              <input class="input" type="password" name="confirm_signup">
              <?php if ( isset ( $validation ) && $validation->hasError( 'confirm_signup' ) ): ?>
                <p class="help has-text-coral"><?= $validation->getError( 'confirm_signup' ) ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="field">
            <label class="label">Avatar</label>
            <div class="control">
              <input class="input" type="file" name="image_signup">
              <?php if ( ! empty ( session ( 'validation_image' ) ) ): ?>
                <p class="help has-text-coral"><?= session ( 'validation_image' ) ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="field">
            <div class="control">
              <label class="checkbox">
                <input type="checkbox" name="authorize">
                I accept to be part of the <strong>Stadia GamesDB!</strong> And I know that the data I give to them is not used to trade with other sites or companies.
              </label>
              <?php if ( isset ( $validation ) && $validation->hasError( 'authorize' ) ): ?>
                <p class="help has-text-coral"><?= $validation->getError( 'authorize' ) ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-primary" type="submit">Register</button>
            </div>
            <div class="control">
              <button class="button is-coral" type="reset">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
