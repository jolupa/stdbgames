<?php if (!empty ($library)): ?>
<div class="columns is-centered">
  <div class="column is-two-thirds">
    <p class="subtitle is-5">The Game is</p>
    <p class="title is-3">in the Library of:</p>
    <div class="columns is-multiline">
      <?php foreach ( $library as $library ): ?>
      <div class="column is-1 is-inline-block">
        <div class="media">
          <div class="media-left">
            <figure class="image is-96x96">
              <img title="<?= $library['vuImage'] ?>" src="<?= base_url() ?>/images/avatar/<?= $library['vuImage'] ?>">
            </figure>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>
