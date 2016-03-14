
<article class="hreview open special">
	<?php if (empty($users)) { ?>
		<div class="dhd">
		<h2 class="item title">Oh shit something went horribly wrong</h2>
	</div>
	<?php } else { ?>
		<?php foreach ($users as $user) { ?>
			<div class="panel panel-default">
		<div class="panel-heading"><?= $user->FirstName;?> <?= $user->LastName;?></div>
		<div class="panel-body">
			<p class="description">User <?= $user->FirstName;?> <?= $user->LastName;?> exists in Database. His email address is: <a
					href="mailto:<?= $user->Email;?>"><?= $user->Email;?></a>
			</p>
					<?php
			if (isset ( $_SESSION ['IsAdmin'] )) {
				if ($_SESSION ['IsAdmin'] == 1) {
					echo '<p><a href="/user/delete?id=' . $user->id . '" onclick="return confirm(\'Are you sure?\')">Delete user</a></p>';
				}
			}
			?>
				</div>
	</div>
		<?php } ?>
	
	<?php } ?>
</article>
