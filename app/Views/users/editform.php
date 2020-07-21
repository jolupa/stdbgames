
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
          <input type="date" class="input" name="birth_date" placeholder="Your birthdate" value="<?= $user['birth_date'] ?>">
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
  </div>
</div>
