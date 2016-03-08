<article class="hreview open special">
	<?php if (empty($users)): ?>
		<div class="dhd">
			<h2 class="item title">Oh shit something went horribly wrong</h2>
		</div>
	<?php else: ?>
		<?php foreach ($users as $user): ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $user->firstName;?> <?= $user->lastName;?></div>
				<div class="panel-body">
					<p class="description">User <?= $user->firstName;?> <?= $user->lastName;?> exists in Database. His email address is: <a href="mailto:<?= $user->email;?>"><?= $user->email;?></a></p>
					<p>
						<a title="Delete user" href="/user/delete?id=<?= $user->id ?>">Delete user</a>
					</p>
				</div>
			</div>
		<?php endforeach ?>
	<?php endif ?>
</article>
