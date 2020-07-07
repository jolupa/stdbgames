<?php if($game['release'] > date('Y-m-d')): ?>
  <p><strong>Not Released</strong></p>
<?php else: ?>
  <p><strong><?= round($score['score']) ?></strong></p>
<?php endif; ?>
