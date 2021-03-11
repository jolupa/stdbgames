<div class="content">
  <p class="title is-5">Trending</p>
  <p class="subtitle is-3">Games Now:</p>
  <div class="columns">
    <div class="column is-7">
      <div class="content" style="background: url('<?= base_url() ?>/images/<?= $trending[0]['image'] ?>.jpeg'); size: cover; background-position: center; height: 250px;">
        <tag class="tag title is-7 mt-2 ml-2 has-background-green-eagle"><a href="<?= base_url() ?>/game/<?= $trending[0]['slug'] ?>" title="<?= $trending[0]['name'] ?>"><?= $trending[0]['name'] ?></a></tag>
      </div>
    </div>
    <div class="column is-5">
      <div class="columns">
        <div class="column">
          <div class="content" style="background: url('<?= base_url() ?>/images/<?= $trending[1]['image'] ?>.jpeg'); size: cover; background-position: center; height: 120px;">
            <tag class="tag title is-7 mt-2 ml-2 has-background-green-eagle"><a href="<?= base_url() ?>/game/<?= $trending[1]['slug'] ?>" title="<?= $trending[1]['name'] ?>"><?= $trending[1]['name'] ?></a></tag>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <div class="content" style="background: url('<?= base_url() ?>/images/<?= $trending[2]['image'] ?>.jpeg'); size: cover; background-position: center; height: 106px;">
            <tag class="tag title is-7 mt-2 ml-2 has-background-green-eagle"><a href="<?= base_url() ?>/game/<?= $trending[2]['slug'] ?>" title="<?= $trending[2]['name'] ?>"><?= $trending[2]['name'] ?></a></tag>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
