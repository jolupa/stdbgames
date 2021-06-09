<div id="game_reviews" class="content">
  <p class="title is-4 mt-5">Game Reviews</p>
  <?php foreach ( $reviews as $reviews ): ?>
    <div class="columns">
      <div class="column">
        <div class="media is-shadowless">
          <div class="media-left">
            <figure class="image is-96x96">
              <?php if ( ! empty ( $reviews['image'] ) ): ?>
                <img src="<?= base_url ( '/img/users/'.$reviews['image'].'.png' ) ?>">
              <?php else: ?>
                <img src="<?= base_url ('/img/users/avatar01.png' ) ?>">
              <?php endif; ?>
            </figure>
          </div>
          <div class="media-content">
            <p class="title is-5"><span class="icon-text"><span><?= $reviews['name'] ?>&nbsp;Review</span><?php if ( $reviews['role'] == 1 ): ?>&nbsp;<span class="icon"><i class="fas fa-users"></i></span><?php endif; ?><?php if ( $reviews['role'] == 2 ): ?>&nbsp<span class="icon"><i class="far fa-newspaper"></i></span><?php endif; ?></span></p>
            <p class="subtitle is-7">Date: <?= date ( 'd-m-Y', strtotime ( $reviews['created_at'] ) ) ?></p>
            <div class="content">
              <?= $reviews['about'] ?>
              <?php if ( ! empty ( $reviews['url'] ) ): ?>
                <p><a href="<?= $reviews['url'] ?>" target="_blank">Read Full Review Here</a></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <?= $pager->links( 'reviews' ) ?>
</div>
<?php if ( isset ( $createreview ) && $createreview == true ): ?>
  <div id='create_review' class="content">
    <p class="title is-4 mt-5">Write your own review</p>
    <div class="columns">
      <div class="column">
        <form action="<?= base_url ( '/reviews/addreview' ) ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
          <input type="hidden" name="game_name" value="<?= $game['name'] ?>">
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
<?php endif; ?>
