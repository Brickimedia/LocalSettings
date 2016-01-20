<?php

# Enabled Extensions. Most extensions are enabled by including the base extension file here
# but check specific extension documentation for more details
# The following extensions were automatically enabled.
wfLoadExtensions( array(
	'AJAXPoll',
	'BlogPage',
	'Cite',
	'CheckUser',
	'CodeEditor',
	'Comments',
	'ConfirmEdit',
	'Editcount',
	//'EditUser',
	'EmbedVideo',
	'Gadgets',
	'GlobalCssJs',
	'GlobalUsage',
	'InputBox',
	'Interwiki',
	'MultimediaViewer',
	'Nuke',
	'ParserFunctions',
	'PdfHandler',
	//'ProtectSite',
	'Renameuser',
	'SiteMatrix',
	'SpamBlacklist',
	'UserMerge',
	'WikiLove',
	'WikiEditor'
) );

require_once( "$IP/extensions/AbuseFilter/AbuseFilter.php" );
require_once( "$IP/extensions/GlobalPreferences/GlobalPreferences.php" );

// BlogPage extension settings
$wgBlogPageDisplay['leftcolumn'] = false;
$wgBlogPageDisplay['rightcolumn'] = false;
	
// Cite extension settings
$wgCiteEnablePopups = true; // Pop-up citations

// Comment extension settings
unset( $wgGroupPermissions['commentadmin'] );
$wgGroupPermissions['sysop']['commentadmin'] = true;
$wgCommentsInRecentChanges = true;
$wgCommentsSortDescending = true;
	
require_once( "$IP/extensions/CSS/CSS.php" );
require_once( "$IP/extensions/DPLForum/DPLforum.php" );
require_once( "$IP/extensions/GlobalUserrights/GlobalUserrights.php" );
require_once( "$IP/extensions/GlobalBlocking/GlobalBlocking.php" );

// GlobalPreferences settings
$wgGlobalPreferencesDB = 'shared';
	
require_once( "$IP/extensions/VoteNY/Vote.php" );
require_once( "$IP/extensions/MediawikiPlayer/MediawikiPlayer.php" );
// ParserFunctions settings
	$wgAllowSlowParserFunctions = true;
	$wgPFStringLengthLimit = 10000;
	$wgPFEnableStringFunctions = true;
require_once( "$IP/extensions/Quantcast/Quantcast.php" );
require_once( "$IP/extensions/RandomSelection/RandomSelection.php" );
// require_once( "$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php" ); disabled while it breaks
require_once( "$IP/extensions/UserMerge/UserMerge.php" );
require_once( "$IP/extensions/VideoFlash/VideoFlash.php" ); // both VideoFlash and Embed video for the mo
require_once( "$IP/extensions/EmbedVideo/EmbedVideo.php" );  // EmbedVideo recommended though
// WikiLove settings
	$wgDefaultUserOptions['wikilove-enabled'] = 1;
require_once( "$IP/extensions/PageInCat/PageInCat.php" );
require_once( "$IP/extensions/NumerAlpha/NumerAlpha.php" );

// SocialProfile. More details in individual LSs
require_once( "$IP/extensions/SocialProfile/SocialProfile.php" );
require_once( "$IP/extensions/SocialProfile/UserStats/EditCount.php"); // Necessary edit counter
unset( $wgSpecialPages['GiveGift'] ); // remove Special:GiveGift
unset( $wgSpecialPages['ViewGifts'] ); // remove Special:ViewGifts
$wgAvatarKey = 'global'; // global avatars
$wgUserProfileThresholds = array( 'edits' => 5 ); // preventing spam

// Uploads
$wgEnableUploads = true;

// Stop those spammers!
require_once( "$IP/extensions/ConfirmEdit/ConfirmEdit.php" );
// ...without reCAPTCHA. --southerner
// require_once("$IP/extensions/ConfirmEdit/Asirra.php");
// $wgCaptchaClass = 'Asirra';
require_once( "$IP/extensions/ConfirmEdit/QuestyCaptcha.php" );
$wgCaptchaClass = 'QuestyCaptcha';
$arr = array (
        "What is Brickimedia about?" => "LEGO",
        'Please write the magic word, "energy", here:' => 'energy',
        'Type the code word, 329, here:' => '329',
        'What is half of 6?' => '3',
        'Write the number 4 in letters:' => 'four',
);
foreach ( $arr as $key => $value ) {
        $wgCaptchaQuestions[] = array( 'question' => $key, 'answer' => $value );
}

// QuestyCaptcha is unreliable. --Seahorse
// require_once "$IP/extensions/ConfirmEdit/FancyCaptcha.php";
// $wgCaptchaClass = 'FancyCaptcha';
// $wgCaptchaDirectory = "/var/www/images/captcha";
// $wgCaptchaDirectoryLevels = 0; // Set this to a value greater than zero to break the images into subdirectories
// $wgCaptchaSecret = "brickimediacaptcha7";
$wgGroupPermissions['autoconfirmed']['skipcaptcha'] = true;
$wgGroupPermissions['bot']['skipcaptcha'] = true;
$wgGroupPermissions['sysadmin']['skipcaptcha'] = true;
$wgGroupPermissions['sysop']['skipcaptcha'] = true;
// $wgCaptchaTriggers['edit'] = true;

// Short URLs
$wgArticlePath = "/wiki/$1";
$wgUsePathInfo = true;

// WikiEditor
$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
$wgDefaultUserOptions['wikieditor-preview'] = 0;
$wgDefaultUserOptions['wikieditor-publish'] = 0;

// Experimental live preview
$wgDefaultUserOptions['uselivepreview'] = 1;

// DISPLAYTITLE
$wgRestrictDisplayTitle = false;

// Brickimedia Footer Icon
$wgFooterIcons['brickimedia']['brickimedia'] = array(
	"src" => "http://www.brickimedia.org/img/brickimedia-tag.png",
	"url" => "http://www.brickimedia.org",
	"alt" => "Brickimedia",
	"height" => "31",
	"width" => "88"
);

// Terms of Use link in footer
$wgHooks['SkinTemplateOutputPageBeforeExec'][] = 'lfTOULink';
function lfTOULink( $sk, &$tpl ) {
	$tpl->set( 'termsofuse', $sk->footerLink( 'termsofuse', 'termsofusepage' ) );
	$tpl->data['footerlinks']['places'][] = 'termsofuse';
	return true;
}

$wgExtensionMessagesFiles['TermsOfUse'] = dirname( __FILE__ ) . '/extensions/i18n/TermsOfUse.i18n.php';

// Messages
$wgExtensionMessagesFiles['defaultMessages'] = dirname( __FILE__ ) . '/extensions/i18n/defaultMessages.i18n.php';
$wgExtensionMessagesFiles['UserGroups'] = dirname( __FILE__ ) . '/extensions/i18n/UserGroups.i18n.php';

// Autoconfirmed
$wgAutoConfirmAge = 86400*3;
$wgAutoConfirmCount = 5;

// Skins
//LS_global MUST be before deepsea is included!
wfLoadSkins( array(
	'Vector',
	'MonoBook',
	'DeepSea'
) );
#require_once( "$IP/skins/monaco/monaco.php" );
$wgSkipSkins = array( 'liamobile' );

//User skin files
$wgAllowUserCss = true;
$wgAllowUserJs = true;

// Force enhanced rc
$wgDefaultUserOptions['usenewrc'] = 1;

// For the forums //turn off caching?
$wgShowExceptionDetails = true;

// WikiForum
require_once( "$IP/extensions/WikiForum/WikiForum.php" );
	$wgWikiForumAllowAnonymous = true; // CAPTCHAs now shown
	unset( $wgAvailableRights['wikiforum-admin'] );
	unset( $wgAvailableRights['wikiforum-moderator'] );
	unset( $wgGroupPermissions['forumadmin'] );
	unset( $wgGroupPermissions['forumadmin'] );
	$wgGroupPermissions['sysop']['wikiforum-admin'];
	$wgGroupPermissions['sysop']['wikiforum-moderator'];

// Upload by url/external images
$wgAllowCopyUploads = true;
$wgCopyUploadsFromSpecialUpload = true;
$wgAllowExternalImages = true;

// HTML (feel free to disable; testing still)
include_once( "$IP/extensions/HTMLTags/HTMLTags.php" );
	$wgHTMLTagsAttributes['iframe'] = array( 'src', 'width', 'height', 'style' );
	$wgHTMLTagsAttributes['form'] = array( 'action', 'method' );
	$wgHTMLTagsAttributes['input'] = array( 'type', 'name', 'value', 'src', 'border', 'alt' );
	$wgHTMLTagsAttributes['img'] = array( 'alt', 'border', 'src', 'width', 'height' );

$wgExtraNamespaces[500] = "User_blog";

// Pdfhandler settings
$wgPdfProcessor = 'gs';
$wgPdfPostProcessor = 'convert';
$wgPdfInfo = 'pdfinfo';

// GlobalUsage settings
$wgGlobalUsageDatabase = 'meta';

require_once( "$IP/extensions/AntiSpoof/AntiSpoof.php" );
require_once( "$IP/extensions/GlobalContribs/GlobalContribs.php" );
require_once( "$IP/extensions/MediaWikiChat/MediaWikiChat.php" );
	$wgChatKicks = true;
	$wgChatMeCommand = true;
	$wgChatLinkUsernames = true;

require_once( "$IP/extensions/googleAnalytics/googleAnalytics.php" );

//Global new talk page message alerts
require_once( "$IP/extensions/NewTalkGlobal/NewTalkGlobal.php" );
$newTalkGlobalDatabases = array(
		"meta" => array(
				"db" => "meta",
				"url" => "http://meta.brickimedia.org/wiki/",
				"name" => "Meta"
		),
		"en" => array(
				"db" => "en",
				"url" => "http://en.brickimedia.org/wiki/",
				"name" => "Brickipedia (en)"
		),
		"customs" => array(
				"db" => "customs",
				"url" => "http://customs.brickimedia.org/wiki/",
				"name" => "Brickimedia Customs"
		),
		"ideas" => array(
				"db" => "ideas",
				"url" => "http://ideas.brickimedia.org/wiki/",
				"name" => "LEGO Ideas Wiki"
		),
		"gbc" => array(
				"db" => "gbc",
				"url" => "http://greatballcontraption/wiki/",
				"name" => "Great Ball Contraption Wiki"
		),
		"admin" => array(
				"db" => "admin",
				"url" => "http://admin.brickimedia.org/wiki/",
				"name" => "Brickimedia Admin Wiki"
		)
);

// Email settings
$wgEnotifWatchlist = true;
$wgEnotifUserTalk = true;
$wgDefaultUserOptions['enotifwatchlistpages'] = 0;
$wgDefaultUserOptions['enotifusertalkpages'] = 1;

//SiteMatrix settings
$wgSiteMatrixFile = "$IP/langlist";
$wgSiteMatrixSites = array(
	'bricki' => array(
		'name' => 'Brickipedia',
		'host' => 'en.brickimedia.org',
		'prefix' => 'b',
	),
	'customs' => array(
		'name' => 'Brickimedia Customs',
		'host' => 'customs.brickimedia.org',
		'prefix' => 'c',
	),
	'gbc' => array(
		'name' => 'Great Ball Contraption Wiki',
		'host' => 'greatballcontraption.com',
		'prefix' => 'gbc',
	),
	'ideas' => array(
		'name' => 'LEGO Ideas Wiki',
		'host' => 'ideas.brickimedia.org',
		'prefix' => 'i',
	),
	'meta' => array(
		'name' => 'Meta',
		'host' => 'meta.brickimedia.org',
		'prefix' => 'm',
	),
);
$wgLocalDatabases = array( 'en', 'customs', 'gbc', 'ideas', 'meta', 'admin');
$wgConf->wikis = $wgLocalDatabases;

// Echo
require_once( "$IP/extensions/Echo/Echo.php" );

// Thanks settings
$wgThanksSendToBots = false;
$wgThanksLogging = true;
$wgThanksConfirmationRequired = true;

// User rights
require_once( "$IP/UserRights.php" );

// More extensions
require_once( "$IP/extensions/Renameuser/Renameuser.php" );

// SpamBlacklist settings
$wgBlacklistSettings['email']['files'] = array( 'http://meta.brickimedia.org/index.php?title=MediaWiki:Email-blacklist&action=raw&sb_ver=1' );

//Global CSS/JS settings
$wgGlobalCssJsConfig = array(
	'wiki' => 'meta',
	'source' => 'meta',
);
$wgResourceLoaderSources['metawiki'] = array(
	'apiScript' => 'http://meta.brickimedia.org/api.php',
	'loadScript' => 'http://meta.brickimedia.org/load.php',
);
