<?php

# Enabled Extensions. Most extensions are enabled by including the base extension file here
# but check specific extension documentation for more details
# The following extensions were automatically enabled.
require_once( "$IP/extensions/AbuseFilter/AbuseFilter.php" );
require_once( "$IP/extensions/AJAXPoll/AJAXPoll.php" );
require_once( "$IP/extensions/BlogPage/Blog.php" );
require_once( "$IP/extensions/Cite/Cite.php" );
require_once( "$IP/extensions/Cite/SpecialCite.php" );
	$wgCiteEnablePopups = true; // Pop-up citations
require_once ( "$IP/extensions/CheckUser/CheckUser.php" );
require_once( "$IP/extensions/CodeEditor/CodeEditor.php" );
require_once( "$IP/extensions/Comments/Comment.php" );
	unset( $wgGroupPermissions['commentadmin'] );
	$wgGroupPermissions['sysop']['commentadmin'] = true;
	$wgCommentsInRecentChanges = true;
require_once( "$IP/extensions/CSS/CSS.php" );
require_once( "$IP/extensions/DPLForum/DPLforum.php" );
require_once( "$IP/extensions/Editcount/Editcount.php" );
require_once( "$IP/extensions/EditUser/EditUser.php" );
require_once( "$IP/extensions/Gadgets/Gadgets.php" );
require_once( "$IP/extensions/GlobalUserrights/GlobalUserrights.php" );
require_once( "$IP/extensions/GlobalBlocking/GlobalBlocking.php" );
require_once( "$IP/extensions/InputBox/InputBox.php" );
require_once( "$IP/extensions/Interwiki/Interwiki.php" );
require_once( "$IP/extensions/VoteNY/Vote.php" );
require_once( "$IP/extensions/MediawikiPlayer/MediawikiPlayer.php" );
require_once( "$IP/extensions/Nuke/Nuke.php" );
require_once( "$IP/extensions/ParserFunctions/ParserFunctions.php" );
	$wgAllowSlowParserFunctions = true;
	$wgPFStringLengthLimit = 10000;
	$wgPFEnableStringFunctions = true;
require_once( "$IP/extensions/ProtectSite/ProtectSite.php" );
require_once( "$IP/extensions/Quantcast/Quantcast.php" );
require_once( "$IP/extensions/RandomSelection/RandomSelection.php" );
require_once( "$IP/extensions/Renameuser/Renameuser.php" );
require_once( "$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php" );
require_once( "$IP/extensions/UserMerge/UserMerge.php" );
require_once( "$IP/extensions/VideoFlash/VideoFlash.php" );
require_once( "$IP/extensions/WikiLove/WikiLove.php" );
	$wgDefaultUserOptions['wikilove-enabled'] = 1;

// User rights
require_once( "$IP/UserRights.php" );

// Uploads
$wgEnableUploads = true;

// Stop those spammers!
require_once( "$IP/extensions/ConfirmEdit/ConfirmEdit.php" );
//...without reCAPTCHA. --southerner
//require_once("$IP/extensions/ConfirmEdit/Asirra.php");
//$wgCaptchaClass = 'Asirra';
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
//QuestyCaptcha is unreliable. --Seahorse
//require_once "$IP/extensions/ConfirmEdit/FancyCaptcha.php";
//$wgCaptchaClass = 'FancyCaptcha';
//$wgCaptchaDirectory = "/var/www/images/captcha";
//$wgCaptchaDirectoryLevels = 0; // Set this to a value greater than zero to break the images into subdirectories
//$wgCaptchaSecret = "brickimediacaptcha7";
//$wgGroupPermissions['autoconfirmed']['skipcaptcha'] = true;
//$wgGroupPermissions['bot']['skipcaptcha'] = true;
//$wgGroupPermissions['sysadmin']['skipcatcha'] = true;
//$wgCaptchaTriggers['edit'] = true;

// Short URLs
$wgArticlePath = "/wiki/$1";
$wgUsePathInfo = true;

// WikiEditor
require_once( "$IP/extensions/WikiEditor/WikiEditor.php" );
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
require_once( "$IP/skins/DeepSea/DeepSea.php" );
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
	$wgWikiForumAllowAnonymous = false; //disabled because of spam
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
include_once("$IP/extensions/HTMLTags/HTMLTags.php");
	$wgHTMLTagsAttributes['iframe'] = array( 'src', 'width', 'height', 'style' );
	$wgHTMLTagsAttributes['form'] = array( 'action', 'method' );
	$wgHTMLTagsAttributes['input'] = array( 'type', 'name', 'value', 'src', 'border', 'alt' );
	$wgHTMLTagsAttributes['img'] = array( 'alt', 'border', 'src', 'width', 'height' );

$wgExtraNamespaces[500] = "User_blog";

// Render pdfs
require_once( "$IP/extensions/PdfHandler/PdfHandler.php" );
$wgPdfProcessor = 'gs';
$wgPdfPostProcessor = 'convert';
$wgPdfInfo = 'pdfinfo';

// More extensions
require_once( "$IP/extensions/GlobalUsage/GlobalUsage.php" );
	$wgGlobalUsageDatabase = 'meta';
require_once( "$IP/extensions/AntiSpoof/AntiSpoof.php" );
	$gcwikis = array( 'meta', 'en', 'customs', 'cuusoo', 'stories', 'dev' );
require_once( "$IP/extensions/GlobalContribs/GlobalContribs.php" );
require_once( "$IP/extensions/MediaWikiChat/MediaWikiChat.php" );
	$wgChatKicks = true;
	$gaAccount = "UA-38958899-1";
require_once( "$IP/extensions/googleAnalytics/googleAnalytics.php" );
	$wgGlobalCssJsUrl = 'http://meta.brickimedia.org/index.php';
require_once( "$IP/extensions/GlobalCssJs/GlobalCssJs.php" );

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
				"name" => "Brickipedia"
		),
		"customs" => array(
				"db" => "customs",
				"url" => "http://customs.brickimedia.org/wiki/",
				"name" => "Customs"
		),
		"cuusoo" => array(
				"db" => "cuusoo",
				"url" => "http://cuusoo.brickimedia.org/wiki/",
				"name" => "Cuusoo"
		),
		"stories" => array(
				"db" => "stories",
				"url" => "http://stories.brickimedia.org/wiki/",
				"name" => "Stories"
		),
		"admin" => array(
				"db" => "admin",
				"url" => "http://admin.brickimedia.org/wiki/",
				"name" => "Admin"
		),
		"dev" => array(
				"db" => "dev",
				"url" => "http://dev.brickimedia.org/wiki/",
				"name" => "Development"
		)
);

// Email settings
$wgEnotifWatchlist = true;
$wgEnotifUserTalk = true;
$wgDefaultUserOptions['enotifwatchlistpages'] = 0;
$wgDefaultUserOptions['enotifusertalkpages'] = 1;

// Phalanx
require_once("$IP/extensions/Phalanx/Phalanx.php");
