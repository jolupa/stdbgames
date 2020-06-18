<?php if($content == true): ?>
  <div class="columns has-background-light my-4">
    <div class="column">
      <div class="columns">
        <div class="column is-fullwidth">
          <p class="subtitle is-5">The Small</p>
          <p class="title is-3"><a id="Interview">#</a>Interview:</p>
        </div>
      </div>
      <div class="columns">
        <div class="column is-fullwidth">
          <div class="content">
            <?= $interview['body'] ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
