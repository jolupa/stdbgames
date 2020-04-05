<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-full-width">
        <div class="card">
          <div class="card-content">
            <div class="content">
              <div class="media-content">
                <p class="subtitle is-5">Last</p>
                <p class="title is-3">Subscribers:</p>
                <table class="table is-fullwidth">
                  <tr>
                    <th>User Name</th>
                    <th>Registered since</th>
                    <th>Action</th>
                  </tr>
                  <?php foreach ($lastusers as $lastusers): ?>
                  <tr>
                    <td><strong><?= $lastusers['Username'] ?></strong></td>
                    <td><?= $lastusers['Userdateregistry'] ?></td>
                    <td><a href="<?= base_url() ?>/users/edit/<?= $lastusers['Username'] ?>">Edit</a><?php if($lastusers['Userrole'] == 0): ?> | <a href="<?= base_url() ?>/users/deleteuser/<?= $lastusers['Userid'] ?>">Delete</a><?php endif; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
