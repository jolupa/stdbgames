<div class="control">
  <div class="select">
    <select name="game_id">
      <option value="" disabled selected>Game</option>
      <?php foreach($game as $game): ?>
        <option value="<?= $game['id'] ?>"><?= $game['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
