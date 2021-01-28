<div class="container">
  <section class="section">
    <div class="container">
      <p class="subtitle is-5">Log into</p>
      <p class="title is-3">your Account:</p>
      <form method="post" action="<?= base_url() ?>/users/loguser" enctype="multipart/form-data">
        <div class="field is-grouped is-grouped-multiline">
          <div class="control is-expanded">
            <input type="text" class="input" name="user" placeholder="Your Username" value="<?= $user ?? '' ?>">
          </div>
          <div class="control is-expanded">
            <input type="password" class="input" name="password" placeholder="Your Password">
          </div>
        </div>
        <div class="field is-grouped is-grouped-centered">
          <div class="control">
            <button class="button is-primary" value="submit">Log In</button>
          </div>
          <div class="control">
            <button class="button is-danger" value="reset">Cancel</button>
          </div>
        </div>
      <div class="field">
          <div class="content">
              <?= \Config\Services::validation()->listErrors('my_list') ?>

              <?php if (isset($errors) && count($errors)): ?>
              <ul class="help is-danger">
                <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
                <?php endforeach ?>
              </ul>
              <?php endif; ?>
          </div>
      </div>
      </form>
      <div class="content has-text-centered mt-2">
        <p class="help">If you forgot your password <a href="<?= base_url() ?>/user/reset">Click here</a></p>
      </div>
    </div>
  </section>
</div>
