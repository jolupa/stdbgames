<div class="control is-expanded">
	<label class="label">Publisher:</label>
	<?php if (empty($publisher)): ?>
		<a href="<?= base_url() ?>/publishers/insert"><p class="is-size-6 button is-primary">Create a New Publisher</p></a>
	<?php else: ?>
	<div class="select">
		<select name="Publisherid">
		<?php foreach ($publisher as $publisher): ?>
			<option value="<?= $publisher['pId']?>" <?php if ( $publisher['pId'] == $publisherid ): ?>selected<?php endif; ?>><?= $publisher['pName'] ?></option>
		<?php endforeach; ?>
		</select>
	</div>
		<?php endif; ?>
		<p class="help"><a href="<?= base_url() ?>/games/pubform">Insert new Publisher</a></p>
</div>
