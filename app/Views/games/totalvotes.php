<?php if ($item['gRelease'] > date('Y-m-d')): ?>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Score</p>
      <p class="title is-6"><strong>Not Released</strong></p>
    </div>
  </div>
<?php else: ?>
<div class="level-item has-text-centered">
  <div>
    <p class="heading">Score</p>
    <p class="title is-6"><strong><?= round($total['Score']) ?></strong></p>
  </div>
</div>
<?php endif; ?>
