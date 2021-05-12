<p class="title is-4 mt-5">Add a new edition</p>
<form action="<?= base_url ( '/editions/save') ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
  <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
  <div class="field is-grouped is-grouped-multiline">
    <div class="control is-expanded">
      <label class="label">Name</label>
      <div class="control is-expanded">
        <input class="input" name="name" placeholder="Edition name">
      </div>
    </div>
    <div class="control">
      <label class="label">Price</label>
      <div class="control">
        <input class="input" name="price" placeholder="€€€">
      </div>
    </div>
  </div>
  <div class="field is-grouped is-grouped-multiline">
    <div class="control is-expanded">
      <label class="label">Edition AppId</label>
      <div class="control is-expanded">
        <input class="input" name="ed_appid">
      </div>
    </div>
    <div class="control is-expanded">
      <label class="label">Edition SKU</label>
      <div class="control is-expanded">
        <input class="input" name="ed_sku">
      </div>
    </div>
  </div>
  <div class="field is-grouped">
    <div class="control">
      <button class="button is-primary" type="submit">Add Edtion</button>
    </div>
    <div class="control">
      <button class="button is-coral" type="reset">Reset</button>
    </div>
  </div>
</form>
<?php if ( ! empty ( $editions ) ): ?>
  <p class="title is-4 mt-5">Update editions</p>
  <?php foreach ( $editions as $editions ): ?>
    <form action="<?= base_url ( '/editions/save') ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
      <input type="hidden" name="id" value="<?= $editions['id'] ?>">
      <input type="hidden" name="game_id" value="<?= $editions['game_id'] ?>">
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <label class="label">Name</label>
          <div class="control is-expanded">
            <input class="input" name="name" placeholder="Edition name" value="<?= $editions['name'] ?>">
          </div>
        </div>
        <div class="control">
          <label class="label">Price</label>
          <div class="control">
            <input class="input" name="price" placeholder="€€€" <?php if ( ! empty ( $editions['price'] ) ): ?>value="<?= $editions['price'] ?>"<?php endif; ?>>
          </div>
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <label class="label">Edition AppId</label>
          <div class="control is-expanded">
            <input class="input" name="ed_appid" <?php if ( ! empty ( $editions['ed_appid'] ) ): ?>value="<?= $editions['ed_appid'] ?>"<?php endif; ?>>
          </div>
        </div>
        <div class="control is-expanded">
          <label class="label">Edition SKU</label>
          <div class="control is-expanded">
            <input class="input" name="ed_sku" <?php if ( ! empty ( $editions['ed_sku'] ) ): ?>value="<?= $editions['ed_sku'] ?>"<?php endif; ?>>
          </div>
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-primary" type="submit">Edit Edtion</button>
        </div>
        <div class="control">
          <button class="button is-coral" type="reset">Reset</button>
        </div>
      </div>
    </form>
  <?php endforeach; ?>
<?php endif; ?>
