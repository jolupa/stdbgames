<section class="section" id="interview">
  <div class="container is-max-widescreen">
    <h1 class="title">
      Add/Update Interview:
    </h1>
    <form action="<?= base_url ('interviews/saveinterview') ?>" method="post" enctype="multipart/form-data">
      <?php if (isset ($interview ['id'])): ?>
        <input type="hidden" name="id" value="<?= $interview ['id'] ?>">
      <?php endif; ?>
      <div class="field is-grouped-multiline">
        <?= view_cell ('App\Controllers\Games::allgames') ?>
        <?= view_cell ('App\Controllers\Companies::developers') ?>
      </div>
      <div class="field is-grouped">
        <div class="control is-expanded">
          <label class="label">Interview:</label>
          <textarea class="textarea" name="body"><?php if (isset ($interview ['body']) && $interview ['body'] != ''): ?><?= $interview ['body'] ?><?php endif; ?></textarea>
          <p class="help">
            We use Markdown with this field.</br>
            Remember to insert a close div if an image is inserted and to open a new div after image with content class.
          </p>
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

<?php /*<div id="Add_Interview" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4 mt-5">Add Interview for <?= $game ['name'] ?></p>
    <form method="post" action="<?= base_url ( '/interviews/saveinterviewdb' ) ?>" enctype="multipart/form-data">
      <input type="hidden" name="game_id" value="<?= $game [ 'id' ] ?>">
      <input type="hidden" name="slug" value="<?= $game [ 'slug' ] ?>">
      <div class="field">
        <label class="label">Interview's Body</label>
        <div class="control">
          <textarea class="textarea" rows="30" name="body"></textarea>
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
      <?= view_cell ( 'App\Controllers\Developers::alldevelopers' ) ?>
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
</div> */ ?>
