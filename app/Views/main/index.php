<?php if ( session ( 'error_lidi' ) != null || session ( 'error_wis' ) != null || session ( 'error_adup') != null || session ( 'error_usun' ) != null || session ( 'error_sear' ) != null || session ( 'error_del' ) != null ): ?>
  <article id="error" class="container message is-coral mt-5">
    <div class="message-header">
      <p>Error!</p>
      <button class="delete"></buton>
    </div>
    <div class="message-body">
      <?php if ( session ( 'error_lidi') != null ): ?>
        <?= session ( 'error_lidi' ) ?>
      <?php endif; ?>
      <?php if ( session ( 'error_wis' ) != null ): ?>
        <?= session ( 'error_wis' ) ?>
      <?php endif; ?>
      <?php if ( session ( 'error_adup' ) != null ): ?>
        <?= session ( 'error_adup' ) ?>
      <?php endif; ?>
      <?php if ( session ( 'error_usun' ) != null ): ?>
        <?= session ( 'error_usun' ) ?>
      <?php endif; ?>
      <?php if ( session ( 'error_sear' ) != null ): ?>
        <?= session ( 'error_sear' ) ?>
      <?php endif; ?>
      <?php if ( session ( 'error_del' ) != null ): ?>
        <?= session ( 'error_del' ) ?>
      <?php endif; ?> 
    </div>
  </article>
<?php endif; ?>
<?= view_cell ('App\Controllers\Games::discover') ?>
<?= view_cell ('App\Controllers\Games::proslider') ?>
<?= view_cell ('App\Controllers\Games::outthismonth') ?>
<?= view_cell ('App\Controllers\Interviews::interviewsfront') ?>
<?= view_cell ('App\Controllers\Games::gamesaddedupdated') ?>
<?= view_cell ( 'App\Controllers\Games::mostliked' ) ?>
<?= view_cell ( 'App\Controllers\Reviews::latestreviews' ) ?>
<?= view_cell ( 'App\Controllers\Prices::dealsfrontpage' ) ?>
