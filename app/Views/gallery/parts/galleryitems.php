<p class="title is-4 mt-5">Game Video</p>
<figure class="image is-16by9">
  <iframe class="has-ratio" width="640" height="360" src="https://www.youtube.com/embed/<?= $video[0]['url'] ?>?controls=0" frameborder="0" allowfullscreen></iframe>
</figure>
 <?php if ( ! empty ( $error ) ): ?>
  <?= $video['error'] ?>
<?php endif; ?>
