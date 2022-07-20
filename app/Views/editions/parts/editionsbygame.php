<div class="content">
  <h1 class="title">
    Game Editions:
  </h1>
</div>
<div class="columns is-multiline">
  <?php foreach ($editions as $edition): ?>
    <div class="column is-4-desktop">
      <div class="card is-equal">
        <div class="card-image">
          <figure class="image is-5by3">
            <img src="<?= base_url ( '/assets/images/games/'.$edition['image'].'.jpeg' ) ?>">
          </figure>
        </div>
        <div class="card-content">
          <h5 class="title is-5">
            <?= $edition['name'] ?>
          </h5>
          <p>
            Release: <strong><?= date ('d-m-Y', strtotime ($edition ['release'])) ?></strong>
          </p>
          <?= view_cell ('App\Controllers\Prices::dealoneditions', 'id='.$edition ['id']) ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
