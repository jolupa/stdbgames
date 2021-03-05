<div class="container">
  <section class="section">
    <div class="content">
      <p class="subtitle is-5">Search</p>
      <p class="title is-3">Results:</p>
      <?php if($searchgames == FALSE && $searchdevelopers == false && $searchpublishers == false): ?>
        <p>We found nothing for <strong><?= $keyword ?></strong> in your search, but you can try again!</p>
      <?php else: ?>
        <?php if($searchgames): ?>
          <p class="title is-3">Games:</p>
          <div class="columns is-multiline">
            <?php foreach($searchgames as $searchgames): ?>
              <div class="column is-3">
                <div class="media">
                  <figure class="media-left image is-64x64 is-fullwidth">
                    <p>
                      <img src="<?= base_url() ?>/images/<?= $searchgames['image'] ?>-thumb.jpeg">
                    </p>
                  </figure>
                  <div class="media-content">
                    <p class="title is-5"><?php if($searchgames['rumor'] == 1): ?><span class="icon has-text-danger" title="RUMOR!"><i class="fas fa-exclamation"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $searchgames['slug'] ?>"><strong><?= character_limiter($searchgames['name'], 15, '...') ?></strong></a></p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <?php if($searchdevelopers): ?>
          <p class="title is-3">Developers:</p>
          <div class="columns is-multiline">
            <?php foreach($searchdevelopers as $searchdevelopers): ?>
              <div class="column is-3">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-5"><a href="<?= base_url() ?>/developer/<?= $searchdevelopers['slug'] ?>"><strong><?= character_limiter($searchdevelopers['name'], 15, '...') ?></strong></a></p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <?php if($searchpublishers) : ?>
          <p class="title is-3">Publishers:</p>
          <div class="columns is-multiline">
            <?php foreach($searchpublishers as $searchpublishers): ?>
              <div class="column is-3">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-5"><a href="<?= base_url() ?>/publisher/<?= $searchpublishers['slug'] ?>"><strong><?= character_limiter($searchpublishers['name'], 15, '...') ?></strong></a></p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </section>
</div>
