    <div class="container">
      <section class="section">
        <div class="content">
          <div class="columns">
            <div class="column">
              <p class="title is-5"><?php $total = count($pro); ?><strong><?= $total ?></strong> Pro</p>
              <p class="subtitle is-3">Games:</p>
            </div>
          </div>
          <div class="columns">
            <div class="column is-clipped">
              <div id="carousel-pro" class="carousel carousel-pro">
                <?php $i=0; while ($i < $total): ?>
                  <div class="item-<?= $i ?> mr-1">
                    <div class="card">
                      <div class="card-content" style="width: 100%; height: 380px; background-image: url(<?= base_url() ?>/images/<?= $pro[$i]['image'] ?>.jpeg); background-size: cover; background-position: center;">
                        <div class="is-overlay">
                          <div class="content mt-2 ml-4">
                            <p class="is-inline-block">
                              <a class="tag is-small is-primary" href="<?= base_url() ?>/game/<?= $pro[$i]['slug'] ?>" title="<?= $pro[$i]['name'] ?>"><?= $pro[$i]['name'] ?></a>
                              <br>
                              <a class="tag is-small is-primary" href="<?= base_url() ?>/developer/<?= $pro[$i]['developer_slug'] ?>" title="<?= $pro[$i]['developer_name'] ?>"><?= $pro[$i]['developer_name'] ?></a>
                              <br>
                              <a class="tag is-small is-primary" href="<?= base_url() ?>/publisher/<?= $pro[$i]['publisher_slug'] ?>" title="<?= $pro[$i]['publisher_name'] ?>"><?= $pro[$i]['publisher_name'] ?></a>
                              <?php if($pro[$i]['pro_till'] != ''): ?>
                                <br>
                                <span class="tag is-small is-danger">Claim it before <?= $pro[$i]['pro_till'] ?></span>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.carousel-pro').slick({
          dots: true,
          infinite: false,
          speed: 300,
          slidesToShow: 3,
          slidesToScroll: 3,
          arrows: false,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }]
        });
      });
    </script>
    <div class="container has-background-gunmetal">
      <section class="section">
        <div class="columns">
          <div class="column">
            <p class="title is-5">This Month</p>
            <p class="subtitle is-3"><?php $totalm = count($month); ?><strong><?= $totalm ?></strong> Releases:</p>
          </div>
        </div>
        <div class="columns">
          <div class="column is-clipped">
            <div id="carousel-month" class="carousel carousel-month">
              <?php $i=0; while ($i < $totalm): ?>
                <div class="month-<?= $i ?> mr-1">
                  <div class="card">
                    <div class="card-content" style="height: 380px; background-image: url(<?= base_url() ?>/images/<?= $month[$i]['image'] ?>.jpeg); background-size: cover; background-position: center;">
                      <div class="is-overlay">
                        <div class="content mt-2 ml-4">
                          <p class="is-inline-block">
                            <a class="tag is-small is-primary" href="<?= base_url() ?>/game/<?= $month[$i]['slug'] ?>" title="<?= $month[$i]['name'] ?>"><?= $month[$i]['name'] ?></a>
                            <br>
                            <a class="tag is-small is-primary" href="<?= base_url() ?>/developer/<?= $month[$i]['developer_slug'] ?>" title="<?= $month[$i]['developer_name'] ?>"><?= $month[$i]['developer_name'] ?></a>
                            <br>
                            <a class="tag is-small is-primary" href="<?= base_url() ?>/publisher/<?= $month[$i]['publisher_slug'] ?>" title="<?= $month[$i]['publisher_name'] ?>"><?= $month[$i]['publisher_name'] ?></a>
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
            <a class="button is-info" href="<?= base_url() ?>/list/launched">See All Games Launched!</a>
          </div>
        </div>
      </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.carousel-month').slick({
          dots: true,
          infinite: false,
          speed: 300,
          slidesToShow: 3,
          slidesToScroll: 3,
          arrows: false,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }]
        });
      });
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
                <figure class="media-left image is-64x64 is-fullwidth">
                  <p>
                    <img title="<?= $soon['name'] ?>" src="<?= base_url() ?>/images/<?= $soon['image'] ?>-thumb.jpeg" alt="<?= $soon['name'] ?>">
                  </p>
                </figure>
                <div class="media-content">
                  <p class="title is-5"><?php if($soon['rumor'] == 1): ?><span class="icon has-text-danger is-small" title="RUMOR!"><i class="fas fa-user-secret"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $soon['slug'] ?>"><?= character_limiter($soon['name'], 15, '...') ?></a></p>
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
            <a class="button is-info" style="border: none;" href="<?= base_url() ?>/list/soon">See All Games Coming!</a>
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
                <figure class="media-left image is-64x64 is-fullwidth">
                  <p>
                    <img title="<?= $last['name'] ?>" src="<?= base_url() ?>/images/<?= $last['image'] ?>-thumb.jpeg" alt="<?= $last['name'] ?>">
                  </p>
                </figure>
                <div class="media-content">
                  <p class="title is-5"><?php if($last['rumor'] == 1): ?><span class="icon has-text-danger is-small" title="RUMOR!"><i class="fas fa-user-secret"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $last['slug'] ?>"><?= character_limiter($last['name'], 15, '...') ?></a></p>
                  <p class="subtitle is-7">Developer <?= $last['developer_name'] ?> / Publisher <?= $last['publisher_name'] ?><br>
                    Added: <strong><?= $last['created_at'] ?></strong>
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
                <figure class="media-left image is-64x64">
                  <p>
                    <img title="<?= $lastupdated['name'] ?>" src="<?= base_url() ?>/images/<?= $lastupdated['image'] ?>-thumb.jpeg" alt="<?= $lastupdated['name'] ?>">
                  </p>
                </figure>
                <div class="media-content">
                  <p class="title is-5"><?php if($lastupdated['rumor'] == 1): ?><span class="icon has-text-danger is-small" title="RUMOR!"><i class="fas fa-user-secret"></i></span></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $lastupdated['slug'] ?>"><?= character_limiter($lastupdated['name'], 15, '...') ?></a></p>
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
      <section class="section has-background-gunmetal">
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
