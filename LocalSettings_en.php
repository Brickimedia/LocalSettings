<?php

$wgSitename = 'Brickipedia';
$wgMetaNamespace = 'Brickipedia';
$wgNamespaceAliases['BP'] = NS_PROJECT;
$wgPasswordSender = 'brickipedia';
$wgPasswordSenderName = 'Brickipedia';

$wgLogo = 'http://images.brickimedia.org/a/ab/Brickipedia-Wiki-Logo.png';
$wgFavicon = 'http://images.brickimedia.org/favicons/favicon.ico';

$wgLanguageCode = 'en';
$wgDefaultSkin = 'refreshed';

$wgGroupPermissions['*']['edit'] = true;
$wgGroupPermissions['user']['upload'] = false;
$wgGroupPermissions['sysop']['upload'] = true;
$wgGroupPermissions['sysop']['change-rating'] = true;
$wgGroupPermissions['sysadmin']['upload'] = true;
$wgGroupPermissions['*']['createtalk'] = true;
$wgGroupPermissions['*']['createpage'] = true;

// Per https://github.com/Brickimedia/brickimedia/issues/335
$wgGroupPermissions['sysop']['nuke'] = false;

// User groups
$wgAddGroups['sysop'] = array( 'sysop', 'bot', 'patroller', 'newsreporter', 'blockedfromchat' );
$wgRemoveGroups['sysop'] = array( 'sysop', 'bot', 'patroller', 'newsreporter', 'blockedfromchat' );
// Remove the bureaucrat group
$wgGroupPermissions['sysop'] = array_merge( $wgGroupPermissions['sysop'], $wgGroupPermissions['bureaucrat'] );
unset( $wgGroupPermissions['bureaucrat'] );
unset( $wgRevokePermissions['bureaucrat'] );
unset( $wgAddGroups['bureaucrat'] );
unset( $wgRemoveGroups['bureaucrat'] );
unset( $wgGroupsAddToSelf['bureaucrat'] );
unset( $wgGroupsRemoveFromSelf['bureaucrat'] );
// Remove the chat moderator group

unset( $wgGroupPermissions['modchat'] );
unset( $wgRevokePermissions['modchat'] );
unset( $wgAddgroups['modchat'] );
unset( $wgRemoveGroups['modchat'] );
unset( $wgGroupsAddToSelf['modchat'] );
unset( $wgGroupsRemoveFromSelf['modchat'] );
#News namespace
define('NS_NEWS', 2000);
define('NS_NEWS_TALK', 2001);
$wgExtraNamespaces[NS_NEWS] = 'Brickipedia_News';
$wgExtraNamespaces[NS_NEWS_TALK] = 'Brickipedia_News_talk';
$wgNamespaceProtection[NS_NEWS] = array( 'editnews' );
$wgGroupPermissions['*']['editnews'] = false;
$wgGroupPermissions['user']['editnews'] = false;
$wgGroupPermissions['autoconfirmed']['editnews'] = false;
$wgGroupPermissions['newsreporter']['editnews'] = true;
$wgGroupPermissions['sysop']['editnews'] = true;
$wgAddGroups['sysop'][] = 'newsreporter';
$wgRemoveGroups['sysop'][] = 'newsreporter';
$wgContentNamespaces[] = 2000;

#Fan, Inventory and Review namespaces
define('NS_FAN', 112);
define('NS_FAN_TALK', 113);
$wgExtraNamespaces[NS_FAN] = 'Fan';
$wgExtraNamespaces[NS_FAN_TALK] = 'Fan_talk';
$wgNamespacesWithSubpages[NS_FAN] = true;
$wgContentNamespaces[] = 112;

define('NS_INVENTORY', 114);
define('NS_INVENTORY_TALK', 115);
$wgExtraNamespaces[NS_INVENTORY] = 'Inventory';
$wgExtraNamespaces[NS_INVENTORY_TALK] = 'Inventory_talk';
$wgNamespacesWithSubpages[NS_INVENTORY] = true;            //subpages enabled for the review namespace
$wgContentNamespaces[] = 114;

define('NS_REVIEW', 118);
define('NS_REVIEW_TALK', 119);
$wgExtraNamespaces[NS_REVIEW] = 'Review';
$wgExtraNamespaces[NS_REVIEW_TALK] = 'Review_talk';
$wgNamespacesWithSubpages[NS_REVIEW] = true;            //subpages enabled for the review namespace
$wgGroupPermissions['*']['editreview'] = false;
$wgGroupPermissions['autoconfirmed']['editreview'] = true;
$wgGroupPermissions['sysop']['editreview'] = true;
$wgContentNamespaces[] = 118;                           //track namespace in Special:Statistics

define('NS_PART', 120);
define('NS_PART_TALK', 121);
$wgExtraNamespaces[NS_PART] = 'Part';
$wgExtraNamespaces[NS_PART_TALK] = 'Part_talk';
$wgNamespacesWithSubpages[NS_PART] = true;
$wgContentNamespaces[] = 120;                           //track namespace in Special:Statistics

//Semantic MediaWiki -- Do not touch unless you know what you are doing.
$smwgNamespaceIndex = 100;

require_once( "$IP/extensions/SemanticMediaWiki/SemanticMediaWiki.php" );
enableSemantics('en.brickimedia.org');

$smwgShowFactbox = 'SMW_FACTBOX_NONEMPTY';
$smwgQConceptCaching = CONCEPT_CACHE_ALL; //LOTS OF CACHING!!!
$smwgCacheType = CACHE_MEMCACHED;
$smwgPDefaultType = '_txt';
$smwgQEqualitySupport = SMW_EQ_NONE;

$smwgNamespacesWithSemanticLinks[NS_REVIEW] = true;
$smwgNamespacesWithSemanticLinks[NS_INVENTORY] = true;
$smwgNamespacesWithSemanticLinks[NS_NEWS] = true;
$smwgNamespacesWithSemanticLinks[NS_PART] = true;
$smwgNamespacesWithSemanticLinks[NS_FAN] = true;

#Namespace subpages
$wgNamespacesWithSubpages[NS_PROJECT] = true;

#SocialProfile
$wgUserStatsPointValues['edit'] = 5; // Points awarded on a mainspace edit
$wgUserStatsPointValues['vote'] = 1; // Points awarded for voting for an article
$wgUserStatsPointValues['comment'] = 1; // Points awarded for leaving a comment
$wgUserStatsPointValues['comment_plus'] = 2; // Points awarded if your comment gets a thumbs up
$wgUserStatsPointValues['comment_ignored'] = 0; // Points awarded if another user ignores your comments
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
$wgNamespacesForEditPoints = array( 0, 112, 114, 118, 120 ); // Array of namespaces that can earn you points.
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
$wgUserProfileDisplay['stats'] = true;

#for {{colourbox}}
require_once( "$IP/extensions/ImageMap/ImageMap.php" );

/* Change the main page url used in things like the logo to a url of another page on the wiki */
$wgHooks['SkinTemplateOutputPageBeforeExec'][] = 'lfChangeMainPageURL';
function lfChangeMainPageURL( $sk, &$tpl ) {
	$tpl->data['nav_urls']['mainpage']['href'] = Title::newFromText( 'LEGO Wiki' )->getLocalURL();
	return true;
}

#trusted
$wgRestrictionLevels[] = 'trusted';
$wgGroupPermissions['sysop']['trusted'] = true;
$wgGroupPermissions['patroller']['trusted'] = true;

#Namespace Aliases (LC)
$wgNamespaceAliases = array(
	'BP' => NS_PROJECT,
);

#Verbatim
require_once("$IP/extensions/Verbatim/verbatim.php");

# Article Ratings
global $bmMobile;
if ( !$bmMobile ) {
	require_once( "$IP/extensions/EmailCapture/EmailCapture.php" );
	require_once( "$IP/extensions/ArticleFeedbackv5/ArticleFeedbackv5.php" );

	$wgArticleFeedbackLotteryOdds = 100; // Will turn on the voting on all pages
	$wgArticleFeedbackDashboard = true;
}

require_once( "$IP/extensions/WikiArticleFeeds/WikiArticleFeeds.php" );
require_once( "$IP/extensions/CSS/CSS.php" );
require_once( "$IP/extensions/Tabber/Tabber.php" );

// Profiling
$wgEnableProfileInfo = true;
$wgProfileToDatabase = true;

#Snippet
require_once( "$IP/extensions/Snippet/Snippet.php" );

#Donate
require_once( "$IP/extensions/Donate/Donate.php" );

# Refreshed
$wgRefreshedHeader = array(
	'url' => 'http://en.brickimedia.org/wiki/Main_Page',
	'img' => $refreshedEn,
	'dropdown' => array(
		'http://meta.brickimedia.org/wiki/Main_Page' => $refreshedMeta,
		'http://customs.brickimedia.org/wiki/Main_Page' => $refreshedCustoms,
		'http://ideas.brickimedia.org/wiki/Main_Page' => $refreshedIdeas,
		'http://greatballcontraption.com/wiki/Main_Page' => $refreshedGBC,
		//'http://books.brickimedia.org/wiki/Main_Page' => $refreshedBooks,
		//'http://minifigures.brickimedia.org/wiki/Main_Page' => $refreshedMinifigures,
	)
);

# #brickimedia-rc-en IRC
$wgRC2UDPAddress = '127.0.0.1';
$wgRC2UDPPort = '51664';
$wgRC2UDPPrefix = '';

# Parents link in footer
$wgHooks['SkinTemplateOutputPageBeforeExec'][] = 'lfParentsLink';
function lfParentsLink( $sk, &$tpl ) {
	$tpl->set( 'parents', $sk->footerLink( 'parents', 'parentspage' ) );
	$tpl->data['footerlinks']['places'][] = 'parents';
	return true;
}
$wgExtensionMessagesFiles['Parents'] = __DIR__ . '/extensions/i18n/Parents.i18n.php';

// Search fixes
$wgNamespacesToBeSearchedDefault = array(
	NS_MAIN =>           true,
	NS_TALK =>           false,
	NS_USER =>           false,
	NS_USER_TALK =>      false,
	NS_PROJECT =>        false,
	NS_PROJECT_TALK =>   false,
	NS_FILE =>           false,
	NS_FILE_TALK =>      false,
	NS_MEDIAWIKI =>      false,
	NS_MEDIAWIKI_TALK => false,
	NS_TEMPLATE =>       false,
	NS_TEMPLATE_TALK =>  false,
	NS_HELP =>           false,
	NS_HELP_TALK =>      false,
	NS_CATEGORY =>       false,
	NS_CATEGORY_TALK =>  false,
	NS_REVIEW =>         true,
	NS_FAN =>            true,
	NS_INVENTORY =>      true,
	NS_PART =>           true,
	NS_NEWS =>           true
);

// ArticleRatings - must be after wgContentNamespaces
require_once("$IP/extensions/ARE/ArticleRatings.php");
