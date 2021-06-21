<script type="text/javascript">
  google.charts.load('current', {'packages': ['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart(){
    var data = new google.visualization.arrayToDataTable([
      ['Year', 'Releases', { role: 'style'} ],
      <?php foreach ( $gamebyyear as $gby ): ?>
        ['Year <?= $gby['year'] ?>', <?= $gby['total'] ?>, 'color: #a2d9dd'],
      <?php endforeach; ?>
    ]);
    var options = { 'backgroundColor':'#005066',
                    'height': 500,
                    'legend': 'none',
                    'vAxis': {'textPosition': 'none', 'gridlines': { 'color': 'transparent',},},};
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_gamebyyear'));
    chart.draw(data, options);
  }
</script>
<p class="title is-5">Games release by year</p>
<div class="content">
  <div id="chart_gamebyyear"></div>
</div>
