<section class="section">
  <div class="container">
  <?php if ( count ($results) > 0 ): ?>
    <div class="columns">
      <div class="column is-full">
        <p class="subtitle is-5">You searched for:</p>
        <p class="title is is-3"><?= $query ?></p>
        <p class="subtitle is-5">Your search produced <strong><?= count($results) ?></strong> <?php if (count($results) == 1): ?>result<?php else: ?>results<?php endif; ?>:</p>
      </div>
    </div>
    <div class="columns is-multiline">
      <?php foreach ($results as $results): ?>
        <div class="column is-one-quarter">
          <div class="media">
            <figure class="media-left">
              <p class="image is-64x64">
                <img src="<?= base_url() ?>/images/<?= $results['Image'] ?>-thumb">
              </p>
            </figure>
            <div class="media-content">
              <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $results['Slug'] ?>"><?= $results['Name'] ?></a></p>
              <p class="subtitle is-7">Release Date: <strong><?= $results['Release'] ?></strong></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="columns">
      <div class="column is-full">
        <p class="subtitle is-5">You searched for:</p>
        <p class="title is-3"><?= $query ?></p>
        <p class="subtitle is-5">But we found nothing on the database... But, hey! you can try again...</p>
      </div>
    </div>
    <div class="columns is-centered">
      <div class="column is-three-quarters">
        <form action="<?= base_url() ?>/search/searchresult" method="post">
          <div class="field has-addons has-addons-right ">
            <div class="control">
              <button class="button is-static">Games</button>
            </div>
            <div class="control is-expanded">
              <input class="input" name="query">
            </div>
            <div class="control">
              <button class="button is-primary" name="submit">Search!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  <?php endif; ?>
  </div>
</section>
