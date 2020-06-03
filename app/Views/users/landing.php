<section class="section">
	<div class="container">
		<div class="columns is-centered">
			<div class="column is-full-width">
				<div class="media">
					<figure class="media-left">
						<p class="image is-128x128">
							<img title="<?= $user['uName'] ?>" src="<?= base_url() ?>/images/avatar/<?php if(file_exists(ROOTPATH.'/public/images/avatar/'.$user['uImage'].'.jpeg') === TRUE): ?><?= $user['uImage'] ?>.jpeg<?php else: ?>avatar01.jpeg<?php endif; ?>">
						</p>
					</figure>
					<div class="media-content">
						<p class="title is-4"><strong><?= $user['uName'] ?></strong> <?php if($user['uRole'] == 1): ?><span class="tag is-danger has-text-white">STAFF MEMBER</span><?php elseif($user['uRole'] == 2): ?><span class="tag is-danger has-text-white">MEDIA MEMBER</span><?php endif; ?></p>
						<p class="subtitle is-7">E-mail: <?= $user['uMail'] ?><br>
							Birthday: <?= $user['uBirthdate'] ?><br>
							Member since: <?= $user['uRegistrydate'] ?>
						</p>
						<p>
							<a href="<?= base_url() ?>/users/edit/<?= $user['uSlug'] ?>"><button class="button is-primary has-text-datk is-small">Edit Profile</button></a>
						</p>
					</div>
				</div>
				<hr>
        <?= view_cell('App\Controllers\Libraries::libraryuser', 'userid='.$user['uId']) ?>
				<hr>
				<?= view_cell('App\Controllers\Wishlists::wishlistuser', 'userid='.$user['uId']) ?>
				<hr>
				<?= view_cell('App\Controllers\Reviews::votesbyuser', 'userid='.$user['uId']) ?>
				<hr>
				<?php if(session('role') == 1): ?>
					<?= view_cell('App\Controllers\Users::listusers') ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
