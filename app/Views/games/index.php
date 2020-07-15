<div class="columns mt-2">
  <div class="column">
    <p class="subtitle is-5">Pro</p>
    <p class="title is-3">Games:</p>
  </div>
</div>
<div class="columns is-multiline">
  <?php foreach($pro as $pro): ?>
    <div class="column is-one-quarter">
      <div class="media">
        <figure class="media-left">
          <p class="image is-64x64">
            <img title="<?= $pro['name'] ?>" src="<?= base_url() ?>/images/<?= $pro['image'] ?>-thumb.jpeg">
          </p>
        </figure>
        <div class="media-content">
          <p class="title is-5"><a href="<?= base_url() ?>/game/<?= $pro['slug'] ?>"><?= character_limiter($pro['name'], 15, '...') ?></a></p>
          <p class="subtitle is-7">Developer <?= $pro['developer_name'] ?> / Publisher <?= $pro['publisher_name'] ?><br>
            <?= $pro['release'] ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?= view_cell('App\Controllers\Search::searchform') ?>
<div class="columns has-background-light mt-2">
  <div class="column">
    <div class="columns">
      <div class="column">
        <p class="subtile is-5">Games</p>
        <p class="title is-3">Launched:</p>
      </div>
    </div>
    <div class="columns is-multiline">
      <?php foreach($launched as $launched): ?>
        <div class="column is-one-quarter">
          <div class="media">
            <figure class="media-left">
              <p class="image is-64x64">
                <img title="<?= $launched['name'] ?>" src="<?= base_url() ?>/images/<?= $launched['image'] ?>-thumb.jpeg">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><a href="<?= base_url() ?>/game/<?= $launched['slug'] ?>"><?= character_limiter($launched['name'], 15, '...') ?></a></p>
              <p class="subtitle is-7">Developer <?= $launched['developer_name'] ?> / Publisher <?= $launched['publisher_name'] ?><br>
                <?= $launched['release'] ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="columns is-centered">
      <div class="column has-text-centered">
        <a href="<?= base_url() ?>/list/launched"><button class="button is-warning is-small">See All!</button></a>
      </div>
    </div>
  </div>
</div>
<div class="columns mt-2">
  <div class="column">
    <div class="columns">
      <div class="column">
        <p class="subtile is-5">Coming</p>
        <p class="title is-3">Soon:</p>
      </div>
    </div>
    <div class="columns is-multiline">
      <?php foreach($soon as $soon): ?>
        <div class="column is-one-quarter">
          <div class="media">
            <figure class="media-left">
              <p class="image is-64x64">
                <img title="<?= $soon['name'] ?>" src="<?= base_url() ?>/images/<?= $soon['image'] ?>-thumb.jpeg">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><a href="<?= base_url() ?>/game/<?= $soon['slug'] ?>"><?= character_limiter($soon['name'], 15, '...') ?></a></p>
              <p class="subtitle is-7">Developer <?= $soon['developer_name'] ?> / Publisher <?= $soon['publisher_name'] ?><br>
                <?php if($soon['release'] == '2099-01-01' || $soon['release'] == 'TBA'): ?>
                  TBA
                <?php else: ?>
                  <?= $soon['release'] ?>
                <?php endif; ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="columns is-centered">
      <div class="column has-text-centered">
        <a href="<?= base_url() ?>/list/soon"><button class="button is-warning is-small">See All!</button></a>
      </div>
    </div>
  </div>
</div>
<div class="columns has-background-light mt-2">
  <div class="column">
    <div class="columns">
      <div class="column">
        <p class="subtile is-5">Lasts Games</p>
        <p class="title is-3">Added/Updated:</p>
      </div>
    </div>
    <div class="columns is-multiline">
      <?php foreach($last as $last): ?>
        <div class="column is-one-quarter">
          <div class="media">
            <figure class="media-left">
              <p class="image is-64x64">
                <img title="<?= $last['name'] ?>" src="<?= base_url() ?>/images/<?= $last['image'] ?>-thumb.jpeg">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><a href="<?= base_url() ?>/game/<?= $last['slug'] ?>"><?= character_limiter($last['name'], 15, '...') ?></a></p>
              <p class="subtitle is-7">Developer <?= $last['developer_name'] ?> / Publisher <?= $last['publisher_name'] ?><br>
                <?php if($last['release'] == '2099-01-01' || $last['release'] == 'TBA'): ?>
                  TBA
                <?php else: ?>
                  <?= $last['release'] ?>
                <?php endif; ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<div class="columns my-2">
  <div class="column is-half">
    <?= view_cell('App\Controllers\Reviews::latestreviews') ?>
  </div>
  <div class="column is-half">
    <?= view_cell('App\Controllers\Reviews::chart') ?>
  </div>
</div>
