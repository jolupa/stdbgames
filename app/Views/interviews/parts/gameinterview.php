<article id="small_interview">
  <div class="section has-background-gunmetal">
    <div class="content">
      <p class="title is-4">Small Interview</p>
      <?php if ( ! empty ( $gameinterview['created_at'] ) ): ?>
        <p class="subtitle is-6">Interview added: <?= date ( 'd-m-Y', strtotime( $gameinterview['created_at'] ) ) ?></p>
      <?php endif; ?>
      <?= $gameinterview['body'] ?>
    </div>
  </div>
</article>
