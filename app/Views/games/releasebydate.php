<hr \>
<div class="content mt-5">
  <p class="title is-5">Also released</p>
  <p class="subtitle is-3">#this day:</p>
  <?php foreach($release_day as $release_day): ?>
    <figure class="image is-128x128 is-inline-block mx-0 my-0">
      <a href="<?= base_url() ?>/game/<?= $release_day['slug'] ?>" title="<?= $release_day['name'] ?>"><img src="<?= base_url() ?>/images/<?= $release_day['image'] ?>-thumb.jpeg" alt="<?= $release_day['name'] ?>" title="<?= $release_day['name'] ?>"></a>
    </figure>
  <?php endforeach; ?>
</div>
