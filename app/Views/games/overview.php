<article id="game-image-header">
  <div class="hero is-large" style="background-image: url(<?= base_url('/img/games/'.$game['image'].'.jpeg') ?>); background-size: cover; background-position: center;">
    <div class="hero-body"></div>
  </div>
</article>
<article id="game-info" class="container mt-5">
  <div class="mx-3">
    <div class="columns">
      <div class="column is-3">
        <div class="columns is-multiline">
          <div class="column is-full">
            <p class="has-text-centered">
              <span class="icon-text">
                <?php if ( session ( 'likes' ) != null && in_array ( $game['id'], session ( 'likes' ) ) ): ?>
                  <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $game['like'] ?></span></tag>
                  <tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $game['dislike'] ?></span></tag>
                <?php elseif ( session ( 'dislikes') != null && in_array ( $game['id'], session ( 'dislikes' ) ) ): ?>
                  <tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $game['like'] ?></span></tag>
                  <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $game['dislike'] ?></span></tag>
                <?php else: ?>
                  <a href="<?= base_url ( '/games/like/'.$game['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $game['like'] ?></span></tag></a>
                  <a href="<?= base_url ( '/games/dislike/'.$game['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $game['dislike'] ?></span></tag></a>
                <?php endif; ?>
                <?php if ( session ( 'library' ) != null && in_array ( $game['id'], session ( 'library' ) ) ): ?>
                  <a href="<?= base_url ( '/libraries/removefromlibrary/'.$game['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="far fa-minus-square"></i></span> <span>In Library</span></tag></a>
                <?php elseif ( session ( 'wishlisted' ) != null && in_array ( $game['id'], session ( 'wishlisted' ) ) ): ?>
                  <a href="<?= base_url ( 'libraries/addtolibrary/'.$game['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Library</span></tag></a>
                  <a href="<?= base_url ( '/wishlists/removefromwishlist/'.$game['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="far fa-minus-square"></i></span> <span>Wishlist</span></tag></a>
                <?php else: ?>
                  <a href="<?= base_url ( '/libraries/addtolibrary/'.$game['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Library</span></tag></a>
                  <a href="<?= base_url ( '/wishlists/addtowishlist/'.$game['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Wishlist</span></tag></a>
                <?php endif; ?>
              </span>
            </p>
            <?php if ( session ( 'error_lidi' ) != null ): ?>
              <p class="help has-text-centered"><?= session ( 'error_lidi' ) ?></p>
            <?php endif; ?>
            <?php if ( session ( 'error_wis' ) != null ): ?>
              <p class="help has-text-centered"><?= session ( 'error_wis' ) ?></p>
            <?php endif; ?>
          </div>
          <div class="column is-full">
            <div class="panel">
              <div class="panel-heading has-background-gunmetal">Data Sheet</div>
              <?php if ( ! empty ( $game['url'] ) || ! empty ( $game['twitter_account'] ) ): ?>
                <div class="panel-block">
                  <?php if ( ! empty ( $game['url'] ) ): ?>
                    <a href="<?= $game['url'] ?>" target="_blank"><span class="icon"><i class="fas fa-blog"></i></span></a>
                  <?php endif; ?>
                  <?php if ( ! empty ( $game['twitter_account'] ) ): ?>
                    &nbsp;<a href="<?= $game['twitter_account'] ?>" target="_blank"><span class="icon"><i class="fab fa-twitter-square"></i></span></a>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <?php if ( ! empty ( $game['pro_till'] ) ): ?>
                <div class="panel-block">Pro |&nbsp;<strong><?= date ( 'd-m-Y', strtotime ( $game['pro_from'] ) ) ?></strong>&nbsp;/&nbsp;<strong><?= date ( 'd-m-Y', strtotime ( $game['pro_till'] ) ) ?></strong></div>
              <?php endif; ?>
              <?php if ( $game['first_on_stadia'] == 1 ): ?>
                <div class="panel-block">First on Stadia</div>
              <?php endif; ?>
              <?php if ( $game['multi_couch'] == 1 ): ?>
                <div class="panel-block">Couch Multiplayer</div>
              <?php endif; ?>
              <?php if ( $game['multi_online'] == 1 ): ?>
                <div class="panel-block">Online Multiplayer</div>
              <?php endif; ?>
              <?php if ( $game['cross_play'] == 1 ): ?>
                <div class="panel-block">Cross Play</div>
              <?php endif; ?>
              <?php if ( $game['crowd_choice'] == 1 ): ?>
                <div class="panel-block">Crowd Choice</div>
              <?php endif; ?>
              <?php if ( $game['cross_progression'] == 1 ): ?>
                <div class="panel-block">Cross Progression</div>
              <?php endif; ?>
              <?php if ( $game['state_share'] == 1 ): ?>
                <div class="panel-block">State Share</div>
              <?php endif; ?>
              <?php if ( $game['stream_connect'] == 1 ): ?>
                <div class="panel-block">Stream Connect</div>
              <?php endif; ?>
              <?php if ( ! empty ($game['max_resolution']) ): ?>
                <div class="panel-block"><?php if ( ! empty ($game['is_pxc'] ) ): ?>Is PxC<?php endif; ?>&nbsp;<?= $game['max_resolution'] ?> <?php if ( ! empty ( $game['fps'] ) ): ?>&nbsp;<strong><?= $game['fps'] ?>fps</strong><?php endif; ?><?php if ( ! empty ( $game['hdr_sdr'] ) ): ?>&nbsp;<?= $game['hdr_sdr'] ?><?php endif; ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <p class="title is-3"><span class="icon-text"><?php if ( $game['rumor'] == 1): ?><span class="icon has-text-coral"><i class="fas fa-exclamation"></i></span><?php endif; ?><span><?= $game['name'] ?></span></p>
        <p class="subtitle is-5">
          Dev <a href="<?= base_url ('/developer/'.$game['dev_slug']) ?>"><?= $game['dev_name'] ?></a>
           | Pub <a href="<?= base_url ('/publisher/'.$game['pub_slug']) ?>"><?= $game['pub_name'] ?></a>
            | Rel
            <?php if ( $game['release'] == 'TBA' || $game['release'] == '2099-01-01' ): ?>
              TBA
            <?php else: ?>
              <?= date ( 'd-m-Y', strtotime ( $game['release'] ) ) ?>
            <?php endif; ?>
             <?= view_cell ( 'App\Controllers\Prices::dealongame', 'id='.$game['id'] ) ?>
          <br \>
          <?php if ( ! empty ( $game['appid'] ) ): ?>
            <a href="https://stadia.google.com/store/details/<?= $game['appid'] ?>/sku/<?= $game['sku'] ?>" target="_blank">Go Stadia Store</a> | <a href="https://stadia.google.com/player/<?= $game['appid'] ?>" target="_blank">Play on Stadia</a>
          <?php else: ?>
            <?php if ( ! empty ( $game['demo_appid'] ) ): ?>
              <a href="https://stadia.google.com/store/details/<?= $game['demo_appid'] ?>" target="_blank">Play the Demo</a>
            <?php endif; ?>
            <?php if ( ! empty ( $game['preorder_appid'] ) ): ?>
              <?php if ( ! empty ( $game['demo_appid'] ) ): ?>
                &nbsp;|&nbsp;
              <?php endif; ?>
              <a href="https://stadia.google.com/store/details/<?= $game['preorder_appid'] ?>/sku/<?= $game['preorder_sku'] ?>" target="_blank">Pre Order</a>
            <?php endif; ?>
          <?php endif; ?>
        </p>
        <div class="content">
          <p class="title is-4">About the game</p>
          <?= $game['about'] ?>
        </div>
        <?= view_cell ( 'App\Controllers\Interviews::gameinterview', 'id='.$game['id'] ) ?>
        <?= view_cell ( 'App\Controllers\Editions::editionsbygame', 'id='.$game['id'] ) ?>
        <?= view_cell ( 'App\Controllers\Gallery::galleryitems', 'query='.mb_url_title( $game['dev_name'].' '.$game['name'].' trailer google stadia', '+', true ) ) ?>
        <?= view_cell ( 'App\Controllers\Reviews::gamereviews', 'id='.$game['id'].', release='.$game['release'] ) ?>
        <?= view_cell ( 'App\Controllers\Prices::historyprices', 'id='.$game['id'] ) ?>
        <?= view_cell ( 'App\Controllers\Games::samedayreleases', 'id='.$game['id'].' release='.$game['release'] ) ?>
      </div>
    </div>
  </div>
</article>
