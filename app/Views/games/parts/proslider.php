<section class="section">
  <div class="container is-max-widescreen">
    <h1 class="title">
      Pro Games:
    </h1>
    <div class="splide" id="slide_1">
      <div class="splide__track">
        <div class="splide__list">
          <?php
            $total = count ($proslider); $i = 0; while ( $i < $total ):
          ?>
            <div class="splide__slide">
              <div class="card is-shadowless mr-3" style="height: 100%;">
                <div class="card-image">
                  <figure class="image is-16by9">
                    <image src="<?= base_url ( '/assets/images/games/'.$proslider[$i]['image'].'.jpeg' ) ?>">
                  </figure>
                </div>
                <div class="card-content">
                  <h4 class="title is-4">
                    <a href="<?= base_url ('/game/'.$proslider[$i]['slug']) ?>"><?= $proslider[$i]['name'] ?></a>
                  </h4>
                  <p>
                    <span class="icon-text">
                      <span class="icon"><i class="fa-solid fa-face-smile"></i></span><span><?= $proslider[$i]['like'] ?> /</span><span class="icon"><i class="fa-solid fa-face-frown"></i></span><span><?= $proslider[$i]['dislike'] ?></span>
                    </span>
                  </p>
                </div>
              </div>
            </div>
          <?php
            $i++; endwhile;
          ?>
        </div>
      </div>
    </div>
  </div>
  <script>
    new Splide( '#slide_1', {
      type: 'loop',
      perPage: 3,
      breakpoints: {
        390: {
          perPage: 1,
        },
      },
      focus: 1,
    } ).mount();
  </script>
</section>
