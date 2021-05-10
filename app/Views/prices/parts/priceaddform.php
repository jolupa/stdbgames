<p class="title is-4 mt-5">Add Deals</p>
<form method="post" action="<?= base_url ( '/prices/savepricesdb' ) ?>" enctype="multipart/form-data">
  <input type="hidden" name="slug" value="<?= $game [ 'slug' ] ?>">
  <input type="hidden" name="game_id" value="<?= $game ['id'] ?>">
  <input type="hidden" name="name" value="<?= $game['name'] ?>">
  <div class="field is-grouped">
    <div class="control">
      <label class="label">Valid From</label>
      <input class="input" type="date" name="date">
      <?php if ( ! empty ( session ('validation') ) ): ?>
        <p class="help is-coral"><?= session ('validation') ?></p>
      <?php endif; ?>
    </div>
    <div class="control is-expanded">
      <div class="field is-grouped">
        <div class="control is-expanded">
          <label class="label">Price Pro</label>
          <input class="input" type="text" name="price_pro">
        </div>
        <div class="control is-expanded">
          <label class="label">Date Until Valid Pro</label>
          <input class="input" type="date" name="date_till_pro">
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control is-expanded">
          <label class="label">Price All Users</label>
          <input class="input" type="text" name="price_nonpro">
        </div>
        <div class="control is-expanded">
          <label class="label">Date Until Valid All Users</label>
          <input class="input" type="date" name="date_till_nonpro">
        </div>
      </div>
    </div>
  </div>
  <div class="field is-grouped">
    <div class="control">
      <button class="button is-primary" type="submit">Add!</button>
    </div>
    <div class="control">
      <button class="button is-coral" type="reset">Reset</button>
    </div>
  </div>
</form>
<?php if ( ! empty ( $prices ) ): ?>
  <p class="title is-4 mt-5">Update prices</p>
  <?php foreach ( $prices as $prices ): ?>
    <form action="<?= base_url ( '/prices/savepricesdb' ) ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $prices['id'] ?>">
      <input type="hidden" name="game_id" value="<?=$game['id']  ?>">
      <input type="hidden" name="slug" value="<?= $game[ 'slug' ] ?>">
      <div class="field is-grouped">
        <div class="control">
          <label class="label">Valid From</label>
          <input class="input" type="date" name="date" <?php if ( ! empty ( $prices['date'] ) ): ?>value="<?= $prices['date'] ?>"<?php endif; ?>>
        </div>
        <div class="control is-expanded">
          <div class="field is-grouped">
            <div class="control is-expanded">
              <label class="label">Price Pro</label>
              <input class="input" type="text" name="price_pro" <?php if ( ! empty ( $prices['price_pro'] ) ): ?>value="<?= $prices['price_pro'] ?>"<?php endif; ?>>
            </div>
            <div class="control is-expanded">
              <label class="label">Date Until Valid Pro</label>
              <input class="input" type="date" name="date_till_pro" <?php if ( ! empty ( $prices['date_till_pro'] ) ): ?>value="<?= $prices['date_till_pro'] ?>"<?php endif; ?>>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control is-expanded">
              <label class="label">Price All Users</label>
              <input class="input" type="text" name="price_nonpro" <?php if ( ! empty ( $prices['price_nonpro'] ) ): ?>value="<?= $prices['price_nonpro'] ?>"<?php endif; ?>>
            </div>
            <div class="control is-expanded">
              <label class="label">Date Until Valid All Users</label>
              <input class="input" type="date" name="date_till_nonpro" <?php if ( ! empty ( $prices['date_till_nonpro'] ) ): ?>value="<?= $prices['date_till_nonpro'] ?>"<?php endif; ?>>
            </div>
          </div>
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-primary" type="submit">Update!</button>
        </div>
        <div class="control">
          <button class="button is-coral" type="reset">Delete!</button>
        </div>
      </div>
    </form>
  <?php endforeach; ?>
<?php endif; ?>
