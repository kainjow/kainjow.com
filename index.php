<?php

$projects = array(
	'Apps' => array(
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
			'version' => '2.1.1',
			'date' => mktime(0, 0, 0, 9, 9, 2015),
			'summary' => 'Eject volumes from the menu bar',
			'link' => '/downloads/Semulov.zip',
			'link_label' => 'download for 10.7+',
			'image' => 'images/semulov_icon.png',
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
			'name' => 'DropJPG',
			'version' => '5.0',
			'date' => mktime(0, 0, 0, 1, 24, 2015),
			'summary' => 'Batch convert images to jpg',
			'link' => '/downloads/DropJPG.zip',
			'link_label' => 'download for 10.8+',
			'image' => 'images/dropjpg_icon.png',
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
	),
	'Screensavers' => array(
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
	),
	'Miscellaneous' => array(
		array(
			'name' => 'ScriptQL',
			'version' => '1.1',
			'date' => mktime(0, 0, 0, 9, 6, 2012),
			'summary' => 'AppleScript Quick Look plugin',
			'link' => '/downloads/ScriptQL_qlgenerator.zip',
			'link_label' => 'download for 10.6+',
			'image' => 'images/scriptqlIconShot.png',
			'is_screenshot' => true,
		)
	),
);

$now = time();
$new_days = 86400 * 15;
foreach ($projects as $groupName => &$subProjects) {
	foreach ($subProjects as &$proj) {
		$proj['new'] = ($now - $proj['date']) <= $new_days;
	}
}
unset($proj); // http://stackoverflow.com/a/31043429/412179

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>kainjow</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>

<div class="container">
		
	<div class="logo">
	<a href="/"><img class="img-responsive center-block" src="images/kainjow.png" alt="kainjow"></a>
	</div>
	
	<div class="margintop">
	<p>Hello! My name is Kevin Wojniak and this is my website. Nice of you to stop by.</p>
	<p>Below are my current projects. Source code is available on <a href="https://github.com/kainjow">GitHub</a>.</p>
	<p>Visit my <a href="http://kainjow.tumblr.com">blog</a> or follow me on <a href="https://twitter.com/kainjow">Twitter</a> for the latest updates. You can also <a href="email.php">email</a> me.</p>
	</div>
	
	<div class="alert alert-warning text-center"><p>
		<a href="http://kainjow.tumblr.com/post/128933657269/bootchamp-and-el-capitan" class="alert-link">Import information about BootChamp and OS X El Capitan</a>
	</p></div>
	
	<?php foreach ($projects as $groupName => $groupProjects): ?>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?= $groupName ?></h3>
	  </div>

	<div class="panel-body">
	<div class="row">	
	
		<?php foreach ($groupProjects as $proj): ?>
		<div class="col-sm-4 col-xs-6 margintop">
		<img class="img-responsive center-block producticon" src="<?= $proj['image']; ?>" alt="<?= $proj['name']; ?>">
		<p class="text-center productinfo">
		<span class="projectname"><strong><?= $proj['name'] ?></strong> <?= $proj['version'] ?></span><?php if ($proj['new']): ?> <span class="isnew">NEW</span><?php endif ?><br>
		<span class="updated"><?= date('F j, Y', $proj['date']); ?></span><br>
	  	<?= $proj['summary'] ?><br>
	  	<small><a href="<?= $proj['link'] ?>"><?= $proj['link_label'] ?></a></small>
		</p>
		</div>
		<?php endforeach ?>
    </div>	
	</div>
</div>
	<?php endforeach ?>
	
	<div>
	<p class="footer text-center margintop">
		<a href="/downloads/archives/">Download Archives</a> | <a href="donate.php">Donate</a><br>
		Copyright <?= date('Y'); ?> Kevin Wojniak
	</p>
	</div>

</div>

</body>
</html>
