<form class="form-horizontal" action="/blog/doCreate" method="post">
	<div class="component" data-html="true">
		<div class="form-group">
		  <label class="col-md-2 control-label" for="BlogTitle">Blog Title</label>
		  <div class="col-md-4">
		  	<input id="BlogTitle" name="BlogTitle" type="text" required="required" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="BlogContent">Blog Text</label>
		  <div class="col-md-4">
		  	<textarea id="BlogContent" name="BlogContent" type="text" required="required" class="form-control input-md"></textarea>
		  	<p>Max. 1000 Characters.</p>
		  </div>
		</div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="send" name="send" type="submit" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>