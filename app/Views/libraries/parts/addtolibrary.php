<?php if ($game ['release'] != '2099-01-01' && $game ['release'] != 'TBA'): ?>
	<a href="<?= base_url ('libraries/addtolibrary/'.$game ['id'].'/'.$game ['slug']) ?>"><span class="icon"><i class="fa-solid fa-plus"></i><i class="fa-solid fa-book"></i></span></a><span>&nbsp;/&nbsp;</span>
<?php endif; ?>
<?= view_cell ('App\Controllers\Wishlists:checkWishlists', 'game_id='.$game ['id']) ?>
