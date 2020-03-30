<!-- Game Insert Form -->
<section class="section">
  <div class="container">
    <form method="post" action="<?= base_url() ?>/games/insertgame" enctype="multipart/form-data">
      <!-- Name Entry -->
      <div class="field">
        <?= \Config\Services::validation()->listErrors(); ?>
      </div>
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" name="Title">
        </div>
      </div>
    <!-- Date Entry -->
    <div class="field is-grouped is-grouped-multiline">
      <div class="control is-expanded">
        <label class="label">Release Date</label>
        <input class="input" type="text" name="Release">
        <p class="help">In the form of YYYY-MM-DD</p>
      </div>
      <!-- Founder Entry -->
      <div class="control">
        <label class="label">Game Is Founder?</label>
        <div class="select">
            <select name="Pro">
              <option value="0">No Founders</option>
              <option value="1">Is Founders</option>
            </select>
        </div>
      </div>
      <div class="control">
        <label class="label">Is Founder since:</label>
        <input class="input" type="text" name="Profrom">
        <p class="help">date in form YYY-MM-DD</p>
      </div>
      <div class="control">
        <label class="label">Is founder till:</label>
        <input class="input" type="text" name="Protill">
        <p class="help">date in form YYY-MM-DD</p>
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
            <option value="<?= $developer['dId'] ?>"><?= $developer['dName'] ?></option>
          <?php endforeach; ?>
          </select>
        </div>
          <?php endif; ?>
          <p class="help"><a href="<?= base_url() ?>/games/devform">Insert</a> new Developer</p>
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
            <option value="<?= $publisher['pId']?>"><?= $publisher['pName'] ?></option>
          <?php endforeach; ?>
          </select>
        </div>
          <?php endif; ?>
          <p class="help"><a href="<?= base_url() ?>/games/pubform">Insert</a> new Publisher</p>
      </div>
    </div>
      <!-- Game History Entry -->
      <div class="field">
        <label class="label">What's the game about:</label>
        <div class="control">
          <textarea class="textarea" name="About"></textarea>
        </div>
      </div>
      <!-- File Chooser Entry -->
      <div class="field is-grouped is-grouped-multiline file has-name is-right">
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
          <p class="help">Any Kind of file. Less than 2Mb</p>
        </div>
        <!-- Button Send -->
        <div class="control">
          <button class="button is-primary" type="submit" name="submit">Add Game</button>
        </div>
        <!-- Button Clear -->
        <div class="control">
          <button class="button is-light" type="reset" name="reset">Clear</button>
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
