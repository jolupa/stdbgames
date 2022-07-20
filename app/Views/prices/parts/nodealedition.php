<?php if ( isset ( $editions['dropped'] ) && $editions['dropped'] == 1 ): ?>
  Dropped from Store
<?php else: ?>
  Pri <?php if ( $editions['price'] == '' ): ?>TBA<?php else: ?><?= $editions['price'] ?> €<?php endif; ?><?php if ( $editions['pro'] == 1 && $editions['pro_from'] <= date ('Y-m-d') ): ?> | Free for Pro<?php endif; ?>
<?php endif; ?>
