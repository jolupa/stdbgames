<fieldset id="genres">
	<div class="field is-grouped is-grouped-multiline">
		<?php $total = count ($genres); $i = 0; while ( $i < $total): ?>
			<div class="control">
				<label class="checkbox">
					<input type="checkbox" class="checkbox" name="genres[]" value="<?= $genres [$i] ?>"
					<?php if (isset ($_POST ['genres']) && in_array ($genres [$i], $_POST ['genres']) ||
					isset ($game ['genres']) && is_array ($game ['genres']) && in_array ($genres [$i], $game ['genres'])): ?>
						checked
					<?php endif; ?>
					<?php if (isset ($game ['genres']) && !is_array ($game ['genres']) && $game ['genres'] == $genres [$i]): ?>
						checked
					<?php endif; ?>
					>
					<?= $genres [$i] ?>
				</label>
			</div>
		<?php $i++; endwhile; ?>
	</div>
</fieldset>
