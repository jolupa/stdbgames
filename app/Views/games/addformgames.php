  <div id="form_add_games" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Add Game</p>
    <form action="<?= base_url ( '/games/creategamedb') ?>" method="post" enctype="multipart/form-data">
      <div class="field is-grouped-multiline">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="rumor" <?php if ( ! empty ( $_POST['rumor'] ) ): ?>checked<?php endif; ?>>
            It's a rumor?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="tweet" <?php if ( ! empty ( $_POST['tweet'] ) ): ?>checked<?php endif; ?>>
            Send an info Tweet?
          </label>
        </div>
      </div>
      <p class=" title is-5">Basic info:</p>
      <div class="field">
        <label class="label" for="name">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Name..." name="name" <?php if ( ! empty ( $_POST['name'] ) ): ?>value="<?= $_POST['name'] ?>"<?php endif; ?>>
          <?php if ( isset ( $validation ) && $validation->hasError( 'name' ) ): ?>
            <p class="help has-text-coral"><?= $validation->getError( 'name' ) ?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="field">
        <label class="label" for="url">Website</label>
        <div class="control">
          <input class="input" type="url" placeholder="URL..." name="url" <?php if ( ! empty ( $_POST['url'] ) ): ?>value="<?= $_POST['url'] ?>"<?php endif; ?>>
        </div>
      </div>
      <div class="field">
        <label class="label" for="twitter_account">Twitter Account</label>
        <div class="control">
          <input class="input" type="text" placeholder="@account..." name="twitter_account" <?php if ( ! empty ( $_POST['twitter_account'] ) ): ?>value="<?= $_POST['twitter_account'] ?>"<?php endif; ?>>
        </div>
      </div>
      <div class="field">
        <label class="label">Release date</label>
        <div class="control">
          <input class="input" type="date" name="release" <?php if ( ! empty ( $_POST['release'] ) ): ?>value="<?= $_POST['release'] ?>"<?php endif; ?>>
          <p class="help text-has-coral">If no date just put '2099-01-01' as release date</p>
        </div>
      </div>
      <div class="field">
        <label class="label">Price</label>
        <div class="control">
          <input class="input" type="text" placeholder="00.00" name="price" <?php if ( ! empty ( $_POST['price'] ) ): ?>value="<?= $_POST['price'] ?>"<?php endif; ?>>
        </div>
      </div>
      <div class="field is-grouped-multiline">
        <label class="checkbox">
          <input type="checkbox" name="is_f2p" <?php if ( ! empty ( $_POST['is_f2p'] ) ): ?>checked<?php endif; ?>>
          Is F2P?
        </label>
        <label class="checkbox">
          <input type="checkbox" name="ed_only" <?php if ( ! empty ( $_POST['ed_only'] ) ): ?>checked<?php endif; ?>>
          Only Avalaible Inside Editions?
        </label>
      </div>
      <div class="field">
        <label class="label" for="about">About</label>
        <textarea class="textarea" rows="25" placeholder="About..." name="about"><?php if ( ! empty ( $_POST['about'] ) ): ?><?= $_POST['about'] ?><?php endif; ?></textarea>
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
        <?php if ( isset ( $validation ) && $validation->hasError( 'image' ) ): ?>
          <p class="help has-text-coral"><?= $validation->getError( 'image' ) ?></p>
        <?php endif; ?>
      </div>
      <?= view_cell ( 'App\Controllers\Developers::alldevelopers' ) ?>
      <?= view_cell ( 'App\Controllers\Publishers::allpublishers' ) ?>
      <p class="title is-5">Game Features</p>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="first_on_stadia" <?php if ( ! empty ( $_POST['first_on_stadia'] ) ): ?>checked<?php endif; ?>>
            First on Stadia?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="stadia_exclusive" <?php if ( ! empty ( $_POST['stadia_exclusive'] ) ): ?>checked<?php endif; ?>>
            Stadia Exclusive?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="early_access" <?php if ( ! empty ( $_POST['early_access'] ) ): ?>checked<?php endif; ?>>
            Early Access?
          </label>
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="pro" <?php if ( ! empty ( $_POST['pro'] ) ): ?>checked<?php endif; ?>>
            Is Pro?
          </label>
        </div>
        <div class="control is-expanded">
          <label class="label">From Date</label>
          <div class="control">
            <input class="input" type="date" name="pro_from" <?php if ( ! empty ( $POST['pro_from'] ) ): ?>value="<?= $_POST['pro_from'] ?>"<?php endif; ?>>
            <?php if ( isset ( $validation ) && $validation->hasError('pro_from') ): ?><p class="help has-text-coral"><?= $validation->getError('pro_from') ?></p><?php endif; ?>
          </div>
        </div>
        <div class="control is-expanded">
          <label class="label">Till Date</label>
          <input class="input" type="date" name="pro_till" <?php if ( ! empty ( $_POST['pro_till'] ) ): ?>value="<?= $_POST['pro_till'] ?>"<?php endif; ?>>
        </div>
      </div>
      <p class="title is-5">Network features</p>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="cross_play" <?php if ( ! empty ( $_POST['cross_play'] ) ): ?>checked<?php endif; ?>>
            Has Crossplay?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="cross_progression" <?php if ( ! empty ( $_POST['cross_progression'] ) ): ?>checked<?php endif; ?>>
            Has CrossProgression?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="stream_connect" <?php if ( ! empty ( $_POST['stream_connect'] ) ): ?>checked<?php endif; ?>>
            Has Stream Connect?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="crowd_choice" <?php if ( ! empty ( $_POST['crowd_choice'] ) ): ?>checked<?php endif; ?>>
            Has CrowdChoice?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="crowd_play" <?php if ( ! empty ( $_POST['crowd_play'] ) ): ?>checked<?php endif; ?>>
            Has CrowdPlay?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="state_share" <?php if ( ! empty ( $_POST['state_share'] ) ): ?>checked<?php endif; ?>>
            Has StateShare?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="multi_couch" <?php if ( ! empty ( $_POST['multi_couch'] ) ): ?>checked<?php endif; ?>>
            Has MultiCouch?
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="multi_online" <?php if ( ! empty ( $_POST['multi_online'] ) ): ?>checked<?php endif; ?>>
            Has MultiOnline?
          </label>
        </div>
      </div>
      <p class="title is-5">Graphic Features</p>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" name="is_pxc" <?php if ( ! empty ( $_POST['is_pxc'] ) ): ?>checked<?php endif; ?>>
            Is Pixel Count?
          </label>
        </div>
        <div class="control">
          <label class="label">Max. Resolution</label>
          <div class="select">
            <select name="max_resolution">
              <option></option>
              <option value="3840x2160 (4K)" <?php if ( ! empty ( $_POST['max_resolution'] ) && $_POST['3840x2160 (4K)'] ): ?>selected<?php endif; ?>>3840x2160 (4K)</option>
              <option value="3200x1800 (3.5k)" <?php if ( ! empty ( $_POST['max_resolution'] ) &&  $_POST['3200x1800 (3.5k)'] ): ?>selected<?php endif; ?>>3200x1800 (3.5k)</option>
              <option value="2880x1620 (3k)" <?php if ( ! empty ( $_POST['max_resolution'] ) && $_POST['2880x1620 (3k)'] ): ?>selected<?php endif; ?>>2880x1620 (3k)</option>
              <option value="2560x1440 (2k)" <?php if ( ! empty ( $_POST['max_resolution'] ) && $_POST['2560x1440 (2k)'] ): ?>selected<?php endif; ?>>2560x1440 (2k)</option>
              <option value="1920x1080 (FHD)" <?php if ( ! empty ( $_POST['max_resolution'] ) && $_POST['1920x1080 (FHD)'] ): ?>selected<?php endif; ?>>1920x1080 (FHD)</option>
              <option value="1280x720 (HD)" <?php if ( ! empty ( $_POST['max_resolution'] ) && $_POST['1280x720 (HD)'] ): ?>selected<?php endif; ?>>1280x720 (HD)</option>
              <option value="Pixel Style" <?php if ( ! empty ( $_POST['max_resolution'] ) && $_POST['Pixel Style'] ): ?>selected<?php endif; ?>>Pixel Style</option>
            </select>
          </div>
        </div>
        <div class="control">
          <label class="label">Max. FPS</label>
          <div class="select">
            <select name="fps">
              <option></option>
              <option value="120" <?php if ( ! empty ( $_POST['fps'] ) && $_POST['fps'] == '120' ): ?>selected<?php endif; ?>>120</option>
              <option value="60" <?php if ( ! empty ( $_POST['fps'] ) && $_POST['fps'] == '60' ): ?>selected<?php endif; ?>>60</option>
              <option value="30" <?php if ( ! empty ( $_POST['fps'] ) && $_POST['fps'] == '30' ): ?>selected<?php endif; ?>>30</option>
            </select>
          </div>
        </div>
        <div class="control">
          <label class="label">HDR or SDR Support</label>
          <div class="select">
            <select name="hdr_sdr">
              <option></option>
              <option <?php if ( ! empty ( $_POST['hdr_sdr'] ) && $_POST['hdr_sdr'] == 'SDR' ): ?>selected<?php endif; ?> value="SDR">SDR</option>
              <option  <?php if ( ! empty ( $_POST['hdr_sdr'] ) && $_POST['hdr_sdr'] == 'HDR' ): ?>selected<?php endif; ?> value="HDR">HDR</option>
            </select>
          </div>
        </div>
      </div>
      <p class="title is-5">Store links</p>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <label class="label">Google's PreOrder AppId</label>
          <div class="control">
            <input class="input" type="text" name="preorder_appid" <?php if ( ! empty ( $_POST['preorder_appid'] ) ): ?>value="<?= $_POST['preorder_appid'] ?>"<?php endif; ?>>
          </div>
        </div>
        <div class="control is-expanded">
          <label class="label">Google's PreOrder SKU</label>
          <div class="control">
            <input class="input" type="text" name="preorder_sku" <?php if ( ! empty ( $_POST['preorder_sku'] ) ): ?>value="<?= $_POST['preorder_appid'] ?>"<?php endif; ?>>
          </div>
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <label class="label">Google's Game AppId</label>
          <div class="control">
            <input class="input" type="text" name="appid" <?php if ( ! empty ( $_POST['appid'] ) ): ?>value="<?= $_POST['appid'] ?>"<?php endif; ?>>
          </div>
        </div>
        <div class="control is-expanded">
          <label class="label">Google's Game SKU</label>
          <div class="control">
            <input class="input" type="text" name="sku" <?php if ( ! empty ( $_POST['sku'] ) ): ?>value="<?= $_POST['sku'] ?>"<?php endif; ?>>
          </div>
        </div>
      </div>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <label class="label">Google's Demo AppId</label>
          <div class="control">
            <input class="input" type="text" name="demo_appid" <?php if ( ! empty ( $_POST['demo_appid'] ) ): ?>value="<?= $_POST['demo_appid'] ?>"<?php endif; ?>>
          </div>
        </div>
        <div class="control is-expanded">
          <label class="label">Google's Demo SKU</label>
          <div class="control">
            <input class="input" type="text" name="demo_sku" <?php if ( ! empty ( $_POST['demo_sku'] ) ): ?>value="<?= $_POST['demo_sku'] ?>"<?php endif; ?>>
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
