<div class="columns mt-2">
  <div class="column is-fullwidth">
    <p class="subtitle is-5">Developer:</p>
    <p class="title is-3">
      <?= $developer['name'] ?>
    </p>
    <div class="content">
      <?php if($developer['url'] !== ''): ?>
        <p><span class="icon"><i class="fas fa-chevron-right"></i></span>&nbsp;<a href="<?= $developer['url'] ?>" target="_blank">Visit Website</a></p>
      <?php endif; ?>
      <?php if(isset($developer['about']) && $developer['about'] !== ''): ?>
        <?= $developer['about'] ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<?= view_cell('App\Controllers\Developers::gamesdevelopedby', 'developer_id='.$developer['id']) ?>
