<p>
  Price:&nbsp;
  <?php if ( $game ['is_f2p'] == 1 ): ?>
    <strong>Free To Play</strong>
  <?php elseif ($game ['dropped'] == 1): ?>
    <strong>Dropped From The Store</strong>
  <?php elseif ($game ['ed_only'] == 1): ?>
    <strong>See Editions For Prices</strong>
  <?php else: ?>
    <?php if ( isset ( $dealongame ) && !empty ($dealongame ['price_nonpro'] ) ): ?>
      <strong><strike><?= $game ['price'] ?> €</strike></strong>
    <?php elseif ($game ['rumor'] == 1 || $game ['price'] == ''): ?>
      <strong>TBA</strong>
    <?php else: ?>
      <strong><?= $game ['price'] ?> €</strong>
    <?php endif; ?>
    <?php if ( isset ( $dealongame ) && $dealongame ['price_pro'] != '' && $game ['pro'] == 0 ): ?>
      &nbsp;/ <strong><?= $dealongame ['price_pro'] ?> € For Pro Users</strong>
    <?php endif; ?>
    <?php if ( $game ['pro'] == 1 && $game ['pro_from'] <= date ('Y-m-d') ): ?>
      &nbsp;/ <strong>Free For Pro Users</strong>
    <?php endif; ?>
    <?php if ( isset ($dealongame) && $dealongame ['price_nonpro'] != '' ): ?>
      &nbsp;/ <strong><?= $dealongame ['price_nonpro'] ?> € For All Users</strong>
    <?php endif; ?>
  <?php endif; ?>
</p>
