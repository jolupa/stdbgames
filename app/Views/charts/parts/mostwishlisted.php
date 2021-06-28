<div class="columns is-multiline-is-mobile">
  <?php foreach ( $mostwishlisted as $mostwishlisted ): ?>
    <div class="column is-one-third">
      <div class="card is-shadowless">
        <div class="card-image">
          <figure class="image is-16by9">
            <a href="<?= base_url ( '/game/'.$mostwishlisted['slug'] ) ?>"><img src="<?= base_url ( '/img/games/'.$mostwishlisted['image'].'.jpeg' ) ?>"></a>
          </figure>
        </div>
        <div class="card-content">
          <p class="title is-5">Wishlisted By <?= $mostwishlisted['total'] ?> Users</p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
