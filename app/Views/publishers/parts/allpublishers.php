<div class="field">
  <div class="control">
    <label class="label">Publisher</label>
    <div class="select">
      <select name="publisher">
        <option></option>
        <?php foreach ( $pub_all as $pub_all ): ?>
          <option value="<?= $pub_all['id'] ?>" <?php if ( isset ( $game['publisher_id'] ) && $game['publisher_id'] == $pub_all['id'] || isset ( $_POST['publisher'] ) && $_POST['publisher'] == $pub_all['id'] ): ?>selected<?php endif; ?>><?= $pub_all['name'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <?php if ( isset ( $validation ) && $validation->hasError('publisher') ): ?><p class="help has-text-coral"><?= $validation->getError('publisher') ?></p><?php endif; ?>
  </div>
</div>
