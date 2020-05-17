<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-full-width">
        <form method="post" action="<?= base_url() ?>/specials/update">
          <input type="hidden" name="Specialid" value="<?=  $specials['sId'] ?>">
          <div class="field">
            <div class="control">
              <input class="input" name="Image" placeholder="Image banner with the extension" value="<?= $specials['sImage'] ?>">
            </div>
          </div>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control is-expanded">
              <input class="input" name="Title" placeholder="The Special Title" value="<?= $specials['sTitle'] ?>">
            </div>
            <div class="control">
              <input class="input" name="Date" placeholder="Where it goes live" value="<?= $specials['sDate'] ?>">
            </div>
          </div>
          <div class="field">
            <div class="control">
              <textarea class="textarea" name="About" placeholder="What you have to say in the Special"><?= $specials['sAbout'] ?></textarea>
            </div>
          </div>
          <div class="field">
            <div class="control">
              <button class="button is-primary" action="submit">Add</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
