<div class="columns mt-2">
  <div class="column">
    <p class="subtitle is-5">Be part</p>
    <p class="title is-3">of Us</p>
    <div class="content">
      <p>We don't use your data to trade with anyone. We only use your data for the correct use of the site and to cast votes over the games we have in the database. Thanks!</p>
    </div>
  </div>
</div>
<div class="columns mb-2">
  <div class="column">
    <form method="post" action="<?= base_url() ?>/users/createuserdb" enctype="multipart/form-data">
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <input type="text" class="input" name="name" placeholder="Your username">
        </div>
        <div class="control is-expanded">
          <input type="password" class="input" name="password" placeholder="Minimum of 6 char. maximum of 20 char.">
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <input type="text" class="input" name="email" placeholder="Your Email address">
        </div>
        <div class="control is-expanded">
          <input type="date" class="input" name="birth_date" placeholder="Your birthdate">
        </div>
      </div>
      <div class="field">
        <div class="control is-expanded">
          <input type="file" class="input" name="image">
        </div>
        <p class="help">Images .png .jpg max 4Mb</p>
      </div>
      <div class="field">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="accept"> I accept to be part of the <strong>Stadia GamesDB!</strong> And I know that the data I give to them is not used to trade with other sites or companies.
          </label>
        </div>
      </div>
      <div class="field">
        <div class="content">
          <?= \Config\Services::validation()->listErrors('my_list'); ?>
        </div>
      </div>
      <div class="field is-grouped is-grouped-centered">
        <div class="control">
          <button class="button is-primary has-text-dark" value="submit">Register!</button>
        </div>
        <div class="control">
          <button class="button is-light has-text-dark" value="reset">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
