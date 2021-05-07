<article id="trending-games" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Discover games</p>
    <?php if ( session ( 'error_lidi') != null ): ?>
      <p class="subtitle is-6"><?= session ( 'error_lidi' ) ?></p>
    <?php endif; ?>
    <div class="columns is-inline-flex-mobile">
      <div class="column is-half">
        <div class="card is-shadowless">
          <div class="card-image">
            <figure class="image is-16by9">
              <a href="<?= base_url ( '/game/'.$discover[0]['slug']) ?>"><img src="<?= base_url('/img/games/'.$discover[0]['image'].'.jpeg') ?>"></a>
              <div class="is-overlay" style="top: auto; right: 10px; bottom: 10px; left: auto;">
                <span class="icon-text is-hidden-touch">
                  <?php if ( session ( 'likes') != null && in_array ( $discover[0]['id'], session ('likes' ) ) ): ?>
                    <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i><span>&nbsp;<span><?= $discover[0]['like'] ?></span></tag>
                  <?php else: ?>
                    <a href="<?= base_url ( '/games/like/'.$discover[0]['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span>&nbsp;<span><?= $discover[0]['like'] ?></span></tag></a>
                  <?php endif; ?>
                  <?php if ( session ( 'dislikes' ) != null && in_array ($discover[0]['id'], session ( 'dislikes' ) ) ): ?>
                    <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span>&nbsp;<span><?= $discover[0]['dislike'] ?></span></tag>
                  <?php else: ?>
                    <a href="<?= base_url ( '/games/dislike/'.$discover[0]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span>&nbsp;<span><?= $discover[0]['dislike'] ?></span></tag></a>
                  <?php endif; ?>
                  <?php if ( session ( 'library' ) != null && in_array ( $discover[0]['id'], session ( 'library' ) ) ): ?>
                    <a href="<?= base_url ( '/libraries/removefromlibrary/'.$discover[0]['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="far fa-minus-square"></i></span> <span>In Library</span></tag></a>
                  <?php elseif ( session ( 'wishlisted' ) != null && in_array ( $discover[0]['id'], session ( 'wishlisted' ) ) ): ?>
                    <a href="<?= base_url ( '/libraries/addtolibrary/'.$discover[0]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Library</span></tag></a>
                    <a href="<?= base_url ( '/wishlists/removefromwishlist/'.$discover[0]['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="far fa-minus-square"></i></span> <span>Wishlist</span></tag></a>
                  <?php else: ?>
                    <a href="<?= base_url ( '/libraries/addtolibrary/'.$discover[0]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Library</span></tag></a>
                    <a href="<?= base_url ( '/wishlists/addtowishlist/'.$discover[0]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Wishlist</span></tag></a>
                  <?php endif; ?>
                </span>
              </div>
              <div class="is-overlay" style="top: auto; right: 5px; bottom: 5px; left: auto;">
                <span class="icon-text is-hidden-desktop">
                  <?php if ( session ( 'likes') != null && in_array ( $discover[0]['id'], session ( 'likes' ) ) ): ?>
                    <tag class="tag is-coral ml-1"><span class="icon"><span class="icon"><i class="fas fa-thumbs-up"></i></span>&nbsp;<span><?= $discover[0]['like'] ?></span></tag>
                  <?php else: ?>
                    <a href="<?= base_url ( '/games/like/'.$discover[0]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $discover[0]['like'] ?></span></tag></a>
                  <?php endif; ?>
                  <?php if ( session ( 'dislikes') != null && in_array ( $discover[0]['id'], session ( 'dislikes' ) ) ): ?>
                    <tag class="tag is-coral ml-1"><span class="icon"><span class="icon"><i class="fas fa-thumbs-down"></i></span>&nbsp;<span><?= $discover[0]['dislike'] ?></span></tag>
                  <?php else: ?>
                    <a href="<?= base_url ( '/games/dislike/'.$discover[0]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $discover[0]['dislike'] ?></span></tag></a>
                  <?php endif; ?>
                </span>
              </div>
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-5"><a href="<?= base_url('/game/'.$discover[0]['slug']) ?>" title="<?= $discover[0]['name'] ?>"><span class="icon-text"><?php if ( $discover[0]['rumor'] == 1 ): ?><span class="icon"><i class="fas fa-exclamation"></i></span><?php endif; ?><span><?= $discover[0]['name'] ?></span></a></p>
            <p class="subtitle is-7">Dev <strong><a href="<?= base_url('/developer/'.$discover[0]['dev_slug']) ?>" title="<?= $discover[0]['dev_name'] ?>"><?= $discover[0]['dev_name'] ?></a></strong> | Pub <strong><a href="<?= base_url('/publisher/'.$discover[0]['pub_slug']) ?>" title="<?= $discover[0]['pub_name'] ?>"><?= $discover[0]['pub_name'] ?></a></strong></p>
          </div>
        </div>
      </div>
      <div class="column is-half">
        <div class="card is-shadowless">
          <div class="card-image">
            <figure class="image is-16by9">
              <a href="<?= base_url ( '/game/'.$discover[1]['slug'] ) ?>"><img src="<?= base_url('/img/games/'.$discover[1]['image'].'.jpeg') ?>"></a>
              <div class="is-overlay" style="top: auto; right: 10px; bottom: 10px; left: auto;">
                <span class="icon-text is-hidden-touch">
                  <?php if ( session ( 'likes' ) != null && in_array ( $discover[1]['id'], session ( 'likes' ) ) ): ?>
                    <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i></span>&nbsp;<span><?= $discover[1]['like'] ?></span></tag>
                  <?php else: ?>
                    <a href="<?= base_url ( '/games/like/'.$discover[1]['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $discover[1]['like'] ?></span></tag></a>
                  <?php endif; ?>
                  <?php if ( session ( 'dislikes' ) != null && in_array ( $discover[1]['id'], session ( 'dislikes' ) ) ): ?>
                    <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span>&nbsp;<span><?= $discover[1]['dislike'] ?></span></tag>
                  <?php else: ?>
                    <a href="<?= base_url ( '/games/dislike/'.$discover[1]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $discover[1]['dislike'] ?></span></tag></a>
                  <?php endif; ?>
                  <?php if ( session ( 'library' ) != null && in_array ( $discover[1]['id'], session ( 'library' ) ) ): ?>
                    <a href="<?= base_url ( '/libraries/removefromlibrary/'.$discover[1]['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="far fa-minus-square"></i></span> <span>In Library</span></tag></a>
                  <?php elseif ( session ( 'wishlisted' ) != null && in_array ( $discover[1]['id'], session ( 'wishlisted' ) ) ): ?>
                    <a href="<?= base_url ( '/libraries/addtolibrary/'.$discover[1]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Library</span></tag></a>
                    <a href="<?= base_url ( '/wishlists/removefromwishlist/'.$discover[1]['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="far fa-minus-square"></i></span> <span>Wishlist</span></tag></a>
                  <?php else: ?>
                    <a href="<?= base_url ( '/libraries/addtolibrary/'.$discover[1]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Library</span></tag></a>
                    <a href="<?= base_url ( '/wishlists/addtowishlist/'.$discover[1]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Wishlist</span></tag></a>
                  <?php endif; ?>
                </span>
              </div>
              <div class="is-overlay" style="top: auto; right: 5px; bottom: 5px; left: auto;">
                <span class="icon-text is-hidden-desktop">
                  <?php if ( session ( 'likes' ) != null && in_array ( $discover[1]['id'], session ( 'likes' ) ) ): ?>
                    <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-up"></i></span>&nbsp;<span><?= $discover[1]['like'] ?></span></tag>
                  <?php else: ?>
                    <a href="<?= base_url ( '/games/like/'.$discover[1]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $discover[1]['like'] ?></span></tag></a>
                  <?php endif; ?>
                  <?php if ( session ( 'dislikes' ) != null && in_array ( $discover[1]['id'], session ( 'dislikes' ) ) ): ?>
                    <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span>&nbsp;<span><?= $discover[1]['dislike'] ?></span></tag>
                  <?php else: ?>
                    <a href="<?= base_url ( '/games/dislike/'.$discover[1]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $discover[1]['dislike'] ?></span></tag></a>
                  <?php endif; ?>
                </span>
              </div>
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-5"><a href="<?= base_url('/game/'.$discover[1]['slug']) ?>" title="<?= $discover[1]['name'] ?>"><span class="icon-text"><?php if ( $discover[1]['rumor'] == 1 ): ?><span class="icon"><i class="fas fa-exclamation"></i></span><?php endif; ?><span><?= $discover[1]['name'] ?></span></a></p>
            <p class="subtitle is-7">Dev <strong><a href="<?= base_url('/developer/'.$discover[1]['dev_slug']) ?>" title="<?= $discover[1]['dev_name'] ?>"><?= $discover[1]['dev_name'] ?></a></strong> | Pub <strong><a href="<?= base_url('/publisher/'.$discover[1]['pub_slug']) ?>" title="<?= $discover[1]['pub_name'] ?>"><?= $discover[1]['pub_name'] ?></a></strong></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</article>
