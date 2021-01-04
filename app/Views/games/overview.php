    <section class="hero is-large has-background-dark" style="background-image: url(<?= base_url() ?>/images/<?= $game['image'] ?>.jpeg); background-size: cover; background-position: center;">
      <div class="hero-body"></div>
      <div class="hero-foot">
        <?php if(session('logged') == true): ?>
          <?php if($game['release'] < '2020-12-31' || $game['release'] > '2019-11-19' && $game['release'] != '2099-01-01' && $game['release'] != 'TBA'): ?>
            <?= view_cell('App\Controllers\Award::vote') ?>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </section>
    <div class="container">
      <section class="section">
        <div class="content has-text-centered">
          <h1 class="title"><?php if($game['rumor'] == 1): ?><span class="icon has-text-danger is-small" title="RUMOR!"><i class="fas fa-user-secret"></i></span>&nbsp;<?php endif; ?><?= $game['name'] ?></h1>
          <h2 class="subtitle">
            <a href="<?= base_url() ?>/developer/<?= $game['developer_slug'] ?>"><?= $game['developer_name'] ?></a> / <a href="<?= base_url() ?>/publisher/<?= $game['publisher_slug'] ?>"><?= $game['publisher_name'] ?></a>
            <br>
            <?php if($game['release'] == '2099-01-01' || $game['release'] == 'TBA'): ?>
              <span class="subtitle is-6">Release date: TBA</span>
            <?php else: ?>
              <span class="subtitle is-6">Release date: <?= $game['release'] ?></span>
            <?php endif; ?>
            <br>
            <?php if($game['price'] != ''): ?>
              <span class="subtitle is-6">Price: <?= $game['price'] ?></span>
            <?php else: ?>
              <span class="subtitle is-6">Price: TBA</span>
            <?php endif; ?>
            <br>
            <?= view_cell('App\Controllers\Reviews::totalvotegameoverview', 'id='.$game['id']) ?>
          </h2>
        </div>
        <div class="content has-text-centered">
          <p>
            <?php if(isset($game['appid']) && $game['appid'] !== '' && date('Y-m-d') >= $game['release']): ?>
              <a class="button is-info is-small mt-1 mr-2" href="https://stadia.google.com/store/details/<?= $game['appid'] ?>/sku/<?= $game['sku'] ?>" target="_blank">Go to Stadia Store</a>
            <?php endif; ?>
            <?php if(isset($game['appid']) && $game['appid'] !== ''): ?>
              <?php if($game['release'] > date('Y-m-d')): ?>
                <a class="button is-info is-small mt-1 mr-2" href="https://stadia.google.com/store/details/<?= $game['appid'] ?>/sku/<?= $game['sku'] ?>" target="_blank">Pre-Order on Stadia</a>
              <?php else: ?>
                <a class="button is-info is-small mt-1 mr-2" href="https://stadia.google.com/player/<?= $game['appid'] ?>" target="_blank">Play on Stadia</a>
              <?php endif; ?>
            <?php endif; ?>
            <?php if($game['is_f2p'] == 1): ?>
              <button class="button is-info is-small mt-1 mr-2"><strong>F2P Now!</strong></button>
            <?php endif; ?>
            <?php if($game['pro'] == 1 && $game['release'] === '2099-01-01'): ?>
              <button class="button is-info is-small mt-1 mr-2">Will be&nbsp;<strong>Free for PRO</strong>&nbsp;on Launch</button>
            <?php endif; ?>
            <?php if($game['pro'] == 1 && date('Y-m-d') > $game['pro_from'] && $game['release'] !== 'TBA' && $game['release'] !== '2099-01-01'): ?>
              <button class="button is-primary is-small mt-1 mr-2">Free for Pro&nbsp;<strong>Now!</strong></button>
            <?php endif; ?>
            <?php if($game['pro_till'] != '' && date('Y-m-d') <= $game['pro_till']): ?>
              <button class="button is-warning is-small mt-1 mr-2">Hurry claim it before&nbsp;<strong><?= $game['pro_till'] ?></strong></button>
            <?php elseif($game['pro_from'] && $game['pro'] == 0): ?>
              <button class="button is-danger is-small mt-1 mr-2">Was free from&nbsp;<strong><?= $game['pro_from'] ?></strong>&nbsp;until&nbsp;<strong><?= $game['pro_till'] ?></strong></button>
            <?php endif; ?>
            <?php if(session('logged') == true): ?>
              <?= view_cell('App\Controllers\Libraries::isinlibrary', 'id='.$game['id']) ?>
            <?php endif; ?>
            <?php if($game['first_on_stadia'] == 1): ?>
              <a class="button is-info is-small mt-1 mr-2" href="<?= base_url() ?>/list/firstonstadia">First On Stadia</a>
            <?php endif; ?>
            <?php if($game['stadia_exclusive'] == 1): ?>
              <a class="button is-info is-small mt-1 mr-2" href="<?= base_url() ?>/list/stadiaexclusive">Stadia Exclusive</a>
            <?php endif; ?>
            <?php if($game['early_access'] == 1): ?>
              <a class="button is-info is-small mt-1 mr-2" href="<?= base_url() ?>/list/earlyaccess">Early Access Game</a>
            <?php endif; ?>
            <?php if($game['cross_play'] == 1): ?>
              <a class="button is-info is-small mt-1 mr-2" href="<?= base_url() ?>/list/crossplay"><span class="icon is-small"><i class="fas fa-exchange-alt"></i></span>&nbsp;&nbsp;Cross Play</a>
            <?php endif; ?>
            <?php if($game['cross_progression'] == 1): ?>
              <a class="button is-info is-small mt-1 mr-2" href="<?= base_url() ?>/list/crossprogression"><span class="icon is-small"><i class="fas fa-spinner"></i></span>&nbsp;&nbsp;Cross Progression</a>
            <?php endif; ?>
            <?php if($game['crowd_choice'] == 1): ?>
              <a class="button is-info is-small mt-1 mr-2" href="<?= base_url() ?>/list/crowdchoice"><span class="icon is-small"><i class="fas fa-user-injured"></i></span>&nbsp;&nbsp;Crowd Choice</a>
            <?php endif; ?>
            <?php if($game['crowd_play'] == 1): ?>
              <a class="button is-info is-small mt-1 mr-2" href="<?= base_url() ?>/list/crowdplay"><span class="icon is-small"><i class="fas fa-globe-europe"></i></span>&nbsp;&nbsp;Crowd Play</a>
            <?php endif; ?>
            <?php if($game['stream_connect'] == 1): ?>
              <a class="button is-info is-small mt-1 mr-2" href="<?= base_url() ?>/list/streamconnect"><span class="icon is-small"><i class="fas fa-desktop"></i></span>&nbsp;&nbsp;Stream Connect</a>
            <?php endif; ?>
            <?php if($game['state_share'] == 1): ?>
              <a class="button is-info is-small mt-1 mr-2" href="<?= base_url() ?>/list/stateshare"><span class="icon is-small"><i class="fas fa-share-alt"></i></span>&nbsp;&nbsp;State Share</a>
            <?php endif; ?>
            <?php if($game['max_resolution'] != ''): ?>
              <a class="button is-info is-small mt-1 mr-2">
                <span class="icon is-small">
                  <i class="fas fa-desktop"></i>
                </span>&nbsp;&nbsp;
                <?php if($game['is_pxc'] == 1): ?>
                  <strong>PxC</strong>&nbsp;&nbsp;
                <?php endif; ?>
                <?= $game['max_resolution'] ?>&nbsp;&nbsp;
                <strong><?= $game['fps'] ?> FPS</strong>&nbsp;&nbsp;
                <?php if($game['hdr_sdr'] != ''): ?>
                  <?php if($game['hdr_sdr'] == 'hdr'): ?>HDR&nbsp;&nbsp;<?php elseif($game['hdr_sdr'] == 'sdr'): ?>SDR&nbsp;&nbsp;<?php endif; ?>
                <?php endif; ?>
              </a>
            <?php endif; ?>
          </p>
        </div>
        <div class="content">
          <p class="title is-5">About</p>
          <p class="subtitle is-3">#the Game:</p>
          <?= $game['about'] ?>
          <?= view_cell('App\Controllers\Interviews::interviews', 'game_id='.$game['id']) ?>
        </div>
        <hr \>
        <?php if(date('Y-m-d') >= $game['release']): ?>
          <div class="content mt-5">
            <?= view_cell('App\Controllers\Reviews::gamereviews', 'id='.$game['id']) ?>
          </div>
          <hr \>
        <?php endif; ?>
        <div class="content">
          <?= view_cell('App\Controllers\Prices::gamepricehistory', 'id='.$game['id']) ?>
        </div>
        <hr \>
        <?= view_cell('App\Controllers\Games::releasebydate', 'id='.$game['id'].', date='.$game['release']) ?>
        <?php if(isset($game['updated_at'])): ?>
          <div class="content mt-5">
            <p class="help"><strong>Game Last Update:</strong> <?= $game['updated_at'] ?></p>
          </div>
        <?php endif; ?>
        <div class="content has-text-centered mt-2">
          <a href="https://forms.gle/H5Yh2G2u42qGgTty9" target="_blank"><p class="button is-info">See something Wrong?</p></a>
        </div>
      </section>
    </div>
