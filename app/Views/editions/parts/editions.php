<p class="title is-4"><span class="icon-text"><span>Other Editions</span>&nbsp;<span class="icon"><a id="content"><i class="fas fa-plus"></i></a></span></span></p>
<div id="editions" class="content is-hidden">
  <?php foreach ( $editions as $editions ): ?>
    <p class="subtitle is-6"><strong><?= $editions['name'] ?></strong> | Pri <?= $editions['price'] ?> € | <?php if ( ! empty ( $editions['ed_appid'] ) ): ?><a href="https://stadia.google.com/store/details/<?= $editions['ed_appid'] ?>/sku/<?= $editions['ed_sku'] ?>" target="_blank">Go Stadia Store</a> | <a href="https://stadia.google.com/player/<?= $editions['ed_appid'] ?>" target="_blank">Play on Stadia</a><?php elseif ( ! empty ( $editions['ed_preorder_appid'] ) ): ?><a href="https://stadia.google.com/store/details/<?= $editions['ed_preorder_appid'] ?>/sku/<?= $editions['ed_preorder_sku'] ?>" target="_blank">Preorder On Stadia</a><?php elseif ( ! empty ( $editions['ed_demo_appid'] ) ): ?><a href="https://stadia.google.com/player/<?= $editions['ed_demo_appid'] ?>/sku/<?= $editions['ed_demo_sku'] ?>" target="_blank">Play Demo on Stadia</a><?php endif; ?></p>
  <?php endforeach; ?>
</div>
