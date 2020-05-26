<?php if($checkreview == 'TRUE'): ?>
  <div class="columns">
    <div class="column is-full-width">
      <article class="media">
        <figure class="media-left image is-128x128">
          <?php if(file_exists(ROOTPATH.'/public/images/avatar/'.session('username').'.jpeg') === TRUE): ?>
            <img src="<?= base_url() ?>/images/avatar/<?= session('username') ?>.jpeg">
          <?php else: ?>
            <img src="<?= base_url() ?>/images/avatar/avatar01.jpeg">
          <?php endif; ?>
        </figure>
        <div class="media-content">
          <form method="post" action="<?= base_url() ?>/reviews/addreview">
            <input type="hidden" name="Userid" value="<?= session('id') ?>">
            <input type="hidden" name="Gameid" value="<?= $game['gId'] ?>">
            <input type="hidden" name="Datesaved" value="<? $review['rDate'] ?>">
            <div class="field">
              <div class="control">
                <textarea class="textarea" name="About" placeholder="You can use HTML tags p,strong"></textarea>
              </div>
            </div>
            <div class="field is-grouped is-grouped-multiline">
              <div class="control">
                <?= view_cell('\App\Controllers\Reviews::checkvote', 'gameid= '.$game['gId'].', userid= '.session('id')) ?>
              </div>
              <div class="control">
                <button class="button is-primary" type="submit">Add Review!</button>
              </div>
            </div>
          </form>
        </div>
      </article>
    </div>
  </div>
<?php endif; ?>
