<div class="control is-expanded">
	<label class="label">Developer:</label>
	<?php if (empty ($developer)): ?>
		<a href="<?= base_url() ?>/developers/insert"><p class="is-size-6 button is-primary">Create a New Developer</p></a>
	<?php else: ?>
	<div class="select">
		<select name="Developerid">
		<?php foreach ($developer as $developer): ?>
			<option value="<?= $developer['dId'] ?>" <?php if ($developer['dId'] == $developerid): ?>selected<?php endif; ?>><?= $developer['dName'] ?></option>
		<?php endforeach; ?>
		</select>
	</div>
		<?php endif; ?>
		<p class="help"><a href="<?= base_url() ?>/developers/insert">Insert new Developer</a></p>
</div>
