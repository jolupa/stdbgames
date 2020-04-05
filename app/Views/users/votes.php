<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-full-width">
        <div class="card">
          <div class="card-content">
            <div class="content">
              <p class="subtitle is-5">Voted</p>
              <p class="title is-3">Games:</p>
            </div>
            <div class="columns is-multiline">
            <?php foreach($voted as $voted): ?>
              <div class="column is-1">
                <div class="content">
                  <div class="media">
                    <figure class="media-left">
                      <a href="<?= base_url() ?>/games/game/<?= $voted['Slug'] ?>"><p class="image is-96x96">
                        <img src="<?= base_url() ?>/images/<?= $voted['Image'] ?>-thumb" alt="<?= $voted['Name'] ?>">
                      </p></a>
                    </figure>
                  </div>
                </div>
            </div>
            <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
