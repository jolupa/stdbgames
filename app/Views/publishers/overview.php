<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column is-full">
				<div class="card">
					<div class="card-content">
						<div class="content">
							<p class="subtitle is-5">Publisher:</p>
							<p class="title is-3"><?= $publisher['pName'] ?></p>
							<p class="subtitle is-5">
								<?php if (isset ($publisher['pWebsite'])): ?>
									<span class="icon"><a href="<?= $publisher['pWebsite'] ?>" target="_blank"><i class="fas fa-sign-out-alt"></i></a></span>&nbsp;
								<?php endif; ?>
								<?php if ( session('role') == 1): ?>
									<span class="icon"><a href="<?= base_url() ?>/publishers/edit/<?= $publisher['pSlug'] ?>"><i class="far fa-edit"></i></a></span>
								<?php endif; ?>
							</p>
						</div>
					</div>
					<?= view_cell( '\App\Controllers\Publishers::developersbypublisher', 'publisherid='.$publisher['pId'] ) ?>
				</div>
			</div>
		</div>
	</div>
</section>
