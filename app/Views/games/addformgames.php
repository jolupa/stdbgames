<section class="section">
		<div class="container is-max-widescreen">
			<?php if (isset ($game ['id'])): ?>
				<nav class="breadcrumb is-centered" aria-label="breadcrumbs">
					<ul>
						<li><a href="#trailer">Trailer</a></li>
						<li><a href="#interview">Interview</a></li>
						<li><a href="#">Deals</a></li>
					</ul>
				</nav>
			<?php endif; ?>
			<h1 class="title">
				Add/Edit Game:
			</h1>
			<form action="<?= base_url ( '/games/savegame') ?>" method="post" enctype="multipart/form-data">
				<?php if (!empty ($game ['id'])): ?>
					<input type="hidden" name="id" value="<?= $game ['id'] ?>">
					<input type="hidden" name="old_slug" value="<?= $game ['slug'] ?>">
					<input type="hidden" name="old_image" value="<?= $game ['image'] ?>">
				<?php endif; ?>
				<h2>
					Release date:
				</h2>
				<div class="control">
					<div class="field is-grouped is-grouped-multiline">
						<div class="control">
							<label class="label">Day:</label>
							<input type="text" id="release_day" class="input" type="text" name="release_day"
							<?php if (isset ($_POST ['release_day']) && !empty ($_POST['release_day'])): ?>
								value="<?= $_POST['release_day'] ?>"
							<?php endif; ?>
							<?php if (isset ($game ['release_day']) && $game ['release_day'] != ''): ?>
								value="<?= $game ['release_day'] ?>"
							<?php endif; ?>
							>
						</div>
						<div class="control">
							<label class="label">Month:</label>
							<input type="text" id="release_month" class="input" type="text" name="release_month"
							<?php if (isset ($_POST ['release_month']) && !empty ($_POST['release_month'])): ?>
								value="<?= $_POST['release_month'] ?>"
							<?php endif; ?>
							<?php if (isset ($game ['release_month']) && $game ['release_month'] != ''): ?>
								value="<?= $game ['release_month'] ?>"
							<?php endif; ?>
							>
						</div>
						<div class="control">
							<label class="label">Year:</label>
							<input type="text" id="release_day" class="input" type="text" name="release_year"
							<?php if (isset ($_POST ['release_year']) && !empty ($_POST['release_year'])): ?>
								value="<?= $_POST['release_year'] ?>"
							<?php endif; ?>
							<?php if (isset ($game ['release_year']) && $game ['release_year'] != ''): ?>
								value="<?= $game ['release_year'] ?>"
							<?php endif; ?>
							>
						</div>
					</div>
				</div>
				<h2>
					Info:
				</h2>
				<div class="field is-grouped is-grouped-multiline">
					<div class="control">
						<label class="checkbox">
							<input type="checkbox" class="checkbox" name="rumor"
							<?php if (isset ($_POST ['rumor']) && !empty ($_POST['rumor']) ||
							isset ($game ['rumor']) && $game ['rumor'] == 1): ?>
								checked
							<?php endif; ?>
							>
							It's a Rumor?
						</label>
					</div>
					<div class="control">
						<label class="checkbox">
							<input type="checkbox" class="checkbox" name="dropped"
							<?php if (isset ($_POST ['dropped']) && !empty ($_POST['dropped']) ||
							isset ($game ['dropped']) && $game ['dropped'] == 1): ?>
								checked
							<?php endif; ?>
							>
							Dropped From Store
						</label>
					</div>
					<div class="control">
						<label class="checkbox">
							<input type="checkbox" class="checkbox" name="twitter"
							<?php if (isset ($_POST ['twitter']) && !empty ($_POST['twitter'])): ?>
								checked
							<?php endif; ?>
							>
							Send Info Tweet?
						</label>
					</div>
				</div>
				<h2>
					Editions Information:
				</h2>
				<div class="field is-grouped is-grouped-multiline">
					<div class="control">
						<label class="checkbox">
							<input type="checkbox" class="checkbox" id="edition" name="is_edition"
							<?php if (isset ($_POST ['is_edition']) ||
							isset ($game ['is_edition']) && $game ['is_edition'] == 1): ?>
								checked
							<?php endif; ?>
							>
							Is An Edition?
						</label>
					</div>
					<?= view_cell ('App\Controllers\Games::allgames') ?>
				</div>
				<h2>
					Basic:
				</h2>
				<div class="field is-grouped is-grouped-multiline">
					<div class="control is-expanded">
						<label class="label">Name:</label>
						<input type="text" class="input" type="text" name="name"
						<?php if (isset ($_POST ['name']) && !empty ($_POST['name'])): ?>
							value="<?= $_POST['name'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['name']) && $game ['name'] != ''): ?>
							value="<?= $game ['name'] ?>"
						<?php endif; ?>
						>
					</div>
					<div class="control is-expanded">
						<label class="label">Game Website:</label>
						<input type="text" id="game_website" class="input" type="text" name="url"
						<?php if (isset ($_POST ['url']) && !empty ($_POST['url'])): ?>
							value="<?= $_POST['url'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['url']) && $game ['url'] != ''): ?>
							value="<?= $game ['url'] ?>"
						<?php endif; ?>
						>
					</div>
				</div>
				<div class="field is-grouped is-grouped-multiline">
					<div class="control is-expanded">
						<label class="label">Game Twitter:</label>
						<input type="text" id="game_twitter" class="input" type="text" name="twitter_account"
						<?php if (isset ($_POST ['twitter_account']) && !empty ($_POST['twitter_account'])): ?>
							value="<?= $_POST['twitter_account'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['twitter_account']) && $game ['twitter_account'] != ''): ?>
							value="<?= $game ['twitter_account'] ?>"
						<?php endif; ?>
						>
					</div>
					
					<div class="control is-expanded">
						<label class="label">Price:</label>
						<input type="text" class="input" type="text" name="price"
						<?php if (isset ($_POST ['price']) && !empty ($_POST['price'])): ?>
							value="<?= $_POST['price'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['price']) && $game ['price'] != ''): ?>
							value="<?= $game ['price'] ?>"
						<?php endif; ?>
						>
						<div class="control">
							<label class="checkbox">
								<input type="checkbox" id="is_f2p" name="is_f2p"
								<?php if (isset ($_POST ['is_f2p']) && !empty ($_POST['is_f2p']) ||
								isset ($game ['is_f2p']) && $game ['is_f2p'] == 1): ?>
									checked
								<?php endif; ?>
								>
								Is F2P?
							</label>
							<label class="checkbox">
								<input type="checkbox" id="ed_only" name="ed_only"
								<?php if (isset ($_POST ['ed_only']) && !empty ($_POST['ed_only']) ||
								isset ($game ['ed_only']) && $game ['ed_only'] == 1): ?>
									checked
								<?php endif; ?>
								>
								Only Avalaible With Editions
							</label>
						</div>
					</div>
				</div>
				<div class="field">
					<div class="control is-expanded">
						<label class="label">About The Game:</label>
						<textarea id="about" class="textarea" name="about"><?php if (isset ($_POST ['about']) && !empty ($_POST['about'])): ?><?= $_POST['about'] ?><?php endif; ?><?php if (isset ($game ['about']) && !empty ($game ['about'])): ?><?= $game ['about'] ?><?php endif; ?></textarea>
						<label class="checkbox">* We Use Markdown in this field.</label>
					</div>
				</div>
				<div class="field is-grouped is-grouped-multiline">
					<?= view_cell ('App\Controllers\Companies::developers') ?>
          <?= view_cell ('App\Controllers\Companies::publishers') ?>
					<div class="control is-expanded">
						<label class="label">Image</label>
						<input type="file" class="input" name="image">
						<?php if ( isset ( $validation ) && $validation->hasError( 'image' ) ): ?>
							<div class="control">
								<label class="help has-text-danger">
									<?= $validation->getError( 'image' ) ?>
								</label>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<h2>
					Features:
				</h2>
				<?= view_cell ('App\Controllers\Games::features') ?>
				<h2>
					Genres:
				</h2>
				<?= view_cell ('App\Controllers\Games::genres') ?>
				<h2>
					Pro:
				</h2>
				<div class="field is-grouped is-grouped-multiline">
					<div class="control is-expanded">
						<label class="checkbox">
							<input type="checkbox" id="pro" class="checkbox" name="pro"
							<?php if (isset ($_POST) && !empty ($_POST['pro']) || isset ($game ['pro']) && $game ['pro'] == 1): ?>
								checked
							<?php endif; ?>>
							Is Pro?
						</label>
					</div>
					<div class="control is-expanded">
						<label class="label">From Date:</label>
						<input type="date" id="pro_from" class="input" name="pro_from"
						<?php if (isset ($_POST ['pro_from']) && !empty ($_POST['pro_from'])): ?>
							value="<?= $_POST['pro_from'] ?>"
						<?php endif; ?>
						<?php if ( isset ($game ['pro_from']) && $game ['pro_from'] != ''): ?>
							value="<?= $game ['pro_from'] ?>"
						<?php endif; ?>
						>
						<?php if ( isset ( $validation ) && $validation->hasError( 'pro_from' ) ): ?>
							<div class="control">
	            	<label class="help has-text-danger">
									<?= $validation->getError( 'pro_from' ) ?>
								</label>
							</div>
	          <?php endif; ?>
					</div>
					<div class="control is-expanded">
						<label class="label">To Date:</label>
						<input type="date" id="pro_to" class="input" name="pro_till"
						<?php if (!empty ($_POST['pro_till'])): ?>
							value="<?= $_POST['pro_till'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['pro_till'])): ?>
							value="<?= $game ['pro_till'] ?>"
						<?php endif; ?>
						>
					</div>
				</div>
				<h2>
					Stadia Links:
				</h2>
				<div class="field is-grouped is-grouped-multiline">
					<div class="control is-expanded">
						<label class="label">Demo AppId</label>
						<input class="input" type="text" name="demo_appid"
						<?php if (isset ($_POST ['demo_appid']) && !empty ($_POST['demo_appid'])): ?>
							value="<?= $_POST['demo_appid'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['demo_appid']) && $game ['demo_appid'] != ''): ?>
							value="<?= $game ['demo_appid'] ?>"
						<?php endif; ?>
						>
					</div>
					<div class="control is-expanded">
						<label class="label">Demo SKU</label>
						<input class="input" type="text" name="demo_sku"
						<?php if (isset ($_POST ['demo_sku']) && !empty ($_POST['demo_sku'])): ?>
							value="<?= $_POST['demo_appid'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['demo_sku']) && $game ['demo_sku'] != ''): ?>
							value="<?= $game ['demo_sku'] ?>"
						<?php endif; ?>
						>
					</div>
				</div>
				<div class="field is-grouped is-grouped-multiline">
					<div class="control is-expanded">
						<label class="label">Pre Order AppId</label>
						<input class="input" type="text" name="preorder_appid"
						<?php if (isset ($_POST ['preorder_appid']) && !empty ($_POST['preorder_appid'])): ?>
							value="<?= $_POST['demo_appid'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['preorder_appid']) && $game ['preorder_appid'] != ''): ?>
							value="<?= $game ['preorder_appid'] ?>"
						<?php endif; ?>
						>
					</div>
					<div class="control is-expanded">
						<label class="label">Pre Order SKU</label>
						<input class="input" type="text" name="preorder_sku"
						<?php if (isset ($_POST ['preorder_sku']) && !empty ($_POST['preorder_sku'])): ?>
							value="<?= $_POST['preorder_sku'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['preorder_sku']) && $game ['preorder_sku'] != ''): ?>
							value="<?= $game ['preorder_sku'] ?>"
						<?php endif; ?>
						>
					</div>
				</div>
				<div class="field is-grouped is-grouped-multiline">
					<div class="control is-expanded">
						<label class="label">AppId</label>
						<input class="input" type="text" name="appid"
						<?php if (isset ($_POST ['appid']) && !empty ($_POST['appid'])): ?>
							value="<?= $_POST['appid'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['appid']) && $game ['appid'] != ''): ?>
							value="<?= $game ['appid'] ?>"
						<?php endif; ?>
						>
					</div>
					<div class="control is-expanded">
						<label class="label">SKU</label>
						<input class="input" type="text" name="sku"
						<?php if (isset ($_POST ['sku']) && !empty ($_POST['sku'])): ?>
							value="<?= $_POST['sku'] ?>"
						<?php endif; ?>
						<?php if (isset ($game ['sku']) && $game ['sku'] != ''): ?>
							value="<?= $game ['sku'] ?>"
						<?php endif; ?>
						>
					</div>
				</div>
				<div class="field is-grouped">
					<div class="control is-expanded">
					</div>
					<div class="control">
						<button class="button is-primary" type="submit">Add/Edit</button>
					</div>
					<div class="control">
						<button class="button is-danger" type="reset">Reset</button>
					</div>
				</div>
			</form>
		</div>
	</section>
	<script>
	var update_edition = function () {
	    if ($("#edition").is(":checked")) {
	        $('#wich_game').prop('disabled', false);
					$('#game_website').prop('disabled', 'disabled');
					$('#game_twitter').prop('disabled', 'disabled');
					$('#is_f2p').prop('disabled', 'disabled');
					$('#ed_only').prop('disabled', 'disabled');
					$('#about').prop('disabled', 'disabled');
					$('#developer').prop('disabled', 'disabled');
					$('#publisher').prop('disabled', 'disabled');
					$('#features').prop('disabled', 'disabled');
					$('#genres').prop('disabled', 'disabled');
	    }
	    else {
	        $('#wich_game').prop('disabled', 'disabled');
					$('#game_website').prop('disabled', false);
					$('#game_twitter').prop('disabled', false);
					$('#is_f2p').prop('disabled', false);
					$('#ed_only').prop('disabled', false);
					$('#about').prop('disabled', false);
					$('#developer').prop('disabled', false);
					$('#publisher').prop('disabled', false);
					$('#features').prop('disabled', false);
					$('#genres').prop('disabled', false);
	    }
	};

	$(update_edition);
	$("#edition").change(update_edition);

	var update_pro = function () {
			if ($("#pro").is(":checked")) {
					$('#pro_from').prop('disabled', false);
					$('#pro_to').prop('disabled', false);
			}
			else {
					$('#pro_from').prop('disabled', 'disabled');
					$('#pro_to').prop('disabled','disabled');
			}
	};

	$(update_pro);
	$("#pro").change(update_pro);
	</script>

	<?php if (isset ($game ['id'])): ?>
		<?= view_cell ('App\Controllers\Gallery::galleryform', 'id='.$game ['id']) ?>
	<?php else: ?>
		<?= view_cell ('App\Controllers\Gallery::galleryform') ?>
	<?php endif; ?>

	<?php if (isset ($game ['id'])): ?>
		<?= view_cell ('App\Controllers\Interviews::interviewform', 'id='.$game ['id']) ?>
	<?php else: ?>
		<?= view_cell ('App\Controllers\Interviews::interviewform') ?>
	<?php endif; ?>

	<?php if (isset ($game ['id'])): ?>
		<?= view_cell ('App\Controllers\Games::editionstoupdate', 'id='.$game ['id']) ?>
	<?php endif; ?>
