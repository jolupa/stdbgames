<div id="form_add_publishers" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Add Publisher</p>
    <form action="<?= base_url ( '/publishers/createpublisherdb') ?>" method="post" enctype="multipart/form-data">
      <p class=" title is-5">Basic info:</p>
      <div class="field">
        <label class="label" for="name">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Name..." name="name">
          <?php if ( isset ( $validation ) && $validation->hasError( 'name') ): ?>
            <p class="help"><?= $validation->getError( 'name' ) ?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="field">
        <label class="label" for="url">Website</label>
        <div class="control">
          <input class="input" type="url" placeholder="URL..." name="url">
        </div>
      </div>
      <div class="field">
        <label class="label" for="twitter_account">Twitter Account</label>
        <div class="control">
          <input class="input" type="text" placeholder="@account..." name="twitter_account">
        </div>
      </div>
      <p class="title is-5 mt-5">A part:</p>
      <div class="field">
        <label class="label" for="about">About</label>
        <div class="control">
          <textarea class="textarea" placeholder="About..." name="about"></textarea>
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
      <div class="field">
        <div class="control">
          <label class="file-label" for="image">Image</label>
          <input class="input" type="file" name="image">
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-info" type="submit">Add!</button>
        </div>
        <div class="control">
          <button class="button is-coral" type="reset">Reset!</button>
        </div>
      </div>
    </form>
  </div>
</div>
