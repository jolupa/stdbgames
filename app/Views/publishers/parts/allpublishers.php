<div class="control">
  <label class="label">Publisher:</label>
  <div class="select">
    <select id="publisher" name="publisher_id">
      <option></option>
      <?php foreach ($pub_all as $publishers): ?>
        <option value="<?= $publishers ['id'] ?>"
          <?php if (isset ($_POST['publisher_id']) && $_POST ['publisher_id'] == $publishers ['id'] ||
          isset ($game ['publisher_id']) && $game ['publisher_id'] == $publishers ['id']): ?>
          selected
          <?php endif; ?>
          >
          <?= $publishers ['name'] ?>
        </option>
      <?php endforeach; ?>
    </select>
    <?php if ( isset ( $validation ) && $validation->hasError( 'publisher_id' ) ): ?>
      <div class="control">
        <label class="help has-text-danger">
          <?= $validation->getError( 'publisher_id' ) ?>
        </label>
      </div>
    <?php endif; ?>
  </div>
</div>
