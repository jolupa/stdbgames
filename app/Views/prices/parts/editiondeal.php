<p>
  Price:&nbsp;
  <?php if ($editiondeal ['dropped'] == 1): ?>
    <strong>Dropped From The Store</strong>
  <?php else: ?>
    <?php if (isset ($editiondeal ['price_nonpro']) && $editiondeal ['price_nonpro'] != ''): ?>
      <strike><strong><?= $editiondeal ['price'] ?> €</strong></strike>
    <?php else: ?>
      <strong><?= $editiondeal ['price'] ?> €</strong>
    <?php endif; ?>
    <?php if ($editiondeal ['pro'] == 1): ?>
      / <strong>Free For Pro Users</strong>
    <?php elseif (isset ($editiondeal ['price_pro']) && $editiondeal ['price_pro'] != ''): ?>
      / <strong><?= $editiondeal ['price_pro'] ?> € For Pro Users</strong>
    <?php endif; ?>
    <?php if (isset ($editiondeal ['price_nonpro']) && $editiondeal ['price_nonpro'] != ''): ?>
      / <strong><?= $editiondeal ['price_nonpro'] ?> € For All Users</strong>
    <?php endif; ?>
  <?php endif; ?>
</p>
<?php /*
<p>
  Price:
  <?php if (isset ($editiondeal)): ?>
    <?php if ($editiondeal ['is_f2p'] == 1): ?>
      <strong>Is Free To Play</strong>
    <?php endif; ?>
    <?php if ($editiondeal ['dropped'] == 1): ?>
      <strong>Dropped From The Store</strong>
    <?php else: ?>
      <?php if (isset ($editiondeal ['price_nonpro']) && $editiondeal ['price_nonpro'] >= date ('Y-m-d')): ?>
        <strong><strike><?= $editiondeal ['price'] ?> €</strike></strong>
      <?php elseif ($editiondeal ['rumor'] == 1 || $editiondeal ['release'] == 'TBA' || $editiondeal ['release'] == '2099/01/01'): ?>
        <strong>TBA</strong>
      <?php else: ?>
          <strong><?= $editiondeal ['price'] ?> €</strong>
      <?php endif; ?>
    <?php endif; ?>
    <?php if (!empty ($editiondeal ['price_pro']) && $editiondeal ['price_pro'] >= date ('Y-m-d')): ?>
      &nbsp;/ <strong><?= $editiondeal ['price_pro'] ?> € For Pro Users</strong>
    <?php endif; ?>
    <?php if (!empty ($editiondeal ['price_nonpro']) && $editiondeal ['price_nonpro'] >= date ('Y-m-d')): ?>
      &nbsp;/ <strong><?= $editiondeal ['price_nonpro'] ?> For All Users</strong>
    <?php endif; ?>
  <?php endif; ?>
</p>
*/ ?>
