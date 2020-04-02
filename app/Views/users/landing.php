<section class="section">
  <div class="container">
    <div class="cards">
      <div class="card-content">
        <div class="content">
          <div class="columns is-centered">
            <div class="column is-two-thirds">
              <p class="subtitle is-5">Your</p>
              <p class="title is-3">Profile:</p>
              <p class="subtitle is-5"><?= session('username') ?></p>
              <?php if( session('is_logged' != TRUE)): ?>
                <p>Seems like you are not logged in. Go to the <a href="<?= base_url() ?>/users/loguser">Login</a> page or <a href="<?= base_url() ?>/users/signuser">Register</a> to access your profile.</p>
              <?php endif; ?>
              <?php if( session('role') == 1): ?>
                <table class="table">
                  <tr>
                    <th>Create</th>
                  </tr>
                  <tr class="buttons">
                    <td><a href="<?= base_url() ?>/games/gameform"><button class="button is-primary">New Game</button></a></td>
                    <td><a href="<?= base_url() ?>/games/devform"><button class="button is-primary">New Developer</button></a></td>
                    <td><a href="<?= base_url() ?>/games/pubform"<button class="button is-primary">New Publisher</button></a></td>
                  </tr>
                </table>
              <?php endif; ?>
              <p>A little bit empty right now! But we are working to put more things! Stay tunned.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
