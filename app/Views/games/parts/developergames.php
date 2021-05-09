<p class="subtitle is-4 mt-5">Games Developed</p>
<?php if ( session ( 'error_lidi' ) == true ): ?>
  <p class="help mb-3"><?= session ( 'error_lidi' ) ?></p>
<?php endif; ?>
<div class="columns is-multiline is-mobile">
  <?php foreach ( $dev_games as $developed ): ?>
    <div class="column is-4-desktop is-one-third-mobile">
      <div class="card is-shadowless">
        <div class="card-image">
          <figure class="image is-3by2">
            <a href="<?= base_url ( '/game/'.$developed['game_slug'] ) ?>"><img src="<?= base_url ( '/img/games/'.$developed['game_image'].'.jpeg' ) ?>"></a>
          </figure>
          <div class="is-overlay is-hidden-mobile" style="top: auto; right: 10px; bottom: 10px; left: auto;">
            <span class="icon-text">
              <?php if ( session ( 'likes') != null && in_array ( $developed['id'], session ( 'likes' ) ) ): ?>
                <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $developed['like'] ?></span></tag>
                <tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $developed['dislike'] ?></span></tag>
              <?php elseif ( session ( 'dislikes' ) != null && in_array ( $developed['id'], session ( 'dislikes') ) ): ?>
                <tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $developed['like'] ?></span></tag>
                <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $developed['dislike'] ?></span></tag>
              <?php else: ?>
                <a href="<?= base_url ( '/games/like/'.$developed['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $developed['like'] ?></span></tag></a>
                <a href="<?= base_url ( '/games/dislike/'.$developed['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $developed['dislike'] ?></span></tag></a>
              <?php endif; ?>
            </span>
          </div>
          <div class="is-overlay is-hidden-desktop" style="top:auto; right: 5px; bottom: 5xp; left:auto;">
            <?php if ( ! empty ( $developed['rumor'] ) ): ?>
              <tag class=" tag is-info"><span class="icon"><i class="fas fa-exclamation"></span></i></tag>
            <?php endif; ?>
          </div>
        </div>
        <div class="card-content is-hidden-mobile">
          <p class="title is-5"><span class="icon-text"><?php if ( ! empty ( $developed['rumor'] ) ): ?><span class="icon has-text-coral"><i class="fas fa-exclamation"></i></span><?php endif; ?><span><a href="<?= base_url ( '/game/'.$developed['game_slug'] ) ?>"><?= ellipsize ( $developed['game_name'], 15, 1, '...' ) ?></a></span></span></p>
          <p class="subtitle is-7">Pub <a href="<?= base_url ( '/publisher/'.$developed['pub_slug'] ) ?>"><?= $developed['pub_name'] ?></a></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
