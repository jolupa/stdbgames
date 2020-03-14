<!-- Game Insert Form -->
<section class="section">
  <div class="container">
    <form method="post" action="<?= base_url() ?>/games/updategame" enctype="multipart/form-data">
      <input type="hidden" name="Slug" value="<?= $game['gSlug'] ?>">
      <input type="hidden" name="Gameid" value="<?= $game['gId'] ?>">
      <!-- Name Entry -->
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" name="Title" value="<?= $game['gTitle'] ?>">
        </div>
      </div>
    <!-- Date Entry -->
    <div class="field is-grouped">
      <div class="control is-expanded">
        <label class="label">Release Date</label>
        <input class="input" type="text" name="Release" value="<?= $game['gRelease'] ?>">
      </div>
      <!-- Founder Entry -->
      <div class="control">
        <label class="label">Game Is Founder?</label>
        <div class="select">
            <select name="Pro">
              <option value="0" <?php if ($game['gPro'] == 0): ?>selected<?php endif; ?>>No Founders</option>
              <option value="1" <?php if ($game['gPro'] == 1): ?>selected<?php endif; ?>>Is Founders</option>
            </select>
          </div>
        </div>
      <!-- Developer Entry -->
      <div class="control">
        <label class="label">Developer:</label>
        <?php if (empty ($developers)): ?>
          <a href="<?= base_url() ?>/games/devform"><p class="is-size-6 button is-primary">Create a New Developer</p></a>
        <?php else: ?>
        <div class="select">
          <select name="Developerid">
          <?php foreach ($developers as $developer): ?>
            <option value="<?= $developer['dId'] ?>" <?php if ($developer['dId'] == $game['gdId']): ?>selected<?php endif; ?>><?= $developer['dName'] ?></option>
          <?php endforeach; ?>
          </select>
        </div>
          <?php endif; ?>
      </div>
      <!-- Publisher Entry -->
      <div class="control">
        <label class="label">Publisher:</label>
        <?php if(empty($publishers)): ?>
          <a href="<?= base_url() ?>/games/pubform"><p class="is-size-6 button is-primary">Create a New Publisher</p></a>
        <?php else: ?>
        <div class="select">
          <select name="Publisherid">
          <?php foreach ($publishers as $publisher): ?>
            <option value="<?= $publisher['pId']?>" <?php if ($publisher['pId'] == $game['gpId']): ?>selected<?php endif; ?>><?= $publisher['pName'] ?></option>
          <?php endforeach; ?>
          </select>
        </div>
          <?php endif; ?>
      </div>
    </div>
      <!-- Game History Entry -->
      <div class="field">
        <label class="label">What's the game about:</label>
        <div class="control">
          <textarea class="textarea" name="About"><?= $game['gAbout'] ?></textarea>
        </div>
      </div>
      <!-- File Chooser Entry -->
      <?php if(!empty($game['gImage'])): ?>
      <input type="hidden" name="Image" value="<?= $game['gImage'] ?>">
      <?php else: ?>
      <div class="field is-grouped file has-name is-right">
        <div class="control is-expanded">
          <label class="file-label" id="insertgame">
            <input class="file-input" type="file" name="Image">
            <span class="file-cta is-expanded">
              <span class="file-icon">
                <i class="fas fa-upload"></i>
              </span>
              <span class="file-label">Choose a file...</span>
            </span>
            <span class="file-name"></span>
          </label>
        </div>
      <?php endif; ?>
        <!-- Button Send -->
        <div class="control">
          <button class="button is-primary" type="submit" name="submit">Update Game</button>
        </div>
      </div>
    </form>
  </div>
</section>

<script>
  const fileInput = document.querySelector('#insertgame input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#insertgame .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>
