<div id="users_resetpassword" class="container mt-5">
  <div class="mx-3">
    <div class="columns">
      <div class="column">
        <p class="title is-4">Reset Password</p>
        <form action="<?= base_url ( '/users/resetpassword' ) ?>" method="post" enctype="multipart/form-data">
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">User Name</label>
              <div class="control">
                <input class="input" type="text" name="name">
                <?php if ( isset ( $validation) && $validation->hasError('name') ): ?>
                  <p class="help has-text-coral"><?= $validation->getError('name') ?></p>
                <?php endif; ?>
              </div>
            </div>
            <div class="control is-expanded">
              <label class="label">E-Mail</label>
              <div class="control">
                <input class="input" type="email" name="email">
                <?php if ( isset ( $validation ) && $validation->hasError('email') ): ?>
                  <p class="help has-text-coral"><?= $validation->getError('email') ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-coral" type="submit">Reset Password!</button>
            </div>
            <div class="control">
              <button class="button is-primary" type="reset">Stop!</button>
            </div>
          </div>
          <?php if ( ! empty ( session ( 'validation' ) ) ): ?>
            <p class="help has-text-coral"><?= session ( 'validation' ) ?></p>
          <?php endif; ?>
          <?php if ( ! empty ( session ( 'success' ) ) ): ?>
            <p class="title is-4"><?= session ( 'success' ) ?></p>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</div>
