<div class="columns">
	<div class="column">
		<p class="subtitle is-5">Price</p>
		<p class="title is-3">History:</p>
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
				<td><?= number_format($game['gReleaseprice'], 2) ?></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<thead>
				<th>Price</th>
				<th>Date Discounted</th>
				<th>Type of Discount</th>
				<th></th>
			</thead>
			<?php if(!$price): ?>
				<tr>
					<td colspan="4" class="has-text-centered">No History Price at this moment</td>
				</tr>
			<?php else: ?>
				<?php foreach($price as $price): ?>
					<tr <?php if($price['pDiscounttype'] == 1): ?>class="has-background-light"<?php endif; ?>>
						<td><?= number_format($price['pPrice'], 2) ?></td>
						<td><?= $price['pDate'] ?></td>
						<td><?php if($price['pDiscounttype'] == 0): ?>Normal<?php else: ?>Pro<?php endif; ?></td>
							<td><?php if(session('role') == 1): ?><a title="Delete Discount" href="<?= base_url() ?>/prices/deleteprice/<?= 	$price['pId'] ?>"><span class="icon"><i class="fas fa-trash-alt"></i></span></a><?php endif; ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</table>
		</div>
	</div>
<?php if(session('role') == 1): ?>
	<?= view_cell('App\Controllers\Prices::price') ?>
<?php endif; ?>
