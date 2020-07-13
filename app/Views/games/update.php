<?php if(isset($error)): ?>
  <div class="columns mb-2">
    <div class="column has-text-centered">
      <div class="content">
        <p><?= $error ?></p>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="columns mt-2">
    <div class="column">
      <p class="subtitle is-5">Update a</p>
      <p class="title is-3">Game:</p>
    </div>
  </div>
  <div class="columns mb-2">
    <div class="column">
      <form method="post" action="<?= base_url() ?>/games/updategamedb" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $game['id'] ?>">
        <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
        <input type="hidden" name="oldimage" value="<?= $game['image'] ?>">
        <div class="field is-grouped is-grouped-multiline">
          <div class="control is-expanded">
            <input type="input" class="input" name="name" placeholder="Game's name" value="<?= $game['name'] ?>">
          </div>
          <div class="control is-expanded">
            <input type="text" class="input" name="release" placeholder="Release Date: YYYY-MM-DD" value="<?= $game['release'] ?>">
          </div>
          <div class="control is-expanded">
            <input type="text" class="input" name="price" placeholder="Release Price: €€.€€" value="<?= $game['price'] ?>">
          </div>
        </div>
        <div class="field is-grouped is-grouped-multiline">
          <div class="control">
            <label class="label">Is First on Stadia?</label>
            <div class="select">
              <select name="first_on_stadia">
                <option value="0" <?php if($game['first_on_stadia'] == 0): ?>selected<?php endif; ?>>No</option>
                <option value="1" <?php if($game['first_on_stadia'] == 1): ?>selected<?php endif; ?>>Yes</option>
              </select>
            </div>
          </div>
          <div class="control">
            <label class="label">Is Stadia Exclusive?</label>
            <div class="select">
              <select name="stadia_exclusive">
                <option value="0" <?php if($game['stadia_exclusive'] == 0): ?>selected<?php endif; ?>>No</option>
                <option value="1" <?php if($game['stadia_exclusive'] == 1): ?>selected<?php endif; ?>>Yes</option>
              </select>
            </div>
          </div>
          <div class="control">
            <label class="label">Is Pro?</label>
            <div class="select">
              <select name="pro">
                <option value="0" <?php if($game['pro'] == 0): ?>selected<?php endif; ?>>No</option>
                <option value="1" <?php if($game['pro'] == 1): ?>selected<?php endif; ?>>Yes</option>
              </select>
            </div>
          </div>
          <div class="control is-expanded">
            <label class="label">Is Pro From date</label>
            <input type="text" name="pro_from" class="input" placeholder="Is Free From: YYYY-MM-DD" value="<?= $game['pro_from'] ?>">
          </div>
          <div class="control is-expanded">
            <label class="label">Is Pro Till date</label>
            <input type="text" class="input" name="pro_till" placeholder="Is Free Till: YYYY-MM-DD" value="<?= $game['pro_till'] ?>">
          </div>
        </div>
        <div class="field is-grouped is-grouped-multiline">
          <div class="control is-expanded">
            <input type="text" class="input" name="appid" placeholder="Google's Game AppId" value="<?= $game['appid'] ?>">
          </div>
          <div class="control is-expanded">
            <input type="text" class="input" name="sku" placeholder="Google's Game Sku" value="<?= $game['sku'] ?>">
          </div>
          <?= view_cell('App\Controllers\Developers::alldevs') ?>
          <?= view_cell('App\Controllers\Publishers::allpubs') ?>
        </div>
        <div class="field">
          <div class="control is-expanded">
            <textarea class="textarea" name="about" placeholder="All About the Game"><?= $game['about'] ?></textarea>
          </div>
        </div>
        <div class="field is-grouped is-grouped-multiline">
          <div class="control is-expanded">
            <input type="file" name="image" class="input">
          </div>
          <div class="control">
            <div class="buttons">
              <button class="button is-primary has-text-dark" value="submit">Update Game!</button>
              <button class="button is-danger has-text-white" value="reset">Start Over</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?= view_cell('App\Controllers\Interviews::interviewform', 'game_id='.$game['id']) ?>
  <?= view_cell('App\Controllers\Addons::insertform') ?>
  <?= view_cell('App\Controllers\Addons::updateaddon', 'game_id='.$game['id']) ?>
<?php endif; ?>
