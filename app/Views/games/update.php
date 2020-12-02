<div class="container">
  <section class="section">
    <?php if(isset($error)): ?>
      <div class="content has-text-centered">
        <p><?= $error ?></p>
      </div>
    <?php else: ?>
      <p class="title is-5">Update a</p>
      <p class="subtitle is-3">Game:</p>
      <div class="content mt-2">
        <a class="button is-danger is-small has-text-white mb-2" href="<?= base_url() ?>/games/deletegame/<?= $game['id'] ?>">Delete Game!</a>
        <form method="post" action="<?= base_url() ?>/games/updategamedb" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $game['id'] ?>">
          <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
          <input type="hidden" name="oldimage" value="<?= $game['image'] ?>">
          <input type="hidden" name="oldname" value="<?= $game['name'] ?>">
          <input type="hidden" name="oldrelease" value="<?= $game['release'] ?>">
          <input type="hidden" name="oldprice" value="<?= $game['price'] ?>">
          <input type="hidden" name="oldfirst_on_stadia" value="<?= $game['first_on_stadia'] ?>">
          <input type="hidden" name="oldstadia_exclusive" value="<?= $game['stadia_exclusive'] ?>">
          <input type="hidden" name="oldearly_access" value="<?= $game['early_access'] ?>">
          <input type="hidden" name="oldpro" value="<?= $game['pro'] ?>">
          <input type="hidden" name="oldpro_from" value="<?= $game['pro_from'] ?>">
          <input type="hidden" name="oldpro_till" value="<?= $game['pro_till'] ?>">
          <input type="hidden" name="oldcross_play" value="<?= $game['cross_play'] ?>">
          <input type="hidden" name="oldstream_connect" value="<?= $game['stream_connect'] ?>">
          <input type="hidden" name="oldcrowd_choice" value="<?= $game['crowd_choice'] ?>">
          <input type="hidden" name="oldcrowd_play" value="<?= $game['crowd_play'] ?>">
          <input type="hidden" name="oldcross_progression" value="<?= $game['cross_progression'] ?>">
          <input type="hidden" name="oldstate_share" value="<?= $game['state_share'] ?>">
          <input type="hidden" name="oldappid" value="<?= $game['appid'] ?>">
          <input type="hidden" name="oldsku" value="<?= $game['sku'] ?>">
          <input type="hidden" name="olddeveloper_id" value="<?= $game['developer_id'] ?>">
          <input type="hidden" name="oldpublisher_id" value="<?= $game['publisher_id'] ?>">
          <input type="hidden" name="oldis_pxc" value="<?= $game['is_pxc'] ?>">
          <input type="hidden" name="oldmax_resolution" value="<?= $game['max_resolution'] ?>">
          <input type="hidden" name="oldfps" value="<?= $game['fps'] ?>">
          <input type="hidden" name="oldhdr_sdr" value="<?= $game['hdr_sdr'] ?>">
          <input type="hidden" name="oldis_f2p" value="<?= $game['is_f2p'] ?>">
          <div class="field">
            <div class="control">
              <label class="checkbox"><input type="checkbox" <?php if($game['rumor'] == 1): ?>checked<?php endif; ?> name="rumor">&nbsp;It's a Rumor?</label>
            </div>
          </div>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <input type="input" class="input" name="name" value="<?= $game['name'] ?>">
            </div>
            <div class="control is-expanded">
              <input type="date" class="input" name="release" value="<?= $game['release'] ?>">
            </div>
            <div class="control is-expanded">
              <input type="text" class="input" name="price" <?php if(isset($game['price'])): ?>value="<?= $game['price'] ?>"<?php else: ?> placeholder="Release Price: €€.€€"<?php endif; ?>>
            </div>
            <div class="control">
              <div class="select">
                <select name="is_f2p">
                  <option <?php if($game['is_f2p'] != 0 || $game['is_f2p'] != 1): ?>selected<?php endif; ?> disable>Is F2P?</option>
                  <option <?php if($game['is_f2p'] == 0): ?>selected<?php endif; ?> value="0">No</option>
                  <option <?php if($game['is_f2p'] == 1): ?>selected<?php endif; ?> value="1">Yes</option>
                </select>
              </div>
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
              <label class="label">Is Early Access?</label>
              <div class="select">
                <select name="early_access">
                  <option value="0" <?php if($game['early_access'] == 0): ?>selected<?php endif; ?>>No</option>
                  <option value="1" <?php if($game['early_access'] == 1): ?>selected<?php endif; ?>>Yes</option>
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
              <input type="date" name="pro_from" class="input" <?php if(isset($game['pro_from'])): ?>value="<?=$game['pro_from'] ?>" <?php else: ?>placeholder="Is Free From: YYYY-MM-DD"<?php endif; ?>>
            </div>
            <div class="control is-expanded">
              <label class="label">Is Pro Till date</label>
              <input type="date" class="input" name="pro_till" <?php if(isset($game['pro_till'])): ?>value="<?= $game['pro_till'] ?>"<?php else: ?>placeholder="Is Free Till: YYYY-MM-DD"<?php endif; ?>>
            </div>
          </div>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <label class="label">Has CrossPlay</label>
              <div class="select">
                <select name="cross_play">
                  <option <?php if($game['cross_play'] == 0): ?>selected<?php endif; ?> value="0">No</option>
                  <option <?php if($game['cross_play'] == 1): ?>selected<?php endif; ?> value="1">Yes</option>
                </select>
              </div>
            </div>
            <div class="control is-expanded">
              <label class="label">Has CrossProgression</label>
              <div class="select">
                <select name="cross_progression">
                  <option value="0" <?php if($game['cross_progression'] == 0): ?>selected<?php endif; ?>>No</option>
                  <option value="1" <?php if($game['cross_progression'] == 1): ?>selected<?php endif; ?>>Yes</option>
                </select>
              </div>
            </div>
            <div class="control is-expanded">
              <label class="label">Has StreamConnect</label>
              <div class="select">
                <select name="stream_connect">
                  <option <?php if($game['stream_connect'] == 0): ?>selected<?php endif; ?> value="0">No</option>
                  <option <?php if($game['stream_connect'] == 1): ?>selected<?php endif; ?> value="1">Yes</option>
                </select>
              </div>
            </div>
            <div class="control is-expanded">
              <label class="label">Has CrowdChoice</label>
              <div class="select">
                <select name="crowd_choice">
                  <option <?php if($game['crowd_choice'] == 0): ?>selected<?php endif; ?> value="0">No</option>
                  <option <?php if($game['crowd_choice'] == 1): ?>selected<?php endif; ?> value="1">Yes</option>
                </select>
              </div>
            </div>
            <div class="control is-expanded">
              <label class="label">Has CrowdPlay</label>
              <div class="select">
                <select name="crowd_play">
                  <option <?php if($game['crowd_play'] == 0): ?>selected<?php endif; ?> value="0">No</option>
                  <option <?php if($game['crowd_play'] == 1): ?>selected<?php endif; ?> value="1">Yes</option>
                </select>
              </div>
            </div>
            <div class="control is-expanded">
              <label class="label">Has StateShare</label>
              <div class="select">
                <select name="state_share">
                  <option value="0" <?php if($game['state_share'] == 0): ?>selected<?php endif; ?>>No</option>
                  <option value="1" <?php if($game['state_share'] == 1): ?>selected<?php endif; ?>>Yes</option>
                </select>
              </div>
            </div>
          </div>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control">
              <label class="label">Is Pixel Count?</label>
              <div class="select">
                <select name="is_pxc">
                  <option value="0" <?php if($game['is_pxc'] == '' || $game['is_pxc'] == 0): ?>selected<?php endif; ?>>No</option>
                  <option value="1" <?php if($game['is_pxc'] == 1): ?>selected<?php endif; ?>>Yes</option>
                </select>
              </div>
            </div>
            <div class="control">
              <label class="label">Max. Resolution</label>
              <div class="select">
                <select name="max_resolution">
                  <option disabled <?php if($game['max_resolution'] == ''): ?>selected<?php endif; ?>>Choose Resolution:</option>
                  <option value="3840x2160 (4K)" <?php if($game['max_resolution'] == '3840x2160 (4K)'): ?>selected<?php endif; ?>>3840x2160 (4K)</option>
                  <option value="3200x1800 (3.5K)" <?php if($game['max_resolution'] == '3200x1800 (3.5K)'): ?>selected<?php endif; ?>>3200x1800 (3.5K)</option>
                  <option value="2880x1620 (3K)" <?php if($game['max_resolution'] == '2880x1620 (3K)'): ?>selected<?php endif; ?>>2880x1620 (3K)</option>
                  <option value="2560x1440 (2K)" <?php if($game['max_resolution'] == '2560x1440 (2K)'): ?>selected<?php endif; ?>>2560x1440 (2K)</option>
                  <option value="1920x1080 (FHD)" <?php if($game['max_resolution'] == '1920x1080 (FHD)'): ?>selected<?php endif; ?>>1920x1080 (FHD)</option>
                  <option value="1280x720 (HD)" <?php if($game['max_resolution'] == '1280x720 (HD)'): ?>selected<?php endif; ?>>1280x720 (HD)</option>
                </select>
              </div>
            </div>
            <div class="control">
              <label class="label">FPS</label>
              <div class="select">
                <select name="fps">
                  <option disabled <?php if($game['fps'] == ''): ?>selected<?php endif; ?>>Choose FPS</option>
                  <option value="120" <?php if($game['fps'] == 120): ?>selected<?php endif; ?>>120</option>
                  <option value="60" <?php if($game['fps'] == 60): ?>selected<?php endif; ?>>60</option>
                  <option value="30" <?php if($game['fps'] == 30): ?>selected<?php endif; ?>>30</option>
                </select>
              </div>
            </div>
            <div class="control">
              <label class="label">Is HDR or SDR?</label>
              <div class="select">
                <select name="hdr_sdr">
                  <option disabled <?php if($game['hdr_sdr'] == ''): ?>selected<?php endif; ?>>Choose:</option>
                  <option value="sdr" <?php if($game['hdr_sdr'] == 'sdr'): ?>selected<?php endif; ?>>SDR</option>
                  <option value="hdr" <?php if($game['hdr_sdr'] == 'hdr'): ?>selected<?php endif; ?>>HDR</option>
                </select>
              </div>
            </div>
          </div>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <input type="text" class="input" name="appid" <?php if(isset($game['appid'])): ?>value="<?= $game['appid'] ?>" <?php else: ?>placeholder="Google's Game AppId"<?php endif; ?>>
            </div>
            <div class="control is-expanded">
              <input type="text" class="input" name="sku" <?php if(isset($game['sku'])): ?>value="<?= $game['sku'] ?>" <?php else: ?>placeholder="Google's Game Sku"<?php endif; ?>>
            </div>
            <?= view_cell('App\Controllers\Developers::alldevs') ?>
            <?= view_cell('App\Controllers\Publishers::allpubs') ?>
          </div>
          <div class="field">
            <div class="control is-expanded">
              <textarea class="textarea" id="textarea" name="about" <?php if(!isset($game['about'])): ?>placeholder="All About the Game"<?php endif; ?>><?php if(isset($game['about'])): ?><?= $game['about'] ?><?php endif; ?></textarea>
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
      <?= view_cell('App\Controllers\Interviews::interviewform', 'game_id='.$game['id']) ?>
      <?= view_cell('App\Controllers\Prices::addpriceform') ?>
      <?= view_cell('App\Controllers\Prices::updateprice', 'game_id='.$game['id']) ?>
    <?php endif; ?>
  </section>
</div>
