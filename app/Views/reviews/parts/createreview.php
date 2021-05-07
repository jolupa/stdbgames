<div id='create_review' class="content mt-5">
  <p class="title is-4">Write your own review</p>
  <div class="columns">
    <div class="column">
      <form action="<?= base_url ( '/reviews/addreview' ) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
        <div class="field">
          <div class="control">
            <textarea class="textarea" name="about"></textarea>
            <div class="control">
              <p class="help">
                We use Markdown for this field<br>
                - **bold**<br>
                - *Italic*<br>
                - ***Bold and Italic***<br>
                - To insert a Line Break insert two white spaces or \<br>
                - Unordered List start with - OR + OR *
              </p>
            </div>
          </div>
        </div>
        <?php if ( session ( 'role' ) == 2 ): ?>
          <div class="field">
            <div class="control">
              <input class="input" type="text" name="url" placeholder="Your Full Article...">
            </div>
          </div>
        <?php endif; ?>
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-primary" value="submit">Review It!</button>
          </div>
          <div class="control">
            <button class="button is-coral" value="reset">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
