<?php if ( ! empty ( $pager ) ): ?>
  <?php $pager->setSurroundCount(2) ?>
  <div class="columns is-centered">
    <div class="column is-3">
      <nav class="pagination">
        <ul class="pagination-list">
          <?php foreach ( $pager->links() as $links ): ?>
            <li>
              <a class="pagination-link <?php if ( $links['active'] ): ?>is-current<?php endif; ?>" href="<?= $links['uri']  ?>"><?= $links['title'] ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </div>
  </div>
<?php endif; ?>
