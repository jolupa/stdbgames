<div class="content mt-2">
  <p class="title is-3">Users:</p>
  <?php foreach($userlist as $userlist): ?>
    <div class="card is-shadowless is-inline-block">
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
