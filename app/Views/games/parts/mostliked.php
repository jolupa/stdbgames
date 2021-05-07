<article id="mostliked" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Most liked games</p>
    <div class="columns is-multilinne">
      <?php foreach ($mostliked as $liked): ?>
        <div class="column is-2 is-full-mobile">
          <div class="card">
            <div class="card-image">
              <figure class="image is-3by2">
                <a href="<?= base_url('/games/'.$liked['slug']) ?>"><img src="<?= base_url('/img/games/'.$liked['image'].'.jpeg') ?>" title="<?= $liked['name'] ?>"></a>
              </figure>
              <div class="is-overlay" style="left: auto; top: auto; right: 10px; bottom: 10px;">
                <span class="icon-text"><tag class="tag is-info"><span class="icon"><i class="fas fa-thumbs-up"></i></span> <span><?= $liked['total'] ?></span></tag></span>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</article>
