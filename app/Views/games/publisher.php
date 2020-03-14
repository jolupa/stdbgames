<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-full">
        <div class="card">
          <div class="card-content">
            <div class="content">
              <p class="subtitle is-5">Publisher:</p>
              <p class="title is-3"><?= $publisher['0']['pName'] ?></p>
              <p class="subtitle is-5"><?php if (isset ($publisher['0']['pWebsite'])): ?><a href="<?= $publisher['0']['pWebsite'] ?>"><span class="icon"><i class="fas fa-sign-out-alt"></i></span></a><?php endif; ?> <?php if ( get_cookie($admin) != NULL ): ?><a href="<?= base_url() ?>/games/pubeditform/<?= $publisher['0']['pSlug'] ?>"><span class="icon"><i class="far fa-edit"></i></span></a><?php endif; ?></p>
            </div>
          </div>
          <div class="card-content">
            <div class="columns">
              <div class="column">
                <p class="title is-4"><span class="icon has-text-success"><i class="fas fa-cloud-upload-alt"></i></span> Published Games:</p>
              </div>
            </div>
            <div class="columns is-multiline">
            <?php foreach ($publisher as $publisher): ?>
              <div class="column is-one-quarter">
                <div class="media">
                  <figure class="media-left">
                    <p class="image is-64x64">
                      <img src="<?= base_url() ?>/images/<?= $publisher['pgImage'] ?>-thumb">
                    </p>
                  </figure>
                  <div class="media-content">
                    <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $publisher['pgSlug'] ?>"><?= character_limiter($publisher['pgTitle'], 15, '...') ?></a></p>
                    <p class="subtitle is-7"><strong>Released:</strong> <?= $publisher['pgRelease'] ?><br>
                    <strong>Developed by:</strong> <?php if ( isset ($publisher['pdSlug'])): ?><a href="<?= base_url() ?>/games/developer/<?= $publisher['pdSlug'] ?>"><?= $publisher['pdName'] ?></a><?php else: ?><?= $publisher['pdName'] ?><?php endif; ?></p>
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
