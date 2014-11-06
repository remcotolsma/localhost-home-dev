<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">WP-CLI .dev</h3>
	</div>

	<div class="panel-body">
		<form class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="exampleInputEmail2">Domain</label>

				<div class="input-group">
					<input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter domain" ng-model="domain">

					<span class="input-group-addon">.dev</span>
				</div>
			</div>
		</form>

		<hr />

		<ul class="nav nav-tabs" role="tablist">
			<li class="active">
				<a href="#new-dev" role="tab" data-toggle="tab">New .dev</a>
			</li>
			<li>
				<a href="#del-dev" role="tab" data-toggle="tab">Delete .dev</a>
			</li>
			<li>
				<a href="#plugins" role="tab" data-toggle="tab">Plugins</a>
			</li>
			<li>
				<a href="#database" role="tab" data-toggle="tab">Database</a>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane panel-body active" id="new-dev">
				<?php include 'wp-cli-new.php'; ?>
			</div>
			<div class="tab-pane panel-body" id="del-dev">
				<?php include 'wp-cli-del.php'; ?>
			</div>
			<div class="tab-pane panel-body" id="plugins">
				<?php include 'wp-cli-plugins.php'; ?>
			</div>
			<div class="tab-pane panel-body" id="database">
				<?php include 'wp-cli-database.php'; ?>
			</div>
		</div>
	</div>
</div>
