<div class="container has-background-gunmetal">
  <section class="section">
    <div class="columns">
      <div class="column">
        <p class="subtile is-5">Latest Games</p>
        <p class="title is-3">Added:</p>
      </div>
    </div>
    <div class="columns is-multiline">
      <?php foreach($last as $last): ?>
        <div class="column is-one-quarter">
          <article class="media">
            <figure class="media-left image is-64x64 is-fullwidth">
              <p>
                <img title="<?= $last['name'] ?>" src="<?= base_url() ?>/images/<?= $last['image'] ?>-thumb.jpeg" alt="<?= $last['name'] ?>">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><?php if($last['rumor'] == 1): ?><span class="icon has-text-danger is-small" title="RUMOR!"><i class="fas fa-exclamation"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $last['slug'] ?>"><?= character_limiter($last['name'], 15, '...') ?></a></p>
              <p class="subtitle is-7">Developer <?= $last['developer_name'] ?> / Publisher <?= $last['publisher_name'] ?><br>
                Added: <strong><?= date('d-m-Y', strtotime($last['created_at'])) ?></strong>
              </p>
            </div>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="columns">
      <div class="column">
        <p class="title is-3">Updated:</p>
      </div>
    </div>
    <div class="columns is-multiline">
      <?php foreach($lastupdated as $lastupdated): ?>
        <div class="column is-one-quarter">
          <article class="media">
            <figure class="media-left image is-64x64">
              <p>
                <img title="<?= $lastupdated['name'] ?>" src="<?= base_url() ?>/images/<?= $lastupdated['image'] ?>-thumb.jpeg" alt="<?= $lastupdated['name'] ?>">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><?php if($lastupdated['rumor'] == 1): ?><span class="icon has-text-danger is-small" title="RUMOR!"><i class="fas fa-exclamation"></i></span></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $lastupdated['slug'] ?>"><?= character_limiter($lastupdated['name'], 15, '...') ?></a></p>
              <p class="subtitle is-7">Developer <?= $lastupdated['developer_name'] ?> / Publisher <?= $lastupdated['publisher_name'] ?><br>
                Last update: <strong><?= date('d-m-Y', strtotime($lastupdated['updated_at'])) ?></strong>
              </p>
            </div>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</div>
