<div class="control is-expanded">
	<label class="label">Games:</label>
	<?php if (empty ($games)): ?>
		<a href="<?= base_url() ?>/games/insert"><p class="is-size-6 button is-primary">Create a New Game</p></a>
	<?php else: ?>
	<div class="select">
		<select name="Gameid">
		<?php foreach ($games as $games): ?>
			<option value="<?= $games['gId'] ?>" <?php if ($games['gId'] == $addon['agId']): ?>selected<?php endif; ?>><?= $games['gName'] ?></option>
		<?php endforeach; ?>
		</select>
	</div>
		<?php endif; ?>
		<p class="help"><a href="<?= base_url() ?>/games/insert">Insert a new Game</a></p>
</div>
