<div class="columns is-centered my-2">
  <div class="column is-8">
    <form action="<?= base_url() ?>/search/result" method="post">
      <div class="field has-addons">
        <div class="control is-expanded">
          <input class="input is-small" name="keyword" type="text">
        </div>
        <div class="control">
          <button class="button is-primary has-text-dark is-small" name="submit">Search!</button>
        </div>
      </div>
    </form>
  </div>
</div>
