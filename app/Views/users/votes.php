<section class="section">
  <div class="container">
      <div class="columns">
        <div class="column">
          <p class="subtitle is-5">Voted</p>
          <p class="title is-3">Games:</p>
        </div>
      </div>
      <div class="columns is-multiline">
      <?php foreach($voted as $voted): ?>
      <div class="column is-1 is-inline-block">
        <div class="media">
          <div class="media-left">
            <figure class="image is-96x96">
              <a href="<?= base_url() ?>/games/game/<?= $voted['Slug'] ?>"><img title="<?= $voted['Name'] ?>" src="<?= base_url() ?>/images/<?= $voted['Image'] ?>-thumb" alt="<?= $voted['Name'] ?>"></a>
            </figure>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
