<script type="text/javascript">
  google.charts.load('current', {'packages': ['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart(){
    var data = new google.visualization.arrayToDataTable([
      ['Year', 'Value', { role: 'style'} ],
      <?php foreach ( $totalvalueofgamesyear as $tvgy ): ?>
        ['Year <?= $tvgy['year'] ?>', <?= $tvgy['total'] ?>, 'color: #a2d9dd'],
      <?php endforeach; ?>
    ]);
    var options = { 'backgroundColor':'#005066',
                    'height': 500,
                    'legend': 'none',
                    'vAxis': {'textPosition': 'none', 'gridlines': { 'color': 'transparent',},},};
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_totalvaluegamesbyyear'));
    chart.draw(data, options);
  }
</script>
<div class="column is-half-desktop">
  <p class="title is-5">Value of Games Release over Years</p>
  <div class="content">
    <div id="chart_totalvaluegamesbyyear"></div>
  </div>
</div>
