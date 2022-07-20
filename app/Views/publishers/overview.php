<article id="publisher-info" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4"><?= $publisher['name'] ?></p>
    <p class="subtitle is-6">
      <?php if ( ! empty ($publisher['url']) ): ?>
        <a href="<?= $publisher['url'] ?>" target="_blank">Website</a>
      <?php endif; ?>
      <?php if ( ! empty ($publisher['twitter_account']) ): ?>
        <?php if ( ! empty ($publisher['url']) ): ?>
          &nbsp;|&nbsp;
        <?php endif; ?>
        <a href="<?= $publisher['twitter_account'] ?>" target="_blank">Twitter</a></p>
      <?php endif; ?>
    </p>
    <div class="content">
      <?php if ( ! empty ( $publisher['about'] ) ): ?>
        <?= $publisher['about'] ?>
      <?php endif; ?>
    </div>
    <?= view_cell ( 'App\Controllers\Games::Publishergames', 'id='.$publisher['id'] ) ?>
  </div>
</article>
