<p class="title is-4 mt-5">Deals history</p>
<div id="history_prices" class="column">
  <table class="table is-fullwidth">
    <thead>
      <tr class="has-text-centered">
        <th>Date</th>
        <th>Pro Price</th>
        <th>Valid Pro</th>
        <th>All Users Price</th>
        <th>Valid All Users</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ( $history as $history ): ?>
        <tr class="has-text-centered">
          <td><?= date ( 'd-m-Y', strtotime ( $history['date'] ) ) ?></td>
          <td>
            <?php if ( ! empty ( $history['price_pro'] ) ): ?>
              <?= $history['price_pro'] ?> €
            <?php else: ?>
              <span class="icon"><i class="far fa-times-circle"></i></span>
            <?php endif; ?>
          </td>
          <td>
            <?php if ( ! empty ( $history['date_till_pro'] ) ): ?>
              <?= date ( 'd-m-Y', strtotime ( $history['date_till_pro'] ) ) ?>
            <?php else: ?>
              <span class="icon"><i class="far fa-times-circle"></i></span>
            <?php endif; ?>
          </td>
          <td>
            <?php if ( ! empty ( $history['price_nonpro'] ) ): ?>
              <?= $history['price_nonpro'] ?> €
            <?php else: ?>
              <span class="icon"><i class="far fa-times-circle"></i></span>
            <?php endif; ?>
          </td>
          <td>
            <?php if ( ! empty ( $history['date_till_nonpro'] ) ): ?>
              <?= date ( 'd-m-Y', strtotime ( $history['date_till_nonpro'] ) ) ?>
            <?php else: ?>
              <span class="icon"><i class="far fa-times-circle"></i></span>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?= $pager->links('history') ?>
