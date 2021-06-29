<?php if ( isset ( $game['is_f2p'] ) && $game['is_f2p'] == 1 ): ?>
  | Free to Play
<?php elseif ( isset ( $game['dropped'] ) && $game['dropped'] == 1 ): ?>
  | Dropped from the Store
<?php else: ?>
  <?php if ( isset ($dealongame['price_pro']) || isset ($dealongame['price_nonpro']) ): ?>

  | <?php if ( $dealongame['price_nonpro'] != '' ): ?><strike>Pri <?= $game['price'] ?>&nbsp;€</strike><?php else: ?> Pri <?= $game['price'] ?>&nbsp;€<?php endif; ?><?php if ( $dealongame['price_pro'] != '' && $game['pro'] == 0 ): ?> | Pro <?= $dealongame['price_pro'] ?>&nbsp;€<?php endif; ?><?php if ( $game['pro'] == 1 && $game['pro_from'] <= date('Y-m-d') ): ?> | Free for Pro<?php endif; ?><?php if ( $dealongame['price_nonpro'] != '' ): ?> | All <?= $dealongame['price_nonpro'] ?>&nbsp;€<?php endif; ?>

  <?php else: ?>

    | Pri <?php if ( $game['price'] == '' ): ?>TBA<?php else: ?><?= $game['price'] ?> €<?php endif; ?><?php if ( $game['pro'] == 1 && $game['pro_from'] <= date ('Y-m-d') ): ?> | Free for Pro<?php elseif ( $game['pro'] == 1 ): ?><?php if ( $game['pro_from'] == $game['release'] ): ?> | Free for Pro on Launch<?php endif; ?><?php endif; ?>

  <?php endif; ?>

<?php endif; ?>
