<?php

$projects = array(
	array(
		'name' => 'BootChamp',
		'version' => '1.7',
		'date' => mktime(0, 0, 0, 8, 15, 2015),
		'summary' => 'Quickly boot into Windows',
		'link' => '/downloads/BootChamp.zip',
		'link_label' => 'download for 10.6+ (64-bit only)',
		'image' => 'images/bootchamp_icon.png',
	),
	array(
		'name' => 'Semulov',
		'version' => '2.1',
		'date' => mktime(0, 0, 0, 8, 16, 2015),
		'summary' => 'Eject volumes from the menu bar',
		'link' => '/downloads/Semulov.zip',
		'link_label' => 'download for 10.7+',
		'image' => 'images/semulov_icon.png',
	),
	array(
		'name' => 'DropJPG',
		'version' => '5.0',
		'date' => mktime(0, 0, 0, 1, 24, 2015),
		'summary' => 'Batch convert images to jpg',
		'link' => '/downloads/DropJPG.zip',
		'link_label' => 'download for 10.8+',
		'image' => 'images/dropjpg_icon.png',
	),
	array(
		'name' => 'CrashCrier',
		'version' => '1.0.1',
		'date' => mktime(0, 0, 0, 7, 26, 2014),
		'summary' => 'Be notified when a process crashes',
		'link' => '/downloads/CrashCrier.zip',
		'link_label' => 'download for 10.8+',
		'image' => 'images/crashcrier_icon.png',
	),
	array(
		'name' => 'ScriptQL',
		'version' => '1.1',
		'date' => mktime(0, 0, 0, 9, 6, 2012),
		'summary' => 'AppleScript Quick Look plugin',
		'link' => '/downloads/ScriptQL_qlgenerator.zip',
		'link_label' => 'download for 10.6+',
		'image' => 'images/scriptqlIconShot.png',
		'is_screenshot' => true,
	),
	array(
		'name' => 'BBEncoder',
		'version' => '1.1',
		'date' => mktime(0, 0, 0, 2, 28, 2012),
		'summary' => 'Convert rich text to BBCode',
		'link' => '/downloads/BBEncoder.zip',
		'link_label' => 'download for 10.5+',
		'image' => 'images/bbencoder_icon.png',
	),
	array(
		'name' => 'Spread',
		'version' => '1.0.1',
		'date' => mktime(0, 0, 0, 2, 28, 2012),
		'summary' => 'Colorful screensaver',
		'link' => '/downloads/Spread.zip',
		'link_label' => 'download for 10.6+',
		'image' => 'images/spreadIconShot.png',
	),
	array(
		'name' => 'Pellucid',
		'version' => '1.0.1',
		'date' => mktime(0, 0, 0, 10, 18, 2012),
		'summary' => 'Dimmed desktop screensaver',
		'link' => '/downloads/Pellucid.saver.zip',
		'link_label' => 'download for 10.6+',
		'image' => 'images/screensaver_icon.png',
	),
	array(
		'name' => 'FoolSaver',
		'version' => '1.2.1',
		'date' => mktime(0, 0, 0, 8, 20, 2014),
		'summary' => 'Mimic Windows logo screensaver',
		'link' => '/downloads/FoolSaver.zip',
		'link_label' => 'download for 10.7+',
		'image' => 'images/screensaver_icon.png',
	),
);

$now = time();
$new_days = 86400 * 15;
foreach ($projects as &$proj) {
	$proj['new'] = ($now - $proj['date']) <= $new_days;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>kainjow</title>
	<style type="text/css">
	body {
		margin: 0;
		padding: 10px;
	}
	#body {
		width: 650px;
		font-family: sans-serif;
		margin: 0 auto;
	}
	#header {
		width: 100%;
		height: 100px;
		background-color: black;
		background-image: url(images/kainjow.png);
		background-position: center;
		background-repeat: no-repeat;
	}
	a {
		color: #0060ff;
		text-decoration: none;
	}
	a:hover {
		text-decoration: underline;
	}
	#about {
		font-size: 12pt;
	}
	.projectsrow {
		width: 100%;
	}
	.product {
		width: 200px;
		float: left;
	}
	.productspacer {
		width: 25px;
		float: left;
	}
	.productverspacer {
		clear: left;
		height: 25px;
	}
	.product p {
		margin-top: 0.25em;
		text-align: center;
		font-size: 10pt;
	}
	.product .icon {
		width: 128px;
		height: 128px;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}
	.product .iconShot {
		border: 1px solid rgb(175,175,175);
	}
	.product .dllink {
		font-size: 8pt;
	}
	.product .updated {
		font-size: 8pt;
		color: #b03a3a;
		color: gray;
	}
	.footer {
		clear: left;
		padding-top: 20px;
		font-size: 8pt;
		text-align: center;
	}
	.footer a {
		text-decoration: underline;
		color: #888;
	}
	.isnew {
		font-weight: bold;
		color: #fa0000;
	}
	</style>
</head>
<body>

<div id="body">

<div id="header"></div>
<div id="content">

<div id="about">
<p>Hello! My name is Kevin Wojniak and this is my website. Nice of you to stop by.</p>
<p>Below are my current projects. Source code is available on <a href="https://github.com/kainjow">GitHub</a>.</p>
<p>Visit my <a href="http://kainjow.tumblr.com">blog</a> for the latest updates, or you can <a href="http://twitter.com/kainjow">follow</a> me on Twitter.</p>
<p>Contact me: kainjow@<span style="display:none">null</span>kain<span style="display:none">@blah</span>jow.com</p>
</div>

<?php
$per_row = 3;
$project_rows = array();
for ($i = 0; $i < count($projects); $i++) {
	if ($i % $per_row == 0) {
		$project_rows[] = array();
	}
	$project_rows[count($project_rows) - 1][] = $projects[$i];
}

$num_rows = count($project_rows);
for ($row = 0; $row < $num_rows; $row++) {
	$project_row = $project_rows[$row];
?>
<div class="projectsrow">
<?php
	for ($i = 0; $i < count($project_row); $i++) {
		$proj = $project_row[$i];
		$img_class = isset($proj['is_screenshot']) && $proj['is_screenshot'] ? 'icon iconShot' : 'icon';
?>

	<div class="product">
		<img class="<?= $img_class ?>" src="<?= $proj['image']; ?>" alt="icon" />
		<p>
		<strong><?= $proj['name']; ?></strong> <?= $proj['version']; ?><?php if ($proj['new']) { ?> <span class="isnew">NEW</span><?php } ?><br/>
		<span class="updated"><?= date('F j, Y', $proj['date']); ?></span><br/>
		<?= $proj['summary']; ?><br/>
		<a href="<?= $proj['link']; ?>" class="dllink"><?= $proj['link_label']; ?></a>
		</p>
	</div>
	
<?php
		if ($i < (count($project_row) - 1)) {
?>
	<div class="productspacer">&nbsp;</div>
<?php
		}
	}
?>
</div>
<?php
	if ($row < ($num_rows - 1)) {
?>
<div class="productverspacer"></div>
<?php
	}
}
?>

<div class="footer">
	<a href="olderdownloads.htm">Older downloads</a> | <a href="donate.htm">Donate</a>
</div>

</div>
</div>

</body>
</html>
