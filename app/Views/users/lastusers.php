<section class="section">
  <div class="container">
    <div class="cards">
      <div class="card-content">
        <div class="content">
          <div class="columns">
            <div class="column is-full-width">
              <p class="subtitle is-5">Last</p>
              <p class="title is-3">Subscribers:</p>
              <table class="table">
                <tr>
                  <th>User Name</th>
                  <th>Registered since</th>
                  <th>Birthday</th>
                  <th>Mail</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($lastusers as $lastusers): ?>
                <tr>
                  <td><a href="<?= base_url() ?>/users/edit/<?= $lastusers['Username'] ?>" alt="Edit <?= $lastusers['Username'] ?>"><?= $lastusers['Username'] ?></a></td>
                  <td><?= $lastusers['Userdateregistry'] ?></td>
                  <td><?= $lastusers['Userbirthdate'] ?></td>
                  <td><?= $lastusers['Usermail'] ?></td>
                  <td><?php if($lastusers['Userrole'] == 0): ?> <a href="<?= base_url() ?>/users/deleteuser/<?= $lastusers['Userid'] ?>">Delete</a><?php endif; ?></td>
                </tr>
              <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
