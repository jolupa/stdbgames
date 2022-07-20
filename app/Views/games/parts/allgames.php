<div class="control">
	<label class="label">To Wich Game?</label>
	<div class="select">
		<select name="edition_game_id" id="wich_game">
			<option></option>
			<?php foreach ($allgames as $games): ?>
				<option value="<?= $games ['id'] ?>"
					<?php if (isset ($_POST ['edition_game_id']) && $_POST ['edition_game_id'] == $games ['id'] ||
					isset ($game ['edition_game_id']) && $game ['edition_game_id'] == $games ['id'] || isset ($interview ['game_id']) && $interview ['game_id'] == $games ['id']): ?>
						selected
					<?php endif; ?>
					>
					<?= $games ['name'] ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>
	<?php if ( isset ( $validation ) && $validation->hasError( 'edition_game_id' ) ): ?>
		<div class="control">
			<label class="help has-text-danger">
				<?= $validation->getError( 'edition_game_id' ) ?>
			</label>
		</div>
	<?php endif; ?>
</div>
