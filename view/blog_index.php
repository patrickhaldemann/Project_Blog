<article class="hreview open special">
	<?php
	if (empty ( $blogs )) {
		?>
		<div class="dhd">
		<h2 class="item title">There are currently no Blogs available.</h2>
	</div>
	<?php } else { ?>
		<?php foreach ($blogs as $blog) { ?>
					<div class="panel panel-default">
		<div class="panel-heading"><?= $blog->BlogTitle;?></div>
		<div class="panel-body">
			<p class="description"><?= $blog->BlogContent;?>
			</p>
		</div>
								<?php
			if (isset ( $_SESSION ['IsAdmin'] )) {
				if ($_SESSION ['IsAdmin'] == 1) {
					echo '<p style="margin-left: 15px;"><a href="/blog/delete?id=' . $blog->id . '" onclick="return confirm(\'Are you sure?\')">Delete user</a></p>';
				}
			}
			?>
	</div>

		
		<?php } ?>
	
	<?php } ?>
</article>