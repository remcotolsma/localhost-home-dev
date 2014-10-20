<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Symlink</h3>
	</div>

	<div class="panel-body">
		<form class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="exampleInputEmail2">Project</label>

				<input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter project" ng-model="project">
			</div>
		</form>

		<hr />

		<pre>ln -s <?php echo $projects_dir; ?>/{{project}}  <?php echo $websites_dir; ?>/{{domain}}.dev/wp-content/plugins/{{project}}</pre>

		<pre>ln -s <?php echo $projects_dir; ?>/{{project}}  <?php echo $websites_dir; ?>/{{domain}}.dev/wp-content/themes/{{project}}</pre>
	</div>
</div>
