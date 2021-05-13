<article id="added_and_updated" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Last games added</p>
    <div class="columns is-multiline is-mobile">
      <?php foreach ($added as $added): ?>
        <div class="column is-one-third-desktop is-one-third-mobile">
          <div class="card is-shadowless">
            <div class="card-image">
              <figure class="image is-3by2">
                <a href="<?= base_url ( '/game/'.$added['slug'] ) ?>"><img src="<?= base_url('/img/games/'.$added['image'].'.jpeg') ?>" title="<?= $added['name'] ?>"></a>
                <div class="is-overlay is-hidden-touch" style="top: auto; right: 10px; bottom: 10px; left: auto;">
                  <span class="icon-text">
                    <?php if ( session ( 'likes') != null && in_array ( $added['id'], session ('likes' ) ) ): ?>
                      <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i><span>&nbsp;<span><?= $added['like'] ?></span></tag>
                    <?php else: ?>
                      <a href="<?= base_url ( '/games/like/'.$added['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span>&nbsp;<span><?= $added['like'] ?></span></tag></a>
                    <?php endif; ?>
                    <?php if ( session ( 'dislikes' ) != null && in_array ($added['id'], session ( 'dislikes' ) ) ): ?>
                      <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span>&nbsp;<span><?= $added['dislike'] ?></span></tag>
                    <?php else: ?>
                      <a href="<?= base_url ( '/games/dislike'.$added['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span>&nbsp;<span><?= $added['dislike'] ?></span></tag></a>
                    <?php endif; ?>
                    <?php if ( session ( 'library' ) != null && in_array ( $added['id'], session ( 'library' ) ) ): ?>
                      <a href="<?= base_url ( '/libraries/removefromlibrary/'.$added['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="far fa-minus-square"></i></span> <span>In Library</span></tag></a>
                    <?php elseif ( session ( 'wishlisted' ) != null && in_array ( $added['id'], session ( 'wishlisted' ) ) ): ?>
                      <a href="<?= base_url ( '/libraries/addtolibrary/'.$added['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Library</span></tag></a>
                      <a href="<?= base_url ( '/wishlists/removefromwishlist/'.$added['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="far fa-minus-square"></i></span> <span>Wishlist</span></tag></a>
                    <?php else: ?>
                      <a href="<?= base_url ( '/libraries/addtolibrary/'.$added['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Library</span></tag></a>
                      <a href="<?= base_url ( '/wishlists/addtowishlist/'.$added['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Wishlist</span></tag></a>
                    <?php endif; ?>
                  </span>
                </div>
                <div class="is-overlay is-hidden-desktop" style="top: auto; right: 5px; bottom: 5px; left: auto;">
                  <span class="icon-text">
                    <?php if ( $added['rumor'] == 1 ): ?><tag class="tag is-info"><span class="icon"><i class="fas fa-exclamation"></i></span></tag><?php endif; ?>
                  </span>
                </div>
              </figure>
            </div>
            <div class="card-content is-hidden-mobile">
              <p class="title is-5"><span class="icon-text"><?php if ($added['rumor'] == 1): ?><span class="icon has-text-coral"><i class="fas fa-exclamation"></i></span><?php endif; ?><span><a href="<?= base_url('/game/'.$added['slug']) ?>" title="<?= $added['name'] ?>"><?= ellipsize($added['name'], 15, 1, '...') ?></a></span></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <p class="title is-4">Last games updated</p>
    <div class="columns is-multiline is-mobile">
      <?php foreach ($updated as $updated): ?>
        <div class="column is-one-third-desktop is-one-third-mobile">
          <div class="card is-shadowless">
            <div class="card-image">
              <figure class="image is-3by2">
                <a href="<?= base_url ( '/game/'.$updated['slug'] ) ?>"><img src="<?= base_url('/img/games/'.$updated['image'].'.jpeg') ?>" title="<?= $updated['name'] ?>"></a>
                <div class="is-overlay is-hidden-touch" style="top: auto; right: 10px; bottom: 10px; left: auto;">
                  <span class="icon-text">
                    <?php if ( session ( 'likes') != null && in_array ( $updated['id'], session ('likes' ) ) ): ?>
                      <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i><span>&nbsp;<span><?= $updated['like'] ?></span></tag>
                    <?php else: ?>
                      <a href="<?= base_url ( '/games/like/'.$updated['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span>&nbsp;<span><?= $updated['like'] ?></span></tag></a>
                    <?php endif; ?>
                    <?php if ( session ( 'dislikes' ) != null && in_array ($updated['id'], session ( 'dislikes' ) ) ): ?>
                      <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span>&nbsp;<span><?= $updated['dislike'] ?></span></tag>
                    <?php else: ?>
                      <a href="<?= base_url ( '/games/dislike'.$updated['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span>&nbsp;<span><?= $updated['dislike'] ?></span></tag></a>
                    <?php endif; ?>
                    <?php if ( session ( 'library' ) != null && in_array ( $updated['id'], session ( 'library' ) ) ): ?>
                      <a href="<?= base_url ( '/libraries/removefromlibrary/'.$updated['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="far fa-minus-square"></i></span> <span>In Library</span></tag></a>
                    <?php elseif ( session ( 'wishlisted' ) != null && in_array ( $updated['id'], session ( 'wishlisted' ) ) ): ?>
                      <a href="<?= base_url ( '/libraries/addtolibrary/'.$updated['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Library</span></tag></a>
                      <a href="<?= base_url ( '/wishlists/removefromwishlist/'.$updated['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="far fa-minus-square"></i></span> <span>Wishlist</span></tag></a>
                    <?php else: ?>
                      <a href="<?= base_url ( '/libraries/addtolibrary/'.$updated['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Library</span></tag></a>
                      <a href="<?= base_url ( '/wishlists/addtowishlist/'.$updated['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="far fa-plus-square"></i></span> <span>Wishlist</span></tag></a>
                    <?php endif; ?>
                  </span>
                </div>
                <div class="is-overlay is-hidden-desktop" style="top: auto; right: 5px; bottom: 5px; left: auto;">
                  <span class="icon-text">
                    <?php if ( $updated['rumor'] == 1 ): ?><tag class="tag is-info"><span class="icon"><i class="fas fa-exclamation"></i></span></tag><?php endif; ?>
                  </span>
                </div>
              </figure>
            </div>
            <div class="card-content is-hidden-mobile">
              <p class="title is-5"><span class="icon-text"><?php if ($updated['rumor'] == 1): ?><span class="icon has-text-coral"><i class="fas fa-exclamation"></i></span><?php endif; ?><span><a  href="<?= base_url('/game/'.$updated['slug']) ?>" title="<?= $updated['name'] ?>"><?= ellipsize($updated['name'], 15, 1, '...') ?></a></span></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</article>
