<?php if($game['release'] > date('Y-m-d')): ?>
  <span class="subtitle is-6">Score: Not Released</span>
<?php else: ?>
  <span class="subtitle is-6">Score: <?= round($score['score']) ?></span>
<?php endif; ?>
