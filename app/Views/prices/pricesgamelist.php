<table class="table is-fullwidth">
  <thead>
    <tr>
      <th class="has-text-left">Release Price</th>
      <th colspan="3"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="has-text-left"><?php if(!$game['price']): ?>No Info<?php else: ?><?= number_format($game['price'], 2) ?>&nbsp;€<?php endif; ?></td>
      <td colspan="3"></td>
    </tr>
    <tr>
      <th class="has-text-left">Price</th>
      <th class="has-text-centered">Date Discounted</th>
      <th class="has-text-centered">Discount is Valid</th>
      <th class="has-text-centered">Discount Type</th>
    </tr>
    <?php if($price == FALSE): ?>
      <tr>
        <td colspan="4" class="has-text-centered">No Price History for <strong><?= $game['name'] ?></strong></td>
      </tr>
    <?php else: ?>
      <?php foreach($price as $price): ?>
        <tr <?php if($price['discount_type'] == 1): ?>class="has-background-light"<?php endif; ?>>
          <td class="has-text-left"><?= number_format($price['price'], 2) ?>&nbsp;€</td>
          <td class="has-text-centered"><?= $price['date'] ?></td>
          <td class="has-text-centered"><?= $price['date_till'] ?></td>
          <td class="has-text-centered"><?php if($price['discount_type'] == 1): ?>Pro<?php else: ?>Normal<?php endif; ?></td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
