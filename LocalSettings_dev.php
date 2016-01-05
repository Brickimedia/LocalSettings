<?php

$wgSitename = "Brickimedia Development";
$wgMetaNamespace = "Development";
$wgPasswordSender = "dev";
$wgPasswordSenderName = "Brickimedia Development";

$wgLogo = "http://images.brickimedia.org/thumb/b/bd/Brickimedia_Technical.png/160px-Brickimedia_Technical.png";
$wgFavicon = "http://images.brickimedia.org/favicons/favicon.ico";

$wgLanguageCode = "en";

$wgShowSQLErrors = true;

$wgDebugLogFile = '/var/log/mw.log';
$wgGroupPermissions['bureaucrat']['userrights'] = true;
$wgGroupPermissions['bureaucrat']['editinterface'] = true;

# Refreshed
$wgRefreshedHeader = array(
	'url' => 'http://dev.brickimedia.org/wiki/Main_Page',
	'img' => '',
	'dropdown' => array(
		'http://meta.brickimedia.org/wiki/Main_Page' => $refreshedMeta,
		'http://en.brickimedia.org/wiki/Main_Page' => $refreshedEn,
		'http://customs.brickimedia.org/wiki/Main_Page' => $refreshedCustoms,
		'http://ideas.brickimedia.org/wiki/Main_Page' => $refreshedIdeas,
		'http://greatballcontraption.com/wiki/Main_Page' => $refreshedGBC
	)
);

# #brickimedia-rc-dev IRC
$wgRC2UDPAddress = '127.0.0.1';
$wgRC2UDPPort = '51663';
$wgRC2UDPPrefix = "";

require_once("$IP/extensions/vote/Vote.php");

# VisualEditor
require_once( "$IP/extensions/UniversalLanguageSelector/UniversalLanguageSelector.php" );
require_once( "$IP/extensions/VisualEditor/VisualEditor.php" );
$wgDefaultUserOptions['visualeditor-enable'] = 1;
$wgVisualEditorParsoidURL = 'http://localhost:8000';
$wgVisualEditorParsoidPrefix = 'dev';
$wgVisualEditorSupportedSkins = array( 'vector', 'monobook', 'deepsea', 'refreshed' );
