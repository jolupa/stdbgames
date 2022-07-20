<section class="section">
		<div class="container is-max-widescreen">
			<h1 class="title">
				Our Last Interview:
			</h1>
			<div class="columns">
				<div class="column is-12">
					<div class="card is-equal is-shadowless">
						<div class="card-image">
							<figure class="image is-16by9">
								<img src="<?= base_url ('/assets/images/games/'.$interviews [0]['image'].'.jpeg') ?>">
							</figure>
						</div>
						<div class="card-content">
							<h3 class="title is-4">
								<a href="<?= base_url ('/game/'.$interviews [0]['slug']).'#interview' ?>"><?= $interviews [0]['name'] ?> Developers Interview</a>
							</h3>
						</div>
					</div>
				</div>
			</div>
			<h2 class="title is-4">
				Other Interviews:
			</h2>
			<?php
			$i = 1;
			$total = count ($interviews);
			?>
			<div class="columns is-multiline is-mobile">
				<?php while ($i < $total): ?>
					<div class="column is-6-mobile is-3-desktop">
						<div class="card is-equal">
							<div class="card-image">
								<figure class="image is-5by3">
									<img src="<?= base_url ('/assets/images/games/'.$interviews [$i]['image'].'.jpeg') ?>">
								</figure>
							</div>
							<div class="card-content">
								<h5 class="title is-5">
									<a href="<?= base_url ('/game/'.$interviews [$i]['slug'].'#interview') ?>"><?= $interviews [$i]['name'] ?> Developers Interview</a>
								</h5>
							</div>
						</div>
					</div>
				<?php $i++; endwhile; ?>
			</div>
		</div>
	</section>
