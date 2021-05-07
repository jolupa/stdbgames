<p class="title is-4 mt-5">Add Interview</p>
<form method="post" action="<?= base_url ( '/interviews/saveinterviewdb' ) ?>" enctype="multipart/form-data">
  <input type="hidden" name="game_id" value="<?= $game [ 'id' ] ?>">
  <input type="hidden" name="slug" value="<?= $game [ 'slug' ] ?>">
  <div class="field">
    <label class="label">Interview's Body</label>
    <div class="control">
      <textarea class="textarea" name="body"></textarea>
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
  <div class="field is-grouped">
    <div class="control">
      <button class="button is-primary" type="submit">Add!</button>
    </div>
    <div class="control">
      <button class="button is-coral" type="reset">Reset!</button>
    </div>
  </div>
</form>
