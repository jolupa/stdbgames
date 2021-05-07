  <div id="form_add_developers" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Add Game</p>
    <form action="<?= base_url ( '/games/creategamedb') ?>" method="post" enctype="multipart/form-data">
      <div class="field is-grouped">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="rumor" <?php if ( ! empty ( old('rumor') ) ): ?>checked<?php endif; ?>>
            It's a rumor?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="tweet" <?php if ( ! empty ( old( 'tweet') ) ): ?>checked<?php endif; ?>>
            Send an info Tweet?
          </label>
        </div>
      </div>
      <p class=" title is-5">Basic info:</p>
      <div class="field">
        <label class="label" for="name">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Name..." name="name" <?php if ( ! empty ( old( 'name') ) ): ?>value="<?= old('name') ?>"<?php endif; ?>>
          <?php if ( isset ( $validation ) && $validation->hasError( 'name' ) ): ?>
            <p class="help has-text-coral"><?= $validation->getError( 'name' ) ?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="field">
        <label class="label" for="url">Website</label>
        <div class="control">
          <input class="input" type="url" placeholder="URL..." name="url" <?php if ( ! empty ( old( 'url' ) ) ): ?>value="<?= olf( 'url' ) ?>"<?php endif; ?>>
        </div>
      </div>
      <div class="field">
        <label class="label" for="twitter_account">Twitter Account</label>
        <div class="control">
          <input class="input" type="text" placeholder="@account..." name="twitter_account" <?php if ( ! empty ( old( 'twitter_account') ) ): ?>value="<?= old( 'twitter_account' ) ?>"<?php endif; ?>>
        </div>
      </div>
      <div class="field">
        <label class="label">Release date</label>
        <div class="control">
          <input class="input" type="date" name="release" <?php if ( ! empty ( old( 'release' ) ) ): ?>value="<?= old('release') ?>"<?php endif; ?>>
          <p class="help text-has-coral">If no date just put '2099-01-01' as release date</p>
        </div>
      </div>
      <div class="field">
        <label class="label">Price</label>
        <div class="control">
          <input class="input" type="text" placeholder="00.00" name="price" <?php if ( ! empty ( old( 'price' ) ) ): ?>value="<?= old( 'price' ) ?>"<?php endif; ?>>
        </div>
      </div>
      <div class="field">
        <label class="checkbox">
          <input type="checkbox" name="is_f2p" <?php if ( ! empty ( old('is_f2p' ) ) ): ?>checked<?php endif; ?>>
          Is F2P?
        </label>
      </div>
      <div class="field">
        <label class="label" for="about">About</label>
        <textarea class="textarea" placeholder="About..." name="about"><?php if ( ! empty ( old('about' ) ) ): ?><?= old( 'about' ) ?><?php endif; ?></textarea>
        <div class="control">
          <p class="help">
            We use Markdown for this field<br>
            - **bold**<br>
            - *Italic*<br>
            - ***Bold and Italic***<br>
            - To insert a Line Break insert two white spaces or \<br>
            - Unordered List start with - OR + OR *<br>
            - Images ![Image title](/image/folder/of/file)<br>
            - Horizontal Rule ---<br>
            - Links [link text](https://address.url)<br>
            - Links with title [link text](https://address.url "link title")
          </p>
        </div>
      </div>
      <div class="field">
        <label class="label" for="image">Image</label>
        <input class="input" type="file" placeholder="Choose Image to upload..." name="image">
        <?php if ( ! empty ( session( 'validation' ) ) ): ?>
          <p class="help has-text-coral"><?= session( 'validation' ) ?></p>
        <?php endif; ?>
      </div>
      <?= view_cell ( 'App\Controllers\Developers::alldevelopers' ) ?>
      <?= view_cell ( 'App\Controllers\Publishers::allpublishers' ) ?>
      <p class="title is-5">Game Features</p>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="first_on_stadia" <?php if ( ! empty ( old ( 'first_on_stadia' ) ) ): ?>checked<?php endif; ?>>
            First on Stadia?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="stadia_exclusive" <?php if ( ! empty ( old ( 'stadia_exclusive' ) ) ): ?>checked<?php endif; ?>>
            Stadia Exclusive?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="early_access" <?php if ( ! empty ( old ( 'early_access' ) ) ): ?>checked<?php endif; ?>>
            Early Access?
          </label>
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="pro" <?php if ( ! empty ( old ( 'pro' ) ) ): ?>checked<?php endif; ?>>
            Is Pro?
          </label>
        </div>
        <div class="control is-expanded">
          <label class="label">From Date</label>
          <div class="control">
            <input class="input" type="date" name="pro_from" <?php if ( ! empty ( old ('pro_from' ) ) ): ?>value="<?= old ( 'pro_from' ) ?>"<?php endif; ?>>
            <?php if ( isset ( $validation ) && $validation->hasError('pro_from') ): ?><p class="help has-text-coral"><?= $validation->getError('pro_from') ?></p><?php endif; ?>
          </div>
        </div>
        <div class="control is-expanded">
          <label class="label">Till Date</label>
          <input class="input" type="date" name="pro_till" <?php if ( ! empty ( old ( 'pro_till' ) ) ): ?>value="<?= old ( 'pro_till' ) ?>"<?php endif; ?>>
        </div>
      </div>
      <p class="title is-5">Network features</p>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="cross_play" <?php if ( ! empty ( old ( 'cross_play' ) ) ): ?>checked<?php endif; ?>>
            Has Crossplay?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="cross_progression" <?php if ( ! empty ( old ( 'cross_progression' ) ) ): ?>checked<?php endif; ?>>
            Has CrossProgression?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="stream_connect" <?php if ( ! empty ( old ( 'stream_connect' ) ) ): ?>checked<?php endif; ?>>
            Has Stream Connect?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="crowd_choice" <?php if ( ! empty ( old ( 'crowd_choice' ) ) ): ?>checked<?php endif; ?>>
            Has CrowdChoice?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="crowd_play" <?php if ( ! empty ( old ( 'crowd_play' ) ) ): ?>checked<?php endif; ?>>
            Has CrowdPlay?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="state_share" <?php if ( ! empty ( old ( 'state_share' ) ) ): ?>checked<?php endif; ?>>
            Has StateShare?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="multi_couch" <?php if ( ! empty ( old ( 'multi_couch' ) ) ): ?>checked<?php endif; ?>>
            Has MultiCouch?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="multi_online" <?php if ( ! empty ( old ( 'multi_online' ) ) ): ?>checked<?php endif; ?>>
            Has MultiOnline?
          </label>
        </div>
      </div>
      <p class="title is-5">Graphic Features</p>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox">
            Is Pixel Count?
          </label>
        </div>
        <div class="control">
          <label class="label">Max. Resolution</label>
          <div class="select">
            <select name="max_resolution">
              <option></option>
              <option value="3840x2160 (4K)">3840x2160 (4K)</option>
              <option value="3200x1800 (3.5k)">3200x1800 (3.5k)</option>
              <option value="2880x1620 (3k)">2880x1620 (3k)</option>
              <option value="2560x1440 (2k)">2560x1440 (2k)</option>
              <option value="1920x1080 (FHD)">1920x1080 (FHD)</option>
              <option value="1280x720 (HD)">1280x720 (HD)</option>
              <option value="Pixel Style">Pixel Style</option>
            </select>
          </div>
        </div>
        <div class="control">
          <label class="label">Max. FPS</label>
          <div class="select">
            <select name="fps">
              <option></option>
              <option value="120">120</option>
              <option value="60">60</option>
              <option value="30">30</option>
            </select>
          </div>
        </div>
        <div class="control">
          <label class="label">HDR or SDR Support</label>
          <div class="select">
            <select name="hdr_sdr">
              <option></option>
              <option value="SDR">SDR</option>
              <option value="HDR">HDR</option>
            </select>
          </div>
        </div>
      </div>
      <p class="title is-5">Store links</p>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <label class="label">Google's PreOrder AppId</label>
          <div class="control">
            <input class="input" type="text" name="preorder_appid">
          </div>
        </div>
        <div class="control is-expanded">
          <label class="label">Google's PreOrder SKU</label>
          <div class="control">
            <input class="input" type="text" name="preorder_sku">
          </div>
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <label class="label">Google's Game AppId</label>
          <div class="control">
            <input class="input" type="text" name="appid">
          </div>
        </div>
        <div class="control is-expanded">
          <label class="label">Google's Game SKU</label>
          <div class="control">
            <input class="input" type="text" name="sku">
          </div>
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <label class="label">Google's Demo AppId</label>
          <div class="control">
            <input class="input" type="text" name="demo_appid">
          </div>
        </div>
        <div class="control is-expanded">
          <label class="label">Google's Demo SKU</label>
          <div class="control">
            <input class="input" type="text" name="demo_sku">
          </div>
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-primary" type="submit">Add!</button>
        </div>
        <div class="control">
          <button class="button is-coral" type="reset">Reset!</button>
        </div>
      </div>
    </form>
  </div>
</div>
