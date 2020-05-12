<?php if (!empty($game['gPro'])): ?>
	<?php if(date('Y-m-d') > $game['Protill']): ?>
		<button class="button is-primary has-text-dark is-small">Free for&nbsp;<strong>Pro</strong></button>
	<?php elseif(!empty($game['gProtill']) && date('Y-m-d') > $game['gProtill']): ?>
		<button class="button is-danger has-text-white is-small">Was free for&nbsp;<strong>Pro</strong></button>
	<?php else: ?>
		<button class="button is-danger has-text-white is-small">No Free for&nbsp;<strong>Pro</strong></button>
	<?php endif; ?>
<?php endif; ?>
<?php if(!empty($game['gProfrom'])): ?>
	<?php if(!empty($game['gProtill']) && date('Y-m-d') > $game['gProtill']): ?>
		<button class="button is-danger has-text-white is-small">Was Free on&nbsp;<strong><?= $game['gProfrom'] ?></strong></button>
	<?php else: ?>
		<button class="button is-primary has-text-dark is-small">Is free since&nbsp;<strong><?= $game['gProfrom'] ?></strong></button>
	<?php endif; ?>
	<?php if(!empty($game['gProtill']) && date('Y-m-d') <= $game['gProtill']): ?>
		<button class="button is-danger hast-text-white is-small">Was Free till&nbsp;<strong><?= $game['gProtill'] ?></strong></button>
	<?php elseif(date('Y-m-s') < $game['gProtill']): ?>
		<button class="button is-danger has-text-white is-small">Free till&nbsp;<strong><?= $game['gProtill'] ?></strong></button>
	<?php endif; ?>
<?php endif; ?>
