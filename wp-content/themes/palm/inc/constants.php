<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define( 'GNS_POST_TYPE_ARTICLE', 'article' );
define( 'GNS_POST_TYPE_PAGE', 'page' );
define( 'GNS_POST_TYPE_VIDEO', 'video' );
define( 'GNS_POST_TYPE_PODCAST', 'podcast' );
define( 'GNS_TEXT_DOMAIN', 'palm' );
define( 'GNS_ALGOLIA_POST_TYPE', [GNS_POST_TYPE_ARTICLE, GNS_POST_TYPE_VIDEO] );
define( 'GNS_TAXONOMY_PLAYLIST', 'playlist' );