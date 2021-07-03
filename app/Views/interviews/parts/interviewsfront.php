<article id="interviews" class="container mt-5">
  <div class="mx-3">
    <div class="columns is-mobile">
      <div class="column is-narrow">
        <p class="title is-4">Our small interviews</p>
      </div>
      <div class="column has-text-right">
        <a href="<?= base_url ( '/interviews/list') ?>"><button class="button is-info">More...</button></a>
      </div>
    </div>
    <div class="columns is-multiline is-mobile">
      <?php foreach ($interviewslist as $list): ?>
        <div class="column is-one-quarter-desktop is-half-mobile">
          <div class="card is-shadowless">
            <div class="card-image">
              <figure class="image is-3by2">
                <a href="<?= base_url ( '/game/'.$list['slug'].'#small_interview' ) ?>"><img src="<?= base_url('/img/games/'.$list['image'].'.jpeg') ?>" title="<?= $list['name'] ?>"></a>
              </figure>
            </div>
            <div class="card-content is-hidden-mobile">
              <p class="title is-5">Interview with <a href="<?= base_url('/game/'.$list['slug'].'#small_interview') ?>"><?= $list['dev_name'] ?></a></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</article>
