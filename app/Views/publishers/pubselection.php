<div class="control">
  <div class="select">
    <select name="publisher_id">
      <option value="" disabled selected>Publisher</option>
      <?php foreach($publisher as $publisher): ?>
        <option value="<?= $publisher['id'] ?>" <?php if(isset($game['publisher_id'])): ?><?php if($publisher['id'] == $game['publisher_id']): ?>selected<?php endif; ?><?php endif; ?>><?= $publisher['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
