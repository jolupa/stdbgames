<p class="title is-4 mt-5">Also released this day</p>
<div class="columns is-multiline is-mobile">
  <?php foreach ( $sameday as $sameday ): ?>
    <div class="column is-2-desktop is-one-third-mobile">
      <div class="card is-shadowless">
        <div class="card-image">
          <figure class="image is-3by2">
            <a href="<?= base_url('/game/'.$sameday['slug']) ?>"><img src="<?= base_url('/img/games/'.$sameday['image'].'-thumb.jpeg') ?>"></a>
          </figure>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
