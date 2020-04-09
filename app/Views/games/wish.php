<?php if ( !empty ($wish) ): ?>
<div class="columns is-centered">
  <div class="column is-two-thirds">
    <p class="subtitle is-5">The Game</p>
    <p class="title is-3">is Wished by:</p>
    <div class="columns is-multiline">
      <?php foreach ( $wish as $wish ): ?>
      <div class="column is-1">
        <div class="content">
          <div class="media">
            <div class="media-left">
              <p class="image is-64x64">
              <img src="<?= base_url() ?>/images/avatar/<?= $wish['vuImage'] ?>">
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>
