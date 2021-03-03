<div class="content mt-2">
  <p class="title is-3">Users:</p>
  <?php foreach($userlist as $userlist): ?>
    <figure class="image is-96x96 is-fullwidth is-inline-block mr-1 mt-1">
      <a href="<?= base_url() ?>/user/edit/<?= $userlist['id'] ?>" title="Edit <?= $userlist['name'] ?>">
        <?php if(file_exists(ROOTPATH.'public/images/avatar/'.$userlist['image'].'.png')): ?>
          <img src="<?= base_url() ?>/images/avatar/<?= $userlist['image'] ?>.png">
        <?php else: ?>
          <img src="<?= base_url() ?>/images/avatar/avatar01.png">
        <?php endif; ?>
      </a>
    </figure>
  <?php endforeach; ?>
</div>
