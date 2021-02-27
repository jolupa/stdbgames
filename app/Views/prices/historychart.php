<p class="title is-5">Deals</p>
<p class="subtitle is-3"><a id="Deals_Chart">#</a>Chart</p>
<?php if($prochart == false): ?>
  <p class="has-text-centered">No Deals for <strong><?= $game['name'] ?></strong> Valid for Pro Members</p>
<?php else: ?>
  <div class="content" style="overflow-x: auto; overflow-y: hidden;">
    <div id="pro" style="width: 100%; height:500px"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Pro Price', {role: 'style'}],
          ['<?= date('d-m-Y', strtotime($game['release'])) ?>', <?= round($game['price'], 2) ?>, '#004052'],
          <?php foreach ($prochart as $prochart): ?>
            ['<?= date('d-m-Y', strtotime($prochart['date'])) ?>', <?= round($prochart['price_pro'], 2) ?>, '#FF686B'],
          <?php endforeach; ?>
        ]);

        var options = {
          title: 'Pro Deals Over Time',
          legend: { position: 'none',},
          backgroundColor: '#76949F',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('pro'));

        chart.draw(data, options);
      }
    </script>
  </div>
<?php endif; ?>
<?php if($everyonechart == false): ?>
  <p class="has-text-centered">No Deals for <strong><?= $game['name'] ?></strong> Valid for everyone</p>
<?php else: ?>
  <div class="content" style="overflow-x: auto; overflow-y: hidden;">
    <div id="non_pro" style="width:100%; height:500px;"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Everyone Price', {role: 'style'}],
          ['<?= date('d-m-Y', strtotime($game['release'])) ?>', <?= round($game['price'], 2) ?>, '#004052'],
          <?php foreach ($everyonechart as $everyonechart): ?>
            ['<?= date('d-m-Y', strtotime($everyonechart['date'])) ?>', <?= round($everyonechart['price_nonpro'], 2) ?>, '#FF686B'],
          <?php endforeach; ?>
        ]);

        var options = {
          title: 'Everyone Deals Over Time',
          legend: { position: 'none',},
          backgroundColor: '#76949F',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('non_pro'));

        chart.draw(data, options);
      }
    </script>
  </div>
<?php endif; ?>
