<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column is-full">
				<div class="card">
					<div class="card-content">
						<div class="content">
							<p class="subtitle is-5">Developer:</p>
							<p class="title is-3"><?= $developer['dName'] ?></p>
							<p class="subtitle is-5">
								<?php if (isset ($developer['dWebsite'])): ?>
									<span class="icon"><a href="<?= $developer['dWebsite'] ?>" target="_blank"><i class="fas fa-sign-out-alt"></i></a></span>&nbsp;
								<?php endif; ?>
								<?php if ( session('role') == 1): ?>
									<span class="icon"><a href="<?= base_url() ?>/developers/edit/<?= $developer['dSlug'] ?>"><i class="far fa-edit"></i></a></span>
								<?php endif; ?>
							</p>
							<p><?= $developer['dAbout'] ?></p>
						</div>
					</div>
					<?= view_cell( '\App\Controllers\Developers::publishersbydeveloper', 'developerid='.$developer['dId'] ) ?>
				</div>
			</div>
		</div>
	</div>
</section>
