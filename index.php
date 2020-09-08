<?php

include 'functions.php';

/**
 * submit
 */
if (isset($_POST['submit'])) {
	extract($_POST);
	?>
	<p>
		<a style="background-color: yellow; padding: 10px" href="<?= base_url('gets.php?link=' . $link . '&s=' . $s . '&e=' . $e . '&flag=' . $flag) ?>">
			GET s=<?= $s ?>&e=<?= $e ?>
		</a>
	</p>
	<?php
}

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<form action="" method="post">
	<input type="text" name="link" placeholder="link"><br>
	<input type="text" name="s" placeholder="s"><br>
	<input type="text" name="e" placeholder="e"><br>
	<input type="text" size="5" name="flag" value="mtc"><br>
	<input type="submit" name="submit" value="GET">
</form>