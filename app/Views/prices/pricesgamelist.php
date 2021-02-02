<p class="title is-5">Price</p>
<p class="subtitle is-3">#History</p>
<table class="table is-fullwidth">
  <tbody>
    <tr>
      <th class="has-text-left">Price (Pro/Non Pro)</th>
      <th class="has-text-centered is-hidden-touch">Date Discounted</th>
      <th class="has-text-centered">Discount is Valid (Pro/Non Pro)</th>
    </tr>
    <?php if($price == FALSE): ?>
      <tr>
        <td colspan="4" class="has-text-centered">No Price History for <strong><?= $game['name'] ?></strong></td>
      </tr>
    <?php else: ?>
      <?php foreach($price as $price): ?>
        <tr>
          <td class="has-text-left"><?php if($price['price_pro'] != ''):?><?= number_format($price['price_pro'], 2) ?>&nbsp;€&nbsp;<?php else: ?>--&nbsp;<?php endif; ?>/<?php if($price['price_nonpro'] != ''): ?>&nbsp;<?= number_format($price['price_nonpro'], 2) ?>&nbsp;€&nbsp;<?php else: ?>&nbsp;--<?php endif; ?></td>
          <td class="has-text-centered is-hidden-touch"><?= $price['date'] ?></td>
          <td class="has-text-centered"><?php if($price['date_till_pro'] != ''): ?><?= $price['date_till_pro'] ?>&nbsp;<?php else: ?>--&nbsp;<?php endif; ?>/<?php if($price['date_till_nonpro'] != ''): ?>&nbsp;<?= $price['date_till_nonpro'] ?><?php else: ?>&nbsp;--<?php endif; ?></td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
