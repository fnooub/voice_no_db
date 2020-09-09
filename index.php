<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

include 'functions.php';

/**
 * submit
 */
if (isset($_POST['submit'])) {
	extract($_POST);
	?>
	<p class="margin: 20px 0">
		<a style="background-color: yellow; padding: 10px;" href="<?= base_url('gets.php?link=' . $link . '&s=' . $s . '&e=' . $e . '&flag=' . $flag) ?>">
			GET s=<?= $s ?>&e=<?= $e ?>
		</a>
	</p>
	<?php
	/**
	 * save
	 */
	$data = array(
		'link' => $link,
		's' => $s,
		'e' => $e,
		'flag' => $flag
	);
	file_put_contents('site.json', json_encode($data));
}

?>
<?php $data = json_decode(file_get_contents('site.json')) ?>
<form action="" method="post">
	<input type="text" name="link" placeholder="link" value="<?= $data->link ?>" style="width: 100%; margin: 10px 0; padding: 5px 0"><br>
	<input type="number" name="s" onfocus="this.value=''" value="<?= $data->s ?>" style="width: 200px; margin: 10px 0; padding: 5px 0"><br>
	<input type="number" name="e" onfocus="this.value=''" value="<?= $data->e ?>" style="width: 200px; margin: 10px 0; padding: 5px 0"><br>
	<?php $flags = array('mtc', 'tcv', 'ttv', 'tf') ?>
	<select name="flag" style="background: #ffeb3b; padding: 5px">
		<?php foreach ($flags as $fl): ?>
			<?php if ($fl == (isset($flag) ? $flag : $data->flag)): ?>
				<option value="<?= $fl ?>" selected><?= $fl ?></option>
			<?php else: ?>
				<option value="<?= $fl ?>"><?= $fl ?></option>
			<?php endif ?>
		<?php endforeach ?>
	</select>
	<input type="submit" name="submit" value="GET" style="padding: 5px; margin-left: 20px">
</form>
<hr>
<p><a href="regex.php">Regex</a></p>