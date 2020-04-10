<?php if (!empty ($votesby)): ?>
<div class="columns is-centered">
  <div class="column is-two-thirds">
    <p class="subtitle is-5">Game is</p>
    <p class="title is-3">voted by:</p>
    <div class="columns is-multiline">
      <?php foreach ( $votesby as $votesby ): ?>
      <div class="column is-1 is-inline-block">
          <div class="media">
            <div class="media-left">
              <figure class="image is-48x48">
                <img title="<?= $votesby['vuImage'] ?>" src="<?= base_url() ?>/images/avatar/<?= $votesby['vuImage'] ?>">
              </figure>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>
