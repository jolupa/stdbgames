<!-- Game Insert Form -->
<section class="section">
	<div class="container">
		<form method="post" action="<?= base_url() ?>/games/updategame" enctype="multipart/form-data">
			<input type="hidden" name="Slug" value="<?= $game['gSlug'] ?>">
			<input type="hidden" name="Gameid" value="<?= $game['gId'] ?>">
			<!-- Name Entry -->
			<div class="field is-grouped is-grouped-multiline">
				<div class="control is-expanded">
					<label class="label">Name</label>
					<input class="input" type="text" name="Name" placeholder="Game's Name" value="<?= $game['gName'] ?>">
				</div>
				<div class="control is-expanded">
					<label class="label">Release Date</label>
					<input class="input" type="text" name="Release" placeholder="YYYY-MM-DD" value="<?= $game['gRelease'] ?>">
				</div>
			</div>
			<!-- Date Entry -->
			<div class="field is-grouped is-grouped-multiline">
				<div class="control">
					<label class="label">Game Is Founder?</label>
					<div class="select">
						<select name="Pro">
							<option value="0" <?php if ($game['gPro'] == 0): ?>selected<?php endif; ?>>No Founders</option>
							<option value="1" <?php if ($game['gPro'] == 1): ?>selected<?php endif; ?>>Is Founders</option>
						</select>
					</div>
				</div>
				<div class="control">
					<label class="label">Is Founder since:</label>
					<input class="input" type="text" name="Profrom" placeholder="YYYY-MM-DD" value="<?= $game['gProfrom'] ?>">
				</div>
				<div class="control">
					<label class="label">Is founder till:</label>
					<input class="input" type="text" name="Protill" placeholder="YYYY-MM-DD" value="<?= $game['gProtill'] ?>">
				</div>
				<!-- Developer Entry -->
				<?= view_cell('App\Controllers\Developers:getdevelopers', 'developerid='.$game['gdId']) ?>
				<!-- Publisher Entry -->
				<?= view_cell('App\Controllers\Publishers::getpublishers', 'publisherid='.$game['gpId']) ?>
			</div>
			<div class="field is-grouped is-grouped-multiline">
				<div class="control is-expanded">
					<label class="label">Is First on Stadia?</label>
					<div class="select">
						<select name="Firstonstadia">
							<option value="0" <?php if($game['gFirstonstadia'] === 0): ?>selected<?php endif; ?>>No</option>
							<option value="1" <?php if($game['gFirstonstadia'] === 1): ?>selected<?php endif; ?>>Yes</option>
						</select>
					</div>
				</div>
				<div class="control is-expanded">
					<label class="label">Is Exclusive to Stadia?</label>
					<div class="select">
						<select name="Stadiaexclusive">
							<option value="0" <?php if($game['gStadiaexclusive'] === 0): ?>selected<?php endif; ?>>No</option>
							<option value="1" <?php if($game['gStadiaexclusive'] === 1): ?>selected<?php endif; ?>>Yes</option>
						</select>
					</div>
				</div>
			</div>
			<div class="field is-grouped is-grouped-multiline">
			<div class="control">
				<label class="label">Price</label>
				<input class="input" name="Releaseprice" placeholder="$$.$$" value="<?= $game['gReleaseprice'] ?>">
			</div>
				<div class="control is-expanded">
					<label class="label">Game SKU</label>
					<input class="input" name="Sku" placeholder="Google's Game SKU" value="<?= $game['gSku'] ?>">
				</div>
				<div class="control is-expanded">
					<label class="label">Game AppId</label>
					<input class="input" name="Appid" placeholder="Google's Appid" value="<?= $game['gAppid'] ?>">
				</div>
			</div>
			<!-- Game History Entry -->
			<div class="field">
				<label class="label">What's the game about:</label>
				<div class="control">
					<textarea class="textarea" name="About" placeholder="Text with info about the game. You can use the HTML tags <p> <br> <a> <strong>"><?= $game['gAbout'] ?></textarea>
					</div>
			</div>
			<!-- File Chooser Entry -->
			<?php if(!empty($game['gImage'])): ?>
				<input type="hidden" name="Image" value="<?= $game['gImage'] ?>">
			<?php else: ?>
				<div class="field is-grouped file has-name is-right">
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
					</div>
				<?php endif; ?>
				<!-- Button Send -->
				<div class="control">
					<button class="button is-primary" type="submit" name="submit">Update Game</button>
				</div>
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
