<script type="text/javascript">
  google.charts.load('current', {'packages': ['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart(){
    var data = new google.visualization.arrayToDataTable([
      ['Year', 'Value', { role: 'style'} ],
      <?php foreach ( $totalvalueprogamesyear as $tvpgy ): ?>
        ['Year <?= $tvpgy['year'] ?>', <?= $tvpgy['total'] ?>, 'color: #a2d9dd'],
      <?php endforeach; ?>
    ]);
    var options = { 'backgroundColor':'#005066',
                    'height': 500,
                    'legend': 'none',
                    'vAxis': {'textPosition': 'none', 'gridlines': { 'color': 'transparent',},},};
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_totalvalueprogamesyear'));
    chart.draw(data, options);
  }
</script>
<div class="column is-half-desktop">
  <p class="title is-5">Value of Pro Games Release over Years</p>
  <div class="content">
    <div id="chart_totalvalueprogamesyear"></div>
  </div>
</div>
