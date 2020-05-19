<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-full-width">
        <p class="subtitle is-5">Edit</p>
        <p class="title is-3">User:</p>
        <form method="post" action="<?= base_url() ?>/users/updateuser" enctype="multipart/form-data">
          <input type="hidden" name="Userid" value="<?= $user['uId'] ?>">
					<input type="hidden" name="Slug" value="<?= $user['uSlug'] ?>">
          <input type="hidden" name="Registrydate" value="<?= $user['uRegistrydate'] ?>">
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">Username</label>
              <input class="input" type="text" name="Name" value="<?= $user['uName'] ?>">
            </div>
            <?php if ( session('role') == 1): ?>
            <div class="control">
              <label class="label">Role</label>
              <div class="select">
                <select name="Role">
                  <option value="0" <?php if ($user['uRole'] == 0): ?>selected<?php endif; ?>>User</option>
                  <option value="1" <?php if ($user['uRole'] == 1): ?>selected<?php endif; ?>>Admin</option>
                  <option value="3" <?php if ($user['uRole'] == 2): ?>selected<?php endif; ?>>Pro</option>
                </select>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">E-Mail:</label>
              <input class="input" type="text" name="Mail" value="<?= $user['uMail'] ?>">
            </div>
            <div class="control is-expanded">
              <label class="label">Birthdate:</label>
              <input class="input" type="text" name="Birthdate" value="<?= $user['uBirthdate'] ?>">
            </div>
          </div>
          <div class="field is-grouped is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <input type="file" name="Image" class="input" placeholder="Images .png .jpeg max. 4MB">
              <p class="help">Images .png .jpeg max. 4MB without spaces</p>
            </div>
            <input type="hidden" name="oldimage" value="<?= $user['Image'] ?>">
            <div class="control">
              <button class="button is-primary" name="submit">Edit!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
