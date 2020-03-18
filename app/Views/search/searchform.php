<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-three-quarters">
        <form action="<?= base_url() ?>/search/searchresult" method="post">
          <div class="field has-addons">
            <div class="control">
              <button class="button is-static">Games</button>
            </div>
            <div class="control is-expanded">
              <input class="input" name="query">
            </div>
            <div class="control">
              <button class="button is-primary" name="submit">Search!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
