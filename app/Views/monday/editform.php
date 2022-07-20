<div id="update_the_monday_reminder" class="container mt-5">
	<div class="mx-3">
		<p class="title is-4">Update The Monday Reminder</p>
		<form action="<?= base_url ('/monday/save') ?>" method="post" enctype="multipart/form">
			<input type="hidden" name="slug" value="<?= $monday['slug'] ?>">
			<div class="field">
				<div class="control">
          <label class="checkbox">
            <input type="checkbox" name="published" <?php if ( $monday['published'] == 1 ): ?>checked<?php endif; ?>>
            It's Published?
          </label>
        </div>
			</div>
			<div class="field">
				<label class="label" name="date">When to publish?</label>
				<div class="control">
					<input class="input" type="date" name="date" <?php if ( ! empty ( $monday['date'] ) ): ?>value="<?= $monday['date'] ?>"<?php endif; ?>>
					<p class="help">Put the Monday to release The Monday Reminder</p>
					<?php if ( isset ( $validation_date ) ): ?>
						<p class="help has-text-coral">Put a date to publish</p>
					<?php endif; ?>
				</div>
			</div>
			<div class="field">
				<label class="label" name="title">Title</label>
				<div class="control">
					<input class="input" type="text" placeholder="Title" name="title" value="<?= $monday['title'] ?>">
				</div>
			</div>
			<div class="field">
				<label class="label" name="conten">What we are talking about today...</label>
				<div class="control">
					<textarea class="textarea" rows="25" placeholder="Whatever..." name="entry" value="<?= $monday['entry'] ?>"></textarea>
					<p class="help">
            We use Markdown for this field<br>
            - **bold**<br>
            - *Italic*<br>
            - ***Bold and Italic***<br>
            - To insert a Line Break insert two white spaces or \<br>
            - Unordered List start with - OR + OR *<br>
            - Images ![Image title](/image/folder/of/file)<br>
            - Horizontal Rule ---<br>
            - Links [link text](https://address.url)<br>
            - Links with title [link text](https://address.url "link title")
          </p>
				</div>
			</div>
			<div class="field is-grouped">
				<div class="control">
					<button class="button is-primary" type="submit">Update!</button>
				</div>
				<div class="control">
					<button class="button is-coral" type="reset">Reset!</button>
				</div>
			</div>
		</form>
	</div>
</div>
