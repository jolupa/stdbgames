    <div class="container has-background-gunmetal">
      <section class="section">
        <div class="columns">
          <div class="column">
            <p class="subtitle is-5">Our Small
            <p class="title is-3">Interviews:</p>
          </div>
        </div>
        <div class="columns">
          <div id="carousel-interview" class="column is-clipped carousel-interview">
          <?php $total = count($interview); ?>
          <?php $i = 0; while ($i < $total): ?>
            <div class="card $interview-<?= $i ?> mr-1 is-shadowless">
              <div class="card-image" style="height: 200px; background-image: url(<?= base_url() ?>/images/<?= $interview[$i]['game_image'] ?>.jpeg); background-size: cover; background-position: center;"></div>
              <div class="card-content has-background-green-eagle-2">
                <div class="content">
                  <p>Small Interview with <a href="<?= base_url() ?>/game/<?= $interview[$i]['game_slug'] ?>#small_interview"><strong><?= $interview[$i]['game_name'] ?></strong></a> Developers</p>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; ?>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.carousel-interview').slick({
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
