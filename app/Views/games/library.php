<?php if (!empty ($library)): ?>
<div class="columns is-centered">
  <div class="column is-two-thirds">
    <p class="subtitle is-5">The Game is</p>
    <p class="title is-3">in the Library of:</p>
    <div class="columns is-multiline">
      <?php foreach ( $library as $library ): ?>
      <div class="column is-1">
        <div class="content">
          <div class="media">
            <div class="media-left">
              <p class="image is-64x64">
              <img title="<?= $library['vuImage'] ?>" src="<?= base_url() ?>/images/avatar/<?= $library['vuImage'] ?>">
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
