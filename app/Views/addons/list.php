<label class="label">Addons Included in Bundle:</label>
<?php foreach ($addons as $addons): ?>
	<label class="checkbox">
		<input id="<?= $addons['agName'] ?>" type="checkbox" name="Addonsid[]" value="<?= $addons['aId'] ?>">
		<?= $addons['aName'] ?>
	</label>
	&nbsp;
<?php endforeach; ?>
