    <div class="container">
      <section class="section">
        <div class="content">
          <div class="columns">
            <div class="column">
              <p class="title is-5">Pro</p>
              <p class="subtitle is-3">Games:</p>
            </div>
          </div>
          <div class="columns">
            <div class="column is-clipped">
              <div id="carousel-pro" class="carousel">
                <?php $total = count($pro); ?>
                <?php $i=0; while ($i < $total): ?>
                  <div class="item-<?= $i ?> mr-1">
                    <div class="card">
                      <div class="card-content" style="width: 100%; height: 380px; background-image: url(<?= base_url() ?>/images/<?= $pro[$i]['image'] ?>.jpeg); background-size: cover; background-position: center;">
                        <div class="is-overlay">
                          <div class="content mt-2 ml-4">
                            <p class="is-inline-block">
                              <a class="tag is-small is-warning has-text-dark" href="<?= base_url() ?>/game/<?= $pro[$i]['slug'] ?>" title="<?= $pro[$i]['name'] ?>"><?= $pro[$i]['name'] ?></a>
                              <br>
                              <a class="tag is-small is-warning has-text-dark" href="<?= base_url() ?>/developer/<?= $pro[$i]['developer_slug'] ?>" title="<?= $pro[$i]['developer_name'] ?>"><?= $pro[$i]['developer_name'] ?></a>
                              <br>
                              <a class="tag is-small is-warning has-text-dark" href="<?= base_url() ?>/publisher/<?= $pro[$i]['publisher_slug'] ?>" title="<?= $pro[$i]['publisher_name'] ?>"><?= $pro[$i]['publisher_name'] ?></a>
                              <?php if(isset($game['pro_till'])): ?>
                                <br>
                                <span class="tag is-small is-danger has-test-white">Claim it before <?= $game['pro_till'] ?></span>
                              <?php endif; ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php $i++; endwhile; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script src="<?= base_url() ?>/assets/js/bulma-carousel.min.js"></script>
    <script>
    	bulmaCarousel.attach('#carousel-pro', {
    		slidesToScroll: 3,
    		slidesToShow: 3,
        pagination: false,
        loop: true,
        breakpoints: [{ changePoint: 480, slidesToShow: 1, slidesToScroll: 1, navigationKeys: false, navigation: false },
                      { changePoint: 640, slidesToShow: 2, slidesToScroll: 2, navigationKeys: false, navigation: false },
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
      var element = document.querySelector('#carousel-pro');
      if (element && element.bulmaCarousel) {
      	// bulmaCarousel instance is available as element.bulmaCarousel
      	element.bulmaCarousel.on('before-show', function(state) {
      		console.log(state);
      	});
      }
    </script>
    <div class="container has-background-light">
      <section class="section">
        <div class="columns">
          <div class="column">
            <p class="title is-5">This Month</p>
            <p class="subtitle is-3">Releases:</p>
          </div>
        </div>
        <div class="columns">
          <div class="column is-clipped">
            <div id="carousel-month" class="carousel">
              <?php $total = count($month); ?>
              <?php $i=0; while ($i < $total): ?>
                <div class="month-<?= $i ?> mr-1">
                  <div class="card">
                    <div class="card-content" style="height: 380px; background-image: url(<?= base_url() ?>/images/<?= $month[$i]['image'] ?>.jpeg); background-size: cover; background-position: center;">
                      <div class="is-overlay">
                        <div class="content mt-2 ml-4">
                          <p class="is-inline-block">
                            <a class="tag is-small is-warning has-text-dark" href="<?= base_url() ?>/game/<?= $month[$i]['slug'] ?>" title="<?= $month[$i]['name'] ?>"><?= $month[$i]['name'] ?></a>
                            <br>
                            <a class="tag is-small is-warning has-text-dark" href="<?= base_url() ?>/developer/<?= $month[$i]['developer_slug'] ?>" title="<?= $month[$i]['developer_name'] ?>"><?= $month[$i]['developer_name'] ?></a>
                            <br>
                            <a class="tag is-small is-warning has-text-dark" href="<?= base_url() ?>/publisher/<?= $month[$i]['publisher_slug'] ?>" title="<?= $month[$i]['publisher_name'] ?>"><?= $month[$i]['publisher_name'] ?></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php $i++; endwhile; ?>
            </div>
          </div>
        </div>
        <div class="columns">
          <div class="column has-text-centered">
            <a class="button is-warning is-small has-text-dark" href="<?= base_url() ?>/list/launched">See All Games Launched!</a>
          </div>
        </div>
      </section>
    </div>
    <script src="<?= base_url() ?>/assets/js/bulma-carousel.min.js"></script>
    <script>
      bulmaCarousel.attach('#carousel-month', {
        slidesToScroll: 3,
        slidesToShow: 3,
        pagination: false,
        loop: true,
        breakpoints: [{ changePoint: 480, slidesToShow: 1, slidesToScroll: 1, navigationKeys: false, navigation: false },
                      { changePoint: 640, slidesToShow: 2, slidesToScroll: 2, navigationKeys: false, navigation: false },
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
      var element = document.querySelector('#carousel-month');
      if (element && element.bulmaCarousel) {
        // bulmaCarousel instance is available as element.bulmaCarousel
        element.bulmaCarousel.on('before-show', function(state) {
          console.log(state);
        });
      }
    </script>
    <div class="container">
      <section class="section">
        <div class="columns">
          <div class="column">
            <p class="subtile is-5">Coming</p>
            <p class="title is-3">Soon:</p>
          </div>
        </div>
        <div class="columns is-multiline">
          <?php foreach($soon as $soon): ?>
            <div class="column is-one-quarter">
              <div class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img title="<?= $soon['name'] ?>" src="<?= base_url() ?>/images/<?= $soon['image'] ?>-thumb.jpeg" alt="<?= $soon['name'] ?>">
                  </p>
                </figure>
                <div class="media-content">
                  <p class="title is-5"><?php if($soon['rumor'] == 1): ?><span class="icon has-text-danger" title="RUMOR!"><i class="fas fa-exclamation-triangle"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $soon['slug'] ?>"><?= character_limiter($soon['name'], 15, '...') ?></a></p>
                  <p class="subtitle is-7">Developer <?= $soon['developer_name'] ?> / Publisher <?= $soon['publisher_name'] ?><br>
                    <?php if($soon['release'] == '2099-01-01' || $soon['release'] == 'TBA'): ?>
                      TBA
                    <?php else: ?>
                      <?= $soon['release'] ?>
                    <?php endif; ?>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="columns is-centered">
          <div class="column has-text-centered">
            <a class="button is-warning is-small" style="border: none;" href="<?= base_url() ?>/list/soon">See All Games Coming!</a>
          </div>
        </div>
      </section>
    </div>
    <?= view_cell('App\Controllers\Interviews::interviewlist') ?>
    <div class="container">
      <section class="section">
        <div class="columns">
          <div class="column">
            <p class="subtile is-5">Latest Games</p>
            <p class="title is-3">Added:</p>
          </div>
        </div>
        <div class="columns is-multiline">
          <?php foreach($last as $last): ?>
            <div class="column is-one-quarter">
              <div class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img title="<?= $last['name'] ?>" src="<?= base_url() ?>/images/<?= $last['image'] ?>-thumb.jpeg" alt="<?= $last['name'] ?>">
                  </p>
                </figure>
                <div class="media-content">
                  <p class="title is-5"><?php if($last['rumor'] == 1): ?><span class="icon has-text-danger" title="RUMOR!"><i class="fas fa-exclamation-triangle"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $last['slug'] ?>"><?= character_limiter($last['name'], 15, '...') ?></a></p>
                  <p class="subtitle is-7">Developer <?= $last['developer_name'] ?> / Publisher <?= $last['publisher_name'] ?><br>
                    Created: <strong><?= $last['created_at'] ?></strong>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="columns">
          <div class="column">
            <p class="title is-3">Updated:</p>
          </div>
        </div>
        <div class="columns is-multiline">
          <?php foreach($lastupdated as $lastupdated): ?>
            <div class="column is-one-quarter">
              <div class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img title="<?= $lastupdated['name'] ?>" src="<?= base_url() ?>/images/<?= $lastupdated['image'] ?>-thumb.jpeg" alt="<?= $lastupdated['name'] ?>">
                  </p>
                </figure>
                <div class="media-content">
                  <p class="title is-5"><?php if($lastupdated['rumor'] == 1): ?><span class="icon has-text-danger" title="RUMOR!"><i class="fas fa-exclamation-triangle"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $lastupdated['slug'] ?>"><?= character_limiter($lastupdated['name'], 15, '...') ?></a></p>
                  <p class="subtitle is-7">Developer <?= $lastupdated['developer_name'] ?> / Publisher <?= $lastupdated['publisher_name'] ?><br>
                    Last update: <strong><?= $lastupdated['updated_at'] ?></strong>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>
    </div>
    <div class="container">
      <section class="section has-background-light">
        <div class="columns">
          <div class="column">
            <?= view_cell('App\Controllers\Reviews::chart') ?>
          </div>
          <div class="column">
            <?= view_cell('App\Controllers\Reviews::latestreviews') ?>
          </div>
          <div class="column">
            <?= view_cell('App\Controllers\Prices::pricesfrontpage') ?>
          </div>
        </div>
      </section>
    </div>
