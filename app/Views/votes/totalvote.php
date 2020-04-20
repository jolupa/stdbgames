<div class="level-item has-text-centered">
	<div>
		<p class="heading">Score</p>
		<?php if ( $game['gRelease'] > date('Y-m-d')): ?>
			<p class="title is-6">Not Released</p>
		<?php else: ?>
			<p class="title is-6"><?= round($totalvote['gScore']) ?></p>
		<?php endif; ?>
	</div>
</div>
