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

$bmSmallWiki = false; // overridden when needed

$host = explode( ".", $_SERVER["HTTP_HOST"] );
switch ( $host[0] ) {
	case "meta":
		$ls_path = "LocalSettings_meta.php";
		$bmProject = "meta";
		$wgServer = "http://meta.brickimedia.org";
		$wgDBname = "meta";
		$gaAccount = "";
		break;
	case "en":
		$ls_path = "LocalSettings_en.php";
		$bmProject = "en";
		$wgServer = "http://en.brickimedia.org";
		$wgDBname = "en";
		$gaAccount = "UA-38958899-2";
		break;
	case "customs":
		$ls_path = "LocalSettings_customs.php";
		$bmProject = "customs";
		$wgServer = "http://customs.brickimedia.org";
		$wgDBname = "customs";
		$gaAccount = "UA-38958899-3";
		break;
	case "dev":
		$ls_path = "LocalSettings_dev.php";
		$bmProject = "dev";
		$wgServer = "http://dev.brickimedia.org";
		$wgDBname = "dev";
		$bmSmallWiki = true;
		$gaAccount = "UA-38958899-5";
		break;
	case "admin":
		$ls_path = "LocalSettings_admin.php";
		$bmProject = "admin";
		$wgServer = "http://admin.brickimedia.org";
		$wgDBname = "admin";
		break;
	case "stories":
		$ls_path = "LocalSettings_stories.php";
		$bmProject = "stories";
		$wgServer = "http://stories.brickimedia.org";
		$wgDBname = "stories";
		break;
	case "ideas":
		$ls_path = "LocalSettings_ideas.php";
		$bmProject = "ideas";
		$wgServer = "http://ideas.brickimedia.org";
		$wgDBname = "ideas";
		$gaAccount = "UA-38958899-4";
		break;
	case "greatballcontraption":
	case "gbc":
		$ls_path = "LocalSettings_gbc.php";
		$bmProject = "gbc";
		$wgServer = "http://greatballcontraption.com";
		$wgDBname = "gbc";
		$gaAccount = "UA-38958899-6";
		header( "Location: http://greatballcontraption.com{$_SERVER['REQUEST_URI']}" );
		break;
	case "cuusoo":
		header( "Location: http://ideas.brickimedia.org{$_SERVER['REQUEST_URI']}" );
		exit( 0 ); // just to make sure nothing else happens
		break;
/*	case "data":
		$ls_path = "LocalSettings_data.php";
		$bmProject = "data";
		$wgServer = "http://data.brickimedia.org";
		$wgDBname = "data";
		break;*/
/*	case "answers":
		$ls_path = "LocalSettings_answers.php";
		$bmProject = "answers";
		$wgServer = "http://answers.brickimedia.org";
		$wgDBname = "answers";
		$bmSmallWiki = true;
		break;*/
/*	case "books":
		$ls_path = "LocalSettings_books.php";
		$bmProject = "books";
		$wgServer = "http://books.brickimedia.org";
		$wgDBname = "books";
		$bmSmallWiki = true;
		break;*/
/*	case "minifigures":
		$ls_path = "LocalSettings_minifigures.php";
		$bmProject = "minifigures";
		$wgServer = "http://minifigures.brickimedia.org";
		$wgDBname = "minifigures";
		$bmSmallWiki = true;
		break;
	case "legominifiguresonline":
	case "minifiguresonline":
	case "lmo":
		header( "Location: http://minifigures.brickimedia.org{$_SERVER['REQUEST_URI']}" );
		exit( 0 );
		break;*/
	default:
		header( "Location: http://www.brickimedia.org/notfound.html" );
		exit( 0 );
		break;
}

//SiteConfiguration - this is for GlobaUsage
$bmAllProjects = array( 'meta', 'en', 'dev', 'admin', 'stories', 'customs', 'ideas', 'gbc' );
$wgLocalDatabases = $bmAllProjects;
$wgConf->wikis = $wgLocalDatabases;
function wikiCallback( SiteConfiguration $conf, $wiki ){
	return array(
		'suffix' => $wiki,
		'lang' => 'en', // all wikis en atm
		'params' => array(
			'lang' => 'en', // all wikis en atm
			'site' => $wiki,
			'wiki' => $wiki,
		),
	);
}
$wgConf->siteParamsCallback = 'wikiCallback';
$wgConf->settings = array(
	'wgArticlePath' => array(
		'default' => '/wiki/$1'
	),
	'wgServer' => array(
		'meta' => 'http://meta.brickimedia.org',
		'en' => 'http://en.brickimedia.org',
		'dev' => 'http://dev.brickimedia.org',
		'admin' => 'http://admin.brickimedia.org',
		'stories' => 'http://stories.brickimedia.org',
		'customs' => 'http://customs.brickimedia.org',
		'ideas' => 'http://ideas.brickimedia.org',
		'gbc' => 'http://gbc.brickimedia.org',
	)
);

//GLOBAL TABLES
$wgSharedDB = 'shared';
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
	'sites',
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
$refreshedMeta = "<svg width='144' height='30'><image xlink:href=\"$refreshedImagePath/brickimedia.svg\" src=\"$refreshedImagePath/brickimedia.png\" width='144' height='30'/></svg>";
$refreshedEn = "<svg width='144' height='30'><image xlink:href=\"$refreshedImagePath/brickipedia.svg\" src=\"$refreshedImagePath/brickipedia.png\" width='144' height='30'/></svg>";
$refreshedCustoms = "<svg width='144' height='30'><image xlink:href=\"$refreshedImagePath/customs.svg\" src=\"$refreshedImagePath/customs.png\" width='144' height='30'/></svg>";
$refreshedStories = "<svg width='144' height='30'><image xlink:href=\"$refreshedImagePath/stories.svg\" src=\"$refreshedImagePath/stories.png\" width='144' height='30'/></svg>";
$refreshedIdeas = "<img src='$refreshedImagePath/ideas.svg' width='150' height='20' />";
$refreshedAdmin = "<svg width='144' height='30'><image xlink:href=\"$refreshedImagePath/admin.svg\" src=\"$refreshedImagePath/admin.png\" width='144' height='30'/></svg>";
$refreshedGBC = "<img src='$refreshedImagePath/gbc.svg' width='140' />";
//$refreshedDev = "<img width='169' src='$refreshedImagePath/dev.png' alt='' />";
//$refreshedBooks = "<svg width='168' height='24'><image xlink:href=\"$refreshedImagePath/books.svg\" src=\"$refreshedImagePath/books.png\" width='168' height='24' /></svg>";
//$refreshedMinifigures = "<img width='150' height='33' src='$refreshedImagePath/lmo.png' alt='' />";
//$refreshedData = "<img width='160' src='$refreshedImagePath/data.png' alt='' />";

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
if ( $bmProject != 'meta' ) { // don't want this on meta, otherwise it thinks it has 2 versions of all files
	$wgFetchCommonsDescriptions = true;
	$wgSharedUploadDBname = 'meta';
	$wgSharedUploadDBprefix = '';
	$wgRepositoryBaseUrl = "http://meta.brickimedia.org/wiki/File:";
}

// Special:Upload links to meta
$wgUploadNavigationUrl = "http://meta.brickimedia.org/wiki/Special:Upload";
$wgUploadMissingFileUrl = "http://meta.brickimedia.org/wiki/Special:Upload";
// And redirects to meta from other projects
function redirectSpecialsToMeta( &$title, &$article, &$output, &$user, $request, $mediaWiki ) {
	global $bmProject;
	if (
		(
			$title->isSpecial( 'Upload' ) ||
			$title->isSpecial( 'UploadAvatar' )
		) &&
		$bmProject != 'meta'
	) {
		// not pretty, but redirects special:upload on projects to meta
		header( "Location: http://meta.brickimedia.org/wiki/{$title->getBaseTitle()}" );
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

// Cache
$wgCacheDirectory = "$IP/cache/$bmProject";
$wgParserCacheExpireTime = 60 * 60 * 24 * 7; // cache parsed articles for 7 days
$wgResourceLoaderMaxage['unversioned']['server'] = 60 * 60 * 24;
$wgResourceLoaderMaxage['unversioned']['client'] = 60 * 60 * 24; // cache uncached resourceloader requests for 1 day
$wgEnableSidebarCache = false; // don't cache the sidebar (MediaWikiChat adds a module)
$wgUseFileCache = true;
$wgFileCacheDirectory = "$IP/cache/$bmProject"; // show IPs fully cached html pages

$wgDBerrorLog = "$IP/DB.log";

// Splash page ajax access
$wgCrossSiteAJAXdomains = array( '*' );

$wgDisableCounters = true; // Pages (therefore hit counters) are cached, we have analytics anyway and helps performance.

// Trying to solve white pages
$wgMemoryLimit = "128M";

// Stop running a job per page load
$wgJobRunRate = 0;
$wgMiserMode = true;

// MUST BE AT BOTTOM OF THIS FILE!!!!
if( !getenv("noext") ){
	require_once( __DIR__ . '/LocalSettings_ext.php' );
}
require_once( $ls_path );