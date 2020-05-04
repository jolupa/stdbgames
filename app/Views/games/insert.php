<!-- Game Insert Form -->
<section class="section">
  <div class="container">
    <form method="post" action="<?= base_url() ?>/games/insertgame" enctype="multipart/form-data">
      <!-- Name Entry -->
		<div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
	       <label class="label">Name</label>
         <input class="input" type="text" name="Name" placeholder="Game's Name">
        </div>
			<!-- Date Entry -->
			<div class="control is-expanded">
				<label class="label">Release Date</label>
				<input class="input" type="text" name="Release" placeholder="YYYY-MM-DD">
			</div>
      </div>
      <!-- Founder Entry -->
    <div class="field is-grouped is-grouped-multiline">
      <div class="control">
        <label class="label">Game Is Founder?</label>
        <div class="select">
            <select name="Pro">
              <option value="0">No Founders</option>
              <option value="1">Is Founders</option>
            </select>
        </div>
      </div>
      <div class="control">
        <label class="label">Is Founder since:</label>
        <input class="input" type="text" name="Profrom" placeholder="YYYY-MM-DD">
      </div>
      <div class="control">
        <label class="label">Is Founder till:</label>
        <input class="input" type="text" name="Protill" placeholder="YYYY-MM-DD">
      </div>
      <!-- Developer Entry -->
			<?= view_cell('App\Controllers\Developers::getdevelopers') ?>
      <!-- Publisher Entry -->
			<?= view_cell('App\Controllers\Publishers::getpublishers') ?>
		</div>
    <div class="field is-grouped is-grouped-multiline">
      <div class="control">
        <label class="label">Price</label>
        <input class="input" name="Releaseprice" placeholder="$$.$$">
      </div>
      <div class="control is-expanded">
        <label class="label">Game SKU</label>
        <input class="input" name="Sku" placeholder="Google's Game SKU">
      </div>
      <div class="control is-expanded">
        <label class="label">Game AppId</label>
        <input class="input" name="Appid" placeholder="Google's AppId">
      </div>
    </div>
    <!-- Game History Entry -->
    <div class="field">
      <label class="label">What's the game about:</label>
      <div class="control">
        <textarea class="textarea" name="About" placeholder="Text with info about the game. You can use the HTML tags <p> <br> <a> <strong>"></textarea>
      </div>
    </div>
    <!-- File Chooser Entry -->
    <div class="field is-grouped is-grouped-multiline file has-name is-right">
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
      <!-- Button Send -->
      <div class="control">
        <button class="button is-primary" type="submit" name="submit">Add Game</button>
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

<script>
  const fileInput = document.querySelector('#insertgame input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#insertgame .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>
