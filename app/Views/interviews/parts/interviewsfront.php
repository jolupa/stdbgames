<section class="section" id="interviews">
  <div class="container is-max-widescreen">
    <h1 class="title">
      Our Small Interviews:
    </h1>
    <div class="splide" id="slide_2">
      <div class="splide__track">
        <div class="splide__list">
          <?php
            foreach ($interviewslist as $list):
          ?>
          <div class="splide__slide">
            <div class="card is-shadowless">
              <div class="card-image">
                <figure class="image is-16by9">
                  <img src="<?= base_url ( '/assets/images/games/'.$list['image'].'.jpeg' ) ?>">
                </figure>
              </div>
              <div class="card-content">
                <h4 class="title is-4">
                  <a href="<?= base_url ('/game/'.$list['slug'].'#interview') ?>"><?= $list['name'] ?></a>
                </h4>
              </div>
            </div>
          </div>
          <?php
            endforeach;
          ?>
        </div>
      </div>
    </div>
    <p class="has-text-right">
      <a href="<?= base_url ('/interviews/interviewall') ?>">Read All Interviews...</a>
    </p>
  </div>
  <script>
    new Splide( '#slide_2', {
      type: 'loop',
      perPage: 1,
    } ).mount();
  </script>
</section>
