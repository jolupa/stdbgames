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
                  <p class="title is-6"><?= $item['gName'] ?> <?php if ( get_cookie($admin) != NULL ): ?><span class="icon has-text-color-info"><a href="<?= base_url() ?>/games/gameeditform/<?= $item['gSlug'] ?>"><i class="far fa-edit"></i></a></span><?php endif; ?></p>
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
                <p class="subtitle is-5">About the</p>
                <p class="title is-3">Game:</p>
                <?= $item['gAbout'] ?>
                <table class="table is-striped is-bordered">
                  <thead>
                    <p class="subtitle is-5">You may found</p>
                    <p class="title is-3">Interesting:</p>
                  </thead>
                  <tr>
                    <td>Is Free for Pro:</td>
                    <?php if ($item['gPro'] == 1): ?>
                      <td>Yes</td>
                    <?php elseif (!empty ($item['gProfrom'])): ?>
                      <td>It Was Free</td>
                    <?php else: ?>
                      <td>No</td>
                    <?php endif;  ?>
                  </tr>
                  <?php if (!empty ($item['gProfrom'])): ?>
                    <tr>
                      <td><?php if (!empty($item['gProtill']) && $item['gProtill'] < date('Y-m-d')): ?>It Was Free From:<?php else: ?>Free Since:<?php endif; ?></td>
                      <td><?= $item['gProfrom'] ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php if (!empty ($item['gProtill'])): ?>
                    <tr>
                      <td><?php if($item['gProtill'] < date('Y-m-d')): ?>It Was Free Until:<?php else: ?>Free Till:<?php endif; ?></td>
                      <td><?= $item['gProtill'] ?></td>
                    </tr>
                  <?php endif; ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
