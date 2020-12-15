<div class="container">
  <section class="section">
    <p class="subtitle is-5">Edit</p>
    <p class="title is-3">Profile:</p>
    <div class="content mt-2">
      <form method="post" action="<?= base_url() ?>/users/updateuserdb" enctype="multipart/form-data">
        <input type="hidden" name="oldimage" value="<?= $user['image'] ?>">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="hidden" name="slug" value="<?= $user['slug'] ?>">
        <div class="field is-grouped is-grouped-multiline">
          <div class="control is-expanded">
            <input type="text" class="input" name="name" placeholder="Your username" value="<?= $user['name'] ?>">
          </div>
        </div>
        <div class="field is-grouped is-grouped-multiline">
          <div class="control is-expanded">
            <input type="text" class="input" name="email" placeholder="Your Email address" value="<?= $user['email'] ?>">
          </div>
          <div class="control is-expanded">
            <input type="date" class="input" name="birth_date" placeholder="Your birthdate" value="<?= $user['birth_date'] ?>">
          </div>
        </div>
        <div class="field">
          <div class="control is-expanded">
            <input type="file" class="input" name="image">
          </div>
          <p class="help">Images .png .jpg max 4Mb</p>
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-primary" value="submit">Update!</button>
          </div>
          <div class="control">
            <button class="button is-danger" value="reset">Cancel</button>
          </div>
        </div>
      </form>
    </div>
    <div class="content mt-2">
      <p class="subtitle is-5">Change</p>
      <p class="title is-3">Password:</p>
      <form method="post" action="<?= base_url() ?>/users/changepassword" class="mt-4">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <div class="field is-grouped is-grouped-multiline">
          <div class="control is-expanded">
            <input type="password" class="input" name="oldpassword" placeholder="Your old password">
          </div>
          <div class="control is-expanded">
            <input type="password" class="input" name="newpassword" placeholder="New Password">
          </div>
          <div class="control is-expanded">
            <input type="password" class="input" name="checkpassword" placeholder="New Password Again">
          </div>
        </div>
        <div class="field is-grouped is-grouped-multiline">
          <div class="control">
            <button class="button is-primary" value="submit">Change Password!</button>
          </div>
          <div class="control">
            <button class="button is-danger" value="reset">Start Over</button>
          </div>
        </div>
      </form>
      <?php if(session('errorpass') !== NULL): ?>
        <div class="content">
          <p class="help"><?= session('errorpass') ?></p>
        </div>
      <?php endif; ?>
    </div>
  </section>
</div>
