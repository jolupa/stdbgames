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
            <img title="<?= $pro['name'] ?>" src="<?= base_url() ?>/images/<?= $pro['image'] ?>-thumb.jpeg" alt="<?= $pro['name'] ?>">
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
        <p class="subtitle is-5">This month</p>
        <p class="title is-3">Releases:</p>
      </div>
    </div>
    <div class="columns is-multiline">
      <?php foreach($month as $month): ?>
        <div class="column is-one-quarter">
          <div class="media">
            <figure class="media-left">
              <p class="image is-64x64">
                <img title="<?= $month['name'] ?>" src="<?= base_url() ?>/images/<?= $month['image'] ?>-thumb.jpeg" alt="<?= $month['name'] ?>">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><a href="<?= base_url() ?>/game/<?= $month['slug'] ?>"><?= character_limiter($month['name'], 15, '...') ?></a></p>
              <p class="subtitle is-7">Developer <?= $month['developer_name'] ?> / Publisher <?= $month['publisher_name'] ?><br>
                <?= $month['release'] ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="columns is-centered">
      <div class="column has-text-centered">
        <a class="button is-warning is-small" style="border: none;" href="<?= base_url() ?>/list/launched">See All Games Launched!</a>
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
                <img title="<?= $soon['name'] ?>" src="<?= base_url() ?>/images/<?= $soon['image'] ?>-thumb.jpeg" alt="<?= $soon['name'] ?>">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><?php if($soon['rumor'] == 1): ?><span class="icon has-text-danger" title="RUMOR!"><i class="fas fa-exclamation-triangle"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $soon['slug'] ?>"><?= character_limiter($soon['name'], 15, '...') ?></a></p>
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
        <a class="button is-warning is-small" style="border: none;" href="<?= base_url() ?>/list/soon">See All Games Coming!</a>
      </div>
    </div>
  </div>
</div>

<?= view_cell('App\Controllers\Interviews::interviewlist') ?>
<div class="columns mt-2">
  <div class="column">
    <div class="columns">
      <div class="column">
        <p class="subtile is-5">Latest Games</p>
        <p class="title is-3">Added:</p>
      </div>
    </div>
    <div class="columns is-multiline">
      <?php foreach($last as $last): ?>
        <div class="column is-one-quarter">
          <div class="media">
            <figure class="media-left">
              <p class="image is-64x64">
                <img title="<?= $last['name'] ?>" src="<?= base_url() ?>/images/<?= $last['image'] ?>-thumb.jpeg" alt="<?= $last['name'] ?>">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><?php if($last['rumor'] == 1): ?><span class="icon has-text-danger" title="RUMOR!"><i class="fas fa-exclamation-triangle"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $last['slug'] ?>"><?= character_limiter($last['name'], 15, '...') ?></a></p>
              <p class="subtitle is-7">Developer <?= $last['developer_name'] ?> / Publisher <?= $last['publisher_name'] ?><br>
                Created: <strong><?= $last['created_at'] ?></strong>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="columns">
      <div class="column">
        <p class="title is-3">Updated:</p>
      </div>
    </div>
    <div class="columns is-multiline">
      <?php foreach($lastupdated as $lastupdated): ?>
        <div class="column is-one-quarter">
          <div class="media">
            <figure class="media-left">
              <p class="image is-64x64">
                <img title="<?= $lastupdated['name'] ?>" src="<?= base_url() ?>/images/<?= $lastupdated['image'] ?>-thumb.jpeg" alt="<?= $lastupdated['name'] ?>">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><?php if($lastupdated['rumor'] == 1): ?><span class="icon has-text-danger" title="RUMOR!"><i class="fas fa-exclamation-triangle"></i></span>&nbsp;<?php endif; ?><a href="<?= base_url() ?>/game/<?= $lastupdated['slug'] ?>"><?= character_limiter($lastupdated['name'], 15, '...') ?></a></p>
              <p class="subtitle is-7">Developer <?= $lastupdated['developer_name'] ?> / Publisher <?= $lastupdated['publisher_name'] ?><br>
                Last update: <strong><?= $lastupdated['updated_at'] ?></strong>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<div class="columns my-2 has-background-light">
  <div class="column">
    <?= view_cell('App\Controllers\Reviews::chart') ?>
  </div>
  <div class="column">
    <?= view_cell('App\Controllers\Reviews::latestreviews') ?>
  </div>
  <div class="column">
    <?= view_cell('App\Controllers\Prices::pricesfrontpage') ?>
  </div>
</div>
