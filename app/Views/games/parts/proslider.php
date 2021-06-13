<article id="pro_slider" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Games on PRO</p>
    <div class="columns">
      <div class="column is-12">
        <div class="embla">
          <div class="embla__viewport">
            <div class="embla__container">
              <?php $total = count($proslider); $i = 0; while ($i < $total): ?>
                <div class="embla__slide">
                  <div class="card is-shadowless">
                    <div class="card-image">
                      <figure class="image is-16by9">
                        <a href="<?= base_url ( '/game/'.$proslider[$i]['slug'] ) ?>"><img src="<?= base_url('/img/games/'.$proslider[$i]['image'].'.jpeg') ?>" title="<?= $proslider[$i]['name'] ?>"></a>
                        <div class="is-overlay is-hidden-touch" style="top: auto; right: 10px; bottom: 10px; left: auto;">
                          <span class="icon-text">
                            <?php if ( session ( 'logged' ) == true ): ?>
                              <?php if ( session ( 'likes') != null && in_array ( $proslider[$i]['id'], session ( 'likes' ) ) ): ?>
                                <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $proslider[$i]['like'] ?></span></tag>
                              <?php else: ?>
                                <a href="<?= base_url ( '/games/like/'.$proslider[$i]['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $proslider[$i]['like'] ?></span></tag></a>
                              <?php endif; ?>
                              <?php if ( session ( 'dislike' ) != null && in_array ( $proslider[$i]['id'], session ( 'dislikes' ) ) ): ?>
                                <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $proslider[$i]['dislike'] ?></span></tag>
                              <?php else: ?>
                                <a href="<?= base_url ( '/games/dislike/'.$proslider[$i]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $proslider[$i]['dislike'] ?></span></tag></a>
                              <?php endif; ?>
                            <?php endif; ?>
                          </span>
                        </div>
                        <div class="is-overlay is-hidden-desktop" style="top: auto; right: 5px; bottom: 5px; left: auto;">
                          <span class="icon-text">
                            <?php if ( session ( 'logged' ) == true ): ?>
                              <?php if ( session ( 'likes') != null && in_array ( $proslider[$i]['id'], session ( 'likes' ) ) ): ?>
                                <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $proslider[$i]['like'] ?></span></tag>
                              <?php else: ?>
                                <a href="<?= base_url ( '/games/like/'.$proslider[$i]['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $proslider[$i]['like'] ?></span></tag></a>
                              <?php endif; ?>
                              <?php if ( session ( 'dislike' ) != null && in_array ( $proslider[$i]['id'], session ( 'dislikes' ) ) ): ?>
                                <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $proslider[$i]['dislike'] ?></span></tag>
                              <?php else: ?>
                                <a href="<?= base_url ( '/games/dislike/'.$proslider[$i]['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $proslider[$i]['dislike'] ?></span></tag></a>
                              <?php endif; ?>
                            <?php endif; ?>
                          </span>
                        </div>
                      </figure>
                    </div>
                    <div class="card-content">
                      <p class="title is-5"><a href="<?= base_url('/game/'.$proslider[$i]['slug']) ?>" title="<?= $proslider[$i]['name'] ?>"><?= $proslider[$i]['name'] ?></a></p>
                      <p class="subtitle is-7">From <?= date('d-m-Y', strtotime($proslider[$i]['pro_from'])) ?> <?php if($proslider[$i]['pro_till'] != ''): ?>| Till <?= date('d-m-Y', strtotime($proslider[$i]['pro_till'])) ?><?php endif; ?></p>
                    </div>
                  </div>
                </div>
              <?php $i++; endwhile; ?>
            </div>
          </div>
          <div class="embla__prev is-overlay is-hidden-mobile" style="top: 40px; right: auto; bottom: auto; left: -10px;">
            <button class="button is-minion"><span class="icon has-text-coral"><i class="is-large fas fa-arrow-alt-circle-left"></i></span></button>
          </div>
          <div class="embla__next is-overlay is-hidden-mobile" style="top: 40px; right: -10px; bottom: auto; left: auto;">
            <button class="button is-minion"><span class="icon has-text-coral is-large"><i class="fas fa-arrow-alt-circle-right"></i></span></button>
          </div>
        </div>
      </div>
    </div>
    <div class="columns">
      <div class="column is-2 is-offset-10">
        <a href="<?= base_url ( '/games/pro') ?>"><button class="button is-info">See all Pro Games</button></a>
      </div>
    </div>
  </div>
</article>

<script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
<script type="text/javascript">
  var rootNode = document.querySelector('.embla')
  var viewportNode = document.querySelector('.embla__viewport')
  var prevButtonNode = rootNode.querySelector('.embla__prev')
  var nextButtonNode = rootNode.querySelector('.embla__next')
  var options = {
                  loop: true,
                  slidesToScroll: 1,
                  draggable: true,
                  startIndex: 0,
                  align: 'start'
                }

  var embla = EmblaCarousel(viewportNode, options)
  prevButtonNode.addEventListener('click', embla.scrollPrev, false)
  nextButtonNode.addEventListener('click', embla.scrollNext, false)
</script>
