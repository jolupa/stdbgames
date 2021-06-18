<div class="field">
  <div class="control">
    <label class="label">Developer</label>
    <div class="select">
      <select name="developer">
        <option></option>
        <?php foreach ( $dev_all as $dev_all ): ?>
          <option value="<?= $dev_all['id'] ?>" <?php if ( isset ( $game['developer_id'] ) && $game['developer_id'] == $dev_all['id'] || isset ( $interview['developer_id'] ) && $interview['developer_id'] == $dev_all['id'] ): ?>selected<?php endif; ?>><?= $dev_all['name'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <?php if ( isset ( $validation ) && $validation->hasError('developer') ): ?><p class="help has-text-coral"><?= $validation->getError('developer') ?></p><?php endif; ?>
  </div>
</div>
