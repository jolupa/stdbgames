    <section class="hero is-large has-background-dark" style="background-image: url(<?= base_url() ?>/images/<?= $game['image'] ?>.jpeg); background-size: cover; background-position: center;">
      <div class="hero-body"></div>
      <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth" data-content-target="mainTabs">
          <div class="container">
            <ul>
              <li class="tab is-active has-background-light" onclick="openTab(event,'About')"><a>About</a></li>
              <li class="tab has-background-light" onclick="openTab(event,'Reviews')"><a>Reviews</a></li>
              <li class="tab has-background-light" onclick="openTab(event,'Price')"><a>Price History</a></li>
              <li class="tab has-background-light" onclick="openTab(event,'Addons')"><a>Add Ons</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
    <div class="container">
      <section class="section">
        <div id="About" class="content-tab">
          <div class="content has-text-centered">
            <h1 class="title"><?php if($game['rumor'] == 1): ?><span class="icon has-text-danger" title="RUMOR!"><i class="fas fa-exclamation-triangle"></i></span>&nbsp;<?php endif; ?><?= $game['name'] ?></h1>
            <h2 class="subtitle">
              <a class="has-text-dark" href="<?= base_url() ?>/developer/<?= $game['developer_slug'] ?>"><?= $game['developer_name'] ?></a> / <a class="has-text-dark" href="<?= base_url() ?>/publisher/<?= $game['publisher_slug'] ?>"><?= $game['publisher_name'] ?></a>
              <br>
              <?php if($game['release'] == '2099-01-01' || $game['release'] == 'TBA'): ?>
                <span class="subtitle is-6">Release date: TBA</span>
              <?php else: ?>
                <span class="subtitle is-6">Release date: <?= $game['release'] ?></span>
              <?php endif; ?>
              <br>
              <?= view_cell('App\Controllers\Reviews::totalvotegameoverview', 'id='.$game['id']) ?>
            </h2>
          </div>
          <div class="content has-text-centered">
            <p>
              <?php if(isset($game['appid']) && $game['appid'] !== '' && $game['release'] < date('Y-m-d')): ?>
                <a class="button has-text-white is-small mt-1 mr-2" style="background-color: #FC4A1F; border: none;" href="https://stadia.google.com/store/details/<?= $game['appid'] ?>/sku/<?= $game['sku'] ?>" target="_blank">Go to Stadia Store</a>
              <?php endif; ?>
              <?php if(isset($game['appid']) && $game['appid'] !== ''): ?>
                <?php if($game['release'] > date('Y-m-d')): ?>
                  <a class="button has-text-white is-small mt-1 mr-2 is-borderless" style="background-color: #FC4A1F; border: none;" href="https://stadia.google.com/player/<?= $game['appid'] ?>" target="_blank">Pre-Order on Stadia</a>
                <?php else: ?>
                  <a class="button has-text-white is-small mt-1 mr-2 is-borderless" style="background-color: #FC4A1F; border: none;" href="https://stadia.google.com/player/<?= $game['appid'] ?>" target="_blank">Play on Stadia</a>
                <?php endif; ?>
              <?php endif; ?>
              <?php if($game['pro'] == 1 && $game['pro_from' === '']): ?>
                <button class="button is-primary has-text-dark is-small mt-1 mr-2">Will be&nbsp;<strong>Free</strong>&nbsp;on Launch</button>
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
              <?php if($game['first_on_stadia'] == 1): ?>
                <a class="button is-primary has-text-dark is-small mt-1 mr-2" style="border: none;" href="<?= base_url() ?>/list/firstonstadia">First On Stadia</a>
              <?php endif; ?>
              <?php if($game['stadia_exclusive'] == 1): ?>
                <a class="button is-primary has-text-dark is-small mt-1 mr-2" style="border: none;" href="<?= base_url() ?>/list/stadiaexclusive">Stadia Exclusive</a>
              <?php endif; ?>
              <?php if($game['early_access'] == 1): ?>
                <a class="button is-primary has-text-dark is-small mr-1 mr-2" style="border: none;" href="<?= base_url() ?>/list/earlyaccess">Early Access Game</a>
              <?php endif; ?>
            </p>
          </div>
          <div class="content">
            <p class="title is-5">About</p>
            <p class="subtitle is-3">the Game:</p>
            <?= $game['about'] ?>
            <?= view_cell('App\Controllers\Interviews::interviews', 'game_id='.$game['id']) ?>
            <?= view_cell('App\Controllers\Games::releasebydate', 'id='.$game['id'].', date='.$game['release']) ?>
          </div>
        </div>
        <div id="Reviews" class="content-tab" style="display: none;">
          <?php if(date('Y-m-d') >= $game['release']): ?>
            <div class="content">
            <?= view_cell('App\Controllers\Reviews::gamereviews', 'id='.$game['id']) ?>
            </div>
          <?php else: ?>
            <div class="content has-text-centered">
              <p><strong><?= $game['name'] ?></strong> is not yet released!</p>
            </div>
          <?php endif; ?>
        </div>
        <div id="Addons" class="content-tab" style="display: none;">
          <div class="content">
            <?= view_cell('App\Controllers\Addons::addonsgamelist', 'game_id='.$game['id']) ?>
          </div>
        </div>
        <div id="Price" class="content-tab" style="display: none;">
          <div class="content">
            <?= view_cell('App\Controllers\Prices::gamepricehistory', 'id='.$game['id']) ?>
          </div>
        </div>
        <?php if(isset($game['updated_at'])): ?>
          <div class="content mt-5">
            <p class="help"><strong>Game Last Update:</strong> <?= $game['updated_at'] ?></p>
          </div>
        <?php endif; ?>
        <?php if($wrong == false): ?>
          <div class="content has-text-centered mt-2">
            <a href="<?= base_url() ?>/game/<?= $game['slug'] ?>/true"><p class="button is-warning has-text-dark">See something Wrong?</p></a>
          </div>
        <?php else: ?>
          <div class="ccontent has-text-centered mt-2">
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
        <?php endif; ?>
      </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      function openTab(evt, tabName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("content-tab");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tab");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" is-active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " is-active";
      }
    </script>
