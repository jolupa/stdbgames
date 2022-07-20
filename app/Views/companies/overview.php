<section class="hero is-small has-background is-grey-darker">
  <img class="hero-background is-transparent" src="<?= base_url ('/assets/images/games/'.implode (',',$image).'.jpeg') ?>" />
  <div class="hero-body">
    <div class="container is-max-widescreen">
      <h1 class="title">
        <?= $company ['name'] ?>
      </h1>
      <h2 class="subtitle">
        <span class="icon-text">
          <?php if (!empty ($company ['url'])): ?>
            <span class="icon">
              <a href="<?= $company ['url'] ?>" target="_blank"><i class="fa-brands fa-chrome"></i></a>
            </span>
          <?php endif; ?>
          <?php if (!empty ($company ['url']) && !empty ($company ['twitter_account'])): ?>
            <span> | </span>
          <?php endif; ?>
          <?php if (!empty ($company ['twitter_account'])): ?>
            <span class="icon">
              <a href="<?= $company ['twitter_account'] ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
            </span>
          <?php endif; ?>
        </span>
      </h2>
    </div>
  </div>
</section>

<section class="section">
  <div class="container is-max-widescreen">
    <div class="columns">
      <div class="column is-full">
        <div class="content">
          <?= $company ['about'] ?>
        </div>
        <?= view_cell ('\App\Controllers\Companies::developedgames', 'developer_id='.$company ['id']) ?>
        <?= view_cell ('\App\Controllers\Companies::publishedgames', 'publisher_id='.$company ['id']) ?>
        <?= view_cell ('\App\Controllers\Companies::futuregames', 'company_id='.$company ['id']) ?>
      </div>
    </div>
  </div>
</section>
