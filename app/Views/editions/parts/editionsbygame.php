<p id="edition_by_games" class="title is-4 mt-5">Game Editions</p>
<div class="columns is-multiline is-mobile">
  <?php foreach ( $editions as $editions ): ?>
    <div class="column is-half-desktop is-half-mobile">
      <div class="card is-shadowless">
        <div class="card-image">
          <figure class="image is-3by2">
            <img src="<?= base_url ( '/img/games/'.$editions['image'].'.jpeg' ) ?>">
          </figure>
          <div class="is-overlay" style="top:10px; bottom:auto; left:auto; right:10px;">
            <?php if ( session ( 'logged' ) == true && session ( 'role' ) == 1 ): ?>
              <a href="<?= base_url ( 'editions/updateformeditions/'.$editions['id'] ) ?>"><tag class="tag is-minion"><span>Update</span></tag></a>
            <?php endif; ?>
          </div>
          <div class="is-overlay is-hidden-touch" style="top:auto; bottom: 10px; left: auto; right: 10px;">
            <span class="icon-text">
              <?php if ( session ( 'likes' ) != null && in_array ( $editions['like'], session ( 'likes' ) ) ): ?>
                <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $editions['like'] ?> Likes</span></tag>
              <?php else: ?>
                <a href="<?= base_url( '/games/like/'.$editions['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $editions['like'] ?> Likes</span></tag></a>
              <?php endif; ?>
              <?php if ( session ( 'dislikes' ) != null && in_array ( $editions['dislike'], session ( 'dislikes' ) ) ): ?>
                <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $editions['dislike'] ?> Dislikes</span></tag>
              <?php else: ?>
                <a href="<?= base_url ( '/game/dislike/'.$editions['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $editions['dislike'] ?> Dislikes</span></tag></a>
              <?php endif; ?>
              <?php if ( session ( 'library' ) != null && in_array ( $editions['id'], session ( 'library' ) ) ): ?>
                <a href="<?= base_url ( '/libraries/removefromlibrary/'.$editions['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-minus"></i></span> <span>In Library</span></tag></a>
              <?php elseif ( session ( 'wishlisted' ) != null && in_array ( $editions['id'], session ( 'wishlisted' ) ) ) : ?>
                <a href="<?= base_url ('/libraries/addtolibrary/'.$editions['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-plus"></i></span> <span>Add Library</span></tag></a>
                <a href="<?= base_url ( '/wishlists/removefromwishlist/'.$editions['id'] ) ?>"><tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-minus"></i></span> <span>Wishlisted</span></tag></a>
              <?php else: ?>
                <a href="<?= base_url ( '/libraries/addtolibrary/'.$editions['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-plus"></i></span> <span>Add Library</span></tag></a>
                <a href="<?= base_url ( '/wishlists/addtowishlist/'.$editions['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-plus"></i></span> <span>Add Wishlist</span></tag></a>
              <?php endif; ?>
            </span>
          </div>
        </div>
        <div class="card-content">
          <p class="title is-5"><?= $editions['name'] ?></p>
          <p class="subtitle is-7"><?= view_cell ( 'App\Controllers\Prices::dealoneditions', 'id='.$editions['id'] ) ?><?php if ( ! empty ( $editions['appid'] ) ): ?> | <a href="https://stadia.google.com/store/details/<?= $editions['appid'] ?>/sku/<?= $editions['sku'] ?>" target="_blank">Go To Stadia Store</a> | <a href="https://stadia.google.com/player/<?= $editions['appid'] ?>" target="_blank">Play On Stadia</a><?php else: ?><?php if ( ! empty ( $editions['preorder_appid'] ) ): ?> | <a href="https://stadia.google.com/store/details/<?= $editions['preorder_appid'] ?>/sku/<?= $editions['preorder_sku'] ?>" target="_blank">Pre Order</a><?php elseif ( ! empty ( $editions['demo_appid'] ) ): ?> | <a href="https://stadia.google.com/store/details/<?= $editions['demo_Appid'] ?>/sku/<?= $editions['demo_sku'] ?>" target="_blank">Play Demo</a><?php endif; ?><?php endif; ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
