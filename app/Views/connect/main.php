<div class="columns my-2">
  <div class="column has-text-centered">
    <figure class="image is-16x9">
      <img src="<?= base_url() ?>/assets/stadia_connect.png" title="Google Stadia Connnect">
    </figure>
  </div>
</div>
<div class="columns my-2 is-centered">
  <div class="column is-10 has-text-centered is-full-width">
    <div class="content is-full-width">
      <p>Here you will find all the games presented during the Stadia Connect hosted on 2020-07-14. Hope you enjoy the event and hope we have a plenty of new games announced.</p>
    </div>
  </div>
</div>
<div class="columns is-multiline">
  <?php foreach($presented as $presented): ?>
    <div class="column is-one-quarter">
      <div class="media">
        <figure class="media-left">
          <p class="image is-64x64">
            <img title="<?= $presented['name'] ?>" src="<?= base_url() ?>/images/<?= $presented['image'] ?>-thumb.jpeg">
          </p>
        </figure>
        <div class="media-content">
          <p class="title is-5"><a href="<?= base_url() ?>/game/<?= $presented['slug'] ?>"><?= character_limiter($presented['name'], 15, '...') ?></a></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
