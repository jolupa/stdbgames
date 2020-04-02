<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-full">
        <div class="card">
          <div class="card-content">
            <div class="content">
              <p class="subtitle is-5">Developer:</p>
              <p class="title is-3"><?= $developer['0']['dName'] ?></p>
              <p class="subtitle is-5"><?php if (isset ($developer['0']['dWebsite'])): ?><span class="icon"><a href="<?= $developer['0']['dWebsite'] ?>" target="_blank"><i class="fas fa-sign-out-alt"></i></a></span><?php endif; ?> <?php if ( session('role') == 1): ?><span class="icon"><a href="<?= base_url() ?>/games/deveditform/<?= $developer['0']['dSlug'] ?>"><i class="far fa-edit"></i></a></span><?php endif; ?></p>
            </div>
          </div>
          <div class="card-content">
            <div class="columns">
              <div class="column">
                <p class="title is-4"><span class="icon has-text-success"><i class="fas fa-laptop-code"></i></span> Developed Games:</p>
              </div>
            </div>
            <div class="columns is-multiline">
            <?php foreach ($developer as $developer): ?>
              <div class="column is-one-quarter">
                <div class="media">
                  <figure class="media-left">
                    <p class="image is-64x64">
                      <img src="<?= base_url() ?>/images/<?= $developer['dgImage'] ?>-thumb">
                    </p>
                  </figure>
                  <div class="media-content">
                    <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $developer['dgSlug'] ?>"><?= character_limiter($developer['dgName'], 15, '...') ?></a></p>
                    <p class="subtitle is-7"><strong>Released:</strong> <?= $developer['dgRelease'] ?><br>
                    <strong>Published by:</strong> <?php if ( isset ($developer['dpSlug'])): ?><a href="<?= base_url() ?>/games/publisher/<?= $developer['dpSlug'] ?>"><?= $developer['dpName'] ?></a><?php else: ?><?= $developer['dpName'] ?><?php endif; ?></p>
                    </p>
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
