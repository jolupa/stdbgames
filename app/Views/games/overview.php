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
                  <p class="title is-6"><?= $item['gTitle'] ?> <span class="icon has-text-color-info"><a href="<?= base_url() ?>/games/gameeditform/<?= $item['gSlug'] ?>"><i class="far fa-edit"></i></a></span></p>
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
            <div class="columns is-centered">
              <div class="column is-two-thirds">
                <p class="title is-4"><span class="icon has-text-danger"><i class="fas fa-info"></i></span> About:</p>
                <?= $item['gAbout'] ?>
              </div>
            </div>
            <div class="columns is-centered">
              <div class="column is-two-thirds">
                <p class="title is-4"><span class="icon has-text-danger"><i class="far fa-images"></i></span> Gallery:</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
