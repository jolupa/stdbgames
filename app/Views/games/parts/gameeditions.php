<div class="content" id="game_editions">
  <h1 class="title">
    Game Editions:
  </h1>
</div>
<div class="columns is-multiline">
  <?php foreach ($editions as $edition): ?>
    <div class="column is-4-desktop">
      <div class="card is-equal">
        <div class="card-image">
          <figure class="image is-5by3">
            <img src="<?= base_url ( '/assets/images/games/'.$edition['image'].'.jpeg' ) ?>">
          </figure>
        </div>
        <div class="card-content">
          <?php if ($edition ['rumor'] == 1): ?>
            <p class="help">
              <?= $edition ['rumor'] ?>
            </p>
          <?php endif; ?>
          <h5 class="title is-5">
            <?= $edition['name'] ?>
          </h5>
          <h6 class="is-6 subtitle">
            <span class="icon-text">
              <?php if ( $edition ['dropped'] == 0 ): ?>
                <?php if (!empty ($edition ['appid'] || !empty ($edition ['preorder_appid'] ) ) ): ?>
                  <?php if (!empty ($edition ['appid'] ) ): ?>
                    <span class="icon"><a href="https://stadia.google.com/store/details/<?= $edition['appid'] ?>/sku/<?= $edition['sku'] ?>" target="_blank" title="Go To Stadia Store"><i class="fa-solid fa-shop"></i></a></span>
                  <?php else: ?>
                    <span class="icon"><a href="https://stadia.google.com/store/details/<?= $edition['preorder_appid'] ?>/sku/<?= $edition['preorder_sku'] ?>" target="_blank" title="Pre Order Game"><i class="fa-solid fa-shop"></i></a></span>
                  <?php endif; ?>
                <?php endif; ?>
                <?php if (!empty ($edition ['appid'] ) ): ?>
                  <span class="icon"><a href="https://stadia.google.com/player/<?= $game['appid'] ?>" target="_blank" title="Play On Stadia"><i class="fa-solid fa-gamepad"></i></a></span>
                <?php endif; ?>
                <?php if (!empty ($edition ['demo_appid'] ) ): ?>
                  <span class="icon"><a href="https://stadia.google.com/player/<?= $edition['demo_appid'] ?>" target="_blank" title="Try The Game On Stadia"><i class="fa-solid fa-chess"></i></a></span>
                <?php endif; ?>
              <?php endif; ?>
            </span>
          </h6>
          <p>
            Release: <strong><?= date ('d-m-Y', strtotime ($edition ['release'])) ?></strong>
          </p>
          <?= view_cell ('App\Controllers\Prices::dealoneditions', 'ed_price='.$edition ['price'].' ed_dropped='.$edition ['dropped'].' ed_id='.$edition ['id'].' ed_pro='.$edition ['pro']) ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
