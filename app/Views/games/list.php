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
          Rumored:
        <?php elseif($type === 'crossplay'): ?>
          with Cross Play:
        <?php elseif($type === 'crowdchoice'): ?>
          with Crowd Choice
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
            <li <?php if($type === 'crowdchoice'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/crowdchoice">Crowd Choice</a></li>
            <li <?php if($type === 'earlyaccess'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/earlyaccess">Early Access</a></li>
            <li <?php if($type === 'firstonstadia'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/firstonstadia">First On Stadia</a></li>
            <li <?php if($type === 'launched'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/launched">Launched</a></li>
            <li <?php if($type === 'pro'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/pro">Pro Games</a></li>
            <li <?php if($type === 'rumors'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/rumors">Rumored Games</a></li>
            <li <?php if($type === 'soon'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/soon">Soon</a></li>
            <li <?php if($type === 'stadiaexclusive'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/stadiaexclusive">Stadia Exclusives</a></li>
            <li></li>
          </ul>
        </nav>
        <hr>
      </div>
      <div class="columns is-multiline">
        <?php foreach($list as $list): ?>
          <div class="column is-one-quarter">
            <div class="media">
              <figure class="media-left">
                <p class="image is-64x64">
                  <img title="<?= $list['name'] ?>" src="<?= base_url() ?>/images/<?= $list['image'] ?>-thumb.jpeg" alt="<?= $list['name'] ?>">
                </p>
              </figure>
              <div class="media-content">
                <p class="title is-5"><?php if($list['rumor'] == 1): ?><span class="icon has-text-danger" title="RUMOR!"><i class="fas fa-exclamation-triangle"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $list['slug'] ?>"><?= character_limiter($list['name'], 15, '...') ?></a></p>
                <p class="subtitle is-7">Developer <?= $list['developer_name'] ?> / Publisher <?= $list['publisher_name'] ?><br>
                  <?php if($list['release'] == '2099-01-01' || $list['release'] == 'TBA'): ?>
                    TBA
                  <?php else: ?>
                    <?= $list['release'] ?>
                  <?php endif; ?>
                  <?php if($type === 'pro'): ?>Entered Pro:&nbsp;<?= $list['pro_from'] ?><?php endif; ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>
