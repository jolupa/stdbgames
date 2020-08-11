<div class="columns mt-2">
  <div class="column is-12">
    <figure class="image is-16x9">
      <img src="<?= base_url() ?>/images/<?= $game['image'] ?>.jpeg">
    </figure>
  </div>
</div>
<div class="columns">
  <div class="column is-12">
    <div class="level">
      <div class="level-item has-text-centered">
        <div>
          <p>Name</p>
          <p>
            <strong><?= $game['name'] ?></strong>
            <?php if(session('logged') == true && session('role') == 1): ?>
              &nbsp;<span class="icon"><a href="<?= base_url() ?>/update/game/<?= $game['slug'] ?>"><i class="fas fa-edit"></i></a></span>
            <?php endif; ?>
          </p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <p>Developer</p>
          <p>
            <?php if(!$game['developer_slug']): ?>
              <strong><?= $game['developer_name'] ?></strong>
            <?php else: ?>
              <a href="<?= base_url() ?>/developer/<?= $game['developer_slug'] ?>"><strong><?= $game['developer_name'] ?></strong></a>
            <?php endif; ?>
          </p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <p>Publisher</p>
          <p>
            <?php if(!$game['publisher_slug']): ?>
              <strong><?= $game['publisher_name'] ?></strong>
            <?php else: ?>
              <a href="<?= base_url() ?>/publisher/<?= $game['publisher_slug'] ?>"><strong><?= $game['publisher_name'] ?></strong></a>
            <?php endif; ?>
          </p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <p>Release Date</p>
          <p>
            <?php if($game['release'] == '2099-01-01' || $game['release'] == 'TBA'): ?>
              <strong>TBA</strong>
            <?php else: ?>
              <strong><?= $game['release'] ?></strong>
            <?php endif; ?>
          </p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <p>Score</p>
          <?= view_cell('App\Controllers\Reviews::totalvotegameoverview', 'id='.$game['id']) ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="columns is-centered">
  <div class="column is-10">
    <p>
      <?php if($game['appid']): ?>
        <a href="https://stadia.google.com/store/details/<?= $game['appid'] ?>/sku/<?= $game['sku'] ?>" target="_blank"><button class="button is-primary has-text-dark is-small mt-1 mr-2">Go to Stadia Store</button></a>
      <?php endif; ?>
      <?php if(isset($game['appid']) && $game['appid'] !== ''): ?>
        <a href="https://stadia.google.com/player/<?= $game['appid'] ?>" target="_blank"><button class="button is-primary has-text-dark is-small mt-1 mr-2">Play on Stadia</button></a>
      <?php endif; ?>
      <?php if($game['pro'] == 1 && date('Y-m-d') > $game['pro_from'] && $game['release'] !== 'TBA'): ?>
        <button class="button is-primary has-text-dark is-small mt-1 mr-2">Free for Pro&nbsp;<strong>Now!</strong></button>
      <?php endif; ?>
      <?php if($game['pro'] == 0 && date('Y-m-d') <= $game['pro_till']): ?>
        <button class="button is-warning has-text-dark is-small mt-1 mr-2">Hurry claim it before&nbsp;<strong><?= $game['pro_till'] ?></strong></button>
      <?php elseif($game['pro_from'] && $game['pro'] == 0): ?>
        <button class="button is-danger has-text-white is-small mt-1 mr-2">Was free from&nbsp;<strong><?= $game['pro_from'] ?></strong>&nbsp;until&nbsp;<strong><?= $game['pro_till'] ?></strong></button>
      <?php endif; ?>
      <?php if(session('logged') == true): ?>
        <?= view_cell('App\Controllers\Libraries::isinlibrary', 'id='.$game['id']) ?>
      <?php endif; ?>
    </p>
  </div>
</div>
<div class="columns is-centered">
  <div class="column is-10">
    <p>
      <?php if($game['first_on_stadia'] == 1): ?>
        <a href="<?= base_url() ?>/list/firstonstadia"><button class="button is-primary has-text-dark is-small">First On Stadia</button></a>&nbsp;
      <?php endif; ?>
      <?php if($game['stadia_exclusive'] == 1): ?>
        <a href="<?= base_url() ?>/list/stadiaexclusive"><button class="button is-primary has-text-dark is-small">Stadia Exclusive</button></a>&nbsp;
      <?php endif; ?>
      <?php if($game['early_access'] == 1): ?>
        <a href="<?= base_url() ?>/list/earlyaccess"><button class="button is-primary has-text-dark is-small">Early Access Game</button></a>&nbsp;
      <?php endif; ?>
    </p>
  </div>
</div>
<div class="columns is-centered">
  <div class="column is-10">
    <p class="subtitle is-5">About</p>
    <p class="title is-3">the Game:</p>
    <div class="content">
      <?= $game['about'] ?>
    </div>
  </div>
</div>
<?= view_cell('App\Controllers\Interviews::interviews', 'game_id='.$game['id']) ?>
<?php if($game['release'] <= date('Y-m-d')): ?>
  <div class="columns is-centered mt-2">
    <div class="column is-10">
      <?= view_cell('App\Controllers\Reviews::gamereviews', 'id='.$game['id']) ?>
    </div>
  </div>
<?php endif; ?>
<div class="columns is-centered">
  <div class="column is-10">
    <p class="subtitle is-5">Game</p>
    <p class="title is-3">Addons:</p>
    <?= view_cell('App\Controllers\Addons::addonsgamelist', 'game_id='.$game['id']) ?>
  </div>
</div>
<div class="columns is-centered mt-2">
  <div class="column is-10">
    <p class="subtitle is-5">Price</p>
    <p class="title is-3">Info:</p>
    <?= view_cell('App\Controllers\Prices::gamepricehistory', 'id='.$game['id']) ?>
  </div>
</div>
<?php if($game['release'] !== 'TBA' && $game['release'] !== '2099-01-01'): ?>
  <div class="columns is-centered mt-2">
    <div class="column is-10">
      <p class="subtitle is-5">Games Released</p>
      <p class="title is-3">this Day:</p>
    </div>
  </div>
  <?= view_cell('App\Controllers\Games::releasebydate', 'id='.$game['id'].', date='.$game['release']) ?>
  <?php if($wrong == false): ?>
    <div class="columns is-centered mt-2">
      <div class="column is-10 has-text-centered">
        <a href="<?= base_url() ?>/game/<?= $game['slug'] ?>/true"><p class="button is-warning has-text-dark">See something Wrong?</p></a>
      </div>
    </div>
  <?php else: ?>
    <div class="columns is-centered mt-2">
      <div class="column is-10">
        <hr class="my-2">
        <form method="post" action="<?= base_url() ?>/communications/wronggame">
          <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
          <input type="hidden" name="name" value="<?= $game['name'] ?>">
          <div class="field">
            <div class="control is-expanded">
              <textarea class="textarea" name="wrong" placeholder="<?php if(session('error') !== null): ?><?= session('error') ?><?php else: ?>You see something wrong? Tell Us!<?php endif; ?>"></textarea>
            </div>
          </div>
          <div class="field is-grouped is-grouped-centered">
            <div class="control">
              <button class="button is-primary has-text-dark" value="submit">Tell Us!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>
<?php if(isset($game['updated_at'])): ?>
  <div class="columns is-centered my-2">
    <div class="column is-10">
      <div class="content">
        <p class="help"><strong>Game Last Update:</strong> <?= $game['updated_at'] ?></p>
      </div>
    </div>
  </div>
<?php endif; ?>
