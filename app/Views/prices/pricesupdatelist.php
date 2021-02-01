<?php if($price == true): ?>
  <div class="content mt-2">
    <p class="title is-5">Update</p>
    <p class="subtitle is-3">Prices</p>
    <?php foreach($price as $price): ?>
      <form action="<?= base_url() ?>/prices/updatepricedb" method="post" class="mb-2">
        <input type="hidden" name="game_id" value="<?= $price['game_id'] ?>">
        <input type="hidden" name="id" value="<?= $price['id'] ?>">
        <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
        <div class="field is-grouped is-grouped-multiline">
          <div class="control is-expanded">
            <input type="text" class="input" name="price_pro" placeholder="€€.€€" value="<?= $price['price_pro'] ?>">
          </div>
            <div class="control is-expanded">
              <input type="text" class="input" name="price_nonpro" placeholder="Price for Non Pro €€.€€" value="<?= $price['price_nonpro'] ?>">
            </div>
          <div class="control">
            <input type="date" class="input" name="date" placeholder="Starts..." value="<?= $price['date'] ?>">
          </div>
          <div class="control">
            <input type="date" class="input" name="date_till_pro" placeholder="Ends..." value="<?= $price['date_till_pro'] ?>">
          </div>
          <div class="control">
            <input type="date" class="input" name="date_till_nonpro" placeholder="Ends Non Pro..." value="<?= $price['date_till_nonpro'] ?>">
          </div>
          <div class="control">
            <label class="checkbox">
              <input type="checkbox" name="for_pro" <?php if($price['for_pro'] == 1): ?>checked<?php endif; ?>>
              Is For Pro
            </label>
            <liabel class="checkbox">
              <input type="checkbox" name="for_nonpro" <?php if($price['for_nonpro'] == 1): ?>checked<?php endif; ?>>
              Is For non pro
            </label>
          </div>
          <div class="control">
            <button class="button is-primary" value="submit">Update!</button>
          </div>
          <div class="control">
            <button class="button is-danger" value="reset">Clear</button>
          </div>
        </div>
      </form>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
