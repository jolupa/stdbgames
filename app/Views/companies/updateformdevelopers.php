  <div id="form_add_developers" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Update Developer</p>
    <form action="<?= base_url ( '/developers/updatedeveloperdb' ) ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $developer['id'] ?>">
      <input type="hidden" name="slug" value="<?= $developer['slug'] ?>">
      <p class=" title is-5">Basic info:</p>
      <div class="field">
        <label class="label" for="name">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Name..." name="name" value="<?= $developer['name'] ?>">
        </div>
      </div>
      <div class="field">
        <label class="label" for="url">Website</label>
        <div class="control">
          <input class="input" type="text" placeholder="URL..." name="url" <?php if ( ! empty ( $developer['url'] ) ): ?>value="<?= $developer['url'] ?><?php endif; ?>">
        </div>
      </div>
      <div class="field">
        <label class="label" for="twitter_account">Twitter Account</label>
        <div class="control">
          <input class="input" type="text" placeholder="@account..." name="twitter_account" <?php if ( ! empty ( $developer['twitter_account'] ) ): ?>value="<?= $developer['twitter_account'] ?>"<?php endif; ?>>
        </div>
      </div>
      <p class="title is-5 mt-5">A part:</p>
      <div class="field">
        <label class="label" for="about">About</label>
        <div class="control">
          <textarea class="textarea" placeholder="About..." name="about"><?php if ( ! empty ( $developer['about'] ) ): ?><?= $developer['about'] ?><?php endif; ?></textarea>
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
        <?php if ( ! empty ( $developer['image'] ) ): ?>
          <input type="hidden" name="old_image" value="<?= $developer['image'] ?>">
        <?php endif; ?>
        <label class="label" for="image">Image</label>
        <input class="input" type="file" placeholder="Choose Image to upload..." name="image">
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-primary" type="submit">Update!</button>
        </div>
        <div class="control">
          <button class="button is-coral" type="reset">Reset!</button>
        </div>
      </div>
    </form>
  </div>
</div>
