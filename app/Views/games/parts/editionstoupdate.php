<section class="section">
  <div class="container is-max-widescreen">
    <h1 class="title">
      Update Editions:
    </h1>
    <div class="columns is-multiline is-mobile">
      <?php
        foreach ($editionstoupdate as $editiontoupdate):
      ?>
      <div class="column is-half-mobile is-3-desktop">
        <div class="card is-equal">
          <div class="card-image">
            <figure class="image is-5by3">
              <img src="<?= base_url ( '/assets/images/games/'.$editiontoupdate['image'].'.jpeg') ?>">
            </figure>
          </div>
          <div class="card-content">
            <h5 class="title is-5">
              <a href="<?= base_url ('/update/edition/'.$editiontoupdate['id']) ?>"><?= $editiontoupdate['name'] ?></a>
            </h5>
          </div>
        </div>
      </div>
      <?php
        endforeach;
      ?>
    </div>
  </div>
</section>