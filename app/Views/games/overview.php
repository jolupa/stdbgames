<section class="section">
  <div class="container">
    <div class="columns">
      <div class="card">
        <div class="card-image">
          <figure class="image is16by9">
            <img src="<?= base_url() ?>/images/<?= $item['gImage'] ?>">
          </figure>
        </div>
        <div class="card-content">
          <div class="content">
            <nav class="level">
              <div class="level-item has-text-centered">
                <div>
                  <p class="heading">Title</p>
                  <p class="title is-6"><?= $item['gName'] ?> <?php if ( session('role') == 1 ): ?><span class="icon has-text-color-info"><a href="<?= base_url() ?>/games/gameeditform/<?= $item['gSlug'] ?>"><i class="far fa-edit"></i></a></span><?php endif; ?></p>
                </div>
              </div>
              <div class="level-item has-text-centered">
                <div>
                  <p class="heading">Developer</p>
                  <p class="title is-6"><?php if (isset ($item['gdSlug'])): ?><a href="<?= base_url() ?>/games/developer/<?= $item['gdSlug'] ?>"><?= $item['gdName'] ?></a><?php else: ?><?= $item['gdName'] ?><?php endif; ?></p>
                </div>
              </div>
              <div class="level-item has-text-centered">
                <div>
                  <p class="heading">Publisher</p>
                  <p class="title is-6"><?php if ( isset ($item['gpSlug'])): ?><a href="<?= base_url() ?>/games/publisher/<?= $item['gpSlug'] ?>"><?= $item['gpName'] ?></a><?php else: ?><?= $item['gpName'] ?><?php endif; ?></p>
                </div>
              </div>
              <div class="level-item has-text-centered">
                <div>
                  <p class="heading">Release Date</p>
                  <p class="title is-6"><?= $item['gRelease'] ?></p>
                </div>
              </div>
              <?= view_cell( '\App\Controllers\Games::totalvotes', 'gameid='.$item['gId'] ) ?>
            </nav>
          </div>
        </div>
        <div class="card-content">
          <div class="content">
            <?php if (session('is_logged') == TRUE): ?>
              <?= view_cell( '\App\Controllers\Users::userinteraction', 'gameid='.$item['gId'].', userid='.session('id') ) ?>
            <?php endif; ?>
            <?php if ( isset($item['gRelease']) && $item['gRelease'] <= date('Y-m-d')): ?>
            <div class="columns">
              <div class="column is-full-width">
                <p><?php if ($item['gPro'] == 1 || $item['gProtill'] > date('Y-m-d')): ?><span class="tag is-primary is-medium"><span class="heading">Free for <strong>Pro</strong></span></span><?php elseif (!empty($item['gProtill']) && $item['gProtill'] < date('Y-m-d')): ?><span class="tag is-danger is-medium"><span class="heading">Was free for <strong>Pro</strong></span></span><?php else: ?><span class="tag is-danger is-medium"><span class="heading">No Free for <strong>Pro</strong></span></span><?php endif; ?> <?php if (!empty($item['gProfrom'])): ?><?php if (!empty($item['gProtill']) && $item['gProtill'] < date('Y-m-d')): ?><span class="tag is-danger is-medium"><span class="heading">Was Free on <strong><?= $item['gProfrom'] ?></strong></span></span><?php else: ?><span class="tag is-primary is-medium"><span class="heading">Is free since <strong><?= $item['gProfrom'] ?></strong></span></span><?php endif; ?> <?php if (!empty($item['gProtill']) && $item['gProtill'] < date('Y-m-d')): ?><span class="tag is-danger is-medium"><span class="heading">Was Free till <strong><?= $item['gProtill'] ?></strong></span></span><?php elseif ($item['gProtill'] > date('Y-m-d')): ?><span class="tag is-danger is-medium"><span class="heading">Free till <strong><?= $item['gProtill'] ?></strong></span></span><?php endif; ?><?php endif; ?></p>
              </div>
            </div>
            <?php endif; ?>
            <div class="columns">
              <div class="column is-full-widht">
                <p class="subtitle is-5">About the</p>
                <p class="title is-3">Game:</p>
                <?= $item['gAbout'] ?>
              </div>
            </div>
            <?= view_cell( '\App\Controllers\Games::usersvote', 'gameid='.$item['gId'] ) ?>
            <?= view_cell( '\App\Controllers\Games::userslibrary', 'gameid='.$item['gId'] ) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
