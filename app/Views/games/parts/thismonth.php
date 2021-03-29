<div class="container">
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
            <article class="month-<?= $i ?> mr-1">
              <div class="card">
                <div class="card-content" style="height: 380px; background-image: url(<?= base_url() ?>/images/<?= $month[$i]['image'] ?>.jpeg); background-size: cover; background-position: center;">
                  <div class="is-overlay">
                    <div class="content mt-2 ml-4">
                      <p class="is-inline-block">
                        <a class="tag is-small is-green-eagle" href="<?= base_url() ?>/game/<?= $month[$i]['slug'] ?>" title="<?= $month[$i]['name'] ?>"><?= character_limiter($month[$i]['name'], 15, '..') ?></a>
                        <br>
                        <a class="tag is-small is-green-eagle" href="<?= base_url() ?>/developer/<?= $month[$i]['developer_slug'] ?>" title="<?= $month[$i]['developer_name'] ?>"><?= character_limiter($month[$i]['developer_name'], 15, '...') ?></a>
                        <br>
                        <a class="tag is-small is-green-eagle" href="<?= base_url() ?>/publisher/<?= $month[$i]['publisher_slug'] ?>" title="<?= $month[$i]['publisher_name'] ?>"><?= character_limiter($month[$i]['publisher_name'], 15, '...') ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </article>
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
<script src="<?= base_url() ?>/assets/js/slick.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.carousel-month').slick({
      dots: false,
      infinite: true,
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
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false
          }
        }]
    });
  });
</script>
