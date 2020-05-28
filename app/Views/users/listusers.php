<div class="columns">
	<div class="column">
		<table class="table is-fullwidth">
			<tr>
				<th>User Name</th>
				<th>Registered since</th>
				<th>Action</th>
			</tr>
			<?php foreach ($userlist as $userlist): ?>
				<tr>
					<td><?= $userlist['uName'] ?></td>
					<td><?= $userlist['uRegistrydate'] ?></td>
					<td><a href="<?= base_url() ?>/users/edit/<?= $userlist['uSlug'] ?>">Edit</a><?php if(session('role') == 1): ?> | <a href="<?= base_url() ?>/users/deleteuser/<?= $userlist['uId'] ?>/<?= $userlist['uImage'] ?>">Delete</a><?php endif; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
