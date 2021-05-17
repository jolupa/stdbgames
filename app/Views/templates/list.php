<article id="Games-List" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4"><?= $page_header ?></p>
    <navbar class="breadcrumb is-small">
      <ul>
        <li <?php if ( url_is ('db/list*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/db/list') ?>">All Games</a></li>
        <li <?php if ( url_is ('games/couch*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/couch' ) ?>">Couch Multiplayer</a></li>
        <li <?php if ( url_is ('games/coming*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/coming' ) ?>">Coming Soon</a></li>
        <li <?php if ( url_is ('games/crossplay*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/crossplay') ?>">Cross Play</a></li>
        <li <?php if ( url_is ('games/crossprogression*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/crossprogression') ?>">Cross Progression</a></li>
        <li <?php if ( url_is ('games/crowdchoice*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/crowdchoice') ?>">Crowd Choice</a></li>
        <li <?php if ( url_is ('games/crowdplay*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/crowdplay') ?>">Crowd Play</a></li>
        <li <?php if ( url_is ('prices/list*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/prices/list') ?>">Deals</a></li>
        <li <?php if ( url_is ('games/earlyaccess*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/earlyaccess') ?>">Early Access</a></li>
        <li <?php if ( url_is ('games/firstonstadia*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/firstonstadia') ?>">First on Stadia</a></li>
        <li <?php if ( url_is ('games/freetoplay*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/freetoplay') ?>">Free to Play</a></li>
        <li <?php if ( url_is ('games/launched*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/launched') ?>">Launched</a></li>
        <li <?php if ( url_is ('games/online*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/online') ?>">Online Multiplayer</a></li>
        <li <?php if ( url_is ('games/pro*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/pro') ?>">Pro Games</a></li>
        <li <?php if ( url_is ('games/rumours*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/rumours') ?>">Rumoured Games</a></li>
        <li <?php if ( url_is ('games/exclusives*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/exclusives') ?>">Stadia Exclusives</a></li>
        <li <?php if ( url_is ('games/stateshare*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/stateshare') ?>">State Share</a></li>
        <li <?php if ( url_is ('games/streamconnect*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/streamconnect') ?>">Stream Connect</a></li>
        <li <?php if ( url_is ('games/nodate*') ): ?>class="is-active"<?php endif; ?>><a href="<?= base_url ( '/games/nodate' ) ?>">Without Date</a></li>
      </ul>
    </navbar>
    <?php if ( isset ( $error ) ): ?>
      <div class="columns is-centered mt-5">
        <div class="column is-4">
          <p class="title is-4"><?= $error ?></p>
        </div>
      </div>
    <?php else: ?>
      <div class="columns is-multiline is-mobile mt-5">
        <?php foreach ( $list as $list ): ?>
          <div class="column is-3-desktop is-half-touch">
            <div class="card is-shadowless">
              <div class="card-image">
                <figure class="image is-3by2">
                  <a href="<?= base_url ( '/game/'.$list['slug'] ) ?>"><img src="<?= base_url ( '/img/games/'.$list['image'].'.jpeg') ?>"></a>
                  <div class="is-overlay is-hidden-desktop" style="top: auto; right: 10px; bottom: 10px; left: auto;">
                    <span class="icon-text">
                      <?php if ( ! empty ( $list['rumor'] ) ): ?><tag class="tag is-info"><span class="icon"><i class="fas fa-exclamation"></i></span></tag><?php endif; ?>
                    </span>
                  </div>
                </figure>
              </div>
              <div class="card-content">
                <p><span class="icon-text"><?php if ( ! empty ( $list['rumor'] ) && $list['rumor'] == 1 ): ?><span class="icon has-text-coral is-hidden-touch"><i class="fas fa-exclamation"></i></span><?php endif; ?><span><a href="<?= base_url ( '/game/'.$list['slug'] ) ?>"><?= $list['name'] ?></span></a></span></p>
                <?php if (! empty ( $list['release'] ) ): ?>
                  <p>Rel <?php if ( $list['release'] == '2099-01-01' || $list['release'] == 'TBA' ): ?>TBA<?php else: ?><?= date ( 'd-m-Y', strtotime( $list['release'] ) ) ?><?php endif; ?>
                    <br>
                <?php endif; ?>
                <?php if ( ! empty ( $list['price_pro'] ) || ! empty ( $list['price_nonpro'] ) ): ?>
                  <strike>Pri <?= $list['price'] ?>&nbsp;€</strike><?php if ( ! empty ( $list['price_pro'] ) ): ?> | Pro <?= $list['price_pro'] ?>&nbsp;€<?php endif; ?><?php if ( ! empty ( $list['price_nonpro'] ) ): ?> | All <?= $list['price_nonpro'] ?>&nbsp;€<?php endif; ?>
                  <br>
                <?php endif; ?>
                <?php if ( ! empty ( $list['int_id'] ) ): ?>
                  Small interview to <?= $list['dev_name'] ?>
                  <br>
                <?php endif; ?>
                <?php if ( ! empty ( $list['pro_from'] ) ): ?>
                  Pro From <?= date ( 'd-m-Y', strtotime ( $list['pro_from'] ) ) ?> <?php if ( ! empty ( $list['pro_till'] ) ): ?>Until <?= date ( 'd-m-Y', strtotime ( $list['pro_till'] ) ) ?><?php endif; ?><br>
                <?php endif; ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?= $pager->links( ) ?>
    <?php endif; ?>
  </div>
</article>
