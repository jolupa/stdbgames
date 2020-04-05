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
            </nav>
          </div>
        </div>
        <div class="card-content">
          <div class="content">
            <?php if (session('is_logged') == TRUE): ?>
            <div class="columns is-centered is-multiline">
              <div class="column is-two-thirds">
                <p><span class="tag is-primary is-medium"><span class="heading">Add to Whishlist</span></span> <span class="tag is-primary is-medium"><span class="heading">Game Bought!</span></span> <a href="<?= base_url() ?>/users/uservote/upvote/<?= $item['gId'] ?>/<?= session('id') ?>"><span class="tag is-info is-medium"><span class="heading">UPVOTE</span></span></a> <a href="<?= base_url() ?>/users/uservote/downvote/<?= $item['gId'] ?>/<?= session('id') ?>"><span class="tag is-danger is-medium"><span class="heading">DOWNVOTE</span></span></a></p>
                <?php if (session('voted') == 1): ?><p>You already voted on this game!!</p><?php endif; ?>
              </div>
            </div>
            <?php endif; ?>
            <?php if ( isset($item['gRelease']) && $item['gRelease'] <= date('Y-m-d')): ?>
            <div class="columns is-centered is-multiline">
              <div class="column is-two-thirds">
                <p><?php if ($item['gPro'] == 1 || $item['gProtill'] > date('Y-m-d')): ?><span class="tag is-primary is-medium"><span class="heading">Free for <strong>Pro</strong></span></span><?php elseif (!empty($item['gProtill']) && $item['gProtill'] < date('Y-m-d')): ?><span class="tag is-danger is-medium"><span class="heading">Was free for <strong>Pro</strong></span></span><?php else: ?><span class="tag is-danger is-medium"><span class="heading">No Free for <strong>Pro</strong></span></span><?php endif; ?> <?php if (!empty($item['gProfrom'])): ?><?php if (!empty($item['gProtill']) && $item['gProtill'] < date('Y-m-d')): ?><span class="tag is-danger is-medium"><span class="heading">Was Free on <strong><?= $item['gProfrom'] ?></strong></span></span><?php else: ?><span class="tag is-primary is-medium"><span class="heading">Is free since <strong><?= $item['gProfrom'] ?></strong></span></span><?php endif; ?> <?php if (!empty($item['gProtill']) && $item['gProtill'] < date('Y-m-d')): ?><span class="tag is-danger is-medium"><span class="heading">Was Free till <strong><?= $item['gProtill'] ?></strong></span></span><?php elseif ($item['gProtill'] > date('Y-m-d')): ?><span class="tag is-danger is-medium"><span class="heading">Free till <strong><?= $item['gProtill'] ?></strong></span></span><?php endif; ?><?php endif; ?></p>
              </div>
            </div>
            <?php endif; ?>
            <div class="columns is-centered">
              <div class="column is-two-thirds">
                <p class="subtitle is-5">About the</p>
                <p class="title is-3">Game:</p>
                <?= $item['gAbout'] ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
