<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-full-width">
        <figure class="image is-16x9">
          <img src="<?= base_url() ?>/assets/<?= $specials['sImage'] ?>">
        </figure>
      </div>
    </div>
    <div class="columns">
      <div class="column is-full-width">
        <p class="title is-3"><?= $specials['sTitle'] ?></p>
        <?= $specials['sAbout'] ?>
      </div>
    </div>
    <?= view_cell('App\Controllers\Specials::specialsixmonths') ?>
  </div>
</section>
