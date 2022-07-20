<div class="content mt-5">
  <h1 class="title">
    Same day Releases:
  </h1>
</div>
<div class="columns is-mobile is-multiline">
  <?php foreach ($sameday as $sameday): ?>
    <div class="column is-half-mobile is-3-desktop">
      <div class="card is-equal">
        <div class="card-image">
          <figure class="image is-5by3">
            <img src="<?= base_url ('/assets/images/games/'.$sameday ['image'].'.jpeg') ?>">
          </figure>
        </div>
        <div class="card-content">
          <h1 class="title is-5">
            <a href="<?= base_url ('/game/'.$sameday ['slug']) ?>"><?= $sameday ['name'] ?></a>
          </h1>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
