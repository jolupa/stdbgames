<?php if (!empty ($votesby)): ?>
  <div class="columns">
    <div class="column is-full-width">
      <p class="subtitle is-5">Game is</p>
      <p class="title is-3">voted by:</p>
    </div>
  </div>
  <div class="columns">
      <?php foreach ( $votesby as $votesby ): ?>
        <div class="column is-1 is-inline-bloc">
          <div class="media">
            <div class="media-left">
              <figure class="image is-96x96">
                <img title="<?= $votesby['vuImage'] ?>" src="<?= base_url() ?>/images/avatar/<?= $votesby['vuImage'] ?>">
              </figure>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
<?php endif; ?>
