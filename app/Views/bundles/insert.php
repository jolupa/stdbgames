<section class="section">
  <div class="container">
    <form action="<?= base_url() ?>/bundles/bundles/insertbundle" method="post" enctype="multipart/form-data">
      <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
          <label class="label">Bundle Name:</label>
          <input class="input" type="text" name="Name">
        </div>
        <div class="control">
          <?= view_cell('App\Controllers\Games::list') ?>
        </div>
        <div class="control">
          <?= view_cell('App\Controllers\Developers::getdevelopers') ?>
        </div>
      </div>
      <div class="field field-is-grouped field-is-grouped-multiline">
        <div class="control">
          <?= view_cell('App\Controllers\Addons::addonslist') ?>
        </div>
        </div>
    </form>
  </div>
</section>
