<section class="section">
  <div class="container is-max-widescreen">
    <h1 class="title">
      Most Liked Games:
    </h1>
    <div class="columns is-multiline is-mobile">
      <?php
        foreach ($mostliked as $liked):
      ?>
      <div class="column is-half-mobile is-3-desktop">
        <div class="card is-equal">
          <div class="card-image">
            <figure class="image is-5by3">
              <img src="<?= base_url ( '/assets/images/games/'.$liked['image'].'.jpeg') ?>">
            </figure>
          </div>
          <div class="card-content">
            <h5 class="title is-5">
              <a href="<?= base_url ('/game/'.$liked['slug']) ?>"><?= $liked['name'] ?></a>
            </h5>
            <p>
              <span class="icon-text">
                <span class="icon"><i class="fa-solid fa-face-smile"></i></span><span><?= $liked['like'] ?> /</span><span class="icon"><i class="fa-solid fa-face-frown"></i></span><span><?= $liked['dislike'] ?></span>
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
