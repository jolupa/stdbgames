<div class="content mt-2">
  <p class="title is-5">Add price</p>
  <p class="subtitle is-3">History:</p>
  <form action="<?= base_url() ?>/prices/createpricedb" method="post">
    <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
    <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
    <div class="field is-grouped is-grouped-multiline">
      <div class="control is-expanded">
        <input class="input" type="text" name="price_pro" placeholder="€€.€€">
      </div>
      <div class="control">
        <input class="input" type="text" name="price_nonpro" placeholder="Non Pro €€.€€">
      </div>
      <div class="control">
        <input class="input" type="date" name="date" placeholder="Starts...">
      </div>
      <div class="control">
        <input class="input" type="date" name="date_till_pro" placeholder="Ends Pro...">
      </div>
      <div class="control">
        <input class="input" type="date" name="date_till_nonpro" placeholder="End Non Pro...">
      </div>
      <div class="control">
        <label class="checkbox">
          <input type="checkbox" name="for_pro">
          For Pro
        </label>
        <label class="checkbox">
          <input type="checkbox" name="for_nonpro">
          For NonPro
          </input>
        </label>
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
