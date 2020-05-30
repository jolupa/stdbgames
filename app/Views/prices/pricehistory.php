<div class="columns">
	<div class="column">
		<p class="subtitle is-5">Price</p>
		<p class="title is-3"><a href="History">#</a>History:</p>
	</div>
</div>
<div class="columns is-multiline">
	<div class="column is-full-width">
		<table class="table is-full-width">
			<thead>
				<th>Release Price</th>
				<th></th>
				<th></th>
				<th></th>
			</thead>
			<tr>
				<td><?php if(!$game['gReleaseprice']): ?>No info<?php else: ?><?= number_format($game['gReleaseprice'], 2) ?><?php endif; ?></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php if(date('Y-m-d') > $game['gRelease'] || $game['gRelease'] !== 'TBA'): ?>
				<thead>
					<th>Price</th>
					<th>Date Discounted</th>
					<th>Discount is Valid</th>
					<th>Type of Discount</th>
					<th></th>
				</thead>
				<?php if(!$price): ?>
					<tr>
						<td colspan="5" class="has-text-centered">No History Price at this moment</td>
					</tr>
				<?php else: ?>
					<?php foreach($price as $price): ?>
						<tr <?php if($price['pDiscounttype'] == 1): ?>class="has-background-light"<?php endif; ?>>
							<td><?= number_format($price['pPrice'], 2) ?></td>
							<td><?= $price['pDate'] ?></td>
							<td><?= $price['pDatetill'] ?></td>
							<td><?php if($price['pDiscounttype'] == 0): ?>Normal<?php else: ?>Pro<?php endif; ?></td>
							<td><?php if(session('role') == 1): ?><a title="Delete Discount" href="<?= base_url() ?>/prices/deleteprice/<?= 	$price['pId'] ?>"><span class="icon"><i class="fas fa-trash-alt"></i></span></a><?php endif; ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endif; ?>
		</table>
	</div>
</div>
<?php if(session('role') == 1): ?>
	<?= view_cell('App\Controllers\Prices::price') ?>
<?php endif; ?>
