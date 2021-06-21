<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="charts" class="container mt-5">
  <div class="mx-3">
    <?= view_cell ( 'App\Controllers\Charts::gamebyyear' ) ?>
    <?= view_cell ( 'App\Controllers\Charts::gameprobymonth' ) ?>
    <div class="columns is-multiline-is-mobile">
      <?= view_cell ( 'App\Controllers\Charts::totalvalueofgamesyear' ) ?>
      <?= view_cell ( 'App\Controllers\Charts::totalvalueprogamesyear' ) ?>
    </div>
  </div>
</div>
