<section class="section">
  <div class="container">
      <div class="columns">
        <div class="column">
          <p class="subtitle is-5">Your</p>
          <p class="title is-3">Library:</p>
        </div>
      </div>
      <div class="columns is-multiline">
      <?php foreach($library as $library): ?>
      <div class="column is-1 is-inline-block">
        <div class="media">
          <div class="media-left">
            <figure class="image is-96x96">
              <a href="<?= base_url() ?>/games/game/<?= $library['Slug'] ?>"><img title="<?= $library['Name'] ?>" src="<?= base_url() ?>/images/<?= $library['Image'] ?>-thumb" alt="<?= $library['Name'] ?>"></a>
            </figure>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
