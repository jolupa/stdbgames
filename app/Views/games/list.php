<div class="columns">
  <div class="column">
    <p class="subtitle is-5">Games</p>
    <p class="title is-3">
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
      <?php else: ?>
        All Games:
      <?php endif; ?>
    </p>
  </div>
</div>
<div class="columns">
  <div class="column is-fullwidth">
    <nav class="breadcrumb has-dot-separator is-centered">
      <ul>
        <li <?php if($type === 'all'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/all">All</a></li>
        <li <?php if($type === 'launched'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/launched">Launched</a></li>
        <li <?php if($type === 'soon'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/soon">Soon</a></li>
        <li <?php if($type === 'firstonstadia'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/firstonstadia">First On Stadia</a></li>
        <li <?php if($type === 'stadiaexclusive'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/stadiaexclusive">Stadia Exclusives</a></li>
        <li <?php if($type === 'earlyaccess'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/earlyaccess">Early Access</a></li>
        <li <?php if($type === 'pro'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/list/pro">All Pro Games</a></li>
      </ul>
    </nav>
    <hr>
  </div>
</div>
<div class="columns is-multiline">
  <?php foreach($list as $list): ?>
    <div class="column is-one-quarter">
      <div class="media">
        <figure class="media-left">
          <p class="image is-64x64">
            <img title="<?= $list['name'] ?>" src="<?= base_url() ?>/images/<?= $list['image'] ?>-thumb.jpeg">
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
