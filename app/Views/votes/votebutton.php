<div class="select">
	<select name="Score">
		<option>Cast Your Vote!</option>
		<?php $i=0; while($i < 11): ?>
			<option value="<?= $i ?>"><?= $i ?></option>
		<?php $i++; endwhile; ?>
	</select>
</div>
