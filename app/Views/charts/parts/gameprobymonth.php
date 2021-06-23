<script type="text/javascript">
  google.charts.load('current', {'packages': ['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart(){
    var data = new google.visualization.arrayToDataTable([
      ['Year', 'On Pro', { role: 'style'} ],
      <?php foreach ( $gameprobymonth as $gpm ): ?>
        ['Date <?= date ('m-Y', strtotime ( $gpm['date'] )) ?>', <?= $gpm['total'] ?>, <?php if ( $gpm['total'] < 4 ): ?>'color: #FF686B'<?php elseif ( $gpm['total'] < 8 ): ?>'color: #a2d9dd'<?php else: ?>'color: #00A0CC'<?php endif; ?>],
      <?php endforeach; ?>
    ]);
    var options = { 'backgroundColor':'#005066',
                    'height': 500,
                    'legend': 'none',
                    'vAxis': {'textPosition': 'none', 'gridlines': { 'color': 'transparent',},},};
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_gameprobymonth'));
    chart.draw(data, options);
  }
</script>
<div class="content">
  <div id="chart_gameprobymonth"></div>
</div>
