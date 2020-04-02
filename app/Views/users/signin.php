<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-two-thirds">
        <p class="subtitle is-5">Be part</p>
        <p class="title is-3">of Us:</p>
        <form method="post" action="<?= base_url() ?>/users/insertuser">
          <p class="is-4">We don't use your data to trade with anyone. We only use your data for the correct use of the site and to cast votes over the games we have in the database. Thanks!</p><br>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">Username</label>
              <input class="input" type="text" name="Username">
            </div>
            <div class="control is-expanded">
              <label class="label">Password</label>
              <input class="input" type="password" name="Userpassword">
              <p class="help">6 characters minimum-10 maximum</p>
            </div>
          </div>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">E-Mail:</label>
              <input class="input" type="text" name="Usermail">
            </div>
            <div class="control is-expanded">
              <label class="label">Birthdate:</label>
              <input class="input" type="text" name="Userbirthdate">
              <p class="help">In the form of YYYY-MM-DD</p>
            </div>
          </div>
          <div class="field">
            <div class="control">
              <label class="checkbox">
                <input type="checkbox" name="accept"> I accept to be part of the <strong>Stadia GamesDB!</strong> And I know that the data I give to them is not used to trade with other sites or companies.
              </label>
            </div>
            <div class="field is-grouped is-grouped-centered">
              <div class="control">
                <button class="button is-primary" name="submit">Register!</button>
              </div>
              <div class="control is-light">
                <button class="button" name="cancel">Cancel</button>
              </div>
            </div>
            </div>
            <div class="field">
              <?= \Config\Services::validation()->listErrors('my_list'); ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
