<table class="table is-fullwidth">
  <thead>
    <tr>
      <th>Addon Name</th>
      <th class="has-text-centered">Release Date</th>
      <th class="has-text-right">Release Price</th>
    </tr>
  </thead>
  <tbody>
    <?php if($addon == FALSE): ?>
      <tr>
        <td colspan="3" class="has-text-centered">No Addons for <strong><?= $game['name'] ?></strong> At this Moment</td>
      </tr>
    <?php else: ?>
      <?php foreach($addon as $addon): ?>
        <tr>
          <td>
            <?php if($addon['appid'] !== ''): ?>
              <a title="Go To Store" href="https://stadia.google.com/store/details/<?= $addon['appid'] ?>/sku/<?= $addon['sku'] ?>" target="_blank"><?= $addon['name'] ?></a>
            <?php else: ?>
              <?= $addon['name'] ?>
            <?php endif; ?>
          </td>
          <td class="has-text-centered"><?= $addon['release'] ?></td>
          <td class="has-text-right">
            <?php if(!$addon['price']): ?>
              No Info
            <?php else: ?>
              <?= $addon['price'] ?> €
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
