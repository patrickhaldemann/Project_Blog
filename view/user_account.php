<article class="hreview open special">
	<?php
	if (empty ( $User )) {
		?>
		<div class="dhd">
		<h2 class="item title">Oh shit something went horribly wrong</h2>
	</div>
	<?php } else { ?>
		<?php  ?>
			<div class="panel panel-default">
		<div class="panel-heading"><?= $User->FirstName;?> <?= $User->LastName;?></div>
		<div class="panel-body">
			<p class="description">
				Firstname: <?= $User->FirstName;?> </br>
				Lastname: <?= $User->LastName;?> </br> Email: <a
					href="mailto:<?= $User->Email;?>"><?= $User->Email;?></a>



			</p>
			<form class="form-horizontal" action="/user/myAccount" method="post">
				<div class="component" data-html="true">
					<div class="form-group">
						<label for="ChangePassword"></label>
						<div class="col-md-4">
							<input id="ChangePassword" name="ChangePassword" type="submit"
								value="Change Password" class="btn btn-primary">
						</div>
					</div>
			
			</form>
				<?php
		
		if (isset ( $_POST ['ChangePassword'] )) {
			
			echo '<form action="/user/passwordUpdate" method="post">
			<input type="hidden" name="ChangePassword" value="ChangePassword" />';
			
			if ($samePwd)
				echo '<script>alert("Wrong Old Password!")</script>';
			
			echo '<div class="form-group">
					<label class="col-md-2 control-label" for="OldPassword">Old Password</label>
		  				<div class="col-md-4">
							<input type="password" name="OldPassword" class="form-control input-md" required="required">
						</div>
				</div>';
			echo '<div class="form-group">
					<label class="col-md-2 control-label" for="NewPassword">New Password</label>
		  				<div class="col-md-4">
							<input type="password" name="NewPassword" class="form-control input-md" required="required">
						</div>
				</div>';
			echo '<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="send" name="send" type="submit" value="Send" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>';
		}
		?>

		</div>
	</div>
		<?php } ?>
</article>