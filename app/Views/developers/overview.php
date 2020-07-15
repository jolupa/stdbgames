<div class="columns mt-2">
  <div class="column is-fullwidth">
    <p class="subtitle is-5">Developer:</p>
    <p class="title is-3">
      <?= $developer['name'] ?>
    </p>
    <?php if($developer['url'] !== ''): ?>
      <div class="content">
        <p><span class="icon"><i class="fas fa-chevron-right"></i></span>&nbsp;<a href="<?= $developer['url'] ?>" target="_blank">Visit Website</a></p>
      </div>
    <?php endif; ?>
    <?php if(isset($developer['about']) && $developer['about'] !== ''): ?>
      <div class="content">
        <?= $developer['about'] ?>
      </div>
    <?php endif; ?>
  </div>
</div>
<?= view_cell('App\Controllers\Developers::gamesdevelopedby', 'developer_id='.$developer['id']) ?>
