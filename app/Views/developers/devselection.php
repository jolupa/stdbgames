<div class="control">
  <div class="select">
    <select name="developer_id">
      <option value="" disabled selected>Developer</option>
      <?php foreach($developer as $developer): ?>
        <option value="<?= $developer['id'] ?>"<?php if(isset($game['developer_id'])): ?><?php if($developer['id'] == $game['developer_id']): ?>selected<?php endif; ?><?php endif; ?>><?= $developer['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
