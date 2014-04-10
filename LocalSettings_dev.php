<?php

$wgSitename = "Brickimedia Development";
$wgMetaNamespace = "Development";
$wgPasswordSender = "dev";
$wgPasswordSenderName = "Brickimedia Development";

$wgLogo = "http://images.brickimedia.org/thumb/b/bd/Brickimedia_Technical.png/160px-Brickimedia_Technical.png";
$wgFavicon = "http://images.brickimedia.org/favicons/favicon.ico";

$wgLanguageCode = "en";

//forums
require_once("$IP/extensions/WikiForum/WikiForum.php");

#$wgMediaWikiAuthAPIURL = 'http://lego.wikia.com/api.php';
#$wgMediaWikiAuthPrefsURL = 'http://lego.wikia.com/wiki/Special:Preferences';
#require_once("$IP/extensions/MediaWikiAuth/MediaWikiAuth.php");
#$wgAuth = new MediaWikiAuthPlugin();

#SocialProfile
require_once("$IP/extensions/SocialProfile/SocialProfile.php");
require_once("$IP/extensions/SocialProfile/UserStats/EditCount.php"); // Necessary edit counter
$wgUserStatsPointValues['edit'] = 5; // Points awarded on a mainspace edit
$wgUserStatsPointValues['vote'] = 1; // Points awarded for voting for an article
$wgUserStatsPointValues['comment'] = 1; // Points awarded for leaving a comment
$wgUserStatsPointValues['comment_plus'] = 2; // Points awarded if your comment gets a thumbs up
$wgUserStatsPointValues['comment_ignored'] = 0; // Points awarded if another user ignores your comments
$wgUserStatsPointValues['opinions_created'] = 5; // Points awarded for writing a blog article
$wgUserStatsPointValues['opinions_pub'] = 10; // Points awarded for having that article hit the "Blogs" page
$wgUserStatsPointValues['referral_complete'] = 0; // Points awarded for recruiting a new user
$wgUserStatsPointValues['friend'] = 1; // Points awarded for adding a friend
$wgUserStatsPointValues['foe'] = 0; // Points awarded for adding a foe
$wgUserStatsPointValues['gift_rec'] = 10; // Points awarded for receiving a gift
$wgUserStatsPointValues['gift_sent'] = 0; // Points awarded for giving a gift
$wgUserStatsPointValues['points_winner_weekly'] = 20; // Points awarded for having the most points for a week
$wgUserStatsPointValues['points_winner_monthly'] = 50; // Points awarded for having the most points for a month
$wgUserStatsPointValues['user_image'] = 5; // Points awarded for adding your first avatar
$wgUserStatsPointValues['poll_vote'] = 0; // Points awarded for taking a poll
$wgUserStatsPointValues['quiz_points'] = 0; // Points awarded for answering a quiz question
$wgUserStatsPointValues['quiz_created'] = 0; // Points awarded for creating a quiz question
$wgNamespacesForEditPoints = array( 0, ); // Array of namespaces that can earn you points. Use numerical keys. 0 is mainspace, 4 is project
// The actual user level definitions -- key is simple: 'Level name' => points needed
$wgUserLevels = array(
        'Newcomer' => 0,
        'Beginner' => 500,
        'Novice' => 1000,
        'Amateur' => 1500,
        'Thinking With Bricks' => 2000,
        'Bricktastic' => 2500,
        'Building Bigger' => 5000,
        'Brick Master' => 7500,
        'Master Builder' => 10000,
        'LEGO Wizard' => 12500,
        'Outstanding Brickimedian' => 15000,
        'Honorable Brickimedian' => 20000,
        'Legendary Brickimedian' => 25000,
);
$wgUserProfileDisplay['stats'] = true;

$wgShowSQLErrors = true;

$wgDebugLogFile = '/var/log/mw.log';
$wgGroupPermissions['bureaucrat']['userrights'] = true;
$wgGroupPermissions['bureaucrat']['editinterface'] = true;

// BetaFeatures
require_once( "$IP/extensions/BetaFeatures/BetaFeatures.php" );

// MultimediaViewer
require_once( "$IP/extensions/MultimediaViewer/MultimediaViewer.php" );

// VisualEditor
require_once( "$IP/extensions/VisualEditor/VisualEditor.php" );
$wgVisualEditorSupportedSkins = array( 'vector', 'deepsea', 'lia', 'refreshed' );

// Echo
require_once( "$IP/extensions/Echo/Echo.php" );

// ArticleRatings - SirComputer testing to see if it could be used on LSW, but content on Dev not loading.
// require_once( "$IP/extensions/ARE/ArticleRatings.php" );

# Refreshed
$wgRefreshedHeader = array(
	'url' => 'http://dev.brickimedia.org/wiki/Main_Page',
	'img' => $refreshedDev,
	'dropdown' => array(
		'http://meta.brickimedia.org/wiki/Main_Page' => $refreshedMeta,
		'http://en.brickimedia.org/wiki/Main_Page' => $refreshedEn,
		'http://customs.brickimedia.org/wiki/Main_Page' => $refreshedCustoms,
		'http://stories.brickimedia.org/wiki/Main_Page' => $refreshedStories,
		'http://cuusoo.brickimedia.org/wiki/Main_Page' => $refreshedCuusoo,
	)
);

# #brickimedia-rc-dev IRC
$wgRC2UDPAddress = '127.0.0.1';
$wgRC2UDPPort = '51663';
$wgRC2UDPPrefix = "";

require_once ( "$IP/extensions/UniversalLanguageSelector/UniversalLanguageSelector.php" );
include_once("$IP/extensions/Translate/Translate.php");
$wgGroupPermissions['translator']['translate'] = true;
