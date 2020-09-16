<div class="container">
  <section class="section">
    <div class="content">
      <p class="subtitle is-5">Remember</p>
      <p class="title is-3">Password</p>
      <form method="post" action="<?= base_url() ?>/users/rememberpassword">
        <div class="field is-grouped is-grouped-multiline">
          <div class="control is-expanded">
            <input class="input" type="email" name="email" placeholder="Your registered email">
          </div>
          <div class="control is-expanded">
            <input class="input" type="text" name="name" placeholder="Your username">
          </div>
        </div>
        <div class="field is-grouped is-grouped-centered is-grouped-multiline">
          <div class="control">
            <button class="button is-primary has-text-dark" value="submit">Reset password</button>
          </div>
          <div class="control">
            <button class="button is-danger has-text-white" value="reset">Start Over</button>
          </div>
        </div>
      </form>
      <?php if(isset($error)): ?>
        <div class="content my-2">
          <p class="help"><?= $error ?></p>
        </div>
      <?php endif; ?>
      <?php if(isset($success)): ?>
        <div class="content my-2">
          <p class="help"><?= $success ?></p>
        </div>
      <?php endif; ?>
    </div>
  </section>
</div>
