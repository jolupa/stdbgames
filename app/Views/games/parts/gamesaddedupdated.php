<section class="section">
  <div class="container is-max-widescreen">
    <h1 class="title">
      Last Game Added:
    </h1>
    <div class="columns">
      <div class="column is-12">
        <div class="card is-shadowles">
          <div class="card-image">
            <figure class="image is-16by9">
              <img src="<?= base_url ( '/assets/images/games/'.$added['image'].'.jpeg') ?>">
            </figure>
          </div>
          <div class="card-content">
            <?php if ($added ['rumor'] == 1): ?>
              <p class="help">
                <a href="<?= base_url ('/game/rumors') ?>">[RUMOR]</a>
              </p>
            <?php endif; ?>
            <h4 class="title is-4">
              <?php if ($added ['is_edition'] == 1): ?>
                <?= view_cell ('App\Controllers\Games::getslug', 'game_id='.$added ['edition_game_id'].' ,name='.$added ['name']) ?>
              <?php else: ?>
                <a href="<?= base_url ('/game/'.$added['slug'])?>"><?= $added['name'] ?></a>
              <?php endif; ?>
            </h4>
            <p>
              <span class="icon-text">
                <span class="icon"><i class="fa-solid fa-face-smile"></i></span><span><?= $added['like'] ?> /</span><span class="icon"><i class="fa-solid fa-face-frown"></i></span><span><?= $added['dislike'] ?></span>
              </span>
            </p>
          </div>
        </div>
      </div>
    </div>
    <h1 class="title">
      Last Game Updated:
    </h1>
    <div class="columns">
      <div class="column is-12">
        <div class="card is-shadowles">
          <div class="card-image">
            <figure class="image is-16by9">
              <img src="<?= base_url ( '/assets/images/games/'.$updated['image'].'.jpeg' ) ?>">
            </figure>
          </div>
          <div class="card-content">
          <?php if ($updated ['rumor'] == 1): ?>
              <p class="help">
                <a href="<?= base_url ('/game/rumors') ?>">[RUMOR]</a>
              </p>
            <?php endif; ?>
            <h4 class="title is-4">
              <?php if ($updated ['is_edition'] == 1): ?>
                <?= view_cell ('App\Controllers\Games::getslug', 'game_id='.$updated ['edition_game_id'].' ,name='.$updated ['name']) ?>
              <?php else: ?>
                <a href="<?= base_url ('/game/'.$updated['slug'])?>"><?= $updated['name'] ?></a>
              <?php endif; ?>
            </h4>
            <p>
              <span class="icon-text">
                <span class="icon"><i class="fa-solid fa-face-smile"></i></span><span><?= $updated['like'] ?> /</span><span class="icon"><i class="fa-solid fa-face-frown"></i></span><span><?= $updated['dislike'] ?></span>
              </span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
