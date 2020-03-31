<section class="section">
  <div class="container">
    <form method="post" action="<?= base_url() ?>/games/insertdeveloper">
      <!-- Name Entry -->
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Developer Name" name="Name">
        </div>
      </div>
      <!--Website Address -->
      <div class="field">
        <label class="label">Website</label>
        <div class="control">
          <input class="input" type="text" placeholder="https://developer.address" name="Website">
        </div>
      </div>
      <!-- File Chooser Entry -->
      <div class="field is-grouped">
        <!-- Button Send -->
        <p class="control">
          <button class="button is-primary" type="submit" name="submit">Add Developer</button>
        </p>
        <!-- Button Clear -->
        <p class="control">
          <button class="button is-light" type="reset" name="clear">Clear</button>
        </p>
      </div>
      <div class="field">
        <?= \Config\Services::validation()->listErrors('my_list'); ?>
      </div>
    </form>
  </div>
</section>
