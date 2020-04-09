<section class="section">
  <div class="container">
      <div class="columns">
        <div class="column">
          <p class="subtitle is-5">Games</p>
          <p class="title is-3">You want:</p>
        </div>
      </div>
      <div class="columns is-multiline">
      <?php foreach($wish as $wish): ?>
      <div class="column is-1">
        <div class="content">
          <div class="media">
            <figure class="media-left">
              <a href="<?= base_url() ?>/games/game/<?= $wish['Slug'] ?>"><p class="image is-96x96">
                <img title="<?= $wish['Name'] ?>" src="<?= base_url() ?>/images/<?= $wish['Image'] ?>-thumb" alt="<?= $wish['Name'] ?>"></a>
              </p>
            </figure>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
