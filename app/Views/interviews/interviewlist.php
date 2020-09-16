    <div class="container has-background-light">
      <section class="section">
        <div class="columns">
          <div class="column">
            <p class="subtitle is-5">Our Small
            <p class="title is-3">Interviews:</p>
          </div>
        </div>
        <div class="columns">
          <div id="carousel-interview" class="column is-clipped">
          <?php $total = count($interview); ?>
          <?php $i = 0; while ($i < $total): ?>
            <div class="card $interview-<?= $i ?> mr-1 is-shadowless">
              <div class="card-image" style="height: 200px; background-image: url(<?= base_url() ?>/images/<?= $interview[$i]['game_image'] ?>.jpeg); background-size: cover; background-position: center;"></div>
              <div class="card-content has-background-white">
                <div class="content">
                  <p>Small Interview with <a href="<?= base_url() ?>/game/<?= $interview[$i]['game_slug'] ?>#small_interview"><strong><?= $interview[$i]['game_name'] ?></strong></a> Developers</p>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; ?>
        </div>
      </div>
    </div>
    <script>
      bulmaCarousel.attach('#carousel-interview', {
        slidesToScroll: 3,
        slidesToShow: 3,
        pagination: false,
        loop: true,
        breakpoints: [{ changePoint: 480, slidesToShow: 1, slidesToScroll: 1 },
                      { changePoint: 640, slidesToShow: 2, slidesToScroll: 2 },
                      { changePoint: 768, slidesToShow: 3, slidesToScroll: 3 }
                    ],
      });
      // Loop on each carousel initialized
      for(var i = 0; i < carousels.length; i++) {
        // Add listener to  event
        carousels[i].on('before:show', state => {
          console.log(state);
        });
      }
      // Access to bulmaCarousel instance of an element
      var element = document.querySelector('#carousel-interview');
      if (element && element.bulmaCarousel) {
        // bulmaCarousel instance is available as element.bulmaCarousel
        element.bulmaCarousel.on('before-show', function(state) {
          console.log(state);
        });
      }
    </script>
