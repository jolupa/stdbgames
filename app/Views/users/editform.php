
<div class="columns my-2">
  <div class="column">
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
          <input type="text" class="input" name="birth_date" placeholder="Your birthdate" value="<?= $user['birth_date'] ?>">
        </div>
      </div>
      <div class="field">
        <div class="control is-expanded">
          <input type="file" class="input" name="image">
        </div>
        <p class="help">Images .png .jpg max 4Mb</p>
      </div>
      <div class="field is-grouped is-grouped-centered">
        <div class="control">
          <button class="button is-primary has-text-dark" value="submit">Update!</button>
        </div>
        <div class="control">
          <button class="button is-light has-text-dark" value="reset">Cancel</button>
        </div>
      </div>
    </form>
    <form method="post" action="<?= base_url() ?>/users/changepassdb" enctype="multipart/form-data" class="mt-5">
      <input type="hidden" name="id" value="<?= $user['id'] ?>">
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <input type="password" class="input" name="oldpassword" placeholder="Old Password">
        </div>
        <div class="control is-expanded">
          <input type="password" class="input" name="new_password" placeholder="New Password">
        </div>
          <input type="password" class="input" name="password_check" placeholder="Repeat PassWord">
      </div>
      <div class="field is-grouped is-grouped-centered mt-2">
        <div class="contol">
          <button class="button is-primary has-text-dark" value="submit">Change password!</button>
        </div>
        <div class="control">
          <button class="button is-danger has-text-white" value="reset">Exit</button>
        </div>
      </div>
    </form>
  </div>
</div>
