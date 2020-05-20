<section class="section has-background-grey-lighter">
  <div class="container">
    <div class="columns">
      <div class="column is-half">
        <div class="columns">
          <div class="column is-full-width">
            <p class="subtitle is-5">Last Users</p>
            <p class="title is-3">Votes And Reviews:</p>
          </div>
        </div>
        <div class="columns">
          <div class="column is-full-width is-multiline">
            <?php foreach ($latest as $latest): ?>
              <div class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img title="<?= $latest['rgName'] ?>" src="<?= base_url() ?>/images/<?= $latest['rgImage'] ?>-thumb.jpeg">
                  </p>
                </figure>
                <div class="media-content">
                  <p class="title is-5"><?php if(empty($latest['rAbout'])): ?><?= $latest['ruName'] ?><p class="subtitle is-7">Voted for <a href="<?= base_url() ?>/games/game/<?= $latest['rgSlug'] ?>"><?= $latest['rgName'] ?></a></p><?php else: ?><?= $latest['ruName'] ?></p><p class="subtitle is-7">Reviewed <a href="<?= base_url() ?>/games/game/<?= $latest['rgSlug'] ?>"><?= $latest['rgName'] ?></a></p><?php endif; ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="column is-half">
        <?= view_cell('App\Controllers\Votes::votesfront') ?>
      </div>
    </div>
  </div>
</section>
