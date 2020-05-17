<div class="columns">
  <div class="column is-full-widht">
    <p class="subtitle is-5">The Firsts</p>
    <p class="title is-3">Games on Stadia:</p>
  </div>
</div>
<div class="columns">
  <div class="column is-multiline">
    <?php foreach($sixmonths as $sixmonths): ?>
      <div class="column is-1 is-inline-block">
        <figure class="image is-square">
          <a href="<?= base_url() ?>/games/game/<?= $sixmonths['sgSlug'] ?>">
            <img src="<?= base_url() ?>/images/<?= $sixmonths['sgImage'] ?>-thumb.jpeg">
          </a>
        </figure>
      </div>
    <?php endforeach; ?>
  </div>
</div>
