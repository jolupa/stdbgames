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
            <input type="text" class="input" name="price" placeholder="€€.€€" value="<?= $price['price'] ?>">
          </div>
          <div class="control is-expanded">
            <input type="date" class="input" name="date" placeholder="Starts..." value="<?= $price['date'] ?>">
          </div>
          <div class="control is-expanded">
            <input type="date" class="input" name="date_till" placeholder="Ends..." value="<?= $price['date_till'] ?>">
          </div>
          <div class="control">
            <div class="select">
              <select name="discount_type">
                <option value="" <?php if($price['discount_type'] != 1 || $price['discount_type'] != 0): ?>disabled selected<?php endif; ?>>Disc. Type</option>
                <option value="0" <?php if($price['discount_type'] == 0): ?>selected<?php endif; ?>>Normal</option>
                <option value="1" <?php if($price['discount_type'] == 1): ?>selected<?php endif; ?>>Pro</option>
              </select>
            </div>
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
<?php endif; ?>
