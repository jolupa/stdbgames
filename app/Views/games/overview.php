<section class="hero is-large has-background is-grey-darker">
  <img class="hero-background is-transparent" src="<?= base_url ( '/assets/images/games/'.$game['image'].'.jpeg') ?>" />
  <div class="hero-body">
    <div class="container is-max-widescreen">
      <?php if ( $game ['rumor'] == 1 ): ?>
        <p class="help">
          <a href="<?= base_url ('/game/rumors') ?>">[RUMOR]</a>
        </p>
      <?php endif; ?>
      <h1 class="title">
        <?= $game['name'] ?>
      </h1>
      <h2 class="subtitle">
        <span class="icon-text">
          <?php if ( $game ['dropped'] == 0 ): ?>
            <?php if (!empty ($game ['appid'] || !empty ($game ['preorder_appid'] ) ) ): ?>
              <?php if (!empty ($game ['appid'] ) ): ?>
                <span class="icon"><a href="https://stadia.google.com/store/details/<?= $game['appid'] ?>/sku/<?= $game['sku'] ?>" target="_blank" title="Go To Stadia Store"><i class="fa-solid fa-shop"></i></a></span>
              <?php else: ?>
                <span class="icon"><a href="https://stadia.google.com/store/details/<?= $game['preorder_appid'] ?>/sku/<?= $game['preorder_sku'] ?>" target="_blank" title="Pre Order Game"><i class="fa-solid fa-shop"></i></a></span>
              <?php endif; ?>
            <?php endif; ?>
            <?php if (!empty ($game ['appid'] ) ): ?>
              <span class="icon"><a href="https://stadia.google.com/player/<?= $game['appid'] ?>" target="_blank" title="Play On Stadia"><i class="fa-solid fa-gamepad"></i></a></span>
            <?php endif; ?>
            <?php if (!empty ($game ['demo_appid'] ) ): ?>
              <span class="icon"><a href="https://stadia.google.com/player/<?= $game['demo_appid'] ?>" target="_blank" title="Try The Game On Stadia"><i class="fa-solid fa-chess"></i></a></span>
            <?php endif; ?>
          <?php endif; ?>
        </span>
      </h2>
      <?= view_cell ('App\Controllers\Companies::devpubgame', 'dev_id='.$game ['developer_id'].' pub_id='.$game ['publisher_id']) ?>
      <p>Release:
        <?php if ( empty ($game ['release_day']) && empty ($game ['release_month']) && empty ($game ['release_year']) ): ?>
          <strong>TBA</strong>
        <?php else: ?>
          <strong>
            <?php if (!empty ($game ['release_year']) && empty ($game ['release_month']) && empty ($game ['release_day'])): ?>
              <?= $game ['release_year'] ?>
            <?php elseif (!empty ($game ['release_month']) && !empty ($game ['release_month']) && empty ($game ['release_day'])): ?>
              <?= $game ['release_month'] ?>-<?= $game ['release_year'] ?>
            <?php else: ?>
              <?= $game ['release_day'] ?>-<?= $game ['release_month'] ?>-<?= $game ['release_year'] ?>
            <?php endif; ?>
          </strong>
        <?php endif; ?>
      </p>
      <?= view_cell ( 'App\Controllers\Prices::dealongame', 'id='.$game['id'] ) ?>
      <p>
        <span class="icon-text">
          <?= view_cell ('App\Controllers\Games::likes', 'game_id='.$game ['id']) ?>
          <?php if (session ('logged') == true ): ?>
            <?= view_cell ('App\Controllers\Libraries:checkLibrary', 'game_id='.$game ['id']) ?>
          <?php endif; ?>
        </span>
      </p>
    </div>
  </div>
</section>

<section class="section">
  <div class="container is-max-widescreen">
		<div class="columns">
			<div class="column is-4-desktop">
				<div class="content">
					<h1 class="title">
						Stadia Features:
					</h1>
					<h2 class="subtitle is-6">
						<?= $game ['features'] ?>
            <?php if ($game ['pro'] == 0 && !empty ($game ['pro_till'])): ?>
              <?php if (!empty ($game ['features'])): ?>, <?php endif; ?><abbr title="From <?= date ('d-m-Y', strtotime ($game ['pro_from'])) ?> To <?= date ('d-m-Y', strtotime ($game ['pro_till'])) ?>">Was Pro</abbr>
            <?php endif; ?>
		      </h2>
					<h1 class="title">
						Genres:
					</h1>
					<h2 class="subtitle is-6">
						<?= $game ['genres'] ?>
					</h2>
				</div>
			</div>
			<div class="column is-8-desktop">
				<div class="content">
					<h1 class="title">
						About The Game:
					</h1>
					<?= $game['about'] ?>
				</div>
        <?= view_cell ('App\Controllers\Games::gameeditions', 'edition_game_id='.$game ['id']) ?>
				<?= view_cell ('App\Controllers\Gallery::galleryitems', 'id='. $game ['id']) ?>
				<?= view_cell ('App\Controllers\Reviews::gamereviews', 'id='.$game ['id'].' release_day='.$game ['release_day'].' release_month='.$game ['release_month'].' release_year='.$game ['release_year']) ?>
        <?= view_cell ('App\Controllers\Interviews::gameinterview', 'id='.$game ['id']) ?>
				<?= view_cell ('App\Controllers\Prices::historyprices', 'id='.$game ['id']) ?>
				<?= view_cell ('App\Controllers\Games::samedayreleases', 'id='.$game ['id'].' release_day='.$game ['release_day'].' release_month='.$game ['release_month'].' release_year='.$game ['release_year']) ?>
			</div>
		</div>
	</div>
</section>
