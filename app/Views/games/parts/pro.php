<div class="container has-background-gunmetal">
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
              <article class="item-<?= $i ?> mr-1">
                <div class="card">
                  <div class="card-content" style="width: 100%; height: 380px; background-image: url(<?= base_url() ?>/images/<?= $pro[$i]['image'] ?>.jpeg); background-size: cover; background-position: center;">
                    <div class="is-overlay">
                      <div class="content mt-2 ml-4">
                        <p class="is-inline-block">
                          <a class="tag is-small is-green-eagle" href="<?= base_url() ?>/game/<?= $pro[$i]['slug'] ?>" title="<?= $pro[$i]['name'] ?>"><?= character_limiter($pro[$i]['name'], 15, '...') ?></a>
                          <br>
                          <a class="tag is-small is-green-eagle" href="<?= base_url() ?>/developer/<?= $pro[$i]['developer_slug'] ?>" title="<?= $pro[$i]['developer_name'] ?>"><?= character_limiter($pro[$i]['developer_name'], 15, '...') ?></a>
                          <br>
                          <a class="tag is-small is-green-eagle" href="<?= base_url() ?>/publisher/<?= $pro[$i]['publisher_slug'] ?>" title="<?= $pro[$i]['publisher_name'] ?>"><?= character_limiter($pro[$i]['publisher_name'], 15, '...') ?></a>
                          <?php if($pro[$i]['pro_till'] != ''): ?>
                            <br>
                            <span class="tag is-small is-danger">Claim it before <?= date('d-m-Y', strtotime($pro[$i]['pro_till'])) ?></span>
                          <?php endif; ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            <?php $i++; endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>/assets/js/slick.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.carousel-pro').slick({
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: false,
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
