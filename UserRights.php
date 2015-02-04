<?php

/*
 I'm sick of wondering which groups are getting rights from where. Voila, central coordination! - Adrian
*/

#all
$wgGroupPermissions['*']['createaccount']    = true;
$wgGroupPermissions['*']['read']             = true;
$wgGroupPermissions['*']['edit']             = true;
$wgGroupPermissions['*']['createpage']       = true;
$wgGroupPermissions['*']['createtalk']       = true;
$wgGroupPermissions['*']['writeapi']         = true;
$wgGroupPermissions['*']['comment'] = true;

#users
$wgGroupPermissions['user']['move']             = true;
$wgGroupPermissions['user']['move-subpages']    = true;
$wgGroupPermissions['user']['move-rootuserpages'] = true; // can move root userpages
//$wgGroupPermissions['user']['movefile']         = true; // Disabled for now due to possible bugs and security concerns
$wgGroupPermissions['user']['read']             = true;
$wgGroupPermissions['user']['edit']             = true;
$wgGroupPermissions['user']['createpage']       = true;
$wgGroupPermissions['user']['createtalk']       = true;
$wgGroupPermissions['user']['writeapi']         = true;
$wgGroupPermissions['user']['upload']           = true;
$wgGroupPermissions['user']['reupload']         = true;
$wgGroupPermissions['user']['reupload-shared']  = true;
$wgGroupPermissions['user']['minoredit']        = true;
$wgGroupPermissions['user']['purge']            = true; // can use ?action=purge without clicking "ok"
$wgGroupPermissions['user']['sendemail']        = true;
$wgGroupPermissions['user']['patrolmarks']      = true; // let anons see what was patrolled
$wgGroupPermissions['user']['createblogpost'] = true;

#autoconfirmed
$wgGroupPermissions['autoconfirmed']['ajaxpoll-vote'] = true;
$wgGroupPermissions['autoconfirmed']['autoconfirmed'] = true;
$wgGroupPermissions['autoconfirmed']['vote'] = true;
$wgGroupPermissions['autoconfirmed']['upload_by_url'] = true;
$wgGroupPermissions['autoconfirmed']['chat'] = true;
$wgGroupPermissions['autoconfirmed']['abusefilter-log-detail'] = true;
$wgGroupPermissions['autoconfirmed']['abusefilter-view'] = true;
$wgGroupPermissions['autoconfirmed']['abusefilter-log'] = true;
$wgGroupPermissions['autoconfirmed']['skipcaptcha'] = true;
$wgGroupPermissions['autoconfirmed']['sendemail'] = true;

#patroller
$wgGroupPermissions['patroller']['noratelimit'] = true;
$wgGroupPermissions['patroller']['suppressredirect'] = true;
$wgGroupPermissions['patroller']['patrol'] = true;
$wgGroupPermissions['patroller']['autopatrol'] = true;
$wgGroupPermissions['patroller']['movefile'] = true;
$wgGroupPermissions['patroller']['globalblock-exempt'] = true;
$wgGroupPermissions['patroller']['rollback'] = true; #HAH! It's part of patroller now! :D

#reviewer
$wgGroupPermissions['reviewer']['edit'] = true;
$wgGroupPermissions['reviewer']['changeRating'] = true;
$wgAddGroups['reviewer'][] = array('reviewer');
$wgRemoveGroups['reviewer'][] = array('reviewer');

#bot
$wgGroupPermissions['bot']['bot']              = true;
$wgGroupPermissions['bot']['autoconfirmed']    = true;
$wgGroupPermissions['bot']['nominornewtalk']   = true;
$wgGroupPermissions['bot']['autopatrol']       = true;
$wgGroupPermissions['bot']['suppressredirect'] = true;
$wgGroupPermissions['bot']['apihighlimits']    = true;
$wgGroupPermissions['bot']['writeapi']         = true;
$wgGroupPermissions['bot']['editprotected']    = true; // can edit all protected pages without cascade protection enabled

#sysop
$wgGroupPermissions['sysop']['block']            = true;
$wgGroupPermissions['sysop']['createaccount']    = true;
$wgGroupPermissions['sysop']['delete']           = true;
$wgGroupPermissions['sysop']['bigdelete']        = true; // can be separately configured for pages with > $wgDeleteRevisionsLimit revs
$wgGroupPermissions['sysop']['deletedhistory']   = true; // can view deleted history entries, but not see or restore the text
$wgGroupPermissions['sysop']['deletedtext']      = true; // can view deleted revision text
$wgGroupPermissions['sysop']['undelete']         = true;
$wgGroupPermissions['sysop']['editinterface']    = true;
$wgGroupPermissions['sysop']['editusercss']      = true;
$wgGroupPermissions['sysop']['edituserjs']       = true;
$wgGroupPermissions['sysop']['import']           = true;
$wgGroupPermissions['sysop']['importupload']     = true;
$wgGroupPermissions['sysop']['edit'] = true;
$wgGroupPermissions['sysop']['move']             = true;
$wgGroupPermissions['sysop']['move-subpages']    = true;
$wgGroupPermissions['sysop']['move-rootuserpages'] = true;
$wgGroupPermissions['sysop']['patrol']           = true;
$wgGroupPermissions['sysop']['autopatrol']       = true;
$wgGroupPermissions['sysop']['protect']          = true;
$wgGroupPermissions['sysop']['proxyunbannable']  = true;
$wgGroupPermissions['sysop']['rollback']         = true;
$wgGroupPermissions['sysop']['upload']           = true;
$wgGroupPermissions['sysop']['reupload']         = true;
$wgGroupPermissions['sysop']['reupload-shared']  = true;
$wgGroupPermissions['sysop']['unwatchedpages']   = true;
$wgGroupPermissions['sysop']['autoconfirmed']    = true;
$wgGroupPermissions['sysop']['upload_by_url']    = true;
$wgGroupPermissions['sysop']['ipblock-exempt']   = true;
$wgGroupPermissions['sysop']['blockemail']       = true;
$wgGroupPermissions['sysop']['markbotedits']     = true;
$wgGroupPermissions['sysop']['apihighlimits']    = true;
$wgGroupPermissions['sysop']['browsearchive']    = true;
$wgGroupPermissions['sysop']['noratelimit']      = true;
$wgGroupPermissions['sysop']['smw-admin']      = true;
$wgGroupPermissions['sysop']['movefile']         = true;
$wgGroupPermissions['sysop']['unblockself']      = true;
$wgGroupPermissions['sysop']['suppressredirect'] = true;
$wgGroupPermissions['sysop']['trackback']        = true;
$wgGroupPermissions['sysop']['deleterevision'] = true; #for admins too!
$wgGroupPermissions['sysop']['deletelogentry'] = true; #for admins too!
$wgGroupPermissions['sysop']['interwiki'] = true;
$wgGroupPermissions['sysop']['commentadmin'] = true;
$wgGroupPermissions['sysop']['protectsite'] = true;
$wgGroupPermissions['sysop']['abusefilter-view-private'] = true;
$wgGroupPermissions['sysop']['abusefilter-log-private'] = true;
$wgGroupPermissions['sysop']['skipcaptcha'] = true;
$wgGroupPermissions['sysop']['globalblock-exempt'] = true;
$wgAddGroups['sysop'] = array( 'bot', 'patroller', 'chatmod', 'blockedfromchat' );
$wgRemoveGroups['sysop'] = array( 'bot', 'patroller', 'chatmod', 'blockedfromchat' );
$wgGroupPermissions['sysop']['nuke'] = false;

#bureaucrat
$wgGroupPermissions['bureaucrat']['renameuser'] = false;
$wgGroupPermissions['bureaucrat']['userrights'] = false;
$wgAddGroups['bureaucrat'] = array( 'sysop', 'bot', 'rollback', 'patroller', 'bureaucrat', 'chatmod', 'bag' );
$wgRemoveGroups['bureaucrat'] = array( 'sysop', 'bot', 'rollback', 'patroller', 'bureaucrat', 'chatmod', 'bag' );

#redundant functionary groups
$wgGroupPermissions['checkuser']['checkuser'] = true;
$wgGroupPermissions['checkuser']['checkuser-log'] = true;

#functionaries - pending a better name, but checkuser doesn't describe them
$wgGroupPermissions['functionary']['lookupuser'] = true;
$wgGroupPermissions['functionary']['checkuser'] = true;
$wgGroupPermissions['functionary']['checkuser-log'] = true;
$wgGroupPermissions['functionary']['suppressrevision'] = true;
$wgGroupPermissions['functionary']['hideuser'] = true;
$wgGroupPermissions['functionary']['suppressionlog'] = true;
$wgGroupPermissions['functionary']['abusefilter-hidden-log'] = true;
$wgGroupPermissions['functionary']['abusefilter-hide-log'] = true;
$wgGroupPermissions['functionary']['viewpmlog'] = true;
$wgGroupPermissions['sysop']['nuke'] = true;

#global sysadmin
$wgGroupPermissions['sysadmin'] = array_merge(
	$wgGroupPermissions['functionary'],
	$wgGroupPermissions['sysop'],
	// some social tools etc. assign permissions to the staff group
	// (and the staff group is unset() later on in this very file, so this should be OK)
	( is_array( $wgGroupPermissions['staff'] ) ? $wgGroupPermissions['staff'] : array() )
);
$wgGroupPermissions['sysadmin']['edit'] = true;
$wgGroupPermissions['sysadmin']['renameuser'] = true;
$wgGroupPermissions['sysadmin']['siteadmin'] = true;
$wgGroupPermissions['sysadmin']['editusercss'] = true;
$wgGroupPermissions['sysadmin']['edituserjs'] = true;
$wgGroupPermissions['sysadmin']['editinterface'] = true;
$wgGroupPermissions['sysadmin']['editprotected'] = true;
$wgGroupPermissions['sysadmin']['interwiki'] = true;
$wgGroupPermissions['sysadmin']['usermerge'] = true;
$wgGroupPermissions['sysadmin']['protectsite'] = true;
$wgGroupPermissions['sysadmin']['autopatrol'] = true;
$wgGroupPermissions['sysadmin']['updatepoints'] = true;
$wgGroupPermissions['sysadmin']['import'] = true;
$wgGroupPermissions['sysadmin']['importupload'] = true;
$wgGroupPermissions['sysadmin']['userrights'] = true;


#bot approval group
if( $bmProject != "en" ) { // remove the group on Brickipedia
	$wgGroupPermissions['bag'] = $wgGroupPermissions['user'];
	$wgGroupPermisions['bag']['read'] = true; //establish the group
	$wgAddGroups['bag'] = array( 'bot', 'bag' );
	$wgRemoveGroups['bag'] = array( 'bot', 'bag' );
}

#emailconfirmed
$wgAutopromote['emailconfirmed'] = APCOND_EMAILCONFIRMED;
$wgImplicitGroups[] = 'emailconfirmed'; //hides from user list

#remove steward - some 1.22 thing
$wgGroupPermissions['smwadministrator']['smw-admin'] = false;
unset( $wgGroupPermissions['steward'] );
unset( $wgGroupPermissions['smwadministrator'] );
unset( $wgGroupPermissions['staff'] );

#small-wiki administrators
$wgGroupPermissions['swsysop']['read'] = true;
if ( $bmSmallWiki ) {
	$wgGroupPermissions['swsysop'] = $wgGroupPermissions['sysop'];
}
