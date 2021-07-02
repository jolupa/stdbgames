<div id="form_update_games" class="container mt-5">
 <div class="mx-3">
   <div class="columns is-multiline is-mobile">
     <div class="column is-narrow">
       <a href="<?= base_url ( '/editions/addformeditions/'.$game['id'].'/'.$game['slug'] ) ?>"><button class="button is-info" type="button">Add Edition</button></a>
     </div>
     <?php if ( $game['ed_only'] == 0 ): ?>
       <div class="column is-narrow">
         <a href="<?= base_url ( '/prices/priceaddform/'.$game['id'] ) ?>"><button class="button is-info" type="button">Add/Update Deal</button></a>
       </div>
     <?php endif; ?>
     <div class="column is-narrow">
       <a href="<?= base_url ('/interviews/interviewforms/'.$game['id'] ) ?>"><button class="button is-info" type="button">Add/Update Interview</button></a>
     </div>
     <div class="column is-narrow">
       <a href="<?= base_url ('/gallery/changevideoform/  '.$game['id'] ) ?>"><button class="button is-info" type="button">Modify Video Gallery</button></a>
     </div>
   </div>
   <p class="title is-4">Update Game</p>
   <form action="<?= base_url ( '/games/updategamedb') ?>" method="post" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?= $game['id'] ?>">
     <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
     <div class="field is-grouped-multiline">
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="rumor" <?php if ( $game['rumor'] == 1 ): ?>checked<?php endif; ?>>
           It's a rumor?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="dropped" <?php if ( $game['dropped'] == 1 ): ?>checked<?php endif; ?>>
           Dropped from Store?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="tweet">
           Send an info Tweet?
         </label>
       </div>
     </div>
     <p class=" title is-5">Basic info:</p>
     <div class="field">
       <label class="label" for="name">Name</label>
       <div class="control">
         <input class="input" type="text" placeholder="Name..." name="name" value="<?= $game['name'] ?>">
       </div>
     </div>
     <div class="field">
       <label class="label" for="url">Website</label>
       <div class="control">
         <input class="input" type="url" placeholder="URL..." name="url" <?php if ( ! empty ( $game['url'] ) ): ?>value="<?= $game['url'] ?>"<?php endif; ?>>
       </div>
     </div>
     <div class="field">
       <label class="label" for="twitter_account">Twitter Account</label>
       <div class="control">
         <input class="input" type="text" placeholder="@account..." name="twitter_account" <?php if ( $game['twitter_account'] == 1 ): ?>value="<?= $game['twitter_account'] ?>"<?php endif; ?>>
       </div>
     </div>
     <div class="field">
       <label class="label">Release date</label>
       <div class="control">
         <input class="input" type="date" name="release" value="<?= $game['release'] ?>">
         <p class="help">If no date just put '2099-01-01' as release date</p>
       </div>
     </div>
     <div class="field">
       <label class="label">Price</label>
       <div class="control">
         <input class="input" type="text" placeholder="00.00" name="price" <?php if ( ! empty ( $game['price'] ) ): ?>value="<?= $game['price'] ?>"<?php endif; ?>>
       </div>
     </div>
     <div class="field is-grouped-multiline">
       <label class="checkbox">
         <input type="checkbox" name="is_f2p" <?php if ( $game['is_f2p'] == 1 ): ?>checked<?php endif; ?>>
         Is F2P?
       </label>
       <label class="checkbox">
         <input type="checkbox" name="ed_only" <?php if ( $game['ed_only'] == 1 ): ?>checked<?php endif; ?>>
         Only Abalaible Inside Editions?
       </label>
     </div>
     <div class="field">
       <label class="label">About</label>
       <div class="control">
         <textarea class="textarea" rows="25" name="about"><?php if ( ! empty ( $game[ 'about' ] ) ): ?><?= $game[ 'about' ] ?><?php endif; ?></textarea>
         <p class="help">
           We use Markdown for this field<br>
           - **bold**<br>
           - *Italic*<br>
           - ***Bold and Italic***<br>
           - Unordered List start with - OR + OR *<br>
           - Images ![Image title](/image/folder/of/file)<br>
           - Horizontal Rule ---<br>
           - Links [link text](https://address.url)<br>
           - Links with title [link text](https://address.url "link title")
         </p>
       </div>
     </div>
     <div class="field">
       <?php if ( ! empty ( $game['image'] ) ): ?>
         <input type="hidden" name="old_image" value="<?= $game['image'] ?>">
       <?php endif; ?>
       <label class="label" for="image">Image</label>
       <input class="input" type="file" placeholder="Choose Image to upload..." name="image">
       <?php if ( isset ( $validation ) && $validation->hasError ( 'image' ) ): ?>
         <p class="help has-text-coral"><?= $validation->getError( 'image ') ?></p>
       <?php endif; ?>
     </div>
     <?= view_cell ( 'App\Controllers\Developers::alldevelopers' ) ?>
     <?= view_cell ( 'App\Controllers\Publishers::allpublishers' ) ?>
     <p class="title is-5">Game Features</p>
     <div class="field is-grouped is-grouped-multiline">
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="first_on_stadia" <?php if ( $game['first_on_stadia'] == 1 ): ?>checked<?php endif; ?>>
           First on Stadia?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="stadia_exclusive" <?php if ( $game['stadia_exclusive'] == 1 ): ?>checked<?php endif; ?>>
           Stadia Exclusive?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="early_access" <?php if ( $game['early_access'] == 1 ): ?>checked<?php endif; ?>>
           Early Access?
         </label>
       </div>
     </div>
     <div class="field is-grouped is-grouped-multiline">
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="pro" <?php if ( $game['pro'] == 1 ): ?>checked<?php endif; ?>>
           Is Pro?
         </label>
       </div>
       <div class="control is-expanded">
         <label class="label">From Date</label>
         <div class="control">
           <input class="input" type="date" name="pro_from" <?php if ( ! empty ( $game['pro_from'] ) ): ?>value="<?= $game['pro_from'] ?>"<?php endif; ?>>
         </div>
       </div>
       <div class="control is-expanded">
         <label class="label">Till Date</label>
         <input class="input" type="date" name="pro_till" <?php if ( ! empty ( $game['pro_till'] ) ): ?>value="<?= $game['pro_till'] ?>"<?php endif; ?>>
       </div>
     </div>
     <p class="title is-5">Network features</p>
     <div class="field is-grouped is-grouped-multiline">
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="cross_play" <?php if ( $game['cross_play'] == 1 ): ?>checked<?php endif; ?>>
           Has Crossplay?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="cross_progression" <?php if ( $game['cross_progression'] == 1 ): ?>checked<?php endif; ?>>
           Has CrossProgression?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="stream_connect" <?php if ( $game['stream_connect'] == 1 ): ?>checked<?php endif; ?>>
           Has Stream Connect?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="crowd_choice" <?php if ( $game['crowd_choice'] == 1 ): ?>checked<?php endif; ?>>
           Has CrowdChoice?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="crowd_play" <?php if ( $game['crowd_play'] == 1 ): ?>checked<?php endif; ?>>
           Has CrowdPlay?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="state_share" <?php if ( $game['state_share'] == 1 ): ?>checked<?php endif; ?>>
           Has StateShare?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="multi_couch" <?php if ( $game['multi_couch'] == 1 ): ?>checked<?php endif; ?>>
           Has MultiCouch?
         </label>
       </div>
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="multi_online" <?php if ( $game['multi_online'] == 1 ): ?>checked<?php endif; ?>>
           Has MultiOnline?
         </label>
       </div>
     </div>
     <p class="title is-5">Graphic Features</p>
     <div class="field is-grouped is-grouped-multiline">
       <div class="control">
         <label class="checkbox">
           <input type="checkbox" name="ix_pxc" <?php if ( $game['is_pxc'] == 1 ): ?>checked<?php endif; ?>>
           Is Pixel Count?
         </label>
       </div>
       <div class="control">
         <label class="label">Max. Resolution</label>
         <div class="select">
           <select name="max_resolution">
             <option></option>
             <option value="3840x2160 (4K)" <?php if ( ! empty ( $game['max_resolution'] ) && $game['max_resolution'] == '3840x2160 (4K)'): ?>selected<?php endif; ?>>3840x2160 (4K)</option>
             <option value="3200x1800 (3.5K)" <?php if ( ! empty ( $game['max_resolution'] ) && $game['max_resolution'] == '3200x1800 (3.5K)'): ?>selected<?php endif; ?>>3200x1800 (3.5K)</option>
             <option value="2880x1620 (3K)" <?php if ( ! empty ( $game['max_resolution'] ) && $game['max_resolution'] == '2880x1620 (3K)'): ?>selected<?php endif; ?>>2880x1620 (3K)</option>
             <option value="2560x1440 (2K)" <?php if ( ! empty ( $game['max_resolution'] ) && $game['max_resolution'] == '2560x1440 (2K)'): ?>selected<?php endif; ?>>2560x1440 (2K)</option>
             <option value="1920x1080 (FHD)" <?php if ( ! empty ( $game['max_resolution'] ) && $game['max_resolution'] == '1920x1080 (FHD)'): ?>selected<?php endif; ?>>1920x1080 (FHD)</option>
             <option value="1280x720 (HD)" <?php if ( ! empty ( $game['max_resolution'] ) && $game['max_resolution'] == '1280x720 (HD)'): ?>selected<?php endif; ?>>1280x720 (HD)</option>
             <option value="Pixel Style" <?php if ( ! empty ( $game['max_resolution'] ) && $game['max_resolution'] == 'Pixel Style'): ?>selected<?php endif; ?>>Pixel Style</option>
           </select>
         </div>
       </div>
       <div class="control">
         <label class="label">Max. FPS</label>
         <div class="select">
           <select name="fps">
             <option></option>
             <option value="120" <?php if ( ! empty ( $game['fps'] ) && $game['fps'] == '120'): ?>selected<?php endif; ?>>120</option>
             <option value="60" <?php if ( ! empty ( $game['fps'] ) && $game['fps'] == '60'): ?>selected<?php endif; ?>>60</option>
             <option value="30" <?php if ( ! empty ( $game['fps'] ) && $game['fps'] == '30'): ?>selected<?php endif; ?>>30</option>
           </select>
         </div>
       </div>
       <div class="control">
         <label class="label">HDR or SDR Support</label>
         <div class="select">
           <select name="hdr_sdr">
             <option></option>
             <option value="SDR" <?php if ( ! empty ( $game['hdr_sdr'] ) && $game['hdr_sdr'] == 'sdr'): ?>selected<?php endif; ?>>SDR</option>
             <option value="HDR" <?php if ( ! empty ( $game['hdr_sdr'] ) && $game['hdr_sdr'] == 'hdr'): ?>selected<?php endif; ?>>HDR</option>
           </select>
         </div>
       </div>
     </div>
     <p class="title is-5">Store links</p>
     <div class="field is-grouped is-grouped-multiline">
       <div class="control is-expanded">
         <label class="label">Google's PreOrder AppId</label>
         <div class="control">
           <input class="input" type="text" name="preorder_appid" <?php if ( ! empty ( $game['preorder_appid'] ) ): ?>value="<?= $game['preorder_appid'] ?>"<?php endif; ?>>
         </div>
       </div>
       <div class="control is-expanded">
         <label class="label">Google's PreOrder SKU</label>
         <div class="control">
           <input class="input" type="text" name="preorder_sku" <?php if ( ! empty ( $game['preorder_sku'] ) ): ?>value="<?= $game['preorder_sku'] ?>"<?php endif; ?>>
         </div>
       </div>
     </div>
     <div class="field is-grouped is-grouped-multiline">
       <div class="control is-expanded">
         <label class="label">Google's Game AppId</label>
         <div class="control">
           <input class="input" type="text" name="appid" <?php if ( ! empty ( $game['appid'] ) ): ?>value="<?= $game['appid'] ?>"<?php endif; ?>>
         </div>
       </div>
       <div class="control is-expanded">
         <label class="label">Google's Game SKU</label>
         <div class="control">
           <input class="input" type="text" name="sku" <?php if ( ! empty ( $game['sku'] ) ): ?>value="<?= $game['sku'] ?>"<?php endif; ?>>
         </div>
       </div>
     </div>
     <div class="field is-grouped is-grouped-multiline">
       <div class="control is-expanded">
         <label class="label">Google's Demo AppId</label>
         <div class="control">
           <input class="input" type="text" name="demo_appid" <?php if ( ! empty ( $game['demo_appid'] ) ): ?>value="<?= $game['demo_appid'] ?>"<?php endif; ?>>
         </div>
       </div>
       <div class="control is-expanded">
         <label class="label">Google's Demo SKU</label>
         <div class="control">
           <input class="input" type="text" name="demo_sku" <?php if ( ! empty ( $game['demo_sku'] ) ): ?>value="<?= $game['demo_sku'] ?>"<?php endif; ?>>
         </div>
       </div>
     </div>
     <div class="field is-grouped">
       <div class="control">
         <button class="button is-primary" type="submit">Update!</button>
       </div>
       <div class="control">
         <button class="button is-coral" type="reset">Reset!</button>
       </div>
       <div class="control">
         <a href="<?= base_url ( '/games/delete/'.$game['id'] ) ?>"><button class="button is-coral" type="button">Delete!</button></a>
       </div>
     </div>
   </form>
 </div>
</div>
