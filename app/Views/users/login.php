<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-two-thirds">
        <p class="subtitle is-5">Enter at</p>
        <p class="title is-3">your account:</p><br>
        <form method="post" action="<?= base_url() ?>/users/login">
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">Username:</label>
              <input class="input" type="text" name="Username">
            </div>
            <div class="control is-expanded">
              <label class="label">Password:</label>
              <input class="input" type="password" name="Password">
            </div>
          </div>
          <div class="field is-grouped is-grouped-centered">
            <div class="control">
              <button class="button is-primary" type="submit">Enter!</button>
            </div>
          </div>
          <?php if( isset($error)): ?>
            <div class="field">
              <p class="help is-danger"><?= $error ?></p>
            </div>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</section>
