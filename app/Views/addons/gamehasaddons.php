<div class="columns">
	<div class="column">
		<p class="subtitle is-5">Addons Avalaible</p>
		<p class="title is-3">for this Game:</p>
	</div>
</div>
<div class="columns is-multiline">
	<?php if(!$gamehasaddons): ?>
		<div class="column is-3">
			<div class="media">
				<div class="media-left">
					<figure class="image is-256x256">
						<img title="This Game has no addons at the momment" src="<?= base_url() ?>/images/avatar/avatar01.jpeg">
					</figure>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="column is-full-width">
			<table class="is-fullwitdth is-hoverable">
				<thead>
					<th>Addon Name</th>
					<th>Release Date</th>
					<th>Release Price</th>
					<th></th>
				</thead>
				<?php foreach($gamehasaddons as $gamehasaddons): ?>
					<tr>
						<td><strong><?= $gamehasaddons['aName'] ?></strong></td>
						<td><?= $gamehasaddons['aRelease'] ?></td>
						<td><?php if(!$gamehasaddons['aReleaseprice']): ?><strong>No Price</strong><?php else: ?><?= number_format($gamehasaddons['aReleaseprice'], 2) ?><?php endif; ?></td>
						<td><?php if(session('role') == 1): ?><a title="Delete Addon" href="<?= base_url() ?>/addons/deleteaddon/<?= $gamehasaddons['aId'] ?>"><span class="icon"><i class="fas fa-trash-alt"></i></span></a>&nbsp;<a title="Edit Addon" href="<?= base_url() ?>/addons/update/<?= $gamehasaddons['aSlug'] ?>"><span class="icon"><i class="fas fa-edit"></i></span></a><?php endif; ?></td>
					</tr>

				<?php endforeach; ?>
			</table>
		</div>
	<?php endif; ?>
</div>
