<?php if ( isset ( $editiondeals['price_pro'] ) || isset ( $editiondeals['price_nonpro'] ) ): ?>
  <?php if ( $editiondeals['price_nonpro'] != '' ): ?><strike>Pri <?= $editions['price'] ?>&nbsp;€</strike><?php else: ?> Pri <?= $editions['price'] ?>&nbsp;€<?php endif; ?><?php if ( $editiondeals['price_pro'] != '' && $editions['pro'] == 0 ): ?> | Pro <?= $editiondeals['price_pro'] ?>&nbsp;€<?php endif; ?><?php if ( $editions['pro'] == 1 && $game['pro_from'] <= date('Y-m-d') ): ?> | Free for Pro<?php endif; ?><?php if ( $editiondeals['price_nonpro'] != '' ): ?> | All <?= $editiondeals['price_nonpro'] ?>&nbsp;€<?php endif; ?>
<?php elseif ( isset ( $price ) ): ?>
  Pri <?php if ( $price['price'] == '' ): ?>TBA<?php else: ?><?= $price['price'] ?> €<?php endif; ?><?php if ( $price['pro'] == 1 && $price['pro_from'] <= date ('Y-m-d') ): ?> | Free for Pro<?php endif; ?>
<?php endif; ?>
