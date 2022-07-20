<?php if (isset ($cantreviewlike) && $cantreviewlike == false): ?>
	<a class="level-item" href="<?= base_url ('/reviews/reviewlikedislike/'.$reviewslike ['id'].'/like/'.$reviewslike ['slug']) ?>">
		<span class="icon-text">
			<span class="icon"><i class="fa-solid fa-thumbs-up"></i></span><span><?= $reviewslike ['like'] ?></span>
		</span>
	</a>
<?php else: ?>
	<a class="level-item">
		<span class="icon-text">
			<span class="icon"><i class="fa-solid fa-thumbs-up"></i></span><span><?= $reviewslike ['like'] ?></span>
		</span>
	</a>
<?php endif; ?>
<?php if (isset ($cantreviewdislike) && $cantreviewdislike == false): ?>
	<a class="level-item" href="<?= base_url ('/reviews/reviewlikedislike/'.$reviewslike ['id'].'/dislike/'.$reviewslike ['slug']) ?>">
		<span class="icon-text">
			<span class="icon"><i class="fa-solid fa-thumbs-down"></i></span><span><?= $reviewslike ['dislike'] ?></span>
		</span>
	</a>
<?php else: ?>
	<a class="level-item">
		<span class="icon-text">
			<span class="icon"><i class="fa-solid fa-thumbs-down"></i></span><span><?= $reviewslike ['dislike'] ?></span>
		</span>
	</a>
<?php endif; ?>
