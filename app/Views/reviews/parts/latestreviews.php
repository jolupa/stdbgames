<article id="latest_reviews" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Latest Reviews</p>
    <div class="columns is-multiline-mobile">
      <?php foreach ($latestreviews as $reviews): ?>
        <div class="column is-2">
          <div class="card is-shadowless">
            <div class="card-image">
              <figure class="image is-3by2">
                <a href="<?= base_url ( '/game/'.$reviews['slug'] ) ?>"><img src="<?= base_url('/img/games/'.$reviews['image'].'.jpeg') ?>" title="<?= $reviews['name'] ?>"></a>
              </figure>
            </div>
            <div class="card-content">
              <p class="title is-5"><span class="icon-text"><span><?php if ( $reviews['urole'] == 1 ): ?>Our Staff<?php else: ?><?= $reviews['uname'] ?><?php endif; ?></span><?php if ( $reviews['urole'] == 1 ): ?>&nbsp;<span class="icon"><i class="fas fa-users"></i></span><?php endif; ?><?php if ( $reviews['urole'] == 2 ): ?>&nbsp;<span class="icon"><i class="far fa-newspaper"></i></span><?php endif; ?><?php if ( $reviews['urole'] == 3 ): ?>&nbsp;<span class="icon has-text-green-eagle-2"><i class="fas fa-gamepad"></i></span><?php endif; ?></span></p>
              <p class="subtitle is-7">reviewed <a href="<?= base_url ( '/game/'.$reviews['slug'] ) ?>"><?= ellipsize ( $reviews['name'], 15, 1, '...') ?></a></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</article>
