<div id="add_the_monday_reminder" class="container mt-5">
	<div class="mx-3">
		<p class="title is-4">Add The Monday Reminder</p>
		<form action="<?= base_url ('/monday/save') ?>" method="post" enctype="multipart/form">
			<div class="field">
				<div class="control">
          <label class="checkbox">
            <input type="checkbox" name="published" <?php if ( ! empty ( old('published') ) ): ?>checked<?php endif; ?>>
            It's Published?
          </label>
        </div>
			</div>
			<div class="field">
				<label class="label" name="date">When to publish?</label>
				<div class="control">
					<input class="input" type="date" name="date" <?php if ( ! empty (old('date') ) ): ?>value="<?= old('date') ?>"<?php endif; ?>>
					<p class="help">Put the Monday to release The Monday Reminder</p>
				</div>
			</div>
			<div class="field">
				<label class="label" name="title">Title</label>
				<div class="control">
					<input class="input" type="text" placeholder="Title" name="title" <?php if ( ! empty ( old('name') ) ): ?>value="<?= old('name') ?>"<?php endif; ?>>
					<?php if ( isset ( $validation ) ): ?>
						<p class="help has-text-coral">We need a title for the The Monday Reminder</p>
					<?php endif; ?>
				</div>
			</div>
			<div class="field">
				<label class="label" name="conten">What we are talking about today...</label>
				<div class="control">
					<textarea class="textarea" rows="25" placeholder="Whatever..." name="entry" <?php if ( ! empty ( old('entry') ) ): ?>value="<?= old('entry') ?><?php endif; ?>"></textarea>
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
					<button class="button is-primary" type="submit">Add!</button>
				</div>
				<div class="control">
					<button class="button is-coral" type="reset">Reset!</button>
				</div>
			</div>
		</form>
	</div>
</div>
