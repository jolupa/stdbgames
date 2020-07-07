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
          <p><strong><?= $game['release'] ?></strong></p>
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
        <a href="https://stadia.google.com/store/details/<?= $game['appid'] ?>/<?= $game['sku'] ?>" target="_blank"><button class="button is-danger has-text-white is-small">Go to Stadia Store</button></a>&nbsp;
      <?php endif; ?>
      <?php if($game['pro'] == 1 && date('Y-m-d') >= $game['pro_from']): ?>
        <button class="button is-primary has-text-dark is-small">Free for Pro&nbsp;<strong>Now!</strong></button>
      <?php endif; ?>
      <?php if($game['pro_from'] && $game['pro'] == 0): ?>
        <button class="button is-danger has-text-white is-small">Was free from&nbsp;<strong><?= $game['pro_from'] ?></strong>&nbsp;until&nbsp;<strong><?= $game['pro_till'] ?></strong></button>
      <?php endif; ?>
      <?php if($game['release'] <= date('Y-m-d') && session('logged') == true): ?>
        <?= view_cell('App\Controllers\Libraries::isinlibrary', 'id='.$game['id']) ?>
      <?php endif; ?>
      <?php if($game['release'] > date('Y-m-d') && session('logged') == true): ?>
        <?= view_cell('App\Controllers\Wishlists::isinwishlist', 'id='.$game['id']) ?>
      <?php endif; ?>
      <?php if(isset($game['appid']) && $game['appid'] !== ''): ?>
        &nbsp;<a href="https://stadia.google.com/player/<?= $game['appid'] ?>" target="_blank"><button class="button is-primary has-text-dark is-small">Play on Stadia</button></a>
      <?php endif; ?>
    </p>
  </div>
</div>
<div class="columns is-centered">
  <div class="column is-10">
    <p>
      <?php if($game['first_on_stadia'] == 1): ?>
        <button class="button is-primary has-text-dark is-small">First On Stadia</button>
      <?php endif; ?>
      <?php if($game['stadia_exclusive'] == 1): ?>
        <button class="button is-primary has-text-dark is-small">Stadia Exclusive</button>
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
<?= view_cell('App\Controllers\Interviews::interviews', 'id='.$game['id']) ?>
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
    <?= view_cell('App\Controllers\Addons::addonsgamelist', 'id='.$game['id']) ?>
  </div>
</div>
<div class="columns is-centered mt-2">
  <div class="column is-10">
    <p class="subtitle is-5">Price</p>
    <p class="title is-3">Info:</p>
    <?= view_cell('App\Controllers\Prices::gamepricehistory', 'id='.$game['id']) ?>
  </div>
</div>
<?php if($game['release'] != 'TBA'): ?>
  <div class="columns is-centered mt-2">
    <div class="column is-10">
      <p class="subtitle is-5">Games Released</p>
      <p class="title is-3">this Day:</p>
    </div>
  </div>
  <?= view_cell('App\Controllers\Games::releasebydate', 'id='.$game['id'].', date='.$game['release']) ?>
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
