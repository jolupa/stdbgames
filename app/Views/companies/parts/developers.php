<div class="control">
  <label class="label">Developer:</label>
  <div class="select">
    <select id="developer" name="developer_id">
      <option></option>
      <?php foreach ($developers as $developer): ?>
        <option value="<?= $developer ['id'] ?>"
        <?php if (isset ($_POST ['developer_id']) && $_POST ['developer_id'] == $developer ['id'] ||
        isset ($game ['developer_id']) && $game ['developer_id'] == $developer ['id']): ?>
          selected
        <?php endif; ?>
        >
        <?= $developer ['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <?php if ( isset ( $validation ) && $validation->hasError( 'developer_id' ) ): ?>
    <div class="control">
      <label class="help has-text-danger">
        <?= $validation->getError( 'developer_id' ) ?>
      </label>
    </div>
  <?php endif; ?>
</div>
