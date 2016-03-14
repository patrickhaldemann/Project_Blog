<form class="form-horizontal" action="/user/doCreate" method="post">
	<div class="component" data-html="true">
		<div class="form-group">
		  <label class="col-md-2 control-label" for="firstName">Firstname</label>
		  <div class="col-md-4">
		  	<input id="firstName" name="firstName" type="text" required="required" placeholder="Vorname" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="lastName">Lastname</label>
		  <div class="col-md-4">
		  	<input id="lastName" name="lastName" type="text" required="required" placeholder="Nachname" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="email">Mail</label>
		  <div class="col-md-4">
		  	<input id="email" name="email" type="text" required="required" placeholder="Mail" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="password">Password</label>
		  <div class="col-md-4">
		  	<input id="password" name="password" type="password" required="required" placeholder="Passwort" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="send" name="send" type="submit" value="Send" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
<script type="text/javascript">
	// Pattern zur überprüfung der Email
	var emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	$(document).ready(function () {
		$('form').submit(function (event) {
			if ($('.validation-error').length > 0) {
				event.preventDefault();
				alert("The email address you entered is not a valid email address!")
			}
		});
		$('#email').change(function () {
			$(this).removeClass('validation-success');
			$(this).removeClass('validation-error');

			// Überprüfen ob Eingabe mit Pattern übereinstimmt
			if ($(this).val().match(emailPattern)) {
				$(this).addClass('validation-success');
			}
			else {
				$(this).addClass('validation-error');
			}
		});
	});
</script>
