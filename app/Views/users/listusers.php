<div class="content mt-2">
  <p class="title is-3">Users:</p>
  <?php foreach($userlist as $userlist): ?>
    <figure class="image is-96x96 is-fullwidth is-inline-block ml-0 mr-0 mt-0">
      <a href="<?= base_url() ?>/user/edit/<?= $userlist['id'] ?>" title="Edit <?= $userlist['name'] ?>">
        <?php if(file_exists(ROOTPATH.'public/images/avatar/'.$userlist['image'].'.jpeg') == true): ?>
          <img src="<?= base_url() ?>/images/avatar/<?= $userlist['image'] ?>.jpeg">
        <?php else: ?>
          <img src="<?= base_url() ?>/images/avatar/avatar01.jpeg">
        <?php endif; ?>
      </a>
    </figure>
  <?php endforeach; ?>
</div>
