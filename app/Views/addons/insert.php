<!-- Game Insert Form -->
<section class="section">
  <div class="container">
    <form method="post" action="<?= base_url() ?>/addons/insertaddon">
      <!-- Name Entry -->
	    <div class="field">
        <div class="control is-expanded">
	       <label class="label">Name</label>
         <input class="input" type="text" name="Name" placeholder="Addons's Name">
        </div>
      </div>
      <!-- Founder Entry -->
    <div class="field is-grouped is-grouped-multiline">
      <!-- Date Entry -->
      <div class="control">
        <label class="label">Release Date</label>
        <input class="input" type="text" name="Release" placeholder="YYYY-MM-DD">
      </div>
      <?= view_cell('App\Controllers\Games::list') ?>
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
    <!-- File Chooser Entry -->
    <div class="field is-grouped is-grouped-multiline file has-name is-right">
      <!-- Button Send -->
      <div class="control">
        <button class="button is-primary" type="submit" name="submit">Add Game</button>
      </div>
      <!-- Button Clear -->
      <div class="control">
        <button class="button is-light" type="reset" name="reset">Clear</button>
      </div>
    <div class="field">
      <?= \Config\Services::validation()->listErrors('my_list'); ?>
    </div>
    </form>
  </div>
</section>
