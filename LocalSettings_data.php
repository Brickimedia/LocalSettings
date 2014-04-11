<?php

$wgSitename = "Brickidata";
$wgMetaNamespace = "Brickidata";
$wgPasswordSender = "data";
$wgPasswordSenderName = "Brickidata";
$wgLogo = "http://images.brickimedia.org/thumb/a/ab/Brickidata-logo.png/160px-Brickidata-logo.png";
$wgFavicon = "http://images.brickimedia.org/favicons/data.ico";
$wgLanguageCode = "en";
$wgNamespaceAliases = array(
        'BD' => NS_PROJECT,
);

# Wikibase
//require_once( "$IP/extensions/Wikibase/repo/Wikibase.php" );
$baseNs = 100;
// Define the namespace indexes
define( 'WB_NS_PROPERTY', $baseNs + 2 );
define( 'WB_NS_PROPERTY_TALK', $baseNs + 3 );
// Define the namespaces
$wgExtraNamespaces[WB_NS_PROPERTY] = 'Property';
$wgExtraNamespaces[WB_NS_PROPERTY_TALK] = 'Property_talk';
// Assigning the correct content models to the namespaces
//$wgWBRepoSettings['entityNamespaces'][CONTENT_MODEL_WIKIBASE_ITEM] = NS_MAIN;
//$wgWBRepoSettings['entityNamespaces'][CONTENT_MODEL_WIKIBASE_PROPERTY] = WB_NS_PROPERTY;

# SocialProfile
$wgUserStatsPointValues['edit'] = 5; // Points awarded on a mainspace edit
$wgUserStatsPointValues['vote'] = 1; // Points awarded for voting for an article
$wgUserStatsPointValues['comment'] = 1; // Points awarded for leaving a comment
$wgUserStatsPointValues['comment_plus'] = 2; // Points awarded if your comment gets a thumbs up
$wgUserStatsPointValues['comment_ignored'] = 0; // Points awarded if another user ignores your comments
$wgUserStatsPointValues['opinions_created'] = 5; // Points awarded for writing a blog article
$wgUserStatsPointValues['opinions_pub'] = 10; // Points awarded for having that article hit the "Blogs" page
$wgUserStatsPointValues['referral_complete'] = 0; // Points awarded for recruiting a new user
$wgUserStatsPointValues['points_winner_weekly'] = 20; // Points awarded for having the most points for a week
$wgUserStatsPointValues['points_winner_monthly'] = 50; // Points awarded for having the most points for a month
$wgUserStatsPointValues['user_image'] = 5; // Points awarded for adding your first avatar
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
	'Outstanding Brickipedian' => 15000,
	'Honorable Brickipedian' => 20000,
	'Legendary Brickipedian' => 25000,
);

/* Change the main page url used in things like the logo to a url of another page on the wiki */
$wgHooks['SkinTemplateOutputPageBeforeExec'][] = 'lfChangeMainPageURL';
function lfChangeMainPageURL( $sk, &$tpl ) {
        $tpl->data['nav_urls']['mainpage']['href'] = Title::newFromText('Brickidata:Home')->getLocalURL();
        return true;
}

# #brickimedia-rc-data IRC
$wgRC2UDPAddress = '127.0.0.1';
$wgRC2UDPPort = '51662';
$wgRC2UDPPrefix = "";
