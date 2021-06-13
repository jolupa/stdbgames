<article id="this-month" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Out this month</p>
    <div class="columns is-multiline is-mobile">
      <?php foreach ($thismonth as $release): ?>
        <div class="column is-one-quarter-desktop is-half-mobile">
          <div class="card is-shadowless">
            <div class="card-image">
              <figure class="image is-3by2">
                <a href="<?= base_url ( '/game/'.$release['slug'] ) ?>"><img src="<?= base_url('/img/games/'.$release['image'].'.jpeg') ?>" title="<?= $release['name'] ?>"></a>
                <div class="is-overlay is-hidden-touch" style="top: auto; right: 10px; bottom: 10px; left: auto;">
                  <span class="icon-text">
                    <?php if ( session ( 'likes') != null && in_array ( $release['id'], session ( 'likes' ) ) ): ?>
                      <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $release['like'] ?></span></tag>
                      <tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $release['dislike'] ?></span></tag>
                    <?php elseif ( session ( 'dislikes' ) != null && in_array ( $release['id'], session ( 'dislikes') ) ): ?>
                      <tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $release['like'] ?></span></tag>
                      <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $release['dislike'] ?></span></tag>
                    <?php else: ?>
                      <a href="<?= base_url ( '/games/like/'.$release['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $release['like'] ?></span></tag></a>
                      <a href="<?= base_url ( '/games/dislike/'.$release['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $release['dislike'] ?></span></tag></a>
                    <?php endif; ?>
                  </span>
                </div>
                <div class="is-overlay is-hidden-desktop" style="top: auto; right: 5px; bottom: 5px; left: auto;">
                  <span class="icon-text">
                    <?php if ( session ( 'likes') != null && in_array ( $release['id'], session ( 'likes' ) ) ): ?>
                      <tag class="tag is-coral"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $release['like'] ?></span></tag>
                      <tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $release['dislike'] ?></span></tag>
                    <?php elseif ( session ( 'dislikes' ) != null && in_array ( $release['id'], session ( 'dislikes') ) ): ?>
                      <tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $release['like'] ?></span></tag>
                      <tag class="tag is-coral ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $release['dislike'] ?></span></tag>
                    <?php else: ?>
                      <a href="<?= base_url ( '/games/like/'.$release['id'] ) ?>"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $release['like'] ?></span></tag></a>
                      <a href="<?= base_url ( '/games/dislike/'.$release['id'] ) ?>"><tag class="tag is-info ml-1"><span class="icon"><i class="fas fa-thumbs-down"></i></span> <span><?= $release['dislike'] ?></span></tag></a>
                    <?php endif; ?>
                  </span>
                </div>
              </figure>
            </div>
            <div class="card-content is-hidden-mobile">
              <p class="title is-5"><span class="icon-text"><a href="<?= base_url('/game/'.$release['slug']) ?>"><?php if ( $release['rumor'] == 1 ): ?><span class="icon has-text-coral"><i class="fas fa-exclamation"></i></span><?php endif; ?> <span><?= $release['name'] ?></span></a></span></p>
              <p class="subtitle is-7">Dev <a href="<?= base_url('/developer/'.$release['dev_slug']) ?>"><?= $release['dev_name'] ?></a> | Pub <a href="<?= base_url('/publisher/'.$release['pub_slug']) ?>"><?= $release['pub_name'] ?></a> | Rel <?= date('d-m-Y', strtotime($release['release'])) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="columns">
      <div class="column is-2 is-offset-10">
        <a href="<?= base_url('/games/coming') ?>"><button class="button is-info">See Coming Games</button></a>
      </div>
    </div>
  </div>
</article>
