<div id="likedislike_old_system" class="container mt-5">
  <div class="mx-3">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Total Like</th>
          <th>Total Dislike</th>
        </tr>
      </thead>
      <?php foreach ( $olddislike as $oldsystem ): ?>
        <tr>
          <td><?= $oldsystem['name'] ?></td>
          <td><?= $oldsystem['total_l'] ?>
            <?php if ( ! empty ( $oldsystem[ 'total_l' ] ) ): ?>
              <form action="<?= base_url ( 'games/insertnewlikesystem' ) ?>" method="post">
                <input type="hidden" name="id" value="<?= $oldsystem['id'] ?>">
                <input type="hidden" name="total_l" value="<?= $oldsystem['total_l'] ?>">
                <input type="hidden" name="total_d" value="<?= $oldsystem['total_d'] ?>">
                <button class="button is-info" type="submit">Insert to new system</button>
              </form>
            <?php endif; ?></td>
          <td><?= $oldsystem[ 'total_d' ] ?>
            <?php if ( ! empty ( $oldsystem[ 'total_d' ] ) ): ?>
              <form action="<?= base_url ( 'games/insertnewdislikesystem' ) ?>" method="post">
                <input type="hidden" name="id" value="<?= $oldsystem['id'] ?>">
                <input type="hidden" name="total_d" value="<?= $oldsystem['total_d'] ?>">
                <button class="button is-coral" type="submit">Insert to new system</button>
              </form>
            <?php endif; ?></td>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <p class="title is-1">PERFECTO</p>
</div>
