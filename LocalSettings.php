<?php

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath      = "";
$wgScriptExtension = ".php";
$wgArticlePath     = "/wiki/$1";
$wgUsePathInfo     = true;

## The relative URL path to the skins directory
$wgStylePath = "$wgScriptPath/skins";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgStylePath/common/images/wiki.png";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "apache@brickimedia.org";

$wgEnotifUserTalk      = false; # UPO
$wgEnotifWatchlist     = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = "localhost";
require_once( __DIR__ . '/LocalSettings_private.php' );

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_MEMCACHED;
$wgMemCachedServers = array( "127.0.0.1:11211" );

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "en";

$wgSecretKey = "7a153e24c3f406320959859ee859bc5e679b2bd41d6fa77fc355914588f1014d";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "4d6c44c3c40f5030";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsUrl  = "http://creativecommons.org/licenses/by-sa/3.0/";
$wgRightsText = "a Creative Commons Attribution-ShareAlike 3.0 license";
$wgRightsIcon = "http://meta.brickimedia.org/skins/common/images/cc-by-sa.png";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Query string length limit for ResourceLoader. You should only set this if
# your web server has a query string length limit (then set it to that limit),
# or if you have suhosin.get.max_value_length set in php.ini (then set it to
# that value)
$wgResourceLoaderMaxQueryLength = 512;

# PROJECT CONFIGURATION
if( $wgCommandLineMode ) {
	$_SERVER["SERVER_NAME"] = getenv("WIKI") . ".brickimedia.org";
	$_SERVER["HTTP_HOST"] = getenv("WIKI") . ".brickimedia.org";
} else {
	$_SERVER["SERVER_NAME"] = $_SERVER["HTTP_HOST"];
}

$bmAllProjects = array( 'meta', 'en', 'dev', 'admin', 'stories', 'customs', 'cuusoo', 'data' );

$host = explode( ".", $_SERVER["HTTP_HOST"] );
switch ( $host[0] ) {
	case "meta":
		$ls_path = "LocalSettings_meta.php";
		$bmProject = 'meta';
		$wgServer = "http://meta.brickimedia.org";
		$wgDBname = "meta";
		break;
	case "en":
		$ls_path = "LocalSettings_en.php";
		$bmProject = 'en';
		$wgServer = "http://en.brickimedia.org";
		$wgDBname = "en";
		break;
	case "customs":
		$ls_path = "LocalSettings_customs.php";
		$bmProject = 'customs';
		$wgServer = "http://customs.brickimedia.org";
		$wgDBname = "customs";
		break;
	case "dev":
		$ls_path = "LocalSettings_dev.php";
		$bmProject = 'dev';
		$wgServer = "http://dev.brickimedia.org";
		$wgDBname = "dev";
		break;
	case "admin":
		$ls_path = "LocalSettings_admin.php";
		$bmProject = 'admin';
		$wgServer = "http://admin.brickimedia.org";
		$wgDBname = "admin";
		break;
	case "stories":
		$ls_path = "LocalSettings_stories.php";
		$bmProject = 'stories';
		$wgServer = "http://stories.brickimedia.org";
		$wgDBname = "stories";
		break;
	case "cuusoo":
		$ls_path = "LocalSettings_cuusoo.php";
		$bmProject = 'cuusoo';
		$wgServer = "http://cuusoo.brickimedia.org";
		$wgDBname = "cuusoo";
		break;
	case 'data':
		$ls_path = 'LocalSettings_data.php';
		$bmProject = 'data';
		$wgServer = 'http://data.brickimedia.org';
		$wgDBname = 'data';
		break;
	default:
		header( 'Location: http://www.brickimedia.org/notfound.html' ) ;
		exit(0);
		break;
}

if( !getenv("noext") ){
	require_once( __DIR__ . '/LocalSettings_ext.php' );
}
require_once( $ls_path );

//GLOBAL TABLES
$wgSharedDB     = 'shared';
$wgSharedTables = array(
	'user',
	'global_user_groups',
	'interwiki',
	'user_profile',
	'user_properties',
	'user_relationship',
	'user_relationship_request',
	'spam_regex',
	'blockedby',
	'stats_blockedby',
	'abuse_filter',
	'abuse_filter_action',
	'abuse_filter_history',
	'abuse_filter_log',
	'spoofuser',
	'phalanx',
	'phalanx_stats'
);
// SKINS
require_once( "$IP/skins/Refreshed/Refreshed.php" );
$wgDefaultSkin = 'refreshed';
function showRefreshedAdvert( &$footerExtra ) {
	$footerExtra = '
		<div id="advert">
			<p>' . wfMessage( 'refreshed-advert' )->plain() . '</p>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- Refreshed ad -->
			<ins class="adsbygoogle"
				style="display:inline-block;width:728px;height:90px"
				data-ad-client="ca-pub-9543775174763951"
				data-ad-slot="7733872730"></ins>
			<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>';
	return true;
}
$wgHooks['RefreshedFooter'][] = 'showRefreshedAdvert';

$refreshedImagePath = "$wgStylePath/Refreshed/refreshed/images";
$refreshedMeta = "<img width='144' src='$refreshedImagePath/brickimedia.svg' alt='' />";
$refreshedEn = "<img width='138' src='$refreshedImagePath/brickipedia.svg' alt='' />";
$refreshedCustoms = "<img width='100' src='$refreshedImagePath/customs.svg' alt='' />";
$refreshedStories = "<img width='144' src='$refreshedImagePath/stories.svg' alt='' />";
$refreshedCuusoo = "<img width='144' src='$refreshedImagePath/cuusoo.svg' alt='' />";
$refreshedAdmin = "<img width='81' src='$refreshedImagePath/admin.svg' alt='' />";
$refreshedDev = "<img width='169' src='$refreshedImagePath/dev.png' alt='' />";

require_once( "$IP/skins/Custard/Custard.php" );
require_once( "$IP/skins/Lia/Lia.php");
$wgSkipSkin = "custard"; //hiding it from user prefs until it's working

// GLOBAL USER RIGHTS
$wgGroupPermissions['*']['edit'] = true;
$wgGroupPermissions['user']['edit'] = true;

$wgGroupPermissions['*']['createaccount'] = true;

// IMAGE CONFIGURATION
// Thumbnailing
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";
$wgShellLocale = "en_US.utf8";
$wgTmpDirectory = '/var/www/images/temp';

// Uploading to meta
$wgUseSharedUploads = true;
$wgSharedUploadPath = 'http://images.brickimedia.org';
$wgSharedUploadDirectory = '/var/www/images';
$wgHashedSharedUploadDirectory = true;
$wgUploadDirectory = '/var/www/images'; // these 2 must also be set for SocialProfile
$wgUploadPath = 'http://images.brickimedia.org';

// Fetching images from meta
$wgFetchCommonsDescriptions = true;
$wgSharedUploadDBname = 'meta';
$wgSharedUploadDBprefix = '';
$wgRepositoryBaseUrl = "http://meta.brickimedia.org/wiki/File:";

// Special:Upload links to meta
$wgUploadNavigationUrl = "http://meta.brickimedia.org/wiki/Special:Upload";
$wgUploadMissingFileUrl = "http://meta.brickimedia.org/wiki/Special:Upload";
// And redirects to meta from other projects
function redirectSpecialsToMeta( &$title, &$article, &$output, &$user, $request, $mediaWiki ) {
	global $bmProject;
	if ( $title->getBaseTitle() == 'Special:Upload' && $bmProject != 'meta' ) {
		// not pretty, but redirects special:upload on projects to meta
		header( 'Location: http://meta.brickimedia.org/wiki/Special:Upload' );
		exit();
	}
}
$wgHooks['BeforeInitialize'][] = 'redirectSpecialsToMeta';


// Other image setup
$wgUseInstantCommons = false;
$wgFileExtensions = array( 'png','gif','jpg','jpeg','svg','mp4','mov','flv','psd','ogg','pdf','ogv','odt','bmp','bmp.png' );
$wgSVGConverters = array(
	'ImageMagick' => '$path/convert -background transparent -thumbnail $widthx$height\! $input PNG:$output'
);

// SPAM PREVENTION
$wgEnableDnsBlacklist = true;
$wgDnsBlacklistUrls = array( 'xbl.spamhaus.org', 'opm.tornevall.org' );

// OTHER CONFIGURATION
$wgLocaltimezone = "UTC";

$wgEnableScaryTranscluding = true;

// Localisation Cache
$wgCacheDirectory = "$IP/cache/$bmProject";

$wgDBerrorLog = "$IP/DB.log";

// Splash page ajax access
$wgCrossSiteAJAXdomains = array( '*' );

$wgDisableCounters = true; // Pages (therefore hit counters) are cached, we have analytics anyway and helps performance.

// Trying to solve white pages
$wgMemoryLimit = "128M";
