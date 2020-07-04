<div class="columns">
  <div class="column">
    <p class="subtitle is-5">Insert new</p>
    <p class="title is-3">Game:</p>
  </div>
</div>
<div class="columns">
  <div class="column">
    <form method="post" action="<?= base_url() ?>/games/creategamedb" enctype="multipart/form-data">
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <input type="input" class="input" name="name" placeholder="Game's name">
        </div>
        <div class="control is-expanded">
          <input type="text" class="input" name="release" placeholder="Release Date: YYYY-MM-DD">
        </div>
        <div class="control is-expanded">
          <input type="text" class="input" name="price" placeholder="Release Price: €€.€€">
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <label class="label">Is First on Stadia?</label>
          <div class="select">
            <select name="first_on_stadia">
              <option value="0" selected>No</option>
              <option value="1">Yes</option>
            </select>
          </div>
        </div>
        <div class="control">
          <label class="label">Is Stadia Exclusive?</label>
          <div class="select">
            <select name="stadia_exclusive">
              <option value="0" selected>No</option>
              <option value="1">Yes</option>
            </select>
          </div>
        </div>
        <div class="control">
          <label class="label">Is Pro?</label>
          <div class="select">
            <select name="pro">
              <option value="0" selected>No</option>
              <option value="1">Yes</option>
            </select>
          </div>
        </div>
        <div class="control is-expanded">
          <label class="label">Is Pro From date</label>
          <input type="text" name="pro_from" class="input" placeholder="Is Free From: YYYY-MM-DD">
        </div>
        <div class="control is-expanded">
          <label class="label">Is Pro Till date</label>
          <input type="text" class="input" name="pro_till" placeholder="Is Free Till: YYYY-MM-DD">
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <input type="text" class="input" name="appid" placeholder="Google's Game AppId">
        </div>
        <div class="control is-expanded">
          <input type="text" class="input" name="sku" placeholder="Google's Game Sku">
        </div>
        <?= view_cell('App\Controllers\Developers::alldevs') ?>
        <?= view_cell('App\Controllers\Publishers::allpubs') ?>
      </div>
      <div class="field">
        <div class="control is-expanded">
          <textarea class="textarea" name="about" placeholder="All About the Game"></textarea>
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <input type="file" name="image" class="input">
        </div>
        <div class="control">
          <div class="buttons">
            <button class="button is-primary has-text-dark" value="submit">Add Game!</button>
            <button class="button is-danger has-text-white" value="reset">Start Over</button>
          </div>
        </div>
      </div>
      <div class="field">
        <?= \Config\Services::validation()->listErrors('my_list'); ?>
      </div>
    </form>
  </div>
</div>
