<div class="columns">
	<div class="column">
		<p class="subtitle is-5">Price</p>
		<p class="title is-3">History:</p>
	</div>
</div>
<div class="columns is-multiline">
	<div class="column is-full-width">
		<?php if(!$price): ?>
			<div class="column is-3">
				<div class="media">
					<div class="media-left">
						<figure class="image is-256x256">
							<img title="No price tracking for this title" src="<?= base_url() ?>/images/avatar/avatar01.jpeg">
						</figure>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="column is-full-width">
				<table class="table is-full-width">
					<thead class="has-background-color-info">
							<th>Release Price</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tr>
						<td><?= $game['gReleaseprice']?></td>
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
					<?php foreach($price as $mobile): ?>
						<tr>
							<td><?= $mobile['pPrice'] ?></td>
							<td><?= $mobile['pDate'] ?></td>
							<td><?php if($mobile['pDiscounttype'] == 0): ?>Normal<?php else: ?>Pro<?php endif; ?></td>
							<td><?php if(session('role') == 1): ?><a title="Delete Discount" href="<?= base_url() ?>/prices/deleteprice/<?= $mobile['pId'] ?>"><span class="icon"><i class="fas fa-trash-alt"></i></span></a><?php endif; ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php if(session('role') == 1): ?>
	<?= view_cell('App\Controllers\Prices::price') ?>
<?php endif; ?>
