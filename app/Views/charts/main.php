<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="charts" class="container mt-5">
  <div class="mx-3">
    <p class="title is-5">Games Launched By Year</p>
    <nav class="level is-mobile">
      <?= view_cell ( 'App\Controllers\Charts::gamebyyear' ) ?>
    </nav>
    <p class="title is-5">Games with Pro Every Month</p>
    <?= view_cell ( 'App\Controllers\Charts::gameprobymonth' ) ?>
    <div class="columns is-multiline-is-mobile">
      <?= view_cell ( 'App\Controllers\Charts::totalvalueofgamesyear' ) ?>
      <?= view_cell ( 'App\Controllers\Charts::totalvalueprogamesyear' ) ?>
    </div>
    <nav class="level">
      <?= view_cell ( 'App\Controllers\Charts::prices' ) ?>
    </nav>
    <div class="columns is-multiline-is-mobile">
      <div class="column is-full">
        <p class="title is-5">Most Wishlisted Games</p>
      </div>
    </div>
      <?= view_cell ( 'App\Controllers\Charts::mostwishlisted' ) ?>
    </div>
    <p class="title is-5">Resolutions:</p>
    <p class="subtitle is-7">Info Provided by <a href="https://airtable.com/shrZudGtuGAZNYrQK/tblVXkiYyDsFwmiMa" target="_blank">Original Penguin DB</a></p>
    <nav class="level is-mobile">
      <?= view_cell ( 'App\Controllers\Charts::resolutions' ) ?>
    </nav>
  </div>
</div>
