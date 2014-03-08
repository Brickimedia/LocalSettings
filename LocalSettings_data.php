<?php

$wgSitename = "Brickidata";
$wgMetaNamespace = "Brickidata";
$wgPasswordSender = "data";
$wgPasswordSenderName = "Brickidata";

# Wikibase
require_once( "$IP/extensions/Wikibase/repo/Wikibase.php" );

$baseNs = 100;
 
// Define the namespace indexes
define( 'WB_NS_PROPERTY', $baseNs + 2 );
define( 'WB_NS_PROPERTY_TALK', $baseNs + 3 );
 
// Define the namespaces
$wgExtraNamespaces[WB_NS_PROPERTY] = 'Property';
$wgExtraNamespaces[WB_NS_PROPERTY_TALK] = 'Property_talk';
 
// Assigning the correct content models to the namespaces
$wgWBRepoSettings['entityNamespaces'][CONTENT_MODEL_WIKIBASE_ITEM] = NS_MAIN; 
$wgWBRepoSettings['entityNamespaces'][CONTENT_MODEL_WIKIBASE_PROPERTY] = WB_NS_PROPERTY;

define( 'WB_NS_QUERY', $baseNs + 4 );
define( 'WB_NS_QUERY_TALK', $baseNs + 5 );
 
$wgExtraNamespaces[WB_NS_QUERY] = 'Query';
$wgExtraNamespaces[WB_NS_QUERY_TALK] = 'Query_talk';
 
$wgWBRepoSettings['entityNamespaces'][CONTENT_MODEL_WIKIBASE_QUERY] = WB_NS_QUERY;
