<p class="level-item has-text-centered">
  <?php if(!$developer['id']): ?>
    <strong><?= $developer['name'] ?></strong>
  <?php else: ?>
    <a href="<?= $developer['url'] ?>" target="_blank"><strong><?= $developer['name'] ?></strong></a>
  <?php endif; ?>
</p>
