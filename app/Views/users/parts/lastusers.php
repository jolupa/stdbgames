<div id="last_registered_users" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Last Users Registered</p>
    <table class="table is-fullwidth">
      <thead>
        <tr class="has-text-centered">
          <th class="is-hidden-mobile">Image</th>
          <th>Name</th>
          <th class="is-hidden-mobile">Birthdate</th>
          <th>Change Role</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $users as $users ): ?>
          <tr class="has-text-centered">
            <td class="is-hidden-mobile">
              <figure class="image is-32x32">
                <img src="
                <?php if ( ! empty ( $users['image'] ) ): ?>
                  <?= base_url ( '/img/users/'.$users['image'].'.png' ) ?>
                <?php else: ?>
                  <?= base_url ( '/img/users/avatar01.png' ) ?>
                <?php endif; ?>">
              </figure>
            </td>
            <td><?= $users['name'] ?></td>
            <td class="is-hidden-mobile"><?= date ('d-m-Y', strtotime ( $users['birth_date'] ) ) ?></td>
            <td>
              <form action="<?= base_url ( '/users/changerole' ) ?>" method="post" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="id" value="<?= $users['id'] ?>">
                <div class="field is-grouped">
                  <div class="control">
                    <div class="select">
                      <select name="role">
                        <option value="0" <?php if ( $users['role'] == 0 ): ?>selected<?php endif; ?>>User</option>
                        <option value="1" <?php if ( $users['role'] == 1 ): ?>selected<?php endif; ?>>Staff</option>
                        <option value="2" <?php if ( $users['role'] == 2 ): ?>selected<?php endif; ?>>Content Creators</option>
                      </select>
                    </div>
                  </div>
                  <div class="control">
                    <button class="button is-primary" type="submit">Update</button>
                  </div>
                </div>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?= $pager->links( 'users' ) ?>
  </div>
</div>
