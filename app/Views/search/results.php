<?php if ($no_search_result == true): ?>
	<section class="section">
		<div class="container is-max-widescreen">
			<div class="columns">
				<div class="column is-full">
					<div class="content">
						<h1 class="title has-text-centered">
							We found nothing...
						</h1>
						<h2 class="subtitle has-text-centered">
							But Here You Have The Most Liked Games On DB!...
						</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?= view_cell ('\App\Controllers\Games::mostliked') ?>
<?php else : ?>
	<section class="section">
		<div class="container is-max-widescreen">
			<div class="columns">
				<div class="column is-full">
					<div class="content">
						<h1 class="title">
							Search Results:
						</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="container is-max-widescreen">
			<div class="columns is-multiline is-mobile">
				<?php foreach ($games as $game): ?>
					<div class="column is-half-mobile is-3-desktop">
		        <div class="card is-equal">
		          <div class="card-image">
		            <figure class="image is-5by3">
		              <img src="<?= base_url ( 'assets/images/games/'.$game ['image'].'.jpeg') ?>">
		            </figure>
		          </div>
		          <div class="card-content">
								<?php if ($game ['rumor'] == 1): ?>
									<p class="help">
										[RUMOR]
									</p>
								<?php endif; ?>
		            <h5 class="title is-5">
		              <a href="<?= base_url ('/game/'.$game ['slug']) ?>"><?= $game ['name'] ?></a>
		            </h5>
		            <p>
		              <span class="icon-text">
		                <span class="icon"><i class="fa-solid fa-face-smile"></i></span><span><?= $game ['like'] ?> /</span><span class="icon"><i class="fa-solid fa-face-frown"></i></span><span><?= $game ['dislike'] ?></span>
		              </span>
		            </p>
		          </div>
		        </div>
		      </div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
