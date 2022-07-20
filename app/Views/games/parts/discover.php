<section class="section">
		<div class="container is-max-widescreen">
			<h1 class="title">Discover Games:</h1>
			<div class="columns">
				<?php foreach ($discover as $discover): ?>
					<div class="column is-half">
						<div class="card is-equal">
							<div class="card-image">
								<figure class="image is-5by3">
									<image src="<?= base_url ( '/assets/images/games/'.$discover['image'].'.jpeg' ) ?>">
								</figure>
							</div>
							<div class="card-content">
								<?php if ($discover['rumor'] == 1): ?>
									<p class="help">
										[RUMOR]
									</p>
								<?php endif; ?>
								<h3 class="title is-4">
									<a href="<?= base_url ('/game/'.$discover['slug']) ?>"><?= $discover['name'] ?></a>
								</h3>
								<?= view_cell ('\App\Controllers\Companies::devpubgame', 'dev_id='.$discover['developer_id'].' pub_id='.$discover['publisher_id']) ?>
								<p>
									<span class="icon-text">
										<span class="icon"><i class="fa-solid fa-face-smile"></i></span><span><?= $discover['like'] ?> /</span><span class="icon"><i class="fa-solid fa-face-frown"></i></span><span><?= $discover['dislike'] ?></span>
									</span>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
