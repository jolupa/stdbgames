<article id="interviews" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Our small interviews</p>
    <div class="columns is-multiline is-inline-flex-mobile">
      <?php foreach ($interviewslist as $list): ?>
        <div class="column is-one-quarter is-half-mobile">
          <div class="card is-shadowless">
            <div class="card-image">
              <figure class="image is-3by2">
                <img src="<?= base_url('/img/games/'.$list['image'].'.jpeg') ?>" title="<?= $list['name'] ?>">
              </figure>
            </div>
            <div class="card-content">
              <p class="title is-5">Interview with <a href="<?= base_url('/games/'.$list['slug'].'#small_interview') ?>"><?= $list['dev_name'] ?></a></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="columns">
      <div class="column is-2 is-offset-10">
        <a href="<?= base_url ( '/interviews/list') ?>"><button class="button is-info">See all Interviews</button></a>
      </div>
    </div>
  </div>
</article>
