<?php if (!empty($game['gPro'])): ?>
	<?php if(date('Y-m-d') > $game['Protill']): ?>
		<span class="tag is-primary is-medium"><span class="heading">Free for <strong>Pro</strong></span></span>
	<?php elseif(!empty($game['gProtill']) && date('Y-m-d') > $game['gProtill']): ?>
		<span class="tag is-danger is-medium"><span class="heading">Was free for <strong>Pro</strong></span></span>
	<?php else: ?>
		<span class="tag is-danger is-medium"><span class="heading">No Free for <strong>Pro</strong></span></span>
	<?php endif; ?>
<?php endif; ?>
<?php if(!empty($game['gProfrom'])): ?>
	<?php if(!empty($game['gProtill']) && date('Y-m-d') > $game['gProtill']): ?>
		<span class="tag is-danger is-medium"><span class="heading">Was Free on <strong><?= $game['gProfrom'] ?></strong></span></span>
	<?php else: ?>
		<span class="tag is-primary is-medium"><span class="heading">Is free since <strong><?= $game['gProfrom'] ?></strong></span></span>
	<?php endif; ?>
	<?php if(!empty($game['gProtill']) && date('Y-m-d') > $game['gProtill']): ?>
		<span class="tag is-danger is-medium"><span class="heading">Was Free till <strong><?= $game['gProtill'] ?></strong></span></span>
	<?php elseif(date('Y-m-s') < $game['gProtill']): ?>
		<span class="tag is-danger is-medium"><span class="heading">Free till <strong><?= $game['gProtill'] ?></strong></span></span>
	<?php endif; ?>
<?php endif; ?>
