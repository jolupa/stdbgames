<div class="control">
  <label class="label">Genres:</label>
  <div class="tags">
    <?php foreach($genre as $genre): ?>
      <span class="tag is-primary is-small has-text-dark"><input type="checkbox" class="checkbox" name="genre[]" value="<?= $genre['id'] ?>">&nbsp;<?= $genre['name'] ?></span>
    <?php endforeach; ?>
  </div>
</div>
