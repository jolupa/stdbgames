<?php if (isset ($cantlike) && $cantlike == true): ?>
	<span class="icon"><i class="fa-solid fa-face-smile"></i></span><span><?= $game ['like'] ?> /</span>
<?php else: ?>
	<a href="<?= base_url ('/games/likedislike/'.$game ['id'].'/like/'.$game ['slug']) ?>"><span class="icon"><i class="fa-solid fa-face-smile"></i></span></a><span><?= $game ['like'] ?> /</span>
<?php endif; ?>
<?php if (isset ($cantdislike) && $cantdislike == true): ?>
	<span class="icon"><i class="fa-solid fa-face-frown"></i></span><span><?= $game ['dislike'] ?> /&nbsp;</span>
<?php else: ?>
	<span class="icon"><a href="<?= base_url ('/games/likedislike/'.$game ['id'].'/dislike/'.$game ['slug']) ?>"><i class="fa-solid fa-face-frown"></i></a></span><span><?= $game ['dislike'] ?> /&nbsp;</span>
	<?php endif; ?>
