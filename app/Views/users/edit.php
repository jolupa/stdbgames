<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-full-width">
        <p class="subtitle is-5">Edit</p>
        <p class="title is-3">User:</p>
        <form method="post" action="<?= base_url() ?>/users/updateuser" enctype="multipart/form-data">
          <input type="hidden" name="Userid" value="<?= $getuser['Userid'] ?>">
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">Username</label>
              <input class="input" type="text" name="Name" value="<?= $getuser['Name'] ?>">
            </div>
            <?php if ( session('role') == 1 || session('is_logged' == TRUE)): ?>
            <div class="control">
              <label class="label">Role</label>
              <div class="select">
                <select name="Role">
                  <option value="0" <?php if ($getuser['Role'] == 0): ?>selected<?php endif; ?>>User</option>
                  <option value="1" <?php if ($getuser['Role'] == 1): ?>selected<?php endif; ?> >Admin</option>
                </select>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">E-Mail:</label>
              <input class="input" type="text" name="Mail" value="<?= $getuser['Mail'] ?>">
            </div>
            <div class="control is-expanded">
              <label class="label">Birthdate:</label>
              <input class="input" type="text" name="Birthdate" value="<?= $getuser['Birthdate'] ?>" <?php if( session('username') != $getuser['Username']): ?>disabled<?php endif; ?>>
            </div>
          </div>
          <?php if(!empty($getuser['Image'])): ?>
          <input type="hidden" name="Image" value="<?= $getuser['Image'] ?>">
          <?php else: ?>
          <div class="field is-grouped file has-name is-right">
            <div class="control is-expanded">
              <label class="file-label" id="insertuser">
                <input class="file-input" type="file" name="Image">
                <span class="file-cta is-expanded">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">Choose a file...</span>
                </span>
                <span class="file-name"></span>
              </label>
            </div>
          <?php endif; ?>
            <div class="field">
              <div class="control">
                <button class="button is-primary" name="submit">Edit!</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  const fileInput = document.querySelector('#insertuser input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#insertuser .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>
