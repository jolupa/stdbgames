<p class="level-item has-text-centered">
  <?php if(!$publisher['slug']): ?>
    <strong><?= $publisher['name'] ?></strong>
  <?php else: ?>
    <a href="<?= $publisher['url'] ?>" target="_blank"><strong><?= $publisher['name'] ?></strong></a>
  <?php endif; ?>
</p>
