<div class="container has-background-gunmetal">
  <section class="section">
    <div class="columns">
      <div class="column">
        <p class="subtile is-5">Coming</p>
        <p class="title is-3">Soon:</p>
      </div>
    </div>
    <div class="columns is-multiline">
      <?php foreach($soon as $soon): ?>
        <div class="column is-one-quarter">
          <article class="media">
            <figure class="media-left image is-64x64 is-fullwidth">
              <p>
                <img title="<?= $soon['name'] ?>" src="<?= base_url() ?>/images/<?= $soon['image'] ?>-thumb.jpeg" alt="<?= $soon['name'] ?>">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><?php if($soon['rumor'] == 1): ?><span class="icon has-text-danger is-small" title="RUMOR!"><i class="fas fa-user-secret"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $soon['slug'] ?>"><?= character_limiter($soon['name'], 15, '...') ?></a></p>
              <p class="subtitle is-7">Developer <?= $soon['developer_name'] ?> / Publisher <?= $soon['publisher_name'] ?><br>
                <?php if($soon['release'] == '2099-01-01' || $soon['release'] == 'TBA'): ?>
                  TBA
                <?php else: ?>
                  <?= date('d-m-Y', strtotime($soon['release'])) ?>
                <?php endif; ?>
              </p>
            </div>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="columns is-centered">
      <div class="column has-text-centered">
        <a class="button is-info" style="border: none;" href="<?= base_url() ?>/list/soon">See All Games Coming!</a>
      </div>
    </div>
  </section>
</div>
