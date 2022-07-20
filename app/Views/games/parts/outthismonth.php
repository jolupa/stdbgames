<section class="section">
  <div class="container is-max-widescreen">
    <h1 class="title">
      New This Month:
    </h1>
    <div class="columns is-multiline is-mobile">
    <?php
      foreach ($thismonth as $release):
    ?>
      <div class="column is-half-mobile is-3-desktop">
        <div class="card is-equal">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="<?= base_url ( '/assets/images/games/'.$release['image'].'.jpeg' ) ?>">
            </figure>
          </div>
          <div class="card-content">
            <?php if ($release ['rumor'] == 1): ?>
              <p class="help">
                <a href="<?= base_url ('/game/rumors') ?>">[RUMOR]</a>
              </p>
            <?php endif; ?>
            <h5 class="title is-5">
              <a href="<?= base_url ('/game/'.$release['slug']) ?>"><?= $release['name'] ?></a>
            </h5>
            <?= view_cell ('\App\Controllers\Companies::devpubgame', 'dev_id='.$release['developer_id'].' pub_id='.$release['publisher_id']) ?>
            <p>
              Release: <strong><?= date ('d-m-Y', strtotime ($release ['release'])) ?></strong>
            </p>
            <p>
              <span class="icon-text">
                <span class="icon"><i class="fa-solid fa-face-smile"></i></span><span><?= $release['like'] ?> /</span><span class="icon"><i class="fa-solid fa-face-frown"></i></span><span><?= $release['dislike']?></span>
              </span>
            </p>
          </div>
        </div>
      </div>
    <?php
      endforeach;
    ?>
    </div>
  </div>
</section>
