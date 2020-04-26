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
							<img title="No price tracking for this title" src="<?= base_url() ?>/images/avatar/avatar01">
						</figure>
					</div>
				</div>
			</div>
		<?php else: ?>
			<canvas class="is-hidden-touch" id="pricechart" height="90"></canvas>
			<div class="column is-full-width is-hidden-desktop">
				<table class="table is-full-width is-stripped">
					<thead>
						<tr>
							<th>Price</th>
							<th>Date</th>
						</tr>
					</thead>
					<?php foreach($price as $mobile): ?>
						<tr>
							<td><?= $mobile['pPrice'] ?></td>
							<td><?= $mobile['pDate'] ?></td>
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

<script>
	var ctx = document.getElementById('pricechart').getContext('2d');
	var pricechart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels:[<?php foreach($price as $date): ?>'<?= $date['pDate'] ?>',<?php endforeach; ?>],
			datasets: [{
				data: [<?php foreach($price as $price): ?>'<?= $price['pPrice'] ?>',<?php endforeach; ?> ],
				backgroundColor: [ 'rgba(0,204,102,1)','rgba(0,204,102,1)','rgba(0,204,102,1)','rgba(0,204,102,1)','rgba(0,204,102,1)','rgba(0,204,102,1)','rgba(0,204,102,1)','rgba(0,204,102,1)','rgba(0,204,102,1)','rgba(0,204,102,1)', ],
				barThickness: 'flex',
			}],
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						min: 0,
					},
					backgroundColor: [
						'rgba(51,153,51,1)',
					]
				}]
			},
			legend: {
				display: false,
			},
		},
	})
</script>
