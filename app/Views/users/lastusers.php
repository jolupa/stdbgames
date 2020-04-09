<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column">
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
            <td><strong><?= $lastusers['Name'] ?></strong></td>
            <td><?= $lastusers['Registrydate'] ?></td>
            <td><a href="<?= base_url() ?>/users/edit/<?= $lastusers['Name'] ?>">Edit</a><?php if($lastusers['Role'] == 0): ?> | <a href="<?= base_url() ?>/users/deleteuser/<?= $lastusers['Userid'] ?>">Delete</a><?php endif; ?></td>
          </tr>
          <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
</section>
