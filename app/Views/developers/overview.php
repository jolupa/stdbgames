<article id="game-info" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4"><?= $developer['name'] ?></p>
    <p class="subtitle is-6">
      <?php if ( ! empty ($developer['url']) ): ?>
        <a href="<?= $developer['url'] ?>" target="_blank">Website</a>
      <?php endif; ?>
      <?php if ( ! empty ($developer['twitter_account']) ): ?>
        &nbsp;|&nbsp;<a href="<?= $developer['twitter_account'] ?>" target="_blank">Twitter</a></p>
      <?php endif; ?>
    </p>
    <div class="content">
      <?php if ( ! empty ( $developer['about'] ) ): ?>
        <?= $developer['about'] ?>
      <?php endif; ?>
    </div>
    <?= view_cell ( 'App\Controllers\Games::Developergames', 'id='.$developer['id'] ) ?>
  </div>
</article>
