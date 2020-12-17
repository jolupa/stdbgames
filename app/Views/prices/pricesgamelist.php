<table class="table is-fullwidth">
  <tbody>
    <tr>
      <th class="has-text-left">Price</th>
      <th class="has-text-centered">Date Discounted</th>
      <th class="has-text-centered">Discount is Valid</th>
      <th class="has-text-centered is-hidden-touch">Discount Type</th>
    </tr>
    <?php if($price == FALSE): ?>
      <tr>
        <td colspan="4" class="has-text-centered">No Price History for <strong><?= $game['name'] ?></strong></td>
      </tr>
    <?php else: ?>
      <?php foreach($price as $price): ?>
        <tr>
          <td class="has-text-left"><?= number_format($price['price'], 2) ?>&nbsp;€</td>
          <td class="has-text-centered"><?= $price['date'] ?></td>
          <td class="has-text-centered"><?= $price['date_till'] ?></td>
          <td class="has-text-centered is-hidden-touch"><?php if($price['discount_type'] == 1): ?>Pro<?php else: ?>Everyone<?php endif; ?></td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
