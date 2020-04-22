<div class="columns">
	<div class="column is-full">
		<p class="subtitle is-5">Price</p>
		<p class="title is-3">History:</p>
		<canvas id="pricechart" height="90" class="is-hidden-touch"></canvas>
	</div>
</div>
<div class="columns is-multiline is-hidden-desktop">
	<div class="column is-full">
		<?php foreach ($price as $mobile): ?>
			<div class="notification is-inline-block">
				<p>Price: <strong><?= $mobile['pPrice'] ?></strong> (<?= $mobile['pDate'] ?>)</p>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php if(session('role') == 1): ?>
	<div class="columns is-hidden-touch">
		<div class="column is-full">
			<form method="post" action="<?= base_url() ?>/games/newprice">
				<input type="hidden" name="Gameid" value="<?= $game['gId'] ?>">
				<input type="hidden" name="Slug" value="<?= $game['gSlug'] ?>">
				<div class="field is-grouped is-grouped-multiline">
					<div class="control is-expanded">
						<input type="text" class="input" name="Price" placeholder="New Price">
					</div>
					<div class="control is-expanded">
						<input class="input" type="text" name="Date" placeholder="YYYY-MM-DD">
					</div>
					<div class="control is-expanded">
						<div class="select">
							<select name="Discounttype">
								<option value="Normal">Normal</option>
								<option value="Pro">Pro</option>
							</select>
						</div>
					</div>
					<div class="control">
						<button class="button is-primary">Add Price!</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php endif; ?>

<script>
	var date=[<?php foreach($price as $date): ?>'<?= $date['pDate'] ?>',<?php endforeach; ?>];
	var price=[<?php foreach ($price as $price): ?><?= $price['pPrice'] ?>, <?php endforeach; ?>];

	var ctx = document.getElementById("pricechart");
	var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: date,
    datasets: [
      {
				barThickness: 'flex',
        data: price,
      }
    ]
  },
	options:{
		legend:{
			display: false,
		},
		scales:{
			yAxes:[{
				ticks:{
					beginAtZero: true,
				}
			}]
		}
	}
});
</script>
