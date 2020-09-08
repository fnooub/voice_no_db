<?php

include 'functions.php';

/**
 * get site
 */
$link = get_var('link');
$flag = get_var('flag');

/**
 * get html
 */
$str = single_curl(trim($link));

/**
 * tieu de
 */
$tieude = '';
$noidung = '';
// metruyenchu
if ($flag == 'mtc') {
	$tieude = get_row('<div class="h1 mb-4 font-weight-normal nh-read__title">', '</div>', $str);
	$noidung = get_row('<div class="nh-read__content.+?>', '</div>\s*<div class="d-flex', $str, false);
}
// tang thu vien
elseif ($flag == 'ttv') {
	$tieude = get_row('<h2>', '</h2>', $str);
	$noidung = get_row('<div class="box-chap box-chap-\d+">', '</div>', $str, false);
}
// truyenfull
elseif ($flag == 'tf') {
	$tieude1 = get_rows('<span itemprop="name">', '</span>', $str);
	$tieude = $tieude1[2];
	$noidung = get_row('<div id="chapter-c" class="chapter-c"><div class="visible-md visible-lg ads-responsive incontent-ad" id="ads-chapter-pc-top" align="center" style="height:90px"></div>', '</div>', $str);
}
// TRUYENCV
elseif ($flag == 'tcv') {
	$tieude = get_row('<h2 class="title">', '</h2>', $str);
	$noidung = get_row('<div class="content" id="js-truyencv-content".+?>', '<div class="fb-like"', $str);
}

/**
 * output
 */
$tieude = trim($tieude);
$noidung = trim($noidung);

/**
 * xu ly html
 */
$noidung = strip_tags($noidung, '<br><p>');
$noidung = preg_replace('/((<br\s*\/?>|<\/?p>)\s*)+/', "\n", $noidung);
$noidung = nl2p($noidung);
$noidung = loc($noidung);


/**
 * show
 */
echo "$tieude<br>➥<br>➥<br><br>$noidung<br>⊙⊙";