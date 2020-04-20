<p><a class="open-modal"><span class="tag is-primary is-medium" id="modal">Vote!</span></a></p>
<div class="modal">
	<div class="modal-background"></div>
		<div class="modal-content">
		<div class="box has-text-centered">
			<p>
				<?php $i = 0; while ($i <= 10):  ?>
					<span class="icon has-text-info"><a href="<?= base_url() ?>/votes/castvote/<?= $game['gId'] ?>/<?= session('userid') ?>/<?= $i ?>" class="close-modal"><i class="fas fa-star"></i></a></span>
				<?php $i++; endwhile; ?>
			</p>
		</div>
	</div>
</div>

<script>
	$(".open-modal").click(function() {
		$(".modal").addClass("is-active");
		$("html").addClass("is-clipped");
	});

	$(".modal-background").click(function() {
		$(".modal").removeClass("is-active");
		$("html").removeClass("is-clipped");
	});

	$(".close-modal").click(function() {
		$(".modal").removeClass("is-active");
		$("html").removeClass("is-clipped");
	})
</script>
