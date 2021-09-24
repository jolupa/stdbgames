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
        </div>
        <div class="card-content">
          <p class="title is-5"><?= $editions['name'] ?></p>
          <p class="subtitle is-7"><?= view_cell ( 'App\Controllers\Prices::dealoneditions', 'id='.$editions['id'] ) ?><?php if ( isset ( $editions['dropped'] ) && $editions['dropped'] == 0 ): ?><?php if ( ! empty ( $editions['appid'] ) ): ?> | <a href="https://stadia.google.com/store/details/<?= $editions['appid'] ?>/sku/<?= $editions['sku'] ?>" target="_blank">Go To Stadia Store</a> | <a href="https://stadia.google.com/player/<?= $editions['appid'] ?>" target="_blank">Play On Stadia</a><?php else: ?><?php if ( ! empty ( $editions['preorder_appid'] ) ): ?> | <a href="https://stadia.google.com/store/details/<?= $editions['preorder_appid'] ?>/sku/<?= $editions['preorder_sku'] ?>" target="_blank">Pre Order</a><?php elseif ( ! empty ( $editions['demo_appid'] ) ): ?> | <a href="https://stadia.google.com/store/details/<?= $editions['demo_Appid'] ?>/sku/<?= $editions['demo_sku'] ?>" target="_blank">Play Demo</a><?php endif; ?><?php endif; ?><?php endif; ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
