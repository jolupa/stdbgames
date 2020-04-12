<div class="columns">
  <div class="column is-full-width">
    <p>
    <?php if ($purchase == 0 && $item['gRelease'] < date('Y-m-d')): ?><a href="<?= base_url() ?>/users/addlibrary/<?= $item['gId'] ?>/<?= session('id') ?>"><span class="tag is-info is-medium"><span class="heading">Add to Your Library</span></span></a><?php endif; ?>
    </p>
    <p>
      <?php if ($vote == 0 & $item['gRelease'] <= date('Y-m-d')): ?><a title="VOTE GREAT" href="<?= base_url() ?>/users/uservote/upvote/<?= $item['gId'] ?>/<?= session('id') ?>"><span class="tag is-primary is-medium"><span class="heading">THE GAME IS GREAT</span></span></a>  <a title="VOTE WELL..." href="<?= base_url() ?>/users/uservote/well/<?= $item['gId'] ?>/<?= session('id') ?>"><span class="tag is-warning is-medium"><span class="heading">THE GAME IS... WELL...</span></span></a> <a title="VOTE WHAT THE..." href="<?= base_url() ?>/users/uservote/downvote/<?= $item['gId'] ?>/<?= session('id') ?>"><span class="tag is-danger is-medium"><span class="heading">WHAT THE...</span></span></a>
      <?php endif; ?>
    </p>
  </div>
</div>
