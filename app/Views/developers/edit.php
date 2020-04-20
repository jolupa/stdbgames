<section class="section">
  <div class="container">
    <form method="post" action="<?= base_url() ?>/developers/updatedeveloper">
      <!-- Name Entry -->
      <div class="field">
        <input type="hidden" name="Developerid" value="<?= $developer['dId'] ?>">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Developer Name" name="Name" value="<?= $developer['dName'] ?>">
        </div>
      </div>
      <!--Website Address -->
      <div class="field">
        <label class="label">Website</label>
        <div class="control">
          <input class="input" type="text" placeholder="https://developer.address" name="Website" <?php if ( isset ($developer['dWebsite'])): ?> value="<?= $developer['dWebsite'] ?>"<?php endif; ?>>
        </div>
      </div>
			<!--About -->
			<div class="field">
        <label class="label">About</label>
        <div class="control">
					<textarea class="textarea"><?php if(isset($developer['dAbout'])): ?><?= $developer['dAbout'] ?><?php endif; ?></textarea>
        </div>
      </div>
      <!-- File Chooser Entry -->
      <div class="field is-grouped">
        <!-- Button Send -->
        <p class="control">
          <button class="button is-primary" type="submit" name="submit">Update Developer</button>
        </p>
        <!-- Button Clear -->
        <p class="control">
          <button class="button is-light" type="reset" name="clear">Clear</button>
        </p>
      </div>
    </form>
  </div>
</section>
