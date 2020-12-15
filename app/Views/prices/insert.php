<div class="content mt-2">
  <p class="title is-5">Add price</p>
  <p class="subtitle is-3">History:</p>
  <form action="<?= base_url() ?>/prices/createpricedb" method="post">
    <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
    <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
    <div class="field is-grouped is-grouped-multiline">
      <div class="control is-expanded">
        <input class="input" type="text" name="price" placeholder="€€.€€">
      </div>
      <div class="control">
        <input class="input" type="date" name="date" placeholder="Starts...">
      </div>
      <div class="control">
        <input class="input" type="date" name="date_till" placeholder="Ends...">
      </div>
      <div class="control">
        <div class="select">
          <select name="discount_type">
            <option value="" disabled selected>Disc. Type</option>
            <option value="0">Everyone</option>
            <option value="1">Pro</option>
          </select>
        </div>
      </div>
      <div class="control">
        <button class="button is-primary" value="submit">Add!</button>
      </div>
      <div class="control">
        <button class="button is-danger" value="reset">Clear</button>
      </div>
    </div>
  </form>
</div>
