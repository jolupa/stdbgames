<section class="section">
	<div class="container">
		<div class="columns is-centered">
			<div class="column is-full-width">
				<div class="media">
					<figure class="media-left">
						<p class="image is-128x128">
							<img title="<?= $user['uName'] ?>" src="<?= base_url() ?>/images/avatar/<?php if ( file_exists(ROOTPATH.'/public/images/avatar/'.$user['uImage'])): ?><?= $user['uImage'] ?><?php else: ?>avatar01<?php endif; ?>">
						</p>
					</figure>
					<div class="media-content">
						<p class="title is-4"><strong><?= $user['uName'] ?></strong></p>
						<p class="subtitle is-7">E-mail: <?= $user['uMail'] ?><br>
							Birthday: <?= $user['uBirthdate'] ?><br>
							Member since: <?= $user['uRegistrydate'] ?>
						</p>
						<p>
							<a href="<?= base_url() ?>/users/edit/<?= $user['uName'] ?>"><span class="tag is-primary"><span class="heading">Edit Profile</span></span></a>
						</p>
					</div>
				</div>
        <?= view_cell('App\Controllers\Libraries::libraryuser', 'userid='.$user['uId']) ?>
				<?= view_cell('App\Controllers\Votes::votesbyuser', 'userid='.$user['uId']) ?>
				<?= view_cell('App\Controllers\Users::listusers') ?>
			</div>
		</div>
	</div>
</section>
