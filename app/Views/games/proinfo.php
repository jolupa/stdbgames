<?php if(!empty($game['gProfrom'])): ?>
	<?php if(!empty($game['gProtill']) && date('Y-m-d') > $game['gProtill']): ?>
		<button class="button is-small is-danger has-text-white">Was Free from&nbsp;<strong><?= $game['gProfrom'] ?></strong>&nbsp;till&nbsp;<strong><?= $game['gProtill'] ?></strong></button>
	<?php elseif(!empty($game['gProtill']) && date('Y-m-d') < $game['gProtill']): ?>
		<button class="button is-small is-primary has-text-black">Free from&nbsp;<strong><?= $game['gProfrom'] ?></strong>&nbsp;till&nbsp;<strong><?= $game['gProtill'] ?></strong></button>
	<?php else: ?>
		<button class="button is-small is-primary has-text-black">Is free for&nbsp;<strong>Pro</strong>&nbsp;since&nbsp;<strong><?= $game['gProfrom'] ?></strong></button>
	<?php endif; ?>
<?php endif; ?>
<?php if($game['gFirstonstadia'] === 1): ?>
	<button class="button is-danger has-text-white is-small"><strong>First</strong>&nbsp;on Stadia</button>
<?php endif; ?>
<?php if($game['gStadiaexclusive'] === 1): ?>
	<button class="button is-danger has-text-white is-small">Stadia&nbsp;<strong>Exclusive</strong></button>
<?php endif; ?>
