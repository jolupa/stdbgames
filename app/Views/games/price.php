<div class="columns">
	<div class="column is-full-width">
		<p class="subtitle is-5">Price</p>
		<p class="title is-3">History:</p>
		<canvas id="pricechart" height="90"></canvas>
	</div>
</div>
<?php if(session('role') == 1): ?>
	<div class="columns">
		<div class="column is-full-width">
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
								<option value="Pro">Pro</option>
								<option value="Normal">Normal</option>
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
  type: 'line',
  data: {
    labels: date,
    datasets: [
      {
        data: price
      }
    ]
  },
	options:{
		legend:{
			display: false,
		}
	}
});
</script>
