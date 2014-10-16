<?php

include 'load.php';

include 'header.php';

?>
<div class="list-group">

	<?php foreach ( $websites as $website ) : ?>

		<a href="<?php echo $website->url; ?>" class="list-group-item">
			<h4 class="list-group-item-heading"><?php echo $website->name; ?></h4>

			<p class="list-group-item-text"><?php echo $website->description; ?></p>
		</a>

	<?php endforeach; ?>

</div>

<?php

include 'wp-cli.php';

include 'footer.php';
