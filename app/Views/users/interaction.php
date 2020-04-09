<div class="columns is-centered is-multiline">
  <div class="column is-two-thirds">
    <p>
    <?php if ($purchase == 0 && $item['gRelease'] < date('Y-m-d')): ?>
        <a href="<?= base_url() ?>/users/addlibrary/<?= $item['gId'] ?>/<?= session('id') ?>"><span class="tag is-primary is-medium"><span class="heading">Add to Your Library</span></span></a>
      <?php endif; ?>
      <?php if ($vote == 0 & $item['gRelease'] <= date('Y-m-d')): ?>
        <a href="<?= base_url() ?>/users/uservote/upvote/<?= $item['gId'] ?>/<?= session('id') ?>"><span class="tag is-info is-medium"><span class="heading">UPVOTE</span></span></a>
        <a href="<?= base_url() ?>/users/uservote/downvote/<?= $item['gId'] ?>/<?= session('id') ?>"><span class="tag is-danger is-medium"><span class="heading">DOWNVOTE</span></span></a>
      <?php endif; ?>
    </p>
  </div>
</div>
