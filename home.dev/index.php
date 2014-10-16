<?php

include 'load.php';

include 'header.php';

?>
<div class="list-group">

	<?php foreach ( $websites as $website ) : ?>

		<a href="<?php echo $website->url; ?>" class="list-group-item">
			<div class="row">
				<div class="col-md-11">
					<h4 class="list-group-item-heading"><?php echo $website->name; ?></h4>

					<p class="list-group-item-text"><?php echo $website->description; ?></p>
				</div>

				<div class="col-md-1">
					<?php

					$icon = 'file';

					if ( is_readable( $website->file . '/wp-config.php' ) ) {
						$icon = 'wordpress';
					}

					?>
					<i class="fa fa-<?php echo $icon; ?> fa-3x"></i>
				</div>
			</div>
		</a>

	<?php endforeach; ?>

</div>

<?php

include 'wp-cli.php';

include 'footer.php';
