<section class="section">
  <div class="container is-max-widescreen">
    <h1 class="title">
      Add/Edit Company:
    </h1>
    <form action="<?= base_url ('/companies/savecompany') ?>" method="post" enctype="multipart/form-data">
      <?php if (isset ($company ['id'])): ?>
        <input type="hidden" name="id" value="<?= $company ['id'] ?>">
        <input type="hidden" name="old_slug" value="<?= $company ['slug'] ?>">
        <?php if (!empty ($company ['image'])): ?>
          <input type="hidden" name="old_image" value="<?= $company ['image'] ?>">
        <?php endif; ?>
      <?php endif; ?>
      <h2>
        Info:
      </h2>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" class="checkbox" name="is_developer"
            <?php if (isset ($_POST ['is_developer']) && !empty ($_POST ['is_developer']) || isset ($company ['is_developer']) && !empty ($company ['is_developer'])): ?>
              checked
            <?php endif; ?>
            >
            Developer
          </label>
        </div>
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" class="checkbox" name="is_publisher"
            <?php if (isset ($_POST ['is_publisher']) && !empty ($_POST ['is_publisher']) || isset ($company ['is_publisher']) && !empty ($company ['is_publisher'])): ?>
              checked
            <?php endif; ?>
            >
            Publisher
          </label>
        </div>
      </div>
      <h2>
        Basic Information:
      </h2>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <label class="label">Name:</label>
          <input class="input" type="text" name="name"
          <?php if (isset ($_POST ['name']) && !empty ($_POST ['name'])): ?>
            value="<?= $_POST ['name'] ?>"
          <?php endif; ?>
          <?php if (isset ($company ['name']) && !empty ($company ['name'])): ?>
            value="<?= $company ['name'] ?>"
          <?php endif; ?>
          >
        </div>
        <div class="control is-expanded">
          <label class="label">Company Website:</label>
          <input class="input" type="text" name="url"
          <?php if (isset ($_POST ['url']) && !empty ($_POST ['url'])): ?>
            value="<?= $_POST ['url'] ?>"
          <?php endif; ?>
          <?php if (isset ($company ['url']) && !empty ($company ['url'])): ?>
            value="<?= $company ['url'] ?>"
          <?php endif; ?>
          >
        </div>
        <div class="control is-expanded">
          <label class="label">Company Twitter:</label>
          <input class="input" type="text" name="twitter_account"
          <?php if (isset ($_POST ['twitter_account']) && !empty ($_POST ['twitter_account'])): ?>
            value="<?= $_POST ['twitter_account'] ?>"
          <?php endif; ?>
          <?php if (isset ($company ['twitter_account']) && !empty ($company ['twitter_account'])): ?>
            value="<?= $company ['twitter_account'] ?>"
          <?php endif; ?>
          >
        </div>
      </div>
      <div class="field">
        <div class="control is-expanded">
          <label class="label">Info About The Company:</label>
          <textarea class="textarea" name="about"><?php if (isset ($_POST ['about']) && !empty ($_POST ['about'])): ?><?= $_POST ['about'] ?><?php endif; ?><?php if (isset ($company ['about']) && !empty ($company ['about'])): ?><?= $company ['about'] ?><?php endif; ?></textarea>
        </div>
      </div>
      <div class="field">
        <div class="control is-expanded">
          <label class="label">Company Logo:</label>
          <input type="file" class="input" name="image">
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control is-expanded">
        </div>
        <div class="control">
          <button class="button is-primary" type="submit">Add/Edit</button>
        </div>
        <div class="control">
          <button class="button is-danger" type="reset">Reset</button>
        </div>
      </div>
    </form>
  </div>
</section>
