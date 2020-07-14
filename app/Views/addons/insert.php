<div class="columns mt-2">
  <div class="column">
    <p class="subtitle is-5">Add</p>
    <p class="title is-3">Add-on</p>
  </div>
</div>
<div class="columns mb-2">
  <div class="column">
    <form action="<?= base_url() ?>/addons/createaddondb" method="post">
      <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
      <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <input type="text" class="input" name="name" placeholder="Addon's Name">
        </div>
        <div class="control is-expanded">
          <input type="date" class="input" name="release" placeholder="Release Date YYYY-MM-DD">
        </div>
        <div class="control is-expanded">
          <input type="text" class="input" name="price" placeholder="Price $$.$$">
        </div>
        <div class="control is-expanded">
          <input type="text" class="input" name="sku" placeholder="Google's Game SKU">
        </div>
        <div class="control is-expanded">
          <input type="text" class="input" name="appid" placeholder="Google's Game Appid">
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <button class="button is-primary has-text-dark is-small" value="submit">Add Add-on!</button>
        </div>
        <div class="control">
          <button class="button is-danger has-text-white is-small" value="reset">Clear</button>
        </div>
      </div>
    </form>
  </div>
</div>
