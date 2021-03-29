<?= view_cell('App\Controllers\Games::trending') ?>
<?= view_cell('App\Controllers\Games::progames') ?>
<?= view_cell('App\Controllers\Games::thismonth') ?>
<?= view_cell('App\Controllers\Games::comingsoon') ?>
<?= view_cell('App\Controllers\Interviews::interviewlist') ?>
<?= view_cell('App\Controllers\Games::addedupdated') ?>
<div class="container">
  <section class="section">
    <div class="columns">
      <div class="column">
        <?= view_cell('App\Controllers\Likedislike::likedislikechart') ?>
      </div>
      <div class="column">
        <?= view_cell('App\Controllers\Reviews::latestreviews') ?>
      </div>
      <div class="column">
        <?= view_cell('App\Controllers\Prices::pricesfrontpage') ?>
      </div>
    </div>
  </section>
</div>
