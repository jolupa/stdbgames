<?php if (isset ($discover) && $discover == true): ?>
	<h4 class="subtitle is-6">
		Developer: <strong><a href="<?= base_url ('/company/'.$developer['slug']) ?>"><?= $developer['name'] ?></a></strong> / Publisher: <strong><a href="<?= base_url ('/company/'.$publisher['slug']) ?>"><?= $publisher['name'] ?></a></strong>
	</h4>
<?php elseif (isset ($outthismonth) && $outthismonth == true): ?>
	<h6 class="subtitle is-6">
		Developer: <strong><a href="<?= base_url ('/company/'.$developer['slug']) ?>"><?= $developer['name'] ?></a></strong> / Publisher: <strong><a href="<?= base_url ('/company/'.$publisher['slug']) ?>"><?= $publisher['name'] ?></a></strong>
	</h6>
<?php else: ?>
	<p>Developer: <a href="<?= base_url ('/company/'.$developer['slug']) ?>"><strong><?= $developer['name'] ?></strong></a> / Publisher: <a href="<?= base_url ('/company/'.$publisher['slug']) ?>"><strong><?= $publisher['name'] ?></strong></a></p>
<?php endif; ?>
