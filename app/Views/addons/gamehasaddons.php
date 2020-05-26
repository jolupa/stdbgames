<div class="columns">
	<div class="column">
		<p class="subtitle is-5">Addons Avalaible</p>
		<p class="title is-3"><a id="Addons">#</a>for this Game:</p>
	</div>
</div>
<div class="columns is-multiline">
	<div class="column is-full-width">
		<table class="is-fullwitdth is-hoverable">
			<thead>
				<th>Addon Name</th>
				<th>Release Date</th>
				<th>Release Price</th>
				<th></th>
			</thead>
			<?php if(!$gamehasaddons): ?>
				<tr>
					<td colspan="4" class="has-text-centered">No addons yet on the DB!</td>
				</tr>
			<?php else: ?>
				<?php foreach($gamehasaddons as $gamehasaddons): ?>
					<tr>
						<td><?php if($gamehasaddons['aSku']): ?><a href="https://stadia.google.com/store/details/<?= $gamehasaddons['aAppid'] ?>/sku/<?= $gamehasaddons['aSku'] ?>" title="View in Store" target="_blank"><button class="button is-small is-danger has-text-white">In Store</button></a><?php endif; ?>&nbsp;<strong><?= $gamehasaddons['aName'] ?></strong></td>
						<td><?= $gamehasaddons['aRelease'] ?></td>
						<td><?php if($gamehasaddons['aReleaseprice']): ?><?= number_format($gamehasaddons['aReleaseprice'], 2) ?><?php else: ?><strong>No Info</strong><?php endif; ?></td>
						<td><?php if(session('role') == 1): ?><a title="Delete Addon" href="<?= base_url() ?>/addons/deleteaddon/<?= $gamehasaddons['aId'] ?>"><span class="icon"><i class="fas fa-trash-alt"></i></span></a>&nbsp;<a title="Edit Addon" href="<?= base_url() ?>/addons/update/<?= $gamehasaddons['aSlug'] ?>"><span class="icon"><i class="fas fa-edit"></i></span></a><?php endif; ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			<?php if(session('role') == 1): ?>
				<tr>
					<td colspan="3"></td>
					<td class="has-text-centered"><a title="Add Addon to DB! for <?= $game['gName'] ?>" href="<?= base_url() ?>/addons/insert"><span class="icon"><i class="fas fa-plus"></i></span></a></td>
				</tr>
			<?php endif; ?>
		</table>
	</div>
</div>
