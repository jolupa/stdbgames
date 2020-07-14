<?php if($addon == true): ?>
  <div class="columns mt-2">
    <div class="column">
      <p class="subtitle is-5">Update</p>
      <p class="title is-3">Add-ons</p>
    </div>
  </div>
  <div class="columns mb-2">
    <div class="column">
      <?php foreach($addon as $addon): ?>
        <form action="<?= base_url() ?>/addons/updateaddondb" method="post" class="mb-2">
          <input type="hidden" name="game_id" value="<?= $addon['game_id'] ?>">
          <input type="hidden" name="id" value="<?= $addon['id'] ?>">
          <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <input type="text" class="input" name="name" placeholder="Addon's Name" value="<?= $addon['name'] ?>">
            </div>
            <div class="control is-expanded">
              <input type="date" class="input" name="release" placeholder="Release Date YYYY-MM-DD" value="<?= $addon['release'] ?>">
            </div>
            <div class="control is-expanded">
              <input type="text" class="input" name="price" placeholder="Price $$.$$" value="<?= $addon['price'] ?>">
            </div>
            <div class="control is-expanded">
              <input type="text" class="input" name="sku" placeholder="Google's Game SKU" value="<?= $addon['sku'] ?>">
            </div>
            <div class="control is-expanded">
              <input type="text" class="input" name="appid" placeholder="Google's Game Appid" value="<?= $addon['appid'] ?>">
            </div>
            <div class="control">
              <button class="button is-primary has-text-dark" value="submit">Update!</button>
            </div>
            <div class="control">
              <button class="button is-danger has-text-white" value="reset">Clear</button>
            </div>
          </div>
        </form>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>
