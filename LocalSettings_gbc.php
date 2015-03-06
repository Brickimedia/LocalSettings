<?php

$wgCookieDomain = ".greatballcontraption.com";

$wgSitename = "The Great Ball Contraption Wiki";
$wgMetaNamespace = "GBC";
$wgPasswordSender = "gbc";
$wgPasswordSenderName = "Great Ball Contraption Wiki";

$wgLogo = "http://images.brickimedia.org/0/05/GBC_logo.png";
$wgFavicon = "http://images.brickimedia.org/favicons/gbc.ico";

$wgLanguageCode = "en";

# Refreshed
$wgRefreshedHeader = array(
	'url' => 'http://greatballcontraption.com/wiki/Main_Page',
	'img' => $refreshedGBC,
	'dropdown' => array(
		'http://meta.brickimedia.org/wiki/Main_Page' => $refreshedMeta,
		'http://en.brickimedia.org/wiki/Main_Page' => $refreshedEn,
		'http://customs.brickimedia.org/wiki/Main_Page' => $refreshedCustoms,
		'http://ideas.brickimedia.org/wiki/Main_Page' => $refreshedIdeas
	)
);