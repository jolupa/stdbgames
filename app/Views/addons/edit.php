<!-- Game Insert Form -->
<section class="section">
  <div class="container">
    <form method="post" action="<?= base_url() ?>/addons/updateaddon" enctype="multipart/form-data">
			<input type="hidden" name="Slug" value="<?= $addon['aSlug'] ?>">
			<input type="hidden" name="Addonid" value="<?= $addon['aId'] ?>">
      <!-- Name Entry -->
		<div class="field">
      <div class="control is-expanded">
				<label class="label">Name</label>
        <input class="input" type="text" name="Name" value="<?= $addon['aName'] ?>">
      </div>
		</div>
		<!-- Date Entry -->
		<div class="field is-grouped is-grouped-multiline">
			<div class="control is-expanded">
				<label class="label">Release Date</label>
				<input class="input" type="text" name="Release" value="<?= $addon['aRelease'] ?>">
				<p class="help">In the form of YYYY-MM-DD</p>
			</div>
			<!-- Games Entry -->
			<?= view_cell('App\Controllers\Games::list') ?>
      <!-- Developer Entry -->
			<?= view_cell('App\Controllers\Developers::getdevelopers', 'developerid='.$addon['adId']) ?>
      <!-- Publisher Entry -->
			<?= view_cell('App\Controllers\Publishers::getpublishers', 'publisherid='.$addon['apId'])?>
		</div>
      <!-- Game History Entry -->
      <div class="field">
        <label class="label">What's the Addon about:</label>
        <div class="control">
          <textarea class="textarea" name="About"><?= $addon['aAbout'] ?></textarea>
					<p class="help"><strong>HTML Tags:</strong> <code>p, br, a, strong</code></p>
        </div>
      </div>
      <!-- File Chooser Entry -->
      <div class="field is-grouped is-grouped-multiline file has-name is-right">
				<?php if(!$addon['Image']): ?>
					<input type="hidden" name="Image" value="<?= $addon['aImage'] ?>">
				<?php else: ?>
	        <div class="control is-expanded">
	          <label class="file-label" id="insertgame">
	            <input class="file-input" type="file" name="Image">
	            <span class="file-cta is-expanded">
	              <span class="file-icon">
	                <i class="fas fa-upload"></i>
	              </span>
	              <span class="file-label">Choose a file...</span>
	            </span>
	            <span class="file-name"></span>
	          </label>
	          <p class="help">Any Kind of file. Less than 2Mb</p>
	        </div>
				<?php endif; ?>
        <!-- Button Send -->
        <div class="control">
          <button class="button is-primary" type="submit" name="submit">Update Addon</button>
        </div>
        <!-- Button Clear -->
        <div class="control">
          <button class="button is-light" type="reset" name="reset">Clear</button>
        </div>
      </div>
      <div class="field">
        <?= \Config\Services::validation()->listErrors('my_list'); ?>
      </div>
    </form>
  </div>
</section>
<section class="section">
	<div class="container">
		<?= view_cell('App\Controllers\Prices::price') ?>
	</div>
</section>

<script>
  const fileInput = document.querySelector('#insertgame input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#insertgame .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>
