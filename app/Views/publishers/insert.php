<div class="container">
  <section class="section">
    <div class="content">
      <?php if(isset($error)): ?>
        <p><?= $error ?></p>
      <?php else: ?>
        <p class="subtitle is-5">Insert new</p>
        <p class="title is-3">Publisher:</p>
        <form action="<?= base_url() ?>/publishers/createpublisherdb" method="post" enctype="multipart/form-data">
          <div class="field">
            <div class="control">
              <input type="text" class="input" name="name" placeholder="Publisher's Name">
            </div>
          </div>
          <div class="field">
            <div class="control">
              <input type="text" class="input" name="url" placeholder="Publisher's Site">
            </div>
          </div>
          <div class="field">
            <div class="control">
              <textarea name="about" class="textarea" id="textarea" placeholder="Info about the publisher"></textarea>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-small is-primary has-text-dark" value="submit">Add Publisher!</button>
            </div>
            <div class="control">
              <button class="button is-small is-danger has-text-white" value="reset">Start Over</button>
            </div>
          </div>
        </form>
      <?php endif; ?>
    </div>
  </section>
</div>
