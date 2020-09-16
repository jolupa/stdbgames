<div class="container">
  <section class="section">
    <p class="tile is-5">Publisher</p>
    <p class="subtitle is-3">
      <?= $publisher['name'] ?>
    </p>
    <div class="content">
      <?php if($publisher['url'] !== ''): ?>
        <p><span class="icon"><i class="fas fa-chevron-right"></i></span>&nbsp;<a href="<?= $publisher['url'] ?>" target="_blank">Visit Website</a></p>
      <?php endif; ?>
      <?php if(isset($publisher['about']) && $publisher['about'] !== ''): ?>
        <?= $publisher['about'] ?>
      <?php endif; ?>
    </div>
    <?= view_cell('App\Controllers\Publishers::gamespublishedby', 'publisher_id='.$publisher['id']) ?>
  </section>
</div>
