<div class="content mt-2 mb-2">
  <p class="title is-5">Change</p>
  <p class="subtitle is-3">#User role:</p>
  <form method="post" action="<?= base_url() ?>/users/changerole" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
    <div class="field is-grouped is-grouped-multiline">
      <div class="control">
        <div class="select">
          <select class="select" name="role">
            <option value="0" <?php if($user['role'] == 0): ?>selected<?php endif; ?>>User</option>
            <option value="1" <?php if($user['role'] == 1): ?>selected<?php endif; ?>>Admin</option>
            <option value="2" <?php if($user['role'] == 2): ?>selected<?php endif; ?>>Content Creator</option>
          </select>
        </div>
      </div>
      <div class="control">
        <button class="button is-primary" value="submit">Change Role</button>
      </div>
    </div>
  </form>
</div>
