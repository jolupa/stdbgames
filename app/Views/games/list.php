<div class="container">
  <section class="section">
    <div class="content">
      <p class="title is-5">Games</p>
      <p class="subtitle is-3">
        <?php if($type == 'soon'): ?>
          Coming Soon:
        <?php elseif($type === 'launched'): ?>
          Launched:
        <?php elseif($type === 'firstonstadia'): ?>
          First On Stadia:
        <?php elseif($type === 'stadiaexclusive'): ?>
          Stadia Exclusive:
        <?php elseif($type === 'earlyaccess'): ?>
          Early Access:
        <?php elseif($type === 'pro'): ?>
          Pro History:
        <?php elseif($type === 'rumors'): ?>
          Rumoured:
        <?php elseif($type === 'crossplay'): ?>
          with Cross Play:
        <?php elseif($type === 'crowdchoice'): ?>
          with Crowd Choice
        <?php elseif($type === 'crowdplay'): ?>
          with Crowd Play
        <?php elseif($type === 'streamconnect'): ?>
          with Stream Connect
        <?php elseif($type === 'crossprogression'): ?>
          with Cross Progression
        <?php elseif($type === 'stateshare'): ?>
          with State Share
        <?php elseif($type === 'deals'): ?>
          on Sale
        <?php elseif($type === 'f2p'): ?>
          Free 2 Play
        <?php else: ?>
          All Games:
        <?php endif; ?>
      </p>
      <div class="content">
        <nav class="breadcrumb has-dot-separator is-centered">
          <ul>
            <li></li>
            <li <?php if($type === 'all'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/all">All</a></li>
            <li <?php if($type === 'crossplay'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/crossplay">Cross Play</a></li>
            <li <?php if($type === 'crossprogression'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/crossprogression">Cross Progression</a></li>
            <li <?php if($type === 'crowdchoice'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/crowdchoice">Crowd Choice</a></li>
            <li <?php if($type === 'crowdplay'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/crowdplay">Crowd Play</a></li>
            <li <?php if($type === 'deals'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/deals">Deals</a></li>
            <li <?php if($type === 'earlyaccess'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/earlyaccess">Early Access</a></li>
            <li <?php if($type === 'firstonstadia'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/firstonstadia">First On Stadia</a></li>
            <li <?php if($type === 'f2p'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/f2p">Free to Play</a></li>
            <li <?php if($type === 'launched'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/launched">Launched</a></li>
            <li <?php if($type === 'pro'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/pro">Pro Games</a></li>
            <li <?php if($type === 'rumors'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/rumors">Rumoured Games</a></li>
            <li <?php if($type === 'soon'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/soon">Soon</a></li>
            <li <?php if($type === 'stadiaexclusive'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/stadiaexclusive">Stadia Exclusives</a></li>
            <li <?php if($type === 'stateshare'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/stateshare">State Share</a></li>
            <li <?php if($type === 'streamconnect'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/streamconnect">Stream Connect</a></li>
            <li></li>
          </ul>
        </nav>
        <hr>
      </div>
      <div class="columns is-multiline">
        <?php if($type == 'deals'): ?>
          <?php foreach($list as $list): ?>
            <div class="column is-one-quarter">
              <div class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img title="<?= $list['name'] ?>" src="<?= base_url() ?>/images/<?= $list['image'] ?>-thumb.jpeg" alt="<?= $list['name'] ?>">
                  </p>
                </figure>
                <div class="media-content">
                  <p class="title is-5"><a href="<?= base_url() ?>/game/<?= $list['slug'] ?>#Deals_Chart"><?= character_limiter($list['name'], 15, '...') ?></a></p>
                  <p class="subtitle is-7">Retail Price: <strong><?= $list['game_price'] ?>&nbsp;€</strong><br>
                    <?php if($list['price_pro'] != ''): ?>Pro Sale Price: <strong><?= $list['price_pro'] ?>&nbsp;€</strong><br><?php endif; ?>
                    <?php if($list['price_nonpro'] != ''): ?>Everyone Sale Price: <strong><?= $list['price_nonpro'] ?>&nbsp;€</strong><br><?php endif; ?>
                    <?php if($list['date_till_pro'] != '' && $list['date_till_nonpro'] != ''): ?>
                      <?php if($list['date_till_pro'] === $list['date_till_nonpro']): ?>
                        Valid Until: <strong><?= date('d-m-Y', strtotime($list['date_till_pro'])) ?></strong><br>
                      <?php else: ?>
                        Pro Valid Until: <strong><?= $list['date_till_pro'] ?></strong><br>
                        Everyone Valid Until: <strong><?= date('d-m-Y', strtotime($list['date_till_nonpro'])) ?></strong>
                      <?php endif; ?>
                    <?php else: ?>
                      <?php if($list['date_till_pro'] != ''): ?>
                        Valid for Pro Until: <strong><?= date('d-m-Y', strtotime($list['date_till_pro'])) ?></strong>
                      <?php endif; ?>
                      <?php if($list['date_till_nonpro'] != ''): ?>
                        Valid for Everyone Until: <strong><?= date('d-m-Y', strtotime($list['date_till_nonpro'])) ?></strong>
                      <?php endif; ?>
                    <?php endif; ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <?php foreach($list as $list): ?>
            <div class="column is-one-quarter">
              <div class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img title="<?= $list['name'] ?>" src="<?= base_url() ?>/images/<?= $list['image'] ?>-thumb.jpeg" alt="<?= $list['name'] ?>">
                  </p>
                </figure>
                <div class="media-content">
                  <p class="title is-5"><?php if($list['rumor'] == 1): ?><span class="icon has-text-danger" title="RUMOR!"><i class="fas fa-user-secret"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $list['slug'] ?>"><?= character_limiter($list['name'], 15, '...') ?></a></p>
                  <p class="subtitle is-7">Developer <?= $list['developer_name'] ?> / Publisher <?= $list['publisher_name'] ?><br>
                    <?php if($list['release'] == '2099-01-01' || $list['release'] == 'TBA'): ?>
                      Release date: TBA
                    <?php else: ?>
                      Release date: <?= date('d-m-Y', strtotime($list['release'])) ?>
                    <?php endif; ?>
                    <?php if($type === 'pro'): ?>Entered Pro:&nbsp;<?= date('d-m-Y', strtotime($list['pro_from'])) ?><?php endif; ?>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
