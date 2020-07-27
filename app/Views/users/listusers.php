<div class="columns mt-2">
  <div class="column is-fullwidth">
    <p class="title is-3">Users:</p>
  </div>
</div>
<div class="columns is-multiline mb-2">
  <div class="column">
    <?php foreach($userlist as $userlist): ?>
      <div class="card is-inline-block">
        <div class="card-image">
          <figure class="image is-96x96">
            <a href="<?= base_url() ?>/user/edit/<?= $userlist['id'] ?>" title="Edit <?= $userlist['name'] ?>">
              <?php if(file_exists(ROOTPATH.'public/images/avatar/'.$userlist['image'].'.jpeg') == true): ?>
                <img src="<?= base_url() ?>/images/avatar/<?= $userlist['image'] ?>.jpeg">
              <?php else: ?>
                <img src="<?= base_url() ?>/images/avatar/avatar01.jpeg">
              <?php endif; ?>
            </a>
          </figure>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
