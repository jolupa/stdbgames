<fieldset id="features">
	<div class="field is-grouped is-grouped-multiline">
		<?php $total = count ($features); $i = 0; while ( $i < $total): ?>
			<div class="control">
				<label class="checkbox">
					<input type="checkbox" class="checkbox" name="features[]" value="<?= $features [$i] ?>"
					<?php if (isset ($_POST ['features']) && in_array ($features [$i], $_POST ['features']) ||
					isset ($game ['features']) && is_array ($game ['features']) && in_array ($features [$i], $game ['features'])): ?>
						checked
					<?php endif; ?>
					<?php if (isset ($game ['features']) && !is_array ($game ['features']) && $game ['features'] == $features [$i]): ?>
						checked
					<?php endif; ?>
					>
					<?= $features [$i] ?>
				</label>
			</div>
		<?php $i++; endwhile; ?>
	</div>
</fieldset>
