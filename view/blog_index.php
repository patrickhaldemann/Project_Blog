<article class="hreview open special">
	<?php
	if (empty ( $blogs )) {
		?>
		<div class="dhd">
		<h2 class="item title">Oh shit something went horribly wrong</h2>
	</div>
	<?php } else { ?>
		<?php foreach ($blogs as $blog) { ?>
					<div class="panel panel-default">
		<div class="panel-heading"><?= $blog->BlogTitle;?></div>
		<div class="panel-body">
			<p class="description"><?= $blog->BlogContent;?>
			</p>
		</div>
	</div>
		
		<?php } ?>
	
	<?php } ?>
</article>