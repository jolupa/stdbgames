<div class="columns is-multiline">
	<div class="column is-full-width">
		<form method="post" action="<?= base_url() ?>/prices/<?php if($addon): ?>newpriceaddon<?php else: ?>newprice<?php endif; ?>">
			<input type="hidden" name="<?php if($addon): ?>Addonid<?php else: ?>Gameid<?php endif; ?>" value="<?php if($addon): ?><?= $addon['aId'] ?><?php else: ?><?= $game['gId'] ?><?php endif; ?>">
			<?php if($addon): ?>
				<input type="hidden" name="Slug" value="<?= $addon['aSlug'] ?>">
			<?php endif; ?>
			<div class="field is-grouped is-grouped-multiline">
				<div class="control is-expanded">
					<input class="input" type="text" name="Price" placeholder="Price">
				</div>
				<div class="control is-expanded">
					<input class="input" type="text" name="Date" placeholder="YYYY-MM-DD">
				</div>
				<div class="control">
					<div class="select">
						<select name="Discounttype">
							<option value="Normal">Normal</option>
							<option value="Pro">Pro</option>
						</select>
					</div>
				</div>
				<div class="control">
					<button class="button is-primary" type="submit">Add Price</button>
				</div>
			</div>
		</form>
	</div>
</div>
