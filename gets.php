<?php

include 'functions.php';

$link = get_var('link');
$flag = get_var('flag');
$s = get_var('s');
$e = get_var('e');

$str = single_curl(base_url('set.php?flag=' . $flag . '&link=' . $link));

$data = json_decode($str, true);

for ($i = $s; $i < $e; $i++) {
	$urls[] = base_url('get.php?flag=' . $flag . '&link=') . $data[$i];
}

$noidung = multi_curl($urls);

$noidung = str_replace('⊙⊙', '…<br>…<br>…<br><br>', $noidung);

echo $noidung;
echo "s=$s&e=$e";