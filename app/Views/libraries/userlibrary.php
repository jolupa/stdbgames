<?php if($library == false): ?>
  <div class="columns">
    <div class="column is-fullwidth">
      <div class="content">
        <p>No Games on your Library. Go to add some games!</p>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="columns is-multiline">
    <div class="column">
      <?php foreach($library as $library): ?>
        <div class="card is-inline-block">
          <div class="card-image">
            <figure class="image is-96x96">
              <a href="<?= base_url() ?>/game/<?= $library['game_slug'] ?>" title="<?= $library['game_name'] ?>"><img src="<?= base_url() ?>/images/<?= $library['game_image'] ?>-thumb.jpeg"></a>
            </figure>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>
