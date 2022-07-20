<section class="section">
  <div class="container is-max-widescreen">
    <h1 class="title">
      Latest Reviews:
    </h1>
    <div class="columns is-multiline is-mobile">
      <?php
        foreach ($latestreviews as $reviews):
      ?>
      <div class="column is-half-mobile is-3-desktop">
        <div class="card is-equal">
          <div class="card-image">
            <figure class="image is-5by3">
              <img src="<?= base_url ( '/assets/images/games/'.$reviews['image'].'.jpeg') ?>">
            </figure>
          </div>
          <div class="card-content">
            <h5 class="title is-5">
              <a href="<?= base_url ('/game/'.$reviews['slug']) ?>"><?= $reviews['name'] ?></a>
            </h5>
            <h6 class="subtitle is-6">
              Review by <strong><?= $reviews['uname'] ?></strong>
            </h6>
            <p>
              <span class="icon-text">
                <span class="icon"><i class="fa-solid fa-face-smile"></i></span><span><?= $reviews['like'] ?> /</span><span class="icon"><i class="fa-solid fa-face-frown"></i></span><span><?= $reviews['dislike'] ?></span>
              </span>
            </p>
          </div>
        </div>
      </div>
      <?php
        endforeach;
      ?>
    </div>
  </div>
</section>
