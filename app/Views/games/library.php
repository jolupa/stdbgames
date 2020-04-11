<?php if (!empty ($library)): ?>
<div class="columns">
  <div class="column is-full-width">
    <p class="subtitle is-5">The Game is</p>
    <p class="title is-3">in the Library of:</p>
  </div>
</div>
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
<?php endif; ?>
