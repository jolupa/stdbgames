<?php if (isset ($reviews)): ?>
  <div class="content mt-5">
    <h1 class="title">
      Reviews:
    </h1>
  </div>
  <?php foreach ($reviews as $review): ?>
    <div class="media">
      <figure class="media-left">
        <p class="image is-64x64">
          <?php if (!empty ($review ['image'])): ?>
            <img src="<?= base_url ('/assets/images/users/'.$review ['image'].'.png') ?>">
          <?php else: ?>
            <img src="<?= base_url ('/assets/images/stdb_logo_big.png') ?>">
          <?php endif; ?>
        </p>
      </figure>
      <div class="media-content">
        <div class="content">
          <p>
            <span class="icon-text">
              <span>Review by <strong><?= $review ['name'] ?></strong></span>
              <?php if ($review ['role'] == 2): ?>
                <span class="icon"><i class="fa-solid fa-newspaper"></i></span>
              <?php endif; ?>
              <?php if ($review ['role'] == 3): ?>
                <span class="icon"><i class="fa-solid fa-coins"></i></span>
              <?php endif; ?>
            </span><br />
            <?= $review ['about'] ?>
          </p>
        </div>
        <nav class="level is-mobile">
          <div class="level-left">
            <?= view_cell ('\App\Controllers\Reviews::reviewsLike', 'review_id='.$review ['id']) ?>
            <?php if ($review ['user_id'] == session ('user_id')): ?>
              <a class="level-item" id="show_edit">
  							<span class="icon"><i class="fa-solid fa-pen-to-square"></i></icon>
  						</a>
            <?php endif; ?>
          </div>
        </nav>
      </div>
    </div>
    <?php if (!empty ($review ['edit'])): ?>
      <div class="media is-hidden" id='edit_content'>
  			<figure class="media-left">
  				<p class="image is-64x64"></p>
  			</figure>
  			<div class="media-content">
  				<div class="content">
  					<h2 class="title is-4">
  						Edit Review:
  					</h2>
  				</div>
  				<form method="post" action="<?= base_url ('/reviews/addreview') ?>" enctype="multipart/form-data">
            <input type="hidden" name="review_id" value="<?= $review ['id'] ?>">
            <input type="hidden" name="game_id" value="<?= $game ['id'] ?>">
            <inpyt type="hidden" name="user_id" value="<?= session ('user_id') ?>">
  					<div class="field">
  						<div class="control">
  							<textarea class="textarea" name="review_edit"><?= $review ['edit'] ?></textarea>
  						</div>
  					</div>
  					<div class="field is-grouped">
  						<div class="control is-expanded">
                <?php if (!empty ($review ['url'])): ?>
                  <input type="text" class="input" name="url" value="<?= $review ['url'] ?>">
                <?php endif; ?>
  						</div>
  						<div class="control">
  							<button class="button is-primary" type="submit">Edit Review</button>
  						</div>
  					</div>
  				</form>
  			</div>
  		</div>
    <?php endif; ?>
  <?php endforeach ; ?>
<?php endif; ?>
<?php if ($cantreview == false): ?>
  <div class="content mt-5">
    <h2 class="title is-4">
      Write Your Own Review:
    </h2>
  </div>
  <div class="media">
    <figure class="media-left">
      <p class="image is-64x64">
        <img src="<?= base_url ('/assets/images/users/'.session ('username').'.png') ?>">
      </p>
    </figure>
    <div class="media-content">
      <form method="post" action="<?= base_url ('/reviews/addreview') ?>" enctype="multipart/form-data">
        <input type="hidden" name="game_id" value="<?= $game ['id'] ?>">
        <inpyt type="hidden" name="user_id" value="<?= session ('user_id') ?>">
        <div class="field">
          <div class="control">
            <textarea class="textarea" name="about" placeholder="Your Review here..."></textarea>
          </div>
        </div>
        <div class="field is-grouped">
          <div class="control is-expanded">
            <?php if (session ('role') == 3): ?>
              <input type="text" class="input" name="url" placeholder="The URL to full review...">
            <?php endif; ?>
          </div>
          <div class="control">
            <button class="button is-primary" type="submit">Add Review</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php endif; ?>
<script>
$(document).ready(function(){
    $("#show_edit").click(function(){
        $("#edit_content").toggleClass("is-hidden");
    });
});
</script>
