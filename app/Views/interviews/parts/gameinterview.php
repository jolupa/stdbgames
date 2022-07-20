<hr />
	<div class="content mt-5" id="interview">
		<h1 class="title">
			Small Interview:
		</h1>
    <?php if (!empty ($gameinterview ['created_at'])): ?>
			<h2 class="subtitle is-6">
				Added <?= date ('d-m-Y', strtotime ($gameinterview ['created_at'])) ?>
			</h2>
    <?php endif; ?>
    <?= $gameinterview ['body'] ?>
	</div>
<hr />
