<p class="title is-4">Games Published</p>
<?php if ( session ( 'error_lidi' ) == true ): ?>
  <p class="help mb-3"><?= session ( 'error_lidi' ) ?></p>
<?php endif; ?>
<div class="columns is-multiline is-mobile">
  <?php foreach ( $pub_games as $published ): ?>
    <div class="column is-4">
      <div class="card is-shadowless">
        <div class="card-image">
          <figure class="image is-3by2">
            <a href="<?= base_url ( '/game/'.$published['game_slug'] ) ?>"><img src="<?= base_url ( '/img/games/'.$published['game_image'].'.jpeg' ) ?>"></a>
            <div class="is-overlay is-hidden-touch" style="top: auto; right: 10px; bottom: 10px; left: auto;">
              <span class="icon-text">
                <?php if ( session ( 'likes') != null && in_array ( $published['id'], session ( 'likes' ) ) ): ?>
                  <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $published['like'] ?></span></tag>
                  <tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $published['dislike'] ?></span></tag>
                <?php elseif ( session ( 'dislikes' ) != null && in_array ( $published['id'], session ( 'dislikes') ) ): ?>
                  <tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $published['like'] ?></span></tag>
                  <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $published['dislike'] ?></span></tag>
                <?php else: ?>
                  <a href="<?= base_url ( '/games/like/'.$published['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $published['like'] ?></span></tag></a>
                  <a href="<?= base_url ( '/games/dislike/'.$published['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $published['dislike'] ?></span></tag></a>
                <?php endif; ?>
              </span>
            </div>
            <div class="is-overlay is-hidden-desktop" style="top: auto; right: 5px; bottom: 5px; left: auto;">
              <span class="icon-text">
                <?php if ( session ( 'likes') != null && in_array ( $published['id'], session ( 'likes' ) ) ): ?>
                  <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $published['like'] ?></span></tag>
                  <tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $published['dislike'] ?></span></tag>
                <?php elseif ( session ( 'dislikes' ) != null && in_array ( $published['id'], session ( 'dislikes') ) ): ?>
                  <tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $published['like'] ?></span></tag>
                  <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $published['dislike'] ?></span></tag>
                <?php else: ?>
                  <a href="<?= base_url ( '/games/like/'.$published['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $published['like'] ?></span></tag></a>
                  <a href="<?= base_url ( '/games/dislike/'.$published['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $published['dislike'] ?></span></tag></a>
                <?php endif; ?>
              </span>
            </div>
          </figure>
        </div>
        <div class="card-content">
          <p class="title is-5"><a href="<?= base_url ( '/game/'.$published['game_slug'] ) ?>"><?= ellipsize ( $published['game_name'], 15, 1, '...' ) ?></a></p>
          <p class="subtitle is-7">Dev <a href="<?= base_url ( '/developers/'.$published['dev_slug'] ) ?>"><?= $published['dev_name'] ?></a></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
