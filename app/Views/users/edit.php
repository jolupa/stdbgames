<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-full-width">
        <p class="subtitle is-5">Edit</p>
        <p class="title is-3">User:</p>
        <form method="post" action="<?= base_url() ?>/users/updateuser">
          <input type="hidden" name="Userid" value="<?= $getuser['Userid'] ?>">
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">Username</label>
              <input class="input" type="text" name="Username" value="<?= $getuser['Username'] ?>">
            </div>
            <?php if ( session('role') == 1 || session('is_logged' == TRUE)): ?>
            <div class="control">
              <label class="label">Role</label>
              <div class="select">
                <select name="Userrole">
                  <option value="0" <?php if ($getuser['Userrole'] == 0): ?>selected<?php endif; ?>>User</option>
                  <option value="1" <?php if ($getuser['Userrole'] == 1): ?>selected<?php endif; ?> >Admin</option>
                </select>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">E-Mail:</label>
              <input class="input" type="text" name="Usermail" value="<?= $getuser['Usermail'] ?>">
            </div>
            <div class="control is-expanded">
              <label class="label">Birthdate:</label>
              <input class="input" type="text" name="Userbirthdate" value="<?= $getuser['Userbirthdate'] ?>" <?php if( session('username') != $getuser['Username']): ?>disabled<?php endif; ?>>
            </div>
          </div>
            <div class="field is-grouped is-grouped-centered">
              <div class="control">
                <button class="button is-primary" name="submit">Edit!</button>
              </div>
              <div class="control is-light">
                <button class="button" name="cancel">Cancel</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
