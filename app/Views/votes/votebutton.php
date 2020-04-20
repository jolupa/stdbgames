<a class="modal-vote"><span class="tag is-primary is-medium"><span class="heading">Vote!</span></span></a>
<div class="modal vote">
	<div class="modal-background"></div>
		<div class="modal-content">
		<div class="box has-text-centered">
			<p>
				<?php $i = 0; while ($i <= 10):  ?>
					<span class="icon has-text-info"><a href="<?= base_url() ?>/votes/addvote/<?= $gameid ?>/<?= $userid ?>/<?= $i ?>" class="close-modal"><i class="fas fa-star"></i></a></span>
				<?php $i++; endwhile; ?>
			</p>
		</div>
	</div>
</div>

<script>
	$(".modal-vote").click(function() {
		$(".vote").addClass("is-active");
		$("html").addClass("is-clipped");
	});

	$(".modal-background").click(function() {
		$(".vote").removeClass("is-active");
		$("html").removeClass("is-clipped");
	});

	$(".close-modal").click(function() {
		$(".vote").removeClass("is-active");
		$("html").removeClass("is-clipped");
	})
</script>
