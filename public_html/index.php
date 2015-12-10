<?php
$rootdir = dirname(__DIR__);
require $rootdir . '/vendor/autoload.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem($rootdir . '/templates');
$twig = new Twig_Environment($loader, array(
    'cache' => $rootdir . '/twig_cache',
	//'auto_reload' => true, // turn on for debugging
));

$app = new \Slim\Slim();

$app->get('/', function () use ($app, $twig) {
	$projects = array(
		'Apps' => array(
			array(
				'name' => 'BootChamp',
				'version' => '1.7',
				'date' => mktime(0, 0, 0, 8, 15, 2015),
				'summary' => 'Quickly boot into Windows',
				'link' => '/downloads/BootChamp.zip',
				'link_label' => 'download for 10.6+ (64-bit only)',
				'image' => '/images/bootchamp_icon.png',
			),
			array(
				'name' => 'Semulov',
				'version' => '2.1.1',
				'date' => mktime(0, 0, 0, 9, 9, 2015),
				'summary' => 'Eject volumes from the menu bar',
				'link' => '/downloads/Semulov.zip',
				'link_label' => 'download for 10.7+',
				'image' => '/images/semulov_icon.png',
			),
			array(
				'name' => 'CrashCrier',
				'version' => '1.0.1',
				'date' => mktime(0, 0, 0, 7, 26, 2014),
				'summary' => 'Be notified when a process crashes',
				'link' => '/downloads/CrashCrier.zip',
				'link_label' => 'download for 10.8+',
				'image' => '/images/crashcrier_icon.png',
			),
			array(
				'name' => 'DropJPG',
				'version' => '5.0',
				'date' => mktime(0, 0, 0, 1, 24, 2015),
				'summary' => 'Batch convert images to jpg',
				'link' => '/downloads/DropJPG.zip',
				'link_label' => 'download for 10.8+',
				'image' => '/images/dropjpg_icon.png',
			),
			array(
				'name' => 'BBEncoder',
				'version' => '1.1',
				'date' => mktime(0, 0, 0, 2, 28, 2012),
				'summary' => 'Convert rich text to BBCode',
				'link' => '/downloads/BBEncoder.zip',
				'link_label' => 'download for 10.5+',
				'image' => '/images/bbencoder_icon.png',
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
				'image' => '/images/spreadIconShot.png',
			),
			array(
				'name' => 'Pellucid',
				'version' => '1.0.1',
				'date' => mktime(0, 0, 0, 10, 18, 2012),
				'summary' => 'Dimmed desktop screensaver',
				'link' => '/downloads/Pellucid.saver.zip',
				'link_label' => 'download for 10.6+',
				'image' => '/images/screensaver_icon.png',
			),
			array(
				'name' => 'FoolSaver',
				'version' => '1.2.1',
				'date' => mktime(0, 0, 0, 8, 20, 2014),
				'summary' => 'Mimic Windows logo screensaver',
				'link' => '/downloads/FoolSaver.zip',
				'link_label' => 'download for 10.7+',
				'image' => '/images/screensaver_icon.png',
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
				'image' => '/images/scriptqlIconShot.png',
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

	echo $twig->render('index.htm.twig', [
		'projects' => $projects,
	]);
});

$app->get('/email', function () use ($twig) {
	echo $twig->render('email.htm.twig');
});

$app->run();
